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
<div class="markdown"><div class="lesson-num p">Lesson2</div><h1 id="html-css">HTML/CSS
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>このレッスンではWebアプリケーションを作成する上で必要な知識のうち、ブラウザに表示される内容を作成するための言語であるHTMLとCSSを学びます。HTMLはWebページにおける <strong>文書（情報のまとめ役）</strong> を担当し、CSSはWebページにおける <strong>デザイン（見た目）</strong> を担当します。</p>

<p>まずは簡単なWebサイトを制作していく中でHTMLとCSSを学び、Webアプリケーション開発の基礎を身につけてください。</p>
</div></section><section id="chapter-2"><h2 class="index">2. Webページが表示される仕組み
</h2><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Webブラウザについて（おさらい）
</h3><p>Webブラウザとは、Webサイトを閲覧するためのアプリケーションです。単にブラウザと呼ばれています。</p>

<p>有名なWebブラウザを挙げると</p>

<ul>
  <li>Edge</li>
  <li>Internet Explorer</li>
  <li>Google Chrome</li>
  <li>Safari</li>
  <li>Firefox</li>
</ul>

<p>などです。</p>

<p>どのWebブラウザも、Webサイトを閲覧することが最も重要な機能となっています。それだけでは同じアプリになってしまうので、各Webブラウザは、より高速なWebページ表示や、独自機能などを開発することで優位性を保とうとしています。</p>

<p>それでは、ブラウザが表示しているWebページとは何でしょうか？</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 Webページの構成
</h3><p>Webページは、</p>

<ul>
  <li>HTML</li>
  <li>CSS</li>
  <li>JavaScript</li>
  <li>その他リソースファイル（画像など）</li>
</ul>

<p>によって構成されています。</p>

<p>HTMLはWebページにおける<strong>文書（情報のまとめ役）</strong>を担当します。Webページを表示する場合に、HTMLは起点となります。CSS、JavaScript、リソースファイルもHTMLによって統合されます。</p>

<p>CSSはWebページにおける<strong>デザイン（見た目）</strong>を担当します。デザインとはWebページのレイアウトや色、背景、フォントのことです。</p>

<p>下記の2つのキャプチャを見比べて見てください。上がHTMLだけのWebページ、下がCSSをHTML文書に適用したWebページです。上に比べて下は見た目がキレイにデザインされています。わかりやすいのは、メニューリストでしょう。HTMLだけの方は「HOME」や「講座案内」が普通の箇条書きなのに対して、CSSを適用させたWebページでは色がついてボタンのようになっています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen-html.png" alt=""><br>
<em>HTML文書だけのWebページ</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen.png" alt=""><br>
<em>HTML文書にCSSを適用したWebページ</em></p>

<p>JavaScriptは、ブラウザ上で使用できる唯一のプログラミング言語です。JavaScriptを使用すると、HTMLやCSSを動的に操作できるようになります。マウスのクリックなどのイベントに反応して、ある情報を表示させたり非表示にしたりの制御ができるようになります。なお、HTMLやCSSは言語といってもプログラミング言語ではなく、単に文書やデザインを記載するための言語です。（本コースではJavaScriptに関しては学びません、JavaScriptを学びたい方は<a href="https://techacademy.jp/frontend-bootcamp" target="_blank">TechAcademyのフロントエンドコース</a>をご受講ください。）</p>

<p>その他リソースファイルは主に画像ファイルです。他にも、動画ファイル、フォントファイル、Flashファイルなどがあります。リソースファイルはHTML内に埋め込むことで、Webページの一部として表示できます。</p>

<p>このレッスンで学ぶHTMLとCSSは、Webアプリケーション開発の基礎として必要な最低限のレベルまでです。そのため、デザイン原則のようなキレイなWebページをデザインする方法論には踏み込みません。（Webデザインを学びたい方は<a href="https://techacademy.jp/webdesign-bootcamp" target="_blank">TechAcademyのWebデザインコース</a>をご受講ください。）</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 Webページの表示
</h3><p>Webブラウザは特定のWebページを表示する際、下記のような流れで動作します。HTMLやCSS、リソースファイルが統合されて、Webページとして表示されます。</p>

<ol>
  <li>指定のURLへアクセスし、リソース（HTML, CSS, JavaScript, 画像、動画など）を取得する</li>
  <li>取得したHTML, CSS, リソースを解析する（読み込む）</li>
  <li>解析結果を基に、文字や画像を適切に配置し、あるいは文字の大きさを調整したり色を付けるなどしてWebページとして統合し、表示する</li>
</ol>

<p>前のレッスンでも試してもらいましたが、Chromeで何らかのWebページを表示したとき、右クリックで「ページのソースを表示」を選択すると、表示しているWebページのHTMLコードが表示されます。これがWebページの本来の姿です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/yahoo_normal.png" alt="WebページとHTMLコード"><br>
<em>ブラウザから見たYahoo! JAPAN</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/yahoo_source.png" alt="WebページとHTMLコード"><br>
<em>Yahoo! JAPANの本来の姿(HTML)</em></p>

<p>これは一例としてYahoo! JAPANのトップページで「ページのソースを表示」した際に出てきたHTMLです。（Yahoo!側の更新により、上記の表示内容と現状のHTMLに微妙な差異が生じていても、気にしないでください。）</p>
</div></section><section id="chapter-3"><h2 class="index">3. HTMLとCSSの概要
</h2><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 HTMLとは
</h3><p>HTMLは、Hyper Text Markup Language（ハイパーテキストマークアップ言語）の略で、Web上の文書を記述するためのマークアップ言語です。</p>

<p>と言っても最初はよくわからないので、まずはイメージを掴むために例を見てみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 いつもの文書とHTMLの文書
</h3><h4>いつもの文書</h4>

<p>皆さんは普段から文書を書いているはずです。文書といっても、ちょっとしたメモや、日記、SNSへのつぶやき、友達とのチャット、企画書、技術資料など色々あります。全く何も書かない人はいないはずです。</p>

<p>例えば、買い物メモを書いたとしましょう。</p>

<p><em>買い物メモ</em></p>

<pre><code>・飲料水
・パン
・牛乳
・鶏肉
</code></pre>

<p>この買い物メモでは、買うべきものリストを箇条書きしています。この文書がリスト（箇条書き）だと思わせてくれる記号は何でしょうか。ずばり <code>・</code> です。行の始めに <code>・</code> を並べて書けば、多くの人はリストが書かれているという共通認識を持っています。</p>

<h4>HTMLで文書を書き直し</h4>

<p>では、これをHTMLで書き直してみます。</p>

<p><em>HTMLで書き直した買い物メモ</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul&gt;</span>
    <span class="tag">&lt;li&gt;</span>飲料水<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>パン<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>牛乳<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>鶏肉<span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p>これがHTML文書となります。</p>

<p>書かれていた情報それ自体に変更はありません。飲料水、パン、牛乳、鶏肉の情報はそのままです。</p>

<p>変わったものは、 <code>・</code> です。<code>・</code> はキーボードから入力できる記号ですが、削除しました。代わりに <code>&lt;ul&gt;</code> や <code>&lt;li&gt;</code> などの記号を使っていますよね。この記号が <strong><code>・</code> の代わりに「これはリストだよ」という意味</strong> を担っているのです。この記号を <strong>HTMLタグ</strong> と呼びますが、タグについては後ほど詳しく学びますので、ここではそういうものだと思ってください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 なぜ文書をHTMLで書くのか
</h3><p>なぜ文書をHTMLで書くのでしょうか？そもそも誰のためでしょうか？</p>

<p>HTMLは<strong>ブラウザのため</strong>に記述されます。「Webサイトの仕組み」で述べたように、Webページを解析するのはGoogle ChromeやFirefoxのようなブラウザです。解析した結果が、普段ブラウザで見ているWebページです。（きれいなデザインを表示するためにはCSSも解析する必要がありますが、CSSについては後述します。）</p>

<p>つまり、下記のようにHTMLで文書を書くと、ブラウザが正しく意味を認識してくれます。この場合は、飲料水、パン、牛乳、鶏肉という <strong>リスト</strong> です。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul&gt;</span>
    <span class="tag">&lt;li&gt;</span>飲料水<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>パン<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>牛乳<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>鶏肉<span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p>実際に上記のコードをブラウザで表示したらどのようになるでしょうか。下記をご覧ください。これはJS Binというツールを利用しています。左側にHTML文書が書かれ、右側にHTMLをブラウザが解析したWebページ上の表示結果が表示されています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/botacuw/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p><em>↑画像ではなく、JS Binのツールがページに埋め込まれています。左側のHTML文書を書き換えると、すぐに右側の結果画面に反映されます。</em></p>

<p>右側の表示結果をよくみると、 <code>・</code> が表示されています。これは自分で書いた <code>・</code> ではなく、ブラウザによって自動的に表示されているものです。</p>

<p>今回の買い物メモでの例で、<strong>ブラウザの一連のHTML読み込み動作</strong>を想像してみましょう。以下の主語は全てブラウザです。</p>

<ol>
  <li>HTMLで書かれた買い物メモを読み込む</li>
  <li>1行目に<code>&lt;ul&gt;</code>があるので、ここからリストが始まるとわかる</li>
  <li>2行目に<code>&lt;li&gt;</code>があるので、リスト内の1つの項目だとわかる</li>
  <li>2行目の終わりに、<code>&lt;/li&gt;</code>で閉じられているので、リスト内の1つの項目がここまでで終わりだとわかる</li>
  <li>3,4を繰り返す</li>
  <li>最後に<code>&lt;/ul&gt;</code>で閉じられているので、リストはここまでだとわかる</li>
  <li>買い物メモのHTML文書ファイルがここまでなので、人が読みやすいように表示する（<code>・</code> を表示させる）</li>
</ol>

<p>このような手順で動きます。最終的には人が見てリストだとわかるように、ブラウザが <code>・</code> を表示します。</p>

<p>ここでは、<code>&lt;ul&gt;</code>や<code>&lt;li&gt;</code>のように<code>&lt; &gt;</code>で囲まれたものを使って文書を書くのがHTMLだと言うイメージを持つことができれば、それで問題ありません。</p>

<h4>ulとliの意味は何か</h4>

<ul>
  <li><code>ul</code> とは、Unordered Listの略で、順番無しのリストという意味です。</li>
  <li><code>li</code> とは、List Itemの略で、リスト内の1つの項目という意味です。</li>
</ul>

<h4>JS Bin</h4>

<p>このレッスンでは、先述のとおりJS Binというサービスを使っています。JS Binをレッスンページ上に埋め込んでコードと表示を確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/codepen_embed_view_01.png" alt="JS Bin"><br>
<em>レッスンに埋め込まれたJS Binの画面構成</em></p>

<p>また、JS Binの中身を、皆さん自身で<strong>登録すること無く手軽に変更できます</strong>。是非、皆さんも自由に変更してみてください。色々試して変更したとしても更新すれば元に戻ります。たびたびJS Binが出て来るので、疑問に思ったことを何でも実際に色々と試してみることで、HTML/CSSの動作を確認してください。わからないことがあれば、Slackやメンタリング時に聞いてみましょう。快く答えてくれるはずです。</p>

<div class="alert alert-info">
JS Binに登録すると、「Save」ボタンで変更した内容を保存することができます。興味ある方はユーザ登録してみましょう。<br>
<br>
<a href="https://jsbin.com" target="_blank">https://jsbin.com</a>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 CSSとは
</h3><p>CSSとは、Cascading Style Sheets（カスケーディングスタイルシート）の略で、スタイル、つまりWebページをデザインするための言語です。</p>

<p>CSSが必要なのは、HTMLのみでは文書を書くことしかできないからです。HTMLのみでも簡単な装飾、たとえば文字に色をつけたり太字にしたりすることは可能ですが、より凝ったデザインの作成はできません。</p>

<p>まずはイメージを掴むために、CSSの例を見てみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-5">3.5 CSSでHTML文書をデザインする
</h3><h4>文字色を変える</h4>

<p>とても簡単な例として、先ほど表示されたリストの文字色を<code>青色(blue)</code>で表示してみましょう。</p>

<p><em>ulで囲んだリストの文字色を青にするCSS</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">ul</span> {
    <span class="key">color</span>: <span class="value">blue</span>;
}
</pre></div>
</div>
</div>

<p>先ほどと同様にJS Binで確認してみましょう。右側の表示が青色になっていますね。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/ruzakif/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<h4>表示位置を変える（レイアウト）</h4>

<h5>右寄せの場合</h5>

<p>今度はリストの表示位置を右寄せにしてみます。</p>

<p><em>文字色が青色、かつ、右寄せにするCSS</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">ul</span> {
    <span class="key">color</span>: <span class="value">blue</span>;
    <span class="key">float</span>: <span class="value">right</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/lukorat/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h5>横並びの場合</h5>

<p>今度はリストの並びを横並びにして、更にリスト項目間の余白も大きくします。</p>

<p><em>文字色が青色、かつ、横並びにするCSS</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">ul</span> {
    <span class="key">color</span>: <span class="value">blue</span>;
}

