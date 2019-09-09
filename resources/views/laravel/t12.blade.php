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
<div class="markdown"><div class="lesson-num p">Lesson12</div><h1 id="internet">インターネット通信の仕組み
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>通信やHTTPに関する簡単な話は以前のレッスンで触れました。しかし、今後の学習を進める上で、知っておいた方がWebアプリケーション開発をスムーズに理解できるようになる項目がまだまだあります。</p>

<p>このレッスンでは、そういったインターネット通信の知っておいてほしい仕組みや関連技術について学んでいきます。</p>
</div></section><section id="chapter-2"><h2 class="index">2. HTTP
</h2><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 HTTPリクエストとHTTPレスポンス
</h3><p>WebブラウザがWebサーバに対して出すリクエストのことを、正確にはHTTPリクエストと呼び、WebサーバがWebブラウザのHTTPリクエストに対して返すレスポンスは、HTTPレスポンスと呼んでいます。</p>

<p>HTTPリクエストを出すということは、HTTPリクエストメッセージをWebサーバに向けて送るということです。下記は、<code>https://news.yahoo.co.jp/</code> のページからリンクをクリックして <code>https://about.yahoo.co.jp/docs/info/terms/</code> のWebページを表示するときに送ったHTTPリクエストメッセージの例です。</p>

<h4>HTTPリクエストメッセージの例</h4>

<p><em>HTTPリクエストメッセージ</em></p>

<pre><code>GET /docs/info/terms/ HTTP/1.1
Host: about.yahoo.co.jp
Connection: keep-alive
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
Referer: https://news.yahoo.co.jp/
Accept-Encoding: gzip, deflate, br
Accept-Language: ja,en-US;q=0.9,en;q=0.8
Cookie: ...=...; ...
</code></pre>

<p>上記がHTTPリクエストメッセージの具体例です。HTTPリクエストメッセージの一般的な形式は、下記のようになります。</p>

<p><em>HTTPリクエストメッセージの一般形式</em></p>

<pre><code>メソッド URL HTTPのバージョン
ヘッダ部（付加情報）
（空行）
ボディ部
</code></pre>

<p>一行目の <code>メソッド URLのパス HTTPのバージョン</code> について見ていきます。具体例では <code>GET /docs/info/terms/ HTTP/1.1</code> となっていることが確認できます。このとき <code>メソッド</code> は <code>GET</code> 、 <code>URLのパス</code> は <code>/docs/info/terms/</code> 、<code>HTTPのバージョン</code> は <code>HTTP/1.1</code> となっています。メソッドに関しては次のセクションで学ぶので、そちらで確認しておきましょう。ちなみに <code>GET</code> は読み込みを意味するメソッドであり、<code>GET /docs/info/terms/</code>は該当のパスを読み込むという意味になります。<code>HTTP/1.1</code> はHTTPのバージョンが1.1であることを意味しています。</p>

<p>ヘッダ部では、<code>Host: about.yahoo.co.jp</code> とあり、ホスト名とドメイン名が合わさったものが指定されています。このホストにアクセスするということです。その他様々な接続情報がここに書かれます。</p>

<p>この例ではボディ部は存在しませんが、例えばPOST（フォームデータ送信時に使うメソッド）であれば、ボディ部にはフォームデータが入り、リクエストとしてサーバに送信されます。</p>

<p>このような形式でリクエストを出すことが、HTTPという通信規約（プロトコル）として決まっているのです。したがって、HTTPリクエストは常に上記の形式で通信を行います。全て完璧に覚える必要はありませんが、このような形式で通信を行うのがHTTPというWeb用の通信プロトコルで決まっているということだけ認識しておきましょう。</p>

<h4>HTTPレスポンスメッセージの例</h4>

<p>HTTPレスポンスを返すというのは、HTTPレスポンスメッセージをクライアントに向けて送るという意味です。下記は、先ほどのHTTPリクエストメッセージに対するHTTPレスポンスメッセージです。</p>

<p><em>HTTPレスポンスメッセージ</em></p>

<pre><code>HTTP/1.1 200 OK
Server: ATS
Date: Fri, 03 Aug 2018 05:24:43 GMT
Content-Type: text/html; charset=UTF-8
Content-Length: 5387
P3P: policyref="http://privacy.yahoo.co.jp/w3c/p3p_jp.xml", CP="CAO DSP COR CUR ADM DEV TAI PSA PSD IVAi IVDi CONi TELo OTPi OUR DELi SAMi OTRi UNRi PUBi IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE GOV"
X-Content-Type-Options: nosniff
X-XSS-Protection: 1; mode=block
Vary: Accept-Encoding
Content-Encoding: gzip

&lt;!DOCTYPE html&gt;

&lt;html lang="ja"&gt;
&lt;head&gt;

&lt;meta charset="UTF-8"&gt;
&lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;
&lt;meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"&gt;
（以下、Webページのコンテンツが続くので省略）
</code></pre>

<p>上記がHTTPレスポンスメッセージの具体例です。HTTPレスポンスメッセージの一般的な形式は下記のようになります。</p>

<p><em>HTTPレスポンスメッセージの一般形式</em></p>

<pre><code>HTTPのバージョン ステータスコード ステータス
ヘッダ部（付加情報）
（空行）
ボディ部
</code></pre>

<p>一行目の <code>HTTPのバージョン ステータスコード ステータス</code> について見ていきます。具体例では <code>HTTP/1.1 200 OK</code> となっていることが確認できます。このとき <code>HTTPのバージョン</code> は <code>HTTP/1.1</code> 、 <code>ステータスコード</code> は <code>200</code> 、<code>ステータス</code> は <code>OK</code> となっています。HTTPのバージョンが初めに来ているのは、以降のメッセージ形式を最初に知らせるためです。ステータスコードは、リクエストに対してサーバがどう反応したかを示す番号になり、今回の <code>200</code> であれば正常に動作したことを示します。また、ステータスコードと対応するステータスも文字列として返ってきます。<code>200</code> の場合は <code>OK</code> の文字列になります。</p>

<p>ヘッダ部では、サーバ情報やレスポンスデータの情報が記されています。覚える必要はありません。</p>

