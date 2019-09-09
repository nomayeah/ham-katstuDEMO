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
<div class="markdown"><div class="lesson-num p">Lesson15</div><h1 id="twitter-clone">Twitter クローン
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>メッセージボードでは、リソースの CRUD 操作を <code>Route::resource()</code> によって生成される7つの RESTful な 基本アクションで行い、その構造に沿って Model, Router, Controller, View の基礎を学びました。</p>

<p>ここからはそれを前提に更に高度な機能を開発していきます。具体的には、ログイン認証や、ユーザのフォロー／フォロワー、お気に入り機能です。</p>

<p>このレッスンを完了すれば、自分でイメージしているものを作ることができるようになるでしょう。しかし、このレッスンはメッセージボードよりも難しい内容になります。1つ1つ納得しながら進むようにしましょう。以前の内容を忘れてしまっていると感じた場合には、何度も戻って復習するようにしてください。</p>

<p>また、ここからは、既出の内容については詳しく言及しないことがあります。つまり、例えば <code>php artisan tinker</code> で tinker を起動しようとか、 <code>php artisan serve --host=$IP --port=$PORT</code> でサーバを起動しよう、といった書き方をしていない、という意味です。既に学んだものは皆さん自身でコードをしっかり読むようにしてください。</p>
</div></section><section id="chapter-2"><h2 class="index">2. 今回作成するWebアプリケーション
</h2><div class="subsection"><p>今回作成する Web アプリケーションは Twitter のクローンになります。名前は Microposts にします。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 デモサイト
</h3><p>下記に完成した Microposts の一例となるデモサイトを公開しています。ユーザ登録（Signup）して、投稿したり、削除したりしてみてください。今回作成するアプリケーションは小さいので、すぐに全体像が把握できると思います。（ただし、皆さんが作成したユーザやメッセージは予告無く削除されることがあります。）</p>

<ul>
  <li><a href="http://laravel-microposts.herokuapp.com/" target="_blank">Microposts デモサイト</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 機能一覧
</h3><ul>
  <li>ユーザ登録／ログイン認証機能</li>
  <li>ツイート(Micropost)の一覧表示</li>
  <li>フォロー／フォロワー機能</li>
  <li>お気に入り機能（提出課題）</li>
</ul>
</div></section><section id="chapter-3"><h2 class="index">3. プロジェクトの開始
</h2><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 プロジェクトの作成
</h3><p>最初に、念のためメモリの開放をしておきましょう。</p>

<div class="language-sh highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>$ sudo sh -c "echo 3 &gt; /proc/sys/vm/drop_caches"
</pre></div>
</div>
</div>

<p>次に、composer で Laravel プロジェクトを作成します。プロジェクト名は Microposts です。プロジェクト作成時はカレントディレクトリ（ <code>pwd</code> で表示される現在フォルダ）には気をつけてください。</p>

<pre><code>$ cd ~/environment/
$ composer create-project laravel/laravel ./microposts "5.5.*" --prefer-dist
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 動作確認
</h3><p>作成できた <em>microposts</em> のディレクトリへ移動し、Laravelのアプリケーションを起動して <em>welcome</em> ページが表示されるか確認しておいてください。 <em>welcome.blade.php</em> が読み込まれ「Laravel」が表示されていれば大丈夫です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 Git
</h3><p>Git でバージョン管理を開始しておきましょう。カレントディレクトリ（現在フォルダ）が <em>microposts</em> にいるか、気をつけて確認してください。</p>

<pre><code>$ git init

$ git add .

$ git commit -m 'init'
</code></pre>
</div></section><section id="chapter-4"><h2 class="index">4. データベースと接続
</h2><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 .env の修正
</h3><p><em>.env</em> を修正して、データベース設定に関する環境変数を変更します。</p>

<p><em>.env</em></p>

<pre><code>DB_DATABASE=microposts
DB_USERNAME=root
DB_PASSWORD=
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 データベースの作成
</h3><p><code>DB_DATABASE=microposts</code> と環境変数を設定したので、 <code>microposts</code> データベースを作成します。</p>

<pre><code>$ mysql -u root

mysql&gt; CREATE DATABASE microposts;

mysql&gt; exit
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 tinker で接続確認
</h3><p>tinker を起動し、データベースの接続を確認します。 <code>DB::connection()</code> でエラーが出なければ問題なく接続できています。</p>

<pre><code>$ php artisan tinker

&gt;&gt;&gt; DB::connection()
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 タイムゾーンと言語設定
</h3><h4>タイムゾーンの設定</h4>

<p>タイムゾーンの設定をしておけば、 Model からレコードを保存したときなどにおいて、設定したタイムゾーンの時間情報が日時型のカラム (<code>created_at</code> 等) に保存されます。</p>

<p><em>config/app.php timezone抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="string"><span class="delimiter">'</span><span class="content">timezone</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>,
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-4-5">4.5 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'set timezone'
</code></pre>
</div></section><section id="chapter-5"><h2 class="index">5. トップページ
</h2><div class="subsection"><p>ログイン前のトップページには Model 操作はありませんので View のみを作成していきます。共通で利用するレイアウトやエラーメッセージなども実装しておきましょう。トップページは <em>welcome.blade.php</em> をそのまま修正していきましょう。</p>

<p>なお、動作確認は各自のタイミングで行ってください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 Model
</h3><p>トップページ専用のモデルを用意する必要はありません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 Router
</h3><p><code>/</code> にアクセスしたとき、下記のようにルーティングが設定されているので、そのまま <em>welcome.blade.php</em> を編集していきます。</p>

<p><em>routes/web.php（抜粋・追記や変更は不要）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> () {
    <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 トップページ
</h3><h4>Controller</h4>

<p>Router での指定の通り、トップページでは Controller は使用しません。</p>

<h4>View</h4>

<h5>共通レイアウト</h5>

<p><em>resources/views/layouts/app.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="utf-8"&gt;
        &lt;title&gt;Microposts&lt;/title&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"&gt;
        &lt;link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"&gt;
    &lt;/head&gt;

    &lt;body&gt;

        @include('commons.navbar')
        
        &lt;div class="container"&gt;
            @include('commons.error_messages')
            
            @yield('content')
        &lt;/div&gt;
        
        &lt;script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"&gt;&lt;/script&gt;
        &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"&gt;&lt;/script&gt;
        &lt;script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"&gt;&lt;/script&gt;
        &lt;script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"&gt;&lt;/script&gt;
    &lt;/body&gt;
&lt;/html&gt;
</pre></div>
</div>
</div>

<h5>エラーメッセージ</h5>

<p><em>resources/views/commons/error_messages.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@if (count($errors) &gt; 0)
    &lt;ul class="alert alert-danger" role="alert"&gt;
        @foreach ($errors-&gt;all() as $error)
            &lt;li class="ml-4"&gt;{{ $error }}&lt;/li&gt;
        @endforeach
    &lt;/ul&gt;
@endif
</pre></div>
</div>
</div>

<h5>ナビバー</h5>

<p><em>resources/views/commons/navbar.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;header class="mb-4"&gt;
    &lt;nav class="navbar navbar-expand-sm navbar-dark bg-dark"&gt; 
        &lt;a class="navbar-brand" href="/"&gt;Microposts&lt;/a&gt;
         
        &lt;button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar"&gt;
            &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
        &lt;/button&gt;
        
        &lt;div class="collapse navbar-collapse" id="nav-bar"&gt;
            &lt;ul class="navbar-nav mr-auto"&gt;&lt;/ul&gt;
            &lt;ul class="navbar-nav"&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Signup&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Login&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/nav&gt;
&lt;/header&gt;
</pre></div>
</div>
</div>

<h5>トップページ</h5>

<p><em>welcome.blade.php</em> に予め書かれていたものは不要なので全て削除して、下記の通りにしてください。</p>

<p><em>resources/views/welcome.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="center jumbotron"&gt;
        &lt;div class="text-center"&gt;
            &lt;h1&gt;Welcome to the Microposts&lt;/h1&gt;
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<p>これでトップページの表示は完成です。動作確認もしておいてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'top page'
</code></pre>
</div></section><section id="chapter-6"><h2 class="index">6. ユーザ登録機能
</h2><div class="subsection"><p>次に、ユーザ登録機能を作成していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 Model
</h3><h4>テーブル設計前の初期設定</h4>

<p>app/Providers/AppServiceProvider.php</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">boot</span>()
    {
        <span class="comment">//</span>
    }
</pre></div>
</div>
</div>

<p>上記のbootメソッドの中身を以下の内容に変更しましょう。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">boot</span>()
    {
        \<span class="constant">Schema</span>::defaultStringLength(<span class="integer">191</span>);
    }
</pre></div>
</div>
</div>

<p>これでテーブル設計のための初期設定は完了です。</p>

<h4>ユーザテーブルの設計</h4>

<p>ユーザ登録機能なので、 User モデルを作成していきます。まずは microposts データベースに users テーブルを作りましょう。</p>

<h5>ユーザテーブル設計のマイグレーションファイル</h5>

<p>実は Laravel がユーザテーブル作成のためのマイグレーションファイルを予め用意してくれています。中身を確認して作成される users テーブルを把握しておきましょう。</p>

<p><em>2014_10_12_000000_create_users_table.php の up() と down()</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">up</span>()
    {
        <span class="constant">Schema</span>::create(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;increments(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">string</span>(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">string</span>(<span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span>)-&gt;unique();
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">string</span>(<span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>, <span class="integer">60</span>);
            <span class="local-variable">$table</span>-&gt;rememberToken();
            <span class="local-variable">$table</span>-&gt;timestamps();
        });
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">down</span>()
    {
        <span class="constant">Schema</span>::dropIfExists(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>);
    }
}
</pre></div>
</div>
</div>

<p>users テーブルには、 id, name, email, password などのカラムが作成されます。</p>

<h5>マイグレーションの実行</h5>

<p>では、マイグレーションを実行して、 users テーブルを作成することにします。</p>

<pre><code>$ php artisan migrate

Migration table created successfully.
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table
</code></pre>

<p>ユーザテーブル以外にもパスワードリセット用のマイグレーションファイルが予め作成されており、このときにパスワードリセット用のテーブルも作成されます。パスワードリセットについては学びませんので、詳しく知りたい方は<a href="https://readouble.com/laravel/5.5/ja/authentication.html" target="_blank">認証 - Laravel 5.5</a>のパスワードリセットの項目をご覧ください。</p>

<p>MySQL 側でテーブルの内容を <code>describe users;</code> で確認しておくのも良いでしょう。</p>

<h4>User モデルの確認</h4>

<p>こちらも Laravel プロジェクトを作成した時点で用意されています。</p>

<p><em>app/User.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">User</span> <span class="keyword">extends</span> <span class="constant">Authenticatable</span>
{
    <span class="keyword">use</span> <span class="constant">Notifiable</span>;

    <span class="comment">/**
     * The attributes that are mass assignable.
     *
     * @var array
     */</span>
    <span class="keyword">protected</span> <span class="local-variable">$fillable</span> = [
        <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>,
    ];

    <span class="comment">/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */</span>
    <span class="keyword">protected</span> <span class="local-variable">$hidden</span> = [
        <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">remember_token</span><span class="delimiter">'</span></span>,
    ];
}
</pre></div>
</div>
</div>

<p><code>$fillable</code> と <code>$hidden</code> という配列が書かれています。</p>

<h5>$fillable</h5>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">protected</span> <span class="local-variable">$fillable</span> = [
        <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>,
    ];
</pre></div>
</div>
</div>

<p>後ほど、ユーザの作成に <code>create()</code> という関数を使います。<code>create()</code> は <code>save()</code> と同じくデータベースに INSERT を発行する関数です。</p>

<p><code>create()</code> は <code>save()</code> のようにインスタンスを作成する必要がなく、データを代入してそのままユーザを作成することができます。ここで <code>save()</code> について、おさらいしましょう。 <code>save()</code> では、1つずつ、データを代入し保存するしかありませんでした。例えば、下記のようにです。</p>

<p><em>例（記述不要です）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$user</span> = <span class="keyword">new</span> <span class="constant">User</span>;
<span class="local-variable">$user</span>-&gt;name = <span class="local-variable">$request</span>-&gt;name;
<span class="local-variable">$user</span>-&gt;email = <span class="local-variable">$request</span>-&gt;email;
<span class="local-variable">$user</span>-&gt;password = bcrypt(<span class="local-variable">$request</span>-&gt;password);
<span class="local-variable">$user</span>-&gt;save();
</pre></div>
</div>
</div>

<p>こうしなければいけなかったのは、想定していないパラメータに知らぬ間にデータが代入されて保存されるのを防ぐためです。<code>create()</code> は一気にデータを代入することができますが、全ての項目がデフォルトで「一気に保存可能」になっていると、変なデータが勝手に保存される可能性があります。セキュリティ上、良いことではありません。</p>

<p>そこで通常は、全てのカラムをデフォルトでは「一気に保存不可」とし、<code>$fillable</code> で「一気に保存可能」なパラメータを指定することで、想定していないパラメータへのデータ代入を防ぎ、なおかつ、一気にデータを代入することが可能になります。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">User</span>::create([
            <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$data</span>[<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>],
            <span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$data</span>[<span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span>],
            <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span> =&gt; bcrypt(<span class="local-variable">$data</span>[<span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>]),
        ]);
</pre></div>
</div>
</div>

<p><code>create()</code> を使ってデータを保存するときには、その Model ファイルの中に <code>$fillable</code> を定義し、<code>create()</code> で保存可能なパラメータを配列として代入しておく必要があることを覚えておいてください。</p>

<h5>$hidden</h5>

<p>パスワードなど秘匿しておきたいカラムをモデルのコーディングで <code>$hidden</code> に指定しておくと、見られないように隠してくれます。例えば、 tinker で <code>User::first()</code> で取得したときに、 Userモデルのコーディングで <code>$hidden = ['password']</code> と代入されていると、<code>password</code> は表示されません。ただし、 <code>User::first()-&gt;password</code> と明示すれば表示されます。</p>

<h5>（補足）$table</h5>

<p>今回は必要ありませんが <code>$table</code> という変数も指定できます。</p>

<p>モデルと接続されるテーブル名は、モデル名によって決められます。例えば、 Message モデルは messages テーブルと自動的に接続されます。この規則を破って独自のモデル名を付けたい場合に、 <code>$table</code> を使用します。例えば、 Message モデルだけど、 msg テーブルを使いたいとなれば <code>$table = 'msg'</code> とすれば接続されます。</p>

<p>今回は User モデルに対して <code>$table = 'users'</code> で、規則通りなので省略されています。</p>

<h5>（補足）bcrypt()</h5>

<p>まだ利用していませんが <code>bcrypt()</code> についても、ここで触れておきます。</p>

<p><code>bcrypt()</code> は暗号化する関数です。セキュリティの観点から、パスワードは暗号化してからデータベースに保存すべきで、パスワードを平文（そのまま）保存すべきではありません。パスワードは必ず暗号化しましょう。</p>

<p>tinker を起動してどんな暗号化が行われるか確認してください。</p>

<pre><code>&gt;&gt;&gt; $test = bcrypt('test')
=&gt; "$2y$10$pyPEl29CHG87uJJbq5I8h.396UgdDi4MHD4wktFvPnlyIuzraZ6Zy"
</code></pre>

<p><code>'test'</code> を暗号化すれば、 <code>"$2y$10$pyPEl29CHG87uJJbq5I8h.396UgdDi4MHD4wktFvPnlyIuzraZ6Zy"</code> となりました。</p>

<p>実は <code>$test = bcrypt('test')</code> を何度も実行するとわかりますが、暗号化された暗号文も一定ではなく変化します。</p>

<p>しかし、下記のように、 <code>Hash::check()</code> を利用すると「<code>test</code> という文字列を暗号化したものかどうか」を判定することができます。</p>

<pre><code>&gt;&gt;&gt; $test = bcrypt('test')

&gt;&gt;&gt; Hash::check('test', $test)
=&gt; true

&gt;&gt;&gt; Hash::check('test1', $test)
=&gt; false
</code></pre>

