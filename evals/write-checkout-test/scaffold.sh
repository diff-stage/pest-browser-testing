#!/usr/bin/env bash
set -euo pipefail
cp -a --reflink=auto "$(cat "$(dirname "${BASH_SOURCE[0]}")/../.fixtures")/fixture/." .
rm -rf tests/Browser/Screenshots
