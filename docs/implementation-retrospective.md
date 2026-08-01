# 実装反省会ログ

コード実装後の振り返りを蓄積する。エージェントは `.cursor/rules/implementation-retrospective.mdc` に従い **新しいエントリを先頭に追記** する。

再発防止に効く改善は `.cursor/rules/*.mdc` へ反映する（本ログに「→ ルール更新: xxx」と書く）。

---

## テンプレート（コピー用）

```markdown
### YYYY-MM-DD — （変更概要 1 行）

- **変更**: （ファイル / 機能）
- **良かった点**:
- **改善点**:
- **ルール更新**: 無 / `implementation-core.mdc` §…
- **次回テスト**: Component / integration / system のどれを足すか
```

---

<!-- 以下、新しいエントリをこの行の上に追加 -->

### 2026-08-01 — S2 公開 API（Render）と DoD クローズ

- **変更**: Laravel outbound mock API · Docker Compose · Render Blueprint · README DoD Yes
- **根拠**:
  - ホスト `GET /api/v1/health` → `database: up`
  - `BASE_URL=https://laravel-outbound-api.onrender.com` で `scripts/smoke.sh` 成功（notify + outbound list）
  - GitHub: https://github.com/hrn-dev-work/laravel-outbound-api
- **良かった点**: 無料 Postgres 1枠制約を把握し S1 DB と入れ替えてデプロイ
- **改善点**: イメージ内 `.env` / sqlite ファイルが HTTP 側の DB 接続を狂わせた → start で削除する運用に固定
- **ルール更新**: 無（S1 の atomic DoD / publish 除外を再利用）
- **次回テスト**: ホスト再デプロイ後は必ず smoke；無料 DB 入れ替え時は他サンプルの health も確認
