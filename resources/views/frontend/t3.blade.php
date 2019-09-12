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
<div class="markdown"><div class="lesson-num p">Lesson3</div><h1 id="javascript">JavaScript
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>前回のレッスンでは、HTMLでページの骨組みを作ってCSSで見た目を整える方法を学びました。次はJavaScriptを使ってページに様々な機能を追加する方法を学んでいきましょう。JavaScriptを使うとページにエフェクトやアニメーションを追加したり、ユーザーの操作に応じて様々に変化する動的なページを作ることができます。リッチなサイトを作る上でJavaScriptは欠かせません。</p>

<p>このレッスンでは、JavaScriptによるプログラミングの基本と、クリックに応じてページの内容を自在に変える方法を学んでいきます。</p>
</div></section><section id="chapter-2"><h2 class="index">2. JavaScriptとは？
</h2><div class="subsection"><p>JavaScriptとは、Webページに様々な機能を追加するためのプログラミング言語です。今まで学んだようにJavaScriptを使わなくてもWebページは作れるのですが、HTMLとCSSだけでは表現の幅に限界があるため、より高度な事をしたいときにJavaScriptが必要になります。たとえば複雑なエフェクトやアニメーション、コンテンツの動的な書き換え、サーバとのデータのやりとりなどが主な用途です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-html-css-js.png" alt="HTML、CSS、JavaScriptの関係"></p>

<p>建物にたとえると、HTMLで土台や骨組みを作り、CSSで壁を塗ったり見た目を良くし、JavaScriptで電気を通すイメージです。電気がなくても雨風をしのぐ場所や鑑賞物としての価値はありますが、電気があると途端にできることが増えます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 ES6(ES2015)について
</h3><p>「ES」というのは「ECMAScript」の略で、JavaScriptの仕様のことです。2015年以降は、毎年そのバージョンが改訂されています。2019年現在で多く使われているのは、「ES6(ES2015)」というバージョンと、そのひとつ前の「ES5」というバージョンです。</p>

<p>このテキストでは、ES6に基づいて解説します。ただし比較的新しいバージョンのため、対応していないブラウザがあることに注意してください。たとえばブラウザのIE11では、ES6の一部機能しか使えません。</p>

<p>各ブラウザのES6対応状況について詳しくは、以下のサイトで確認できます。<br>
<a href="http://kangax.github.io/compat-table/es6/">ECMAScript Compatibility Table</a></p>
</div></section><section id="chapter-3"><h2 class="index">3. さっそく使ってみよう
</h2><div class="subsection"><p>ここでは、JavaScriptのサンプルコードを動かしていくことで実際の動作を確認してどんなことができるのか、どういうものなのかを見ていきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 インデントについて
</h3><p>ここからはインデントを半角スペース2文字で統一します。</p>

<p>Cloud9でその設定をしておきましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/cloud9_indent_space2.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 alertでダイアログを表示
</h3><p>JavaScriptでできることを確認するためにさっそく手を動かして、Cloud9上で確認していきましょう。Cloud9で以下のように<em>js-basic</em>フォルダと、そのフォルダ内に<em>index.html</em>と<em>main.js</em>を作成しましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/cloud9_folder.png" alt="Cloud9のフォルダ構造"></p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>alert(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>作成した<em>index.html</em>をプレビューします。プレビュー方法について詳しくは、レッスン0の<a href="orientation#chapter-7-4" target="_blank">7.4 AWS Cloud9の基本的な使い方</a>を確認してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/orientation/cloud9_workspace_html5_05.png" alt="ワークスペースの作成3"></p>

<p><em>index.html</em>のプレビューを開くと、小さなウインドウに「こんにちは！」と表示されます。このような短いメッセージを表示するためのウインドウのことを <strong>ダイアログ</strong> と呼びます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-alert.png" alt="alertダイアログが表示される"></p>

<p><em>main.js</em>に書いたものはJavaScriptのコード（ソースコード、プログラム）です。<em>index.html</em>を開くと<code>&lt;script&gt;</code>タグで<em>main.js</em>が読み込まれて実行されます。JavaScriptを書いたファイルは「.js」という拡張子で保存します。そして「.js」という拡張子で保存されたファイルのことを、「JSファイル」と呼びます。</p>

<p>では<em>main.js</em>を以下のように書き換えてプレビューをリロードしてみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>alert(<span class="integer">111</span> + <span class="integer">222</span>);
</pre></div>
</div>
</div>

<p>ダイアログに計算結果が表示されました！</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-alert-addition.png" alt="alertダイアログに足し算が表示される"></p>

<p>これであなたも立派なJavaScriptプログラマーの仲間入りです。</p>

<p>上記のようにJavaScriptの文の終わりには「<code>;</code>」（セミコロン）を書いてください。文というのは、コードの中で実行される１つの処理のことです。セミコロンがなくても動きますが、思わぬバグを招きやすいためできるだけ書くようにしましょう。</p>

<p><code>+</code>のように周囲に作用を及ぼす記号を <strong>演算子</strong> と言います。下の表を見ながらいろいろ計算結果を表示してみましょう。</p>

<table>
  <thead>
    <tr>
      <th>演算子</th>
      <th>意味</th>
      <th>例</th>
      <th>結果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>+</code></td>
      <td>足す</td>
      <td><code>1 + 2</code></td>
      <td><code>3</code></td>
    </tr>
    <tr>
      <td><code>-</code></td>
      <td>引く</td>
      <td><code>10 - 3</code></td>
      <td><code>7</code></td>
    </tr>
    <tr>
      <td><code>*</code></td>
      <td>掛ける</td>
      <td><code>3 * 7</code></td>
      <td><code>21</code></td>
    </tr>
    <tr>
      <td><code>/</code></td>
      <td>割る</td>
      <td><code>100 / 5</code></td>
      <td><code>20</code></td>
    </tr>
    <tr>
      <td><code>%</code></td>
      <td>余りを求める</td>
      <td><code>10 % 3</code></td>
      <td><code>1</code></td>
    </tr>
  </tbody>
</table>

<p>計算の順番を変えたいときは、優先したい部分を <code>( )</code> で囲います。</p>

<table>
  <thead>
    <tr>
      <th>式</th>
      <th>結果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>1 + 2 * 5</code></td>
      <td>11</td>
    </tr>
    <tr>
      <td><code>(1 + 2) * 5</code></td>
      <td>15</td>
    </tr>
  </tbody>
</table>

<p>また <code>alert</code> の他にも <code>confirm</code>（OK／キャンセル）や <code>prompt</code>（入力を受け取る）があります。余裕があれば試してみてください。ただしダイアログはユーザーの操作を妨げてしまうため、必要最小限の使用に留めましょう。</p>
</div></section><section id="chapter-4"><h2 class="index">4. JavaScriptを手軽に試す
</h2><div class="subsection"><p>基本的にJavaScriptのコードは、HTMLファイルに読み込まれて実行されます。<br>
前のチャプターでは、<em>index.html</em>から<em>main.js</em>を読み込んで、ダイアログを表示するコードを実行しました。</p>

<p>しかし手軽にJavaScriptのコードを試したいときは、わざわざHTMLファイルなどを用意してコードを読み込ませるのは面倒です。<br>
そんなときは、Chromeの「デベロッパーツール」という機能を使いましょう。</p>

<p>デベロッパーツールというのは、プログラミングするのを助けてくれる機能です。手軽にJavaScriptのコードを試すことができます。</p>

<p>それだけでなく、デベロッパーツールには他にもたくさんの便利な機能がついています。たとえば、コードにエラーがあれば教えてくれます。</p>

<div class="alert alert-info">
以降の内容では、デベロッパーツールを利用した解説を行います。<strong>解説内でデベロッパーツールを利用している場合は、ご自身でもデベロッパーツールを使って、テキストの解説と同じになるかをご確認ください。</strong>なお、デベロッパーツールの使い方を身に付けたという前提で今後のプログラミング学習が進んでいきますので、反復練習して使い方を覚えましょう。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 デベロッパーツールの使い方
</h3><h4>GoogleのWebページで使う</h4>

<p>デベロッパーツールは、Webページならどこでも使えます。<br>
ためしに、<a href="https://www.google.co.jp" target="_blank">Google</a>のWebページで使ってみましょう。</p>

<p>まず、Googleにアクセスします。<br>
https://www.google.co.jp/</p>

<p>アクセスしたら、Chromeの画面右上にある「・」が縦に３つ並んだメニューをクリックします。<br>
メニューが開いたら、「その他のツール」の中にある「デベロッパーツール」（通称DevTools）をクリックしてみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-devtools-menu.png" alt="メニューからデベロッパーツールを開く"></p>

<p>デベロッパーツールが開いたら、Consoleタブをクリックします。以下の画像の、赤い四角で囲んだ部分です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-devtools-console.png" alt="コンソール"></p>

<p>このConsoleタブをクリックすると表示されるのが、JavaScriptの<strong>コンソール</strong>です。WindowsではCtrlとShiftキーを押しながらJ、MacではCommandとOptionキーを押しながらJ、を押すとコンソールを一発で開けます。再び同じキーを押すとコンソールが閉じます。</p>

<p>一番下の「&gt;」という行に<code>1+2</code>と入力してEnterを押してみましょう。Enterを押すことで、入力したコードを実行できます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="integer">1</span>+<span class="integer">2</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-devtools-console-addition.png" alt="コンソールで足し算"></p>

<p>「3」と表示されました。ここはJavaScriptを手軽に実行できる環境になっていて、すぐに結果を確認できます。</p>

<div class="alert alert-warning">
コンソールに複数回プログラムを入力・実行していると、以前に実行したプログラムの影響でうまく動作しないことがあります。そのためコンソールにプログラムを入力・実行するときは、事前にWebページを再読み込みするようにしましょう。WindowsではF5キー、MacではCommandとRキーを押すことで再読み込みできます。
</div>

<h4>Cloud9で使う</h4>

<p>次に、Cloud9でデベロッパーツールを使ってみましょう。</p>

<p>まず、HTMLファイルをプレビューします。前のチャプターの<a href="javascript#chapter-3-2">alertでダイアログを表示</a><br>
で作成したindex.htmlを、新しいタブでプレビュー表示してください。新しいタブで開かなくてもデベロッパーツールを使えますが、新しいタブで開いた方が見やすいです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/orientation/cloud9_workspace_html5_05.png" alt="ワークスペースの作成3"></p>

<p>プレビューを開くと、ダイアログに「333」と表示されます。これはmain.jsに、以下のコードを書いたからです。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>alert(<span class="integer">111</span> + <span class="integer">222</span>);
</pre></div>
</div>
</div>

<p>この <code>alert(111 + 222);</code> をコンソールにも入力し、Enterを押して実行してみましょう。するとやはりダイアログに「333」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-alert-addition.png" alt="alertダイアログに足し算が表示される"></p>

<p>次に、コンソールに文字を表示してみましょう。今度はコンソールに<code>console.log('こんにちは！');</code>と入力して実行します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-devtools-console-log.png" alt="コンソールでconsole.log()"></p>

<p>今度はコンソールに「こんにちは！」と表示されました。<code>console.log(...)</code>は、()内の値をコンソールに表示する命令です。</p>

<div class="alert alert-info">
<i>main.js</i> に <code>console.log('こんにちは！');</code>と書いてプレビューで表示しても、デベロッパーツールが正しく開いていれば、デベロッパーツールのコンソールに「こんにちは！」と表示されます。確認してみましょう。
</div>

<p>つまり<code>alert(...)</code>を使うと、()内の値が<strong>Webページ</strong>のダイアログに表示されます。<br>
一方で<code>console.log(...)</code>を使うと、()内の値がデベロッパーツールの<strong>コンソール</strong>に表示されるというわけです。</p>

<p>今はまだconsole.logが、何の役に立つのかよく分からない方もいらっしゃるでしょう。しかし今後、console.logがとても重要になってきます。必ず<strong>自分の手でタイピングして</strong>、コンソールの表示を確認しましょう。</p>

<p>なお「こんにちは！」の以下の行には、「undefined」と表示されていますね。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-devtools-console-log-undefined.png" alt="コンソールでconsole.log(), undefinedの表示について"></p>

<p>この「undefined」という表示については、今は気にしないでください。チャプター8の <a href="javascript#chapter-8">undefinedとなる場合</a> で詳しく説明します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 変数
</h3><p>プログラムを書くときには、さまざまなデータをさまざまなところで使います。</p>

<p>ときには長い文字列や、同じ数値・計算式を何度も繰り返し使うこともあります。とはいえ、そのつど同じデータを書き込むのは面倒です。そんなときに役立つのが変数です。</p>

<p>変数とは、<strong>さまざまな文字列や数値を入れておく箱</strong> とイメージしていただくとわかりやすいでしょう。</p>

<p>その箱に便宜上の名前（変数名）をつけ、中身のデータの代わりに変数名を書き入れて使い回すことで、同様の処理が簡単に行えるようになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-variables.png" alt="変数に文字列や数値を入れて使い回す"></p>

<h4>変数の書き方</h4>

<p>JavaScriptでは、変数は以下のように書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>let <span class="error">変</span><span class="error">数</span><span class="error">名</span> = <span class="error">数</span><span class="error">値</span><span class="error">、</span><span class="error">文</span><span class="error">字</span><span class="error">列</span><span class="error">な</span><span class="error">ど</span>;
</pre></div>
</div>
</div>

<p>または</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="error">変</span><span class="error">数</span><span class="error">名</span> = <span class="error">数</span><span class="error">値</span><span class="error">、</span><span class="error">文</span><span class="error">字</span><span class="error">列</span><span class="error">な</span><span class="error">ど</span>;
</pre></div>
</div>
</div>

<p>最初に <code>let</code> または <code>const</code> と書くことで、変数（値を入れる箱）を新たに作ることができます。（他に <code>var</code> と書くことでも変数を作れますが、テキストでは扱いません。）</p>

<p>変数の中に入れるのは、<code>=</code> の右側にある値です。<code>=</code> は代入演算子といって、右側の数値や文字列データを左側の変数に入れます。これを「代入する」と言います。算数や数学とちがって、<strong>イコール（左側と右側の値が等しい）という意味ではありません。</strong></p>

<p>代入した数値や文字列データのことを、変数の「値」と言います。</p>

<p>以下、 <code>let</code> と <code>const</code> それぞれの変数について解説します。まずは <code>let</code> についてです。</p>

<h4>let</h4>

<p>今回から、複数行のコードをコンソールで実行していきます。複数行のコードをコンソールで実行する場合、まずCloud9にJSファイルを作成するのが良いでしょう。作成したJSファイルにコードを書き、コンソールにコピー＆ペーストしてEnterを押してください。</p>

<p>コンソールに直接、複数行を入力することもできます。もし複数行をコンソールに直接入力したい場合には、改行したい所で<kbd>Shift</kbd> + <kbd>Enter</kbd>を押します。しかし、間違えたときは最初から入力し直さないといけません。そのため複数行のコードはファイルに入力してから、コンソールにコピー＆ペーストするのがおすすめです。</p>

<p>JSファイルが用意できたら以下のように入力し、コンソールにコピー＆ペーストして実行してみましょう。コンソールを表示するWebページは、どこでも構いません。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>let name = <span class="string"><span class="delimiter">'</span><span class="content">太郎さん</span><span class="delimiter">'</span></span>;
console.log(name);
console.log(name);
</pre></div>
</div>
</div>

<p>実行するとコンソールに「太郎さん」と２回表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-log-variable.png" alt="コンソールで変数を表示する"></p>

<p>このコードではまず <code>let name = '太郎さん';</code> で、<code>name</code> という変数に「’太郎さん’」という文字列を代入しています。</p>

<p>したがって <code>console.log(name);</code> のname変数の値も「’太郎さん’」という文字列になります。つまり <code>console.log(name);</code> は、「コンソールに『太郎さん』という文字列を表示する」という意味になります。</p>

<h4>letは値を再代入できる</h4>

<p><code>let</code> で定義した変数の値は、後から置き換えることができます。変数の値を置き換えて変更することを、再代入と言います。再代入するには、以下のように書きます。再代入するときは、変数名の前に <code>let</code> を書きません。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="error">変</span><span class="error">数</span><span class="error">名</span> = <span class="error">数</span><span class="error">値</span><span class="error">、</span><span class="error">文</span><span class="error">字</span><span class="error">列</span><span class="error">な</span><span class="error">ど</span>;
</pre></div>
</div>
</div>

<p>先ほどのコードを、以下のように書き換えてみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>let name = <span class="string"><span class="delimiter">'</span><span class="content">太郎さん</span><span class="delimiter">'</span></span>;
console.log(name);

name = <span class="string"><span class="delimiter">'</span><span class="content">花子さん</span><span class="delimiter">'</span></span>;
console.log(name);
</pre></div>
</div>
</div>

<p>実行すると最初の <code>console.log(name);</code> により、コンソールに「太郎さん」と表示されます。そして次の <code>console.log(name);</code> により、「花子さん」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-log-reassigning.png" alt="変数に値を再代入する"></p>

<p><code>name = '花子さん';</code>というコードで、name変数に新たな文字列を再代入しています。</p>

<h4>const</h4>

<p>次に <code>const</code> についてです。</p>

<p><code>let</code> で定義した変数の値は’再代入して置き換えることができます。それに対して <code>const</code> の場合は、再代入ができません。</p>

<p><code>const</code> で変数を定義するには、以下のように書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="error">変</span><span class="error">数</span><span class="error">名</span> = <span class="error">数</span><span class="error">値</span><span class="error">、</span><span class="error">文</span><span class="error">字</span><span class="error">列</span><span class="error">な</span><span class="error">ど</span>;
</pre></div>
</div>
</div>

<p>最初に <code>const</code> と書くことで、変数（値を入れる箱）を新たに作れます。</p>

<p>以下のコードを、コンソールで実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">太郎さん</span><span class="delimiter">'</span></span>;
console.log(name);
console.log(name);
</pre></div>
</div>
</div>

<p>letで定義した変数のときと同じく、「太郎さん」と２回表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-log-const.png" alt="変数の値を表示する"></p>

<h4>constは再代入できない</h4>

<p>先ほどのコードを、以下のように書き換えてみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">太郎さん</span><span class="delimiter">'</span></span>;
console.log(name);

name = <span class="string"><span class="delimiter">'</span><span class="content">花子さん</span><span class="delimiter">'</span></span>;
console.log(name);
</pre></div>
</div>
</div>

<p>実行すると最初の<code>console.log(name);</code>により、コンソールに「太郎さん」と表示されます。ここまでは、<code>let</code> のときと同じです。しかし以下の<code>name = '花子さん';</code>というコードは、エラーになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-log-try-reassigning.png" alt="constで定義した変数に値の再代入を試みる"></p>

<p>エラーになる原因は、constで定義した変数に <code>'花子さん'</code> という文字列を再代入しようとしているためです。エラーが起きると、それ以降のコードは実行されません。そのため２回目の <code>console.log(name);</code> は実行されないのです。</p>

<h4>constの良いところ</h4>

<p>constで定義した変数は、letで定義した変数のように後から再代入されることがありません。そのため変数の定義に <code>const</code> を使うことには、<code>let</code> と比べて以下のような利点があります。コードの量が増えるほど、この利点は大きくなります。</p>

<ul>
  <li>コードを書くとき、うっかり別の値を再代入してしまう間違いが防げる</li>
  <li>コードを読むとき、値が再代入される可能性を考えなくて良い</li>
</ul>

<p>そのため基本的に、本カリキュラムでは <code>const</code> を使います。後から値を再代入する必要があるときだけ、 <code>let</code> を使います。</p>

<h4>識別子の命名ルール</h4>

<p>変数に名前を付けるには、いくつかルール（規則）があります。このルールは、<code>let</code> と <code>const</code> のどちらを使う場合でも同じです。また変数だけでなく、このあと説明する関数に名前を付けるときも、このルールを守らないといけません。変数や関数などに付けられた名前のことを <strong>識別子</strong> と言います。</p>

<p>識別子の命名ルールはいくつかありますが、なかでも重要なのは以下の３つです。</p>

<p><strong>① 使うのは半角のアルファベット、(_)アンダーバー、$（ダラー）、数字</strong><br>
例： <code>name</code>, <code>first_name</code>, <code>$name</code>, <code>name1</code><br>
（※日本語のように全角の文字も使えますが、一般的には使いません。）</p>

<p><strong>② 最初に数字は使えない</strong><br>
<code>name1</code> などは良いですが、<code>1name</code>などはダメです。ただし、最初に(_)アンダーバーや$（ダラー）を使うことはできます。たとえば、<code>_name</code>や<code>$name</code>などはOKです。</p>

<p><strong>③ 予約語と同じ名前は付けられない</strong><br>
下記のキーワードを、予約語と言います。予約語というのは、すでに他の目的で使われていたり、将来的に使うことが予定されている言葉です。そのため変数の名前や、この後に出てくる関数の名前などに使うことができません。<br>
ただし、他の文字も含めれば使うことができます。たとえば <code>break</code> は予約語なので、変数に同じ名前を付けることはできません。しかし他の文字をくっつけて、<code>prisonBreak</code> などとすれば識別子として使えます。</p>

<p>await　break　case　catch　class　const　continue　debugger　default　delete　do　else　export　extends　finally　for　function　if　import　in　instanceof　new　return　super　switch　this　throw　try　typeof　var　void　while　with　yield　let　static　implements　package　protected　interface　private　public</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 コメント
</h3><p>コードにコメントとして書いた箇所は、プログラムの実行に影響しません。</p>

<p>コメントは<code>// ...</code>の他に<code>/* ... */</code>という書き方もできます。<code>//</code>はその行にしか使えませんが、<code>/* */</code>を使えば複数行にまたがったコメントを書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// スタイル1: ここに何を書いても構いません</span>

    <span class="comment">/*
    スタイル2:
    複数行にまたがる
    コメントも
    書けます
    */</span>
</pre></div>
</div>
</div>

<p>コメントを記載する目的は、主に2つです。</p>

<ol>
  <li>コードがどんな処理をしているのか、説明する</li>
  <li>コードをコメントにして、処理を無効にする</li>
</ol>

<p>１については、後でコードを読み返したときや、他の人がコードを読んだときに分かりやすくするためです。自分で書いたコードであっても、１ヶ月もすると何のために書いたのか分からなくなることがあります。</p>

<p>2については、処理に不具合があった場合などに使います。不具合があってその原因を調査するために、処理を無効にして検証します。たとえば以下のようにコードをコメントにすると、処理は無効になり実行されません。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// console.log('太郎さん');</span>
</pre></div>
</div>
</div>

<p>このように処理をコメントとして無効にすることを、<strong>コメントアウト</strong> と言います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 文字列
</h3><h4>ダブルクォーテーションとシングルクォーテーション</h4>

