# 環境構築
- リポジトリをclone
- `docker compose up -d --build`で環境を立ち上げる
- `docker compose exec bingo-app bash`アプリケーションコンテナに入り `npm run dev`を実行
- http://localhost/ にアクセス

# ざっくり仕様
topページにアクセス時
- DBのレコード全削除(絶対良くない)

topから/gameへpost時
- user, cardのレコード登録
- 1 - 75の番号を作成し、sessionで保持

カードを引いた時の挙動
- '/game'のpostで受け取り
- 番号を引きcardの`isHit`を更新
- getにredirect

