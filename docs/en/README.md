# Human documentation (English)

Put English human-facing guides in this tree (`docs/en/...`).

Agent-facing docs stay at repo root / `docs/agents/` / `docs/adr/` and are **English only**.  
Japanese human guides: `docs/ja/`.

Do **not** mix English and Japanese in files under this tree. Root `README.md` is the exception (EN top / JA bottom). Layout policy: `docs-language` skill (`~/.cursor/skills/docs-language`).

- [Getting started](./getting-started.md) — first hour in this app repo
- [Local database (Docker)](./local-database.md) — Postgres runs in Compose, not on the host
- [Reviews](./reviews.md) — 7-stage implementation-review protocol and report location