<span class="tag">li</span> {
    <span class="key">display</span>: <span class="value">inline-block</span>;
    <span class="key">margin</span>: <span class="float">20px</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/suwecux/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>横並びにすると、ブラウザが自動的に <code>・</code> を消去しています。横並びの場合には、<code>・</code> が邪魔になるからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-6">3.6 まとめ
</h3><p>これでHTML/CSSの概要は終わりです。ここでは、HTMLとCSSの単純な具体例を見てきました。HTMLがブラウザのための言語であり、ブラウザはそれを解析してユーザーに表示しています。CSSは、HTMLという文書のデザインを補うために存在する言語です。CSSはレイアウトを変更する際に必須の言語です。</p>

<p>ここまででHTMLとCSSが一体何者なのか。なぜ必要なのかがわかったはずです。</p>

<ul>
  <li>HTMLは、Webページの文書を担当する。HTMLで文書を書くとブラウザに意味が伝わる。</li>
  <li>CSSは、Webページのデザインを担当する。CSSがあればWebページをキレイに作れる。</li>
</ul>

<p>全てのWebページはHTMLとCSSが基本なので、<strong>Webで何かをするなら、HTML/CSSから学ぶ必要があります</strong>。</p>

<p>それでは、なんとなくのイメージだけでなく実際に自分が理解し、書けるようになるため、HTMLとCSSの基礎を見ていきましょう。</p>

<p>まずはHTMLからです。HTML文書がなければCSSもデザインする対象がないので、先に学びます。</p>
</div></section><section id="chapter-4"><h2 class="index">4. HTMLの基本
</h2><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 HTMLファイルの作成
</h3><p>HTMLファイルはテキストファイルです。テキストファイルの編集には「テキストエディタ」を使用します。</p>

<p>既存のHTMLファイルを開いて編集したい際は「メモ帳」などの簡易的なテキストエディタでも良いのですが、本格的にHTMLコーディングをする際は入力補助機能の充実したエディタを使用します。</p>

<p>新規でHTMLファイルを作成・保存する場合ですが、通常テキストファイルは拡張子が「.txt」で保存されます。これをHTML文書としてWebブラウザなどに認識させたい場合は、拡張子を「<strong>.html</strong>」に変更します。その反対に既存のHTMLファイルの拡張子を.txtに変更した場合は、Webブラウザで開いてもソースコードしか表示されなくなります。</p>

<p>本カリキュラムでは解説や課題提出の都合上、<strong>コーディング（実際にHTML/CSSを書く）作業はCloud9上で行います</strong>。テキストエディタをインストールしたり、PC上でHTMLファイルを作成する必要はありません。</p>

<p>もちろん、HTML/CSSは<strong>JS Bin上でもお試しが可能</strong>なので活用してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 最小のHTML文書
</h3><p>最初の例では単純に <code>&lt;ul&gt;</code> <code>&lt;li&gt;</code> だけ書いていますが、本来必要な記述を省略しています。それでもWebブラウザでリストが表示されますが、望ましくはありません。</p>

<p>まずは、最小限のHTML文書を見ておいて、全体像を把握しておきましょう。</p>

<p><em>最小のHTML文書（ここでは <code>minimum.html</code> というファイル名にします）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>本文です。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>このHTML文書は下記のように、「本文です。」としか表示されません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/htmlcss_03.png" alt=""></p>

<p>ただし、この最小のHTML文書には、HTMLの最も大事なものが詰まっています。</p>

<p>分解して見ていきましょう。</p>

<h4>Cloud9上で実際にコーディングして確認する</h4>

<p>これからHTML/CSSをコーディングしていきますが、とにかく確認作業を都度行うようにしてください。そして少しずつ納得しながら進めてください。</p>

<p>今回は、上記のHTMLファイル(<code>minimum.html</code>)をCloud9上でコーディングしてみましょう。<strong>ファイル名はminimumではなく、minimum.htmlです。 .htmlもしっかりつけましょう</strong>。<code>.html</code> が無いファイルは、HTMLと認識されません。</p>

<p>Cloud9はLesson0「事前準備」で紹介した、Web上でコーディングできる開発環境です。まだアカウント登録をしていない方はLesson0「事前準備」を参考に登録するようにお願いします。</p>

<ul>
  <li><a href="https://aws.amazon.com/jp/cloud9/" target="_blank">Cloud9へのリンク</a></li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/htmlcss_cloud9_01.png" alt=""></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/htmlcss_cloud9_02.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 DOCTYPEとhtml
</h3><p>HTML文書の冒頭には、この文書がHTMLで書かれていることを宣言する<strong>DOCTYPE宣言</strong>が必要です。この宣言は必ず1行目に書くことと決まっています。これは決まり文句なので深く考える必要は全くありません。ブラウザが「これはHTML文書だ」と正しく認識するために、<code>&lt;!DOCTYPE html&gt;</code>が記述されます。特にこのように書いた場合にはHTMLの中でもバージョン5、HTML5で書かれているという宣言になります。</p>

<p>HTMLは緩やかに進化しており、その過程でいくつものバージョンが存在します。現在主流のバージョンは「HTML5」ですが、少し古いバージョンの「HTML4」「HTML4.01」などもまだ多く使われています。同じHTMLでもバージョンにより解釈の違いが存在するため、最初にDOCTYPE宣言をするわけです。</p>

<p>以下はHTML5のDOCTYPE宣言です。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
</pre></div>
</div>
</div>

<p>DOCTYPE宣言の下からHTML文書を記述していきます。</p>

<p>HTML文書全体は<code>&lt;html&gt;</code>と<code>&lt;/html&gt;</code>で囲わなければいけません。それがHTMLの決まり（HTMLの文法）です。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html&gt;</span>
    <span class="comment">&lt;!-- ここにHTML文書がはいります --&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>HTML内のコメント</h4>

<p>上記のHTML文書に <code>&lt;!-- ここにHTML文書がはいります --&gt;</code> というものが入っていました。これはHTML内で使えるコメントです。</p>

<p><strong>コメントはブラウザによって無視されるので、表示されません</strong>。コメントがブラウザに無視されて表示されないという特性を活かして、HTMLを直接書く人にメモ用途としてコメントを残すことができます。</p>

<p>HTMLではコメントの書き方が定められています。コメントは <code>&lt;!--</code>から開始して、<code>--&gt;</code>で終了し、その間にコメント内容を書きます。</p>

<p>ただし、HTML内のコメントは、Yahoo! JAPANの例で見たように、Webページで右クリックして「ページのソースを表示」すると、誰でもコメントを読めてしまいますので、<strong>実際にはプライベートなコメントを書くべきではありません</strong>。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 HTMLタグについて
</h3><p>先ほどの最初のHTML文書を確認しておきましょう。</p>

<p><em>minimum.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>本文です。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>開始と終了がある要素</h4>

<p>今までにいくつか<code>&lt; &gt;</code>で囲まれた記号をいくつか説明無しに並べてきました。ここで理解しておきましょう。</p>

<p><code>&lt;html&gt;</code>, <code>&lt;/html&gt;</code>のように、<code>&lt; &gt;</code>で囲まれた記号を<strong>HTMLタグ</strong>と呼びます。HTMLタグは<strong>開始タグ</strong>から始まり、<strong>内容</strong>を挟んで、<strong>終了タグ</strong>までが1つのまとまりとなっています。このまとまりのことを<strong>要素</strong>と呼び、タグ内に書かれた文字を<strong>要素名</strong>と呼びます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/htmlcss_06.png" alt=""></p>

<p>例えば上図は、<strong>title要素</strong>の図です。title要素はWebページのタイトルを意味する要素で、<code>&lt;title&gt;</code>という開始タグ、タイトル内容、<code>&lt;/title&gt;</code>という終了タグによって構成されます。</p>

<h4>終了タグのない要素</h4>

<p>また、<code>&lt;meta ... &gt;</code>のように、終了タグがない要素もあります。最小のHTML文書にある<code>&lt;meta charset="UTF-8"&gt;</code>は終了タグがありませんが、これで正しい記述となっています。</p>

<p>他にも画像を表示するimg要素も終了タグがありません。色々な要素については後ほど学ぶことになります。</p>

<h4>なぜタグをつけるのか</h4>

<p>HTMLがブラウザのために書かれているということは既に述べました。もう一度復習しておきましょう。</p>

<p>なぜ、<code>タイトル</code>や<code>本文です。</code>をtitleタグやpタグで囲っているのでしょうか？それは文書に意味付けをしているのです。タグで囲んで意味付けをすることで、ブラウザは文書を理解できるようになるのです。ブラウザは<code>タイトル</code>とだけ書かれている文をみても、それが何を意味するのかまでは全くわからないのです。</p>

<p>HTML文書は、タイトルは<code>&lt;title&gt;なんらかのタイトル&lt;/title&gt;</code>で囲むという<strong>絶対的なお約束（文法）</strong>があるので、ブラウザはそれがタイトルだと認識できるのです。買い物リストでもあったように<code>・</code>と書かれていても、ブラウザはリストだと判断できません。ul要素とli要素を使うことでリストを表現して初めてブラウザはリストだと認識できます。</p>

<p><em>買い物リスト</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul&gt;</span>
    <span class="tag">&lt;li&gt;</span>飲料水<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>パン<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>牛乳<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>鶏肉<span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-4-5">4.5 head と body
</h3><p><strong>HTML文書の中身を大きく分けるとhead要素とbody要素に分かれます</strong>。それぞれ<code>&lt;head&gt;</code>タグと<code>&lt;body&gt;</code>タグで囲います。</p>

<p>head要素内には文書に関する「メタ情報」を記述し、body要素には「コンテンツ」を記述します。メタ情報(head)には閲覧者に表示されない設定やページ情報などを記述し、コンテンツ(body)には閲覧者に見てもらうためのWebページの文書を記述します。</p>

<p>headタグ内に記述するメタ情報には、ページタイトル、外部スタイルシートの場所、外部JavaScriptファイルの場所、文字エンコーディング情報、ページの概要、などが含まれます。ブラウザで表示した際に、これらの内容は表示されません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="comment">&lt;!-- メタ情報がここにはいります --&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!-- 本文がここにはいります。 --&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>この形が全てのHTML文書の基本となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/5-1.png" alt=""></p>

<h4>インデントについて</h4>

<p>インデントとは、プログラムの構造を見やすくするために空白文字によって字下げすることを指します。</p>

<p>HTMLやCSSでは、行頭のスペースやタブといった空白文字を無視することになっているので、インデントをつけることができるのです。HTML文書を作成する際は、開始タグと終了タグの関係を把握しやすいようにインデントをつけることが一般的です。</p>

<p>上の例のように、各タグごとにインデントをつけることで、開始タグと終了タグが視覚的に把握しやすくなります。インデントはスペースとタブ文字のどちらでも良いですし、文字数も特に決められてはいませんが、2文字または4文字が推奨されていますので、本コースでも2文字または4文字が使用されています。</p>

<p>下記の例だと、<code>&lt;head&gt;</code>, <code>&lt;/head&gt;</code>の前にスペース4つあり、同じ階層だと判断できるようになっています。<code>&lt;body&gt;</code>, <code>&lt;/body&gt;</code>でも同様です。更に、<code>&lt;head&gt; ... &lt;/head&gt;</code>内のように1つ深い階層に入ると、<code>&lt;!-- メタ情報... --&gt;</code>の文頭のように更にインデントを重ねていきます。階層がひと目でわかりやすくなります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="comment">&lt;!-- メタ情報がここにはいります --&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!-- 本文がここにはいります。 --&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-4-6">4.6 属性
</h3><p>属性とは開始タグの中に書かれた付加情報のことです。多くのタグは属性と合わせて記述されます。</p>

<p><em>minimum.htmlの一部</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>例えば、上記のmeta要素を見てみましょう。開始タグ内を半角スペースで区切ったあとに<code>charset="UTF-8"</code>という属性を記述してます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/htmlcss_08.png" alt=""></p>

<p><code>charset="UTF-8"</code>のように <code>属性名="属性値"</code> という形で、要素に付加情報を加えられます。<code>&lt;meta charset="UTF-8"&gt;</code>は文字エンコード(<code>charset</code>)として<code>UTF-8</code>を利用しますという宣言です。文字エンコードについては省略しますが、全てのHTMLファイルのhead要素内には、<code>&lt;meta charset="UTF-8"&gt;</code>を決まり文句として書いておきましょう。</p>

<p>要素によって頻繁に利用する属性は決まっているので、少しずつ慣れていきましょう。</p>
</div></section><section id="chapter-5"><h2 class="index">5. head要素内の記述
</h2><div class="subsection"><p>head要素内には、meta要素、title要素、link要素などが入ります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 meta要素
</h3><p>meta要素には、文書の <strong>メタ情報</strong> を記述します。メタ情報には、文書の説明、文字エンコーディングなどが含まれます。meta要素はhead要素内だけで使用されます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- DOCTYPEとhtmlタグは省略 --&gt;</span>
<span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">description</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">文書の説明は検索エンジンの検索結果ページに表示されるため、タイトルと並びSEO上非常に重要です。</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<p><code>&lt;meta charset="UTF-8"&gt;</code>は<code>UTF-8</code>の文字エンコーディングでHTML文書を書きますよという宣言です。これを書いていないと文字化けなどの原因となります。決まり文句として<code>&lt;head&gt;</code>内の最初に書いておきましょう。</p>

<p><code>&lt;meta name="description" content="...中略"&gt;</code>がありますが、これはサイトの概要を説明するためのものです。SEOをする上で非常に重要なHTML要素となります。SEOとは、Googleのような検索サイトで作成したWebサイトが上位に表示されるための対策のことです。</p>

<p>meta要素は色々なメタ情報を入れるための器です。metaというタグ自体には意味を持たないので、<code>charset="UTF-8"</code>や<code>"name="description" content="...中略"</code>のように属性を使ってメタ情報を記述します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 title要素
</h3><p>title要素にはWebページのタイトルを記述します。Webページのタイトルとは、検索エンジンの結果ページに一覧表示される、SEO上最も重要な要素です。Webページの内容に合った適切なタイトルをつけるようにしましょう。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- DOCTYPEとhtmlタグは省略 --&gt;</span>
<span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>HTML文書の基本<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">description</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">文書の説明は検索エンジンの検索結果ページに表示されるため、タイトルと並びSEO上非常に重要です。</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/portfolio/img_meta.png" alt=""><br>
<em>titleとmeta(description)の参考画像</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 link要素
</h3><p>link要素はスタイルシート(CSS)など、外部ファイルを参照する際に使用します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- DOCTYPEとhtmlタグは省略 --&gt;</span>
<span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>HTML文書の基本<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://techacademy.jp/common/style.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">description</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">文書の説明は検索エンジンの検索結果ページに表示されるため、タイトルと並びSEO上非常に重要です。</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<ul>
  <li>rel属性で外部ファイルのタイプを指定します。スタイルシート(CSS)の場合は<code>rel="stylesheet"</code>と記述します。</li>
  <li>href属性で外部ファイルの場所を指定します。</li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 まとめ
</h3><p>head要素の中に入るものを学びました。head要素はコンテンツではなく、コンテンツのメタ情報を記述するのがほとんどです。</p>
</div></section><section id="chapter-6"><h2 class="index">6. body要素内の記述
</h2><div class="subsection"><p>body要素内には、コンテンツを記述します。Webページとして表示させたいものは全てbody要素内に記述します。head要素に文書のメタ情報を記述した後は、メインであるbody要素のコーディングに入ります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 Webページのコンテンツを記述するための要素
</h3><p>コンテンツを記述するとき、主なパーツを下記に紹介します。</p>

<ul>
  <li>段落（文章）</li>
  <li>文章中の改行</li>
  <li>画像</li>
  <li>ページリンク</li>
  <li>リスト</li>
  <li>表</li>
  <li>フォーム</li>
</ul>

<p>それぞれ見ていきましょう。</p>

<h4>段落（文章）</h4>

<p>文章を記述するときは、<strong>p要素</strong>を使います。段落ごとにp要素で区切ります。何か文章を書くときはp要素を使いましょう。p要素のpは、パラグラフ（段落）の意味です。</p>

<p>下記の本文は3つのパラグラフで記述されています。</p>

<p><em>文章の記述例</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>HTML文書の中身を大きく分けるとhead要素とbody要素に分かれます。それぞれheadタグとbodyタグで囲います。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p&gt;</span>head要素内には文書に関する「メタ情報」を記述し、body要素には「コンテンツ」を記述します。メタ情報(head)には閲覧者に表示されない設定やページ情報などを記述し、コンテンツ(body)には閲覧者に見てもらうためのWebページの文書を記述します。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p&gt;</span>headタグ内に記述するメタ情報には、ページタイトル、外部スタイルシートの場所、外部JavaScriptファイルの場所、文字エンコーディング情報、ページの概要、などが含まれます。ブラウザで表示した際に、これらの内容は表示されません。<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/tixupit/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<h4>文章中の改行</h4>

<p>任意の場所で改行をしたい場合には、br要素を使います。br要素は終了タグの無い要素です。HTMLでは<code>&lt;br&gt;</code>を使わないと改行できません。改行や空白は、全て半角スペース1つに置き換えられてしまいます。</p>

<p>下記では、1段落目は<code>。</code>の次の<code>&lt;br&gt;</code>によって改行されますが、2段落目は、いくら改行しても半角スペース1つに置き換えられていて改行されません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- headまで省略 --&gt;</span>
<span class="tag">&lt;p&gt;</span>HTML文書の中身を大きく分けるとhead要素とbody要素に分かれます。<span class="tag">&lt;br&gt;</span>それぞれheadタグとbodyタグで囲います。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p&gt;</span>HTML文書の中身を大きく分けるとhead要素とbody要素に分かれます。





それぞれheadタグとbodyタグで囲います。<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/salobub/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ただし、br要素の改行は、あくまでも文章を改行する用途で使ってください。Webページのレイアウトのために<code>&lt;br&gt;</code>を連続で使うような使い方は多用しないでください。要素と要素の余白を取りたい場合には、CSS（<code>margin</code>など）を利用するようにしましょう。CSSに関する詳細は後ほど解説します。</p>

<h4>画像</h4>

<p>画像の表示には、img要素を使用します。img要素は終了タグの無い要素です。imgはimageの略です。画像タグは、<code>src</code>属性に画像のURLを指定して、画像を表示します。</p>

<p>また、<code>alt</code> という属性も覚えてください。<code>alt</code> は画像に対するテキストでの説明を記述します。<code>alt</code> に書かれたテキストは、画像が通常通り表示されるときは隠されますが、画像が正常に表示されない場合に表示されます。視覚障害や認識機能障害を持つ方のための音声補助ソフトに読んでもらえるといった役割もあります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">http://static.techacademy.jp/magazine/wp-content/themes/ta-magazine/images/logo-magazine.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">techacademy magazineのロゴ</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/siboxaf/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>ページリンク</h4>

<p>Webサイトは、WebページからWebページへのリンクがあってこそ繋がります。</p>

<p>ページリンクを記述するには、a要素を使います。下記のように <code>&lt;a&gt;...&lt;/a&gt;</code> で囲まれた要素がクリックできるようになり、クリックするとリンク先へ移動します。aはアンカーと呼びます。<code>href</code> 属性にURLを記載することでリンク先を指定します。</p>

<p>画像にリンクを設定したい場合は <code>&lt;img&gt;</code> タグを <code>&lt;a&gt;...&lt;/a&gt;</code> で囲めばOKです。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://techacademy.jp/</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>TechAcademy [テックアカデミー] | オンラインブートキャンプ<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://techacademy.jp/magazine/</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">http://static.techacademy.jp/magazine/wp-content/themes/ta-magazine/images/logo-magazine.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">techacademy magazineのロゴ</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jocukow/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>リスト</h4>

<p>リストには順序無しリストと、順序有りリストがあります。</p>

<h5>順序無しリスト</h5>

<p>順序無しリストには、ul要素を利用します。ul要素の内部にli要素を並べてリストを作成します。</p>

<p>ulとはUnordered Listの略で、順序無しリストを意味します。liはList Itemの略でリスト内の1つの項目を意味します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul&gt;</span>
    <span class="tag">&lt;li&gt;</span>飲料水<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>パン<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>牛乳<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>鶏肉<span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/mopixeg/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h5>順序有りリスト</h5>

<p>順序有りリストには、ol要素を利用します。ol要素の内部にli要素を並べてリストを作成します。順番がある場合にはulではなくolを利用しましょう。</p>

<p>olとはOrdered Listの略で、順序有りリストを意味します。liはList Itemの略でリスト内の1つの項目を意味します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ol&gt;</span>
    <span class="tag">&lt;li&gt;</span>飲料水<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>パン<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>牛乳<span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li&gt;</span>鶏肉<span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ol&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jinefe/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>表</h4>

<p>表には、table要素を使います。ただし、table要素だけでなくいくつか必要な要素があるので確認しておきます。</p>

<table>
  <tbody>
    <tr>
      <td><code>table</code></td>
      <td>表を始める要素、最初に書く。必須</td>
    </tr>
    <tr>
      <td><code>thead</code></td>
      <td>表の見出しとなる部分（表の一番上の部分）を書くときに使う。無くとも良い</td>
    </tr>
    <tr>
      <td><code>tbody</code></td>
      <td>表の内容を書くときに使う。無くとも良い</td>
    </tr>
    <tr>
      <td><code>tr</code></td>
      <td>table rowの意味。横一列を書くときに使う。必須</td>
    </tr>
    <tr>
      <td><code>th</code></td>
      <td>table headの意味。見出しの内容を書くときに使う。デフォルトで太字になる。必須</td>
    </tr>
    <tr>
      <td><code>td</code></td>
      <td>table dataの意味。内容を書くときに使う。必須</td>
    </tr>
  </tbody>
</table>

<p>書き方の構造はこうなっています。下記を確認してみてください。</p>

<p><em>tableの構造</em></p>

<pre><code>table
├ thead
│  └ tr
│     └ th
└ tbody
    └ tr
       ├ th
       └ td
</code></pre>

<p><em>HTMLの例</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;table</span> <span class="attribute-name">border</span>=<span class="string"><span class="delimiter">"</span><span class="content">1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;thead&gt;</span>
        <span class="tag">&lt;tr&gt;</span>
            <span class="tag">&lt;th&gt;</span>#<span class="tag">&lt;/th&gt;</span>
            <span class="tag">&lt;th&gt;</span>名前<span class="tag">&lt;/th&gt;</span>
            <span class="tag">&lt;th&gt;</span>メールアドレス<span class="tag">&lt;/th&gt;</span>
            <span class="tag">&lt;th&gt;</span>電話番号<span class="tag">&lt;/th&gt;</span>
        <span class="tag">&lt;/tr&gt;</span>
    <span class="tag">&lt;/thead&gt;</span>
    <span class="tag">&lt;tbody&gt;</span>
        <span class="tag">&lt;tr&gt;</span>
            <span class="tag">&lt;th&gt;</span>1<span class="tag">&lt;/th&gt;</span>
            <span class="tag">&lt;td&gt;</span>煌木 太郎<span class="tag">&lt;/td&gt;</span>
            <span class="tag">&lt;td&gt;</span>taro.kirameki@example.com<span class="tag">&lt;/td&gt;</span>
            <span class="tag">&lt;td&gt;</span>09011112222<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;/tr&gt;</span>
        <span class="tag">&lt;tr&gt;</span>
            <span class="tag">&lt;th&gt;</span>2<span class="tag">&lt;/th&gt;</span>
            <span class="tag">&lt;td&gt;</span>煌木 次郎<span class="tag">&lt;/td&gt;</span>
            <span class="tag">&lt;td&gt;</span>jiro.kirameki@example.com<span class="tag">&lt;/td&gt;</span>
            <span class="tag">&lt;td&gt;</span>09033334444<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;/tr&gt;</span>
        <span class="tag">&lt;tr&gt;</span>
            <span class="tag">&lt;th&gt;</span>3<span class="tag">&lt;/th&gt;</span>
            <span class="tag">&lt;td&gt;</span>煌木 花子<span class="tag">&lt;/td&gt;</span>
            <span class="tag">&lt;td&gt;</span>hanako.kirameki@example.com<span class="tag">&lt;/td&gt;</span>
            <span class="tag">&lt;td&gt;</span>09055556666<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;/tr&gt;</span>
    <span class="tag">&lt;/tbody&gt;</span>
<span class="tag">&lt;/table&gt;</span>
</pre></div>
</div>
</div>

<p><code>border="1"</code>属性がないと、表を囲う境界線が表示されないので、入れています。なくても表としては機能します。</p>

<p>tableを書くコツは、trの意味を理解することです。<code>&lt;tr&gt;</code>は今から表の横一列を記述しますよという宣言になります。<code>&lt;tr&gt;</code> に続いて、<code>&lt;th&gt;</code> や <code>&lt;td&gt;</code> という実際に表の項目内容となる要素を入れます。</p>

<p>また、tr内のthとtdの数は全てのtr内で同じにしましょう。上記の場合には、td+thがどのtrでも4つになっています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/vuripux/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>フォーム</h4>

<p>Webサイトには、入力フォームが多数あります。文字で検索するとき、つぶやきを送信するとき、お問い合わせフォームから聞きたいことを問い合わせるとき、などです。</p>

<p>フォームには、form要素を使用します。実際にどんなことを入力させたいかで利用するパーツが異なります。実際に例を見てみましょう。</p>

<p><em>アカウント登録フォームの例</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form&gt;</span>
    <span class="tag">&lt;label</span> <span class="attribute-name">for</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>名前<span class="tag">&lt;/label&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;br&gt;</span>

    <span class="tag">&lt;label</span> <span class="attribute-name">for</span>=<span class="string"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>メールアドレス<span class="tag">&lt;/label&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;br&gt;</span>

    <span class="tag">&lt;label</span> <span class="attribute-name">for</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>パスワード<span class="tag">&lt;/label&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;br&gt;</span>

    <span class="tag">&lt;label</span> <span class="attribute-name">for</span>=<span class="string"><span class="delimiter">"</span><span class="content">confirm</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>確認パスワード<span class="tag">&lt;/label&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">confirm</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;br&gt;</span>

    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">登録する</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/toxasoz/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>form内の要素を見てみましょう。label要素とinput要素があります。label要素はinput要素のためのラベルで <code>for=""</code> の属性でinput要素のid属性（本レッスン後半で解説）を指定しています。input要素は入力形式を選べるので <code>type=""</code> によってどんな形式のものが入力されるのかを指定します。例えば<code>type="password"</code>とすると、パスワードを入力してもセキュリティ的に文字が黒い点によって隠されます。typeは他にも様々なタイプ（色や日付の選択など）があります。</p>

<p>今回はlabelとinputを使用しましたが、他にも選択肢から選ぶ形式(select)、ラジオボタン形式の選択(type=”radio”)、複数行テキスト入力形式(textarea)などがあります。</p>

<p>注意したい点として、formは単にformを設置して送信ボタンを押しても動作しません。formの動作には何らかのサーバサイドプログラミング言語（PHPやRuby）などの助けが必要です。また、 <code>action=""</code> の属性を追加して、遷移するURL（formを動作させるプログラムが置かれた場所）を記載する必要があります。詳しくは後のレッスンに出てくるコードでご確認ください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 Webページのアウトラインを整えるための要素
</h3><p>アウトラインとは、文書の目次や見出しのことです。</p>

<p>Webページもあくまで文書であるため、アウトラインがあります。例えば、このレッスンページは</p>

<ul>
  <li>HTML/CSS
    <ul>
      <li>学習の目標</li>
      <li>Webページが表示される仕組み
        <ul>
          <li>Webブラウザについて（おさらい）</li>
          <li>Webページの構成</li>
          <li>Webページの表示</li>
        </ul>
      </li>
      <li>HTMLとCSSの概要
        <ul>
          <li>HTMLとは</li>
          <li>以下略</li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

<p>というアウトラインになっています。</p>

<h4>見出し</h4>

<p>アウトラインに沿って見出しを書くには、<code>h1</code>, <code>h2</code>, …, <code>h6</code>を利用します。<code>h</code>の数字が小さいほど大きな見出しになります。<code>h1</code>が一番大きな見出しになります。基本的に<code>h1</code>は1つのWebページに1つだけになります。</p>

<p>先程のこのレッスンの見出しをhタグを使えば下記のようになります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- headまで中略 --&gt;</span>
<span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;h1&gt;</span>HTML/CSS<span class="tag">&lt;/h1&gt;</span>

    <span class="tag">&lt;h2&gt;</span>学習の目標<span class="tag">&lt;/h2&gt;</span>
    <span class="tag">&lt;p&gt;</span>このレッスンではWebアプリケーションを作成する上で必要な知識のうち、ブラウザに表示される内容を作成するための言語であるHTMLとCSSを学びます。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;p&gt;</span>中略<span class="tag">&lt;/p&gt;</span>

    <span class="tag">&lt;h2&gt;</span>Webページが表示される仕組み<span class="tag">&lt;/h2&gt;</span>

    <span class="tag">&lt;h3&gt;</span>Webブラウザについて（おさらい）<span class="tag">&lt;/h3&gt;</span>
    <span class="tag">&lt;p&gt;</span>Webブラウザとは、Webサイトを閲覧するためのアプリケーションです。単にブラウザと呼ばれています。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;p&gt;</span>中略<span class="tag">&lt;/p&gt;</span>

    <span class="comment">&lt;!-- 以下略 --&gt;</span>
<span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>上記のように一番大きな見出しが <code>&lt;h1&gt;HTML/CSS&lt;/h1&gt;</code> です。そして1つ小さな見出しとして <code>&lt;h2&gt;学習の目標&lt;/h2&gt;</code> があります。</p>

<h4>セクション</h4>

<p>見出しほどの強い意味を持たず、セクションを分けたい場合には、section要素を利用します。</p>

<p>先程のレッスンの見出しで、h2毎にセクションへ分けてみましょう。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- headまで中略 --&gt;</span>
<span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;h1&gt;</span>HTML/CSS<span class="tag">&lt;/h1&gt;</span>

    <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2&gt;</span>学習の目標<span class="tag">&lt;/h2&gt;</span>
        <span class="tag">&lt;p&gt;</span>このレッスンではWebアプリケーションを作成する上で必要な知識のうち、ブラウザに表示される内容を作成するための言語であるHTMLとCSSを学びます。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span>中略<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/section&gt;</span>

    <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2&gt;</span>Webページが表示される仕組み<span class="tag">&lt;/h2&gt;</span>

        <span class="tag">&lt;h3&gt;</span>Webブラウザについて（おさらい）<span class="tag">&lt;/h3&gt;</span>
        <span class="tag">&lt;p&gt;</span>Webブラウザとは、Webサイトを閲覧するためのアプリケーションです。単にブラウザと呼ばれています。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span>中略<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/section&gt;</span>

    <span class="comment">&lt;!-- 以下略 --&gt;</span>
<span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>これで<code>&lt;section&gt;</code>を使って構造を記述できました。</p>

<h4>まとまりを分ける</h4>

<p>セクションより更に何でもありの分割用の要素がdivです。</p>

<p>section要素ではh2まで分割したので、h3もdivで分割してみましょう。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- headまで中略 --&gt;</span>
<span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;h1&gt;</span>HTML/CSS<span class="tag">&lt;/h1&gt;</span>

    <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2&gt;</span>学習の目標<span class="tag">&lt;/h2&gt;</span>
        <span class="tag">&lt;p&gt;</span>このレッスンではWebアプリケーションを作成する上で必要な知識のうち、ブラウザに表示される内容を作成するための言語であるHTMLとCSSを学びます。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span>中略<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/section&gt;</span>

    <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2&gt;</span>Webページが表示される仕組み<span class="tag">&lt;/h2&gt;</span>

        <span class="tag">&lt;div&gt;</span>
            <span class="tag">&lt;h3&gt;</span>Webブラウザについて（おさらい）<span class="tag">&lt;/h3&gt;</span>
            <span class="tag">&lt;p&gt;</span>Webブラウザとは、Webサイトを閲覧するためのアプリケーションです。単にブラウザと呼ばれています。<span class="tag">&lt;/p&gt;</span>
            <span class="tag">&lt;p&gt;</span>中略<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/section&gt;</span>

    <span class="comment">&lt;!-- 中略 --&gt;</span>
<span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>これでh3のまとまりをまとまりとして扱うことができました。</p>

<h4>Webページの構造を分ける</h4>

<p>Webページは概ね、ヘッダーがあり、フッターがあり、メインコンテンツとして記事があり、サイドバーがある、という構成になっています。下記は、それをHTMLで記述したものになります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- headまで省略 --&gt;</span>
<span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;header&gt;</span>
        <span class="comment">&lt;!-- ここにヘッダーが入ります --&gt;</span>
    <span class="tag">&lt;/header&gt;</span>
    <span class="tag">&lt;div&gt;</span>
        <span class="tag">&lt;article&gt;</span>
            <span class="comment">&lt;!-- ここに本文が入ります --&gt;</span>
        <span class="tag">&lt;/article&gt;</span>
        <span class="tag">&lt;aside&gt;</span>
            <span class="comment">&lt;!-- ここにサイドバーが入ります --&gt;</span>
        <span class="tag">&lt;/aside&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;footer&gt;</span>
        <span class="comment">&lt;!-- ここにフッターが入ります --&gt;</span>
    <span class="tag">&lt;/footer&gt;</span>
<span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>header要素にはデザイン上のヘッダー部分を記述します。文書のヘッダ情報であるhead要素とは全く異なるブロックレベル要素です。</p>

<p>article要素には単一の記事を記述します。ここでは本文部分で使用しています。</p>

<p>aside要素には、本文ではない補足情報を記述します。ここではサイドバーをaside要素にしています。</p>

<p>footer要素にはフッター部分を記述します。</p>

<p>div要素には文章の内容を示す特別な意味はありません。ひとかたまりの範囲を定義するときに使用します。</p>

<h4>sectionやdivなどの選択に正解はない</h4>

<p>HTML文書を記述していると、どのタグを使うべきか？で悩むことがよく出てきます。例えば、article要素やheader要素、footer要素はわかりやすく使いやすいものですが、抽象的なsection要素やdiv要素は使い所がいまいちわかりません。正解はあるでしょうか？</p>

<p>正解はありません。セクションを分けたいときにはsection要素とdiv要素のどちらを使っても、それほど問題にはなりません。また、HTML文書は、少々の間違いがあっても表示されるようになっています。</p>

<p>正しいかどうかに関してはそれほど神経質になる必要はないでしょう。できるだけ意味的に正しいタグを悩み抜いて選択することは、悪いことではありませんが、とりあえずdiv要素で囲むというやり方でもそれほど悪くはありません。HTML5より前のHTMLではセクションを分けるのにdivタグしかなかった経緯もあり、divタグ以外使っていないページも見かけます。</p>

<p>ただし、気をつけておけばSEO上有利になります。article要素やheader要素、footer要素などの使い所がわかりやすいタグは積極的に使っていきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 まとめ
</h3><p>body要素は実際にコンテンツを扱う要素でした。その中には文章要素(<code>p</code>)や画像要素(<code>img</code>)などがありました。そして、HTMLは文書なので、構造としてアウトラインがあります。そのアウトラインに沿うように見出し(<code>h1</code>~<code>h6</code>)を割り当てます。また、その中でまとまりとなる部分を <code>div</code> や <code>section</code> といった分割のための要素でまとめます。</p>
</div></section><section id="chapter-7"><h2 class="index">7. id属性とclass属性の設定
</h2><div class="subsection"><p>属性とは開始タグの中に書かれた付加情報のことでした。多くのタグは属性と合わせて記述されます。たとえば下記のmeta要素は、<code>charset</code>属性を持っています。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>それでは、本チャプターのテーマであるid属性とclass属性を学んでおきましょう。id属性とclass属性は、属性の中でも最も多く使用する属性です。この2つの属性は、HTMLのタグの中に名前をつけることが目的で使います。id属性には制限があり、HTMLの中（<code>&lt;html&gt;</code> から <code>&lt;/html&gt;</code> の間）で同じ属性値のid属性を2つ以上書くことはできません。対してclass属性は同じ属性値のものをいくつ書いても構いません。div要素など意味を持たない要素では、id属性とclass属性を使うことでページ内での意味を表すことができます。役割に即した名前を指定しましょう。</p>

<p>実際にid属性とclass属性が役に立つのは、CSSでデザインを適用させる要素を決定するとき（セレクタ）です。したがって、id属性とclass属性はHTMLとCSSデザインを繋げる架け橋になる役割を担っています。ここでは、id属性とclass属性を指定したら、それに対してデザインが適用できるんだとだけ覚えておきましょう。後ほどCSSのセレクタのところで解説します。</p>

<p>なお、body要素内で使用されるHTMLタグであれば、どんなタグにでもid属性とclass属性を設定できます。また、id属性やclass属性の属性値には任意の英数字と一部の記号を利用できます。</p>

<p><em>id属性の設定</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">introduction</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>これから〜〜の紹介をします。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>class属性の設定</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>これから〜〜の紹介をします。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>id属性とclass属性の設定</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">introduction</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>これから〜〜の紹介をします。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>id属性とclass属性は両方同時に設定できます。</p>

<p>具体的な解説はCSSの章で行いますが、簡単な例を以下に示します。この例により、2つの属性はHTMLとCSSを繋げるためにあるということを理解してください。CSSではid属性に <code>#</code> 、class属性に <code>.</code> を使ってデザインを適用するルールになっています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/nawuxeg/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>
</div></section><section id="chapter-8"><h2 class="index">8. HTMLチュートリアル
</h2><div class="subsection"><p>HTMLの基礎はここまでで終わりです。最後に、Webページを1枚HTMLで書いてみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 制作するWebページ
</h3><p>本レッスンを通して下記のWebページを作成してみます。</p>

<p>色々とメニュー（講座案内やレッスン、ギャラリーなど）を出していますが、今回は <strong>トップページ（HOME）</strong> のみの作成になります。</p>

<p><a href="https://techacademy.s3.amazonaws.com/t
raining/htmlcss/html/techacademy-kitchen_css_allpage.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_allpage.png" alt=""></a></p>

<p>ただし、上記WebページはCSS（デザイン）が適用されているものなので、まずはHTML文書だけの下記を作成します。</p>

<p><a href="https://techacademy.s3.amazonaws.com/
training/htmlcss/html/techacademy-kitchen_html_allpage2.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_allpage2.png" alt=""></a></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 まずはWebページの構造を作る
</h3><p>実際にCloud9上で書いていきましょう。</p>

<p>HTMLに慣れたあとはコピー&amp;ペーストをすることは、悪いことではないですが、まずは手を使って実際にタイピングで書くようにしてください。理由は、</p>

<ul>
  <li>ちゃんとHTMLを認識する</li>
  <li>タイピングミスがありえることを学ぶ</li>
</ul>

<p>の2点です。</p>

<h4>DOCTYPEとhtml要素</h4>

<p>では、 <em>kitchen.html</em> をCloud9上で作成し、下記の通り記述してください。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>html要素の<code>lang="ja"</code>属性を指定すると、このHTML文書は日本語で書かれますよということを示すことができます。</p>

<p>Cloud9上で <em>kitchen.html</em> ファイルを作成しましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/htmlcss_cloud9_03.png" alt=""></p>

<h4>head要素とbody要素</h4>

<p>更にここから <em>kitchen.html</em> にHTMLを書き加えていきましょう。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>header要素</h4>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>div要素(main_visual)</h4>

<p>メインビジュアルには、アイキャッチとしての大きめの画像が入ります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
        <span class="comment">&lt;!--ここからメインビジュアル画像--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main_visual</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--メインビジュアル画像ここまで--&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>div要素(wrapper)</h4>

<p>続いて、メインエリアとサイドバーはdiv要素を使って書きます。div要素には<code>id="wrapper"</code>というid属性を使用しましょう。wrap（ラップ）に由来しておりwrapperは全体にかかる大きな要素でよく使われます。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
        <span class="comment">&lt;!--ここからメインビジュアル画像--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main_visual</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--メインビジュアル画像ここまで--&gt;</span>
        <span class="comment">&lt;!--wrapperー--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>footer要素</h4>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
        <span class="comment">&lt;!--ここからメインビジュアル画像--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main_visual</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--メインビジュアル画像ここまで--&gt;</span>
        <span class="comment">&lt;!--ここからwrapperー--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
        <span class="comment">&lt;!--ここからフッター--&gt;</span>
        <span class="tag">&lt;footer&gt;</span>
        <span class="tag">&lt;/footer&gt;</span>
        <span class="comment">&lt;!--フッターここまで--&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>Cloud9のプレビュー機能で、HTML文書を表示させてみましょう。今回は骨子だけなので、<strong>まだコンテンツの表示はありません</strong>。（body要素内のどこかに文字などを入れれば表示されます。）</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 ヘッダー
</h3><p>先ほどのチャプターでWebページの大枠の骨組みができました。続いては骨組みの中身を作っていきます。ヘッダーの要素は、ロゴとグローバルナビゲーションの2つです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/header.png" alt=""></p>

<p>※CSSが適用された状態です。HTMLでのゴールは後ほど紹介します。</p>

<h4>画像素材</h4>

<p>ここから画像を表示するため、画像素材（ロゴだけでなく、本レッスンで使用するもの全て）を配布します。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/images_kitchen.zip">画像素材 images_kitchen.zip</a></li>
</ul>

<p>上記のダウンロードしたファイルは、Zipファイルとなっています。そのままではCloud9にアップロードできないので、まずはZipファイルをダブルクリックして解凍します（Windowsユーザでダブルクリックしても解凍できない場合は、エクスプローラ上の「すべて展開」ボタンをクリックしてください）。Zipファイルから「Images_kitchen」フォルダが現れるので、これをCloud9上にドラッグ＆ドロップでアップロードしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/htmlcss_cloud9_05.png" alt=""></p>

<h4>ロゴ</h4>

<p>ここからはheader要素以外を省略して掲載しています。そのため、 <code>&lt;!-- ここからヘッダー --&gt;</code> や <code>&lt;header&gt; ... &lt;/header&gt;</code> など、 <em>kitchen.html</em> 内で一度しか使用されないコメントやタグを目印に、HTMLを書き加えていってください。</p>

<p>まずは、下記の通りheader要素内にimg要素を追記して、ロゴ画像が表示されることを確認しましょう。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
            <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHEN</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
</pre></div>
</div>
</div>

<p>ロゴ画像が表示されるのを確認したら、次はh1とaで囲みます。 h1はここが見出しとして使用されることを明示していて、 aはクリックできるリンクとなりロゴをクリックするとHOME（TOPページ）に戻ることができるようになります。サイト上部のロゴ画像をクリックするとTOPページに戻るWebサイトは多いですね。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHEN</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>グローバルナビゲーション</h4>

<p>グローバルナビゲーション、つまり全体のメニューは、ロゴの真下に書き加えます。nav要素は内部がメニューであることを明示しています。実際にメニューとして作られるのはulとliによる順序無しリストです。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHEN</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span>
            <span class="tag">&lt;nav</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">global_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">current</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/nav&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>確認</h4>

<p><em>kitchen.html</em>をプレビューで見てみましょう。下図の通りになっていれば大丈夫です。もしも、表示内容が違っていたら、自分のHTMLに間違いがないか見直してみましょう。それでもわからなければメンターに質問してみてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/logo_html.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-4">8.4 メインエリア
</h3><h4>メインビジュアル</h4>

<p>Webページのトップページに当たる<em>kitchen.html</em>の上部の大きく表示されている画像をimg要素を使って挿入します。記述する場所は、header要素のすぐ下でメインエリアの上部になります。画像ファイルはすでに、<em>images_kitchen</em>フォルダに格納されておりますので、以下のように記述すると、反映されます。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからメインビジュアル画像--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main_visual</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/main_visual.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">健やかな健康と豊かな食生活をはじめる</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--メインビジュアル画像ここまで--&gt;</span>
</pre></div>
</div>
</div>

<p>以下のように表示されていれば、問題ありません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/main_visual.png" alt=""></p>

<h4>枠組みを作る</h4>

<p>ここからはwrapper内のメインエリアの中に記述していきます。まずは、骨子としてmainとsidebarを配置します。2つはdivとaside要素なので、ただの骨子であり、表示の変化は今のところありません。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからwrapperー--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
            <span class="comment">&lt;!--ここからサイド--&gt;</span>
            <span class="tag">&lt;aside</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">sidebar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/aside&gt;</span>
            <span class="comment">&lt;!--サイドここまで--&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
</pre></div>
</div>
</div>

<p>では、メインから内容を作成していきましょう。まずは全体をsection要素で囲み <code>point</code> というid属性をつけます。中見出しを配置し、その下に小見出しを持ったsectionを配置していきます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>TechAcademy KITCHENについて<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>食卓を豊かにしたい<span class="tag">&lt;/h3&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>本文の配置</h4>

<p>続いて本文を配置します。このあと画像を配置する関係でdiv要素を用意し、その中にp要素を使用して本文を記述します。読みやすいように、適度に改行を入れていきましょう。改行にはbr要素を使用します。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>TechAcademy KITCHENについて<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>食卓を豊かにしたい<span class="tag">&lt;/h3&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;p&gt;</span>
                                健やかな人生は健やかな食生活から<span class="tag">&lt;br&gt;</span>
                                上手に料理が作れるだけでなく、食べる人の人生をも健やかにしていきたい。<span class="tag">&lt;br&gt;</span>
                                それが、TechAcademy KITCHENの思いです。
                            <span class="tag">&lt;/p&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>画像の配置</h4>

<p>画像を挿入します。ここで掲載する画像はfigure要素で囲み、画像のimg要素と、キャプションのfigcaption要素を書きます。</p>

<h5>figure要素</h5>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_figure.png" alt=""></p>

<p>figure要素はイラストや写真などに対して、キャプション（説明文やタイトル）を書く場合に使います。</p>

<p>以下のように記載してみましょう。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>TechAcademy KITCHENについて<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>食卓を豊かにしたい<span class="tag">&lt;/h3&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;p&gt;</span>
                                健やかな人生は健やかな食生活から<span class="tag">&lt;br&gt;</span>
                                上手に料理が作れるだけでなく、食べる人の人生をも健やかにしていきたい。<span class="tag">&lt;br&gt;</span>
                                それが、TechAcademy KITCHENの思いです。
                            <span class="tag">&lt;/p&gt;</span>
                            <span class="tag">&lt;figure&gt;</span>
                                <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/photo01.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHENについて1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;figcaption&gt;</span>健康バランスを考えた食事<span class="tag">&lt;/figcaption&gt;</span>
                            <span class="tag">&lt;/figure&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>2段目の作成</h4>

<p>続いて、「TechAcademy KITCHENについて」の2つ目を作成しましょう。2段目は先ほどのソースコードに続くように、以下のように記載していきましょう。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>TechAcademy KITCHENについて<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>食卓を豊かにしたい<span class="tag">&lt;/h3&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;p&gt;</span>
                                健やかな人生は健やかな食生活から<span class="tag">&lt;br&gt;</span>
                                上手に料理が作れるだけでなく、食べる人の人生をも健やかにしていきたい。<span class="tag">&lt;br&gt;</span>
                                それが、TechAcademy KITCHENの思いです。
                            <span class="tag">&lt;/p&gt;</span>
                            <span class="tag">&lt;figure&gt;</span>
                                <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/photo01.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHENについて1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;figcaption&gt;</span>健康バランスを考えた食事<span class="tag">&lt;/figcaption&gt;</span>
                            <span class="tag">&lt;/figure&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>豊かな食生活を応援したい<span class="tag">&lt;/h3&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;p&gt;</span>
                                食は文化の数だけあります。<span class="tag">&lt;br&gt;</span>
                                食生活が豊かだと、人生をも豊かになります。 <span class="tag">&lt;br&gt;</span>
                                多彩なカテゴリの料理を提供し、料理をする人、食べる人の生活も豊かにしていきたいと思っております。
                            <span class="tag">&lt;/p&gt;</span>
                            <span class="tag">&lt;figure&gt;</span>
                                <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/photo02.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHENについて2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;figcaption&gt;</span>完成間近の作品<span class="tag">&lt;/figcaption&gt;</span>
                            <span class="tag">&lt;/figure&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
</pre></div>
</div>
</div>

<p>下記のようになっているはずです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_main_01.png" alt=""></p>

<h4>お知らせの追加</h4>

<p>「お知らせ」のセクションを作成します。「news」というID名を指定したsection要素を作成し、お知らせの各項目にはul, li要素でリストを作成します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_news.png" alt=""><br>
<em>※CSSが適用された状態です。</em></p>

<p>お知らせは、日付にspan要素、内容にa要素を適用します。また、各ページのリンクは以下のように指定しましょう。</p>

<ul>
  <li>講座案内：course.html</li>
  <li>写真を追加：gallery.html</li>
</ul>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

                    <span class="comment">&lt;!-- 中略 --&gt;</span>

                <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">news</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>お知らせ<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;ul&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;span&gt;</span>2018/09/01<span class="tag">&lt;/span&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内を更新しました<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;span&gt;</span>2018/08/31<span class="tag">&lt;/span&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>写真を追加しました<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;span&gt;</span>2018/08/24<span class="tag">&lt;/span&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内を更新しました<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;/ul&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
</pre></div>
</div>
</div>

<p>HTMLだけだと下記のようになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_news.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-5">8.5 サイドバー
</h3><p>Webページではサイドバーは、関連する情報やリンクなどを掲載します。同じサイト内であれば、表示しているページにかかわらず同一の情報が掲載されることの多い領域です。そのため、見せたい情報などを掲載します。明確なルールはありませんが、掲載する情報は、サイトの種類によって異なる傾向にあります。企業のWebページの場合は、運営するSNSやブログ、採用サイト、お問い合わせへの導線が多く、ECの場合は、商品の検索機能、ブログなどの場合は広告を掲載することが多くあります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/base_html_2.png" alt=""><br>
<em>※こちらはCSSが適用された状態です。</em></p>

<h4>骨組みの作成</h4>

<p>サイドバーはwrapperエリアにあります。補足情報を示すaside要素で書き、ID名を「sidebar」をつけて配置します。今回はサイドバーにバナーを掲載しますので、バナー部分は、section要素でIDを「side_banner」とします。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからwrapper--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

                <span class="comment">&lt;!-- 中略 --&gt;</span>

            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
            <span class="comment">&lt;!--ここからサイド--&gt;</span>
            <span class="tag">&lt;aside</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">sidebar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">side_banner</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/aside&gt;</span>
            <span class="comment">&lt;!--サイドここまで--&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
</pre></div>
</div>
</div>

<p>続いて、ブログへのリンクを貼りましょう。TechAcademyKITCHENは架空のお料理教室なので、今回はTechAcademyの運営するTechAcademyマガジンのリンクにしておきます。</p>

<h4>関連リンクの配置</h4>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--ここからwrapper--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

                <span class="comment">&lt;!-- 中略 --&gt;</span>

            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
            <span class="comment">&lt;!--ここからサイド--&gt;</span>
            <span class="tag">&lt;aside</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">sidebar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">side_banner</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>関連リンク<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;ul&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://techacademy.jp/magazine/</span><span class="delimiter">"</span></span> <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/banner01.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">ブログ</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
                            <span class="tag">&lt;p&gt;</span>毎日季節の野菜を取り入れたレシピを公開中。<span class="tag">&lt;/p&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;/ul&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/aside&gt;</span>
            <span class="comment">&lt;!--サイドここまで--&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>Previewで確認してみて、このように表示されていれば、OKです。リストとして表示しているので画像の前に黒丸が付いておりますが、後で外しますので今は気にしないでください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/sidebar_html.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-6">8.6 フッター
</h3><p>フッターとはWebページの下端に設けられた、情報を示すエリアです。表示する情報に決まりはなく、ナビゲーションリンク、法的に必要なリンク、著作権、お問い合わせ、サイトマップ、などを表示するケースが多いです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_footer.png" alt=""><br>
<em>※こちらはCSSが適用された状態です。</em></p>

<h4>ナビゲーション</h4>

<p>フッターには、ナビゲーション（各主要ページへのリンク）とコピーライトの2つの情報を掲載をします。ナビゲーションについては、リストとして表示します。ID名は「footer_navi」と指定します。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
        <span class="comment">&lt;!--ここからフッター--&gt;</span>
        <span class="tag">&lt;footer&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">footer_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/footer&gt;</span>
        <span class="comment">&lt;!--フッターここまで--&gt;</span>
</pre></div>
</div>
</div>

<h4>コピーライト</h4>

<p>次にコピーライト(コピーライトで変換します)を記述します。コピーライトはsmall要素を使って記述します。small要素は注釈や著作権・ライセンス要件などの注釈や細目を表す際に使用します。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
        <span class="comment">&lt;!--ここからフッター--&gt;</span>
        <span class="tag">&lt;footer&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">footer_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;small&gt;</span><span class="entity">&amp;copy;</span> 2018 TechAcademy KITCHEN.<span class="tag">&lt;/small&gt;</span>
        <span class="tag">&lt;/footer&gt;</span>
        <span class="comment">&lt;!--フッターここまで--&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_footer.png" alt=""></p>

<h4>HTMLはここまで</h4>

<p>HTMLのチュートリアルはここまでです。下記のようになっているか確認しておきましょう。</p>

<p><a href="https://techacademy.s3.amazonaws.com/
training/htmlcss/html/techacademy-kitchen_html_allpage2.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_allpage2.png" alt=""></a></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-7">8.7 HTML完成
</h3><p><em>kitchen.html全体</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="comment">&lt;!--ここからヘッダー--&gt;</span>
        <span class="tag">&lt;header&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHEN</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span>
            <span class="tag">&lt;nav</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">global_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">current</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/nav&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="comment">&lt;!--ヘッダーここまで--&gt;</span>
        <span class="comment">&lt;!--ここからメインビジュアル画像--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main_visual</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/main_visual.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">健やかな健康と豊かな食生活をはじめる</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--メインビジュアル画像ここまで--&gt;</span>
        <span class="comment">&lt;!--wrapperー--&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="comment">&lt;!--ここからメイン--&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>TechAcademy KITCHENについて<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>食卓を豊かにしたい<span class="tag">&lt;/h3&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;p&gt;</span>
                                健やかな人生は健やかな食生活から<span class="tag">&lt;br&gt;</span>
                                上手に料理が作れるだけでなく、食べる人の人生をも健やかにしていきたい。<span class="tag">&lt;br&gt;</span>
                                それが、TechAcademy KITCHENの思いです。
                            <span class="tag">&lt;/p&gt;</span>
                            <span class="tag">&lt;figure&gt;</span>
                                <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/photo01.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHENについて1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;figcaption&gt;</span>健康バランスを考えた食事<span class="tag">&lt;/figcaption&gt;</span>
                            <span class="tag">&lt;/figure&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                    <span class="tag">&lt;section&gt;</span>
                        <span class="tag">&lt;h3&gt;</span>豊かな食生活を応援したい<span class="tag">&lt;/h3&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">point</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;p&gt;</span>
                                食は文化の数だけあります。<span class="tag">&lt;br&gt;</span>
                                食生活が豊かだと、人生をも豊かになります。 <span class="tag">&lt;br&gt;</span>
                                多彩なカテゴリの料理を提供し、料理をする人、食べる人の生活も豊かにしていきたいと思っております。
                            <span class="tag">&lt;/p&gt;</span>
                            <span class="tag">&lt;figure&gt;</span>
                                <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/photo02.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHENについて2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;figcaption&gt;</span>完成間近の作品<span class="tag">&lt;/figcaption&gt;</span>
                            <span class="tag">&lt;/figure&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">news</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>お知らせ<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;ul&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;span&gt;</span>2018/09/01<span class="tag">&lt;/span&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内を更新しました<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;span&gt;</span>2018/08/31<span class="tag">&lt;/span&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>写真を追加しました<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;span&gt;</span>2018/08/24<span class="tag">&lt;/span&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内を更新しました<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;/ul&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="comment">&lt;!--メインここまで--&gt;</span>
            <span class="comment">&lt;!--ここからサイド--&gt;</span>
            <span class="tag">&lt;aside</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">sidebar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">side_banner</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>関連リンク<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;ul&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://techacademy.jp/magazine/</span><span class="delimiter">"</span></span> <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/banner01.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">ブログ</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
                            <span class="tag">&lt;p&gt;</span>毎日季節の野菜を取り入れたレシピを公開中。<span class="tag">&lt;/p&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;/ul&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/aside&gt;</span>
            <span class="comment">&lt;!--サイドここまで--&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="comment">&lt;!--wrapperここまで--&gt;</span>
        <span class="comment">&lt;!--ここからフッター--&gt;</span>
        <span class="tag">&lt;footer&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">footer_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;small&gt;</span><span class="entity">&amp;copy;</span> 2018 TechAcademy KITCHEN.<span class="tag">&lt;/small&gt;</span>
        <span class="tag">&lt;/footer&gt;</span>
        <span class="comment">&lt;!--フッターここまで--&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection challenge"><h3 class="index" id="kadai-html">課題：HTMLで文書作成</h3><p><em>kadai-html.html</em>という名前で、Cloud9上にファイルを作成し、下記の雛形から画像の通りのHTMLを作成してください。完了したら、「課題を提出」しましょう。「課題を提出」していただくと、メンターがCloud9上のファイルをレビューします。提出方法が不明な方は、 <a href="./orientation#chapter-8-3" target="_blank">こちらのリンクをクリックして「レッスン0 事前準備」の「8.3 課題提出」を参照してください。</a></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/kadai-html1.png" alt=""></p>

<p><em>kadai-html.htmlの雛形</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>HTML/CSSでWebページ作成<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;header&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;nav</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/nav&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;footer&gt;</span>
        <span class="tag">&lt;/footer&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>
</div></section><section id="chapter-9"><h2 class="index">9. CSSの基本
</h2><div class="subsection"><p>ここからはCSSを学んでいきましょう。CSSを使えば、HTMLにデザインを適用できます。</p>

<p>CSSを記述するには、以下の3つの方法があります。</p>

<ul>
  <li>HTMLの各タグの中に <code>style</code> 属性を追加し、属性値としてCSSを記述する</li>
  <li>head要素の中に <code>&lt;style&gt;</code> というタグ（要素）を追加し、<code>&lt;style&gt;</code> の内容としてCSSを記述する</li>
  <li>CSSファイルを用意し、ファイルの中にCSSを記述する</li>
</ul>

<p>ここでは、3番目のCSSファイルを利用する方法でCSSを学びます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 CSSファイルの作成
</h3><p>CSSファイルはHTMLと同じく、テキストファイルです。テキストエディタを使用して作成します。</p>

<p>保存したファイルの拡張子を「<strong>.css</strong>」にすることで、WebブラウザにCSSファイルとして認識されます。</p>

<p>通常はこのCSSファイルを適用するHTMLファイルと同じサーバー上に保存して、HTMLファイルから参照します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 CSSの記法
</h3><p>CSSの記法はとても単純で、「HTML内の○○要素の△△を□□にする」のように記述します。具体的な例を出すと「p要素の文字色を赤にする」や、「h1要素のマージンを40pxにする」となります。これらをCSSで記述すると、それぞれ下のようになります。マージンとは余白のことです。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* p要素の文字色(color)を赤(red)にする */</span>
<span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}

