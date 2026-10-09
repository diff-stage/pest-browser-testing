<x-layouts.app title="Checkout">
    <h1 class="text-2xl font-semibold">Checkout</h1>
    <p class="mt-2 text-zinc-600">Paying with the card saved to your account.</p>

    @include('partials.totals')

    <form action="{{ route('orders.store') }}" method="post" class="mt-8">
        @csrf
        <button type="submit" class="rounded bg-zinc-900 px-5 py-3 text-white">Place order</button>
    </form>
</x-layouts.app>
