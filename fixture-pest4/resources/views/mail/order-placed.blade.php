<p>Thanks for your order #{{ $order->id }}.</p>
<p>Total paid: {{ \App\Support\Basket::money($order->total_pence) }}</p>