<p>詳しく学びませんが、ログイン認証時には内部で <code>Hash::check()</code> が呼び出され、入力されたログインパスワードと暗号化されたパスワードが一致しているか確認しています。</p>

<p>これで、ユーザ登録時のパスワードを、暗号化してからデータベースに保存することでき、更に、ログイン時にもパスワードの一致を確認することができます。</p>

<h4>試しに tinker でユーザを作成してみる</h4>

<pre><code>&gt;&gt;&gt; use App\User

&gt;&gt;&gt; User::all()
=&gt; Illuminate\Database\Eloquent\Collection {#686
     all: [],
   }

&gt;&gt;&gt; User::create([
... 'name' =&gt; 'test',
... 'email' =&gt; 'test@test.com',
... 'password' =&gt; bcrypt('test') ])

&gt;&gt;&gt; User::all()
=&gt; Illuminate\Database\Eloquent\Collection {#690
     all: [
       App\User {#691
         id: 1,
         name: "test",
         email: "test@test.com",
         created_at: "2016-12-02 04:17:19",
         updated_at: "2016-12-02 04:17:19",
       },
     ],
   }
</code></pre>

<p>最後の <code>all()</code> の結果を見ると、 <code>password</code> が表示されていません。これは Model ファイル側のコードで <code>$hidden</code> として設定されているからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 Router
</h3><p>ユーザを登録するための Controller も予め用意されています。 <em>app/Http/Controllers/Auth/RegisterController.php</em> です。これについては次で解説します。</p>

<p>ここでは、ルーティングを下記のように設定してください。</p>

<p><em>routes/web.php ユーザ登録のルーティング追加</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ユーザ登録</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">signup</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\R</span><span class="content">egisterController@showRegistrationForm</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">signup.get</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">signup</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\R</span><span class="content">egisterController@register</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">signup.post</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>-&gt;name() はこのルーティングに名前を付けているだけです。後ほど、 Form や link_to_route() で使用することになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 RegisterController@showRegistrationForm, register
</h3><h4>RegisterController</h4>

<p>では RegisterController を見ていきます。</p>

<p><em>app/Http/Controllers/Auth/RegisterController.php 一部コメントや namespace など省略</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">RegisterController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{
    <span class="comment">/*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */</span>

    <span class="keyword">use</span> <span class="constant">RegistersUsers</span>;

    <span class="keyword">protected</span> <span class="local-variable">$redirectTo</span> = <span class="string"><span class="delimiter">'</span><span class="content">/home</span><span class="delimiter">'</span></span>;

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">__construct</span>()
    {
        <span class="local-variable">$this</span>-&gt;middleware(<span class="string"><span class="delimiter">'</span><span class="content">guest</span><span class="delimiter">'</span></span>);
    }

    <span class="keyword">protected</span> <span class="keyword">function</span> <span class="function">validator</span>(<span class="predefined">array</span> <span class="local-variable">$data</span>)
    {
        <span class="keyword">return</span> <span class="constant">Validator</span>::make(<span class="local-variable">$data</span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|string|max:191</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|string|email|max:191|unique:users</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|string|min:6|confirmed</span><span class="delimiter">'</span></span>,
        ]);
    }

    <span class="keyword">protected</span> <span class="keyword">function</span> <span class="function">create</span>(<span class="predefined">array</span> <span class="local-variable">$data</span>)
    {
        <span class="keyword">return</span> <span class="constant">User</span>::create([
            <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$data</span>[<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>],
            <span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$data</span>[<span class="string"><span class="delimiter">'</span><span class="content">email</span><span class="delimiter">'</span></span>],
            <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span> =&gt; bcrypt(<span class="local-variable">$data</span>[<span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>]),
        ]);
    }
}
</pre></div>
</div>
</div>

<p>RegisterController は最初のコメントにあるように <code>Register Controller</code> で、ユーザ登録のための Controller です。以下、RegisterControllerに関して、いくつか補足説明をします。</p>

<h5>RegistersUsers トレイト</h5>

<p>Router で下記のように定義したのに、 <code>showRegistrationForm</code> アクションと <code>register</code> アクションはどこだと疑問に思うかもしれません。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">signup</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\R</span><span class="content">egisterController@showRegistrationForm</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">signup.get</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">signup</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\R</span><span class="content">egisterController@register</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">signup.post</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>RegisterController では特別に <code>use RegistersUsers;</code> という記述があることが確認できると思います。これによって、上記2つのアクションをそのまま取り込んでいるのです。</p>

<p><code>RegisterUsers</code> は <strong>トレイト</strong> です。トレイトについておさらいすると、単にいくつかの機能（メソッド）をまとめているだけのものです。そして <code>use [トレイト名];</code> によって、まとめた機能をそのまま取り込めます。 <code>RegistersUsers</code> を取り込んだ RegisterController は、 <code>RegistersUsers</code> で定義されているメソッドをそのまま取り込むことができます。（ <a href="http://php.net/manual/ja/language.oop5.traits.php" target="_blank">参考: トレイトとは</a> ）</p>

<p>実際、 <a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RegistersUsers.php" target="_blank">RegistersUsers トレイトのソースコード</a>を見てみると、確かに <code>showRegistrationForm()</code> と <code>register()</code> が定義されていることが確認できます。</p>

<h5>middleware() について</h5>

<p>Contoller の <code>__construct()</code> でミドルウェア(middleware)を設定することができます。 Laravel におけるミドルウェアは <strong>Controller にアクセスする前に事前に確認される条件</strong> であると思ってください。例えば、RegisterControllerでは、</p>

