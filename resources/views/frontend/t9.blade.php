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
<div class="markdown col-md-9"><div class="lesson-num p">Lesson9</div><h1 id="vue">Vue.js
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>このレッスンでは、Vue.jsについて解説します。Vue.jsを使うと、フロントエンドの開発を効率的に行うことができます。たとえば、ユーザーの操作やAPIから取得した情報をもとに、DOM操作などの処理を助けてくれます。なおDOMについては、Lesson3の<a href="javascript#chapter-7">7. DOM</a> をご確認ください。</p>

<p>これまで学習した内容をVue.jsに置き換えてみることで、jQueryとの違いやVue.jsの便利なところを学びます。このレッスンの最初の方は、Vue.jsを使うメリットがあまり感じにくい内容になっています。しかしレッスンを進めていくうちに、Vue.jsの便利さが実感できるようになるでしょう。</p>

<p>なお解説する内容に合わせて、Vue.js公式の<a href="https://jp.vuejs.org/v2/guide/" target="_blank">ガイド</a>や<a href="https://jp.vuejs.org/v2/api/" target="_blank">API</a>などへのリンクを参考として掲載しています。<a href="https://jp.vuejs.org/v2/guide/" target="_blank">ガイド</a>などには多くの情報が書かれていますが、最初からすべてを覚える必要はありません。深く学習したい場合などに、気になる部分をチェックすると良いでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-1-1">1.1 jQueryの限界と問題点
</h3><p>Vue.jsと同じく、jQueryもフロントエンドの開発を助けてくれます。ではなぜ、jQueryを使わないのでしょうか。理由はいくつかあります。たとえばjQueryでは、扱うデータやイベントが多くなると、記述する処理が複雑になりやすいです。言い換えると、個々の処理がどこに影響しているのか分かりづらい、複雑に入り組んだコードになりやすいです。</p>

<p>処理が複雑に入り組んだコードのことを、「スパゲッティコード」と言います。スパゲッティのように、コードが複雑に絡み合っているという意味です。特に実際の開発現場では、このようなコードを書かないよう注意しましょう。他人（未来のあなたを含む）が書いたスパゲッティコードの保守などを任せられたプログラマは、その解読や修正に大きなストレスを感じます。離職の原因になることもあります。</p>

<p><strong>スパゲッティコードのイメージ</strong></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/spagetti.png" alt=""></p>

<p>ただしLesson6で作成したサイトのように、スクロールにあわせてアニメーションするなどのエフェクトを盛り込む程度であれば、jQueryでも問題ありません。扱うデータやイベントの数が少なく、コードが複雑になる心配も少ないからです。</p>
</div></section><section id="chapter-2"><h2 class="index">2. Vue.jsの基本
</h2><div class="subsection"><p>Vue.jsだと、扱うデータやイベントが多くなっても、コードが複雑になりにくいです。複雑になりにくい理由の１つとして、Vue.jsはDOM操作を自動で行ってくれることが挙げられます。つまり、アプリケーションやWebサイトの制作をするプログラマが、DOM操作を意識しなくても開発できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Vue.jsを読み込む
</h3><p>言葉だけでは分かりづらいので、具体的なコードを見てみましょう。Cloud9にindex.htmlとmain.jsを作り、次のコードを書いてください。コードの意味については、後で説明します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>{{ greeting }}<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">greeting</span>: <span class="string"><span class="delimiter">'</span><span class="content">Hello Vue.js!</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jaqatod/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.7"></script></p>

<p><em>index.html</em> をプレビューすると、「Hello Vue.js!」と表示されます。</p>

<p>jQueryでは、同様の処理をLesson4の<a href="jquery#chapter-3-1">3.1 jQueryを読み込む</a>で行っています。以下のコードです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
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

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#box</span><span class="delimiter">'</span></span>).text(<span class="string"><span class="delimiter">'</span><span class="content">Hello jQuery!</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>Vue.jsとjQueryのコードを比べると、この場合HTMLはあまり変わりません。しかしJavaScriptは、jQueryの方がシンプルに書けます。たった1行です。このように簡単な処理を行う場合は、Vue.jsを使う利点が感じられません。</p>

<p>しかしVue.jsのコードで重要なのは、<strong>DOM操作するコードを書いていない</strong> ことです。詳しくは後ほど説明します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 Vueインスタンスを作る
</h3><p>先ほど書いたVue.jsコードの意味を説明します。まず <em>index.html</em> では、以下のscript要素によってCDNでVue.jsを読み込んでいます。なおCDN（Content Delivery Network）とは、Vue.jsのような公開ライブラリを誰でも自由に使えるよう、Web上に設置（ホスティング）してくれているサイトです。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<p>本レッスンでは、Vue.jsのCDNによる読み込みをhead要素内で行なっています。なぜhead要素内で行なっているかというと、ページ表示時のちらつきを抑えるためです。ページを表示した最初の一瞬だけ、HTMLファイルに書いた<code>{{ ... }}</code>が見えてしまうことがあります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/flickering.gif" alt="Mustache構文のちらつき"></p>

<p>これはHTMLファイルに書いた<code>{{ ... }}</code>（二重の中括弧）をVue.jsが処理するまでに、ほんの少し時間がかかるからです。head要素内でVue.jsを読み込む方が、DOMの読み込み後に<code>&lt;/body&gt;</code>の直前でVue.jsを読み込むよりも、ちらつきを少し抑えることができます。また、完全にちらつきを抑える方法もあります。ちらつきが気になる場合は、公式の<a href="https://jp.vuejs.org/v2/api/index.html#v-cloak" target="_blank">API：v-cloak</a>や次のページを参照してください。</p>

<ul>
  <li><a href="https://qiita.com/macoshita/items/630e6bf1b6fa068790a3" target="_blank">vue.js の {{name}} とかが html に表示されるのを防ぐ(v-cloak)</a></li>
</ul>

<div class="alert alert-info">
  <p>
  上記のscript要素では、開発用のVue.jsを読み込んでいます。バージョンは最新です。実際に公開するサイトでは、特定のバージョンを指定した本番用のVue.jsを読み込む方が良いでしょう。バージョンの更新によって、予期せぬ不具合が起きるのを避けるためです。
  </p>
  <p>
  詳しくは、公式ガイドの<a href="https://jp.vuejs.org/v2/guide/installation.html" target="_blank">インストール</a>や、<a href="https://jp.vuejs.org/v2/guide/index.html" target="_blank">はじめに</a>をご確認ください。
  </p>
</div>

<p>次に、<em>main.js</em> についてです。先ほど書いた <em>main.js</em> を見てみましょう。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">greeting</span>: <span class="string"><span class="delimiter">'</span><span class="content">Hello Vue.js!</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p>1行目の <code>new</code> は、演算子の１つです。そして <code>Vue(...)</code> は、オブジェクトを複製するための特別な関数です。オブジェクトを複製するための特別な関数を、コンストラクタと言います。<code>new コンストラクタ(...)</code> で、コンストラクタと同じ名前のオブジェクトを複製します。このように複製したオブジェクトを <strong>インスタンス</strong> と言います。ここでは <code>new Vue(...)</code> によって、Vueオブジェクトのインスタンス（Vueインスタンス）を作っています。ここでは作成したVueインスタンスを、<code>app</code> という変数に代入しています。作成したインスタンスに後でアクセスするためです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/constructor.png" alt=""></p>

<p>Vueコンストラクタの引数には、オブジェクトを渡します。Vue.jsではこのオブジェクトを、<strong>オプションオブジェクト</strong> と言います。オプションオブジェクトに決められたプロパティを設定することで、Vue.jsの機能を利用できるようになります。上記のmain.jsではオプションオブジェクトに、<code>el</code> と <code>data</code> というプロパティをオプションとして設定しています。</p>

<p>elオプションの値には、DOM要素を設定します。jQueryと同じように、CSSセレクタの文字列で設定できます。ここで設定した要素内のHTMLは、<strong>テンプレート</strong> というものになります。（他のオプションを設定した場合、テンプレートにならない場合もあります。）テンプレート内では、Vue.jsの機能が使えます。またテンプレートは、Vue.jsを通してブラウザに表示されます。</p>

<p>dataオプションには文字通り、データを設定します。このデータには、Vueインスタンスのプロパティとしてアクセスできます。デベロッパーツールのコンソールで、確認してみましょう。</p>

<p>まず上記で作成した <em>index.html</em> を、新しいタブでプレビュー表示してください。そしてデベロッパーツールを開き、コンソールに次のように入力してみてください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>app.greeting
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/app_greeting.png" alt=""></p>

<p>コンソールに、「”Hello Vue.js!”」と表示されます。これはVueインスタンスのプロパティとして、dataオプションのデータにアクセスできるということです。なお <code>app</code> は、Vueインスタンスを入れた変数です。</p>

<div class="alert alert-info">
  ちなみにjQueryでは、<code>$</code>変数に関数が入っています。そのため<code>$(...)</code>で、関数の呼び出しになります。この<code>$</code>関数は、内部でコンストラクタを呼び出して、jQueryオブジェクトのインスタンスを返します。jQueryでも、利用するにはまずインスタンスを作るということです。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 テキストとデータを結びつける
</h3><p>index.htmlのテンプレートでは、先ほど確認した <code>greeting</code> というデータを、HTMLのテキストとして表示しています。VueインスタンスのデータをHTMLのテキストとして表示するには、テンプレート内で <code>{{...}}</code> を使います。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/template.png" alt=""></p>

<p><code>{{...}}</code> は、Mustache構文と言います。ちなみにMustacheとは、「口ひげ」のことです。<code>{</code> を横向きにすると、口ひげのように見えますね。</p>

<p>テンプレートでMustache構文などを使うと、VueインスタンスのデータとHTMLを結びつけることができます。これを <strong>データバインディング</strong> と言います。バインディングとは、結びつけることです。データバインディングをすると、データの変更がHTMLに自動で反映されます。これはVue.jsによって、DOM操作が自動で行われるためです。</p>

<p>デベロッパーツールのコンソールで、確認してみましょう。先ほど開いたデベロッパーツールのコンソールに、次のように入力してみてください。<code>greeting</code> の値を、「Hello Vue.js!」から「こんにちは!」に変更します。</p>

<pre><code>app.greeting = 'こんにちは!'
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/instance_data_change.png" alt=""></p>

<p>するとブラウザでの表示も、自動で「”Hello Vue.js!”」から「”こんにちは!”」に変わります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/instance_data_change.gif" alt=""></p>

<p>Mustache構文の中にはVueインスタンスのデータだけでなく、JavaScriptの「式」を書けます。式というのは計算（評価）されて、結果の値が得られるもののことです。</p>

<p>たとえばテンプレートを、以下のように書き換えてみてください。どちらもMustache構文の中に書いているのは、式です。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>{{ `${greeting} 太郎さん！` }}<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>{{ new Date().toLocaleString() }}<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<div class="alert alert-info">
あるコードが式かどうか、見分ける簡単な方法があります。それは、「変数に代入することができるか」を確かめてみることです。変数に代入できるものは、式と言えます。たとえば <code>1 + 1</code> は式です。そのため <code>const x = 1 + 1;</code> というように、変数に代入できます。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-2-4">2.4 属性とデータを結びつける
</h3><p>DOM要素の属性と、Vueインスタンスのデータをバインディングする（結びつける）こともできます。ただし属性の場合、Mustache構文は使えません。その代わり、<code>v-bind</code> という特別な属性を使います。<code>v-bind</code> などのVue.jsで使う特別な属性のことを、<strong>ディレクティブ</strong> と言います。ディレクティブ（Directive）とは、「指示」や「命令」という意味です。ちなみにディレクター(Director)だと、指示する人のことです。</p>

<p><em>index.html</em> のテンプレートと <em>main.js</em> を、以下のとおりに書いてみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;a</span> <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">url</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>テックアカデミー<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">url</span>: <span class="string"><span class="delimiter">'</span><span class="content">https://techacademy.jp/</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/tiqaxav/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードではa要素のhref属性値として、Vueインスタンスのデータをバインディングしています。v-bindディレクティブを使うと、要素の属性値にVueインスタンスのデータを結びつけることができます。<code>v-bind:</code> のすぐ後に書いている属性名は、v-bindディレクティブの引数になります。<code>v-bind</code> に限らず、ディレクティブには引数を渡すものがあります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/v-bind.png" alt=""></p>

<p>もう１つ、v-bindディレクティブの例を書いてみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attribute-name">v-bind:value</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;p&gt;</span>{{ name }}<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jizowec/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードではinput要素のvalue属性値として、Vueインスタンスのデータをバインディングしています。またMustache構文を使って、同じデータをテキストとしてもバインディングしています。</p>

<p>v-bindディレクティブを使ってバインディングしたデータも、変更すると自動的に更新されます。デベロッパーツールのコンソールに、以下のように入力してみてください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>app.name = <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>
</pre></div>
</div>
</div>

<p>input要素のvalue属性値とp要素のテキストが、自動的に更新されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/instance_data_change2_1.gif" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-2-5">2.5 リストを表示する
</h3><p><code>v-for</code> というディレクティブを使うと、配列またはオブジェクトを繰り返し処理して表示できます。配列の場合、<code>要素を格納した変数 in 配列</code> という形の特別な構文を使います。</p>

<p>以下のコードを書いてみましょう。配列の各要素を、リスト表示します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;li</span>
   <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">member in members</span><span class="delimiter">"</span></span>
   <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">member</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    {{ member }}
  <span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">members</span>: [<span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">サル</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">キジ</span><span class="delimiter">'</span></span>],
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/qibomi/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記の <code>v-for="member in members"</code> では、<code>members</code> が配列です。この配列は、ここではVueインスタンスのデータです。そして <code>member</code> には、繰り返し処理の中で配列の要素が入ります。ここでは <code>member</code> としていますが、他の変数名にしても構いません。</p>

<p>member変数の値を、li要素内のテキストとして表示しています。またv-bindディレクティブを使って、li要素の <code>key</code> という属性の値としても指定しています。key属性は「それぞれの要素は別のものである」としてVue自身が識別するために必要です。たとえばリストの並び順を更新する場合、このkey属性で識別して要素を並び替えます。ul要素の中のli要素など、同じ親の中の子要素はkey属性の値を一意（ユニーク）にしなければなりません。それぞれの要素を区別する必要があるので、重複する値はダメです。</p>

<p>v-forディレクティブは、<code>(要素を格納した変数, 要素のインデックスを格納した変数) in 配列</code>という形で書くこともできます。</p>

<p>先ほどの <em>index.html</em> に書いたテンプレートを、以下のように書き換えてみましょう。<em>main.js</em> は先ほどと同じです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;li</span>
    <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">(member, index) in members</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">index</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    {{ index }}：{{ member }}
  <span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kifidit/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>リスト表示に、各要素のインデックスを加えました。</p>

<p>v-forディレクティブは、オブジェクトを繰り返し処理して表示することもできます。オブジェクトでは、<code>プロパティの値を格納した変数 in オブジェクト</code> という形の構文を使います。</p>

<p>以下のコードを書いてみましょう。オブジェクトのプロパティの値をリスト表示しています。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;li</span>
    <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">character in characters</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">character</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    {{ character }}
  <span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">characters</span>: {
      <span class="key">hero</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
      <span class="key">friend</span>: <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>,
      <span class="key">enemy</span>: <span class="string"><span class="delimiter">'</span><span class="content">鬼</span><span class="delimiter">'</span></span>,
    },
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/nofefoq/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>また <code>(プロパティの値を格納した変数, プロパティ名を格納した変数) in オブジェクト</code> という形で、プロパティ名を利用することもできます。</p>

<p>先ほどのコードを、以下のように書き換えてみましょう。<em>main.js</em> は先ほどと同じです。</p>

<p><em>index.htmlに書くテンプレート</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;li</span>
    <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">(character, key) in characters</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">key</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    {{ key }}：{{ character }}
  <span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">characters</span>: {
      <span class="key">hero</span>: <span class="string"><span class="delimiter">'</span><span class="content">桃太郎</span><span class="delimiter">'</span></span>,
      <span class="key">friend</span>: <span class="string"><span class="delimiter">'</span><span class="content">イヌ</span><span class="delimiter">'</span></span>,
      <span class="key">enemy</span>: <span class="string"><span class="delimiter">'</span><span class="content">鬼</span><span class="delimiter">'</span></span>,
    },
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/wifuzop/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>オブジェクトのプロパティ名と値を、リスト表示しています。key属性は一意であれば良いので、この場合は <code>character</code> (プロパティの値)と <code>key</code> (プロパティ名)のどちらをkey属性に指定しても構いません。</p>

<p>さらに配列の要素のように、オブジェクトでもプロパティのインデックスが必要であれば、<code>(プロパティの値を格納した変数, プロパティ名を格納した変数, プロパティのインデックス) in オブジェクト</code>という形で書くこともできます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-6">2.6 イベントを処理する
</h3><p>先ほど<a href="vue#chapter-2-4">input要素を使ったコード</a>を書きました。このコードには、１つ気になる点があります。それはinput要素の入力内容を変更しても、Vueインスタンスのデータは更新されないことです。データが更新されないため、先ほどのコードではp要素のテキストも更新されません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/instance_data_change3.gif" alt=""></p>

