# Deploy on Render (S2 Laravel API)

English. Japanese: [../ja/deploy-render.md](../ja/deploy-render.md).

Blueprint: [render.yaml](../../render.yaml) — free Docker web + free Postgres.

## Deploy

1. Push this repo to GitHub (public)
2. Render → **New** → **Blueprint** → select repo / `main`
3. Deploy

Start runs `scripts/render-start.sh` (migrate + `artisan serve` on `0.0.0.0:$PORT`).  
`APP_KEY` is generated on start when missing or not `base64:...`.

## Verify

```bash
export BASE_URL="https://laravel-outbound-api.onrender.com"
bash scripts/smoke.sh
```

## Limits

Free web cold starts; free Postgres expires ~30 days.
