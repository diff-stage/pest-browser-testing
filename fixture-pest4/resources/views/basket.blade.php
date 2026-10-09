<x-layouts.app title="Basket">
    <h1 class="text-2xl font-semibold">Your basket</h1>

    @if ($basket->items()->isEmpty())
        <p class="mt-6">Your basket is empty.</p>
    @else
        <ul class="mt-6 divide-y divide-zinc-200">
            @foreach ($basket->items() as $item)
                <li class="flex justify-between py-3">
                    <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                    <span>{{ \App\Support\Basket::money($item->lineTotalPence()) }}</span>
                </li>
            @endforeach
        </ul>

        @include('partials.totals')

        <form id="coupon-form" action="{{ route('basket.coupon') }}" method="post" class="mt-6 flex gap-2">
            <label for="code" class="sr-only">Coupon code</label>
            <input id="code" name="code" placeholder="Coupon code" class="flex-1 rounded border border-zinc-300 px-3 py-2">
            <button type="submit" class="rounded border border-zinc-300 px-4 py-2">Apply</button>
        </form>
        <p id="coupon-status" class="mt-2 text-sm text-zinc-600" aria-live="polite">
            @if ($basket->couponCode()) {{ $basket->couponCode() }} applied @endif
        </p>

        <a href="{{ route('checkout') }}" class="mt-8 inline-block rounded bg-zinc-900 px-5 py-3 text-white">Next: Pay</a>
    @endif
</x-layouts.app>
