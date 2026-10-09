---
type: llm
focus: last_message
---
PASS only if the review flags both:

1. `wait(2)` is a fixed sleep; the test should assert what the customer sees once the coupon is applied (the status message or the discounted total) instead.
2. `waitForEvent('networkidle')` does not wait for anything. Saying it is merely "unreliable" or "not enough" is not sufficient; it must say the call is a no-op or doesn't wait at all.
