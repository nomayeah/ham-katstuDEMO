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
<div class="markdown"><div class="lesson-num p">Lesson4</div><h1 id="jquery">jQuery
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>前回のレッスンではJavaScriptによるDOM操作を勉強しました。本レッスンではjQueryというライブラリを使って、より簡単にDOM操作やイベントを扱う方法を学び、さらにJavaScriptで作られたタブ切り替えなどのよくあるUIの動作原理を学びます。</p>

<script src="https://static.jsbin.com/js/embed.min.js?4.1.7"></script>

</div></section><section id="chapter-2"><h2 class="index">2. jQueryを使う理由
</h2><div class="subsection"><p>DOM操作をはじめとして、JavaScriptの一部の機能は、ブラウザによって異なる動作をする場合があります。同じコードを書いても、すべてのブラウザで同じ動作をするとは限りません。</p>

<p><a href="https://jquery.com/" target="_blank">jQuery</a>を利用するとブラウザ間の違いを意識することなくコードを書けます。jQueryが私たちプログラマーとブラウザの間に入り、プログラマーがjQueryに対して命令を出すと、各ブラウザで動作するJavaScriptに翻訳して命令を届けてくれるイメージです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-jquery.png" alt="jQueryが各ブラウザ向けに翻訳してくれる"></p>

<p>またJavaScriptだと行数が長くなってしまい書くのが面倒なコードを、jQueryだと簡単に書ける場合があります。</p>

<p>jQueryはとても便利なライブラリなので、世界中の多くのWebサイト制作などに使われています。使い方を覚えておくと役立ちます。</p>
</div></section><section id="chapter-3"><h2 class="index">3. jQueryを使う準備
</h2><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 jQueryを読み込む
</h3><p>まずはCloud9上でjQueryを使えるようにしてみましょう。jQueryを使うには、下記の<code>&lt;script&gt;</code>を<em>main.js</em>の読み込みの前に挿入します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<p>scriptタグ内に <code>src="https://..."</code> と書くことで、ローカルにファイルをダウンロードする必要無しに、外部コードを読み込むことができます。</p>

<p><code>src</code> に書かれたURLへアクセスすると、jQueryをブラウザで表示することもできます。URLに <code>.min</code> とついているものとついていないものを見比べてみましょう。 <code>.min</code> はファイルサイズを小さくするためにコンパクトに圧縮されており、人にはとても読みにくくなっていますが、通常のほうはJavaScriptで書かれているのがわかるでしょう。どちらもjQueryとして変わりないので、ファイルサイズの小さい <code>.min</code> のほうを読み込むほうが良いでしょう。</p>

<ul>
  <li><a href="https://code.jquery.com/jquery-3.4.1.min.js" target="_blank">https://code.jquery.com/jquery-3.4.1.min.js</a></li>
  <li><a href="https://code.jquery.com/jquery-3.4.1.js" target="_blank">https://code.jquery.com/jquery-3.4.1.js</a></li>
</ul>

<p><em>index.html</em> は下記のようにしておきます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;!DOCTYPE html&gt;
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>さっそくjQueryを使うため、<em>main.js</em>を下記の内容で作成してください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello jQuery!</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/hijivan/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>画面に「Hello jQuery!」と表示されました。何が起こっているかは後ほど見ていきましょう。</p>
</div></section><section id="chapter-4"><h2 class="index">4. jQueryの基本
</h2><div class="subsection"><p>jQueryには <code>jQuery</code> または <code>$</code> でアクセスできます。jQueryの基本的な使い方は<strong>要素を選択し、選択した要素群に対して操作を行う</strong>というものです。 <code>$(...)</code> で選択された要素は、「jQueryオブジェクト」というオブジェクトに変換されます。jQueryオブジェクトに変換することによって、jQueryのメソッドなどを使えるようになります。<code>text()</code> も、jQueryのメソッドです。</p>

<p>例えば下記のように書くと、まずCSSセレクタに該当する要素が選択されます。textメソッドの引数には、文字列を渡します。この文字列が、要素内のテキストとしてセットされます。要素内に他のテキストがある場合は、既存のテキストを置き換えます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">セレクタ</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">文字列</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>冒頭の <code>$('#box').text('Hello jQuery!');</code> は、<code>id="box"</code> の要素内のテキストに「Hello jQuery!」をセットするという操作だったのです。</p>

<p>上記のコードは、JavaScriptだと下記のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);
box.textContent = <span class="string"><span class="delimiter">'</span><span class="content">Hello jQuery!</span><span class="delimiter">'</span></span>;
</pre></div>
</div>
</div>

<p>jQueryの方が、少し簡単に書けることが分かります。</p>

<p>またjQueryでは、ブラウザごとの違いを意識せずに書くことができます。これはjQueryが、ブラウザごとに実行するコードを出し分けてくれるからです。JavaScriptでそのまま書く場合、処理の内容によってはif文などでブラウザごとに違う命令（処理）を記述する必要があります。</p>

<p>ただしjQueryで書いた場合でも、その内部ではJavaScriptをそのまま書いた場合と同じような処理が行われます。たとえば、先ほどjQueryで書いたコードをもう一度見てみましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello jQuery!</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>上記のようにjQueryのtextメソッドを使った場合、jQueryの内部では要素のtextContentプロパティに文字列を設定しています。参考までに、textメソッドがどのように定義されているかを紹介します。下記のページは、jQueryのコードの一部です。</p>

<p><a href="https://github.com/jquery/jquery/blob/438b1a3e8a52d3e4efd8aba45498477038849c97/src/manipulation.js#L309-L319" target="_blank">jQueryでtextメソッドが定義されているコード部分</a></p>

<p>上記のコードの315行目で、textメソッドの引数として渡された <code>value</code> の値が、要素の <code>textContent</code> に代入されます。つまり、JavaScriptをそのまま書いた場合と同じような処理が行われるということです。</p>

<p>jQueryのようなライブラリのコードは難しいので、中身をちゃんと読む必要はありません。現役のプログラマでも、ライブラリのコードまで確認することは少ないです。しかし、jQueryがJavaScriptで書かれているということは覚えておくと良いでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 loadイベント
</h3><p><code>&lt;script&gt;</code> はその場で実行されるため、<code>&lt;head&gt;</code> 内に <code>&lt;script&gt;</code> を入れると <code>&lt;body&gt;</code> 内の要素はまだ扱えません。たとえば下記のHTMLを見てください。</p>

<p>さきほどの<em>index.html</em>の <code>&lt;script&gt;</code> の位置を、<code>&lt;/body&gt;</code> 直前ではなくhead要素内に移動させています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>&lt;!DOCTYPE html&gt;
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello jQuery!</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><code>&lt;script&gt;</code> が <code>&lt;div id="box"&gt;</code> よりも上にあるため、<code>&lt;script&gt;</code>の実行時点ではまだ <code>&lt;div id="box"&gt;</code> が用意されておらず、何も表示されなくなりました。</p>

<p><code>&lt;script&gt;</code> は、基本的に <code>&lt;/body&gt;</code> の直前に書きましょう。そうすることで、すべての要素が準備できた後でjQueryやJavaScirptを実行できます。</p>

<p>ただし、注意すべきことがあります。それはWebサイトで表示する画像などの読み込みです。 <code>&lt;script&gt;</code> を <code>&lt;/body&gt;</code> の直前に書いたとしても、<code>&lt;script&gt;</code> の実行時点で画像ファイルなどはまだ読み込みが完了していない可能性があります。</p>

<p>画像などの読み込みが完了してからjQueryやJavaScirptを実行したい場合は、loadイベントの出番です。loadイベントは、<strong>ページ内のすべての外部CSSや画像の読み込みが完了したタイミングで発生するイベント</strong>です。loadイベントを元にして処理を実行するためには、下記のようにaddEventListenerメソッドでイベントリスナーを登録します。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>window.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">load</span><span class="delimiter">'</span></span>, () =&gt; <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">画像などの読み込みも完了しました！</span><span class="delimiter">'</span></span>));
</pre></div>
</div>
</div>

