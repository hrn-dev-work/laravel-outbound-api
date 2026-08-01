```yaml
id: S2
target_layer: A
job_pattern: "Spot or small fixed-price Laravel work: add an outbound API integration module to an existing app shape, with tests and a clear README case study."
stack:
  - Laravel  # ADR 0001
  - PHP
  - PostgreSQL 16
  - PHPUnit
demo_steps:
  - "docker compose up --build -d"
  - "bash scripts/smoke.sh"
  - "POST /api/v1/integrations/notify → outbound mock recorded"
dod:
  - smoke/tests green
  - README case study
  - public URL set (repo + optional API host + offer blurb)
non_goals:
  - Full admin SPA
  - NestJS code in same repo
stale_after_days: 90
existing_asset:
  path: null
  plan: none
```

Source research run (private): cursor-dotfiles `docs/en/research-runs/2026-08-01.md`  
Japanese: [../ja/sample-card-s2.md](../ja/sample-card-s2.md)