<p><code>"..."</code>（ダブルクォーテーション）または <code>'...'</code>（シングルクォーテーション）で囲われたテキストは文字列です。基本的には、どちらを使っても構いません。しかし同じプログラム内では、ダブルクォーテーションとシングルクォーテーションのどちらかを統一して使いましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">Hello World!</span><span class="delimiter">'</span></span>); <span class="comment">//「Hello World!」と表示される</span>
</pre></div>
</div>
</div>

<p><code>"..."</code>の中には<code>'</code>をそのまま書けます。逆に<code>'...'</code>の中には<code>"</code>をそのまま書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">"</span><span class="content">Hello ' World!</span><span class="delimiter">"</span></span>); <span class="comment">//「Hello ' World!」と表示される</span>

console.log(<span class="string"><span class="delimiter">'</span><span class="content">Hello " World!</span><span class="delimiter">'</span></span>); <span class="comment">//「Hello " World!」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-console-single-and-double-quotation.png" alt="コンソールでダブルクォーテーションとシングルクォテーションを含んだ文字列を表示"></p>

<h4>エスケープ</h4>

<p><code>'...'</code> の中に <code>'</code> を文字として入れたい場合は <code>\</code> 記号を直前に付けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">Hello </span><span class="char">\'</span><span class="content"> World!</span><span class="delimiter">'</span></span>); <span class="comment">//「Hello ' World!」と表示される</span>
</pre></div>
</div>
</div>

<p>直前に <code>\</code> を付けて振る舞いを変えることを <strong>エスケープ</strong> と呼びます。</p>

<p>たとえば <code>\n</code> を入れると文字列の途中で改行できます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/*
以下が表示されます:
123
456
789
*/</span>
console.log(<span class="string"><span class="delimiter">"</span><span class="content">123</span><span class="char">\n</span><span class="content">456</span><span class="char">\n</span><span class="content">789</span><span class="delimiter">"</span></span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-console-line-break.png" alt="コンソールで改行した文字列を表示"></p>

<h4>文字列をくっつける</h4>

<p>演算子の<code>+</code> を文字列と一緒に使うと、文字列をくっつける（結合する）ことができます。</p>

<p>以下のコードを、コンソールで実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは、</span><span class="delimiter">'</span></span> + <span class="string"><span class="delimiter">'</span><span class="content">太郎さん</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>コンソールに「こんにちは、太郎さん」と表示されます。</p>

<p>演算子の <code>+</code> は、これまでにも足し算をするために使いました。<code>+</code> の左側と右側が数値のときは、足し算になります。そして <code>+</code> の <strong>左右どちらかが文字列</strong> のときは、左側と右側の両方を文字列として、くっつける働きをします。</p>

<p>たとえば、以下のコードをコンソールで実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">111</span><span class="delimiter">'</span></span> + <span class="integer">222</span>);
</pre></div>
</div>
</div>

<p>コンソールに、「111222」と表示されますね。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-combine-string.png" alt="コンソールで結合した文字列を表示"></p>

<h4>文字列を変数に代入する</h4>

<p>今度は先ほど説明した、変数を使った例です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>;

const hello = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは、</span><span class="delimiter">'</span></span> + name + <span class="string"><span class="delimiter">'</span><span class="content">さん</span><span class="delimiter">'</span></span>;
console.log(hello);

const goodEvening = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは、</span><span class="delimiter">'</span></span> + name + <span class="string"><span class="delimiter">'</span><span class="content">さん</span><span class="delimiter">'</span></span>;
console.log(goodEvening);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-combine-string-with-constiable.png" alt="コンソールで変数と結合した文字列を表示"></p>

<p><code>const hello = 'こんにちは、' + name + 'さん';</code> のname変数の値には <code>'太郎'</code> という文字列が入っています。<br>
そのため <code>'こんにちは、' + name + 'さん'</code>は、<code>'こんにちは、' + '太郎' + 'さん'</code> となります。</p>

<p><code>+</code> の左右どちらかが文字列のときは、左側と右側を文字列として、くっつける（結合する）働きをするのでした。<br>
したがって <code>+</code> の左側と右側がそれぞれくっついて、<code>'こんにちは、太郎さん'</code> となります。</p>

<p>結果として <code>hello</code> という変数には、<code>'こんにちは、太郎さん'</code> という文字列が入ります。</p>

<p>そのため以下の行の <code>console.log(hello);</code> は、「コンソールに『こんにちは、太郎さん』という文字列を表示する」という意味になります。</p>

<p>最後の2行についても、同様です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const goodEvening = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは、</span><span class="delimiter">'</span></span> + name  + <span class="string"><span class="delimiter">'</span><span class="content">さん</span><span class="delimiter">'</span></span>;
console.log(goodEvening);
</pre></div>
</div>
</div>

<p><code>+</code> の左側と右側がそれぞれくっついて、コンソールに『こんばんは、太郎さん』という文字列が表示されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-5">4.5 テンプレート文字列
</h3><p>ES6から、文字列の新しい表現方法が追加されました。「テンプレート文字列」と言います。`` (バッククォート、またはバックティック)でテキストを囲みます。</p>

<p>テンプレート文字列では、改行をそのまま表現できます。複数行の文字列を以下のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const numbers = <span class="error">`</span><span class="integer">123</span>
<span class="integer">456</span>
<span class="integer">789</span><span class="error">`</span>;
console.log(numbers);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-template-strings-multi-line.png" alt="コンソールで改行した文字列を表示"></p>

<p>またテンプレート文字列には、変数などを埋め込めます。</p>

<p>たとえば、以下のコードをコンソールで実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>;
const hello = <span class="error">`</span><span class="error">こ</span><span class="error">ん</span><span class="error">に</span><span class="error">ち</span><span class="error">は</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;

console.log(hello);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-template-strings-embed-expressions.png" alt="コンソールで変数を埋め込んだ文字列を表示"></p>

<p><code>${...}</code> で囲んだ中に、name変数を埋め込んでいます。結果として <code>hello</code> という変数には、<code>'こんにちは、太郎さん'</code> という文字列が入ります。</p>

<p><code>'...'</code>（シングルクォーテーション）などで文字列と変数をくっつける場合に比べて、上記のコードではテンプレート文字列の方が短く書けました。</p>

<p>テキストではこれ以降、文字列や変数をくっつける場合はテンプレート文字列を使います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-6">4.6 関数
</h3><p>関数とは、<strong>処理に名前をつけてまとめたもの</strong> です。</p>

<p>関数には大きく2つあります。</p>

<ul>
  <li>JavaScriptにデフォルトで用意されている関数</li>
  <li>自作の関数</li>
</ul>

<p>関数を自作する理由には、以下の2点があります。</p>

<ul>
  <li>まとまった処理に対して名前をつけてコードを読みやすくする</li>
  <li>何度も使うような処理をまとめて、使い回す</li>
</ul>

<p>関数としてまとめておき、複数箇所でその関数を呼び出すことが多いです。このとき何か処理に修正が入ったとしても、関数内部のみを修正すれば良くなります。</p>

<h4>関数：基本のかたち</h4>

<p>関数を定義するときにまず基本となるのが、function（関数の意）です。それに続けて関数につける名前を書き、{  }のなかに処理を書きます。関数名は、変数と同じく識別子です。そのため名前をつける際は、<a href="javascript#chapter-4-2">4.2 変数</a>で説明した「識別子の命名ルール」を守ってください。</p>

<p>一番シンプルに書くと以下のようになります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="error">関</span><span class="error">数</span><span class="error">名</span>() {
<span class="error">　</span><span class="error">　</span><span class="error">処</span><span class="error">理</span>
}
</pre></div>
</div>
</div>

<p>関数内部の処理を実行するには、以下のように書きます。これを「関数を呼び出す」、あるいは「関数を実行する」と言います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre> <span class="error">関</span><span class="error">数</span><span class="error">名</span>();
</pre></div>
</div>
</div>

<p>たとえば以下のコードを、コンソールで実行してみましょう。なおコメントは、入力しなくても構いません。以降も同様です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">helloConsole</span>() { <span class="comment">// 関数を定義する</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
}

helloConsole(); <span class="comment">// 関数を呼び出す</span>
</pre></div>
</div>
</div>

<p>コンソールに「こんにちは！」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-1.png" alt="コンソールで関数を実行"></p>

<p>今度は、以下のコードを実行してみましょう。<br>
同じ関数を２回、呼び出しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">helloConsole</span>() { <span class="comment">// 関数を定義する</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
}

helloConsole(); <span class="comment">// 関数を呼び出す</span>
helloConsole(); <span class="comment">// 関数を呼び出す</span>
</pre></div>
</div>
</div>

<p>２回続けて、コンソールに「こんにちは！」と表示されます。２回続けて、関数を呼び出したからですね。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-2.png" alt="コンソールで関数を実行"></p>

<p><code>console.log('こんにちは！');</code> のようにたった1行のコードを関数内で実行する場合には、関数を使う意味があまり感じられません。<br>
しかし複数行のコードを繰り返し実行する場合には、関数を使うと便利です。<br>
なぜなら繰り返し実行する場合でも <code>関数名()</code> で呼び出すだけで、関数内に書いたコードを繰り返し実行できるからです。</p>

<h4>関数：引数や返り値を指定する</h4>

<p>関数には、値を受け取って処理結果を返す、入力と出力の仕組みがあります。入力を <strong>引数（ひきすう）</strong>、出力を <strong>戻り値（または返り値）</strong> と言います。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-function.png" alt="引数を受け取って戻り値を出力する"></p>

<p>関数に対して引数を渡したい場合、<code>(  )</code>のなかに引数名を入れていきます。引数は幾つ入れてもよく、必要な分だけ「<code>,</code>」で区切って入れます。これによって、同じ処理をするにしても、渡した引数に応じて処理をする内容を少しずつ変えることができるようになります。</p>

<p>また、この関数を処理した結果を呼び出し元で取得したい場合は、<strong>return</strong> というキーワードを使います。returnの後に、関数のなかで処理した値を書きます。この値のことを、<strong>戻り値</strong> と言います。戻り値は関数の呼び出し元に渡って、関数の処理結果を呼び出し元から使えるようになります。</p>

<p>引数や戻り値を指定した関数のイメージとして、食器洗い機を想像してみてください。食器洗い機に入れる「汚れた食器」が引数で、出てくる「キレイな食器」が戻り値というイメージです。</p>

<p>あるいは、自動販売機をイメージしてみてください。自動販売機はお金を入れてボタンを押すと、飲み物が出てきますね。この「入れたお金と、押したボタン」が引数で、出てくる「飲み物」が戻り値というイメージです。</p>

<p>つまり関数に何かを入れると、別の何かが出てくるイメージです。</p>

<p>書式は以下の通りです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="error">関</span><span class="error">数</span><span class="error">名</span>(<span class="error">第</span><span class="integer">1</span><span class="error">引</span><span class="error">数</span>, <span class="error">第</span><span class="integer">2</span><span class="error">引</span><span class="error">数</span>, ...) {
  <span class="error">処</span><span class="error">理</span>
  <span class="keyword">return</span> <span class="error">戻</span><span class="error">り</span><span class="error">値</span>;
}
</pre></div>
</div>
</div>

<p>引数と一緒に関数内部の処理を実行するには、以下のように関数を呼び出します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre> <span class="error">関</span><span class="error">数</span><span class="error">名</span>(<span class="error">第</span><span class="integer">1</span><span class="error">引</span><span class="error">数</span>, <span class="error">第</span><span class="integer">2</span><span class="error">引</span><span class="error">数</span>, ...);
</pre></div>
</div>
</div>

<p>ただし、先ほど <code>helloConsole</code> という関数で確認したように、引数と戻り値はなくても問題ありません。必要な場合だけ、指定すれば良いのです。また、引数と戻り値のどちらかだけを使うこともできます。</p>

<h4>引数を受け取る関数</h4>

<p>まずは、引数だけを使ってみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">helloConsole</span>(name) { <span class="comment">// 関数を定義する</span>
  console.log(<span class="error">`</span><span class="error">こ</span><span class="error">ん</span><span class="error">に</span><span class="error">ち</span><span class="error">は</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">！</span><span class="error">`</span>);
}

helloConsole(<span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>); <span class="comment">// 関数を呼び出す</span>
</pre></div>
</div>
</div>

<p>helloConsole関数に、<code>'太郎'</code> という文字列を引数として渡して呼び出しています。この <code>'太郎'</code> が、関数を作ったときの引数nameの値になります。引数は関数内で、変数として使えます。結果としてコンソールに「こんにちは、太郎さん！」と表示されます。<code>console.log()</code> の引数として渡している `<code>こんにちは、${name}さん！</code>` は、先ほど学習したテンプレート文字列です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-3.png" alt="コンソールで関数を実行"></p>

<p>関数を定義するときの引数と、呼び出すときの引数は、どちらも <strong>引数</strong> と言うのが一般的です。しかしこの２つを区別するために、 関数を定義するときの引数を <strong>仮引数</strong>、呼び出すときの引数を <strong>実引数</strong> と言うこともあります。</p>

<p><code>helloConsole('太郎');</code> の場合、実引数として <code>'太郎'</code> という文字列を渡しています。この <code>'太郎'</code> という文字列が、<code>function helloConsole(name) {...</code> における仮引数nameの値になります。<br>
そのため <code>console.log(</code>`<code>こんにちは、${name}さん！</code>`<code>);</code> の <code>name</code> という変数の値も、<code>'太郎'</code> という文字列になります。</p>

<p>繰り返しになりますが、引数は関数内で変数として使えます。仮引数はこの変数の名前、実引数はこの変数の値となるわけです。</p>

<h4>戻り値を返す関数</h4>

<p>次に、実行すると文字列や数値などを <strong>戻り値</strong> として返す関数をつくりましょう。例として、水道を関数だと考えてみます。蛇口を開けることが <strong>関数の呼び出し</strong> で、出てくる水を <strong>関数の戻り値</strong> とします。</p>

<p>以下のコードをコンソールで実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">suido</span>() { <span class="comment">// 関数を定義する</span>
  <span class="keyword">return</span> <span class="string"><span class="delimiter">'</span><span class="content">水</span><span class="delimiter">'</span></span>; <span class="comment">// 戻り値を返す（水が出てくる）</span>
}

suido(); <span class="comment">// 関数を呼び出す（蛇口を開ける）</span>
</pre></div>
</div>
</div>

<p>コンソールに「”水”」という文字列が表示されます。これは関数の戻り値です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-4.png" alt="コンソールで関数を実行"></p>

<p>関数の戻り値は、変数などの値として代入できます。先ほどの <code>suido</code> という関数の戻り値を、<code>cup</code>（コップ）という変数に代入してみましょう。そしてその変数の値を、コンソールに表示します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">suido</span>() { <span class="comment">// 関数を定義する</span>
  <span class="keyword">return</span> <span class="string"><span class="delimiter">'</span><span class="content">水</span><span class="delimiter">'</span></span>; <span class="comment">// 戻り値を返す（水が出てくる）</span>
}

const cup = suido(); <span class="comment">// 関数を呼び出す（蛇口を開ける）して、cup変数に代入する</span>

console.log(cup); <span class="comment">// 変数の値をコンソールに表示する</span>
console.log(cup); <span class="comment">// 変数の値をコンソールに表示する</span>
</pre></div>
</div>
</div>

<p>コンソールには、「水」という文字列が２回続けて表示されます。これは <code>console.log(cup);</code> を２回続けて実行しているからですね。このように関数の戻り値を変数に代入することで、戻り値を何度も使い回すことができます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-5.png" alt="コンソールで関数を実行"></p>

<h4>引数を受け取り、戻り値を返す関数</h4>

<p>次に、引数と戻り値の両方を使った例を見てみましょう。正方形の面積を求める関数です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">findSquareArea</span>(length) { <span class="comment">// 関数を定義する</span>
  <span class="keyword">return</span> length * length; <span class="comment">// 引数を２乗した値を、戻り値として返す</span>
}

const result = findSquareArea(<span class="integer">5</span>); <span class="comment">// 戻り値をresult変数に代入する</span>
console.log(result); <span class="comment">// result変数の値を、コンソールに表示する</span>
</pre></div>
</div>
</div>

<p>実引数に <code>5</code> という数値を渡して関数を呼び出しています。これにより、仮引数である <code>length</code> の値に <code>5</code> という数値が入ります。そして仮引数 <code>length</code> の値を2乗して、<code>area</code> という変数に代入しています。このarea変数を、戻り値として返しています。結果としてコンソールには、「25」という数値が表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-6.png" alt="コンソールで関数を実行"></p>

<p>上記の関数は、以下のように書くこともできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">findSquareArea</span>(length) { <span class="comment">// 関数を定義する</span>
  const area = length * length; <span class="comment">// 引数を２乗した値を、area変数に代入する</span>
  <span class="keyword">return</span> area; <span class="comment">//area変数の値を、戻り値として返す</span>
}

const result = findSquareArea(<span class="integer">5</span>); <span class="comment">// 戻り値をresult変数に代入する</span>
console.log(result); <span class="comment">// result変数の値を、コンソールに表示する</span>
</pre></div>
</div>
</div>
<p><code>length * length</code> で計算した値を、一旦 <code>area</code> という変数に代入しています。そしてarea変数を、戻り値として返しています。一旦変数に代入することで、<code>length * length</code> という計算処理が何を意味しているのか、分かりやすくなります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-7.png" alt="コンソールで関数を実行"></p>

<p>次は、引数を２つ使った例です。2つの値を足し算する関数です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">add</span>(x, y) { <span class="comment">// 関数を定義する</span>
  const sum = x + y; <span class="comment">// 引数を足し算した値を、sum変数に代入する</span>
  <span class="keyword">return</span> sum; <span class="comment">// area変数の値を、戻り値として返す</span>
}

const result = add(<span class="integer">2</span>, <span class="integer">3</span>); <span class="comment">// 戻り値をresult変数に代入する</span>
console.log(result); <span class="comment">// result変数の値を、コンソールに表示する</span>
</pre></div>
</div>
</div>

<p>実引数に <code>2</code> と <code>3</code> という数値を渡して、関数を呼び出しています。これにより、仮引数 <code>x</code> の値には <code>2</code> という数値が入ります。仮引数 <code>y</code> の値には、<code>3</code> という数値が入ります。そして仮引数 <code>x</code> と <code>y</code> の値を足し算して、<code>sum</code> という変数に代入しています。このsum変数を、戻り値として返しています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-8.png" alt="コンソールで関数を実行"></p>

<h4>無名関数</h4>

<p>関数は以下のように定義して、変数に代入することもできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="error">変</span><span class="error">数</span><span class="error">名</span> = <span class="keyword">function</span> (<span class="error">第</span><span class="integer">1</span><span class="error">引</span><span class="error">数</span>, <span class="error">第</span><span class="integer">2</span><span class="error">引</span><span class="error">数</span>, ...) {
  <span class="error">処</span><span class="error">理</span>
  <span class="keyword">return</span> <span class="error">戻</span><span class="error">り</span><span class="error">値</span>;
}
</pre></div>
</div>
</div>

<p>このように定義した関数を、「無名関数」あるいは「匿名関数」と言います。無名関数（匿名関数）は変数の値や、別の関数の引数などとして使います。上記は、<code>=</code> の右側（右辺）で定義した無名関数を、<code>=</code> の左側（左辺）の変数に代入する例です。</p>

<p>たとえば、先ほど以下のコードを書きました。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">function</span> <span class="function">add</span>(x, y) { <span class="comment">// 関数を定義する</span>
  const sum = x + y; <span class="comment">// 引数を足し算した値を、sum変数に代入する</span>
  <span class="keyword">return</span> sum; <span class="comment">// area変数の値を、戻り値として返す</span>
}

const result = add(<span class="integer">2</span>, <span class="integer">3</span>); <span class="comment">// 戻り値をresult変数に代入する</span>
console.log(result); <span class="comment">// result変数の値を、コンソールに表示する</span>
</pre></div>
</div>
</div>

<p>上記のコードは、無名関数を使って以下のように書き換えることができます。定義した無名関数を変数に代入して、呼び出しています。(この例では分かりませんが、厳密には少し違いがあります。)</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="function">add</span> = <span class="keyword">function</span> (x, y) { <span class="comment">// 無名関数を定義して、変数に代入する</span>
  const sum = x + y;
  <span class="keyword">return</span> sum;
}

const result = add(<span class="integer">2</span>, <span class="integer">3</span>);
console.log(result);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-9.png" alt="コンソールで関数を実行"></p>

<p>無名関数はこのように変数の値として代入したり、別の関数の引数として渡すのが一般的です。</p>

<h4>参考サイト</h4>

<p>テックアカデミーマガジンでは、関数について動画でも解説しています。「テキストだけではよく分からない」という方や、「より深く理解したい」という方は、ぜひご覧ください。<br>
<a href="https://techacademy.jp/magazine/5510" target="_blank">JavaScriptで関数を使う方法【初心者向け】</a></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-7">4.7 アロー関数
</h3><p>先ほど説明した無名関数は、以下のように書き換えることができます。(この例では分かりませんが、厳密には少し違いがあります。)</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const add = (x, y) =&gt; { <span class="comment">// アロー関数を定義して、変数に代入する</span>
  const sum = x + y;
  <span class="keyword">return</span> sum;
};

const result = add(<span class="integer">2</span>, <span class="integer">3</span>);
console.log(result);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-10.png" alt="コンソールで関数を実行"></p>

<p>上記でadd変数に代入している関数を、<strong>アロー関数</strong> と言います。アロー関数の基本的な書式は、以下の通りです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>(<span class="error">第</span><span class="integer">1</span><span class="error">引</span><span class="error">数</span>, <span class="error">第</span><span class="integer">2</span><span class="error">引</span><span class="error">数</span>, ...) =&gt; {
  <span class="error">処</span><span class="error">理</span>
  <span class="keyword">return</span> <span class="error">戻</span><span class="error">り</span><span class="error">値</span>;
}
</pre></div>
</div>
</div>

<p><code>{...}</code>（ブロック）で囲まれたアロー関数本体の処理が一文だけで、戻り値を返すだけの場合、 <code>{}</code>（中括弧）を省略できます。<code>{}</code>を省略した場合、<code>return</code> も不要です。処理の実行結果が、そのまま戻り値となります。</p>

<p>たとえば先ほどの例は、以下のように書き換えることができます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const add = (x, y) =&gt; x + y;

const result = add(<span class="integer">2</span>, <span class="integer">3</span>);
console.log(result);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-11.png" alt="コンソールで関数を実行"></p>

<p>また引数が１つだけの場合、仮引数を囲む <code>()</code>を省略することもできます。</p>

<p>たとえば、以下のコードでdouble変数に代入しているのもアロー関数です。引数の値を２倍にして返します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="reserved">double</span> = x =&gt; x * <span class="integer">2</span>;

