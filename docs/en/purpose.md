# Why this repository exists

## One sentence

This is a **public portfolio demo**, not a SaaS product.  
It proves you can ship a small **Laravel outbound integration module** (notify + recorded calls + tests) that clients can run or hit on a public URL.

## Business purpose

Support **spot / fixed-price** freelance proposals on:

- [CrowdWorks](https://crowdworks.jp/) (primary fit for Laravel/PHP spot work)
- [Upwork](https://www.upwork.com/) when the brief is PHP/Laravel API glue

when the job looks like:

> “Add a module that calls an external HTTP API, validates input, stores the result, and prove it with tests — without putting real vendor keys in the repo.”

Evidence for a proposal:

| Evidence | Where |
|----------|--------|
| Source + case study | This GitHub repo + root `README.md` |
| Live API | [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) · health `/api/v1/health` |
| Automated check | `scripts/smoke.sh` + PHPUnit in Docker |
| Research card | [sample-card-s2.md](./sample-card-s2.md) (id **S2**) |

Private strategy / research backup:  
`cursor-dotfiles` → portfolio strategy + research run `2026-08-01`.

## What a reviewer should understand in 60 seconds

1. **Notify:** `POST /api/v1/integrations/notify` validates the body and triggers **one** outbound call.
2. **Default mock:** `OUTBOUND_MODE=mock` — no network; response stored with `mocked: true`.
3. **Optional real HTTP:** `OUTBOUND_MODE=http` + `OUTBOUND_URL` (timeouts; still no secrets in git).
4. **Audit trail:** `GET /api/v1/integrations/outbound-calls` lists recent calls for demos.
5. **Health:** `GET /api/v1/health` includes DB ping.

## Concrete demo script (for proposals)

1. Open [https://laravel-outbound-api.onrender.com/api/v1/health](https://laravel-outbound-api.onrender.com/api/v1/health).
2. `POST /api/v1/integrations/notify` with a small JSON body (see smoke script / tests).
3. `GET /api/v1/integrations/outbound-calls` → one new mock row.
4. Point at the README case study and GitHub URL.

Local: [getting-started.md](./getting-started.md) · `docker compose up --build -d` · `BASE_URL=http://localhost:8001 bash scripts/smoke.sh`.

## Who this is for / not for

| Audience | Role |
|----------|------|
| Proposal reviewers / clients | Primary — live or Docker proof of Laravel glue work |
| You + coding agents | Remember S2 intent and DoD |
| End users of a full admin product | **Not** — no admin SPA |

## Explicit non-goals

- Full admin SPA / NestJS code in this repo
- Committing real upstream production credentials
- Replacing a complete Laravel monolith sample

## Definition of done (S2)

README “Status vs S2 DoD” and [sample-card-s2.md](./sample-card-s2.md): smoke/tests green, README case study, public URL (repo + hosted API).

Japanese: [../ja/purpose.md](../ja/purpose.md)
