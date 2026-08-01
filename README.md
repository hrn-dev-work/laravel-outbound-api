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

Japanese: [README.ja.md](./README.ja.md)  
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