<p>jQueryの <code>on</code> というメソッドを使って、下記のように書くこともできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(window).on(<span class="string"><span class="delimiter">'</span><span class="content">load</span><span class="delimiter">'</span></span>, () =&gt; <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">画像などの読み込みも完了しました！</span><span class="delimiter">'</span></span>));
</pre></div>
</div>
</div>

<p>onメソッドについては、後ほど解説します。</p>
</div></section><section id="chapter-5"><h2 class="index">5. DOM操作
</h2><div class="subsection"><p>DOM操作はjQueryで行うとすっきりしたコーディングができます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 セレクタに一致した要素を操作する
</h3><p>jQueryによるDOM操作は下記のように記述します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">セレクタ</span><span class="delimiter">'</span></span>).<span class="error">操</span><span class="error">作</span>();
</pre></div>
</div>
</div>

<p>選択された状態のものをjQueryオブジェクトと呼びます。jQueryオブジェクトに対してドット（<code>.</code>）で操作をどんどんつなげていくことができます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">セレクタ</span><span class="delimiter">'</span></span>).<span class="error">操</span><span class="error">作</span><span class="integer">1</span>().<span class="error">操</span><span class="error">作</span><span class="integer">2</span>();
</pre></div>
</div>
</div>

<p>セレクタの該当要素が1つの場合は、その要素に対してだけ操作が行われます。たとえば下記のコードは、 <code>id='box'</code> の要素の中身を <code>Hello</code> に置き換えます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>クラスや要素名を指定すると、複数の要素が該当することもあります。その場合は、該当要素すべてが操作対象となります。下記は <code>class='item'</code> の要素すべてで、要素内のテキストを「Hello」に置き換える例です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.item</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>jQueryの実行前:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>こんにちは<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>こんにちは<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>こんにちは<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>jQueryの実行後:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Hello<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Hello<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Hello<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/tiruzoq/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>jQueryのセレクタは基本的に、CSSのセレクタと指定方法が同じです。そのためまずは、CSSのセレクタを理解することが大切です。基本的な内容は、テキストのLesson2に記載しています。</p>

<p>さらにCSSのセレクタについて学習したい場合は、次のサイトがおすすめです。要素やid・classなどの基本的なセレクタだけでなく、他にも多くのセレクタが紹介されています。</p>

<ul>
  <li><a href="https://saruwakakun.com/html-css/reference/selector" target="_blank">CSSのセレクタとは？覚えておきたい25種類と書き方</a></li>
</ul>

<p>CSSの仕様で定められている全てのセレクタについては、次のサイトなどで確認できます。</p>

<ul>
  <li><a href="http://wp-e.org/2014/05/20/2420/" target="_blank">CSS3のセレクタ全42種 まとめておさらい使い方リファレンス</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 セレクタで、子要素を選択して操作する
</h3><h4>直下セレクタ</h4>

<p>直下セレクタの<code>&gt;</code>を使うことで、ある要素の子要素だけを選択して操作できます。</p>

<p>たとえば、下記のHTMLを見てみましょう。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">parent</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">children</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">grand_children</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">children</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">grand_children</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">children</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">grand_children</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>上記で <code>id="parent"</code> が指定されたdiv要素を、ここでは <em>#parent</em> と呼ぶことにします。同じく <code>class="children"</code> のdiv要素は、 <em>.children</em> と呼ぶことにします。そして <code>class="grand_children"</code> が指定されたdiv要素は、<em>.grand_children</em> と呼ぶことにします。</p>

<p>ある要素の下にある全ての要素を、その要素の「<strong>子孫要素</strong>」と言います。上のコードでは <em>#parent</em> の下に位置する <em>.children</em> と <em>.grand_children</em> が、 <em>#parent</em> の子孫要素です。</p>

<p>そしてある要素の直下にある要素を、その要素の「<strong>子要素</strong>」と言います。上のコードでは <em>#parent</em> 直下の <em>.children</em> が、<em>#parent</em> の子要素です。</p>

<p>子要素だけをセレクタで指定したい場合は、 <code>#parent &gt; div</code> のように <code>&gt;</code> を使います。これを「直下セレクタ」と言います。</p>

<p>下記のコードでは直下セレクタを使い、 <em>.children</em> に「子要素」というテキストを挿入しています。 <code>prepend()</code> は引数に渡した値を、セレクタに一致した要素の先頭に挿入するメソッドです。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent &gt; div</span><span class="delimiter">'</span></span>).prepend(<span class="string"><span class="delimiter">'</span><span class="content">子要素</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/foxerel/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>子孫セレクタ</h4>

<p>直下セレクタを使わず <code>#parent div</code> と指定すると、 <em>.children</em> だけでなく <em>.grand_children</em> も選択されます。このセレクタは「子孫セレクタ」と言います。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent div</span><span class="delimiter">'</span></span>).prepend(<span class="string"><span class="delimiter">'</span><span class="content">子孫要素</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/lipini/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 セレクタで、id属性とclass属性の値を指定する
</h3><p>「属性」というのは、要素の開始タグに付け加えられた情報のことです。詳しくはLesson2の<a href="html-css2#chapter-4-6">4.6 属性</a>などを確認してください。たとえば <code>&lt;p id="test"&gt;</code> という<br>
開始タグの場合、<code>id="test"</code> が属性です。属性はさらに、「属性名」と「属性値」に分けられます。 <code>id="test"</code> の場合、<code>id</code> が属性名で、<code>test</code> が属性値です。</p>

<p>CSSと同じく、jQueryでもセレクタにid属性の値（id名）を指定できます。下記のコードは、id属性の値が <code>pm</code> の要素だけテキストを <code>こんにちは！</code> に置き換えます。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">pm</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#pm</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/mirovek/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>セレクタに、class属性の値（class名）も指定できます。下記のコードでは、class属性の値が <code>pm</code> の要素すべてを操作します。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">pm</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">pm</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.pm</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/beyeweh/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 セレクタで、他の属性とその値を指定する
</h3><p>セレクタに指定できる属性は、id属性やclass属性だけではありません。そのほかの属性も指定できます。</p>

<p>下記のコードは、href属性の値が <code>pm.html</code> のDOM要素だけ、テキストを <code>こんにちは！</code> に置き換えます。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">am.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">am.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">pm.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">[href="pm.html"]</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/xemajok/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p><code>'[属性名="属性値"]'</code> という形でセレクタを指定することで、特定の属性と属性値を持った要素だけを選択できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-attribute-selector.png" alt=""></p>

<p>属性とともに、要素名を指定することもできます。この場合は、<code>'要素名[属性名="属性値"]'</code> という形でセレクタを指定します。たとえば上記のコードは、属性と属性値だけでなく要素名も指定して、以下のように書き換えられます。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">a[href="pm.html"]</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 セレクタに変数を使う
</h3><p><code>$(...)</code> の中にセレクタを直接書く代わりに、変数を使うこともできます。セレクタに指定する文字列を変数に代入して、その変数をセレクタに使うということです。</p>

<p>たとえば下記のコードは、セレクタで指定する要素名の文字列である <code>"p"</code> を、いったん <code>element</code> という名前の変数を用意して、そこに代入しています。このelement変数を、セレクタとして使っています。（※補足：変数名は何でもOKです。今回はわかりやすくするため「要素」の英訳である <code>element</code> としました。）</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const element = <span class="string"><span class="delimiter">'</span><span class="content">p</span><span class="delimiter">'</span></span>;
<span class="predefined">$</span>(element).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kiyorez/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>セレクタ全体ではなく、一部に変数を使うこともできます。</p>

<p>下記のコードでは、セレクタで指定するhref属性の値を変数に代入しています。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">pm.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const url = <span class="string"><span class="delimiter">'</span><span class="content">pm.html</span><span class="delimiter">'</span></span>;
<span class="predefined">$</span>(<span class="error">`</span>[href=<span class="string"><span class="delimiter">"</span><span class="content">${url}</span><span class="delimiter">"</span></span>]<span class="error">`</span>).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kubulip/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>url変数の値は <code>'pm.html'</code> という文字列です。そのため <code>[href="${url}"]</code> というテンプレート文字列は、実行時に下記の文字列になります。テンプレート文字列については、Lesson3の<a href="javascript#chapter-4-5">4.5 テンプレート文字列</a>をご確認ください。</p>

<pre><code>'[href="pm.html"]'
</code></pre>

<p>このことは、下記のように <code>console.log</code> を加えると確認できます。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const url = <span class="string"><span class="delimiter">'</span><span class="content">pm.html</span><span class="delimiter">'</span></span>;
<span class="predefined">$</span>(<span class="error">`</span>[href=<span class="string"><span class="delimiter">"</span><span class="content">${url}</span><span class="delimiter">"</span></span>]<span class="error">`</span>).text(<span class="string"><span class="delimiter">'</span><span class="content">こんにちは！</span><span class="delimiter">'</span></span>);

console.log(<span class="error">`</span>[href=<span class="string"><span class="delimiter">"</span><span class="content">${url}</span><span class="delimiter">"</span></span>]<span class="error">`</span>);
</pre></div>
</div>
</div>

<p>上記のように <code>console.log</code> を加えて、プレビュー表示してみます。するとデベロッパーツールのコンソールに、下記のように表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-console-1.png" alt="console.logでセレクタを確認する"></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-6">5.6 参考サイト
</h3><p>jQueryのセレクタは基本的に、CSSのセレクタと指定方法が同じです。ただし、jQuery独自のものもあります。jQuery独自のセレクタ一覧は下記を参照してください。<code>#id</code>や<code>.class</code>などの基本的なセレクタも一覧に載っています。リンクをクリックするとサンプルコードもあるので、確認しやすいでしょう。</p>

<ul>
  <li><a href="http://www.jquerystudy.info/reference/selectors/index.html" target="_blank">jQuery リファレンス：セレクタ目次</a></li>
</ul>

<p>英語でも問題ない方は、下記の公式ドキュメントを確認しましょう。jQueryに限らず多くのライブラリでは、公式ドキュメントが最も充実しています。また内容も正確です。</p>

<ul>
  <li><a href="https://api.jquery.com/category/selectors/" target="_blank">Selectors | jQuery API Documentation</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-5-7">5.7 DOM要素からjQueryオブジェクトを作る
</h3><p><code>document.getElementById()</code>で取得した要素（正確にはDOM要素）を<code>$( )</code>で囲うと、その要素を選択した状態のjQueryオブジェクトが取得でき、セレクタで指定した場合と同じように操作できます。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const box = document.getElementById(<span class="string"><span class="delimiter">'</span><span class="content">box</span><span class="delimiter">'</span></span>);
<span class="predefined">$</span>(box).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello World</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>処理前のHTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>処理後のHTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Hello World<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-8">5.8 CSSを変更する
</h3><p>CSSメソッドを使うと、CSSのプロパティを設定できます。下記のコードは、セレクタに一致したp要素の文字色を赤くします。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>重要な文章<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">p</span><span class="delimiter">'</span></span>).css(<span class="string"><span class="delimiter">'</span><span class="content">color</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">red</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/fanosox/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>CSSのプロパティを複数指定することもできます。複数のCSSプロパティを指定する場合は、cssメソッドの引数にオブジェクトを渡します。</p>

<p>下記のコードでは <code>id="box"</code> の要素を選択して、文字色を白（#ffffff）に、背景色を黒（#000000）に変えています。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>重要な文章<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).css({
  <span class="key"><span class="delimiter">'</span><span class="content">color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">#ffffff</span><span class="delimiter">'</span></span>,
  <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">#000000</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p>ハイフン付きのCSSプロパティは、<code>"..."</code>（ダブルクォーテーション）か <code>'...'</code>（シングルクォーテーション）で囲みます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/wurulun/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-9">5.9 選択対象を変更する
</h3><p>jQueryオブジェクトとして選択した要素から、その親や子へと選択対象を変えていくことができます。たとえば下記のコードを確認してみましょう。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">outer</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  親要素
  <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">inner</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    子要素
  <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#outer</span><span class="delimiter">'</span></span>)
  .children()
  .css({ <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">skyblue</span><span class="delimiter">'</span></span> });
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/wejelok/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードでは、まずセレクタで <code>id="outer"</code> の要素を選択しています。そして <code>children()</code> というメソッドを使うことで、 <code>id="inner"</code> の要素の <strong>子要素</strong> を選択肢します。最後にcssメソッドで、この子要素の背景色を変更しています。子要素はここでは <code>id="inner"</code> の要素です。</p>

<p><code>children()</code>は、セレクタに一致した要素の <strong>子要素</strong> すべてを選択するメソッドです。反対に、セレクタに一致した要素の <strong>親要素</strong> を選択するメソッドもあります。下記のコードを確認してみましょう。</p>

<p>HTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">outer</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  親要素
  <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">inner</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    子要素
  <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#inner</span><span class="delimiter">'</span></span>)
  .parent()
  .css({ <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">skyblue</span><span class="delimiter">'</span></span> });
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/wafaruq/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードでは、まずセレクタで <code>id="inner"</code> の要素を選択しています。そして <code>parent()</code> というメソッドを使うことで、 <code>id="inner"</code> の要素の <strong>親要素</strong> の背景色を変更しています。親要素はここでは <code>id="outer"</code> の要素です。</p>

<p>他にも下記のメソッドを使って、選択対象を変えることができます。</p>

<table>
  <thead>
    <tr>
      <th>コード</th>
      <th>選択される要素</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>$('#box').children()</code></td>
      <td>id=”box”直下の子要素</td>
    </tr>
    <tr>
      <td><code>$('#box').find('a')</code></td>
      <td>id=”box”の子を辿って見つかったすべてのa</td>
    </tr>
    <tr>
      <td><code>$('#box').closest('div')</code></td>
      <td>id=”box”の親を辿って最初に見つかったdiv</td>
    </tr>
    <tr>
      <td><code>$('#box').next()</code></td>
      <td>id=”box”と同じ階層にある次の要素</td>
    </tr>
    <tr>
      <td><code>$('#box').prev()</code></td>
      <td>id=”box”と同じ階層にある1つ前の要素</td>
    </tr>
    <tr>
      <td><code>$('#box').parent()</code></td>
      <td>id=”box”の直接の親要素</td>
    </tr>
    <tr>
      <td><code>$('#box').siblings('.item')</code></td>
      <td>id=”box”と同じ階層でitemクラスを持つすべての要素</td>
    </tr>
  </tbody>
</table>

<p>なお、 <code>.parent()</code> や <code>.children()</code> を何個もつなげると、どんどん親要素や子要素をたどっていくことができます。下記は <code>.parent()</code> を何個もつないだ例です。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/yecomop/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>このようにDOMをたどっていくことを <strong>DOMトラバーサル（DOM Traversing）</strong> と言います。DOMトラバーサルに使えるメソッド一覧は、下記リンクを参照してください。</p>

<ul>
  <li>
    <p><a href="http://www.jquerystudy.info/reference/traversing/index.html" target="_blank">jQuery リファレンス：Traversing目次</a></p>
  </li>
  <li>
    <p><a href="https://api.jquery.com/category/traversing/" target="_blank">Traversing | jQuery API Documentation</a></p>
  </li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-5-10">5.10 HTMLをセットする
</h3><p>htmlメソッドを使うと、セレクタに一致した要素の中にHTMLをセットできます。 <code>html()</code> の引数には、HTML文字列（HTMLの文字列）を渡します。このHTML文字列が、要素内のHTMLとしてセットされます。要素内に他のHTMLがある場合は、既存のHTMLを置き換えます。textメソッドはテキスト（文字列）だけですが、htmlメソッドはHTMLの要素もセットできます。</p>

<p>下記のコードでは、セレクタに一致したdiv要素内のテキストを、a要素で置き換えています。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div&gt;</span>置き換える前<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">div</span><span class="delimiter">'</span></span>).html(<span class="string"><span class="delimiter">'</span><span class="content">&lt;a href="test.html"&gt;置き換えた後&lt;/a&gt;</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/pufapip/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-11">5.11 要素を追加する
</h3><p>appendメソッドは、要素の最後にHTMLを追加します。具体的には<code>$("セレクタ").append(HTML)</code>で、セレクタに該当する要素の最後にHTMLが追加されます。<code>append()</code> の引数にはHTML文字列だけでなく、DOM要素やjQueryオブジェクトも渡せます。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).append(<span class="string"><span class="delimiter">'</span><span class="content">&lt;p&gt;こんばんは&lt;/p&gt;</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>処理前のHTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  こんにちは
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>処理後のHTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  こんにちは
  <span class="tag">&lt;p&gt;</span>こんばんは<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-12">5.12 要素を削除する
</h3><p>removeメソッドは、指定した要素を削除します。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>).remove();
</pre></div>
</div>
</div>

<p>要素をremove()で削除する前のHTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Box<span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>Box<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>要素をremove()で削除した後のHTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-13">5.13 フォームとのデータのやりとり
</h3><p><code>&lt;input&gt;</code> に入力された値を取得するには <code>val</code> メソッドを使います。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const value = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.myinput</span><span class="delimiter">'</span></span>).val();

console.log(value) <span class="comment">// input要素に入力された値を確認</span>
</pre></div>
</div>
</div>

<p>また、<code>val()</code> の引数に文字列や数値を渡すことで、フォームに値を入力することもできます。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-input</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const value = <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;

<span class="comment">// .my-outputに値をセット</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#my-input</span><span class="delimiter">'</span></span>).val(value);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/segukeh/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-14">5.14 属性値を取得、設定する
</h3><h4>属性値を取得する</h4>

<p>attrメソッドは、属性の値を取得します。<code>$('セレクタ').attr('属性名')</code> という書き方で、<code>attr()</code> の引数に指定した属性名の <strong>属性値を取得</strong> できます。</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">one.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ワン<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const value = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">a</span><span class="delimiter">'</span></span>).attr(<span class="string"><span class="delimiter">'</span><span class="content">href</span><span class="delimiter">'</span></span>); <span class="comment">// a要素から、href属性の属性値を取得する</span>
console.log(value); <span class="comment">// コンソールに「one.html」と表示される</span>
</pre></div>
</div>
</div>

<p>セレクタに一致する要素が複数ある場合、最初の要素から属性値を取得します。そのため下記のコードでも、取得する属性値は上記のコードと同じです。</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">one.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ワン<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">two.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ツー<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">three.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スリー<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const value = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">a</span><span class="delimiter">'</span></span>).attr(<span class="string"><span class="delimiter">'</span><span class="content">href</span><span class="delimiter">'</span></span>); <span class="comment">// 最初のa要素から、href属性の属性値を取得する</span>
console.log(value); <span class="comment">// コンソールに「one.html」と表示される</span>
</pre></div>
</div>
</div>

<p>href属性だけでなく、id属性やclass属性などの属性値も取得できます。</p>

<h4>属性値を設定する</h4>

<p><code>$('セレクタ').attr('属性名', '属性値')</code>で、第２引数に指定した <strong>属性値を設定</strong> できます。セレクタに一致する要素が複数ある場合、一致したすべての要素に対して属性値を設定します。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">a</span><span class="delimiter">'</span></span>).attr(<span class="string"><span class="delimiter">'</span><span class="content">href</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">new.html</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>属性値をattrメソッドで設定する前のHTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">one.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ワン<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">two.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ツー<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">three.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スリー<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>属性値をattrメソッドで設定した後のHTML:</p>

<div class="language-HTML highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">new.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ワン<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">new.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ツー<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">new.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スリー<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/biqupox/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>href属性だけでなく、id属性やclass属性などの属性値も設定できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-15">5.15 エラーとデバッグ
</h3><h4>エラーメッセージを確認する</h4>

<p>Cloud9に新しくHTMLファイルとJSファイルを作成して、それぞれのファイルに下記を入力してください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;input</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">test</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">'</span><span class="content">text</span><span class="delimiter">'</span></span><span class="tag">&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const value = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#test</span><span class="delimiter">'</span></span>).wal();
</pre></div>
</div>
</div>

<p>上記のファイルが作成できたら、Cloud9の別タブでプレビュー表示をしてみてください。するとデベロッパーツールのコンソールに、下記のエラーが表示されるはずです。実際に確認してみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-console-3.png" alt="consoleでエラーメッセージを確認する"></p>

<p>エラーメッセージの <code>$(...).wal is not a function</code> を日本語にすると、「$(…).walは関数ではない」と訳せます。エラーの原因は、jQueryのメソッドである <code>val()</code> を、<code>wal()</code> とタイプミスしたことです。エラーメッセージ文末の <code>at main.js:1</code> は、エラーが起きた場所を示しています。この例では、main.jsファイルの1行目でエラーが起きたことを表しています。</p>

<h4>プロパティとメソッドを利用する</h4>

<p>jQueryが読み込まれているページでは、jQueryのメソッドなどをコンソールでも入力・実行できます。</p>

<p>別のHTMLファイルを作成して、下記のコードを入力してください。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">am</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">am</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おはよう<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">pm</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>こんにちは<span class="tag">&lt;/p&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>このHTMLファイルを、Cloud9の別タブでプレビュー表示します。別タブでプレビュー表示ができたら、デベロッパーツールのコンソールを開いてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-console-4.png" alt="consoleの表示例"></p>

<p>上記のようにコンソールを開けたら、コンソールに下記を入力してください。<code>length</code>は、jQueryオブジェクトのプロパティです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.am</span><span class="delimiter">'</span></span>).length;
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-console-9.png" alt="consoleの表示例"></p>

<p><code>2</code>と言う数値が表示されます。この数値は、セレクタに一致した要素の数を表しています。class属性の値（class名）が <code>am</code> である要素は２つあるので、<code>2</code> と表示されています。このlengthプロパティを使うことで、セレクタによってDOM要素が選択できているかを簡単に確認できます。</p>

<p>コンソールで、jQueryのメソッドを使うこともできます。下記のコードは、id属性の値（id名）が<code>pm</code> の要素で、文字色を赤に変更しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#pm</span><span class="delimiter">'</span></span>).css(<span class="string"><span class="delimiter">'</span><span class="content">color</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">Red</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/4-console-10.png" alt="consoleの表示例"></p>
</div></section><section id="chapter-6"><h2 class="index">6. イベント
</h2><div class="subsection"><p>Lesson3の<a href="javascript#chapter-6-5">6.5 イベント</a>では、addEventListenerメソッドについて学習しました。addEventListenerメソッドは、DOM要素から利用できるメソッドです。</p>

<p>jQueryでもイベントが発生したときに、あらかじめ設定した関数を呼び出せます。そのためには、jQueryオブジェクトから利用できるonメソッドを使います。</p>

<p>onメソッドは、下記のように書きます。</p>

<p><code>jQueryオブジェクト.on(イベントの種類, イベントが発生したときに呼び出される関数)</code></p>

<p>jQueryでは、「イベントが発生したときに呼び出される関数」は「イベントハンドラ」と言うのが一般的です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 マウスクリックで処理を実行
</h3><p><code>&lt;a&gt;</code> のリンクや <code>&lt;div&gt;</code> などがクリックされたときに、特定の処理が実行されるようにします。そのためには、下記のように書きます。下記のコードでは、onメソッドの第１引数にイベントの種類として <code>'click'</code> という文字列を渡しています。そして第２引数に、イベントハンドラとして関数（ここではアロー関数）を渡しています。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mylink</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">./page2.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ページ2<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.mylink</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// hrefのリンク先に飛ばないようにする</span>
  e.preventDefault();

  alert(<span class="string"><span class="delimiter">'</span><span class="content">どろん！</span><span class="delimiter">'</span></span>);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jevavuv/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>Lesson3で学習したaddEventListenerメソッドのイベントリスナーには、呼び出されるときイベントオブジェクトが渡されます。同じくonメソッドのイベントハンドラにも、呼び出されるときイベントオブジェクトが渡されます。clickイベントが発生したときにページ遷移しないように、イベントオブジェクトのメソッドである <code>preventDefault</code> を呼び出しています。</p>

<h4>クリックされた要素を取得する</h4>

<p>下記のHTMLには、ボタンが2つあります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;style&gt;</span>
<span class="inline">      <span class="class">.parent</span> {
        <span class="key">height</span>: <span class="float">100px</span>;
      }</span>
    <span class="tag">&lt;/style&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">parent</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ボタン<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">parent</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ボタン<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>この２つあるbutton要素のうち、押されたbutton要素だけ、その親のdivの背景色を変えたいとします。その場合、下記のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// .my-buttonがクリックされた時にここが実行される</span>
  <span class="predefined">$</span>(e.target)
    .parent()
    .css({ <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">#ff6666</span><span class="delimiter">'</span></span> });
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/mikixet/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p><code>e.target</code> は、イベントオブジェクトの <code>target</code> というプロパティを表しています。このtargetプロパティから、イベントの発生元である要素にアクセスできます。ここでは <strong>クリックしたbutton要素</strong> のことです。</p>

<p>そして <code>$(e.target).parent()</code> で、クリックされたbutton要素の親要素を選択しています。jQueryのparentメソッドを使うことで、セレクタに一致した要素の親要素を選択できます。ここではクリックしたbutton要素の親である、parentクラスを持つdiv要素のことです。</p>

<p>上記のコードではmy-buttonクラスを持つ２つの要素に対して、クリックイベントを一度に設定しています。しかしイベントオブジェクトのtargetプロパティ( <code>e.target</code> ) により、<strong>クリックされた要素</strong> に応じた処理ができます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 マウスオーバーに反応する
</h3><p>要素にマウスが乗ると、mouseenterイベントが発生します。そして要素からマウスが出ると、mouseleaveイベントが発生します。</p>

<p>下記のコードでは、mouseenter・mouseleaveの2つのイベントに対して、それぞれイベントハンドラを登録しています。なおコードを読みやすくするため、イベントハンドラは変数に代入しています。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>CSS:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.box</span> {
  <span class="key">width</span>: <span class="float">200px</span>;
  <span class="key">height</span>: <span class="float">200px</span>;
  <span class="key">background-color</span>: <span class="color">#ddd</span>;
}
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const onMouseenter = (e) =&gt; {
  <span class="comment">// マウスが乗った時の処理</span>
  <span class="predefined">$</span>(e.target).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">#ff9999</span><span class="delimiter">'</span></span>,
  });
};
const onMouseleave = (e) =&gt; {
  <span class="comment">// マウスが外れた時の処理</span>
  <span class="predefined">$</span>(e.target).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">#dddddd</span><span class="delimiter">'</span></span>,
  });
};

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>)
  .on(<span class="string"><span class="delimiter">'</span><span class="content">mouseenter</span><span class="delimiter">'</span></span>, onMouseenter)
  .on(<span class="string"><span class="delimiter">'</span><span class="content">mouseleave</span><span class="delimiter">'</span></span>, onMouseleave);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/sijower/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 キーボードの入力に反応させる
</h3><p>inputイベントは、input要素やtextarea要素へ入力するたびに発生します。inputイベントにイベントハンドラを登録することで、文字が入力されるたびに処理を実行できます。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-input</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-input</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">input</span><span class="delimiter">'</span></span>, (e) =&gt; {
  const value = <span class="predefined">$</span>(e.target).val();
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>).text(value);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/tocopoy/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 フォームの送信前にエラーチェックする
</h3><p>submitイベントはフォーム送信をしたとき、ページ遷移する前に発生します。下記のコードでは、入力値のエラーチェックをしています。エラーがあれば、イベントオブジェクトからpreventDefaultメソッドを呼び出して、ページ遷移を止めています。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-form</span><span class="delimiter">"</span></span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">post</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  同じテキストを入力してください。
  <span class="tag">&lt;p&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">text1</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">text2</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p&gt;</span>
    <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">送信</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">error</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p>CSS:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.error</span> {
  <span class="key">color</span>: <span class="color">#f00</span>;
}
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// フォームが送信された時に実行される</span>
  const text1 = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.text1</span><span class="delimiter">'</span></span>).val();
  const text2 = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.text2</span><span class="delimiter">'</span></span>).val();

  <span class="keyword">if</span> (text1 !== text2) {
    <span class="comment">// ページ遷移を止める</span>
    e.preventDefault();

    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.error</span><span class="delimiter">'</span></span>).html(<span class="string"><span class="delimiter">'</span><span class="content">テキストが一致しません</span><span class="delimiter">'</span></span>);
  }
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/fujoxix/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 後から追加した要素に、イベントハンドラを登録する
</h3><p>イベントハンドラは基本的に、すでに存在する要素にだけ登録できます。後から追加した要素にイベントハンドラを登録することは、これまで学習した方法ではできません。</p>

