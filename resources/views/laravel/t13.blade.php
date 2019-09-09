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
<div class="markdown"><div class="lesson-num p">Lesson13</div><h1 id="message-board">メッセージボード
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>ここまでのレッスンで、既にWebアプリケーションの基礎は学んできました。しかし、これまでは場当たり的なコーディングルールで開発を行ってきました。例えば、PHP+MySQLで開発したWebアプリケーションは1ファイルで構成され、その中に様々な役割の処理（フォームデータの処理、SQL、表示など）が書かれており、全く役割分担できていない状態でした。つまり、ルール無用であり、管理するファイルが多くなれば、見通しが悪くなり、規模が大きくなるとすぐに非効率になる開発方法でした。</p>

<p>ここからようやく、Laravelを使用した最新の開発環境でWebアプリケーションを作成していきます。</p>

<p>Laravelを使うと効率的にWebアプリケーション開発を行うことができます。なぜなら、一定のルールやファイルの役割が決まっているからです。Laravelのルールに則って開発していけば、役割分担が適切になされ、見通しの良いWebアプリケーションとして動作します。その意味で、規模が大きくなっても耐え得ます。また、それだけでなく、生のPHPでは長々と書く必要があった処理もすんなり書くことができ、素早く、そして高度なアプリケーションを開発することができます。</p>

<p>しかし、その分Laravelの使い方を学ぶための学習コスト（ルールを学ぶコスト）が当然かかってきます。ここから先のレッスンではLaravelという大きなフレームワークを利用して、効率的かつ高度なWebアプリケーションを開発するためのルールを学んでいきます。</p>

<p>このレッスンの内容を全て理解してから次のレッスンへと進んでください。このレッスンで学んだことが曖昧な状態で次のレッスンに進むと、間違いなく、わけがわからなくなります。まずはこのレッスンの課題を自力で開発できるようになってください。次に進むのはそれができてからのほうが良いでしょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. Laravelを使用したWebアプリケーションの基本
</h2><div class="subsection"><p>最初に述べたように、Laravelを使用すると、効率的かつ高度なWebアプリケーション開発が可能です。ただし、そのためのルールをしっかりと学ぶ必要があります。</p>

<p>そもそもWebアプリケーションとは何か、から考えていきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Webアプリケーションとは
</h3><p>今まで、HTML/CSS, PHP, MySQLと学んできましたが、Webアプリケーションとは一体何でしょうか？</p>

<p>Webアプリケーションとは、<strong>ユーザが HTTP リクエストの4つの CRUD メソッド(POST, GET, PUT, DELETE)を使って、Web上のリソースを操作できるアプリケーション</strong> のことです。これを絶対に忘れないようにしてください。忘れてしまうと、自分が何をやっているのかわからなくなってしまいます。そうなったときには、いつでもこの説明に戻ってきてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/webapp.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 Web上のリソースとは
</h3><p>さて、 <em>Web上のリソース</em> とは何でしょうか？</p>

<p>答えはWebページに表示されているもの全てです。</p>

<p>ただし、ユーザに変更が許可されているものと、そうでないものとがあります。例えば、TwitterやFacebookでユーザの変更が許可されているリソースとは何でしょうか？それはツイートや、コメントです。他にもプロフィールだったり、投稿画像だったり、様々があります。しかし、TwitterやFacebookのロゴや、メニューの変更は許可されていません（そもそも操作できるようにはなっていませんが）。</p>

<p>したがって、変更が許可されていないリソースに関しては、読み込み操作（Read, HTTPメソッドとしてはGET）しかできません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 URLとは
</h3><p>Web上のリソースは、URLによって位置を特定されます。URL(Uniform Resource Locator)のRはリソースです。URLはその名の通り、リソースの位置指定のために使用されています。同じ意味としてURIとも呼ばれます。</p>

<p>Webアプリケーションをブラウザから使う際、ブラウザは指定のURLに対してHTTPリクエストメソッドを送ります。そうすることで、リソースを操作できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-4">2.4 Laravelとは
</h3><p>Laravelは、Webアプリケーションを効率的かつ高度に開発できるWebアプリケーションフレームワークです。更にセキュリティにも気を配られており、安全とも言えます。</p>

<p><a href="https://laravel.com/" target="_blank">参考：Laravel公式サイト</a></p>

<p>また、LaravelはPHPで作られているので、Laravelを使ってWebアプリケーションを構築する際は、必然的にPHPを使用して開発していくことになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-5">2.5 Webアプリケーションフレームワークとは
</h3><p>Webアプリケーションについては説明済みです。では、Webアプリケーションフレームワークとは何でしょうか。</p>

<p>Webアプリケーションフレームワークは、Webアプリケーションの土台となるプログラムのことです。Web開発を何度か経験しているとわかりますが、似た処理というのがいくつも出てきます。Web開発における共通処理をまとめあげたものがWebアプリケーションフレームワークとなります。共通処理を書かなくて良いので、労力が削減され効率的に開発できるのです。</p>

<p>また、ライブラリとフレームワークの違いを知っておくことも重要です。ライブラリが「ユーザの書いたプログラムによって <strong>呼び出される</strong> 」側なのに対して、フレームワークは「ユーザの書いたプログラムを <strong>呼び出す</strong> 側ということです。つまり、ライブラリはユーザの意思によって取り出す便利な道具（ライブラリをどう使うかはユーザ次第）です。しかし、フレームワークは取り出し可能な便利道具という範疇ではなく、フレームワークという巨大な土台（ルール）の上でユーザプログラムが動くため、ユーザはフレームワークのルールに沿って開発をしていかねばなりません。</p>

<p>なお、ここでいうユーザとは、開発者のことです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/framework.png" alt=""></p>

<p>ライブラリと比較すると、制御の逆転（主従の逆転）が起こっています。なんだか「フレームワークにプログラムを書かされている」かのような表現をしていますが、まさにそうなのです。そのおかげで、複数人の開発者がいてもだいたい同じような書き方でWebアプリケーションが開発できます。つまり、フレームワークを使えば、大規模開発も効率的というわけです。</p>

<p>Webアプリケーションフレームワークには、 Laravel だけでなく CakePHP や FuelPHP、PHP以外の言語のフレームワークを含めるなら Rails や Django、Spring など様々に存在します。しかし、根本的な構造はどれもだいたい同じです。それぞれフレームワークとしての設計思想は異なるものの、どれもWebアプリケーションが作れるものなので、根本的な部分や利用可能な共通処理はどれも変わりません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-6">2.6 Laravelのリクエストからレスポンスまで
</h3><p>これから Laravel を学んでいきますが、 Laravel は Web の一連の流れのどこに位置するのかというと、 Web サーバの中です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/laravel.png" alt=""></p>

<p>今まで、ここには単なる PHP プログラムがありましたが、それが Laravel というフレームワークで構成されるようになります。開発者は、 Laravel 上に PHP プログラムを書き、それが Web アプリケーションとして実行されます。</p>

<p>では、Laravel内でどのような流れで処理が伝搬していくのか見てみましょう。</p>

<h4>MVC</h4>

<p>下記に、一連の流れを表した図があります。</p>

<p>Laravel には <strong>MVC</strong> という<strong>役割分担</strong>の構造があります。 MVC は</p>

<ul>
  <li>Model</li>
  <li>View</li>
  <li>Controller</li>
</ul>

<p>の略です。Web アプリケーションフレームワークの多くは、この MVC の形をしています。 Router も重要ですが、 MVC と呼ばれます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/mvc.png" alt=""></p>

<p><em>それぞれが持つ役割</em></p>

<ul>
  <li>リクエストを受け取って、URLとHTTPメソッドから適切な Controller を選び出し、リクエストデータを渡すのが Router（ルータ）です。</li>
  <li>リソース（データ）に処理を施すために必要なのが Model（モデル）です。</li>
  <li>Model を表示・整形する雛形が View（ビュー）です。多くの場合 HTML です。</li>
  <li>Model や View を制御するのが Controller（コントローラ）です。</li>
</ul>

<p>これからは Router, Model, View, Controller のそれぞれの役割を考慮しながら開発していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-7">2.7 Laravelでの開発の流れ
</h3><p>特に従わなければいけないルールはありませんが、Laravelを用いた開発は、基本的に下記の流れで行います。皆さんも、LaravelでWebアプリケーションを作る際は下記の流れに沿って開発してください。</p>

<ol>
  <li>Model</li>
  <li>Router</li>
  <li>ルーティング毎に<br>
3.1. Controller<br>
3.2. View</li>
</ol>

<p>最初に最も重要な Model から着手します。Model こそがリソースであり操作対象であり、作成するWebアプリケーションの扱うデータを決めます。まずは操作対象である Model を明確にするところから始めます。</p>

<p>次に、 Router です。Model が作成されると、どの URL に置くべきか決まります。そこで Router によって Model を置く URL を決定します。 Router が決まると、 Controller が決まり、 Controller が決まると、 View が決まります。</p>

<p>まずはカリキュラムに記載された順序に倣って作成していってください。充分に慣れると、特に意識せずとも自然にできるようになるでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-8">2.8 LaravelのバージョンとLTS
</h3><p>今回利用するLaravelのバージョンは5.5です。</p>

<p>最新ではなく5.5を選んだ理由はいくつかありますが、最も重要な点は 5.5 が <strong>LTS</strong> だということです。LTSとは、 Long Term Support の略で、長期間サポートという意味です。公式のリリースノートには下記のように書かれています。</p>

<blockquote>
  <p>Laravel5.5のようなLTSリリースでは、バグフィックスは2年間、セキュリティフィックスは3年間提供します。これらのリリースは長期間に渡るサポートとメンテナンスを提供します。 一般的なリリースでは、バグフィックスは6ヶ月、セキュリティフィックスは1年です。</p>
</blockquote>

<p>PHP や Laravel にセキュリティホールが発見された場合、サポート期間が過ぎたものは無視されますが、 LTS であればサポート期間が長いので安定して利用できます。当然、5.5.x の x のバージョンをアップデートしていくことは必要です。</p>

<p>また、リリースノートには5.5における新機能やバージョニングについての基本的な考え方が書かれています。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/releases.html" target="_blank">リリースノート</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-2-9">2.9 参考資料
</h3><p>開発者であれば、開発をしているときに公式ドキュメントを常に開いているものです。</p>

<p>本コースではLaravelの基本的な部分を主に学んでいきます。必要なことはレッスン内に書かれているはずですが、少し応用的なことを学ぼうとしたとき、このカリキュラムでは説明不足な面もあります。その場合は、下記に示す公式ドキュメントや、サンプルコードなどを参考にしてください。</p>

<h4>Laravelの公式ドキュメント</h4>

<p>Laravel の公式ドキュメントは日本語化されています。有志の方に感謝すべきでしょう。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/installation.html" target="_blank">Laravel 5.5 公式ドキュメント</a></li>
</ul>

<p>左上に「本」のアイコンがあり、これをクリックすると目次（見出しのリスト）が表示されます。</p>

<h4>Google</h4>

<p>当然 Google のような検索サイトは、開発者にとっても最高の参考資料検索サイトになります。Laravel に関して何でも検索してください。</p>

<ul>
  <li><a href="https://www.google.co.jp/" target="_blank">Google</a></li>
</ul>

<h4>Qiita</h4>

<p>Qiita は、プログラマのための技術情報共有サービスです。断片的な記事が多いですが、サンプルコードなどを載せていたり、全体像が把握できる記事であったり、なにかと役に立つ良い記事が多いです。</p>

<ul>
  <li><a href="http://qiita.com/tags/laravel" target="_blank">Laravel タグのついた Qiita 記事一覧</a></li>
</ul>

<p>Qiita 内で検索しても良いですが、 Google で検索しても Qiita の良質な記事が引っかかることも多いでしょう。</p>
</div></section><section id="chapter-3"><h2 class="index">3. Laravelプロジェクトの開始
</h2><div class="subsection"><p>では、早速Laravelを使ってWebアプリケーションを開発していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 今回作成するWebアプリケーション
</h3><p>このレッスンではとても単純なWebアプリケーションを作成します。操作可能なリソースは、メッセージ(Message)のみです。Webアプリ名はメッセージボードで、これは単純な掲示板です。</p>

<p>ここでは Laravel を利用した Web アプリケーション開発をしっかりと学びましょう。</p>

<h4>デモサイト</h4>

<p>下記に完成したメッセージボードを公開しています。メッセージを新規作成したり編集したり、削除してみてください。今回作成するアプリケーションは小さいので、すぐに全体像が把握できると思います。（ただし、皆さんのメッセージは予告無く削除されることがあります。）</p>

<ul>
  <li><a href="http://laravel-message-board.herokuapp.com/" target="_blank">メッセージボード デモサイト</a></li>
</ul>

<p>なお、このメッセージボードは、次のレッスンで扱う Heroku にて公開しています。</p>

<h4>完成イメージ</h4>

<p>このレッスンでは、メッセージに関係した4つのページを作成します。</p>

<ul>
  <li>メッセージ一覧ページ（トップページ）</li>
  <li>メッセージ新規作成ページ</li>
  <li>メッセージ詳細ページ</li>
  <li>メッセージ編集ページ</li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/laravel5.5/message-board/index.png" alt=""><br>
<em>メッセージ一覧ページ（トップページ）</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/laravel5.5/message-board/create.png" alt=""><br>
<em>メッセージ新規作成ページ</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/laravel5.5/message-board/show.png" alt=""><br>
<em>メッセージ詳細ページ</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/laravel5.5/message-board/edit.png" alt=""><br>
<em>メッセージ編集ページ</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 Laravelプロジェクトの作成コマンド
</h3><h4>composer をインストールする</h4>

<p>Laravelで開発をはじめる際に composer を使います。<br>
composer についての概要は後ほど説明します。既に事前準備で composer はインストールできているはずですが、念のため composer のインストール手順を再掲します。</p>

<pre><code>$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
</code></pre>

<h4>メモリを解放する</h4>

<p>また、ここまでの学習で占有したメモリ領域を、以下のコマンドを実行して解放してください。</p>

<div class="language-sh highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>$ sudo sh -c "echo 3 &gt; /proc/sys/vm/drop_caches"
</pre></div>
</div>
</div>

<h4>Laravelプロジェクトを作成する</h4>

<p>ここから開発のスタートです。<br>
まずはLaravelプロジェクトを作成するところからです。</p>

<pre><code>$ cd ~/environment/
$ composer create-project laravel/laravel ./message-board "5.5.*" --prefer-dist
</code></pre>

<p>上記コマンドを実行してください。 composer を使って、 <em>message-board</em> という laravel(5.5) プロジェクトを作成するコマンドです。実行すると完了までおそらく5分程度の時間がかかるので、待ちましょう。</p>

<p>バージョンは、<code>メジャーバージョン.マイナーバージョン.メンテナンスバージョン</code> という3つのバージョン番号で表現されることが多いです。 Laravel のバージョン表記が <code>5.5.10</code> となっている場合、メジャーバージョン番号が <code>5</code> で、マイナーバージョン番号が <code>5</code> で、メンテナンスバージョンが <code>10</code> です。メジャーバージョンが更新されると大規模なアップデートがあったことを意味します。マイナーバージョンの更新は中程度のアップデートを意味し、メンテナンスバージョンのアップデートではメンテナンスレベル（小さなバグがあったので修正されるなど）でのアップデートがあったことを意味します。 <code>5.5.*</code> と書けば、バージョン 5.5 でありながら、 メンテナンスバージョンは最大なもの（つまり 5.5 の中でも最新版）が選択されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 composer とは
</h3><p>composer とは、 PHP のライブラリ管理システムです。PHP のライブラリをインストールしたり、バージョンをコントロールしたりするために利用されます。composer を利用すれば、あるライブラリをインストールするときに、そのライブラリに必要なライブラリ（依存ライブラリ）も自動的にインストールされるので、インストールしたいライブラリの依存ライブラリを手動で探してインストールするような面倒な手間がなくなります。</p>

<p>Laravel も PHP のライブラリの1つなので、 composer で扱います。Laravel にも多くの依存ライブラリがありますが、 composer を使えば一発で Laravel プロジェクトを作成することができます。</p>

<p>今後も PHP ライブラリを使用するときには、 composer を使用します。</p>

<!--
#### composer.json

composer で管理するライブラリ一覧は、 *composer.json* ファイルを見ればわかるようになっています。また、 *composer.json* の中に新たに加えたいライブラリを記述して、 `$ composer update` とコマンドを実行すれば、インストールされます。

また、 *composer.lock* には、依存ライブラリにも含めた、現在利用しているライブラリの全てがバージョン情報なども含めて記載されています。
-->
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 ファイル構成
</h3><p>さて、 <code>composer create-project laravel/laravel message-board "5.5.*"</code> コマンドで作成されたファイルやフォルダを見ていきましょう。</p>

<p>と言っても、この段階では理解できないと思うので、軽く眺めて次に進んでください。（<em>.env</em> など <code>.</code> で始まるファイルは、Cloud9で「隠しファイルを表示する」設定にしていない場合、表示されません）</p>

<table>
  <thead>
    <tr>
      <th>ファイル/フォルダ</th>
      <th>役割</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><em>app/</em></td>
      <td>アプリケーションのためのファイルが格納されます。</td>
    </tr>
    <tr>
      <td><em>bootstrap/</em></td>
      <td>デザインとしてのBootstrapとは別もので、 Laravel 起動のためのファイルが置かれています</td>
    </tr>
    <tr>
      <td><em>config/</em></td>
      <td>Laravel アプリケーションの設定ファイルがあります</td>
    </tr>
    <tr>
      <td><em>database/</em></td>
      <td>データベース関連のファイルがあります</td>
    </tr>
    <tr>
      <td><em>public/</em></td>
      <td>公開情報に関するファイルや、CSS, JavaScript が格納されます</td>
    </tr>
    <tr>
      <td><em>resources/</em></td>
      <td>View (HTML) などのファイルが格納されます</td>
    </tr>
    <tr>
      <td><em>routes/</em></td>
      <td>ルーティングなどのファイルが格納されます</td>
    </tr>
    <tr>
      <td><em>storage/</em></td>
      <td>アプリケーションのキャッシュやログなどが格納されます</td>
    </tr>
    <tr>
      <td><em>tests/</em></td>
      <td>自動テストファイルが格納されます。お試し用のフォルダではありません。</td>
    </tr>
    <tr>
      <td><em>vendor/</em></td>
      <td>composer により追加されたライブラリが格納されます</td>
    </tr>
    <tr>
      <td><em>.env</em></td>
      <td>データベースのユーザID・パスワードなど設定情報を記述するファイルです</td>
    </tr>
    <tr>
      <td><em>.env.example</em></td>
      <td>.env の記述例として用意されています</td>
    </tr>
    <tr>
      <td><em>.gitattributes</em></td>
      <td>Gitの動作設定が記載されています</td>
    </tr>
    <tr>
      <td><em>.gitignore</em></td>
      <td>Gitのコミットから除外するLaravelのフォルダ・ファイルの設定が記載されています</td>
    </tr>
    <tr>
      <td><em>artisan</em></td>
      <td><code>php artisan ...</code> という形で便利なコマンドを提供します</td>
    </tr>
    <tr>
      <td><em>composer.json</em></td>
      <td>composer により追加される Laravel プロジェクトのライブラリを管理しています</td>
    </tr>
    <tr>
      <td><em>composer.lock</em></td>
      <td><em>composer.json</em> で指定されたライブラリの具体的な状態が書かれています</td>
    </tr>
    <tr>
      <td><em>package.json</em></td>
      <td>Node.js のライブラリが管理されています</td>
    </tr>
    <tr>
      <td><em>phpunit.xml</em></td>
      <td>自動テストのためのファイルです</td>
    </tr>
    <tr>
      <td><em>readme.md</em></td>
      <td>Laravel に関する参考文書です</td>
    </tr>
    <tr>
      <td><em>server.php</em></td>
      <td>起動する Web サーバの処理が記述されています</td>
    </tr>
    <tr>
      <td><em>webpack.mix.js</em></td>
      <td>CSS や JavaScript などのフロントエンドファイルに関する管理が行われます</td>
    </tr>
  </tbody>
</table>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/structure.html" target="_blank">参考: アプリケーション構造</a></li>
</ul>

<p>私たちが主に扱うフォルダやファイルは下記の通りです。 Laravel プロジェクトを作成すると上記のように多くのファイルが生成されますが、基本的には、この程度です。そのため、上記のファイルやフォルダを全て把握する必要はありません。まずは、このレッスンで扱うところだけしっかり把握しておきましょう。</p>

<ul>
  <li><em>app/</em></li>
  <li><em>app/Http/</em></li>
  <li><em>app/Http/Controllers/</em></li>
  <li><em>composer.json</em></li>
  <li><em>database/migrations/</em></li>
  <li><em>resources/views/</em></li>
  <li>*routes/web.php</li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-3-5">3.5 Git
</h3><p>バージョン管理もしていくことにしましょう。</p>

