---
max_turns: 60
timeout_seconds: 1500
allowed_tools: [Read, Glob, Grep, Edit, Write, Bash, Skill]
tags: [flaky]
---

`tests/Browser/CheckoutTest.php` fails in CI about half the time. Fix it so it's reliable, and prove it's stable before you finish. Explain the cause in your final message.

Run tests with `bin/pest` (it sets up PHP and Playwright on this machine).