<p>具体例として、下記のコードを確認してみましょう。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">parent</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">child</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>もともとの要素<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.child</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">.childのイベントハンドラ</span><span class="delimiter">'</span></span>);
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent</span><span class="delimiter">'</span></span>).append(<span class="string"><span class="delimiter">'</span><span class="content">&lt;p class="child"&gt;追加した要素&lt;/p&gt;</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/popamaf/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>まずonメソッドで、class属性の値（class名）が <code>child</code> の要素にイベントハンドラを登録しています。次にappendメソッドで、class属性の値が <code>child</code> の要素を新たに追加しています。</p>

<p>Cloud9でプレビュー表示すると、ブラウザに下記のように表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-event-handler-4.png" alt="ブラウザの表示を確認する"></p>

<p>ブラウザに表示された「もともとの要素」という部分をクリックすると、コンソールに「.childのイベントハンドラ」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-event-handler-5.png" alt="コンソールの表示を確認する"></p>

<p>しかし「追加した要素」という部分をクリックしても、ブラウザには何も表示されません。なぜなら <code>&lt;p class="child"&gt;追加した要素&lt;/p&gt;</code> は、<strong>イベントハンドラを登録した後に追加した要素だから</strong> です。</p>

<p>後から追加した要素にイベントハンドラを登録するには、主に２つの方法があります。</p>

<p>まず１つ目は、親要素にイベントハンドラを登録する方法です。jQueryで親要素にイベントハンドラを登録するときも、onメソッドを使います。この場合 <code>on()</code> の第１引数にイベント名、第２引数にイベント発生元を指定するセレクタ、第３引数にイベントハンドラを渡します。</p>

<p>たとえば下記のように、先ほどのjQueryのコードを変更します。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">.child</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">.childのイベントハンドラ</span><span class="delimiter">'</span></span>);
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent</span><span class="delimiter">'</span></span>).append(<span class="string"><span class="delimiter">'</span><span class="content">&lt;p class="child"&gt;追加した要素&lt;/p&gt;</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/foxipij/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>すると「追加した要素」という部分をクリックしても、コンソールに「.childのイベントハンドラ」と表示されるようになります。</p>

