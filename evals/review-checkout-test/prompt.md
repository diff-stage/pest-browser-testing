---
max_turns: 40
timeout_seconds: 900
allowed_tools: [Read, Glob, Grep, Edit, Write, Bash, Skill]
tags: [review]
---

Review `tests/Browser/CheckoutTest.php` before I merge it. It passes. Don't change any files; reply with the problems you find, most important first.

Run tests with `bin/pest` if you need to (it sets up PHP and Playwright on this machine).
