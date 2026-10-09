# Pest browser testing skill

An agent skill that teaches coding agents to write reliable [Pest browser tests](https://pestphp.com/docs/browser-testing) (`pestphp/pest-plugin-browser`, Pest 4 and 5).

It covers:

- **Writing:** test shape, selectors, waiting, navigation and isolation.
- **Fixing:** a step-by-step workflow for flaky and CI-only failures.
- **CI:** Playwright install, sharding, traces and screenshot baselines.

It also flags API calls that agents commonly invent, and real ones that silently do nothing.

## Install

```bash
# Any agent (skills.sh)
npx skills add diff-stage/pest-browser-testing

# Laravel Boost
php artisan boost:add-skill diff-stage/pest-browser-testing

# Claude Code
/plugin marketplace add diff-stage/pest-browser-testing
/plugin install pest-browser-testing@diff-stage
```

## Works with

- **Laravel Boost** `testing-best-practices` decides whether a behaviour needs a browser test. This skill covers how to write it well.
- **pest-plugin-agent** (`pest --agent`) runs quick one-off checks. This skill is for tests you keep.

## Evals

`evals/` holds `claude plugin eval` cases that run against a small Laravel shop in `fixture/` (Pest 5) and `fixture-pest4/` (Pest 4). Each case runs with and without the skill.

```bash
evals/setup                     # build both fixtures in ~/.cache/pest-browser-testing
claude plugin eval . --scaffold --allow-tools Bash Write Edit --keep-temp --json results.json
evals/score-results results.json  # rerun each written test 20 times, under --parallel, and against planted bugs
```

## License

MIT. Made by the team behind [Diff Stage](https://diffstage.com).
