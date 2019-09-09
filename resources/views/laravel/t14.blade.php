<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/tech.css') }}">
</head>
<body>
<div class="markdown"><div class="lesson-num p">Lesson14</div><h1 id="heroku">Heroku
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>ここでは、Heroku（へロク） というサービスを使って、Webサービスを公開する方法を学びましょう。</p>

<p>Heroku で Web サービスを公開するには、 Git の知識と環境変数の設定が必要です。</p>
</div></section><section id="chapter-2"><h2 class="index">2. Herokuとは
</h2><div class="subsection"><p>Heroku とは、PaaS(Platform as a Service)と呼ばれるサービスで、サーバコンピュータを提供してくれるサービスです。</p>

<ul>
  <li><a href="https://dashboard.heroku.com" target="_blank">Heroku</a></li>
</ul>

<p>このレッスンでは、Heroku が提供してくれるサーバに、メッセージボードをアップロードして、 Web サービスとして一般に公開する手順を学習します。</p>

<p>Heroku で公開したアプリケーションには、 <code>アプリケーション名.herokuapp.com</code> の FQDN が割り当てられます。</p>

<p>もう少し詳しく Heroku のことを知りたい方は、下記の青枠の中も読んでみてください。</p>

<div class="alert alert-info">
Herokuは、元々Ruby on Railsを対象とした、Amazon Web ServicesのIaaS(仮想サーバコンピュータを提供してくれるサービス)上に構築されたPaaS(Platform as a Service)です。PaaSは、開発に必要なソフトウエアが準備されたサービスのことです。デプロイには分散リポジトリのGitを利用するなど、Webアプリケーションの開発から公開まで非常に簡単にできる優れたプラットフォームです。<br>
<br>
Herokuは2010年にSalesforce.comにより買収され、Salesforce.comが掲げるソーシャルエンタープライズを実現させるために生まれました。現在ではRuby on Railsだけでなく、PHP、Java、Python、JavaScript（node.js）、Scala、Cloujureにも対応したマルチ言語なプラットフォームとなっています。<br>
<br>
また、HerokuにはWebアプリケーション、特にソーシャルアプリケーションを開発する上で必要なアドオンが多数提供されており、ソーシャルアプリケーションとの連携や動画の配信なども簡単に開発する事ができます。このようにHerokuは、アプリケーションの開発に注力できる環境を提供している点が非常に大きな魅力となっています。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Git でデプロイ
</h3><p>Heroku は Git を用いて、デプロイします。</p>

<h4>デプロイとは</h4>

<p>デプロイとは、Webアプリケーションなどをアップロードして起動し、ユーザが利用可能な状態にすることです。</p>
</div></section><section id="chapter-3"><h2 class="index">3. Heroku の料金体系
</h2><div class="subsection"><p>Heroku の料金体系を確認しておきましょう。無料(Free)プランから課金プランまであります。</p>

<ul>
  <li><a href="https://www.heroku.com/pricing" target="_blank">Pricing - Heroku</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 無料プランの機能制限
</h3><p>本レッスンでは、無料プランで進めます。</p>

<p>無料プランではいくつか機能制限があります。</p>

<ol>
  <li>アカウント毎に、アプリケーションは月に550時間までの稼働時間が割り当てられる</li>
  <li>アカウントにクレジットカードを紐付けると1000時間に増える</li>
  <li>公開しているアプリケーションに、30分間アクセスが無いと、スリープモードに移行する</li>
</ol>

<p>無料プランでも、アプリケーションをいくつも登録・起動することができます。ただし、アカウント毎に稼働時間が設定されており、アプリケーションの起動時間がそれを超えると月末まで一切起動しなくなります。</p>

<p>また、無料プランで最初にもらえるのは月550時間分ですが、クレジットカードを登録すると、月1000時間に増えます。自動的に課金されることはありませんが、有料のアドオンなどを使用すると課金されるようになります。ご注意ください。</p>

<p>30分間アクセスが無く、スリープモードに移行すると、次にアクセスされたときに再度アプリケーションを起動しなおす必要があるので、起動に時間がかかるようになります。</p>