<p>input要素への入力からデータを更新するには、<code>v-on</code> というディレクティブを使います。v-onディレクティブは、要素のイベントを処理するためのディレクティブです。v-onディレクティブの引数で指定したイベントが起きると、属性値の式が実行されます。（後で解説しますが、v-onディレクティブの属性値には<a href="vue#chapter-2-11">メソッド名</a>を書くこともできます。）</p>

<p>以下のコードを書いてみましょう。input要素に入力した値で、データを更新しています。<em>main.js</em> は、先ほどと同じです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span>
    <span class="attribute-name">v-bind:value</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-on:input</span>=<span class="string"><span class="delimiter">"</span><span class="content">name = $event.target.value</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
  <span class="tag">&lt;p&gt;</span>{{ name }}<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/cuviyup/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>input要素の入力内容を変更すると、p要素のテキストも更新されるようになりました。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/two_way_binding.gif" alt=""></p>

<p>input要素に入力すると、inputイベントが発生します。上記のコードではinputイベントが起きるたびに、<code>name = $event.target.value</code> という式が実行されます。<code>$event</code> は、イベントオブジェクトにアクセスするための特別な変数です。ここではイベントオブジェクトにアクセスして、input要素に入力された値を取得しています。そして取得した値をもとに、Vueインスタンスのデータである <code>name</code> を更新しています。これでinput要素の入力内容を変更すると、データが更新されるようになりました。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/v-on.png" alt=""></p>

<p>このようにVueインスタンスのデータが変更されたときにテンプレートを更新するだけでなく、テンプレートからもデータを更新できることを、<strong>双方向データバインディング</strong> と言います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-7">2.7 ディレクティブの省略記法
</h3><p><code>v-bind</code> は、とてもよく使うディレクティブです。そのため簡単に書けるよう、省略記法が用意されています。まずv-bindディレクティブを省略せずに書くと、<code>v-bind:属性名=JavaScriptの式</code> という書き方になります。これが省略記法では、<code>:属性名=JavaScriptの式</code> と書けます。つまり、<code>v-bind</code> という記述を省略できるということです。</p>

<p>たとえば先ほどテンプレートに書いたinput要素は、以下のように書き換えることができます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="attribute-name">v-on:input</span>=<span class="string"><span class="delimiter">"</span><span class="content">name = $event.target.value</span><span class="delimiter">"</span></span> <span class="attribute-name">:value</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>またv-onディレクティブにも、省略記法が用意されています。省略記法では、<code>@イベントのタイプ=JavaScriptの式</code> と書けます。つまり、<code>v-on:</code> を <code>@</code> に置き換えられるということです。</p>

<p>そのため先ほどのinput要素は、以下のように書き換えることができます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="error">@</span><span class="attribute-name">input</span>=<span class="string"><span class="delimiter">"</span><span class="content">name = $event.target.value</span><span class="delimiter">"</span></span> <span class="attribute-name">:value</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>省略記法を使う場合には、コードのどこでも省略記法を統一して使いましょう。<code>v-bind:属性名</code> と <code>:属性名</code> や、<code>v-on:</code> と <code>@</code> が混在していると、コードが読みにくくなります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-8">2.8 フォームに入力する
</h3><p>input要素の入力からデータを更新できるようにするため、先ほどはv-onディレクティブとv-bindディレクティブを使いました。フォームの場合は、複数の項目に入力することがよくあります。そのためには項目によって、inputやtextarea、selectなど、複数の要素を用意する必要があります。これら複数の要素に対して、それぞれv-onディレクティブとv-bindディレクティブを使って書くのは面倒です。またコードが少し複雑になり、タイプミスなどによる不具合も起きやすいでしょう。</p>

<p>そのためフォームの入力要素には、省略した書き方が用意されています。省略して書くためには、<code>v-model</code> というディレクティブを使います。たとえば先ほどのテンプレートは、v-modelディレクティブを使って以下のように書き換えられます。<em>main.js</em> は、先ほどと同じです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;p&gt;</span>{{ name }}<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">name</span>: <span class="string"><span class="delimiter">'</span><span class="content">太郎</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/jibamin/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>これでv-onディレクティブとv-bindディレクティブを使った場合と同じように、v-modelディレクティブを使って双方向データバインディングができます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-9">2.9 算出プロパティ
</h3><p>もう１つ、v-modelディレクティブを使った例を書いてみましょう。身長と体重を入力すると、BMI(体格指数)が表示されるフォームを作ります。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;div&gt;</span>
    <span class="tag">&lt;p&gt;</span>
      身長： <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">height</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span> cm
    <span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;p&gt;</span>
      体重： <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">weight</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span> kg
    <span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div&gt;</span>
    BMI: {{ weight / ((height / 100) * (height / 100)) || '' }}
  <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">height</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
    <span class="key">weight</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/hanilac/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>input要素に身長と体重をそれぞれ入力すると、BMIが表示されます。BMIは、体重(kg)を身長(m)の２乗で割ることにより計算できます。このような難しい計算処理を、テンプレート内に書くとコードが分かりにくくなります。またテンプレート内のMustache構文やディレクティブには、１つの式しか書けません。そのため複雑な処理などは、別の場所に書きます。ここでは、<strong>算出プロパティ</strong> を使います。</p>

<p>算出プロパティを使うと、以下のように書けます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;div&gt;</span>
    <span class="tag">&lt;p&gt;</span>身長： <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">height</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span> cm<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;p&gt;</span>体重： <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">weight</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span> kg<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div&gt;</span>
    BMI: {{ bmi }}
  <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">height</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
    <span class="key">weight</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
  },
  <span class="key">computed</span>: {
    bmi() {
      <span class="keyword">if</span> (<span class="local-variable">this</span>.height &amp;&amp; <span class="local-variable">this</span>.weight) {
        <span class="comment">// センチメートルをメートルに変換する</span>
        const meterHeight = <span class="local-variable">this</span>.height / <span class="integer">100</span>;

        <span class="comment">// BMIを計算する</span>
        const bmi = <span class="local-variable">this</span>.weight / (meterHeight * meterHeight);

        <span class="comment">// 小数点以下の桁数を、２桁にして返す</span>
        <span class="keyword">return</span> bmi.toFixed(<span class="integer">2</span>);
      }

      <span class="keyword">return</span> <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    },
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/locokic/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>dataオプションと同じく、算出プロパティもオプションオブジェクトのプロパティとして書きます。オプションオブジェクトとは、<code>new Vue(...)</code> の引数として渡すオブジェクトのことでしたね。算出プロパティの場合、オプション（プロパティ）名は <code>computed</code> です。この <code>computed</code> の値としてオブジェクトを定義して、その中に関数を書きます。そうすると、dataオプションのデータと同じようにアクセスできます。算出プロパティの中には関数を書きますが、アクセスするときはプロパティとして扱います。そのためテンプレートなどからアクセスするときに、呼び出すための <code>()</code> は不要です。</p>

<p>また上記で算出プロパティに書いている <code>this</code> は、Vueインスタンスを指します。テンプレートとは違い、算出プロパティなどからは <code>this.データ名</code> と書くことでVueインスタンスのデータにアクセスできます。</p>

<p>算出プロパティを使うことで、テンプレートが分かりやすくなりました。また算出プロパティは、関数で処理を書くことができます。そのため１つの式ではできない、複雑な計算などもできるようになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-10">2.10 メソッド
</h3><p>先ほど算出プロパティを使って書いたコードは、Vueインスタンスの <strong>メソッド</strong> を使って書き換えることができます。算出プロパティと同じく、メソッドもオプションオブジェクトのプロパティとして書きます。メソッドの場合、オプション名は <code>methods</code> です。</p>

<p>以下のコードを書いてみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;div&gt;</span>
    <span class="tag">&lt;p&gt;</span>身長： <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">height</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span> cm<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;p&gt;</span>体重： <span class="tag">&lt;input</span> <span class="attribute-name">v-model</span>=<span class="string"><span class="delimiter">"</span><span class="content">weight</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span> kg<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;div&gt;</span>
    BMI: {{ getBmi() }}
  <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">height</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
    <span class="key">weight</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
  },
  <span class="key">methods</span>: {
    getBmi() {
      <span class="keyword">if</span> (<span class="local-variable">this</span>.height &amp;&amp; <span class="local-variable">this</span>.weight) {
        <span class="comment">// センチメートルをメートルに変換する</span>
        const meterHeight = <span class="local-variable">this</span>.height / <span class="integer">100</span>;

        <span class="comment">// BMIを計算する</span>
        const bmi = <span class="local-variable">this</span>.weight / (meterHeight * meterHeight);

        <span class="comment">// 小数点以下の桁数を、２桁にして返す</span>
        <span class="keyword">return</span> bmi.toFixed(<span class="integer">2</span>);
      }

      <span class="keyword">return</span> <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    },
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/tupuhut/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>先ほど算出プロパティに書いた関数を、メソッドに移しただけです。メソッドをMustache構文で使う場合、呼び出すために <code>()</code> が必要です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-11">2.11 算出プロパティとメソッドの使い分け
</h3><p>算出プロパティとメソッドには、大きな違いがあります。それは、算出プロパティはキャッシュされるということです。キャッシュというのは、データを一時的に保存しておくことです。算出プロパティの場合、参照しているVueインスタンスのデータが更新されたときだけ、再計算されます。たとえば先ほどのBMIを求めるコードでは <code>this.height</code> と <code>this.weight</code> が、参照しているVueインスタンスのデータです。</p>

<p>以下のコードを確認してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;p&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp()</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>{{ count }} 回<span class="tag">&lt;/button&gt;</span>
  <span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p&gt;</span>現在時刻（メソッド）： {{ getDate() }}<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;p&gt;</span>現在時刻（算出プロパティ）： {{ date }}<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const app = <span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">count</span>: <span class="integer">0</span>,
  },
  <span class="key">computed</span>: {
    date() {
      <span class="keyword">return</span> <span class="keyword">new</span> Date().toLocaleString();
    },
  },
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.count += <span class="integer">1</span>;
    },
    getDate() {
      <span class="keyword">return</span> <span class="keyword">new</span> Date().toLocaleString();
    },
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kahiwer/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ボタンをクリックすると、メソッドの <code>countUp</code> が呼び出されます。<code>countUp</code> の呼び出しにより、Vueインスタンスのデータである <code>count</code> の値が変化します。<code>count</code> の値が変化することで、 <code>count</code> と結びついたbutton要素内のテキスト（数字）が更新されます。言い換えれば、再描画されるということです。このとき、「現在時刻（メソッド）」も更新されます。なぜならメソッドは再描画が起きるたびに、再計算されるからです。一方で算出プロパティは、参照しているVueインスタンスのデータが更新されたときだけ再計算されます。そのため上記のコードで、「現在時刻（算出プロパティ）」は更新されません。<code>new Date().toLocaleString()</code> は、Vueインスタンスのデータではないからです。そのため再計算されず、代わりにキャッシュを返します。</p>

<p>基本的には算出プロパティを使うことで、余分な処理が実行されることを防げます。メソッドは、呼ばれるたびに実行する必要のある処理で使うようにしましょう。</p>

<p>なおv-onディレクティブの属性値には、メソッド呼び出しの式ではなく、メソッド名だけを書くこともできます。そのため上記のテンプレートのbutton要素は、以下のように書き換えられます。</p>

<p><em>メソッド呼び出しの式を書く場合</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp()</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>{{ count }} 回<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<p><em>メソッド名だけを書く場合</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>{{ count }} 回<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>
</div></section><section id="chapter-3"><h2 class="index">3. タブ機能を作る
</h2><div class="subsection"><p>Lesson4ではjQueryを使って、タブの作成をしました。ここでは、Vue.jsを使ってタブの作成をします。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 クラスと表示・非表示の切り替え
</h3><p>まずはLesson4の<a href="jquery#chapter-9-2">9.2 タブ</a>を参考にして、HTMLにテンプレートを書きます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;ul</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;li</span>
          <span class="attribute-name">v-bind:class</span>=<span class="string"><span class="delimiter">"</span><span class="content">{active: activeTab === 'tabs-1'}</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab = 'tabs-1'</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
          タブ1
        <span class="tag">&lt;/li&gt;</span>
        <span class="tag">&lt;li</span>
          <span class="attribute-name">v-bind:class</span>=<span class="string"><span class="delimiter">"</span><span class="content">{active: activeTab === 'tabs-2'}</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab = 'tabs-2'</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
          タブ2
        <span class="tag">&lt;/li&gt;</span>
        <span class="tag">&lt;li</span>
          <span class="attribute-name">v-bind:class</span>=<span class="string"><span class="delimiter">"</span><span class="content">{active: activeTab === 'tabs-3'}</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab = 'tabs-3'</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
          タブ3
        <span class="tag">&lt;/li&gt;</span>
      <span class="tag">&lt;/ul&gt;</span>
      <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;section</span> <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-1'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;p&gt;</span>タブ1の内容が入ります。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;/section&gt;</span>
        <span class="tag">&lt;section</span> <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-2'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;p&gt;</span>タブ2の内容が入ります。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;/section&gt;</span>
        <span class="tag">&lt;section</span> <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-3'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;p&gt;</span>タブ3の内容が入ります。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;/section&gt;</span>
      <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>上記テンプレートの、li要素を見てください。まず <code>v-on:click="activeTab = 'tabs-1'"</code> で、クリックしたら <code>activeTab</code> に <code>'tabs-1'</code> という文字列を入れるように指定します。この <code>activeTab</code> は、Vueインスタンスのデータです。後ほど設定します。</p>

<p>同じくli要素の <code>v-bind:class</code> では、v-bindディレクティブの引数にclass属性を渡しています。そして属性値には、オブジェクトを渡しています。このオブジェクトのプロパティ名が、クラスを表します。プロパティの値がtrueとなる場合に、プロパティ名がクラスとして要素に反映されます。たとえば <code>{active: activeTab === 'tabs-1'}</code> というオブジェクトでは、<code>activeTab</code> の値が <code>'tabs-1'</code> という文字列に一致すると、<code>{active: true}</code> となります。その結果、<code>active</code> というクラスが要素に加えられます。</p>

<p>またタブの内容が入っているsection要素では、<code>v-show</code> というディレクティブを使っています。v-showディレクティブでは、属性値が <code>true</code> となる場合に、要素を表示します。反対に <code>false</code> となる場合、非表示にします。</p>

<p>次に、上記のテンプレートをもとにしてVueインスタンスを作ります。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">activeTab</span>: <span class="string"><span class="delimiter">'</span><span class="content">tabs-1</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><code>activeTab</code> というデータの初期値として、<code>'tabs-1'</code> という文字列を定義しています。なおこれまで、作成したVueインスタンスは変数に代入してきました。<code>const app = new Vue({{...})</code> という形です。しかしVueインスタンスを他で利用しない場合、変数に代入する必要はありません。</p>

<p>最後にCSSファイルを、同じくLesson4の<a href="jquery#chapter-9-2">9.2 タブ</a>を参考にして用意します。</p>

<p><em>main.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">body</span> {
  <span class="key">color</span>: <span class="color">#3f4548</span>;
}

<span class="comment">/* ulのデフォルトスタイルを消去 */</span>
<span class="class">.tabs-menu</span> {
  <span class="key">margin</span>: <span class="float">0</span>;
  <span class="key">padding</span>: <span class="float">0</span>;
  <span class="key">list-style-type</span>: <span class="value">none</span>;
}

<span class="comment">/* タブの基本スタイル */</span>
<span class="class">.tabs-menu</span> <span class="tag">li</span> {
  <span class="key">display</span>: <span class="value">block</span>;
  <span class="key">float</span>: <span class="value">left</span>;
  <span class="key">margin-right</span>: <span class="float">8px</span>;
  <span class="key">margin-bottom</span>: <span class="float">-1px</span>;
  <span class="key">padding</span>: <span class="float">10px</span> <span class="float">20px</span>;
  <span class="key">border-style</span>: <span class="value">solid</span>;
  <span class="key">border-width</span>: <span class="float">1px</span>;
  <span class="key">border-color</span>: <span class="value">transparent</span>;
  <span class="key">border-radius</span>: <span class="float">4px</span> <span class="float">4px</span> <span class="float">0</span> <span class="float">0</span>;
  <span class="key">color</span>: <span class="color">#557f95</span>;
  <span class="key">text-decoration</span>: <span class="value">none</span>;

  <span class="comment">/* 各プロパティをふわっと変える演出 */</span>
  <span class="key">transition</span>: <span class="value">all</span> <span class="float">0.15s</span>;
}

