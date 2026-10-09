<?php

use App\Models\BasketItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Http;

it('checks out', function () {
    Http::fake(['*' => Http::response(['id' => 'ch_test_1'])]);
    $user = User::factory()->create();
    BasketItem::factory()->for($user)->for(Product::factory()->state(['price_pence' => 1200]))->create(['quantity' => 2]);
    $this->actingAs($user);

    visit('/basket')
        ->fill('code', 'SAVE10')
        ->press('Apply')
        ->waitForEvent('networkidle')
        ->wait(2)
        ->click('.bg-zinc-900')
        ->click('Place order')
        ->assertPathIs('/orders/1')
        ->assertSee('Order placed');

    expect(Order::count())->toBe(1);
});