<p><em>app/Http/Controllers/Auth/RegisterController.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="local-variable">$this</span>-&gt;middleware(<span class="string"><span class="delimiter">'</span><span class="content">guest</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>また、次のチャプターで扱う LoginController では、</p>

<p><em>app/Http/Controllers/Auth/LoginController.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="local-variable">$this</span>-&gt;middleware(<span class="string"><span class="delimiter">'</span><span class="content">guest</span><span class="delimiter">'</span></span>)-&gt;except(<span class="string"><span class="delimiter">'</span><span class="content">logout</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>このようになっています。後者のコードで話を進めると、これは「<code>logout</code> アクション以外では <code>guest</code> である必要がある」という条件を持ったミドルウェアが設定されていることになります。 <code>guest</code> とは、ログイン認証されていない閲覧者のことです。つまり「 <code>logout</code> アクション以外ではログイン認証されていないことが必要」という条件です。これを満たさないときは、特定の場所へ自動で飛ばされます。自動的に別のページへ飛ばすことを <strong>リダイレクト</strong> といい、リダイレクトで飛ばしたい場所が リダイレクト先 です。</p>

<h5>ユーザ登録直後のリダイレクト先の設定</h5>

<p>ユーザ登録が完了すると、ログイン状態になった上で、指定のリダイレクト先へ飛ぶようになっています。</p>

<ul>
  <li><a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RegistersUsers.php#L29" target="_blank">RegistersUsers@register</a></li>
  <li><a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RedirectsUsers.php#L18" target="_blank">RedirectsUsers@redirectPath</a></li>
</ul>

<p>そのリダイレクト先は <code>$redirectTo</code> 変数に設定します。RegisterController の中に記述された <code>$redirectTo</code> を確認してください。</p>

<p><em>app/Http/Controllers/Auth/RegisterController.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">protected</span> <span class="local-variable">$redirectTo</span> = <span class="string"><span class="delimiter">'</span><span class="content">/home</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>これを以下のように変更しましょう。これで、ユーザ登録後のリダイレクト先がトップページに変更されます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">protected</span> <span class="local-variable">$redirectTo</span> = <span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>RegisterController の <code>$redirectTo</code> に代入すべき文字列は <code>register()</code> の最後に呼ばれるリダイレクト先です。要するに「ユーザ登録直後にどこへリダイレクトさせるか」の指定になります。<code>/</code> と書くことでトップページにリダイレクトさせています。</p>

<h5>guest ミドルウェアの場所</h5>

<p>guest の定義はどこにあるのでしょうか。Laravelの中に <code>guest</code> という名前のクラスがあるわけではありません。guest は <strong>エイリアス</strong>（ニックネームのようなもの）としてつけられた名前です。guest のミドルウェアの場所は <em>app/Http/Kernel.php</em> を開くことで確認できます。</p>

<p><em>app/Http/Kernel.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">protected</span> <span class="local-variable">$routeMiddleware</span> = [
        <span class="string"><span class="delimiter">'</span><span class="content">auth</span><span class="delimiter">'</span></span> =&gt; \<span class="constant">Illuminate</span>\<span class="constant">Auth</span>\<span class="constant">Middleware</span>\<span class="constant">Authenticate</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">auth.basic</span><span class="delimiter">'</span></span> =&gt; \<span class="constant">Illuminate</span>\<span class="constant">Auth</span>\<span class="constant">Middleware</span>\<span class="constant">AuthenticateWithBasicAuth</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">bindings</span><span class="delimiter">'</span></span> =&gt; \<span class="constant">Illuminate</span>\<span class="constant">Routing</span>\<span class="constant">Middleware</span>\<span class="constant">SubstituteBindings</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">can</span><span class="delimiter">'</span></span> =&gt; \<span class="constant">Illuminate</span>\<span class="constant">Auth</span>\<span class="constant">Middleware</span>\<span class="constant">Authorize</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">guest</span><span class="delimiter">'</span></span> =&gt; \<span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Middleware</span>\<span class="constant">RedirectIfAuthenticated</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">throttle</span><span class="delimiter">'</span></span> =&gt; \<span class="constant">Illuminate</span>\<span class="constant">Routing</span>\<span class="constant">Middleware</span>\<span class="constant">ThrottleRequests</span>::<span class="keyword">class</span>,
    ];
</pre></div>
</div>
</div>

<p>これを読むと <code>guest</code> の正体は <code>\App\Http\Middleware\RedirectIfAuthenticated</code> というクラスであることがわかります。なお、<code>::class</code> は名前空間を含む正しいクラス名（完全修飾名）を取得するための指定なので、あまり深く考えなくて大丈夫です。</p>

<h5>validator()</h5>

<p><code>validator()</code> では、ユーザ登録の際のフォームデータのバリデーションを行っています。</p>

<p>RegistersUsers トレイトの register メソッドの中身を見ると、 <code>validator()</code> を呼び出しているのがわかります。</p>

<ul>
  <li><a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RegistersUsers.php#L31" target="_blank">RegistersUsers@register</a></li>
</ul>

<p>RegisterController の中で <code>validator()</code> をオーバーライドすることで、ユーザ登録時のバリデーション処理の内容を定義しています。</p>

<h5>create()</h5>

<p>名前がややこしいのですが、これは RESTfulなアクション7つの内のひとつである create とは違って、 User を 新規作成しているメソッドになります。これも RegistersUsers トレイトの register メソッドの中身で呼び出されているのがわかります。</p>

<ul>
  <li><a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RegistersUsers.php#L33" target="_blank">RegistersUsers@register</a></li>
</ul>

<h4>View</h4>

<h5>laravelcollective のインストール</h5>

<p>最初に、メッセージボードでもインストールした、 <code>Form</code> や <code>link_to_route()</code> などが利用できる外部ライブラリをTwitterクローンのViewでも利用しましょう。</p>

<!--
*composer.json* ファイルの `"require"` 欄に `"laravelcollective/html": "5.5.*"` という1行を追加してください。1行上の行末に `,` を入れてあげるのも忘れないようにします。正しく記述した `"require"` 欄を下記に載せますので、確認してください。
-->

<ul>
  <li><a href="https://github.com/LaravelCollective/docs/blob/5.4/html.md" target="_blank">laravelcollective</a></li>
</ul>

<pre><code>$ composer require "laravelcollective/html":"5.5.*"
</code></pre>

<!--
*composer.json の "require"*

```json
    "require": {
        "php": ">=7.0.0",
        "fideloper/proxy": "~3.3",
        "laravel/framework": "5.5.*",
        "laravel/tinker": "~1.0",
        "laravelcollective/html": "5.5.*"
    },
```

あとは、 Laravel プロジェクトフォルダのトップで、コマンド `composer update` を実行すれば自動的に指定したライブラリがインストールされます。

```
$ composer update
```
-->

<h5>ユーザ登録（作成）ページ</h5>

<p>RegisterController =&gt; RegistersUsers へと辿りました。そして RegistersUsers を見ると <code>showRegistrationForm()</code> が定義されており、中には <code>return view('auth.register');</code> の1行だけが記述されていることがわかります。</p>

<ul>
  <li><a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RegistersUsers.php#L18" target="_blank">RegistersUsers の showRegistrationForm() の中身</a></li>
</ul>

<p><code>showRegistrationForm()</code> アクションは、ただ単に <em>resources/views/auth/register.blade.php</em> を表示するアクションだということです。ただし、このビューのファイルは作成されていません。</p>

<p>ややこしくなってきたので、話をまとめます。今ここではユーザ登録の機能を作ろうとしています。そのためのModelとControllerは最初から用意されています。Routingの設定は先ほど行いました。つまり、あとは用意されていなかった <em>auth/</em> フォルダを作成し、 <em>register.blade.php</em> を作成するだけでユーザ登録が動作します。ただし、理由は後ほど説明しますが、<strong>ユーザ登録の機能を試すのは「ログイン機能」を構築してからにしてください</strong>。</p>

<p>では、<em>register.blade.php</em> を作りましょう。</p>

<p><em>resources/views/auth/register.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="text-center"&gt;
        &lt;h1&gt;Sign up&lt;/h1&gt;
    &lt;/div&gt;

    &lt;div class="row"&gt;
        &lt;div class="col-sm-6 offset-sm-3"&gt;

            {!! Form::open(['route' =&gt; 'signup.post']) !!}
                &lt;div class="form-group"&gt;
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;

                &lt;div class="form-group"&gt;
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;

                &lt;div class="form-group"&gt;
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;

                &lt;div class="form-group"&gt;
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;

                {!! Form::submit('Sign up', ['class' =&gt; 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<p>この中に登場した <code>old()</code> 関数は、直前で入力していた値を再度代入できる関数です。例えば、フォームで <code>password</code> と <code>password_confirmation</code> が一致しない状態で送信するとエラーとなってフォーム画面に戻りますが、全て最初から入力し直してもらうのではなく、入力されていた内容を消さずに残しておけます（バリデーションを実装してから試してください）。ただし <code>password</code> 関係は <code>old()</code> で残さないほうがセキュリティ的に良いでしょう。</p>

<p>ちなみに、このフォームはコード記載の通り、 <code>signup.post</code> のルーティング、つまり <code>register()</code> アクションに送信されます。そして <code>register()</code> の中ではログインも自動的に実行されます（<a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Foundation/Auth/RegistersUsers.php#L35" target="_blank">参考：RegisterUsers.php</a>）が、次のチャプターで扱う「ログイン機能」を実装するまではログアウトもできません。<strong>今はユーザ登録の機能は試さず、すぐに次へ進んでください。</strong></p>

<h5>トップページにユーザ登録リンクを作成</h5>

<p><em>resources/views/welcome.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="center jumbotron"&gt;
        &lt;div class="text-center"&gt;
            &lt;h1&gt;Welcome to the Microposts&lt;/h1&gt;
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' =&gt; 'btn btn-lg btn-primary']) !!}
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<h5>ナビバー</h5>

<p>ナビバーの Signup のリンクも正しいリンク先を設定しておきます。</p>

<p><em>resources/views/commons/navbar.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                &lt;ul class="nav navbar-nav navbar-right"&gt;
                    &lt;li&gt;{!! link_to_route('signup.get', 'Signup', [], ['class' =&gt; 'nav-link']) !!}&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Login&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'user registration'
</code></pre>
</div></section><section id="chapter-7"><h2 class="index">7. ログイン機能
</h2><div class="subsection"><p>ログイン機能もユーザ登録機能と同じく Laravel 側で予め用意されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 Router
</h3><p>ログイン認証は、LoginController が担当します。以下の3つのルーティングを <em>routes/web.php</em> に追記してください。</p>

<p><em>routes/web.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログイン認証</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">login</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\L</span><span class="content">oginController@showLoginForm</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">login</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">login</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\L</span><span class="content">oginController@login</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">login.post</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">logout</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="content">\L</span><span class="content">oginController@logout</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">logout.get</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-2">7.2 LoginController@showLoginForm, login, logout
</h3><h4>LoginController</h4>

<p><em>app/Http/Controllers/Auth/LoginController</em> を確認してください。</p>

<p><code>use AuthenticatesUsers;</code> とあるように、ログイン認証のコードの実態は <a href="https://laravel.com/api/5.5/Illuminate/Foundation/Auth/AuthenticatesUsers.html" target="_blank">AuthenticatesUsers</a> トレイトです。 Router で設定した <code>showLoginForm</code> や <code>login</code> はこちらに定義されています。</p>

<h5>リダイレクト</h5>

<p>ログインページのフォームでログイン認証が成功した際に、リダイレクトされるページを以下の設定から変更することができます。</p>

<p><em>app/Http/Controllers/Auth/LoginController.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">protected</span> <span class="local-variable">$redirectTo</span> = <span class="string"><span class="delimiter">'</span><span class="content">/home</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p><code>/home</code> の部分を以下のように変更してみましょう。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">protected</span> <span class="local-variable">$redirectTo</span> = <span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>これで、ログイン後は、トップページにリダイレクトされます。</p>

<h4>View</h4>

<h5>ログインページ</h5>

<p>ログインページを作成しましょう。</p>

<p><em>resources/views/auth/login.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="text-center"&gt;
        &lt;h1&gt;Log in&lt;/h1&gt;
    &lt;/div&gt;

    &lt;div class="row"&gt;
        &lt;div class="col-sm-6 offset-sm-3"&gt;

            {!! Form::open(['route' =&gt; 'login.post']) !!}
                &lt;div class="form-group"&gt;
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;

                &lt;div class="form-group"&gt;
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;

                {!! Form::submit('Log in', ['class' =&gt; 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            &lt;p class="mt-2"&gt;New user? {!! link_to_route('signup.get', 'Sign up now!') !!}&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<h5>ナビバー</h5>

<p>ログインができるようになったので、ナビバーを充実させましょう。「Signup」「Login」のリンクはログアウト状態のときのみ表示するようにし、また、ログイン状態のときはログアウトできるようにします。</p>

<p>まずは以下のコードに書き換えてください。</p>

<p><em>resources/views/commons/navbar.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;header class="mb-4"&gt;
    &lt;nav class="navbar navbar-expand-sm navbar-dark bg-dark"&gt; 
        &lt;a class="navbar-brand" href="/"&gt;Microposts&lt;/a&gt;
         
        &lt;button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar"&gt;
            &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
        &lt;/button&gt;
        
        &lt;div class="collapse navbar-collapse" id="nav-bar"&gt;
            &lt;ul class="navbar-nav mr-auto"&gt;&lt;/ul&gt;
            &lt;ul class="navbar-nav"&gt;
                @if (Auth::check())
                    &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Users&lt;/a&gt;&lt;/li&gt;
                    &lt;li class="nav-item dropdown"&gt;
                        &lt;a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"&gt;{{ Auth::user()-&gt;name }}&lt;/a&gt;
                        &lt;ul class="dropdown-menu dropdown-menu-right"&gt;
                            &lt;li class="dropdown-item"&gt;&lt;a href="#"&gt;My profile&lt;/a&gt;&lt;/li&gt;
                            &lt;li class="dropdown-divider"&gt;&lt;/li&gt;
                            &lt;li class="dropdown-item"&gt;{!! link_to_route('logout.get', 'Logout') !!}&lt;/li&gt;
                        &lt;/ul&gt;
                    &lt;/li&gt;
                @else
                    &lt;li class="nav-item"&gt;{!! link_to_route('signup.get', 'Signup', [], ['class' =&gt; 'nav-link']) !!}&lt;/li&gt;
                    &lt;li class="nav-item"&gt;{!! link_to_route('login', 'Login', [], ['class' =&gt; 'nav-link']) !!}&lt;/li&gt;
                @endif
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/nav&gt;
&lt;/header&gt;
</pre></div>
</div>
</div>

<p>Bladeのファイル内で、条件によって表示内容を分けるために if-else文 を使いたいときは <code>@if (条件式) ... @else ... @endif</code> の指定をしてください。条件式に指定した <code>Auth::check()</code> は、ユーザがログインしているかどうかを調べるための関数です。</p>

<h5>Auth ファサードについて</h5>

<p><strong>ファサード</strong> とは、各クラスのメソッドを扱いやすくしたものです。以下に ‘Auth’ =&gt; Illuminate\Support\Facades\Auth::class, とありますが、右側の Illuminate\Support\Facades\Auth::class が、ファサードに登録したいクラスです。通常、Illuminate\Support\Facades\Auth と記述する必要があるのを、 Auth と短く記述して呼び出すことができるようになる、というものです。つまりはエイリアスなのです。</p>

<p>ファサードは、 config/app.php の aliases の中で設定されています。</p>

<p><em>config/app.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="string"><span class="delimiter">'</span><span class="content">aliases</span><span class="delimiter">'</span></span> =&gt; [

        <span class="string"><span class="delimiter">'</span><span class="content">App</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">App</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Artisan</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Artisan</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Auth</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Auth</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Blade</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Blade</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Broadcast</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Broadcast</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Bus</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Bus</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Cache</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Cache</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Config</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Config</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Cookie</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Cookie</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Crypt</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="predefined">Crypt</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">DB</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">DB</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Eloquent</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Eloquent</span>\<span class="constant">Model</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Event</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Event</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">File</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="predefined">File</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Gate</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Gate</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Hash</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="predefined">Hash</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Lang</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Lang</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Log</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="predefined">Log</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Mail</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="predefined">Mail</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Notification</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Notification</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Password</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Password</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Queue</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Queue</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Redirect</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Redirect</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Redis</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Redis</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Request</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Request</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Response</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Response</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Route</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Route</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Schema</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Schema</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Session</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Session</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Storage</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Storage</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">URL</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">URL</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">Validator</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Validator</span>::<span class="keyword">class</span>,
        <span class="string"><span class="delimiter">'</span><span class="content">View</span><span class="delimiter">'</span></span> =&gt; <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">View</span>::<span class="keyword">class</span>,

    ],
</pre></div>
</div>
</div>

<p>実は、今までに、いくつかファサードを利用しています。上記にある通り、 DB ファサードを使った <code>DB::connection()</code> や、 Route ファサードを使ってルーティングの設定などです。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/facades.html" target="_blank">参考: ファサード Laravel 5.5</a></li>
</ul>

<p>中でも、 Auth ファサードは、ログイン認証に関するメソッドを提供しています。先ほど紹介した <code>Auth::check()</code>も、そのひとつです。他に、 <code>Auth::user()</code> はログイン中のユーザを取得できます。</p>

<p>このタイミングで、ユーザ登録とログイン、ログアウト機能を試してみましょう。適当なユーザを追加し、ログインしたりログアウトしたりしてみてください。</p>

<h5>トップページ</h5>

<p>トップページも今後は充実させていくので、ここでは一旦ログインしているかどうかで分岐させるようにしておきましょう。</p>

<p><em>resources/views/welcome.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()-&gt;name }}
    @else
        &lt;div class="center jumbotron"&gt;
            &lt;div class="text-center"&gt;
                &lt;h1&gt;Welcome to the Microposts&lt;/h1&gt;
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' =&gt; 'btn btn-lg btn-primary']) !!}
            &lt;/div&gt;
        &lt;/div&gt;
    @endif
@endsection
</pre></div>
</div>
</div>

<p>なお、今回のコード内には書きませんが、Bladeファイルの中に素のPHPコードを埋め込むこともできるので、<code>{{ Auth::user()-&gt;name }}</code> とは違う他の方法として以下のような形でユーザ名を表示することも可能です。</p>

<p><em>一例ですので追記不要です</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;?php $user = Auth::user(); ?&gt;
{{ $user-&gt;name }}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-3">7.3 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'user login'
</code></pre>
</div></section><section id="chapter-8"><h2 class="index">8. その他のユーザ機能
</h2><div class="subsection"><p>ユーザ登録（作成）や、ログイン認証については既に用意されていた RegisterController や LoginController が担ってくれました。しかし、たとえば、</p>

<ul>
  <li>User の一覧表示</li>
  <li>User の詳細情報の表示</li>
</ul>

<p>上記のような、新しい User の機能を加えようと思うと、新たに Controller を作成する必要があります。</p>

<p>ここでは、Userの「一覧表示」と「詳細情報の表示」機能を作成していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 Model
</h3><p>モデルはそのまま用意されていた User モデルを引き続き利用するので、新規作成するモデルはありません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 Router
</h3><p>RegisterController が用意していたユーザ登録アクション以外に、下記のアクションを作成していきます。</p>

<ul>
  <li>ユーザ一覧(index)</li>
  <li>ユーザ詳細(show)</li>
</ul>

<p>この2つのアクションは、RegisterController とは別に <code>UsersController</code> を用意し、その中に書いていきましょう。</p>

<h4>ログイン認証付きのルーティング</h4>

<p>UsersControllerに用意するユーザ一覧とユーザ詳細はログインしていない状態だと見せたくありません。そのようなときは、ルーティングに必ずログイン認証を確認するような措置を取りましょう。</p>

<p><em>RegisterController</em> で guest を設定したのと同じ方法でも良いかもしれませんが、ここでは下記のように <em>routes/web.php</em> に設定を追記します。</p>

<p><em>routes/web.php に下記を追記</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ユーザ機能</span>
<span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">middleware</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">auth</span><span class="delimiter">'</span></span>]], <span class="keyword">function</span> () {
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">index</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">show</span><span class="delimiter">'</span></span>]]);
});
</pre></div>
</div>
</div>

<p><code>Route::group()</code> でルーティングのグループを作り、その際に <code>['middleware' =&gt; ['auth']]</code> を加えることで、このグループに書かれたルーティングは必ずログイン認証を確認させます。</p>

<p>また、 <code>['only' =&gt; ['index', 'show']]</code> とすることで実装するアクションを絞り込むことが可能です。今回の Controller は7つのアクションのうち index と show だけで良いので、他のアクションのルーティングは作成しません。</p>

<h4>認証ミドルウェアの設定変更</h4>

<p>auth（ログイン状態を確認するミドルウェア）と guest（ログインしていない状態かどうかを確認するミドルウェア）は対をなしていると考えてください。これから auth を有効活用していく上で、guest で「ログインしている状態で表示させたくないページ（ログインフォームのページなど）にアクセスされた際のリダイレクト先」の設定変更をしておきましょう。<em>app/Http/Middleware/RedirectIfAuthenticated.php</em> を開いてください。<code>handle()</code> の内容を変更します。 <code>handle()</code> は全てのミドルウェアが持っているもので、ミドルウェアが設定されたルーティングにアクセスされたときに毎回呼ばれるメソッドです。</p>

<p><em>app/Http/Middleware/RedirectIfAuthenticated.php の handle() [ 追記不要 ]</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">handle</span>(<span class="local-variable">$request</span>, <span class="predefined-constant">Closure</span> <span class="local-variable">$next</span>, <span class="local-variable">$guard</span> = <span class="predefined-constant">null</span>)
    {
        <span class="keyword">if</span> (<span class="constant">Auth</span>::guard(<span class="local-variable">$guard</span>)-&gt;check()) {
            <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/home</span><span class="delimiter">'</span></span>);
        }

        <span class="keyword">return</span> <span class="local-variable">$next</span>(<span class="local-variable">$request</span>);
    }
</pre></div>
</div>
</div>

<p><code>if (Auth::guard($guard)-&gt;check())</code> でログインしているかどうかを判断しています。ログイン認証済みなのに、ログインページにアクセスしようとすると、既定では、 <code>/home</code> にリダイレクトされます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/home</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>こちらを以下のように変更しましょう。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>これでトップページにリダイレクトされるようになります。</p>

<h4>ユーザに対するそれ以外のアクション</h4>

<p>ここでは作成しませんが、ユーザが自分の名前を編集するアクション(edit, update)や退会アクション(destroy)を作っても問題ありませんし、更にユーザの登録情報（年齢や自己紹介など）を充実（users テーブルのカラム追加）させても良いでしょう。これらは、 UsersController に実装すれば良く、ここまで学んだ内容で皆さんも充分実装することが可能です。カラムの追加についてはメッセージボードの内容で扱いました。このアプリケーションにアクションやカラムを追加することは提出課題にはしませんが、復習を兼ねて腕試ししたい方は実装してみてください。その過程で気づきを得ることもあるかも知れません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 UsersController@index
</h3><h4>UsersControllerの作成</h4>

<pre><code>$ php artisan make:controller UsersController
</code></pre>

<p>ここでは index と show のみを実装します。 User に関する Controller が2つある形になります。create アクションや store アクションが不要なのは、それらは RegisterController が担ってくれたからです。</p>

<h4>Controllerの編集</h4>

<p>まずは、 index から実装していきましょう。</p>

<p><em>app/Http/Controllers/UsersController.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Controllers</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Http</span>\<span class="constant">Request</span>;

<span class="keyword">use</span> <span class="constant">App</span>\<span class="constant">User</span>; <span class="comment">// 追加</span>

<span class="keyword">class</span> <span class="class">UsersController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="local-variable">$users</span> = <span class="constant">User</span>::orderBy(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">desc</span><span class="delimiter">'</span></span>)-&gt;paginate(<span class="integer">10</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">users.index</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$users</span>,
        ]);
    }
}
</pre></div>
</div>
</div>

<h4>View</h4>

<h5>Gravatar 表示ライブラリをインストール</h5>

<p>View を作っていき前に Gravatar を設定していきましょう。</p>

<p>Gravatar とは、 メールアドレスに対して自分のアバター画像を登録するサービスです。Gravatar を登録しておき、 Gravatar に対応しているサイトでメールアドレスを設定して発言などをすると、そのアバター画像が表示されるようになります。</p>

<ul>
  <li><a href="https://ja.gravatar.com/" target="_blank">Gravatar</a></li>
</ul>

<p>Microposts も Gravatar に対応するようにし、メールアドレスからアバター画像を表示させましょう。実際にメールアドレスに対して Gravatar を作成してみるとよくわかるかと思います。</p>

<p>では、以下の GitHub で配布されているパッケージをインストールしていきます。</p>

<ul>
  <li><a href="https://github.com/thomaswelton/laravel-gravatar" target="_blank">laravel-gravatar</a></li>
</ul>

<p><code>composer require</code> を使って、以下のコマンドを実行してください。</p>

<pre><code>$ composer require "thomaswelton/laravel-gravatar":"~1.0"
</code></pre>

<!--

まずは *composer.json* に `"thomaswelton/laravel-gravatar": "~1.0"` を追記します。

*composer.json の "require" 部分 （カンマに注意）*

```json
    "require": {
        "php": ">=7.0.0",
        "fideloper/proxy": "~3.3",
        "laravel/framework": "5.5.*",
        "laravel/tinker": "~1.0",
        "laravelcollective/html": "5.5.*",
        "thomaswelton/laravel-gravatar": "~1.0"
    },
```

あとは、 Laravel プロジェクトフォルダのトップで、コマンド `composer udpate` を実行すれば自動的に指定したライブラリがインストールされます。

```
$ composer update
```

これで Gravatar ライブラリを使用する準備は完了です。

-->

<h5>users.index</h5>

<p>ユーザ一覧を表示します。</p>

<p><em>resources/views/users/index.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    @include('users.users', ['users' =&gt; $users])
@endsection
</pre></div>
</div>
</div>

<p>ユーザ一覧の表示部分は、あとで「ユーザがフォローしているユーザ一覧／ユーザのフォロワー一覧」にも使用するので、1つにまとめておきます。なお、この表示部分ではBootstrapのメディアリストを利用しています。</p>

<p><a href="https://getbootstrap.com/docs/4.2/components/media-object/#media-list" target="_blank">参考：メディアリスト</a></p>