<p>例を用いて解説します。月550時間の場合、Heroku に3つのアプリケーションを常に起動しているとして、 3 x 24 = 72 時間が毎日消費されます。また常にアクセスがあり、スリープモードに移行しないとすると、550 ÷ 72 = 7.6 日で稼働時間を消費しきってしまい、アプリケーション3つともが起動しなくなります。そして次の月に稼働時間がリセットされ、起動するようになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 有料プランは制限無し
</h3><p>有料プランであれば、機能制限は無く、常にアプリケーションを稼働させることができます。また、スリープモードもありません。</p>

<p>本格的にオリジナルサービスを導入するときは、課金した方が良いでしょう。</p>
</div></section><section id="chapter-4"><h2 class="index">4. Herokuのアカウント登録
</h2><div class="subsection"><div class="alert alert-warning">
既にHerokuアカウントを持っている場合はアカウント登録をする必要はありません。
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/heroku_top.png" alt="Herokuトップページ"><br>
<em>Herokuトップページ</em></p>

<p>Herokuを利用するためにアカウント登録を行います。<br>
Herokuのトップページにアクセスしてアカウント登録をしてください。<br>
<a href="https://heroku.com/" target="_blank">Heroku</a></p>

<p>トップページから新規アカウント登録ページに遷移します。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/heroku_top_click.png" alt="アカウント登録ページへ"><br>
<em>アカウント登録ページへ</em></p>

<p>First nameに名前、Last Nameに苗字をアルファベットで入力します。Company nameは空欄で構いません。また「Pick your primary development language」と表示されている場合は、「PHP」を選んでください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/orientation/heroku_signup_php.png" alt="Heroku新規アカウント登録ページ"><br>
<em>Heroku新規アカウント登録ページ</em></p>

<p>登録を行うと、登録したメールアドレスに確認用のメールが届きます。<br>
メールに記載されているリンクを踏んで認証を行います。<br>
認証が完了すると次はパスワード設定画面へ遷移します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/heroku_password_setting.png" alt="パスワード設定画面"><br>
<em>パスワード設定画面</em></p>

<p>パスワード設定後、ダッシュボード画面に遷移します。<br>
以上で、Herokuのアカウント作成は完了です。</p>
</div></section><section id="chapter-5"><h2 class="index">5. メッセージボードをデプロイする
</h2><div class="subsection"><p>これから、作成したメッセージボードを Heroku に、デプロイしていきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 Heroku へログイン
</h3><h4>コマンドラインツールのインストール</h4>

<p>HerokuをCloud9のターミナルから操作するためのコマンドツール(heroku-cli)をインストールします。</p>

<p>以下の事前準備を行って下さい。</p>

<pre><code>$ wget https://cli-assets.heroku.com/heroku-linux-x64.tar.gz -O heroku.tar.gz
$ sudo mkdir -p /usr/local/lib/heroku
$ sudo tar --strip-components 1 -zxvf heroku.tar.gz -C /usr/local/lib/heroku
$ sudo ln -s /usr/local/lib/heroku/bin/heroku /usr/local/bin/heroku
</code></pre>

<h4>Herokuへログインする</h4>

<p>ターミナル上で、Heroku にログインします。</p>

<pre><code>$ heroku login -i

Enter your Heroku credentials.
Email: Herokuに登録したメールアドレスを入力
Password: Herokuに登録したパスワードを入力
</code></pre>

<!--
#### エラーが出る場合

通常であれば、上記の `heroku login` でログインできるはずですが、下記のようなエラーが出てログインできない場合があります。

```
 ▸    HTTP Error: https://api.heroku.com/login 400 Bad Request
 ▸    Invalid response from API.
 ▸    HTTP 400
 ▸    {xxxxxx@xxxx xxxxxxxxxxxxxx}
 ▸    
 ▸    Are you behind a proxy?
 ▸    https://devcenter.heroku.com/articles/using-the-cli#using-an-http-proxy
```

これは、Cloud9 の heroku コマンドが古いからであり、その場合には heroku コマンドをアップデートしてあげる必要があります。下記のコマンドで heroku コマンドをアップロードしてください。

```
$ sudo apt-get update && sudo apt-get install -y heroku
```