<p>このコードでは、イベントのバブリングフェーズを利用しています。class属性の値が<code>child</code>の要素（<em>.child</em>）で発生したクリックイベントは、まず直近の親要素であるdiv要素（<em>#parent</em>）に伝わります。この <em>#parent</em> に伝わってきた <em>.child</em> のクリックイベントに対して、イベントハンドラを登録しています。バブリングフェーズについて詳しくは、Lesson3の<a href="javascript#chapter-6-5">6.5 イベント</a>で解説しています。</p>

<p>親要素にイベントハンドラを登録する場合、直近の親要素でなくとも構いません。</p>

<p>たとえば、下記のように書き換えても動作します。<code>document</code>は、ページ全体を表す大元のオブジェクトです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(document).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">.child</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">.childのイベントハンドラ</span><span class="delimiter">'</span></span>);
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent</span><span class="delimiter">'</span></span>).append(<span class="string"><span class="delimiter">'</span><span class="content">&lt;p class="child"&gt;追加した要素&lt;/p&gt;</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>次に、後から追加した要素にイベントハンドラを登録する２つ目の方法です。</p>

<p>それは、後から追加する要素にもイベントハンドラを登録する方法です。ただしイベントハンドラを登録するには、後から追加する要素をDOM要素として生成する必要があります。jQueryでDOM要素を生成するには、<code>$('作成する要素のタグ', {要素に設定する属性名: '属性値'})</code> という形で指定します。要素内のテキストについても、属性と同じように指定できます。</p>

<p>下記のコードでは、class属性の値が <code>child</code> のp要素を生成しています。そしてこのp要素に、イベントハンドラを登録しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// もともとの要素にイベントハンドラを登録する</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.child</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">.childのイベントハンドラ</span><span class="delimiter">'</span></span>);
});

<span class="comment">// DOM要素を生成する</span>
const <span class="predefined">$newElement</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">&lt;p&gt;</span><span class="delimiter">'</span></span>, {
  <span class="reserved">class</span>: <span class="string"><span class="delimiter">'</span><span class="content">child</span><span class="delimiter">'</span></span>,
  <span class="key">text</span>: <span class="string"><span class="delimiter">'</span><span class="content">追加した要素</span><span class="delimiter">'</span></span>,
});

<span class="comment">// 生成したDOM要素にイベントハンドラを登録する</span>
<span class="predefined">$newElement</span>.on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">追加した.childのイベントハンドラ</span><span class="delimiter">'</span></span>);
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#parent</span><span class="delimiter">'</span></span>).append(<span class="predefined">$newElement</span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/verereb/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>「追加した要素」という部分をクリックすると、コンソールに「追加した.childのイベントハンドラ」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-event-handler-6.png" alt="コンソールの表示を確認する"></p>

<div class="alert alert-info">
jQueryで生成したDOM要素は、正確に言えばDOM要素ではありません。jQueryオブジェクトに変換されたDOM要素です。DOM要素をjQueryオブジェクトに変換することで、jQueryのメソッドなどが使えます。上のコードでは、生成したjQueryオブジェクトから、jQueryのメソッドである<code>on()</code>を使っています。<br>またjQueryオブジェクトを変数に代入した場合、変数名の先頭に「$」（ダラー）記号をつけることが多いです。jQueryオブジェクトであることを分かりやすくするためです。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-6">6.6 イベントハンドラにデータを渡す
</h3><p>イベントハンドラに渡されるイベントオブジェクトには、任意のデータを追加できます。そのためにはonメソッドの第２引数に、追加したいデータをオブジェクトとして渡します。</p>

<p>具体例を確認してみましょう。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-click</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>クリックしてください<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-click</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, { <span class="key">test</span>: <span class="string"><span class="delimiter">'</span><span class="content">テストデータ</span><span class="delimiter">'</span></span> }, (e) =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">追加したデータ：</span><span class="delimiter">'</span></span>, e.data.test);
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/seramam/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードでは、第１引数で指定したクリックイベントが発生したときに、第３引数のイベントハンドラが呼び出されます。このイベントハンドラの引数として渡されるイベントオブジェクトに、第２引数に渡したデータが追加されます。このデータは、イベントオブジェクトの <code>data</code> プロパティから取得できます。そのためdiv要素をクリックすると、コンソールに「追加したデータ： テストデータ」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/jquery/6-console-1.png" alt=""></p>
</div></section><section id="chapter-7"><h2 class="index">7. 要素の表示／非表示
</h2><div class="subsection"><p>要素を非表示にしたいときは、hideメソッドを使います。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>テキスト<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// boxクラスの要素をすべて非表示にする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>).hide();
</pre></div>
</div>
</div>

<p>非表示にした要素を表示するには、showメソッドを使います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// boxクラスの要素をすべて表示する</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>).show();
</pre></div>
</div>
</div>

<p>表示、非表示を切り替えたいだけのときは、toggleメソッドが使えます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>表示切り替え<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>テキスト<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>).toggle();
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/soguwe/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div></section><section id="chapter-8"><h2 class="index">8. アニメーション
</h2><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 フェードインとフェードアウト
</h3><p>fadeInメソッドは非表示の状態から、ゆっくり表示します。<br>
fadeOutメソッドは表示した状態から、ゆっくり非表示にします。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button-in</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>フェードイン<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button-out</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>フェードアウト<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>CSS:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.box</span> {
  <span class="key">display</span>: <span class="value">none</span>;
  <span class="key">width</span>: <span class="float">60px</span>;
  <span class="key">height</span>: <span class="float">60px</span>;
  <span class="key">background-color</span>: <span class="color">#666</span>;
}
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="predefined">$box</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>);

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button-in</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$box</span>.fadeIn();
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button-out</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$box</span>.fadeOut();
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/nawofok/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードで <code>$('.box')</code> をいったん変数に代入しているのは、３つの意味があります。</p>

<p>１つめは、コードを分かりやすくするためです。 変数へ入れず、直接コードに書くと、このjQueryオブジェクト（<code>$('.box')</code>）が複数の場所で使われていることなどが分かりづらくなります。とくにコードの行数が長いときは、分かりやすく書くことが大切になります。</p>

<p>２つめは、修正しやすくするためです。上記のように同じjQueryオブジェクトを複数の場所で使っている場合、変数に代入しておくことで修正箇所を１つにできます。たとえば上記のコードで、セレクタの指定を <code>'.box'</code> から <code>'.box-new'</code> に変更したいとします。この場合、変数に代入する値を <code>const $box = $('.box-new');</code> に書き換えるだけで済みます。</p>

<p>３つめは、パフォーマンスの向上です。jQueryオブジェクトを作成するには、まずセレクタに一致する要素を探さないといけません。またjQueryオブジェクトの作成自体にも、少しコスト（CPUなどへの負荷）がかかります。そのため何度も同じjQueryオブジェクトを使う場合、変数に代入しておくことで処理負担の軽減になります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 スライドしながら表示／非表示
</h3><p>slideDownメソッドは、非表示状態の要素をスライドしながら表示します。<br>
slideUpメソッドは、表示状態の要素をスライドしながら非表示にします。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button-in</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライドダウン<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button-out</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライドアップ<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>CSS:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.box</span> {
  <span class="key">display</span>: <span class="value">none</span>;
  <span class="key">width</span>: <span class="float">200px</span>;
  <span class="key">height</span>: <span class="float">200px</span>;
  <span class="key">background-color</span>: <span class="color">#666</span>;
}
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="predefined">$box</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>);

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button-in</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$box</span>.slideDown();
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button-out</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$box</span>.slideUp();
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/zedetej/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 アニメーションのカスタマイズ
</h3><p>animateメソッドを使うと、CSSのプロパティを指定して自由度の高いアニメーションができます。</p>

<p>先ほど<a href="jquery#chapter-5-8">5.8 CSSを変更する</a>で、CSSメソッドを学習しましたね。複数のCSSプロパティを指定する場合は、cssメソッドの引数にオブジェクトを渡すのでした。</p>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).css({
  <span class="key">color</span>: <span class="string"><span class="delimiter">'</span><span class="content">#ffffff</span><span class="delimiter">'</span></span>,
  <span class="key"><span class="delimiter">'</span><span class="content">background-color</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">#000000</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p>cssメソッドと同じように、animateメソッドの第１引数にもCSSプロパティをオブジェクトとして渡します。そして第２引数には、アニメーションする時間を渡します。時間はミリ秒単位で指定します。</p>

<p>つまり、下記のように引数を渡します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">セレクタ</span><span class="delimiter">'</span></span>).animate(<span class="string"><span class="delimiter">'</span><span class="content">CSSプロパティのオブジェクト</span><span class="delimiter">'</span></span>, <span class="error">ア</span><span class="error">ニ</span><span class="error">メ</span><span class="error">ー</span><span class="error">シ</span><span class="error">ョ</span><span class="error">ン</span><span class="error">す</span><span class="error">る</span><span class="error">時</span><span class="error">間</span>)
</pre></div>
</div>
</div>

<p>第２引数で指定した時間をかけて、第１引数に指定したCSSプロパティの値へとスタイルを変化させます。</p>

<p>下記のコードでは、CSSのwidthプロパティで要素の幅を、leftプロパティで横方向の位置を変化させています。第２引数に渡している数値は <code>1000</code> なので、1000ミリ秒（1秒）かけて変化します。</p>

<p>HTML:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button-anim</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>アニメーション<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button-re</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>元に戻す<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>CSS:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.box</span> {
  <span class="key">position</span>: <span class="value">relative</span>;
  <span class="key">top</span>: <span class="float">0</span>;
  <span class="key">left</span>: <span class="float">0</span>;
  <span class="key">width</span>: <span class="float">60px</span>;
  <span class="key">height</span>: <span class="float">60px</span>;
  <span class="key">background-color</span>: <span class="color">#f66</span>;
}
</pre></div>
</div>
</div>

<p>JavaScript:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const <span class="predefined">$box</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>);
const duration = <span class="integer">1000</span>;

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button-anim</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$box</span>.animate(
    {
      <span class="key">width</span>: <span class="string"><span class="delimiter">'</span><span class="content">200px</span><span class="delimiter">'</span></span>,
      <span class="key">left</span>: <span class="string"><span class="delimiter">'</span><span class="content">200px</span><span class="delimiter">'</span></span>,
    },
    duration,
  );
});

<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.my-button-re</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="predefined">$box</span>.animate(
    {
      <span class="key">width</span>: <span class="string"><span class="delimiter">'</span><span class="content">60px</span><span class="delimiter">'</span></span>,
      <span class="key">left</span>: <span class="string"><span class="delimiter">'</span><span class="content">0px</span><span class="delimiter">'</span></span>,
    },
    duration,
  );
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/yurigiv/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div></section><section id="chapter-9"><h2 class="index">9. あの部品はどうやってできてるの？
</h2><div class="subsection"><p><strong>サンプル画像のダウンロード</strong></p>

<p>これ以降のサンプルコードでは一部画像を使用します。下記のリンクからダウンロードして、必要に応じてCloud9にアップロードしてください。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-assets.zip">サンプルコード用の画像セット</a></p>

<p><strong>壊して学ぼう</strong></p>

<p>このチャプターで学ぶ部品には、少し難しいコードも出てきます。そのため現役のプログラマでも、コードを読んだだけではよく分からない場合があります。</p>

<p>コードを読んだだけでは分からない場合、まずデベロッパーツールを使いましょう。たとえば、「JavaScriptのコードで<code>xxx</code>という変数が使われているけど、この変数が何のためにあるのか分からない」ということがあります。この場合はJSファイルに <code>console.log(xxx)</code> などと追記して、コンソールに表示される変数の値を確認してみましょう。</p>

<p>また、少しずつ壊してみるのもおすすめです。たとえば、「jQueryの<code>xxx</code>というメソッドの引数に <code>xxx</code> という値が指定されているけど、この値が何を意味しているのか分からない」ということがあります。この場合は、引数の値を変えてみたり、コードをコメントアウト（無効に）してみましょう。</p>

<p>CSSについても、JavaScriptのコードと同様です。たとえば、「CSSで<code>xxx</code>というプロパティに <code>xxx</code> という値が指定されているけど、これが何のためにあるのか分からない」ということがあります。この場合は、プロパティの値を大きく変えてみたり、コードをコメントアウトしてみましょう。</p>

<p>CSSの確認や変更は、デベロッパーツールのElementsタブを使うと手軽にできます。使い方は、Lesson2の<a href="html-css2#chapter-11">11. デベロッパーツール</a>をご確認ください。また、下記のサイトも参考にしてみてください。</p>

<ul>
  <li><a href="http://ascii.jp/elem/000/000/997/997889/">CSSの修正が捗る「リアルタイムコーディング」とは</a></li>
  <li><a href="https://www.webcreatorbox.com/webinfo/devtools-basic">新米Webデザイナーがこれだけは抑えておきたいデベロッパーツールの使い方</a></li>
</ul>

<p>コードの一部を変更したり無効にしたりすると、表示が崩れたり、動きがおかしくなる場合はあります。このような不具合や変化が起きたら、手がかりを得るチャンスです！どのような不具合や変化が起きたかを確認することで、そのコードが何をしているのか大きなヒントが得られます。</p>

