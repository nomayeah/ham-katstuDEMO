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
<div class="markdown"><div class="lesson-num p"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">レッスン10</span></span></div><h1 id="php-mysql">PHPとMySQLの連携
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>このレッスンでは、これまでに学んだ PHP と MySQL を連携して、データを保存できるWebアプリケーションを作ってみたいと思います。連携をすれば、今までできなかった「Web上で送信したフォームデータを保存」することができます。これでようやくWebアプリケーションらしくなります。</p>

<p>プログラムとデータベースの連携は、Webアプリケーションだけではなく、スマートフォンアプリ、Windowsアプリ、Macアプリ、その他の色々なアプリケーションで大切なものです。多くのアプリケーションはユーザデータを扱うことになります。そのときに必ずプログラムとデータベースの連携が行われます。</p>

<p>それでは、プログラムとデータベースの連携というテーマを意識して、レッスンを進めていきましょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. 今回作成するWebアプリ
</h2><div class="subsection"><p>Booklist というWebアプリを作成します。本のタイトルをデータベースに登録（保存）して、一覧を表示するだけのごく単純なものです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/booklist.png" alt=""></p>
</div></section><section id="chapter-3"><h2 class="index">3. HTML で書いてみる
</h2><div class="subsection"><p>プログラムを書くときは、小さく作っては確認する作業が最も重要です。いきなり全部作ろうとしないことです。特に精通していない技術を扱う場合はまずは小さく開発を始めて、動作確認しながら慎重にいきましょう。</p>

<p>まずはHTMLで静的なWebページを書いてみましょう。今回作成する Web アプリケーションを<em>booklist.php</em>という名前にし、ワークスペース直下に保存します。</p>

<p><em><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">booklist.php</span></span></em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>Booklist<span class="tag">&lt;/title&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Booklist<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>書籍の登録フォーム<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline mb-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group mr-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">book_title</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">書籍タイトルを入力</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit_add_book</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
            <span class="tag">&lt;/form&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;hr</span> <span class="tag">/&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>登録された書籍一覧<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;ul&gt;</span>
                <span class="tag">&lt;li&gt;</span>はじめてのWebアプリケーション<span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;li&gt;</span>かんたん！PHPプログラミング<span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;li&gt;</span>PHP+MySQLで作るWebアプリケーション<span class="tag">&lt;/li&gt;</span>
            <span class="tag">&lt;/ul&gt;</span>
        <span class="tag">&lt;/div&gt;</span><font></span>
        <font></span>
        <span class="comment">&lt;!-- BootstrapなどのJavaScript --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.2.0/js/all.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>入力フォームと、そのリストだけの最も単純なWebアプリケーションです。</p>

<p>form要素の<code>action="booklist.php"</code>はフォームの送信先を自分自身(<em>booklist.php</em>)にするために指定しています。input要素のplaceholder属性(<code>placeholder="書籍タイトルを入力"</code>)はテキスト入力フォームの中に何を書けばいいのか、薄くグレーの文字を追加してわかりやすくしてくれます。また <code>required</code> 属性をつけておくと、空文字で送信できないようになります。</p>

<p>まずは上記の通り、<em>booklist.php</em>を作成して、Webサーバを起動して表示を確認しましょう。起動方法は <code>レッスン8 PHP その4</code> の「test.phpの起動方法」と全く同じです。</p>

<p><a href="./php-4#chapter-3-2" target="_blank">Webサーバの起動</a></p>

<p>まだ入力フォームのデータを送信しても対応するPHPプログラムを実装していないので、データは破棄されます。</p>
</div></section><section id="chapter-4"><h2 class="index">4. HTML内で動的な部分をPHPで置き換える
</h2><div class="subsection"><p>表示を確認したところで、次にHTML内で動的な部分をPHPで置き換えてみます。今回の場合、書籍一覧のli要素が動的な部分になります。</p>

<p><em>booklist.php (body部分のみ抜粋)</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;body</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Booklist<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>書籍の登録フォーム<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline mb-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group mr-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">book_title</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">書籍タイトルを入力</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit_add_book</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
            <span class="tag">&lt;/form&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;hr</span> <span class="tag">/&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>登録された書籍一覧<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;ul&gt;</span>
                <span class="tag">&lt;li&gt;</span>はじめてのWebアプリケーション<span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;li&gt;</span>かんたん！PHPプログラミング<span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;li&gt;</span>PHP+MySQLで作るWebアプリケーション<span class="tag">&lt;/li&gt;</span>
                <span class="inline-delimiter">&lt;?php</span> <span class="comment">// 登録された書籍タイトルの数だけループ 開始 </span><span class="inline-delimiter">?&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="comment">// print 書籍タイトル; </span><span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="inline-delimiter">&lt;?php</span> <span class="comment">// ループ 終了 </span><span class="inline-delimiter">?&gt;</span>
            <span class="tag">&lt;/ul&gt;</span>
        <span class="tag">&lt;/div&gt;</span><font></span>
        <font></span>
        <span class="comment">&lt;!-- BootstrapなどのJavaScript（ここでは省略） --&gt;</span><font></span>
        <font></span>
    <span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>MySQLと連携してデータをもらった上でループを回すことになるので、どんなループでプログラミングすればいいのかわかりません。ここでは一旦<code>&lt;?php // コメント ?&gt;</code>という形式で何をそこにプログラミングするかをわかるようにコメントしておくだけにしました。後ほど、登録された書籍タイトルの数だけループを回し、li要素をHTMLに埋め込めれば良いわけです。</p>

