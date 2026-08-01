# Ops Laravel Outbound API

**クラウドワークス / 単発**向け Laravel ポートフォリオ用サンプルです。  
outbound 連携モジュール（既定はモック）+ 呼び出し記録 + PHPUnit。

調査カード **S2**: [docs/ja/sample-card-s2.md](./docs/ja/sample-card-s2.md)

| | |
|---|---|
| スタック | Laravel 12 · PostgreSQL 16 · PHPUnit（[ADR 0001](./docs/adr/0001-laravel-postgres-api.md)） |
| 課題 | 本番キーなしで「外部 API を叩く」を証明したい |
| 結果 | モック outbound + `outbound_calls` 保存 + health + Docker/Render |
| 公開 API | [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) — [docs/ja/deploy-render.md](./docs/ja/deploy-render.md) |

English: [README.md](./README.md)  
用語: [CONTEXT.md](./CONTEXT.md)

ローカル（Docker）: `http://localhost:8001/api/v1/health` · ホスト: [https://laravel-outbound-api.onrender.com/api/v1/health](https://laravel-outbound-api.onrender.com/api/v1/health)

---

## ケーススタディ

**課題**  
Laravel スポット案件は「SaaS API 連携」が多い。本物のキーをリポに入れるのは危険で、テスト無しは弱い。

**方針**

1. `POST /api/v1/integrations/notify` で入力検証 → outbound 1 回
2. 既定 `OUTBOUND_MODE=mock`（ネットワーク無し）
3. 任意で `http` モード + タイムアウト
4. `GET /api/v1/integrations/outbound-calls` でデモ確認

**成果**  
PHPUnit + smoke + GitHub + Render HTTPS。

---

## 起動

```bash
docker compose up --build -d
BASE_URL=http://localhost:8001 bash scripts/smoke.sh
docker compose exec api php artisan test
```

ホスト PHP に `pdo_pgsql` が無い場合は Compose 必須。

---

## スキルセット

| 領域 | 示すこと |
|------|----------|
| Backend | Laravel 12 API · Eloquent · バリデーション |
| Integration | Outbound · mock · 記録 |
| Quality | PHPUnit · smoke · health |
| Ops | Compose · Render · ADR |

**調査タグ（S2）:** `laravel` · `rest-api` · `outbound-integration` · `testing`

---

## S2 DoD

| 項目 | 状態 |
|------|------|
| Smoke / テスト緑 | Yes（ローカル Docker + ホスト smoke） |
| README ケース | あり |
| 公開 URL 一式 | Yes — [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) · [GitHub](https://github.com/hrn-dev-work/laravel-outbound-api) |

---

## License

MIT
