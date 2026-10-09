---
type: llm
focus: last_message
---
PASS only if the final message explains that the log's error came from missing system libraries for Chromium (fixed by installing Playwright with `--with-deps` or `install-deps`) AND that the workflow never builds the front-end assets (`npm run build`), which browser tests need even though the log didn't get that far.