<p>今回のボディ部は、GETメソッド（読み込み用メソッド）に対するレスポンスです。（<code>&lt;!DOCTYPE html&gt;</code>）以降が実際のWebページ（HTML, コンテンツ）になります。Webブラウザはレスポンスメッセージで送られてきたコンテンツ（HTML文書）を、Webページとして表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-5.png" alt=""></p>

<p>URLの最初にあるHTTPは、Web用の通信プロトコルを示していると覚えておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 HTTPリクエストの4つのメソッド
</h3><p>Webでは、あるリソースに対して基本的に4つのことが可能です。ここでいうリソースとは、Web上にあるWebページやデータの全てです。例えば、Yahooのニュース記事ページや、Facebookのコメント、Twitterのツイート、ブログの記事やコメント、などです。</p>

<p>それらのリソースは基本的に4つの操作が可能です。それがCRUD（クラッド）と呼ばれる操作です。</p>

<h4>4つの操作 - CRUD</h4>

<p>CRUDは4つの操作の頭文字をとったものです。</p>

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
      <td>作成</td>
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

<p>FacebookのコメントやTwitterのツイートについて考えてみます。自分が今までに投稿したコメントやツイートを閲覧するとき、Read（取得）の操作を行っていることになります。そして投稿するときは Create（作成）の操作となります。そして、誤変換などを発見して修正したいときは Update（更新）の操作を行います。そして「やっぱり、この投稿は要らない」と思ったら Delete（削除）の操作によって削除することが可能です。</p>

<p>ただし、Yahooのニュース記事などユーザ側が操作権限を持っていないリソースに対しては、Read（取得）以外の操作は弾かれてしまいます。</p>

<h4>HTTPリクエストでのCRUD</h4>

<p>WebはHTTPというWeb用のプロトコルによって通信を行います。HTTP通信におけるCRUDのための4つのメソッドを学びましょう。ここでいうメソッドは、方法論といった意味ではなく、単にHTTPリクエスト内でのCRUDとして使われる語句のことを言います。</p>

<p>HTTPリクエストメッセージ内では、CRUDのそれぞれに該当する下記の4つのメソッドが用いられます。</p>

<table>
  <thead>
    <tr>
      <th>英語</th>
      <th>日本語</th>
      <th>HTTPメソッド</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Create</td>
      <td>作成</td>
      <td>POST</td>
    </tr>
    <tr>
      <td>Read</td>
      <td>取得</td>
      <td>GET</td>
    </tr>
    <tr>
      <td>Update</td>
      <td>更新</td>
      <td>PUT</td>
    </tr>
    <tr>
      <td>Delete</td>
      <td>削除</td>
      <td>DELETE</td>
    </tr>
  </tbody>
</table>

<p>先ほどのHTTPリクエストメッセージの例をもう一度見てみましょう。最初の行に <code>GET /docs/info/terms/ HTTP/1.1</code> とあるのがわかると思います。これは「<code>/docs/info/terms/</code>というリソース（ヤフーの記事）に対して、<code>GET</code>（Read, 取得）操作を要求します」というHTTPリクエストになります。<code>HTTP/1.1</code> はHTTPのバージョンの話で、HTTPもバージョンによって少しずつ違うので、このHTTPリクエストメッセージが従っているHTTPバージョンを明記しておく必要があります。</p>

<pre><code>GET /docs/info/terms/ HTTP/1.1
Host: about.yahoo.co.jp
Connection: keep-alive
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
Referer: https://news.yahoo.co.jp/
Accept-Encoding: gzip, deflate, br
Accept-Language: ja,en-US;q=0.9,en;q=0.8
Cookie: ...=...; ...
</code></pre>

<p><code>GET</code>だけでなく、あるリソースに対してCRUD操作をするとき、<code>POST</code> や <code>PUT</code> , <code>DELETE</code> も同様にHTTPリクエストメッセージの中の最初の一行目に書かれます。</p>

<p>このようにWebブラウザとWebサーバの間では、HTTPという通信プロトコルが利用され、HTTPリクエストとHTTPレスポンスというメッセージを送受信することで、リソースに対する操作を行っています。これがWeb上の通信の実態です。</p>
</div></section><section id="chapter-3"><h2 class="index">3. URL
</h2><div class="subsection"><p>インターネットを理解するには、URLの理解が不可欠です。これから、インターネットで接続先を特定できる仕組みについて学んでいきます。「URLへアクセスするとWebページが表示される」ということについて深掘りしていきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 URLはインターネット上のリソースの住所
</h3><p>インターネットを利用していると、<code>https://www.google.co.jp/</code>, <code>http://news.yahoo.co.jp/pickup/1</code> のような<strong>URL</strong>を頻繁に目にするかと思いますが、URLとは一体何でしょうか？</p>

<p>URLとはUniform Resource Locatorの略称で、日本語に訳すと「統一資源位置指定子」と書きます。難しい日本語になりましたが、要するにURLは、インターネット上のリソース（資源）の位置を特定するために使用される文字列です。URLは、インターネット上に公開されている1つのリソースに対して1つだけ割り当てられており、いわば <strong>リソースをインターネット上で特定するための住所</strong> であると言えます。</p>

<h4>URLとURIの違いについて</h4>

<p>URLに似た用語としてURI(Uniform Resource Identifier、統一資源位置識別子)があります。厳密にはURIとURLは微妙に異なる部分はありますが「URIとURLに大きな違いはない（同じである）」とみなしても問題はありません。</p>

<p>実はURLという用語は既に非公式の用語と指定されており、公式にはURIと呼ぶほうが正しいのです。ただ、URLという用語がこれだけ普及してしまったため、どちらも同じ意味として使っても通じているのが現状です。本コースでは、聞き慣れているURLを使用していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 URLの一般形式
</h3><p>URLの一般形式は、下記のような形をしています。</p>

<pre><code>（httpなどのプロトコル名）:（プロトコルごとに定められた形式）
</code></pre>

<p>URLの最初に付く記号は<code>http</code>以外にもいくつかあります。</p>

<ul>
  <li>http</li>
  <li>https</li>
  <li>ftp</li>
  <li>mailto</li>
  <li>file</li>
</ul>