<p><em>resources/views/users/users.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@if (count($users) &gt; 0)
    &lt;ul class="list-unstyled"&gt;
        @foreach ($users as $user)
            &lt;li class="media"&gt;
                &lt;img class="mr-2 rounded" src="{{ Gravatar::src($user-&gt;email, 50) }}" alt=""&gt;
                &lt;div class="media-body"&gt;
                    &lt;div&gt;
                        {{ $user-&gt;name }}
                    &lt;/div&gt;
                    &lt;div&gt;
                        &lt;p&gt;{!! link_to_route('users.show', 'View profile', ['id' =&gt; $user-&gt;id]) !!}&lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/li&gt;
        @endforeach
    &lt;/ul&gt;
@endif
</pre></div>
</div>
</div>

<h5>ページネーション</h5>

<p><code>$users = User::orderBy('id', 'desc')-&gt;paginate(10);</code> で、10件ずつ取得にしています（10件ないとページネーションが表示されないので、試しに <code>paginate(1)</code> にして確認しても良いでしょう）。Controller だけでなく View も追記する必要があります。 <code>{{ $users-&gt;links('pagination::bootstrap-4') }}</code> を追記してください。このコードでページネーションのためのものが表示されます。</p>

<p><em>resources/views/users/users.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        ...
        @endforeach
    &lt;/ul&gt;
    {{ $users-&gt;links('pagination::bootstrap-4') }}
@endif
</pre></div>
</div>
</div>

<h5>ナビバー</h5>

<p>users の index を作成したので、ナビバーにあった  Users のリンクをつけましょう。</p>

<p><em>resources/views/commons/navbar.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            &lt;ul class="navbar-nav"&gt;
                @if (Auth::check())
                    &lt;li class="nav-item"&gt;{!! link_to_route('users.index', 'Users', [], ['class' =&gt; 'nav-link']) !!}&lt;/li&gt;
                    &lt;li class="nav-item dropdown"&gt;
                        ...
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-4">8.4 UsersController@show
</h3><h4>Controller</h4>

<h5>UsersController</h5>

<p>show では、 <code>$id</code> の引数を利用して、表示すべきユーザを特定します。</p>

<p><em>app/Http/Controllers/UsersController.php の show アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">show</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$user</span> = <span class="constant">User</span>::find(<span class="local-variable">$id</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">users.show</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">user</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$user</span>,
        ]);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<h5>users.show</h5>

<p>現時点で、ユーザ詳細ページでは、ユーザの名前と Gravatar を表示しているだけです。後ほど、さまざまな機能を実装して充実させていきます。</p>

<p><em>resources/views/users/show.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="row"&gt;
        &lt;aside class="col-sm-4"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;
                    &lt;h3 class="card-title"&gt;{{ $user-&gt;name }}&lt;/h3&gt;
                &lt;/div&gt;
                &lt;div class="card-body"&gt;
                    &lt;img class="rounded img-fluid" src="{{ Gravatar::src($user-&gt;email, 500) }}" alt=""&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/aside&gt;
        &lt;div class="col-sm-8"&gt;
            &lt;ul class="nav nav-tabs nav-justified mb-3"&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;TimeLine&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Followings&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Followers&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<p>なお、アバターの表示部分にはBootstrapのカードを利用しています。</p>

<p><a href="https://getbootstrap.com/docs/4.2/components/card/" target="_blank">参考：カード</a></p>

<h5>ナビゲーションバー</h5>

<p>users の show を作成したので、ナビバーにあった  My profile のリンクをつけましょう。</p>

<p><em>resources/views/commons/navbar.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                            &lt;ul class="dropdown-menu dropdown-menu-right"&gt;
                                &lt;li class="dropdown-item"&gt;{!! link_to_route('users.show', 'My profile', ['id' =&gt; Auth::id()]) !!}&lt;/li&gt;
                                &lt;li class="dropdown-divider"&gt;&lt;/li&gt;
                                &lt;li class="dropdown-item"&gt;{!! link_to_route('logout.get', 'Logout') !!}&lt;/li&gt;
                            &lt;/ul&gt;
</pre></div>
</div>
</div>

<p>ここで <code>Auth::id()</code> というクラスメソッドを使いましたが、これはログインユーザのIDを取得することができるメソッドで、<code>Auth::user()-&gt;id</code> と同じ動きになります。覚えておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-5">8.5 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'user pages'
</code></pre>
</div></section><section id="chapter-9"><h2 class="index">9. 投稿機能
</h2><div class="subsection"><p>次は、投稿機能を作成していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 Model
</h3><p>ユーザの投稿を Micropost というモデル名で作成していきます。</p>

<h4>一対多の関係</h4>

<p>User と Micropost は <strong>一対多</strong> の関係です。</p>

<p>一対多の関係とは、ある1つの Model インスタンス(A)に対して、複数の Model インスタンス(B, B, …)を保持する関係のことです。例えば、今回の User と Micropost では、1人の User は複数の Micropost をツイートすることが可能(<code>hasMany</code>)であり、 1つの Micropost は 必ず1人の User に所属(<code>belongsTo</code>)することが決まっています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/twitter-clone/1vsn.png" alt=""></p>

<p>Model 同士の一対多な関係を見抜くことを甘く考えないようにしてください。今後の Web アプリケーション開発において、 一対多の関係となるリソースを次々と作っていくことになります。ここで一対多の Model の作成方法や扱い方をしっかり抑えておきましょう。</p>

<h4>テーブル設計</h4>

<h5>マイグレーションファイルの作成</h5>

<pre><code>$ php artisan make:migration create_microposts_table --create=microposts
</code></pre>

<p><em>database/migrations/年月日時_create_microposts_table.php の up() と down()</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">up</span>()
    {
        <span class="constant">Schema</span>::create(<span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;increments(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">integer</span>(<span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>)-&gt;unsigned()-&gt;index();
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">string</span>(<span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;timestamps();

            <span class="comment">// 外部キー制約</span>
            <span class="local-variable">$table</span>-&gt;foreign(<span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>)-&gt;references(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>)-&gt;on(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>);
        });
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">down</span>()
    {
        <span class="constant">Schema</span>::dropIfExists(<span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<p>Micropost には、各 Micropost を識別する <code>id</code>、その Micropost を投稿したユーザのID( <code>user_id</code> )、投稿内容( <code>content</code> )、登録日時と更新日時( <code>timestamps()</code> )をカラムとして持たせます。</p>

<h5>外部キー制約について</h5>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$table</span>-&gt;foreign(外部キーを設定するカラム名)-&gt;references(制約先のID名)-&gt;on(外部キー制約先のテーブル名);
</pre></div>
</div>
</div>

<p><strong>外部キー制約</strong> の機能は Laravel の機能ではなく、データベース側の機能です。</p>

<p>この機能は保存されるテーブルの整合性を高めるために利用します。整合性とは、間違ったデータをできるだけ排除できるかという性質です。例えば、ある Micropost の user_id が、存在しない User の id で設定されていたとき、その Micropost の情報自体はデータベース上に存在しますが、どの User も所有していない宙ぶらりん状態のデータとなり、結果的に表示されなかったりエラーを引き起こすデータになります。外部キー制約は、言い換えれば、単に integer として user_id を定義するよりも、 User と Micropost の「つながり」を強化するための機能です。</p>

<p>つまり、外部キー制約は絶対に必要なものではないですが、これを利用することで「間違ったデータが保存されにくくなる」のです。</p>

<p>また、user_id の定義で指定した <code>unsigned()</code> は「負の数は許可しない」という設定で、user_id につけることで、-1,-2などの数字がカラムに登録されることを防いでいます。同じく user_id に指定した <code>index()</code> （インデックス）は、テーブルのカラムにつけることで検索速度を高めることができるものです。本などの一番後ろの方のページにある索引（本の中に出てくる用語をあかさたな順に並べて、その用語が出てくるページ番号がまとめられているページ）と同じ性質だと思ってください。</p>

<h5>マイグレーションの実行</h5>

<pre><code>$ php artisan migrate
</code></pre>

<h4>Micropost Model</h4>

<p>まず、 Micropost のモデルファイルを作成します。</p>

<pre><code>$ php artisan make:model Micropost
</code></pre>

<p>作成したモデルファイルに <code>$fillable</code> を設定しておきましょう。</p>

<p>そして、モデルファイルの中にも一対多の関係を記述しておきましょう。 Micropost を持つ User は1人なので、 <code>function user()</code> のように単数形 user でメソッドを定義し、中身は <code>return $this-&gt;belongsTo(User::class)</code> とします。こうすることの何が良いかというと、 Micropost のインスタンスが所属している唯一の User （投稿者の情報）を <code>$micropost-&gt;user()-&gt;first()</code> もしくは <code>$micropost-&gt;user</code> という簡単な記述で取得できるようになります。</p>

<p><em>app/Micropost.php（namespace など省略）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">Micropost</span> <span class="keyword">extends</span> <span class="constant">Model</span>
{
    <span class="keyword">protected</span> <span class="local-variable">$fillable</span> = [<span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>];

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">user</span>()
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;belongsTo(<span class="constant">User</span>::<span class="keyword">class</span>);
    }
}
</pre></div>
</div>
</div>

<h4>User Model</h4>

<p>User モデルファイルにも一対多の表現を記述しておきます。 User が持つ Micropost は複数存在するので、 <code>function microposts()</code> のように複数形 microposts でメソッドを定義します。中身は <code>return $this-&gt;hasMany(Micropost::class);</code> とします。class内の一番下( <code>$hidden</code> の定義のすぐ下 )に <code>function microposts()</code> を追記してください。</p>

<p><em>app/User.php 追記分</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">User</span> <span class="keyword">extends</span> <span class="constant">Authenticatable</span>
{
    <span class="comment">// ...（fillable など省略）...</span>
    
    <span class="keyword">protected</span> <span class="local-variable">$hidden</span> = [
        <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">remember_token</span><span class="delimiter">'</span></span>,
    ];
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">microposts</span>()
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;hasMany(<span class="constant">Micropost</span>::<span class="keyword">class</span>);
    }
}
</pre></div>
</div>
</div>

<p>同様に、 User のインスタンスから、その User が持つ Microposts を <code>$user-&gt;microposts()-&gt;get()</code> もしくは <code>$user-&gt;microposts</code> という簡単な記述で取得できます。</p>

<h4>tinker で投稿を作成</h4>

<p>Laravelは、一対多などの関係に新しいモデルを追加するための便利なメソッドを用意しています。例えば、 <code>User</code> モデルに関係する新しい <code>Micropost</code> を挿入するために <code>create</code> メソッドを使えます。このメソッドは、引数で受け取った連想配列をもとに、モデルを作成しデータベースへ挿入します。</p>

<p>※ 参考資料：<a href="https://readouble.com/laravel/5.5/ja/eloquent-relationships.html#the-create-method">createメソッド（Eloquent - Laravel 5.5 ドキュメント）</a></p>

<p>tinker を使って、新しい Micropost 1個をデータベースへ挿入してみましょう。投稿の作成は <code>$user-&gt;microposts()-&gt;create(['content' =&gt; 'micropost test'])</code> のように操作します（以下の表示結果は一例です）。</p>

<pre><code>&gt;&gt;&gt; use App\User
&gt;&gt;&gt; use App\Micropost
&gt;&gt;&gt; $user = User::first()
=&gt; App\User {#756
     id: 1,
     name: "test",
     email: "test@test.com",
     created_at: "2016-09-28 12:50:52",
     updated_at: "2016-09-28 12:50:52",
   }
&gt;&gt;&gt; $user-&gt;microposts
=&gt; Illuminate\Database\Eloquent\Collection {#759
     all: [],
   }
&gt;&gt;&gt; $user-&gt;microposts()-&gt;create(['content' =&gt; 'micropost test'])
=&gt; App\Micropost {#700
     id: 3,
     user_id: 1,
     content: "micropost test",
     created_at: "2016-12-08 18:48:39",
     updated_at: "2016-12-08 18:48:39",
   }
&gt;&gt;&gt; $user-&gt;microposts()-&gt;get()
=&gt; Illuminate\Database\Eloquent\Collection {#701
     all: [
       App\Micropost {#710
         id: 3,
         user_id: 1,
         content: "micropost test",
         created_at: "2016-12-08 18:48:39",
         updated_at: "2016-12-08 18:48:39",
       },
     ],
   }
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 Router
</h3><p>ログイン認証を必要とするルーティンググループ内に、 Microposts のルーティングを設定します（登録の store と削除の destroy のみ）。これで、ログイン認証しているユーザだけが MicropostsController にアクセスできます。</p>

<p>また、 今まで <code>/</code> は Router から Controller へ飛ばさずに直接 welcome の Viewを表示させていました。</p>

<p><em>routes/web.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> () {
    <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p>ここからは少し複雑なことをするので、上記の記述を下記のように変更して、Controller ( MicropostsController@index ) を経由して welcome を表示するようにします。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MicropostsController@index</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>この設定内容に変更した結果、 <em>routes/web.php</em> は以下のようになります。</p>

<p><em>routes/web.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="comment">// 中略</span>

<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MicropostsController@index</span><span class="delimiter">'</span></span>);    <span class="comment">// 上書き</span>

<span class="comment">// 中略</span>

<span class="comment">// ユーザ機能</span>
<span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">middleware</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">auth</span><span class="delimiter">'</span></span>], <span class="keyword">function</span> () {
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">index</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">show</span><span class="delimiter">'</span></span>]]);
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MicropostsController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">store</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">destroy</span><span class="delimiter">'</span></span>]]);
});
</pre></div>
</div>
</div>

<p>それぞれのアクションを実装していきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 MicropostsController@index
</h3><p>MicropostsControllerを生成して、index アクションを書いていきましょう。</p>

<h4>MicropostsController</h4>

<pre><code>$ php artisan make:controller MicropostsController
</code></pre>

<p><em>app/Http/Controllers/MicropostsController.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Controllers</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Http</span>\<span class="constant">Request</span>;

<span class="keyword">class</span> <span class="class">MicropostsController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="local-variable">$data</span> = [];
        <span class="keyword">if</span> (\<span class="constant">Auth</span>::check()) {
            <span class="local-variable">$user</span> = \<span class="constant">Auth</span>::user();
            <span class="local-variable">$microposts</span> = <span class="local-variable">$user</span>-&gt;microposts()-&gt;orderBy(<span class="string"><span class="delimiter">'</span><span class="content">created_at</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">desc</span><span class="delimiter">'</span></span>)-&gt;paginate(<span class="integer">10</span>);
            
            <span class="local-variable">$data</span> = [
                <span class="string"><span class="delimiter">'</span><span class="content">user</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$user</span>,
                <span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$microposts</span>,
            ];
        }
        
        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>, <span class="local-variable">$data</span>);
    }
}
</pre></div>
</div>
</div>

<h4>View</h4>

<p>Micropost の一覧を表示する共通の View として、 <em>microposts.blade.php</em> を作成します。</p>

<p><em>resources/views/microposts/microposts.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;ul class="list-unstyled"&gt;
    @foreach ($microposts as $micropost)
        &lt;li class="media mb-3"&gt;
            &lt;img class="mr-2 rounded" src="{{ Gravatar::src($micropost-&gt;user-&gt;email, 50) }}" alt=""&gt;
            &lt;div class="media-body"&gt;
                &lt;div&gt;
                    {!! link_to_route('users.show', $micropost-&gt;user-&gt;name, ['id' =&gt; $micropost-&gt;user-&gt;id]) !!} &lt;span class="text-muted"&gt;posted at {{ $micropost-&gt;created_at }}&lt;/span&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;p class="mb-0"&gt;{!! nl2br(e($micropost-&gt;content)) !!}&lt;/p&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/li&gt;
    @endforeach
&lt;/ul&gt;
{{ $microposts-&gt;links('pagination::bootstrap-4') }}
</pre></div>
</div>
</div>

<p>これを welcome の中で <code>@include</code> すれば、ログイン後のトップページに自分の投稿した Microposts が表示されるようになります。</p>