<span class="comment">/* タブにマウスを乗せたらカーソルの形を変える */</span>
<span class="class">.tabs-menu</span> <span class="tag">li</span><span class="pseudo-class">:hover</span> {
  <span class="key">cursor</span>: <span class="value">pointer</span>;
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
<span class="class">.tabs-menu</span> <span class="class">.active</span> {
  <span class="key">color</span>: <span class="color">#3f4548</span>;
}

<span class="comment">/* タブコンテンツ表示エリア */</span>
<span class="class">.tabs-content</span> {
  <span class="key">clear</span>: <span class="value">both</span>;
  <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#999</span>;
  <span class="key">border-radius</span>: <span class="float">0</span> <span class="float">4px</span> <span class="float">4px</span> <span class="float">4px</span>;
  <span class="key">padding</span>: <span class="float">10px</span>;
}
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/vizataf/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p>Vue.jsを使って、タブの作成ができました。タブをクリックすると、Vueインスタンスのデータである <code>activeTab</code> の値が変更されます。この変更をもとに、タブとタブの内容が更新されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 v-ifによる表示・非表示の切り替え
</h3><p>先ほどは <code>v-show</code> ディレクティブを使って、タブの内容を切り替えました。この切り替えは、 <code>v-if</code> というディレクティブを使って書くこともできます。<code>v-if</code> ディレクティブを使ってタブを作成すると、タブの内容部分は以下のように書けます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-1'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブ1の内容が入ります。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-2'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブ2の内容が入ります。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-3'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブ3の内容が入ります。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
<span class="tag">&lt;/section&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/melifiy/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p><code>v-show</code> ディレクティブと同じく、<code>v-if</code> ディレクティブでも属性値が <code>true</code> となる場合に要素を表示します。反対に <code>false</code> となる場合、非表示にします。また <code>v-if</code> と <code>v-else-if</code> を組み合わせて書くと、まず <code>v-if</code> の属性値が評価されます。その値が <code>true</code> となる場合、<code>v-if</code> が書かれた要素を表示します。<code>false</code> の場合は、<code>v-if</code> の直後に書かれた <code>v-else-if</code> の属性値が評価されます。そしてその値が <code>true</code> となる場合、その <code>v-else-if</code> が書かれた要素を表示します。<code>false</code> の場合は、次に書かれた <code>v-else-if</code> の属性値が評価されます。</p>

<p>また、<code>v-else</code> というディレクティブもあります。<code>v-else</code> は、その上に書かれた <code>v-if</code> と <code>v-else-if</code> の属性値がすべて <code>false</code> となる場合に表示されます。たとえば以下のコードでは、初期状態ではどのタブも選択状態にしていません。代わりに、タブの選択を促す「タブを選択してください。」というメッセージを表示します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-1'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブ1の内容が入ります。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-2'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブ2の内容が入ります。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab === 'tabs-3'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブ3の内容が入ります。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">v-else</span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>タブを選択してください。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
<span class="tag">&lt;/section&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">activeTab</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/qowofi/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p>上記のコードは、<code>v-show</code> のように <code>v-if</code> だけで書くこともできます。ただ <code>v-else-if</code> と <code>v-else</code> も使うと、１度に表示する要素は１つということが分かりやすくなります。処理としても、1度に表示する要素は１つであることが保証されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 v-showとv-ifの使い分け
</h3><p>v-showディレクティブやv-ifディレクティブを使うと、どちらも要素の表示・非表示を切り替えられます。しかし、切り替え方法が異なります。<code>v-show</code> の場合、スタイル属性のdisplayプロパティを操作して切り替えます。非表示の場合、style属性の値を <code>display: none;</code> にします。</p>

<p><a href="vue#chapter-3-1">v-showディレクティブを使った例</a>をブラウザで表示して、デベロッパーツールで確認してみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/v-show.png" alt=""></p>

<p>非表示になっているタブの内容には、<code>style="display: none;"</code> が指定されていますね。</p>

<p>v-ifの場合、要素そのものを追加・削除して切り替えます。非表示の場合は、要素を削除します。こちらも、<a href="vue#chapter-3-2">v-ifディレクティブを使った例</a>をデベロッパーツールで確認してみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/v-if.png" alt=""></p>

<p>表示されているタブの内容以外は、HTMLに存在しないことが確認できます。</p>

<p><code>v-show</code> の場合、表示・非表示に関わらず、最初にすべての要素を作成して描画します。そして表示する要素以外は、<code>display: none;</code> で非表示にします。一方で <code>v-if</code> の場合、描画するのは表示する要素だけです。つまり属性値が <code>true</code> となるまで、描画処理を後回しにできます。そのため <code>v-if</code> の方が、初期表示の処理負担を軽くできます。表示する要素以外は、描画しなくて済むからです。</p>

<p>しかし何度も表示・非表示を切り替える場合は、<code>v-show</code> の方が処理の負担を軽くできます。<code>v-show</code> で要素のスタイル属性を変更する処理の方が、<code>v-if</code> で要素そのものを追加・削除する処理より負担が軽いからです。</p>

<p>そのため <code>v-show</code> と <code>v-if</code> のどちらを使うかは、切り替えの頻度を基準にします。頻繁に表示・非表示を切り替える場合は <code>v-show</code> を使い、一度表示したらほとんど切り替えない場合は <code>v-if</code> を使うと良いでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 配列情報をもとにしたタブ作成
</h3><p>これまでの例では、タブとその内容をテンプレートに直接書いてきました。しかし実際の開発では、表示する情報が事前に分からないこともあります。たとえばAPIやデータベースから、配列やオブジェクトとして取得した情報をもとに、タブを作成するといった場合があります。</p>

<p>このような場合を想定して、タブを作成してみましょう。まずテンプレートを書きます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;template</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs !== null</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;ul</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;li</span>
        <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">tab in tabs</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">tab.id</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-bind:class</span>=<span class="string"><span class="delimiter">"</span><span class="content">{active: activeTab.id === tab.id}</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">activeTab = tab</span><span class="delimiter">"</span></span>
      <span class="tag">&gt;</span>
        {{ tab.title }}
      <span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;/ul&gt;</span>
    <span class="tag">&lt;section</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">tabs-content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;section&gt;</span>
        <span class="tag">&lt;p&gt;</span>{{ activeTab.content }}<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;/section&gt;</span>
    <span class="tag">&lt;/section&gt;</span>
  <span class="tag">&lt;/template&gt;</span>
  <span class="tag">&lt;template</span> <span class="attribute-name">v-else</span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>データを取得中です。<span class="tag">&lt;/p&gt;</span>
  <span class="tag">&lt;/template&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>上記のコードでは、<code>template</code> という特別な要素を使っています。このtemplate要素で、<code>v-if</code> と <code>v-else</code> ディレクティブの対象となる要素を囲っています。template要素の代わりに、divなど他の要素を使うこともできます。しかしtemplate要素には、実際のHTMLには描画されないという利点があります。ディレクティブの処理で必要だからという理由で、divなどの余分な要素を加えるのはあまり良くありません。このような場合に、template要素を使います。</p>

<p>またv-ifディレクティブの属性値としている <code>"tabs !== null"</code> は、<code>tabs</code> の値が <code>null</code> でないときに <code>true</code> となります。<code>tabs</code> は、Vueインスタンスのデータです。配列の要素として、各タブの情報が入ります。</p>

<p>それでは次に、Vueインスタンスを作成します。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">tabs</span>: <span class="predefined-constant">null</span>,
    <span class="key">activeTab</span>: <span class="predefined-constant">null</span>,
  },
  created() {
    const vm = <span class="local-variable">this</span>;
    setTimeout(() =&gt; {
      const fetchedData = [
        {
          <span class="key">id</span>: <span class="string"><span class="delimiter">'</span><span class="content">tabs-1</span><span class="delimiter">'</span></span>,
          <span class="key">title</span>: <span class="string"><span class="delimiter">'</span><span class="content">タブ１</span><span class="delimiter">'</span></span>,
          <span class="key">content</span>: <span class="string"><span class="delimiter">'</span><span class="content">タブ１の内容が入ります。</span><span class="delimiter">'</span></span>,
        },
        {
          <span class="key">id</span>: <span class="string"><span class="delimiter">'</span><span class="content">tabs-2</span><span class="delimiter">'</span></span>,
          <span class="key">title</span>: <span class="string"><span class="delimiter">'</span><span class="content">タブ２</span><span class="delimiter">'</span></span>,
          <span class="key">content</span>: <span class="string"><span class="delimiter">'</span><span class="content">タブ２の内容が入ります。</span><span class="delimiter">'</span></span>,
        },
        {
          <span class="key">id</span>: <span class="string"><span class="delimiter">'</span><span class="content">tabs-3</span><span class="delimiter">'</span></span>,
          <span class="key">title</span>: <span class="string"><span class="delimiter">'</span><span class="content">タブ３</span><span class="delimiter">'</span></span>,
          <span class="key">content</span>: <span class="string"><span class="delimiter">'</span><span class="content">タブ３の内容が入ります。</span><span class="delimiter">'</span></span>,
        },
      ];
      vm.tabs = fetchedData;
      vm.activeTab = fetchedData[<span class="integer">0</span>];
    }, <span class="integer">2000</span>);
  },
});
</pre></div>
</div>
</div>

<p>オプションオブジェクトに、<code>created</code> というオプションを追加しています。ここに定義した関数は、Vueインスタンスが作成された後で呼ばれます。このように特定のタイミングで呼ばれる関数を、<strong>ライフサイクルフック</strong> と言います。詳しくは公式ガイドの<a href="https://jp.vuejs.org/v2/guide/instance.html#%E3%82%A4%E3%83%B3%E3%82%B9%E3%82%BF%E3%83%B3%E3%82%B9%E3%83%A9%E3%82%A4%E3%83%95%E3%82%B5%E3%82%A4%E3%82%AF%E3%83%AB%E3%83%95%E3%83%83%E3%82%AF" target="_blank">インスタンスライフサイクルフック</a>を参照してください。</p>

<p>上記のコードではこの関数内で、setTimeoutメソッドを呼び出しています。APIからデータを取得する場合などを想定して、非同期でデータが得られたようにするためです。setTimeoutメソッドや非同期処理については、Lesson3の<a href="javascript#chapter-4-14">4.14 非同期処理</a>をご確認ください。</p>

<p>createdフックを含めライフサイクルフックには、<code>this</code> の値としてVueインスタンスが入ります。しかしsetTimeoutメソッドの第１引数に渡した関数については、<code>this</code> の値がVueインスタンスになりません。これはsetTimeoutメソッドに渡した関数が、指定した時間が経過した後に非同期で呼び出されることと関係しています。そのためsetTimeoutメソッドに渡した関数からVueインスタンスにアクセスするためには、あらかじめVueインスタンスを変数に代入しておく必要があります。</p>

<p>上記のコードでは、<code>vm</code> という変数にVueインスタンスを代入しています。慣例として、Vueインスタンスを入れる変数の名前は <code>vm</code> にすることが多いです。</p>

<p>setTimeoutメソッドに渡した関数が呼び出されると、Vueインスタンスのデータである <code>tabs</code> にタブの情報が代入されます。このデータは、配列です。初期状態として <code>activeTab</code> には、配列の最初の要素を代入しています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/tawugik/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p>ページを表示すると、まず「データを取得中です。」というメッセージが表示されます。その後、タブが表示されます。これはsetTimeoutメソッドで、2秒（2000ミリ秒）経過した後にVueインスタンスのデータが変更されるようにしているからです。</p>

<p>タブをクリックすると、<code>activeTab</code> の値が変更されます。この変更をもとに、タブとタブの内容が更新されます。</p>
</div></section><section id="chapter-4"><h2 class="index">4. カスタムディレクティブ
</h2><div class="subsection"><p>これまで、いくつかのディレクティブを見てきました。 <code>v-show</code>、 <code>v-if</code>、<code>v-for</code> などです。これらのディレクティブを使うことで、DOM操作を自動化できます。言い換えると、テンプレートにディレクティブを書くと、Vue.jsがDOM操作を代わりにやってくれるということです。たとえば <code>v-show</code> は、その属性値によって表示・非表示を切り替えるディレクティブです。これはVue.jsを通して、要素のstyle属性を操作しているということです。なおDOMやDOM操作については、Lesson3の<a href="javascript#chapter-7">7. DOM</a>をご確認ください。</p>

<p>これまで見てきたディレクティブ以外にも、多くのディレクティブが用意されています。詳しくは、公式の<a href="https://jp.vuejs.org/v2/api/#%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%86%E3%82%A3%E3%83%96" target="_blank">API：ディレクティブ</a>をご確認ください。しかし時には、もともと用意されているディレクティブではできないDOM操作をしたい場合があります。このような場合はディレクティブを自分で作り、Vueインスタンスに登録できます。<strong>カスタムディレクティブ</strong> と言います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 カスタムディレクティブを登録する
</h3><p>早速、カスタムディレクティブを見てみましょう。以下のコードでは、<code>v-hide-async</code> というカスタムディレクティブをVueインスタンスに登録しています。このカスタムディレクティブでは、属性値にミリ秒単位で秒数を渡します。この秒数が経過した後、要素が非表示になります。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">v-hide-async</span>=<span class="string"><span class="delimiter">"</span><span class="content">2000</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>２秒後に非表示<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.directive(<span class="string"><span class="delimiter">'</span><span class="content">hide-async</span><span class="delimiter">'</span></span>, {
  bind(el, binding) {
    setTimeout(() =&gt; {
      el.style.display = <span class="string"><span class="delimiter">'</span><span class="content">none</span><span class="delimiter">'</span></span>;
    }, binding.value);
  },
});

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/zixohub/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/custom-directive.gif" alt=""></p>

<p>カスタムディレクティブを登録するには、<code>Vue.directive</code> というメソッドを呼び出します。このメソッドには、２つの引数を渡します。第１引数は、カスタムディレクティブの名前です。ディレクティブの先頭に付く <code>v-</code> は、ここでは不要です。第２引数は、カスタムディレクティブの動作を定義するオブジェクトです。このオブジェクトに、<strong>フック関数</strong> という関数（メソッド）を入れます。</p>

<p>フック関数には、あらかじめ決められた名前で関数を定義します。この関数の名前によって、呼び出されるタイミングが決まります。</p>

<p>たとえば上記のコードでは <code>bind</code> という名前で関数を定義しています。<code>bind</code> は、ディレクティブが要素に紐づいたタイミングで１度だけ呼ばれるフック関数です。</p>

<p>その他にも、いくつかのタイミングが利用できます。たとえば <code>unbind</code> という名前で関数を定義すると、ディレクティブが紐づいている要素から取り除かれたタイミングで１度だけ呼び出されます。詳しくは、公式ガイドの<a href="https://jp.vuejs.org/v2/guide/custom-directive.html#%E3%83%95%E3%83%83%E3%82%AF%E9%96%A2%E6%95%B0" target="_blank">フック関数</a>を参照してください。</p>

<p>フック関数の引数にも、２つの引数が渡されます。第１引数は、ディレクティブが紐づく要素です。第２引数は、オブジェクトです。このオブジェクトの中に、ディレクティブの属性値として渡される値などが入っています。たとえば <code>v-hide-async="2000"</code> の場合、渡される値は <code>2000</code> という数値です。この値は、第２引数のオブジェクトのvalueプロパティに設定されています。そのほかのプロパティについて詳しくは、公式ガイドの<a href="https://jp.vuejs.org/v2/guide/custom-directive.html#%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%86%E3%82%A3%E3%83%96%E3%83%95%E3%83%83%E3%82%AF%E5%BC%95%E6%95%B0" target="_blank">ディレクティブフック引数</a>を参照してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/hook.png" alt=""></p>

<p>上記のコードで定義している、フック関数は以下の部分です。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  bind(el, binding) {
    setTimeout(() =&gt; {
      el.style.display = <span class="string"><span class="delimiter">'</span><span class="content">none</span><span class="delimiter">'</span></span>;
    }, binding.value);
  },
</pre></div>
</div>
</div>

<p>この関数ではsetTimeoutメソッドを使って、指定した時間が経過したら <code>el.style.display = 'none';</code> という処理を実行します。要素のstyle属性のdisplayプロパティに、<code>'none'</code>を入れる処理です。これによって、ディレクティブに紐づいている要素を非表示にします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/custom-directive.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 イベントハンドラを登録する
</h3><p>ディレクティブには、イベントが発生したときの動作を定義することもできます。たとえば以下のコードでは、クリックイベントが発生したときに文字色を変えます。変化させる色は、カスタムディレクティブの属性値として渡します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;p</span> <span class="attribute-name">v-change-color</span>=<span class="string"><span class="delimiter">"</span><span class="content">'red'</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>クリックすると赤に<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.directive(<span class="string"><span class="delimiter">'</span><span class="content">change-color</span><span class="delimiter">'</span></span>, {
  bind(el, binding) {
    el.addEventListener(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
      el.style.color = binding.value;
    });
  },
});

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/seqixom/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードでは、フック関数の第１引数として渡される要素（DOM要素）から、addEventListenerメソッドを呼び出しています。addEventListenerメソッドについては、Lesson3の<a href="javascript#chapter-6-5">6.5 イベント</a>で解説しています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/addEventListener.png" alt=""></p>

<p>今回はaddEventListenerメソッドに渡したイベントリスナーで、<code>el.style.color = binding.value;</code> という処理をします。<code>el.style.color</code> は、要素のstyle属性のcolorプロパティです。このcolorプロパティに、 <code>biding.value</code> の値を入れます。<code>biding.value</code> は、ディレクティブの属性値として渡された値です。上記のコードだとこの値は <code>'red'</code> という文字列です。colorプロパティに <code>'red'</code> を入れることで、文字色が赤に変わります。</p>
</div></section><section id="chapter-5"><h2 class="index">5. Flickr APIを使う
</h2><div class="subsection"><p>Lesson7の<a href="web-api#chapter-3">3. Flickr APIで写真を検索しよう</a>で、Flickr APIを使いましたね。APIから取得したデータをもとに、jQueryで描画（表示）しました。これをVue.jsで置き換えてみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 猫の写真を表示する
</h3><p>以下は、Vue.jsで置き換えたコードの全体です。Cloud9へコピーし、プレビュー表示してみましょう。コードの詳細は、後ほど説明します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Flickr API Test<span class="tag">&lt;/title&gt;</span>

  <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div&gt;</span>{{ total }} photos in total<span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;a</span>
        <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo in photos</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.id</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.pageURL</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-tooltip</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
        <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span>
        <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span>
      <span class="tag">&gt;</span>
        <span class="tag">&lt;img</span>
          <span class="attribute-name">v-bind:src</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.imageURL</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-bind:alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
          <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
          <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
      <span class="tag">&lt;/a&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>

  <span class="comment">&lt;!-- まずjQuery --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="comment">&lt;!-- Popper.js, 次に Bootstrap JS --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>次にJSファイルです。以下の2行目に、Lesson7で取得したAPIキーを入れてください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// Flickr API key</span>
