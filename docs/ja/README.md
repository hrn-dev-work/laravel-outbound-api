# 人向けドキュメント（日本語）

日本語の人向けガイドはこのツリー（`docs/ja/...`）に置きます。

エージェント向け（`CONTEXT.md`、`docs/agents/`、`docs/adr/`、Cursor rules/skills）は **英語のみ**です。  
英語の人向けガイド: `docs/en/`。

同一ファイルに英語と日本語を混ぜないでください（ルート `README.md` のみ上=英語・下=日本語の例外）。方針: `docs-language` スキル（`~/.cursor/skills/docs-language`）。

- [はじめに](./getting-started.md) — このアプリリポでの最初の 1 時間
- [ローカル DB（Docker）](./local-database.md) — Postgres はホストではなく Compose 上
- [レビュー](./reviews.md) — implementation-review（7段階）とレポート場所