<p><em>resources/views/welcome.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    @if (Auth::check())
        &lt;div class="row"&gt;
            &lt;aside class="col-sm-4"&gt;
                &lt;div class="card"&gt;
                    &lt;div class="card-header"&gt;
                        &lt;h3 class="card-title"&gt;{{ Auth::user()-&gt;name }}&lt;/h3&gt;
                    &lt;/div&gt;
                    &lt;div class="card-body"&gt;
                        &lt;img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()-&gt;email, 500) }}" alt=""&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/aside&gt;
            &lt;div class="col-sm-8"&gt;
                @if (count($microposts) &gt; 0)
                    @include('microposts.microposts', ['microposts' =&gt; $microposts])
                @endif
            &lt;/div&gt;
        &lt;/div&gt;
    @else
        &lt;div class="center jumbotron"&gt;
            &lt;div class="text-center"&gt;
                &lt;h1&gt;Welcome to the Microposts&lt;/h1&gt;
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' =&gt; 'btn btn-lg btn-primary']) !!}
            &lt;/div&gt;
        &lt;/div&gt;
    @endif
@endsection
</pre></div>
</div>
</div>

<p>では次に Web 上のフォームで Micropost を投稿できるようにします。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-4">9.4 MicropostsController@store
</h3><h4>Controller</h4>

<p>store アクションを実装します。 9.1節では tinker で投稿を作成しました。それと同様に、store アクションでは <code>create</code> メソッドを使って Micropost を保存しています。</p>

<p><em>app/Http/Controllers/MicropostsController.php 追記部分（storeアクション）のみ</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>)
    {
        <span class="local-variable">$this</span>-&gt;validate(<span class="local-variable">$request</span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,
        ]);

        <span class="local-variable">$request</span>-&gt;user()-&gt;microposts()-&gt;create([
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$request</span>-&gt;content,
        ]);

        <span class="keyword">return</span> back();
    }
</pre></div>
</div>
</div>

<p><code>return back()</code> とすることで、投稿完了後に直前のページが表示されるようになります。固定の場所をリダイレクト先として指定する必要がないので、汎用的に使えて便利です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-5">9.5 MicropostsController@destroy
</h3><p>投稿の削除を実装します。</p>

<h4>Controller</h4>

<p><em>app/Http/Controllers/MicropostsController.php 追記部分（destroy）のみ抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">destroy</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$micropost</span> = \<span class="constant">App</span>\<span class="constant">Micropost</span>::find(<span class="local-variable">$id</span>);

        <span class="keyword">if</span> (\<span class="constant">Auth</span>::id() === <span class="local-variable">$micropost</span>-&gt;user_id) {
            <span class="local-variable">$micropost</span>-&gt;<span class="predefined">delete</span>();
        }

        <span class="keyword">return</span> back();
    }
</pre></div>
</div>
</div>

<p>削除を実行する部分は if文 で囲みました。</p>

<p><em>追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="keyword">if</span> (\<span class="constant">Auth</span>::id() === <span class="local-variable">$micropost</span>-&gt;user_id) {
            <span class="local-variable">$micropost</span>-&gt;<span class="predefined">delete</span>();
        }
</pre></div>
</div>
</div>

<p>他者の Micropost を勝手に削除されないよう、ログインユーザのIDと Micropost の所有者のID（user_id）が一致しているかを調べるようにしています。</p>

<h4>View</h4>

<p>View に削除ボタンを付け足します。</p>

<p><em>resources/views/microposts/microposts.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;ul class="media-list"&gt;
    @foreach ($microposts as $micropost)
        &lt;li class="media mb-3"&gt;
            &lt;img class="mr-2 rounded" src="{{ Gravatar::src($micropost-&gt;user-&gt;email, 50) }}" alt=""&gt;
            &lt;div class="media-body"&gt;
                &lt;div&gt;
                    {!! link_to_route('users.show', $micropost-&gt;user-&gt;name, ['id' =&gt; $micropost-&gt;user-&gt;id]) !!} &lt;span class="text-muted"&gt;posted at {{ $micropost-&gt;created_at }}&lt;/span&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;p class="mb-0"&gt;{!! nl2br(e($micropost-&gt;content)) !!}&lt;/p&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    @if (Auth::id() == $micropost-&gt;user_id)
                        {!! Form::open(['route' =&gt; ['microposts.destroy', $micropost-&gt;id], 'method' =&gt; 'delete']) !!}
                            {!! Form::submit('Delete', ['class' =&gt; 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/li&gt;
    @endforeach
&lt;/ul&gt;
{{ $microposts-&gt;links('pagination::bootstrap-4') }}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-6">9.6 UsersController@show
</h3><h4>Controller</h4>

<h5>Micropost の数をカウントする機能を追加</h5>

<p>Micropost の数のカウントを View で表示するときのために、 <em>Controller.php</em> に実装しておきます。これで、全てのコントローラで <code>counts()</code> が使用できます。全てのコントローラが <em>Controller.php</em> を継承しているからです。</p>

<p><em>app/Http/Controllers/Controller.php（namespaceなど省略）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">Controller</span> <span class="keyword">extends</span> <span class="constant">BaseController</span>
{
    <span class="keyword">use</span> <span class="constant">AuthorizesRequests</span>, <span class="constant">DispatchesJobs</span>, <span class="constant">ValidatesRequests</span>;

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">counts</span>(<span class="local-variable">$user</span>) {
        <span class="local-variable">$count_microposts</span> = <span class="local-variable">$user</span>-&gt;microposts()-&gt;<span class="predefined">count</span>();

        <span class="keyword">return</span> [
            <span class="string"><span class="delimiter">'</span><span class="content">count_microposts</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$count_microposts</span>,
        ];
    }
}
</pre></div>
</div>
</div>

<h5>users.show</h5>

<p>上記の <code>counts()</code> の戻り値を配列 <code>$data</code> に追加します。<code>$data += $this-&gt;counts($user);</code> と書くだけで <code>count_microposts</code> をキーとするペアが <code>$data</code> に追加されます。</p>

<p><em>app/Http/Controllers/UsersController.php showアクションのみ抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">show</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$user</span> = <span class="constant">User</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$microposts</span> = <span class="local-variable">$user</span>-&gt;microposts()-&gt;orderBy(<span class="string"><span class="delimiter">'</span><span class="content">created_at</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">desc</span><span class="delimiter">'</span></span>)-&gt;paginate(<span class="integer">10</span>);

        <span class="local-variable">$data</span> = [
            <span class="string"><span class="delimiter">'</span><span class="content">user</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$user</span>,
            <span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$microposts</span>,
        ];

        <span class="local-variable">$data</span> += <span class="local-variable">$this</span>-&gt;counts(<span class="local-variable">$user</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">users.show</span><span class="delimiter">'</span></span>, <span class="local-variable">$data</span>);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<p>User の show でも Microposts を表示します。また、投稿用の専用ページは作らず、ここに投稿フォームを設置します。投稿フォームは、ログインされたuserのみに表示されるようにコーディングします。</p>

<p><em>resources/views/users/show.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="row"&gt;
        &lt;aside class="col-sm-4"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;
                    &lt;h3 class="card-title"&gt;{{ $user-&gt;name }}&lt;/h3&gt;
                &lt;/div&gt;
                &lt;div class="card-body"&gt;
                    &lt;img class="rounded img-fluid" src="{{ Gravatar::src($user-&gt;email, 500) }}" alt=""&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/aside&gt;
        &lt;div class="col-sm-8"&gt;
            &lt;ul class="nav nav-tabs nav-justified mb-3"&gt;
                &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.show', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/' . $user-&gt;id) ? 'active' : '' }}"&gt;TimeLine &lt;span class="badge badge-secondary"&gt;{{ $count_microposts }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Followings&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link"&gt;Followers&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            @if (Auth::id() == $user-&gt;id)
                {!! Form::open(['route' =&gt; 'microposts.store']) !!}
                    &lt;div class="form-group"&gt;
                        {!! Form::textarea('content', old('content'), ['class' =&gt; 'form-control', 'rows' =&gt; '2']) !!}
                        {!! Form::submit('Post', ['class' =&gt; 'btn btn-primary btn-block']) !!}
                    &lt;/div&gt;
                {!! Form::close() !!}
            @endif
            @if (count($microposts) &gt; 0)
                @include('microposts.microposts', ['microposts' =&gt; $microposts])
            @endif
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<p>下記だけ少しややこしいので解説します。</p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.show', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/' . $user-&gt;id) ? 'active' : '' }}"&gt;TimeLine &lt;span class="badge badge-secondary"&gt;{{ $count_microposts }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
</pre></div>
</div>
</div>

<p><code>{{ Request::is('users/' . $user-&gt;id) ? 'active' : '' }}"</code> は、 <code>/users/{id}</code> という URL の場合には、 <code>class="active"</code> にするコードです。 Bootstrap のタブでは <code>class="active"</code> を付与することで、このタブが今開いているページだとわかりやすくなります。 <code>Request::is</code> はその判定のために使用しています。</p>

<ul>
  <li><a href="https://laravel.com/api/5.5/Illuminate/Http/Request.html#method_is" target="_blank">参考: Request@is - Laravel API</a></li>
</ul>

<p><code>&lt;a href="{{ route('users.show', ['id' =&gt; $user-&gt;id]) }}"&gt;</code> で使用している <code>route()</code> はヘルパー関数と呼ばれるもので、今までは <code>link_to_route</code> を使用してきましたが、ここではこちらを使用しています。理由は、<code>link_to_route</code> だと <code>&lt;span class="badge"&gt;{{ $count_microposts }}&lt;/span&gt;</code> を含めたリンク名がうまく表示されないからです（これはLaravelの仕様なので私たちがどうこうできる問題ではないです）。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/helpers.html#method-route" target="_blank">参考: ヘルパー関数 - Laravel 5.5</a></li>
</ul>

<p>これでログインユーザ自身の情報が表示される User のページから Micropost が投稿できるようになりました。実際にいくつか投稿して表示内容を確認してみてください。</p>

<p>せっかくなのでトップページにも投稿フォームを設置しましょう。</p>

<p><em>resources/views/welcome.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    @if (Auth::check())
        &lt;div class="row"&gt;
            &lt;aside class="col-sm-4"&gt;
                &lt;div class="card"&gt;
                    &lt;div class="card-header"&gt;
                        &lt;h3 class="card-title"&gt;{{ Auth::user()-&gt;name }}&lt;/h3&gt;
                    &lt;/div&gt;
                    &lt;div class="card-body"&gt;
                        &lt;img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()-&gt;email, 500) }}" alt=""&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/aside&gt;
            &lt;div class="col-sm-8"&gt;
                @if (Auth::id() == $user-&gt;id)
                    {!! Form::open(['route' =&gt; 'microposts.store']) !!}
                        &lt;div class="form-group"&gt;
                            {!! Form::textarea('content', old('content'), ['class' =&gt; 'form-control', 'rows' =&gt; '2']) !!}
                            {!! Form::submit('Post', ['class' =&gt; 'btn btn-primary btn-block']) !!}
                        &lt;/div&gt;
                    {!! Form::close() !!}
                @endif
                @if (count($microposts) &gt; 0)
                    @include('microposts.microposts', ['microposts' =&gt; $microposts])
                @endif
            &lt;/div&gt;
        &lt;/div&gt;
    @else
        &lt;div class="center jumbotron"&gt;
            &lt;div class="text-center"&gt;
                &lt;h1&gt;Welcome to the Microposts&lt;/h1&gt;
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' =&gt; 'btn btn-lg btn-primary']) !!}
            &lt;/div&gt;
        &lt;/div&gt;
    @endif
@endsection
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-7">9.7 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'post'
</code></pre>
</div><div class="subsection challenge"><h3 class="index" id="kadai-login">課題：ログイン認証と一対多をタスク管理アプリに追加する</h3><p>Twitterクローンを参考にして、タスク管理アプリにログイン認証機能をつけて、ログインしているユーザが自身の作成したタスクのみにアクセスできるようにしてください。</p>

<p><img src="https://i.gyazo.com/f2c4bf34c56df43089af92734686aa1f.png" alt=""></p>

<ul>
  <li>ログイン認証機能をつけてください。</li>
  <li>マイグレーションで外部キー制約を追加される際に既存データがある場合、外部キーのカラムにNULLが入るため外部キーが作成できないエラーが発生します。<br>
マイグレーション前にmysqlコマンドかtinkerでデータを事前削除しましょう。</li>
  <li>未ログイン状態ではタスクの作成、編集、削除、表示ができないようにしてください。</li>
  <li>ログインしたユーザーがタスクを投稿できるようにしてください</li>
  <li>ログインユーザが、自分自身のタスクのみを操作可能 (表示、編集、削除) にして、他のユーザーからのアクセスは全てトップページにリダイレクトしてください。</li>
  <li>GitHub に完成した最新のソースコードをプッシュしてください。</li>
  <li>Heroku にデプロイしてください。</li>
</ul>

<h4>注意点</h4>

<ul>
  <li>タスクの削除ができなくなった等、以前に実装できた機能が使えなくなる状態（デグレードといいます）にはならないよう、注意しながらコーディングを行ってください。</li>
  <li>ユーザーの一覧・詳細ページなど、上記の「内容」欄に書かれてなく、タスク管理アプリで未実装の内容については構築不要です。</li>
</ul>

<h3>マイグレーション実行時のエラー対処</h3>

<p>エラーとなる理由について説明します。DB の tasks テーブルに user_id を追加するとき、マイグレーションファイルで <code>$table-&gt;integer('user_id')-&gt;unsigned()-&gt;index();</code> と <code>$table-&gt;foreign('user_id')-&gt;references('id')-&gt;on('users');</code> のように指定したと思います。このようにカラムに index や foregin key を設定した場合、そのカラムは null となることが許されなくなります。ここで問題なのが、このマイグレーション以前に作成されたタスクが1つでも存在すると、その既存のタスクの user_id カラムは null となってしまい、DB でマイグレーションエラーが発生します。</p>

<p>対処としては、以前のタスクを全て削除することです。</p>

<pre><code>$ php artisan tinker

&gt;&gt;&gt; DB::table('tasks')-&gt;delete()
=&gt; (ここに削除された件数が表示されます)
</code></pre>

<p>で tinker を起動し、全ての既存タスクを削除しましょう。</p>
</div></section><section id="chapter-10"><h2 class="index">10. フォロー機能
</h2><div class="subsection"><h3 class="index" id="chapter-10-1">10.1 Model
</h3><h4>多対多の関係</h4>

<p>一対多だけでなく、<strong>多対多</strong> の関係もあります。</p>

<p>このチャプターで解説する機能である「フォローしている／フォローされている」の関係は、多対多の関係です。また、課題である「お気に入り機能」も、多対多の関係です。</p>

<p>多対多の関係は、一対多の関係を拡張した関係です。一対多との違いから理解しましょう。一対多の関係だった User と Micropost では、 User が複数の Micropost を持ち、 Micropost は必ず1つの User に所属しました。「フォローしている／フォローされている」の関係では、User <font style="color: #f00;"><strong>が</strong></font> フォローしているUserは複数存在することがあり、逆にUser <font style="color: #f00;"><strong>を</strong></font> フォローしているUserも複数存在することがあるという、双方に複数相手が存在する可能性がある関係なのです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/twitter-clone/nvsn0.png" alt=""></p>

<p>この違いは必ず理解してください。一対多と同様に多対多のリソースを扱う方法もしっかりと学んでおく必要があります。多対多の関係が稀な関係だとは思わないでください。一対多と同様に頻繁に出てくる関係になります。</p>

<h4>多対多では中間テーブルが必要</h4>

<p>一対多では、 microposts テーブルを作成するときに user_id を付与しました。microposts テーブルに user_id を設置することで、 Micropost が所属する User を特定できたのです。そして、 belongsTo と hasMany のメソッドによって両者を Model ファイルで繋げることができ、 <code>$user-&gt;microposts</code> や <code>$micropost-&gt;user</code> が使用可能になったわけです。</p>

<p>多対多では、片方のテーブルに xxxx_id のようなカラムを設置するだけでは実現できません。実現できなくもないですが、カラムの中身が配列になってしまいます。データベースの1つの値が配列になってしまうのは、とても扱いにくく好ましくありません。</p>

