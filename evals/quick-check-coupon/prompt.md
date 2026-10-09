---
max_turns: 40
timeout_seconds: 900
allowed_tools: [Read, Glob, Grep, Edit, Write, Bash, Skill]
tags: [near-miss]
---

Quick sanity check: when a signed-in customer applies SAVE10 on the basket page in a real browser, does the total update without a page reload? I don't want a new test added to the repo, just tell me whether it works.

Run tests with `bin/pest` if you need to (it sets up PHP and Playwright on this machine).