<span class="comment">/* h1要素のマージン(margin)を40pxにする */</span>
<span class="tag">h1</span> {
    <span class="key">margin</span>: <span class="float">40px</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jusuzom/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.7"></script></p>

<p>上のコード内で要素を指定している箇所（p,h1）を「セレクタ」、スタイルの種類(color,margin)を「プロパティ」、そしてプロパティに対するもの(red,40px)を「値」と呼びます。</p>

<p>セレクタの後を<code>{ }</code>で囲み、プロパティと値のセットを記述します。プロパティの後には<code>:（コロン）</code>を、値の後には<code>;（セミコロン）</code>を書くのを忘れないようにしましょう。</p>

<p>プロパティにインデントをつけると把握しやすくなります。</p>

<pre><code>セレクタ {
    プロパティ: 値;
}
</code></pre>

<p><strong>値の後に<code>;</code>（セミコロン）をつけるのを忘れないように</strong>しましょう。表示が崩れる原因となります。</p>

<p>1つのセレクタに対して、複数のプロパティを設定することもできます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span> {
    <span class="key">color</span>: <span class="color">#ff0000</span>; <span class="comment">/* 文字色 */</span>
    <span class="key">font-size</span>: <span class="float">24px</span>; <span class="comment">/* フォントサイズ */</span>
}
<span class="tag">h1</span> {
    <span class="key">margin-top</span>: <span class="float">20px</span>; <span class="comment">/* 上部マージン */</span>
    <span class="key">margin-bottom</span>: <span class="float">40px</span>; <span class="comment">/* 下部マージン */</span>
}
</pre></div>
</div>
</div>

<p>CSSの構成要素は</p>

<ul>
  <li>セレクタ</li>
  <li>プロパティ</li>
  <li>値</li>
</ul>

<p>の3つなので、それぞれ詳しくみていきましょう。</p>

<h4>CSSのコメント</h4>

<p>HTML同様にCSSにも、コメントを書くための記法があります。先程書いた <code>/* p要素の文字色を... */</code> がコメントになります。CSSのコメントは</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* ここにコメントを書く */</span>
</pre></div>
</div>
</div>

<p>上記のように、 <code>/*</code> と <code>*/</code>で囲まれた中に書くことができます。</p>

<p><strong>コメントはブラウザからは無視されるので表示されません。</strong>コメントがブラウザに無視されて表示されないという特性を活かして、CSSを直接書く人にメモ用途としてコメントを残すことができます。</p>

<p>ただし、CSS内のコメントは、Webページで右クリックして「ページのソースを表示」すると、誰でもコメントを読めてしまいますので、<strong>実際にはプライベートなコメントを書くべきではありません</strong>。</p>

<p>上の例のように行末にコメントを書くだけでなく、複数行にわたって使用することもできます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/*
  複数行
  に
  わたる
  コメント
*/</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 セレクタ
</h3><h4>要素全体のセレクタ</h4>

<p>もう一度CSSの記法を確認し、セレクタが書かれる位置を把握しておきましょう。</p>

<p><em>CSSの記法</em></p>

<pre><code>セレクタ {
    プロパティ: 値;
}
</code></pre>

<p>セレクタとは、デザインを適用する要素を指定するものです。下記の例では、p要素やh1要素を指定しています。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* p要素の文字色(color)を赤(red)にする */</span>
<span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}

