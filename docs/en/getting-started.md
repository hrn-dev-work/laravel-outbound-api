# Getting started (this repository)

You are inside an **application repo** after bootstrap.  
Global Cursor how-to (machine): `~/.cursor/docs/en/using-on-a-project.md`

Japanese: [../ja/getting-started.md](../ja/getting-started.md)

## First hour

1. Fill root `CONTEXT.md` (name, description, domain terms).
2. Read [../agents/README.md](../agents/README.md) in order.
3. Confirm [../agents/stack.md](../agents/stack.md).
4. `cp docker-compose.example.yml docker-compose.yml` (if not already).
5. `docker compose up -d db`
6. `cp .env.example .env` — check `DATABASE_URL`.
7. Open SQLTools → connect to `localhost:5432` (user/password/db from compose).
8. Add `backend/` (FastAPI) and `frontend/` (Next.js) when ready.

## Local database

Postgres runs **in Docker only**. Details: [local-database.md](./local-database.md)

## Doc languages

- Humans: `docs/en/` (this tree) and `docs/ja/`
- Agents: `CONTEXT.md`, `docs/agents/`, `docs/adr/` — English only
