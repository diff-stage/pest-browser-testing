<?php

namespace App\Http\Controllers;

use App\Support\Basket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $code = Str::upper(trim($request->validate(['code' => ['required', 'string']])['code']));

        if (! array_key_exists($code, config('shop.coupons'))) {
            return response()->json(['message' => 'That code is not valid.'], 422);
        }

        session(['coupon' => $code]);

        return response()->json([
            'code' => $code,
            ...Basket::for($request->user())->formattedTotals(),
        ]);
    }
}
