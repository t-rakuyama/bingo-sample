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

# こだわり
- controllerに処理をなるべく持たせないようにドメインを意識した
- 極力慣れていない環境を使って実装をおこなった `Vite` や実は `Laravel`も
- 斜めビンゴの処理は少し綺麗な気がする


# 反省点
- 取り掛かりが遅い
- テストカバレッジ0
- view側の悲惨さ
- DB構成も微妙

# 所感
- Laravel色々機能があるけど、ありすぎて焦った。。。が最低限は動かせるようになったカモ
- ビンゴだとどの情報をテーブルに持たせるか悩ましい