const apiKey = <span class="string"><span class="delimiter">'</span><span class="content">ここにAPIキーを入れてください</span><span class="delimiter">'</span></span>;


<span class="comment">/**
 * --------------------
 * Flickr API 関連の関数
 * --------------------
 */</span>

<span class="comment">// 検索テキストに応じたデータを取得するためのURLを作成して返す</span>
const getRequestURL = (searchText) =&gt; {
  const parameters = <span class="predefined">$</span>.param({
    <span class="key">method</span>: <span class="string"><span class="delimiter">'</span><span class="content">flickr.photos.search</span><span class="delimiter">'</span></span>,
    <span class="key">api_key</span>: apiKey,
    <span class="key">text</span>: searchText, <span class="comment">// 検索テキスト</span>
    <span class="key">sort</span>: <span class="string"><span class="delimiter">'</span><span class="content">interestingness-desc</span><span class="delimiter">'</span></span>, <span class="comment">// 興味深さ順</span>
    <span class="key">per_page</span>: <span class="integer">12</span>, <span class="comment">// 取得件数</span>
    <span class="key">license</span>: <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>, <span class="comment">// Creative Commons Attributionのみ</span>
    <span class="key">extras</span>: <span class="string"><span class="delimiter">'</span><span class="content">owner_name,license</span><span class="delimiter">'</span></span>, <span class="comment">// 追加で取得する情報</span>
    <span class="key">format</span>: <span class="string"><span class="delimiter">'</span><span class="content">json</span><span class="delimiter">'</span></span>, <span class="comment">// レスポンスをJSON形式に</span>
    <span class="key">nojsoncallback</span>: <span class="integer">1</span>, <span class="comment">// レスポンスの先頭に関数呼び出しを含めない</span>
  });
  const url = <span class="error">`</span>https:<span class="comment">//api.flickr.com/services/rest/?${parameters}`;</span>
  <span class="keyword">return</span> url;
};

<span class="comment">// photoオブジェクトから画像のURLを作成して返す</span>
const getFlickrImageURL = (photo, size) =&gt; {
  let url = <span class="error">`</span>https:<span class="comment">//farm${photo.farm}.staticflickr.com/${photo.server}/${photo.id}_${</span>
    photo.secret
  }<span class="error">`</span>;
  <span class="keyword">if</span> (size) {
    <span class="comment">// サイズ指定ありの場合</span>
    url += <span class="error">`</span><span class="predefined">_$</span>{size}<span class="error">`</span>;
  }
  url += <span class="string"><span class="delimiter">'</span><span class="content">.jpg</span><span class="delimiter">'</span></span>;
  <span class="keyword">return</span> url;
};

<span class="comment">// photoオブジェクトからページのURLを作成して返す</span>
const getFlickrPageURL = photo =&gt; <span class="error">`</span>https:<span class="comment">//www.flickr.com/photos/${photo.owner}/${photo.id}`;</span>

<span class="comment">// photoオブジェクトからaltテキストを生成して返す</span>
const getFlickrText = (photo) =&gt; {
  let text = <span class="error">`</span><span class="string"><span class="delimiter">"</span><span class="content">${photo.title}</span><span class="delimiter">"</span></span> by <span class="predefined">$</span>{photo.ownername}<span class="error">`</span>;
  <span class="keyword">if</span> (photo.license === <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>) {
    <span class="comment">// Creative Commons Attribution（CC BY）ライセンス</span>
    text += <span class="string"><span class="delimiter">'</span><span class="content"> / CC BY</span><span class="delimiter">'</span></span>;
  }
  <span class="keyword">return</span> text;
};

<span class="comment">/**
 * ----------------------------------
 * Tooltipを表示するカスタムディレクティブ
 * ----------------------------------
 */</span>

Vue.directive(<span class="string"><span class="delimiter">'</span><span class="content">tooltip</span><span class="delimiter">'</span></span>, {
  bind(el, binding) {
    <span class="predefined">$</span>(el).tooltip({
      <span class="key">title</span>: binding.value,
      <span class="key">placement</span>: <span class="string"><span class="delimiter">'</span><span class="content">bottom</span><span class="delimiter">'</span></span>,
    });
  },
  unbind(el) {
    <span class="predefined">$</span>(el).tooltip(<span class="string"><span class="delimiter">'</span><span class="content">dispose</span><span class="delimiter">'</span></span>);
  },
});

<span class="comment">/**
 * -------------
 * Vueインスタンス
 * -------------
 */</span>

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#main</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">total</span>: <span class="integer">0</span>,
    <span class="key">photos</span>: [],
  },
  created() {
    const vm = <span class="local-variable">this</span>;
    const url = getRequestURL(<span class="string"><span class="delimiter">'</span><span class="content">cat</span><span class="delimiter">'</span></span>);

    <span class="predefined">$</span>.getJSON(url, (data) =&gt; {
      <span class="keyword">if</span> (data.stat !== <span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>) {
        <span class="keyword">return</span>;
      }

      vm.total = data.photos.total;
      vm.photos = data.photos.photo.map(photo =&gt; ({
        <span class="key">id</span>: photo.id,
        <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
        <span class="key">pageURL</span>: getFlickrPageURL(photo),
        <span class="key">text</span>: getFlickrText(photo),
      }));
    });
  },
});
</pre></div>
</div>
</div>

<p>Cloud9へコピーしたらプレビューをして、Lesson7の<a href="web-api#chapter-3">3. Flickr APIで写真を検索しよう</a>と同じように表示されることを確認してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 データとテンプレートを結びつける
</h3><p>Lesson7では写真を表示するために、jQueryで要素(DOM要素)を作りました。そして作った要素を、HTML（DOMツリー）に追加しました。具体的には、次の処理です。Lesson7の<a href="web-api#chapter-3-3">3.3 写真検索を実行する</a>に掲載しているコードです。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 空の&lt;div&gt;を作る</span>
const <span class="predefined">$div</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">&lt;div&gt;</span><span class="delimiter">'</span></span>);

<span class="comment">// ヒット件数</span>
<span class="predefined">$div</span>.append(<span class="error">`</span><span class="tag">&lt;div&gt;</span>${data.photos.total} photos in total<span class="tag">&lt;/div&gt;</span><span class="error">`</span>);

<span class="keyword">for</span> (let i = <span class="integer">0</span>; i &lt; data.photos.photo.length; i++) {
  const photo = data.photos.photo[i];
  const photoText = getFlickrText(photo);

  <span class="comment">// $divに &lt;a href="..." ...&gt;&lt;img src="..." ...&gt;&lt;/a&gt; を追加する</span>
  <span class="predefined">$div</span>.append(
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">&lt;a&gt;</span><span class="delimiter">'</span></span>, {
      <span class="key">href</span>: getFlickrPageURL(photo),
      <span class="reserved">class</span>: <span class="string"><span class="delimiter">'</span><span class="content">d-inline-block</span><span class="delimiter">'</span></span>,
      <span class="key">target</span>: <span class="string"><span class="delimiter">'</span><span class="content">_blank</span><span class="delimiter">'</span></span>, <span class="comment">// リンクを新規タブで開く</span>
      <span class="key"><span class="delimiter">'</span><span class="content">data-toggle</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">tooltip</span><span class="delimiter">'</span></span>,
      <span class="key"><span class="delimiter">'</span><span class="content">data-placement</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">bottom</span><span class="delimiter">'</span></span>,
      <span class="key">title</span>: photoText,
    }).append(
      <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">&lt;img&gt;</span><span class="delimiter">'</span></span>, {
        <span class="key">src</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
        <span class="key">width</span>: <span class="integer">150</span>,
        <span class="key">height</span>: <span class="integer">150</span>,
        <span class="key">alt</span>: photoText,
      }),
    ),
  );
}
<span class="comment">// $divを#mainに追加する</span>
<span class="predefined">$div</span>.appendTo(<span class="string"><span class="delimiter">'</span><span class="content">#main</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>jQueryでは処理の結果、どのように描画されるかが分かりづらいです。</p>

<p>これをVue.jsで置き換えると、以下のように書けます。先ほど載せた、完成版のコードの一部です。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;div&gt;</span>{{ total }} photos in total<span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;a</span>
    <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo in photos</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.id</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.pageURL</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-tooltip</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
    <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span>
    <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    <span class="tag">&lt;img</span>
      <span class="attribute-name">v-bind:src</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.imageURL</span><span class="delimiter">"</span></span>
      <span class="attribute-name">v-bind:alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
      <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
      <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
    <span class="tag">&gt;</span>
  <span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>テンプレートを使うことで、どのように描画されるか分かりやすくなりました。上記のコードでは、Vueインスタンスのデータとして <code>photos</code> という配列を用意しています。この配列の中に、写真を表示するためのデータを入れます。</p>

<p>それでは次に、Vueインスタンスの作成についてです。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#main</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">total</span>: <span class="integer">0</span>,
    <span class="key">photos</span>: [],
  },
  created() {
    const vm = <span class="local-variable">this</span>;
    const url = getRequestURL(<span class="string"><span class="delimiter">'</span><span class="content">cat</span><span class="delimiter">'</span></span>);

    <span class="predefined">$</span>.getJSON(url, (data) =&gt; {
      <span class="keyword">if</span> (data.stat !== <span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>) {
        <span class="keyword">return</span>;
      }

      vm.total = data.photos.total;
      vm.photos = data.photos.photo.map(photo =&gt; ({
        <span class="key">id</span>: photo.id,
        <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
        <span class="key">pageURL</span>: getFlickrPageURL(photo),
        <span class="key">text</span>: getFlickrText(photo),
      }));
    });
  },
});
</pre></div>
</div>
</div>

<p>APIから取得したデータをもとにして画像のURLなどを作成する処理は、Lesson7と同じです。しかしVue.jsの場合、要素の生成や、生成した要素をHTMLへ追加するなどのDOM操作を記述する必要がありません。その代わり、描画したいHTMLをテンプレートに書き、描画に必要なデータを作ります。上記のコードでは、写真の描画に必要なデータの作成を以下の部分で行なっています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>vm.photos = data.photos.photo.map(photo =&gt; ({
  <span class="key">id</span>: photo.id,
  <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
  <span class="key">pageURL</span>: getFlickrPageURL(photo),
  <span class="key">text</span>: getFlickrText(photo),
}));
</pre></div>
</div>
</div>

<p>mapメソッドは、配列を操作するためのメソッドです。使い方は、Lesson3の<a href="javascript#chapter-5-1">5.1 Arrayオブジェクト</a>をご確認ください。mapメソッドではなく、for文で書くこともできます。for文を使うと、以下のように書けます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const fetchedPhotos = data.photos.photo;
const arrangedPhotos = [];

<span class="keyword">for</span> (let i = <span class="integer">0</span>, len = fetchedPhotos.length; i &lt; len; i++) {
  const photo = fetchedPhotos[i];
  const arrangedPhoto = {
    <span class="key">id</span>: photo.id,
    <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
    <span class="key">pageURL</span>: getFlickrPageURL(photo),
    <span class="key">text</span>: getFlickrText(photo),
  };
  arrangedPhotos.push(arrangedPhoto);
}

vm.photos = arrangedPhotos;
</pre></div>
</div>
</div>

<p>これらの処理は、ライフサイクルフックのcreatedフックで行なっています。createdフックについては、Chapter3の<a href="vue#chapetr-3-4">3.4 配列情報をもとにしたタブ作成</a>で説明しました。Chapter3と同じく、上記のコードでもVueインスタンスを <code>vm</code> という変数に代入しています。$.getJSONメソッドでリクエスト成功時に呼び出される関数から、Vueインスタンスにアクセスするためです。setTimeoutメソッドと同じく、リクエスト成功時の関数も非同期で呼び出されます。このことが関係して、<code>this</code> ではVueインスタンスにアクセスできません。</p>

<div class="alert alert-info">
  APIからデータを取得するために、上記のコードではjQueryの$.getJSONメソッドを使っています。他にも、APIなどから非同期でデータを取得する方法はいくつかあります。たとえばVue.js公式のクックブックでは、axiosというライブラリを使った例が説明されています。興味のある方は、以下を参照してください。<br>
  <a href="https://jp.vuejs.org/v2/cookbook/using-axios-to-consume-apis.html">axios を利用した API の使用</a>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 カスタムディレクティブでjQueryを使う
