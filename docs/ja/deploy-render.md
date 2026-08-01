# Render デプロイ（S2 Laravel API）

English: [../en/deploy-render.md](../en/deploy-render.md)。

Blueprint: [render.yaml](../../render.yaml) — 無料 Docker Web + 無料 Postgres。

## 手順

1. GitHub に公開リポを push
2. Render → **New** → **Blueprint** → `main`
3. Deploy

起動は `scripts/render-start.sh`（migrate + `artisan serve`）。  
`APP_KEY` が無い／不正なときは起動時に生成。

## 確認

```bash
export BASE_URL="https://laravel-outbound-api.onrender.com"
bash scripts/smoke.sh
```

## 制限

無料 Web のコールドスタート、無料 Postgres は約 30 日。
