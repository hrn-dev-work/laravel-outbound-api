# Stack (agents)

English only. Human mirrors: getting-started + deploy docs.

| Layer | Choice |
|-------|--------|
| Backend | Laravel 12 · PHP 8.3 |
| DB | PostgreSQL 16 (Compose `db`) |
| ORM | Eloquent |
| API | REST `/api/v1` |
| Tests | PHPUnit |
| Packages | Composer |
| Hosting | Render (Docker Blueprint) · GitHub |
| Local run | `docker compose up --build` (host may lack `pdo_pgsql`) |

ADR: [../adr/0001-laravel-postgres-api.md](../adr/0001-laravel-postgres-api.md).

Outside default-stack FastAPI by design (S2 Laravel card).