アップロードを終えると、再度 `heroku login` でログインしてください。
-->
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 メッセージボードのプロジェクトフォルダへ移動
</h3><p>まずは、メッセージボードのプロジェクトフォルダへ移動します。メッセージボードの Git を利用するためです。</p>

<pre><code>$ cd ~/environment/message-board/
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 Heroku アプリを作成
</h3><p>ターミナルでログインすると、heroku コマンドを利用して、Herokuを操作することができます。</p>

<p>ここで、Heroku 上にアプリケーションを入れるための箱を用意します。これを Heroku アプリと呼びます。</p>

<pre><code>$ heroku create Herokuアプリ名
</code></pre>

<p>Herokuアプリ名は、他の人と重複できません。例えば、今筆者が <code>heroku create message-board</code> でHerokuアプリをを作ってしまえば、もう <code>message-board</code> という名前は使えません。</p>

<p>そのため、皆さんも独自の名前を付けてください（なお、Herokuアプリ名は、小文字、数字、<code>-</code>(ダッシュ)のみを含むことができ、先頭が文字である必要があります。大文字やアンダーバーを含めてしまうとエラーになりますのでご注意ください）。また、 <code>$ heroku create</code> だけでアプリ名を指定しないとランダムな単語の組み合わせによるアプリが作成されます。</p>

<h4>リモートリポジトリ heroku の確認</h4>

<p>Herokuアプリを作成したら、 git にリモートリポジトリとして <code>heroku</code> が作成されています。リモートリポジトリを確認してみましょう。</p>

<pre><code>$ git remote -v
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 Heroku 用設定ファイルを新規作成
</h3><p>Heroku アプリ用に <em>Procfile</em> というファイル名前のファイルを <em>message-board/</em> フォルダの直下に作成してください。ファイルの内容は下記のコードで保存してください。 <em>Procfile</em> は、どのWebサーバを使うかという指定になります。下記で Heroku の apache2 サーバを利用することを指定しています。</p>

<p><em>Procfile(タイプミスや空白不足があるとエラーになるため、正確な記述を行うためにもコピー＆ペーストを推奨)</em></p>

<pre><code>web: vendor/bin/heroku-php-apache2 public/
</code></pre>

<h4>Git のコミットを最新に</h4>

<p><em>Procfile</em> を作成したら、Git のコミットを最新にしておきます。</p>

<pre><code>$ git add .

$ git commit -m 'Procfile'
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 デプロイ
</h3><p>では、一度デプロイしてみましょう。</p>

<p>登録されたリモートリポジトリ heroku に対して、 <code>git push</code> を行うと、そのままデプロイされます。何かファイルを更新したとしても、 <code>git commit</code> してから、<code>git push heroku master</code> するだけで、とても簡単にデプロイすることが可能です。</p>

<pre><code>$ git push heroku master
</code></pre>

<p>デプロイ中は少し待つ必要があります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-6">5.6 Heroku アプリを開く
</h3><p>では、Heroku アプリを開いてみましょう。</p>

<p>下記のように自分で設定した <code>Herokuアプリ名</code> の URL にアクセスしてみてください。</p>

<pre><code>https://Herokuアプリ名.herokuapp.com/
</code></pre>

<p>たとえば Herokuアプリ名が <code>message-board-12345</code> なら、下記のようなURLになります。</p>

<pre><code>https://message-board-12345.herokuapp.com/
</code></pre>

<p>ただし、 <strong>エラーになる</strong> はずです。まだ環境変数などの設定を行っていないからです。</p>

<div class="alert alert-warning">
<code>There's nothing here, yet.</code> と表示される場合、それは環境変数などの問題ではなく、ブラウザに入力したURLに間違いがあるからです。スペルミスが無いか確認してください。また、正しい Heroku アプリの URL が、 <code>heroku apps:info</code> コマンドを実行することで確認できます。 <code>Web URL</code> のところに表示されますので、併せて確認してみてください。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-7">5.7 Heroku アプリの環境変数の設定
</h3><p>いくつか設定しなければならない環境変数があります。Cloud9 上では <em>.env</em> が環境変数の役割を担っていましたが、 <em>.env</em> は <em>.gitignore</em> によって無視ファイルとして扱われているので、Git のコミットには含まれていません。</p>

