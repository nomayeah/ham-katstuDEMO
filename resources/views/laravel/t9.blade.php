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
<div class="markdown"><div class="lesson-num p">Lesson9</div><h1 id="mysql">MySQL
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>ここでは、データベースを学んでいきます。データベースはデータを保存するためのソフトウェアです。有名なデータベースソフトウェアはいくつかありますが、ここでは最も利用されているMySQLというデータベースソフトウェアを使って学んでいきます。</p>

<p>まずはデータベースとは何かというところから始めて、どんなイメージで保存されるのか、そしてデータに対してどんな操作ができるかを学びます。</p>

<p>そしてSQLというデータベースを操作する言語を学び、どうやって使うのかを学びます。ここで学ぶのはデータを操作するための基本操作のみなので、難しいところまでには踏み込みません。しかし、それでも基本操作さえ覚えておけば、データベースに対する理解は深まるはずです。そして思ったより普通のことをしているだけだとわかるでしょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. データベースとは
</h2><div class="subsection"><p>データベースは、<strong>たくさんのデータを一元管理し、データの保存、取得することに特化したソフトウェア（ミドルウェア）</strong> です。データと言っても、基本的にはテキストデータが対象で、画像や動画の扱いにはあまり向きません。データベースは、DBとも呼ばれます。</p>

<p>データベースは <strong>データを永続的に保存</strong> するのに適しています。データを永続的に保存する他の方法として、テキストファイルを作成しその中にデータを書き込む方法がありますが、効率的だとは言えません。理由は多くありますが、3つだけ挙げることにします。</p>

<p>1つ目に、ファイルを開いてデータを取得しファイルを閉じるという方法は速度がとても遅いです。</p>

<p>2つ目に、ファイルには何のデータをどのように保存するかが決まっていないので、わざわざそれを決める必要があり、フォーマットを統一する意識などが必要です。</p>

<p>3つ目に、データ取得の方法として優秀なSQLが用意されているのに、ファイルを操作するための処理をプログラミングで作成する必要があります。ファイル保存でも良い場合は、予め定義された以上にはデータが増減せず、かつデータ量が少ないような場合です。</p>

<p>多くのアプリケーションにとって、データベースは欠かせない存在です。アプリケーションはデータを処理しますが、保存することができないからです。例えば、ユーザ登録、メッセージの投稿、TwitterやFacebookで誰が誰をフォローしたり友達になっているか、そういったデータ全てをデータベースは管理します。</p>
</div></section><section id="chapter-3"><h2 class="index">3. リレーショナルデータベース
</h2><div class="subsection"><p>データベースソフトウェアには、そのデータの保存の仕方によって様々な種類があります。その中でも最も利用されている種類はリレーショナルデータベースです。リレーショナルデータベースを管理するシステムを、リレーショナルデータベース管理システム（RDBMS）と呼びます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 リレーショナルデータベースの構成
</h3><p>リレーショナルデータベースの構造はとても単純で、基本的には、<strong>1つのアプリケーションに対して1つのデータベース</strong>があり、<strong>1つのデータベースの中に複数のテーブル（表）</strong>があります。1つ1つのテーブル（表）は、その名の通り<strong>Excelシートと同じように縦横の表</strong>となっているというイメージを持ってください。Excelで例えると、Excelファイルが1つのデータベースであり、その中にある複数のシートがテーブルにあたり、シートの中の1つ1つのセルが具体的なデータとなります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/mysql/7-1.png" alt=""></p>

<p>有名なRDBMSには、Oracle Database、Microsoft SQL Server、MySQL、PostgreSQL、SQLite などがあります。今回はその中でも無料で利用でき、最も広く利用されているMySQLを学びます。他のRDBMSも基本的にはほとんど同じ機能を持っているので、MySQLだけでも学んでおけば他のSQLにも応用できます。</p>

<p>リレーショナルデータベースの特徴には下記の3つがあります。</p>

<ul>
  <li>テーブルは、カラム(縦)とレコード(横)で構成される</li>
  <li>カラムに、保存されるデータの制約を設定できる</li>
  <li>データの保存や取得などの処理に、SQLという言語を使用する</li>
</ul>

<h4>テーブルは、カラム(縦)とレコード(横)で構成される</h4>

<p>テーブルにおいて、縦をカラム(column)と呼び、横をレコード(record)と呼びます。カラムには名前があり、例えばnameやemailと名前をつけることができます。レコードは、id, name などのカラムの具体的な値（id: 1, name: 太郎）を持つ1つのデータのまとまりのことです。下記のテーブルであれば、ユーザデータのレコードが3件あり、idカラムの値が <code>2</code> のレコードの name カラムの値は何かと聞かれれば、<code>次郎</code> となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webapp/message-board/database_01.png" alt=""><br>
<em>テーブル内のカラムとレコード</em></p>

<h4>カラムには保存されるデータの制約を設定できる</h4>

<p>カラムには制約が設定されます。データベースはデータを一元管理しているので、データの整合性や一貫性が求められ、データの不整合が起きると大変なことになります。そこにあるはずの値が無かったり、数字を取得したつもりが文字列だったりすることは許されません。</p>

<p>制約の1つとして <strong>データ型</strong> があります。下記のキャプチャのように id には <code>int</code> という整数型が、name には <code>varchar</code> という文字列型が設定されています。カラムで指定された型以外の値を含んだレコードは、保存が失敗するようになっています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webapp/message-board/database_02.png" alt=""><br>
<em>テーブル内のカラムにおけるデータ型</em></p>

<p>他には、<strong>NULL許容／禁止</strong> の制約もあります。<code>NULL</code> とは、<strong>値が無いことを示す値</strong> のことです。PHPでも <code>NULL</code> として表現されます。NULLを許容したカラムには、NULLが入ってもレコードを保存することができます。しかし、NULLを禁止したカラムには、そのカラムにNULLが入ったレコードが保存できないようになっています。</p>

<p>また、<strong>主キー（プライマリーキー）</strong> という制約も設定できます。主キーは1つのテーブルに対して1つだけ指定できます。Laravelでは基本的に <code>id</code> が主キーとなります。主キーには、テーブルの各レコードを特定できる値となれるカラムを指定します。</p>

<h4>データの保存や取得などの処理にSQLという言語を使用する</h4>

<p>リレーショナルデータベースでは、SQLというデータベースのための言語を使用して命令文を記述し、データの保存や取得を行います。例えばユーザーテーブル(users)から全員分の名前(name)を取得するには、下記のような命令文となります。</p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">select</span> name <span class="keyword">from</span> users;
</pre></div>
</div>
</div>

<p>SQLに関してはこのレッスンで学びます。</p>

<h4>ここまでのまとめ</h4>

<p>リレーショナルデータベースソフトウェアは、このように、1つのデータベースとそれに紐付いた複数のテーブルを持ち、各テーブルには何件ものレコードが保存され、カラムの制約によってデータの整合性を担保しています。そしてデータの操作にはSQLを使用します。</p>
</div></section><section id="chapter-4"><h2 class="index">4. データベースの役割
</h2><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 CRUD
</h3><p>データベースがデータを扱う基本操作には、次の4つがあります。</p>