const result = <span class="reserved">double</span>(<span class="integer">5</span>);
console.log(result);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-function-12.png" alt="コンソールで関数を実行"></p>

<p>テキストではこれ以降、関数の定義（作成）にはアロー関数を使います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-8">4.8 配列とループ
</h3><p>同じような値を一列に並べたものを <strong>配列</strong> と言います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 配列を作成</span>
const numbers = [<span class="integer">1</span>, <span class="integer">2</span>, <span class="integer">3</span>, <span class="integer">4</span>, <span class="integer">5</span>, <span class="integer">7</span>, <span class="integer">10</span>];

<span class="comment">// 最初の要素を表示</span>
console.log(numbers[<span class="integer">0</span>]);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-array-1.png" alt="コンソールで配列の要素を表示"></p>

<p>配列の中身1つひとつを <strong>要素</strong> と呼びます。配列は <code>[ 要素1, 要素2, ... ]</code> と書きます。上記の例では要素として、<code>1</code> や <code>2</code> などの数値を入れています。</p>

<p>個別の要素にアクセスするには <code>配列名[要素のインデックス]</code> と書きます。<strong>インデックスは <code>0</code> から始まり</strong>、最初の要素はインデックス0、2番目の要素はインデックス1、…となります。</p>

<p>配列はループと組み合わせたときに効果を発揮します。コンソールで、以下のコードを実行してみてください。配列に要素として、文字列を入れています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 配列を作成</span>
const numbers = [<span class="string"><span class="delimiter">'</span><span class="content">あ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">い</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">う</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">え</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">お</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">か</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">き</span><span class="delimiter">'</span></span>];

<span class="comment">// 各要素を表示</span>
<span class="keyword">for</span> (let i = <span class="integer">0</span>; i &lt; numbers.length; i++) {
  console.log(numbers[i]);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-for-1.png" alt="コンソールでfor文"></p>

<p>配列内の要素が、順番に表示されました。</p>

<p><code>for</code> は繰り返し処理の命令です。以下のように書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">for</span> (<span class="error">初</span><span class="error">回</span><span class="error">だ</span><span class="error">け</span><span class="error">実</span><span class="error">行</span><span class="error">す</span><span class="error">る</span><span class="error">処</span><span class="error">理</span>; <span class="error">ル</span><span class="error">ー</span><span class="error">プ</span><span class="error">継</span><span class="error">続</span><span class="error">条</span><span class="error">件</span>; <span class="error">毎</span><span class="error">ル</span><span class="error">ー</span><span class="error">プ</span><span class="error">後</span><span class="error">の</span><span class="error">処</span><span class="error">理</span>) {
  <span class="error">毎</span><span class="error">ル</span><span class="error">ー</span><span class="error">プ</span><span class="error">ご</span><span class="error">と</span><span class="error">に</span><span class="error">実</span><span class="error">行</span><span class="error">す</span><span class="error">る</span><span class="error">処</span><span class="error">理</span>
}
</pre></div>
</div>
</div>

<p><code>numbers.length</code> は配列の要素数を表します。</p>

<p>上記のコードでは、まず <code>let i = 0;</code> によって変数 <code>i</code> が作成されて、その変数の値が <code>0</code> となります。継続条件に指定されている <code>numbers.length</code> は、配列の要素数を表します。このコードでは要素数が <code>7</code> なので、<code>i &lt; 7</code>となります。そのため <code>i</code> が <code>7</code> より小さい間は <code>{ ... }</code> の内部が繰り返し実行されます。そして毎回のループの後で <code>i++</code> が実行されます。<code>i++</code> は <code>i = i + 1</code> と同じ意味で、<code>i</code> が <code>1</code> 増えます。</p>

<p><code>i</code> は <code>0</code> から始まって1, 2, 3, …と増えていき <code>6</code> までループが繰り返され、<code>7</code> になったところで継続条件を満たさなくなり <code>for</code> ループを抜けます。</p>

<p>ちなみに、<code>++</code> という書き方は <strong>インクリメント</strong> と言います。逆に<code>1</code> 減らしたいときは <code>i--</code> と書くのですが、こちらは <strong>デクリメント</strong> と言います。配列の各要素に対する処理は、上記のように、簡単に書くことができます。</p>

<p>また、数値の合計を求めるのも簡単です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 配列を作成</span>
const numbers = [<span class="integer">1</span>, <span class="integer">2</span>, <span class="integer">3</span>, <span class="integer">4</span>, <span class="integer">5</span>, <span class="integer">7</span>, <span class="integer">10</span>];
let total = <span class="integer">0</span>;

<span class="keyword">for</span> (let i = <span class="integer">0</span>; i &lt; numbers.length; i++) {
  total += numbers[i];
}
console.log(<span class="error">`</span><span class="error">合</span><span class="error">計</span>: <span class="predefined">$</span>{total}<span class="error">`</span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-for-2.png" alt="コンソールでfor文"></p>

<p>実行するとコンソールに「合計: 32」と表示されました。</p>

<p><code>total += numbers[i];</code>の <code>+=</code> は左側の値と右側の値を足し合わせて、左側に代入する演算子です。つまり<code>total += numbers[i];</code>は、<code>total = total + numbers[i];</code> と書き換えることもできます。</p>

<p>以下のようにコードに <code>cosole.log</code> を加えると、ループごとの計算過程が分かりやすくなるでしょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 配列を作成</span>
const numbers = [<span class="integer">1</span>, <span class="integer">2</span>, <span class="integer">3</span>, <span class="integer">4</span>, <span class="integer">5</span>, <span class="integer">7</span>, <span class="integer">10</span>];
let total = <span class="integer">0</span>;

<span class="keyword">for</span> (let i = <span class="integer">0</span>; i &lt; numbers.length; i++) {
  console.log(<span class="error">`</span><span class="predefined">$</span>{i + <span class="integer">1</span>}<span class="error">回</span><span class="error">目</span><span class="error">の</span><span class="error">ル</span><span class="error">ー</span><span class="error">プ</span>: <span class="error">小</span><span class="error">計</span> = <span class="predefined">$</span>{total} + <span class="predefined">$</span>{numbers[i]}<span class="error">`</span>);
  total += numbers[i];
}
console.log(<span class="error">`</span><span class="error">合</span><span class="error">計</span>: <span class="predefined">$</span>{total}<span class="error">`</span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-for-3.png" alt="コンソールでfor文"></p>

<p><code>console.log(</code>`<code>${i + 1}回目のループ: 小計 = ${total} + ${numbers[i]}</code>`<code>);</code> を追加しました。<code>${i + 1}</code> 内に含まれる <code>+</code> は演算子です。数値の足し算を行なっています。たとえば最初のループで、<code>i</code> の値は <code>0</code> です。そのため <code>i + 1</code> は <code>0 + 1</code> で、結果として「<code>1</code>」になります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-9">4.9 条件分岐
</h3><h4>if と else</h4>

<p>次に条件分岐を学びます。条件分岐のifを使うと、条件に応じて処理を分岐させることができます。つまり、ある場合はAの処理、別の場合はBの処理を行うといった、場合分けの処理が可能になります。</p>

<p>基本的な書き方は、下記のようになります。</p>

<pre><code>if ( 条件 ) {

   // 条件を満たす場合に実行される処理を、この中に記述する

} else {

   // 条件を満たさない場合に実行される処理を、この中に記述する

}
</code></pre>

<p><code>else</code> は省略可能です。条件を満たさない場合の処理が不要な場合は、<code>else</code> を用意する必要はありません。</p>

<p>また、<code>( 条件 )</code> の括弧の中には <code>true</code> か <code>false</code> の値を返す式を入れます。</p>

<h4>trueとfalse</h4>

<p>JavaScriptには <code>true</code> と <code>false</code> という特別な値があります。日本語ではtrueは真、falseは偽となります。</p>

<p>たとえば以下のコードは「yes」と出力します。<code>10 &gt; 3</code>の比較結果が <code>true</code> なので、ifの条件を満たすからです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">if</span> (<span class="integer">10</span> &gt; <span class="integer">3</span>) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">yes</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">no</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-1.png" alt="コンソールでif文を実行"></p>

<p>比較結果は変数に保存することもできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const result = <span class="integer">10</span> &gt; <span class="integer">3</span>;

<span class="keyword">if</span> (result) { <span class="comment">// resultがtrueの場合に実行される</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">yes</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> { <span class="comment">// resultがfalseの場合に実行される</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">no</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-2.png" alt="コンソールでif文を実行"></p>

<p>結果は「yes」のまま変わりません。<code>10 &gt; 3</code> を <code>10 &lt; 3</code> に変えるとどうなるでしょうか。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const result = <span class="integer">10</span> &lt; <span class="integer">3</span>;

<span class="keyword">if</span> (result) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">yes</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">no</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-3.png" alt="コンソールでif文を実行"></p>

<p>今度は「no」と表示されました。<code>10 &lt; 3</code> の比較結果が <code>false</code> となり、ifの条件を満たさなくなったのでelse内が実行されます。</p>

<p><code>true</code> と <code>false</code> は頭に <code>!</code> を付けると反転できます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const result = <span class="integer">10</span> &lt; <span class="integer">3</span>;

<span class="keyword">if</span> (!result) { <span class="comment">// resultがfalseの場合に実行される</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">yes</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">no</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><code>if (!result)</code>は、result変数が<code>false</code>の場合にifの条件を満たします。yesとnoどちらが出力されるかを予想して、実際に実行して確認してみましょう。</p>

<h4>2つの値を比較する</h4>

<p>2つの値の比較には以下の演算子が使えます。</p>

<table>
  <thead>
    <tr>
      <th>コード</th>
      <th>結果</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>1 == 1</code></td>
      <td>true</td>
      <td>左右が同じ場合はtrue</td>
    </tr>
    <tr>
      <td><code>1 != 1</code></td>
      <td>false</td>
      <td>左右が異なる場合はtrue</td>
    </tr>
    <tr>
      <td><code>5 &gt; 5</code></td>
      <td>false</td>
      <td>左が右より大きい場合はtrue</td>
    </tr>
    <tr>
      <td><code>5 &gt;= 5</code></td>
      <td>true</td>
      <td>左が右と同じかより大きい場合はtrue</td>
    </tr>
    <tr>
      <td><code>3 &lt; 4</code></td>
      <td>true</td>
      <td>左が右より小さい場合はtrue</td>
    </tr>
    <tr>
      <td><code>3 &lt;= 4</code></td>
      <td>true</td>
      <td>左が右と同じかより小さい場合はtrue</td>
    </tr>
  </tbody>
</table>

<p>上に挙げた比較では文字列と数値は区別されませんが、文字列か数値かの種別も含めて一致しているかどうかを確認する比較演算子（<code>===</code>）もあります。通常は <code>===</code> を使いましょう。バグ（プログラムの誤り）が起こりにくくなります。</p>

<table>
  <thead>
    <tr>
      <th>コード</th>
      <th>結果</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>1 == '1'</code></td>
      <td>true</td>
      <td>左右がなんとなく同じ場合はtrue</td>
    </tr>
    <tr>
      <td><code>1 === '1'</code></td>
      <td>false</td>
      <td>左右が値の種類も含めて同じ場合はtrue</td>
    </tr>
    <tr>
      <td><code>1 !== '1'</code></td>
      <td>true</td>
      <td>左右が種類も含めて全く一緒の場合以外はtrue</td>
    </tr>
  </tbody>
</table>

<h4>ANDとOR</h4>

<p>2つの条件をどちらも満たす場合にだけ処理をしたいときはどうしたらよいでしょうか。例えば、num変数が3以上かつ7未満の場合だけ「ok」と表示したい場合を考えてみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const num = <span class="integer">5</span>;

<span class="keyword">if</span> (num &gt;= <span class="integer">3</span>) {
  <span class="keyword">if</span> (num &lt; <span class="integer">7</span>) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>);
  }
}
</pre></div>
</div>
</div>

<p>上記のように <code>if</code> を2つ入れ子にしてもよいのですが、同じことを以下のように、シンプルに書くことができます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const num = <span class="integer">5</span>;

<span class="keyword">if</span> (num &gt;= <span class="integer">3</span> &amp;&amp; num &lt; <span class="integer">7</span>) { <span class="comment">// numが3以上かつ7未満の場合</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-4.png" alt="コンソールでif文を実行"></p>

<p><code>A &amp;&amp; B</code> ではAとBがどちらも <code>true</code> の場合に全体が <code>true</code> となります。このような「AかつB」という条件を <strong>AND</strong> と言います。</p>

<p>一方、<code>A || B</code> と書くとAとBのいずれか1つでも <code>true</code> なら全体が <code>true</code> となります。このような「AまたはB」という条件を <strong>OR</strong> と言います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const num = <span class="integer">1</span>;

<span class="keyword">if</span> (num &lt; <span class="integer">3</span> || num &gt;= <span class="integer">7</span>) { <span class="comment">// numが3未満または7以上の場合</span>
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-5.png" alt="コンソールでif文を実行"></p>

<p>まとめると以下のようになります。</p>

<table>
  <thead>
    <tr>
      <th>比較</th>
      <th>結果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>true &amp;&amp; true</code></td>
      <td>true</td>
    </tr>
    <tr>
      <td><code>true &amp;&amp; false</code></td>
      <td>false</td>
    </tr>
    <tr>
      <td><code>false &amp;&amp; true</code></td>
      <td>false</td>
    </tr>
    <tr>
      <td><code>false &amp;&amp; false</code></td>
      <td>false</td>
    </tr>
    <tr>
      <td><code>true || true</code></td>
      <td>true</td>
    </tr>
    <tr>
      <td><code>true || false</code></td>
      <td>true</td>
    </tr>
    <tr>
      <td><code>false || true</code></td>
      <td>true</td>
    </tr>
    <tr>
      <td><code>false || false</code></td>
      <td>false</td>
    </tr>
  </tbody>
</table>

<h4>ANDとORの組み合わせ</h4>

<p>変数aが3で、かつ変数bが7未満または15以上の場合に「yes」、そうでない場合は「no」と表示したい場合はどう書けばよいでしょうか。<code>&amp;&amp;</code> と <code>||</code> は1つの <code>if</code> の中にまとめて書くことができます。</p>

<p>以下のコードを実行すると、<code>a</code> は <code>5</code> なので、本来は「no」と表示されるはずなのに、「yes」と表示されてしまいます。なぜでしょうか。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const a = <span class="integer">5</span>;
const b = <span class="integer">20</span>;

<span class="keyword">if</span> (a === <span class="integer">3</span> &amp;&amp; b &lt; <span class="integer">7</span> || b &gt;= <span class="integer">15</span>) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">yes</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">no</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-6.png" alt="コンソールでif文を実行"></p>

<p>その理由は、<code>&amp;&amp;</code> は <code>||</code> よりも周りとの結びつきが強いため、以下のように解釈されてしまうからだと理解してください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">if</span> ((a === <span class="integer">3</span> &amp;&amp; b &lt; <span class="integer">7</span>) || b &gt;= <span class="integer">15</span>) {
</pre></div>
</div>
</div>

<p><code>aが3、かつbが7未満</code>、または、<code>bが15以上</code>という条件なので、<code>b</code> が <code>20</code> であれば全体が <code>true</code> となってしまいます。</p>

<p>これを解決するには <code>||</code> が先に実行されるように <code>( )</code> で囲います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const a = <span class="integer">5</span>;
const b = <span class="integer">20</span>;

<span class="keyword">if</span> (a === <span class="integer">3</span> &amp;&amp; (b &lt; <span class="integer">7</span> || b &gt;= <span class="integer">15</span>)) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">yes</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">no</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-if-7.png" alt="コンソールでif文を実行"></p>

<p>これで正しく「no」と表示されるようになりました。</p>

<div class="alert alert-warning">
なお、上記の説明は、論理演算子を使いこなすことを重視した説明となっており、厳密に言うと少々異なっています。ステップアップを目指す方は、正しい動作を <a href="https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Operators/Logical_Operators" target="_blank">論理演算子(MDN)</a> で確認してください。
</div>

<h4>truthyとfalsy</h4>

<p>JavaScriptでは、以下の値も <code>false</code> とみなされます。「<code>''</code>」は、文字の入っていない文字列を表しています。このような文字列を、「空文字列」と言います。</p>

<ul>
  <li><code>false</code></li>
  <li><code>undefined</code></li>
  <li><code>null</code></li>
  <li><code>0</code></li>
  <li><code>NaN</code></li>
  <li><code>''</code></li>
</ul>

<p>上記以外の値は、すべて <code>true</code> とみなされます。<code>true</code> とみなされる値のことを、「truthy」と言います。反対に <code>false</code> とみなされる値のことを、「falsy」と言います。</p>

<p>以下のコードをコンソールで実行して、表示を確認してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const result = <span class="predefined-constant">undefined</span>;
<span class="keyword">if</span> (result) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">truthy</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">falsy</span><span class="delimiter">'</span></span>);
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-4-10">4.10 オブジェクト
</h3><p>先ほど学んだ配列は、<strong>インデックス番号</strong> でアクセスできるデータの集まりでした。そして配列の中身1つひとつを <strong>要素</strong> と呼ぶのでした。</p>

<p>それに対してオブジェクトは、<strong>名前</strong> でアクセスできるデータの集まりです。そしてオブジェクトの中身1つひとつを <strong>プロパティ</strong> と呼びます。</p>

<h4>オブジェクトを作成する</h4>

<p>以下のコードでは、trafficLight（信号機）という変数の値として、オブジェクトを代入しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const trafficLight = {
  <span class="key">blue</span>: <span class="string"><span class="delimiter">'</span><span class="content">進め</span><span class="delimiter">'</span></span>,
  <span class="key">yellow</span>: <span class="string"><span class="delimiter">'</span><span class="content">基本は止まれ</span><span class="delimiter">'</span></span>,
  <span class="key">red</span>: <span class="string"><span class="delimiter">'</span><span class="content">止まれ</span><span class="delimiter">'</span></span>,
};
</pre></div>
</div>
</div>

<p><code>blue: '進め'</code> , <code>yellow: '基本は止まれ'</code> , <code>red: '止まれ'</code> 。これらは、それぞれがプロパティです。この3つのプロパティを持つオブジェクトを、<code>trafficLight</code> という変数の値として代入しています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Illustration-object-jp.png" alt="オブジェクトの説明"></p>

<p>個々のプロパティは、「<code>,</code>」（カンマ）で区切ります。ただし最後のプロパティ末尾のカンマは、無くても構いません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Illustration-object-comma-jp.png" alt="オブジェクトの説明"></p>

<p>プロパティの値には、変数を指定することもできます。この場合は変数の値が、プロパティの値になります。たとえば以下のコードの <code>blue: blueMeaning,</code> というプロパティは、プロパティの値として <code>blueMeaning</code> という変数を指定しています。この場合、変数の値である <code>'進め'</code> が、プロパティの値となります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const blueMeaning = <span class="string"><span class="delimiter">'</span><span class="content">進め</span><span class="delimiter">'</span></span>;
const yellowMeaning = <span class="string"><span class="delimiter">'</span><span class="content">基本は止まれ</span><span class="delimiter">'</span></span>;
const redMeaning = <span class="string"><span class="delimiter">'</span><span class="content">止まれ</span><span class="delimiter">'</span></span>;

const trafficLight = {
  <span class="key">blue</span>: blueMeaning,
  <span class="key">yellow</span>: yellowMeaning,
  <span class="key">red</span>: redMeaning,
};

console.log(trafficLight);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-0.png" alt="コンソールでオブジェクトを表示"></p>

<p>上記のように <code>console.log</code> を使って、trafficLight変数の値を確認してみましょう。</p>

<p>上記のように変数を指定することで、プロパティの値を動的に変更できます。たとえば以下のコードを、コンソールで実行してみましょう。プロパティの値は、どうなるでしょうか。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const language = <span class="string"><span class="delimiter">'</span><span class="content">english</span><span class="delimiter">'</span></span>;

let blueMeaning;
let yellowMeaning;
let redMeaning;

<span class="keyword">if</span> (language === <span class="string"><span class="delimiter">'</span><span class="content">japanese</span><span class="delimiter">'</span></span>) {
  blueMeaning = <span class="string"><span class="delimiter">'</span><span class="content">進め</span><span class="delimiter">'</span></span>;
  yellowMeaning = <span class="string"><span class="delimiter">'</span><span class="content">基本は止まれ</span><span class="delimiter">'</span></span>;
  redMeaning = <span class="string"><span class="delimiter">'</span><span class="content">止まれ</span><span class="delimiter">'</span></span>;
} <span class="keyword">else</span> <span class="keyword">if</span> (language === <span class="string"><span class="delimiter">'</span><span class="content">english</span><span class="delimiter">'</span></span>) {
  blueMeaning = <span class="string"><span class="delimiter">'</span><span class="content">Go</span><span class="delimiter">'</span></span>;
  yellowMeaning = <span class="string"><span class="delimiter">'</span><span class="content">Stop in principle</span><span class="delimiter">'</span></span>;
  redMeaning = <span class="string"><span class="delimiter">'</span><span class="content">Stop</span><span class="delimiter">'</span></span>;
}

const trafficLight = {
  <span class="key">blue</span>: blueMeaning,
  <span class="key">yellow</span>: yellowMeaning,
  <span class="key">red</span>: redMeaning,
};

console.log(trafficLight);
</pre></div>
</div>
</div>

<p>上記のコードではlanguage変数の値によって、プロパティの値を変えています。もしlanguage変数の値が <code>'japanese'</code> なら、プロパティの値は日本語の文字列になります。もしlanguage変数の値が <code>'english'</code> なら、プロパティの値は英語の文字列になります。</p>

<p>プロパティの値として指定する変数名は、プロパティ名と同じでも問題ありません。たとえば以下のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const blue = <span class="string"><span class="delimiter">'</span><span class="content">進め</span><span class="delimiter">'</span></span>;
const yellow = <span class="string"><span class="delimiter">'</span><span class="content">基本は止まれ</span><span class="delimiter">'</span></span>;
const red = <span class="string"><span class="delimiter">'</span><span class="content">止まれ</span><span class="delimiter">'</span></span>;

const trafficLight = {
  <span class="key">blue</span>: blue,
  <span class="key">yellow</span>: yellow,
  <span class="key">red</span>: red,
};
</pre></div>
</div>
</div>

<p>上記のようにプロパティ名と、その値に指定した変数名が同じ場合、省略した書き方ができます。たとえば以下のオブジェクトの <code>blue,</code> という指定は、 <code>blue: blue,</code> と同じ意味になります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const blue = <span class="string"><span class="delimiter">'</span><span class="content">進め</span><span class="delimiter">'</span></span>;
const yellow = <span class="string"><span class="delimiter">'</span><span class="content">基本は止まれ</span><span class="delimiter">'</span></span>;
const red = <span class="string"><span class="delimiter">'</span><span class="content">止まれ</span><span class="delimiter">'</span></span>;

const trafficLight = {
  blue,
  yellow,
  red,
};
</pre></div>
</div>
</div>

<p>プロパティの値は、別のオブジェクトや配列でも問題ありません。以下のコードでは <code>friends</code> というプロパティの値が、配列になっています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
  <span class="key">friends</span>: [<span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>],
};
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-6.png" alt="コンソールでオブジェクトを表示"></p>

<h4>プロパティの値を取得する</h4>

<p>プロパティの値を取得する方法はいくつかあります。１つは、「オブジェクトの変数名.プロパティ」と書く方法です。</p>

<p>たとえば以下のコードでは <code>person.name</code> で、nameプロパティの値を取得しています。この書き方を「ドット記法」と呼びます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};
console.log(person.name); <span class="comment">// コンソールに「桃太郎」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-1.png" alt="コンソールでオブジェクトを表示"></p>

<p>２つ目は、「オブジェクトの変数名[プロパティ名の文字列]」と書く方法です。たとえば <code>person['name']</code> でも、nameプロパティの値を取得できます。この書き方を「ブラケット記法」と呼びます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};
console.log(person[<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>]); <span class="comment">// コンソールに「桃太郎」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-2.png" alt="コンソールでオブジェクトを表示"></p>

<p><code>'name'</code> はプロパティ名の <code>name</code> を <code>'</code>（シングルクオテーション）で囲み、文字列にしています。</p>

<p>ドット記法とブラケット記法の大きな違いは「プロパティに変数などを使うことができるかどうか」です。</p>

<p>ブラケット記法は、プロパティに変数などが使えます。たとえば <code>name</code> というプロパティ名を文字列として変数に代入して、以下のように書くこともできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const key = <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>;
console.log(person[key]); <span class="comment">// コンソールに「桃太郎」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-3.png" alt="コンソールでオブジェクトを表示"></p>

<p>上記ではkeyという変数に、<code>'name'</code> という文字列を代入しています。そのため <code>person[key]</code> は、personオブジェクトのnameプロパティにアクセスしています。このようにプロパティ名を変数に代入することで、取得するプロパティの値をJavaScriptで動的に変更できます。</p>

<p>「動的に変更する」というのは、たとえば以下のような例です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

let key = <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>;
console.log(person[key]); <span class="comment">// コンソールに「桃太郎」と表示される</span>

key = <span class="string"><span class="delimiter">'</span><span class="content">age</span><span class="delimiter">'</span></span>;
console.log(person[key]); <span class="comment">// コンソールに「7」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-4.png" alt="コンソールでオブジェクトを表示"></p>

<p>上記ではpersonオブジェクトに対して、keyという変数をプロパティ名として２回アクセスしています。key変数の値を途中で変更しているため、取得するプロパティの値も途中で変更されています。プロパティ名を変数に代入することで、取得するプロパティの値をプログラムの実行結果やユーザーの入力などによって変更できます。これが、動的に変更するという意味です。</p>

<p>一方、ドット記法では変数などを使ってプロパティにアクセスできません。そのため以下のように書いても、プロパティにアクセスできず「undefined」と表示されます。<code>undefined</code> は、「値が定義（設定）されていない」という意味です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const nickname = <span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>;
console.log(person.nickname); <span class="comment">// コンソールに「undefined」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-5.png" alt="コンソールでオブジェクトを表示"></p>

<h4>プロパティの値を変数に代入する</h4>

<p>取得したプロパティの値を、変数に代入してみましょう。以下のコードではpersonオブジェクトのnameプロパティの値を、personName変数に代入しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const personName = person.name;
console.log(personName); <span class="comment">// コンソールに「桃太郎」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-15.png" alt="コンソールでオブジェクトを表示"></p>

<p>取得するプロパティの名前と、その値を代入する変数名は同じでも構いません。以下のコードではpersonオブジェクトのnameプロパティの値を、name変数に代入しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const name = person.name;
console.log(name); <span class="comment">// コンソールに「桃太郎」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-16.png" alt="コンソールでオブジェクトを表示"></p>

<p>上記のように取得するプロパティの名前と、その値を代入する変数名が同じ場合、以下のように書くこともできます。このような書き方を <strong>分割代入</strong> と言います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const { name } = person; <span class="comment">// const name = person.name; とも書ける</span>
console.log(name); <span class="comment">// コンソールに「桃太郎」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-17.png" alt="コンソールでオブジェクトを表示"></p>

<p>上記のコードの <code>const { name } = person;</code> が分割代入です。<code>const name = person.name;</code> と同じ意味になります。</p>

<p>分割代入では一度に複数のプロパティの値を、変数に代入できます。以下のコードでは、一度にnameプロパティとageプロパティの両方の値を変数に代入しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const { name, age } = person;
console.log(name); <span class="comment">// コンソールに「桃太郎」と表示される</span>
console.log(age); <span class="comment">// コンソールに「7」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-18.png" alt="コンソールでオブジェクトを表示"></p>

<h4>プロパティの値を変更する</h4>

<p><a href="javascript#chapter-4-2">4.2 変数</a>で説明したとおり、<code>const</code> で定義した変数の値は後から再代入できません。</p>

<p>そのため以下のコードはエラーになります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

person = { <span class="comment">// person変数に、別のオブジェクトを再代入しようとする</span>
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">犬</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">3</span>,
};
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-12.png" alt="変数への再代入を試みる"></p>

<p>しかし「オブジェクトそのもの」ではなく、「オブジェクトのプロパティ」を変更することはできます。さらにプロパティは変更だけでなく、後から追加や削除もできます。</p>

<p>プロパティの値を変更するには、まず値を変更したいプロパティを指定します。指定方法は、ドット記法とブラケット記法のどちらでも構いません。指定したプロパティに対して、変更する値を代入します。変更する値は、演算子 <code>=</code> の右側に書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

person.age = <span class="integer">20</span>; <span class="comment">// ageプロパティの値を、「7」から「20」に変更する</span>
console.log(person); <span class="comment">// ageプロパティの値を、「20」に変更したことが確認できる</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-7.png" alt="コンソールでオブジェクトを表示"></p>

<h4>プロパティを追加する</h4>

<p>作成したオブジェクトに、後からプロパティを追加することもできます。まずプロパティ値の変更と同様に、新たに追加したいプロパティ名を指定します。そして指定したプロパティに対して、新たな値を代入します。追加する値は、演算子「=」の右側に書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

person.enemy = <span class="string"><span class="delimiter">'</span><span class="content">鬼</span><span class="delimiter">'</span></span>; <span class="comment">// personオブジェクトに「enemy」というプロパティを追加する</span>
console.log(person); <span class="comment">// personオブジェクトに、enemyプロパティを追加したことが確認できる</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-8.png" alt="コンソールでオブジェクトを表示"></p>

<h4>プロパティを削除する</h4>

<p>オブジェクトから特定のプロパティを削除するには、<code>delete</code> という演算子を使います。まずdelete演算子を書き、その後に削除したいプロパティを指定します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};
console.log(person); <span class="comment">// コンソールに {name: '桃太郎', age: 7} と表示される</span>

