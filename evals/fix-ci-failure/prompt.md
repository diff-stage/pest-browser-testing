---
max_turns: 40
timeout_seconds: 900
allowed_tools: [Read, Glob, Grep, Edit, Write, Bash, Skill]
tags: [ci]
---

Our browser tests pass locally but fail on GitHub Actions. The log from the last run is in `ci-failure.log`. Fix `.github/workflows/tests.yml` so the browser tests pass in CI, and explain what was wrong.

Run tests locally with `bin/pest` if you need to (it sets up PHP and Playwright on this machine).
