<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'subtotal_pence' => 2400,
            'discount_pence' => 0,
            'total_pence' => 2400,
            'coupon_code' => null,
            'payment_reference' => 'ch_'.fake()->unique()->bothify('########'),
        ];
    }
}