<table>
  <thead>
    <tr>
      <th>英語</th>
      <th>日本語</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Create</td>
      <td>作成・保存</td>
    </tr>
    <tr>
      <td>Read</td>
      <td>取得</td>
    </tr>
    <tr>
      <td>Update</td>
      <td>更新</td>
    </tr>
    <tr>
      <td>Delete</td>
      <td>削除</td>
    </tr>
  </tbody>
</table>

<p>この4つの基本機能の頭文字をとって、CRUD（クラッド）と呼びます。</p>

<p>CRUD操作はSQLを使用して実行します。SQLはこのレッスンで学びます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 アプリケーションとデータベースの関係
</h3><p>データベースは、PHPなどのプログラムから必要なデータ操作（CRUD）を要求され、それに応えてデータ操作をします。これがアプリケーションにおけるデータベースの役割です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 SQLとは
</h3><p>SQLは、RDBMSのデータ操作や定義を行うための言語です。</p>

<p>SQLには、大きく3つの役割があります。</p>

<ul>
  <li>データ操作のSQL</li>
  <li>データ定義のSQL</li>
  <li>データ制御のSQL</li>
</ul>

<h4>データ操作のSQL</h4>

<p>データ操作のSQLは、CRUDです。データの保存、取得、更新、削除を担います。アプリケーション上では、メインとなるSQLです。</p>

<table>
  <thead>
    <tr>
      <th>データ操作のSQLキーワード</th>
      <th>CRUD</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>INSERT</td>
      <td>Create</td>
      <td>作成・保存</td>
    </tr>
    <tr>
      <td>SELECT</td>
      <td>Read</td>
      <td>取得</td>
    </tr>
    <tr>
      <td>UPDATE</td>
      <td>Update</td>
      <td>更新</td>
    </tr>
    <tr>
      <td>DELETE</td>
      <td>Delete</td>
      <td>削除</td>
    </tr>
  </tbody>
</table>

<h4>データ定義のSQL</h4>

<p>データ定義のSQLは、データ自体ではなく、データを格納するためのデータベースやテーブルを作成するときに使います。</p>

<table>
  <thead>
    <tr>
      <th>データ定義のSQLキーワード</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>CREATE</td>
      <td>新しいデータベース、テーブルを作成する</td>
    </tr>
    <tr>
      <td>DROP</td>
      <td>既に存在するデータベースや、テーブルを削除する</td>
    </tr>
  </tbody>
</table>

<h4>データ制御のSQL</h4>

<p>データ制御のSQLは、データ定義と同じくデータ自体ではなく、データにアクセスできるアカウントの制御に使います。データベースにも、ログシステムが搭載されており、アカウントによって異なる権限を設定できます。全てのデータにアクセスできるアカウントもあれば、新規データの保存のみでデータ削除は禁止されているアカウントを作成することもできます。</p>

<p>今回は元々用意されているアカウントを利用するので、深くは触れません。</p>
</div></section><section id="chapter-5"><h2 class="index">5. データベース作成の流れ
</h2><div class="subsection"><p>どのタイミングでデータベースを用意するでしょうか？</p>

<p>データベースは、アプリケーション側の仕様として「データベースが必要だ」となったら、すぐに作成しておきます。基本的に1アプリケーションに対して1データベースです。データベースの中のテーブルは、必要になるたびに新規作成して増やしていきます。例えば「ブログ用のWebアプリケーションを作成してブログ記事を保存するテーブルは作成していました、しかし、更に記事に対してコメントできる機能が必要になりました」とすると、そのときにコメント用のテーブルを新規作成します。テーブルは必要なデータの種類に応じてどんどん増えていきます。</p>

<p>テーブルを作成する際、テーブルでどんなデータを保存するかを設計する必要があります。テーブル設計とは、データをどのような形式で保存するか決めることです。例えば、ブログ記事を保存するテーブルであれば、下記のようにarticleテーブルを作成することになるでしょう。</p>

<p><em>articleテーブル</em></p>

<ul>
  <li>id (int)</li>
  <li>title (varchar)</li>
  <li>content (text)</li>
</ul>

<p><code>id</code>はテーブル内でレコードを一意に決めるためのIDです。<code>title</code>はブログ記事のタイトルです。<code>content</code>はブログ記事の内容です。<code>int</code>や<code>varchar</code>, <code>text</code>は保存するときのデータの型です。intは整数値、varcharは文字列、textは長い文字列で保存されます。したがって、idには <code>1</code>,  <code>2</code> などの整数データ、titleには <code>〜な方法10選</code> などの文字列データの保存が可能です。</p>
</div></section><section id="chapter-6"><h2 class="index">6. データベースサーバ
</h2><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 データベースサーバとは
</h3><p>データベースもWebサーバと同じくサーバとして起動するものです。</p>

<p>データベースサーバは起動すると、接続待ち状態になります。「IDとパスワードを送信してログイン」に成功すれば、データベースと接続でき、データベースに対してSQLを実行することができるようになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/mysql/7-3.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 データベースサーバの起動と停止
</h3><p>ここから実際にデータベースを構築していきます。Cloud9の画面を開いて進めましょう。MySQLは最初からCloud9に導入されているので、インストール作業は不要です。</p>

<h4>起動</h4>

<p>ターミナルで、<code>sudo service mysqld start</code>を実行しましょう。MySQLサーバが起動します。<br>
（PHPのレッスンでも確認しましたが、<code>$</code>はターミナルの<code>$</code>なので、入力しないでください）</p>

<pre><code>$ sudo service mysqld start
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/first-programming/mysql/mysql_cloud9_01[1].png" alt=""></p>

<p>なお、はじめてMySQLを起動した場合には <code>Initializing MySQL database:  Installing MySQL system tables...</code> のように、DBの状態を初期化している旨のメッセージが出ますが、気にする必要はありません。</p>

<h4>起動状態確認</h4>

<p>ターミナルで、下記コマンドを実行してみましょう。MySQLサーバの起動状態を確認することができます。サーバに接続できないなどの問題があった場合、すぐに確認してみましょう。</p>

<pre><code>$ sudo service mysqld status
</code></pre>

<h4>停止</h4>

<p>ターミナルで下記コマンドを実行してみましょう。これでMySQLサーバは停止します。</p>

<pre><code>$ sudo service mysqld stop
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 データベースサーバへの接続
</h3><p>MySQLサーバを停止した方は、もう一度起動してください。</p>

<p>起動後に、下記のコマンドをターミナルで実行しましょう。</p>

<pre><code>$ mysql -u root
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/first-programming/mysql/mysql_cloud9_02[1].png" alt=""></p>

<p>これは<code>root</code>というユーザー(<code>-u</code>で指定)でMySQLサーバに接続するという意味です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 データベースサーバからの切断
</h3><p>先程のコマンドでMySQLサーバへ接続した後に、切断したい場合、下記コマンド(<code>exit</code>)を入力して切断してください。</p>

<pre><code>mysql&gt; exit
</code></pre>

<p>ここまでで、データベースサーバの起動から接続までを学びました。次から、データベースサーバに接続し、データベースを作成していきましょう。</p>

<h4><code>mysql&gt;</code>について</h4>