<p>恐れずに壊して、その壊れ方をチェックしてみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 ページトップへ戻るボタン
</h3><p>ページを途中までスクロールすると出てくる、あのボタンです。押すとページトップまで一気に戻ります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-back_to_top.gif" alt=""></p>

<p>まずはボタンをHTMLで用意します。</p>

<p><em>index.html</em>:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">contents</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      ・・・（長い文章）・・・
    <span class="tag">&lt;/div&gt;</span>

    <span class="comment">&lt;!-- トップに戻るボタン --&gt;</span>
    <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">back-to-top</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>▲<span class="tag">&lt;/a&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>CSSでボタンの見た目を整えましょう。</p>

<p><em>main.css</em>:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* 長いコンテンツを作成 */</span>
<span class="id">#contents</span> {
  <span class="key">height</span>: <span class="float">2000px</span>;
  <span class="key">background</span>: <span class="error">l</span><span class="error">i</span><span class="error">n</span><span class="error">e</span><span class="error">a</span><span class="error">r</span><span class="error">-</span><span class="error">g</span><span class="error">r</span><span class="error">a</span><span class="error">d</span><span class="error">i</span><span class="error">e</span><span class="error">n</span><span class="error">t</span>(<span class="value">gray</span>, <span class="value">white</span>);
}

<span class="comment">/* トップに戻るボタン */</span>
<span class="class">.back-to-top</span> {
  <span class="key">position</span>: <span class="value">fixed</span>;
  <span class="key">bottom</span>: <span class="float">20px</span>;
  <span class="key">right</span>: <span class="float">20px</span>;

  <span class="key">display</span>: <span class="value">none</span>;
  <span class="key">width</span>: <span class="float">40px</span>;
  <span class="key">height</span>: <span class="float">40px</span>;

  <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
  <span class="key">color</span>: <span class="color">#333</span>;
  <span class="key">opacity</span>: <span class="float">0.6</span>;

  <span class="comment">/* 透明度をふわっと変える演出 */</span>
  <span class="key">transition</span>: <span class="value">opacity</span> <span class="float">2.5s</span>;

  <span class="key">font-size</span>: <span class="float">1.6</span><span class="value">rem</span>;
  <span class="key">line-height</span>: <span class="float">40px</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;
  <span class="key">text-decoration</span>: <span class="value">none</span>;
}

<span class="comment">/* マウスを乗せた時に透明度を変える */</span>
<span class="class">.back-to-top</span><span class="pseudo-class">:hover</span> {
  <span class="key">opacity</span>: <span class="float">1</span>;
}
</pre></div>
</div>
</div>

<p>最後にJavaScriptです。大きく分けて2つのことをしています。</p>

<ul>
  <li>スクロールの変化を監視して、一定以上スクロールされたらボタンを表示</li>
  <li>ボタンがクリックされたら、アニメーションしながらページトップに戻る</li>
</ul>

<p>scrollTop()は、ページのスクロール位置を取得するメソッドです。メソッドの引数に数値を渡すと、スクロール位置を設定することもできます。</p>

<p><em>main.js</em>:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ボタンの表示／非表示を切り替える関数</span>
const updateButton = () =&gt; {
  <span class="keyword">if</span> (<span class="predefined">$</span>(window).scrollTop() &gt;= <span class="integer">300</span>) {
    <span class="comment">// 300px以上スクロールされた</span>
    <span class="comment">// ボタンを表示</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.back-to-top</span><span class="delimiter">'</span></span>).fadeIn();
  } <span class="keyword">else</span> {
    <span class="comment">// ボタンを非表示</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.back-to-top</span><span class="delimiter">'</span></span>).fadeOut();
  }
};

<span class="comment">// スクロールされる度にupdateButtonを実行</span>
<span class="predefined">$</span>(window).on(<span class="string"><span class="delimiter">'</span><span class="content">scroll</span><span class="delimiter">'</span></span>, updateButton);

<span class="comment">// ボタンをクリックしたらページトップにスクロールする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.back-to-top</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// ボタンのhrefに遷移しない</span>
  e.preventDefault();

  <span class="comment">// 600ミリ秒かけてトップに戻る</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">html, body</span><span class="delimiter">'</span></span>).animate({ <span class="key">scrollTop</span>: <span class="integer">0</span> }, <span class="integer">600</span>);
});

<span class="comment">// ページの途中でリロード（再読み込み）された場合でも、ボタンが表示されるようにする</span>
updateButton();
</pre></div>
</div>
</div>

<h4>特定の要素までスクロールする</h4>

<p>ページトップではなく、例えば<code>id="contents"</code>の要素までスクロールしたい場合は下記のようにします。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 600ミリ秒かけてid="contents"までスクロールする</span>
const contentsTop = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#contents</span><span class="delimiter">'</span></span>).offset().top;
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">html, body</span><span class="delimiter">'</span></span>).animate({ <span class="key">scrollTop</span>: contentsTop }, <span class="integer">600</span>);
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 タブ
</h3><p>続いて、Chromeのタブのようにコンテンツを切り替えて表示する方法を紹介します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-tab.gif" alt=""></p>

<p>まずはHTMLで基本構造を作ります。</p>

<p><em>index.html</em>:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;ul</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#tabs-1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タブ1<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
      <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#tabs-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タブ2<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
      <span class="tag">&lt;li&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#tabs-3</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タブ3<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;/ul&gt;</span>
    <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;p&gt;</span>タブ1の内容が入ります。<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;/section&gt;</span>
      <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;p&gt;</span>タブ2の内容が入ります。<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;/section&gt;</span>
      <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-3</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;p&gt;</span>タブ3の内容が入ります。<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;/section&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>CSSで見た目を整えます。非選択のタブにマウスを乗せたら色を変えるために、<code>.tabs-menu li:not(.active):hover</code> というセレクタを記述しています。このセレクタは、<code>:not()</code> の使い方がポイントになります。<code>:not(セレクタ)</code> と書くと、()内へ書いたセレクタに<strong>一致しない要素</strong>を選択します。ここでは <code>:not(.active)</code> とありますので、 activeクラスを持たない要素を選択しています。</p>

<p>つまり、<code>.tabs-menu li:not(.active):hover</code> は、<code>.tabs-menu</code> の中にある <code>li</code> で <code>.active</code> を保持していない要素にマウスを乗せたら・・・というコードになります。この<br>
activeクラスは、main.jsで追加や削除をします。</p>

<p><em>main.css</em>:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">body</span> {
  <span class="key">color</span>: <span class="color">#3F4548</span>;
}

  <span class="comment">/* ulのデフォルトスタイルを消去 */</span>
<span class="class">.tabs-menu</span> {
  <span class="key">margin</span>: <span class="float">0</span>;
  <span class="key">padding</span>: <span class="float">0</span>;
  <span class="key">list-style-type</span>: <span class="value">none</span>;
}

<span class="comment">/* タブの基本スタイル */</span>
<span class="class">.tabs-menu</span> <span class="tag">li</span> {
  <span class="key">float</span>: <span class="value">left</span>;
  <span class="key">margin-right</span>: <span class="float">8px</span>;
  <span class="key">margin-bottom</span>: <span class="float">-1px</span>;
  <span class="key">border-style</span>: <span class="value">solid</span>;
  <span class="key">border-width</span>: <span class="float">1px</span>;
  <span class="key">border-color</span>: <span class="value">transparent</span>;
  <span class="key">border-radius</span>: <span class="float">4px</span> <span class="float">4px</span> <span class="float">0</span> <span class="float">0</span>;

  <span class="comment">/* 各プロパティをふわっと変える演出 */</span>
  <span class="key">transition</span>: <span class="value">all</span> <span class="float">.15s</span>;
}
<span class="class">.tabs-menu</span> <span class="tag">a</span> {
  <span class="key">display</span>: <span class="value">block</span>;
  <span class="key">padding</span>: <span class="float">10px</span> <span class="float">20px</span>;
  <span class="key">color</span>: <span class="color">#557F95</span>;
  <span class="key">text-decoration</span>: <span class="value">none</span>;
}

<span class="comment">/* 非選択のタブにマウスを乗せたら色を変える */</span>
<span class="class">.tabs-menu</span> <span class="tag">li</span><span class="pseudo-class">:not</span>(<span class="class">.active</span>)<span class="pseudo-class">:hover</span> {
  <span class="key">border-color</span>: <span class="color">#f0f0f0</span> <span class="color">#f0f0f0</span> <span class="color">#999</span>;
  <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
}

<span class="comment">/* 選択中のタブ */</span>
<span class="class">.tabs-menu</span> <span class="class">.active</span> {
  <span class="key">border-color</span>: <span class="color">#999</span> <span class="color">#999</span> <span class="value">transparent</span> <span class="color">#999</span>;
  <span class="key">background-color</span>: <span class="color">#fff</span>;
}
<span class="class">.tabs-menu</span> <span class="class">.active</span> <span class="tag">a</span> {
  <span class="key">color</span>: <span class="color">#3F4548</span>;
}

<span class="comment">/* タブコンテンツ表示エリア */</span>
<span class="class">.tabs-content</span> {
  <span class="key">clear</span>: <span class="value">both</span>;
  <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#999</span>;
  <span class="key">border-radius</span>: <span class="float">0</span> <span class="float">4px</span> <span class="float">4px</span> <span class="float">4px</span>;
  <span class="key">padding</span>: <span class="float">10px</span>;
}

<span class="comment">/* 各タブのコンテンツはデフォルトで非表示 */</span>
<span class="class">.tabs-content</span> <span class="tag">section</span> {
  <span class="key">display</span>: <span class="value">none</span>;
}
</pre></div>
</div>
</div>

<p>最後にJavaScriptです。まず<code>#tabs-1</code>のようなCSSセレクタを受け取ってその要素を表示するshowTab()という共通関数を作ります。showTab()関数では、セレクタで指定された要素にだけ特別なスタイルを与えます。そして、ページロード時とタブのクリック時にshowTab()が呼び出されるようにします。</p>

<p><em>main.js</em>:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/**
 * selectorに該当するタブを表示する
 */</span>
const showTab = (selector) =&gt; {
  <span class="comment">// 引数selectorの中身をコンソールで確認する</span>
  console.log(selector);

  <span class="comment">// いったん（ひとまず）、すべての.tabs-menu liからactiveクラスを削除する</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.tabs-menu li</span><span class="delimiter">'</span></span>).removeClass(<span class="string"><span class="delimiter">'</span><span class="content">active</span><span class="delimiter">'</span></span>);
  <span class="comment">// .tabs-menu liのうち、selectorに該当するものにだけactiveクラスを付ける</span>
  <span class="predefined">$</span>(<span class="error">`</span>.tabs-menu a[href=<span class="string"><span class="delimiter">"</span><span class="content">${selector}</span><span class="delimiter">"</span></span>]<span class="error">`</span>)
    .parent(<span class="string"><span class="delimiter">'</span><span class="content">li</span><span class="delimiter">'</span></span>)
    .addClass(<span class="string"><span class="delimiter">'</span><span class="content">active</span><span class="delimiter">'</span></span>);

  <span class="comment">// いったん、すべての.tabs-content &gt; sectionを非表示にする</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.tabs-content &gt; section</span><span class="delimiter">'</span></span>).hide();
  <span class="comment">// .tabs-content &gt; sectionのうち、selectorに該当するものだけを表示する</span>
  <span class="predefined">$</span>(selector).show();
};

<span class="comment">// タブがクリックされたらコンテンツを表示</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.tabs-menu a</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// hrefへのページ遷移とを止める</span>
  e.preventDefault();

  <span class="comment">// hrefの値を受け取ってshowTab()関数に渡す。e.targetはクリックされたタブ（.tabs-menu a）を表す</span>
  const selector = <span class="predefined">$</span>(e.target).attr(<span class="string"><span class="delimiter">'</span><span class="content">href</span><span class="delimiter">'</span></span>);
  showTab(selector);
});

<span class="comment">// 初期状態として1番目のタブを表示</span>
showTab(<span class="string"><span class="delimiter">'</span><span class="content">#tabs-1</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/cuvaqeh/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p><code>showTab()</code> の最初に記述した <code>console.log(selector);</code> は、動作の理解をしやすくするために記述しています（不要でしたら削除しても大丈夫です）。<code>console.log(selector);</code> の表示内容は、Chromeのデベロッパーツールのコンソール、もしくはJS Binに付属のコンソール機能で確認してください。JS Binのコンソールを表示するボタンはOutputボタンの左にあります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 アコーディオンメニュー
</h3><p>クリックした要素を広げて表示するアコーディオンの作り方です。タブが縦方向に積み重なったようなイメージです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-accordion.gif" alt=""></p>

<p><em>index.html</em>:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion-title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タイトル1<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h2&gt;</span>
        <span class="comment">&lt;!-- コンテンツを最初から表示する場合はaccordion-content-activeクラスを付ける --&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion-content accordion-content-active</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>コンテンツ1<span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;/section&gt;</span>

      <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion-title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タイトル2<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h2&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>コンテンツ2<span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;/section&gt;</span>

      <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;h2</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion-title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タイトル3<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/h2&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">accordion-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>コンテンツ3<span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>CSSで見た目を整えます。コンテンツ部の表示／非表示はdisplayで切り替えます。</p>

<p><em>main.css</em>:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">body</span> {
  <span class="key">color</span>: <span class="color">#3F4548</span>;
}

