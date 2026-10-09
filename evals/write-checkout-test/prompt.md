---
max_turns: 60
timeout_seconds: 1200
allowed_tools: [Read, Glob, Grep, Edit, Write, Bash, Skill]
tags: [write]
---

Add a browser test for checkout in `tests/Browser/CheckoutTest.php`: a signed-in customer with items in their basket applies the coupon SAVE10 and places the order.

Run tests with `bin/pest` (it sets up PHP and Playwright on this machine). Make sure the test passes before you finish.