<span class="keyword">delete</span> person.age; <span class="comment">// personオブジェクトのageプロパティを削除する</span>
console.log(<span class="string"><span class="delimiter">'</span><span class="content">ageプロパティを削除した後：</span><span class="delimiter">'</span></span>, person); <span class="comment">// ageプロパティを削除したことが確認できる</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-9.png" alt="コンソールでオブジェクトを表示"></p>

<h4>メソッド</h4>

<p>プロパティの値には、関数（function）を入れることもできます。関数を入れたプロパティは <strong>メソッド</strong> と言います。メソッドは通常の関数と同じように <code>()</code> を付けて呼び出すことができます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="function">greet</span>: <span class="keyword">function</span>() {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
  },
};
person.greet(); <span class="comment">// greetメソッドを呼び出す</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-10.png" alt="コンソールでオブジェクトを表示"></p>

<p>メソッドはより短く書くこともできます。上記のコードは、以下のように書き換えられます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  greet() {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
  },
};
person.greet(); <span class="comment">// greetメソッドを呼び出す</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-13.png" alt="コンソールでオブジェクトを表示"></p>

<p>通常の関数と同じく、引数や戻り値も設定できます。またオブジェクトのメソッドからプロパティにアクセスするときは、頭に <code>this.</code> を付けます。以下のコードでintroduceメソッドの中からnameプロパティにアクセスしたいときは、<code>this.name</code>となります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="function">greet</span>: <span class="keyword">function</span>(friend) {
    console.log(<span class="error">`</span><span class="predefined">$</span>{friend}<span class="error">さ</span><span class="error">ん</span><span class="error">、</span><span class="error">こ</span><span class="error">ん</span><span class="error">に</span><span class="error">ち</span><span class="error">は</span><span class="error">！</span><span class="error">`</span>);
  },
  <span class="function">introduce</span>: <span class="keyword">function</span>() {
    console.log(<span class="error">`</span><span class="predefined">$</span>{<span class="local-variable">this</span>.name}<span class="error">と</span><span class="error">呼</span><span class="error">ん</span><span class="error">で</span><span class="error">く</span><span class="error">だ</span><span class="error">さ</span><span class="error">い</span><span class="error">！</span><span class="error">`</span>);
  },
};

person.greet(<span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>); <span class="comment">// コンソールに「イヌさん、こんにちは！」と表示される</span>
person.greet(<span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>); <span class="comment">// コンソールに「サルさん、こんにちは！」と表示される</span>

person.introduce(); <span class="comment">// コンソールに「桃太郎と呼んでください！」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-11.png" alt="コンソールでオブジェクトを表示"></p>

<p>先ほど説明したように、メソッドは短く省略して書くこともできます。上記のコードは、以下のように書き換えられます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  greet(friend) {
    console.log(<span class="error">`</span><span class="predefined">$</span>{friend}<span class="error">さ</span><span class="error">ん</span><span class="error">、</span><span class="error">こ</span><span class="error">ん</span><span class="error">に</span><span class="error">ち</span><span class="error">は</span><span class="error">！</span><span class="error">`</span>);
  },
  introduce() {
    console.log(<span class="error">`</span><span class="predefined">$</span>{<span class="local-variable">this</span>.name}<span class="error">と</span><span class="error">呼</span><span class="error">ん</span><span class="error">で</span><span class="error">く</span><span class="error">だ</span><span class="error">さ</span><span class="error">い</span><span class="error">！</span><span class="error">`</span>);
  },
};

person.greet(<span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>);
person.greet(<span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>);

person.introduce();
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-object-14.png" alt="コンソールでオブジェクトを表示"></p>

<p>テキストではこれ以降、メソッドの定義には省略した書き方を使います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-11">4.11 undefined
</h3><p><strong>undefined</strong> は、「値が定義されていない」という意味の特別な値です。たとえば変数を <code>let</code> で宣言（作成）して値を代入しない場合などは、変数の値が <code>undefined</code> になります。</p>

<p>そのため以下のコードを実行すると、コンソールに「undefined」と表示されます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>let num;
console.log(num);
</pre></div>
</div>
</div>

<p>「undefined」と２行続けて表示されますが、<code>console.log</code> で表示されるのは最初の行の「undefined」です。次の行で表示される「undefined」については、チャプター8の <a href="javascript#chapter-8">undefinedとなる場合</a> にて説明します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-undefined-1.png" alt="コンソールでundefinedを表示"></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-12">4.12 null
</h3><p><code>null</code> はJavaScriptで「値がない」ことを表します。ちょっと意味がわかりづらく感じますが、一度セットした値を空っぽにしたい場合などに使います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>let person = {
  <span class="key">firstName</span>: <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>,
  <span class="key">lastName</span>: <span class="string"><span class="delimiter">'</span><span class="content">山田</span><span class="delimiter">'</span></span>,
};

person = <span class="predefined-constant">null</span>;

console.log(person.firstName);
</pre></div>
</div>
</div>

<p>上のコードを実行すると、コンソールに以下のエラーメッセージが表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-null-1.png" alt="コンソールでnullを参照してエラーを表示"></p>

<blockquote>
  <p>Uncaught TypeError: Cannot read property ‘firstName’ of null</p>
</blockquote>

<p><code>null</code> のfirstNameプロパティを読み取れません、というエラー内容です。person変数の値が <code>null</code> の状態で <code>person.firstName</code> にアクセスしようとしたため、エラーになりました。</p>

<p>以下のように厳密な比較（<code>===</code>）で事前にチェックすれば、person変数の値が <code>null</code> かどうかにかかわらずエラーが起きません。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>let person = {
  <span class="key">firstName</span>: <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>,
  <span class="key">lastName</span>: <span class="string"><span class="delimiter">'</span><span class="content">山田</span><span class="delimiter">'</span></span>,
};

<span class="keyword">if</span> (person === <span class="predefined-constant">null</span>) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">取得失敗</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(person.firstName); <span class="comment">// コンソールに「太郎」と表示される</span>
}

person = <span class="predefined-constant">null</span>;

<span class="keyword">if</span> (person === <span class="predefined-constant">null</span>) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">取得失敗</span><span class="delimiter">'</span></span>); <span class="comment">// コンソールに「取得失敗」と表示される</span>
} <span class="keyword">else</span> {
  console.log(person.firstName);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-null-2.png" alt="コンソールでnullを参照してエラーを表示"></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-13">4.13 NaN
</h3><p>間違った計算を行った場合などは、<strong>NaN</strong>（Not a Number：数字ではない）という特別な値になります。間違った計算というのは、たとえば <code>0</code> を <code>0</code> で割った場合などです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const num = <span class="integer">0</span> / <span class="integer">0</span>;
console.log(num);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-nan-1.png" alt="コンソールでNaNを表示"></p>

<p>NaNかどうかを調べるには<code>==</code>や<code>===</code>ではなく<code>Number.isNaN</code> というメソッドを使います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const num = <span class="integer">0</span> / <span class="integer">0</span>;

<span class="keyword">if</span> (Number.isNaN(num)) {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">数値を認識できません</span><span class="delimiter">'</span></span>);
} <span class="keyword">else</span> {
  console.log(num);
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-nan-2.png" alt="コンソールでNaNを表示"></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-14">4.14 非同期処理
</h3><h4>setTimeout</h4>

<p>setTimeoutメソッドを使うと、指定した時間が経過した後に関数が実行されます。</p>

<p>コンソールで、以下のコードを実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>setTimeout(() =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">呼んだ？</span><span class="delimiter">'</span></span>);
}, <span class="integer">1000</span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-setTimeout-1.png" alt="setTimeoutを続けて実行"></p>

<p>実行すると、まず「正の整数値」が表示されます。正の整数値というのは、1，2，3，・・・のような数のことです。以下の画像では、「1」が表示されています。そして1秒後に、「呼んだ？」と表示されます。</p>

<p>setTimeoutメソッドは <code>setTimeout(関数, 時間)</code> という形で、タイマーを設定します。第２引数で指定した時間が経過した後に、第１引数の関数が実行されます。時間はミリ秒単位で指定します。1秒＝1000ミリ秒なので、上記のコードでは1秒経過した後に、 第１引数のアロー関数が実行されます。</p>

<p>コンソールに表示される正の整数値は、setTimeoutメソッドの戻り値です。上記のコードを実行した後で、画面をリロード（再読み込み）せず、また同じコードを実行してみてください。すると、実行するごとに異なる数が表示されます。以下の画像ではsetTimeoutメソッドを続けて実行すると、それぞれ「1」、「2」、「3」と表示されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-setTimeout-sequentially.png" alt="setTimeoutを続けて実行"></p>

<p>この数値で、設定したタイマーを特定できます。特定したタイマーは、clearTimeoutメソッドでキャンセルできます。以下のように、clearTimeoutメソッドの引数としてタイマーを特定する数値を渡します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const timeoutId = setTimeout(() =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">呼んだ？</span><span class="delimiter">'</span></span>);
}, <span class="integer">1000</span>);

clearTimeout(timeoutId);
</pre></div>
</div>
</div>

<p>上記のコードでは、clearTimeoutメソッドの引数として、setTimeoutメソッドの戻り値を渡しています。この戻り値が、タイマーを特定する数値です。設定したタイマーをキャンセルしているため、タイマーに登録した処理が呼び出されません。</p>

<h4>実行される順番</h4>

<p>今度は、コンソールで以下のコードを実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);

setTimeout(() =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">B</span><span class="delimiter">'</span></span>);
}, <span class="integer">1000</span>);

console.log(<span class="string"><span class="delimiter">'</span><span class="content">C</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>実行すると以下のように、「A」→「C」→「B」の順で実行されます。 setTimeoutに登録した処理が、1秒（1000ミリ秒）経過した後で実行されるからです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-setTimeout-synchronous-asynchronous-1.png" alt="同期処理と非同期処理を続けて実行"></p>

<p>なお「C」と「B」の間に表示されるundefinedは、このコードの実行結果です。今はあまり気にしないでください。チャプター8の<a href="javascript#chapter-8">undefinedとなる場合</a>で説明します。</p>

<p>それでは以下のコードを実行すると、表示される順番はどうなるでしょうか。setTimeoutに登録した処理が、0秒（0ミリ秒）経過した後で実行されるように指定しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);

setTimeout(() =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">B</span><span class="delimiter">'</span></span>);
}, <span class="integer">0</span>);