<p>そこで、多対多の場合には、<strong>中間テーブル</strong> を設置するのが最も有効な方法です。中間テーブルとは、 users や microposts のような、メインとなるリソースではなく、その関係を繋げるためだけのテーブルを言います。上図の中間テーブルでは、フォローする側のUserとフォローされる側のUserの情報をペアとして持っており、たとえば <code>[ 1 | 2 ]</code> となっている中間テーブルのレコードは「id: 1のユーザが id: 2 のユーザをフォローしている」ことを意味していると思ってください。このように中間テーブルを用意することで、フォローしているUserとフォローされているUserの関係を表現できるのです。</p>

<p>一見難しく思えますが、この中間テーブルを利用する方法は、今まで使用してきた一対多の関係を拡張した関係になっています。中間テーブルはUserのフォローの関係を表すだけのテーブルで、「左側のUser」と「中間テーブルの左側」の関係だけで見ると一対多、同じく「右側のユーザ」と「中間テーブルの右側」の関係も一対多です。一対多の関係を2つ（上図で言うと左右から）くっつけることで、相手が双方向に複数存在する『多対多』という関係を表現できるようになっているわけです。</p>

<h4>マイグレーション</h4>

<h5>マイグレーションファイルの作成</h5>

<p>では、 User と User のフォロー関係のレコードを保存する中間テーブル user_follow を作成し、<code>up()</code> にカラムの情報を追記します。念のため <code>id</code> と <code>timestamps()</code> は残していますが、中間テーブルとして重要なのは <code>user_id</code> と <code>follow_id</code> です。</p>

<pre><code>$ php artisan make:migration create_user_follow_table --create=user_follow
</code></pre>

<p><em>database/migrations/年月日時_create_user_follow_table.php の up() と down()</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">up</span>()
    {
        <span class="constant">Schema</span>::create(<span class="string"><span class="delimiter">'</span><span class="content">user_follow</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;increments(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">integer</span>(<span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>)-&gt;unsigned()-&gt;index();
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">integer</span>(<span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>)-&gt;unsigned()-&gt;index();
            <span class="local-variable">$table</span>-&gt;timestamps();

            <span class="comment">// 外部キー設定</span>
            <span class="local-variable">$table</span>-&gt;foreign(<span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>)-&gt;references(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>)-&gt;on(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>)-&gt;onDelete(<span class="string"><span class="delimiter">'</span><span class="content">cascade</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;foreign(<span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>)-&gt;references(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>)-&gt;on(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>)-&gt;onDelete(<span class="string"><span class="delimiter">'</span><span class="content">cascade</span><span class="delimiter">'</span></span>);

            <span class="comment">// user_idとfollow_idの組み合わせの重複を許さない</span>
            <span class="local-variable">$table</span>-&gt;unique([<span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>]);
        });
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">down</span>()
    {
        <span class="constant">Schema</span>::dropIfExists(<span class="string"><span class="delimiter">'</span><span class="content">user_follow</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<p>follow_id という名前にしていますが、保存する内容はユーザID です。しかし、 user_id というカラム名が被ってしまうので、 follow_id にしています。これで User と User のフォロー関係を保存することができます。</p>

<p>また、<code>$table-&gt;unique(['user_id', 'follow_id']);</code> を追加することで user_id と follow_id の組み合わせの重複を許さないようにしています。これは一度保存したフォロー関係を何度も保存しようとしないようにテーブルの制約として入れています。</p>

<p>さらに、onDelete は参照先のデータが削除されたときにこのテーブルの行をどのように扱うかを指定します。 オプションとして以下の値をセットして、削除後の挙動を制御できます。　</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>set <span class="predefined-constant">null</span>: <span class="predefined-constant">NULL</span> に設定 (<span class="constant">ID</span> を <span class="predefined-constant">NULL</span> に変更します)

no action: なにもしない (存在しない <span class="constant">ID</span> が残ります)

cascade: 一緒に消す (このテーブルのデータも一緒に消えます)

restrict: 禁止する (参照先のデータが消せなくなります)
</pre></div>
</div>
</div>
<p>今回は、<code>onDelete('cascade')</code> で、ユーザーテーブルのユーザーデータが削除されたら、それにひもづくフォローテーブルのフォロー、フォロワーのレコードも削除されるようにしました。</p>

<h4>マイグレーションの実行</h4>

<div class="language-sh highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>$ php artisan migrate
</pre></div>
</div>
</div>

<h4>belongsToMany()</h4>

<p>中間テーブルのためのModelファイルは不要です。</p>

<p>その代わり、 User のモデルファイルに多対多の関係を記述します。そのためには <code>belongsToMany</code> メソッドを使用します。フォロー関係の場合、多対多の関係がどちらも User に対するものなので、どちらも User のModelファイルに記述します。<code>microposts()</code> の定義の下に追記してください。</p>

<p><em>app/User.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">User</span> <span class="keyword">extends</span> <span class="constant">Authenticatable</span>
{
    <span class="comment">// 中略</span>

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">microposts</span>()
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;hasMany(<span class="constant">Micropost</span>::<span class="keyword">class</span>);
    }
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">followings</span>()
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;belongsToMany(<span class="constant">User</span>::<span class="keyword">class</span>, <span class="string"><span class="delimiter">'</span><span class="content">user_follow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>)-&gt;withTimestamps();
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">followers</span>()
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;belongsToMany(<span class="constant">User</span>::<span class="keyword">class</span>, <span class="string"><span class="delimiter">'</span><span class="content">user_follow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>)-&gt;withTimestamps();
    }
}
</pre></div>
</div>
</div>

<p>これで、一対多のときと同様に、 <code>$user-&gt;followings</code> で <code>$user</code> <font style="color: #f00;"><strong>が</strong></font> フォローしている User 達を取得することができます。 <code>$user-&gt;followers</code> も同様で <code>$user</code> <font style="color: #f00;"><strong>を</strong></font>フォローしている User 達を取得可能です。</p>

<p>followings は User <font style="color: #f00;"><strong>が</strong></font> フォローしている User 達で、 followers は User <font style="color: #f00;"><strong>を</strong></font> フォローしている User 達です。</p>

<p>( followings を例にとると) <code>belongsToMany()</code> では、第一引数に得られる Model クラス (<code>User::class</code>) を指定し、第二引数に中間テーブル (<code>user_follow</code>) を指定し、第三引数に中間テーブルに保存されている自分の id を示すカラム名 (<code>user_id</code>) を指定し、第四引数に中間テーブルに保存されている関係先の id を示すカラム名 (<code>follow_id</code>) を指定します。followersの場合、第三引数と第四引数が逆になります。つまり、followingsは「<code>user_id</code> のUser は <code>follow_id</code> の User をフォローしている」ことを表し、followers は「<code>follow_id</code> のUser は <code>user_id</code> の User からフォローされている」ことを表しています。</p>

<p>なお、 <code>withTimestamps()</code> は中間テーブルにも created_at と updated_at を保存するためのメソッドでタイムスタンプを管理することができるようになります。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent-relationships.html#many-to-many" target="_blank">参考: 多対多 - Laravel 5.5</a></li>
</ul>

<h4>follow(), unfollow()</h4>

<p><code>$user-&gt;follow($user_id)</code> や、<code>$user-&gt;unfollow($user_id)</code> とすれば、フォロー／アンフォローできるように <code>follow()</code> と<code>unfollow()</code> メソッドを User モデルで定義しておきましょう。<code>followers()</code> の定義の下に追記してください。</p>

<p><em>app/User.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">User</span> <span class="keyword">extends</span> <span class="constant">Authenticatable</span>
{
    <span class="comment">// 中略</span>
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">followers</span>()
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;belongsToMany(<span class="constant">User</span>::<span class="keyword">class</span>, <span class="string"><span class="delimiter">'</span><span class="content">user_follow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>)-&gt;withTimestamps();
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">follow</span>(<span class="local-variable">$userId</span>)
    {
        <span class="comment">// 既にフォローしているかの確認</span>
        <span class="local-variable">$exist</span> = <span class="local-variable">$this</span>-&gt;is_following(<span class="local-variable">$userId</span>);
        <span class="comment">// 相手が自分自身ではないかの確認</span>
        <span class="local-variable">$its_me</span> = <span class="local-variable">$this</span>-&gt;id == <span class="local-variable">$userId</span>;
    
        <span class="keyword">if</span> (<span class="local-variable">$exist</span> || <span class="local-variable">$its_me</span>) {
            <span class="comment">// 既にフォローしていれば何もしない</span>
            <span class="keyword">return</span> <span class="predefined-constant">false</span>;
        } <span class="keyword">else</span> {
            <span class="comment">// 未フォローであればフォローする</span>
            <span class="local-variable">$this</span>-&gt;followings()-&gt;attach(<span class="local-variable">$userId</span>);
            <span class="keyword">return</span> <span class="predefined-constant">true</span>;
        }
    }
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">unfollow</span>(<span class="local-variable">$userId</span>)
    {
        <span class="comment">// 既にフォローしているかの確認</span>
        <span class="local-variable">$exist</span> = <span class="local-variable">$this</span>-&gt;is_following(<span class="local-variable">$userId</span>);
        <span class="comment">// 相手が自分自身ではないかの確認</span>
        <span class="local-variable">$its_me</span> = <span class="local-variable">$this</span>-&gt;id == <span class="local-variable">$userId</span>;
    
        <span class="keyword">if</span> (<span class="local-variable">$exist</span> &amp;&amp; !<span class="local-variable">$its_me</span>) {
            <span class="comment">// 既にフォローしていればフォローを外す</span>
            <span class="local-variable">$this</span>-&gt;followings()-&gt;detach(<span class="local-variable">$userId</span>);
            <span class="keyword">return</span> <span class="predefined-constant">true</span>;
        } <span class="keyword">else</span> {
            <span class="comment">// 未フォローであれば何もしない</span>
            <span class="keyword">return</span> <span class="predefined-constant">false</span>;
        }
    }
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">is_following</span>(<span class="local-variable">$userId</span>)
    {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;followings()-&gt;where(<span class="string"><span class="delimiter">'</span><span class="content">follow_id</span><span class="delimiter">'</span></span>, <span class="local-variable">$userId</span>)-&gt;exists();
    }
}
</pre></div>
</div>
</div>

<p>フォロー／アンフォローするときには、2つ注意することがあります。それは、</p>

<ul>
  <li>既にフォローしているか</li>
  <li>相手が自分自身ではないか</li>
</ul>

<p>です。</p>

<p>これらをしっかり判定してからフォロー／アンフォローを実行しましょう。</p>

<p>フォロー／アンフォローとは、中間テーブルのレコードを保存／削除することです。そのために <code>attach()</code> と <code>detach()</code> というメソッドが用意されているので、それを使用します。</p>

<p>念のため、フォロー／アンフォローに成功すれば <code>return true</code> 、失敗すれば <code>return false</code> を返すようにしています。今回は <code>true</code>, <code>false</code> の結果を使用していませんが、何か成功失敗を判定したい場合には利用できます。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent-relationships.html#updating-many-to-many-relationships" target="_blank">参考: attach/detach - Laravel 5.5</a></li>
</ul>

<h4>tinker でフォロー／アンフォロー</h4>

<p>前提として User を2人以上作成しておきましょう。1人がもう1人をフォロー／アンフォローするためです。</p>

<p>そのために、あらかじめデータベース上に２人以上のユーザーを登録しておいてください。登録がないとfindメソッドを実行してもnullが返ってきてしまいます。</p>

<pre><code>&gt;&gt;&gt; use App\User

// 今回はユーザーIDが1と2のユーザーを使ってテストしますが、任意のID番号でも問題ありません。
&gt;&gt;&gt; $user1 = User::find(1)
=&gt; App\User {#2871
      // 中略
}
&gt;&gt;&gt; $user2 = User::find(2)
=&gt; App\User {#2864
      // 中略
}
&gt;&gt;&gt; $user1-&gt;follow($user2-&gt;id)
=&gt; true
&gt;&gt;&gt; $user1-&gt;followings()-&gt;get()
=&gt; Illuminate\Database\Eloquent\Collection {#2865
     all: [
       App\User {#2876
         id: 2,
         
         // 中略
       },
     ],
   }
&gt;&gt;&gt; $user1-&gt;unfollow($user2-&gt;id)
=&gt; true
&gt;&gt;&gt; $user1-&gt;followings()-&gt;get()
=&gt; Illuminate\Database\Eloquent\Collection {#2880
     all: [],
   }
</code></pre>

<p>これで User のフォロー／アンフォローが自由にできるようになりました。</p>

<p>中間テーブルがどうなっているのか気になれば、 MySQL クライアントで直接レコードを確認してみるのも良いでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-2">10.2 Router
</h3><p><em>routes/web.php の auth グループ抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">middleware</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">auth</span><span class="delimiter">'</span></span>], <span class="keyword">function</span> () {
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">index</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">show</span><span class="delimiter">'</span></span>]]);
    
    <span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">prefix</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">users/{id}</span><span class="delimiter">'</span></span>], <span class="keyword">function</span> () {
        <span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">follow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UserFollowController@store</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">user.follow</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::<span class="predefined">delete</span>(<span class="string"><span class="delimiter">'</span><span class="content">unfollow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UserFollowController@destroy</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">user.unfollow</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">followings</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController@followings</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">users.followings</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">followers</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController@followers</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">users.followers</span><span class="delimiter">'</span></span>);
    });
    
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MicropostsController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">store</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">destroy</span><span class="delimiter">'</span></span>]]);
});
</pre></div>
</div>
</div>

<p>auth の <code>Route::group</code> の中に <code>['prefix' =&gt; 'users/{id}']</code> とした <code>Route::group</code> を追加しています。このグループ内のルーティングでは、 URL の最初に <code>/users/{id}/</code> が付与されます。<br>
つまり上記の4つは</p>

<ul>
  <li>POST <code>/users/{id}/follow</code></li>
  <li>DELETE <code>/users/{id}/unfollow</code></li>
  <li>GET <code>/users/{id}/followings</code></li>
  <li>GET <code>/users/{id}/followers</code></li>
</ul>

<p>となります。</p>

<p>上記だけではイメージしづらいかと思いますので、以下にデモサイトのURLを基にした完全なURLを参考情報として記載します。あくまでもURLは参考ですので、一覧以外のURLにはアクセスしても何も起こりません。</p>

<div class="language-txt highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>例) ユーザーID125のユーザーの場合

// 125番目のユーザーをフォローする
http://laravel-microposts.herokuapp.com/users/125/follow [POST形式]

// 125番目のユーザーをアンフォローする
http://laravel-microposts.herokuapp.com/users/125/unfollow [DELETE形式]

// 125番目のユーザーがフォローしているユーザー一覧を表示する
http://laravel-microposts.herokuapp.com/users/125/followings [GET形式]

// 125番目のユーザーをフォローしているユーザー一覧を表示する
http://laravel-microposts.herokuapp.com/users/125/followers [GET形式]
</pre></div>
</div>
</div>

<p>上記の POST と DELETE はフォロー／アンフォローを HTTP で操作可能にするルーティングです。UserFollowController は後で新規作成しますので、その際に説明します。</p>

<p>そして、 GET の2つはフォローしている人とフォローされている人の User 一覧を表示することになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-3">10.3 UserFollowController@store, destroy
</h3><h4>Controller</h4>

<p>フォロー機能のためのモデルやルーティングが作成できたので、次はコントローラを作成しましょう。UsersController.phpやMicropostsController.phpのファイルが既にありますが、 今回は中間テーブルを操作するアクションなので、新しくUserFollowController.phpファイルを作成して、その中に、フォローするためのstoreメソッドとアンフォローするためのdestroyメソッドを作成することにします。</p>

<ul>
  <li>storeメソッドの中でUser.phpの中で定義したfollowメソッドを使って、ユーザーをフォローできるようにします。</li>
  <li>destroyメソッドの中でUser.phpの中で定義したunfollowメソッドを使って、ユーザーをアンフォローできるようにします。</li>
</ul>

<pre><code>$ php artisan make:controller UserFollowController
</code></pre>

<p><em>app/Http/Controllers/UserFollowController.php の store と destroy</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">namespace</span> <span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Controllers</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Http</span>\<span class="constant">Request</span>;