<p>ターミナルコマンドの先頭を<code>$</code>で表したように、MySQLサーバに接続するとターミナルが<code>mysql&gt;</code>で始まるようになります。以降の文章内で <code>mysql&gt;</code>とある場合は、MySQLサーバに接続した上で入力するコマンドだと思ってください。</p>
</div></section><section id="chapter-7"><h2 class="index">7. データベースの作成
</h2><div class="subsection"><p>まずはデータベースサーバが起動されているか確認(<code>sudo service mysqld status</code>)し、されていない場合には起動(<code>sudo service mysqld start</code>)しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 データベースの初期設定
</h3><h4>mysql&gt;の状態であれば抜けてください</h4>

<p><code>mysql&gt;</code> の状態の場合には、 <code>exit</code> を実行してMySQLクライアントを終了させてください。</p>

<pre><code>mysql&gt; exit
</code></pre>

<p>これで下記のようにコマンドを待ち受ける状態になります。</p>

<pre><code>username:~/environment $
</code></pre>

<p>この状態のターミナルで、<code>$</code> の後ろに下記の1行のコマンドを実行して、文字化け対策を行ってください。長いのでコピペで入力してもらって構いません（改行は不要です）。</p>

<pre><code>sed -e "/utf8/d" -e "/client/d" -e "/^\[mysqld_safe\]$/i character-set-server=utf8\n\n[client]\ndefault-character-set=utf8" /etc/my.cnf |sudo tee /etc/my.cnf
</code></pre>

<p>上記のコマンドを実行すると、下記のような MySQL の設定が <em>/etc/my.cnf</em> ファイルに追加され、MySQLのデータベースで保存されるデータに日本語を含むことができるようになります。</p>

<p><em>/etc/my.cnf</em></p>

<pre><code>[mysqld]
character-set-server=utf8

[client]
default-character-set=utf8
</code></pre>

<h4>設定を反映させるためにMySQLサーバを再起動する</h4>

<p><em>ターミナルで実行してMySQLサーバを再起動</em></p>

<pre><code>$ sudo service mysqld restart
</code></pre>

<h4>文字化け対策ができているかの確認</h4>

<p><em>ターミナルで実行してMySQLサーバに接続</em></p>

<pre><code>$ mysql -u root
</code></pre>

<p><em>MySQLサーバに接続して実行</em></p>

<pre><code>mysql&gt; show variables like "chara%";
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/mysql/mysql_cloud9_04.png" alt=""></p>

<pre><code>+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | utf8                       |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
</code></pre>

<p>上記のように、<code>utf8</code>が表示されていればOKです。<code>latin1</code>が表示されていれば設定ファイルを作成できていないか、MySQLサーバを再起動できていないかのどちらかです。<strong>ここは初心者では太刀打ちしにくい箇所なので、うまくいかない場合はメンターに質問するようにお願いします</strong>。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-2">7.2 SQL文の最後にセミコロン追加
</h3><p>ここからはSQLが登場するので、補足しておきます。SQLはMySQLサーバに接続した状態（ <code>mysql&gt;</code> でコマンドを待ち受けている状態）で入力します。</p>

<p>SQL文は最後に<code>;</code>（セミコロン）が必要です。<code>;</code>無しに<kbd>Enter</kbd>を押してもまだSQLが続くものと認識してしまいます。</p>

<p>もし、<code>;</code>を入れ忘れて<kbd>Enter</kbd>を押してしまうと<code>-&gt;</code>が表示されるので、慌てずに<code>;</code>を入力してください。それでSQL文の終了が伝わります。（<code>-&gt;</code>はまだSQLの命令が終わってないという意味です）</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-3">7.3 データベースの作成
</h3><p>初期設定が済んだらデータベースを作成していきましょう。データベースをログアウトしたならば、データベースサーバへ改めて接続してください。 ログイン中ならば、下記のコードは実行する必要ありません。</p>

<pre><code>// データベースにログインする
$ mysql -u root
</code></pre>

<p>それではデータベースを作成します。今回作成するデータベースは、本のオンライン通販サイトを想定しています。データベース名は <code>bookstore</code> にしましょう。</p>

<pre><code>mysql&gt; CREATE DATABASE bookstore;
</code></pre>

<p>たったこれだけのSQLでデータベース <code>bookstore</code> を作成できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-4">7.4 データベース一覧の確認
</h3><p>下記のコマンドで、現在作成されている全てのデータベースの一覧を確認することができます。</p>

<pre><code>mysql&gt; show databases;
</code></pre>

<pre><code>+--------------------+
| Database           |
+--------------------+
| information_schema |
| bookstore          |
| mysql              |
| performance_schema |
| test               |
+--------------------+
</code></pre>

<p><code>bookstore</code>が作成されていることを確認できたら大丈夫です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-5">7.5 データベースを削除したいとき
</h3><p>データベースを削除することも簡単です。</p>

<pre><code>mysql&gt; DROP DATABASE bookstore;
</code></pre>

<p>この命令は <strong>確認無しに即削除される</strong> ので、実際の現場で管理者の確認無しに行うことは絶対にやめてください。どれだけ多くのデータがあろうと一瞬で消し飛んでしまいます。本コースでは、消して困るデータは無いので、本コースの学習中は安心して使用してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-6">7.6 操作するデータベースを選択
</h3><p>データベースを作成した後は、今から操作していくデータベースを選択します。これはMySQLサーバに接続する度に行う必要があります。</p>

<pre><code>mysql&gt; USE bookstore;
</code></pre>

<p><code>USE データベース名</code> を実行しないと、たとえば <code>bookstore</code> データベースの <code>books</code> でデータ操作をする際、 <code>bookstore.books</code> のように <code>データベース名.テーブル名</code> と指定しなければなりません。<code>USE データベース名</code> を実行することで、<code>books</code> （<code>テーブル名</code> のみ）で指定できるようになります。</p>
</div></section><section id="chapter-8"><h2 class="index">8. テーブルの作成
</h2><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 データ型
</h3><p>PHPでもデータ型について学びました。同じくMySQLにもデータ型があります。</p>

<p>データ型を指定しなければいけないのは、それが文字なのか数値なのかコンピュータが判断できないからです。コンピュータの内部では電気信号によってデータが保存されているので、全く見分けが付きません。しかし、ここで文字なのか数値なのかが決まっていれば、MySQLが「これは○○型のデータだな」と思って処理してくれます。</p>

<p>MySQLのデータ型はいくつかありますが、基本のデータ型だけを挙げておきます。</p>

<ul>
  <li>INT（整数）</li>
  <li>DOUBLE（小数）</li>
  <li>VARCHAR（可変長の文字列）</li>
  <li>TEXT（文章用の長い文字列）</li>
  <li>TIMESTAMP（日付時刻型）</li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 bookstoreデータベースにbooksテーブルを作成するSQLファイルを作成
</h3><p>作成した<em>bookstore</em>のデータベースにテーブルを作成しましょう。1行で書くには長いので、下記のように<em>create_table_bookstore_books.sql</em>としてファイルを作成します。ワークスペース直下に <em>create_table_bookstore_books.sql</em> を Cloud9のエディタで作成してください。</p>

