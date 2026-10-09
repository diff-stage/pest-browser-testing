<?php

use App\Mail\OrderPlaced;
use App\Models\BasketItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

it('places an order with a coupon', function () {
    Http::fake(['payments.example.test/*' => Http::response(['id' => 'ch_test_1'])]);
    Mail::fake();
    $user = User::factory()->create();
    BasketItem::factory()->for($user)->for(Product::factory()->state(['price_pence' => 1200]))->create(['quantity' => 2]);
    $this->actingAs($user);

    visit('/basket')
        ->fill('code', 'SAVE10')
        ->press('Apply')
        ->waitForEvent('networkidle')
        ->wait(0.5)
        ->click('a[href$="/checkout"]')
        ->assertSeeIn('#total', '£21.60')
        ->click('Place order')
        ->assertSee('Order placed');

    expect($user->orders()->sole()->total_pence)->toBe(2160);
    expect($user->basketItems()->count())->toBe(0);
    Mail::assertSent(OrderPlaced::class);
});