console.log(<span class="string"><span class="delimiter">'</span><span class="content">C</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>先ほどと同じく、「A」→「C」→「B」の順で実行されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-setTimeout-synchronous-asynchronous-2.png" alt="同期処理と非同期処理を続けて実行"></p>

<p>コードに書かれた処理は、上から下へと実行されるのが基本です。しかしsetTimeoutメソッドに登録した処理は、実行が後回しになります。つまり上記のコードでは、<code>console.log('C');</code> の実行が終わった後で、setTimeoutメソッドに登録した処理が実行されます。</p>

<p>このように実行を後回しにする処理のことを、<strong>非同期処理</strong> と言います。ここまでの例では、指定した時間が経過した後で関数を実行する、非同期処理を登録しました。</p>

<p>非同期処理は時間の経過だけでなく、他のことに対して登録することもできます。例えば、「サーバーに何かの情報を要求して、その情報が受信できたら処理を実行する」ということも可能です。このように非同期処理を行うことで、サーバーとの通信のような時間がかる処理を待っている間に、他の処理を実行できます。</p>

<p>またJavaScriptでは基本的に、1度に実行できるのは1つの処理だけです。これを「シングルスレッド」と言います。例えるなら、レジが１台しかないコンビニのようなイメージです。レジに並んだお客さん（個々の処理）は、先頭から順番に１人ずつ会計処理が行われます。しかし非同期処理のお客さんは、順番が後回しになります。イメージとしては、レンジでお弁当を温めてもらって、温め終わったら店員さんが呼んでくれる、というような感じです。お弁当を温めている間、店員さんはレジに並んだ他のお客さんの会計処理を行います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-15">4.15 エラーとデバッグ
</h3><h4>まずはエラーメッセージを確認する</h4>

<p>JavaScriptが思ったように動かない時は、Chromeのデベロッパーツールの <strong>コンソールをとにかく見て</strong> みましょう。ここに出ているエラーメッセージこそが最大の解決へのヒントとなります。</p>

<p>JavaScriptに打ち間違いなどのエラーがある場合、下のように赤字で表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-object-typo.png" alt="オブジェクトのタイプミスによるエラー"></p>

<p>この例では変数名の <code>person</code> を <code>persona</code> と打ち間違えてしまったため、<code>Uncaught ReferenceError: persona is not defined at ...</code> というエラーが出ています。</p>

<p><code>ReferenceError</code> や <code>SyntaxError</code> の原因は、大抵タイプミスです。そのためこのエラーメッセージが出たら、まずソースコードの該当行をよく調べて原因を探りましょう。それでも分からなければ、エラーメッセージをコピーしてGoogle検索をかけてみると、解決策が見つかる場合は多いです。</p>

<p>プログラミングに慣れていくにつれて、エラーやバグ（プログラムの誤り）を引き起こす確率は低くなりますが、それでも人はエラーやバグを出してしまいます。それは単にタイプミスだったり、知らない間に入り込んでいた全角スペースだったり、先入観による勘違いだったり、様々です。</p>

<p>エラーやバグの原因を見つけて修正することを、「デバッグ」と言います。</p>

<p>最初はエラーやバグが出てもどうすればいいか分からないかも知れません。そういうときはメンターに頼りましょう。このとき自分でもしっかりと学ぶ姿勢でメンターに聞きましょう。結局は根気よくデバッグを続けることで、自分でも徐々に起きやすいエラーや勘所がわかってきます。</p>

<p>そして <strong>エラー究明に最も大事なものが、コンソールのエラーメッセージ</strong> だとわかるようになります。エラーメッセージは英語ですが、キーワードを読み取ったり機械翻訳にかけたり、そのままエラーメッセージをGoogle検索するなどで、エラーが何を言っているのか把握することが最も大事なデバッグへの第一歩です。</p>
</div></section><section id="chapter-5"><h2 class="index">5. 組み込みオブジェクト
</h2><div class="subsection"><p>JavaScriptには、あらかじめ用意されたオブジェクトがいくつかあります。これらのオブジェクトを「組み込みオブジェクト」と言います。組み込みオブジェクトには、あらかじめ用意されたプロパティやメソッドが入っています。これらのプロパティやメソッドを使うことで、さまざまな機能を利用できます。たとえば配列を操作する際には、<code>Array</code> というオブジェクトが利用できます。</p>

<p><strong>※繰り返しになりますが、デベロッパーツールを使っている場所が出てきた際は、必ずデベロッパーツールを使って確認するようにしましょう。</strong></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 Arrayオブジェクト
</h3><p>JavaScriptでは、配列もオブジェクトです。そう言われても、混乱してしまう方もいらっしゃるでしょう。イメージとしては、配列を <code>Array</code> という組み込みオブジェクトで包んで、配列を操作するためのメソッドやプロパティなどを追加している、というように考えてください。</p>

<p>Arrayオブジェクトには、配列を操作するためのメソッドやプロパティが用意されています。 いくつかご紹介します。</p>

<h4>要素数を取得する</h4>

<p>lengthプロパティは、配列の要素数を取得できます。<a href="javascript#chapter-4-8">4.8 配列とループ</a>でも、lengthプロパティで配列の要素数を取得しました。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

console.log(members.length); <span class="comment">// コンソールに配列の要素数を表示する</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-array-length.png" alt="コンソールに配列の要素数を表示する"></p>

<h4>指定した要素を取り出す</h4>

<p>sliceメソッドは、インデックスで指定した要素を取り出して、新たな配列を戻り値として返します。</p>

<p>たとえばコンソールで、以下のコードを実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

console.log(members.slice(<span class="integer">0</span>, <span class="integer">2</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-slice-1.png" alt="コンソールでArray.prototype.slice()"></p>

<p>コンソールには、sliceメソッドの戻り値として返された<code>['桃太郎', 'イヌ']</code>という配列が表示されます。</p>

<p>配列を変数に代入しなくても、Arrayオブジェクトのメソッドやプロパティを利用できます。つまり上記のコードは、以下のように書き換えても同じ実行結果となります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log([<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>].slice(<span class="integer">0</span>, <span class="integer">2</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-slice-with-literal.png" alt="コンソールでArray.prototype.slice()を、配列リテラルから呼び出す"></p>

<p>sliceメソッドの第１引数は、取り出しを開始する位置です。0から始まります。第２引数は、取り出しを終了する位置です。たとえば<code>['桃太郎', 'イヌ', 'サル', 'キジ']</code>という配列に位置を入れて表すと、「0 ‘桃太郎’ 1 ‘イヌ’ 2 ‘サル’ 3 ‘キジ’ 4」となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-Array-object-01.png" alt=""></p>

<p><code>['桃太郎', 'イヌ', 'サル', 'キジ'].slice(0, 2)</code>は、図の0番目から2番目までの位置にある要素を取り出して、新たな配列を戻り値として返します。つまり、<code>['桃太郎', 'イヌ']</code>という新たな配列を返します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-Array-object-02.png" alt=""></p>

<p>sliceメソッドの第２引数は、省略することもできます。省略すると、配列の開始位置から最後までを取り出します。たとえば<code>['桃太郎', 'イヌ', 'サル', 'キジ'].slice(1)</code>は、図の1番目から最後の位置までに含まれる要素を取り出して、新しい配列を返します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

console.log(members.slice(<span class="integer">1</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-slice-2.png" alt="コンソールでArray.prototype.slice(), 第２引数を省略"></p>

<p>つまり、<code>['イヌ', 'サル', 'キジ']</code>という新たな配列を返します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-Array-object-03.png" alt=""></p>

<p>繰り返しの説明になりますが、配列は変数に代入しなくてもsliceメソッドを使えます。</p>

<p>また引数には、マイナスの値を指定することもできます。マイナスの値を指定すると、配列の最後から位置を指定します。<br>
たとえば<code>['桃太郎', 'イヌ', 'サル', 'キジ']</code>という配列にマイナスの値で指定した位置を入れて表すと、「-4 ‘桃太郎’ -3 ‘イヌ’ -2 ‘サル’ -1 ‘キジ’ 0」となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-Array-object-04.png" alt=""></p>

<p>そのため<code>['桃太郎', 'イヌ', 'サル', 'キジ'].slice(-2)</code>と指定すると、図の-2番目から最後（0番目）の位置までに含まれる要素を取り出して、新たな配列を返します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

console.log(members.slice(-<span class="integer">2</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-slice-3.png" alt="コンソールでArray.prototype.slice(), 引数に負数を指定"></p>

<p>つまり、<code>['サル', 'キジ']</code>という新たな配列を返します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-Array-object-05.png" alt=""></p>

<h4>新しい要素を追加して、要素数を取得する</h4>

<p><code>const</code> で定義した変数には、値を再代入できません。しかし<a href="javascript#chapter-4-10">4.10 オブジェクト</a>で説明した通り、オブジェクトのプロパティは変更できます。同様に、配列の要素も変更できます。変更だけでなく、後から追加や削除もできます。</p>

<p>pushメソッドは、配列の末尾に新しい要素を追加し、追加後の要素数が戻り値として返されます。pushメソッドの引数に、追加したい要素を指定します。</p>

<p>たとえばコンソールで、以下のコードを実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>];

console.log(members.push(<span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>)); <span class="comment">// コンソールに「2」と表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-push-1.png" alt="コンソールでArray.prototype.push()"></p>

<p>「イヌ」という要素が追加され、要素数が「1」から「2」に増えました。</p>

<p>「イヌ」という要素を追加した後に、<code>console.log</code> でmember配列を表示してみると……</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>];
members.push(<span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>);

console.log(members); <span class="comment">// コンソールに配列の['桃太郎', 'イヌ']が表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-push-2.png" alt="コンソールでArray.prototype.push()"></p>

<p>配列の要素が<code>['桃太郎']</code>から<code>['桃太郎', 'イヌ']</code>に増えていることが分かります。</p>

<h4>要素を順番に処理する</h4>

<p>forEachメソッドは、引数に関数を渡して呼び出します。この関数の引数として、順番に配列の要素が渡されます。順番に渡された配列の要素をもとに、関数で色々な処理を行うことができます。</p>

<p>言葉で説明すると分かりづらいので、実際のコードを見てみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

<span class="keyword">function</span> <span class="function">addRespect</span>(member) {
    console.log(member + <span class="string"><span class="delimiter">'</span><span class="content">さん</span><span class="delimiter">'</span></span>);
}

members.forEach(addRespect);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-forEach-1.png" alt="コンソールでArray.prototype.forEach"></p>

<p>上記のコードではforEachメソッドの引数に、自作の関数であるaddRespectを渡しています。このaddRespect関数には、配列の要素が引数として順番に渡され、実行されます。つまり、<code>addRespect('桃太郎');</code> → <code>addRespect('イヌ');</code> → <code>addRespect('サル');</code> → <code>addRespect('キジ');</code> という順番で関数が呼び出されるということです。そしてaddRespect関数で、引数として渡された要素それぞれに「’さん’」という文字列をくっつけて、コンソールに表示しています。</p>

<p>メソッドの引数には、アロー関数などを直接渡すこともできます。上記のコードは、アロー関数を使って以下のように書き換えられます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

members.forEach((member) =&gt; {
  console.log(<span class="error">`</span><span class="predefined">$</span>{member}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>);
});
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-forEach-2.png" alt="コンソールでArray.prototype.forEach"></p>

<h4>要素を順番に処理して、新たな配列を返す</h4>

<p>mapメソッドは、forEachメソッドとほぼ同じ処理を行います。違いはmapメソッドが、引数に渡した関数で処理した値を、<strong>新しい配列</strong> として返すことです。配列の要素を順番に処理して、新たな配列を作りたい場合は、forEachメソッドではなくmapメソッドを使いましょう。</p>

<p>以下のコードでは、addRespect関数で処理した値をgreatMembers変数に代入し、コンソールで表示しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

<span class="keyword">function</span> <span class="function">addRespect</span>(member) {
  <span class="keyword">return</span> <span class="error">`</span><span class="predefined">$</span>{member}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
}

const greatMembers = members.map(addRespect); <span class="comment">// greatMembers変数に、新しい配列が代入される</span>
console.log(greatMembers);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-map.png" alt="コンソールでArray.prototype.map"></p>

<p>forEachメソッドと同じように、上記のaddRespect関数には、配列の要素が引数として順番に渡され、実行されます。つまり、<code>addRespect('桃太郎');</code> → <code>addRespect('イヌ');</code> → <code>addRespect('サル');</code> → <code>addRespect('キジ');</code> という順番で関数が呼び出されるということです。</p>

<p>mapメソッドに渡す関数は、処理した値を <code>return</code> で戻り値として返す必要があります。そうしないと、新しい配列を作れません。ただしアロー関数を使った場合は、上記のコードを以下のように書き換えられます。アロー関数本体の処理が一文だけなので、<code>return</code>を省略できます。処理の実行結果が、そのまま戻り値となります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const members = [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>];

const greatMembers = members.map(member =&gt; <span class="error">`</span><span class="predefined">$</span>{member}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>);
console.log(greatMembers);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-map-arrow.png" alt="コンソールでArray.prototype.map"></p>

<h4>要素を条件によって選別して、新たな配列を返す</h4>

<p>filterメソッドはその名の通り、要素をフィルタリング（選別）するメソッドです。具体的には、引数として渡す関数に条件を設定します。そしてその条件に当てはまる要素だけを、新しい配列として返します。</p>

<p>以下のコードでは要素に数値が入った配列から、数値が5より大きい要素を選別して、新しい配列を作っています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const numbers = [<span class="integer">9</span>, <span class="integer">3</span>, <span class="integer">7</span>, <span class="integer">1</span>, <span class="integer">15</span>, <span class="integer">4</span>];

<span class="keyword">function</span> <span class="function">isLargerThanFive</span>(number) {
  <span class="keyword">return</span> number &gt; <span class="integer">5</span>;
}

const resultNumbers = numbers.filter(isLargerThanFive);
console.log(resultNumbers);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-filter.png" alt="コンソールでArray.prototype.filter"></p>

<p>上記のコードでは、filterメソッドの引数として自作の関数である <code>isLargerThanFive</code> を渡しています。この関数には、配列の要素が順番に引数として渡され、呼び出されます。つまり、<code>isLargerThanFive(9);</code> → <code>isLargerThanFive(3);</code> → <code>isLargerThanFive(7);</code> → <code>isLargerThanFive(1);</code> → <code>isLargerThanFive(15);</code> → <code>isLargerThanFive(4);</code> という順番で関数が呼び出されるということです。そして関数内で、5より大きいかを判定しています。5より大きい場合には <code>true</code> を、そうでない場合には<code>false</code>を戻り値として返します。</p>

<p>このようにfilterメソッドは、その引数として渡した関数が <code>true</code> と評価した要素だけで、新たな配列を作ります。</p>

<p>なお上記のコードは、アロー関数を使って以下のように書き換えられます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const numbers = [<span class="integer">9</span>, <span class="integer">3</span>, <span class="integer">7</span>, <span class="integer">1</span>, <span class="integer">15</span>, <span class="integer">4</span>];

const resultNumbers = numbers.filter(number =&gt; number &gt; <span class="integer">5</span>);
console.log(resultNumbers);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-filter-arrow.png" alt="コンソールでArray.prototype.filter"></p>

<h4>配列をくっつける</h4>

<p>複数の配列をくっつけて、１つの配列にしたい場合があります。</p>

<p>たとえば、以下のコードでは、<code>dogs</code> と <code>cats</code> という２つの配列を定義しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const dogs = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>]
const cats = [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];
</pre></div>
</div>
</div>

<p>上記の２つの配列をくっつけて、以下のように <code>pets</code> という配列を作りたいとします。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const pets = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];
</pre></div>
</div>
</div>

<p>このような場合、<code>concat</code> というメソッドが使えます。concatメソッドは２つの配列をくっつけて、<strong>新しい配列</strong> を返します。</p>

<p>以下のコードでは <code>dogs</code> と <code>cats</code> という２つの配列をくっつけて、新しい配列を作っています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const dogs = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>];
const cats = [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];

const pets = dogs.concat(cats); <span class="comment">// pets変数に、新しい配列が代入される</span>
console.log(pets);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-concat.png" alt="コンソールでArray.prototype.concat"></p>

<p><code>配列A.concat(配列B)</code> というように指定することで、配列AとBをくっつけた新しい配列が返されます。上記のコードでは、concatメソッドの戻り値として返された新しい配列を、<code>pets</code> という変数に代入しています。</p>

<p>複数の配列をくっつけて１つの配列にするには、pushメソッドを使うこともできます。</p>

<p>以下のコードでは、まず要素の入っていない空の配列を作り、 <code>pets</code> という変数に代入しています。そしてこのpets変数の配列に、別の配列を追加します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const pets = [];
const dogs = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>];
const cats = [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];

pets.push(dogs); <span class="comment">// petsにdogsを追加する</span>
pets.push(cats); <span class="comment">// petsにcatsを追加する</span>

console.log(pets);
</pre></div>
</div>
</div>

<p>上記のコードでpets変数の配列に、別の配列を加えることはできます。しかし、１つ気になることがあります。<br>
それはpets変数の配列の要素として、<code>cats</code> と <code>dogs</code> の配列ををそのまま加えていることです。上記のコードをコンソールで実行して、 <code>pets</code> 配列の要素を確認してみましょう。</p>

<p>実行するとコンソールに <code>(2)&nbsp;[Array(3), Array(3)]</code> と表示されますね。これは配列の要素が、別の配列であることを示しています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-push-3.png" alt="コンソールでArray.prototype.push"></p>

<p>上記の赤枠部分をクリックすると、配列の要素が詳しく確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-Array-prototype-push-4.png" alt="コンソールでArray.prototype.push"></p>

<p>上記のコードを実行したときpets変数の値は、以下の配列になります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>[[<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>], [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>]];
</pre></div>
</div>
</div>

<p>上記のように配列の要素に別の配列を加えるのではなく、pushメソッドを使って以下のような配列を作りたいとします。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>[<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];
</pre></div>
</div>
</div>

<p>この場合、以下のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const pets = [];
const dogs = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>];
const cats = [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];

pets.push(...dogs); <span class="comment">// dogsを展開して、petsに加える</span>
pets.push(...cats); <span class="comment">// catsを展開して、petsに加える</span>

console.log(pets);
</pre></div>
</div>
</div>

<p>上記コードの <code>...dogs</code> や <code>...cats</code> は、<strong>スプレッド構文</strong> と言われる書き方です。スプレッド構文を使うと、配列を展開できます。配列から、要素を取り出せるということです。</p>

<p>上記のコードをコンソールで実行すると、pets変数の値が <code>['柴犬', 'チワワ', 'トイプードル', 'ペルシャ', 'ロシアンブルー', 'シャム']</code> という配列になっていることが確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-spread-syntax-1.png" alt="コンソールでSpread syntax"></p>

<p>先ほどconcatメソッドについて解説しました。以下のコードでは <code>dogs</code> と <code>cats</code> という２つの配列をくっつけて、新しい配列を作っていますね。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const dogs = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>];
const cats = [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];

const pets = dogs.concat(cats); <span class="comment">// pets変数に、新しい配列が代入される</span>
console.log(pets);
</pre></div>
</div>
</div>

<p>上記のコードは、スプレッド構文を使うと以下のように書くこともできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const dogs = [<span class="string"><span class="delimiter">'</span><span class="content">柴犬</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">チワワ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">トイプードル</span><span class="delimiter">'</span></span>];
const cats = [<span class="string"><span class="delimiter">'</span><span class="content">ペルシャ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ロシアンブルー</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">シャム</span><span class="delimiter">'</span></span>];

const pets = [...dogs, ...cats]; <span class="comment">// pets変数に、新しい配列が代入される</span>
console.log(pets);
</pre></div>
</div>
</div>

<p><code>[...dogs, ...cats]</code> によりdogs変数とcats変数の配列からそれぞれ要素を取り出して、新しい配列の要素にしています。</p>

<p>コンソールで実行すると、pets変数の値が <code>['柴犬', 'チワワ', 'トイプードル', 'ペルシャ', 'ロシアンブルー', 'シャム']</code> という配列になっていることが確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-spread-syntax-2.png" alt="コンソールでSpread syntax"></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 Objectオブジェクト
</h3><p>Objectオブジェクトには、オブジェクトを操作するためのメソッドなどが用意されています。</p>

<h4>プロパティ名で、新たな配列を返す</h4>
<p>Object.keysメソッド（Objectオブジェクトのkeysメソッド）は、指定したオブジェクトが持つプロパティ名だけを、配列として返します。使い方は、Object.keysメソッドの引数として、プロパティ名を取得したいオブジェクトを渡します。</p>

<p>以下のコードでは、配列としてObject.keysメソッドから返されたpersonオブジェクトのプロパティ名を、<code>personProperties</code> という変数に代入しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const personProperties = Object.keys(person);
console.log(personProperties); <span class="comment">// 配列の['name', 'age']が表示される</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-object-keys.png" alt="コンソールでObject.keys"></p>

<p>Object.keysメソッドは、先ほどArrayオブジェクトで説明したforEachメソッドやmapメソッドと一緒に使うことが多いです。</p>

<p>以下のコードでは、Object.keysメソッドから返されたpersonオブジェクトのプロパティ名をもとにして、各プロパティの値を取得しています。そして、取得した値をコンソールに表示しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

const personProperties = Object.keys(person);

personProperties.forEach((key) =&gt; {
  console.log(person[key]);
});
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-object-keys-Array-prototype-forEach-1.png" alt="コンソールでObject.keys、Array.prototype.forEach"></p>

<p>上記のコードではまず、<code>Object.keys(person)</code> の戻り値として返された配列の <code>['name', 'age']</code> を、<code>personProperties</code>という変数に代入しています。そしてこの配列の要素を、forEachメソッドで順番に処理します。処理を担当するのは、forEachメソッドの引数として渡したアロー関数です。</p>

<p>このアロー関数には、配列の要素である<code>'name'</code>、<code>'age'</code>が順番に引数として渡され、呼び出されます。引数として渡された<code>'name'</code>、<code>'age'</code>は、personオブジェクトのプロパティ名です。アロー関数の中ではこのプロパティ名をもとに、プロパティの値を取得しています。プロパティの値を取得には、<code>person[key]</code>というようにブラケット記法を使っています。</p>

<p>そして最後に、ブラケット記法で取得したプロパティの値をコンソールに表示しています。結果として、各プロパティの値である「桃太郎」という文字列と、「7」という数値がコンソールに表示されます。</p>

<p>なおObject.keysメソッドから返された配列を変数に代入せず、そのままforEachメソッドを呼び出すこともできます。以下のような書き方です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>,
};

Object.keys(person).forEach((key) =&gt; {
  console.log(person[key]);
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 Stringオブジェクト
</h3><p>数値や文字列は通常、単なる数値や文字列のデータであり、オブジェクトではありません。しかし、オブジェクトとして扱うこともできます。数値や文字列をオブジェクトとして扱うために、あらかじめ用意されているオブジェクトがあります。</p>

<p>たとえば数値には <code>Number</code>、文字列には <code>String</code> というオブジェクトが用意されています。これらのオブジェクトを、「ラッパーオブジェクト」と言います。ラッパーオブジェクトには、数値や文字列で使えるメソッドやプロパティが入っています。</p>

<p>たとえばコンソールで、以下のコードを実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">桃太郎さん</span><span class="delimiter">'</span></span>;

console.log(name.slice(<span class="integer">1</span>, <span class="integer">3</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-String-prototype-slice-1.png" alt="コンソールでString.prototype.slice()"></p>

<p>コンソールには、sliceメソッドの戻り値として返された「太郎」という文字列が表示されます。このsliceメソッドは、Stringオブジェクトのメソッドです。</p>

<p>Stringオブジェクトのsliceメソッドは、文字列から一部を取り出して、新たな戻り値として返します。第１引数は、取り出しを開始する位置です。0から始まります。第２引数は、取り出しを終了する位置です。たとえば「’太郎さん’」という文字列に位置を入れて表すと、「0 桃 1 太 2 郎 3 さ 4 ん 5」となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-String-object-01.png" alt=""></p>

<p>そのため上記のコードでは、図の1番目から3番目までの位置にある文字列を取り出して、戻り値として返します。つまり、「’太郎’」という文字列を返します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-String-object-02.png" alt=""></p>

<p>また文字列を変数に代入しなくても、Stringオブジェクトのメソッドなどを利用できます。つまり上記のコードは、以下のように書き換えても同じ実行結果となります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">桃太郎さん</span><span class="delimiter">'</span></span>.slice(<span class="integer">1</span>, <span class="integer">3</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-String-prototype-slice-with-literal.png" alt="コンソールでString.prototype.slice()を、文字列リテラルから呼び出す"></p>

<p>sliceメソッドの第２引数は、省略することもできます。省略すると、文字列の開始位置から最後までを取り出します。たとえば<code>'桃太郎さん'.slice(1)</code>は、1番目から最後の位置までに含まれる文字列を取り出します。つまり、「’太郎さん’」という文字列を取り出します。繰り返しの説明になりますが、文字列は変数に代入しなくてもsliceメソッドを使えます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">桃太郎さん</span><span class="delimiter">'</span></span>;

console.log(name.slice(<span class="integer">1</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-String-prototype-slice-2.png" alt="コンソールでString.prototype.slice()"></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-String-object-03.png" alt=""></p>

<p>また1番目と2番目の引数は、マイナスの値を指定することもできます。マイナスの値を指定すると、文字列の最後から位置を指定します。たとえば「’桃太郎さん’」という文字列にマイナスの値で指定した位置を入れて表すと、「-5 桃 -4 太 -3 郎 -2 さ -1 ん 0」となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-String-object-04.png" alt=""></p>

<p>そのため<code>'桃太郎さん'.slice(-2)</code>と指定すると、「’桃太郎さん’」という文字列の-2番目から最後（0番目）までを取り出します。つまり、「’さん’」という文字列を取り出します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const name = <span class="string"><span class="delimiter">'</span><span class="content">桃太郎さん</span><span class="delimiter">'</span></span>;

console.log(name.slice(-<span class="integer">2</span>));
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-String-prototype-slice-3.png" alt="コンソールでString.prototype.slice()"></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-String-object-05.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 prototypeオブジェクト
</h3><p>このチャプターでは主に、組み込みオブジェクトのメソッドについて説明しました。これらのメソッドですが、正確には多くの場合、組み込みオブジェクトそのものに入っているわけではありません。多くの場合は、組み込みオブジェクトが参照する「prototypeオブジェクト」というオブジェクトに入っています。このように、あるオブジェクトから別のオブジェクトのメソッドなどを利用できるようにすることを、オブジェクトの <strong>継承</strong> と言います。</p>

<p>たとえばArrayオブジェクトの場合、slice・push・forEach・mapなどのメソッドはArrayオブジェクトそのものではなく、Arrayオブジェクトが参照するprototypeオブジェクトに入っています。</p>

<p>継承について理解することは、少し難しいです。そのためプログラミング初心者の段階では、JavaScriptに「prototypeオブジェクト」というものがあるということを、頭に入れておいてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 エラーとデバッグ
</h3><p>下の例ではsliceメソッドを <code>srice</code> と打ち間違えてしまったため、<code>Uncaught TypeError: '桃太郎'.srice is not a function at ...</code> というエラーが出ています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-typo-slice.png" alt="String.prototype.slice()のタイプミスによるエラー"></p>

<p>「<code>●● is not a function</code>」は、日本語に訳すと「●●は関数ではない」という意味です。「●●」の部分で呼び出している関数やメソッドの名前にタイプミスがないか、まず確認しましょう。</p>
</div></section><section id="chapter-6"><h2 class="index">6. JavaScriptでHTMLを書き換えてみよう
</h2><div class="subsection"><p>Cloud9に、新しくindex.htmlとmain.jsファイルを作成してください。ファイルが作成できたら、下のコードを入力してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>).textContent = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>コードが入力できたらファイルを保存して、<em>index.html</em>をプレビュー表示してみましょう。画面に<samp>こんにちは！</samp>と表示されましたか？HTMLファイル側に書いていなくても、JavaScriptを利用すれば後からテキストなどを表示できます。もちろん、これはサンプルコードなのでJavaScriptでできることを単純に表現していています。通常であればHTMLファイルに直接書いたほうが良いです。</p>

<p><em>main.js</em>の <code>=</code> は、右側の値を左側に代入する演算子です。<code>こんにちは！</code> の部分を変えて保存し、プレビューをリロードすると表示が変化します。試してみましょう。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/fegacar/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.7"></script></p>

<div class="alert alert-info">
JS Binでは、JavaScript欄に記述した命令が自動でHTMLの記述内容に埋め込まれてOutput欄で実行されますので、<code>&lt;script src="main.js"&gt;&lt;/script&gt;</code>をHTML欄の中に記述したり、<i>main.js</i>を用意したりする必要はありません。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 document.getElementById('box').textContentって？
</h3><p>もう一度<em>main.js</em>を見てみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>).textContent = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>さて、左辺の <code>document.getElementById('box').textContent</code> とは一体何なのでしょうか。これは、まずboxというidを持つ要素をHTMLから探し出します。今回の例では <code>&lt;div id="box"&gt;&lt;/div&gt;</code> が該当します。そして <code>&lt;div id="box"&gt;...&lt;/div&gt;</code> の <code>...</code> に入るテキストを <code>textContent</code> を使って置き換えています。結果としてこのdivは以下の状態になります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>こんにちは！<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-assign.png" alt="右辺を左辺に代入する"></p>

<p>document.getElementByIdメソッドなどで取得したHTMLの要素は、オブジェクトとして扱うことができます。この要素のオブジェクトに、プロパティやメソッドが用意されています。たとえば <code>textContent</code> は、要素のプロパティです。詳しくは<a href="javascript#chapter-7">7. DOM</a>で説明します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 時刻を表示してみよう
</h3><p><code>=</code> の右辺を以下のように変えてみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>).textContent = <span class="keyword">new</span> Date().toLocaleString();
</pre></div>
</div>
</div>

<p><em>index.html</em>をリロードしてください。現在時刻が表示されました。リロードするとそのたびに時刻が変わります。 <code>new Date().toLocaleString()</code> は現在時刻を取得する命令です。実行すると <code>=</code> の右辺が現在時刻に置き換えられ、左辺に代入されます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/mucunad/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 文字どうしをくっつける
</h3><p><code>A + B</code> と書くと文字列Aと文字列Bを連結できます。<em>main.js</em>を以下のように書き換えましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>).textContent = <span class="string"><span class="delimiter">'</span><span class="content">abc</span><span class="delimiter">'</span></span> + <span class="string"><span class="delimiter">'</span><span class="content">def</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>リロードすると「abcdef」と表示されます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/zapovux/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 数値計算をしてみよう
</h3><p><code>+</code> の左右を数字に置き換えると足し算になります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>).textContent = <span class="integer">1</span> + <span class="integer">2</span>;
</pre></div>
</div>
</div>

<p><em>index.html</em>をリロードすると「3」と表示されます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/gafuyil/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 イベント
</h3><p>HTML要素に対してイベントが発生した際に、JavaScriptで通知を受け取ることができます。イベントというのは、たとえば「ボタンがクリックされた」、「ページが読み込まれた」、「入力フォームが送信された」などの出来事のことです。</p>

<p>これらのイベントが発生したときに、あらかじめ設定した関数を実行できます。そのためには、<code>addEventListener</code> というメソッドを使います。</p>

<p>addEventListenerメソッドは、下図のように書きます。「DOM要素」というのは、今の段階では <code>&lt;div&gt;</code> や <code>&lt;button&gt;</code> などのHTML要素のことだと考えてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/addEventListener.png" alt=""></p>

<p>第１引数の「イベントの種類」は、<code>click</code> や <code>load</code>、<code>submit</code> などがあります。それぞれ「要素がクリックされた」、「ページが読み込まれた」、「入力フォームが送信された」ときなどに発生するイベントです。</p>

<p>第２引数の「イベントリスナー」は、イベントが発生したときに呼び出される関数のことです。第１引数のイベントが発生したときに、第２引数のイベントリスナーが呼び出されます。</p>

<p>以下で、addEventListenerメソッドを使った具体例を確認しましょう。</p>

<h4>clickイベント</h4>

<p>以下のコードではボタンをクリックしたとき、第２引数に渡したイベントリスナーが呼び出されます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>押して!<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-button</span><span class="delimiter">'</span></span>);

<span class="comment">// ボタンをクリックすると、イベントリスナーが実行される</span>
button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  alert(<span class="string"><span class="delimiter">'</span><span class="content">押された！</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/qacapuv/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードではaddEventListenerの第２引数に、イベントリスナーとしてアロー関数を渡しました。この関数は、<code>function</code> を使って以下のように書くこともできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-button</span><span class="delimiter">'</span></span>);

<span class="keyword">function</span> <span class="function">onAlert</span>() {
  alert(<span class="string"><span class="delimiter">'</span><span class="content">押された！</span><span class="delimiter">'</span></span>);
}

<span class="comment">// ボタンをクリックすると、イベントリスナーが実行される</span>
button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, onAlert);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/vikuvit/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>発生したイベントの情報を取得する</h4>

<p>イベントリスナーは呼び出されるとき、<strong>イベントオブジェクト</strong> が引数（実引数）として渡されます。このイベントオブジェクトには、発生したイベントの情報などが入っています。先ほどのclickイベントの例でも、イベントリスナーにイベントオブジェクトが渡されています。しかしイベントオブジェクトを使わなかったため、引数の記述を省略しています。</p>

<p>以下のコードではイベントオブジェクトを受け取るために、イベントリスナーに <code>e</code> という引数（仮引数）を加えました。なお仮引数と実引数については、<a href="javascript#chapter-4-6">4.6 関数</a>の【引数を受け取る関数】という項目で説明しています。これまで見てきた関数と同じく、イベントリスナーの引数名も何でも構いません。イベントオブジェクトが渡されるため、一般的には <code>e</code> や <code>evt</code>、または <code>event</code> といった引数名にすることが多いです。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>押して！<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-button</span><span class="delimiter">'</span></span>);

<span class="comment">// イベントリスナーが実行されるとき、イベントオブジェクトを渡される</span>
button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">イベントの種類：</span><span class="delimiter">'</span></span>, e.type);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kujozox/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ボタンをクリックすると、コンソールに「イベントの種類: click」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/e-type.gif" alt=""></p>

<p>発生したイベントの種類は、イベントオブジェクトの <code>type</code> プロパティに入っています。そのため上記のように書くと、クリックしたときにイベントの種類をデベロッパーツールで確認できます。</p>

<h4>mouseenter、mouseleaveイベント</h4>

<p>イベントオブジェクトから、イベントが発生したHTML要素を取得することもできます。イベントが発生した要素は、イベントオブジェクトの <code>target</code> プロパティに入っています。以下のコードでは、マウスが乗ったときと離れたときに発生するイベントに対して、イベントリスナーを登録しています。要素にマウスが乗るとmouseenter、マウスが離れるとmouseleaveイベントが発生します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;style&gt;</span>
<span class="inline">      <span class="id">#box</span> {
        <span class="key">width</span>: <span class="float">200px</span>;
        <span class="key">height</span>: <span class="float">200px</span>;
        <span class="key">line-height</span>: <span class="float">200px</span>;
        <span class="key">background-color</span>: <span class="color">#ccc</span>;
        <span class="key">text-align</span>: <span class="value">center</span>;
      }</span>
    <span class="tag">&lt;/style&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

<span class="comment">// マウスが乗った時</span>
box.addEventListener(
  <span class="string"><span class="delimiter">'</span><span class="content">mouseenter</span><span class="delimiter">'</span></span>,
  <span class="comment">// e.targetはイベント発生元の要素（&lt;div id="box"&gt;）</span>
  (e) =&gt; {
    e.target.textContent = <span class="string"><span class="delimiter">'</span><span class="content">マウスが乗った！</span><span class="delimiter">'</span></span>;
  },
);

<span class="comment">// マウスが離れた時</span>
box.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">mouseleave</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.target.textContent = <span class="string"><span class="delimiter">'</span><span class="content">マウスが離れた！</span><span class="delimiter">'</span></span>;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/vixicir/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>mouseenter、mouseleaveイベントが発生したときに、要素内のテキストを置き換えています。</p>

<h4>changeイベント</h4>

<p>changeイベントは、input要素、select要素、textarea要素の値が変わった時に発生します。</p>

<p>以下のようにselect要素に対して登録すると、ユーザーが選択項目を変えた時にイベントリスナーが実行されます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;select</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-select</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;option</span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Item 1<span class="tag">&lt;/option&gt;</span>
  <span class="tag">&lt;option</span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Item 2<span class="tag">&lt;/option&gt;</span>
  <span class="tag">&lt;option</span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">3</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Item 3<span class="tag">&lt;/option&gt;</span>
<span class="tag">&lt;/select&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const select = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-select</span><span class="delimiter">'</span></span>);

select.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">change</span><span class="delimiter">'</span></span>, (e) =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">value: </span><span class="delimiter">'</span></span>, e.target.value);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/pilisij/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-onchange-to-console.png" alt="onchangeイベントリスナーによるコンソール表示"></p>

<p>選択項目を変更すると、changeイベントが発生します。このときselect要素の値（<code>value</code>）は、選択されたoption要素のvalueプロパティの値になります。上記のコードでは <code>e.target.value</code> で、このselect要素の値を取得しています。</p>

<h4>submitイベント</h4>

<p>submitイベントは、フォームの送信ボタン（<code>&lt;input type="submit"&gt;</code> など）がクリックされたときに発生します。</p>

<p>たとえば以下のコードでは、フォームに入力された値をコンソールに表示します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-form</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">input-word</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">送信</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const input = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">input-word</span><span class="delimiter">'</span></span>);
const form = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-form</span><span class="delimiter">'</span></span>);

form.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">value: </span><span class="delimiter">'</span></span>, input.value);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/pebiroj/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p><code>input.value</code> でフォームに入力された値、つまり <code>&lt;input type="text" id="input-word"&gt;</code> の値を文字列として取得しています。</p>

<p><code>e.preventDefault();</code> は、フォームの送信を止めるために記述しています。フォームが送信されるとsubmitイベントが発生し、ページがリロード（再読み込み）されます。リロードされると、コンソールの表示が消えてしまいます。</p>

<h4>もともとの動きを止める</h4>

<p>上記のようにイベントリスナーに <code>e.preventDefault();</code> と書くと、もともとイベントに設定されている動きを止めることができます。「もともとイベントに設定されている動き」というのは、たとえば、form要素ならsubmitイベントが発生したときにフォームが送信され、ページがリロード（再読み込み）される動きのことです。他には、a要素なら、clickイベントが発生したときに動作するページ遷移（移動）です。</p>

<p>このように、イベントにもともと設定されている動きを止める際にも、<strong>イベントオブジェクト</strong> を利用します。<code>e.preventDefault();</code> は、イベントオブジェクトのメソッドである <code>preventDefault</code> を呼び出しています。</p>

<p>下記のコードでは、リンクがクリックされた際のページ遷移を止めています。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-link</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://techacademy.jp/</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  TechAcademy [テックアカデミー] | オンラインのプログラミングスクール
<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const link = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-link</span><span class="delimiter">'</span></span>);

link.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/fiwazoz/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>イベントリスナーでpreventDefaultメソッドを呼び出しているため、リンクをクリックしても本来の動きであるページ移動は行われません。</p>

<h4>バブリングフェーズ</h4>

<p>イベントは、イベントが発生した要素だけでなく、その上位の要素へも伝わります。イベントが発生した要素から、親要素へ。そしてさらにその親要素へと伝わっていくということです。イベントが上位の要素へと伝わる段階を「<strong>バブリングフェーズ</strong>」と言います。イベントという泡（バブル）が、発生元の要素から上位の要素へと上がっていくイメージです。</p>

<p>下記のコードで、実際に確認してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>イベントのバブリング<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;style&gt;</span>
<span class="inline">      <span class="id">#parent</span> {
        <span class="key">position</span>: <span class="value">relative</span>; <span class="comment">/* 子要素の絶対的な位置指定で、親要素が基準となるようにする */</span>
        <span class="key">width</span>: <span class="float">200px</span>;
        <span class="key">height</span>: <span class="float">200px</span>;
        <span class="key">background-color</span>: <span class="color">#ccffcc</span>;
      }

      <span class="id">#child</span> {
        <span class="comment">/* 中央寄せにする */</span>
        <span class="key">position</span>: <span class="value">absolute</span>; <span class="comment">/* position: relative;を指定した親要素を基準として、絶対的な位置を指定する */</span>
        <span class="key">top</span>: <span class="float">50%</span>; <span class="comment">/* topを親要素の中央位置にする */</span>
        <span class="key">left</span>: <span class="float">50%</span>; <span class="comment">/* leftを親要素の中央位置にする */</span>
        <span class="key">transform</span>: <span class="error">t</span><span class="error">r</span><span class="error">a</span><span class="error">n</span><span class="error">s</span><span class="error">l</span><span class="error">a</span><span class="error">t</span><span class="error">e</span>(<span class="float">-50%</span>, <span class="float">-50%</span>); <span class="comment">/* 自分自身の高さと幅の半分だけ、上と左にずらす*/</span>

        <span class="key">width</span>: <span class="float">100px</span>;
        <span class="key">height</span>: <span class="float">100px</span>;
        <span class="key">text-align</span>: <span class="value">center</span>;
        <span class="key">line-height</span>: <span class="float">100px</span>;
        <span class="key">background-color</span>: <span class="color">#ffccff</span>;
      }</span>
    <span class="tag">&lt;/style&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">parent</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      親要素
      <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">child</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        子要素
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const parent = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">parent</span><span class="delimiter">'</span></span>);
const child = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">child</span><span class="delimiter">'</span></span>);

parent.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">親要素のイベントリスナー</span><span class="delimiter">'</span></span>);
});
child.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">子要素のイベントリスナー</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p>Cloud9でプレビュー表示すると、ブラウザに以下のように表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-event-handler-1.png" alt="ブラウザの表示を確認する"></p>

<p>この親要素の部分をクリックすると、親要素のイベントが実行されます。そのためコンソールには、「親要素のイベントリスナー」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-event-handler-2.png" alt="console.logでイベントハンドラの実行を確認する"></p>

<p>次に、子要素の部分をクリックしてみます。するとコンソールには「子要素のイベントリスナー」だけでなく「親要素のイベントリスナー」も表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-event-handler-3.png" alt="console.logでイベントハンドラの実行を確認する"></p>

<p>クリックした子要素のイベントだけでなく、親要素のイベントも実行されているためです。言い換えると、イベントが子要素から親要素へと伝わっている、ということです。</p>

<p>発生したイベントは最終的に、ブラウザウインドウを表す <strong>Windowオブジェクト</strong> まで伝わります。</p>

<p>上記の子要素で発生したクリックイベントの場合、Windowオブジェクトまで <code>#child -&gt; #parent -&gt; body -&gt; html -&gt; document -&gt; window</code> という順番で伝わっていきます。</p>

<p>Windowオブジェクトについて詳しくは、<a href="javascript#chapter-7-3">7.3 Windowオブジェクト</a>をご確認ください。</p>

<div class="alert alert-info">
正確に言うと、イベントは発生元の要素から上位の要素へ伝わるだけではありません。上位の要素から発生元の要素へも伝わります。この段階を「キャプチャリングフェーズ」と言います。しかし実務でも、上位の要素から発生元の要素への伝わりを意識したり利用することは、ほとんどありません。そのため、まずは、イベントが発生元の要素から上位の要素へ伝わるバブリングフェーズを理解しましょう。
</div>

<h4>補足：transform : translate(-50%,-50%) について</h4>

<p>上記のCSSで、子要素を中央寄せにしている部分は少し難しく感じる方もいらっしゃるでしょう。特に、 <code>transform : translate(-50%,-50%);</code> という部分です。<code>transform : translate()</code> は要素の表示位置を移動させるために使います。 <code>translate()</code> の最初の引数で横方向、次の引数で縦方向の移動を指定しています。</p>

<p>よく分からない場合は、コードを以下のように変更してみてください。表示がどのように変わるか確認してみましょう。</p>

<ol>
  <li><code>transform : translate(-50%,-50%);</code> という記述をコメントアウトしてみる</li>
  <li><code>transform : translate(-25%,-25%);</code> のように、 <code>translate()</code> の値を変更してみる</li>
</ol>
</div><div class="subsection"><h3 class="index" id="chapter-6-6">6.6 ボタンを作ろう
</h3><p>HTMLにボタンを追加してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>押して！<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>上の内容だけではボタンを押しても何も起こらないので、<em>main.js</em>を以下のように書きましょう。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-button</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  box.innerHTML += <span class="string"><span class="delimiter">'</span><span class="content">どん！&lt;br&gt;</span><span class="delimiter">'</span></span>;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/sahazaz/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ボタンが押されたときに、clickイベントが発生します。ここでは <code>id="my-button"</code> のbutton要素でclickイベントが発生したら、イベントリスナーであるアロー関数が呼び出されるようにひも付けています。</p>

<p><code>innerHTML</code> を使うと、置き換える内容が <strong>HTMLとして</strong> 解釈されます。そのため上記のコードでは文字列の <code>'&lt;br&gt;'</code> が、br要素として挿入されます。HTMLとして解釈される点が、innerHTMLプロパティの特徴です。上記のコードでは <code>&lt;div id="box"&gt;...&lt;/div&gt;</code> の <code>...</code> に入る中身を置き換えています。一度ボタンを押すと、結果としてこのdivは以下の状態になります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>どん！<span class="tag">&lt;br&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><code>innerHTML</code> と似た働きをするのが、先ほど解説した <code>textContent</code> です。<code>innerHTML</code> との違いを確認するため、上記の<em>main.js</em>を <code>textContent</code> で書き換えてみましょう。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-button</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  box.textContent += <span class="string"><span class="delimiter">'</span><span class="content">どん！&lt;br&gt;</span><span class="delimiter">'</span></span>;
});
</pre></div>
</div>
</div>

<p>すると以下のように、文字列の<code>'&lt;br&gt;'</code>がそのまま表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/chapter-6_1.png" alt=""></p>

<p><code>textContent</code> を使うと、置き換える内容が <strong>テキストとして</strong> 解釈されるのです。</p>

<p>基本的には <code>textContent</code> を使い、置き換えたい内容にHTML要素が含まれる場合は <code>innerHTML</code> を使うと良いでしょう。ただし公開するWebサービスなどで、ユーザーが入力した文字をそのまま <code>innerHTML</code> で表示することは避けてください。セキュリティリスクになる可能性があります。</p>

<p>また上記の <code>box.textContent += 'どん！&lt;br&gt;';</code> というコードは、<code>A += B</code> という書き方をしています。これは <code>A = A + B</code> を省略した書き方です。文字列と一緒に使った場合は、<code>A</code> の既存の内容を消さずに <code>B</code> を後ろに追加します。</p>

<p>そのためボタンを押すたびに <code>box.innerHTML += 'どん！&lt;br&gt;';</code> が実行されて、boxの内容に <code>どん！&lt;br&gt;</code> というHTMLが追加されていきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-7">6.7 フォームに入力された値を受け取る
</h3><p>ファイルの中身を以下のように書き換えましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    お名前 <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-greeting</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>あいさつ<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-greeting</span><span class="delimiter">'</span></span>);
const input = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  box.textContent = <span class="error">`</span><span class="error">こ</span><span class="error">ん</span><span class="error">に</span><span class="error">ち</span><span class="error">は</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
});
</pre></div>
</div>
</div>

<p>フォームに名前を入力して完了ボタンを押すとメッセージが表示されました。<code>input.value</code> で、<code>id="name"</code> のinput要素に入力された値を文字列として取得しています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/hiduqum/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-8">6.8 if文で表示内容を切り替える
</h3><p><em>main.js</em>の中身を以下のように書き換えましょう。<em>index.html</em>は、先ほどと同じままです。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-greeting</span><span class="delimiter">'</span></span>);
const input = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const hour = <span class="keyword">new</span> Date().getHours();
  let greeting;

  <span class="comment">// 確認のため、コンソールに表示</span>
  console.log(<span class="error">`</span><span class="error">現</span><span class="error">在</span><span class="error">の</span><span class="error">時</span><span class="error">間</span><span class="error">：</span><span class="predefined">$</span>{hour}<span class="error">時</span><span class="error">`</span>);

  <span class="keyword">if</span> (hour &gt;= <span class="integer">6</span> &amp;&amp; hour &lt; <span class="integer">12</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">おはよう</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> <span class="keyword">if</span> (hour &gt;= <span class="integer">12</span> &amp;&amp; hour &lt; <span class="integer">18</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは</span><span class="delimiter">'</span></span>;
  }

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/nikecew/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p><code>new Date().getHours();</code> で現在時刻の「時」を整数値として取得しています。たとえば現在時刻が朝9時台なら、時は <code>9</code> になります。取得した値は <code>hour</code> という変数に代入して、確認のためコンソールに表示しています。</p>

<p>index.htmlをプレビュー表示して「あいさつ」というボタンを押すと、コンソールには以下のように表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-gethours.png" alt="現在の時間をコンソールに表示"></p>

<p>次に、if文を見てみましょう。if文ではhour変数の値によって、6時〜12時手前の間は「おはよう」、12時〜18時手前の間は「こんにちは」、それ以外の時間帯は全て「こんばんは」という文字列がgreeting変数に入るように条件分岐しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-9">6.9 複数のボタンを付ける
</h3><p>先ほどの<em>index.html</em>を編集して、ボタンを１つ追加しましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    お名前 <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-greeting</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>あいさつ<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-cheerful</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>元気にあいさつ<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>それぞれのボタンに機能を付けるため、<em>main.js</em>も以下のように書き加えます。押すボタンによって、表示するメッセージを少し変えています。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonGreeting = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-greeting</span><span class="delimiter">'</span></span>);
const buttonCheerful = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-cheerful</span><span class="delimiter">'</span></span>);
const input = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

buttonGreeting.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const hour = <span class="keyword">new</span> Date().getHours();
  let greeting;

  <span class="comment">// 確認のため、コンソールに表示</span>
  console.log(<span class="error">`</span><span class="error">現</span><span class="error">在</span><span class="error">の</span><span class="error">時</span><span class="error">間</span><span class="error">：</span><span class="predefined">$</span>{hour}<span class="error">時</span><span class="error">`</span>);

  <span class="keyword">if</span> (hour &gt;= <span class="integer">6</span> &amp;&amp; hour &lt; <span class="integer">12</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">おはよう</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> <span class="keyword">if</span> (hour &gt;= <span class="integer">12</span> &amp;&amp; hour &lt; <span class="integer">18</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは</span><span class="delimiter">'</span></span>;
  }

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
});

buttonCheerful.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const hour = <span class="keyword">new</span> Date().getHours();
  let greeting;

  <span class="comment">// 確認のため、コンソールに表示</span>
  console.log(<span class="error">`</span><span class="error">現</span><span class="error">在</span><span class="error">の</span><span class="error">時</span><span class="error">間</span><span class="error">：</span><span class="predefined">$</span>{hour}<span class="error">時</span><span class="error">`</span>);

  <span class="keyword">if</span> (hour &gt;= <span class="integer">6</span> &amp;&amp; hour &lt; <span class="integer">12</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">おはよう</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> <span class="keyword">if</span> (hour &gt;= <span class="integer">12</span> &amp;&amp; hour &lt; <span class="integer">18</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは</span><span class="delimiter">'</span></span>;
  }

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">！</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">！</span><span class="error">！</span><span class="error">！</span><span class="error">`</span>;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/guzoqip/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-10">6.10 関数を作る
</h3><p>時間帯によってあいさつを変更する処理を、関数として独立させてみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonGreeting = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-greeting</span><span class="delimiter">'</span></span>);
const buttonCheerful = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-cheerful</span><span class="delimiter">'</span></span>);
const input = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

const greet = () =&gt; {
  let greeting;
  const hour = <span class="keyword">new</span> Date().getHours();

  <span class="keyword">if</span> (hour &gt;= <span class="integer">6</span> &amp;&amp; hour &lt; <span class="integer">12</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">おはよう</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> <span class="keyword">if</span> (hour &gt;= <span class="integer">12</span> &amp;&amp; hour &lt; <span class="integer">18</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは</span><span class="delimiter">'</span></span>;
  }

  <span class="keyword">return</span> greeting;
};

buttonGreeting.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const greeting = greet();

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
});

buttonCheerful.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const greeting = greet();

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">！</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">！</span><span class="error">！</span><span class="error">！</span><span class="error">`</span>;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kipogof/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>アロー関数で定義した関数を、<code>greet</code> という変数に代入しています。上記のコードではこの関数の中で、時間帯によってあいさつの言葉を決めています。あいさつの言葉を <code>greeting</code> という変数に代入し、関数の戻り値として返しています。</p>

<p>このように重複する処理を関数にまとめると、コード全体の見通しがよくなります。また、コードの変更もしやすくなります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-11">6.11 処理を遅らせて実行
</h3><p>先ほどの<em>index.html</em>と<em>main.js</em>を編集して、ボタンをもう１つ追加しましょう。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    お名前 <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-greeting</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>あいさつ<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-cheerful</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>元気にあいさつ<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-late</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>遅れてあいさつ<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonGreeting = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-greeting</span><span class="delimiter">'</span></span>);
const buttonCheerful = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-cheerful</span><span class="delimiter">'</span></span>);
const buttonLate = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-late</span><span class="delimiter">'</span></span>);

const input = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">name</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

const greet = () =&gt; {
  let greeting;
  const hour = <span class="keyword">new</span> Date().getHours();

  <span class="keyword">if</span> (hour &gt;= <span class="integer">6</span> &amp;&amp; hour &lt; <span class="integer">12</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">おはよう</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> <span class="keyword">if</span> (hour &gt;= <span class="integer">12</span> &amp;&amp; hour &lt; <span class="integer">18</span>) {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
  } <span class="keyword">else</span> {
    greeting = <span class="string"><span class="delimiter">'</span><span class="content">こんばんは</span><span class="delimiter">'</span></span>;
  }

  <span class="keyword">return</span> greeting;
};

buttonGreeting.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const greeting = greet();

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
});

buttonCheerful.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;
  const greeting = greet();

  box.textContent = <span class="error">`</span><span class="predefined">$</span>{greeting}<span class="error">！</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">！</span><span class="error">！</span><span class="error">！</span><span class="error">`</span>;
});

buttonLate.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const name = input.value;

  setTimeout(() =&gt; {
    <span class="comment">// 1秒経過した後に実行される</span>
    box.textContent = <span class="error">`</span><span class="error">遅</span><span class="error">れ</span><span class="error">て</span><span class="error">ご</span><span class="error">め</span><span class="error">ん</span><span class="error">、</span><span class="predefined">$</span>{name}<span class="error">さ</span><span class="error">ん</span><span class="error">`</span>;
  }, <span class="integer">1000</span>);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/nilegaj/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>フォームに入力して「遅れてあいさつ」というボタンを押すと1秒後に、メッセージが表示されるようになりました。<code>setTimeout(関数, 時間)</code> という形で、タイマーを設定します。第２引数で指定した時間が経過した後に、第１引数の関数が実行されます。setTimeoutメソッドについては、チャプター4の<a href="javascript#chapter-4-14">4.14 非同期処理</a>でも学習しましたね。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-12">6.12 ループ（繰り返し処理）
</h3><p>新しく<em>index.html</em>と<em>main.js</em>ファイルを用意して、以下のように書いてみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

<span class="comment">// 10回繰り返す</span>
<span class="keyword">for</span> (let i = <span class="integer">1</span>; i &lt;= <span class="integer">10</span>; i++) {
  box.innerHTML += <span class="error">`</span><span class="predefined">$</span>{i}&lt;br&gt;<span class="error">`</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/zomutul/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>1から10までの数字が表示されました。</p>

<p><code>for</code> は繰り返し処理の命令です。<a href="javascript#chapter-4-8">4.8 配列とループ</a>で学習しましたね。以下のように書くのでした。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">for</span> (<span class="error">初</span><span class="error">回</span><span class="error">だ</span><span class="error">け</span><span class="error">実</span><span class="error">行</span><span class="error">す</span><span class="error">る</span><span class="error">処</span><span class="error">理</span>; <span class="error">ル</span><span class="error">ー</span><span class="error">プ</span><span class="error">継</span><span class="error">続</span><span class="error">条</span><span class="error">件</span>; <span class="error">毎</span><span class="error">ル</span><span class="error">ー</span><span class="error">プ</span><span class="error">後</span><span class="error">の</span><span class="error">処</span><span class="error">理</span>) {
  <span class="error">毎</span><span class="error">ル</span><span class="error">ー</span><span class="error">プ</span><span class="error">ご</span><span class="error">と</span><span class="error">に</span><span class="error">実</span><span class="error">行</span><span class="error">す</span><span class="error">る</span><span class="error">処</span><span class="error">理</span>
}
</pre></div>
</div>
</div>

<p>上記の<em>main.js</em>を見てください。まず <code>let i = 1;</code> によって変数iが作成されて、その値が1となります。継続条件が <code>i &lt;= 10</code> なので、<code>i</code> が10以下の間は <code>{ ... }</code> の内部が繰り返し実行されます。そして毎回のループの後で <code>i++</code> が実行されます。<code>i++</code> は <code>i = i + 1</code> と同じ意味で、<code>i</code> が1増えます。</p>

<p><code>i</code> が1から始まって2、3、…と増えていき10までループが繰り返され、11になったところで継続条件を満たさなくなり <code>for</code> ループを抜けます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-13">6.13 ランダム要素を入れてみよう
</h3><p>また新しくファイルを用意して、以下のコードを入力してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;p&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>くじを引く<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const button = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">my-button</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

button.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="comment">// 0以上1未満のランダムな数値をnum変数に代入する</span>
  const num = Math.random();

  <span class="keyword">if</span> (num &gt;= <span class="float">0.5</span>) {
    <span class="comment">// numが0.5以上の場合</span>
    box.innerHTML = <span class="error">`</span><span class="predefined">$</span>{num}&lt;br&gt;<span class="error">当</span><span class="error">た</span><span class="error">り</span><span class="error">！</span><span class="error">`</span>;
  } <span class="keyword">else</span> {
    <span class="comment">// numが0.5未満の場合</span>
    box.innerHTML = <span class="error">`</span><span class="predefined">$</span>{num}&lt;br&gt;<span class="error">ハ</span><span class="error">ズ</span><span class="error">レ</span><span class="error">…</span><span class="error">`</span>;
  }
});
</pre></div>
</div>
</div>