<span class="comment">/* h1要素のマージン(margin)を40pxにする */</span>
<span class="tag">h1</span> {
    <span class="key">margin</span>: <span class="float">40px</span>;
}
</pre></div>
</div>
</div>

<p>p要素、h1要素全体を指定したいときは、上記のように<code>p { }</code>, <code>h1 { }</code>と書けば良いですが、<strong>p要素全てではなく、特定の箇所だけ</strong> デザインを適用したい場合もあります。</p>

<p>そういう場合に、細かく指定するセレクタの記法があるので、ここで理解しておきましょう。</p>

<p>ここで学ぶ内容はp要素のみに限った話ではなく、全ての要素に関するものです。</p>

<h4>class属性で指定するセレクタ</h4>

<p>p要素の中でも特定のclass属性を持ったp要素のみをセレクタとしたい場合には、<code>.</code>記号を利用します。例えば、<code>class="important"</code> というclass属性を持ったp要素の文字色だけ赤にしたいときは下記のように書きます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span><span class="class">.important</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
</pre></div>
</div>
</div>

<p>pのすぐ後ろに <code>.</code> の記号を記述し、<code>.</code> の後ろにクラス名を指定することで、デザインの適用する範囲を限定できます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/mowogab/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>次はp要素限定ではなく、どんな要素でもいいので、<code>class="important"</code> 属性を持った全要素の文字色を赤にしたい場合には、下記のように要素を指定しなければOKです。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.important</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/sepuhed/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ここでは例として、<code>class="important"</code> としましたが、クラス名は何でも構いません。<code>class="abc"</code> な要素にデザインを適用したい場合には下記のようにセレクタを書きましょう。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.abc</span> {
  <span class="comment">/* プロパティと値 */</span>
}
</pre></div>
</div>
</div>

<p><code>.クラス名</code>とすることで指定されたクラス名のセレクタを書くことができます。</p>

<h4>id属性で指定するセレクタ</h4>

<p>id属性もclass属性と同様です。違いは、class属性が <code>.</code> 記号を使用したのに対して、id属性は <code>#</code> を使用する点です。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span><span class="id">#important</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
</pre></div>
</div>
</div>

<p>class属性と同様に、<code>p#important</code> と <code>p</code> をつければ、p要素に限定されます。<code>#important</code> とすれば、全要素の <code>id="important"</code> に対して適用されます。</p>

<h4>子孫セレクタ</h4>

<p>HTML文書の構造に沿って指定するセレクタもあります。その中の1つである子孫セレクタはよく使用されるので、ここで学んでおきましょう。例えば、下記のような文章で、<code>div &gt; article &gt; p</code>という構造になっているp要素にのみ文字を赤色にするデザインを適用させたいとしましょう。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>文章<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;div&gt;</span>
    <span class="tag">&lt;article&gt;</span>
        <span class="tag">&lt;p&gt;</span>div <span class="error">&gt;</span> article <span class="error">&gt;</span> pの文章<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/article&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>このとき、下記のように <code>div article p</code> と、半角スペース区切りで要素の中身を絞り込んでいくと、HTML構造に沿った特定の要素に対してのみデザインを適用できます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">div</span> <span class="tag">article</span> <span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/wupusev/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>疑似クラス</h4>

<p>セレクタの中でも疑似クラスという便利なセレクタがあるので、一部を紹介します。</p>

<p>今までは特定の要素をいかに指定するかについてのセレクタでしたが、疑似クラスを使うことで、要素の中でも<strong>特定の状態</strong>になっている要素にのみ、デザインを適用できます。例えば、普段Webページを閲覧する中で目にするテキストリンクは、リンクテキストにカーソルを合わせると色が変わるのを見たことあるはずです。この場合、要素は常に <code>&lt;a&gt;</code> 要素のはずですが、状況によってスタイルを変えるには下記のようなCSSを書きます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">a</span><span class="pseudo-class">:link</span> {
    <span class="key">color</span>: <span class="color">#0000ff</span>;
}
<span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">color</span>: <span class="color">#ff0000</span>;
}
<span class="tag">a</span><span class="pseudo-class">:visited</span> {
    <span class="key">color</span>: <span class="color">#999999</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/goloniw/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<ul>
  <li><code>a:link</code>は未訪問のリンクです。未訪問リンクの文字色を青に指定します。</li>
  <li><code>a:hover</code>は要素にカーソルが乗っている状態です。a要素にカーソルを合わせると文字色が赤になるように指定しています。</li>
  <li><code>a:visited</code>は訪問済みのリンクです。訪問済みリンクの文字色はグレーになるように指定しています。</li>
</ul>

<p>リンクに関しては、基本的に上記3種類の擬似クラスを使うことで対応可能です。</p>

<h4>その他のセレクタ</h4>

<p>その他にもいくつか便利に指定できるセレクタはありますが、頻繁には利用しないので、簡単な紹介に留めます。</p>

<p>セレクタの多くの種類は下記のリファレンスサイトにまとまっているので、覚える必要はないですが、ざっと眺めておいて、こんなセレクタが欲しいなと思ったらすぐ調べられるようにしておくと良いでしょう。</p>

<ul>
  <li><a href="http://www.htmq.com/css3/index.shtml#selector" target="_blank">セレクタ - CSS3リファレンス</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-9-4">9.4 プロパティ
</h3><p>もう一度CSSの記法を確認し、プロパティが書かれる位置を把握しておきましょう。</p>

<p><em>CSSの記法</em></p>

<pre><code>セレクタ {
    プロパティ: 値;
}
</code></pre>

<p>プロパティとは、セレクタによって指定された要素に対して適用するデザインの種類です。例えば、今まで <code>color</code> というプロパティを使用してきましたが、これは <strong>文字色を指定するためのプロパティ</strong> です。</p>

<p>今までプロパティには、文字色を変更するための <code>color</code> ぐらいしか使いませんでしたが、実際にはとても多くのプロパティが存在します。紹介しきれないので、新しいプロパティが出てくる度にリファレンスで確認するやり方をお勧めします。また、プロパティの名前でどんなデザインの種類のプロパティかは予想がつくことも多いです。ここでは、いくつか主要なプロパティを紹介します。</p>

<h4>テキスト関係のプロパティ</h4>

<p>以下はテキストの色や大きさ、寄せ方を指定するプロパティです。</p>

<table>
  <thead>
    <tr>
      <th>プロパティ</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>color</td>
      <td>文字色の指定</td>
    </tr>
    <tr>
      <td>font-size</td>
      <td>文字の大きさの指定</td>
    </tr>
    <tr>
      <td>font-weight</td>
      <td>文字の太さの指定</td>
    </tr>
    <tr>
      <td>text-align</td>
      <td>文字の行揃えの指定（左寄せ、中央寄せ、右寄せなど）</td>
    </tr>
  </tbody>
</table>

<p>他にも、フォント自体を変更するプロパティや、斜体にしたり下線をつけたりするプロパティがあります。</p>

<h4>背景のプロパティ</h4>

<p>背景色や、背景の画像を指定するためのプロパティを紹介します。</p>

<table>
  <thead>
    <tr>
      <th>プロパティ</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>background-color</td>
      <td>背景色の指定</td>
    </tr>
    <tr>
      <td>background-image</td>
      <td>背景画像の指定</td>
    </tr>
  </tbody>
</table>

<h4>ボックスモデルに関するプロパティ</h4>

<p>ボックスモデルについては後で解説するので、ここでは簡単な紹介に留めます。</p>

<table>
  <thead>
    <tr>
      <th>プロパティ</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>margin</td>
      <td>マージン（余白・外）のサイズを指定</td>
    </tr>
    <tr>
      <td>border</td>
      <td>ボーダー（境界線）のサイズの指定</td>
    </tr>
    <tr>
      <td>padding</td>
      <td>パディング（余白・内）のサイズを指定</td>
    </tr>
    <tr>
      <td>width</td>
      <td>コンテンツの横幅を指定</td>
    </tr>
    <tr>
      <td>height</td>
      <td>コンテンツの縦幅を指定</td>
    </tr>
  </tbody>
</table>

<h4>表示や配置に関するプロパティ</h4>

<p>こちらも後の章で解説するので、ここでは簡単な紹介に留めます。</p>

<table>
  <thead>
    <tr>
      <th>プロパティ</th>
      <th>用途</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>display</td>
      <td>要素の表示・非表示を指定</td>
    </tr>
    <tr>
      <td>float</td>
      <td>サイドバーなどコンテンツの配置を指定</td>
    </tr>
    <tr>
      <td>position</td>
      <td>同じくコンテンツの配置を指定</td>
    </tr>
    <tr>
      <td>overflow</td>
      <td>コンテンツがはみ出た場合の対応を指定</td>
    </tr>
  </tbody>
</table>

<h4>その他のプロパティ</h4>

<p>その他にもいくつか便利に指定できるプロパティがあります。プロパティの多くの種類は下記のリファレンスサイトにまとまっているので、覚える必要はないですが、ざっと眺めておいておくと良いでしょう。新しいプロパティを発見する度に、下記リファレンスサイトや検索サイトで検索することをお勧めします。</p>

<ul>
  <li><a href="http://www.htmq.com/style/index.shtml" target="_blank">CSSリファレンス</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-9-5">9.5 値
</h3><p>プロパティによって指定できる値は変わります。例えば、<code>color</code> という文字色を指定するプロパティに対して <code>40px</code> のような長さの単位の値を指定することはできません。</p>

<h4>長さの記法</h4>

<p>Webで使用する長さの基本単位はpx（ピクセル）になります。コンピュータのディスプレイは、いくつもの小さなドット（点）がそれぞれ色を発することで画面を表示しています。最近のHD画質のディスプレイは横1920ドットx縦1080ドットで構成されていることが多いです。ピクセルはドットと対応しており、1ピクセルは1ドットで表示されます。例えば1920ピクセルx1080ピクセルの画像を、1920ドットx1080ドットのディスプレイで原寸大表示させると丁度ディスプレイにすっぽり収まる形で表示されます。</p>

<p><code>font-size</code> の例を見てみましょう。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span> {
  <span class="key">font-size</span>: <span class="float">10px</span>;
}

<span class="tag">p</span><span class="class">.important</span> {
  <span class="key">font-size</span>: <span class="float">20px</span>;
}
</pre></div>
</div>
</div>

<p>と書けば、全てのp要素に対しては <code>font-size</code> が <code>10px</code> で、<code>.important</code> なp要素に対しては <code>20px</code> になります。</p>

<p>ピクセル単位の他にも、パーセント表記もあります。これは親要素を100%として、自分は何%なのかを指定します。下記は、親要素 <code>div.normal</code> の <code>font-size</code> を <code>10px</code> として指定し、<code>div.normal</code> の中のp要素（子孫セレクタ <code>div.normal p</code> で指定）では、<code>font-size</code>を<code>200%</code>としています。このとき、<code>10px</code> の <code>200%</code> なので、<code>div.normal p</code> は<code>font-size</code> が実質 <code>20px</code> になります。このように親要素と比較して相対的に子要素の値を決めることもできます。反対に、<code>10px</code> のように絶対的な指定もできます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/wipurif/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>この長さに関する値は、<code>font-size</code> だけでなく全ての長さに関するプロパティに対して指定できる値です。例えば、ボックスモデルの <code>width</code> や <code>height</code>, <code>padding</code>, <code>border</code>, <code>margin</code> などがあります。ボックスモデルに関しては後ほど解説します。</p>

<h4>色の記法</h4>

<p>色もよく指定することになる値です。今まで <code>color</code> プロパティを使い、<code>red</code> など文字色の英語表記の値を使って指定してきましたが、他にも色の値を表現する方法は3つあります。</p>

<ul>
  <li>英語: red, green, blue, …</li>
  <li>RGB(16進数): <code>#000000</code> から <code>#ffffff</code> まで</li>
  <li>RGBA関数:（例）<code>rgba(0,0,0,0)</code></li>
</ul>

<p>この中で一番わかりやすいのは英語表記でしょう。red, green, blue, gray, black, whiteなど実に様々な色が用意されています。</p>

<p>次に、RGB(16進数)です。16進数とは、0から数えて0123456789abcdefまでが1桁になる数え方です。私たちが日常で使用している数え方は1桁が0から9までの10進数ですよね。16進数では1の位はa=10, b=11, …, f=15まで、2桁の場合は00(10進数で0)からff(10進数で255)まで数えられます。アルファベットは大文字でも構いません。</p>

<p>RGB(16進数)は左から赤(Red)、緑(Green)、青(Blue)となっていて、各色の強さを256段階で指定できます。<code>#ff0000</code> だと赤だけ最大値なので、<span style="color: #ff0000;">赤色</span>となります。他には、<code>#ff00ff</code> であればR（赤）とB（青）が最大値なので、<span style="color: #ff00ff;">紫色</span>になります。<code>#dddddd</code> は全ての色が同じ値なので、<code>#000000</code>(黒) 〜 <code>#ffffff</code>(白) の間、つまり<span style="color: #dddddd;">グレー</span>になります。</p>

<p>なお、R,G,Bの全てが <code>00</code>, <code>11</code>, …, <code>ff</code> というように2桁が同じ数値になる場合は、1桁のみに省略できます。<code>#ff0000</code> は <code>#f00</code>、<code>#ff00ff</code> は <code>#f0f</code>、<code>#dddddd</code> は <code>#ddd</code> です。</p>

<p>RGBA関数の場合は、rgba(R,G,B,a)となっており、R,G,Bは0から255の範囲、aは透明度のことで0.0（完全に透明になる）から1.0（完全に不透明で色がつく）まで扱えます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/nizuhuq/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="http://www.colordic.org/" target="_blank">参考：WEB色見本サイト</a></li>
</ul>

<h4>その他の値の記法</h4>

<p>長さや色以外にも値として使えるものがいくかあります。例えば、先程テキスト関係のプロパティとして紹介した <code>text-align</code> は、テキストをどの方向に寄せるのかを指定するプロパティで、指定できる値は <code>right</code>, <code>center</code>, <code>left</code>, <code>justify</code>（均等揃え）の文字列値になります。</p>

<p>全ての値を紹介しきれないので、知らない値が出るたびにリファレンスサイトや検索を利用することをおすすめします。値はプロパティによって指定できるものが変わるので、プロパティと対で覚えましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-6">9.6 CSSの優先順位
</h3><p>CSSのデザインの適用には、優先度があります。</p>

<h4>下に書かれたものほど優先</h4>

<p>CSSファイル内で下に書かれたものほど優先されてデザインが適用されます。特に、同じセレクタを複数記述する場合は気をつけてください。たとえば、下記CSSの場合には、<code>color</code>の<code>red</code>は上書きされ、最終的には<code>green</code>が適用されます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
<span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">green</span>;
}
</pre></div>
</div>
</div>