<span class="keyword">class</span> <span class="class">UserFollowController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>, <span class="local-variable">$id</span>)
    {
        \<span class="constant">Auth</span>::user()-&gt;follow(<span class="local-variable">$id</span>);
        <span class="keyword">return</span> back();
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">destroy</span>(<span class="local-variable">$id</span>)
    {
        \<span class="constant">Auth</span>::user()-&gt;unfollow(<span class="local-variable">$id</span>);
        <span class="keyword">return</span> back();
    }
}
</pre></div>
</div>
</div>

<h5>フォロー／フォロワー数のカウント</h5>

<p>フォロー／フォロワー数のカウントを View で表示する機能は、Controller クラスに用意した <code>counts()</code> の中に定義し、すべての Controller で使用できるようにしたいと思います。 <em>Controller.php</em> に追記しましょう。</p>

<p><em>app/Http/Controllers/Controller.php（class部分のみ抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">Controller</span> <span class="keyword">extends</span> <span class="constant">BaseController</span>
{
    <span class="keyword">use</span> <span class="constant">AuthorizesRequests</span>, <span class="constant">DispatchesJobs</span>, <span class="constant">ValidatesRequests</span>;

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">counts</span>(<span class="local-variable">$user</span>) {
        <span class="local-variable">$count_microposts</span> = <span class="local-variable">$user</span>-&gt;microposts()-&gt;<span class="predefined">count</span>();
        <span class="local-variable">$count_followings</span> = <span class="local-variable">$user</span>-&gt;followings()-&gt;<span class="predefined">count</span>();
        <span class="local-variable">$count_followers</span> = <span class="local-variable">$user</span>-&gt;followers()-&gt;<span class="predefined">count</span>();

        <span class="keyword">return</span> [
            <span class="string"><span class="delimiter">'</span><span class="content">count_microposts</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$count_microposts</span>,
            <span class="string"><span class="delimiter">'</span><span class="content">count_followings</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$count_followings</span>,
            <span class="string"><span class="delimiter">'</span><span class="content">count_followers</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$count_followers</span>,
        ];
    }
}
</pre></div>
</div>
</div>

<h4>View</h4>

<h5>フォロー／アンフォローボタン</h5>

<p>フォロー／アンフォローボタンを表示する部分を共通の View として用意しましょう。</p>

<p><em>resources/views/user_follow/follow_button.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@if (Auth::id() != $user-&gt;id)
    @if (Auth::user()-&gt;is_following($user-&gt;id))
        {!! Form::open(['route' =&gt; ['user.unfollow', $user-&gt;id], 'method' =&gt; 'delete']) !!}
            {!! Form::submit('Unfollow', ['class' =&gt; "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' =&gt; ['user.follow', $user-&gt;id]]) !!}
            {!! Form::submit('Follow', ['class' =&gt; "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif
</pre></div>
</div>
</div>

<p>これを <code>@include</code> すると、フォローボタンをクリックすることが可能になります。既にフォローしている場合にはアンフォローボタンになります。また、自分自身の場合には表示されません。</p>

<h5>フォロー／アンフォローボタンの設置</h5>

<p>users.show にボタンを設置しましょう。</p>

<p><em>resources/views/users/show.blade.php 抜粋</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        &lt;aside class="col-sm-4"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;
                    &lt;h3 class="card-title"&gt;{{ $user-&gt;name }}&lt;/h3&gt;
                &lt;/div&gt;
                &lt;div class="card-body"&gt;
                    &lt;img class="rounded img-fluid" src="{{ Gravatar::src($user-&gt;email, 500) }}" alt=""&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            @include('user_follow.follow_button', ['user' =&gt; $user])
        &lt;/aside&gt;
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-10-4">10.4 UsersController@followings, followers
</h3><h4>Controller</h4>

<p>こちらは Userの情報を取得できれば良いので、<em>UsersController</em> へ記述します。</p>

<p><em>app/Http/Controllers/UsersController.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">namespace</span> <span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Controllers</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Http</span>\<span class="constant">Request</span>;

<span class="keyword">use</span> <span class="constant">App</span>\<span class="constant">User</span>;
<span class="keyword">use</span> <span class="constant">App</span>\<span class="constant">Micropost</span>; <span class="comment">// 追加</span>

<span class="keyword">class</span> <span class="class">UsersController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{

    <span class="comment">// 中略</span>

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">followings</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$user</span> = <span class="constant">User</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$followings</span> = <span class="local-variable">$user</span>-&gt;followings()-&gt;paginate(<span class="integer">10</span>);

        <span class="local-variable">$data</span> = [
            <span class="string"><span class="delimiter">'</span><span class="content">user</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$user</span>,
            <span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$followings</span>,
        ];

        <span class="local-variable">$data</span> += <span class="local-variable">$this</span>-&gt;counts(<span class="local-variable">$user</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">users.followings</span><span class="delimiter">'</span></span>, <span class="local-variable">$data</span>);
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">followers</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$user</span> = <span class="constant">User</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$followers</span> = <span class="local-variable">$user</span>-&gt;followers()-&gt;paginate(<span class="integer">10</span>);

        <span class="local-variable">$data</span> = [
            <span class="string"><span class="delimiter">'</span><span class="content">user</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$user</span>,
            <span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$followers</span>,
        ];

        <span class="local-variable">$data</span> += <span class="local-variable">$this</span>-&gt;counts(<span class="local-variable">$user</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">users.followers</span><span class="delimiter">'</span></span>, <span class="local-variable">$data</span>);
    }
}
</pre></div>
</div>
</div>

<h4>View</h4>

<p>ユーザの詳細情報表示( <code>users.show</code> )、自分がフォローしているUser一覧( <code>followings</code> )、自分をフォローしているUser一覧( <code>followers</code> )には共通している部分があるので、まずは共通部分（ユーザ名と Gravatarの表示部分、ナビゲーションタブの部分）を切り出しましょう。また、ナビゲーションタブの方に followings と followers のリンクを追記します。</p>

<p><em>resources/views/users/card.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;div class="card"&gt;
    &lt;div class="card-header"&gt;
        &lt;h3 class="card-title"&gt;{{ $user-&gt;name }}&lt;/h3&gt;
    &lt;/div&gt;
    &lt;div class="card-body"&gt;
        &lt;img class="rounded img-fluid" src="{{ Gravatar::src($user-&gt;email, 500) }}" alt=""&gt;
    &lt;/div&gt;
&lt;/div&gt;
@include('user_follow.follow_button', ['user' =&gt; $user])
</pre></div>
</div>
</div>

<p><em>resources/views/users/navtabs.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;ul class="nav nav-tabs nav-justified mb-3"&gt;
    &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.show', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/' . $user-&gt;id) ? 'active' : '' }}"&gt;TimeLine &lt;span class="badge badge-secondary"&gt;{{ $count_microposts }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
    &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.followings', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"&gt;Followings &lt;span class="badge badge-secondary"&gt;{{ $count_followings }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
    &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.followers', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"&gt;Followers &lt;span class="badge badge-secondary"&gt;{{ $count_followers }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
</pre></div>
</div>
</div>

<p>では followings と followers の View を作成していきます。</p>

<h5>followings</h5>

<p><em>resources/views/users/followings.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="row"&gt;
        &lt;aside class="col-sm-4"&gt;
            &lt;div class="card"&gt;
                &lt;div class="card-header"&gt;
                    &lt;h3 class="card-title"&gt;{{ $user-&gt;name }}&lt;/h3&gt;
                &lt;/div&gt;
                &lt;div class="card-body"&gt;
                    &lt;img class="rounded img-fluid" src="{{ Gravatar::src($user-&gt;email, 500) }}" alt=""&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            @include('user_follow.follow_button', ['user' =&gt; $user])
        &lt;/aside&gt;
        &lt;div class="col-sm-8"&gt;
            &lt;ul class="nav nav-tabs nav-justified mb-3"&gt;
                &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.show', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/' . $user-&gt;id) ? 'active' : '' }}"&gt;TimeLine &lt;span class="badge badge-secondary"&gt;{{ $count_microposts }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.followings', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"&gt;Followings &lt;span class="badge badge-secondary"&gt;{{ $count_followings }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a href="{{ route('users.followers', ['id' =&gt; $user-&gt;id]) }}" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"&gt;Followers &lt;span class="badge badge-secondary"&gt;{{ $count_followers }}&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            @include('users.users', ['users' =&gt; $users])
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<h5>followers</h5>

<p><em>resources/views/users/followers.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="row"&gt;
        &lt;aside class="col-sm-4"&gt;
            @include('users.card', ['user' =&gt; $user])
        &lt;/aside&gt;
        &lt;div class="col-sm-8"&gt;
            @include('users.navtabs', ['user' =&gt; $user])
            @include('users.users', ['users' =&gt; $users])
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<p>この2つは現状、まったく同じ内容ですが、将来的に表示内容を少し異なる形にすることもできるよう、ファイルを分けています。</p>

<p>さらに ユーザ詳細 の View も共通化したものを <code>@include</code> するように変更しましょう。</p>

<h5>User@show</h5>

<p><em>resources/views/users/show.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    &lt;div class="row"&gt;
        &lt;aside class="col-sm-4"&gt;
            @include('users.card', ['user' =&gt; $user])
        &lt;/aside&gt;
        &lt;div class="col-sm-8"&gt;
            @include('users.navtabs', ['user' =&gt; $user])
            @if (Auth::id() == $user-&gt;id)
                {!! Form::open(['route' =&gt; 'microposts.store']) !!}
                    &lt;div class="form-group"&gt;
                        {!! Form::textarea('content', old('content'), ['class' =&gt; 'form-control', 'rows' =&gt; '2']) !!}
                        {!! Form::submit('Post', ['class' =&gt; 'btn btn-primary btn-block']) !!}
                    &lt;/div&gt;
                {!! Form::close() !!}
            @endif
            @if (count($microposts) &gt; 0)
                @include('microposts.microposts', ['microposts' =&gt; $microposts])
            @endif
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-10-5">10.5 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'follow, unfollow'
</code></pre>
</div></section><section id="chapter-11"><h2 class="index">11. タイムラインの表示
</h2><div class="subsection"><p>Twitter のトップのタイムラインページでは、自分がフォローしたユーザの投稿も表示されていますよね。</p>

<p>Twitterクローンの最後の学習内容として、 <em>welcome</em> にフォローしたユーザのマイクロポストも表示させる機能を追加します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-1">11.1 User モデルに機能追加
</h3><p>タイムライン用のマイクロポストを取得するためのメソッドを実装します。<code>is_following()</code> の下に追記してください。</p>

<p><em>app/User.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">User</span> <span class="keyword">extends</span> <span class="constant">Authenticatable</span>
{
    <span class="comment">// 中略</span>

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">feed_microposts</span>()
    {
        <span class="local-variable">$follow_user_ids</span> = <span class="local-variable">$this</span>-&gt;followings()-&gt;pluck(<span class="string"><span class="delimiter">'</span><span class="content">users.id</span><span class="delimiter">'</span></span>)-&gt;toArray();
        <span class="local-variable">$follow_user_ids</span>[] = <span class="local-variable">$this</span>-&gt;id;
        <span class="keyword">return</span> <span class="constant">Micropost</span>::whereIn(<span class="string"><span class="delimiter">'</span><span class="content">user_id</span><span class="delimiter">'</span></span>, <span class="local-variable">$follow_user_ids</span>);
    }
}
</pre></div>
</div>
</div>

<p><code>$this-&gt;followings()-&gt;pluck('users.id')-&gt;toArray();</code> では User がフォローしている User の id の配列を取得しています。 <code>pluck()</code> は与えられた引数のテーブルのカラム名だけを抜き出す命令です。そして更に <code>toArray()</code> を実行して、通常の配列に変換しています。</p>

<p>次に <code>$follow_user_ids[] = $this-&gt;id;</code> で自分の id も追加しています。自分自身のマイクロポストも表示させるためです。</p>

<p>最後に <code>return Micropost::whereIn('user_id', $follow_user_ids);</code> で、 microposts テーブルの <code>user_id</code> カラムで <code>$follow_user_ids</code> の中にある ユーザid を含むもの全てを取得して return します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-2">11.2 MicropostsController@index
</h3><h4>Controller</h4>

<p>先ほど <code>User</code> モデルに追加した <code>feed_microposts()</code> を使うように変更します。</p>

<p><em>app/Http/Controllers/MicropostsController.php（indexアクションの部分のみ抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="local-variable">$data</span> = [];
        <span class="keyword">if</span> (\<span class="constant">Auth</span>::check()) {
            <span class="local-variable">$user</span> = \<span class="constant">Auth</span>::user();
            <span class="local-variable">$microposts</span> = <span class="local-variable">$user</span>-&gt;feed_microposts()-&gt;orderBy(<span class="string"><span class="delimiter">'</span><span class="content">created_at</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">desc</span><span class="delimiter">'</span></span>)-&gt;paginate(<span class="integer">10</span>);

            <span class="local-variable">$data</span> = [
                <span class="string"><span class="delimiter">'</span><span class="content">user</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$user</span>,
                <span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$microposts</span>,
            ];
        }
        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>, <span class="local-variable">$data</span>);
    }
</pre></div>
</div>
</div>

<p><code>$microposts = $user-&gt;microposts()-&gt;orderBy('created_at', 'desc')-&gt;paginate(10);</code> としていたのを <code>$microposts = $user-&gt;feed_microposts()-&gt;orderBy('created_at', 'desc')-&gt;paginate(10);</code> に変更しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-3">11.3 welcome.blade.php
</h3><p>最後に <em>welcome</em> を修正します。前のセクションで共通化した View を <code>@include</code> してください。</p>

<p><em>resources/views/welcome.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    @if (Auth::check())
        &lt;div class="row"&gt;
            &lt;aside class="col-sm-4"&gt;
                @include('users.card', ['user' =&gt; Auth::user()])
            &lt;/aside&gt;
            &lt;div class="col-sm-8"&gt;
                @if (Auth::id() == $user-&gt;id)
                    {!! Form::open(['route' =&gt; 'microposts.store']) !!}
                        &lt;div class="form-group"&gt;
                            {!! Form::textarea('content', old('content'), ['class' =&gt; 'form-control', 'rows' =&gt; '2']) !!}
                            {!! Form::submit('Post', ['class' =&gt; 'btn btn-primary btn-block']) !!}
                        &lt;/div&gt;
                    {!! Form::close() !!}
                @endif
                @if (count($microposts) &gt; 0)
                    @include('microposts.microposts', ['microposts' =&gt; $microposts])
                @endif
            &lt;/div&gt;
        &lt;/div&gt;
    @else
        &lt;div class="center jumbotron"&gt;
            &lt;div class="text-center"&gt;
                &lt;h1&gt;Welcome to the Microposts&lt;/h1&gt;
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' =&gt; 'btn btn-lg btn-primary']) !!}
            &lt;/div&gt;
        &lt;/div&gt;
    @endif
@endsection
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-11-4">11.4 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'timeline'
</code></pre>
</div></section><section id="chapter-12"><h2 class="index">12. Heroku
</h2><div class="subsection"><p>これから、作成した Microposts を Heroku にデプロイしていきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-1">12.1 Microposts のプロジェクトフォルダへ移動
</h3><p>まずは、Microposts のプロジェクトフォルダへ移動します。Microposts の Git を利用するためです。</p>

<pre><code>$ cd ~/environment/microposts/
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-2">12.2 Heroku へログイン
</h3><p>次に、ターミナル上で、Heroku にログインします。</p>

<pre><code>$ heroku login -i

Enter your Heroku credentials.
Email: Herokuに登録したメールアドレスを入力
Password: Herokuに登録したパスワードを入力
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-3">12.3 Heroku アプリを作成
</h3><p>Microposts の Heroku アプリを作成します。</p>

<pre><code>$ heroku create Herokuアプリ名
</code></pre>

<p>Herokuアプリ名は、他の人と重複できません。例えば、今筆者が <code>heroku create microposts</code> でHerokuアプリをを作ってしまえば、もう <code>microposts</code> という名前は使えません。</p>

