<x-layouts.app title="Order #{{ $order->id }}">
    @if (session('status'))
        <div role="status" data-toast class="mb-6 rounded bg-emerald-600 px-4 py-3 text-white">{{ session('status') }}</div>
    @endif

    <h1 class="text-2xl font-semibold">Order #{{ $order->id }}</h1>
    <p class="mt-4">Total paid: <strong>{{ \App\Support\Basket::money($order->total_pence) }}</strong></p>
    @if ($order->coupon_code)
        <p class="mt-1 text-zinc-600">Coupon {{ $order->coupon_code }} saved you {{ \App\Support\Basket::money($order->discount_pence) }}.</p>
    @endif
    <p class="mt-4">We've emailed a receipt to {{ $order->user->email }}.</p>
</x-layouts.app>