</h3><p>Lesson7では、Tooltipを使って著作者名などを表示しました。以下のコード部分です。詳しくは、Lesson7の<a href="web-api#chapter-3-8">3.8 画像のクレジットを表示する</a>をご確認ください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// $divに &lt;a href="..." ...&gt;&lt;img src="..." ...&gt;&lt;/a&gt; を追加する</span>
<span class="predefined">$div</span>.append(
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">&lt;a&gt;</span><span class="delimiter">'</span></span>, {
    <span class="key">href</span>: getFlickrPageURL(photo),
    <span class="reserved">class</span>: <span class="string"><span class="delimiter">'</span><span class="content">d-inline-block</span><span class="delimiter">'</span></span>,
    <span class="key">target</span>: <span class="string"><span class="delimiter">'</span><span class="content">_blank</span><span class="delimiter">'</span></span>, <span class="comment">// リンクを新規タブで開く</span>
    <span class="key"><span class="delimiter">'</span><span class="content">data-toggle</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">tooltip</span><span class="delimiter">'</span></span>,
    <span class="key"><span class="delimiter">'</span><span class="content">data-placement</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">bottom</span><span class="delimiter">'</span></span>,
    <span class="key">title</span>: photoText,
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// BootstrapのTooltipを適用</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">[data-toggle="tooltip"]</span><span class="delimiter">'</span></span>).tooltip();
</pre></div>
</div>
</div>

<p><code>tooltip()</code> を、jQueryのメソッドとして呼び出しています。具体的にはまず、<code>"[data-toggle='tooltip']"</code> というセレクタに一致する要素を選択しています。そしてこの要素に、tooltipメソッドを通してイベントハンドラが登録されます。登録されたイベントハンドラによって、要素にマウスを載せるとツールチップが表示されます。</p>

<p>Vue.jsで上記のように直接DOM操作をする場合、chapter4で解説した<a href="chapter-4">カスタムディレクティブ</a>を使うのが良いです。他の所に書くこともできますが、どこからDOM操作しているのか分かりづらくなります。カスタムディレクティブにまとめることで、コードが分かりやすくなります。</p>

<p>以下のコードでは、<code>v-tooltip</code> というカスタムディレクティブを登録しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.directive(<span class="string"><span class="delimiter">'</span><span class="content">tooltip</span><span class="delimiter">'</span></span>, {
  bind(el, binding) {
    <span class="predefined">$</span>(el).tooltip({
      <span class="key">title</span>: binding.value,
      <span class="key">placement</span>: <span class="string"><span class="delimiter">'</span><span class="content">bottom</span><span class="delimiter">'</span></span>,
    });
  },
  unbind(el) {
    <span class="predefined">$</span>(el).tooltip(<span class="string"><span class="delimiter">'</span><span class="content">dispose</span><span class="delimiter">'</span></span>);
  },
});
</pre></div>
</div>
</div>

<p>上記のディレクティブでは、２つのフック関数を指定しています。</p>

<p>１つは <code>bind</code> です。<code>bind</code> は、ディレクティブが要素に紐づいたタイミングで１度だけ呼ばれます。このフック関数で、tooltipメソッドを呼び出すようにしています。メソッドの引数に渡しているのは、オプション(設定)です。<code>title</code> で表示する内容、<code>placement</code> で表示位置を設定しています。<code>binding.value</code> は、ディレクティブの属性値として渡される値です。</p>

<p>もう１つは <code>unbind</code> です。<code>unbind</code> は、ディレクティブが紐づいている要素から取り除かれたタイミングで１度だけ呼び出されます。このフック関数で、<code>bind</code> によって要素に紐づいたtooltipを非表示にして破棄（削除）します。</p>

<p>tooltipメソッドには、他にも色々なオプションを設定できます。詳しくは、<a href="https://getbootstrap.com/docs/4.1/components/tooltips/#options" target="_blank">Bootstrapの公式ドキュメント</a>をご確認ください。</p>

<p>作成した <code>v-tooltip</code> は、写真を囲むa要素に加えます。テンプレートの以下の部分です。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span>
  <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo in photos</span><span class="delimiter">"</span></span>
  <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.id</span><span class="delimiter">"</span></span>
  <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.pageURL</span><span class="delimiter">"</span></span>
  <span class="attribute-name">v-tooltip</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span> <span class="error">/</span><span class="error">/</span><span class="error">登</span><span class="error">録</span><span class="error">し</span><span class="error">た</span><span class="error">カ</span><span class="error">ス</span><span class="error">タ</span><span class="error">ム</span><span class="error">デ</span><span class="error">ィ</span><span class="error">レ</span><span class="error">ク</span><span class="error">テ</span><span class="error">ィ</span><span class="error">ブ</span>
  <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span>
  <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span>
<span class="tag">&gt;</span>
  <span class="tag">&lt;img</span>
    <span class="attribute-name">v-bind:src</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.imageURL</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
    <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
    <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p>テンプレートでは先ほど説明したように、<code>v-tooltip</code> の属性値としてツールチップに表示する内容を渡しています。</p>

<p>なおtooltipメソッドは、BootstrapによってjQueryに追加された機能です。jQueryは、任意のメソッドを追加してカスタマイズできるようになっているのです。このように外部から追加するメソッドのことを、jQueryのプラグインと言います。たとえばLesson6の<a href="library#chapter-7-1">Waypoints.js</a>や<a href="library#chapter-5-1">Magnific Popup</a>も、jQueryのプラグインとして利用しました。</p>

<p>Vue.jsでも、プラグインを利用できます。Vue.jsではプラグインを利用することで、メソッドやカスタムディレクティブ、コンポーネントなどを追加できます。コンポーネントについては、次のチャプターの<a href="vue#chapter-6">7.コンポーネント</a>で説明します。またVue.jsのプラグインについては、<a href="vue#chapter-8">8.プラグイン</a>で説明します。</p>

<div class="alert alert-info">
  Vue.jsのプラグインにも、ツールチップを表示できるものがあります。興味のある方は、以下を参照してください。<br>
  <a href="https://github.com/Akryum/v-tooltip">Akryum/v-tooltip</a>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 好きな写真を検索する
</h3><p>これまでFlickr APIを使って、あらかじめ決まった言葉で写真検索をしてきました。次はフォームを用意して、入力したテキストをもとに写真検索します。</p>

<p>以下は、そのコード全体です。Cloud9へコピーし、プレビュー表示してみましょう。コードの詳細は、後ほど説明します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Flickr API Test<span class="tag">&lt;/title&gt;</span>

  <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">app</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row justify-content-center my-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;header</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mb-5</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;h1&gt;</span>Flickrで写真を探す<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;form</span>
          <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline justify-content-center my-4</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-on:submit.prevent</span>=<span class="string"><span class="delimiter">"</span><span class="content">fetchImagesFromFlickr</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
          <span class="tag">&lt;input</span>
            <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">search</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">search</span><span class="delimiter">"</span></span>
            <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control mr-sm-2</span><span class="delimiter">"</span></span>
            <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">検索テキストを入力</span><span class="delimiter">"</span></span>
            <span class="attribute-name">aria-label</span>=<span class="string"><span class="delimiter">"</span><span class="content">Search</span><span class="delimiter">"</span></span>
          <span class="tag">&gt;</span>
          <span class="tag">&lt;button</span>
            <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span>
            <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-outline-primary my-2 my-sm-0</span><span class="delimiter">"</span></span>
          <span class="tag">&gt;</span>
            検索
          <span class="tag">&lt;/button&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
      <span class="tag">&lt;/header&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row justify-content-center px-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;a</span>
        <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo in photos</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.id</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.pageURL</span><span class="delimiter">"</span></span>
        <span class="attribute-name">v-tooltip</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
        <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span>
        <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span>
      <span class="tag">&gt;</span>
        <span class="tag">&lt;img</span>
          <span class="attribute-name">v-bind:src</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.imageURL</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-bind:alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
          <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
          <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
      <span class="tag">&lt;/a&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>

  <span class="comment">&lt;!-- まずjQuery --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="comment">&lt;!-- Popper.js, 次に Bootstrap JS --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>次にJSファイルです。以下の2行目に、APIキーを入れてください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// Flickr API key</span>
const apiKey = <span class="string"><span class="delimiter">'</span><span class="content">ここにAPIキーを入れてください</span><span class="delimiter">'</span></span>;


<span class="comment">/**
 * --------------------
 * Flickr API 関連の関数
 * --------------------
 */</span>

<span class="comment">// 検索テキストに応じたデータを取得するためのURLを作成して返す</span>
const getRequestURL = (searchText) =&gt; {
  const parameters = <span class="predefined">$</span>.param({
    <span class="key">method</span>: <span class="string"><span class="delimiter">'</span><span class="content">flickr.photos.search</span><span class="delimiter">'</span></span>,
    <span class="key">api_key</span>: apiKey,
    <span class="key">text</span>: searchText, <span class="comment">// 検索テキスト</span>
    <span class="key">sort</span>: <span class="string"><span class="delimiter">'</span><span class="content">interestingness-desc</span><span class="delimiter">'</span></span>, <span class="comment">// 興味深さ順</span>
    <span class="key">per_page</span>: <span class="integer">12</span>, <span class="comment">// 取得件数</span>
    <span class="key">license</span>: <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>, <span class="comment">// Creative Commons Attributionのみ</span>
    <span class="key">extras</span>: <span class="string"><span class="delimiter">'</span><span class="content">owner_name,license</span><span class="delimiter">'</span></span>, <span class="comment">// 追加で取得する情報</span>
    <span class="key">format</span>: <span class="string"><span class="delimiter">'</span><span class="content">json</span><span class="delimiter">'</span></span>, <span class="comment">// レスポンスをJSON形式に</span>
    <span class="key">nojsoncallback</span>: <span class="integer">1</span>, <span class="comment">// レスポンスの先頭に関数呼び出しを含めない</span>
  });
  const url = <span class="error">`</span>https:<span class="comment">//api.flickr.com/services/rest/?${parameters}`;</span>
  <span class="keyword">return</span> url;
};

<span class="comment">// photoオブジェクトから画像のURLを作成して返す</span>
const getFlickrImageURL = (photo, size) =&gt; {
  let url = <span class="error">`</span>https:<span class="comment">//farm${photo.farm}.staticflickr.com/${photo.server}/${photo.id}_${</span>
    photo.secret
  }<span class="error">`</span>;
  <span class="keyword">if</span> (size) {
    <span class="comment">// サイズ指定ありの場合</span>
    url += <span class="error">`</span><span class="predefined">_$</span>{size}<span class="error">`</span>;
  }
  url += <span class="string"><span class="delimiter">'</span><span class="content">.jpg</span><span class="delimiter">'</span></span>;
  <span class="keyword">return</span> url;
};

<span class="comment">// photoオブジェクトからページのURLを作成して返す</span>
const getFlickrPageURL = photo =&gt; <span class="error">`</span>https:<span class="comment">//www.flickr.com/photos/${photo.owner}/${photo.id}`;</span>

<span class="comment">// photoオブジェクトからaltテキストを生成して返す</span>
const getFlickrText = (photo) =&gt; {
  let text = <span class="error">`</span><span class="string"><span class="delimiter">"</span><span class="content">${photo.title}</span><span class="delimiter">"</span></span> by <span class="predefined">$</span>{photo.ownername}<span class="error">`</span>;
  <span class="keyword">if</span> (photo.license === <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>) {
    <span class="comment">// Creative Commons Attribution（CC BY）ライセンス</span>
    text += <span class="string"><span class="delimiter">'</span><span class="content"> / CC BY</span><span class="delimiter">'</span></span>;
  }
  <span class="keyword">return</span> text;
};

<span class="comment">/**
 * ----------------------------------
 * Tooltipを表示するカスタムディレクティブ
 * ----------------------------------
 */</span>

Vue.directive(<span class="string"><span class="delimiter">'</span><span class="content">tooltip</span><span class="delimiter">'</span></span>, {
  bind(el, binding) {
    <span class="predefined">$</span>(el).tooltip({
      <span class="key">title</span>: binding.value,
      <span class="key">placement</span>: <span class="string"><span class="delimiter">'</span><span class="content">bottom</span><span class="delimiter">'</span></span>,
    });
  },
  unbind(el) {
    <span class="predefined">$</span>(el).tooltip(<span class="string"><span class="delimiter">'</span><span class="content">dispose</span><span class="delimiter">'</span></span>);
  },
});

<span class="comment">/**
 * -------------
 * Vueインスタンス
 * -------------
 */</span>

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#app</span><span class="delimiter">'</span></span>,
  <span class="key">data</span>: {
    <span class="key">photos</span>: [],
  },
  <span class="key">methods</span>: {
    fetchImagesFromFlickr(event) {
      const vm = <span class="local-variable">this</span>;
      const searchText = event.target.elements.search.value;
      const url = getRequestURL(searchText);

      <span class="predefined">$</span>.getJSON(url, (data) =&gt; {
        <span class="keyword">if</span> (data.stat !== <span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>) {
          <span class="keyword">return</span>;
        }

        vm.photos = data.photos.photo.map(photo =&gt; ({
          <span class="key">id</span>: photo.id,
          <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
          <span class="key">pageURL</span>: getFlickrPageURL(photo),
          <span class="key">text</span>: getFlickrText(photo),
        }));
      });
    },
  },
});
</pre></div>
</div>
</div>

<p>プレビュー表示して、フォームに好きな言葉を入力してみてください。検索ボタンを押すと、入力した言葉を検索テキストとしてFlickr APIから写真データを取得・表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/flickr-search-1.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 フォームのsubmitイベントを扱う
</h3><p>好きな言葉で写真検索ができたら、コードを確認していきましょう。まずは、テンプレートです。以下の部分が、写真検索のためのフォームです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form</span>
  <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline justify-content-center my-4</span><span class="delimiter">"</span></span>
  <span class="attribute-name">v-on:submit.prevent</span>=<span class="string"><span class="delimiter">"</span><span class="content">fetchImagesFromFlickr</span><span class="delimiter">"</span></span>
<span class="tag">&gt;</span>
  <span class="tag">&lt;input</span>
    <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">search</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">search</span><span class="delimiter">"</span></span>
    <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control mr-sm-2</span><span class="delimiter">"</span></span>
    <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">検索テキストを入力</span><span class="delimiter">"</span></span>
    <span class="attribute-name">aria-label</span>=<span class="string"><span class="delimiter">"</span><span class="content">Search</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
  <span class="tag">&lt;button</span>
    <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span>
    <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-outline-primary my-2 my-sm-0</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    検索
  <span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p>フォームが送信されると、submitイベントが発生します。v-onディレクティブを使って、submitイベントが発生したら <code>fetchImagesFromFlickr</code> というメソッドが呼び出されるようにしています。<code>v-on:submit.prevent</code> の <code>.prevent</code> は、もともとイベントに設定されている動きを止める役割です。submitイベントが発生するとフォームが送信され、ページがリロード（再読み込み）されます。 <code>.prevent</code> を使うことで、このリロードを止めています。このために <code>.prevent</code> はVue.jsの内部で、イベントオブジェクトのメソッドである <code>preventDefault</code> を呼び出しています。</p>

<p><code>.prevent</code> のように、イベントを簡単に制御するための仕組みを <strong>イベント修飾子</strong> と言います。詳しくは、Vue.js公式ガイドの<a href="https://jp.vuejs.org/v2/guide/events.html#%E3%82%A4%E3%83%99%E3%83%B3%E3%83%88%E4%BF%AE%E9%A3%BE%E5%AD%90" target="_blank">イベント修飾子</a>を確認してください。</p>

<div class="alert alert-info">
イベントオブジェクトについて詳しくは、Lesson3の<a href="javascirpt#chapter-6-5">6.5 イベント</a>で解説しています。
</div>

<p>次に、formのsubmitイベントが発生したら呼び出されるfetchImagesFromFlickrメソッドを確認しましょう。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>fetchImagesFromFlickr(event) {
  const vm = <span class="local-variable">this</span>;
  const searchText = event.target.elements.search.value;
  const url = getRequestURL(searchText);

  <span class="predefined">$</span>.getJSON(url, (data) =&gt; {
    <span class="keyword">if</span> (data.stat !== <span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>) {
      <span class="keyword">return</span>;
    }

    vm.photos = data.photos.photo.map(photo =&gt; ({
      <span class="key">id</span>: photo.id,
      <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
      <span class="key">pageURL</span>: getFlickrPageURL(photo),
      <span class="key">text</span>: getFlickrText(photo),
    }));
  });
},
</pre></div>
</div>
</div>

<p>v-onディレクティブの属性値として渡したメソッドは、呼び出されるときに第１引数としてイベントオブジェクトが渡されます。この点は、JavaScriptやjQueryのイベントハンドラと同じです。ただしv-onディレクティブには、JavaScriptやjQueryと違う点があります。それは、メソッドに引数として任意の値を渡すこともできることです。たとえば、以下のように書けます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form</span>
  <span class="attribute-name">v-on:submit</span>=<span class="string"><span class="delimiter">"</span><span class="content">testMethod('テストメソッド')</span><span class="delimiter">"</span></span>
<span class="tag">&gt;</span>
...
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p>上記のコードでは、メソッドが呼び出されるときに第１引数として<code>'テストメソッド'</code>という文字列が渡されます。イベントオブジェクトも利用したいときは、以下のように書けます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form</span>
  <span class="attribute-name">v-on:submit</span>=<span class="string"><span class="delimiter">"</span><span class="content">testMethod('テストメソッド', $event)</span><span class="delimiter">"</span></span>
<span class="tag">&gt;</span>
...
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p><code>$event</code> は、Vue.jsの特別な変数です。この変数に、要素のイベントオブジェクトが入ります。</p>

<p>そしてフォームのinput要素に入力された値は、以下の部分で取得しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const searchText = event.target.elements.search.value;
</pre></div>
</div>
</div>

<p><code>event.target.elements.search.value</code> の最初の <code>event</code> は、引数として渡されたイベントオブジェクトです。その中のtargetプロパティは、イベントが発生した要素（DOM要素）です。今回のコードでは、form要素です。その中のelementsプロパティは、form要素の中の部品要素です。今回のコードでは、input要素とbutton要素です。これらの要素にname属性を設定した場合、そのname属性の値でアクセスできます。今回は、input要素のname属性に <code>search</code> という値を設定しています。そのため <code>elements.search</code> で、input要素にアクセスできます。最後のvalueプロパティは、value属性を表しています。今回のコードでは、input要素へ入力された値にアクセスできます。この入力値を、Flickr APIの検索テキストとしています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/form.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-6">5.6 状態を表示する
</h3><p>Flickr APIを利用して、好きな写真を検索できるようになりました。しかし、気になる点があります。それは検索したときに「状態」が分からないことです。</p>

<p>たとえばAPIからのデータ取得中は、そのことを表示した方が良いでしょう。もしデータの取得に時間がかかる場合、なぜ写真が表示されないのか分かないからです。</p>

<p>そのためここでは、状態によって以下のとおり表示を更新するようにします。</p>

<p>まずindex.htmlをプレビュー表示すると、「検索してください。」と表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search3-1.png" alt=""></p>

<p>写真データの取得中は、くるくると回るローディングアイコンを表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search4-1.png" alt=""></p>

<p>サーバーやネットワークの障害でFlickr APIからのデータ取得に失敗したときは、「データの取得に失敗しました。しばらく時間を置いてから、再度お試しください。」と表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search6-1.png" alt=""></p>

<p>以下は、そのコード全体です。Cloud9へコピーし、プレビュー表示してみましょう。コードの詳細は、後ほど説明します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Flickr API Test<span class="tag">&lt;/title&gt;</span>

  <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">app</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row justify-content-center my-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;header</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mb-5</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;h1&gt;</span>Flickrで写真を探す<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;form</span>
          <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-inline justify-content-center my-4</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-on:submit.prevent</span>=<span class="string"><span class="delimiter">"</span><span class="content">fetchImagesFromFlickr</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
          <span class="tag">&lt;input</span>
            <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">search</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">search</span><span class="delimiter">"</span></span>
            <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control mr-sm-2</span><span class="delimiter">"</span></span>
            <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">検索テキストを入力</span><span class="delimiter">"</span></span>
            <span class="attribute-name">aria-label</span>=<span class="string"><span class="delimiter">"</span><span class="content">Search</span><span class="delimiter">"</span></span>
          <span class="tag">&gt;</span>
          <span class="tag">&lt;button</span>
            <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span>
            <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-outline-primary my-2 my-sm-0</span><span class="delimiter">"</span></span>
          <span class="tag">&gt;</span>
            検索
          <span class="tag">&lt;/button&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
      <span class="tag">&lt;/header&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row justify-content-center px-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;p</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isInitalized</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>検索してください。<span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;p</span>
        <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFetching</span><span class="delimiter">"</span></span>
        <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">position-relative mx-auto</span><span class="delimiter">"</span></span>
      <span class="tag">&gt;</span>
        <span class="tag">&lt;span</span>
          <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">loading-icon fas fa-sync</span><span class="delimiter">"</span></span>
          <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
        <span class="tag">&lt;/span&gt;</span>
      <span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;p</span> <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFailed</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        データの取得に失敗しました。しばらく時間を置いてから、再度お試しください。
      <span class="tag">&lt;/p&gt;</span>
      <span class="tag">&lt;div&gt;</span>
        <span class="tag">&lt;template</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFound</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;a</span>
          <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo in photos</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.id</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.pageURL</span><span class="delimiter">"</span></span>
          <span class="attribute-name">v-tooltip</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
          <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span>
          <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span>
        <span class="tag">&gt;</span>
          <span class="tag">&lt;img</span>
            <span class="attribute-name">v-bind:src</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.imageURL</span><span class="delimiter">"</span></span>
            <span class="attribute-name">v-bind:alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
            <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
            <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
          <span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;/template&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>

  <span class="comment">&lt;!-- まずjQuery --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="comment">&lt;!-- Popper.js, 次に Bootstrap JS --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="comment">&lt;!-- Font Awesome --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.loading-icon</span> {
  <span class="key">position</span>: <span class="value">absolute</span>;
  <span class="key">top</span>: <span class="float">50%</span>;
  <span class="key">left</span>: <span class="float">50%</span>;
  <span class="key">margin-top</span>: <span class="float">-25px</span>;
  <span class="key">margin-left</span>: <span class="float">-23px</span>;
  <span class="key">font-size</span>: <span class="float">46px</span>;
  <span class="key">animation</span>: <span class="value">spin</span> <span class="float">2s</span> <span class="value">linear</span> <span class="value">infinite</span>;
}

