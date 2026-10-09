---
type: regex
target: { source: file, path: tests/Browser/CheckoutTest.php }
pattern: '->wait\(|\bsleep\(|usleep\(|pressAndWaitFor|waitFor\(|waitForEvent|waitForText|->debug\(|->tinker\(|->only\(|->repeat\('
match: not_contains
---
