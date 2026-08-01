#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")/.."

# Prefer Compose/Render process env. Avoid baked secrets and default sqlite file.
rm -f .env database/database.sqlite

# Render may inject DATABASE_URL; Laravel reads DB_URL.
if [[ -n "${DATABASE_URL:-}" ]]; then
  export DB_CONNECTION="${DB_CONNECTION:-pgsql}"
  export DB_URL="${DB_URL:-$DATABASE_URL}"
fi

# Prefer env-injected APP_KEY (Compose/Render). Generate in-memory when missing.
if [[ -z "${APP_KEY:-}" || "${APP_KEY}" != base64:* ]]; then
  export APP_KEY="$(php -r 'echo "base64:".base64_encode(random_bytes(32));')"
  echo "Generated ephemeral APP_KEY for this process"
fi

php artisan migrate --force
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