<p>また、環境変数は、その名の通り、環境の変数であるため、環境が異なる毎に設定する必要があります。</p>

<h4>APP_KEY</h4>

<p><code>APP_KEY</code> は Laravel アプリケーションのセキュリティを強化するために設定されるものです。これを最初に設定しておく必要があります。ローカル(Cloud9)でも <em>.env</em> 上に <code>APP_KEY</code> が設定されています。</p>

<pre><code>$ heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
</code></pre>

<h4>環境変数の確認方法</h4>

<p>Heroku アプリ上の環境変数を確認する方法を知っておきましょう。適宜、確認してみてください。</p>

<p>今しがた設定した <code>APP_KEY</code> が設定されているはずです。</p>

<pre><code>$ heroku config

APP_KEY: RqucDkP83PGi8dHjr7...
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-8">5.8 データベースの設定
</h3><h4>データベースの作成</h4>

<p>Heroku の標準データベースは、MySQL ではなく、PostgreSQL です。基本的なデータベースとしての違いはありません。どちらも、今まで学んだ SQL が同じく動作します。</p>

<div class="alert alert-info">
「clearDB」というオプションによりHerokuでもMySQLを利用できるので、ローカルとサーバの環境の統一化は可能です。しかし、クレジットカードの登録が必須になる・clearDBの仕様に難がある等の理由から、本カリキュラムではHeroku上のデータベースとして、標準のPostgreSQLを採用しています。
</div>

<p>Heroku では、アドオンを追加する形で、PostgreSQL のデータベースを作成します。アドオンにも、無料プランと有料プランがあり、 <code>hobby-dev</code> は PostgreSQL の唯一の無料プランです。 <code>hobby-dev</code> はお試し用のデータベースで、10000レコードまで、同時接続は20までといった制限があります。</p>

<ul>
  <li><a href="https://elements.heroku.com/addons/heroku-postgresql" target="_blank">Heroku Postgres</a></li>
</ul>

<pre><code>$ heroku addons:create heroku-postgresql:hobby-dev
</code></pre>

<p>データベースを作成したら、環境変数 <code>DATABASE_URL</code> が設定されています。</p>

<pre><code>DATABASE_URL: postgres://...
</code></pre>

<p>また、作成したデータベースは、Heroku の Web ページで確認することもできます。</p>

<ul>
  <li><a href="https://data.heroku.com/" target="_blank">Datastores</a></li>
</ul>

<h4>環境変数を設定</h4>

<p><em>.env</em> に設定したように、他にもデータベース用に環境変数を設定しなければいけません。</p>

<pre><code>$ heroku config
</code></pre>

<p>上記を実行した結果の <code>DATABASE_URL</code> は、下記のような形になっています。</p>

<pre><code>postgres://ユーザ名:パスワード@ホスト名:5432/データベース名
</code></pre>

<p>これがそのまま環境変数となりますので、 この内容をコピーして以下のコマンドで一項目づつ登録します。</p>

<pre><code>$ heroku config:set 項目名＝設定値
</code></pre>

<p>再度 <code>heroku config</code> を実行して下記となるように確認してください。</p>

<pre><code>DATABASE_URL=postgres://ユーザ名:パスワード@ホスト名:5432/データベース名
DB_CONNECTION=pgsql
DB_USERNAME=ユーザ名
DB_PASSWORD=パスワード
DB_HOST=ホスト名
DB_DATABASE=データベース名
</code></pre>

<p>Heroku アプリの環境変数の設定は、下記のコマンド例のようになります。これで1つずつ上記のように設定してください。</p>

<pre><code>$ heroku config:set DB_CONNECTION=pgsql
</code></pre>

<p>ちなみに <code>pgsql</code> になるのは、 <em>config/database.php</em> に <code>'default' =&gt; env('DB_CONNECTION', 'mysql'),</code> とあり、その下にある <code>'connections' =&gt; [...]</code> の中で <code>'pgsql' =&gt; [...]</code> と定義されているからで、その <code>'pgsql'</code> の設定を指定してます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-9">5.9 マイグレーション
</h3><p><code>heroku run コマンド</code> で Heroku アプリ上でコマンドを実行することができます。先ほどまでの設定ができていれば、エラーなくマイグレーションが成功するでしょう。</p>