<p>ここでは、どこがPHPで動的になる部分なのか（書籍タイトル一覧のli要素）と、何のデータの保存が必要なのか（書籍タイトルの文字列データ）を確認することができました。</p>

<h5>開発用の確認コード</h5>

<p>開発しながら、フォームはちゃんと送信されているか？など頻繁に確認することになります。そういったときには開発中のときだけの確認コードを入れておけば簡単に動作確認が行えます。</p>

<p>今回の場合、フォームデータがちゃんと送信されているかを常に確認しておきたいので、最初に確認できるようにしました。</p>

<p><em>booklist.php(body部分のみ抜粋)</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;body</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// フォームデータ送受信確認用コード（本番では削除）</span>
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;div style="background-color: skyblue;"&gt;</span><span class="delimiter">'</span></span>;
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;p&gt;動作確認用:&lt;/p&gt;</span><span class="delimiter">'</span></span>;
    <span class="predefined">print_r</span>(<span class="predefined">$_POST</span>);
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;/div&gt;</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Booklist<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>書籍の登録フォーム<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline mb-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group mr-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">book_title</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">書籍タイトルを入力</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit_add_book</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
            <span class="tag">&lt;/form&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;hr</span> <span class="tag">/&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>登録された書籍一覧<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;ul&gt;</span>
                <span class="tag">&lt;li&gt;</span>はじめてのWebアプリケーション<span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;li&gt;</span>かんたん！PHPプログラミング<span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;li&gt;</span>PHP+MySQLで作るWebアプリケーション<span class="tag">&lt;/li&gt;</span>
                <span class="inline-delimiter">&lt;?php</span> <span class="comment">// 登録された書籍タイトルの数だけループ 開始 </span><span class="inline-delimiter">?&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="comment">// print 書籍タイトル; </span><span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="inline-delimiter">&lt;?php</span> <span class="comment">// ループ 終了 </span><span class="inline-delimiter">?&gt;</span>
            <span class="tag">&lt;/ul&gt;</span>
        <span class="tag">&lt;/div&gt;</span><font></span>
        <font></span>
        <span class="comment">&lt;!-- BootstrapなどのJavaScript（ここでは省略） --&gt;</span><font></span>
        <font></span>
    <span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>フォームを送信すると、<code>print_r($_POST);</code> に格納されたフォームデータが表示されています。できていなければ、この時点でどこかがNGです。まず一度自分の目で確認してみて、どうしても発見できなければメンターに早めに相談してみましょう。</p>
</div></section><section id="chapter-5"><h2 class="index">5. 必要に応じてデータベースのテーブルを作成する
</h2><div class="subsection"><p>このWebアプリケーションで保存する必要のあるデータは書籍タイトルです。フォームから送信された書籍タイトルを保存するためのデータベースを作成していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 データベースサーバの起動確認
</h3><pre><code>$ sudo service mysqld status
</code></pre>

<p>上記コマンドでMySQLサーバが起動しているか確認しましょう。<code>MySQL is running</code>と出ればMySQLサーバは起動しています。</p>

<p>もし停止しているようであれば、下記のコマンドを実行します。</p>

<pre><code>$ sudo service mysqld start
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 データベースへ接続
</h3><p>MySQLサーバの起動が確認できたので、<code>root</code>（全ての操作権限を持った管理者アカウント）でMySQLサーバへ接続します。</p>

<pre><code>$ mysql -u root
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 データベースの作成
</h3><p>まだ Booklist のデータベースを作成していませんので、データベースを作成します。</p>

<pre><code>mysql&gt; CREATE DATABASE booklist;
</code></pre>

<h4>booklistデータベース作成の確認</h4>

<p>下記コマンドでデータベースのリストを取得できるので、一覧に<code>booklist</code>があることを確認しておきましょう。</p>

<pre><code>mysql&gt; show databases;
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 テーブルの作成
</h3><p>次に Booklist で使用するテーブルを作成します。テーブルに必要なのは書籍タイトル(<code>book_title</code>)だけですが、主キーの役割を担う<code>id</code>と、並べ替えなどで必要な登録日時<code>created_at</code>もデータとして格納できるようにしましょう。</p>

<p>テーブル作成は複数行に渡るコマンドとなるので、ファイルを作成した方が良さそうです。下記SQLファイルをワークスペース直下に作成します。</p>

<p><em>create_table_booklist.sql</em></p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">CREATE</span> <span class="type">TABLE</span> booklist.books (<font></span>
    id <span class="predefined-type">INT</span> <span class="directive">AUTO_INCREMENT</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">PRIMARY</span> <span class="type">KEY</span>,<font></span>
    book_title <span class="predefined-type">VARCHAR</span>(<span class="integer">100</span>),<font></span>
    created_at <span class="predefined-type">TIMESTAMP</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">DEFAULT</span> CURRENT_TIMESTAMP<font></span>
);<font></span>
</pre></div>
</div>
</div>

<p>作成したファイルを実行するために、MySQLクライアントから上記ファイルを読み込むコマンド(<code>source ファイル名</code>)を実行します。</p>