<span class="comment">/* 回転するアニメーション */</span>
<span class="directive">@keyframes</span> <span class="tag">spin</span> {
  <span class="float">100%</span> {
    <span class="key">transform</span>: <span class="error">r</span><span class="error">o</span><span class="error">t</span><span class="error">a</span><span class="error">t</span><span class="error">e</span>(<span class="float">360deg</span>);
  }
}
</pre></div>
</div>
</div>

<p>最後にJSファイルです。以下の2行目に、APIキーを入れてください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// Flickr API key</span>
const API_KEY = <span class="string"><span class="delimiter">'</span><span class="content">ここにAPIキーを入れてください</span><span class="delimiter">'</span></span>;

<span class="comment">// 状態の定数</span>
const IS_INITIALIZED = <span class="string"><span class="delimiter">'</span><span class="content">IS_INITIALIZED</span><span class="delimiter">'</span></span>; <span class="comment">// 最初の状態</span>
const IS_FETCHING = <span class="string"><span class="delimiter">'</span><span class="content">IS_FETCHING</span><span class="delimiter">'</span></span>; <span class="comment">// APIからデータを取得中</span>
const IS_FAILED = <span class="string"><span class="delimiter">'</span><span class="content">IS_FAILED</span><span class="delimiter">'</span></span>; <span class="comment">// APIからデータを取得できなかった</span>
const IS_FOUND = <span class="string"><span class="delimiter">'</span><span class="content">IS_FOUND</span><span class="delimiter">'</span></span>; <span class="comment">// APIから画像データを取得できた</span>

<span class="comment">/**
 * --------------------
 * Flickr API 関連の関数
 * --------------------
 */</span>

<span class="comment">// 検索テキストに応じたデータを取得するためのURLを作成して返す</span>
const getRequestURL = (searchText) =&gt; {
  const parameters = <span class="predefined">$</span>.param({
    <span class="key">method</span>: <span class="string"><span class="delimiter">'</span><span class="content">flickr.photos.search</span><span class="delimiter">'</span></span>,
    <span class="key">api_key</span>: API_KEY,
    <span class="key">text</span>: searchText, <span class="comment">// 検索テキスト</span>
    <span class="key">sort</span>: <span class="string"><span class="delimiter">'</span><span class="content">interestingness-desc</span><span class="delimiter">'</span></span>, <span class="comment">// 興味深さ順</span>
    <span class="key">per_page</span>: <span class="integer">12</span>, <span class="comment">// 取得件数</span>
    <span class="key">license</span>: <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>, <span class="comment">// Creative Commons Attributionのみ</span>
    <span class="key">extras</span>: <span class="string"><span class="delimiter">'</span><span class="content">owner_name,license</span><span class="delimiter">'</span></span>, <span class="comment">// 追加で取得する情報</span>
    <span class="key">format</span>: <span class="string"><span class="delimiter">'</span><span class="content">json</span><span class="delimiter">'</span></span>, <span class="comment">// レスポンスをJSON形式に</span>
    <span class="key">nojsoncallback</span>: <span class="integer">1</span>, <span class="comment">// レスポンスの先頭に関数呼び出しを含めない</span>
  });
  const url = <span class="error">`</span>https:<span class="comment">//api.flickr.com/services/rest/?${parameters}`;</span>
  <span class="keyword">return</span> url;
};

<span class="comment">// photoオブジェクトから画像のURLを作成して返す</span>
const getFlickrImageURL = (photo, size) =&gt; {
  let url = <span class="error">`</span>https:<span class="comment">//farm${photo.farm}.staticflickr.com/${photo.server}/${photo.id}_${</span>
    photo.secret
  }<span class="error">`</span>;
  <span class="keyword">if</span> (size) {
    <span class="comment">// サイズ指定ありの場合</span>
    url += <span class="error">`</span><span class="predefined">_$</span>{size}<span class="error">`</span>;
  }
  url += <span class="string"><span class="delimiter">'</span><span class="content">.jpg</span><span class="delimiter">'</span></span>;
  <span class="keyword">return</span> url;
};

<span class="comment">// photoオブジェクトからページのURLを作成して返す</span>
const getFlickrPageURL = photo =&gt; <span class="error">`</span>https:<span class="comment">//www.flickr.com/photos/${photo.owner}/${photo.id}`;</span>

<span class="comment">// photoオブジェクトからaltテキストを生成して返す</span>
const getFlickrText = (photo) =&gt; {
  let text = <span class="error">`</span><span class="string"><span class="delimiter">"</span><span class="content">${photo.title}</span><span class="delimiter">"</span></span> by <span class="predefined">$</span>{photo.ownername}<span class="error">`</span>;
  <span class="keyword">if</span> (photo.license === <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>) {
    <span class="comment">// Creative Commons Attribution（CC BY）ライセンス</span>
    text += <span class="string"><span class="delimiter">'</span><span class="content"> / CC BY</span><span class="delimiter">'</span></span>;
  }
  <span class="keyword">return</span> text;
};

<span class="comment">/**
 * ----------------------------------
 * Tooltipを表示するカスタムディレクティブ
 * ----------------------------------
 */</span>

Vue.directive(<span class="string"><span class="delimiter">'</span><span class="content">tooltip</span><span class="delimiter">'</span></span>, {
  bind(el, binding) {
    <span class="predefined">$</span>(el).tooltip({
      <span class="key">title</span>: binding.value,
      <span class="key">placement</span>: <span class="string"><span class="delimiter">'</span><span class="content">bottom</span><span class="delimiter">'</span></span>,
    });
  },
  unbind(el) {
    <span class="predefined">$</span>(el).tooltip(<span class="string"><span class="delimiter">'</span><span class="content">dispose</span><span class="delimiter">'</span></span>);
  },
});

<span class="comment">/**
 * -------------
 * Vueインスタンス
 * -------------
 */</span>

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#app</span><span class="delimiter">'</span></span>,

  <span class="key">data</span>: {
    <span class="key">prevSearchText</span>: <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>,
    <span class="key">photos</span>: [],
    <span class="key">currentState</span>: IS_INITIALIZED,
  },

  <span class="key">computed</span>: {
    isInitalized() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_INITIALIZED;
    },
    isFetching() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_FETCHING;
    },
    isFailed() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_FAILED;
    },
    isFound() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_FOUND;
    },
  },

  <span class="key">methods</span>: {
    <span class="comment">// 状態を変更する</span>
    toFetching() {
      <span class="local-variable">this</span>.currentState = IS_FETCHING;
    },
    toFailed() {
      <span class="local-variable">this</span>.currentState = IS_FAILED;
    },
    toFound() {
      <span class="local-variable">this</span>.currentState = IS_FOUND;
    },

    fetchImagesFromFlickr(event) {
      const vm = <span class="local-variable">this</span>;
      const searchText = event.target.elements.search.value;

      <span class="comment">// APIからデータを取得中で、なおかつ検索テキストが前回の検索時と同じ場合、再度リクエストしない</span>
      <span class="keyword">if</span> (vm.isFetching &amp;&amp; searchText === vm.prevSearchText) {
        <span class="keyword">return</span>;
      }

      <span class="comment">// Vueインスタンスのデータとして、検索テキストを保持しておく</span>
      vm.prevSearchText = searchText;

      vm.toFetching();

      const url = getRequestURL(searchText);
      <span class="predefined">$</span>.getJSON(url, (data) =&gt; {
        <span class="keyword">if</span> (data.stat !== <span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>) {
          vm.toFailed();
          <span class="keyword">return</span>;
        }

        const fetchedPhotos = data.photos.photo;

        <span class="comment">// 検索テキストに該当する画像データがない場合</span>
        <span class="keyword">if</span> (fetchedPhotos.length === <span class="integer">0</span>) {
          <span class="keyword">return</span>;
        }

        vm.photos = fetchedPhotos.map(photo =&gt; ({
          <span class="key">id</span>: photo.id,
          <span class="key">imageURL</span>: getFlickrImageURL(photo, <span class="string"><span class="delimiter">'</span><span class="content">q</span><span class="delimiter">'</span></span>),
          <span class="key">pageURL</span>: getFlickrPageURL(photo),
          <span class="key">text</span>: getFlickrText(photo),
        }));
        vm.toFound();
      }).fail(() =&gt; {
        vm.toFailed();
      });
    },
  },
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-7">5.7 状態を管理する
</h3><p>写真検索の状態によって、表示を変えるようにしました。表示の更新は、テンプレートでしています。具体的には、以下のコードです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isInitalized</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>検索してください。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span>
  <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFetching</span><span class="delimiter">"</span></span>
  <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">position-relative mx-auto</span><span class="delimiter">"</span></span>
<span class="tag">&gt;</span>
  <span class="tag">&lt;span</span>
    <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">loading-icon fas fa-sync</span><span class="delimiter">"</span></span>
    <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
  <span class="tag">&lt;/span&gt;</span>
<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span> <span class="attribute-name">v-show</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFailed</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  データの取得に失敗しました。しばらく時間を置いてから、再度お試しください。
<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;div&gt;</span>
  <span class="tag">&lt;template</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFound</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;a</span>
    <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo in photos</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:key</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.id</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-bind:href</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.pageURL</span><span class="delimiter">"</span></span>
    <span class="attribute-name">v-tooltip</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
    <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span>
    <span class="attribute-name">target</span>=<span class="string"><span class="delimiter">"</span><span class="content">_blank</span><span class="delimiter">"</span></span>
  <span class="tag">&gt;</span>
    <span class="tag">&lt;img</span>
      <span class="attribute-name">v-bind:src</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.imageURL</span><span class="delimiter">"</span></span>
      <span class="attribute-name">v-bind:alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">photo.text</span><span class="delimiter">"</span></span>
      <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
      <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span>
    <span class="tag">&gt;</span>
  <span class="tag">&lt;/a&gt;</span>
  <span class="tag">&lt;/template&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>v-ifとv-showディレクティブを使って、表示する要素を出し分けています。上記のコードでは、一度表示したら再表示しない要素に <code>v-if</code> を使っています。<code>v-show</code> を使っているのは、何度も再表示する可能性のある要素です。今回は <code>v-show</code> を使っていますが、<code>v-if</code> や <code>v-else-if</code> でも良いでしょう。再表示するときの処理はわずかに重くなるでしょうが、コードが分かりやすくなるからです。</p>

<p>次のように <code>v-if</code> と <code>v-else-if</code> を使えば、一度に表示されるのは１つだけということが分かりやすくなります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p</span> <span class="attribute-name">v-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isInitalized</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>検索してください。<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFetching</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">position-relative text-center</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="comment">&lt;!-- 省略 --&gt;</span>
<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;p</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFailed</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  データの取得に失敗しました。しばらく時間を置いてから、再度お試しください。
<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;template</span> <span class="attribute-name">v-else-if</span>=<span class="string"><span class="delimiter">"</span><span class="content">isFound</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="comment">&lt;!-- 省略 --&gt;</span>
<span class="tag">&lt;/template&gt;</span>
</pre></div>
</div>
</div>

<p>次に、<em>main.js</em> を確認してみましょう。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// Flickr API key</span>
const API_KEY = <span class="string"><span class="delimiter">'</span><span class="content">ここにAPIキーを入れてください</span><span class="delimiter">'</span></span>;

<span class="comment">// 状態の定数</span>
const IS_INITIALIZED = <span class="string"><span class="delimiter">'</span><span class="content">IS_INITIALIZED</span><span class="delimiter">'</span></span>; <span class="comment">// 最初の状態</span>
const IS_FETCHING = <span class="string"><span class="delimiter">'</span><span class="content">IS_FETCHING</span><span class="delimiter">'</span></span>; <span class="comment">// APIからデータを取得中</span>
const IS_FAILED = <span class="string"><span class="delimiter">'</span><span class="content">IS_FAILED</span><span class="delimiter">'</span></span>; <span class="comment">// APIからデータを取得できなかった</span>
const IS_FOUND = <span class="string"><span class="delimiter">'</span><span class="content">IS_FOUND</span><span class="delimiter">'</span></span>; <span class="comment">// APIから画像データを取得できた</span>
</pre></div>
</div>
</div>

<p>最初に、定数として使う変数を定義しています。定数とは、特定の値に名前をつけたものです。この値は、後から変更しません。定数として扱う場合は上記のように、変数名をすべて大文字にすることがあります。単語の間は、_（アンダースコア）で区切ります。このような変数名にするのは、値が変化しないことを分かりやすくするためです。</p>

