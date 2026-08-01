```yaml
id: S2
target_layer: A
job_pattern: "スポット / 小規模 Laravel: 既存アプリ形に outbound API 連携モジュールを足し、テストと README ケースを揃える。"
stack:
  - Laravel  # ADR 0001
  - PHP
  - PostgreSQL 16
  - PHPUnit
demo_steps:
  - "docker compose up --build -d"
  - "bash scripts/smoke.sh"
  - "POST /api/v1/integrations/notify → mock outbound 記録"
dod:
  - smoke/tests 緑
  - README ケース
  - 公開 URL 一式
non_goals:
  - フル管理 SPA
  - 同一リポに NestJS
stale_after_days: 90
existing_asset:
  path: null
  plan: none
```

調査ラン（private）: cursor-dotfiles `docs/ja/research-runs/2026-08-01.md`  
English: [../en/sample-card-s2.md](../en/sample-card-s2.md)