<pre><code>mysql&gt; source ~/environment/create_table_booklist.sql
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 動作確認
</h3><p>とりあえずこのデータベースが動いているかテストしておきましょう。プログラミングでは早めに確認しておくことが重要です。色々とPHPのコードを書いた後で「データベースとPHPの連携機能が正常に動作しない」となると、書き上げたPHPのコードに原因があるのか、データベースの動作や設定に原因があるのか、わからなくなってしまいます。原因の特定を簡単にするには、早めの確認が大切なのです。</p>

<p>まずは、これから作業するデータベース(<code>booklist</code>)を指定(<code>USE</code>)します。</p>

<pre><code>mysql&gt; USE booklist;
</code></pre>

<p>データベースにテストデータを3レコード挿入します。</p>

<pre><code>mysql&gt; INSERT INTO booklist.books (book_title) VALUES("非エンジニアのためのプログラミング講座");<font></span>
mysql&gt; INSERT INTO booklist.books (book_title) VALUES("プログラミングPHP");<font></span>
mysql&gt; INSERT INTO booklist.books (book_title) VALUES("入門HTML5");<font></span>
</code></pre>

<p>テストデータが挿入されているか確認してみます。</p>

<pre><code>mysql&gt; SELECT * FROM booklist.books;
</code></pre>

<p>文字の位置ずれなどは日本語表示だと仕方ないところなので無視します。また、9時間前の時刻データが入っていますが、これはUTC（協定世界時）の設定になっているためです。JST（日本標準時）に設定を変更することもできますが、少し複雑な方法となってしまうためここでは諦めることにします。データベース上の全ての日時がUTC（JSTの9時間前）になっていると覚えておきましょう。</p>

<pre><code>+----+-----------------------------------------------------------+---------------------+<font></span>
| id | book_title                                                | created_at          |<font></span>
+----+-----------------------------------------------------------+---------------------+<font></span>
|  1 | 非エンジニアのためのプログラミング講座                    | 2016-10-17 05:58:53 |<font></span>
|  2 | プログラミングPHP                                         | 2016-10-17 06:19:06 |<font></span>
|  3 | 入門HTML5                                                 | 2016-10-17 06:19:16 |<font></span>
+----+-----------------------------------------------------------+---------------------+<font></span>
</code></pre>

<p>これでデータベースの操作に異常ないことを確認できたので、PHPと連携していきます。</p>
</div></section><section id="chapter-6"><h2 class="index">6. PHPとMySQLの連携
</h2><div class="subsection"><p>それではPHPとMySQLを連携していきましょう。連携してPHPプログラムの中でMySQLからデータを取得します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/bookshelf/8-1.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 PHPプログラムからMySQLとの通信手段を確保する
</h3><p>PHP から MySQL に接続する上で、今回は <strong>PDOオブジェクト</strong> を利用します。</p>

<p>データベースと連携したPHPプログラムを作る際、利用するデータベースソフトウェアによって使い方や関数名が大きく変わります。</p>

<ul>
  <li><a href="http://php.net/manual/ja/book.mysqli.php" target="_blank">MySQLを使う場合</a></li>
  <li><a href="http://php.net/manual/ja/book.pgsql.php" target="_blank">PostgreSQLを使う場合</a></li>
  <li><a href="http://php.net/manual/ja/book.sqlite3.php" target="_blank">SQLiteを使う場合</a></li>
</ul>

<p>もしデータベースソフトウェアをMySQLからPostgreSQLに変えるとなった場合、全てのMySQL用の命令をPostgreSQL用の命令に変更する必要が生じ、変更が大変です。そこで「PDO」を使います。PDO（PHP Data Objects）を使えば、MySQLからPostgreSQLに変えることになっても「何を使うか」の設定を変えるだけで済みます。関数までは書き換える必要ありません。</p>

<ul>
  <li><a href="http://php.net/manual/ja/pdo.connections.php" target="_blank">参考: PDOの接続、および接続の管理</a></li>
</ul>

<p><em>booklist.php</em>の先頭に、下記のコードのようにMySQLサーバと接続するPHPプログラムを追加しましょう。</p>

<p><em>booklist.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// MySQLサーバ接続に必要な値を変数に代入</span>
    <span class="local-variable">$username</span> = <span class="string"><span class="delimiter">'</span><span class="content">root</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$password</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;<font></span>
<font></span>
    <span class="comment">// PDO のインスタンスを生成して、MySQLサーバに接続</span>
    <span class="local-variable">$database</span> = <span class="keyword">new</span> <span class="constant">PDO</span>(<span class="string"><span class="delimiter">'</span><span class="content">mysql:host=localhost;dbname=booklist;charset=UTF8;</span><span class="delimiter">'</span></span>, <span class="local-variable">$username</span>, <span class="local-variable">$password</span>);<font></span>
<font></span>
    <span class="comment">// ここにMySQLを使ったなんらかの処理を書く</span><font></span>
<font></span>
    <span class="comment">// MySQLを使った処理が終わると、接続は不要なので切断する</span>
    <span class="local-variable">$database</span> = <span class="predefined-constant">null</span>;
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="comment">&lt;!-- 中略 --&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>上記コードを、段階を分けて解説していきます。</p>

<h4>MySQLサーバとの通信を確保</h4>

<p><em>抜粋なので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>   <span class="comment">// MySQLサーバ接続に必要な値を変数に代入</span>
    <span class="local-variable">$username</span> = <span class="string"><span class="delimiter">'</span><span class="content">root</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$password</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;<font></span>
