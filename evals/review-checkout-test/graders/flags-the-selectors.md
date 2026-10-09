---
type: llm
focus: last_message
---
PASS only if the review flags both:

1. `click('.bg-zinc-900')` selects by a styling class that can change in a redesign (it also matches the checkout button); it should use text, a stable attribute or a data-testid.
2. `assertPathIs('/orders/1')` hard-codes a database ID.