<p>そのため、皆さんも独自の名前を付けてください（おさらいですが、Herokuアプリ名は、小文字、数字、<code>-</code>(ダッシュ)のみを含むことができ、先頭が文字である必要があります。大文字やアンダーバーを含めてしまうとエラーになりますのでご注意ください）。例えば、 <code>Herokuアカウント名-microposts</code> などにしてください。また、 <code>$ heroku create</code> だけでアプリ名を指定しないとランダムな単語の組み合わせによるアプリが作成されます。</p>

<h4>リモートリポジトリ heroku の確認</h4>

<p>Herokuアプリを作成したら、 git にリモートリポジトリとして <code>heroku</code> が作成されています。リモートリポジトリを確認してみましょう。</p>

<pre><code>$ git remote -v
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-4">12.4 Heroku 用設定ファイルを新規作成
</h3><p>Heroku アプリ用に <em>Procfile</em> というファイル名でファイルを作成し、下記のコードで保存してください。これは、どのサーバを使うかという指定になります。 今回は apache2 サーバを利用します。</p>

<p><em>Procfile</em></p>

<pre><code>web: vendor/bin/heroku-php-apache2 public/
</code></pre>

<h4>Git のコミットを最新に</h4>

<p><em>Procfile</em> を作成したら、Git のコミットを最新にしておきます。</p>

<pre><code>$ git add .

$ git commit -m 'Procfile'
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-5">12.5 デプロイ
</h3><p>では、一度デプロイしてみましょう。</p>

<p>登録されたリモートリポジトリ heroku に対して、 <code>git push</code> を行うと、そのままデプロイされます。何かファイルを更新したとしても、 <code>git commit</code> してから、<code>git push heroku master</code> するだけで、とても簡単にデプロイすることが可能です。</p>

<pre><code>$ git push heroku master
</code></pre>

<p>デプロイ中は少し待つ必要があります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-6">12.6 Heroku アプリを開く
</h3><p>では、Heroku アプリを開いてみましょう。</p>

<p>下記のように自分で設定した <code>Herokuアプリ名</code> の URL にアクセスしてみてください。</p>

<pre><code>https://Herokuアプリ名.herokuapp.com/
</code></pre>

<p>ただし、 <strong>エラーになる</strong> はずです。まだ環境変数などの設定を行っていないからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-7">12.7 Heroku アプリの環境変数の設定
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
</div><div class="subsection"><h3 class="index" id="chapter-12-8">12.8 データベースの設定
</h3><h4>データベースの作成</h4>

<p>Heroku の標準データベースは、MySQL ではなく、PostgreSQL です。基本的なデータベースとしての違いはありません。どちらも、今まで学んだ SQL が同じく動作します。</p>

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
</div><div class="subsection"><h3 class="index" id="chapter-12-9">12.9 マイグレーション
</h3><p><code>heroku run コマンド</code> で Heroku アプリ上でコマンドを実行することができます。先ほどまでの設定ができていれば、エラーなくマイグレーションが成功するでしょう。</p>

<p>なお、途中、<code>Do you really wish to run this command? (yes/no) [no]: &gt;</code> で止まった際は <code>yes</code> を入力してください。</p>

<pre><code>$ heroku run php artisan migrate

Running php artisan migrate on ⬢ laravel-microposts... up, run.1835 (Free)
**************************************
*     Application In Production!     *
**************************************

 Do you really wish to run this command? (yes/no) [no]:
 &gt; yes

Migration table created successfully.
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-10">12.10 動作確認
</h3><p>環境変数を設定し、マイグレーションを行ったので、ようやく正常に動くはずです。</p>

<p>もう一度下記のような URL で Heroku アプリを開いてみてください。</p>

<pre><code>https://Herokuアプリ名.herokuapp.com/
</code></pre>

<p>エラーが出ずに表示されれば、デプロイ成功です。</p>

<p>エラーが出た場合には、まずは対応した環境変数が設定されているか <code>heroku config</code> で確認してみてください。</p>
</div></section><section id="chapter-13"><h2 class="index">13. お気に入り機能
</h2><div class="subsection"><p>「フォロー／フォロワー」機能の構築で学んでもらった「多対多」の関係を活用して「Micropostをお気に入りに追加する」機能を課題として作ってもらいます。少し難しいかと思いますので、ここで改めて「多対多の関係」ならびに「本課題のヒント」について解説します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-1">13.1 お気に入り機能を構築する上でのヒント
</h3><h4>「ユーザ」と「お気に入り投稿」の関係は多対多</h4>

<p>投稿機能のときに見た User と Micropost の関係、つまり「ユーザ」と「ユーザが投稿した内容」の関係は一対多でした。1人の User は複数の Micropost を持てるものの、1つの Micropost が所属する User はたった1人です。このような関係は一対多になります。</p>

<p>しかし今回の User と Micropost の関係は異なります。下の図を見てください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/twitter-clone/nvsn.png" alt=""></p>

<p>ここで考える User と Micropost の関係は「ユーザ」と「<strong>ユーザがお気に入りに追加した</strong> 投稿内容」の関係です。TwitterクローンのWebアプリケーションには多くのユーザが多くの投稿をしています。1人のユーザは数多ある投稿内容から何個でもお気に入りに追加できます。1つの投稿内容は複数のユーザからお気に入りに追加される可能性があります。</p>

<p>よって、「ユーザ」と「ユーザがお気に入りに追加した投稿内容」という関係で見たときの User と Micropost は <strong>多対多</strong> になるのです。</p>

<h4>多対多の関係では中間テーブルを用意する必要がある</h4>

<p>ユーザのフォロー機能で学んだように、多対多の関係では <strong>中間テーブル</strong> を用意します。今回作りたい機能がお気に入り機能なのでテーブル名は <code>favorites</code> のような名前で良いでしょう。</p>

<p>中間テーブルには、お馴染みの <code>id</code> や <code>timestamps()</code> の他、関係するテーブルのIDを格納するカラムが2つ必要です。今回は User と Micropost の関係なので <code>user_id</code> と <code>micropost_id</code> を追加しましょう。先ほどの図にある中間テーブルでは左側が <code>user_id</code>、右側が <code>micropost_id</code> になります。たとえば <code>[ 1 | 2 ]</code> となっているレコードは「 <code>user_id</code> が 1 のユーザは <code>micropost_id</code> が 2 の投稿内容をお気に入りに追加した」もしくは「 <code>micropost_id</code> が 2 の投稿内容は <code>user_id</code> が 1 のユーザからお気に入りに追加された」という意味合いになります。</p>

<p>他にも、<code>user_id</code> と <code>micropost_id</code> のそれぞれに外部キー制約をつけたり、<code>user_id</code> と <code>micropost_id</code> の組み合わせの重複を許さない制約をつけたりする必要があるでしょう。</p>

<p>以上の内容でマイグレーション用のファイルを作成し、マイグレーションを実行してください。</p>

<h4>ユーザが追加したお気に入りの数と一覧を取得する機能の構築</h4>

<p>ここではお気に入りを追加・削除する機能だけでなく「あるユーザが追加したお気に入りの一覧と数」を取得してもらいたいと思います。</p>

<p>お気に入りの一覧を取得する機能は User モデルに <code>favorites()</code> のような名前の関数を用意し、<code>belongsToMany()</code> を指定すると良いでしょう。また、お気に入りの数の取得は Controller クラス( app/Http/Controllers/Controller.php )の中で定義し、全ての Controller で利用できるようにすると便利です。</p>

<p>なお、多対多の関係を正確に記述するため、Micropost モデルにも <code>favorite_users()</code> のような名前の関数を用意して <code>belongsToMany()</code> を指定してください。</p>

<h4>お気に入りに関するアクションとビューの作成</h4>

<p>お気に入りに関する機能としては、以下の内容が必要です。</p>

<ol>
  <li>ユーザが追加したお気に入りを一覧表示するページ</li>
  <li>ユーザが特定の投稿内容をお気に入りに追加する機能</li>
  <li>ユーザがお気に入りを削除する機能</li>
</ol>

<p>1 は User モデルの <code>favorites()</code> から一覧の取得ができるので UsersController にアクションを追加すれば良いでしょう。Viewの作成も必要です。部品化したbladeファイルを利用しましょう。また、ナビゲーションタブに1つタブを追加し、Followings や Followers と同じように 「お気に入り一覧へのリンク」と「お気に入りの数」を表示してください。</p>

<p>2 と 3については中間テーブルを操作することになるので FavoritesController のような名前の Controller を新規作成し、そこに該当のアクションを追加してください。データの登録／削除を実行するアクションですので、View は不要です( <code>back()</code> で戻ればOKです )。実際の中間テーブルへのデータ登録／削除は User モデルに <code>favorite()</code> や <code>unfavorite()</code> のような名前の関数を作成して、そこに構築してください。その際、既にお気に入りに追加している Micropost かどうかを調べる処理が必要です。</p>

<p>ルーティングの設定も忘れないようにしましょう。今回の場合、URLで渡したいIDは Micropost のIDになるので、以下のようにフォロー／フォロワーのものとは違う新しい Group を auth グループの中に用意すると良いでしょう。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">middleware</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">auth</span><span class="delimiter">'</span></span>]], <span class="keyword">function</span> () {
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">index</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">show</span><span class="delimiter">'</span></span>]]);

    <span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">prefix</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">users/{id}</span><span class="delimiter">'</span></span>], <span class="keyword">function</span> () {
        <span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">follow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UserFollowController@store</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">user.follow</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::<span class="predefined">delete</span>(<span class="string"><span class="delimiter">'</span><span class="content">unfollow</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UserFollowController@destroy</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">user.unfollow</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">followings</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController@followings</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">users.followings</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">followers</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController@followers</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">users.followers</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">favorites</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">UsersController@favorites</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">users.favorites</span><span class="delimiter">'</span></span>);    <span class="comment">// 追加</span>
    });

    <span class="comment">// 追加</span>
    <span class="constant">Route</span>::group([<span class="string"><span class="delimiter">'</span><span class="content">prefix</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">microposts/{id}</span><span class="delimiter">'</span></span>], <span class="keyword">function</span> () {
        <span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">favorite</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">FavoritesController@store</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">favorites.favorite</span><span class="delimiter">'</span></span>);
        <span class="constant">Route</span>::<span class="predefined">delete</span>(<span class="string"><span class="delimiter">'</span><span class="content">unfavorite</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">FavoritesController@destroy</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">favorites.unfavorite</span><span class="delimiter">'</span></span>);
    });
    
    <span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">microposts</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MicropostsController</span><span class="delimiter">'</span></span>, [<span class="string"><span class="delimiter">'</span><span class="content">only</span><span class="delimiter">'</span></span> =&gt; [<span class="string"><span class="delimiter">'</span><span class="content">store</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">destroy</span><span class="delimiter">'</span></span>]]);
});
</pre></div>
</div>
</div>

<p>あとは投稿一覧の各投稿のところに <code>favorite</code> や <code>unfavorite</code> のボタンを設置すればOKです。</p>

<h4>最後に</h4>

<p>ヒントの説明は以上です。これでもまだ難しいかもしれませんが <strong>フォロー／フォロワー機能で作成したソースコードは非常に参考になります</strong>。ぜひ頑張って「お気に入り機能」の構築に取り組んでみてください！</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-fav">課題：Micropostのお気に入り機能</h3><p>Micropost のお気に入り機能を追加してください。</p>

<p>以下に、仕様を述べます。</p>

<ul>
  <li>特定の Micropost をログインユーザがお気に入りリストに追加できるようにボタンを設置してください。なお、そのボタンは、既にお気に入りに追加したものに対しては、お気に入りを削除するボタンとなるように工夫してください。</li>
  <li>登録されている User がお気に入りに追加した Micropost を一覧表示するページを、ユーザー詳細ページのページタブに追記してください。</li>
  <li><code>トップページ</code> もしくは <code>ナビゲーションバー</code> のどちらか一方からで良いので、前述のお気に入り一覧ページにアクセスできるようにリンクを作成してください。</li>
</ul>

<p>下記は参考のレイアウトです。赤枠部分を参考に作成ください。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/laravel5.5/twitter-clone/challenge1.png" alt=""></p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/laravel5.5/twitter-clone/challenge2.png" alt=""></p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/laravel5.5/twitter-clone/challenge3.png" alt=""></p>

<p>（お気に入りボタンと投稿内容の削除（赤い Delete）ボタンは横並びにしなくても構いませんが、GridやFlexboxを利用すると上手く横並びになります。）</p>

<ul>
  <li>GitHub に <em>kadai-microposts</em> でリモートリポジトリを作成して、プッシュしてください。</li>
  <li>Herokuへデプロイしてください。</li>
</ul>
</div></section><section id="chapter-14"><h2 class="index">14. まとめ
</h2><div class="subsection"><p>今回作成した Microposts の大きな特徴と言えば、ログイン認証と、リレーション（一対多、多対多）です。</p>

<p>ログイン認証は、既に用意されていた RegisterController を使えば良かったですね。復習を兼ねて、下記の公式ドキュメントを一通り読んでおくことをお勧めします。このレッスンで学んでいないこともあるので、まずは学んだところだけでも構いません。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/authentication.html" target="_blank">認証</a></li>
</ul>

<p>また、リレーションは Model と Model の関係のことです。一対多か、多対多かによって作成方法が異なりました。特に、多対多のリレーションを作るには、中間テーブルと呼ばれるテーブルが必要でした。中間テーブルは、 Model と Model を結ぶためのテーブルです。余談ですが、 Laravel だけでなく、他の Rails や CakePHP と言った Web アプリケーションフレームワークでも考え方は同じで、リレーションのために中間テーブルを必要とします。</p>

<p>一対多、多対多のリレーションの作り方を一度わかってしまえば、 Web アプリケーションの開発はぐっと簡単になり、何でも作れるようになるでしょう。こちらも復習を兼ねて、下記の公式をドキュメントを一通り読んでおくことをお勧めします。このレッスンで学んでいないこともあるので、学んだところだけでも構いません。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent-relationships.html" target="_blank">リレーション</a></li>
</ul>

<p>ここまで学べば Laravel を使って Web アプリケーションを作成する方法がほぼわかったと思います。これでオリジナルサービスを開発することができます。</p>

<p>Twitterクローンに機能追加をしてみるのも良いでしょう。現状のTwitterクローンは、まだまだ改良の余地が残されています。Twitterクローンを拡張してみようと思った方は、以下の「Twitterクローン 拡張機能の一例」を参考にしてください。</p>

<p><em>Twitterクローン 拡張機能の一例</em></p>

<ul>
  <li>ツイート内容を編集する機能</li>
  <li>ユーザが自分の情報を編集する機能</li>
  <li>退会機能</li>
  <li>登録できるユーザ情報を増やす（年齢、プロフィールなど）</li>
  <li>権限つきの認証機能（一般、管理者、etc）
    <ul>
      <li>管理者によるユーザ管理機能</li>
      <li>権限によって使える機能を制限する制御</li>
    </ul>
  </li>
  <li>Gravatarを止め、Twitterクローンが動作するサーバにアップロードされた画像をアイコンに設定する仕様に変更</li>
</ul>

<p>さて、今後のWebアプリケーション開発において最も参考になるのは、当然のことながら、Laravel の公式ドキュメントです。プログラミングの資料の多くが英語で説明されている中、公式ドキュメントが日本語に翻訳されていることは幸運なことです。翻訳者には感謝しておきましょう。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/installation.html" target="_blank">公式ドキュメント</a></li>
</ul>

<p>更に Laravel を理解したい方や、少し疑問が残った方は、ぜひ上記の公式ドキュメントを読破してください。公式ドキュメントを読破した暁には、 Laravel の全容をより良く把握できることでしょう。</p>

<p>また、 Laravel API 検索サービスも大いに役に立ちます。公式ドキュメントだけでは理解に至らないケースもあるので、本質的に理解するには Laravel 本体のソースコードを読んでしまうのが一番です。</p>

<ul>
  <li><a href="https://laravel.com/api/5.5/index.html" target="_blank">Laravel API</a></li>
  <li><a href="https://github.com/laravel/framework/tree/5.5/src/Illuminate" target="_blank">Laravel - GitHub</a></li>
</ul>
</div></section></div>
</body>
</html>