<h4>詳細なセレクタほど優先</h4>

<p>より詳細に指定されたセレクタほど優先されてデザインが適用されます。例えば、下記CSSの場合には、下側に <code>color: green;</code> があるので全てp要素が緑色の字になりそうですが、上側のセレクタでは<code>p.important</code>とクラス名まで詳細に指定されているので、<code>class="important"</code> なp要素は文字色が <code>red</code> になります。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span><span class="class">.important</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
<span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">green</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-7">9.7 CSSの適用方法
</h3><p>HTMLにCSSを適用する方法をおさらいします。</p>

<ul>
  <li>HTMLの各タグの中に <code>style</code> 属性を追加し、属性値としてCSSを記述する</li>
  <li>head要素の中に <code>&lt;style&gt;</code> というタグ（要素）を追加し、<code>&lt;style&gt;</code> の内容としてCSSを記述する</li>
  <li>CSSファイルを用意し、ファイルの中にCSSを記述する</li>
</ul>

<p>HTMLとCSSの考え方の基本として、文書であるHTMLと、デザイン指定であるCSSは別ファイルで管理すべきというものがあります。文書とデザインでは役割が全く別なので、それぞれの役割に沿ってファイルを分割しようという考え方です。したがって、リストの最後のCSSを外部ファイルとして読み込んで適用することが推奨されるやり方です。</p>

<h4>HTMLの各タグ内にstyle属性として適用</h4>

<p>style属性を使うことで、HTMLタグの中に直接CSSを書き込むことができます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p</span> <span class="attribute-name">style</span>=<span class="string"><span class="delimiter">"</span><span class="key">color</span>: <span class="value">red</span>;<span class="delimiter">"</span></span><span class="tag">&gt;</span>ここが赤文字<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>この方法は、制作作業中に一時的にスタイルの確認をしたい時などに有用です。この方法は、head要素内で読み込まれたスタイルよりも確実に後から読み込まれるので、 <strong>HTMLタグ内に記述したCSSは常に優先的に適用される</strong> と覚えてください。</p>

<h4>head内にstyleとして適用</h4>

<p><code>&lt;head&gt;</code> 要素内で使用可能な <code>&lt;style&gt;</code> タグ内にCSSを記述できます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;style&gt;</span>
<span class="inline">        <span class="tag">p</span><span class="class">.red</span> {
            <span class="key">color</span>: <span class="color">#ff0000</span>;
        }</span>
    <span class="tag">&lt;/style&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<p>上記のようにhead要素のstyle要素としてCSSを書くと、このHTMLファイル内のbody要素だけに適用されます。</p>

<h4>外部ファイルとして読み込む</h4>

<p>これが <strong>推奨される方法</strong> です。</p>

<p>CSSを適用したいHTMLのhead要素内にlink要素を書き込むことで、CSSを読み込むことができます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;head&gt;</span>
    <span class="comment">&lt;!-- 中略 --&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">style.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<p>上記のソースコードでは、<em>style.css</em>というCSSファイルを読み込んで<em>style.css</em>内のCSSを適用します。</p>

<p>実際にCloud9でやってみましょう。</p>

<p>まずはCSSを適用するためのHTMLとして <code>minimum.html</code> を使います。HTMLのチャプターで作成したファイルになりますが、無い場合は下記のような内容で <code>minimum.html</code> を作成してください。</p>

<p><em>minimum.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>本文です。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>更に下記のように <code>minimum.css</code> を作成します。</p>

<p><em>minimum.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span> {
    <span class="key">color</span>: <span class="value">red</span>;
}
</pre></div>
</div>
</div>

<p>ここまで作成してもまだHTMLにはCSSは適用されません。何も装飾されていないことを確認しておきましょう。確認は、<em>minimum.html</em>を右クリックし、Previewをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/htmlcss_03.png" alt=""></p>

<p>さて、CSSを適用するために、head要素内にlink要素を追加しましょう。</p>

<p><em>minimum.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">minimum.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>本文です。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>これで <code>minimum.html</code> から <code>minimum.css</code> が読み込まれるようになり、デザインが適用され、<code>&lt;p&gt;本文です&lt;/p&gt;</code> の文字色が赤色に変わります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/htmlcss_03_01.png" alt=""></p>

<p>ここまで3種類の方法を紹介しましたが、最初に述べたとおりCSSファイルは基本的には外部ファイル化して使用しましょう。理由としては、外部ファイルにして共有化したほうがサイト全体としてのメンテナンス性が高く保てること、また各々のHTML文書が簡素化され、視認性が良くなることなどが挙げられます。</p>

<div class="alert alert-info">
JS Binでは、CSS欄に記述した命令が自動でHTMLの記述内容に埋め込まれてOutput欄の表示内容に反映されますので、<code>&lt;style&gt;</code>タグや<code>&lt;link&gt;</code>タグをHTML欄の中に記述する必要はありません。
</div>
</div></section><section id="chapter-10"><h2 class="index">10. Webページのレイアウト
</h2><div class="subsection"><p>レイアウトとは、<strong>何かを指定の場所に配置する</strong>ことです。家屋の内装のレイアウトと言えば、家具をどこに配置するかで決まります。Webのレイアウトも同様で、<strong>HTML要素をどこに配置するか</strong> を決めていきます。</p>

<p>HTML要素をレイアウトするには、CSSを使用します。<strong>HTMLだけでは上から下に配置されていくだけ</strong> です。そのためHTMLだけでは好きな位置に要素を配置できません。そこでCSSを使用して、HTMLを任意の場所に表示させるのです。</p>

<p>HTML要素を自由にレイアウトするには、2つの技術が必要です。</p>

<ul>
  <li>HTML要素自体の大きさを変更する</li>
  <li>HTML要素の位置を変更する</li>
</ul>

<p>この2つができるようになれば、自由にHTML要素をレイアウトできるでしょう。</p>

<p>ここでは、前提となる知識から学んでいきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-1">10.1 前提知識
</h3><h4>displayプロパティのデフォルト値の違い</h4>

<p>まず、前提として覚えておいて欲しいのは、HTML要素によって <strong>displayと呼ばれるプロパティのデフォルト値が違う</strong> ということです。これはレイアウトの前提知識として、おさえておいてください。</p>

<p>今まで説明してきていませんが、div要素は画面サイズの横いっぱいまで占領するため、複数のdiv要素を並べた場合は自動的に改行されて縦に並んでいきます。しかし、span要素を複数並べた場合には、改行されず横に並びます。</p>

<p>このことを視覚的に理解してもらうため、下記の例を用意しました。わかりやすくするため、背景色を指定しています。上3つが <code>div</code> 要素で、下3つは <code>span</code> 要素です。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/xuxukoq/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<h4>block と inline</h4>

<p>displayプロパティに指定できる値は数種類あります。一例を以下の表に示します。</p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">プロパティと値</th>
      <th style="text-align: left">内容</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>display: block;</code></td>
      <td style="text-align: left">ブロックレベル要素になる</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>display: inline;</code></td>
      <td style="text-align: left">インラインレベル要素になる</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>display: inline-block;</code></td>
      <td style="text-align: left">要素全体はインラインレベル要素、要素内はブロックレベル要素になる</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>display: none;</code></td>
      <td style="text-align: left">画面に表示されなくなる</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>display: flex;</code></td>
      <td style="text-align: left">Flexboxモデルに従った表示になる</td>
    </tr>
  </tbody>
</table>

<p>特に主要な値はblockとinlineの2つです。</p>

<p>divはデフォルトでblock、 spanはデフォルトでinlineとなっています。blockの要素は画面サイズの横いっぱいを占領するため自動的に改行されて縦に並んでいき、inlineのものは改行されず横に並びます。</p>

<p><code>display: block;</code> がデフォルトで設定されている要素には、</p>

<ul>
  <li>h1, など見出し要素</li>
  <li>div</li>
  <li>section</li>
  <li>article</li>
  <li>p</li>
  <li>ul, ol</li>
  <li>table</li>
</ul>

<p>などがあり、<strong>ブロックレベル要素</strong> と呼ばれます。</p>

<p><code>display: inline;</code>がデフォルトで設定されている要素には、</p>

<ul>
  <li>span</li>
  <li>a</li>
  <li>img</li>
</ul>

<p>などがあり、<strong>インラインレベル要素</strong> と呼ばれます。</p>

<p>div要素をインラインレベル要素の表示にしたい場合には、下記の例のように <code>display: inline;</code> を指定すればOKです。下記は赤( <code>.r</code> )と緑( <code>.g</code> )にだけ <code>display: inline;</code> を指定して、デフォルト値である <code>display: block;</code> を上書きしています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/pomapap/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>デフォルトのレイアウト</h4>

<p>Webのレイアウトを学ぶ上で、しっかり認識しておきたいのが、 Webページを表示する画面（ブラウザ）の特性です。それは <strong>1画面上の横幅と縦幅は多様に変化し、1ページは無限に長くなる</strong> ということです。ブラウザの大きさを変更することで1画面に収まるサイズは変化します。また、1ページにコンテンツを大量に載せれば、どこまででも長くできます。（Webとは違って、書籍や雑誌、新聞はサイズが固定されていますよね。）これがWebの特徴となります。</p>

<p>この特徴のためにブラウザは、 <strong>画面の左上を起点として上から下へ、左から右へ、HTML要素を詰めるように並べていきます</strong> 。これがブラウザのデフォルトのレイアウトになります。displayの値のところでみたdivとspanの通常の並びを見ればわかりやすいです。 divのような <code>display: block;</code>（ブロックレベル要素）は上から下へ、 spanのような <code>display: inline;</code>（インライン要素）は左から右へ並んでいるのがわかります。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/xuxukoq/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>以降、ブロックレベル要素のレイアウトを扱います。なぜなら、レイアウトが必要なのは、大抵ブロックレベル要素だからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-2">10.2 ボックスモデル
</h3><p>では、 displayプロパティを理解したところで、レイアウトについて学んでいきましょう。</p>

<p>ここでは <strong>ボックスモデル</strong> について解説します。ボックスモデルはWebページのレイアウトを考える上で最も重要な概念です。少し難しくなるので、何度も読み直してしっかり理解しておきましょう。</p>

<p>ボックスモデルを理解することで</p>

<ul>
  <li>HTML要素自体の大きさの変更 (padding, width, heightを使う)</li>
  <li>HTML要素の位置の変更 (marginを使う)</li>
</ul>

<p>をどちらも、ある程度できるようになります。padding, marginなどは、このあと解説していきます。</p>

<h4>ボックスモデルとは</h4>

<p>ボックスモデルの「ボックス」とは、HTMLの各要素に割り当てられている <strong>四角い領域</strong> のことです。HTML要素（divやspanなど）があると、そのHTML要素1つ1つにボックスが存在します。HTML要素にはdivやspan, p, h1など様々ありますが、全てがボックスという四角い領域として存在しています。</p>

<p>ボックスには4つの領域があります。</p>

<ul>
  <li>margin（外側の余白）</li>
  <li>border（境界線）</li>
  <li>padding（内側の余白）</li>
  <li>content area（コンテンツエリア）
    <ul>
      <li>width（横の幅）</li>
      <li>height（縦の高さ）</li>
    </ul>
  </li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/htmlcss_37.png" alt=""></p>

<p><em>ボックスモデル</em></p>

<p>HTML要素は1つひとつが、この4つの領域を持っており、指定された値（もしくはデフォルト値）によって四角い領域として表示されています。</p>

<p>それぞれをCSSによって指定して、ボックス（四角い領域）のサイズを変更できます。content areaはwidth, heightによってサイズを指定します。</p>

