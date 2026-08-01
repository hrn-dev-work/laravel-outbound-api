# CONTEXT — laravel-outbound-api

Portfolio sample **S2**: Laravel outbound integration module (mock upstream by default).

## Domain glossary

| Term | Meaning |
|------|---------|
| Outbound call | Recorded HTTP (or mock) request to an upstream notify URL |
| Notify | `POST /api/v1/integrations/notify` that triggers one outbound call |
| Mock mode | `OUTBOUND_MODE=mock` — no real network; stores `mocked: true` |

## Architecture

| Layer | Choice |
|-------|--------|
| Backend | Laravel 12 (PHP 8.3) — [ADR 0001](docs/adr/0001-laravel-postgres-api.md) |
| DB | PostgreSQL 16 via Docker Compose `db` |
| API | REST `/api/v1` |
| Tests | PHPUnit feature tests |
| Hosting | Render Blueprint (Docker) + GitHub |

**Ports:** API `8000` · Postgres `5432` · Health `GET /api/v1/health`

Layout: Laravel `app/` · `routes/api.php` · `database/migrations/` · `docs/` · `scripts/smoke.sh`

Full detail: [docs/agents/stack.md](docs/agents/stack.md).

## Common ambiguities

- Default outbound is **mock** (no third-party keys).
- `OUTBOUND_MODE=http` requires a real `OUTBOUND_URL`.
- Host without `pdo_pgsql` must use Docker for migrate/test/serve.

## Security guardrails

See [docs/agents/security.md](docs/agents/security.md).

- Never commit `.env` or real upstream credentials.
- Do not log full secrets; log ids / status codes only.
- Prefer mock mode in demos and CI.