<p><code>http</code> と <code>https</code> は、ここまでの学習内容で触れたので省略します。</p>

<p><code>ftp</code>は FTPを表すものです。FTP（File Transfer Protocol, ファイルトランスファープロトコル）とは、ネットワーク上でファイルの転送を行うための通信プロトコルの1つです。FTPのURL形式は <code>ftp://example.com/</code> のような形になります。HTTPでもファイルの転送を行うことができるので、あまり見かけないようになりました。FTPに関しては深く学びませんが、HTTPのような通信プロトコルの1つとだけ認識しておきましょう。</p>

<p><code>mailto</code>は、メールの宛先を表すものです。これはプロトコルではありませんが、<code>mailto:taro@example.com</code>などのようにメールアドレスを表現することができる一種のURLです。<a href="mailto:taro@example.com">mailto:taro@example.com</a> というリンクをクリックすれば、自分が利用しているメール送信のためのソフトウェアが起動するでしょう。</p>

<p><code>file</code>は、自分のコンピュータ内のファイルを表すものです。これも通信プロトコルではありませんが、URLの一種です。<code>file:///users/taro/document/memo.txt</code>のようなURL形式になります。Google Chromeで自分のコンピュータ内のファイルを開くと、このようなURLが表示されるはずです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 HTTPのURLの構成
</h3><p>HTTP以外のURLも確認しましたが、インターネットに繋げる限り、一般的な通信プロトコルはHTTPになります。ここからはHTTPを基本として解説します。</p>

<p>具体的なURLの説明に入る前に、URLを現実世界に例えてみましょう。URLはインターネット上のリソースの位置を特定するための住所でした。これを現実世界の住所とリソースに例えて考えてみます。</p>

<p>地球上の1つのリソース（資料など）を特定するならどうすれば良いでしょうか？ここでは日本国内とします。まずは住所ですね。<code>東京都渋谷区1-2-5</code>と書けばリソースが存在する領域をある程度特定できます。次にビル名まで書いてしまえば、 <code>東京都渋谷区1-2-5 MFPR渋谷ビル</code> となります。より位置が明確になりました。次に何階何号室かも書いてみます。<code>東京都渋谷区1-2-5 MFPR渋谷ビル 801号室</code>。ここまで来るとだいぶリソースに近づいてきました。最後に、完全に特定しましょう。<code>東京都渋谷区1-2-5 MFPR渋谷ビル 801号室 の手前から3番目の机の真下においてある引き出しの 上から3番目にある黄色い表紙の資料</code>、これで日本という広大な空間から、間違う余地なく、1つのリソースを特定することができました。</p>

<p>URLは上記の説明と発想は全く同じものです。</p>

<p>HTTPのURLの一般形式は下記の通りです。この形でインターネット上のリソースを1つに特定することができます。</p>

<p><em>HTTPのURLの一般形式</em></p>

<pre><code>http://ホスト名.ドメイン名:ポート番号/パス
</code></pre>

<p>HTTPのURLの構成は、いくつかのパーツに分けられています。HTTPSの場合も<code>http</code>が<code>https</code>になるだけで、あとは同様と考えてください。簡単に全体を確認するために下記の表を見てください。</p>

<table>
  <thead>
    <tr>
      <th>用語</th>
      <th>候補例</th>
      <th>説明</th>
      <th>現実世界のリソースの場所で例えると</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>ホスト名(host)</td>
      <td>www, mail, maps, news</td>
      <td>コンピュータ名</td>
      <td>何階何号室（ 901号室など)</td>
    </tr>
    <tr>
      <td>ドメイン名(domain)</td>
      <td>yahoo.co.jp, google.co.jpなど</td>
      <td>ネットワーク名</td>
      <td>ビル名までの住所(東京都渋谷区1-2-5 MFPR渋谷ビルなど)</td>
    </tr>
    <tr>
      <td>ポート番号(port)</td>
      <td>80, 25, 110, 443など</td>
      <td>通信する番号</td>
      <td>宛名、宛先の部署名など</td>
    </tr>
    <tr>
      <td>パス(path)</td>
      <td>/magazine/9081, /programming/languages/list.htmlなど</td>
      <td>ホスト内のリソースの場所</td>
      <td>物の場所（引き出しの上から3番目の黄色い表紙の資料など）</td>
    </tr>
  </tbody>
</table>

<p>例えば、<code>http://www.example.com/news/tech/computer.html</code> というURLがあったとすると、下記のように分類されます。これらが定まることで、インターネット上のリソースを特定することができます。</p>

<table>
  <tbody>
    <tr>
      <td>通信プロトコル</td>
      <td><code>http</code></td>
    </tr>
    <tr>
      <td>ホスト名</td>
      <td><code>www</code></td>
    </tr>
    <tr>
      <td>ドメイン名</td>
      <td><code>example.com</code></td>
    </tr>
    <tr>
      <td>ポート番号</td>
      <td>省略</td>
    </tr>
    <tr>
      <td>パス</td>
      <td><code>/news/tech/computer.html</code></td>
    </tr>
  </tbody>
</table>

<p>ポート番号は、<code>http</code>の場合には<code>80</code>だとデフォルトが決まっているので、普通は省略されます。仮に、<code>http</code> でありながらポート番号に <code>3000</code> を使う場合には、HTTPのデフォルトポート番号ではないので、<code>http://www.example.com:3000/news/tech/computer.html</code> と明示します。またパスの最後の <code>computer.html</code> なども省略される場合があり、その場合には <code>http://www.example.com/news/tech/</code> になります。パスの最後が <code>/</code> などファイル名で終わらず省略されている場合には <code>index.html</code> などがデフォルトで表示され、もしそれらのファイルが無ければ開くことはできません。</p>

<p>ここまで決まることで、URLはインターネット上のリソースを特定することができます。</p>

<h4>ドメイン名</h4>

<p>ドメイン名(Domain)とは、インターネット上のネットワークを特定するための住所です。例えば <code>google.co.jp</code> というドメイン名であれば、日本( <code>co.jp</code> )におけるGoogleのネットワークの住所を表しています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-8.png" alt=""></p>

<h4>ホスト名</h4>