<p><em>create_table_bookstore_books.sql</em></p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">CREATE</span> <span class="type">TABLE</span> bookstore.books (
    id <span class="predefined-type">INT</span> <span class="directive">AUTO_INCREMENT</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">PRIMARY</span> <span class="type">KEY</span>,
    title <span class="predefined-type">VARCHAR</span>(<span class="integer">100</span>),
    price <span class="predefined-type">INT</span>,
    created_at <span class="predefined-type">TIMESTAMP</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">DEFAULT</span> CURRENT_TIMESTAMP
);
</pre></div>
</div>
</div>

<p>上記のSQLについて説明していきます。</p>

<p><code>CREATE TABLE bookstore.books</code>の部分は、<code>bookstore</code>データベースの中に<code>books</code>テーブルを作成するという意味です。特定のデータベースのテーブルを指定するときは、<code>データベース名.テーブル名</code>によって指定します。</p>

<p>そして、<code>CREATE TABLE bookstore.books ( ... )</code>の<code>...</code>にテーブルの設計を書いていきます。上記のSQLでは下記4つのカラムを作成しています。</p>

<ul>
  <li>id（ID）</li>
  <li>title（本のタイトル）</li>
  <li>price（本の価格）</li>
  <li>created_at（登録された日時）</li>
</ul>

<p>まず、<code>id INT AUTO_INCREMENT NOT NULL PRIMARY KEY</code>についてです。これは<code>id</code>というカラムを作成し、<code>INT</code>のデータ型で保存されます。<code>AUTO_INCREMENT</code>は<code>1</code>から始まり次に登録されたら<code>2</code>, <code>3</code>と自動的に値が1ずつ増えていく設定です。<code>NOT NULL</code>は空データを許さない（つまり、なんらかの値が必ず入る）設定で、<code>PRIMARY KEY</code>はデータを一意に特定するためのカラムがどれか決定するもので、1つのテーブルに必ず1つは必要です。</p>

<p><code>title VARCHAR(100)</code>は、<code>title</code>というカラムを、<code>VARCHAR(100)</code>というデータ型で保存するという設定です。<code>VARCHAR</code>型は文字列であり、<code>(100)</code>は100文字と制限するためのものです。<code>VARCHAR</code>では必ず最大文字数を指定する必要があります。</p>

<p><code>price INT</code>は、<code>price</code>というカラムを、<code>INT</code>（整数型）で保存するという設定です。</p>

<p><code>created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP</code>は、<code>created_at</code>カラムを作成し、<code>TIMESTAMP</code>という日付型でデータを保存するという設定です。<code>NOT NULL</code>は空データを許さない設定です。<code>DEFAULT CURRENT_TIMESTAMP</code>はデフォルト値として現在日時を保存するという意味です。つまり、<code>created_at</code>は保存時にわざわざ現在日時を与えなくても、データ保存と同時に自動的にそのときの現在日時を保存してくれます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 SQLファイルを実行する
</h3><p><code>source</code>というMySQLのコマンドを使用して、先ほどのファイルを実行させます。MySQLにログインした状態で実行しましょう。</p>

<pre><code>mysql&gt; source ~/environment/create_table_bookstore_books.sql
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-8-4">8.4 テーブル一覧の確認
</h3><p><code>USE bookstore</code>でデータベースを選択していることが前提です。</p>

<p>その後に、下記のコマンドを入力すると、現在選択されているデータベース上で作成されているテーブル一覧を確認することが出来ます。</p>

<pre><code>mysql&gt; show tables;
</code></pre>

<pre><code>+---------------------+
| Tables_in_bookstore |
+---------------------+
| books               |
+---------------------+
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-8-5">8.5 テーブルの設計内容を確認
</h3><pre><code>mysql&gt; describe books;
</code></pre>

<pre><code>+------------+--------------+------+-----+-------------------+----------------+
| Field      | Type         | Null | Key | Default           | Extra          |
+------------+--------------+------+-----+-------------------+----------------+
| id         | int(11)      | NO   | PRI | NULL              | auto_increment |
| title      | varchar(100) | YES  |     | NULL              |                |
| price      | int(11)      | YES  |     | NULL              |                |
| created_at | timestamp    | NO   |     | CURRENT_TIMESTAMP |                |
+------------+--------------+------+-----+-------------------+----------------+
</code></pre>

<p>ちゃんと設定されていれば、上記のようになります。把握しやすい表ですね。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-6">8.6 テーブルを削除したい場合
</h3><pre><code>mysql&gt; DROP TABLE bookstore.books;
</code></pre>

<p>この命令で<strong>確認無しに即削除される</strong>ので、実際の現場で管理者の確認無しに行うことは絶対にやめてください。どれだけ多くのデータがあろうと一瞬で消し飛んでしまいます。本コースでは、消して困るデータは無いので、本コースの学習中は安心して使用してください。</p>
</div></section><section id="chapter-9"><h2 class="index">9. SQLでテーブルのデータをCRUD操作
</h2><div class="subsection"><p>bookstoreデータベースの下にbooksテーブルが作成されました。</p>

<p>今度はテーブルの下にレコード（データ列）を保存し、操作していきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 データの作成・保存
</h3><p>CRUDのC(Create)です。</p>

<p>SQLではINSERT文を用います。<code>INSERT INTO</code>と<code>VALUES</code>がキーワードになります。キーワードは構文を構成する上で必要な単語のことです。</p>

<p>SQLのキーワードを大文字で入力すると、キーワードとその他を区別しやすくなります。このレッスンではキーワードを大文字で書くようにします。</p>

<h4>INSERT構文</h4>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">INSERT</span> <span class="class">INTO</span> <span class="error">テ</span><span class="error">ー</span><span class="error">ブ</span><span class="error">ル</span><span class="error">名</span> (<span class="error">カ</span><span class="error">ラ</span><span class="error">ム</span><span class="integer">1</span>, <span class="error">カ</span><span class="error">ラ</span><span class="error">ム</span><span class="integer">2</span>, ...) <span class="keyword">VALUES</span> (<span class="error">値</span><span class="integer">1</span>, <span class="error">値</span><span class="integer">2</span>, ...);
</pre></div>
</div>
</div>

<p><code>カラム1</code>と<code>値1</code>、<code>カラム2</code>と<code>値2</code>が対応しています。</p>

<p>それでは実際に先程作成したテーブルにデータを追加してみましょう。なお、以降のSQL文では念のため <code>bookstore.books</code> としていますが、<code>USE bookstore;</code> を実行している場合 <code>bookstore.</code> は不要です。</p>

<pre><code>mysql&gt; INSERT INTO bookstore.books (title, price) VALUES ("はじめてのMySQL", 2980);
</code></pre>

<p>上記を実行してみてください。これで、<code>title</code>に<code>はじめてのMySQL</code>、<code>price</code>に<code>2980</code>が入ったレコードを保存されます。<code>id</code>は<code>AUTO_INCREMENT</code>設定で、<code>created_at</code>は<code>DEFAULT CURRENT_TIMESTAMP</code>設定だったので、それぞれ<code>1</code>や現在日時が入っているはずです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 データの取得
</h3><p>CRUDのR(Read)です。</p>

