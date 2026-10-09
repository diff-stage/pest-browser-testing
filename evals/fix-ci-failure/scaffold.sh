#!/usr/bin/env bash
set -euo pipefail
case_dir="$(dirname "${BASH_SOURCE[0]}")"
cp -a --reflink=auto "$(cat "$case_dir/../.fixtures")/fixture/." .
rm -rf tests/Browser/Screenshots
mkdir -p .github/workflows
cp "$case_dir/tests.yml" .github/workflows/tests.yml
cp "$case_dir/ci-failure.log" ci-failure.log
