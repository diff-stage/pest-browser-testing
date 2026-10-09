<?php

return [

    /*
    | Percentage discounts keyed by coupon code.
    */
    'coupons' => [
        'SAVE10' => 10,
        'HALFPRICE' => 50,
    ],

    'payments_url' => env('PAYMENTS_URL', 'https://payments.example.test'),

];