<p><code>Math.random()</code> は「0以上1未満のランダムな小数」に置き換わります。たとえば <code>0.13</code> とか <code>0.673</code> といった具合に、毎回ランダムな数になります。</p>

<p>そして <code>if (num &gt;= 0.5) { ...A... } else { ...B... }</code> で、numが0.5以上ならA、それ以外（0.5未満）ならBが実行されます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/yedelan/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-14">6.14 フォームの入力を受け取って足し算しよう
</h3><p>さて、今度は2つの値を入力すると足し算してくれるフォームを作ってみましょう。まず以下のように<em>index.html</em>と<em>main.js</em>を書き換えてみます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;form</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-form</span><span class="delimiter">"</span></span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">num1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">num2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-add</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>+<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonAdd = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-add</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);
const num1 = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">num1</span><span class="delimiter">'</span></span>);
const num2 = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">num2</span><span class="delimiter">'</span></span>);

buttonAdd.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const result = num1.value + num2.value;
  box.textContent = result;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/howufoz/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>実行してみると…何かがおかしいです。111と222をそれぞれ入力して+ボタンを押すと、333ではなく111222と表示されてしまいます。なぜでしょうか？</p>

<p>実は、<code>input要素.value</code> で受け取ったものは文字列なので、文字列どうしが単純に、前後にくっつけられてしまうのです。</p>