<p>ホスト名(Host)とは、ネットワーク上のコンピュータにつける識別用の名前です。例えば <code>www.google.co.jp</code> はドメイン名が <code>google.co.jp</code> で、ホスト名が <code>www</code> になります。ホスト名をどのように決めるかは自由ですが、特に <code>www</code> は、Webサーバが起動しているホスト名を指すことが多いです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-9.png" alt=""></p>

<h4>ポート番号</h4>

<p>ポート番号(Port Number)は、通信プロトコルと密接な関係があり、例えばHTTPのプロトコルは80番と決まっています。したがって、ポート番号は省略できる場合がほとんどです。例外的に「HTTPではあるものの80番ポートを使わずに3000番を使う」とした場合には、ポート番号を明記することで対応できるようになっています。</p>

<p>ポート番号が必要な理由については、次のチャプターで解説します。</p>

<h4>パス</h4>

<p>パス(Path)とは、コンピュータ内のファイルの位置を表したものです。 <code>/</code> によってフォルダ名を区切っていきます。<code>/news/tech/computer.html</code> であれば、<em>news</em>フォルダの中の<em>tech</em>フォルダの中の<em>computer.html</em>と指定されます。</p>

<p>パスが省略された場合には、<code>index.html</code> など、<code>index.xxx</code> がデフォルトで表示されるようになります。</p>
</div></section><section id="chapter-4"><h2 class="index">4. IP
</h2><div class="subsection"><p>ここまでクライアントのリクエストと、サーバのレスポンスという形で通信すること、そしてインターネット上で特定のサーバが持っているリソースにアクセスするにはURLを使うと学びました。</p>

<!--
ここで疑問が出てきます。「クライアントがリクエストを送る場合にはURLを使ってサーバと通信できる。だったら、サーバがレスポンスを返すとき、クライアントの住所も特定できるものでなければならないのでは？」と。しかし、まだそういったものは出来ていません。
-->

<p>実はインターネット上にあるコンピュータの住所を特定するものは <strong>IPアドレス</strong> であり、URLではありません。URLはIPアドレスに変換されることになります。それをこのチャプターで学んでいきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 IPアドレスはコンピュータの住所
</h3><p>まず、IP(Internet Protocol)とは、インターネットのための通信プロトコルです。インターネットの通信はIPによって成り立っています。</p>

<p>IPがインターネットのプロトコルであるなら、HTTPはなんだったんだ？と思うかも知れません。実はHTTPは、IPによってインターネットが接続されているという前提があった上で、アプリケーション同士が通信するための通信プロトコルです。つまり、IPこそがインターネットを成立させているプロトコルです。WebブラウザがHTTPリクエストメッセージをWebサーバに向けて送りますが、このアプリケーション間の通信がインターネットを介すとき、HTTPリクエストメッセージはIPによって運ばれることになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-10.png" alt=""></p>

<p>そして、IPアドレスとは、ネットワーク上で個々のコンピュータを特定するための番号（住所）です。ネットワークに繋がっている個々のコンピュータに対して固有のIPアドレスが設定されています。</p>

<p>IPアドレスは、0~255（2の8乗=256通り、8ビット、1バイト）の数字が<code>.</code>区切りで4つ合わさった形で表現されます。<code>172.217.161.35</code>のようなものです。<code>0.0.0.0</code>から<code>255.255.255.255</code>まで住所を割り当てることができるので、約43億通り（<code>256 x 256 x 256 x 256 = 4,294,967,296</code>）の住所パターンを作り出すことができます。</p>

<div class="alert alert-info">
上記はIPアドレスの中でも <strong>IPv4</strong> と呼ばれる仕様です。インターネットの爆発的な普及により約43億の住所パターンの空きが急速に減ってきたため、更に多くの住所パターンを作り出せる IPv6 という新しい仕様も登場しました。本カリキュラムではIPv6の解説は省略しますので、興味ある方は、ご自身で調べてみましょう。
</div>

<p>なお、IPアドレスが重複することはありません。重複を許してしまうと、全く別の場所に同一の住所が存在してしまうことになり、どちらの住所とやり取りするべきか判断できないからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 URLのドメイン名とホスト名は実はIPアドレス
</h3><p>URLの中のホスト名（コンピュータ名）＋ドメイン名（ネットワーク名）がインターネットの住所だと最初は説明してきましたが、実は、ホスト名＋ドメイン名と、IPアドレスは一対一で対応しており、相互に変換が可能です。つまり、たとえば <code>www.google.co.jp</code> のIPアドレスが  <code>172.217.161.35</code> であるなら、 <code>www.google.co.jp</code> と <code>172.217.161.35</code> は全く同じコンピュータを指し示していることになります。</p>

<p>どちらか一方だけ使えばいいのではないかと思うかもしれませんが、<code>www.google.co.jp</code> と <code>172.217.161.35</code> なら人間にとって認識しやすいのはどちらでしょうか？当然<code>www.google.co.jp</code> です。つまりホスト名＋ドメイン名は人間用に作られたIPアドレスのことなのです。そして <code>172.217.161.35</code> といった数字の羅列はコンピュータが内部的に扱うのに便利な形をしているのです。</p>

<p>ちなみに、ホスト名＋ドメイン名のことをFQDN(Fully Qualified Domain Name)と呼びます。FQDNと出たらホスト名＋ドメイン名のこと( <code>www.google.co.jp</code> など) だと覚えておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 DNSサーバがURLとIPアドレスの対応表を持っている
</h3><p>この広大なインターネットの世界で、<code>www.google.co.jp</code> というURLのIPアドレスは <code>172.217.161.35</code> だとわかるには、何らかのシステムがその対応表を常に持って、その表の管理・保守を続ける必要があります。そのためのシステムがDNS(Domain Name System、ドメイン・ネーム・システム)と呼ばれるものです。</p>

