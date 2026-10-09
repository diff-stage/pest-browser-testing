#!/usr/bin/env bash
set -euo pipefail
case_dir="$(dirname "${BASH_SOURCE[0]}")"
cp -a --reflink=auto "$(cat "$case_dir/../.fixtures")/fixture/." .
rm -rf tests/Browser/Screenshots
cp "$case_dir/BadCheckoutTest.php" tests/Browser/CheckoutTest.php
