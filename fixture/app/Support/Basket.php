<?php

namespace App\Support;

use App\Models\BasketItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Number;

final class Basket
{
    /** @var Collection<int, BasketItem> */
    private Collection $items;

    public function __construct(private User $user, private ?string $couponCode)
    {
        $this->items = $user->basketItems()->with('product')->get();
    }

    public static function for(User $user): self
    {
        return new self($user, session('coupon'));
    }

    /**
     * @return Collection<int, BasketItem>
     */
    public function items(): Collection
    {
        return $this->items;
    }

    public function couponCode(): ?string
    {
        return $this->couponCode;
    }

    public function subtotalPence(): int
    {
        return $this->items->sum(fn (BasketItem $item): int => $item->lineTotalPence());
    }

    public function discountPence(): int
    {
        $percent = config("shop.coupons.{$this->couponCode}", 0);

        return intdiv($this->subtotalPence() * $percent, 100);
    }

    public function totalPence(): int
    {
        return $this->subtotalPence() - $this->discountPence();
    }

    /**
     * @return array{subtotal: string, discount: string, total: string}
     */
    public function formattedTotals(): array
    {
        return [
            'subtotal' => self::money($this->subtotalPence()),
            'discount' => '−'.self::money($this->discountPence()),
            'total' => self::money($this->totalPence()),
        ];
    }

    public static function money(int $pence): string
    {
        return Number::currency($pence / 100, in: 'GBP', locale: 'en_GB');
    }
}
