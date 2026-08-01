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

**S2 status (2026-08-01):** Live URL above; hosted smoke (health + notify + outbound list) verified. README DoD Public URL = **Yes**.

## Limits

Free web cold starts; free Postgres expires ~30 days.  
Workspace free Postgres is **one at a time** — deploying this sample may require deleting another free DB (e.g. S1 `ops-inbox-db`).