<font></span>
    <span class="comment">// PDO のインスタンスを生成して、MySQLサーバに接続</span>
    <span class="local-variable">$database</span> = <span class="keyword">new</span> <span class="constant">PDO</span>(<span class="string"><span class="delimiter">'</span><span class="content">mysql:host=localhost;dbname=booklist;charset=UTF8;</span><span class="delimiter">'</span></span>, <span class="local-variable">$username</span>, <span class="local-variable">$password</span>);
</pre></div>
</div>
</div>

<p>上記コードでMySQLサーバとの通信を確保しています。今まではMySQLサーバに接続するためにターミナルから<code>mysql -u root</code> とコマンドを実行していましたが、今回はPHPから接続するため、コマンドの代わりに <code>new PDO('...')</code> を実行しています。コマンドのときには<code>-u root</code>と接続ユーザしか指定していませんでしたが、実際にはデフォルト値として接続先のIPには<code>localhost</code>、パスワードには ‘‘（空文字）が入っていました。生成した PDO インスタンス (<code>$database</code> に格納) には、MySQL との接続情報が確保されています。</p>

<p>PDOとは、phpがmysqlなどのデーターベースソフトと接続して、レコードの登録、編集、削除といった諸々のDBアクセスを可能にするPHPの拡張モジュールです。PHPをインストールすると、最初からバンドルされています。後に学ぶLaravelというフレームワークでは、Laravel独自で用意されている別のデータベース連携の仕組みを採用しており、本カリキュラムでもそちらの内容でアプリケーションを構築していくことになりますが、Laravelなどのフレームワークを使用しない場合に役に立つ拡張モジュールです。</p>

<h4>MySQLサーバとの接続を切断</h4>

<p><code>$database</code> が PDO のインスタンスとなっています。データベースとの接続が不要になった時点で、下記コードでデータベースとの通信を切断しています。</p>

<p><em>抜粋なので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// MySQLを使った処理が終わると、接続は不要なので切断する</span>
    <span class="local-variable">$database</span> = <span class="predefined-constant">null</span>;
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 通信した変数からSQLを実行する
</h3><p><em>booklist.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// MySQLサーバ接続に必要な値を変数に代入</span>
    <span class="local-variable">$username</span> = <span class="string"><span class="delimiter">'</span><span class="content">root</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$password</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;<font></span>
<font></span>
    <span class="comment">// PDO のインスタンスを生成して、MySQLサーバに接続</span>
    <span class="local-variable">$database</span> = <span class="keyword">new</span> <span class="constant">PDO</span>(<span class="string"><span class="delimiter">'</span><span class="content">mysql:host=localhost;dbname=booklist;charset=UTF8;</span><span class="delimiter">'</span></span>, <span class="local-variable">$username</span>, <span class="local-variable">$password</span>);<font></span>
<font></span>
    <span class="comment">// 実行するSQLを作成</span>
    <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">SELECT * FROM books ORDER BY created_at DESC</span><span class="delimiter">'</span></span>;
    <span class="comment">// SQLを実行する</span>
    <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;query(<span class="local-variable">$sql</span>);
    <span class="comment">// 結果レコード（ステートメントオブジェクト）を配列に変換する</span>
    <span class="local-variable">$records</span> = <span class="local-variable">$statement</span>-&gt;fetchAll();<font></span>
<font></span>
    <span class="comment">// ステートメントを破棄する</span>
    <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;
    <span class="comment">// MySQLを使った処理が終わると、接続は不要なので切断する</span>
    <span class="local-variable">$database</span> = <span class="predefined-constant">null</span>;
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="comment">&lt;!-- 中略 --&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><code>$database</code> を通してSQL文を実行するコードを追加しました。これで<code>$records</code>にはSELECT文を実行した結果が代入されます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// 実行するSQLを作成</span>
    <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">SELECT * FROM books ORDER BY created_at DESC</span><span class="delimiter">'</span></span>;
    <span class="comment">// SQLを実行する</span>
    <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;query(<span class="local-variable">$sql</span>);
    <span class="comment">// 結果レコード（ステートメントオブジェクト）を配列に変換する</span>
    <span class="local-variable">$records</span> = <span class="local-variable">$statement</span>-&gt;fetchAll();<font></span>
<font></span>
    <span class="comment">// ステートメントを破棄する</span>
    <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;
</pre></div>
</div>
</div>

<p><code>$statement = $database-&gt;query($sql);</code> で SQL が実行されます。また、<code>$statement</code> は加工可能で SQL も実行可能なので、放置しておくと意図せず SQL が実行される可能性があります。セキュリティの観点から、生成したステートメントは削除すべきで、そのためには <code>null</code> を代入することで無効化します。</p>

<p><code>$records</code> には下記データが入っているはずです。</p>

<pre><code>+----+-----------------------------------------------------------+---------------------+<font></span>
| id | book_title                                                | created_at          |<font></span>
+----+-----------------------------------------------------------+---------------------+<font></span>
|  3 | 入門HTML5                                                  | 2016-10-17 06:19:16 |<font></span>
|  2 | プログラミングPHP                                             | 2016-10-17 06:19:06 |<font></span>
|  1 | 非エンジニアのためのプログラミング講座                             | 2016-10-17 05:58:53 |<font></span>
+----+-----------------------------------------------------------+---------------------+<font></span>
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 SQLの実行結果を受け取って表示する
</h3><p><code>$records</code>を受け取ったので、レコードの数だけループを使って表示させてみましょう。</p>