<p>なお、途中、<code>Do you really wish to run this command? (yes/no) [no]: &gt;</code> で止まった際は <code>yes</code> を入力してください。</p>

<pre><code>$ heroku run php artisan migrate

Running php artisan migrate on ⬢ laravel-message-board... up, run.1835 (Free)
**************************************
*     Application In Production!     *
**************************************

 Do you really wish to run this command? (yes/no) [no]:
 &gt; yes

Migration table created successfully.
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-10">5.10 動作確認
</h3><p>環境変数を設定し、マイグレーションを行ったので、ようやく正常に動くはずです。</p>

<p>もう一度下記のような URL で Heroku アプリを開いてみてください。</p>

<pre><code>https://Herokuアプリ名.herokuapp.com/
</code></pre>

<p>エラーが出ずに表示されれば、デプロイ成功です。</p>

<p>エラーが出た場合には、まずは対応した環境変数が設定されているか <code>heroku config</code> で確認してみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-11">5.11 Heroku でエラーログ参照
</h3><p>Heroku でエラーページが出たとしても “something went wrong.” （「何かが変だ」）と出るだけで、全くあてになりません。</p>

<pre><code>$ heroku logs
</code></pre>

<p>とコマンドを打てば、Laravel アプリケーションのログが参照できるのですが、実はエラーログが溜まっていません。</p>

<p>エラーログの設定が下記のようになっています。</p>

<p><em>config/app.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="string"><span class="delimiter">'</span><span class="content">log</span><span class="delimiter">'</span></span> =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">APP_LOG</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">single</span><span class="delimiter">'</span></span>),
</pre></div>
</div>
</div>

<p>したがって、環境変数 <code>APP_LOG</code> を <code>errorlog</code> とすれば良いです。</p>

<pre><code>$ heroku config:set APP_LOG=errorlog
</code></pre>

<ul>
  <li><a href="https://devcenter.heroku.com/articles/getting-started-with-laravel#changing-the-log-destination-for-production" target="_blank">errorlog</a></li>
</ul>

<p>この設定を行うと、以降はエラーログが溜まっていきますので、 <code>heroku logs</code> でエラーログを確認することができます。</p>

<p>また、リアルタイムでログを確認したい場合には、下記の通り <code>--tail</code> オプションをつけてください。</p>

<pre><code>$ heroku logs --tail
</code></pre>

<p>エラーが発生すると、一度に70行ほどログが追加されますが、我慢して活用してください。</p>

<p><strong>（補足）エラー内容を画面に表示する</strong></p>

<p>エラーの詳細をブラウザへ表示されたい場合は下記環境変数の変更を行ってみてください。</p>

<pre><code>$ heroku config:set APP_DEBUG=true
</code></pre>

<p>ただし、本番環境として公開したい場合は、エラーの詳細をブラウザに表示しない方が良いでしょう。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-deploy">課題：タスク管理アプリをデプロイする</h3><p>メッセージボードのレッスンで作成した「タスク管理アプリ」をデプロイしてください。「課題の提出」をする際は、HerokuのURLを記入して、提出しましょう。</p>

<p>なお、<strong>必ず <span style="color: #f00;">デプロイ前に開発環境（Cloud9）にて</span> ページ遷移やタスク追加など全ての部分でエラーが発生しないか確認してください。確認が完了して、問題が無いアプリをデプロイするようにしましょう。</strong></p>

<div class="alert alert-danger">
エラーの残っている状態でデプロイするのはセキュリティの観点から非常に危険です。
</div>

<p>以下のチェックリストも参考にしましょう。</p>

<ul>
  <li>動作確認をしたエラーが出ないものをGitHubにpushしたか確認する</li>
  <li>Herokuで一通りエラーが出ないか動作確認する</li>
  <li>Herokuには必要データを用意する</li>
</ul>
</div></section><section id="chapter-6"><h2 class="index">6. まとめ
</h2><div class="subsection"><p>Heroku を利用すると、簡単に Web サービスを公開することができます。</p>

<p>オリジナルサービスでも Git でバージョン管理を行い、Heroku で公開することをお勧めします。</p>
</div></section></div>
</body>
</html>