<table>
  <thead>
    <tr>
      <th>式</th>
      <th>結果</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>"111" + "222"</code></td>
      <td><code>"111222"</code></td>
      <td>文字列どうしの連結</td>
    </tr>
    <tr>
      <td><code>111 + 222</code></td>
      <td><code>333</code></td>
      <td>数値どうしの足し算</td>
    </tr>
    <tr>
      <td><code>111 + "222"</code></td>
      <td><code>"111222"</code></td>
      <td>片方が文字列だと結果も文字列になる</td>
    </tr>
  </tbody>
</table>

<p>文字列ではなく数値として足し算をしたい場合にはどうすればよいでしょうか。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonAdd = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">button-add</span><span class="delimiter">'</span></span>);
const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);
const num1 = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">num1</span><span class="delimiter">'</span></span>);
const num2 = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">num2</span><span class="delimiter">'</span></span>);

buttonAdd.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const numberNum1 = Number.parseFloat(num1.value);
  const numberNum2 = Number.parseFloat(num2.value);
  const result = numberNum1 + numberNum2;

  box.textContent = result;
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/penuhuz/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のように <code>Number.parseFloat(文字列)</code> とすると文字列が数値に変換され、ちゃんと足し算が行われます。</p>

<table>
  <thead>
    <tr>
      <th>変換処理</th>
      <th>式</th>
      <th>結果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>文字列から数値へ</td>
      <td><code>Number.parseFloat("111")</code></td>
      <td><code>111</code></td>
    </tr>
    <tr>
      <td>数値から文字列へ</td>
      <td><code>111 + ""</code></td>
      <td><code>"111"</code></td>
    </tr>
  </tbody>
</table>

<p>足し算をしてくれる電卓ができました。だいぶプログラムっぽくなってきましたね！</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-15">6.15 エラーとデバッグ
</h3><p>下の例では <code>console.log</code> を <code>consome.log</code> と打ち間違えてしまったため、<code>Uncaught ReferenceError: consome is not defined at ...</code> というエラーメッセージがコンソールに表示されています。実際に試して、表示内容を確認してみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-consome-log.png" alt="console.logのタイプミスによるエラー"></p>

<p>「<code>●● is not defined</code>」は、日本語に訳すと「●●は定義されていない」という意味です。「●●」の部分にタイプミスがないか、まず確認しましょう。</p>
</div></section><section id="chapter-7"><h2 class="index">7. DOM
</h2><div class="subsection"><p>DOMは、JavaScriptでHTMLを操作するために存在します。実はJavaScriptはHTMLを直接操作しているのではなく、DOMを通じて操作しています。DOMはJavaScriptとHTMLの間にあります。最初のうちは、DOMとHTMLは同じものだと認識しても問題ありません。ただし、DOMという単語はよく出てくるので、「JavaScriptがHTMLを操作するためにあるもの」として認識はしておきましょう。</p>

<p>DOMはDocument Object Modelの略で、ページ全体を <code>&lt;html&gt;</code> を根元として <code>&lt;body&gt;</code> や <code>&lt;div&gt;</code> のように枝分かれしていく1つの木構造（階層構造）とみなしたものです。<strong>DOMツリー</strong> とも呼ばれます。</p>

<p>DOMツリーを構成する <code>&lt;body&gt;</code> や <code>&lt;div&gt;</code> のような各要素を、<strong>DOM要素</strong> あるいは <strong>要素ノード</strong> と言います。ただし本来は「DOM要素」や「要素ノード」と呼ぶべき場合でも、簡略化して単に「要素」と呼ぶことが多いです。本カリキュラムでも特に必要がなければ、単に「要素」と呼びます。</p>

<p><em>DOMツリーの例</em></p>

<pre><code>html
├ head
│ ├ title
│ ├ meta
│ └ ...
└ body
     ├ header
     ├ main
     │ ├ div
     │ │ └ ...
     │ └ ....
     └ footer
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 DOM操作
</h3><p>JavaScriptからフォームに入力されたデータを取得したりHTMLを変更することを <strong>DOM操作</strong> と呼びます。</p>

<h4>要素を追加する</h4>

<p>以下のコードでは、新たにp要素を作成・追加しています。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;style&gt;</span>
<span class="inline">      <span class="class">.bordered</span> {
        <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#000</span>;
      }</span>
    <span class="tag">&lt;/style&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);

<span class="keyword">for</span> (let i = <span class="integer">0</span>; i &lt; <span class="integer">5</span>; i++) {
  const p = document.createElement(<span class="string"><span class="delimiter">'</span><span class="content">p</span><span class="delimiter">'</span></span>); <span class="comment">// p要素をつくる</span>

  p.textContent = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>; <span class="comment">// p要素の中に、テキストを入れる</span>
  p.setAttribute(<span class="string"><span class="delimiter">'</span><span class="content">class</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">bordered</span><span class="delimiter">'</span></span>); <span class="comment">// p要素にclass属性を追加する</span>
  box.appendChild(p); <span class="comment">// id="box"のdiv要素に、p要素を追加する</span>
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/zexatis/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-7-2">7.2 Documentオブジェクト
</h3><p>JavaScriptにあらかじめ用意された組み込みオブジェクトがあるように、ブラウザにもあらかじめ用意されたオブジェクトがあります。「ブラウザオブジェクト」と言います。</p>

<p>たとえば今までたくさん登場してきた <strong>document</strong> は、ページ全体を表す大元のブラウザオブジェクトです。 <code>document.getElementById('box')</code> はページの大元を起点として、そこから枝分かれしたページ全体の中から<code>id="box"</code>の要素を探します。</p>

<h4>GoogleのWebページの例</h4>

<p><a href="https://www.google.co.jp" target="_blank">Googleの日本サイト（google.co.jp）</a>のページにアクセスして、Documentオブジェクトを確認してみましょう。（注意：Chromeで「新しいタブ」を開いて最初に表示されるGoogleの検索画面ではありません。Googleのトップページへアクセスしてください。）</p>

<p>デベロッパーツールのコンソールを開き、<code>document</code>と入力してみましょう。すると、Documentオブジェクトが戻り値として返ってきます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/dom_obj_01-blue.png" alt=""></p>

<p><code>document.getElementById('searchform')</code> とすると、<code>id="searchform"</code> となっているdivを戻り値として取得できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/dom_obj_02-blue.png" alt=""></p>

<p>例えば、更にこの <code>searchform</code> に対して、テキストを加えてみましょう。</p>

<p>コンソールに以下のコードを入力・実行してみます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const form = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">searchform</span><span class="delimiter">'</span></span>); <span class="comment">// 検索フォームの要素（要素ノード）を取得する</span>

form <span class="comment">// 取得した要素を確認してみる</span>

const textNode = document.createTextNode(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>); <span class="comment">// 追加するテキスト（テキストノード）を作成する</span>

textNode <span class="comment">// 作成したテキストを確認してみる</span>

form.appendChild(textNode); <span class="comment">// 作成したテキストを、検索フォームの末尾に追加する</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/dom_obj_03.png" alt=""></p>

<p>このようなこともできます。これは自分のブラウザ上のみを変更しているので、リロード（再読み込み）すると消えます。Googleのサーバ上にあるページを操作しているわけではありません。</p>

<p>ここでの例はGoogleに限らずどのページでも動作するので、他のページでも試してみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-3">7.3 Windowオブジェクト
</h3><p>Documentオブジェクトのさらに上のブラウザオブジェクトとして、ブラウザウインドウを表す <strong>Window</strong> オブジェクトがあります。Documentオブジェクトは、実はWindowオブジェクトに属しています。そのため本来は <code>window.document</code> なのですが、<code>window.</code> は省略できるというルールがあるため <code>document</code> から書き始めても問題ありません。<code>window.document</code> と <code>document</code> は全く同じものを表します。</p>

<p>コンソールに <code>window</code> と入力してEnterを押してみましょう。左の矢印をクリックして開くと、Windowオブジェクトのプロパティやメソッドの中身を確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/dom_obj_04.png" alt=""></p>

<h4>ブラウザ情報を調べる</h4>

<p><code>window.navigator</code> メソッドを使うと、どんな種類のブラウザを使っているか、ウインドウの縦横サイズはいくつか、といった様々な情報を取得できます。<code>document</code> と同様に <code>window.</code> を省略できます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(navigator.userAgent);
</pre></div>
</div>
</div>

<p>ウインドウの幅と高さも取得できます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(window.innerWidth); <span class="comment">// ウインドウの幅</span>
console.log(window.innerHeight); <span class="comment">// ウインドウの高さ</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/dom_obj_05.png" alt=""></p>

<p>ウインドウの幅を狭めると、<code>window.innerWidth</code> の値が小さくなります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/dom_obj_06.png" alt=""></p>

<h4>alertやconsole.logも、ブラウザオブジェクトのメソッド</h4>

<p><code>alert</code> は、Windowオブジェクトのメソッドです。そのため、以下のように書くこともできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>window.alert(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>ただし <code>window.</code> は省略できるので、通常は <code>alert('こんにちは！');</code> と書きます。</p>

<p>また <code>console.log</code> は、Consoleというブラウザオブジェクトの、<code>log</code> というメソッドを表しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-4">7.4 参考サイト
</h3><p>テックアカデミーマガジンでは、DOM操作について動画でも解説しています。「テキストだけではよく分からない」という方や、「より深く理解したい」という方は、ぜひご覧ください。</p>

<p><a href="https://techacademy.jp/magazine/5638" target="_blank">JavaScriptでDOMを操作する方法【初心者向け】</a></p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-web-calc">課題：Web電卓の作成</h3><p>下記のHTMLをベースにして、それぞれのボタンが機能するように電卓を作ってみましょう。</p>

<p>Cloud9上で、 <em>web-calc</em>のフォルダを作成し、その中に制作物を含めてください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">num1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">num2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-add</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>+<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-sub</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>-<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-mul</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>*<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">button-div</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>/<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>ヒント</h4>

<p>まずは、下記の処理をそれぞれ関数にしてみましょう。</p>

<ul>
  <li>num1に入力された数値を受け取る</li>
  <li>num2に入力された数値を受け取る</li>
  <li>結果を<code>&lt;div id="box"&gt;</code>内に表示する</li>
</ul>

<p>具体的には上記それぞれの処理を、下記の3つの関数にしましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const getNum1 = () =&gt; {
  <span class="comment">// num1の数値を戻り値としてreturnする処理を書いてください</span>
};

const getNum2 = () =&gt; {
  <span class="comment">// num2の数値を戻り値としてreturnする処理を書いてください</span>
};

const showResult = (num) =&gt; {
  <span class="comment">// &lt;div id="box"&gt;にnumを表示する処理を書いてください</span>
};
</pre></div>
</div>
</div>

<p>たとえば足し算を機能させるには、上記で作成した関数を下記のように使います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>(<span class="error">＋</span><span class="error">ボ</span><span class="error">タ</span><span class="error">ン</span><span class="error">の</span><span class="error">要</span><span class="error">素</span>).addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const result = getNum1() + getNum2();
  showResult(result);
});
</pre></div>
</div>
</div>
</div></section><section id="chapter-8"><h2 class="index">8. undefinedとなる場合
</h2><div class="subsection"><p><code>undefined</code> については、<a href="javascript#chapter-4-11">4.11 undefined</a>でも説明しました。値が <code>undefined</code> となるのは、チャプター４で説明した「値が定義されていない場合」だけではありません。</p>

<p>コンソールでコードを実行すると、「undefined」と表示されることがよくあります。</p>

<p>たとえば、コンソールに以下のように入力・実行してみます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const hello = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>上記のコードをコンソールで実行すると、<code>undefined</code> と表示されます。これはコンソールに入力して実行したコードが、<strong>結果を返していない</strong> からです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-console-hello.png" alt="コードの実行結果が戻り値を返さない場合"></p>

<p>ちなみに、コンソールに以下のように入力・実行してみてください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="integer">1</span> + <span class="integer">1</span>
</pre></div>
</div>
</div>

<p>上記のコードをコンソールで実行すると、「2」と表示されます。これはコンソールに入力して実行したコードが計算されて、その結果を返しているからです。このように結果の値が得られるものを、<strong>式</strong> と言います。</p>

