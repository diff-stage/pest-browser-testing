<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Services\PaymentGateway;
use App\Support\Basket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function store(Request $request, PaymentGateway $payments): RedirectResponse
    {
        $user = $request->user();
        $basket = Basket::for($user);

        abort_if($basket->items()->isEmpty(), 422, 'Your basket is empty.');

        $reference = $payments->charge($basket->totalPence(), $user->email);

        $order = DB::transaction(function () use ($user, $basket, $reference): Order {
            $user->basketItems()->delete();

            return $user->orders()->create([
                'subtotal_pence' => $basket->subtotalPence(),
                'discount_pence' => $basket->discountPence(),
                'total_pence' => $basket->totalPence(),
                'coupon_code' => $basket->couponCode(),
                'payment_reference' => $reference,
            ]);
        });

        session()->forget('coupon');

        Mail::to($user)->send(new OrderPlaced($order));

        return to_route('orders.show', $order)->with('status', 'Order placed');
    }

    public function show(Request $request, Order $order): View
    {
        abort_unless($order->user()->is($request->user()), 404);

        return view('orders.show', ['order' => $order]);
    }
}
