<?php

namespace App\Http\Controllers;

use App\Support\Basket;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BasketController extends Controller
{
    public function show(Request $request): View
    {
        return view('basket', ['basket' => Basket::for($request->user())]);
    }

    public function checkout(Request $request): View
    {
        return view('checkout', ['basket' => Basket::for($request->user())]);
    }
}