<p>式は変数に代入できます。先ほど見た <code>const hello = 'こんにちは！';</code> というコードでは、<code>'こんにちは！'</code> が式です。この式から「こんにちは！」という文字列が得られます。そして得られた文字列を、<code>hello</code> という変数に代入しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 メソッドや関数の場合
</h3><p>次に、メソッドの場合を確認しましょう。コンソールに以下のように入力・実行してみます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>alert(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-return-undefined-2.png" alt="undefinedが返される場合"></p>

<p>実行するとまずダイアログに「こんにちは！」と表示されます。そしてダイアログを閉じると、コンソールに「undefined」と表示されます。<code>alert('こんにちは！');</code> の場合は、alertメソッドが <strong>returnで戻り値を返していない</strong> ということを示しています。なおアロー関数で関数を自作する場合、関数本体の処理が一文だけのときは <code>return</code> を省略できます。処理の実行結果が、そのまま戻り値となるためです。</p>

<p><code>alert</code> だけでなく、<code>console.log</code> でも同様です。コンソールに以下のように入力・実行してみます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>console.log(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-return-undefined-3.png" alt="undefinedが返される場合"></p>

<p>最初に表示される「こんにちは！」は、<code>console.log('こんにちは！');</code> が呼び出されたことにより表示されています。</p>

<p>そして「こんにちは！」の次に、「undefined」と表示されます。これは先ほどと同じく、実行したメソッドが<code>return</code> で戻り値を返していないためです。</p>

<p><code>console.log</code> や <code>alert</code> だけでなく、自作の関数でも同様です。たとえばコンソールで、以下のアロー関数を実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const alertHello = () =&gt; { <span class="comment">// 関数を定義する</span>
  alert(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
}

alertHello(); <span class="comment">// 関数を呼び出す</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-return-undefined-4.png" alt="undefinedが返される場合"></p>

<p>実行するとまずダイアログに「こんにちは！」と表示されます。そしてダイアログを閉じると、コンソールに <code>undefined</code> と表示されます。これもやはり、実行した関数が <code>return</code> で戻り値を返していないためです。</p>

<p>次に、コンソールでsliceメソッドを実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="string"><span class="delimiter">'</span><span class="content">桃太郎さん</span><span class="delimiter">'</span></span>.slice(<span class="integer">1</span>, <span class="integer">3</span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-return-undefined-5.png" alt="undefinedが返される場合"></p>

<p>今度は、コンソールにundefinedと表示されません。その代わりに、「”太郎”」という文字列が表示されます。これは、sliceメソッドが戻り値を返していることを示しています。この戻り値が、コンソールに表示されています。</p>

<p>自作の関数でも同様です。たとえばコンソールに、以下のアロー関数をコピー&amp;ペーストして実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const suido = () =&gt; <span class="string"><span class="delimiter">'</span><span class="content">水</span><span class="delimiter">'</span></span>; <span class="comment">// 戻り値を返す</span>

suido(); <span class="comment">// 関数を呼び出す</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-return-undefined-6.png" alt="undefinedが返される場合"></p>

<p>sliceメソッドと同じく、コンソールに「undefined」と表示されません。その代わりアロー関数の戻り値である「”水”」という文字列が表示されています。</p>

<p>なおアロー関数本体の処理が一文だけで、戻り値を返すだけの場合、 <code>{}</code>（中括弧）を省略できます。<code>{}</code> を省略した場合、<code>return</code> も不要です。処理の実行結果が、そのまま戻り値となります。<code>{}</code> を省略しない場合、以下のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const suido = () =&gt; {
  <span class="keyword">return</span> <span class="string"><span class="delimiter">'</span><span class="content">水</span><span class="delimiter">'</span></span>; <span class="comment">// 戻り値を返す</span>
};

suido(); <span class="comment">// 関数を呼び出す</span>
</pre></div>
</div>
</div>

<p>ここまでをまとめます。オブジェクトのメソッドや関数をコンソールで呼び出したとき、コンソールに「undefined」と表示される場合と、表示されない場合があります。その違いは、メソッドや関数が戻り値を <code>return</code> で返すかどうかの違い、ということです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 プロパティや変数の場合
</h3><p>コンソールに「undefined」と表示されるのは、関数やメソッドを呼び出した場合だけではありません。値の入っていない変数や、存在しないオブジェクトのプロパティにアクセスしたときも、「undefined」と表示されます。</p>

<p>たとえばコンソールに、以下のように入力・実行してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const person = {
  <span class="key">name</span>: <span class="string"><span class="delimiter">"</span><span class="content">桃太郎</span><span class="delimiter">"</span></span>,
  <span class="key">age</span>: <span class="integer">7</span>
};

person.friend;
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-return-undefined-7.png" alt="undefinedが返される場合"></p>

<p>コンソールに「undefined」と表示されます。これは、personオブジェクトに<code>friend</code>というプロパティが存在しないためです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 undefinedとなる場合のまとめ
</h3><p>JavaScriptでundefinedとなるのは、以下のような場合です。</p>

<ol>
  <li>コンソールに入力して実行したコードが、結果を返していない</li>
  <li>呼び出したメソッドや関数が、<code>return</code> で戻り値を返していない</li>
  <li>アクセスした変数に、値がセットされていない</li>
  <li>アクセスしたオブジェクトのプロパティが、存在していない</li>
</ol>
</div></section><section id="chapter-9"><h2 class="index">9. 変数のスコープ
</h2><div class="subsection"><p>変数には色々な役割があります。例えば、一時的に計算結果を保存するためだけの変数もあれば、とても大事な設定値（例えばそのユーザが管理者かどうかを判定するための変数）などもあります。</p>

<p>重要な変数が、簡単にどこからでもコード上でアクセスできてしまうのは、怖いです。例えば、開発者Aさんがユーザの管理者判定のための変数をどこからでもアクセスできるようにしてしまったとします。このとき開発者Bさんがその変数を知らずに気付かず変更してしまうと、サイトのユーザ全員が管理者権限を持ってアクセスできてしまうような恐怖の事態に陥ることも考えられます。</p>

<p>重要な変数はみんなが重要だとひと目でわかるコード内だけで、アクセスできるようにしたほうが良いでしょう。</p>

<p>JavaScriptでは、変数のアクセスできる範囲を限定できます。例えば、重要なものは一部のコード内でだけアクセス可能、という設定ができます。</p>

<p>変数のアクセスできる範囲のことをスコープと言います。変数は定義された時点で、そのスコープ（その変数にアクセスできる範囲）が決まります。</p>

<p>JavaScriptには、主に以下の３つのスコープがあります。</p>

<ul>
  <li>グローバルスコープ</li>
  <li>関数スコープ</li>
  <li>ブロックスコープ</li>
</ul>

<p>まずはグローバルスコープと関数スコープについて、具体例をみていきましょう。</p>

<div class="alert alert-warning">
コードをコンソールで実行する場合、実行するごとにWebページをリロード（再読み込み）するようにしましょう。コンソールで複数回コードを入力・実行していると、以前に実行したコードの影響でうまく動作しないことがあります。WindowsではF5キー、MacではCommandとRキーを押すことでリロードできます。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 グローバルスコープと関数スコープ
</h3><p>グローバルスコープの変数とは、JavaScriptのコード内全体でアクセスできる変数のことです。関数スコープの変数とは、その関数内でアクセスできる変数のことです。</p>

<p>下記のプログラムで <code>foo</code> という変数を定義してみます。この <code>foo</code> は、グローバルスコープに定義された変数です。JavaScriptのコード内全体でアクセスできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const foo = <span class="string"><span class="delimiter">'</span><span class="content">global</span><span class="delimiter">'</span></span>;  <span class="comment">// グローバルスコープ</span>
console.log(foo);  <span class="comment">// 表示される</span>
</pre></div>
</div>
</div>

<p>上記の場合、ブラウザのコンソールで内容を確認すると、<code>global</code> という文字列が表示されます。</p>

<p>では次に、<code>foo</code> を適当に作った <code>handleFoo</code> という関数の中に入れてみます。そして <code>handleFoo();</code> を呼び出して、<code>console.log(foo);</code> で確認します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const handleFoo = () =&gt; {
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>; <span class="comment">// 関数スコープ</span>
};

handleFoo();
console.log(foo); <span class="comment">// 表示されない</span>
</pre></div>
</div>
</div>

<p>このコードを実行すると、 <code>Uncaught ReferenceError: foo is not defined</code> (訳: fooが定義されていません) とエラーが表示されます。つまり、<code>console.log(foo);</code> を実行しているところでは、<code>foo</code> は定義されていない（変数にアクセスできない）のです。</p>

<p>今度は、 <code>console.log(foo);</code> を関数の中に移動してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const handleFoo = () =&gt; {
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>; <span class="comment">// 関数スコープ</span>
  console.log(foo); <span class="comment">// 表示される</span>
};

handleFoo();
</pre></div>
</div>
</div>

<p>これを実行すると、コンソールに <code>local</code> と表示されます。ここでは同じ関数スコープ内なので、変数にアクセスできるということです。</p>

<p>またグローバルスコープの変数には、関数スコープからもアクセス可能です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const foo = <span class="string"><span class="delimiter">'</span><span class="content">global</span><span class="delimiter">'</span></span>; <span class="comment">// グローバルスコープ</span>

const handleFoo = () =&gt; {
  console.log(foo); <span class="comment">// 表示される</span>
};

handleFoo();
</pre></div>
</div>
</div>

<p>グローバルスコープと関数スコープの組み合わせも見てみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const foo = <span class="string"><span class="delimiter">'</span><span class="content">global</span><span class="delimiter">'</span></span>; <span class="comment">// グローバルスコープ</span>

const handleFoo = () =&gt; {
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>; <span class="comment">// 関数スコープ</span>
  console.log(foo); <span class="comment">// 'local'が表示される（同じ変数名だと関数スコープが優先される）</span>
};

handleFoo();
console.log(foo); <span class="comment">// 'global'が表示される</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 グローバルスコープとブロックスコープ
</h3><p>ブロックスコープの変数とは、ブロック内で定義された変数のことです。ブロックというのは、<code>{...}</code>（波括弧）で囲んだ範囲のことです。</p>

<p><code>foo</code> 変数を、適当に作ったブロックの中に入れてみます。そしてグローバルスコープから、<code>foo</code> にアクセスしてみます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>;  <span class="comment">// ブロックスコープ</span>
}

console.log(foo);  <span class="comment">// 表示されない</span>
</pre></div>
</div>
</div>

<p>これを実行すると、 <code>Uncaught ReferenceError: foo is not defined</code> (訳: fooが定義されていません) とエラーが表示されます。つまり関数スコープと同様に、<code>console.log(foo);</code> を実行しているところでは、<code>foo</code> は定義されていない（変数にアクセスできない、見えない）のです。</p>

<p>では次に、 <code>console.log(foo);</code> をブロックの中に移動してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>;  <span class="comment">// ブロックスコープ</span>
  console.log(foo);  <span class="comment">// 表示される</span>
}
</pre></div>
</div>
</div>

<p>これを実行すると、コンソールに <code>local</code> と表示されます。ここでは同じブロックスコープ内なので、変数にアクセスできるということです。</p>

<p>またグローバルスコープの変数には、ブロックスコープからもアクセス可能です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const foo = <span class="string"><span class="delimiter">'</span><span class="content">global</span><span class="delimiter">'</span></span>;  <span class="comment">// グローバルスコープ</span>

{
  console.log(foo);  <span class="comment">// 表示される</span>
}
</pre></div>
</div>
</div>

<p>グローバルスコープとブロックスコープの組み合わせも見てみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const foo = <span class="string"><span class="delimiter">'</span><span class="content">global</span><span class="delimiter">'</span></span>;  <span class="comment">// グローバルスコープ</span>

{
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>;  <span class="comment">// ブロックスコープ</span>
  console.log(foo);  <span class="comment">// 'local'が表示される（同じ変数名だと関数スコープが優先される）</span>
}

console.log(foo);  <span class="comment">// 'global'が表示される</span>
</pre></div>
</div>
</div>

<p>ブロックスコープは、if文やfor文などの <code>{...}</code>にも適用されます。</p>

<p>以下のコードをコンソールで実行して、どのように表示されるか確認してみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const foo = <span class="string"><span class="delimiter">'</span><span class="content">global</span><span class="delimiter">'</span></span>;

<span class="keyword">if</span> (<span class="predefined-constant">true</span>) {
  const foo = <span class="string"><span class="delimiter">'</span><span class="content">local</span><span class="delimiter">'</span></span>;
  console.log(foo);
}

console.log(foo);
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 スコープの違いのまとめ
</h3><p>機能的には、グローバルスコープはどこからでもアクセス可能です。それに対して関数スコープやブロックスコープは、定義された関数やブロック内でだけアクセス可能です。</p>

<p>方針としては、長い行数のJavaScriptになってくるとグローバルスコープの変数は定義しない方が良いです。変数はできるだけ、関数スコープやブロックスコープ内で定義しましょう。</p>
</div></section><section id="chapter-10"><h2 class="index">10. 開発を支援する機能
</h2><div class="subsection"><p>Cloud9には、プログラミングを支援する機能がいくつか用意されています。ここでは2つを紹介します。なおこれらの機能は、Cloud9だけでなく他の多くのエディタでも利用できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-1">10.1 Linter（リンター）
</h3><h4>Linter（リンター）とは</h4>

<p>Linterというのは、決められたルールに基づいてコードをチェックしてくれるツールです。ルールに違反していれば、エラーメッセージなどで教えてくれます。Linterのルールは、自分で設定できます。たとえばインデントについてや、文字列にダブルクォーテーションとシングルクォーテーションのどちらを使うか、などが設定できます。</p>

<p>このようなルールを設定してコードをチェックすることには、以下のような利点があります。</p>

<ul>
  <li><strong>書き方を統一する</strong> ：インデントのスペースを半角スペース何個にするかなど、コードの書き方を統一できます。特に複数人でコードを書く場合、書き方がバラバラだと読みづらくなり、不毛な言い争いが起きたりします。</li>
  <li><strong>バグを防ぐ</strong> ：変数や関数を重複して定義したり、決して実行されない処理を書いてしまうなど、間違っている可能性の高いコードを事前にチェックできます。</li>
  <li><strong>プログラマが楽をする</strong>：文法や書き方のチェックは、人間（プログラマ）より機械（プログラム）の方がずっと得意です。機械の方が得意なことは、機械に任せましょう。そして人間は、機械にできないことで価値を生み出しましょう。</li>
</ul>

<h4>ESLintを設定する</h4>

<p>Linterには、いくつかの種類があります。その中で、ここでは「ESLint」というLinterを使います。ESLintは、Cloud9で簡単に利用できます。利用するにはまず、ワークスペース直下の<code>Frontend_名.姓</code>フォルダに、<code>.eslintrc</code>というファイルを作成します。これがESLintの設定ファイルになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-eslint-1.png" alt=".eslintrcの作成"></p>

<p>作成したファイルに、下のコードをコピー＆ペースして保存します。</p>

<p><em>.eslintrc</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key"><span class="delimiter">"</span><span class="content">env</span><span class="delimiter">"</span></span>: { <span class="comment">// コードが実行される環境を設定する</span>
    <span class="key"><span class="delimiter">"</span><span class="content">browser</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span>, <span class="comment">// ブラウザで実行する</span>
    <span class="key"><span class="delimiter">"</span><span class="content">es6</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span> <span class="comment">// ES6の機能を使う</span>
  },
  <span class="key"><span class="delimiter">"</span><span class="content">globals</span><span class="delimiter">"</span></span>: { <span class="comment">// グローバルスコープの変数を追加する</span>
      <span class="key"><span class="delimiter">"</span><span class="content">$</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span>, <span class="comment">// jQuery</span>
      <span class="key"><span class="delimiter">"</span><span class="content">MobileDetect</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span>, <span class="comment">// Lesson6で使う外部ライブラリ</span>
      <span class="key"><span class="delimiter">"</span><span class="content">firebase</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span>, <span class="comment">// Lesson8で使う外部ライブラリ</span>
      <span class="key"><span class="delimiter">"</span><span class="content">moment</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span>, <span class="comment">// Lesson8で使う外部ライブラリ</span>
      <span class="key"><span class="delimiter">"</span><span class="content">Vue</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span>, <span class="comment">// Lesson9で使う外部ライブラリ</span>
      <span class="key"><span class="delimiter">"</span><span class="content">VueCarousel</span><span class="delimiter">"</span></span>: <span class="predefined-constant">true</span> <span class="comment">// Lesson9で使う外部ライブラリ</span>
  },
  <span class="key"><span class="delimiter">"</span><span class="content">rules</span><span class="delimiter">"</span></span>: { <span class="comment">// ESLintのルールを設定する</span>
    <span class="key"><span class="delimiter">"</span><span class="content">indent</span><span class="delimiter">"</span></span>: [<span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="integer">2</span>], <span class="comment">// インデントを半角スペース２つにする</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-dupe-args</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// 関数に、重複する引数を定義しない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-dupe-keys</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// オブジェクトに、重複するプロパティ名を定義しない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-func-assign</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>,  <span class="comment">// 関数を上書き（再代入）しない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-redeclare</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// 変数を重複して宣言しない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-const-assign</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// constで定義した変数に、値を再代入しない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-return-assign</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// returnするときに、代入演算子の「=」を使わない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-unexpected-multiline</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// 紛らわしい箇所で、改行をしない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-unreachable</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// returnの後など、実行されないコードを書かない</span>
    <span class="key"><span class="delimiter">"</span><span class="content">no-unused-expressions</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span>, <span class="comment">// 使わない値を計算したり、連結したりしない</span>
  }
}
</pre></div>
</div>
</div>

<p>上記の設定ファイルについて、詳しくは公式ドキュメントを参照してください。ただしプログラミング初心者の段階では、あまり理解できなくても問題ありません。</p>

<ul>
  <li><a href="https://eslint.org/docs/user-guide/configuring" target="_blank">Configuring ESLint</a></li>
  <li><a href="https://eslint.org/docs/rules/" target="_blank">Rules</a></li>
</ul>

<p><a href="https://eslint.org/docs/rules/" target="_blank">Rules</a>には、ESLintで設定できるルールの一覧が記載されています。英語ですが、どのようなコードがルールに反するのか具体例も載っています。</p>

<h4>エラーを確認する</h4>

<p><em>.eslintrc</em>を作成したら、実際にJavaScriptのコードを確認してみましょう。例として、以下のコードを確認してみます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  const very = <span class="string"><span class="delimiter">'</span><span class="content">とても</span><span class="delimiter">'</span></span>;

const hokkaido = () =&gt; {
  const very = <span class="string"><span class="delimiter">'</span><span class="content">なまら</span><span class="delimiter">'</span></span>;
  very + <span class="string"><span class="delimiter">'</span><span class="content">!</span><span class="delimiter">'</span></span>;
  console.log(very);
}

const okayama = {
  <span class="key">hero</span>: <span class="string"><span class="delimiter">'</span><span class="content">鬼</span><span class="delimiter">'</span></span>,
  <span class="key">hero</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
};

console.log
(very);

hokkaido();

hokkaido = okayama;
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-eslint-2-original.png" alt="ESLintによるエラー"></p>

<p>左端に表示されている赤いバツ印は、すべてESLintによって検知されたエラーです。この赤いバツ印にマウスを載せると、エラーメッセージが表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-eslint-3.png" alt="ESLintによるエラー"></p>

<p>それぞれのエラーメッセージの意味は、以下の通りです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-eslint-2.png" alt="ESLintによるエラー"></p>

<p>以下は、エラーを修正したコードです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const very = <span class="string"><span class="delimiter">'</span><span class="content">とても</span><span class="delimiter">'</span></span>;

const hokkaido = () =&gt; {
  const localVery = <span class="string"><span class="delimiter">'</span><span class="content">なまら</span><span class="delimiter">'</span></span>;
  const localVeryMuch = <span class="error">`</span><span class="predefined">$</span>{localVery}!<span class="error">`</span>;
  console.log(localVeryMuch);
};

const okayama = {
  <span class="key">hero</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
};

console.log(very);

hokkaido();

okayama.very = <span class="string"><span class="delimiter">'</span><span class="content">ぼっけぇ</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-eslint-4.png" alt="ESLintによるエラーを修正したコード"></p>
</div><div class="subsection"><h3 class="index" id="chapter-10-2">10.2 コードフォーマッター
</h3><p>コードフォーマッターというのは、決められたルールに基づいてコードを綺麗に整形してくれる機能です。</p>

<p>Cloud9では、以下の手順でコードフォーマッターを利用できます。</p>

<ol>
  <li>ワークスペース左上の「Edit」をクリック</li>
  <li>開いたメニューの一番下にある「Code Formatting」をクリック</li>
  <li>さらに開いたメニューの「Apply Code Formatting」をクリック</li>
</ol>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/javascript/3-cloud9-codefomatter.png" alt="コードフォーマッターの使用方法"></p>

<p>たとえば以下のコードを見てください。インデントが整っておらず、とても読みづらいコードです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-misaligned-code.png" alt="インデントの崩れたコード"></p>

<p>コードフォーマッターを利用して、インデントを整えます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/javascript/3-aligned-code.png" alt="インデントを整えたコード"></p>

<p>インデントを整えたことで、とても読みやすくなりました。前のチャプターで学んだ関数スコープも、分かりやすくなっています。</p>
</div></section><section id="chapter-11"><h2 class="index">11. 更に学習したい場合に
</h2><div class="subsection"><h3 class="index" id="chapter-11-1">11.1 検索
</h3><p>ある機能を実装したいけどやり方がわからない場合、Googleで検索するとサンプルコードを入手できる場合が多いです。</p>

<p>その際には、キーワードの選定が重要になります。「マウスオーバー」というキーワードを知っていると、マウスオーバーに関するJavaScriptのサンプルコードを手に入れやすくなりますが、知らないときは「<code>マウス 乗せる</code>」といった内容で検索してマウスオーバーというキーワードを見つけましょう。</p>

<p>もちろん、メンターに質問しても良いです。</p>

<p>知っているキーワードを増やしていくと、解決することがどんどん多くなります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-2">11.2 参考サイト
</h3><p>参考サイトの活用方法は2通りあります。</p>

<ul>
  <li>内容を深く理解したい</li>
  <li>要素の一覧を見たい（検索用にキーワードを見つけることもできる）</li>
</ul>

<p>学んだもの以上に使いこなしたくなったときは、参考サイトを活用していきましょう。</p>

<p>JavaScriptの参考サイトとしては</p>

<ul>
  <li><a href="http://www.tohoho-web.com/js/index.htm" target="_blank">とほほのJavaScript</a></li>
  <li><a href="https://jsprimer.net/" target="_blank">JavaScriptの入門書 #jsprimer</a></li>
</ul>

<p>が良くまとまっています。たとえば、- <a href="https://jsprimer.net/basic/function-declaration/#arrow-function" target="_blank">[ES2015] Arrow Function</a>を見ると、アロー関数について詳しく解説されています。</p>

<p>といっても、上記サイトが全ての一覧を載せているわけではありません。最も充実した参考サイトとしてMDN (Mozilla Developer Network) があります。</p>

<ul>
  <li><a href="https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference" target="_blank">JavaScript リファレンス - JavaScript | MDN</a></li>
  <li><a href="https://developer.mozilla.org/ja/docs/Web/Events" target="_blank">イベントリファレンス | MDN</a></li>
  <li><a href="https://developer.mozilla.org/ja/docs/Web/API/Document_Object_Model" target="_blank">ドキュメントオブジェクトモデル (DOM) - Web API | MDN</a></li>
</ul>

<p>MDNはFirefoxというブラウザを開発している組織の公式ドキュメント集です。ここには多くのドキュメントが掲載されています。（一部英語のみ）</p>
</div></section><section id="chapter-12"><h2 class="index">12. まとめ
</h2><div class="subsection"><p>JavaScriptには本レッスンで紹介した以外にも様々な機能があります。文法をすべてマスターしようとするよりも、実際にWebページを作っていく上で必要になることをその都度学んでいく方が効率は良いので、最初からすべて覚える必要はありません。すべての文法を覚えていなくても充分リッチサイトは作れます。外国語のテストとは違って、自分にとって必要な機能だけ覚えておけば大丈夫です。</p>

<p>Web上にはJavaScriptのサンプルコードがたくさんあふれているので、何かやりたいことを思いついたり、わからないことがあればすぐ検索してみましょう。</p>
</div></section></div>
</body>
</html>