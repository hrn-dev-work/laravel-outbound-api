# 人向けドキュメント（日本語）

日本語の人向けガイドはこのツリー（`docs/ja/...`）に置きます。

エージェント向け（`CONTEXT.md`、`docs/agents/`、`docs/adr/`、Cursor rules/skills）は **英語のみ**です。  
英語の人向けガイド: `docs/en/`。

同一ファイルに英語と日本語を混ぜないでください。ルートは `README.md` が英語、`README.ja.md` が日本語で、両方の冒頭に言語切り替えリンクを置きます。方針: `docs-language` スキル（`~/.cursor/skills/docs-language`）。

- [目的（なぜこのリポか）](./purpose.md) — ポートフォリオ目的・デモ手順・非目標
- [はじめに](./getting-started.md) — このアプリリポでの最初の 1 時間
- [Render デプロイ](./deploy-render.md) — S2 公開 API（Blueprint）
- [ローカル DB（Docker）](./local-database.md) — Postgres はホストではなく Compose 上
- [レビュー](./reviews.md) — implementation-review（7段階）とレポート場所
