@php($totals = $basket->formattedTotals())
<dl id="totals" class="mt-6 space-y-2 border-t border-zinc-200 pt-4">
    <div class="flex justify-between"><dt>Subtotal</dt><dd id="subtotal">{{ $totals['subtotal'] }}</dd></div>
    <div class="flex justify-between"><dt>Discount</dt><dd id="discount">{{ $totals['discount'] }}</dd></div>
    <div class="flex justify-between font-semibold"><dt>Total</dt><dd id="total">{{ $totals['total'] }}</dd></div>
</dl>