<p>下記は、<code>.box</code>に対して下記のCSSを適用しています。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.box</span> {
    <span class="key">margin</span>: <span class="float">50px</span>;
    <span class="key">border</span>: <span class="float">5px</span> <span class="value">solid</span> <span class="value">pink</span>;
    <span class="key">padding</span>: <span class="float">50px</span>;
    <span class="key">background-color</span>: <span class="value">skyblue</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/rocofiy/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<div class="alert alert-warning">
皆さんの理解を深める一番の方法は、実際に自分の手で数値を変更してみて、その変化を確認することです。JS BinではHTMLとCSSそれぞれの記載欄は変更可能な状態になっています。そこで、margin などの数値を変化させてみてください。オススメは、最初に全て 0 にしてみることです。例題の数値に変更していくことで、変化がわかりやすくなります。
</div>

<p>このCSSを解説します。<code>margin: 50px;</code> によって上下左右の外側の余白を <code>50px</code> ずつとっています。<code>border: 5px solid pink;</code> によって境界線の太さを <code>5px</code>, 境界線の種類を <code>solid</code>（通常の一本線、他にも破線など指定可）, 境界線の色を <code>pink</code> にしています。<code>padding: 50px;</code> によって上下左右の内側の余白を <code>50px</code> ずつとっています。また、わかりやすく <code>background-color</code> プロパティを指定しましたが、<code>background</code> 系のプロパティはpadding（内側の余白）まで影響するので、paddingとcontent areaを含めた領域が <code>skyblue</code> になっています。</p>

<p><code>div.box</code>のcontent areaが横いっぱいに拡がっているのは、前節で話したdiv要素が <code>display: block;</code> としてデフォルト表示されるブロックレベル要素であるためです。</p>

<p>更にcontent areaのサイズを指定するために、<code>width</code> と <code>height</code> を指定してみましょう。青色の背景領域のサイズはpadding + content areaであるため、縦の長さの合計は<code>50px(padding-top) + 100px(height) + 50px(padding-bottom) = 200px</code> となります。横の長さの合計も同じく、<code>50px(padding-left) + 100px(width) + 50px(padding-right) = 200px</code> となります。どちらも<code>200px</code>であるため背景領域は正方形になっています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/kogulaf/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>また、<code>margin </code>や <code>border</code>, <code>padding</code> のサイズは上下左右で個別に指定できます。</p>

<p>それぞれの領域名に対して、上, 下, 左, 右の意味をもつ <code>-top</code>, <code>-bottom</code>, <code>-left</code>, <code>-right</code> を付け加えることで個別に指定できます。他にも<code>margin</code>と<code>padding</code>は<code>padding: 10px 20px 30px 40px;</code>のように一気に上下左右を決めることができますが、このときの順番は上下左右ではなく、<code>padding: 上 右 下 左;</code> という順番です。これは<strong>上から時計回り</strong>と覚えておきましょう。どの書き方もよく使用されます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/yigipah/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h5>div の中の div の場合</h5>

<p>divボックスの中に、更にdivボックスを入れた場合、親にあたるdivボックスのコンテンツエリア ( width, height ) を基点として、子のdivボックスの位置が算出されます。下記の例のmarginに着目すると、より理解しやすくなるでしょう。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/sadunez/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>marginの相殺</h4>

<p>marginには、互いのmarginが相殺するという特別な処理が適用されます。相殺するという性質はmarginのみが持っています。</p>

<p>下記JS Binのように、<code>div.box1</code>の<code>margin-bottom</code>が<code>50px</code>で、<code>div.box2</code>の<code>margin-top</code>が<code>30px</code>なので、<code>div.box1</code>と<code>div.box2</code>のmarginの合計は<code>50px + 30px = 80px</code>になると思ってしまいますが、marginの相殺によって単純な足し算ではなく、大きい方だけが適用されます。つまり、 <code>30px</code> 側を変更しても変化はありません。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/zedapac/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>marginとmarginの足し算が行われるときは、marginの相殺によって足し算にならず、大きい方のmarginが優先されると覚えておきましょう。Webページのレイアウトをするときにつまずく場合があります。</p>

<h4>まとめ</h4>

<p>ここまでで、HTMLの各要素はそれぞれボックスとして存在しており、私たちはそのボックスのサイズを自由に変更する方法を学びました。<code>margin</code>, <code>border</code>, <code>padding</code>, <code>width</code>, <code>height</code> のそれぞれのプロパティの値を変更することで、ある程度はレイアウトを変更できます。</p>

<p><strong>HTML要素自体の大きさ</strong> は、 content areaの <code>width</code>, <code>height</code> のプロパティを変更することで大きさを変更できるようになりました。</p>

<p>また <strong>HTML要素の位置</strong> は、 <code>margin</code> プロパティ（外側の余白）の値を変えることで、位置の変更ができるようになりました。</p>

<p><code>padding</code> は内側の余白で、つまりHTML要素の内部のborderとcontent areaの距離に影響します。そのため <code>border</code>（境界線）や <code>background</code>（背景）が付与されたときに初めて <code>padding</code> の効果が現れます。</p>

<p>是非一度、JS Bin上でボックスモデルのプロパティの値を変更して実験してみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-3">10.3 Flexboxモデル1（2カラムレイアウト）
</h3><p>Webページ全体のレイアウトとして縦に並べたり横に並べたりする方法を学びましょう。ここでは、HTML要素の横並びを学びます。</p>

<p>セクションのタイトルである「2カラムレイアウト」とは、ヘッダーとフッターの間に、メインコンテンツとサイドバーを横に並べたレイアウトのことを言います。カラムとは列のことです。2列に並べられたレイアウトのことで、今ご覧いただいているこのレッスンページもヘッダーとフッターはありませんが、PC表示ではテキスト本文（メイン）と目次（サイドバー）の左右に分かれた2カラムレイアウトとなっています。なお、今回、2列に並ぶメインとサイドバーを囲むdiv要素( <code>wrapper</code> )を親要素として用意しました。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/sicajip/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>今まで見たとおり、ブロックレベル要素をそのまま並べるだけでは「横並びレイアウト」が実現しません。ボックスを横へ並べるために、まず<code>width</code>プロパティを使用して幅を縮めます。メインを <code>width: 60%;</code> に、サイドバーを <code>width: 30%;</code> にします。<code>width</code> が <code>60%</code> と <code>30%</code> では <code>10%</code> の隙間ができますが、今回は理解を深めるためにあえて <code>10%</code> の隙間を残しています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/yomoje/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>Flexboxモデルで、左や右に寄せる</h4>

<p>次に、メインコンテンツとサイドバーを2カラムにします。メインを左、サイドバーを右に配置します。今回の主題である2カラムレイアウトは <code>display: flex;</code> を使用することで簡単に実現できます。</p>

<p>次のJS Binの例は、メインとサイドバーの親要素 <code>#wrapper</code> に <code>display: flex;</code> のCSSを追記しています。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#wrapper</span> {
    <span class="key">height</span>: <span class="float">100px</span>;
    <span class="key">display</span>: <span class="value">flex</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/lorowit/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>このように、メインとサイドバーのどちらも、高さが親要素 <code>#wrapper</code> と一緒になり、さらに <code>#wrapper</code> の要素の中で横並びになっています。また、HTML内で先に記述したメインが左、後のサイドバーが右側に配置されています。<code>display: flex;</code> を使ってボックスを横並びにする手法が <strong>Flexboxモデル</strong> です。比較的最近のブラウザ（Chrome, Firefox, Edgeなど）で対応しています。</p>

<p>しかし、メインを幅 <code>60%</code>、サイドバーを幅 <code>30%</code> にしたため、<code>10%</code> 分の空白がサイドバーの右側にできてしまいました。メインは左端に配置されていますが、サイドバーは右端に配置したいです。</p>

<h4>justify-content で配置場所を調整する</h4>

<p>そこで <code>justify-content</code> プロパティを指定します。<code>display: flex;</code> の下に <code>justify-content: space-between;</code> と追記します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#wrapper</span> {
    <span class="key">height</span>: <span class="float">100px</span>;
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/texefa/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>幅 <code>60%</code> のメイン、幅 <code>10%</code> の空白、幅 <code>30%</code> のサイドバーという順序で並んでいるデザインを作れました。</p>

<p>なお、<code>justify-content</code> プロパティの代表的な値は下記の5種類です。</p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">プロパティと値</th>
      <th style="text-align: left">内容</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>justify-content: flex-start;</code></td>
      <td style="text-align: left">全ての要素が左寄せになる（要素間の余白なし）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content: flex-end;</code></td>
      <td style="text-align: left">全ての要素が右寄せになる（要素間の余白なし）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content: center;</code></td>
      <td style="text-align: left">全ての要素が中央寄せになる（要素間の余白なし）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content: space-between;</code></td>
      <td style="text-align: left">最初は左端、最後は右端、間の要素と要素間の余白は均等に配置</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content: space-around;</code></td>
      <td style="text-align: left">全ての要素の位置と要素間の余白が均等になる</td>
    </tr>
  </tbody>
</table>

<p>デザインに応じて使い分けましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-4">10.4 Flexboxモデル2（3カラムレイアウト）
</h3><p>2カラムレイアウトから応用して、3カラムレイアウトを行う場合でも同じです。親要素となるブロックレベル要素の中へ、横並びにしたい3つの要素を追加し、<code>display: flex;</code>（場合によっては、プラスして <code>justify-content</code> プロパティ）によって横並びを実現します。</p>

<p>まずは、3つのカラムとなる要素を用意します（<code>#main</code> が1つ、<code>aside</code> が2つ）。メインの横幅を <code>34%</code>, サイドバーの横幅を <code>33%</code> にして、3つを横に並べても、ちょうど <code>100%</code> となるように調整します。（今回は合計の幅が <code>100%</code> のため <code>justify-content</code> は無くても大丈夫です。）</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#main</span> {
  <span class="key">width</span>: <span class="float">34%</span>;
  <span class="key">background-color</span>: <span class="color">#ddffdd</span>;
}
<span class="tag">aside</span> {
  <span class="key">width</span>: <span class="float">33%</span>;
  <span class="key">background-color</span>: <span class="color">#ffddff</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/gasivam/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>
</div><div class="subsection"><h3 class="index" id="chapter-10-5">10.5 メニューボタンなどのHTML要素を横に並べる
</h3><p>多くのWebサイトにおいて、グローバルナビゲーションは横に並んでいます。このような横並びのボタンを作るための方法として <code>display: inline-block;</code> を紹介します。先程のように <code>display: flex;</code> によって横に並べることも可能ですが、ボタンぐらいの小さなものであれば <code>display: inline-block</code> を用いた方が簡単で便利です。</p>

<p>HTML5で追加された<code>inline-block</code>という表示形式は、ブロックレベル要素とインライン要素の中間のような振る舞いをします。ブロックレベル要素のように高さと幅を持ちながら、インライン要素のように左から右へ並んでいきます。</p>

<p>まずは下記のコードをご覧ください。ただのリストです。ただし、 <code>li</code> はブロックレベル要素なので、横幅は画面いっぱい（背景を入れるとわかります）に広がっており、1つ1つ縦に並んでいきます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/xotoson/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>li要素に対して <code>display: inline-block;</code> を指定します。これで横並びになります。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/cugazoj/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ボタンのように見せるために、背景色や大きさを指定してあげることもできます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/bihayuw/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>このようにすれば、ボタン用の画像をわざわざ用意せずとも、HTMLとCSSだけでボタンを実現できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-6">10.6 画面固定のレイアウト
</h3><p>先程のメニューに、<code>position: fixed;</code>を追加すると、ページをスクロールしても同じ位置にあるレイアウトを実現できます。<code>long-content</code> という名前をつけた「高さが長い要素」を設置した上でメニューリストを <code>top: 10px;</code>, <code>left: 10px;</code>によって画面に表示する絶対位置を指定しています。<code>top</code> と <code>left</code> の値を変更して、表示内容がどのように変わるか確認してみてください。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/todunoc/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p><code>position</code>プロパティには他にも使い方がありますが、内容が多くなりすぎるためここでは省略します。上記で解説した以外のページレイアウトを知りたい場合には、リファレンスサイトや、検索サイトなどで調査してみても良いでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-7">10.7 まとめ
</h3><p>ここでは、Webのレイアウトについて大きく分けて</p>

<ul>
  <li>ボックスモデル</li>
  <li>横並びのレイアウト</li>
</ul>

<p>を学びました。</p>

<p>ボックスモデルは、HTML要素1つひとつが持っている領域のことでした。領域内には、 margin, border, padding, width, heightが存在し、それぞれプロパティなので値を設定すると変化させることができます。ボックスモデルを把握すれば、個々のHTML要素のサイズや余白は自由に制御できます。</p>

<p>横並びのレイアウトは、主に <code>display: flex;</code> で設定します。 <code>display: block;</code> なHTML要素は横幅100% なので、通常は縦に並べられるしかありません。そこで、 <code>width</code> を適切に設定し、 Flexboxモデルを適用すれば、複数カラムレイアウトを実現できます。また、ボタンなどの横並びの場合は <code>display: inline-block</code> とした方が簡単に横並びを実現できます。</p>

<p>ここでは単純な例を用いて解説してきました。実際のWebページのレイアウトがどういうものになるかは、 CSSチュートリアルを進めながら確認してみてください。CSSチュートリアルでは、ボックスモデルやFlexboxモデル、inline-blockなど、ここで学んだものを使ってレイアウトを行います。チュートリアル以外でも実際にこれらの技術を使用するのが現在の主流なので、ここで学んだことは、ほとんどのWebアプリケーション開発において事足りるでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-10-8">10.8 （参考資料）古いブラウザで横並びにする方法
</h3><p><code>display: flex;</code> はInternet Explorerをはじめとした古いバージョンのブラウザでは対応していないため使えません。古いブラウザでブロックレベル要素を横並びにしたい場合は、別の方法を使う必要があります。</p>

<p>ここでは参考資料として、 <code>display: flex;</code> 以外の「ブロックレベル要素を横並びにする方法」を紹介します。</p>

<h4>その1：floatとclearプロパティを使う</h4>

<h5>float プロパティで、左や右に寄せる</h5>

<p>再びヘッダー・メイン・サイドバー・フッターが並ぶJS Binの例を使います。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/yomoje/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>ここで紹介したいのは <code>float</code> プロパティです。<code>float</code> という単語には「浮かびながら移動する」という意味があります。<code>float</code> プロパティを利用するとブロックレベル要素を左寄せや右寄せにできます。水槽で水面の上に木や発泡スチロールの板が浮かんでいて、水に流れをつけると板が水槽の端まで流れていくのをイメージしてください。なお、この <code>float</code> プロパティに対する値は <code>left</code> か <code>right</code> しかありません。</p>

<p><code>float</code> プロパティを使ってメインを左寄せ、サイドバーを右寄せにしたのが以下の例です。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/miwihej/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>メインとサイドバーに <code>height</code> を設定すれば、きれいに揃っているように見えます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/bukibew/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>しかし、メインとサイドバーの高さを <code>wrapper</code> で設定した <code>height</code> より高くした場合、不都合が生じます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/legetac/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>メインとサイドバーがフッターに食い込んでいるように見えます。このようになる理由は、<code>float</code> を設定したブロックレベル要素が、先述のとおり水面に浮いている状態になるため、（ある意味、水中に沈んでいると言える）フッターとは触れ合うことができません。</p>

<h5>clear プロパティを併せて使う</h5>

<p>そこで、<code>float</code> させたメインやサイドバーの直下にある <code>footer</code> へ <code>clear</code> というプロパティを指定します。<code>clear</code> プロパティはfloatを解除するためのプロパティです。<code>clear</code> プロパティの値はほとんどの場合 <code>both</code> で構いません。これは <code>wrapper</code> の <code>height</code> の値には依存しないことをわかりやすくするため、以下の例では <code>wrapper</code> の <code>height</code> を省略しました。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/jepodas/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>これでfooterは、メインとサイドバーのfloatを考慮して、レイアウトされました。<br>
基本的には、この <code>clear</code> による対処方法で問題ありませんが、実はこのままではフッターに <code>margin-top</code> がうまく反映されません。<code>clear</code> プロパティを与えた要素には <code>margin-top</code> が効かないのです。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/cemomon/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>これを解決するための手段として、floatされたメインとサイドバーの直下とフッターの間に、<code>&lt;div class="clear"&gt;&lt;/div&gt;</code> という空のdiv要素を挟み、これにclearの役目を担わせます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/hufubot/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>これで、フッターの <code>margin-top</code> が効くようになりました。</p>

<h4>その2：clearfix という手法を使う</h4>

<p><code>float</code> と <code>clear</code> を用いる手法は古くから存在する手法です。もう少し新しい方法として <strong>clearfix</strong> という手法があります。</p>

<p>早速、clearfixという手法を観ていきます。まずは <code>.clearfix</code> のCSSを定義します。次に、<code>&lt;div class="clear"&gt;&lt;/div&gt;</code> を削除して、wrapperに <code>clearfix</code> のclassを加えて <code>&lt;div id="wrapper" class="clearfix"&gt;</code> とします。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/durokew/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>footerのmargin-topもちゃんと効いているのがわかります。</p>

<p>実はこのclearfixのCSSは、先ほどの空のdivと全く同じです。そのことについて説明します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.clearfix</span><span class="pseudo-class">::after</span> {
    <span class="key">content</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">clear</span>: <span class="value">both</span>;
}
</pre></div>
</div>
</div>

<p><code>.clearfix</code> に <code>::after</code> という疑似要素を使うことで、 <code>class="clearfix"</code> とした要素の終了タグの直後をセレクタとして選択できます。そしてそこに <code>content</code> プロパティを追加すると文字を入力できます（今回は、文字は不要だったので空文字が入りました）。</p>

<p><code>content</code> プロパティに文字を追加するとclearfixの挙動がよくわかります。（footerのmargin-topは削除しておきました。）</p>

<p><iframe class="" id="" data-url="https://jsbin.com/dawucis/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ちゃんと、 <code>class="clearfix"</code> の直後 (<code>::after</code>) に、 clearfix用の要素が追加されていることがわかります。つまり、clearfixは、先ほどの空のdiv (<code>&lt;div class="clear"&gt;&lt;/div&gt;</code>) をHTML上に直接書く方法からCSSで書く方法になっただけで、結果は全く同じなのです。</p>

<p>clearfixを使用するときは <code>content: '';</code> のようにcontentの中身は空文字にしてください。</p>

<h4>その3：<code>overflow: hidden;</code> を使う</h4>

<p>もうひとつの方法を観ていきます。それは、 <code>overflow: hidden;</code> を使う方法です。以下の例のように <code>wrapper</code> に <code>overflow: hidden;</code> を適用してください。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/hapejac/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>このように <code>overflow: hidden;</code> するだけでclearfixされます。しかし、実は <code>overflow: hidden;</code> はclearfixのために用意されたCSSではありません。そのため、 <code>overflow</code> の本来の目的はclearfixではありません。ただ、 clearfixとしても使えるので使用されているだけです。</p>

<h5>overflow の本来の使用目的</h5>

<p><code>overflow</code> プロパティは、本来はスクロールバーの出現を制御するためのものです。</p>

<p>下記のように横に長い要素を用意します。すると、横幅100% 以上なので、横向きのスクロールバーが出現します。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/fohadab/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ここに <code>overflow: hidden;</code> を追加します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.box</span> {
  <span class="key">overflow</span>: <span class="value">hidden</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/duvuvax/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>スクロールバーが消えたのを確認できます。</p>

<p>overflowは <strong>あふれる</strong> 、hiddenは <strong>隠す</strong> という意味になります。そのため、 <code>overflow: hidden;</code> は、あふれたものを隠す、つまり横や縦に長い要素の「はみ出した」部分を隠してくれます。結果的にスクロールバーの制御に使用されるのが本来の目的となります。</p>

<p>ただし、clearfixの簡易版としても使用できるので、その目的で使用されることもあるのです。</p>
</div></section><section id="chapter-11"><h2 class="index">11. デベロッパーツール
</h2><div class="subsection"><p>Google Chromeには、デベロッパーツールという便利なツールが内蔵されています。</p>

<p><a href="http://www.yahoo.co.jp/" target="_blank">Yahoo! JAPAN</a>を例に見ていきましょう。</p>

<p>ページのどこかで右クリックし、「検証」をクリックします。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_01.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_01.png" alt="devlopertools"></a><br>
<em>クリックで拡大</em></p>

<p>デベロッパーツールが開いたので、選択ツールをクリックし、ページ上で<code>div#contents</code>を選択します。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_02.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_02.png" alt="devlopertools"></a><br>
<em>クリックで拡大</em></p>

<p>すると、右側のデベロッパーツールのほうで<code>div#contents</code>が開くので、更に下層を見ていき、<code>div#navi</code>を選択します。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_03.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_03.png" alt="devlopertools"></a><br>
<em>クリックで拡大</em></p>

<p><code>div#navi</code>に対するCSSがデベロッパーツールの下側に表示されるので、<code>float: left;</code> という項目のチェックを外して解除してみましょう。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_04.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_04.png" alt="devlopertools"></a><br>
<em>クリックで拡大</em></p>

<p>画面上の <code>float</code> を解除することができました。（なお、<code>float</code> はブロックレベル要素の回り込みを指定するCSSで、<code>left</code> は左側に配置することを指定する値です。）</p>

<p>次は、<code>float</code>を再度有効にして、<code>float: left;</code> を <code>float: right;</code> に変更してみましょう。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_05.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/dev_tools_05.png" alt="devlopertools"></a><br>
<em>クリックで拡大</em></p>

<p><code>div#navi</code>のサイドバーを右側に移動させることができました。（<code>right</code> は右側に配置することを指定する値です。）</p>

<p>デベロッパーツールを使うと、このようにWebページのデザインなどを簡単に変更して確認することができるため、Webページの開発中には重宝します。「CSSをしっかりと適用したはずなのに、なぜかおかしい」という場合には、デベロッパーツールを開いて色々試しながら原因を発見するようにしましょう。</p>

<p>なお、今回 Yahoo! JAPAN のWebページのレイアウトを変更してみましたが、変更はサーバーに送信されず、自分のパソコン内だけの変更になります。そのため、Yahoo! JAPANには何の影響もなく、ページを再表示させれば元の表示に戻ります。</p>
</div></section><section id="chapter-12"><h2 class="index">12. ファイルパスについて
</h2><div class="subsection"><p>画像やCSSファイルをHTMLで読み込む際に「ファイルパス」というものを理解している必要があります。ファイルパスは、HTML・CSSのテキストファイルや画像など、呼び出すファイルの場所を指定するための文字列です。ページの中でリンクを貼ったり、画像を読み込んで表示させる際に、呼び出し元のページ（例えば今回は<em>index.html</em>）から見て「読み込みたいファイルがどこにあるのか」を指定して教えてあげます。パスの指定方法は「相対パス」「絶対パス」と呼ばれる2つの方法があります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-1">12.1 相対パス
</h3><p>基本となるパスの書き方です。「パスを書くそのファイルから見た、呼び出すファイルの位置」になります。例えば下図のような構成のサイトがあると仮定します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/img_path01.png" alt="ファイルの構成"></p>

<p>青の層にある<em>index.html</em>がサイトのトップページになります。青の層とピンクの層は「階層」になっていて、ピンクのほうが下階層になります。<em>image.jpg</em> や <em>style.css</em> はそれぞれ同じ階層にいますが、フォルダの中に入っているため見えない壁があります。</p>

<p>最初にトップページからcssフォルダの中にある<em>style.css</em>を呼び出す方法を考えてみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/img_path02.png" alt="トップページからCSSファイルを呼び出す"></p>

<p>HTMLは次のようになります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">./css/style.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>順番は、トップページと同じ階層にいる<code>./</code>（./は同じ階層にある、という意味です）cssフォルダの中の<code>./css</code>、<em>style.css</em> を呼び出す <code>./css/style.css</code> となります。フォルダの区切りには<code>/</code>を使います。imagesフォルダの中の <code>image.jpg</code> を呼び出すときも同じです。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/image.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">サンプル写真</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>トップページからworksフォルダの <em>index.html</em> にリンクを張る場合は</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">./works/index.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Worksへのリンク<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>または <em>index.html</em> というファイル名に限りファイル名の省略が可能です。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">./works</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Worksへのリンク<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>これは <em>index.html</em> が「デフォルトドキュメント」と呼ばれるもので、ブラウザやサーバーが「index」という名前がついているファイルを最初に表示させるようにできているためです。よくサイトを見ていると <code>https://techacademy.jp</code> や <code>https://techacademy.jp/blog</code> など <em>index.html</em> がついてなくても表示されているのは、そのような仕組みがあるからです。もしトップページを <code>toppage.html</code> としていた場合は <code>https://techacademy.jp/toppage.html</code> としなければ表示されません。html以外のデフォルトドキュメントには以下のようなものがあります。</p>

<ul>
  <li>index.htm</li>
  <li>index.shtml</li>
  <li>index.cgi</li>
  <li>index.php</li>
</ul>

<p>CSSファイルは例外です。もしCSSファイルをindex.cssにしても省略はできないので、注意しましょう。</p>

<p>では、パスの説明に戻ります。次はcontactフォルダの <em>index.html</em> からCSSファイルを呼び出す場合です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/img_path03.png" alt="contactページからCSSファイルを呼び出す"></p>

<p>contactの <em>index.html</em> と <em>style.css</em> は同じ階層にはいますが、壁があるので<code>./</code>では呼び出せません。この場合は1つ上の階層へ行って<code>../</code>（../は1つ上の階層という意味です）、cssフォルダへ行き<code>../css</code>、その中の <em>style.css</em> を呼び出す <code>../css/style.css</code> となります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/img_path04.png" alt="contactページからCSSファイルを呼び出すルート"></p>

<p><code>contact/index.html</code> のHTMLは次のようになります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">../css/style.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>画像を呼び出す場合はリンクを張る場合も同じく<code>../</code>を使います。<code>../</code>は階層ごとに1セットずつ増えます。</p>

<p>例えば、worksフォルダの中にさらにworks1とworks2のフォルダがあり、その中の <em>index.html</em> から <em>style.css</em> を呼び出す場合は</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/img_path05.png" alt="worksの子ページからCSSファイルを呼び出すルート"></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">../../css/style.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>階層が1つ増えているので<code>../../</code>となります。CSSが読み込めない、画像が表示されない場合などはこのパスを間違えている可能性が高いです。再度、位置関係と階層を確かめてみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-2">12.2 絶対パス
</h3><p>絶対パスは呼び出したいファイルが同じディレクトリ内になく、外部で公開されている場合などに使います。世界中の誰が見ても参照できる位置を示します。</p>

<p>例えばnormalizeというスタイルシートのように外部で公開されているものを呼び出す場合</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>のように</p>

<p><code>&lt;link rel="stylesheet" href="http://ドメイン名/css/style.css"&gt;</code>などとなります。相対パスが自分の家の敷地内にあるものを呼び出すのに対し、絶対パスは自分の家から隣や遠くの家の敷地内にあるものを呼び出すイメージです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-3">12.3 パスの書き間違いに注意する
</h3><p>たとえば <code>&lt;img&gt;</code> で画像を表示する際、<code>src</code> 属性に指定したパスが間違っていると、画像が表示されずに <strong>404 (Not Found) エラー</strong> が発生します。</p>

<p>以下の例は <code>https://demo.techacademy.jp/html-css/images/logo-techacademy.png</code> の画像ファイル（TechAcademyのロゴ）を表示するHTMLです。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/kitewon/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>この <code>src</code> に書かれているURLの文字列の一部を適当に変更してみてください（例：<code>images</code> を <code>image</code> に変更します）。すると、TechAcademyのロゴが表示されなくなり、代わりに変なアイコン（と <code>alt</code> 属性に指定した文字列）が表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/img-tag-404-error.png" alt=""></p>

<p>絶対パスと相対パスのどちらでも、正しいパスが指定されていない場合、このような表示になります。また画像のパスの指定を間違えている状態でデベロッパーツールを開くと、以下のように、赤い背景に赤い字でエラー内容が表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/html-css/dev-tool-404-error.png" alt=""></p>

<p>「404」は指定されたファイルが見つからない場合のステータスコードで、ファイルが見つからないことを原因とするエラーを「404エラー」や「Not Foundエラー」と呼んでいます。404エラーは画面表示が崩れる原因となります。パスの書き間違いには注意しましょう。</p>
</div></section><section id="chapter-13"><h2 class="index">13. CSSチュートリアル
</h2><div class="subsection"><p>それでは、HTMLチュートリアルで作成した <em>kitchen.html</em> にCSSデザインを適用していきましょう。改めて <em>kitchen.html</em> を見てください。色々とメニュー（講座案内やレッスン、ギャラリーなど）を出していますが、今回は <strong>トップページ（HOME）</strong> のみの作成になります。</p>

<p><a href="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_allpage.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_html_allpage.png" alt=""></a><br>
<em>HTMLのみの現状</em></p>

<p><a href="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_allpage.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_allpage.png" alt=""></a><br>
<em>CSS完成版</em></p>

<p>Cloud9を開いて書いていきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-1">13.1 CSSファイルの作成
</h3><p>Cloud9上で <em>kitchen.css</em> ファイルを作成しましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/htmlcss_cloud9_04.png" alt=""></p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="directive">@charset</span> <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>;
</pre></div>
</div>
</div>

<p><code>@charset "UTF-8";</code>と書いておくことでファイルの文字エンコーディングを指定します。これは文字化け対策なので、決まり文句だと覚えておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-2">13.2 CSSの適用
</h3><p>まずはHTMLからCSSのデザインを適用するために、link要素をhead要素内に追加しましょう。先ほど作成した<em>kitchen.css</em>を読み込みます。</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>TechAcademy KITCHEN<span class="tag">&lt;/title&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
      <span class="comment">&lt;!-- 中略 --&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-3">13.3 更新するたびに動作確認
</h3><p>これから<strong>CSSを更新する度にCSSが適用されているか動作確認</strong>していきましょう。指定したCSSデザインがHTMLに反映されているか逐一確認してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-4">13.4 全体の設定
</h3><h4>bodyの設定</h4>

<p>body をセレクタとして選んだ場合、全体の CSS 設定になります。表示される HTML は全て body 要素内に配置されているからです。全ての body 内の要素が影響を受けます。では設定していきましょう。</p>

<p>marginやpaddingを0にすることで、初期化しています。実はブラウザはデフォルトで勝手にmarginやpaddingを付け加えるので、それをリセットする必要があります。</p>

<p>更に、全体の文字の色を黒ではなく、少しグレーにして、通常の文章の主張を少し抑えます。font-sizeも14pxとしておきましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="directive">@charset</span> <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>;

<span class="tag">body</span> {
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
    <span class="key">color</span>: <span class="color">#333</span>;
    <span class="key">font-size</span>: <span class="float">14px</span>;
}
</pre></div>
</div>
</div>

<h4>リンクの文字色の設定</h4>

<p>a要素は部位によって装飾が異なりますが、まずは全体の共通色を指定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">a</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
}
</pre></div>
</div>
</div>

<p>次に訪問済みの色も指定しましょう。先ほど紹介した擬似クラスを使います。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">a</span><span class="pseudo-class">:visited</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
}
</pre></div>
</div>
</div>

<p>続いて、:hover擬似クラスを使ってマウスポインタを乗せた時の色を決めます。完了イメージは以下のような状態です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/hover_2.png" alt="hover_2.png"></p>

