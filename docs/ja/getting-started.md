# はじめに（このリポジトリ）

bootstrap 後の **アプリリポ** 向けです。  
マシン全体の使い方: `~/.cursor/docs/ja/using-on-a-project.md`

English: [../en/getting-started.md](../en/getting-started.md)

## 最初の 1 時間

1. ルートの `CONTEXT.md` を埋める。
2. [../agents/README.md](../agents/README.md) を順に読む。
3. [../agents/stack.md](../agents/stack.md) を確認。
4. `cp docker-compose.example.yml docker-compose.yml`（未作成なら）。
5. `docker compose up -d db`
6. `cp .env.example .env` — `DATABASE_URL` を確認。
7. SQLTools で `localhost:5432` に接続。
8. 準備できたら `backend/` / `frontend/` を追加。

## ローカル DB

Postgres は **Docker 上のみ**。[local-database.md](./local-database.md)

## ドキュメントの言語

- 人向け: `docs/en/` と `docs/ja/`
- エージェント向け: `CONTEXT.md` / `docs/agents/` / ADR は英語のみ