<p>私たちがWebブラウザのURL入力欄に <code>https://www.google.co.jp/</code> と入力してアクセスすると、まずWebブラウザは、<code>www.google.co.jp</code> というFQDN(ホスト名＋ドメイン名)のIPアドレスを取得するために、DNSサーバに「このFQDNのIPアドレスを教えてくれ」とリクエストを送ります。DNSサーバはその対応表を持っているので、すぐに<code>www.google.co.jp</code> のIPアドレス <code>172.217.161.35</code> をレスポンスとして返します。FQDNだけではインターネットで通信できません。DNSからFQDNに対応するIPアドレスをもらって、ようやくインターネットを介した通信ができます。FQDNからIPアドレスを取得する行為を <strong>名前解決</strong>と呼びます。下記の、DNSを利用して名前解決できるサービスを提供しているWebサイトのリンク先を確認してみてください。そして気になるWebサイトのIPアドレスを確認してみると面白いかもしれません。</p>

<ul>
  <li><a href="https://www.cman.jp/network/support/nslookup.html" target="_blank">CMAN</a></li>
</ul>

<p>逆に、DNSサーバがなければ、<code>https://www.google.co.jp</code> と入力してもIPアドレスを取得できないので、URLにアクセスできません。<code>https://172.217.161.35/</code> のように、人間にとって覚えにくい IPアドレス をURL欄に入力しなければなりません。</p>

<p>また、それ以外にもDNSには利点があります。たとえばWebサーバのIPアドレスが変更された場合でも、DNSサーバが対応表を更新さえしていれば <code>www.google.co.jp</code> で新しいIPアドレスを得ることができるようになるという利点です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 DNSサーバの階層構造とFQDNの名前解決
</h3><p>名前解決をする流れを詳しく見てみます。</p>

<p><code>www.google.co.jp</code> は <code>.</code> でいくつかに区切られています。<code>www</code>, <code>google</code>, <code>co</code>, <code>jp</code>です。この中で最も広い領域を示すのが日本を示す <code>jp</code> です。次にあるのが <code>co</code> で、これは <code>commercial</code>（商用、営利目的）という意味を示します。そして、日本の営利目的の会社である <code>google</code> のドメインが来て、最後に <code>google</code>ドメインの中の <code>www</code> というホストを指定している、という意味になります。</p>

<p>この階層構造が、そのままDNSサーバの階層構造になります。<code>www.google.co.jp</code> の名前解決（IPアドレスを取得）するとき、下記の手順で名前解決をします。</p>

<ol>
  <li>まずは <strong>ルートDNSサーバ</strong> に「<code>jp</code> のDNSサーバはどこにありますか？」とリクエストを送り、レスポンスとして <code>jp</code> のDNSサーバのIPアドレスを受け取ります。</li>
  <li>それを利用して、次は <code>jp</code>のDNSサーバに「<code>co.jp</code> のDNSサーバはどこですか？」とリクエストを送り、<code>co.jp</code> のDNSサーバのIPアドレスを受け取ります。</li>
  <li>同様にそれを利用して、<code>co.jp</code> のDNSサーバに「<code>google.co.jp</code>はどこですか？」とリクエストを送ると、<code>google.co.jp</code> のDNSサーバのIPアドレスが返ってきます。</li>
  <li>最後に <code>google.co.jp</code> のDNSサーバに、「<code>www.google.co.jp</code> のホストはどこですか？」と聞いて、そのIPアドレスを受け取ります。</li>
  <li>これでようやく<code>www.google.co.jp</code>のIPアドレスがわかったので、Webサーバへアクセスすることになります。</li>
</ol>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-12.png" alt=""><br>
<em>URLにアクセスするときに、DNSサーバにURLのFQDNのIPアドレスを問い合わせるときのイメージ</em></p>

<p><code>.jp</code>だけでなく、<code>.com</code> や <code>.net</code> など、DNSサーバの階層構造はドメインの数だけあります。そのため、今回の例で見たようにルートDNSサーバから順番に名前解決していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-5">4.5 グローバルIPアドレスとプライベートIPアドレス
</h3><p>IPアドレスはネットワーク上で個々のコンピュータを特定するための番号（住所）で、ネットワークに繋がっている個々のコンピュータに対して固有のIPアドレスが設定されている、と説明しました。</p>

<p>しかし、これは実際には少し違います。実際にはコンピュータではなく、インターネット上に数多くある1つの小さなネットワークに対して1つのIPアドレスが与えられています。そのIPアドレスのことを <strong>グローバルIPアドレス</strong> と呼びます。グローバルIPアドレスこそ、インターネットに接続しているIPアドレスで、インターネット上では唯一のIPアドレスとなります。したがって、<code>172.217.161.35</code> というIPアドレスが指し示すのは小さなネットワークで、小さなネットワークまではグローバルIPアドレスによって唯一に決まります。</p>

<p>そして、小さなネットワーク内、つまり家庭や会社などの小さな組織内の、個々のコンピュータに与えられているIPアドレスのことを <strong>プライベートIPアドレス</strong> と呼びます。プライベートIPアドレスは、<code>192.168.0.100</code>のように<code>192.168.xxx.xxx</code>のような形をしていることが多いです。プライベートIPアドレスは小さなネットワーク限定のIPアドレスなので、このアドレスではインターネットに直接繋げることはできません。したがって、Aというネットワーク内のコンピュータに 192.168.0.100 が割り当てられていて、Bというネットワーク内のコンピュータに 192.168.0.100 が割り当てられることは許されます。なぜなら、AとBはグローバルIPアドレスによって区別されているので、それぞれのネットワーク内に割り当てられているプライベートIPアドレスは重複していようが問題がないからです。ただし、当然ですが、A内で192.168.0.100が割り当てられたコンピュータが2つある状態は許されません。</p>

<p>インターネット上から1つのコンピュータを特定するためには、グローバルIPアドレスと、そのグローバルIPアドレスを使用しているネットワーク内でのプライベートIPアドレスの2つのIPアドレスを知る必要があります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-13.png" alt=""></p>

<p>IPv4の場合、IPアドレスが約43億通りの住所を作れると言いましたが、43億程度では将来的に足らなくなることを見越しているのに小さなネットワーク内の各コンピュータにまでグローバルIPアドレスを設定していては、すぐに空きが無くなります。グローバルIPアドレスをネットワークの住所、プライベートIPアドレスをネットワーク内の個々のコンピュータの住所とすることで、グローバルIPアドレスの節約をしています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-6">4.6 グローバルIPのネットワークからコンピュータを特定するにはポート番号が活躍する
</h3><p>実はプライベートIPアドレスを利用すると、ひとつ問題が発生します。</p>