<p>また、色だけでなく太字にもし（font-weightプロパティ）リンクのアンダーラインの表示を消しましょう（text-decorationプロパティ）。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
    <span class="key">font-weight</span>: <span class="float">700</span>;
    <span class="key">text-decoration</span>: <span class="value">none</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>いかがでしょうか？HTMLと書き方も異なるので慣れるまでは大変ですが、Webページには重要になってきますのでしっかり覚えましょう。ソースコードが以下のようになっていましたら大丈夫です。（「このチャプターの内容です」という意味合いのコメントを追加しています。）</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="directive">@charset</span>  <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>;

<span class="comment">/* チャプター：全体の設定 */</span>
<span class="tag">body</span> {
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
    <span class="key">color</span>: <span class="color">#333</span>;
    <span class="key">font-size</span>: <span class="float">14px</span>;
}

<span class="tag">a</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
}

<span class="tag">a</span><span class="pseudo-class">:visited</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
}

<span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
    <span class="key">font-weight</span>: <span class="float">700</span>;
    <span class="key">text-decoration</span>: <span class="value">none</span>;
}
</pre></div>
</div>
</div>

<p>みなさんご自身で CSS の値を色々と変更してみてください。例えば、 a の color を green にしたり、 body の font-size を 30px にしてみるなど、極端な値で試しながら何がどう変わるかを自分でもしっかり体感してください。自分で触った分だけ理解が深まるはずです。このチュートリアルで作成するページを提出することはありませんし、絶対に同じ見た目で作らなくてはいけない訳でもありません。そのため、自分で積極的に値を変えて、理解を深めながら進むことをオススメします。</p>

<p>また、このチュートリアルの完成版は、最後に記載してありますので、そちらで確認することもできます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-13-5">13.5 マージン
</h3><p>続いてマージンを指定していきます。先ほどのチャプターでmarginについては触れましたね。もし忘れてしまった人は一度戻って復習してから進めましょう。</p>

<h4>見出しのマージン</h4>

<p>見出しのマージンを指定します。HTMLで指定したh1〜h6要素には最初から上下にマージンが存在します。デフォルトのままにせず、上のマージンをカットすることにより全体のバランスがよくなりますので、今回は上部のマージンを0に指定します。</p>

<p><em>kitchen.css</em> に追記していきましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">h1</span>,<span class="tag">h2</span>,<span class="tag">h3</span>,<span class="tag">h4</span>,<span class="tag">h5</span>,<span class="tag">h6</span> {
    <span class="key">margin-top</span>: <span class="float">0</span>;
}
</pre></div>
</div>
</div>

<h4>段落のマージン</h4>

<p>p要素の上マージンも同様に0にします。そして文章を読みやすくするために、行間の指定を1.6、p要素内の行間にゆとりをもたせましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">p</span> {
    <span class="key">margin-top</span>: <span class="float">0</span>;
    <span class="key">line-height</span>: <span class="float">1.6</span>;
}
</pre></div>
</div>
</div>

<h4>画像のマージン</h4>

<p>また、画像の下にマージンができてしまうことがあります。img要素に対して、vertical-alignプロパティの値をbottomにすると、下の余白がなくなります。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">img</span> {
    <span class="key">vertical-align</span>: <span class="value">bottom</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>ページ全体のマージンについて指定しました。いかがでしたでしょうか？マージンは文字の読みやすさや、サイトの美しさを決める大事な要素となっております。余白が少なく、コンテンツに埋め尽くされたWebページはごちゃごちゃした印象を与えます。ご自身でWebページを作成される際にも、余白には気をつけていきましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：マージン */</span>
<span class="tag">h1</span>,<span class="tag">h2</span>,<span class="tag">h3</span>,<span class="tag">h4</span>,<span class="tag">h5</span>,<span class="tag">h6</span> {
    <span class="key">margin-top</span>: <span class="float">0</span>;
}

<span class="tag">p</span> {
    <span class="key">margin-top</span>: <span class="float">0</span>;
    <span class="key">line-height</span>: <span class="float">1.6</span>;
}

<span class="tag">img</span> {
    <span class="key">vertical-align</span>: <span class="value">bottom</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-6">13.6 見出しの装飾
</h3><p>続いて、見出しを更に整えていきましょう。見出しは、大きく目立つように表示させ、続く文章やコンテンツが「何であるか」を伝えるためのものです。つまり、ユーザーに読んでもらうためのものとなっておりますので、興味を惹きつけることも大事です。今回はボーダーと背景を利用して見栄えのいい見出しにしていきます。</p>

<div class="alert alert-warning">
ここから先、Cloud9のエディタが黄色の警告マークを表示するかもしれませんが、記述した内容に問題はありませんので、気にしないで学習を続けてください。
</div>

<h4>h1〜h3の見出し</h4>

<p>HTMLファイルを作成した時に、見出しのレベルを既に決めておりますので、ユーザーにも直感的、視覚的に伝わるようなデザインを行います。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/heading.png" alt="heading.png"><br>
<em>kitchen.htmlではh1要素は画像のみなので装飾しません</em></p>

<h4>要素の背景に画像や色を使う</h4>

<p>背景に色を指定するには、background-colorプロパティを使用します。背景色を指定する際には文字色にも気をつけましょう。色の組み合わせによっては、読みにくくなる場合があります。</p>

<p>▼ 背景色（background-color）の指定の仕方</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">background-color</span>: <span class="color">#f0f0f0</span>;
</pre></div>
</div>
</div>

<p>▼ 背景画像（background-image）の指定の仕方</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">background-image</span>: <span class="function"><span class="delimiter">url(</span><span class="content">images_kitchen/header_bg.jpg</span><span class="delimiter">)</span></span>;
</pre></div>
</div>
</div>

<p>※ここでは、紹介のみとなっておりますのでファイルに書かないでください。</p>

<h4>h1要素を装飾する</h4>

<p><em>kitchen.html</em> ではh1要素は画像のみなので装飾しません</p>

<h4>h2要素を装飾する</h4>

<p>h2要素の中見出しは、h1要素よりも控え目にするため、背景色は無しで、borderプロパティで1pxの線で囲みます。枠線の角を丸める場合は、border-radiusで指定することができます。今回は2pxに指定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#main</span> <span class="tag">h2</span> {
    <span class="key">background</span>: <span class="color">#fff</span>;
    <span class="key">font-size</span>: <span class="float">20px</span>;
    <span class="key">padding</span>: <span class="float">8px</span> <span class="float">22px</span>;
    <span class="key">border-radius</span>: <span class="float">2px</span>;
    <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#956840</span>;
}
</pre></div>
</div>
</div>

<h4>h3要素を装飾する</h4>

<p>h3要素はh2要素よりもさらに控え目にするため、フォントサイズを小さくします。全てを囲まず、要素の左側の線でアクセントをつけます。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#main</span> <span class="tag">h3</span> {
    <span class="key">font-size</span>: <span class="float">16px</span>;
    <span class="key">border-left</span>: <span class="value">solid</span> <span class="float">3px</span> <span class="color">#fa9786</span>;
    <span class="key">padding</span>: <span class="float">4px</span> <span class="float">9px</span> <span class="float">4px</span> <span class="float">14px</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>見出しの調整について学習いたしました。いかがでしたでしょうか？見出しはページ内のコンテンツをどう読ませるかだけでなく、デザイン面での印象も左右します。しっかり覚えてきましょう。ソースコードは以下のようになっていればOKです。</p>

<p>また、ブラウザで <em>kitchen.html</em> を確認しCSSが適用されているか、確認を行いましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：見出しの装飾 */</span>
<span class="id">#main</span> <span class="tag">h2</span> {
    <span class="key">background</span>: <span class="color">#fff</span>;
    <span class="key">font-size</span>: <span class="float">20px</span>;
    <span class="key">padding</span>: <span class="float">8px</span> <span class="float">22px</span>;
    <span class="key">border-radius</span>: <span class="float">2px</span>;
    <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#956840</span>;
}

<span class="id">#main</span> <span class="tag">h3</span> {
    <span class="key">font-size</span>: <span class="float">16px</span>;
    <span class="key">border-left</span>: <span class="value">solid</span> <span class="float">3px</span> <span class="color">#fa9786</span>;
    <span class="key">padding</span>: <span class="float">4px</span> <span class="float">9px</span> <span class="float">4px</span> <span class="float">14px</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-7">13.7 ヘッダー
</h3><p>基本のスタイルができたので、ここからはページの各部を整えていきます。まずは一番上のヘッダーエリアです。ヘッダーエリアはサイトに訪れた多くの人が目にします。企業のロゴ、キャッチコピー、その他Webサイト内で共通に利用するパーツを置きます。</p>

<p>▼ヘッダー部分のHTMLの確認</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;header&gt;</span>
            <span class="tag">&lt;h1&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">TechAcademy KITCHEN</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h1&gt;</span>
            <span class="tag">&lt;nav</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">global_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">current</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/nav&gt;</span>
        <span class="tag">&lt;/header&gt;</span>
</pre></div>
</div>
</div>

<h4>ヘッダーの幅を決める</h4>

<p>まず、ヘッダーの幅を決めます。今回のサイトでは、widthプロパティで、幅を984pxと指定しましょう。ただし、幅を指定しただけでは特に変化しないように見えるでしょう。今まで見てきたように、HTMLは左から右に詰めるようにレイアウトされるので幅を小さくしても左に寄せられて気づきません。そこで、左右の <code>margin</code> に <code>auto</code> を指定することで、HTML要素が中央揃えになります。ブラウザのページ表示幅を 984px 以上にすると、左右の余白が自動的に調整され、中央揃えとなります。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">header</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
}
</pre></div>
</div>
</div>

<h4>ロゴのマージンを調整する</h4>

<p>ロゴの画像は多くのサイトで左上に設置されます。TechAcademy KITCHEN のユーザーがサイトに訪れた際、目にしてもらいたいので、今のまま左上に設置しておきます。</p>

<p>続いて、ロゴのマージンを調整します。marginプロパティを指定し、上に5px、下に10pxの調整のための隙間を作ります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/logo.png" alt="logo.png"></p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">header</span> <span class="tag">h1</span> {
    <span class="key">margin</span>: <span class="float">5px</span> <span class="float">0</span> <span class="float">10px</span>;
}
</pre></div>
</div>
</div>

<p>ロゴの調整ができました。</p>

<h4>グローバルナビゲーション</h4>

<p>続いて、グローバルナビゲーションを装飾していきましょう。グローバルナビゲーションは重要な主要ページへのリンクを集めているものになりますので、ページ間の移動においてとても重要な役割を担っています。Webサイトにどんなコンテンツがあるのか一目でわかったり、選択時も色を変えることで、現在ページを把握することもできます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/header.png" alt="header.png"></p>

<h4>ナビゲーション枠</h4>

<p>nav要素に「global_navi」というIDを付けているので、IDセレクタを使って margin-bottom を 16px にして、少し余白をとっておきます。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> {
    <span class="key">margin-bottom</span>: <span class="float">16px</span>;
}
</pre></div>
</div>
</div>

<h4>リストの点を外す</h4>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/icon.png" alt="icon.png"></p>

<p>グローバルナビゲーションはul要素なので、左側に点が付いていますが不要なので外していきます。外し方ですが、list-styleプロパティを使用し、none指定を行います。さらに点があったスペース（padding）も消しておきます。margin も上下についているので、 0 にしておきます。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}
</pre></div>
</div>
</div>

<h4>リストを横並びにする</h4>

<p>縦に並んでいるリストを横に並べましょう。横並びへの変更の方法は、<code>display: inline-block;</code> を設定します。これで横並びになります。</p>

<p>また、今回のナビゲーション全体の横幅は984pxで、6項目で構成します。<code>984 ÷ 6</code> は <code>164px</code> なので、1つの項目の幅(width)を164px、最後にtext-alignプロパティで文字を中央揃えにしましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> {
    <span class="key">display</span>: <span class="value">inline-block</span>;
    <span class="key">width</span>: <span class="float">164px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>ナビゲーションのデザインを整える</h4>

<p>リストをボタンのようにクリックできるようにしましょう。li要素内のa要素に背景色を設定して広げます。display:blockでブロックレベルに変更して親のli要素全体に領域を広げます（<code>display: block;</code>にしても親要素である<code>li</code>の大きさを超えません）。また、パディングも10px、16pxで設定します。background-colorプロパティをcolorプロパティで背景色・文字色を整えた後、リンクの下線をtext-decorationプロパティで消してテキストリンクっぽさを無くしましょう。</p>

<p><code>transition: background-color .2s linear;</code> の記述については、アニメーションによる簡単な視覚効果を付与しています。<code>.2s</code> は <code>0.2s</code> の省略形です。background-color（背景色）が0.2s（0.2秒）かけて、 linearに（直線的に、つまり開始から終了まで一定に）変化する、というような意味合いです。この先に出てくる、「マウスポインタを乗せた時に色が変わる」を追記すると、プレビュー画面で変化が確認できるようになります。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> <span class="tag">a</span> {
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">padding</span>: <span class="float">10px</span> <span class="float">16px</span>;
    <span class="key">background-color</span>: <span class="color">#f0573e</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
    <span class="key">text-decoration</span>: <span class="value">none</span>;
    <span class="key">transition</span>: <span class="value">background-color</span> <span class="float">.2s</span> <span class="value">linear</span>;
}
</pre></div>
</div>
</div>

<h4>余計な半角スペースを消す</h4>

<p><code>984 ÷ 6</code> は <code>164px</code> だったはずなので、ボタンは横幅に収まるはずなのですが、なぜか 984px からはみだして、「お問い合わせ」ボタンが下にカラム落ちしています。 164px のボタンを横一列に6個並べただけなのに、ボタンとボタンの間にどうやら <strong>半角スペースが入って</strong> しまっています。</p>

<p>これは、下記のように <code>&lt;li&gt;...&lt;/li&gt;</code> を並べたときに、どうしても改行が入ってしまうのが理由です。</p>

<p><em>kitchen.html（下記の内容を追記しないでください）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">current</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>ここで改行
<span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>ここで改行
<span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>ここで改行
<span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>ここで改行
<span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>ここで改行
<span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>ここで改行
</pre></div>
</div>
</div>

<p>HTMLは改行や半角スペースをいくら繋げても、1つの半角スペースになってしまうことを思い出しましょう。（実際に文章の途中などで改行させるためには <code>&lt;br&gt;</code> が必要でした。また、補足ですが、上記 <code>li</code> は改行によって縦に並んでいるのではなく、 <code>li</code> 要素のデフォルトが <code>display: block;</code> だからです。）</p>

<p>そのため、li要素（ボタン）とli要素（ボタン）の間に余計な半角スペースが入ってしまってしまい、横幅が 984px を超えてしまって、カラム落ちしてしまっています。</p>

<p>つまり、下記のように1行で <code>li</code> を連続して詰めて書いてしまうと半角スペースは入りません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">current</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span><span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span><span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span><span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span><span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span><span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
</pre></div>
</div>
</div>

<p>しかし、これでは Web制作者（私達自身）が HTML をみたときにとても見辛く編集もしづらくなりますので、できれば改行はしておきたいところです。</p>

<p>この問題を解決するには、半角スペースが入っている箇所(ul)を一時的に <code>font-size: 0;</code> にして半角スペースの大きさを0にして消し、更に内部(li)で <code>font-size: 14px;</code> を再設定して文字の大きさを復活させます。先程のCSSに <code>font-size</code> プロパティを追記します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> {
    <span class="key">font-size</span>: <span class="float">0</span>;  <span class="comment">/* 半角スペース削除 */</span>
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> {
    <span class="key">font-size</span>: <span class="float">14px</span>;  <span class="comment">/* フォントサイズ復活 */</span>
    <span class="key">display</span>: <span class="value">inline-block</span>;
    <span class="key">width</span>: <span class="float">164px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<p>これで半角スペースは消えて、ボタン間の半角スペースがなくなり、カラム落ちしなくなりました。</p>

<p>ただし、これだとボタンとボタンがくっついていて境界がわかりにくいので <code>margin-right: 1px;</code> を追加します。このときマージンだけ追加するとまたカラム落ちするので、 <code>width</code> を <code>163px</code> にして調整します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> {
    <span class="key">font-size</span>: <span class="float">14px</span>;  <span class="comment">/* フォントサイズ復活 */</span>
    <span class="key">display</span>: <span class="value">inline-block</span>;
    <span class="key">width</span>: <span class="float">163px</span>;
    <span class="key">margin-right</span>: <span class="float">1px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>現在ページの部分の色を変える</h4>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/header_2.png" alt="header_2.png"></p>

<p>グローバルナビゲーションは現在ページを表す役割も果たします。ページがいくつもあるサイトの場合、ユーザーは迷子になってしまうこともあります。現在ページのli要素には <code>current</code> というクラス名を付けています。そのa要素に対してbackground-colorプロパティで背景色を設定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span><span class="class">.current</span> <span class="tag">a</span> {
    <span class="key">background-color</span>: <span class="color">#fa9786</span>;
}
</pre></div>
</div>
</div>

<h4>マウスポインタを乗せた時に色が変わる</h4>

<p>グローバルナビゲーションもリンクです。他のリンク同様にマウスポインタを乗せた時に色を変えましょう。この場合、どうしたらいいか覚えてますでしょうか？ <code>:hover</code> 擬似クラスを指定します。backgroud-colorプロパティで背景色が変わらぬように指定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> <span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">background-color</span>: <span class="color">#fa9786</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>ここまででヘッダー部分の調整が完了です。一気にサイトらしくなりましたね。</p>

<p>また、利用頻度の高いプロパティもたくさん出てきました。ボリュームも多かったので、真似るのに一生懸命だった人は見直しを行うと良いでしょう。ソースコードは以下のようになっております。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：ヘッダー */</span>
<span class="tag">header</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
}

<span class="tag">header</span> <span class="tag">h1</span> {
    <span class="key">margin</span>: <span class="float">5px</span> <span class="float">0</span> <span class="float">10px</span>;
}

<span class="id">#global_navi</span> {
    <span class="key">margin-bottom</span>: <span class="float">16px</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> {
    <span class="key">font-size</span>: <span class="float">0</span>;  <span class="comment">/* 半角スペース削除 */</span>
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> {
    <span class="key">font-size</span>: <span class="float">14px</span>;  <span class="comment">/* フォントサイズ復活 */</span>
    <span class="key">display</span>: <span class="value">inline-block</span>;
    <span class="key">width</span>: <span class="float">163px</span>;
    <span class="key">margin-right</span>: <span class="float">1px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> <span class="tag">a</span> {
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">padding</span>: <span class="float">10px</span> <span class="float">16px</span>;
    <span class="key">background-color</span>: <span class="color">#f0573e</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
    <span class="key">text-decoration</span>: <span class="value">none</span>;
    <span class="key">transition</span>: <span class="value">background-color</span> <span class="float">.2s</span> <span class="value">linear</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span><span class="class">.current</span> <span class="tag">a</span> {
    <span class="key">background-color</span>: <span class="color">#fa9786</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> <span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">background-color</span>: <span class="color">#fa9786</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-8">13.8 メインビジュアル
</h3><p>メインビジュアル画像は、グローバルナビゲーションと同じ横幅984pxで、高さ440pxの1枚の画像です。メインビジュアル用に挿入したdiv要素に対しても同様にマージンは左右をautoにすることでページの中央に配置し、下マージンを設置して後続する要素と空きを確保します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_main_visual.png" alt=""></p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：メインビジュアル */</span>
<span class="id">#main_visual</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">height</span>: <span class="float">440px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span> <span class="float">25px</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-9">13.9 メインとサイドバー（2カラムレイアウト）
</h3><p>続いて、メイン部分の幅も固定していきます。本サイトは、メインエリアとサイドバーの2つで構成されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/base_html_2.png" alt="base_html_2.png"></p>

<h4>メインエリア全体</h4>

<p>2つのエリアは、 <code>#wrapper</code> というID名のdiv要素の中に入っています。 <code>#wrapper</code> の幅を984pxにし、マージンの上下を0、左右をautoにしてページ中央に配置します。さらに、メインとサイドバーを横並びにするため、Flexboxを採用します。メインは左端、サイドバーは右端に配置させるため、<code>justify-content: space-between;</code> もあわせて適用します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#wrapper</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}
</pre></div>
</div>
</div>

<h4>コンテンツエリアとサイドバーの横幅を指定</h4>

<p>コンテンツエリアは横幅を730pxに指定し、サイドバーは横幅220pxに指定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#main</span> {
    <span class="key">width</span>: <span class="float">730px</span>;
}

<span class="id">#sidebar</span> {
    <span class="key">width</span>: <span class="float">220px</span>;
}
</pre></div>
</div>
</div>

<p>2つのエリアの幅を足すと950pxになります。wrapperの横幅は984に指定しましたので、34pxが間の余白になります。</p>

<h4>確認</h4>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：メインとサイドバー（2カラムレイアウト） */</span>
<span class="id">#wrapper</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}

<span class="id">#main</span> {
    <span class="key">width</span>: <span class="float">730px</span>;
}

<span class="id">#sidebar</span> {
    <span class="key">width</span>: <span class="float">220px</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-10">13.10 メインエリア
</h3><p>メインエリアには、2つの見出しと、お知らせがあります。</p>

<h4>写真とキャプションを右に配置させる</h4>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/html/techacademy-kitchen_css_figure[1].png" alt=""></p>

<p>2つの写真は figure 要素の中に書かれているので、class名を <code>point</code> としている div 要素に Flexbox を適用することで figure 要素を右に配置させます。<code>justify-content: space-between;</code> も追記しましょう。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.point</span> {
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}

<span class="class">.point</span> <span class="tag">figure</span> {
    <span class="key">margin-right</span>: <span class="float">0</span>;
}
</pre></div>
</div>
</div>

<h4>キャプション</h4>

<p>写真のキャプションはfigcaption要素に書かれています。figcaption要素自体はブロックレベルなので画像の下に表示されます。キャプションは本文と差別化を図る目的で、文字サイズを小さくし、異なるテキストカラーを指定します。text-alignプロパティで文字を中央揃えにして、表示位置を整えます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/section_2.png" alt="section_2.png"></p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.point</span> <span class="tag">figcaption</span> {
    <span class="key">font-size</span>: <span class="float">12px</span>;
    <span class="key">color</span>: <span class="color">#9C9689</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>お知らせ</h4>

<p>お知らせは、 ul, liのリスト要素でした。リスト要素でまず気になるのが自動的に付与される「・（点）」なので、それを <code>list-style: none;</code> で非表示にします。また、非表示にするだけでは、デフォルトで入ってるpaddingによって、手前に少しスペースが空いてしまっています。これも <code>padding: 0;</code> で消します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#news</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#news</span> <span class="tag">li</span> {
    <span class="key">margin-bottom</span>: <span class="float">10px</span>;
}

<span class="id">#news</span> <span class="tag">li</span> <span class="tag">a</span> {
    <span class="key">margin-left</span>: <span class="float">15px</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：メインエリア */</span>
<span class="class">.point</span> {
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}

<span class="class">.point</span> <span class="tag">figure</span> {
    <span class="key">margin-right</span>: <span class="float">0</span>;
}

<span class="class">.point</span> <span class="tag">figcaption</span> {
    <span class="key">font-size</span>: <span class="float">12px</span>;
    <span class="key">color</span>: <span class="color">#9C9689</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="id">#news</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#news</span> <span class="tag">li</span> {
    <span class="key">margin-bottom</span>: <span class="float">10px</span>;
}

<span class="id">#news</span> <span class="tag">li</span> <span class="tag">a</span> {
    <span class="key">margin-left</span>: <span class="float">15px</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-11">13.11 サイドバー
</h3><p>サンプルサイトのサイドバーの内容は、h2要素の見出しや画像リンクです。サイドバー専用のデザインでCSSを作成していきます。</p>

<p>▼サイドバーのHTML</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>            <span class="tag">&lt;aside</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">sidebar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">side_banner</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;h2&gt;</span>関連リンク<span class="tag">&lt;/h2&gt;</span>
                    <span class="tag">&lt;ul&gt;</span>
                        <span class="tag">&lt;li&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">images_kitchen/banner01.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">ブログ</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
                            <span class="tag">&lt;p&gt;</span>毎日季節の野菜を取り入れたレシピを公開中。<span class="tag">&lt;/p&gt;</span>
                        <span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;/ul&gt;</span>
                <span class="tag">&lt;/section&gt;</span>
            <span class="tag">&lt;/aside&gt;</span>
</pre></div>
</div>
</div>

<h4>バナー画像のリストの点を消す</h4>

<p>見出しの下にあるバナー画像は、リスト要素で並んでいます。「・」を非表示にしてパディングを0にします。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#side_banner</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}
</pre></div>
</div>
</div>

<h4>バナーエリアを整える</h4>

<p>サイドバーのsection要素には「side_banner」というID名をつけたので、そのボックスに下マージンを設定します。合わせて、枠線を指定し、テキストを中央寄せに設定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#side_banner</span> {
    <span class="key">margin-bottom</span>: <span class="float">30px</span>;
    <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#956840</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>関連リンクの見出しを整える</h4>

<p>“side_banner h2”という子孫セレクタで、この部分のh2要素だけ選びます。background-colorプロパティで背景を整えたら、paddingプロパティで内側の余白を整えます。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="id">#side_banner</span> <span class="tag">h2</span> {
    <span class="key">background-color</span>: <span class="color">#956840</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
    <span class="key">padding</span>: <span class="float">7px</span>;
    <span class="key">font-size</span>: <span class="float">14px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：サイドバー */</span>
<span class="id">#side_banner</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#side_banner</span> {
    <span class="key">margin-bottom</span>: <span class="float">30px</span>;
    <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#956840</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="id">#side_banner</span> <span class="tag">h2</span> {
    <span class="key">background-color</span>: <span class="color">#956840</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
    <span class="key">padding</span>: <span class="float">7px</span>;
    <span class="key">font-size</span>: <span class="float">14px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-12">13.12 フッター
</h3><p>フッターは、コンテンツやデザインによってヘッダー同様に横幅を決めて配置したり、横幅を指定せずにブラウザの幅いっぱいまで広がる入れ方をするケースもあります。今回のサンプルサイトではブラウザの幅いっぱいに広がるデザインを採用します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/footer.png" alt="footer.png"></p>

<p>▼フッターのHTMLと構造</p>

<p><em>kitchen.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;footer&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">footer_navi</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">kitchen.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>HOME<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">course.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>講座案内<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">lesson.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>レッスン<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">gallery.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ギャラリー<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">access.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アクセス<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">contact.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;small&gt;</span><span class="entity">&amp;copy;</span> 2018 TechAcademy KITCHEN.<span class="tag">&lt;/small&gt;</span>
        <span class="tag">&lt;/footer&gt;</span>
</pre></div>
</div>
</div>

<h4>リストの点を消す</h4>

<p>list-styleプロパティにnoneを指定で点を非表示にします。マージンとパディングも0にして余白をなくし中央揃えにします。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>基本枠</h4>

<p>footer要素は幅を指定せずにいきます。指定しない場合、横幅いっぱいに広がります。フッターの背景に（#956840）を指定します。コンテンツを全て中央揃えにするため、text-alignプロパティでcenterを指定します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">footer</span> {
    <span class="key">background-color</span>: <span class="color">#956840</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}
</pre></div>
</div>
</div>

<h4>フッターナビゲーションの背景色と余白を設定</h4>

<p>フッターナビゲーションが表示されるのはページの最下部になります。ページを見ている人が最後、目にするパーツとなります。何かを探してフッターにたどり着いたことも考えられますので、メインコンテンツを邪魔しないように情報を整理して、印象を良くしましょう。「footer_navi」というID名を付けたdiv要素に対して、background-colorプロパティで背景色を指定し、上下の内側の余白を調整します。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">footer</span> <span class="id">#footer_navi</span> {
    <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
    <span class="key">padding</span>: <span class="float">10px</span> <span class="float">0</span>;
}
</pre></div>
</div>
</div>

<h4>リストを横並びにする</h4>

<p>続いてリストを横並びにします。今回はli要素に対して <code>display: inline;</code> を指定します。ここで <code>inline-block</code> でないのは、 ここの要素はボタンではないので、大きさ（ <code>width</code> や <code>height</code> ）を持たせる必要がないからです。ここではフォントの大きさがそのまま大きさとなるので <code>display: inline;</code> で構いません。</p>

<p>次に、リンク同士のディバイダー（分割）は、border-leftプロパティで行います。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">li</span> {
    <span class="key">display</span>: <span class="value">inline</span>;
    <span class="key">border-left</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#333</span>;
    <span class="key">margin-left</span>: <span class="float">8px</span>;
    <span class="key">padding-left</span>: <span class="float">8px</span>;
    <span class="key">font-size</span>: <span class="value">smaller</span>;
}
</pre></div>
</div>
</div>

<h4>最後の項目に右のボーダーを設定する</h4>

<p>リンク同士のディバイダー（分割）は左側にのみ引いたので、最後の項目の右側にborderが必要です。そのため、:last-child擬似クラスを使って最後のli要素だけを選択し、右ボーダーを付ける指定を行います。さらにパディングで余白を整えれば、フッターナビゲーションの完成です。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">li</span><span class="pseudo-class">:last-child</span> {
    <span class="key">border-right</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#333</span>;
    <span class="key">padding</span>: <span class="float">0</span> <span class="float">8px</span>;
}
</pre></div>
</div>
</div>

