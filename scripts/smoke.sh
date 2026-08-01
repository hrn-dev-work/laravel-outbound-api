#!/usr/bin/env bash
set -euo pipefail
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

BASE_URL="${BASE_URL:-http://localhost:8001}"

echo "=== HEALTH ==="
curl -sS "$BASE_URL/api/v1/health"
echo

echo "=== NOTIFY ==="
NOTIFY=$(curl -sS -X POST "$BASE_URL/api/v1/integrations/notify" \
  -H "Content-Type: application/json" \
  -d '{"title":"Payment retry failed","message":"Timeout talking to PSP"}')
echo "$NOTIFY"
echo "$NOTIFY" | grep -q '"ok":true' || { echo "expected ok:true"; exit 1; }
echo "$NOTIFY" | grep -q 'laravel-outbound' || { echo "missing mock target"; exit 1; }

echo "=== OUTBOUND LIST ==="
LIST=$(curl -sS "$BASE_URL/api/v1/integrations/outbound-calls")
echo "$LIST"
echo "$LIST" | grep -q 'laravel-outbound' || { echo "missing mock outbound in list"; exit 1; }
echo "OK"