<p>プライベートIPアドレスを持っているクライアントがサーバへリクエストを送っても、所属するネットワークの外にリクエストが出ると、リクエストに設定された <code>クライアント（リクエストの送信元）のIPアドレス</code> の情報が書き換わってしまいます。そのため、サーバが受け取ったリクエストに設定されているクライアントのIPアドレスは「所属するネットワークのグローバルIPアドレス」になっています。つまりサーバにとって、レスポンスを返すとき「どのコンピュータがそのサーバに向けてリクエストを送ったのかわからない」という問題です。いわば <code>多:1</code>の通信になってしまって、<code>1</code>（サーバ）から見ると <code>多</code>（ネットワーク内のコンピュータ） の見分けがつきません。</p>

<p>これを解決する方法のひとつがNAPT(Network Address Port Translation)という技術です。NAPTはIPマスカレードとも呼ばれます。</p>

<p>ポート番号には、送信元ポート番号と宛先ポート番号があります。宛先ポート番号はHTTPの場合は<code>80</code>といった形である程度決まっていますが、送信元ポート番号は何でも良いのです。そこで、NAPTは、送信元ポート番号を巧みに利用してグローバルIPアドレスからコンピュータを特定することができます。NAPTのおかげで、プライベートIPアドレスからでもコンピュータを特定できるようになり、多:1の通信を実現できるようになりました。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-14-1.png" alt=""></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-14-2.png" alt=""></p>

<h4>補足：ウェルノウンポート番号</h4>

<p>ポート番号は、通信プロトコルと密接な関係があります。よく利用されて有名な通信プロトコルにはデフォルトのポート番号が決められています。そのため、このポート番号を使うアプリケーションはこれだと対応付けることもできます。よく知られたポート番号という意味で、Well-known Port Numberと呼ばれます。</p>

<p><em>Well-known Port Number（ウェルノウンポート番号）</em></p>

<table>
  <thead>
    <tr>
      <th>通信プロトコル</th>
      <th>ポート番号</th>
      <th>プロトコルの使用目的</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>FTP</td>
      <td>20, 21</td>
      <td>ファイル転送用</td>
    </tr>
    <tr>
      <td>SMTP</td>
      <td>25</td>
      <td>メール送信用</td>
    </tr>
    <tr>
      <td>HTTP</td>
      <td>80</td>
      <td>Web用</td>
    </tr>
    <tr>
      <td>POP</td>
      <td>110</td>
      <td>メール受信用</td>
    </tr>
    <tr>
      <td>NTP</td>
      <td>123</td>
      <td>時刻同期用</td>
    </tr>
    <tr>
      <td>IMAP</td>
      <td>143</td>
      <td>メール受信用</td>
    </tr>
    <tr>
      <td>SSL(HTTPS)</td>
      <td>443</td>
      <td>暗号化用</td>
    </tr>
  </tbody>
</table>

<p>ウェルノウンポート番号はURLに書くときには省略することができます。</p>
</div></section><section id="chapter-5"><h2 class="index">5. TCP/IPモデル
</h2><div class="subsection"><p>前のレッスンを含め、これまで下記の内容について学んできました。</p>

<ul>
  <li>クライアント／サーバモデル（リクエスト／レスポンス）</li>
  <li>HTTP</li>
  <li>URL</li>
  <li>IP</li>
</ul>

<p>この中で、通信プロトコルとなるのは、HTTPとIPです。そしてHTTPはIPを前提としたアプリケーション同士（WebブラウザとWebサーバ）の通信、IPはインターネット接続を支えるための通信プロトコルです。</p>

<p>これからHTTPやIPのプロトコルを体系的に把握していきましょう。今から紹介する各種プロトコルは階層構造になっています。その階層を <strong>TCP/IPモデル</strong> と呼びます。現在のインターネットを介したアプリケーション間の通信は、TCP/IPモデルという階層構造によって成り立っています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 TCP/IPモデルの階層構造
</h3><p>TCP/IPモデルは5つの階層によって成り立っています。</p>

<table>
  <thead>
    <tr>
      <th>5階層</th>
      <th>プロトコル例</th>
      <th>役割</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>アプリケーション層</td>
      <td>HTTP, SMTP, POP, FTP, DNS, NTP 等</td>
      <td>アプリケーション同士がデータをやり取りするための通信プロトコル群</td>
    </tr>
    <tr>
      <td>トランスポート層</td>
      <td>TCP, UDP</td>
      <td>アプリケーションがちゃんとデータを送れるように通信路を確保する</td>
    </tr>
    <tr>
      <td>インターネット層</td>
      <td>IP 等</td>
      <td>複数のネットワークを相互に接続した環境（インターネット）で、個々のコンピュータ間のデータ送受信を実現する</td>
    </tr>
    <tr>
      <td>データリンク層</td>
      <td>PPPoE 等</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>物理層</td>
      <td>回線, ケーブル 等</td>
      <td>物理的に繋がっていて電気信号を送れるようにする</td>
    </tr>
  </tbody>
</table>

<p>先ほど学んだHTTPはアプリケーション層の通信プロトコルで、IPはインターネット層の通信プロトコルとなります。</p>

<p>これらの階層は下層にいくほど、物理的なケーブルや回線による電気信号の通信プロトコルに近くなります。そして上層に行くほど、Webブラウザといったユーザが直接操作するアプリケーションの通信プロトコルに近くなります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-15.png" alt=""><br>
<em>TCP/IPモデルで通信するWebアプリケーション例</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 アプリケーション層の役割
</h3><p>アプリケーション層は、実際にユーザが使うようなアプリケーションの通信を可能にするためのプロトコル群です。例えば、HTTPはWeb用データを送受信するためのプロトコルであり、SMTP, POP, IMAPはメール送受信のためのプロトコルです。アプリケーション毎に送受信するデータの形式が違うため、それぞれ別のプロトコルとして定義されています。</p>

<p>コンピュータ同士の通信は、アプリケーション層の通信からスタートします。そのため、アプリケーション層はTCP/IPモデルの中で最上位に位置します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 トランスポート層の役割
</h3><p>トランスポート層の役割は、「通信路を作ってデータを通信相手に届ける」ことです。トランスポート層にはTCPとUDPがあります。</p>

