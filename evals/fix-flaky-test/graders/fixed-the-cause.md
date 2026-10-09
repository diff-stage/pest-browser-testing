---
type: llm
focus: { source: file, path: tests/Browser/CheckoutTest.php }
---
PASS only if every point holds for the fixed test file:

1. It still covers the whole journey: apply SAVE10, go to checkout, place the order.
2. It waits for the coupon by asserting what the customer sees once it is applied (the "SAVE10 applied" status or the discounted total) before navigating to checkout.
3. It keeps the original checks: discounted total on checkout, the order's total, the emptied basket and the email.
4. It contains no fixed sleeps or wait-for-event calls.