<p>プロジェクトが作成されたら、まずはコミットしておくことをお勧めします。以降に変更を加えたときに、どこがどう変更されたのか把握できるためです。Laravel ではコマンドを利用して自動的にファイルを生成することが多いので、前のバージョンとの差分を常に確認できるようにしておきましょう。</p>

<h4>ディレクトリの移動</h4>

<pre><code>$ cd ~/environment/message-board
</code></pre>

<h4>リポジトリの初期化</h4>

<pre><code>$ git init
</code></pre>

<h4>リポジトリのコミット</h4>

<pre><code>$ git add .
$ git commit -m "init Laravel Project"
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-3-6">3.6 初期状態での動作確認
</h3><p>Laravelを使ったメッセージボードの開発を始める前に、とりあえずLaravelからWebサーバを起動して、動作確認をしてみましょう。</p>

<h4>サーバの起動</h4>

<p>今回は Laravel のコマンドによってサーバを起動します。</p>

<p>下記のコマンドを、プロジェクトフォルダ(<em>message-board/</em>)のトップで実行してください。</p>

<pre><code>$ php artisan serve --host=$IP --port=$PORT
</code></pre>

<p>コンソールに以下の表示が出て、Laravel サーバが起動します。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/laravel5.5/open_larabel_03_00.png" alt=""></p>

<p><code>artisan</code> とは Laravel プロジェクトフォルダのトップにある <em>artisan</em> というファイルを実行しています。そして、更に <code>serve</code> という命令をもらうことでサーバを起動しています。それ以降は Cloud9 というクラウド環境のため必要なオプション指定(<code>--host=$IP --port=$PORT</code>)となります。</p>

<p>以降、 Laravel プロジェクトでコマンドを使用するときには、 <code>artisan</code> を多々使用することになります。</p>

<h4>ブラウザで動作確認</h4>

<p>サーバーの起動が確認できましたら、これまで通り、Preview画面を立ち上げて、ブラウザ上で確認することができます。手順は <a href="./php-4#chapter-3-2" target="_blank">PHP その4で学習した「Webサーバの起動」</a> でも記載しましたが、まず、メニューから Preview &gt; Preview Running Application を選択してプレビューを表示します。 プレビューの右上のアイコンをクリックすると、Chromeの新規タブで表示されますので、そのタブで動作確認を行うようにしてください。</p>

<p>アクセス( <code>/</code> に <code>GET</code> メソッドの HTTP リクエストを送信)してみましょう。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/laravel5.5/open_larabel_03.png" alt=""></p>

<p>まずはなぜこの「Laravel」と書かれたページが表示されるのかの流れを確認しておきましょう。</p>

<p>Laravel は、閲覧者からのリクエストがあるとまず Router を確認します。 Router の具体的な設定コードは <em>routes/web.php</em> にあります。ここに全てのルーティングが書かれます。つまり <em>routes/web.php</em> は <strong>HTTP リクエストの全ての入り口</strong> になります。このファイルを見ると、 Laravel アプリケーションがどのような動作を行うかがわかります。そのため、動作確認するための <strong>最も大事なファイル</strong> になります。</p>

<p>Laravel プロジェクトを生成した直後のルーティングを見てみましょう。 <code>&lt;?php</code> の PHP 開始タグや <code>/* ... */</code> のコメントを無視すると、下記のシンプルなコードが残ります。これが「Laravel」のページへのルーティングを行っています。</p>