<p>SELECT文を用います。<code>SELECT</code>と<code>FROM</code>がキーワードになります。</p>

<h4>SELECT構文</h4>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">SELECT</span> <span class="error">カ</span><span class="error">ラ</span><span class="error">ム</span><span class="error">名</span> <span class="keyword">FROM</span> <span class="error">テ</span><span class="error">ー</span><span class="error">ブ</span><span class="error">ル</span><span class="error">名</span>;
</pre></div>
</div>
</div>

<p>それでは実際に先程追加したデータ（レコード）を取得してみましょう。</p>

<pre><code>mysql&gt; SELECT * FROM bookstore.books;
</code></pre>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  1 | はじめてのMySQL      |  2980 | 2016-11-07 06:20:12 |
+----+----------------------+-------+---------------------+
</code></pre>

<p><code>*</code>と書くと全てのカラムを取得することができます。これで、先ほど保存した<code>はじめてのMySQL</code>のレコードが実際に保存されていることを確認できたと思います。なお、日本語のような全角文字がデータの中に入っていると、表示される表の枠が上記のようにずれる場合がありますが、気にしないでください。保存されているデータ自体には問題ありません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 データの更新
</h3><p>CRUDのU(Update)です。</p>

<p>UPDATE文を用います。<code>UPDATE</code>と<code>SET</code>がキーワードになります。</p>

<h4>UPDATE構文</h4>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">UPDATE</span> <span class="error">テ</span><span class="error">ー</span><span class="error">ブ</span><span class="error">ル</span><span class="error">名</span> <span class="class">SET</span> <span class="error">カ</span><span class="error">ラ</span><span class="error">ム</span><span class="error">名</span><span class="integer">1</span> = <span class="error">値</span><span class="integer">1</span>, <span class="error">カ</span><span class="error">ラ</span><span class="error">ム</span><span class="error">名</span><span class="integer">2</span> = <span class="error">値</span><span class="integer">2</span>, ...
</pre></div>
</div>
</div>

<p>それでは実際に先程追加したデータ（レコード）を更新してみましょう。</p>

<pre><code>mysql&gt; UPDATE bookstore.books SET price = 1480;
</code></pre>

<h4>確認</h4>

<p>実際に確認してみましょう。</p>

<pre><code>mysql&gt; SELECT * FROM bookstore.books;
</code></pre>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  1 | はじめてのMySQL      |  1480 | 2016-11-07 06:20:12 |
+----+----------------------+-------+---------------------+
</code></pre>

<p><code>price</code>が<code>1480</code>に更新されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-4">9.4 データの削除
</h3><p>CRUDのD(Delete)です。</p>

<p>DELETE文を用います。<code>DELETE</code>と<code>FROM</code>がキーワードになります。</p>

<h4>DELETE構文</h4>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">DELETE</span> <span class="keyword">FROM</span> <span class="error">テ</span><span class="error">ー</span><span class="error">ブ</span><span class="error">ル</span><span class="error">名</span>
</pre></div>
</div>
</div>

<p>それでは実際に先程追加したデータ（レコード）を削除してみましょう。</p>

<pre><code>mysql&gt; DELETE FROM bookstore.books;
</code></pre>

<p>これで、テーブルに保存されている <strong>全ての</strong> レコードが削除されます。</p>

<h4>確認</h4>

<p>実際に確認してみましょう。</p>

<pre><code>mysql&gt; SELECT * FROM bookstore.books;
</code></pre>

<pre><code>Empty set (0.00 sec)
</code></pre>

<p>空だと言われます。これで削除を確認できました。</p>
</div></section><section id="chapter-10"><h2 class="index">10. 条件で絞り込み - WHERE句
</h2><div class="subsection"><p>SQLにおけるCRUD操作を見ていきましたが、SELECT文やUPDATE文、DELETE文で全レコードが対象となってしまうのはどうも不便です。</p>

<p>そこで、SQLにはWHERE句というキーワードが用意されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-1">10.1 WHERE句をつけたCRUD操作
</h3><h4>INSERT</h4>

<p>まずは、いくつかテスト用のレコードを追加しましょう。</p>

<p>INSERT文はそもそも条件をつける意味がないので、WHERE句はありません。</p>

<pre><code>mysql&gt; INSERT INTO bookstore.books (title, price) VALUES ("はじめてのMySQL", 2980);
mysql&gt; INSERT INTO bookstore.books (title, price) VALUES ("はじめてのPHP", 1980);
mysql&gt; INSERT INTO bookstore.books (title, price) VALUES ("はじめてのHTML", 1000);
mysql&gt; INSERT INTO bookstore.books (title, price) VALUES ("はじめてのCSS", 1000);
</code></pre>

<h4>SELECT</h4>

<p>先程取得できたのはテーブルに保存された全レコードでした。</p>

<p>条件を指定して、特定のレコードだけ取得したい場合には、WHERE句を用います。</p>

<p>下記SQLは、<code>price</code>が<code>1500</code>より大きいレコードのみを取得します。</p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; <span class="class">SELECT</span> * <span class="keyword">FROM</span> bookstore.books <span class="keyword">WHERE</span> price &gt; <span class="integer">1500</span>;
</pre></div>
</div>
</div>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-11-07 06:39:29 |
|  3 | はじめてのPHP        |  1980 | 2016-11-07 06:39:34 |
+----+----------------------+-------+---------------------+
</code></pre>

<h4>UPDATE</h4>

<p>下記SQLは、<code>price</code>が<code>1000</code>のもの（2つある）の<code>price</code>を<code>1200</code>へ更新するSQLです。</p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; <span class="class">UPDATE</span> bookstore.books <span class="class">SET</span> price = <span class="integer">1200</span> <span class="keyword">WHERE</span> price = <span class="integer">1000</span>;
</pre></div>
</div>
</div>

<h5>確認</h5>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; <span class="class">SELECT</span> * <span class="keyword">FROM</span> bookstore.books;
</pre></div>
</div>
</div>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-11-07 06:39:29 |
|  3 | はじめてのPHP        |  1980 | 2016-11-07 06:39:34 |
|  4 | はじめてのHTML       |  1200 | 2016-11-07 06:39:40 |
|  5 | はじめてのCSS        |  1200 | 2016-11-07 06:39:43 |
+----+----------------------+-------+---------------------+
</code></pre>

<p>2つとも<code>1000</code>から<code>1200</code>へ更新されていることがわかります。</p>

<h4>DELETE</h4>

<p>下記SQLは、<code>title</code>が<code>はじめてのCSS</code>なレコードが削除されます。</p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; <span class="class">DELETE</span> <span class="keyword">FROM</span> bookstore.books <span class="keyword">WHERE</span> title = <span class="string"><span class="delimiter">"</span><span class="content">はじめてのCSS</span><span class="delimiter">"</span></span>;
</pre></div>
</div>
</div>

<h5>確認</h5>

<pre><code>mysql&gt; SELECT * FROM bookstore.books;
</code></pre>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-11-07 06:39:29 |
|  3 | はじめてのPHP        |  1980 | 2016-11-07 06:39:34 |
|  4 | はじめてのHTML       |  1200 | 2016-11-07 06:39:40 |
+----+----------------------+-------+---------------------+
</code></pre>