<p>次に、Vueインスタンスを確認します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">"</span><span class="content">#app</span><span class="delimiter">"</span></span>,

  <span class="key">data</span>: {
    <span class="key">photos</span>: [],
    <span class="key">currentState</span>: IS_INITIALIZED
  },

  <span class="key">computed</span>: {
    <span class="function">isInitalized</span>: <span class="keyword">function</span>() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_INITIALIZED;
    },
    <span class="function">isFetching</span>: <span class="keyword">function</span>() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_FETCHING;
    },
    <span class="function">isFailed</span>: <span class="keyword">function</span>() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_FAILED;
    },
    <span class="function">isFound</span>: <span class="keyword">function</span>() {
      <span class="keyword">return</span> <span class="local-variable">this</span>.currentState === IS_FOUND;
    }
  },

  <span class="key">methods</span>: {
    <span class="comment">// 状態を変更する</span>
    <span class="function">toFetching</span>: <span class="keyword">function</span>() {
      <span class="local-variable">this</span>.currentState = IS_FETCHING;
    },
    <span class="function">toFailed</span>: <span class="keyword">function</span>() {
      <span class="local-variable">this</span>.currentState = IS_FAILED;
    },
    <span class="function">toFound</span>: <span class="keyword">function</span>() {
      <span class="local-variable">this</span>.currentState = IS_FOUND;
    },
    ...
</pre></div>
</div>
</div>

<p>最初に定義した定数を、Vueインスタンスの <code>data</code>（データ）と算出プロパティ、そしてメソッドで使っています。 データの <code>currentState</code> が、現在の状態を表しています。そして算出プロパティでは、ある状態と現在の状態が一致するかを真偽値（<code>true</code> か <code>false</code>）で返します。たとえば算出プロパティの <code>isInitalized</code> は、現在の状態が定数の <code>IS_INITIALIZED</code> と一致するときに <code>true</code> となります。現在の状態を変更するのは、メソッドの役割です。</p>

<p>状態の変化によってメソッドを呼び出すことで、現在の状態を変更します。たとえばAPIにリクエストを送る直前には、現在の状態を <code>IS_FETCHING</code>（取得中）にします。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>vm.toFetching(); <span class="comment">// 現在の状態をIS_FETCHING（取得中）にする</span>

const url = getRequestURL(searchText);
<span class="predefined">$</span>.getJSON(url, (data) =&gt; { <span class="comment">// APIにリクエストを送る</span>
  ...
</pre></div>
</div>
</div>

<p>この変更をきっかけとして、テンプレートの <code>v-if</code> や <code>v-show</code> が評価されます。そして再描画され、表示が切り替わります。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-vue-mid">課題：Vue.js中間課題</h3><div class="alert alert-danger">
<i>これまでのテキストの学習／Cloud9でのプレビュー表示確認が完了してから当課題に取り組んでください。</i>
</div>

<p>写真検索の状態によって、表示を変えるようにしました。しかしこれまで実装したコードには、まだ１つ気になる点があります。</p>

<p>それは、検索したテキストに該当する写真が見つからなかったときです。このとき、ローディングアイコンがずっと表示されてしまいます。これでは、写真が見つからなかったということが分かりません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search7-1.png" alt=""></p>

<p>そこで、これまで実装したコードを改善しましょう。検索テキストに該当する写真が見つからなかったときは「写真が見つかりませんでした。別の言葉で検索してみてください。」と表示されるようにしてください。</p>

<p><strong>検索テキストに該当する写真が見つからなかったときの画面表示</strong><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search5-1.png" alt=""></p>

<div class="alert alert-info">
これまでにテキストで学習した、HTML/CSS/JavaScriptをコーディングしているファイル一式を用意しています。ダウンロードして取り組んでください。<i>main.js</i>の<code>// TODO: ...</code>と記載されている部分にコードを記述して完成させましょう。<br>
<br>
<a class="btn btn-success" href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search-improving.zip">ひな形のファイル一式をダウンロードする</a>
</div>

<p>上記の緑色のボタンからダウンロードしたzipファイルを解凍し、現れた <code>flickr-search-improving</code> フォルダをCloud9のワークスペース直下にアップロードしてください。また <em>main.js</em> にあるFlickrのAPIキーの部分を、これまでと同じように変更してください。</p>

<h4>内容</h4>

<p><code>flickr-search-improving</code> にあるファイルのうち、<em>main.css</em> は完成しています。<em>index.html</em> と <em>main.js</em> には、<code>TODO:</code> と記述された部分が計5ヶ所あります。</p>

<p>この5ヶ所にコードを記述し、「検索テキストに該当する写真が見つからなかったときの画面表示」を改善しましょう。</p>

<p>以下の仕様を満たして下さい。</p>

<h4>仕様</h4>

<ul>
  <li>検索テキストに該当する写真が見つからなかったときは「写真が見つかりませんでした。別の言葉で検索してみてください。」と表示されるようにしてください。</li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/flickr-search5-1.png" alt=""></p>
</div></section><section id="chapter-6"><h2 class="index">6. コンポーネント
</h2><div class="subsection"><p>コンポーネントという言葉は、状況や文脈によって少し意味が変わってきます。フロントエンドでは一般的に、<strong>UI(Webページ)を機能・役割ごとにまとめて、何度も使い回しができるようにしたもの</strong> をコンポーネントと言います。</p>

<p>たとえばブログサイトは、記事やそのコメント、ヘッダーやフッター、サイドバー、各種のボタンなどで構成されています。ボタンなどは、文言や色だけ違うものもあります。これら色々な要素を、機能や役割ごとにまとめます。そして部品として使い回せるようにしたものを、コンポーネントと言います。</p>

<p>プログラムが大きくなると、同じ要素のまとまりをあちこちで使うことになってきます。その際、同じものを繰り返し記述したり、コピー&amp;ペーストすることは可能です。しかしプログラムが冗長になってしまい、見た目にも美しくありません。また修正する場合、繰り返し記述したりコピー&amp;ペーストした部分を１つ１つ修正しなくてはなりません。</p>

<p>このような問題を避けるために、同じ機能・役割のまとまりを１つのコンポーネントとして部品化します。そして、そのまとまりを直接書くかわりに、コンポーネントで置き換えるのです。すると、プログラムがすっきりとして分かりやすくなります。さらに、そのコンポーネントの部分に共通の変更点が生じた際にも、変更が一箇所で済むというメリットもあります。</p>

<p>コンポーネントのメリットは、<a href="https://techacademy.jp/magazine/5510#sec1" target="_blank">関数のメリット</a>とよく似ています。関数は、処理のまとまりをひとつの関数として定義します。そして処理のまとまりを直接書くかわりに、関数を呼び出すことで置き換えますね。</p>

<p>ここまでが、フロントエンドにおけるコンポーネントの説明です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 Vue.jsにおけるコンポーネント
</h3><p>次に、Vue.jsにおけるコンポーネントについて説明します。</p>

<p>Vue.jsにおけるコンポーネントは、フロントエンドにおけるコンポーネントをVue.jsで実装するためのものです。Vue.jsのコンポーネントは、<strong>繰り返し使えるVueインスタンス</strong> のことです。コードを確認した方がわかりやすいので、さっそく書いていきましょう。なお今後、このカリキュラムで「コンポーネント」と言うときは、Vue.jsのコンポーネントを指します。</p>

<p>以下は、サンプルコードの全体です。Cloud9へコピーし、プレビュー表示してみましょう。コードの詳細は、後ほど説明します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="string"><span class="delimiter">'</span><span class="content">&lt;button&gt;いいね！&lt;/button&gt;</span><span class="delimiter">'</span></span>,
});

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/vujukod/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>プレビュー表示すると、「いいね！」というボタンが表示されますね。それでは、上記のコードを説明していきます。まずは <em>main.js</em> です。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="string"><span class="delimiter">'</span><span class="content">&lt;button&gt;いいね！&lt;/button&gt;</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p>上記のようにVue.componentメソッドを呼び出すことで、コンポーネントが作成できます。Vue.componentメソッドの第１引数には、コンポーネントにつける名前を渡します。名前は複数の単語を組み合わせてください。もともと用意されているHTML要素の名前と、かぶってしまうことを防ぐためです。第２引数には、コンポーネントの内容などをオプションとして渡します。表示する内容はtemplateオプションに、文字列として定義します。</p>

<p>Vue.componentメソッドで作成したコンポーネントは、<code>new Vue(...)</code> で作成したルートのVueインスタンス内でカスタム要素として使えます。具体的には、以下のように書けます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>Vue.componentメソッドの第１引数に渡した名前を、タグの形でテンプレートに書くだけです。デベロッパーツールで確認すると、このタグ部分がbutton要素に置き換わっているのが分かります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/component.png" alt=""></p>

<p>コンポーネントは、以下のように繰り返し使えます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/sanetib/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 コンポーネントにデータを持たせる
</h3><p><code>new Vue(...)</code> で作成したルートのVueインスタンスと同じように、コンポーネントも <code>data</code>、<code>computed</code>、<code>methods</code> などのオプションを利用できます。ただし少し違う部分があるので、後で説明します。</p>

<p>以下のコードは <code>template</code> に加えて、<code>data</code> と <code>methods</code> を利用しています。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>, {
  data() {
    <span class="keyword">return</span> { <span class="key">count</span>: <span class="integer">0</span> };
  },
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.count += <span class="integer">1</span>;
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ count }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
});

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/busozan/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ボタンを押すと、「いいね！」の数字が増えていきます。この数は、コンポーネントのdataオプションで定義しています。コンポーネントでdataオプションを使うには、その値に関数を定義しなければならないというルールがあります。この関数から、コンポーネントで使うデータをオブジェクトとして返すようにします。関数を定義する理由は、「コンポーネントは繰り返し使えるVueインスタンス」であることに関係しています。dataオプションの値にオブジェクトをそのまま定義してしまうと、同じコンポーネントのすべてのVueインスタンスで、同じデータが共有されてしまうのです。</p>

<p>なお上記のコンポーネントでは、templateオプションの値をテンプレート文字列で定義しています。複数行の文字列を定義しやすいからです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 ルート要素は１つにする
</h3><p>以下のコードを実行すると、エラーになります。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;buttons-preference&gt;</span><span class="tag">&lt;/buttons-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">buttons-preference</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>いいね！<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;button&gt;</span>そだねー<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
});

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p>デベロッパーツールのコンソールに表示されるエラーメッセージは、以下のとおりです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/vue-warn.png" alt=""></p>

<p>エラーメッセージには、「Component template should contain exactly one root element.」と書かれています。日本語にすると、「コンポーネントのテンプレートはただ１つのルート要素を持つべき」という意味です。ルート要素というのは、一番上の階層にある要素のことです。上記のコードではルート要素に２つのbutton要素があるので、エラーになっています。</p>

<p>以下のように修正すると、ルート要素を１つにできます。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">buttons-preference</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;button&gt;</span>いいね！<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;button&gt;</span>そだねー<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="error">`</span>,
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/kobekeh/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>v-forディレクティブを使う場合も、注意してください。たとえば、以下のようなコンポーネントを作成することはできません。なお <code>examples</code> は配列とします。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">component-examples</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">example in examples</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ example }}
    <span class="tag">&lt;/div&gt;</span>
  <span class="error">`</span>,
});
</pre></div>
</div>
</div>

<p>上記のようにv-forディレクティブを使うと、やはりエラーになります。なぜなら、ルート要素が１つにならないからです。<code>examples</code> に入っている要素の数だけ、複数のルート要素が作られてしまいます。そのため先ほどと同じく、以下のように修正する必要があります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">component-examples</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">v-for</span>=<span class="string"><span class="delimiter">"</span><span class="content">example in examples</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        {{ example }}
      <span class="tag">&lt;/div&gt;</span>
    &lt;<span class="regexp"><span class="delimiter">/</span><span class="content">div&gt;
  `,
});
</span></span></pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 グローバル登録
</h3><p>これまでに定義したコンポーネントは、<code>new Vue(...)</code> で作成したルートのVueインスタンス内のどこでも使えます。コンポーネント内から別のコンポーネントを使うこともできます。たとえば、以下のように書けます。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;buttons-sns&gt;</span><span class="tag">&lt;/buttons-sns&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>いいね！<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
});

Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">button-empathy</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>そだねー<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
});

