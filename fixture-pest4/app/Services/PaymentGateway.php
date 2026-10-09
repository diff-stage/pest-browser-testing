<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentGateway
{
    /**
     * Charge the customer and return the payment reference.
     */
    public function charge(int $amountPence, string $email): string
    {
        return Http::baseUrl(config('shop.payments_url'))
            ->post('/charges', ['amount' => $amountPence, 'currency' => 'gbp', 'email' => $email])
            ->throw()
            ->json('id');
    }
}