<p>ちゃんと削除されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-2">10.2 WHERE句で使える比較演算子
</h3><p><code>=</code>と<code>&gt;</code>は先ほど使用しましたが、それ以外にも使える比較演算子がいくつかあります。</p>

<table>
  <thead>
    <tr>
      <th>比較演算子</th>
      <th>意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>a = b</td>
      <td>aとbが等しい</td>
    </tr>
    <tr>
      <td>a != b</td>
      <td>aとbが等しくない</td>
    </tr>
    <tr>
      <td>a &lt; b</td>
      <td>aがbより小さい</td>
    </tr>
    <tr>
      <td>a &lt;= b</td>
      <td>aがb以下</td>
    </tr>
    <tr>
      <td>a &gt; b</td>
      <td>aがbより大きい</td>
    </tr>
    <tr>
      <td>a &gt;= b</td>
      <td>aがb以上</td>
    </tr>
    <tr>
      <td>a IS NULL</td>
      <td>aがNULL</td>
    </tr>
    <tr>
      <td>a NOT NULL</td>
      <td>aがNULLでない</td>
    </tr>
    <tr>
      <td>a BETWEEN b1 AND b2</td>
      <td>aがb1とb2の間</td>
    </tr>
    <tr>
      <td>a IN (b1, b2, …)</td>
      <td>aが括弧内の値(b1, b2, …)のいずれかと等しい</td>
    </tr>
  </tbody>
</table>

<p>これらをWHERE句と一緒に使うことで、条件を絞り込めます。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-mysql">課題：データベースを作成</h3><p>MySQL上で、以下の3つの操作をSQLで実行してください。</p>

<ol>
  <li><code>kadaidb</code>というデータベースを作成してください</li>
  <li>このデータベースに <code>person</code> というテーブルを作成してください（テーブル設計は下記を参照）</li>
  <li>レコードを1つ保存してください（どのようなデータを保存するかは自由とします）</li>
</ol>

<p><em>テーブル設計</em></p>

<pre><code>+------------+-------------+------+-----+-------------------+----------------+
| Field      | Type        | Null | Key | Default           | Extra          |
+------------+-------------+------+-----+-------------------+----------------+
| id         | int(11)     | NO   | PRI | NULL              | auto_increment |
| name       | varchar(50) | YES  |     | NULL              |                |
| age        | int(11)     | YES  |     | NULL              |                |
| created_at | timestamp   | NO   |     | CURRENT_TIMESTAMP |                |
+------------+-------------+------+-----+-------------------+----------------+
</code></pre>

<p>「課題を提出する」ボタンを押すと、コメントが入力できるウィンドウが出てくるので、以下の解答フォーマットの中に3つのSQL文を記述したものをコメント欄に入力して、「提出する」ボタンを押して送信してください。（メンターは、提出いただいたSQL文とCloud9上のデータベースをレビューします。）</p>

<h4>解答フォーマット</h4>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">-- 1. kadaidb データベースを作成するSQL文</span>


<span class="comment">-- 2. person テーブルを作成するSQL文</span>


<span class="comment">-- 3. データを1件保存するSQL文</span>

</pre></div>
</div>
</div>
</div></section><section id="chapter-11"><h2 class="index">11. ORDER BY句で順番を決める
</h2><div class="subsection"><p>表示順を並べ替えるSQLもあります。<code>ORDER BY</code>です。</p>

<p><code>ORDER BY 並べ替え基準となるカラム</code>と指定すると、小さい順に並べ替えて表示させることができます。これはテーブル内の順番が変わるのではなく、あくまで表示上そう見えるようにできるだけです。</p>

<pre><code>mysql&gt; SELECT * FROM bookstore.books ORDER BY price;
</code></pre>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  4 | はじめてのHTML       |  1200 | 2016-11-07 06:39:40 |
|  3 | はじめてのPHP        |  1980 | 2016-11-07 06:39:34 |
|  2 | はじめてのMySQL      |  2980 | 2016-11-07 06:39:29 |
+----+----------------------+-------+---------------------+
</code></pre>

<p><code>price</code>の小さい順に並べ替えられました。</p>

<p>大きい順に並べ替えたい場合には、<code>DESC</code>をつけます。</p>

<pre><code>mysql&gt; SELECT * FROM bookstore.books ORDER BY price DESC;
</code></pre>

<pre><code>+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-11-07 06:39:29 |
|  3 | はじめてのPHP        |  1980 | 2016-11-07 06:39:34 |
|  4 | はじめてのHTML       |  1200 | 2016-11-07 06:39:40 |
+----+----------------------+-------+---------------------+
</code></pre>
</div></section><section id="chapter-12"><h2 class="index">12. 集計関数でレコードを分析する
</h2><div class="subsection"><h3 class="index" id="chapter-12-1">12.1 COUNT関数
</h3><p>カウント関数は、レコード数を集計します。</p>

<p>下記SQLを実行すると、<code>bookstore.books</code>のレコードが3つなので、3が結果として表示されます。</p>

<pre><code>mysql&gt; SELECT COUNT(*) FROM bookstore.books;
</code></pre>

<pre><code>+----------+
| COUNT(*) |
+----------+
|        3 |
+----------+
</code></pre>

<p>また、 <code>WHERE</code> を用いて、条件に合ったものだけ <code>COUNT(*)</code> することも可能です。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT COUNT(*) FROM bookstore.books WHERE price &gt; 1500;
</pre></div>
</div>
</div>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>+----------+
| COUNT(*) |
+----------+
|        2 |
+----------+
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-12-2">12.2 SUM関数
</h3><p>SUM関数を使うと、合計を表示することができます。あまり意味がないですが、<code>price</code>の合計を表示させてみましょう。</p>

<pre><code>mysql&gt; SELECT SUM(price) FROM bookstore.books;
</code></pre>

<pre><code>+------------+
| SUM(price) |
+------------+
|       6160 |
+------------+
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-3">12.3 AVG関数
</h3><p>AVG関数を使うと、平均を表示することができます。</p>

<pre><code>mysql&gt; SELECT AVG(price) FROM bookstore.books;
</code></pre>

<pre><code>+------------+
| AVG(price) |
+------------+
|  2053.3333 |
+------------+
</code></pre>
</div></section><section id="chapter-13"><h2 class="index">13. テーブルの結合
</h2><div class="subsection"><h3 class="index" id="chapter-13-1">13.1 テーブルの正規化
</h3><p>例えば、「はじめてのMySQL」という書籍の章をデータベースに保存する必要があったとします。</p>

<p>章は、下記のように構成されていたとします。</p>

<ol>
  <li>MySQLとは</li>
  <li>テーブルとは</li>
  <li>CRUDとは</li>
  <li>…</li>
</ol>

<p>このとき、データベースにどう保存するのが良いのか考えてみましょう。</p>

<h4>パターン1: books テーブルに chapter カラムを追加する。</h4>

<p>この場合、下記のように TEXT データ型の chapter カラムを追加してあげればOKです。</p>