<p>TCP(Transmission Control Protocol)は、コネクション型の通信プロトコルで、信頼性が高く、確実にデータを届けるプロトコルです。ただし、高い信頼性のための手続きが増えるため、通信開始するまでに手間がかかるプロトコルです。HTTPも基本的にはTCPを使用して通信しているので、Webページ内の単語が一部表示されないなどのデータ受信ミスはありません。データが確実に全て届けるためにはTCPを利用します。TCP/IPモデルの名のとおり、通常のインターネット通信では、TCPがトランスポート層のプロトコルとして採用されています。</p>

<p>UDP(User Datagram Protocol)は、高い信頼性を持ったTCPと違って、コネクションレス型の通信プロトコルです。高速通信が可能ですが、信頼性は低くなります。UDPは、音声通話や、ビデオ通話など、リアルタイム性を重視して多少のデータ転送ミスを許せる通信に使用されます。例えば、ビデオ通話でたまに映像が止まったり音声が届かなかったりしますが、これはUDPによる通信が実現されているからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 インターネット層の役割
</h3><p>インターネット層、とりわけIPの役割は、個々のコンピュータにIPアドレスを割り当てて、識別することです。IPアドレスを伝って目的の通信相手までデータを転送します。</p>

<p>それを実際に実現する機器がルータです。</p>

<h4>ルータはIP通信のための機器</h4>

<p>自分のコンピュータが所属するネットワークのIPアドレスは変更されることがあります。どのタイミングでIPアドレスが変更されるかどうかはインターネットサービスプロバイダ(ISP)との契約内容などによります。今日まで自分のネットワークを指すIPアドレスだったのに、明日には他人のコンピュータが所属するネットワークを指し、自分のネットワークには新たなIPアドレスが割り振られることは普通です。</p>

<p>このようにIPアドレスが変更されても同じコンピュータに向かっていけるのは、<strong>ルータ</strong>という機器のおかげです。</p>

<p>インターネットプロバイダとインターネットを繋げる契約をすると、工事が始まります。工事がない場合はその家は既に工事されていたので不要です。そしてその工事が終わったあとに、ルータが送られてきたり、工事してくれた人がセットアップしてくれたりします。</p>

<p>ルータはネットワークとネットワークを繋ぐための機器です。ルータはインターネット層（IP）を支える機器であり、ルータによってインターネットが繋がっていると言えます。</p>

<p>ルータはIPアドレスを利用して、データを目的のコンピュータまで届けます。ルータは宛先IPアドレスがわかると「こっちの方向にデータを伝送すれば目的地にたどり着ける」という情報を持っています。その情報はルーティングテーブルと呼ばれ、IPアドレスが変更されても追随して更新される技術を持っています。</p>

<p>ルータはルータ同士やコンピュータに接続され、データをバケツリレー形式で運んでいきます。コンピュータからデータが送信され、ルータ1が受け取り、ルータ1は宛先IPアドレスとルーティングテーブルを見比べて次はルータ2に送信すればいいことを判断します。これを繰り返していき、最終的に目的地である宛先IPアドレスのコンピュータへ届く仕組みになっています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-16.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 データリンク層
</h3><p>データリンク層は、物理層で直接接続された機器間の通信を可能にします。具体的にはLANボード（コンピュータに内蔵されている通信装置）などの機器を制御・識別し、そのための伝送路を確保します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-6">5.6 物理層
</h3><p>物理層では、LANボードなどから送出されたデータを電気信号に変換し、ケーブルなどの物理的な伝送媒体に流し込む機能を提供します。</p>

<p>コンピュータを無線LANや、有線のLANケーブルでルータまで繋げています。コンピュータのデータを電気信号に変え、ルータまで運び、そして業者に工事して配線してもらった光ファイバケーブルを伝って外へ出ます。日本には電線が張り巡らされており、それを伝って外のネットワークまで繋がっています。日本国内のインターネットは電線で繋がっています。</p>

<p>では海外まではどうやって繋がっているかというと、海の底に「海底ケーブル」と呼ばれる電線が敷かれていて、それを伝って海外までインターネットが繋がっています。海底ケーブルが全て切断されてしまうと、海外のコンピュータには届かなくなりますが、そうならないように海底ケーブルは増えており、整備されています。</p>

<p>インターネット上の全てのコンピュータが物理的に繋がっているのです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-7">5.7 階層構造の役割
</h3><p>この通信プロトコルの階層構造によって、明確に役割が分担されました。これによって各通信プロトコル自身が責任を持つ範囲が小さくなりました。そのおかげで、自分の役割でないものに関しては、下層のプロトコルに全て任せます。例えば、HTTPはアプリケーション間の通信のことだけを考えれば良く、しっかり通信路を確保しているかはTCPに、インターネットに繋げられるかはIPに、ちゃんと回線が繋がっているかはデータリンク層や物理層に完全に任せてしまいます。</p>

<p>更に、階層化することで、他の階層に影響を与えず改良することができます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-15.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-8">5.8 OSI参照モデル
</h3><p>TCP/IPモデルと似たもので、OSI参照モデルというのもあります。OSI参照モデルは7階層で構成されています。TCP/IPのアプリケーション層が、OSI参照モデルでは、アプリケーション層、プレゼンテーション層、セッション層の3つに分けられています。</p>

<p><em>OSI参照モデル</em></p>

<table>
  <thead>
    <tr>
      <th>7階層</th>
      <th>役割</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>アプリケーション層</td>
      <td>アプリケーションの種類やサービスに関する規定</td>
    </tr>
    <tr>
      <td>プレゼンテーション層</td>
      <td>データの種類・表現形式や送信ビット数に関する規定</td>
    </tr>
    <tr>
      <td>セッション層</td>
      <td>通信モードや同期方式に関する規定</td>
    </tr>
    <tr>
      <td>トランスポート層</td>
      <td>信頼性の確保やアプリケーション識別に関する規定</td>
    </tr>
    <tr>
      <td>ネットワーク層</td>
      <td>通信経路や中継経路の選択、識別アドレスに関する規定</td>
    </tr>
    <tr>
      <td>データリンク層</td>
      <td>通信路の確保や伝送制御手段、エラー訂正に関する規定</td>
    </tr>
    <tr>
      <td>物理層</td>
      <td>物理的な回線や機器類、電気信号に関する規定</td>
    </tr>
  </tbody>
