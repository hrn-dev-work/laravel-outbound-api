# Human documentation (English)

Put English human-facing guides in this tree (`docs/en/...`).

Agent-facing docs stay at repo root / `docs/agents/` / `docs/adr/` and are **English only**.  
Japanese human guides: `docs/ja/`.

Do **not** mix English and Japanese in files under this tree. Root `README.md` is Japanese and `README.en.md` is English, with language links at the top of both files. Layout policy: `docs-language` skill (`~/.cursor/skills/docs-language`).

- [Purpose (why this repo)](./purpose.md) — portfolio goal, demo script, non-goals
- [Getting started](./getting-started.md) — first hour in this app repo
- [Deploy on Render](./deploy-render.md) — S2 public API (Blueprint)
- [Local database (Docker)](./local-database.md) — Postgres runs in Compose, not on the host
- [Reviews](./reviews.md) — 7-stage implementation-review protocol and report location
