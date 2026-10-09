---
type: llm
focus: last_message
---
PASS only if the final message explains both:

1. The test moved on to checkout before the coupon had been applied, because the coupon is applied after a variable delay that a fixed half-second wait doesn't always cover.
2. `waitForEvent('networkidle')` did not wait for anything. Saying it was merely "not enough" or "unreliable" is not sufficient; it must say the call doesn't wait at all or is a no-op.