</table>

<p>OSI参照モデルは国際規格の通信モデルですが、ネットワークの仕組みを勉強するためのモデルだと思ってください。現実的には、ここまでで解説してきたTCP/IPモデルによってインターネットは成立しています。</p>

<p>TCP/IPモデルが「実際にプロトコルをコンピュータに実装するには、どのように構成すれば良いか」という実用化と改良の繰り返しのなかで洗練されていったのに対して、OSI参照モデルは「通信プロトコルに必要な機能は何か？」という理論的なアプローチで作られたという相違点があります。結果的に、OSI参照モデルは国際規格として認められていますが、実際にインターネットを構成しているのは実践的なTCP/IPモデルです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-9">5.9 標準化団体
</h3><h4>IETF</h4>

<p>インターネットの取り決めを行ってきた中心的組織がIETF(Internet Engineering Task Force)という組織です。</p>

<p>IETFはこれまでTCP/IPモデルや、HTTPなどのプロトコルの標準化を策定してきました。そして策定された標準はRFC(Request For Comments)という名前で文書化、保存され、広くインターネットを通じて参照できるようになっています。</p>

<p>IETFは極めてオープンな組織で、世界中の技術者に参加を求めており、誰もが議論に参加できます（公用語は英語です）。個人の意見から、RFCとして標準化されるまでに数ヶ月の年月を経て議論され、最終的にRFCとして標準が策定されます。</p>

<h4>ISO</h4>

<p>ISO(International Organization for Standardization, 国際標準化機構)はインターネットだけでなく世界の標準化を行っている非政府組織です。</p>

<p>こちらは各国の代表機関が議論を繰り広げて標準を策定していきます。</p>

<p>IETFはTCP/IPモデルという実践のなかで改善されていったインターネットの仕組みの策定を繰り返してきましたが、OSI参照モデルは各国の議論によって策定されたインターネットのモデルです。そして実際には実践的なTCP/IPモデルがインターネットを繋げています。</p>
</div></section><section id="chapter-6"><h2 class="index">6. まとめ
</h2><div class="subsection"><p>インターネットに繋がるということについて、最後にまとめておきましょう。</p>

<p>アプリケーション間の通信モデルはクライアント／サーバモデルでした。クライアントがサーバに向けてリクエストを送り、サーバはリクエストを受け取ると、要求に応じたレスポンスをクライアントに向けて返します。</p>

<p>このとき、サーバのリソースの位置はURLによって特定されました。そして実際にはURLの中のホスト名＋ドメイン名(FQDN)はIPアドレスと一対一で対応し、DNSサーバにリクエストを送ることで相互に変換が可能でした。コンピュータの位置はIPアドレスによって特定されます。コンピュータの中のリソースはURLのパス部分によって指定されます。</p>

<p>インターネットを介したアプリケーション間の通信は、TCP/IPモデルによって実現されています。TCP/IPモデルは5つの階層になっており、それらはユーザに近い上位層のアプリケーション層から、下位層の物理層まであります。</p>

<ul>
  <li>アプリケーション層 (HTTP, SMTP, POP, FTP, DNS, NTP 等)</li>
  <li>トランスポート層 (TCP, UDP)</li>
  <li>インターネット層 (IP 等)</li>
  <li>データリンク層 (PPPoE 等)</li>
  <li>物理層 (回線、ケーブル 等)</li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/internet/4-16.png" alt=""><br>
<em>TCP/IPモデルのアプリケーション間通信（インターネット標準仕様）</em></p>

<p>アプリケーション層には、多くのアプリケーション間通信のための通信プロトコルがありますが、本コースではWebを中心に見ていくので、WebブラウザとWebサーバのアプリケーション間通信を支えるプロトコルであるHTTPについて詳しく学びました。そのとき、HTTPリクエストによるリソースの操作（CRUD）のために <code>GET</code>, <code>POST</code>, <code>PUT</code>, <code>DELETE</code>の4つのメソッドが用意されていました。</p>

<p>トランスポート層は、TCPもしくはUDPが利用されます。TCPは通信相手とのコネクションを確立し、しっかりデータが送受信されているかを監視します。もしデータがしっかりと送受信されていなかったら再送信するような仕組みを提供しているプロトコルです。それに対し、UDPはコネクションを確立しないため、音声や映像などデータ量が大きく少々のデータ送信ミスでは影響が少ないところで利用される低信頼なプロトコルです。</p>

<p>インターネット層では、実際にインターネット上のコンピュータ同士を繋げるための核となる通信プロトコルであるIPを提供しています。インターネット上の小さなネットワークはグローバルIPアドレスによって特定でき、更に小さなネットワーク内ではプライベートIPアドレスによって特定されました。インターネットはIPによって繋がっています。そしてそれを実現する機器はルータでした。</p>

<p>データリンク層、物理層は、より機械的な部分のプロトコルです。電気や光で通信するために定められたルールとなります。インターネット層によってインターネットの接続は支えられていますが、その下層であるデータリンク層や物理層の支えがないと接続は不可能です。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-internet">課題：インターネット通信の仕組み</h3><p>Webブラウザで <code>https://www.yahoo.co.jp</code> というURLにアクセスするとします。このとき、Webページが表示されるまでの過程を説明してください。ただし、下記に指定した用語を全て使ってください。</p>

<ul>
  <li>Webブラウザ</li>
  <li>DNS</li>
  <li>IPアドレス</li>
  <li>Webサーバ</li>
  <li>HTTPリクエスト</li>
  <li>HTTPレスポンス</li>
</ul>

<h4>回答フォーマット</h4>

<pre><code>Webブラウザで指定のWebページにアクセスするとき...
</code></pre>

<p>「課題を提出する」ボタンを押したら、コメントが入力できるウィンドウが出て来るので、そのコメント欄に回答を入力して、「提出する」ボタンを押して送信してください。</p>
</div></section></div>
</body>
</html>