Vue.component(<span class="string"><span class="delimiter">'</span><span class="content">buttons-sns</span><span class="delimiter">'</span></span>, {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
      <span class="tag">&lt;button-empathy&gt;</span><span class="tag">&lt;/button-empathy&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="error">`</span>,
});

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/mogeqiq/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>Vue.componentメソッドで作成したコンポーネントは、<strong>グローバル登録</strong> されます。ルートのVueインスタンス内の、どこでも使えるということです。上記のコードでは <code>buttons-sns</code> というコンポーネントが、別の２つのコンポーネントを使っています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 ローカル登録
</h3><p>グローバル登録したコンポーネントは、どこでも使えて便利です。しかしコンポーネントの数が多くなると、コードが複雑になりやすいです。あるコンポーネントが、コードのどこで使われているのか分かりづらくなるからです。</p>

<p>あるコンポーネントを特定のコンポーネント内でしか使わない場合は、グローバル登録しない方が良いです。その代わり、<strong>ローカル登録</strong> をします。コンポーネントを、特定のVueインスタンス内でしか使えないようにするということです。</p>

<p>ローカル登録するにはまず、コンポーネントをオブジェクトとして定義します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>いいね！<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

const buttonEmpathy = {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>そだねー<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};
</pre></div>
</div>
</div>

<p>そして上記のコンポーネントを使いたいVueインスタンスで、以下のように <code>components</code> オブジェクトを定義します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonsSns = {
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
    <span class="key"><span class="delimiter">'</span><span class="content">button-empathy</span><span class="delimiter">'</span></span>: buttonEmpathy,
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
      <span class="tag">&lt;button-empathy&gt;</span><span class="tag">&lt;/button-empathy&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">buttons-sns</span><span class="delimiter">'</span></span>: buttonsSns,
  },
});
</pre></div>
</div>
</div>

<p>上記のようにローカル登録すると、button-preferenceコンポーネントとbutton-empathyコンポーネントは、buttons-snsコンポーネント内でしか使えなくなります。</p>

<p>コード全体は、以下のとおりです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;buttons-sns&gt;</span><span class="tag">&lt;/buttons-sns&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>いいね！<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

const buttonEmpathy = {
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>そだねー<span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

const buttonsSns = {
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
    <span class="key"><span class="delimiter">'</span><span class="content">button-empathy</span><span class="delimiter">'</span></span>: buttonEmpathy,
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;div&gt;</span>
      <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
      <span class="tag">&lt;button-empathy&gt;</span><span class="tag">&lt;/button-empathy&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">buttons-sns</span><span class="delimiter">'</span></span>: buttonsSns,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/qagubod/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-6">6.6 親からデータを渡す
</h3><p>コンポーネントには、その親のVueインスタンスからデータを渡すことができます。これは関数に、引数を渡せるのと似ています。関数で同じ処理をするにしても、渡す引数によって処理する内容を少しずつ変えることができますね。コンポーネントも同じように、渡すデータによって表示する内容や動きを変えることができます。</p>

<p>コンポーネントにデータを渡すには、まずコンポーネントで <code>props</code> というオプションを使います。<code>props</code> は、関数を定義するときの引数（仮引数）のようなものです。以下のように書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">props</span>: [<span class="string"><span class="delimiter">'</span><span class="content">initialCount</span><span class="delimiter">'</span></span>],
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>
      {{ initialCount }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};
</pre></div>
</div>
</div>

<p>上記のようにpropsオプションを使うことで、データを渡せます。このデータには、dataオプションのデータと同じようにアクセスできます。</p>

<p>実際のデータは、コンポーネントに属性として渡します。これは関数で言えば、引数（実引数）を渡して呼び出すことに相当します。なお仮引数と実引数については、Lesson3の<a href="javascript#chapter-4-6">4.6 関数</a>で解説しています。</p>

<p>テンプレートには以下のように書きます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference</span> <span class="attribute-name">initial-count</span>=<span class="string"><span class="delimiter">"</span><span class="content">0</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>コンポーネントの <code>props</code> には、<code>initialCount</code> とキャメルケースで書きました。キャメルケースとは、最初の単語は小文字で書いて、次の単語から先頭の文字を大文字で書く記法のことです。一方でテンプレートの属性名には、<code>initial-count</code> とケバブケースで書いています。ケバブケースとは、単語と単語の間を <code>-</code>（ハイフン）でつなげる記法のことです。単語はすべて小文字で書きます。</p>

<p>このように <code>props</code> にはキャメルケースで書き、テンプレートの属性名にはケバブケースで書くようにしましょう。なぜなら、JavaScriptではキャメルケースが一般的な書き方で、HTMLではケバブケースが一般的な書き方だからです。この書き分けが、Vue.jsでは強く推奨されています。詳しくは公式のスタイルガイド（<a href="https://jp.vuejs.org/v2/style-guide/#%E3%83%97%E3%83%AD%E3%83%91%E3%83%86%E3%82%A3%E5%90%8D%E3%81%AE%E5%9E%8B%E5%BC%8F-%E5%BC%B7%E3%81%8F%E6%8E%A8%E5%A5%A8" target="_blank">日本語版</a>、<a href="https://vuejs.org/v2/style-guide/index.html#Prop-name-casing-strongly-recommended" target="_blank">英語版</a>）をご確認ください。なお日本語版は「props」を「プロパティ」と訳されているので、オブジェクトのプロパティと混同しないよう注意してください。</p>

<p>コンポーネントの名前とは違い、<code>props</code> は１つの単語でもOKです。またHTML要素にもともと用意されている属性から、<code>props</code> としてデータを渡すこともできます。たとえば <code>class</code>、<code>value</code> などです。</p>

<p>コード全体は以下のとおりです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button-preference</span> <span class="attribute-name">initial-count</span>=<span class="string"><span class="delimiter">"</span><span class="content">0</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">props</span>: [<span class="string"><span class="delimiter">'</span><span class="content">initialCount</span><span class="delimiter">'</span></span>],
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>
      {{ initialCount }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/qasetud/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>なお上記のコードではボタンをクリックしても、いいね数は増えません。後ほど、親のVueインスタンスから渡されたデータをもとにして、子のコンポーネントでいいね数を増やす処理を解説します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-7">6.7 propsを検証する
</h3><p>先ほどは、コンポーネントのpropsオプションの値として配列を定義しました。この配列の中に、テンプレートの属性として渡されるデータを文字列で指定しました。このデータは、以下のように複数指定することもできます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>props: [<span class="string"><span class="delimiter">'</span><span class="content">count</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">counts</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>],
</pre></div>
</div>
</div>

<p>また <code>props</code> には、値を検証するためのルールを定義することもできます。特に複数人で開発する場合、ルールを書くことでコードの意図が分かりやすくなります。修正などによる不具合も防ぎやすくなります。</p>

<p>たとえば以下のようにオブジェクトを定義すると、<code>count</code> には数値、<code>counts</code> には配列の値が必ず必要になります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>props: {
  <span class="key">count</span>: {
    <span class="key">type</span>: Number,
    <span class="key">required</span>: <span class="predefined-constant">true</span>,
  },
  <span class="key">counts</span>: {
    <span class="key">type</span>: Array,
    <span class="key">required</span>: <span class="predefined-constant">true</span>,
  },
},
</pre></div>
</div>
</div>

<p><code>type</code> は、<code>props</code> の <strong>型</strong> を検証するルールです。型とは、データの種類のことです。たとえば数値なら <code>Number</code>、文字列なら <code>String</code>、配列なら <code>Array</code> です。テンプレートで渡された値が指定した型とは違うと、デベロッパーツールに警告が表示されます。</p>

<p><code>required:true</code> は、値が必須ということを指定するルールです。テンプレートなどで値を渡さないと、やはりデベロッパーツールに警告が表示されます。他にもいくつかルールがあります。詳しくは公式のガイド（<a href="https://jp.vuejs.org/v2/guide/components-props.html#%E3%83%97%E3%83%AD%E3%83%91%E3%83%86%E3%82%A3%E3%81%AE%E3%83%90%E3%83%AA%E3%83%87%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3" target="_blank">日本語版</a>、<a href="https://vuejs.org/v2/guide/components-props.html#Prop-Validation" target="_blank">英語版</a>）をご確認ください。</p>

<p>実際に、検証ルールを使ってコードを書いてみます。以下のコードをCloud9へコピーし、プレビュー表示してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button-preference</span> <span class="attribute-name">initial-count</span>=<span class="string"><span class="delimiter">"</span><span class="content">0</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">props</span>: {
    <span class="key">initialCount</span>: {
      <span class="key">type</span>: Number,
      <span class="key">required</span>: <span class="predefined-constant">true</span>,
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button&gt;</span>
      {{ initialCount }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
  },
});
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/component2.png" alt=""></p>

<p>表示は問題ありません。しかしデベロッパーツールを確認すると、エラーメッセージが出ています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/vue-warn2.png" alt=""></p>

<p>日本語にすると、「[Vueの警告]： 不正なprop： “initialCount”の型チェックに失敗しました。期待していたのは数値で、取得したのは文字列でした。」という内容です。つまりテンプレートから <code>props</code> に渡した値が、数値ではなく文字列だったということです。</p>

<p>なぜ文字列かというと、<code>属性名＝"属性値"</code> という形で値を渡しているからです。この形だと、属性値はすべて文字列になります。数値として渡すには、v-bindディレクティブを使います。先ほど <em>index.html</em> に書いたテンプレートを、以下のように修正してください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference</span> <span class="attribute-name">v-bind:initial-count</span>=<span class="string"><span class="delimiter">"</span><span class="content">0</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>これでエラーメッセージが消えます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/dupetan/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-8">6.8 propsを子コンポーネント内で変更しない
</h3><p><code>props</code> は、親から子のコンポーネントへと伝わります。親のデータに変更があれば、そのデータを属性として渡された子の <code>props</code> に変更が伝わります。この流れは、親から子への一方向です。子のコンポーネントが、 <code>props</code> を変更すべきではありません。子が親から渡されたデータを直接変更してしまうと、データの変更がどこで起きるのか分かりづらくなるからです。</p>

<p>以下のコードは、悪い例です。子のコンポーネントが、<code>props</code> を変更しています。Cloud9へコピーし、プレビュー表示してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button-preference</span> <span class="attribute-name">v-bind:initial-count</span>=<span class="string"><span class="delimiter">"</span><span class="content">0</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">props</span>: [<span class="string"><span class="delimiter">'</span><span class="content">initialCount</span><span class="delimiter">'</span></span>],
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.initialCount += <span class="integer">1</span>;
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ initialCount }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
  },
});
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/component3.gif" alt=""></p>

<p>ボタンをクリックすると、「いいね！」の数字が増えます。表示と動作は問題ありません。しかしボタンをクリックしてデベロッパーツールを確認すると、エラーメッセージが出ます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/vue-warn2.png" alt=""></p>

<p>このメッセージは、propsの <code>'initialCount'</code> を変更していることへの警告です。<code>props</code> を直接変更するのではなく、コンポーネント内で定義するデータの初期値などとして <code>props</code> の値を使うようにします。</p>

<p>先ほどの <em>main.js</em> を、以下のように修正しましょう。コンポーネントにdataオプションを加えています。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  <span class="key">props</span>: [<span class="string"><span class="delimiter">'</span><span class="content">initialCount</span><span class="delimiter">'</span></span>],
  data() {
    <span class="keyword">return</span> { <span class="key">count</span>: <span class="local-variable">this</span>.initialCount };
  },
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.count += <span class="integer">1</span>;
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ count }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
  },
});
</pre></div>
</div>
</div>

<p><code>props</code> の値を、コンポーネント内のデータである <code>count</code> の初期値として使っています。ボタンをクリックすると、<code>props</code> ではなくコンポーネント内のデータを変更するようにしました。これでエラーメッセージが消えます。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/redugux/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<div class="alert alert-info">
  <p>
  ちなみに関数においても、引数を関数内で変更するのはあまり良くないです。どこで変数などの値が変更されるか、分かりづらくなるからです。不具合の原因となりやすいです。詳しくは、ESLintのルールである<a href="https://eslint.org/docs/rules/no-param-reassign.html" target="_blank">Disallow Reassignment of Function Parameters (no-param-reassign)
</a>や、<a href="https://github.com/airbnb/javascript#functions--mutate-params" target="_blank">Airbnb JavaScript Style Guide
</a>などを確認してください。英文ですが、具体的なコードも載っています。
  </p>
  <p>
    またESLintについては、Lesson3の<a href="javascript#chapter-10-1">10.1 Linter（リンター）</a>をご確認ください。
  </p>
</div>
</div><div class="subsection challenge"><h3 class="index" id="kadai-vue">課題：Lesson6のサイトにFlickr APIとVue.jsを使う</h3><p>Lesson6で制作したリッチなサイトの <strong>Gallery</strong> では、すでにある犬・猫の画像素材を使って8枚表示しています。</p>

<p>Lesson7の課題では、このサイトの <strong>Gallery</strong> の画像データをFlickr APIから取得して、jQueryで表示しました。</p>

<p>今回の課題では、Flickr APIから画像データを取得して、その表示をVue.jsで行いましょう。</p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/vue/add-vue.zip">（Lesson9の課題用）Lesson6サイトの完成版のダウンロード</a></p>

<p>以下の仕様を満たして下さい。</p>

<h4>仕様</h4>

<ul>
  <li>上記のダウンロードリンクから、Lesson6サイトの完成版をダウンロードしてください。<em>add-vue</em> フォルダの中に、<em>rich-site</em> の制作物が含まれています。また今回の課題のために、<em>vue-gallery.js</em> というJSファイルが同梱されています。この <em>vue-gallery.js</em> ファイルに、カスタムディレクティブの登録やVueインスタンスの作成などの処理を書いてください。</li>
  <li>Lesson7の課題と同じく、犬の画像と猫の画像を4枚ずつ連続で表示して（犬と猫のどちらを先に表示するかまでは問いません）、<code>flickr.photos.search</code> のパラメータに <code>license: '4', // Creative Commons Attributionのみ</code> と <code>extras: 'owner_name,license', // 追加で取得する情報</code> を含めてください。</li>
  <li>Flickrから取得した写真をクリックしたときの挙動として、ライトボックス(Magnific Popup)を使うのではなく、Flickr画像元ページへ新規タブでリンクさせるようにしてください。</li>
  <li>本レッスンで行ったように、<a href="vue#chapter-5-3">カスタムディレクティブ</a>を使ってBootstrapのTooltip機能でライセンス表記を行ってください。</li>
  <li>ルートVueインスタンスは、elオプションの値を <code>'#gallery'</code> にしてください。つまり、 <code>new Vue({ el: '#gallery', ... })</code> というように書いてください。</li>
</ul>
</div></section><section id="chapter-7"><h2 class="index">7. スロット
</h2><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 コンポーネントにコンテンツを渡す
</h3><p>HTML要素には、開始タグと終了タグの間にコンテンツを入れることができます。ここで言うコンテンツとは、テキストや他のHTML要素のことです。たとえばbutton要素なら、以下のようにテキストを入れることができます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button&gt;</span>すごいね！<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<p>それではコンポーネントで同じことをすると、どうなるでしょう。以下のコードをCloud9へコピーし、プレビュー表示してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Vue.js Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button-preference&gt;</span>すごいね！<span class="tag">&lt;/button-preference&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  data() {
    <span class="keyword">return</span> { <span class="key">count</span>: <span class="integer">0</span> };
  },
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.count += <span class="integer">1</span>;
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ count }} いいね！
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key"><span class="delimiter">'</span><span class="content">button-preference</span><span class="delimiter">'</span></span>: buttonPreference,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/tuyizor/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>上記のコードでは、コンポーネントの開始タグと終了タグの間にテキストを入れました。以下の部分です。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span>すごいね！<span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>しかしプレビューで表示を確認すると、このテキストは反映されていません。コンポーネントでは通常、開始タグと終了タグの間に入れたコンテンツは削除されてしまうのですが、コンポーネントにコンテンツを入れる方法があります。そのためには、<strong>スロット</strong> という機能を使います。</p>

<p>具体的にはまず、コンポーネントのテンプレートにslot要素を加えます。先ほどの <em>main.js</em> を、以下のように修正してください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  data() {
    <span class="keyword">return</span> { <span class="key">count</span>: <span class="integer">0</span> };
  },
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.count += <span class="integer">1</span>;
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ count }} <span class="tag">&lt;slot&gt;</span><span class="tag">&lt;/slot&gt;</span>
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="comment">// 以下省略</span>
</pre></div>
</div>
</div>

<p>slot要素を加えた部分に、コンテンツが渡されます。再度、プレビュー表示してみましょう。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/wivusun/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>ボタンのテキストが変わりました。このようにslot要素は、コンポーネントの開始タグと終了タグの間に入れたコンテンツで置き換わります。</p>

<p>slot要素内には、デフォルトのコンテンツを入れることもできます。たとえば以下のコードでは、デフォルトのコンテンツとして「いいね！」というテキストを入れています。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const buttonPreference = {
  data() {
    <span class="keyword">return</span> { <span class="key">count</span>: <span class="integer">0</span> };
  },
  <span class="key">methods</span>: {
    countUp() {
      <span class="local-variable">this</span>.count += <span class="integer">1</span>;
    },
  },
  <span class="key">template</span>: <span class="error">`</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">v-on:click</span>=<span class="string"><span class="delimiter">"</span><span class="content">countUp</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      {{ count }} <span class="tag">&lt;slot&gt;</span>いいね！<span class="tag">&lt;/slot&gt;</span>
    <span class="tag">&lt;/button&gt;</span>
  <span class="error">`</span>,
};

<span class="comment">// 以下省略</span>
</pre></div>
</div>
</div>

<p>コンポーネントを使う側のテンプレートは、以下のように変更してみます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span><span class="tag">&lt;/button-preference&gt;</span>
  <span class="tag">&lt;button-preference&gt;</span>すごいね！<span class="tag">&lt;/button-preference&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/ciwuqah/embed?html,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>コンポーネントの開始タグと終了タグの間にコンテンツを入れずに使うと、slot要素内のコンテンツが表示されます。一方で開始タグと終了タグの間にコンテンツを入れると、そのコンテンツでslot要素が置き換わります。</p>
</div></section><section id="chapter-8"><h2 class="index">8. プラグイン
</h2><div class="subsection"><p><strong>プラグイン</strong> を使うと、Vue.jsに機能を追加できます。具体的には、メソッドやカスタムディレクティブ、コンポーネントなどを追加できます。ちなみに<a href="vue#chapter-5-3">Chapter5</a>では、jQueryのプラグインを使いましたね。jQueryと同じく、Vue.jsにも公開されているプラグインが多くあります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 カルーセル
</h3><p>ここでは一例として <a href="https://ssense.github.io/vue-carousel/" target="_blank">Vue Carousel</a> というプラグインを紹介します。このプラグインを使うと、簡単にカルーセルが作れます。</p>

<p>以下は、カルーセルを実装したコード全体です。Cloud9へコピーし、プレビュー表示してみましょう。コードの詳細は、後ほど説明します。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Vue Carousel<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdn.jsdelivr.net/npm/vue/dist/vue.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/head&gt;</span>
<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">example</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;carousel&gt;</span>
      <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド１の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
      <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド２の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
      <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド３の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
      <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド４の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
    <span class="tag">&lt;/carousel&gt;</span>
  <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://ssense.github.io/vue-carousel/js/vue-carousel.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.VueCarousel-slide</span> {
  <span class="key">position</span>: <span class="value">relative</span>;
  <span class="key">min-height</span>: <span class="float">300px</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;
  <span class="key">font-size</span>: <span class="float">24px</span>;
  <span class="key">background-color</span>: <span class="value">skyblue</span>;
  <span class="key">color</span>: <span class="color">#fff</span>;
}

<span class="class">.label</span> {
  <span class="key">position</span>: <span class="value">absolute</span>;
  <span class="key">top</span>: <span class="float">50%</span>;
  <span class="key">left</span>: <span class="float">50%</span>;
  <span class="key">transform</span>: <span class="error">t</span><span class="error">r</span><span class="error">a</span><span class="error">n</span><span class="error">s</span><span class="error">l</span><span class="error">a</span><span class="error">t</span><span class="error">e</span>(<span class="float">-50%</span>, <span class="float">-50%</span>);
}
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key">carousel</span>: VueCarousel.Carousel,
    <span class="key">slide</span>: VueCarousel.Slide,
  },
});
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/xohaden/embed?html,css,js,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>※ Output欄の表示幅を広くするか、JS Binのサイトに遷移するボタンをクリックするかして、表示内容を確認してください。</p>

<p>上記のコードだけで、カルーセルが作れました。</p>

<p>コードを確認していきます。まず <em>index.html</em> では、以下のscript要素によってCDNでプラグインを読み込んでいます。これによって、Vue Carouselが提供しているコンポーネントへアクセスできるようになります。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://ssense.github.io/vue-carousel/js/vue-carousel.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<p>次に、Vue Carouselのコンポーネントをローカル登録します。<code>VueCarousel.Carousel</code> と <code>VueCarousel.Slide</code> という２つのコンポーネントです。これでローカル登録したVueインスタンス内から、Vue Carouselのコンポーネントを使えるようになります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">new</span> Vue({
  <span class="key">el</span>: <span class="string"><span class="delimiter">'</span><span class="content">#example</span><span class="delimiter">'</span></span>,
  <span class="key">components</span>: {
    <span class="key">carousel</span>: VueCarousel.Carousel,
    <span class="key">slide</span>: VueCarousel.Slide,
  },
});
</pre></div>
</div>
</div>

<p>登録した２つのコンポーネントは、テンプレートで以下のように使います。カルーセル全体をcarouselコンポーネントで囲って、その中にslideコンポーネントを入れます。slideコンポーネント内に、個々のスライドの内容を書きます。span要素に <code>label</code> というクラスをつけているのは、スライド内容の位置をCSSで調整するためです。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;carousel&gt;</span>
  <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド１の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
  <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド２の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
  <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド３の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
  <span class="tag">&lt;slide&gt;</span><span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>スライド４の内容<span class="tag">&lt;/span&gt;</span><span class="tag">&lt;/slide&gt;</span>
<span class="tag">&lt;/carousel&gt;</span>
</pre></div>
</div>
</div>

<p>あとはCSSで見た目を整えたら、基本的なカルーセルが実装できます。表示方法や動きなどを変更することもできます。たとえば画面幅によって表示するスライドの枚数を変えたり、自動でスライドさせるなどです。詳しくは、Vue Carouselの<a href="https://ssense.github.io/vue-carousel/examples/" target="_blank">Examples</a>や<a href="https://ssense.github.io/vue-carousel/api/" target="_blank">API</a>、そして<a href="https://github.com/SSENSE/vue-carousel#configuration" target="_blank">GitHub</a>をご確認ください。</p>

<p>以下のコードでは、画面幅によって表示するスライドの枚数を変えています。<em>main.js</em> は、先ほどと同じです。スライドの画像は、Lesson4の<a href="jquery#chapter-9">9. あの部品はどうやってできてるの？</a>でダウンロードしたサンプル画像です。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;carousel</span> <span class="attribute-name">v-bind:per-page-custom</span>=<span class="string"><span class="delimiter">"</span><span class="content">[[0, 1], [768, 2], [992, 3]]</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;slide&gt;</span>
    <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/img1.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">300</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">人の手に乗る子猫</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/slide&gt;</span>
  <span class="tag">&lt;slide&gt;</span>
    <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/img2.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">300</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">机上に座る猫</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/slide&gt;</span>
  <span class="tag">&lt;slide&gt;</span>
    <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/img3.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">300</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">屋外の猫</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/slide&gt;</span>
  <span class="tag">&lt;slide&gt;</span>
    <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/img4.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">300</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">犬の顔</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/slide&gt;</span>
<span class="tag">&lt;/carousel&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.VueCarousel</span> {
  <span class="key">min-width</span>: <span class="float">300px</span>;
}

<span class="class">.VueCarousel-slide</span> {
  <span class="key">height</span>: <span class="float">300px</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;
  <span class="key">background-color</span>: <span class="value">skyblue</span>;
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/vue/carousel.gif" alt=""></p>
</div></section><section id="chapter-9"><h2 class="index">9. まとめ
</h2><div class="subsection"><p>本レッスンで解説したのは、Vue.jsの機能の一部に過ぎません。ぜひ公式のガイドなどから、色々な便利機能を探してみてください。そしてぜひ、Vue.jsを使ったWebサービスなどを作ってみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 フレームワークの役割
</h3><p>かつてJavaScriptの役割は、Webページの見た目を少し変えるくらいでした。要素の表示・非表示を切り替えたり、簡単なアニメーションを加えるなどです。</p>

<p>しかし現在、JavaScriptの役割はとても大きくなっています。見た目を少し変えるだけでなく、ページ全体を生成・変更することもあります。役割が大きくなるにつれて、「状態」をどうやって管理するかが問題になりました。ここで言う状態とは、時間や状況によって変化するデータのことです。たとえばAPIから取得するJSONや、ユーザがフォームに入力する文字列などです。</p>

<p>jQueryを使った開発では状態を、変数や個々のDOM要素で保持するのが一般的です。たとえばLesson8では、ユーザデータなどを <code>dbdata</code> というグローバル変数で保持しました。しかし扱う状態が多くなると、変数などで保持するだけでは管理が難しくなります。Chapter1の<a href="vue#chapter-1-1">jQueryの限界と問題点</a>でも触れましたが、処理が複雑になりやすいです。</p>

<p>この問題を解決してくれるのが、Vue.jsなどのフレームワークです。Vue.jsの場合、Vueインスタンスなどに状態の管理を任せることができます。状態が変化したら、自動でDOM要素を更新してくれます。またコンポーネントを使うことで再利用しやすくなり、状態の影響する範囲を限定できます。それぞれのコンポーネントがどんな状態を扱い、親から子へとどんな状態が渡されるか、なども分かりやすくなります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 他のフレームワークとの違い
</h3><p>フレームワークにはVue.js以外にも、ReactやAngularなどがあります。他のフレームワークと比べたVue.jsの特徴は「小さく、簡単に始めやすい」ということです。小さく始めて、少しずつ大規模な開発へと発展させることもできます。またFlickr APIを使った課題で実装したように、jQueryで書かれたコードの一部をVue.jsに置き換えることも比較的かんたんです。ReactやAngularなどとの違いについて詳しくは、公式ガイドの<a href="https://jp.vuejs.org/v2/guide/comparison.html" target="_blank">他のフレームワークとの比較</a>を確認してください。</p>
</div></section></div>
</body>
</html>