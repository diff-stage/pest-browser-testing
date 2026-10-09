<?php

use App\Mail\OrderPlaced;
use App\Models\BasketItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

it('places an order with a coupon applied', function () {
    Http::preventStrayRequests();
    Http::fake(['payments.example.test/charges' => Http::response(['id' => 'ch_test_123'])]);
    Mail::fake();
    $user = User::factory()->create();
    $product = Product::factory()->create(['name' => 'Oat milk', 'price_pence' => 1200]);
    BasketItem::factory()->for($user)->for($product)->create(['quantity' => 2]);

    $this->actingAs($user);

    visit('/basket')
        ->assertSee('Oat milk × 2')
        ->assertSeeIn('#total', '£24.00')
        ->fill('code', 'save10')
        ->click('Apply')
        ->assertSee('SAVE10 applied')
        ->assertSeeIn('#total', '£21.60')
        ->assertNoJavaScriptErrors()
        ->click('a[href$="/checkout"]')
        ->assertPathIs('/checkout')
        ->assertSeeIn('#discount', '−£2.40')
        ->click('Place order')
        ->assertPathBeginsWith('/orders/')
        ->assertSee('Order placed')
        ->assertSee('Total paid: £21.60')
        ->assertSee('Coupon SAVE10 saved you £2.40')
        ->assertNoJavaScriptErrors();

    $order = $user->orders()->sole();
    expect($order->total_pence)->toBe(2160)
        ->and($order->coupon_code)->toBe('SAVE10')
        ->and($order->payment_reference)->toBe('ch_test_123')
        ->and($user->basketItems()->count())->toBe(0);
    Http::assertSent(fn ($request) => $request['amount'] === 2160);
    Mail::assertSent(OrderPlaced::class, fn (OrderPlaced $mail) => $mail->hasTo($user->email));
});
