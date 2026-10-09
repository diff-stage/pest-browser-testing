---
type: llm
focus: { source: file, path: tests/Browser/CheckoutTest.php }
---
PASS only if every point holds for the test file:

1. It is one journey: basket, apply coupon, checkout, place order, confirmation.
2. After applying the coupon, it asserts the discounted total the customer sees before moving on.
3. After placing the order, it asserts the confirmation the customer sees (page, order, total paid) before any database checks.
4. The payment API is faked inside the test (`Http::fake`), not left to the network.
5. It checks the side effects in PHP: the saved order with its discounted total and coupon, and at least one of: basket emptied, confirmation email sent, payment request sent with the discounted amount.
6. It asserts visible text, paths and values, not CSS classes, framework internals or pixel sizes.