<p><em>routes/web.php (コメントなどは無視)</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> () {
    <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p>上記のコードは、 <code>'/'</code> に <code>GET</code> メソッドで HTTP リクエストが来ると、 <code>view('welcome')</code> が実行されるようになっています。では、 <code>'welcome'</code> とは何なのかというと、 <em>resources/views/welcome.blade.php</em> というファイルのことです。つまり、 <code>'/'</code> に <code>GET</code> メソッドで HTTP リクエストが来ると、 <em>resources/views/</em> フォルダにある <em>welcome</em> という名前のついた、拡張子 <em>.blade.php</em> のファイルが表示される、ということになります。ここでは、 <code>view()</code> は <em>resources/views/</em> 以下にあるファイルを表示するための関数で、 <code>Routes</code> は <code>Route::get</code> のように使ってルーティングを決定するものだという理解さえあれば、事足ります。</p>

<p>注意しておくと、本コースでは Laravel の具体的な仕組みに関しては解説しません。例えば、 <code>view()</code> 関数がどこで定義されているとか、 <code>Route::get()</code> の呼び出し側の関数がどこに定義されていて、 <code>return view('welcome');</code> で返された値はどうなるのか、といった「具体的に Laravel フレームワークを読み解く行為」は行いません。そもそも Laravel という巨大なWebアプリケーションフレームワークの仕組みを完全に把握するにはかなり時間がかかります。そのため、仕組みから理解すべきではなく、あくまで Laravel を使った開発のルールを学ぶために時間を使いましょう。まずはそういうものだと納得して、使い方を覚えるようにしてください。仕組みを理解せずとも使い方さえわかれば、Webアプリケーションを作ることは充分できます。実際、私たちは1つのコマンドで、既にWebアプリケーションの雛形を作成し、「Laravel」という表示を行うに至っています。</p>

<div class="alert alert-warning">
仕組みは一切知る必要がないという提言ではなく、学習には段階があるということです。まずは使い方を知って、充分に慣れたら、仕組みを知る段階に入れば良いだけの話です。今すぐに仕組みを理解しようとするのではなく、まずは laravelの使い方をマスターしたのちに、もしも興味があれば、フレームワークのコア部分のソースコードを読み解けば良いように、上手に設計されているのです。私たちは、自動販売機の裏側の仕組みを詳しく知らなくても、飲み物を買うことができることと同じ要領です。
</div>

<p>では、 <em>resources/views/welcome.blade.php</em> を開いてみてください。style要素（CSS）が長いので、body要素のみ抜粋したものを見てみます。</p>

<p><em>resources/views/welcome.blade.php (body要素のみ抜粋)</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">flex-center position-ref full-height</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        @if (Route::has('login'))
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">top-right links</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                @auth
                    <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">{{ url('/home') }}</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Home<span class="tag">&lt;/a&gt;</span>
                @else
                    <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">{{ route('login') }}</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Login<span class="tag">&lt;/a&gt;</span>
                    <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">{{ route('register') }}</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Register<span class="tag">&lt;/a&gt;</span>
                @endauth
            <span class="tag">&lt;/div&gt;</span>
        @endif

        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">title m-b-md</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                Laravel
            <span class="tag">&lt;/div&gt;</span>

            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">links</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://laravel.com/docs</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Documentation<span class="tag">&lt;/a&gt;</span>
                <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://laracasts.com</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Laracasts<span class="tag">&lt;/a&gt;</span>
                <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://laravel-news.com</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>News<span class="tag">&lt;/a&gt;</span>
                <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://forge.laravel.com</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Forge<span class="tag">&lt;/a&gt;</span>
                <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://github.com/laravel/laravel</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>GitHub<span class="tag">&lt;/a&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>ファイル名が <em>welcome.blade.php</em> となっており、 blade や php などと付いていますが、中身はただの HTML ファイルになっています。例えば、 <code>Laravel</code> となっているところを <code>太郎</code> として保存してください。そしてページの表示を更新してみてください。「Laravel」という表示が「太郎」に変わります。確認してみてください。 <em>welcome.blade.php</em> が実際に表示されていることを実感できたでしょうか。</p>

<p>blade の解説や、これらのファイルの中に php を書く方法については View を学ぶチャプターにあるので、先にサーバの終了方法を見ておきましょう。</p>

<h4>サーバの終了</h4>

<p>Laravelサーバが起動しているターミナル上で <kbd>Control</kbd> + <kbd>c</kbd>（Windowsの場合は <kbd>Ctrl</kbd> + <kbd>c</kbd>）を押すとサーバを終了することができます。</p>

<p>これで、いつでもサーバを起動(<code>php artisan serve --host=$IP --port=$PORT</code>)したり、終了（<kbd>Control</kbd> + <kbd>c</kbd>）させたりできますね。</p>

<h4>キャッシュクリアコマンド</h4>

<p>なお、変更が反映されなかったら、<kbd>Control</kbd> + <kbd>c</kbd> でサーバを停止し</p>

<pre><code>$ php artisan cache:clear
</code></pre>

<p>を実行し再度サーバ起動を行ってみてください。</p>

<h4>（補足）artisanでのコマンドリスト</h4>

<p>下記のように <code>list</code> を実行すると、artisanでのコマンドのリストを表示することができます。</p>

<pre><code>$ php artisan list
</code></pre>

<p>上記コマンドを実行して、 artisan コマンドで可能なことを確認しておいても良いでしょう。ただし、一覧表示されたコマンドを片っ端から実行するような事は、ある意味で勉強になるかもしれませんが、 Laravel プロジェクトを作り直すことになります。ファイルが自動的に作成されたり、想像していないことが起こる可能性があり、メッセージボードの Laravel プロジェクトがぐちゃぐちゃになるためです。 Laravel での開発に慣れてきたら色々試してみると良いでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-7">3.7 REPL
</h3><h4>REPL とは</h4>

<p>REPLとは、 Read-Eval-Print Loop の略で、「読み込み-処理-表示」の繰り返しという意味になります。対話型のPHP実行環境のことです。</p>

<h4>PHP の REPL</h4>

<p>ターミナルで下記のコマンドを入力すると、PHP の REPL が起動します。</p>

<pre><code>$ php -a
</code></pre>

<p>PHP の関数を試したりすることができます。</p>

<p><em>例1</em></p>

<pre><code>php &gt; print 'test' . PHP_EOL;
test
</code></pre>

<p><em>例2</em></p>

<pre><code>php &gt; $x = 1;
php &gt; $y = 2;
php &gt; $sum = $x + $y;
php &gt; print $sum . PHP_EOL;
3
</code></pre>

<p>終了したいときは、 <code>exit</code> です。</p>

<pre><code>php &gt; exit
</code></pre>

<h4>Laravel の REPL</h4>

<p><code>php -a</code> コマンドで PHP を対話的に実行できました。しかし、 PHP の REPL を起動しても、 Laravel の機能は利用できません。</p>

<p>Laravel では <code>php artisan tinker</code> というコマンドを実行すると、Laravel の機能を試せる REPL が起動します。</p>

<p><code>php -a</code> と <code>php artisan tinker</code> との違いは、 Laravel ファイルが読み込まれるかどうかです。<code>php -a</code> としただけでは、 Laravel ファイルが読み込まれず Laravel を使ったPHPオブジェクトを利用できません。 Laravel プロジェクトでは tinker を起動して REPL を起動するようにしましょう。</p>

<h4>tinker起動</h4>

<p>下記のコマンドで実際に起動してみてください。</p>

<pre><code>$ php artisan tinker
</code></pre>

<p>すると下記のようなログが出て、 <code>&gt;&gt;&gt;</code> というPHPコマンド待受状態になります。</p>

<pre><code>Psy Shell v0.9.8 (PHP 7.2.8 — cli) by Justin Hileman
&gt;&gt;&gt;
</code></pre>

<h4>tinker終了</h4>

<p><code>exit;</code> で tinker を終了することができます。</p>

<pre><code>&gt;&gt;&gt; exit;
</code></pre>

<h4>コードを変更したら tinker も再起動必須</h4>

<p>Laravel プロジェクト上のファイルに記述した PHP コードを tinker で試すこともできますが、先に言っておきますが、ファイルに記述した PHP コードを変更したら tinker も再起動しないと変更後の PHP コードは反映されません。</p>

<p>再起動は、先ほどの通り、終了後に起動してください。</p>
</div></section><section id="chapter-4"><h2 class="index">4. データベースとLaravelの接続設定
</h2><div class="subsection"><p>Model の作成を始める前に、 Laravel アプリケーションとデータベースの接続を行いましょう。データベースを接続しないと、 Model が持っているデータの保存場所がありません。 Model はデータベースと密接に関わっており、データベースのレコードやカラムを参照します。</p>

<p>Laravel はいくつかのデータベースに対応しています。本コースでは前のレッスンでも学んだ MySQL を使用しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 MySQLサーバの起動
</h3><p>まずは MySQL サーバが起動しているか <code>$ sudo service mysqld status</code> で確認してください。停止していれば、<code>$ sudo service mysqld start</code> で起動しておいてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 Laravelのデータベース接続設定
</h3><p>Laravel のデータベースの接続設定を管理しているファイルは <em>config/database.php</em> です。こちらを開いてみてください。下記には重要な箇所のみ抽出しています。</p>

<p><em>config/database.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="string"><span class="delimiter">'</span><span class="content">default</span><span class="delimiter">'</span></span> =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_CONNECTION</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">mysql</span><span class="delimiter">'</span></span>),
</pre></div>
</div>
</div>

<p>上記で、まず気になるのが、 <code>env()</code> という関数です。この関数は <code>env('A', 'B')</code> と書かれたとき、基本は <code>A</code> という <strong>環境変数の値</strong> を返しますが、 <code>A</code> という環境変数が定義されていなかった場合には、 <code>'B'</code> という文字列を返します。上記のように、 <code>env('DB_CONNECTION', 'mysql')</code> と書かれていれば、まずは <code>DB_CONNECTION</code> という環境変数が定義されているか確認し、定義されていればその値を返し、定義されていなければ、 <code>'mysql'</code> を返します。環境変数 <code>DB_CONNECTION</code> が設定されていれば優先されるので、環境変数で指定されたデータベースが選択されます。逆に、環境変数 <code>DB_CONNECTION</code> が設定されていなければデータベースは MySQL が選択されるという意味です。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/helpers.html#method-env" target="_blank">参考: env() - 公式ドキュメント</a></li>
</ul>

<h4>環境変数</h4>

<p>環境変数とは、ターミナルの変数です。変数と言えばプログラム内で利用され、プログラムが終了すると消えてしまうものでしたが、環境変数を使えばいつまでも設定値が残ります。Laravelサーバ起動時のコマンドにも環境変数が入っていました。 <code>$IP</code> と <code>$PORT</code> です。これらはターミナル上で、 <code>echo $IP</code> や <code>echo $PORT</code> を実行すると、環境変数の値を確認することができます。また、ターミナル上で <code>env</code> と入力実行すれば、 Cloud9 上で設定されている環境変数を全て確認することができます。ただし確認できるのは Laravel の環境変数以外です（Laravel の環境変数は <em>.env</em> ファイルに記載されていて、 Laravel 起動時のみ適用されます）。</p>

<p>また、 Laravel サーバ起動中の環境変数は全て <code>$_ENV</code> の中に入っており、 <code>$_ENV</code> は Laravel プロジェクト内の PHP ファイルで操作することができます（ただし、普段その機会は、ほとんどありません）。</p>

<h4>tinkerで環境変数を確認</h4>

<p>Laravel の環境変数を確認してみましょう。tinker を起動して、下記コマンドを入力してください。</p>

<pre><code>&gt;&gt;&gt; print_r($_ENV);
</code></pre>

<p>すると、設定されている環境変数が、ずらっと出て来るはずです。 <code>DB_CONNECTION</code> はどうなっていますか。おそらく <code>'mysql'</code> になっていると思います。</p>

<h4>.envファイルが環境変数を設定している</h4>

<p>では、 Laravel の環境変数を決めているのは誰かというと、 <em>.env</em> ファイルです。 Laravel プロジェクトのトップにある <em>.env</em> ファイルを開いてみてください。おそらく下記のようになっているのではないでしょうか。</p>

<p><em>.env （一部抜粋）</em></p>

<pre><code>DB_CONNECTION=mysql
</code></pre>

<p>上記のように .env ファイルによって環境変数が設定されていることがわかります。もし、 MySQL でないデータベースを選びたい場合には、 .env ファイルの DB_CONNECTION=mysql の mysql を変更して環境変数から設定することになります。もしくは config/database.php の ‘default’ =&gt; env(‘DB_CONNECTION’, ‘mysql’), から env() を削除して ‘default’ =&gt; ‘[MySQLでないデータベース名]’, としてしまうかです。普通は、前者の、環境変数から変更する方法をとるべきです。</p>

<h4>DB_CONNECTION以外の接続情報を確認する</h4>

<p>さて、私たちは Laravel と MySQL を接続したいのでした。  <em>.env</em> ファイルの <code>DB_CONNECTION</code> は <code>'mysql'</code> になっていたので、 MySQL が接続データベースとして選択されているのは確実です。では、 MySQL のその他の接続設定値も見ていきましょう。</p>

<p><em>config/database.php （一部抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="string"><span class="delimiter">'</span><span class="content">mysql</span><span class="delimiter">'</span></span> =&gt; [
            <span class="string"><span class="delimiter">'</span><span class="content">driver</span><span class="delimiter">'</span></span>      =&gt; <span class="string"><span class="delimiter">'</span><span class="content">mysql</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">host</span><span class="delimiter">'</span></span>        =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_HOST</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">127.0.0.1</span><span class="delimiter">'</span></span>),
            <span class="string"><span class="delimiter">'</span><span class="content">port</span><span class="delimiter">'</span></span>        =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_PORT</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">3306</span><span class="delimiter">'</span></span>),
            <span class="string"><span class="delimiter">'</span><span class="content">database</span><span class="delimiter">'</span></span>    =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_DATABASE</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">forge</span><span class="delimiter">'</span></span>),
            <span class="string"><span class="delimiter">'</span><span class="content">username</span><span class="delimiter">'</span></span>    =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_USERNAME</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">forge</span><span class="delimiter">'</span></span>),
            <span class="string"><span class="delimiter">'</span><span class="content">password</span><span class="delimiter">'</span></span>    =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_PASSWORD</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>),
            <span class="string"><span class="delimiter">'</span><span class="content">unix_socket</span><span class="delimiter">'</span></span> =&gt; env(<span class="string"><span class="delimiter">'</span><span class="content">DB_SOCKET</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>),
            <span class="string"><span class="delimiter">'</span><span class="content">charset</span><span class="delimiter">'</span></span>     =&gt; <span class="string"><span class="delimiter">'</span><span class="content">utf8mb4</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">collation</span><span class="delimiter">'</span></span>   =&gt; <span class="string"><span class="delimiter">'</span><span class="content">utf8mb4_unicode_ci</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">prefix</span><span class="delimiter">'</span></span>      =&gt; <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">strict</span><span class="delimiter">'</span></span>      =&gt; <span class="predefined-constant">true</span>,
            <span class="string"><span class="delimiter">'</span><span class="content">engine</span><span class="delimiter">'</span></span>      =&gt; <span class="predefined-constant">null</span>,
        ],
</pre></div>
</div>
</div>

<p><code>DB_CONNECTION</code> に <code>'mysql'</code> が設定されていると、上記の箇所が使用されることになります。大事なのは、 <code>database</code>, <code>username</code>, <code>password</code> ですが、全て <code>env()</code> です。したがって、 <em>.env</em> で設定しましょう。 <em>.env</em> ファイルで設定すればそちらが優先されるので、こちらに書いてある <code>forge</code> などは使用されません。</p>

<h4>.envのDB接続のための環境変数を修正する</h4>

<p><em>.env （一部抜粋）</em></p>

<pre><code>DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
</code></pre>

<p>上記のままでは、データベース名が <code>homestead</code> であり、 ユーザ名が <code>homestead</code> 、パスワードが <code>secret</code> なものしか MySQL サーバにしか接続できません。しかし、そもそも私たちは今まで、ユーザ名を <code>homestead</code> ではなく、 <code>root</code> で使用してきましたし、パスワードは入力なしに接続してきました。データベース名はまだ決まっていませんが、次に作成します。</p>

<p>データベース名、ユーザ名、パスワードを下記のように変更します。</p>

<p><em>.env</em></p>

<pre><code>DB_DATABASE=message-board
DB_USERNAME=root
DB_PASSWORD=
</code></pre>

<p>このようにすると、 <code>message-board</code> というデータベースに、 <code>root</code> ユーザでパスワード無しでログインします。 <code>mysql -u root</code> でログインして <code>use message-board</code> を実行するのと同じです。</p>

<h4>message-board データベースの作成</h4>

<p>しかし、まだ <code>message-board</code> データベースを作成していませんでした。こちらをまずは作成しましょう。</p>

<pre><code>// MySQL サーバ起動（まだ起動していない場合のみ実行）
$ sudo service mysqld start

// ログイン
$ mysql -u root

// データベース作成
mysql&gt; CREATE DATABASE `message-board`;
</code></pre>

<p>上記のコマンドでデータベースを作成することができます。注意点として、 <code>message-board</code> は <code>-</code> の文字列が含まれているので、` （バッククオート）で囲う必要があります。</p>

<p>データベースが作成され、 Laravel と MySQL を接続する設定が完了しました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 tinkerでデータベースの接続確認
</h3><p>一度接続されているか確認するために tinker を起動(<code>php artisan tinker</code>)します。</p>

<p>tinker 上で、データベースの接続先を返す <code>DB::connection();</code> を実行してみましょう。</p>

<pre><code>&gt;&gt;&gt; DB::connection();
</code></pre>

<p>上記を実行し、ログとして <code>=&gt; Illuminate\Database\MySqlConnection {#683}</code> のような表示が出てくればデータベースと接続できています。</p>

<p><code>PDOException with message 'SQLSTATE[HY000] [2002] Connection refused'</code> と赤色背景でメッセージが返ってきた場合にはデータベースの接続ができていません。まずは、データベースの起動を確認し、起動しているのに接続されていなければ、再度、先ほどの設定ファイルを見直してください。原因が特定できない場合にはメンターに質問しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 タイムゾーンの設定
</h3><p>タイムゾーンの設定を「東京（<code>Asia/Tokyo</code>）」にしておけば、 Model からレコードを保存したときなどにおいて、時間情報 (<code>created_at</code> 等)が設定したタイムゾーンの時間で保存されます。</p>

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

<p>注意：<em>.env</em> はGItにコミットされません。データベースのパスワードなど「隠しておくべき情報」を書いているため、後にGitHubにpushすることを考慮すると、登録する必要がありません。また、その設定は最初から <em>.gitignore</em> に記述されているため、私たちが別途設定を追記しなくてもOKです。</p>
</div></section><section id="chapter-5"><h2 class="index">5. Modelの構築
</h2><div class="subsection"><p>開発の流れで解説した通り、リソース（操作対象）となる Model から作成していきます。</p>

<p>Model はリソースであり操作対象です。つまり、永久保存されるデータなのでデータベースと密接に関係しています。というより、データベースのレコード1つが、Model のインスタンス1つに対応しています。</p>

<p>最初に今から作成するWebアプリケーションは <strong>どんなデータを扱うのか</strong> を決めなければいけません。なんとなく開発を開始するのではなく、何のためのWebアプリケーションなのかを決め、そしてそのためにどんなデータを扱う必要があるのか考えておく必要があります。</p>

<p>そして、どんなデータが扱うかが決まると、 Model を作成するための情報が揃ったということになります。開発は Model の作成からスタートさせましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 テーブル設計前の初期設定
</h3><p>テーブル設計を始める前に、まずはAppServiceProvider.phpというファイルにかかれている設定を変更する必要があります。この作業は、新しくアプリケーションを作る度に、アプリケーション単位で行えば良いです。</p>

<p><em>app/Providers/AppServiceProvider.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">boot</span>()
    {
        <span class="comment">//</span>
    }
</pre></div>
</div>
</div>

<p>上記のbootメソッドの中身を以下の内容を追記しましょう。これは、データベースにMySQLを使う場合のLaravel開発で必要な設定で、文字列の最大文字数を 191 文字までに限定します。この設定の意図について詳細を知りたい方は <a href="https://readouble.com/laravel/5.5/ja/migrations.html#creating-indexes" target="_blank">こちらの公式ドキュメントのページにある「インデックス」→「インデックス作成」→「インデックス長とMySQL／MariaDB」の項目</a> をご参照ください。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">boot</span>()
    {
        \<span class="constant">Schema</span>::defaultStringLength(<span class="integer">191</span>);
    }
</pre></div>
</div>
</div>

<p>これでテーブル設計のための初期設定は完了です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 メッセージのテーブル設計
</h3><p>今までデータベースのテーブルを <code>CREATE TABLE ...</code> のように SQL を書いて実行していましたが、 Laravel では <strong>マイグレーションファイル</strong> というテーブル作成ファイルによって管理・実行することができます。</p>

<h4>マイグレーションとは</h4>

<p>通常テーブルを新規に作成するには必要なSQLコマンドを直接実行して作成します。カラムを追加したりする場合も同じです。</p>

<p>それに対してマイグレーション機能では、テーブルを新規に作成するためのマイグレーションファイルと呼ばれるファイルを作成して、マイグレーションを実行することで、マイグレーションファイルに書かれたテーブルの定義がMySQLなどのデータベースに間接的に反映されるのです。</p>

<p>例えば、既存のテーブルに、後からカラムを追加したい場合には、カラムを追加するための別のマイグレーションファイルを新たに作成して実行することで、テーブルの定義を変更していくのです。</p>

<p>なぜ、このような一見、面倒なことを行うのでしょうか。SQLコマンドを実行して、テーブルを定義する方がシンプルで早いのではと思います。ですが、直接SQLコマンドを実行して、テーブルを作成していくと、困ったことが発生する恐れがあります。</p>

<p>例えば、あなたが3ヶ月ほど前にテーブル定義をいくつか変更したとします。そして、今日、そのテーブル定義を3ヶ月よりももっと前の状態に戻したい場合は、以前のテーブル定義がどのような状態であったかを記憶するか、メモしておく必要があります。</p>

<p>これでは正確にテーブル定義を戻せるか分かりませんよね。ですが、マイグレーション機能を使って、テーブル定義を修正すれば、履歴がマイグレーションファイルという形で残っていきます。テーブル定義に変更や追加がある度に、新しくマイグレーションファイルを追加作成するためです。</p>

<p>マイグレーションファイルをある地点まで戻すことを <strong>ロールバック</strong> と言います。マイグレーションをロールバックすることで、あなたが戻したいテーブル定義まで簡単にかつ正確に戻すことができるのです。</p>

<pre><code>// マイグレーションのロールバックのためのコマンド(一度実行する度に、１つずつマイグレーション履歴を戻すことができる)
$ php artisan migrate:rollback
</code></pre>

<h4>マイグレーションファイルの作成</h4>

<p>マイグレーションファイルとは、Laravel からデータベースのテーブルを管理するためのファイルです。主に、テーブルの作成・削除、カラムの追加・削除に関することがファイル内に記述されます。Laravel でテーブルの設定を変更したいときには、マイグレーションファイルを作成し、Laravel からマイグレーションを実行します。</p>

<pre><code>$ php artisan make:migration create_messages_table --create=messages
</code></pre>

<p><code>php artisan make:migration</code> まではマイグレーションファイル作成のためのコマンドです。 <code>create_messages_table</code> は作成するマイグレーションファイルの名前ですので、名前を見れば何がなされるかがわかるようなマイグレーションファイル名にしておきましょう。</p>

<p>最後の –create=messages によって作成するテーブル名を決定しています。これが重要です。</p>

<p>ここで指定するテーブル名の命名規則は</p>

<pre><code>--create=messages　←　全て小文字で複数形
</code></pre>

<p>テーブル名が複数形である理由は、テーブルの中に複数のレコードが格納されるからです。</p>

<p>上記コマンドを実行すると、 <code>Created Migration: 年_月_日_時_create_messages_table</code> というログが表示され、<em>database/migrations/</em> フォルダに下記のようなファイルが作成されます。 <em>年_月_日_時</em> には作成した現在日時が入ります。</p>

<p><em>database/migrations/年_月_日_時_create_messages_table.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Support</span>\<span class="constant">Facades</span>\<span class="constant">Schema</span>;
<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Schema</span>\<span class="constant">Blueprint</span>;
<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Migrations</span>\<span class="constant">Migration</span>;

<span class="keyword">class</span> <span class="class">CreateMessagesTable</span> <span class="keyword">extends</span> <span class="constant">Migration</span>
{
    <span class="comment">/**
     * Run the migrations.
     *
     * @return void
     */</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">up</span>()
    {
        <span class="constant">Schema</span>::create(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;increments(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;timestamps();
        });
    }

    <span class="comment">/**
     * Reverse the migrations.
     *
     * @return void
     */</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">down</span>()
    {
        <span class="constant">Schema</span>::dropIfExists(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>);
    }
}
</pre></div>
</div>
</div>

<p>function が2つ作成されています。 <code>up()</code> と <code>down()</code> です。マイグレーションファイルは、データベースのテーブル更新のためのファイルでした。 <code>up()</code> はテーブルを更新するときに実行されます。 <code>up()</code> 内では <code>Schema::create('messages', function (Blueprint $table) { ... }</code> とコーディングされており、接続している MySQL データベース (<em>message-board</em>) に <em>messages</em> テーブルを作成し、作成すべきカラムも指定しています。また、テーブルの更新を戻す方向 (<code>up()</code>と逆方向)も定義されており、それが <code>down()</code> です。 <code>down()</code> では <code>Schema::dropIfExists('messages');</code> とコーディングされており、その名の通り <em>messages</em> テーブルが存在するならば、 drop(削除) するということです。 <code>down()</code> は更新を戻すとき(<code>php artisan migrate:reset</code> など)に実行されます。</p>

<p><code>up()</code> 内を見ればなんとなくわかるように、現状では <code>id</code> カラム と <code>timestamp</code> (<code>created_at</code> カラムと <code>updated_at</code> カラムの2つか一度に追加されます) しか指定されていません。</p>

<p><code>class CreateMessagesTable extends Migration</code> についてはあまり気にする必要はないでしょう。 <code>Migration</code> クラスを <code>extends</code> （継承） したクラスを生成しています。 <code>Migration</code> クラス自体、特に何かをするクラスではないので、気にするほどではありません。また、 <code>use Illuminate\Database\Migrations\Migration;</code> の名前空間 (<code>Illuminate\Database\Migrations\</code>) についても特に気にする必要はないでしょう。 Laravel 本体の名前空間のトップには <code>Illuminate</code> が付いていることだけ覚えておけば問題ありません。</p>

<p>また、 <em>database/migrations/</em> フォルダの中には <em>2014_10_12_000000_create_users_table.php</em> と <em>2014_10_12_100000_create_password_resets_table.php</em> というファイルが予め生成されています。これらはそのファイル名が示す通り、 <em>users</em> テーブルの作成と、 <em>password_resets</em> テーブルの作成のためのマイグレーションファイルです。これらは Laravel が予めログイン認証のために作成しているもので、今回作成するメッセージボードでは使用しません。ログインに関しては Twitter クローンのレッスンで扱います。</p>

<h4>マイグレーションファイルの修正</h4>

<p>マイグレーションファイルはあくまで自動的に生成された雛形に過ぎないので、私たちの意図を完全に反映したものではありません。そのため不足分を自分の手で補うことになります。</p>

<p>先ほど作成されたマイグレーションファイルの中には、 <code>id</code> カラム と <code>timestamp</code> (<code>created_at</code> カラムと <code>updated_at</code> カラムになる) しか指定されていませんでした。</p>

<p>それではメッセージの本体がないので、 String（文字列）型の <code>content</code> カラムを追加しましょう。</p>

<p><em>database/migrations/年_月_日_時_create_messages_table.php の up() 抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">up</span>()
    {
        <span class="constant">Schema</span>::create(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;increments(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>);
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">string</span>(<span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span>);    <span class="comment">// content カラム追加</span>
            <span class="local-variable">$table</span>-&gt;timestamps();
        });
    }
</pre></div>
</div>
</div>

<p>これでマイグレーションファイルが実行されたときに、 <em>messages</em> テーブルに <code>content</code> カラムが作成されることになります。</p>

<p>また、<code>down()</code> についても考慮すべきですが、今回 <code>down()</code> では <em>messages</em> テーブルを削除するだけなので、修正の必要はありません。</p>

<h4>マイグレーションの実行</h4>

<p>MySQL サーバが起動しているか確認し、起動していなければ起動しておいてください。</p>

<p>では、マイグレーションファイルを実行させましょう。マイグレーションを実行すると、定義されていた <code>up()</code> が実行されます。</p>

<pre><code>$ php artisan migrate
</code></pre>

<p>下記のようにログが表示されます。</p>

<pre><code>Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
Migrating: 2016_11_23_074757_create_messages_table
Migrated:  2016_11_23_074757_create_messages_table
</code></pre>

<p>実行されたファイルは3つありますが、上の2つは先ほど述べたように Laravel が予め用意したものなので、ここでは無視します。一番下の <em>…_create_messages_table</em> のログが先ほどコーディングしたものです。</p>

<h4>マイグレーションの確認</h4>

<p>実際に MySQL にログイン (<code>mysql -u root</code>) して <em>messages</em> テーブルが作成されているのか確認してみましょう。</p>

<pre><code>MySQL ログイン
$ mysql -u root

データベースの選択
mysql&gt; use message-board

テーブル一覧確認（messagesテーブルが作成されているか確認）
mysql&gt; show tables;

テーブル設計の確認
mysql&gt; describe messages;
</code></pre>

<p><code>describe messages;</code> で下記のように表示されれば問題なくマイグレーションを実行できています。</p>

<pre><code>+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| content    | varchar(191)     | NO   |     | NULL    |                |
| created_at | timestamp        | YES  |     | NULL    |                |
| updated_at | timestamp        | YES  |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
</code></pre>

<p>ちなみに <code>content</code> は <code>varchar(191)</code> なので、191文字以上は保存することができません。それ以上必要な場合には TEXT 型を利用しますが、本レッスンの後半で学びます。また、 <code>up()</code> 内に <code>$table-&gt;timestamps();</code> と書かれていた部分が <code>created_at</code> (作成日時) と <code>updated_at</code> (更新日時) となっている点にも注目です。 <code>created_at</code> はレコードが作成された日時、 <code>updated_at</code> はレコードが更新される度に更新される日時情報を保存します。</p>

<p>ここまででマイグレーションは完成です。今後もテーブルを作成したり変更したりするときはマイグレーションファイルで管理することになります。マイグレーションファイルはテーブル設計の度に作成され、ファイルそのものがテーブル設計の歴史になります。この歴史ファイル達のおかげで時系列でバージョンが管理され、いつでも戻すことができ、無理のないテーブル変更が可能となるのです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 モデルの作成
</h3><p>ようやくモデルの作成に取り掛かります。モデルはデータベースやテーブルが作られていることを前提とするので、マイグレーションが完了していないと作成することができなかったのです。</p>

<p>モデルの作成にも <code>artisan</code> コマンドを使用します。下記のコマンドを実行してください。</p>

<pre><code>$ php artisan make:model Message
</code></pre>

<p>Model は app/ 直下に生成、配置されます。開いてみると、比較的単純そうなに見えるファイルです。</p>

<p><em>app/Message.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">App</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Eloquent</span>\<span class="constant">Model</span>;

<span class="keyword">class</span> <span class="class">Message</span> <span class="keyword">extends</span> <span class="constant">Model</span>
{
    <span class="comment">//</span>
}
</pre></div>
</div>
</div>

<p><code>namespace App;</code> とあるので、この <code>Message</code> モデルは App 名前空間以外では <code>App\Message</code> で指定することができます。<code>class Message</code> となっており、基本的にモデルのためのクラス名は頭文字が大文字で単数形というセオリーになります。もしもクラス名が2つの英単語での組み合わせで作られるときは以下のようになります。</p>

<pre><code>//単語ごとに頭文字が大文字で、最後は必ず単数形で終わる。(最後が単数形ならば他の単語は複数形でもOK。)
class UserMail
</code></pre>

<p>また、 <code>class Message extends Model { // }</code> と書かれているだけで中身がない空クラスに思えますが、実は <code>extends</code> している <code>Illuminate\Database\Eloquent\Model</code> に多くの関数やパラメータが予め定義されているのです。更に Message モデル個別の機能が必要な場合にのみ上記の <code>//</code> 部分に関数を追加していくことになります。下記参考を読むとかなり多くの関数やパラメータが定義されていることがわかることでしょう。</p>

<ul>
  <li><a href="https://laravel.com/api/5.5/Illuminate/Database/Eloquent/Model.html" target="_blank">参考: extends している Model クラスの中身 - Laravel API</a></li>
  <li><a href="https://github.com/laravel/framework/blob/5.5/src/Illuminate/Database/Eloquent/Model.php" target="_blank">参考: Model ソースコード - GitHub</a></li>
</ul>

<p>補足ですが、 Laravel のモデルは <code>use Illuminate\Database\Eloquent\Model;</code> でも書かれているように、 Eloquent（エロケント）モデルと呼ばれます。これもそれほど気にする必要はありませんが、 Laravel ではモデルを Eloquent と呼ぶときがあることを覚えておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 Modelで使用できるCRUD関数の一例
</h3><p>実はモデルの関数を使うと、 <strong>SQL を書くことがほとんど無くなります</strong>。下記の通り、CRUD用の関数が揃っており、これらのPHP関数を使うことで PHP コードが自動的に SQL に変換され実行されます。このようにオブジェクト指向プログラミング言語（PHPなど）のコードでデータベースを操作できるようにする技法を O/Rマッピング (ORM：Object-Relational Mapping) と呼びます。Eloquent モデルが ORM をサポートしているので、下記の表のような ORM 用の PHP コードを書けば、 SQL に自動変換され、データベースを PHP コードで操作できるようになります。したがって、以降は SQL を書くことはほとんどないでしょう。と言っても ORM は SQL を PHP で書いているだけなので、データベース操作の本質は変わりません。</p>

<table>
  <thead>
    <tr>
      <th>関数名</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>all</td>
      <td>全てのレコードを取得する</td>
    </tr>
    <tr>
      <td>find</td>
      <td>idを指定して検索</td>
    </tr>
    <tr>
      <td>first</td>
      <td>最初のレコードを1件だけ取得する</td>
    </tr>
    <tr>
      <td>where</td>
      <td>検索条件を指定</td>
    </tr>
    <tr>
      <td>save</td>
      <td>レコードの作成および更新</td>
    </tr>
    <tr>
      <td>delete, destroy</td>
      <td>データの削除。destroyは主キーを複数指定して削除可能</td>
    </tr>
  </tbody>
</table>

<p>上記の関数は、<code>モデル名::関数名</code> という形や、<code>モデルのインスタンス-&gt;関数名</code> で使用します。例えば、 <code>Message</code> モデルの場合、 <code>Message::first()</code> を実行すると、データベースに保存された最も id の若いユーザレコードのインスタンスを取得することができます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 tinkerでModelのCRUD操作
</h3><p>tinker を使ってModelを操作するこの段階で、できるだけModelについての理解を深めておいてください。今後、Modelに対する操作ができる前提に話が進みます。</p>

<p>まずは tinker を起動してください。（その前に <code>sudo service mysqld status</code> で MySQL サーバの起動を確認しておきましょう。停止していれば起動しておいてください。これは毎回確認してください。Modelはデータベースを参照するので停止しているとエラーが表示されます。エラー表示されたときはまずは MySQL サーバの起動を確認するようにしてください）</p>

<h4>Modelの一覧を確認</h4>

<p>まずは <code>App\Message::all()</code> ( <code>Message</code> クラスが持つ <code>all()</code> というクラス関数) は、データベース上に保存されている Message モデルのレコードの一覧を確認できます。と言っても、まだ1つもレコードを作成していないのでカラなはずです。</p>

<pre><code>&gt;&gt;&gt; App\Message::all()

=&gt; Illuminate\Database\Eloquent\Collection {#710
     all: [],
   }
</code></pre>

<p>実行しても当然カラの配列 <code>[]</code> です。</p>

<h4>Modelのインスタンスを作成</h4>

<p>Modelのインスタンスは <code>new</code> で作成し、変数に代入します。</p>

<pre><code>&gt;&gt;&gt; $message = new App\Message
</code></pre>

<p>これで <code>$message</code> に Message モデルのインスタンスが代入されました。</p>

<p>変数だけを入力して実行すると、インスタンスの内容が確認できます。今のところ、何の内容も入っていません。</p>

<pre><code>&gt;&gt;&gt; $message

=&gt; App\Message {#690}
</code></pre>

<h4>Modelのインスタンスに値を代入</h4>

<p>Modelのインスタンスに値を代入します。 tinker 上では日本語が扱えないのでアルファベットのみで書いていくことにします。</p>

<pre><code>&gt;&gt;&gt; $message-&gt;content = 'hello'
</code></pre>

<p>これでインスタンス内容を確認してみましょう。</p>

<pre><code>&gt;&gt;&gt; $message

=&gt; App\Message {#690
     content: "hello",
   }
</code></pre>

<p><code>content: "hello"</code> という結果が得られ、 Message モデルのインスタンスである <code>$message</code> の <code>content</code> というプロパティに <code>"hello"</code> が代入されていることが確認できます。</p>

<p>しかし、まだデータベースには保存されていません。 <code>App\Message::all()</code> を実行してみるとまだカラなのが確認できます。</p>

<pre><code>&gt;&gt;&gt; App\Message::all()

=&gt; Illuminate\Database\Eloquent\Collection {#710
     all: [],
   }
</code></pre>

<h4>Modelのインスタンスをデータベースへ保存 (Create)</h4>

<p>では、 <code>$message</code> をデータベースに保存しましょう。 <code>$message-&gt;save()</code> ( <code>$message</code> のインスタンスが持つ <code>save()</code> という関数) を実行すると、自動的にデータベース内の <em>messages</em> テーブルに保存されます。モデル名とテーブル名には規約があり、 <em>messages</em> テーブルと Model を関連付けたい場合には、 モデル名は Message （単数形）でなければいけません。この規約のため、特に設定を行わずに自動的に保存がなされます。</p>

<p><a href="https://readouble.com/laravel/5.5/ja/eloquent.html#eloquent-model-conventions" target="_blank">参考: Eloquentモデル規約の「テーブル名」 - Laravel 5.5</a></p>

<p>参考に書かれている通り、この規約を破って自分のカスタムテーブル名を使用する場合には、 Model定義ファイル (<em>app/Message.php</em> など)で <code>$table</code> にカスタムテーブル名を代入することで可能となります。しかし、規約を破るとチーム開発の場合に混乱するおそれがあるので、あまり推奨されません。</p>

<pre><code>&gt;&gt;&gt; $message-&gt;save()

=&gt; true
</code></pre>

<p><code>=&gt; true</code> と出れば保存が成功したことになります。</p>

<p><code>App\Message::all()</code> で保存されているか確認してみましょう。</p>

<pre><code>&gt;&gt;&gt; App\Message::all()

=&gt; Illuminate\Database\Eloquent\Collection {#698
     all: [
       App\Message {#699
         id: 1,
         content: "hello",
         created_at: "2016-11-29 04:30:16",
         updated_at: "2016-11-29 04:30:16",
       },
     ],
   }
</code></pre>

<p>上記結果から保存されていることが確認できました。 <code>id</code> や <code>created_at</code>, <code>updated_at</code> も保存と同時に付与されていることを確認してください。この3つの値は指定せずとも自動的に付与されます。むしろ、ユーザ側で指定するのは不都合です。 <code>id</code> は重複しない連番であって欲しいし、 <code>created_at</code> と <code>updated_at</code> は保存時や更新時の日時を正確に記録しておいて欲しいからです。</p>

<h4>Modelのインスタンスの取得 (Read)</h4>

<p>データベースに保存されたレコードから、Modelのインスタンスとして取得する方法は様々あります。</p>

<p>その前にいくつかレコードを作成しておきましょう。</p>

<h5>レコードを作成して確認する準備</h5>

<pre><code>&gt;&gt;&gt; $message = new App\Message
&gt;&gt;&gt; $message-&gt;content = 'sample1'
&gt;&gt;&gt; $message-&gt;save()

&gt;&gt;&gt; $message = new App\Message
&gt;&gt;&gt; $message-&gt;content = 'sample2'
&gt;&gt;&gt; $message-&gt;save()
</code></pre>

<p>これで現在3つの Message モデルのレコードがデータベースに保存されました。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent.html#inserting-and-updating-models" target="_blank">参考: Modelの追加と更新</a></li>
</ul>

<h5>all()</h5>

<p>何度か出てきていますが、 <code>all()</code> は複数のレコードを取得する関数であり、レコード全体を取得します。</p>

<pre><code>&gt;&gt;&gt; App\Message::all()

=&gt; Illuminate\Database\Eloquent\Collection {#701
     all: [
       App\Message {#705
         id: 1,
         content: "hello",
         created_at: "2016-11-29 04:30:16",
         updated_at: "2016-11-29 04:30:16",
       },
       App\Message {#706
         id: 2,
         content: "sample1",
         created_at: "2016-11-29 04:46:45",
         updated_at: "2016-11-29 04:46:45",
       },
       App\Message {#707
         id: 3,
         content: "sample2",
         created_at: "2016-11-29 04:46:58",
         updated_at: "2016-11-29 04:46:58",
       },
     ],
   }
</code></pre>

<h5>first()</h5>

<p>インスタンスが持つ <code>first()</code> という関数は、最初のレコードのインスタンスを1つだけ返します。</p>

<pre><code>&gt;&gt;&gt; $message = App\Message::first()

=&gt; App\Message {#704
     id: 1,
     content: "hello",
     created_at: "2016-11-29 04:30:16",
     updated_at: "2016-11-29 04:30:16",
   }
</code></pre>

<h5>find()</h5>

<p>インスタンスが持つ <code>find()</code> という関数は、 <code>id</code> の値で検索し、単一のレコードを返す関数です。</p>

<pre><code>&gt;&gt;&gt; $message = App\Message::find(1)

=&gt; App\Message {#696
     id: 1,
     content: "hello",
     created_at: "2016-11-29 04:30:16",
     updated_at: "2016-11-29 04:30:16",
   }
</code></pre>

<p><code>find(1)</code> とすることで、 <code>id: 1</code> が検索され取得されていることが確認できます。</p>

<h5>where()</h5>

<p><code>where()</code> は <code>first()</code> や <code>find()</code> と違って、単一ではなく、複数のレコード（Collectionと呼ばれる）を取得できます。</p>

<p><code>where()</code> はほぼ SQL と同じく、条件指定をしてレコードを検索します。 <code>where(A, B)</code> となっていた場合は、 <code>A = B</code> として条件が設定されます。ただし、 <code>where()</code> だけではクエリを作成しただけで、実行まではされません。</p>

<pre><code>&gt;&gt;&gt; $messages = App\Message::where('content', 'hello')

=&gt; Illuminate\Database\Eloquent\Builder {#711}
</code></pre>

<p>そのため、 <code>where()</code> を実行するために <code>-&gt;get()</code> を付け足して実行させます。</p>

<pre><code>&gt;&gt;&gt; $messages = App\Message::where('content', 'hello')-&gt;get()

=&gt; Illuminate\Database\Eloquent\Collection {#699
     all: [
       App\Message {#703
         id: 1,
         content: "hello",
         created_at: "2016-11-29 04:30:16",
         updated_at: "2016-11-29 04:30:16",
       },
     ],
   }
</code></pre>

<p>結果として、単一のレコードしか保存していないので単一レコードが返されているかのように見えますが、返り値は <code>find()</code> で返ってきた <code>App\Message</code> とは違って <code>Illuminate\Database\Eloquent\Collection</code> となっていて、<code>{  }</code> の中を見ると <code>all: [ ... ]</code> となっています。つまり、配列となっています。確認しておきましょう。</p>

<p>また、 <code>where()</code> は SQL でそうだったように、様々な条件を指定することができます。引数を3つにすると、真ん中には演算子 (<code>&gt;=</code> 等)を書くことができます。</p>

<pre><code>&gt;&gt;&gt; $messages = App\Message::where('id', '&gt;=', '2')-&gt;get()
=&gt; Illuminate\Database\Eloquent\Collection {#713
     all: [
       App\Message {#714
         id: 2,
         content: "sample1",
         created_at: "2016-11-29 04:46:45",
         updated_at: "2016-11-29 04:46:45",
       },
       App\Message {#715
         id: 3,
         content: "sample2",
         created_at: "2016-11-29 04:46:58",
         updated_at: "2016-11-29 04:46:58",
       },
     ],
   }
</code></pre>

<pre><code>&gt;&gt;&gt; $messages = App\Message::where('content', 'LIKE', 'sample%')-&gt;get()

=&gt; Illuminate\Database\Eloquent\Collection {#702
     all: [
       App\Message {#712
         id: 2,
         content: "sample1",
         created_at: "2016-11-29 04:46:45",
         updated_at: "2016-11-29 04:46:45",
       },
       App\Message {#710
         id: 3,
         content: "sample2",
         created_at: "2016-11-29 04:46:58",
         updated_at: "2016-11-29 04:46:58",
       },
     ],
   }
</code></pre>

<p><code>get()</code> では複数レコードが返ってきましたが、<code>where()</code> で単一レコードが欲しい場合もあります。そんなときは <code>first()</code> と組み合わせることで、単一のレコードを得ることもできます。</p>

<pre><code>&gt;&gt;&gt; $message = App\Message::where('content', 'LIKE', 'sample%')-&gt;first()

=&gt; App\Message {#713
     id: 2,
     content: "sample1",
     created_at: "2016-11-29 04:46:45",
     updated_at: "2016-11-29 04:46:45",
   }
</code></pre>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent.html#retrieving-single-models" target="_blank">参考: 1モデル／集計の取得</a></li>
</ul>

<h4>レコードの更新 (Update)</h4>

<p>レコードを一気に更新させるときは、インスタンスを取得して、変数の値を上書きした上で <code>save()</code> を実行してください。</p>

<pre><code>&gt;&gt;&gt; $message = App\Message::find(1)

=&gt; App\Message {#690
     id: 1,
     content: "hello",
     created_at: "2016-11-29 04:30:16",
     updated_at: "2016-11-29 04:30:16",
   }

&gt;&gt;&gt; $message-&gt;content = 'updated'

=&gt; "updated"

&gt;&gt;&gt; $message-&gt;save()

=&gt; true

&gt;&gt;&gt; $message = App\Message::find(1)

=&gt; App\Message {#690
     id: 1,
     content: "updated",
     created_at: "2016-11-29 04:30:16",
     updated_at: "2016-11-29 04:36:28",
   }
</code></pre>

<h4>レコードの削除 (Delete)</h4>

<p>方法が2つあります。</p>

<p>クラス関数による削除の場合には <code>destroy()</code> を使用します。 <code>destroy()</code> の引数には <code>id</code> を入れてください。配列で複数入れることもできます。返り値として削除されたレコードの数が返されます。</p>

<pre><code>&gt;&gt;&gt; App\Message::destroy([1, 2])

=&gt; 2
</code></pre>

<p>返り値の 2 は <code>id</code> の値ではなく、削除されたレコード数です。これで <code>id</code> が <code>1</code>, <code>2</code> のレコードは削除されました。 <code>App\Message::all()</code> を実行すると <code>id</code> が <code>3</code> のみになっているので確認してみてください。</p>

<p>次に、インスタンス関数による削除の場合には、まずレコードをインスタンスとして取得します。</p>

<pre><code>&gt;&gt;&gt; $message = App\Message::first()

=&gt; App\Message {#708
     id: 3,
     content: "sample2",
     created_at: "2016-11-29 04:46:58",
     updated_at: "2016-11-29 04:46:58",
   }
</code></pre>

<p>そして <code>delete()</code> 関数で削除します。</p>

<pre><code>&gt;&gt;&gt; $message-&gt;delete()

=&gt; true
</code></pre>

<p>これで <code>$message</code> インスタンスに入っていたレコードは削除されました。</p>

<p>最後に <code>App\Message::all()</code> で確認してみると、レコードが全て削除されていることがわかります。</p>

<pre><code>&gt;&gt;&gt; App\Message::all()

=&gt; Illuminate\Database\Eloquent\Collection {#705
     all: [],
   }
</code></pre>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent.html#deleting-models" target="_blank">参考: Model削除</a></li>
</ul>

<h4>参考</h4>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/eloquent.html" target="_blank">参考: Eloquent：利用の開始 - Laravel 5.5</a></li>
</ul>

<p>上記の参考ページを読むと理解が深まると思います。下記コードのように、 <code>orderBy()</code> によって順番を入れ替えたり、 <code>take()</code> よって取得する数を決めたりすることもできます。</p>

<p><em>一例なので入力して実行確認は不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$flights</span> = <span class="constant">App</span>\<span class="constant">Flight</span>::where(<span class="string"><span class="delimiter">'</span><span class="content">active</span><span class="delimiter">'</span></span>, <span class="integer">1</span>)
               -&gt;orderBy(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">desc</span><span class="delimiter">'</span></span>)
               -&gt;take(<span class="integer">10</span>)
               -&gt;get();
</pre></div>
</div>
</div>

<p>更に <code>where()</code> を組み合わせて複雑な条件を組み上げ、 <code>update()</code> で条件に一致するもの一気に更新することもできます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">App</span>\<span class="constant">Flight</span>::where(<span class="string"><span class="delimiter">'</span><span class="content">active</span><span class="delimiter">'</span></span>, <span class="integer">1</span>)
          -&gt;where(<span class="string"><span class="delimiter">'</span><span class="content">destination</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">San Diego</span><span class="delimiter">'</span></span>)
          -&gt;update([<span class="string"><span class="delimiter">'</span><span class="content">delayed</span><span class="delimiter">'</span></span> =&gt; <span class="integer">1</span>]);
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-6">5.6 まとめ
</h3><p>ここまででモデルの操作の一通りを見てきました。Webアプリケーションでは Model が最も大事です。 Model の CRUD 関数を使って、しっかりレコードの CRUD をできるようにしておきましょう。実際の開発でも、 tinker 上で Model を操作したり動作確認することが多いです。 tinker にも充分慣れておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-7">5.7 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'message model'
</code></pre>
</div></section><section id="chapter-6"><h2 class="index">6. RouterとControllerとViewの開発の概要
</h2><div class="subsection"><p>Model はWebアプリケーションにとって最も大事なリソースです。そのため、Webアプリケーションとしての機能の中でも比較的独立しています。 tinker で動作確認するのもほとんどが Model の動作確認です。</p>

<p>他の要素である Router と Controller と View は、各々の関係性が強いと言えます。これらは Model のように独立して学ぶのではなく、関連を確認しながら学ぶことにします。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 Router と Controller と View の関係
</h3><p>まず、ユーザのリクエストからレスポンスまでの流れは下記のようになっていました。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/mvc.png" alt=""></p>

<p>ここで、Model は他よりも独立した存在なので、 Router と Controller と View の関係を見ていきます。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/laravel5.5/rcv01.png" alt=""></p>

<p>この図は Router に書かれた1つのルーティングが、複数の Controller の1つの関数（アクション）に相当し、そして Controller の1つの関数（アクション）が1つの View ファイルに対応するという意味の図になります。</p>

<p>Router とは、 URL のルーティングを一元管理を担当しているものです。したがって、 Router として機能している <em>routes/web.php</em> の1ファイルだけ見れば、このWebアプリケーションのルーティングを全て把握することができます。そして、ルーティングこそが、Webアプリケーションの全ての機能リストでもあります。ルーティングの把握をおろそかにしないでください。</p>

<p>Controller とは、ユーザから送信されてきた HTTP リクエストの処理を担当するものです。 HTTP リクエストは Router によって Controller の1つの関数に割り当てられます。 Router と対応している Controller の関数のことをアクションと呼びます。 Controller は HTTP リクエストに対応した Model の取得や作成、保存などを行います。</p>

<p>View とは、 Controller が HTTP リクエストを処理し終えて、最終的に HTTP レスポンスとして返す Web ページです。全ては Web 上でのアプリケーションなので、最後には、Web ページの表示という形でユーザに見えないと処理結果がわかりません。 View はユーザに向けて結果をお知らせするためのものです。 View は Controller によって選択された適切な Model の情報が埋め込まれます。</p>

<h4>静的な Web ページの場合の流れ</h4>

<p>静的な Web ページとは、レスポンスとして返される Web ページが変化のない単純な HTML の場合の Web ページです。</p>

<p>現状の <em>routes/web.php</em> は下記の通りであり、 Controller を経由せず View へ流しています。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> () {
    <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p>上記のように Laravel の Router は Controller に代わって、 Controller 的な仕事をしてしまうこともできます。しかし、それはあまり推奨されるやり方ではありません。基本的には Controller の仕事を Router が奪うべきではありません。</p>

<p>しかし、今回のルーティング先はただの静的 HTML であり、 操作対象としての Model もないので Controller としての仕事は View をレスポンスとして返すだけです。このためだけに Controller をわざわざ作成する必要は確かになさそうです。結論としては、今回のようにただの静的 HTML を返すだけのルーティングであれば、上記のような方法も許されるということです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 Router と Controller と View の開発の流れ
</h3><p>先ほど見たようにユーザからの HTTP リクエストは、入り口である Router を通り、 Router によって設定された Controller のアクションを通り、 Controller のアクションに対応した名前の View を HTTP レスポンスとして返すという、一連の決まった流れがあります。</p>

<p>開発の流れでも、この流れに沿って開発していくのが良いでしょう。</p>

<p>開発するとき、まずは、どんな機能を作ろうかと考えます。実装すべき機能を列挙できたら、そのためのルーティング（Router）を決めます。ルーティングが決まると Controller の関数が決まり、 Controller の関数が決まると View の名前が決まります。</p>
</div></section><section id="chapter-7"><h2 class="index">7. Routerの構築
</h2><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 リソースに対する CRUD のための4つのルーティング
</h3><p>Web アプリケーションは、ユーザが HTTP リクエストの4つの CRUD メソッド(POST, GET, PUT, DELETE)を使って、Web上のリソースを操作できるアプリケーションでした。そのため、CRUD について見ていきます。</p>

<p>リソース1つの CRUD に対応する HTTP リクエストのメソッドは下記の4つでした。</p>

<ul>
  <li>GET (Read)</li>
  <li>POST (Create)</li>
  <li>PUT (Update)</li>
  <li>DELETE (Delete)</li>
</ul>

<p>これに対応するルーティングを <em>routes/web.php</em> に書いてみます。</p>

<p><em>routes/web.php（コメント部分は省略）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@show</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@store</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::put(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@update</span><span class="delimiter">'</span></span>);
<span class="constant">Route</span>::<span class="predefined">delete</span>(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@destroy</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><code>post</code> や <code>put</code> 、 <code>delete</code> はページというより操作の名前です。</p>

<p><code>{id}</code> についても知っておきましょう。 <code>get</code>, <code>put</code>, <code>delete</code> はどのレコードを操作するのか明確にする必要があるので、 URL に <code>id</code> が入れられることになります。例えば、 <code>/messages/1</code> という URL に対して <code>get</code> のリクエストを送ると、 <code>id: 1</code> な Message を表示することになります。 <code>get</code> 以外の <code>put</code> や <code>delete</code> でも同様に <code>/messages/1</code> などの URL に対して CRUD が実行されます。 <code>post</code> の場合だけは別で、 <code>id</code> が不要です。そもそも新規作成のメソッドとなるので、 <code>id</code> はまだ用意されておりません。そのため、 <code>/messages</code> に <code>post</code> のリクエストを送ると、Messageが新規作成されます。</p>

<p>また、 <code>MessagesController@show</code> というように <code>Controller名 @ アクション名</code> という形で表記されています。アクション名に <code>show</code>, <code>store</code>, <code>update</code>, <code>destroy</code> とここでは書いていますが、任意のアクション名が設定できます。しかし、後でわかるように、 Laravel が <code>show</code>, <code>store</code>, <code>update</code>, <code>destroy</code> という命名を基本としているので、それに従うのがベターです。また、次のセクションで学びますが、 <code>index</code>, <code>create</code>, <code>edit</code> も同様に Laravel が決めている基本の命名です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-2">7.2 CRUDのための残り3つの補助ページ
</h3><p>ルーティングは4つのみではありません。あと3つのルーティング( <code>index</code>, <code>create</code>, <code>edit</code> )について見ていきます。</p>

<p>ユーザがどうやって HTTP リクエストを出すのか考えてみてください。直接 HTTP リクエストを送信するのではなく、ユーザは Web ブラウザ上に表示された Web ページ上でリソースの CRUD 操作を行います。そのため、操作のための Web ページも用意する必要があります。</p>

<h4>詳細ページ(show)にアクセスするには、一覧ページ(index)が必要</h4>

<p><em>routes/web.php（既存部分の抜粋：追記不要）</em></p>

<pre><code>Route::get('messages/{id}', 'MessagesController@show');
</code></pre>

<p>これが詳細ページ(show)のルーティングでした。しかし、まずリソースの一覧ページがないと、個別のリソースページである詳細ページへ（直接 URL を入力するしか）辿り着けません。</p>

<p>そのため、一覧ページ(index)を付け加えることになります。既存部分にもコメントをつけたので、以下の内容で <em>routes/web.php</em> を上書きしてください。</p>

<p><em>routes/web.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="comment">// デフォルトのコメント部分は省略</span>

<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> () {
    <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>);
});

<span class="comment">// CRUD</span>
<span class="comment">// メッセージの個別詳細ページ表示</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@show</span><span class="delimiter">'</span></span>);
<span class="comment">// メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）</span>
<span class="constant">Route</span>::post(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@store</span><span class="delimiter">'</span></span>);
<span class="comment">// メッセージの更新処理（編集画面を表示するためのものではありません）</span>
<span class="constant">Route</span>::put(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@update</span><span class="delimiter">'</span></span>);
<span class="comment">// メッセージを削除</span>
<span class="constant">Route</span>::<span class="predefined">delete</span>(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@destroy</span><span class="delimiter">'</span></span>);

<span class="comment">// index: showの補助ページ</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@index</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<h4>保存アクション(store)にデータを送るには、新規作成用のフォームページ(create)が必要</h4>

<p><em>routes/web.php（既存部分の抜粋：追記不要）</em></p>

<pre><code>Route::post('messages', 'MessagesController@store');
</code></pre>

<p>これが保存アクション(store)でした。このアクションを起こすときには必ず何らかのデータを渡す必要があります。そのために使われるのが入力フォームです。</p>

<p>そのため、新規作成用のフォームページ(create)を付け加えることになります。<code>create</code> のルーティング設定を <em>routes/web.php</em> に追記してください。</p>

<p><em>routes/web.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// CRUD</span>
<span class="comment">// （中略）</span>

<span class="comment">// index: showの補助ページ</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@index</span><span class="delimiter">'</span></span>);
<span class="comment">// create: 新規作成用のフォームページ</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages/create</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@create</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<h4>更新アクション(update)にデータを送るには、更新用のフォームページ(edit)が必要</h4>

<p><em>routes/web.php（既存部分の抜粋：追記不要）</em></p>

<pre><code>Route::put('messages/{id}', 'MessagesController@update');
</code></pre>

<p>これが更新アクション(update)でした。このアクションを起こすときには必ず何らかのデータを渡す必要があります。そのために使われるのが入力フォームです。</p>

<p>そのため、更新用のフォームページ(edit)を付け加えることになります。<em>routes/web.php</em> の <code>index</code>、<code>create</code>、<code>edit</code> のルーティング設定を以下の内容で上書きしてください。</p>

<p><em>routes/web.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// CRUD</span>
<span class="comment">// （中略）</span>

<span class="comment">// index: showの補助ページ</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@index</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">messages.index</span><span class="delimiter">'</span></span>);
<span class="comment">// create: 新規作成用のフォームページ</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages/create</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@create</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">messages.create</span><span class="delimiter">'</span></span>);
<span class="comment">// edit: 更新用のフォームページ</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}/edit</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@edit</span><span class="delimiter">'</span></span>)-&gt;name(<span class="string"><span class="delimiter">'</span><span class="content">messages.edit</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>ルーティングの後ろに新規でつなげた <code>name</code> は「名前つきルート」というもので、特定のルートへのURLを生成したり、リダイレクトしたりする場合に便利なものです。</p>

<h4>削除アクション(delete)を起こすには、ボタンがあれば大丈夫</h4>

<p>削除アクションは、フォームのデータが不要なので、index, show, edit ページのどこかに削除ボタンが設置してあればそれで事足ります。そのため、削除のためのページは不要です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-3">7.3 7つの基本ルーティングの省略形
</h3><p>ここまで、1つのリソース操作のためのルーティングを長々とコーディングしてきました。しかし、この7つのルーティングは基本のものなので、実はたった1行の記述で7つの基本ルーティングが用意できる省略形があります。</p>

<p><em>まだ追記しないでください</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>たったこれだけで、先ほど書いたルーティングと全く同じ意味になります。</p>

<p>先ほどまでのルーティング設定では index や show などありましたが、<code>resource()</code> で生成されるルーティングに合わせて記述していたので、この省略形を利用する形で問題ありません。</p>

<p>メッセージボードは省略形の　<code>Route::resource('messages', 'MessagesController');</code> を使って実現させましょう。</p>

<p>今回、省略形であるルートを説明した理由は、省略形以外にも例えば複写機能を新たにルート追加をつけたい場合に　</p>

<p><em>一例なので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController</span><span class="delimiter">'</span></span>);
<span class="comment">// 複写機能（ボタン）</span>
<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">messages/{id}/copy</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@copy</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>と追加すれば、新たなルートが作成できるようになる、というのを理解いただきたかったからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-4">7.4 Router の完成
</h3><p>最後に、デフォルトで表示されていた下記のルーティングを書き換えます。</p>

<p><em>routes/web.php（抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> () {
    <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">welcome</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p>このルーティング設定を、下記の内容で書き換えます。トップページ <code>/</code> を MessagesController の index アクションに設定するという内容です。つまり index アクションは、 <code>/</code> にアクセスしたときと、 <code>/messages</code> にアクセスした両方で同じルーティングが設定されたことになります。</p>

<p><em>まだ追記しないでください</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@index</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>最終的に <em>routes/web.php</em> は下記の通りになります。この内容で <em>routes/web.php</em> を上書きしてください。</p>

<p><em>routes/web.php 完成版</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="comment">// デフォルトのコメント部分は省略</span>

<span class="constant">Route</span>::get(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController@index</span><span class="delimiter">'</span></span>);

<span class="constant">Route</span>::<span class="predefined-type">resource</span>(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">MessagesController</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>
</div></section><section id="chapter-8"><h2 class="index">8. Controller と Viewの構築
</h2><div class="subsection"><p>Controller と View は密接に関わるので、同時に開発していきます。まずは Controller から作成します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 RESTful Resource Controller の生成
</h3><p>では、早速、先ほどのルーティングに対応した Controller を作成してみます。Route::resource(‘messages’, ‘MessagesController’); で指定した Controller 名で作成してください。 Model は <code>Message</code> と単数形で作成しましたが、一般的に Controller は複数形の名前 + <code>Controller</code> (例：<code>MessagesController</code> 等) にされることが多いです。と言っても決まりではないので任意の名前をつけても良いですが、 Router に対応した Controller 名をつけないとルーティングされません。このレッスンでは以下のとおりにコマンドを実行してください。</p>

<pre><code>$ php artisan make:controller MessagesController --resource
</code></pre>

<p>Controller は app/Http/controllers/ 以下に生成、配置されます。MessagesController.phpというファイルが作成されました。繰り返しですが、コントローラファイルの命名規則は、</p>

<pre><code>複数形(単数形でもOKだが複数形が推奨)　＋　Controller　＋　.php
</code></pre>

<p>がセオリーです。このルールに沿って行うことによりコントローラの目的が明確となりエラーも少なくなります。さらに、他の方がメンテナンスしやすいコーディングとなります。</p>

<p>ただいま作成した<code>app/Http/controllers/MessagesController.php</code> というファイルの中身を確認してください。</p>

<p>実は <code>--resource</code> をつけて <code>make:controller</code> で作成された Controller は先ほどの7つのルーティングに対応した7つのアクションが入った形で作られます。この形の Controller を RESTful Resource Controller と呼びます。</p>

<p>RESTfulとはリソース（URL）に対して、取得(GET) / 新規登録(POST) / 更新(PUT) / 削除(DELETE) といったHTTPリクエストメソッドをURIに応じて実行できる、というものです。</p>

<p>routes/web.php　で下記の定義すると、</p>

<pre><code>Route::resource('messages', 'MessagesController');
</code></pre>

<p><em>app/Http/Controllers/MessagesController.php</em>  は下記のメソッドが標準で生成されたため、7つのルーティングに対応した7つのアクションが動作します。</p>

<p>日本語の説明でコメントを書き換えた <em>app/Http/Controllers/MessagesController.php</em>  を下記に示します。</p>

<p><em>app/Http/Controllers/MessagesController.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Controllers</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Http</span>\<span class="constant">Request</span>;

<span class="keyword">class</span> <span class="class">MessagesController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{
    <span class="comment">// getでmessages/にアクセスされた場合の「一覧表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="comment">//</span>
    }

    <span class="comment">// getでmessages/createにアクセスされた場合の「新規登録画面表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">create</span>()
    {
        <span class="comment">//</span>
    }

    <span class="comment">// postでmessages/にアクセスされた場合の「新規登録処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>)
    {
        <span class="comment">//</span>
    }

    <span class="comment">// getでmessages/idにアクセスされた場合の「取得表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">show</span>(<span class="local-variable">$id</span>)
    {
        <span class="comment">//</span>
    }

    <span class="comment">// getでmessages/id/editにアクセスされた場合の「更新画面表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">edit</span>(<span class="local-variable">$id</span>)
    {
        <span class="comment">//</span>
    }

    <span class="comment">// putまたはpatchでmessages/idにアクセスされた場合の「更新処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">update</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>, <span class="local-variable">$id</span>)
    {
        <span class="comment">//</span>
    }

    <span class="comment">// deleteでmessages/idにアクセスされた場合の「削除処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">destroy</span>(<span class="local-variable">$id</span>)
    {
        <span class="comment">//</span>
    }
}
</pre></div>
</div>
</div>

<p>ただし、ただの雛形なので、アクションの中身はまだ何も処理が書かれていませんし、そのため何も処理しません。この中身は私たちでコーディングしていくことになります。</p>

<p>Controller が生成されると、 <code>$ php artisan route:list</code> でルーティングの確認が可能です。結果が下記のようになっていれば問題なく進めています。</p>

<pre><code>$ php artisan route:list
</code></pre>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>+--------+-----------+-------------------------+------------------+-------------------------------------------------+--------------+
| Domain | Method    | URI                     | Name             | Action                                          | Middleware   |
+--------+-----------+-------------------------+------------------+-------------------------------------------------+--------------+
|        | GET|HEAD  | /                       |                  | App\Http\Controllers\MessagesController@index   | web          |
|        | GET|HEAD  | api/user                |                  | Closure                                         | api,auth:api |
|        | GET|HEAD  | messages                | messages.index   | App\Http\Controllers\MessagesController@index   | web          |
|        | POST      | messages                | messages.store   | App\Http\Controllers\MessagesController@store   | web          |
|        | GET|HEAD  | messages/create         | messages.create  | App\Http\Controllers\MessagesController@create  | web          |
|        | GET|HEAD  | messages/{message}      | messages.show    | App\Http\Controllers\MessagesController@show    | web          |
|        | PUT|PATCH | messages/{message}      | messages.update  | App\Http\Controllers\MessagesController@update  | web          |
|        | DELETE    | messages/{message}      | messages.destroy | App\Http\Controllers\MessagesController@destroy | web          |
|        | GET|HEAD  | messages/{message}/edit | messages.edit    | App\Http\Controllers\MessagesController@edit    | web          |
+--------+-----------+-------------------------+------------------+-------------------------------------------------+--------------+
</pre></div>
</div>
</div>

<p><code>PATCH</code> は <code>PUT</code> は同じです。<code>HEAD</code> を含め、あまり深く考える必要はありません。また、 <code>{id}</code> で説明してきたものが <code>{message}</code> に代わっていますが、この場合でも <code>/messages/1/edit</code> のように <code>id</code> が入ることに変わりありません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 View の構成について
</h3><h4>7つのアクションに対応した View ファイルの作成</h4>

<p>では、まず7つのアクションに対応した View ファイルを作成していきます。ただし、下記のルーティングの中で必要なのは GET メソッドで指定されたルーティングのみです。なぜなら GET 以外はページの表示ではなくリソースの具体的な操作だからです。以降、 Controller を実装していくとわかるようになります。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>+--------+-----------+-------------------------+------------------+-------------------------------------------------+--------------+
| Domain | Method    | URI                     | Name             | Action                                          | Middleware   |
+--------+-----------+-------------------------+------------------+-------------------------------------------------+--------------+
|        | GET|HEAD  | /                       |                  | App\Http\Controllers\MessagesController@index   | web          |
|        | GET|HEAD  | api/user                |                  | Closure                                         | api,auth:api |
|        | GET|HEAD  | messages                | messages.index   | App\Http\Controllers\MessagesController@index   | web          |
|        | POST      | messages                | messages.store   | App\Http\Controllers\MessagesController@store   | web          |
|        | GET|HEAD  | messages/create         | messages.create  | App\Http\Controllers\MessagesController@create  | web          |
|        | GET|HEAD  | messages/{message}      | messages.show    | App\Http\Controllers\MessagesController@show    | web          |
|        | PUT|PATCH | messages/{message}      | messages.update  | App\Http\Controllers\MessagesController@update  | web          |
|        | DELETE    | messages/{message}      | messages.destroy | App\Http\Controllers\MessagesController@destroy | web          |
|        | GET|HEAD  | messages/{message}/edit | messages.edit    | App\Http\Controllers\MessagesController@edit    | web          |
+--------+-----------+-------------------------+------------------+-------------------------------------------------+--------------+
</pre></div>
</div>
</div>

<p>GET メソッドのもののみで良かったので、 GET のルーティングである <code>index</code>, <code>show</code>, <code>create</code>, <code>edit</code> に対応する View を作成します。具体的なファイルの場所と名前は下記の通りです。</p>

<ul>
  <li><em>resources/views/messages/index.blade.php</em></li>
  <li><em>resources/views/messages/show.blade.php</em></li>
  <li><em>resources/views/messages/create.blade.php</em></li>
  <li><em>resources/views/messages/edit.blade.php</em></li>
</ul>

<p>まず、 Cloud9上で <em>resources/views/</em> の直下に <em>messages</em> フォルダを作成し、空っぽのファイルで良いので、上記の4つのファイルを作成してください。</p>

<p>View は <em>resources/views/</em> の下にフォルダ分けされながら配置されます。残念ながら View を作成する artisan コマンドは用意されていませんので、手作業で1つずつ作成してください。</p>

<h4>Blade とは</h4>

<p><em>index.blade.php</em> のように <em>.php</em> の前に <em>.blade</em> という拡張子が含まれています。これは Blade 形式の View を表しています。Blade について学んでおきましょう。</p>

<p>Blade は、PHP プログラムのように、HTML を埋め込みます。更に便利な機能もついています。</p>

<ul>
  <li>HTML の継承: <code>@yield</code></li>
  <li>
    <p>HTML の分割: <code>@include</code></p>
  </li>
  <li><a href="https://readouble.com/laravel/5.5/ja/blade.html" target="_blank">参考: Bladeテンプレート - Laravel 5.5</a></li>
</ul>

<p>これらの機能は、実際に見ていったほうが理解ができるでしょう。</p>

<h4>共通部の抜き出し</h4>

<p>View は <em>resources/views/welcome.blade.php</em> で見た通り、基本的には HTML を記述していきます。</p>

<p>そして HTML を書くときに必ず共通する部分が現れます。それは、 <code>&lt;!DOCTYPE html&gt;</code> や head要素などです。この辺りはページによって変更されず、どこも同じです。それを全てのページに書くのは非効率と言えます。もし View が大量にあり、共通部を別々のファイルに作成しているときに、head要素内を変更するとどうなるでしょうか。全てのファイルを書き換えなければなりません。とてつもない単純作業であり、どこかのファイルだけ head 要素が更新されていないようなことにもなり、バグを生む可能性もあります。</p>

<p>そうならないためにも共通部は1つのファイルにまとめておきましょう。 Blade を使えば手軽にそれが可能です。</p>

<p><em>resources/views/</em> の直下に <em>layouts/</em> フォルダを作成し、 <em>app.blade.php</em> を下記の通り作成してください。</p>

<p><em>resources/views/layouts/app.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="utf-8"&gt;
        &lt;title&gt;MessageBoard&lt;/title&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"&gt;
        &lt;link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"&gt;
    &lt;/head&gt;

    &lt;body&gt;
        &lt;header class="mb-4"&gt;
            &lt;nav class="navbar navbar-expand-sm navbar-dark bg-dark"&gt;
                &lt;a class="navbar-brand" href="/"&gt;MessageBoard&lt;/a&gt;
                
                &lt;button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar"&gt;
                    &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
                &lt;/button&gt;
                
                &lt;div class="collapse navbar-collapse" id="nav-bar"&gt;
                    &lt;ul class="navbar-nav mr-auto"&gt;&lt;/ul&gt;
                    &lt;ul class="navbar-nav"&gt;
                    &lt;/ul&gt;
                &lt;/div&gt;
            &lt;/nav&gt;
        &lt;/header&gt;
        
        &lt;div class="container"&gt;
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

<p>上記は全てのページで共通なので、わざわざページ毎に上記決まり文句を書くのではなく、1つにまとめておきます。</p>

<p><em>app.blade.php</em> は実際に呼び出される <em>index.blade.php</em> などから <code>@extends('layouts.app')</code> という形で呼び出されます。</p>

<p>そして <em>index.blade.php</em> などは <code>@extends('layouts.app')</code> で共通レイアウトを呼び出し、 <code>@yield('content')</code> の箇所を <code>@section('content') ... @endsection</code> の中に書かれたコンテンツによって埋め込みます。</p>

<div class="alert alert-info">
<strong>※ 補足：</strong> <code>&lt;ul class="navbar-nav"&gt;</code> を2つ記述しています。<br>
<br>
<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                    &lt;ul class="navbar-nav mr-auto"&gt;&lt;/ul&gt;
                    &lt;ul class="navbar-nav"&gt;
                    &lt;/ul&gt;
</pre></div>
</div>
</div>
<br>
1つ目の <code>&lt;ul&gt;</code> に <code>mr-auto</code> クラスを設定して内容は空っぽにしておくと、2つ目の <code>&lt;ul&gt;</code> に追加した <code>&lt;li&gt;</code> の内容はナビゲーションバーの右側に表示されます。
</div>

<p>では、 <em>app.blade.php</em> を呼び出す4つの View の雛形を完成させておきましょう。</p>

<p><em>resouces/views/messages/index.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

&lt;!-- ここにページ毎のコンテンツを書く --&gt;

@endsection
</pre></div>
</div>
</div>

<p><em>resouces/views/messages/show.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

&lt;!-- ここにページ毎のコンテンツを書く --&gt;

@endsection
</pre></div>
</div>
</div>

<p><em>resouces/views/messages/create.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

&lt;!-- ここにページ毎のコンテンツを書く --&gt;

@endsection
</pre></div>
</div>
</div>

<p><em>resouces/views/messages/edit.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

&lt;!-- ここにページ毎のコンテンツを書く --&gt;

@endsection
</pre></div>
</div>
</div>

<p>全て同じです。 <code>@section('content') ... @endsection</code> の中が共通レイアウトの <code>@yield('content')</code> に埋め込まれます。</p>

<h4>Laravel Collective のインストール</h4>

<p>以降で、リンクやフォームを関数によって自動生成してくれる <strong>Laravel Collective</strong> を使用します。これらはとても便利な関数群です。</p>

<p>これを利用するためには、 Laravel に付属していない外部のライブラリとしてインストールする必要があります。それでは composer を使ってインストールしていきましょう。以下のように <code>composer require</code> コマンドを実行してください。</p>

<pre><code>$ composer require "laravelcollective/html":"5.5.*"
</code></pre>

<p>成功すると、プロジェクトフォルダの直下にある <em>composer.json</em> と <em>composer.lock</em> が自動的に更新され、指定したパッケージ名とバージョンが記載されます。パッケージは、プロジェクトフォルダの直下にある vendor フォルダの下に配置されます。</p>

<!--
プロジェクトフォルダの直下にある *composer.json* で `require` の項目の中に `"laravelcollective/html": "5.5.*"` のようにインストールするライブラリ名とバージョンを記入しましょう。その際に、1行上の行末に `,` を入れてあげるのを忘れないようにしてください。

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

これで Laravel Collective の外部ライブラリを使用する準備は完了です。
-->

<p>参考までに、今回インストールした「LaravelCollective」のドキュメントを以下に記載します。</p>

<ul>
  <li><a href="https://github.com/LaravelCollective/docs/blob/5.4/html.md" target="_blank">「LaravelCollective」のドキュメント（英語：5.4版ですが内容に問題はありません）</a></li>
</ul>

<h4>GitHubのトークンを取得する方法</h4>

<!--
`$ composer update` の実行中、下記の表示で止まるかもしれません。
-->

<p><code>compose</code> コマンドの実行中、下記の表示で止まるかもしれません。</p>

<pre><code>GitHub API limit (0 calls/hr) is exhausted, 

...（以下略）...

to retrieve a token. It will be stored in "/home/ec2-user/.composer/auth.json" for future use by Composer.
Token (hidden): 
</code></pre>

<p>その場合、<code>Token (hidden):</code> の表示に続いて「GitHubのトークン」を入力する必要があります。以下の手順に従ってください。</p>

<p>まずは <a href="https://github.com/" target="_blank">GitHub</a> のサイトにアクセスし、前のレッスンで登録したアカウントでログインしてください。ログインしたら画面右上のプロフィール画像をクリックして「Settings」をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/get_github_token_01.png" alt=""></p>

<p>「Personal settings」画面左側のメニューから「Developer settings」をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/get_github_token_02.png" alt=""></p>

<p>「Developer settings」画面左側のメニューから「Personal access tokens」をクリックし、表示された画面の右上にある「Generate new token」をクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/get_github_token_03.png" alt=""></p>

<p>パスワードの入力を求められたらパスワードを入力して「Confirm password」ボタンをクリックしましょう。「New personal access token」画面が表示されたら「Token description」に適当な文字列を入力し、さらに「Select scopes」欄で「repo」にチェックを入れてください。入力が完了したら「Generate token」ボタンをクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/get_github_token_04.png" alt=""></p>

<p>…（中略）…</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/get_github_token_05.png" alt=""></p>

<p>トークンが作成されました。下の画像の矢印で示したマークをクリックしてトークンの文字列をクリップボードにコピーしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/get_github_token_06.png" alt=""></p>

<p>Cloud9の画面に戻り、コピーしたトークン文字列を <code>Token (hidden):</code> の後にペーストして、エンターキーを押してください。<code>Token stored successfully.</code> と表示されれば完了です。なお <code>(hidden)</code> とあるように、ペーストしても画面には表示されませんので、注意しましょう。本当に正しく入力できているか確認したい場合は <code>/home/ec2-user/.composer/auth.json</code> を nano で開いてください。</p>

<pre><code>$ nano /home/ec2-user/.composer/auth.json
</code></pre>

<p>下記のように表示されます。</p>

<div class="language-json highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
    <span class="key"><span class="delimiter">"</span><span class="content">github-oauth</span><span class="delimiter">"</span></span>: {
        <span class="key"><span class="delimiter">"</span><span class="content">github.com</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">ff4xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxb3d</span><span class="delimiter">"</span></span>
    }
}
</pre></div>
</div>
</div>

<p>保存されているトークン文字列（上記の例における <code>ff4...b3d</code> の部分）が発行されたものと異なる場合は、nanoで修正して上書き保存してください。問題なければ nano を終了し、改めて <code>composer</code> コマンドを実行しましょう。<code>Package manifest generated successfully.</code> と表示されたら、完了です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 MessagesController@index
</h3><p>では、7つのルーティングに対するレスポンスを実装していきます。</p>

<p>まずは index アクションに対応する Controller と View を開発していきましょう。</p>

<h4>Controller</h4>

<p>現状の Controller の該当箇所を見ておきます。</p>

<p><em>app/Http/Controllers/MessagesController.php の index アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="comment">//</span>
    }
</pre></div>
</div>
</div>

<p>では、コーディングしていきますが、 index アクションの役割はなんだったでしょうか？そうです、 Message のレコードの一覧表示です。</p>

<p>では、 Model の一覧を取得するにはどうすれば良かったでしょうか？全てのレコードであれば <code>App\Message::all()</code> でしたね。</p>

<p>この Controller は <code>App\Message</code> の Model 操作が主な役割なので、 <code>use App\Message;</code> しておきます。これでわざわざ <code>App</code> の名前空間を書かなくてよくなります。つまり <code>Message::all()</code> で良いわけです。</p>

<p>更に Controller から特定の View を呼び出すには、 <code>view()</code> を使えば良いので、 <code>return view('messages.index');</code> を呼び出すことになります。 <code>messages.index</code> となっているのは、 <em>index.blade.php</em> が <em>resouces/views/messages/index.blade.php</em> に配置されているからです。 <em>resources/views</em> 以下にフォルダがある場合には <code>フォルダ名.ファイル名</code> という形で指定します。</p>

<p>では、これをファイルに書き込んでいきましょう。</p>

<p><em>app/Http/Controllers/MessagesController.php の一部抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">App</span>\<span class="constant">Http</span>\<span class="constant">Controllers</span>;

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Http</span>\<span class="constant">Request</span>;

<span class="keyword">use</span> <span class="constant">App</span>\<span class="constant">Message</span>;    <span class="comment">// 追加</span>

<span class="keyword">class</span> <span class="class">MessagesController</span> <span class="keyword">extends</span> <span class="constant">Controller</span>
{
    <span class="comment">// getでmessages/にアクセスされた場合の「一覧表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="local-variable">$messages</span> = <span class="constant">Message</span>::all();

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.index</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$messages</span>,
        ]);
    }

    <span class="comment">// 以降略</span>
    
}
</pre></div>
</div>
</div>

<p>view() のところで少し解説します。第一引数 ( <code>messages.index</code> ) は変わらず表示したい View を指定しています。第二引数である <code>['messages' =&gt; $messages]</code> は <code>messages.index</code> という View に渡すデータを指定しています。 <code>$messages = Message::all();</code> としたところで View にはデータが渡らないので、ここで指定しています。</p>

<p><em>既に記述された内容のため追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.index</span><span class="delimiter">'</span></span>, [ <span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$messages</span>, ]);
</pre></div>
</div>
</div>

<p>このように連想配列形式として第二引数にセットする必要があります。また、左側が <code>messages</code> でビューファイル側で呼び出す変数名になり、右側は <code>$messages</code> でコントローラ内で生成した変数をセットしています。もしも以下のように左側が <code>test</code> ならば View のファイル側では <code>$messages</code> ではなく、 <code>$test</code> という変数として呼び出すことができるようになります。</p>

<p><em>一例のため追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.index</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">test</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$messages</span>,
        ]);
</pre></div>
</div>
</div>

<h4>View</h4>

<p>現状の View の該当箇所を見ておきます。</p>

<p><em>resources/views/messages/index.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

&lt;!-- ここにページ毎のコンテンツを書く --&gt;

@endsection
</pre></div>
</div>
</div>

<p>Controller から渡されたデータ (<code>$messages</code>) を一覧表示させましょう。下記のようにコーディングしてください。</p>

<p><em>resources/views/messages/index.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

    &lt;h1&gt;メッセージ一覧&lt;/h1&gt;

    @if (count($messages) &gt; 0)
        &lt;table class="table table-striped"&gt;
            &lt;thead&gt;
                &lt;tr&gt;
                    &lt;th&gt;id&lt;/th&gt;
                    &lt;th&gt;メッセージ&lt;/th&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                @foreach ($messages as $message)
                &lt;tr&gt;
                    &lt;td&gt;{{ $message-&gt;id }}&lt;/td&gt;
                    &lt;td&gt;{{ $message-&gt;content }}&lt;/td&gt;
                &lt;/tr&gt;
                @endforeach
            &lt;/tbody&gt;
        &lt;/table&gt;
    @endif

@endsection
</pre></div>
</div>
</div>

<p>追記されたコードが何をしているのか、おそらくイメージはつくと思います。 Controller から渡された <code>$messages</code> というレコード群が1つ以上あれば(<code>count($messages)</code> が1以上)、 <code>@foreach</code> で1つずつ <code>$message</code> として取り出し、  <code>{{ $message-&gt; id }}</code> によって <code>id</code> カラム、<code>{{ $message-&gt; content }}</code> によって <code>content</code> カラムのデータ内容を表示しています。</p>

<h4>動作確認</h4>

<p>ここまでで、メッセージの一覧表示は完成です。</p>

<p>index の表示が正常に行われるかを動作確認しましょう。</p>

<p>Laravel サーバを起動(<code>$ php artisan serve --host=$IP --port=$PORT</code> )してください。index アクションを動作させるには、 <code>/</code> もしくは <code>/messages</code> にアクセスします。もし <code>?_c9_id=livepreview0&amp;_c9_host=https://console.aws.amazon.com/</code> のようなパラメータがブラウザのURL欄に入っていた場合は、削除した上で <code>/</code> や <code>/messages</code> にアクセスしてください。</p>

<p>アクセスしたら、画面上にメッセージの一覧が表示されているか確認しましょう。もし、動作確認の方法を忘れてしまった場合は、<a href="./message-board#chapter-3-6" target="_blank">3.6 初期状態での動作確認</a> を復習してください。</p>

<p>メッセージ一覧が表示されていれば正常に動作しています。もしエラーなどが出た場合には下記を参考にしてください。それ以外のエラーの場合には、一度メンターに質問してみましょう。</p>

<h5>MySQL サーバが起動していないときのエラー</h5>

<pre><code>PDOException in Connector.php line 55:
SQLSTATE[HY000] [2002] Connection refused
</code></pre>

<p>というエラーメッセージが出た方は、 <code>$ sudo service mysqld status</code> で MySQL サーバが起動しているか確認してください。起動していなければ、起動してから再度アクセスしてください。</p>

<h5>li要素が表示されない場合</h5>

<p>ページが表示されているが、li要素が表示されない場合は、まずレコードが1件以上があるか確認しましょう。 tinker を起動して、 <code>App\Message::all()</code> を実行してみてください。レコードが0件の場合、当然メッセージは1件も表示されません。次の <code>create</code> と <code>store</code> を作成してメッセージを登録しても良いですし、今すぐメッセージの表示を確認したい場合は tinker 上でメッセージを1件以上作成してください。</p>

<pre><code>$ php artisan tinker

&gt;&gt;&gt; App\Message::all();

レコードが0件
=&gt; Illuminate\Database\Eloquent\Collection {#692
     all: [],
   }

レコードを1件作成
&gt;&gt;&gt; $message = new App\Message
&gt;&gt;&gt; $message-&gt;content = 'hello'
&gt;&gt;&gt; $message-&gt;save()
</code></pre>

<p>上記のコマンドを実行していって、メッセージレコードを1件保存したら再度アクセスしてみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-4">8.4 MessagesController@create
</h3><p>create アクションは、 POST メソッドを送信する新規作成用の入力フォーム置き場になります。</p>

<h4>Controller</h4>

<p>Message モデルのためのフォームなので、フォームの入力項目のために <code>$message = new Message;</code> でインスタンスを作成しています。</p>

<p><em>app/Http/Controllers/MessagesController.php の create アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// getでmessages/createにアクセスされた場合の「新規登録画面表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">create</span>()
    {
        <span class="local-variable">$message</span> = <span class="keyword">new</span> <span class="constant">Message</span>;

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.create</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">message</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$message</span>,
        ]);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<p>まず、index の View から create の View へ遷移できるリンクを、index の View 最後に作成しておきましょう。自分で <code>&lt;a&gt;</code> タグを記述しても良いですが、ここでは Laravel Collective の <code>link_to_route()</code> 関数を利用しています。4つの引数について、まとめます。</p>

<ul>
  <li>第1引数：ルーティング名</li>
  <li>第2引数：リンクにしたい文字列</li>
  <li>第3引数：<code>/messages/{message}</code> の <code>{message}</code> のようなURL内のパラメータに代入したい値を配列形式で指定（今回は不要なので空っぽの配列 <code>[]</code>）</li>
  <li>第4引数：HTML タグの属性を配列形式で指定（今回は Bootstrap のボタンとして表示するためのクラスを指定）</li>
</ul>

<p><em>resources/views/messages/index.blade.php（抜粋）</em></p>

<pre><code>    @endif
    
    {!! link_to_route('messages.create', '新規メッセージの投稿', [], ['class' =&gt; 'btn btn-primary']) !!}

@endsection
</code></pre>

<p>また、ナビゲーションバーにも新規メッセージの投稿リンクを追加しておきます。</p>

<p><em>resources/views/layouts/app.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        &lt;div class="collapse navbar-collapse" id="nav-bar"&gt;
            &lt;ul class="navbar-nav mr-auto"&gt;&lt;/ul&gt;
            &lt;ul class="navbar-nav"&gt;
                &lt;li class="nav-item"&gt;{!! link_to_route('messages.create', '新規メッセージの投稿', [], ['class' =&gt; 'nav-link']) !!}&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
</pre></div>
</div>
</div>

<p>ここまでできたら、create にフォームを設置します。Blade テンプレートにフォームを記述するのは、ここで初めてになりますので、方法をまとめます。</p>

<p>フォームはLaravel Collectiveの <code>Form</code> を使用して、生成します。</p>

<p><em>resources/views/messages/create.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

    &lt;h1&gt;メッセージ新規作成ページ&lt;/h1&gt;

    &lt;div class="row"&gt;
        &lt;div class="col-6"&gt;
            {!! Form::model($message, ['route' =&gt; 'messages.store']) !!}
        
                &lt;div class="form-group"&gt;
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;
        
                {!! Form::submit('投稿', ['class' =&gt; 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        &lt;/div&gt;
    &lt;/div&gt;
@endsection
</pre></div>
</div>
</div>

<p>上記2つのコードでは変数の内容や関数の結果を表示するのに <code>{!!</code>, <code>!!}</code> で囲っています。今までは <code>{{</code>, <code>}}</code> で囲っていましたが、これらには以下の違いがあります。</p>

<ul>
  <li><code>{{</code>,  <code>}}</code> で囲った場合は、htmlspecialchars 関数に通したものが出力されます。</li>
  <li><code>{!!</code>, <code>!!}</code> で囲った場合は、そのまま出力されます。</li>
</ul>

<p>文章で説明するより実際に2つの動作確認をする方がわかりやすいでしょう。例えばどこかの View (<em>create.blade.php</em> 等) で下記のコードを挿入して動作確認してみてください（確認が完了したら下記の2行は削除しましょう）。</p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    {{ '&lt;p style="color: red;"&gt;htmlspecialchars 関数に通した場合&lt;/p&gt;' }}
    {!! '&lt;p style="color: red;"&gt;htmlspecialchars 関数に通さなかった場合&lt;/p&gt;' !!}
</pre></div>
</div>
</div>

<p>動作確認してみると、 <code>{{</code>,  <code>}}</code> で囲った方は、 <code>&lt;p style="color: red;"&gt;htmlspecialchars 関数に通した場合&lt;/p&gt;</code> とそのまま表示されるのに対して、 <code>{!!</code>, <code>!!}</code> で囲った方は <code>&lt;p style="color: red;"&gt;htmlspecialchars 関数に通さなかった場合&lt;/p&gt;</code> がそのまま HTML として解釈され「style 属性が設定された p 要素（赤い字の要素）」として表示されます。</p>

<p><em>そのままHTMLとして解釈される例：</em></p>

<p style="color: red;">htmlspecialchars 関数に通さなかった場合</p>

<p>Bladeでは基本的に <code>{{</code>,  <code>}}</code> で囲う記法を使ってください。これは、PHPのレッスンで学んだように、悪意あるユーザが入力したHTMLが入る可能性のあるデータを出力するときは htmlspecialchars 関数を通すべきだからです。</p>

<p>しかし、Laravel Collective の関数やファサードが生成する HTML を出力するときは <code>{!!</code>, <code>!!}</code> で囲う記法を使います。Laravel Collective の関数やファサードは、渡されたデータの無害化を内部で行い、悪意あるHTMLを生成することもないので、そのまま出力して問題無いからです。</p>

<p><code>{!! Form::model($message, ['route' =&gt; 'messages.store']) !!}</code> として <code>htmlspecialchars</code> 関数を通していない理由がわかったでしょうか。 <code>htmlspecialchars</code> 関数に通してしまうと、 HTML コードが HTML コードとして解釈されずに、そのまま露出してしまうことになります。</p>

<p><code>{!!</code>, <code>!!}</code> の話をしたところで、フォームの話に戻り、フォームのコーディング方法を見ていきます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    {!! <span class="constant">Form</span>::model(<span class="local-variable">$message</span>, [<span class="string"><span class="delimiter">'</span><span class="content">route</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">messages.store</span><span class="delimiter">'</span></span>]) !!}

    <span class="comment">// 中略</span>

    {!! <span class="constant">Form</span>::close() !!}
</pre></div>
</div>
</div>

<p>まず、 <code>Form::model()</code> でフォームを開始して、 <code>Form::close()</code> でフォームを終了してください。これはそれぞれ、 <code>&lt;form&gt;</code> 開始タグと <code>&lt;/form&gt;</code> 終了タグに対応しており、実際にそれらが生成されます。<code>Form::model()</code> は第一引数に対象となる Model のインスタンスを取り、第二引数は連想配列を取ります。</p>

<p>連想配列にある、 <code>'route' =&gt; 'messages.store'</code> では、 <code>'route' =&gt; ルーティング名</code> として form タグの action 属性の設定を行っています。action 属性を <code>'messages.store'</code> としているのは、この POST メソッドのフォームを受け取って処理するのは、次に解説する MessagesController の store アクションだからです。</p>

<p>また、第二引数の連想配列に <code>'method' =&gt; 'post'</code> を追加しても良いですが、フォームを作成するときはデフォルトで POST メソッドになるので今回は不要です（PUT メソッドや DELETE メソッドの場合には <code>'method' =&gt; 'put'</code> や <code>'method' =&gt; 'delete'</code> を付与することになります）。</p>

<p><code>Form::model()</code> などが何を生成しているのか確認するには、 Google Chrome のデベロッパーツールを使用すると良いでしょう。</p>

<p>次は、フォームの中の input 要素について見ていきます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        {!! <span class="constant">Form</span>::label(<span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">メッセージ:</span><span class="delimiter">'</span></span>) !!}
        {!! <span class="constant">Form</span>::text(<span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span>, <span class="predefined-constant">null</span>, [<span class="string"><span class="delimiter">'</span><span class="content">class</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">form-control</span><span class="delimiter">'</span></span>]) !!}

        {!! <span class="constant">Form</span>::submit(<span class="string"><span class="delimiter">'</span><span class="content">投稿</span><span class="delimiter">'</span></span>) !!}
</pre></div>
</div>
</div>

<p><code>Form::label()</code> は第一引数に <code>Form::model($message, ...)</code> で指定されていた Message モデルのインスタンスである <code>$message</code> のカラム（この場合 <code>'content'</code> カラム）を与え、第二引数にラベル名を与えます。</p>

<p><code>Form::text()</code> の第一引数は <code>Form::label()</code> と同じく <code>$message</code> の <code>'content'</code> カラムを指定します。 <code>Form::text()</code> は <code>&lt;input type="text"&gt;</code> を生成するための関数です。第二引数はテキストボックスに入れておきたい固定の初期値（不要なら null）、第三引数は タグの属性情報を配列形式で指定します。他にも input 要素を生成するための関数としては <code>Form::password()</code>, <code>Form::email()</code>, <code>Form::select()</code>, <code>Form::checkbox()</code>, <code>Form::radio()</code> などその他にもあります。下記の参考ページを参照してください。</p>

<p><code>Form::submit('投稿')</code> は送信ボタンを生成する関数で、第一引数にボタンに書かれる表示を与えます。送信すると、 <code>Form::model($message, ['route' =&gt; 'messages.store'])</code> の <code>route</code> で指定された action 属性へフォームの入力内容が送られます。</p>

<ul>
  <li><a href="https://github.com/LaravelCollective/docs/blob/5.4/html.md" target="_blank">参考: Form</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-8-5">8.5 MessagesController@store
</h3><p>store アクションでは、 create のページから送信されるフォームを処理することになります。</p>

<h4>Controller</h4>

<p>送られてきたフォームの内容は <code>$request</code> に入っています。したがって、 <code>$request</code> から <code>content</code> を取り出して、新規作成したメッセージに代入し、保存します。</p>

<p><em>app/Http/Controllers/MessagesController.php の store アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// postでmessages/にアクセスされた場合の「新規登録処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>)
    {
        <span class="local-variable">$message</span> = <span class="keyword">new</span> <span class="constant">Message</span>;
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<p>store アクションの最後では <code>redirect('/')</code> として、 View を返さずに <code>/</code> へリダイレクト（自動でページを移動）させています。 View を作成しても良いですが、わざわざ作成する必要もないでしょう。</p>

<h4>View</h4>

<p>store アクションはメッセージを新規作成したあと、 <code>/</code> へリダイレクトさせているので、View は不要です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-6">8.6 MessagesController@show
</h3><p>index アクションとやることは似たようなものなので、一気に行きます。下記のようにコーディングしてください。</p>

<h4>Controller</h4>

<p>show アクションには <code>$id</code> の引数が与えられます。これは <code>/messages/1</code>, <code>/messages/4</code> といった URL にアクセスされたときに、 <code>$id = 1</code> や <code>$id = 4</code> のように代入されます。</p>

<p>また、 index アクションのときは <code>Message::all()</code> でレコード全てを取得していましたが、今回は <code>$id</code> が指定されているので、 <code>Message::find($id)</code> によって1つだけ取得します。そのため、 <code>$message</code> 変数も単数形の命名にしています。</p>

<p><em>app/Http/Controllers/MessagesController.php の show アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// getでmessages/idにアクセスされた場合の「取得表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">show</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$message</span> = <span class="constant">Message</span>::find(<span class="local-variable">$id</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.show</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">message</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$message</span>,
        ]);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<p>View には <code>$message</code> というレコード1件が届けられているので、それを使用して表示を行います。</p>

<p><em>resources/views/messages/show.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

    &lt;h1&gt;id = {{ $message-&gt;id }} のメッセージ詳細ページ&lt;/h1&gt;

    &lt;table class="table table-bordered"&gt;
        &lt;tr&gt;
            &lt;th&gt;id&lt;/th&gt;
            &lt;td&gt;{{ $message-&gt;id }}&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th&gt;メッセージ&lt;/th&gt;
            &lt;td&gt;{{ $message-&gt;content }}&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/table&gt;

@endsection
</pre></div>
</div>
</div>

<h4>動作確認</h4>

<p>これで <code>/messages/1</code> や <code>/messages/4</code> など、レコードの id に対してアクセスしてみてください。それぞれのメッセージ表示されることでしょう。レコードがない id にアクセスすると、エラーが発生します。このエラーは開発段階であるためエラーが発生しますが、実際にユーザに公開されるときには 404 Not Found というページを表示することになります。</p>

<h4>index から show へのリンクを追加する</h4>

<p>今のままでは、 show には URL を直打ちしなければアクセスできません。そのため、 index の View に show へのリンクを追加しましょう。</p>

<p><em>resources/views/messages/index.blade.php の foreach 部のみ抜粋</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>                @foreach ($messages as $message)
                &lt;tr&gt;
                    &lt;td&gt;{!! link_to_route('messages.show', $message-&gt;id, ['id' =&gt; $message-&gt;id]) !!}&lt;/td&gt;
                    &lt;td&gt;{{ $message-&gt;content }}&lt;/td&gt;
                &lt;/tr&gt;
                @endforeach
</pre></div>
</div>
</div>

<p><code>link_to_route()</code> の第4引数（HTMLの属性情報）は今回は不要なので、省略しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-7">8.7 MessagesController@edit
</h3><p>edit アクションは create アクションと似ています。しかし、既存のメッセージレコードを編集することになるので、 id でメッセージレコードを検索することになります。</p>

<h4>Controller</h4>

<p><em>app/Http/Controllers/MessagesController.php の edit アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// getでmessages/id/editにアクセスされた場合の「更新画面表示処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">edit</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$message</span> = <span class="constant">Message</span>::find(<span class="local-variable">$id</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.edit</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">message</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$message</span>,
        ]);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<p>store と違って update のルーティングには <code>$message-&gt;id</code> を渡す必要があります。そのため、 <code>'route' =&gt; ['messages.update', $message-&gt;id]</code> というルーティング指定になります。配列の2つ目に <code>$message-&gt;id</code> を入れることで update の URL である <code>/messages/{message}</code> の <code>{message}</code> に id が入ります。</p>

<p><em>resources/views/messages/edit.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

    &lt;h1&gt;id: {{ $message-&gt;id }} のメッセージ編集ページ&lt;/h1&gt;

    &lt;div class="row"&gt;
        &lt;div class="col-6"&gt;
            {!! Form::model($message, ['route' =&gt; ['messages.update', $message-&gt;id], 'method' =&gt; 'put']) !!}
        
                &lt;div class="form-group"&gt;
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;
        
                {!! Form::submit('更新', ['class' =&gt; 'btn btn-light']) !!}
        
            {!! Form::close() !!}
        &lt;/div&gt;
    &lt;/div&gt;

@endsection
</pre></div>
</div>
</div>

<p>ここで注目して欲しいのが、 Controller の edit アクションで実行されている、 <code>$message = Message::find($id)</code> によって取得される <code>$message</code> には <code>content</code> が最初から入っているという点です。そのため、上記の <em>edit.blade.php</em> のフォーム内にある <code>{!! Form::text('content') !!}</code> では、最初からその値が入っています。インスタンスに入力された値が自動的に入力されているということが <code>Form::model()</code> を使う大きな利点と言えるでしょう。</p>

<p>では、 URL の直入力以外でも edit ビューにアクセスできるように詳細ページにリンクを置きましょう。</p>

<p><em>resources/views/messages/show.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    &lt;/table&gt;
    
    {!! link_to_route('messages.edit', 'このメッセージを編集', ['id' =&gt; $message-&gt;id], ['class' =&gt; 'btn btn-light']) !!}

@endsection
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-8">8.8 MessagesController@update
</h3><p>edit が create と似ていたように、 update は store に似ています。そしてその違いも同様に <code>$id</code> で検索するところです。</p>

<h4>Controller</h4>

<p><em>app/Http/Controllers/MessagesController.php の update アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// putまたはpatchでmessages/idにアクセスされた場合の「更新処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">update</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>, <span class="local-variable">$id</span>)
    {
        <span class="local-variable">$message</span> = <span class="constant">Message</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<p>リダイレクトしているので、 View は不要です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-9">8.9 MessagesController@destroy
</h3><h4>Controller</h4>

<p><em>app/Http/Controllers/MessagesController.php の destroy アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// deleteでmessages/idにアクセスされた場合の「削除処理」</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">destroy</span>(<span class="local-variable">$id</span>)
    {
        <span class="local-variable">$message</span> = <span class="constant">Message</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$message</span>-&gt;<span class="predefined">delete</span>();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<h4>View</h4>

<p>リダイレクトしているので View は不要です。</p>

<p>ただし、削除するためのボタンを設置する必要があるので、 <em>show.blade.php</em> に削除ボタンをフォーム形式で設置します。</p>

<p><em>resources/views/messages/show.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    &lt;/table&gt;
    
    {!! link_to_route('messages.edit', 'このメッセージを編集', ['id' =&gt; $message-&gt;id], ['class' =&gt; 'btn btn-light']) !!}

    {!! Form::model($message, ['route' =&gt; ['messages.destroy', $message-&gt;id], 'method' =&gt; 'delete']) !!}
        {!! Form::submit('削除', ['class' =&gt; 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-10">8.10 （補足）Bladeファイルのインクルード
</h3><p>Bladeでは、ここまでに出ていた <code>@yield</code> や <code>@extends</code> の他、<code>@include</code> という指定が可能です。<code>@include</code> は、別途定義したBladeファイルの内容をそのまま取り込むことができます。</p>

<p>ここでは、画面上部のナビゲーションバーを <em>app.blade.php</em> から分割して <em>navbar.blade.php</em> に記述し、<code>@include</code> を使って <em>navbar.blade.php</em> の内容を <em>app.blade.php</em> に取り込んでみます。</p>

<p><em>resources/views</em> フォルダの中に <em>commons</em> という名前のフォルダを作り、その中に <em>navbar.blade.php</em> を新規作成して、下記の内容で保存してください。</p>

<p><em>resources/views/commons/navbar.blade.php</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;header class="mb-4"&gt;
    &lt;nav class="navbar navbar-expand-sm navbar-dark bg-dark"&gt;
        &lt;a class="navbar-brand" href="/"&gt;MessageBoard&lt;/a&gt;
         
        &lt;button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar"&gt;
            &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
        &lt;/button&gt;
        
        &lt;div class="collapse navbar-collapse" id="nav-bar"&gt;
            &lt;ul class="navbar-nav mr-auto"&gt;&lt;/ul&gt;
            &lt;ul class="navbar-nav"&gt;
                &lt;li class="nav-item"&gt;{!! link_to_route('messages.create', '新規メッセージの投稿', [], ['class' =&gt; 'nav-link']) !!}&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/nav&gt;
&lt;/header&gt;
</pre></div>
</div>
</div>

<p>このBladeファイルを <em>app.blade.php</em> で <code>@include</code> します。</p>

<p><em>resources/views/layouts/app.blade.php の body要素内</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    &lt;body&gt;

        @include('commons.navbar')
        
        &lt;div class="container"&gt;
            @yield('content')
        &lt;/div&gt;
        
        &lt;!-- JavaScriptの指定は省略 --&gt;
        
    &lt;/body&gt;
</pre></div>
</div>
</div>

<p>画面の表示に問題がないか確認してみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-11">8.11 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'CRUD messages'
</code></pre>
</div><div class="subsection challenge"><h3 class="index" id="kadai-tasklist">課題：タスク管理アプリの作成</h3><p>ここまでで、 Model, Router, Controller, View を一通り学び、一区切りできたので、課題に取り組んで全体を復習しておきましょう。</p>

<h4>概要</h4>

<p>Laravel 5.5を使って、タスクを管理できる「tasklist」という名前のWebアプリケーションを作成し、最後に GitHub に <em>kadai-tasklist</em> というリモートリポジトリを作成してプッシュしてください。</p>

<h4>仕様</h4>

<ul>
  <li>Laravel 5.5 で tasklist という名前のアプリを作成してください。</li>
  <li>データベースに tasks という名前のテーブルを作成してください。このテーブルに、名前が content で、文字列情報を格納するカラムを用意してください。</li>
  <li>tasks テーブルに対応するモデルの名前は <code>Task</code>、コントローラ名は <code>TasksController</code> としてください。</li>
  <li>タスクを管理する Router には <code>Route::resource</code> を利用してください。また、トップページはタスクリストの「一覧」と同じページにルーティングしてください。</li>
  <li><code>Route::resource</code> で生成される全てのアクションを実装してください。</li>
  <li>View は index (タスク一覧）、show（詳細ページ）、create（作成ページ）、edit（編集ページ）を作成してください。</li>
  <li>GitHub に <em>kadai-tasklist</em> でプッシュしてください。</li>
</ul>
</div></section><section id="chapter-9"><h2 class="index">9. バリデーション
</h2><div class="subsection"><p>バリデーション(Validation)とは、検証という意味です。</p>

<p>では Laravel で一体何を検証するのかというと、ユーザが入力したフォームデータを検証します。ユーザは得てして期待していないデータを入力します。例えば、年齢が必須な入力フォームで、年齢の入力内容が漢字だったり、全角数字であったり、そもそも年齢を入力していない場合などです。ユーザがおかしい値を入力してしまうことが決定的な事実である以上、その入力に対して適切な処理をしなければいけません。例えば、期待しないデータを弾き返し、適切なエラーメッセージを表示するなどです。</p>

<p>また、Webアプリを攻撃したり、セキュリティの脆弱性をつくような悪意を持ったフォーム入力を行うユーザーもいます。このような攻撃からアプリケーションを守るためにも、決められた範囲内でのデータしか受け取れないように制限を設ける意味もあります。</p>

<p>ここでは、先ほど作成したメッセージボードのフォームを扱う箇所で、バリデーションを挟み、ユーザの入力データを検証して、適切なエラーメッセージを表示させようと思います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 create, store
</h3><h4>バリデーション</h4>

<p>MessagesController の store アクションは、メッセージの新規作成のためのアクションです。ここではメッセージのフォームデータが送信されてくるので、バリデーションを行う必要があります。</p>

<p><em>app/Http/Controllers/MessagesController.php の store アクションの現状確認</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>)
    {
        <span class="local-variable">$message</span> = <span class="keyword">new</span> <span class="constant">Message</span>;
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<p>このままだと、PHP側はカラッポのメッセージを投稿してもそのままメッセージとして保存しようとします。カラッポのメッセージが投稿されることは期待される動作ではなく、データベース側ではcontentカラムにNOT NULL制約をかけています。つまり、カラッポのメッセージを投稿しようとすると、制約に違反するためシステムエラーが発生してしまいます。システムエラーを防ぐためにも、バリデーションを行います。</p>

<p>メッセージ投稿に必要なバリデーション項目は</p>

<ul>
  <li><code>content</code> が空になっていないか</li>
  <li><code>content</code> が191文字を超えないか（ <code>content</code> カラムは <code>varchar(191)</code> のデータ型なため）</li>
</ul>

<p>この2項目です。</p>

<p>これをコーディングしていきましょう。</p>

<p>下記のコードのように、 <code>$this-&gt;validate()</code> を使用してバリデーションを行います。 <code>$request</code> の <code>content</code> に対して、 <code>required</code> (カラッポでない) かつ <code>max:191</code> (191文字を超えていない) を検証しています。</p>

<p><em>app/Http/Controllers/MessagesController.php の store アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>)
    {
        <span class="local-variable">$this</span>-&gt;validate(<span class="local-variable">$request</span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,
        ]);

        <span class="local-variable">$message</span> = <span class="keyword">new</span> <span class="constant">Message</span>;
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<div class="alert alert-info">
<code>validate()</code> がどこで定義されているか（なぜ <code>$this</code> が持つ関数として実行できるのか）について触れておくと、親クラス( <code>App\Http\Controllers\Controller</code> クラス )で use されている <code>Illuminate\Foundation\Validation\ValidatesRequests</code> の中に <code>validate()</code> が定義されています。興味のある人は<i>vendor/laravel/framework/src</i>の中に入っているソースコードを読んでみましょう。とはいえ、あまり難しく考えず、Laravel で作成した Controller は <code>validate()</code> を実行できるものだと覚えてください。
</div>

<p>この段階で動作確認をしてみます。 <code>/messages/create</code> にアクセスし、 <code>content</code> をカラッポのまま「投稿」ボタンをクリックしてみましょう。すると、ぱっと見は更新されたように見えるものの <code>/</code> にリダイレクトされず、 <code>/messages/create</code> に戻ってきます。 <code>/</code> を見ても空っぽなメッセージは保存されていません（なお、上記コードから <code>$this-&gt;validate()</code> 部分を削除するとシステムエラーになります）。</p>

<p>しかし、このままの画面では不親切すぎるでしょう。ユーザ視点で考えてみると、一体何が起こっているのかわかりません。「入力エラーです」のような適切なエラーメッセージを表示してあげる必要があります。</p>

<h4>エラーメッセージの表示</h4>

<p>では、エラーメッセージを表示します。</p>

<p>実は、 <code>$this-&gt;validate()</code> を書くと、自動的に <code>$errors</code> 変数にエラーメッセージが格納されることになります。そのため、 View 側で <code>$errors</code> があるか確認し、あれば表示すれという処理を追加すればOKです。また、 <code>$errors</code> と複数形で書いてある通り、複数のエラーが保存されることもあります。</p>

<pre><code>    @if (count($errors) &gt; 0)
        &lt;ul class="alert alert-danger" role="alert"&gt;
            @foreach ($errors-&gt;all() as $error)
                &lt;li class="ml-4"&gt;{{ $error }}&lt;/li&gt;
            @endforeach
        &lt;/ul&gt;
    @endif
</code></pre>

<p>エラーメッセージのためのコードは上記のようになります。これを下記の通り、 <em>create.blade.php</em> に追記しましょう。</p>

<p><em>resources/views/messages/create.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    
    @if (count($errors) &gt; 0)
        &lt;ul class="alert alert-danger" role="alert"&gt;
            @foreach ($errors-&gt;all() as $error)
                &lt;li class="ml-4"&gt;{{ $error }}&lt;/li&gt;
            @endforeach
        &lt;/ul&gt;
    @endif

    &lt;h1&gt;メッセージ新規作成ページ&lt;/h1&gt;
</pre></div>
</div>
</div>

<p>ここまでコードを書けたら、 <code>/messages/create</code> にアクセスし、動作確認をしてください。メッセージに未入力の状態で「投稿」ボタンをすると、 <code>The content field is required.</code> とエラーメッセージが表示されるはずです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 edit, update
</h3><p>store アクションと同様に update アクションもバリデーションしておきましょう。</p>

<h4>バリデーション</h4>

<p><em>app/Http/Controllers/MessagesController.php の update アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">update</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>, <span class="local-variable">$id</span>)
    {
        <span class="local-variable">$this</span>-&gt;validate(<span class="local-variable">$request</span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,
        ]);

        <span class="local-variable">$message</span> = <span class="constant">Message</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<h4>エラーメッセージの表示</h4>

<p><em>resources/views/messages/edit.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')
    
    @if (count($errors) &gt; 0)
        &lt;ul class="alert alert-danger" role="alert"&gt;
            @foreach ($errors-&gt;all() as $error)
                &lt;li class="ml-4"&gt;{{ $error }}&lt;/li&gt;
            @endforeach
        &lt;/ul&gt;
    @endif

    &lt;h1&gt;id: {{ $message-&gt;id }} のメッセージ編集ページ&lt;/h1&gt;
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 エラーメッセージの共通部をまとめる
</h3><p>エラーメッセージは、フォームを設置している全ての場所に全く同じ内容で書くことになるので、管理を楽にするために1つにまとめておきましょう。</p>

<p><em>resources/views/commons</em> フォルダの下に <em>error_messages.blade.php</em> ファイルを作成してください。</p>

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

<p>そして呼び出し側も修正しておきましょう。 <code>@include()</code> を使えば、<em>error_messages.blade.php</em> 内の記述をそのまま取り込むことができます。</p>

<p>また、エラーメッセージ( <code>@include()</code> )は <em>app.blade.php</em> 側に書くと管理が楽です。</p>

<p><em>resources/views/layouts/app.blade.php（body部分のみ抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    &lt;body&gt;

        @include('commons.navbar')
        
        &lt;div class="container"&gt;
            @include('commons.error_messages')
            
            @yield('content')
        &lt;/div&gt;
        
        &lt;!-- JavaScriptの定義は省略 --&gt;
        
    &lt;/body&gt;
</pre></div>
</div>
</div>

<p>今まで書いていた <em>create.blade.php</em> と <em>edit.blade.php</em> に書かれていたエラーメッセージ部分は削除しておきます。</p>

<p><em>resources/views/messages/create.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

    &lt;h1&gt;メッセージ新規作成ページ&lt;/h1&gt;

    {!! Form::model($message, ['route' =&gt; 'messages.store']) !!}
</pre></div>
</div>
</div>

<p><em>resources/views/messages/edit.blade.php（抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>@extends('layouts.app')

@section('content')

    &lt;h1&gt;id: {{ $message-&gt;id }} のメッセージ編集ページ&lt;/h1&gt;

    {!! Form::model($message, ['route' =&gt; ['messages.update', $message-&gt;id], 'method' =&gt; 'put']) !!}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-4">9.4 参考
</h3><p>バリデーションは様々な実装方法があります。ここでは基本だけを抑え、発展的な内容には踏み込んでいません。更にバリデーションをうまくコーディングしたい場合は公式マニュアルを読んで下さい。バリデーションルール (<code>require</code> や <code>max:191</code> など)も一覧で紹介されています。</p>

<ul>
  <li><a href="https://readouble.com/laravel/5.5/ja/validation.html" target="_blank">参考: バリデーション - Laravel 5.5</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-9-5">9.5 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'validation'
</code></pre>
</div></section><section id="chapter-10"><h2 class="index">10. カラムの追加
</h2><div class="subsection"><p>最後に、メッセージにカラムを増やしたいときにどのように作業していくのかも把握しておきましょう。</p>

<p>ここではメッセージボードに、メッセージの「タイトル」を追加したいとします。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-1">10.1 カラムを増やすマイグレーション
</h3><p>カラム追加用のマイグレーションファイルを生成します。 <code>--table=messages</code> でテーブルを指定しています。</p>

<pre><code>$ php artisan make:migration add_title_to_messages_table --table=messages
</code></pre>

<p>生成されたマイグレーションは、 <code>up()</code> の中身も <code>down()</code> の中身もコードが書かれていないので、私たちでコーディングします。</p>

<p><code>$table-&gt;string('title');</code> と書けばカラムを追加でき、 <code>$table-&gt;dropColumn('title');</code> と書けばカラムを削除できます。そのため、それぞれを <code>up()</code> と <code>down()</code> 内に入れます。</p>

<p><em>database/migrations/年月日時_add_title_to_messages_table.php の up と down 抜粋</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">up</span>()
    {
        <span class="constant">Schema</span>::table(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;<span class="predefined-type">string</span>(<span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span>);
        });
    }

    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">down</span>()
    {
        <span class="constant">Schema</span>::table(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>, <span class="keyword">function</span> (<span class="constant">Blueprint</span> <span class="local-variable">$table</span>) {
            <span class="local-variable">$table</span>-&gt;dropColumn(<span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span>);
        });
    }
</pre></div>
</div>
</div>

<p>では、このマイグレーションファイルを使って実行しましょう。<code>$ php artisan migrate</code> を行うと、自動的にマイグレーションが実行されていないマイグレーションファイルだけを実行します。</p>

<pre><code>$ php artisan migrate
</code></pre>

<p>これで messages テーブルに title カラムが追加され、 Message モデルでも title プロパティを使用できるようになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-2">10.2 カラムが増えたことによって発生する作業
</h3><p>では、カラムが増えたことによって発生する作業を、いつも通り Model, Router, Controller, View の順番で見ていきます。</p>

<h4>Model</h4>

<p>今のところ変更が必要だと思うところはありません。</p>

<h4>Router</h4>

<p>ルーティングは Model に対して <code>resource</code> 1つだったので、カラムが増えたからと言って、変更箇所は無さそうです。</p>

<h4>Controller</h4>

<p>7つのアクションをざっと眺めると、<code>content</code> カラムを使用しているのが store と update だけだと気付きます。つまり、この2つのアクションに対して <code>title</code> カラムを操作する処理を追加しましょう。</p>

<p><em>app/Http/Controllers/MessagesController.php の store アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">store</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>)
    {
        <span class="local-variable">$this</span>-&gt;validate(<span class="local-variable">$request</span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,   <span class="comment">// 追加</span>
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,
        ]);

        <span class="local-variable">$message</span> = <span class="keyword">new</span> <span class="constant">Message</span>;
        <span class="local-variable">$message</span>-&gt;title = <span class="local-variable">$request</span>-&gt;title;    <span class="comment">// 追加</span>
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<p><em>app/Http/Controllers/MessagesController.php の update アクション</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">update</span>(<span class="constant">Request</span> <span class="local-variable">$request</span>, <span class="local-variable">$id</span>)
    {
        <span class="local-variable">$this</span>-&gt;validate(<span class="local-variable">$request</span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,   <span class="comment">// 追加</span>
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">required|max:191</span><span class="delimiter">'</span></span>,
        ]);

        <span class="local-variable">$message</span> = <span class="constant">Message</span>::find(<span class="local-variable">$id</span>);
        <span class="local-variable">$message</span>-&gt;title = <span class="local-variable">$request</span>-&gt;title;    <span class="comment">// 追加</span>
        <span class="local-variable">$message</span>-&gt;content = <span class="local-variable">$request</span>-&gt;content;
        <span class="local-variable">$message</span>-&gt;save();

        <span class="keyword">return</span> redirect(<span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>);
    }
</pre></div>
</div>
</div>

<p>当然ながら上記の <code>$request-&gt;title</code> が送信されるには、フォームも修正する必要があります。</p>

<h4>View</h4>

<p>フォームがあるのは、 create と edit です。どちらもフォーム内に title カラムを追加しただけです。</p>

<p><em>resources/views/messages/create.blade.php（フォーム部分のみ抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            {!! Form::model($message, ['route' =&gt; 'messages.store']) !!}
        
                &lt;div class="form-group"&gt;
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;
        
                &lt;div class="form-group"&gt;
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;
        
                {!! Form::submit('投稿', ['class' =&gt; 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
</pre></div>
</div>
</div>

<p><em>resources/views/messages/edit.blade.php（フォーム部分のみ抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            {!! Form::model($message, ['route' =&gt; ['messages.update', $message-&gt;id], 'method' =&gt; 'put']) !!}
        
                &lt;div class="form-group"&gt;
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;
        
                &lt;div class="form-group"&gt;
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' =&gt; 'form-control']) !!}
                &lt;/div&gt;
        
                {!! Form::submit('更新', ['class' =&gt; 'btn btn-light']) !!}
        
            {!! Form::close() !!}
</pre></div>
</div>
</div>

<p>Controller 側は既に修正しているので、上記を更新したあとに、一度動作確認してみましょう。</p>

<p>すると、 index と show の View にもカラムを追加する作業が必要なことに気付くでしょう。基本的にカラムが変更されると全ての View を修正する必要があります。</p>

<p><em>resources/views/messages/index.blade.php（テーブル部分のみ抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="exception">@</span><span class="keyword">if</span> (<span class="predefined">count</span>(<span class="local-variable">$messages</span>) &gt; <span class="integer">0</span>)
        &lt;table <span class="keyword">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">table table-striped</span><span class="delimiter">"</span></span>&gt;
            &lt;thead&gt;
                &lt;tr&gt;
                    &lt;th&gt;id&lt;/th&gt;
                    &lt;th&gt;タイトル&lt;/th&gt;
                    &lt;th&gt;メッセージ&lt;/th&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                <span class="exception">@</span><span class="keyword">foreach</span> (<span class="local-variable">$messages</span> <span class="keyword">as</span> <span class="local-variable">$message</span>)
                &lt;tr&gt;
                    &lt;td&gt;{!! link_to_route(<span class="string"><span class="delimiter">'</span><span class="content">messages.show</span><span class="delimiter">'</span></span>, <span class="local-variable">$message</span>-&gt;id, [<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$message</span>-&gt;id]) !!}&lt;/td&gt;
                    &lt;td&gt;{{ <span class="local-variable">$message</span>-&gt;title }}&lt;/td&gt;
                    &lt;td&gt;{{ <span class="local-variable">$message</span>-&gt;content }}&lt;/td&gt;
                &lt;/tr&gt;
                <span class="exception">@</span><span class="keyword">endforeach</span>
            &lt;/tbody&gt;
        &lt;/table&gt;
    <span class="exception">@</span><span class="keyword">endif</span>
</pre></div>
</div>
</div>

<p><em>resources/views/messages/show.blade.php（テーブル部分のみ抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    &lt;table <span class="keyword">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">table table-bordered</span><span class="delimiter">"</span></span>&gt;
        &lt;tr&gt;
            &lt;th&gt;id&lt;/th&gt;
            &lt;td&gt;{{ <span class="local-variable">$message</span>-&gt;id }}&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th&gt;タイトル&lt;/th&gt;
            &lt;td&gt;{{ <span class="local-variable">$message</span>-&gt;title }}&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th&gt;メッセージ&lt;/th&gt;
            &lt;td&gt;{{ <span class="local-variable">$message</span>-&gt;content }}&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/table&gt;
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-10-3">10.3 Git
</h3><pre><code>$ git status

$ git diff

$ git add .

$ git commit -m 'add column'
</code></pre>
</div><div class="subsection challenge"><h3 class="index" id="kadai-add-column">課題：タスク管理アプリにカラムの追加</h3><p>引き続き、タスク管理アプリの更新を行います。</p>

<h4>概要</h4>

<p>タスクにステータスカラム(status)を追加してください。</p>

<h4>仕様</h4>

<ul>
  <li>tasks テーブルに status カラムを追加してください。status は、MySQL上で VARCHAR(10) となるように作成しましょう。なお、191文字より少ない文字数を設定する方法は、次のドキュメントを参考にしてください。<a href="https://readouble.com/laravel/5.5/ja/migrations.html" target="_blank">参考：データベース・マイグレーション</a></li>
  <li>作成と編集ページで status を編集可能にしてください。（statusはinput要素のtype属性：textにします）</li>
  <li>一覧と詳細ページで status を表示してください。</li>
  <li>status に「空文字を許さないバリデーション」と「10文字を超える文字数を許さない」バリデーションをつけ、エラーになった際は画面に表示するようにしてください。（content に対するバリデーションの追加は任意としますが、status には必ず2つのバリデーションを実装してください）</li>
  <li>GitHub に <em>kadai-tasklist</em> でプッシュしてください。</li>
</ul>
</div></section><section id="chapter-11"><h2 class="index">11. テストデータの生成
</h2><div class="subsection"><p>たとえば、indexに表示するメッセージをもっと増やしたい場合です。1件ずつ create から手作業で登録するのは大変です。もし、プログラムで自動生成できたら楽ですよね。ここではその方法を学びます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-1">11.1 seedとは
</h3><p>テストデータを自動生成するためのプログラムを <strong>seed</strong> と呼びます。Laravel (Eloquent) では <code>db:seed</code> という Artisanコマンドとして既に用意されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-2">11.2 新規Messageを3件作成する
</h3><p><code>db:seed</code> コマンドを実行する前に <strong>シーダ( Seeder )</strong> と呼ばれるものを生成する必要があります。下記のような <code>php artisan make:seeder</code> コマンドを実行してみましょう。</p>

<pre><code>$ php artisan make:seeder MessagesTableSeeder
</code></pre>

<p>実行が完了すると <em>database/seeds</em> フォルダ内に <em>MessagesTableSeeder.php</em> が作成されています。中身を確認すると、空っぽの <code>run()</code> のみが記述されています。</p>

<p><em>database/seeds/MessagesTableSeeder.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Seeder</span>;

<span class="keyword">class</span> <span class="class">MessagesTableSeeder</span> <span class="keyword">extends</span> <span class="constant">Seeder</span>
{
    <span class="comment">/**
     * Run the database seeds.
     *
     * @return void
     */</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">run</span>()
    {
        <span class="comment">//</span>
    }
}
</pre></div>
</div>
</div>

<p>この <code>run()</code> の中に <code>insert</code> の命令を記述します。3件登録したいので、以下のように記述してください。</p>

<p><em>database/seeds/MessagesTableSeeder.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Seeder</span>;

<span class="keyword">class</span> <span class="class">MessagesTableSeeder</span> <span class="keyword">extends</span> <span class="constant">Seeder</span>
{
    <span class="comment">/**
     * Run the database seeds.
     *
     * @return void
     */</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">run</span>()
    {
        <span class="constant">DB</span>::table(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>)-&gt;insert([
            <span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test title 1</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test content 1</span><span class="delimiter">'</span></span>
        ]);
        <span class="constant">DB</span>::table(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>)-&gt;insert([
            <span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test title 2</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test content 2</span><span class="delimiter">'</span></span>
        ]);
        <span class="constant">DB</span>::table(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>)-&gt;insert([
            <span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test title 3</span><span class="delimiter">'</span></span>,
            <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test content 3</span><span class="delimiter">'</span></span>
        ]);
    }
}
</pre></div>
</div>
</div>

<p>次に <em>database/seeds</em> フォルダにある <em>DatabaseSeeder.php</em> を開いてください。同じように <code>run()</code> が記述されていて、<code>$this-&gt;call()</code> がコメントになっています。このコメントを外し、引数の指定を変える必要があります。下記のとおりに変更してください。</p>

<p><em>database/seeds/DatabaseSeeder.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Seeder</span>;

<span class="keyword">class</span> <span class="class">DatabaseSeeder</span> <span class="keyword">extends</span> <span class="constant">Seeder</span>
{
    <span class="comment">/**
     * Run the database seeds.
     *
     * @return void
     */</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">run</span>()
    {
        <span class="local-variable">$this</span>-&gt;call([<span class="constant">MessagesTableSeeder</span>::<span class="keyword">class</span>]);
    }
}
</pre></div>
</div>
</div>

<p>ここまでできたら、下記コマンドを実行してください。これで、 <em>database/seeds/MessagesTableSeeder</em> が実行され、 書いた通りのレコードが3つ生成されているはずです。</p>

<pre><code>$ php artisan db:seed --class=MessagesTableSeeder
</code></pre>

<p>シーダは何度でも実行できます。実行した分だけレコードが生成されます。</p>

<pre><code>$ php artisan db:seed --class=MessagesTableSeeder
</code></pre>

<p>なお、<code>--class=MessagesTableSeeder</code> は、特定のシーダのみ実行したい場合に指定します。<code>DatabaseSeeder</code> の中で指定した全てのシーダを実行するときは不要です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-3">11.3 大量にMessageを生成する
</h3><p>登録の方法はわかりましたが、たとえば1000件レコードを作成しようとしたときに、このように1つずつ書いていては非効率です。そこで、繰り返しを使用して記述します。以下の例では100件のMessageのレコードを作成しています。</p>

<p><em>database/seeds/MessagesTableSeeds.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">use</span> <span class="constant">Illuminate</span>\<span class="constant">Database</span>\<span class="constant">Seeder</span>;

<span class="keyword">class</span> <span class="class">MessagesTableSeeder</span> <span class="keyword">extends</span> <span class="constant">Seeder</span>
{
    <span class="comment">/**
     * Run the database seeds.
     *
     * @return void
     */</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">run</span>()
    {
        <span class="keyword">for</span>(<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt;= <span class="integer">100</span>; <span class="local-variable">$i</span>++) {
            <span class="constant">DB</span>::table(<span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span>)-&gt;insert([
                <span class="string"><span class="delimiter">'</span><span class="content">title</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test title </span><span class="delimiter">'</span></span> . <span class="local-variable">$i</span>,
                <span class="string"><span class="delimiter">'</span><span class="content">content</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">test content </span><span class="delimiter">'</span></span> . <span class="local-variable">$i</span>
            ]);
        }
    }
}
</pre></div>
</div>
</div>

<pre><code>$ php artisan db:seed --class=MessagesTableSeeder
</code></pre>

<p>100件レコードを登録することができました。これで、100件と言わず、1万件でも登録することができます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-4">11.4 テーブルを作り直してテストデータを登録する
</h3><p>シーダで記述したデータのみを生成して、その他のデータを削除してしまいたい場合もあります。そんなときには <code>migrate:refresh</code> のArtisanコマンドを使用してください。</p>

<pre><code>$ php artisan migrate:refresh --seed
</code></pre>

<p><code>php artisan migrate:refresh --seed</code> は</p>

<ol>
  <li><code>php artisan migrate:reset</code> （データベースの初期状態まで一気にロールバック）</li>
  <li><code>php artisan migrate</code>（マイグレーション）</li>
  <li><code>php artisan db:seed</code>（<code>DatabaseSeeder</code> の中で指定したシーダを全て実行）</li>
</ol>

<p>を一気に行うコマンドです。</p>

<p>今後、Webアプリケーション開発で、テストデータがあれば便利な場合があります。シーダを存分に活用してください。</p>
</div></section><section id="chapter-12"><h2 class="index">12. ページネーション
</h2><div class="subsection"><p>indexで表示するMessageが大量（たとえば1万件）にある場合、1ページで表示すると非常に縦に長いページになってしまいます。また、データベースから全レコードを取得して表示するのにも時間がかかるので、ページの表示も遅くなります。</p>

<p>こういった場合に対応するためには、ページネーションという技術を使うのが有効です。</p>

<p>ページネーションは、レコードの取得の範囲を決めて、その範囲内のもののみを表示するための機能です。例えば、1ページに25件まで表示すると決めると、100件レコードがあれば4ページに分けられます。1ページ目には1から25までのレコードを表示し、2ページ目には26から50までのレコードを表示するといった形です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webapp/message-board/pagination.png" alt=""><br>
<em>ページネーションの一例</em></p>

<p>これを index で実現しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-1">12.1 テストデータの用意
</h3><p>ここでは1ページに表示するメッセージを25件にしたいと思います。前のセクションの内容を参考に、最低でも26件はテストデータを登録してください。26件ないとページネーションが表示できません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-2">12.2 MessagesController@indexの修正
</h3><h4>Controllerの修正</h4>

<p>一覧を取得する際、以前は <code>all()</code> を使いました。ページネーションを使う場合は <code>paginate()</code> に変更します。</p>

<p><em>app/Http/Controllers/MessagesController.php（indexのみ抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="local-variable">$messages</span> = <span class="constant">Message</span>::paginate(<span class="integer">25</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.index</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$messages</span>,
        ]);
    }
</pre></div>
</div>
</div>

<p>とりあえず、これだけで index での表示件数が25件のみになります。</p>

<h4>Viewの修正</h4>

<p>続いて、Viewを修正してページネーションのリンクを追加します。その方法は <code>{{ $messages-&gt;links('pagination::bootstrap-4') }}</code> を追記するだけです。</p>

<p><em>resources/views/messages/index.blade.php（末尾の部分の抜粋）</em></p>

<div class="language-blade highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    @endif
    
    {{ $messages-&gt;links('pagination::bootstrap-4') }}
    
    {!! link_to_route('messages.create', '新規メッセージの投稿', [], ['class' =&gt; 'btn btn-primary']) !!}

@endsection
</pre></div>
</div>
</div>

<p>これだけでBootstrap4のページネーションを利用したリンクが表示されます。</p>

<p><a href="https://getbootstrap.com/docs/4.1/components/pagination/" target="_blank">参考：ページネーション（Bootstrap4）</a></p>

<p>ページネーションの「2」のリンクをクリックすると、URLに <code>?page=2</code> が付加されます。Laravelは、これを受け取って、ページ番号に適切なデータを指定した件数（25件）表示します。1ページ目がid：1から25までなら、2ページ目はid：26から50までです。全てLaravelが処理してくれるので、私たちが何か処理を追記する必要はありません。</p>

<p><a href="https://readouble.com/laravel/5.5/ja/pagination.html" target="_blank">参考：ページネーション（Laravel5.5）</a></p>
</div><div class="subsection"><h3 class="index" id="chapter-12-3">12.3 順番の変更
</h3><p>Message 一覧表示の順番を変更したい場合には、 Controller 側で <code>orderBy()</code> を記述します。</p>

<p><em>app/Http/Controllers/MessagesController.php（indexのみ抜粋）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">index</span>()
    {
        <span class="local-variable">$messages</span> = <span class="constant">Message</span>::orderBy(<span class="string"><span class="delimiter">'</span><span class="content">id</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">desc</span><span class="delimiter">'</span></span>)-&gt;paginate(<span class="integer">25</span>);

        <span class="keyword">return</span> view(<span class="string"><span class="delimiter">'</span><span class="content">messages.index</span><span class="delimiter">'</span></span>, [
            <span class="string"><span class="delimiter">'</span><span class="content">messages</span><span class="delimiter">'</span></span> =&gt; <span class="local-variable">$messages</span>,
        ]);
    }
</pre></div>
</div>
</div>

<p>上記のように記述すると、<code>id</code> のカラムを基準に <code>desc</code> （降順）で Message 一覧が表示されます。1ページ目がid：100から76まで、2ページ目がid：75から51までになっていることを確認してください。</p>
</div></section><section id="chapter-13"><h2 class="index">13. まとめ
</h2><div class="subsection"><p>Laravel ではとにかく下記の流れを絶対に忘れないでください。この流れがWebアプリケーションの基本であり、出発点です。Model は Controller によって必要なものが取得され、 View に流れて表示されます。ユーザの HTTP リクエストを Router が解析し、リクエストに沿った適切な Model をユーザに表示するのがWebアプリケーションだと心得てください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/message-board/mvc.png" alt=""></p>

<p>また、 Model とデータベースの関係も忘れないようにしてください。 Model はデータベースがないと保存ができません。データベースという器が用意されていることで、Model のインスタンスをレコードとして保存することが可能となります。</p>

<p>このレッスンでWebアプリケーション開発の基礎を紹介しました。わからないことがあれば、このレッスン（もしくはさらに前のレッスン）を読み返して何度も復習をしてみてください。一度で全てを把握できないのは当然です。何度も読み返してもらっても構いません。また、解決できそうにない疑問はメンターに質問してください。次からのレッスンは、ここでの知識を前提に話を進めるので、このレッスンを理解せずに先に進むと、自分が何をしているのかわからなくなります。</p>

<p>なお、本来であれば、メッセージボードは7つもページが必要ありません。新規メッセージを書くにしても <em>/messages/index</em> にフォームを設置したほうが便利です。しかし、今回はあえてリソースフルなルーティングに沿って開発しました。なぜなら、リソースフルなルーティングこそ Web 上における Model 操作の基本構成だからです。今後は一部のルーティングを指定すべきでないことに気付くでしょう。ユーザの利便性を考えると、場合によっては、リソースフルなルーティングをやめて変更するべきです。</p>

<p>ただし、今回のリソースフルなルーティングが、Webアプリケーションの基本だと言うことは覚えておいてください。</p>
</div></section><section id="chapter-14"><h2 class="index">14. （補足）エラー画面とデバッグ
</h2><div class="subsection"><p>この補足ではLaravelのエラー画面とデバッグ方法について解説を行います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-14-1">14.1 Laravelのエラー画面
</h3><p>これまで、Laravelのアプリケーションを作ってきて、様々なエラー画面に遭遇したかもしれません。</p>

<p>エラー画面を読み解くことは、Laravelプログラミングの上達に欠かせないものなので、ここで補足として解説していきたいと思います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-14-2">14.2 エラー画面に含まれる情報
</h3><p>以下の画像は、Laravelのエラー画面に注釈を加えたものです。エラー画面にはコードを修正するのに必要なさまざまな情報が含まれています。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/lessons/microposts/error_overview_annoted_laravel.png" alt=""></p>

<p>エラー画面に含まれる情報は以下のとおりです。</p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">番号</th>
      <th style="text-align: left">名称</th>
      <th style="text-align: left">含まれる情報</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left">1</td>
      <td style="text-align: left">エラータイトル</td>
      <td style="text-align: left">エラーの概要です。Laravelから出力された例外クラス（この場合<code>BadMethodCallException</code>）の名前と、どこで起きたかが書いてあります。</td>
    </tr>
    <tr>
      <td style="text-align: left">2</td>
      <td style="text-align: left">エラー詳細</td>
      <td style="text-align: left">例外クラスに含まれる、エラーメッセージが出力されます。<strong>最初はエラータイトルとここを読みましょう。</strong></td>
    </tr>
    <tr>
      <td style="text-align: left">3</td>
      <td style="text-align: left">エラーが起きたファイル名</td>
      <td style="text-align: left">エラーが起きたファイルのパスが書いてあります。</td>
    </tr>
    <tr>
      <td style="text-align: left">4</td>
      <td style="text-align: left">エラーが起きた行</td>
      <td style="text-align: left">エラーが起きた行を強調表示しています。また、周辺の行も表示されています。</td>
    </tr>
    <tr>
      <td style="text-align: left">5</td>
      <td style="text-align: left">トレース表示</td>
      <td style="text-align: left">エラーが起きたメソッドの呼び出し状況を出力します。上級者向けですが、メソッドがどこから呼び出されたか特定するのに使えます。</td>
    </tr>
    <tr>
      <td style="text-align: left">6</td>
      <td style="text-align: left">リクエスト（パラメータ）情報</td>
      <td style="text-align: left">サーバにどのようなリクエストやパラメータが送信されたかが書いてあります。</td>
    </tr>
  </tbody>
</table>
</div><div class="subsection"><h3 class="index" id="chapter-14-3">14.3 エラーの修正手順
</h3><p>ここでは、エラー画面を元にエラー内容を理解して修正に入るまで、どのようにするか、解説します。</p>

<h4>1. エラーの概要を理解する</h4>

<p>まず、エラータイトルとエラー詳細を読んで、エラーの概要を理解します。エラーメッセージはすべて英語なので、ネットで翻訳したり検索したりしてかまいません。よく出るエラーメッセージは以下のようなものがあります。</p>

<p><strong>Parse error: syntax error, unexpected …</strong></p>

<p>プログラムの文法エラーです。カッコのとじ忘れ、カンマ忘れ、セミコロンがない場合など様々な場合に発生します。エディタの表示なども参考にして正しい文法になるように修正してください。</p>

<p><strong>Call to undefined method …</strong></p>

<p>指定された名前の関数が存在しないというエラーです。関数が定義されていないか、関数名が間違っていることが考えられます。</p>

<p><strong>Trying to get property ‘id’ of non-object …</strong></p>

<p>条件を満たすデータが見つからなかったというエラーです。IDを指定したけど、DB上にデータがない場合はこのようなエラーになります。このエラーが起きる原因としては、DBにデータが存在しない、もしくはパラメータが間違っている場合が考えられます。</p>

<p>その他にも様々なエラーメッセージがありますので、わからない部分は調べたり、メンターに質問したりして内容を理解しましょう。</p>

<p><strong>View [○○] not found.</strong></p>

<p>コントローラのアクションに対応するビューが存在しないというエラーです。bladeのファイルが存在しているか、およびファイルのパスが間違っていないかを確認してください。</p>

<h4>2. エラーが起きた部分を特定する</h4>

<p>エラーが起きた行を参考に、ソースコード上のどの行でエラーが出たかを特定します。また、行の中で実際にエラーが起きたメソッド呼び出しを、3.のエラー詳細を元に特定します。<br>
その行に特に問題がなさそうな場合は、その行より前に実行した部分を、トレース表示や、実際のソースコードを参考にしながら探します。</p>

<h4>3. ソースコードを修正する。</h4>

<p>実際にエラーを起こす元となった部分を修正します。</p>
</div></section></div>
</body>
</html>