<p><em>下記のSQLは一例です。試さないでください</em></p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">CREATE</span> <span class="type">TABLE</span> bookstore.books (
    id <span class="predefined-type">INT</span> <span class="directive">AUTO_INCREMENT</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">PRIMARY</span> <span class="type">KEY</span>,
    title <span class="predefined-type">VARCHAR</span>(<span class="integer">100</span>),
    price <span class="predefined-type">INT</span>,
    chapter <span class="predefined-type">TEXT</span>,
    created_at <span class="predefined-type">TIMESTAMP</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">DEFAULT</span> CURRENT_TIMESTAMP
);
</pre></div>
</div>
</div>

<p>そして、 chapter カラムには章立てのテキストが保存されます。例えば下記のようなものです。</p>

<pre><code>1. MySQLとは
2. テーブルとは
3. CRUDとは
4. ...
</code></pre>

<p>このテーブル設計で問題無ければ、これでも良いです。</p>

<p>ただし、もう少しデータベース上でうまく扱う方法もあります。</p>

<h4>パターン2: chapters テーブルを新規作成する（正規化）</h4>

<p>単なるテキストではなく、 chapters テーブルを新規作成して、そのテーブルに chapter をレコードとして保存する方法です。この方法を <strong>正規化</strong> と呼びますが、深く理解する必要は今のところありません。とりあえずそう呼ぶのだということだけ覚えておいてください。</p>

<p>ワークスペース直下に、下記のファイル名でテーブル作成用の SQL を保存してください。</p>

<p><em>create_table_bookstore_chapters.sql</em></p>

<div class="language-sql highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">CREATE</span> <span class="type">TABLE</span> bookstore.chapters (
    id <span class="predefined-type">INT</span> <span class="directive">AUTO_INCREMENT</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">PRIMARY</span> <span class="type">KEY</span>,
    number <span class="predefined-type">INT</span>,
    title <span class="predefined-type">VARCHAR</span>(<span class="integer">100</span>),
    book_id <span class="predefined-type">INT</span>,
    created_at <span class="predefined-type">TIMESTAMP</span> <span class="keyword">NOT</span> <span class="predefined-constant">NULL</span> <span class="directive">DEFAULT</span> CURRENT_TIMESTAMP
);
</pre></div>
</div>
</div>

<ul>
  <li><code>number</code> カラムは、章番号です。1章、2章などの数字にあたります。</li>
  <li><code>title</code> カラムは、章タイトルです。</li>
  <li><code>book_id</code> カラムは、この章立てになる書籍(books テーブル)の id です。</li>
</ul>

<p>次のコマンドで、ファイルに保存した「chapters テーブルを作成する SQL」を実行してください。</p>

<pre><code>mysql&gt; source ~/environment/create_table_bookstore_chapters.sql
</code></pre>

<p>これで、テーブルが books と chapters の2つになっているはずです。</p>

<pre><code>mysql&gt; show tables;

+---------------------+
| Tables_in_bookstore |
+---------------------+
| books               |
| chapters            |
+---------------------+
</code></pre>

<p>ここまでの学習で、現状の books テーブルのレコードは下記のように3件が保存されているかと思います。</p>

<pre><code>mysql&gt; select * from books;

+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |
|  4 | はじめてのHTML       |  1000 | 2016-12-14 04:24:42 |
+----+----------------------+-------+---------------------+
</code></pre>

<p>chapters テーブルに3つの章を登録します。いずれも book_id = 2 で「はじめてのMySQL」に関する章です。もし、「はじめてのMySQL」の id が 2 以外であれば、その値を入力してください。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; INSERT INTO bookstore.chapters (number, title, book_id) VALUES (1, "MySQLとは", 2);
mysql&gt; INSERT INTO bookstore.chapters (number, title, book_id) VALUES (2, "テーブルとは", 2);
mysql&gt; INSERT INTO bookstore.chapters (number, title, book_id) VALUES (3, "CRUDとは", 2);
</pre></div>
</div>
</div>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; select * from chapters;

+----+--------+--------------------+---------+---------------------+
| id | number | title              | book_id | created_at          |
+----+--------+--------------------+---------+---------------------+
|  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
+----+--------+--------------------+---------+---------------------+
</pre></div>
</div>
</div>

<p>これで、単なるテキストではなく、章番号(number)や章タイトル(title)を、データベースの中で意味のある値として持つことができました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-2">13.2 テーブルの結合
</h3><p>そして、テーブル同士は結合することができます。</p>

<p>テーブルの結合には、 <code>INNER JOIN テーブル名 ON 条件</code> キーワードを使用します。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT * FROM books INNER JOIN chapters ON books.id = chapters.book_id;

+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
| id | title                | price | created_at          | id | number | title              | book_id | created_at          |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
</pre></div>
</div>
</div>

<p>上記 SQL は3つに分けられます。</p>

<ul>
  <li><code>SELECT * FROM books</code></li>
  <li><code>INNER JOIN chapters</code></li>
  <li><code>ON books.id = chapters.book_id</code></li>
</ul>

<p>順番に見ていきましょう。</p>

<h4><code>SELECT * FROM books</code></h4>

<p><code>SELECT * FROM books</code> は単純に books テーブルの一覧を表示しています。</p>

<pre><code>mysql&gt; SELECT * FROM books;
+----+----------------------+-------+---------------------+
| id | title                | price | created_at          |
+----+----------------------+-------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |
|  4 | はじめてのHTML       |  1000 | 2016-12-14 04:24:42 |
+----+----------------------+-------+---------------------+
</code></pre>

<h4><code>INNER JOIN chapters</code></h4>

<p><code>INNER JOIN chapters</code> が接続されることで、テーブルが結合されます。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT * FROM books INNER JOIN chapters;

+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
| id | title                | price | created_at          | id | number | title              | book_id | created_at          |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  4 | はじめてのHTML       |  1000 | 2016-12-14 04:24:42 |  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  4 | はじめてのHTML       |  1000 | 2016-12-14 04:24:42 |  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
|  4 | はじめてのHTML       |  1000 | 2016-12-14 04:24:42 |  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
</pre></div>
</div>
</div>

<p>上記の通り、 <code>chapters</code> の3つのレコードが、結合先の <code>books</code> の3つのレコード全てに結合したので、 3 x 3 = 9 の結合パターンが表示されています。</p>

<p>ただし、この結合パターンには無意味なパターンも表示されています。今 <code>chapters</code> のレコードは全て <code>book_id = 2</code> のものだったはずです。そのため、 <code>books.id = 2</code> のもの以外は不要です。</p>

<h4><code>ON books.id = chapters.book_id</code></h4>

<p>そこで、 <code>ON books.id = chapters.book_id</code> を加えて、この条件に沿わない結合パターンは消します。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT * FROM books INNER JOIN chapters ON books.id = chapters.book_id;

+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
| id | title                | price | created_at          | id | number | title              | book_id | created_at          |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
</pre></div>
</div>
</div>

