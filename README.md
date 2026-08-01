# Ops Laravel Outbound API

Portfolio sample for **CrowdWorks / fixed-price** Laravel work: outbound integration module with recorded calls + PHPUnit.

Aligned with Research card **S2**:  
[docs/en/sample-card-s2.md](./docs/en/sample-card-s2.md)

| | |
|---|---|
| Stack | Laravel 12 · PostgreSQL 16 · PHPUnit ([ADR 0001](./docs/adr/0001-laravel-postgres-api.md)) |
| Problem | Clients need a small, testable outbound API glue module without shipping real vendor keys |
| Result | Mock outbound notify + persisted `outbound_calls` + health + Docker/Render |
| Public API | [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) — health verified; deploy: [docs/en/deploy-render.md](./docs/en/deploy-render.md) |

Japanese: see below.  
Agent glossary: [CONTEXT.md](./CONTEXT.md)

Local (Docker): `http://localhost:8001/api/v1/health` · Hosted: [https://laravel-outbound-api.onrender.com/api/v1/health](https://laravel-outbound-api.onrender.com/api/v1/health)

---

## Case study (for proposals)

**Challenge**  
Spot Laravel jobs often ask for “call this SaaS API and prove it works.” Samples with real keys are unsafe; samples without tests are weak.

**Approach**

1. `POST /api/v1/integrations/notify` validates input and triggers one outbound call
2. Default `OUTBOUND_MODE=mock` records a successful mock response (no network)
3. Optional `http` mode posts JSON to `OUTBOUND_URL` with timeout
4. `GET /api/v1/integrations/outbound-calls` lists recent calls for demos

**Outcome**  
Runnable proof: PHPUnit + `scripts/smoke.sh` + public GitHub + hosted HTTPS on Render.

---

## Quick start

```bash
docker compose up --build -d
BASE_URL=http://localhost:8001 bash scripts/smoke.sh
docker compose exec api php artisan test
```

Host PHP without `pdo_pgsql` is unsupported for migrate/test — use Compose.

---

## Skill set

| Area | Skills shown |
|------|----------------|
| Backend | Laravel 12 API routes · Eloquent · Form request validation |
| Integration | Outbound HTTP client · mock mode · recorded calls |
| Quality | PHPUnit · smoke script · health + DB ping |
| Ops | Docker Compose · Render Blueprint · ADR for stack exception |

**Research tags (S2):** `laravel` · `rest-api` · `outbound-integration` · `testing`

Agent inventory: [docs/agents/skill-set.md](./docs/agents/skill-set.md)

---

## Status vs S2 DoD

| DoD item | Status |
|----------|--------|
| Smoke / tests green | Yes (local Docker + hosted `scripts/smoke.sh`) |
| README case study | Yes (this file) |
| Public URL set (repo + API host + offer) | Yes — [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) · [GitHub](https://github.com/hrn-dev-work/laravel-outbound-api) |

---

## License

MIT

---

# Ops Laravel Outbound API（日本語）

**クラウドワークス / 単発**向け Laravel ポートフォリオ用サンプルです。  
outbound 連携モジュール（既定はモック）+ 呼び出し記録 + PHPUnit。

調査カード **S2**: [docs/ja/sample-card-s2.md](./docs/ja/sample-card-s2.md)

| | |
|---|---|
| スタック | Laravel 12 · PostgreSQL 16 · PHPUnit（[ADR 0001](./docs/adr/0001-laravel-postgres-api.md)） |
| 課題 | 本番キーなしで「外部 API を叩く」を証明したい |
| 結果 | モック outbound + `outbound_calls` 保存 + health + Docker/Render |
| 公開 API | [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) — [docs/ja/deploy-render.md](./docs/ja/deploy-render.md) |

English: see above.  
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