<h4>コピーライト</h4>

<p>コピーライト部分はsmall要素で記述します。small要素は、<code>display: inline;</code> の要素です。 paddingを持てるようにするため、 <code>display: block</code> にします。次にパディングを設定します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/htmlcss/css/copyright.png" alt="copyright.png"></p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">footer</span> <span class="tag">small</span> {
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">padding</span>: <span class="float">8px</span> <span class="float">0</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
}
</pre></div>
</div>
</div>

<h4>確認</h4>

<p>フッター部分の調整が完了しました。フッターはほとんどのサイトにあり、デザインも似ております。ここで学習した知識がダイレクトに活かせますので、しっかり覚えていきましょう。</p>

<p>これでCSSのコーディングは全て完了です。次のセクションでコード全文を示しますので、併せて確認してください。</p>

<p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* チャプター：フッター */</span>
<span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="tag">footer</span> {
    <span class="key">background-color</span>: <span class="color">#956840</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="tag">footer</span> <span class="id">#footer_navi</span> {
    <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
    <span class="key">padding</span>: <span class="float">10px</span> <span class="float">0</span>;
}

<span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">li</span> {
    <span class="key">display</span>: <span class="value">inline</span>;
    <span class="key">border-left</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#333</span>;
    <span class="key">margin-left</span>: <span class="float">8px</span>;
    <span class="key">padding-left</span>: <span class="float">8px</span>;
    <span class="key">font-size</span>: <span class="value">smaller</span>;
}

<span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">li</span><span class="pseudo-class">:last-child</span> {
    <span class="key">border-right</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#333</span>;
    <span class="key">padding</span>: <span class="float">0</span> <span class="float">8px</span>;
}

<span class="tag">footer</span> <span class="tag">small</span> {
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">padding</span>: <span class="float">8px</span> <span class="float">0</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-13-13">13.13 CSS全体
</h3><p><em>kitchen.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="directive">@charset</span> <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>;

<span class="comment">/* チャプター：全体の設定 */</span>
<span class="tag">body</span> {
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
    <span class="key">color</span>: <span class="color">#333</span>;
    <span class="key">font-size</span>: <span class="float">14px</span>;
}

<span class="tag">a</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
}

<span class="tag">a</span><span class="pseudo-class">:visited</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
}

<span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">color</span>: <span class="color">#333</span>;
    <span class="key">font-weight</span>: <span class="float">700</span>;
    <span class="key">text-decoration</span>: <span class="value">none</span>;
}

<span class="comment">/* チャプター：マージン */</span>
<span class="tag">h1</span>,<span class="tag">h2</span>,<span class="tag">h3</span>,<span class="tag">h4</span>,<span class="tag">h5</span>,<span class="tag">h6</span> {
    <span class="key">margin-top</span>: <span class="float">0</span>;
}

<span class="tag">p</span> {
    <span class="key">margin-top</span>: <span class="float">0</span>;
    <span class="key">line-height</span>: <span class="float">1.6</span>;
}

<span class="tag">img</span> {
    <span class="key">vertical-align</span>: <span class="value">bottom</span>;
}

<span class="comment">/* チャプター：見出しの装飾 */</span>
<span class="id">#main</span> <span class="tag">h2</span> {
    <span class="key">background</span>: <span class="color">#fff</span>;
    <span class="key">font-size</span>: <span class="float">20px</span>;
    <span class="key">padding</span>: <span class="float">8px</span> <span class="float">22px</span>;
    <span class="key">border-radius</span>: <span class="float">2px</span>;
    <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#956840</span>;
}

<span class="id">#main</span> <span class="tag">h3</span> {
    <span class="key">font-size</span>: <span class="float">16px</span>;
    <span class="key">border-left</span>: <span class="value">solid</span> <span class="float">3px</span> <span class="color">#fa9786</span>;
    <span class="key">padding</span>: <span class="float">4px</span> <span class="float">9px</span> <span class="float">4px</span> <span class="float">14px</span>;
}

<span class="comment">/* チャプター：ヘッダー */</span>
<span class="tag">header</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
}

<span class="tag">header</span> <span class="tag">h1</span> {
    <span class="key">margin</span>: <span class="float">5px</span> <span class="float">0</span> <span class="float">10px</span>;
}

<span class="id">#global_navi</span> {
    <span class="key">margin-bottom</span>: <span class="float">16px</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> {
    <span class="key">font-size</span>: <span class="float">0</span>;  <span class="comment">/* 半角スペース削除 */</span>
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> {
    <span class="key">font-size</span>: <span class="float">14px</span>;  <span class="comment">/* フォントサイズ復活 */</span>
    <span class="key">display</span>: <span class="value">inline-block</span>;
    <span class="key">width</span>: <span class="float">163px</span>;
    <span class="key">margin-right</span>: <span class="float">1px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> <span class="tag">a</span> {
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">padding</span>: <span class="float">10px</span> <span class="float">16px</span>;
    <span class="key">background-color</span>: <span class="color">#f0573e</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
    <span class="key">text-decoration</span>: <span class="value">none</span>;
    <span class="key">transition</span>: <span class="value">background-color</span> <span class="float">.2s</span> <span class="value">linear</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span><span class="class">.current</span> <span class="tag">a</span> {
    <span class="key">background-color</span>: <span class="color">#fa9786</span>;
}

<span class="id">#global_navi</span> <span class="tag">ul</span> <span class="tag">li</span> <span class="tag">a</span><span class="pseudo-class">:hover</span> {
    <span class="key">background-color</span>: <span class="color">#fa9786</span>;
}

<span class="comment">/* チャプター：メインビジュアル */</span>
<span class="id">#main_visual</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">height</span>: <span class="float">440px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span> <span class="float">25px</span>;
}

<span class="comment">/* チャプター：メインとサイドバー（2カラムレイアウト） */</span>
<span class="id">#wrapper</span> {
    <span class="key">width</span>: <span class="float">984px</span>;
    <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}

<span class="id">#main</span> {
    <span class="key">width</span>: <span class="float">730px</span>;
}

<span class="id">#sidebar</span> {
    <span class="key">width</span>: <span class="float">220px</span>;
}

<span class="comment">/* チャプター：メインエリア */</span>
<span class="class">.point</span> {
    <span class="key">display</span>: <span class="value">flex</span>;
    <span class="key">justify-content</span>: <span class="value">space-between</span>;
}

<span class="class">.point</span> <span class="tag">figure</span> {
    <span class="key">margin-right</span>: <span class="float">0</span>;
}

<span class="class">.point</span> <span class="tag">figcaption</span> {
    <span class="key">font-size</span>: <span class="float">12px</span>;
    <span class="key">color</span>: <span class="color">#9C9689</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="id">#news</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#news</span> <span class="tag">li</span> {
    <span class="key">margin-bottom</span>: <span class="float">10px</span>;
}

<span class="id">#news</span> <span class="tag">li</span> <span class="tag">a</span> {
    <span class="key">margin-left</span>: <span class="float">15px</span>;
}

<span class="comment">/* チャプター：サイドバー */</span>
<span class="id">#side_banner</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
}

<span class="id">#side_banner</span> {
    <span class="key">margin-bottom</span>: <span class="float">30px</span>;
    <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#956840</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="id">#side_banner</span> <span class="tag">h2</span> {
    <span class="key">background-color</span>: <span class="color">#956840</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
    <span class="key">padding</span>: <span class="float">7px</span>;
    <span class="key">font-size</span>: <span class="float">14px</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="comment">/* チャプター：フッター */</span>
<span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">ul</span> {
    <span class="key">list-style</span>: <span class="value">none</span>;
    <span class="key">margin</span>: <span class="float">0</span>;
    <span class="key">padding</span>: <span class="float">0</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="tag">footer</span> {
    <span class="key">background-color</span>: <span class="color">#956840</span>;
    <span class="key">text-align</span>: <span class="value">center</span>;
}

<span class="tag">footer</span> <span class="id">#footer_navi</span> {
    <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
    <span class="key">padding</span>: <span class="float">10px</span> <span class="float">0</span>;
}

<span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">li</span> {
    <span class="key">display</span>: <span class="value">inline</span>;
    <span class="key">border-left</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#333</span>;
    <span class="key">margin-left</span>: <span class="float">8px</span>;
    <span class="key">padding-left</span>: <span class="float">8px</span>;
    <span class="key">font-size</span>: <span class="value">smaller</span>;
}

<span class="tag">footer</span> <span class="id">#footer_navi</span> <span class="tag">li</span><span class="pseudo-class">:last-child</span> {
    <span class="key">border-right</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#333</span>;
    <span class="key">padding</span>: <span class="float">0</span> <span class="float">8px</span>;
}

<span class="tag">footer</span> <span class="tag">small</span> {
    <span class="key">display</span>: <span class="value">block</span>;
    <span class="key">padding</span>: <span class="float">8px</span> <span class="float">0</span>;
    <span class="key">color</span>: <span class="color">#fff</span>;
}
</pre></div>
</div>
</div>
</div><div class="subsection challenge"><h3 class="index" id="kadai-css">課題：CSSでレイアウト</h3><div class="alert alert-warning">
この課題はHTMLの課題（<i>kadai-html.html</i> を作成する課題）が合格してから取り組んでください。<br>
合格前にCSSの課題へ取り組むことは禁止とします。
</div>

<p>HTMLの課題で作った <em>kadai-html.html</em> を下記キャプチャのようにレイアウトしてください。レイアウトするために、Cloud9上でCSSファイル <em>kadai-css.css</em> を作成してください。レイアウトした要素のボックスモデルがよくわかるように、各要素に背景色をつけてください。要素と背景色の対応は下記の表を参照してください。</p>

<p>完了したら、「課題を提出」しましょう。「課題を提出」していただくと、メンターがCloud9上のファイルをレビューします。提出方法が不明な方は、 <a href="./orientation#chapter-8-3" target="_blank">こちらのリンクをクリックして「レッスン0 事前準備」の「8.3 課題提出」を参照してください。</a></p>

<p>課題提出時のコメントには、メンターに特に確認して欲しい箇所や、自信のない箇所などを書いておくと確認してくれるでしょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/html-css/kadai-css1.png" alt=""></p>

<p><em>要素と背景色の対応</em></p>

<table>
  <thead>
    <tr>
      <th>要素</th>
      <th>背景色</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>header</code></td>
      <td><code>#ffcccc</code></td>
    </tr>
    <tr>
      <td><code>#main</code></td>
      <td><code>#ccffcc</code></td>
    </tr>
    <tr>
      <td><code>#menu</code></td>
      <td><code>#ccccff</code></td>
    </tr>
    <tr>
      <td><code>footer</code></td>
      <td><code>#ffccff</code></td>
    </tr>
  </tbody>
</table>
</div></section><section id="chapter-14"><h2 class="index">14. まとめ
</h2><div class="subsection"><p>このレッスンでは、Webの基本であるHTML/CSSを学びました。HTMLは文書であり、CSSはデザインであることをしっかり認識しておきましょう。</p>

<p>HTMLはそれほど難しくないと思われたのではないでしょうか。基本的には、いつも書く文書のように書いていき、必要なところでタグを適用させればよいのです。</p>

<p>それに比べてCSSは少し難しいと感じたかもしれません。特にレイアウト部分は難しいところがあります。Webページのレイアウトで重要なのは、ボックスモデルとFlexboxモデルの理解です。これらは本文で解説したので、理解できなければ何度も読んだりJS Bin上で試したりしながら感覚をつかんでいきましょう。レイアウトさえ理解できれば、Web制作の見通しはとても良くなります。</p>

<p>ここで学んだHTMLやCSSは基礎レベルまでです。ここで学んでいないHTMLタグや、CSSプロパティがあるので、新しく出て来るたびにリファレンスサイトや検索サイトで調べて、少しずつ覚えていくのが良いでしょう。あまり全部を覚えることに固執することはありません。エンジニアやWebデザイナーも常に検索しながらWeb開発を進めています。それだけ検索サイトを利用することが大事ということでもあります。</p>

<div class="alert alert-warning">
このレッスンで作成したファイルは、 <i>lesson-htmlcss</i> フォルダを作成してその中に入れておきましょう。今後もファイルを作成していくので、今のうちに整理してきましょう。以降のレッスンで作成するファイルも <i>lesson-...</i> フォルダを作成して整理しておくと良いでしょう。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-14-1">14.1 （参考資料）HTML文法チェックサービス
</h3><p>HTMLのコーディングに慣れてきましたら The W3C Markup Validation Service という HTMLの書き方をチェックしてくれるサービスを利用してみると良いでしょう。このサービスは、HTMLの文法を定めているW3Cという団体が公式で提供しているサービスです。ここでは The W3C Markup Validation Service の中から、HTMLの全文を貼りつけてチェックしてもらう機能について紹介します。</p>

<p>まずは下記のサイトにアクセスしてください。</p>

<ul>
  <li><a href="https://validator.w3.org/#validate_by_input" target="_blank">The W3C Markup Validation Service</a></li>
</ul>

<p>メニューに3つのタブがあります。</p>

<ul>
  <li>URLで確認 (Validate by URI)</li>
  <li>ファイルで確認 (Validate by File Upload)</li>
  <li>直接テキストで確認 (Validate by Direct Input)</li>
</ul>

<p>一番右にある「直接テキストで確認」でHTMLの文法チェックを行います。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/html-css/w3c_validator_01.png" alt=""></p>

<p>テキストエリアの中に、作成したHTMLのコード全文を貼りつけてください。詳細な手順は、以下のとおりです。</p>

<ol>
  <li>HTMLファイル上で <kbd>command + a</kbd> (Windows の方は <kbd>Ctrl + a</kbd>) キーを使って「すべてを選択」する</li>
  <li><kbd>command + c</kbd> (Windows の方は <kbd>Ctrl + c</kbd>) キーで「クリップボードにコピー」する</li>
  <li><a href="https://validator.w3.org/#validate_by_input" target="_blank">The W3C Markup Validation Service (Validate by Direct Input)</a>を開き、テキストエリア部分に先ほどコピーしたHTMLコードを <kbd>command + v</kbd> (Windows の方は <kbd>Ctrl + v</kbd>) キーを使って「貼りつけ」する</li>
  <li>Check ボタンをクリックする</li>
</ol>

<p>チェックが完了すると、検証結果が画面に表示されます。緑が出れば、HTMLの文法に全く問題無かったということです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/wordpress/html-coding/5-3-cloud9_htmlcss_1.png" alt=""></p>

<p>間違いがあると、下記キャプチャのようにエラーが出ます。<strong>エラーが出たら直すようにしましょう</strong>。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/wordpress/html-coding/5-3-cloud9_htmlcss_2.png" alt=""></p>

<p>また、エラー以外に警告(Warning)があります。警告は、推奨されてませんというだけであり、無理に直す必要はありません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/wordpress/html-coding/5-3-cloud9_htmlcss_3.png" alt=""></p>

<p>こういった文法チェックサービスを活用してみてください。</p>

<div class="alert alert-warning">
本カリキュラムの後半のレッスンに登場するサンプルコードをチェックにかけると、警告やエラーになる場合があります。あくまでも文法チェックサービスは参考程度という認識でお考えください。
</div>
</div></section></div>
</body>
</html>