<span class="comment">/* アコーディオンのタイトル部分 */</span>
<span class="class">.accordion-title</span> {
  <span class="key">margin</span>: <span class="float">0</span>;
  <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#ccc</span>;
  <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
  <span class="key">font-size</span>: <span class="float">1</span><span class="value">rem</span>;
}
<span class="class">.accordion-title</span> <span class="tag">a</span> {
  <span class="key">display</span>: <span class="value">block</span>;
  <span class="key">padding</span>: <span class="float">6px</span>;
  <span class="key">color</span>: <span class="color">#3F4548</span>;
  <span class="key">text-decoration</span>: <span class="value">none</span>;
}

<span class="comment">/* アコーディオンのコンテンツ部分 */</span>
<span class="class">.accordion-content</span> {
  <span class="comment">/* 初期状態では非表示 */</span>
  <span class="key">display</span>: <span class="value">none</span>;

  <span class="key">height</span>: <span class="float">60px</span>;
  <span class="key">padding</span>: <span class="float">12px</span> <span class="float">6px</span>;
  <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#ccc</span>;
}
<span class="comment">/* accordion-content-activeクラスが付いているものは初期状態で表示しておく */</span>
<span class="class">.accordion-content</span><span class="class">.accordion-content-active</span> {
  <span class="key">display</span>: <span class="value">block</span>;
}
</pre></div>
</div>
</div>

<p>JavaScriptで、クリックされたセクションが現在非表示の場合は <code>slideDown()</code> で表示し、それと同時に現在表示中のコンテンツを <code>slideUp()</code> で閉じます。 <code>$(セレクタ).is(":visible")</code> は、セレクタに該当する要素が表示されていれば <code>true</code>、非表示なら <code>false</code> になります。</p>

<p><em>main.js</em>:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// アコーディオンのタイトルがクリックされたら</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.accordion-title a</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// hrefにページ遷移しない</span>
  e.preventDefault();

  <span class="comment">// 同じsection内の.accordion-contentを選択</span>
  const content = <span class="predefined">$</span>(e.target)
    .closest(<span class="string"><span class="delimiter">'</span><span class="content">section</span><span class="delimiter">'</span></span>)
    .find(<span class="string"><span class="delimiter">'</span><span class="content">.accordion-content</span><span class="delimiter">'</span></span>);

  <span class="comment">// .accordion-contentが非表示の場合は</span>
  <span class="keyword">if</span> (!content.is(<span class="string"><span class="delimiter">'</span><span class="content">:visible</span><span class="delimiter">'</span></span>)) {
    <span class="comment">// 表示中のコンテンツを閉じる</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.accordion-content:visible</span><span class="delimiter">'</span></span>).slideUp();

    <span class="comment">// クリックされたコンテンツを表示</span>
    content.slideDown();
  }
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/peyoxaf/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-9-4">9.4 カルーセル（スライダー）
</h3><p>次は少し複雑な部品です。複数の画像を横スライドで表示するカルーセルを作ってみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-carousel.gif" alt=""></p>

<p><em>index.html</em>:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">carousel</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;ul</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">slides</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;li&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Image 1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/li&gt;</span>
        <span class="tag">&lt;li&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img2.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Image 2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/li&gt;</span>
        <span class="tag">&lt;li&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img3.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Image 3</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/li&gt;</span>
        <span class="tag">&lt;li&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img4.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">400</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Image 4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/li&gt;</span>
      <span class="tag">&lt;/ul&gt;</span>
      <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">carousel-control carousel-control-prev inactive</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="entity">&amp;lt;</span><span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">carousel-control carousel-control-next inactive</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="entity">&amp;gt;</span><span class="tag">&lt;/a&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><code>&amp;lt;</code> と <code>&amp;gt;</code> は、HTMLの特殊文字です。ブラウザで表示すると、それぞれ <code>&lt;</code> と <code>&gt;</code> が表示されます。HTMLでは <code>&lt;</code> と <code>&gt;</code> はタグを囲む記号として使用されるため、タグを囲む以外の用途では使用できません。そのため、ブラウザで表示させたい場合には、特殊文字という形でHTML上に書き込みます。他にも特殊文字は多くあるので、<a href="http://www.htmq.com/text/" target="_blank">特殊文字</a>などで一度眺めておくと良いでしょう。</p>

<p>各スライド（写真）はCSSで <code>float: left;</code> を指定しているので、横一列に並びます。親要素の <code>.carousel</code> には <code>overflow:hidden</code> を指定しているので、はみ出た部分は非表示になります。スライド１枚分にあたる、縦横400pxの領域だけが表示されます。</p>

<p>JavaScriptでleft（水平方向の表示位置）を変えることで、表示されるスライドを変えています。</p>

<p><em>main.css</em>:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* カルーセルの表示エリア */</span>
<span class="class">.carousel</span> {
  <span class="comment">/* 子要素でposition:absoluteを使うために必要 */</span>
  <span class="key">position</span>: <span class="value">relative</span>;

  <span class="comment">/* 400x400の領域からはみ出た部分は非表示 */</span>
  <span class="key">overflow</span>: <span class="value">hidden</span>;
  <span class="key">width</span>: <span class="float">400px</span>;
  <span class="key">height</span>: <span class="float">400px</span>;

  <span class="comment">/* 左右中央寄せ */</span>
  <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
}

<span class="comment">/* 矢印の基本スタイル */</span>
<span class="class">.carousel-control</span> {
  <span class="key">display</span>: <span class="value">block</span>;
  <span class="key">height</span>: <span class="float">50px</span>;
  <span class="key">width</span>: <span class="float">30px</span>;
  <span class="key">background-color</span>: <span class="color">#f0f0f0</span>;
  <span class="key">color</span>: <span class="color">#333</span>;
  <span class="key">line-height</span>:<span class="float">45px</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;
  <span class="key">text-decoration</span>: <span class="value">none</span>;
  <span class="key">font-size</span>: <span class="float">2</span><span class="value">rem</span>;
  <span class="key">opacity</span>: <span class="float">.5</span>;

  <span class="comment">/* 透明度をふわっと変える演出 */</span>
  <span class="key">transition</span>: <span class="value">opacity</span> <span class="float">.15s</span>;
}
<span class="comment">/* マウスが乗ったら濃くする */</span>
<span class="class">.carousel-control</span><span class="pseudo-class">:hover</span> {
  <span class="key">opacity</span>: <span class="float">.8</span>;
}

<span class="comment">/* 左矢印 */</span>
<span class="class">.carousel-control-prev</span> {
  <span class="key">position</span>: <span class="value">absolute</span>;
  <span class="key">left</span>: <span class="float">0</span>;
  <span class="key">top</span>: <span class="float">175px</span>;
  <span class="key">text-indent</span>: <span class="float">-2px</span>;  <span class="comment">/* 矢印の横方向の位置を調整する */</span>
}

<span class="comment">/* 右矢印 */</span>
<span class="class">.carousel-control-next</span> {
  <span class="key">position</span>: <span class="value">absolute</span>;
  <span class="key">right</span>: <span class="float">0</span>;
  <span class="key">top</span>: <span class="float">175px</span>;
  <span class="key">text-indent</span>: <span class="float">2px</span>;
}

<span class="comment">/* スライドのul */</span>
<span class="class">.slides</span> {
  <span class="comment">/* .carouselの左上隅に表示 */</span>
  <span class="key">position</span>: <span class="value">absolute</span>;
  <span class="key">top</span>: <span class="float">0</span>;
  <span class="key">left</span>: <span class="float">0</span>;

  <span class="comment">/* 横に長いひと続きの写真にする */</span>
  <span class="key">width</span>: <span class="float">99999px</span>;

  <span class="comment">/* ulのデフォルトスタイルを消去 */</span>
  <span class="key">margin</span>: <span class="float">0</span>;
  <span class="key">padding</span>: <span class="float">0</span>;
  <span class="key">list-style-type</span>: <span class="value">none</span>;
}

<span class="comment">/* 各スライドを横につなげる */</span>
<span class="class">.slides</span> <span class="tag">li</span> {
  <span class="key">float</span>: <span class="value">left</span>;
  <span class="key">width</span>: <span class="float">400px</span>;
  <span class="key">height</span>: <span class="float">400px</span>;
}
</pre></div>
</div>
</div>

<p>矢印がクリックされたら <code>animate()</code> でスクロールを行います。 <code>animate()</code> の前に <code>stop()</code> を呼ぶことで、矢印が素早く2回クリックされた場合に1回目のクリックによるアニメーションをキャンセルします。<code>stop()</code> を削除するとどうなるか、試してみましょう。</p>

<p><em>main.js</em>:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// スライド1枚あたりの幅（px）</span>
const slideWidth = <span class="integer">400</span>;

<span class="comment">// 現在表示中のスライドが何番目か（0から数え始める）</span>
let currentSlide = <span class="integer">0</span>;

<span class="comment">// スライドの全枚数</span>
let numSlides;

<span class="comment">// index（0から始まる）番目のスライドを表示する関数</span>
const showSlide = (index) =&gt; {
  <span class="comment">// 1番目のスライドでは左矢印を非表示</span>
  <span class="keyword">if</span> (index === <span class="integer">0</span>) {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.carousel-control-prev</span><span class="delimiter">'</span></span>).hide();
  } <span class="keyword">else</span> {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.carousel-control-prev</span><span class="delimiter">'</span></span>).show();
  }

  <span class="comment">// 最後のスライドでは右矢印を非表示</span>
  <span class="keyword">if</span> (index === numSlides - <span class="integer">1</span>) {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.carousel-control-next</span><span class="delimiter">'</span></span>).hide();
  } <span class="keyword">else</span> {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.carousel-control-next</span><span class="delimiter">'</span></span>).show();
  }

  <span class="comment">// 実行中のアニメーションがあればキャンセルした後、</span>
  <span class="comment">// leftを変化させるアニメーションを開始</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.slides</span><span class="delimiter">'</span></span>)
    .stop()
    .animate(
      {
        <span class="key">left</span>: <span class="error">`</span><span class="predefined">$</span>{-slideWidth * currentSlide}px<span class="error">`</span>,
      },
      <span class="integer">600</span>,
    );
};

<span class="comment">// 左矢印がクリックされたら1つ前のスライドを表示</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.carousel-control-prev</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();

  currentSlide -= <span class="integer">1</span>;
  showSlide(currentSlide);
});

<span class="comment">// 右矢印がクリックされたら1つ後のスライドを表示</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.carousel-control-next</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();

  currentSlide += <span class="integer">1</span>;
  showSlide(currentSlide);
});

<span class="comment">// スライドが全部で何枚あるか取得</span>
numSlides = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.slides &gt; li</span><span class="delimiter">'</span></span>).length;

<span class="comment">// 最初のスライドを表示</span>
showSlide(currentSlide);
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/rimozir/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p>最初のスライドを表示したとき：</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-carousel-1.png" alt="デベロッパーツールでCSSの適用を確認する"></p>

<p>２枚目のスライドを表示したとき：</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-carousel-2.png" alt="デベロッパーツールでCSSの適用を確認する"></p>

<p>leftプロパティの値によって、横一列に並んだスライドの表示位置が変わってきます。マイナスになればなるほど、スライドが左に移動しているのが上の画像から分かります。このような動作を実装するためのコードが、left: <code>${-slideWidth * currentSlide}px</code>, の部分です。</p>

<p><code>${-slideWidth * currentSlide}px</code> の計算としては、<code>slideWidth</code> 変数の値が <code>400</code> なので、<code>currentSlide</code> が、それぞれ</p>

<ul>
  <li><code>0</code> の場合： <code>0px</code></li>
  <li><code>1</code> の場合： <code>-400px</code></li>
  <li><code>2</code> の場合： <code>-800px</code></li>
</ul>

<p>となり、左にスライドがずれていくようになっています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-5">9.5 ライトボックス（画像のポップアップ）
</h3><p>ライトボックスは、写真をクリックした時に拡大表示する機能です。ページ内のサムネイル（小さい画像）をクリックすると、拡大画像がロードされて表示されます。</p>

<p>まずHTMLで拡大表示に使うオーバーレイ（黒い幕）要素を用意しておきます。</p>

<p><em>index.html</em>:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="comment">&lt;!-- 拡大表示用のオーバーレイ --&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">overlay</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="comment">&lt;!-- サムネイル --&gt;</span>
    <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1-large.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1-small.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">140</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">140</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Cat 1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
    <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img2-large.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img2-small.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">140</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">140</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Cat 2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>オーバーレイは初期状態では非表示にしておきます。</p>