<p>これで、テーブルを結合して、意味のある結合パターンのみを抽出することができました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-3">13.3 chapters テーブルにレコードを増やしてみる
</h3><p>chapters テーブルにレコードを増やしてみても、同様に意味のある結合パターンのみを抽出することができます。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; INSERT INTO bookstore.chapters (number, title, book_id) VALUES (1, "PHPとは", 3);
mysql&gt; INSERT INTO bookstore.chapters (number, title, book_id) VALUES (2, "変数とは", 3);
mysql&gt; INSERT INTO bookstore.chapters (number, title, book_id) VALUES (3, "関数とは", 3);
</pre></div>
</div>
</div>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT * FROM books INNER JOIN chapters ON books.id = chapters.book_id;
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
| id | title                | price | created_at          | id | number | title              | book_id | created_at          |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  2 | はじめてのMySQL      |  2980 | 2016-12-14 04:23:10 |  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |  4 |      1 | PHPとは            |       3 | 2016-12-14 04:40:05 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |  5 |      2 | 変数とは           |       3 | 2016-12-14 04:40:08 |
|  3 | はじめてのPHP        |  1980 | 2016-12-14 04:24:38 |  6 |      3 | 関数とは           |       3 | 2016-12-14 04:40:11 |
+----+----------------------+-------+---------------------+----+--------+--------------------+---------+---------------------+
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-4">13.4 テーブルの結合は一対多、多対多で活躍する
</h3><p>まだ実例を持って強調できませんが、テーブルの結合はとても重要です。</p>

<p>後半のレッスンで、 Laravel を使用して、 Twitter クローンを作成します。そのときに、一対多、多対多というデータ同士の関係性が出てきます。この、一対多、多対多をうまく表現するのに、テーブルの結合がとても重要になってきます。</p>

<p>ここでは一旦テーブルが結合できるのだということさえわかっていただければ大丈夫です。テーブルの結合をうまく利用する事例は、 Lesson12 Twitter クローン で学ぶことになります。</p>
</div></section><section id="chapter-14"><h2 class="index">14. グループ化
</h2><div class="subsection"><p>集計関数のチャプターで <code>COUNT(*)</code> の集計関数を使用すると、レコードは1つにグループ化（集約）されました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-14-1">14.1 GROUP BY
</h3><p>1つにグループ化されるのではなく、複数のレコードとしてグループ化する方法があります。それが <code>GROUP BY</code> 句です。</p>

<p>レコードが下記のようになっているとします。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT * FROM chapters;

+----+--------+--------------------+---------+---------------------+
| id | number | title              | book_id | created_at          |
+----+--------+--------------------+---------+---------------------+
|  1 |      1 | MySQLとは          |       2 | 2016-12-14 04:33:57 |
|  2 |      2 | テーブルとは       |       2 | 2016-12-14 04:34:14 |
|  3 |      3 | CRUDとは           |       2 | 2016-12-14 04:34:25 |
|  4 |      1 | PHPとは            |       3 | 2016-12-14 04:40:05 |
|  5 |      2 | 変数とは           |       3 | 2016-12-14 04:40:08 |
|  6 |      3 | 関数とは           |       3 | 2016-12-14 04:40:11 |
+----+--------+--------------------+---------+---------------------+
</pre></div>
</div>
</div>

<p>このとき、 <code>GROUP BY book_id</code> とすると、 <code>book_id</code> が同じものはグループとして1つのレコードにされます。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT * FROM chapters GROUP BY book_id;

+----+--------+-------------+---------+---------------------+
| id | number | title       | book_id | created_at          |
+----+--------+-------------+---------+---------------------+
|  1 |      1 | MySQLとは   |       2 | 2016-12-14 04:33:57 |
|  4 |      1 | PHPとは     |       3 | 2016-12-14 04:40:05 |
+----+--------+-------------+---------+---------------------+
</pre></div>
</div>
</div>

<p>これだと、ただ単に、1つの本につき1つの章だけを表示（1つの章以外は重複したものとして非表示）にしたに過ぎませんが、 <code>GROUP BY</code> が威力を発揮するのは、集計関数などと組み合わせた場合です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-14-2">14.2 集計関数とグループ化
</h3><p>集計関数とグループ化を同時に使用します。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT *, COUNT(*) FROM chapters GROUP BY book_id;

+----+--------+-------------+---------+---------------------+----------+
| id | number | title       | book_id | created_at          | COUNT(*) |
+----+--------+-------------+---------+---------------------+----------+
|  1 |      1 | MySQLとは   |       2 | 2016-12-14 04:33:57 |        3 |
|  4 |      1 | PHPとは     |       3 | 2016-12-14 04:40:05 |        3 |
+----+--------+-------------+---------+---------------------+----------+
</pre></div>
</div>
</div>

<p><code>SELECT</code> に <code>COUNT(*)</code> を加えると、集計関数の章では全てのレコードが対象でしたが、ここでは <code>GROUP BY book_id</code> を利用することで、<code>book_id</code> が同一なグループを分けて集計しています。今回は <code>book_id</code> が <code>2</code> か <code>3</code> だったので、 <code>book_id = 3</code> なものが3つ、 <code>book_id = 2</code> なものも3つという結果になりました。</p>

<p>更に、 <code>INNER JOIN</code> によって books テーブルを結合して、本のタイトルと、章の数を同時に出すことも可能です。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>mysql&gt; SELECT books.title, COUNT(*) AS number_of_chapters FROM chapters INNER JOIN books ON books.id = chapters.book_id GROUP BY book_id;

+----------------------+--------------------+
| title                | number_of_chapters |
+----------------------+--------------------+
| はじめてのMySQL      |                  3 |
| はじめてのPHP        |                  3 |
+----------------------+--------------------+
</pre></div>
</div>
</div>

<p><code>COUNT(*) AS number_of_chapters</code> は、今まで <code>COUNT(*)</code> によって出現する一時的なカラムは <code>COUNT(*)</code> というカラム名でしたが、何の COUNT なのかわかりにくいため、 <code>AS カラム名</code> とすることで、名前を付けています。</p>

<p>グループ化と集計関数の組み合わせは、ランキング機能などを実装するときに使用されます。</p>
</div></section><section id="chapter-15"><h2 class="index">15. まとめ
</h2><div class="subsection"><p>ここではアプリケーションのデータ保存用のために、まずはデータベースを学びました。ここではまだアプリケーションとデータベースの連携（PHPとMySQLの連携）までには踏み込んでいません。データベースでのCRUDを理解し、SQLの基本がわかれば、ここでは大丈夫です。</p>

<p>データベースも自分で作ってみれば、普通のことをしているだけだと思えたのではないでしょうか。普段私たちがExcelなどを使ってやっていることを、データベースとして使っているに過ぎません。データベースの方がアプリケーションとの連携がしやすく CRUD するにも効率的なだけです。</p>

<p>さて、次のレッスンではPHPとの連携をして、実際にフォームのデータを保存していきます。ようやく本格的なWebアプリケーションを作成できそうです。</p>

<div class="alert alert-warning">
このレッスンで作成したファイルは <i>mysql-lesson</i> フォルダを作成して、その中に入れておきましょう。今後もファイルを作成していくので、今のうちに整理してください。以降のレッスンで作成するファイルも <i>○○-lesson</i> のような名前のフォルダを作成して整理しておくと良いでしょう。
</div>
</div></section></div>
</body>
</html>