<p><em>booklist.php(body部分のみ抜粋)</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;body</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// フォームデータ送受信確認用コード（本番では削除）</span>
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;div style="background-color: skyblue;"&gt;</span><span class="delimiter">'</span></span>;
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;p&gt;動作確認用:&lt;/p&gt;</span><span class="delimiter">'</span></span>;
    <span class="predefined">print_r</span>(<span class="predefined">$_POST</span>);
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;/div&gt;</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Booklist<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>書籍の登録フォーム<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline mb-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group mr-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">book_title</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">書籍タイトルを入力</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit_add_book</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
            <span class="tag">&lt;/form&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;hr</span> <span class="tag">/&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>登録された書籍一覧<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;ul&gt;</span>
<span class="inline-delimiter">&lt;?php</span>
    <span class="keyword">if</span> (<span class="local-variable">$records</span>) {
        <span class="keyword">foreach</span> (<span class="local-variable">$records</span> <span class="keyword">as</span> <span class="local-variable">$record</span>) {
            <span class="local-variable">$book_title</span> = <span class="local-variable">$record</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>];
<span class="inline-delimiter">?&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$book_title</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
<span class="inline-delimiter">&lt;?php</span><font></span>
        }<font></span>
    }<font></span>
?<span class="error">&gt;</span>
            <span class="tag">&lt;/ul&gt;</span>
        <span class="tag">&lt;/div&gt;</span><font></span>
        <font></span>
        <span class="comment">&lt;!-- BootstrapなどのJavaScript（ここでは省略） --&gt;</span><font></span>
        <font></span>
    <span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>下記コードをHTML内に埋め込みました。これで <code>$records</code>（SELECT文によって取得したレコードが入っている）に入っているレコードの数だけループさせてリスト項目を追加させています。下記コードでコメントとして、説明を加えているのでご確認ください。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// $recordsの存在を確認、なければループに入らない</span>
    <span class="keyword">if</span> (<span class="local-variable">$records</span>) {
        <span class="comment">// $recordsのレコードを1つずつ取り出して$recordに代入する</span>
        <span class="keyword">foreach</span> (<span class="local-variable">$records</span> <span class="keyword">as</span> <span class="local-variable">$record</span>) {
            <span class="comment">// $recordからbook_titleのカラムを取得して$book_titleに代入する</span>
            <span class="local-variable">$book_title</span> = <span class="local-variable">$record</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>];
<span class="inline-delimiter">?&gt;</span>
                    <span class="comment">&lt;!-- li要素内に$book_titleを出力する --&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$book_title</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
<span class="inline-delimiter">&lt;?php</span><font></span>
        }<font></span>
    }<font></span>
?<span class="error">&gt;</span>
            <span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><code>$records</code> の中身や <code>$statement</code> の中身が気になる方は、 <code>print_r()</code> で確認してみると良いでしょう。</p>

<p>これで、一覧表示は完成です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 書籍名登録フォームからデータを受け取る
</h3><div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline mb-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group mr-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">book_title</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">書籍タイトルを入力</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit_add_book</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
            <span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p>フォームのHTMLには上記のように書かれているので、このフォームは、自分自身のファイル(<code>action="booklist.php"</code> で設定)に向けて、POSTメソッド　(<code>method="POST"</code> で設定)　で、書籍タイトルデータを送信することがわかります。送信されたデータは、<code>name="book_title"</code>と書かれているため、PHPで <code>$_POST['book_title']</code> から書籍タイトルデータにアクセスできます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 受け取ったデータをデータベースに保存する
</h3><p>フォームから送られてきたデータを保存しましょう。</p>

<p><em>booklist.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// MySQLサーバ接続に必要な値を変数に代入</span>
    <span class="local-variable">$username</span> = <span class="string"><span class="delimiter">'</span><span class="content">root</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$password</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;<font></span>
<font></span>
    <span class="comment">// PDO のインスタンスを生成して、MySQLサーバに接続</span>
    <span class="local-variable">$database</span> = <span class="keyword">new</span> <span class="constant">PDO</span>(<span class="string"><span class="delimiter">'</span><span class="content">mysql:host=localhost;dbname=booklist;charset=UTF8;</span><span class="delimiter">'</span></span>, <span class="local-variable">$username</span>, <span class="local-variable">$password</span>);<font></span>
