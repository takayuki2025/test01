# アプリケーション名：お問い合わせフォーム
# 環境構築
Dockerビルド
<br>
<br>
　1\. git cloneリンク git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
<br>
　2\. docker-compose up -d --build
<br>
<br>
　＊MySqlは、OSによって起動しない場合があるのでそれぞれのPCに合わせて、docker-compose.ymlファイルを編集
<br>してください。
  <br>
  <br>
laravel環境構築
<br>
<br>
　1\. docker-compose exec php bash
<br>
　2\. composer install
<br>
　3\. env.exampleファイルから.envを作成し、環境変数を変更
<br>
　4\. アプリケーションキーの作成<br>
　　php artisan key:generate
<br>
　5\. マイグレーションの実行<br>
　　php artisan migrate
<br>
　6\. シーディングの実行<br>
　　php artisan db:seed
<br>

# 伝えること<br>
 - ビューのレイアウトがあまり良くないのですがすみません。<br>
 共通部分のレイアウト化も多用できるようにして徐々に上手く作れるようにと思います。<br>
<br>

# 修正履歴<br>
- 2025/08/23 14:20 修正内容<br>
  ER図の修正<br><br>
- 2025/08/24 10:00 修正内容<br>
  検索機能等の実装完了<br>
  『エクスポート』ボタンで全体の情報取得のみ実装完了（検索を絞り込んだ状態で『エクスポート』は未完了）<br><br>
- 2025/08/26 22:30 修正内容<br>
  モーダルウィンドウ実装完了<br><br>
- 2025/08/28 22:00 修正内容<br>
  全体、検索を絞り込んだ状態で『エクスポート』の実装完了<br>
  ER図の修正<br>
  READMEの修正<br>
  ContactFactory.phpファイルのみPHPメモリー制限512Mに設定<br><br>

# ER図<br>
<img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/0b04b27b-0794-4b88-b971-a41fd52a7233" />

# 使用技術<br>
  - PHP 8.1
  - Laravel 10.0
  - MySql 8.3
<br>

# URL<br>
  - 開発環境： http://localhost/
  - phpMyAdmin:http://localhost:8080/
