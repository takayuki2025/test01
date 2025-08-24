# お問い合わせフォーム
# 環境構築
Dockerビルド
<br>
<br>
　1\. git cloneリンク git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
<br>
　2\. docker-compose up -d --build
<br>
<br>
　＊MySqlは、OSによって起動しない場合があるのでそれぞれのPCに合わせて、docker-compose.ymlファイルを編<br>
  集してください。
  <br>
  <br>
laravel環境構築
<br>
<br>
　1\. git cloneリンク git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
<br>
　2\. docker-compose up -d --build
<br>
　3\. .env.exampleファイルから.envを作成し、環境変数を変更
<br>
　4\. php artisan key:generate
<br>
　5\. php artisan migrate:fresh
<br>
　6\. php artisan db:seed
<br>


# 伝えること<br>
 - ER図はsrcディレクトリの下の,test01.drawioファイルに入っています。<br>
 （リレーションの繋ぎ目の書き方がわかりませんでした。）
 - ビューのレイアウトがあまり良くないのですがすみません。
 共通部分のレイアウト化も多用できるようにして徐々に上手く作れるようにと思います。<br>
 - モーダルウィンドウ表示とCSV形式のエクスポート（全体のエクスポートはできました。）も途中までしかできませんでした。<br>
 - Contact,Confirm,thanks Page,<br>Admin Pageの検索機能等大幅に修正しました。<br>




- 修正しました。　　　　ER図の掲載の仕方は調べましたら貼り付けるようなのでここに貼り付けておきます。
![Image](https://github.com/user-attachments/assets/abacfbdd-3b45-4c04-b5b9-594b445c6a26)


# 使用技術<br>
  - PHP 8.1
  - Laravel 10.0
  - MySql 8.3
<br>

# URL<br>
  - 開発環境： http://localhost/
  - phpMyAdmin:http://localhost:8080/