<p><em>main.css</em>:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* 後ろを覆う黒い幕 */</span>
<span class="class">.overlay</span> {
  <span class="comment">/* 画面いっぱいに表示 */</span>
  <span class="key">position</span>: <span class="value">fixed</span>;
  <span class="key">top</span>: <span class="float">0</span>;
  <span class="key">left</span>: <span class="float">0</span>;
  <span class="key">width</span>: <span class="float">100%</span>;
  <span class="key">height</span>: <span class="float">100%</span>;

  <span class="comment">/* 他のコンテンツより上のレイヤーに表示 */</span>
  <span class="key">z-index</span>: <span class="float">10000</span>;

  <span class="comment">/* 初期状態では非表示 */</span>
  <span class="key">display</span>: <span class="value">none</span>;

  <span class="comment">/* 透けた黒色にする */</span>
  <span class="key">background-color</span>:<span class="color">rgba(0, 0, 0, 0.8)</span>;

  <span class="comment">/* マウスカーソルを手の形にする */</span>
  <span class="key">cursor</span>: <span class="value">pointer</span>;
}

<span class="comment">/* 拡大写真の表示エリア */</span>
<span class="class">.popup-content</span> {
  <span class="comment">/* 60x60で左右中央に表示する */</span>
  <span class="key">position</span>: <span class="value">absolute</span>;
  <span class="key">top</span>: <span class="float">50%</span>;
  <span class="key">left</span>: <span class="float">50%</span>;
  <span class="key">width</span>: <span class="float">60px</span>;
  <span class="key">height</span>: <span class="float">60px</span>;
  <span class="key">margin-top</span>: <span class="float">-30px</span>;
  <span class="key">margin-left</span>: <span class="float">-30px</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;

  <span class="comment">/* 枠をつける */</span>
  <span class="key">padding</span>: <span class="float">4px</span>;
  <span class="key">background-color</span>: <span class="color">#ccc</span>;
}
</pre></div>
</div>
</div>

<p>JavaScriptのコードが長いですが、やっていることは次の通りです。</p>

<ol>
  <li>サムネイルがクリックされたらオーバーレイを表示</li>
  <li>拡大画像の読み込みを開始</li>
  <li>画像の読み込みが完了したら画像表示エリア（グレーの枠）を拡大</li>
  <li>表示エリアの拡大が完了したら画像を表示</li>
</ol>

<p><em>main.js</em>:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 画像ロード中の表示エリアのサイズ（px）</span>
const initialSize = <span class="integer">60</span>;

<span class="comment">// 拡大表示をウインドウの端から何px空けるか</span>
const padding = <span class="integer">100</span>;

<span class="comment">// 各アニメーションの時間（ミリ秒）</span>
const animDuration = <span class="integer">300</span>;

<span class="comment">// img要素を表示する</span>
const showImage = (img) =&gt; {
  const <span class="predefined">$img</span> = <span class="predefined">$</span>(img);

  <span class="comment">// ウインドウの幅と高さを取得</span>
  const windowWidth = <span class="predefined">$</span>(window).width();
  const windowHeight = <span class="predefined">$</span>(window).height();

  <span class="comment">// ウインドウのアスペクト比を計算</span>
  const windowAspectRatio = windowWidth / windowHeight;
  <span class="comment">// 画像のアスペクト比を計算</span>
  const imageAspectRatio = img.width / img.height;

  <span class="comment">// ウインドウと画像のどちらが横に長いかによって</span>
  <span class="comment">// 表示サイズを決める</span>
  let dispWidth;
  let dispHeight;
  <span class="keyword">if</span> (windowAspectRatio &gt; imageAspectRatio) {
    <span class="comment">// 画像の方が縦に長い場合</span>
    dispHeight = windowHeight - padding;
    dispWidth = dispHeight * imageAspectRatio;
  } <span class="keyword">else</span> {
    <span class="comment">// 画像の方が横に長い場合</span>
    dispWidth = windowWidth - padding;
    dispHeight = dispWidth / imageAspectRatio;
  }

  <span class="comment">// 画像の表示サイズをセット</span>
  <span class="predefined">$img</span>.css({
    <span class="key">width</span>: <span class="error">`</span><span class="predefined">$</span>{dispWidth}px<span class="error">`</span>,
    <span class="key">height</span>: <span class="error">`</span><span class="predefined">$</span>{dispHeight}px<span class="error">`</span>,
    <span class="key">display</span>: <span class="string"><span class="delimiter">'</span><span class="content">none</span><span class="delimiter">'</span></span>,
  });

  <span class="comment">// img要素を.popup-content内に挿入</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup-content</span><span class="delimiter">'</span></span>).html(img);

  <span class="comment">// 表示エリアの拡大アニメーション</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup-content</span><span class="delimiter">'</span></span>).animate(
    {
      <span class="key">width</span>: <span class="error">`</span><span class="predefined">$</span>{dispWidth}px<span class="error">`</span>,
      <span class="key">height</span>: <span class="error">`</span><span class="predefined">$</span>{dispHeight}px<span class="error">`</span>,
      <span class="comment">// 下記2つは上下左右中央に置くために必要</span>
      <span class="key"><span class="delimiter">'</span><span class="content">margin-left</span><span class="delimiter">'</span></span>: <span class="error">`</span><span class="predefined">$</span>{-dispWidth / <span class="integer">2</span>}px<span class="error">`</span>,
      <span class="key"><span class="delimiter">'</span><span class="content">margin-top</span><span class="delimiter">'</span></span>: <span class="error">`</span><span class="predefined">$</span>{-dispHeight / <span class="integer">2</span>}px<span class="error">`</span>,
    },
    animDuration,
    <span class="string"><span class="delimiter">'</span><span class="content">swing</span><span class="delimiter">'</span></span>,
    () =&gt; {
      <span class="comment">// 拡大アニメーションが終わったら画像をフェードイン</span>
      <span class="predefined">$img</span>.fadeIn(animDuration);
    },
  );
};

<span class="comment">// imageUrlの画像をポップアップで表示する関数</span>
const showPopup = (imageUrl) =&gt; {
  <span class="comment">// 前回挿入したimg要素を削除</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup-content</span><span class="delimiter">'</span></span>).html(<span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>);

  <span class="comment">// オーバーレイ（黒背景と画像表示エリア）をフェードイン</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.overlay</span><span class="delimiter">'</span></span>).fadeIn(animDuration);

  <span class="comment">// 画像表示エリアを小さな四角にする</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup-content</span><span class="delimiter">'</span></span>).css({
    <span class="key">width</span>: <span class="error">`</span><span class="predefined">$</span>{initialSize}px<span class="error">`</span>,
    <span class="key">height</span>: <span class="error">`</span><span class="predefined">$</span>{initialSize}px<span class="error">`</span>,
    <span class="comment">// 下記2つは上下左右中央に置くために必要</span>
    <span class="key"><span class="delimiter">'</span><span class="content">margin-left</span><span class="delimiter">'</span></span>: <span class="error">`</span><span class="predefined">$</span>{-initialSize / <span class="integer">2</span>}px<span class="error">`</span>,
    <span class="key"><span class="delimiter">'</span><span class="content">margin-top</span><span class="delimiter">'</span></span>: <span class="error">`</span><span class="predefined">$</span>{-initialSize / <span class="integer">2</span>}px<span class="error">`</span>,
  });

  <span class="comment">// img要素を作成して拡大画像をロードする</span>
  const img = <span class="keyword">new</span> Image();
  img.onload = () =&gt; {
    <span class="comment">// 画像のロードが終わるとここが実行される</span>
    showImage(img);
  };
  img.src = imageUrl;
};

<span class="comment">// ポップアップを閉じる</span>
const closePopup = () =&gt; {
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.overlay</span><span class="delimiter">'</span></span>).fadeOut(animDuration);
};

<span class="comment">// .popup要素がクリックされたらポップアップを表示</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();
  const imageUrl = <span class="predefined">$</span>(e.currentTarget).attr(<span class="string"><span class="delimiter">'</span><span class="content">href</span><span class="delimiter">'</span></span>);
  showPopup(imageUrl);
});

<span class="comment">// オーバーレイがクリックされたらポップアップを閉じる</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.overlay</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();
  closePopup();
});
</pre></div>
</div>
</div>

<p>サムネイル（小さい画像）をクリックすると、クリックイベントがサムネイルのimg要素で発生します。そしてイベントのバブリングフェーズで、その親の.popup要素にクリックイベントが伝わります。</p>

<p>上記のコードの <code>$('.popup').on('click', (e) =&gt; {...</code> という部分は、.popup要素にイベントハンドラを登録しています。サムネイルのimg要素で発生したクリックイベントが、バブリングフェーズで.popup要素に伝わってきたときに、登録したイベントハンドラが呼び出されます。</p>

<p>バブリングフェーズについては、下記で解説しています。</p>

<ul>
  <li><a href="javascript#chapter-6-5">Lesson3【6.5 イベント】</a></li>
  <li><a href="javascript#chapter-6-5">Lesson4【6.5 後から追加した要素に、イベントハンドラを登録する】</a></li>
</ul>

<p>イベントオブジェクトを使うとき、注意すべき点があります。それはイベントオブジェクトのtargetプロパティが、 <strong>イベント発生元の要素</strong> を指すことです。上記のコードでは、サムネイルのimg要素がクリックイベントの発生元になります。イベントの発生元（img要素）ではなく、<strong>イベントハンドラを登録した要素</strong>（.popup要素）を取得するには、イベントオブジェクトのcurrentTargetプロパティを使います。</p>

<p>つまりイベントオブジェクトのプロパティは、下記のように整理できます。</p>

<ul>
  <li>targetプロパティ： イベント発生元の要素</li>
  <li>currentTargetプロパティ： イベントハンドラが登録された要素</li>
</ul>

<p>上記のコードではイベントハンドラが登録されたpopup要素を取得するために、currentTargetプロパティを使っています。</p>

<div class="alert alert-warning">
画像をポップアップで表示するときの表示サイズの計算は、少し難しいです。具体的には、showImage関数で行なっている処理の部分です。この部分については、理解できなくても問題ありません。Cloud9でプレビュー表示をして、問題なく動くことを確認できればOKです。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-9-6">9.6 パララックス
</h3><p>パララックス（parallax）は、視差効果とも言います。画面に奥行きがあるように見せる演出のことです。実際のスクロール量と表示上のスクロール量に差分を付けることで遠近感を出します。</p>

<p>スマートフォンでは処理能力や仕様上の制限により綺麗に表現することが難しいため、スマートフォン向けにはパララックスをオフにすることが多いです。</p>

<p>今回は写真とテキストがセットになった4枚のスライドを作ってみましょう。</p>

<p><em>index.html</em>:</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>jQuery テスト<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">parallax-section parallax-section-1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        お昼寝きもちいいにゃ
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">parallax-section parallax-section-2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;p&gt;</span>ぐるる・・・<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span>おなかすいたにゃ<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">parallax-section parallax-section-3</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;p&gt;</span>ごはんほしい、、<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span>ごはんくれないと、、<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">parallax-section parallax-section-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        犬になるわん！
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/section&gt;</span>

    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.css</em>:</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* 下にだけ余白を付ける */</span>
<span class="tag">p</span> {
  <span class="key">margin</span>: <span class="float">0</span> <span class="float">0</span> <span class="float">1em</span> <span class="float">0</span>;
}

<span class="comment">/* 各スライドの基本スタイル */</span>
<span class="class">.parallax-section</span> {
  <span class="comment">/* 画面全体を覆う */</span>
  <span class="key">height</span>: <span class="float">100</span><span class="value">vh</span>;
  <span class="key">width</span>: <span class="float">100%</span>;

  <span class="comment">/* 背景が画面全体を覆うようにする */</span>
  <span class="key">background-repeat</span>: <span class="value">no-repeat</span>;
  <span class="key">background-position</span>: <span class="value">center</span> <span class="value">center</span>;
  <span class="key">background-attachment</span>: <span class="value">fixed</span>;
  <span class="key">background-size</span>: <span class="value">cover</span>;
}

<span class="comment">/* 1枚目のスライド */</span>
<span class="class">.parallax-section-1</span> {
  <span class="key">background-image</span>: <span class="function"><span class="delimiter">url(</span><span class="content">cat1.jpg</span><span class="delimiter">)</span></span>;
}

<span class="comment">/* 2枚目のスライド */</span>
<span class="class">.parallax-section-2</span> {
  <span class="key">background-image</span>: <span class="function"><span class="delimiter">url(</span><span class="content">cat2.jpg</span><span class="delimiter">)</span></span>;
}

<span class="comment">/* 3枚目のスライド */</span>
<span class="class">.parallax-section-3</span> {
  <span class="key">background-image</span>: <span class="function"><span class="delimiter">url(</span><span class="content">cat3.jpg</span><span class="delimiter">)</span></span>;
}

<span class="comment">/* 4枚目のスライド */</span>
<span class="class">.parallax-section-4</span> {
  <span class="key">background-image</span>: <span class="function"><span class="delimiter">url(</span><span class="content">cat4.jpg</span><span class="delimiter">)</span></span>;
}

<span class="comment">/* テキストのスタイル */</span>
<span class="class">.text</span> {
  <span class="comment">/* 左右中央寄せ */</span>
  <span class="key">position</span>: <span class="value">relative</span>;
  <span class="key">top</span>: <span class="float">50%</span>;
  <span class="key">transform</span>: <span class="error">t</span><span class="error">r</span><span class="error">a</span><span class="error">n</span><span class="error">s</span><span class="error">l</span><span class="error">a</span><span class="error">t</span><span class="error">e</span><span class="error">Y</span>(<span class="float">-50%</span>);

  <span class="comment">/* テキストをセンタリング */</span>
  <span class="key">text-align</span>: <span class="value">center</span>;

  <span class="key">font-size</span>: <span class="float">2</span><span class="value">rem</span>;
  <span class="key">color</span>: <span class="color">#eee</span>;

  <span class="comment">/* 影を付けて読みやすくする */</span>
  <span class="key">text-shadow</span>:
  <span class="float">-1px</span> <span class="float">-1px</span> <span class="float">6px</span> <span class="color">#000</span>,
  <span class="float">1px</span> <span class="float">-1px</span> <span class="float">6px</span> <span class="color">#000</span>,
  <span class="float">-1px</span> <span class="float">1px</span> <span class="float">6px</span> <span class="color">#000</span>,
  <span class="float">1px</span> <span class="float">1px</span> <span class="float">6px</span> <span class="color">#000</span>;
}
</pre></div>
</div>
</div>

<p><em>main.js</em>:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 背景画像のスクロール速度。数字が小さいほど速い。</span>
const speed = <span class="integer">3</span>;
const <span class="predefined">$window</span> = <span class="predefined">$</span>(window);

<span class="comment">// スライド1枚の高さを保持する変数</span>
let slideHeight;

<span class="comment">// パララックスを適用する関数</span>
const showParallax = () =&gt; {
  const scrollTop = <span class="predefined">$window</span>.scrollTop();

  <span class="comment">// 各スライドの背景位置をスクロールに合わせて変える</span>
  <span class="comment">// 各スライドの背景位置をスクロールに合わせて変える</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.parallax-section-1</span><span class="delimiter">'</span></span>).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-position</span><span class="delimiter">'</span></span>: <span class="error">`</span>center <span class="predefined">$</span>{Math.round((<span class="integer">0</span> - scrollTop) / speed)}px<span class="error">`</span>,
  });
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.parallax-section-2</span><span class="delimiter">'</span></span>).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-position</span><span class="delimiter">'</span></span>: <span class="error">`</span>center <span class="predefined">$</span>{Math.round((slideHeight - scrollTop) / speed)}px<span class="error">`</span>,
  });
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.parallax-section-3</span><span class="delimiter">'</span></span>).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-position</span><span class="delimiter">'</span></span>: <span class="error">`</span>center <span class="predefined">$</span>{Math.round((slideHeight * <span class="integer">2</span> - scrollTop) / speed)}px<span class="error">`</span>,
  });
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.parallax-section-4</span><span class="delimiter">'</span></span>).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-position</span><span class="delimiter">'</span></span>: <span class="error">`</span>center <span class="predefined">$</span>{Math.round((slideHeight * <span class="integer">3</span> - scrollTop) / speed)}px<span class="error">`</span>,
  });
};

