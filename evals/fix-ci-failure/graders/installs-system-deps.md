---
type: regex
target: { source: file, path: .github/workflows/tests.yml }
pattern: 'install[^\n]*--with-deps|install-deps'
---