<font></span>
    <span class="comment">// フォームから書籍タイトルが送信されていればデータベースに保存する</span>
    <span class="keyword">if</span> (<span class="predefined">array_key_exists</span>(<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>)) {
        <span class="comment">// 実行するSQLを作成</span>
        <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">INSERT INTO books (book_title) VALUES(:book_title)</span><span class="delimiter">'</span></span>;
        <span class="comment">// ユーザ入力に依存するSQLを実行するので、セキュリティ対策をする</span>
        <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;prepare(<span class="local-variable">$sql</span>);
        <span class="comment">// ユーザ入力データ($_POST['book_title'])をVALUES(?)の?の部分に代入する</span>
        <span class="local-variable">$statement</span>-&gt;bindParam(<span class="string"><span class="delimiter">'</span><span class="content">:book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>]);
        <span class="comment">// SQL文を実行する</span>
        <span class="local-variable">$statement</span>-&gt;execute();
        <span class="comment">// ステートメントを破棄する</span>
        <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;<font></span>
    }<font></span>
<font></span>
    <span class="comment">// 実行するSQLを作成</span>
    <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">SELECT * FROM books ORDER BY created_at DESC</span><span class="delimiter">'</span></span>;
    <span class="comment">// SQL を実行する直前のステートメントを取得する</span>
    <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;query(<span class="local-variable">$sql</span>);
    <span class="comment">// ステートメントから SQL を実行し、レコードを取得する</span>
    <span class="local-variable">$records</span> = <span class="local-variable">$statement</span>-&gt;fetchAll();<font></span>
<font></span>
    <span class="comment">// ステートメントを破棄する</span>
    <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;
    <span class="comment">// MySQLを使った処理が終わると、接続は不要なので切断する</span>
    <span class="local-variable">$database</span> = <span class="predefined-constant">null</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>今回追加したデータ保存のためのSQLは下記の通りです。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// フォームから書籍タイトルが送信されていればデータベースに保存する</span>
    <span class="keyword">if</span> (<span class="predefined">array_key_exists</span>(<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>)) {
        <span class="comment">// 実行するSQLを作成</span>
        <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">INSERT INTO books (book_title) VALUES(:book_title)</span><span class="delimiter">'</span></span>;
        <span class="comment">// ユーザ入力に依存するSQLを実行するので、セキュリティ対策をする</span>
        <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;prepare(<span class="local-variable">$sql</span>);
        <span class="comment">// ユーザ入力データ($_POST['book_title'])をVALUES(?)の?の部分に代入する</span>
        <span class="local-variable">$statement</span>-&gt;bindParam(<span class="string"><span class="delimiter">'</span><span class="content">:book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>]);
        <span class="comment">// SQL文を実行する</span>
        <span class="local-variable">$statement</span>-&gt;execute();
        <span class="comment">// ステートメントを破棄する</span>
        <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;<font></span>
    }<font></span>
</pre></div>
</div>
</div>

<p>今回は一覧表示のときと違って、 SQL 文 (INSERT) を実行するときに、なんらかの値が必要です。その値は <code>book_title</code> でユーザがフォームで送信してきたデータです。そのため、<code>$sql = 'INSERT INTO books (book_title) VALUES(:book_title)';</code> としていて「 <code>:book_title</code> に値が入りますよ」と、あらかじめ決めています。</p>

<h4>prepare()</h4>

<p>ここで <code>prepare()</code> という関数が登場しました。実は、今まで利用してきた <code>query()</code> 関数は、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;prepare(<span class="local-variable">$sql</span>);
<span class="local-variable">$statement</span>-&gt;execute();
</pre></div>
</div>
</div>

<p>以上の2つの命令を一回で行う関数になっています。たとえば、下記のコードは、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;query(<span class="local-variable">$sql</span>);
<span class="local-variable">$records</span> = <span class="local-variable">$statement</span>-&gt;fetchAll();
</pre></div>
</div>
</div>

<p>次のように記述したのと同じです。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;prepare(<span class="local-variable">$sql</span>);
<span class="local-variable">$statement</span>-&gt;execute();
<span class="local-variable">$records</span> = <span class="local-variable">$statement</span>-&gt;fetchAll();
</pre></div>
</div>
</div>

<p>prepare という英単語は「準備する」という意味です。つまり、<code>$statement = $database-&gt;prepare($sql);</code> は、SQLの実行準備をしただけであり、まだ SQL は実行されません。<code>$statement-&gt;execute();</code> によって SQL は実行されます。そして、そのまま次の行の <code>$records = $statement-&gt;fetchAll();</code> で <code>$statement</code> オブジェクトから結果レコードを抽出して <code>$records</code> に配列として代入されます。</p>

<p>では、<code>prepare()</code> 関数で準備を行うことに何の意味があるのでしょうか。ここで、先ほどの、書籍データを保存するコードに戻ります。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">INSERT INTO books (book_title) VALUES(:book_title)</span><span class="delimiter">'</span></span>;
<span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;prepare(<span class="local-variable">$sql</span>);
<span class="local-variable">$statement</span>-&gt;bindParam(<span class="string"><span class="delimiter">'</span><span class="content">:book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>]);
<span class="local-variable">$statement</span>-&gt;execute();
</pre></div>
</div>
</div>

<p>上のコードで、<code>$statement = $database-&gt;prepare($sql);</code> というように <code>query()</code> ではなく、 <code>prepare()</code> でステートメントを取得しているのは、<strong><code>:book_title</code> に値を入れる必要があるから</strong> です。次の行の <code>bindParam()</code> を見てください。<code>bindParam()</code> により、SQL の <code>:book_title</code> に <code>$_POST['book_title']</code> の値が代入されます。これで必要な値が埋まったので、 <code>$statement-&gt;execute()</code> で SQL を実行すると、<code>INSERT INTO books (book_title) VALUES(ユーザが送信した書籍タイトル)</code> が実行されます。</p>

<p><code>query()</code> はSQLの実行まで一気に行う関数であるため、必要な値を入れる作業ができません。ここに <code>prepare()</code> 関数を使う意味があります。</p>

<p>さらに、なぜ、直接 <code>INSERT INTO books (book_title) VALUES($_POST['book_title'])</code> で実行しないのかというと、ユーザが送信したデータを直接 SQL 文に含めてしまうのは、 <strong>セキュリティ的にとても危険</strong> だからです。悪意あるユーザが、書籍タイトルを記入するフォームデータで、悪意ある SQL 文を送ってくると、どうなるでしょうか。場合によっては実行されてしまい、全データが漏洩してしまうことにもなりかねません。そうならないために、ユーザからのフォームデータには充分注意して、わざわざ <code>ステートメントを取得 → prepare() で準備 → bindParam() で値を格納 → execute() でSQLを実行</code> という手順を踏んでいるのです。</p>

<p>これで保存されたデータも表示されるようになったはずです。</p>

<h4>一覧表示のセキュリティ対策</h4>

<p>先ほど、 SQL のセキュリティ対策は行いましたが、一覧表示でも実はセキュリティ対策が必要です。Webアプリケーションには様々なセキュリティ対策が必要ですが、ここでは最低限のセキュリティ対策だけ行います。これだけは対策しておきましょうというのが、受け取ったテキストデータの無害化です。</p>

<p>下記は <code>$book_title</code> を表示しているコードですが、これも実は危険なコードです。なぜならユーザ入力をそのまま表示してしまっているからです。全てのユーザが善人ではありません。悪意を持ったユーザもいることを忘れないようにしておきましょう。では、どのような対策をするか、先に結論を言うと、ここでも <code>htmlspecialchars()</code> を使うのです。</p>

<p><em>PHPファイルに追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$book_title</span>; <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
</pre></div>
</div>
</div>

<p>以前のレッスンで、フォームから入力されたデータを <code>htmlspecialchars()</code> を使わずに表示させたため「赤字で表示される」のを体験しました。このあたりの話をもう少し踏み込んで解説します。</p>

<p>上記 <code>htmlspecialchars()</code> を使わないコードだと、悪意を持ったユーザは、 <code>book_title</code> （書籍タイトル）にHTMLタグを登録できます。赤字を表示するだけならかわいいものですが、ひどい場合だと <strong>JavaScriptのプログラムを登録するという攻撃をされてしまいます</strong> 。攻撃可能なプログラムの部分をセキュリティホールと呼びます。今、解説しているものは、<strong>クロスサイトスクリプティング（略して XSS）</strong>という有名な攻撃手段です。</p>

<p>具体的には、フォームの書籍タイトル入力に  <code>&lt;script&gt;confirm("悪意ある攻撃を受けますか？");&lt;/script&gt;</code> ←をコピーペーストして、書籍として登録したとします。すると、使っているブラウザによっては、登録した書籍タイトルを表示するときに「悪意ある攻撃を受けますか？」というアラートが出てきて怖い思いをすることになります。（補足：最近のChromeではXSSだと思われるJavaScriptは実行されないようになっているため、上記の <code>&lt;script&gt;</code> による確認はできません。）</p>

<p>このアラートはこのサイトを開発した私達にとっては、想定外の挙動です。サーバが乗っ取られた訳でもないのに <strong>この書籍を表示しようとしたユーザ全員に被害が及びます。</strong> また、先程のアラートを出すJavaScriptプログラムだと、単に怖い思いをするだけで済みますが、悪意を持ったユーザであれば、この程度のコードでは済まされず、<strong>IDやパスワードを盗み取る（セッションハイジャック）</strong> ようなJavaScriptプログラムを使用することでしょう。そうなると被害は甚大になります。</p>

<p>ここで問題なのは、<code>&lt;script&gt;...&lt;/script&gt;</code> のJavaScriptプログラムを <strong>表示ではなく実行してしまった</strong> ところにあります。<code>&lt;script&gt;</code> などの特別な意味を持つものがHTML上にあると、それを受け取ったブラウザはコード（タグ）として認識して実行してしまいます。そこで今後は悪意ある攻撃を無害化するために、<code>htmlspecialchars()</code> を使います。これでJavaScriptのコードを入力されても、実行させずにそのまま「ただの文字列」として埋め込むことができます。<code>htmlspecialchars()</code> 関数はHTMLやJavaScriptをプログラムとして実行されず、ただの文字列として表示する無害化のための関数です。</p>

<p><em>booklist.php(抜粋なので追記不要です)</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$book_title</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">'</span><span class="content">UTF-8</span><span class="delimiter">'</span></span>); <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
</pre></div>
</div>
</div>

<p>話が長くなりましたが、覚えておきたいのは、ユーザが常にこちらの想定通りの入力をしない場合があるという前提です。書籍タイトルというフォームはどんな文字列でも入力することできるので、悪意を持ったユーザであればJavaScriptプログラムを埋め込むことも可能だということです。</p>

<p>そのために、今回行ったようなユーザの入力を無害化するコードを、<strong>全てのユーザの入力を表示する箇所</strong> に入れておく必要があります。一部だけやればいいというものではなく、今回の無害化コード( <code>htmlspecialchars()</code> )はユーザ入力を表示する全ての箇所に必要になります。</p>
</div></section><section id="chapter-7"><h2 class="index">7. booklistの完成
</h2><div class="subsection"><p>最後に <em>booklist.php</em> のコード全文を掲載しますので、ここまで作った内容に問題がないか確認してください。なお、開発中の確認用として設けていた <code>print_r</code> の命令は削除しています。</p>

<p><em>booklist.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// MySQLサーバ接続に必要な値を変数に代入</span>
    <span class="local-variable">$username</span> = <span class="string"><span class="delimiter">'</span><span class="content">root</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$password</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;<font></span>
<font></span>
    <span class="comment">// PDO のインスタンスを生成して、MySQLサーバに接続</span>
    <span class="local-variable">$database</span> = <span class="keyword">new</span> <span class="constant">PDO</span>(<span class="string"><span class="delimiter">'</span><span class="content">mysql:host=localhost;dbname=booklist;charset=UTF8;</span><span class="delimiter">'</span></span>, <span class="local-variable">$username</span>, <span class="local-variable">$password</span>);<font></span>
<font></span>
    <span class="comment">// フォームから書籍タイトルが送信されていればデータベースに保存する</span>
    <span class="keyword">if</span> (<span class="predefined">array_key_exists</span>(<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>)) {
        <span class="comment">// 実行するSQLを作成</span>
        <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">INSERT INTO books (book_title) VALUES(:book_title)</span><span class="delimiter">'</span></span>;
        <span class="comment">// ユーザ入力に依存するSQLを実行するので、セキュリティ対策をする</span>
        <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;prepare(<span class="local-variable">$sql</span>);
        <span class="comment">// ユーザ入力データ($_POST['book_title'])をVALUES(?)の?の部分に代入する</span>
        <span class="local-variable">$statement</span>-&gt;bindParam(<span class="string"><span class="delimiter">'</span><span class="content">:book_title</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>]);
        <span class="comment">// SQL文を実行する</span>
        <span class="local-variable">$statement</span>-&gt;execute();
        <span class="comment">// ステートメントを破棄する</span>
        <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;<font></span>
    }<font></span>
<font></span>
    <span class="comment">// 実行するSQLを作成</span>
    <span class="local-variable">$sql</span> = <span class="string"><span class="delimiter">'</span><span class="content">SELECT * FROM books ORDER BY created_at DESC</span><span class="delimiter">'</span></span>;
    <span class="comment">// SQLを実行する</span>
    <span class="local-variable">$statement</span> = <span class="local-variable">$database</span>-&gt;query(<span class="local-variable">$sql</span>);
    <span class="comment">// 結果レコード（ステートメントオブジェクト）を配列に変換する</span>
    <span class="local-variable">$records</span> = <span class="local-variable">$statement</span>-&gt;fetchAll();<font></span>
<font></span>
    <span class="comment">// ステートメントを破棄する</span>
    <span class="local-variable">$statement</span> = <span class="predefined-constant">null</span>;
    <span class="comment">// MySQLを使った処理が終わると、接続は不要なので切断する</span>
    <span class="local-variable">$database</span> = <span class="predefined-constant">null</span>;
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>Booklist<span class="tag">&lt;/title&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Booklist<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>書籍の登録フォーム<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">booklist.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline mb-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group mr-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">book_title</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">書籍タイトルを入力</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit_add_book</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
            <span class="tag">&lt;/form&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;hr</span> <span class="tag">/&gt;</span><font></span>
            <font></span>
            <span class="tag">&lt;h2&gt;</span>登録された書籍一覧<span class="tag">&lt;/h2&gt;</span>
            <span class="tag">&lt;ul&gt;</span>
<span class="inline-delimiter">&lt;?php</span>
    <span class="keyword">if</span> (<span class="local-variable">$records</span>) {
        <span class="keyword">foreach</span> (<span class="local-variable">$records</span> <span class="keyword">as</span> <span class="local-variable">$record</span>) {
            <span class="local-variable">$book_title</span> = <span class="local-variable">$record</span>[<span class="string"><span class="delimiter">'</span><span class="content">book_title</span><span class="delimiter">'</span></span>];
<span class="inline-delimiter">?&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$book_title</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
<span class="inline-delimiter">&lt;?php</span><font></span>
        }<font></span>
    }<font></span>
?<span class="error">&gt;</span>
            <span class="tag">&lt;/ul&gt;</span>
        <span class="tag">&lt;/div&gt;</span><font></span>
        <font></span>
        <span class="comment">&lt;!-- BootstrapなどのJavaScript --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.2.0/js/all.js</span><span class="delimiter">"</span></span> <span class="attribute-name">integrity</span>=<span class="string"><span class="delimiter">"</span><span class="content">sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy</span><span class="delimiter">"</span></span> <span class="attribute-name">crossorigin</span>=<span class="string"><span class="delimiter">"</span><span class="content">anonymous</span><span class="delimiter"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">"</span></span></span></span><span class="tag"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> &gt; </span></span></span><span class="tag"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&lt;/ script&gt; </span></span></span>
    <span class="tag"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&lt;/ body&gt; </span></span></span>
<span class="tag"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&lt;/ html&gt;</span></span></span>
</pre></div>
</div>
</div>
</div></section><section id="chapter-8"><h2 class="index">8. まとめ
</h2><div class="subsection"><p>このレッスンでは、PHP と MySQL の連携方法を学びました。ここまで学べば、一般的な Web アプリケーションとしての機能は実現することができます。もう、データの保存と、それを表示する術を知っているからです。</p>

<p>ただし、今ではもっと便利で効率的に Web アプリケーションが作成できる Laravel があるので、そちらを学ぶほうが良いでしょう。</p>

<div class="alert alert-warning">
このレッスンで作成したファイルは、 <i>php-mysql</i> フォルダを作成してその中に入れておきましょう。今後もファイルを作成していくので、今のうちに整理してください。以降のレッスンで作成するファイルも新しくフォルダを作成して整理しておくと良いでしょう。
</div>
</div></section></div>
</body>
</html>