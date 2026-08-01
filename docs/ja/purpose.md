# このリポジトリの目的

## 一文

これは **SaaS 製品ではなく、公開ポートフォリオ用デモ** です。  
小さな **Laravel の外向き連携モジュール**（notify + 呼び出し記録 + テスト）を、クライアントが実行または公開 URL で確認できる形で示します。

## ビジネス上の目的

次のような **単発・固定報酬** の案件応募を支えるためです。

- [クラウドワークス](https://crowdworks.jp/)（Laravel/PHP スポットとの相性が主）
- [Upwork](https://www.upwork.com/)（PHP/Laravel API つなぎの募集があるとき）

想定される案件の言い方:

> 「外部 HTTP API を叩くモジュールを足す。入力検証・結果保存・テストで証明する。本番キーはリポに入れない。」

応募で見せる証拠:

| 証拠 | 場所 |
|------|------|
| ソース + ケーススタディ | この GitHub リポ + ルート `README.md` |
| 動く API | [https://laravel-outbound-api.onrender.com](https://laravel-outbound-api.onrender.com) · health `/api/v1/health` |
| 自動確認 | `scripts/smoke.sh` + Docker 上の PHPUnit |
| 調査カード | [sample-card-s2.md](./sample-card-s2.md)（id **S2**） |

戦略・調査の private バックアップ:  
`cursor-dotfiles` のポートフォリオ戦略 + 調査ラン `2026-08-01`。

## 査読者が 60 秒で分かること

1. **Notify:** `POST /api/v1/integrations/notify` で入力検証 → outbound **1 回**
2. **既定モック:** `OUTBOUND_MODE=mock` — ネットワーク無し、`mocked: true` で保存
3. **任意の実 HTTP:** `OUTBOUND_MODE=http` + `OUTBOUND_URL`（タイムアウトあり。秘密は git に入れない）
4. **監査:** `GET /api/v1/integrations/outbound-calls` で最近の呼び出しを一覧
5. **Health:** `GET /api/v1/health`（DB ping 含む）

## 応募用の具体デモ手順

1. [health](https://laravel-outbound-api.onrender.com/api/v1/health) を開く
2. `POST /api/v1/integrations/notify` に小さな JSON（smoke / テスト参照）
3. `GET /api/v1/integrations/outbound-calls` → モック行が 1 件増える
4. README のケーススタディと GitHub URL を添える

ローカル: [getting-started.md](./getting-started.md) · `docker compose up --build -d` · `BASE_URL=http://localhost:8001 bash scripts/smoke.sh`

## 誰向けか / 誰向けでないか

| 対象 | 役割 |
|------|------|
| 案件の査読者・クライアント | 主対象 — ライブまたは Docker で Laravel つなぎを証明 |
| 運用者（自分）とエージェント | S2 の意図と DoD を共有する |
| フル管理画面のエンドユーザー | **対象外** — admin SPA は無い |

## 明示的な非目標

- フル admin SPA / このリポ内の NestJS
- 本番 upstream 認証情報のコミット
- 巨大 Laravel モノリスの完全サンプル置き換え

## DoD（S2）

README の「S2 DoD」と [sample-card-s2.md](./sample-card-s2.md): smoke/テスト緑、README ケース、公開 URL（リポ + ホスト API）。

English: [../en/purpose.md](../en/purpose.md)
