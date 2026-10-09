---
type: llm
focus: last_message
---
PASS only if the review flags all three:

1. The test never checks that the coupon worked: no discounted total is asserted on screen or in the database, so it passes if the discount is broken.
2. It only checks that an order exists: not its total, the emptied basket or the confirmation email.
3. The HTTP fake is a catch-all (`'*'`) and nothing checks the payment request or its amount (or it suggests `Http::preventStrayRequests()` / `Http::assertSent`).