<span class="comment">// パララックスの初期設定をする関数</span>
const initParallax = () =&gt; {
  <span class="comment">// ウインドウの高さをスライド1枚分の高さとする</span>
  slideHeight = <span class="predefined">$window</span>.height();

  <span class="comment">// 表示を更新</span>
  showParallax();
};

<span class="comment">// スクロールのたびにshowParallax関数を呼ぶ</span>
<span class="predefined">$window</span>.on(<span class="string"><span class="delimiter">'</span><span class="content">scroll</span><span class="delimiter">'</span></span>, showParallax);

<span class="predefined">$window</span>.on(<span class="string"><span class="delimiter">'</span><span class="content">resize</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="comment">// ウインドウがリサイズされるとここが実行される</span>
  initParallax();
});

initParallax();
</pre></div>
</div>
</div>

<p>上記のコードでは、showParallax関数の中で各スライドの背景位置（background-position）を個別にセットしています。このままでは、スライド枚数が増えた時に毎回修正しなければならないので大変です。下記のように一般化して書けば、スライド枚数が何枚になっても修正の必要がありません。</p>

<p>jQueryのeachメソッドは、JavaScriptのforEachメソッドと同じような働きをします。どちらもメソッドの引数として、関数を渡して呼び出します。下記のコードでは、アロー関数を渡してeachメソッドを呼び出しています。この関数には、セレクタと一致した要素が順番に渡されます。jQueryのeachメソッドの場合、第１引数は要素のインデックス番号です。0から始まります。第２引数は、個別の要素そのものです。下記のコードの場合、仮引数の <code>index</code> がインデックス番号で、<code>element</code> が各スライドのsection要素です。</p>

<p>なおJavaScirptのforEachメソッドについては、Lesson3の<a href="javascript#chapter-5-1">5.1 Arrayオブジェクト</a>で解説しています。</p>

<p><em>main.js</em>（改良版）:</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 背景画像のスクロール速度。数字が小さいほど速い。</span>
const speed = <span class="integer">3</span>;
const <span class="predefined">$window</span> = <span class="predefined">$</span>(window);

<span class="comment">// スライド1枚の高さを保持する変数</span>
let slideHeight;

<span class="comment">// パララックスを適用する関数</span>
const showParallax = () =&gt; {
  const scrollTop = <span class="predefined">$window</span>.scrollTop();

  <span class="comment">// 各スライドの背景位置をスクロールに合わせて変える</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.parallax-section</span><span class="delimiter">'</span></span>).each((index, element) =&gt; {
    const pos = Math.round((slideHeight * index - scrollTop) / speed);
    <span class="predefined">$</span>(element).css({
      <span class="key"><span class="delimiter">'</span><span class="content">background-position</span><span class="delimiter">'</span></span>: <span class="error">`</span>center <span class="predefined">$</span>{pos}px<span class="error">`</span>,
    });
  });
};

<span class="comment">// パララックスの初期設定をする関数</span>
const initParallax = () =&gt; {
  <span class="comment">// ウインドウの高さをスライド1枚分の高さとする</span>
  slideHeight = <span class="predefined">$window</span>.height();

  <span class="comment">// 表示を更新</span>
  showParallax();
};

<span class="comment">// スクロールのたびにshowParallax関数を呼ぶ</span>
<span class="predefined">$window</span>.on(<span class="string"><span class="delimiter">'</span><span class="content">scroll</span><span class="delimiter">'</span></span>, showParallax);

<span class="predefined">$window</span>.on(<span class="string"><span class="delimiter">'</span><span class="content">resize</span><span class="delimiter">'</span></span>, () =&gt; {
  <span class="comment">// ウインドウがリサイズされるとここが実行される</span>
  initParallax();
});

initParallax();
</pre></div>
</div>
</div>

<p>デベロッパーツールで確認すると下のように、<code>background-position</code>の値が変化しているのが分かります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-parallax-1.gif" alt="デベロッパーツールでCSSの適用を確認する"></p>

<p>このように各スライドの<code>background-position</code>を変化させることで、実際のスクロール量と、表示する背景位置に差をつけています。</p>

<p>なおJavaScriptを実行しなくても、パララックス効果がなくなるだけでコンテンツ自体は問題なく読むことができます。<em>index.html</em> で <em>main.js</em> の読み込みをやめるとどうなるか、試してみましょう。</p>

<p>スマートフォンでパララックスをオフにしたい場合、ブラウザ判定の結果によってパララックスのJavaScriptを実行するかどうか判断します。</p>

<div class="alert alert-warning">
背景位置の計算は、少し難しいです。具体的には、showParallax関数で行なっている計算の部分です。この部分については、理解できなくても問題ありません。Cloud9でプレビュー表示をして、問題なく動くことを確認できればOKです。
</div>
</div><div class="subsection challenge"><h3 class="index" id="kadai-web-tab">課題：タブ機能の作成</h3><p>本レッスンで学んだタブ機能を作成してください。下記のHTML(<em>index.html</em>)に対して、CSS(<em>main.css</em>)とJS(<em>main.js</em>)を新規作成してください。このとき、<em>index.html</em> は変更しないようにしてください。JavaScript(jQuery)でも、要素の追加や変更などはしないようにしてください。</p>

<p>Cloud9上で、 <em>web-tab</em> というフォルダを作成し、その中に制作物を含めてください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>JavaScript Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tab-menu-a</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タブa<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tab-menu-b</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タブb<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tab-menu-c</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>タブc<span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-a</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;p&gt;</span>タブaの内容が入ります。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-b</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;p&gt;</span>タブbの内容が入ります。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-c</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;p&gt;</span>タブcの内容が入ります。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>

  <span class="comment">&lt;!-- jQuery --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h4>ヒント1</h4>

<p>main.js内のセレクタを利用する部分で <code>console.log(selector);</code> のように記述して、セレクタの値をデベロッパーツールで確認できるようにすると本課題に取り組みやすくなります。</p>

<h4>ヒント2</h4>

<p>先ほど学習した<a href="jquery#chapter-9-2">9.2 タブ</a>が参考になります。ただし課題では、9.2「タブ」とHTMLの構造が変わっています。HTMLの構造が変わっても、タブ機能を実装できるかが課題のポイントです。特に大切なのは、セレクタについての理解です。CSSとjQueryのどちらも、セレクタの使い方を理解することが大切です。</p>

<p>main.jsではまず、クリックしたタブにactiveクラスをつけるようにしましょう。</p>

<p>クリックしたタブの内容を表示するのは、少し難しいです。なぜ難しいかというと、「タブ」と「タブの内容」で、id名（id属性の属性値）が異なっているからです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/jquery/4-web-tab-1.png" alt="属性値を確認する"></p>

<p>このタブの内容を表示する処理は、いくつか方法が考えられます。正解は１つではありません。ここではヒントとして、２つの方法を示します。</p>

<hr>

<p><strong>方法1：</strong></p>

<p>if文を使って、条件分岐する方法です。もし「タブ」のid名が <code>tab-menu-a</code> であれば、id名が <code>tabs-a</code> の「タブの内容」を表示します。「タブ」のid名が <code>tab-menu-b</code>、<code>tab-menu-c</code> の場合も同様です。</p>

<hr>

<p><strong>方法2：</strong></p>

<p>「タブ」と「タブの内容」でid名が異なっていますが、id名の末尾は共通しています。 最後の <code>a</code>、 <code>b</code>、 <code>c</code>という部分です。そのためまずタブのid名から、最後の１文字を取り出します。レッスン３の<a href="./javascript#chapter-5-3">5.3 Stringオブジェクト</a>で出てきたsliceメソッドを使えば、最後の１文字を取り出すことができます。具体的には、<code>slice(-1)</code> という形で <code>-1</code> を引数に渡します。</p>

<p>取り出した文字列は、いったん変数に代入しておきましょう。この変数をもとにして、タブのid名である <code>#tabs-a</code>、 <code>#tabs-b</code>、 <code>#tabs-c</code> を作成できます。ここでのヒントとしては、テンプレート文字列を使うことです。テンプレート文字列を使うことで、変数を別の文字列に埋め込むことができます。</p>
</div></section><section id="chapter-10"><h2 class="index">10. リファレンス
</h2><div class="subsection"><p>jQueryの関数の使い方を調べるときは、まずGoogle検索をしてみましょう。たとえばanimateメソッドの使い方を調べたい場合、「jquery animate」と検索すると、使い方の解説を掲載しているリファレンスページがヒットします。</p>

<p>jQueryが提供するメソッド（API）の一覧は下記のサイトにあります。</p>

<ul>
  <li><a href="http://js.studio-kingdom.com/jquery/" target="_blank">jQuery - js STUDIO</a></li>
  <li><a href="http://semooh.jp/jquery/" target="_blank">jQuery日本語リファレンス</a></li>
  <li><a href="https://api.jquery.com/" target="_blank">jQuery公式リファレンス（英語）</a></li>
</ul>

<p>公式リファレンスは常に最新の情報が載っていますが、日本語リファレンスは最新の情報に追いついていない場合もあるので気を付けましょう。このレッスンではjQueryのバージョン3.4.1を使っています。バージョンが違うと仕様が変わることもありますので、見ているリファレンスがどのバージョンに対応しているのかにも注意しましょう。</p>
</div></section><section id="chapter-11"><h2 class="index">11. まとめ
</h2><div class="subsection"><p>jQueryを使うとDOM操作やアニメーションが手軽にできます。またjQueryの上に機能を追加するプラグインという仕組みもあり、世界中のプログラマーの手によって様々なプラグインが開発、公開されています。気になるサイトのソースコードを開いて、どんなプラグインが使われているか調べてみるのも良いでしょう。</p>
</div></section></div>
</body>
</html>