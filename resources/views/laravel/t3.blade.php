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
<div class="markdown"><div class="lesson-num p">Lesson3</div><h1 id="bootstrap">Bootstrap
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>見栄えの良いWebサイトを作るには何が必要でしょうか。きれいな写真、かっこいいイラスト、センスのよいデザイナー…など揃っていれば最高ですが、なかなか現実は思い通りにいきません。ベテランのフロントエンドエンジニアでさえ、見栄えのするページを一から作るのは骨の折れる作業です。ましてやHTMLやCSSを勉強したての私たちにとって、美しく整ったWebページを一から作るのは不可能なようにも思えます。</p>

<p>幸いなことに、Bootstrapを使えば見た目の綺麗なページを簡単に作ることができます。このレッスンではBootstrapの使い方と、Bootstrapが提供する様々な便利機能を紹介します。</p>

<p>スマートフォンやタブレットの普及によって、これまでパソコンを使用する人しか馴染みのなかったインターネットを誰もが使うようになり、それに伴い様々なWebサービスをたくさんの人に提供できる環境になりました。その事から、「いかに効率良く開発・制作」を行い、「アイデアをすぐ形にして世の中にリリースする」ことの重要性が高まってきているのではないでしょうか。</p>

<ul>
  <li>整ったサイトデザインをできるようになりたい</li>
  <li>デザイナーじゃないけどサイトを作りたい/作る必要がある</li>
  <li>情報量の多いサイトを制作したい</li>
  <li>とにかく早くサービスを完成させたい</li>
</ul>

<p>Bootstrapは、そのような理由や動機を持つ方には革新的なシステムであり、使いこなせれば想像以上に楽に、整ったWebサイト・サービスをすばやく完成させることができるようになるでしょう。</p>

<p>Bootstrapを使う前にまずは、Bootstrapがどのようなものなのか基本情報をしっかりと理解しておきましょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. Bootstrapとは
</h2><div class="subsection"><p><a href="http://getbootstrap.com/" target="_blank">Bootstrap</a>はHTML、CSS、JavaScriptからなる巨大なライブラリです。元々は米Twitter社で開発された経緯から、Twitterのような見た目のサイトを作るための部品が数多く含まれています。Bootstrapをページに組み込むとページの見栄えを一気に底上げすることができ、美しく整ったページを簡単に作れます。また、後ほど解説するレスポンシブデザインにも対応しており、デスクトップからモバイルまで幅広い画面サイズに対応したサイトを楽に作ることができます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-bootstrap4-website.png" alt="BootstrapのWebサイト"></p>

<p>本レッスンではBootstrapのバージョン4系について解説します。1つ前のバージョン3とは使い方が大きく変わりますので、正しいバージョンを使っているか注意してレッスンを進めてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Bootstrapの中身
</h3><p>Bootstrapの中身は、CSSとJavaScriptの塊です。私たちが1からCSSやJavaScriptのコーディングを行う必要のないように、最初からある程度Bootstrapが書いてくれているのです。</p>

<p>Bootstrapを利用するには、Bootstrap4はjQueryとpopper.jsというものを利用しているので、その2つも読み込んでおく必要があります（読み込み方については後述します）。</p>

<p>下記リンクにBootstrapの中身があります。中身をちゃんと読む必要はありませんが、このようにCSSやJavaScriptが書かれているということは覚えておきましょう。</p>

<ul>
  <li><a href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.css" target="_blank">BootstrapのCSS: https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.css</a></li>
  <li><a href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.js" target="_blank">BootstrapのJavaScript: https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.js</a></li>
</ul>

<p>本コースでは JavaScript については学びません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 対応ブラウザ
</h3><p>Bootstrapはデスクトップからモバイルまで、Windows、Mac OS X、iOS、Androidのすべての主要ブラウザに対応しています。Internet Explorerについてはバージョン10（IE10）以上に対応していますが、少し見た目が崩れるなど限定的な対応であると認識した方が良いでしょう。</p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/getting-started/browsers-devices/#supported-browsers" target="_blank">Bootstrap対応ブラウザ一覧</a></li>
  <li><a href="https://jquery.com/browser-support/" target="_blank">jQuery対応ブラウザ一覧</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 ドキュメント
</h3><h4>公式ドキュメント（公式サイト）</h4>

<p>Bootstrap は公式サイト自体がサンプルコード集となっており、最も充実したドキュメントサイトです。</p>

<ul>
  <li><a href="http://getbootstrap.com/" target="_blank">Bootstrap</a></li>
</ul>

<p>英語を読むというよりは、サンプルコードを参考にするのみでもOKです。</p>

<h4>非公式の日本語訳ドキュメント</h4>

<p>公式は英語なので、英語が苦手だと辛いかもしれません。更に解説もちゃんと読みたいとなると英語を読むのは苦痛でしょう。そこで非公式の日本語訳ドキュメントも存在します。どうしても英語が厳しい方は、こちらを参照すると良いかもしれません。</p>

<ul>
  <li><a href="https://getbootstrap.jp/docs/4.3/getting-started/introduction/" target="_blank">有志による公式サイトの和訳版</a></li>
  <li><a href="https://cccabinet.jpn.org/bootstrap4/" target="_blank">Bootstrap 4 移行ガイド</a></li>
  <li><a href="http://webdesign.vdlz.xyz/TagScript/template/Bootstrap/Bootstrap_4_Doc/Bootstrap4Doc.html" target="_blank">Bootstrap 4 ドキュメントの和訳</a></li>
</ul>
</div></section><section id="chapter-3"><h2 class="index">3. Bootstrapの読み込み
</h2><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 CDNを使う
</h3><p>CDN（Content Delivery Network）とは、Bootstrapのような公開ライブラリを誰でも自由に使えるようにWeb上に設置（ホスティング）してくれているサイトです。以下のようにHTMLを追加するだけですぐ使えます。CSSとJavaScriptを両方とも入れます。</p>

<p><a href="https://getbootstrap.com/docs/4.2/getting-started/introduction/" target="_blank">こちら</a>の「Quick start」ならびに「Starter template」のサンプルコードをコピーして使うことができます。ただし <code>lang="en"</code> となっている部分は <code>lang="ja"</code> としてください。</p>

<p>Starter templateを少し修正したHTMLは以下のようになります。</p>

<p><em>Bootstrap Template</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="comment">&lt;!-- Required meta tags --&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="tag">&lt;title&gt;</span>Hello, world!<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>Hello, world!<span class="tag">&lt;/h1&gt;</span>

        <span class="comment">&lt;!-- Optional JavaScript --&gt;</span>
        <span class="comment">&lt;!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>Bootstrap を使うときは上記のテンプレートを使うようにしましょう。本レッスンでもこれから使用していきます（補足：「Starter template」のコードに記載されている <code>integrity</code> と <code>crossorigin</code> の属性情報は、削除しても動作します）。</p>
</div></section><section id="chapter-4"><h2 class="index">4. viewportの設定
</h2><div class="subsection"><p>スマートフォンに対応するためには、まずはviewportの設定を正確にする必要があります。viewportとはスマートフォンやPC画面における表示領域のことで、head要素内のmetaタグで指定をします。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>Bootstrapのtemplateに記載されていた上記のコードは、以下の意味を持ちます。</p>

<ul>
  <li>表示領域の横幅をデバイスと同じ横幅にする( <code>width=device-width</code> )</li>
  <li>表示倍率を1倍にする( <code>initial-scale=1</code> )</li>
  <li>iOSのSafariで表示倍率を自動的に縮小する処理を無効にする( <code>shrink-to-fit=no</code> )</li>
</ul>

<p>なぜ、このviewportの指定が必要かをiPhone8を例に考えてみましょう。iPhone8のデバイスの実機の画面サイズの横幅は<code>375px</code>となっています。しかし、デフォルトの表示領域の横幅(width)が<code>980px</code>となっています。これにより実機の狭い画面の横幅(<code>375px</code>)に広い表示領域の横幅(<code>980px</code>)を押し込む形となりますので、<code>375 / 980</code>で約3分の1の倍率でWebページが縮小表示されます。</p>

<p>Google Chromeのデベロッパーツールを使って、ブラウザでの表示とiPhone8での表示を比較してみましょう。デベロッパーツールについては<a href="./html-css#chapter-11" target="_blank">Lesson3 HTML/CSS の 11.デベロッパーツール</a><!-- __ -->の内容を確認してください。</p>

<p>まずはviewportの設定をしないデフォルトの場合です。下記のHTMLでテストを行います。<strong>Cloud9で下記ファイルを作成し、プレビューを行って手元でもしっかり確認してみてください。</strong></p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>レスポンシブデザイン<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>viewportについて<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>viewportとはスマートフォンやPC画面における表示領域のことです。head要素内のmetaタグで指定をします。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>まずは、上記のviewportが設定されていないHTMLをPCで表示した場合を見てみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/viewport_01[1].png" alt=""></p>

<p><em>PCでの表示</em></p>

<p>次に、iPhone8（デベロッパーツール）で見てみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/viewport_02[1].png" alt=""></p>

<p><em>iPhone8での表示</em></p>

<p>それでは、上記と比較してviewportの設定を追加した場合の表示を見ていきましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>レスポンシブデザイン<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>viewportについて<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>viewportとはスマートフォンやPC画面における表示領域のことです。head要素内のmetaタグで指定をします。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>まずはPCでの表示を見てみます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/viewport_03[1].png" alt=""></p>

<p><em>PCでの表示</em></p>

<p>次にiPhone8（デベロッパーツール）で見てみます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/webdesign/html-css/viewport_04[1].png" alt=""></p>

<p><em>iPhone8での表示</em></p>

<p>レスポンシブでデバイスに依存しない最適な表示を行いたい場合には、viewportをしっかりと設定しておきましょう。多くの場合で、今回指定したviewportによって最適となります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>
</div></section><section id="chapter-5"><h2 class="index">5. Bootstrapを利用する上で知っておいてほしい知識
</h2><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 レスポンシブデザイン
</h3><p>レスポンシブデザインとは、<strong>多様な画面サイズに適応するよう配慮しながらページを制作する手法</strong> のことです。1つのページをスマートフォンやデスクトップパソコンなど様々な画面サイズで快適に閲覧できるようにしたものです。レスポンシブデザインにすることで、ユーザの利便性向上、Googleの検索結果で上位に出やすくなる、など様々なメリットがあります。</p>

<p>レスポンシブデザインの基本はメディアクエリです。Bootstrapの内部ではメディアクエリが適切に設定されており、グリッドなどBootstrapの仕組みの中でサイトを作るだけで自動的にレスポンシブデザインのページができあがります。ウインドウ幅を変えたときに不自然な表示になっていないか逐一確認しながら制作していきましょう。</p>

<p>レスポンシブデザインも Bootstrap が用意してくれているので、私たちはそれを利用させてもらえれば良いのです。そのために理解する必要のある技術がグリッドシステムでした。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 メディアクエリ
</h3><p>メディアクエリを使うと <strong>特定の表示環境に対してだけCSSを適用</strong> できます。たとえば以下の例のように記述すると、背景色を表示幅に合わせて変えることができます。表示幅500px未満では灰色（#666）、表示幅500pxでは赤（#f00）、750px以上では緑（#0f0）、1000px以上では青（#00f）に変わります。ウインドウをリサイズして実際に試してみましょう。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/fuvupu/embed?html,css,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<p>メディアクエリ自体はCSSの優先順位に影響を与えず、単に <strong>より下方で定義された値が優先される</strong> というCSSのルールを利用しているに過ぎません。そのため、上の方により広い条件（ <code>min-width:500px</code> ＝表示幅500px以上）を書き、下に行くに従って対象範囲が狭まる（ <code>min-width:1000px</code> ＝表示幅1000px以上）ように書きます。</p>

<p>なお、<code>min-width</code> の他に「○○○px以下の場合」を指定できる <code>max-width</code> もあります。このような、表示内容が切り替わるサイズ幅のことをブレイクポイントといいます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 グリッド
</h3><p>Bootstrapにはグリッドシステムという仕組みがあり、<strong>横幅いっぱいを<span style="color: #f00;">12カラム(列)</span>としたときに何カラム分の横幅を割り当てるか</strong>を指定するだけで要素を配置していくことができます。グリッドは必要に応じて使えばよく、グリッドを一切使わずにページを作っても構いません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-grid-system.png" alt="グリッドは12カラムから成り立つ"></p>

<p>使い方のルールとしては、まず、グリッドを使いたい範囲を囲うブロックレベル要素に <code>container</code> クラスをつけます。次に、<code>container</code> のブロックの中に <code>row</code> というクラスをつけたブロックレベル要素を用意します。<code>row</code> をつけたブロックの中へ配置する要素にカラム数を設定いく、というルールになります。カラム数は、指定のクラスを追加することで設定します。そのクラスの書式は、次の例のように<code>col-[画面サイズ]-[カラム数]</code>という書式になっています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-grid-system-col.png" alt="クラスの指定方法"></p>

<p>実際に試してみましょう。先ほどの Bootstrap Template から、以下の内容で <em>bootstrap_lesson.html</em> を Cloud9 上に作成してください。これはテスト用のファイルなのでどこに作成してもらっても構いません。</p>

<p><em>bootstrap_lesson.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="comment">&lt;!-- Required meta tags --&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="tag">&lt;title&gt;</span>Grid System Test<span class="tag">&lt;/title&gt;</span>

        <span class="tag">&lt;style&gt;</span>
<span class="inline">            <span class="class">.row</span> <span class="tag">div</span> {
                <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#000</span>;
                <span class="key">padding</span>: <span class="float">1em</span>;
                <span class="key">text-align</span>: <span class="value">center</span>;
                <span class="key">background-color</span>: <span class="color">#dedede</span>;
            }</span>
        <span class="tag">&lt;/style&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-md-6</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>col-md-6<span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-md-6</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>col-md-6<span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/div&gt;</span>

        <span class="comment">&lt;!-- Optional JavaScript --&gt;</span>
        <span class="comment">&lt;!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>上記の HTML を開くと、ウインドウ幅が768px以上のときはdivが左右に並びます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-grid-system-cols-wide.png" alt="ウインドウ幅が768px以上のとき"></p>

<p>一方、ウインドウ幅が768px未満のときは縦に並びます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-grid-system-cols-narrow.png" alt="ウインドウ幅が768px未満のとき"></p>

<p><code>col-md-6</code>を指定すると、ウインドウ幅がmd（タブレット＝768px）以上のときに6カラム分の幅を使用し、ウインドウ幅がそれ未満のときは通常のdivの挙動となり横幅100%を使用します。</p>

<p>画面サイズに指定できる値は以下の通りです。</p>

<table>
  <thead>
    <tr>
      <th>&nbsp;</th>
      <th><code>col-*</code></th>
      <th><code>col-sm-*</code></th>
      <th><code>col-md-*</code></th>
      <th><code>col-lg-*</code></th>
      <th><code>col-xl-*</code></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>ウインドウ幅</td>
      <td>〜575px</td>
      <td>576〜767px</td>
      <td>768〜991px</td>
      <td>992〜1199px</td>
      <td>1200px〜</td>
    </tr>
    <tr>
      <td>想定端末</td>
      <td>スマートフォン(縦)</td>
      <td>スマートフォン(横)</td>
      <td>タブレット</td>
      <td>デスクトップ</td>
      <td>大きなデスクトップ</td>
    </tr>
  </tbody>
</table>

<p>異なる画面サイズを同時に指定すると、より画面サイズの大きいものが優先されます。たとえば <code>col-6 col-lg-4</code>と指定すると、スマートフォン（縦・横）とタブレット（mdとmd未満）では6カラム、デスクトップサイズ（lg）以上では4カラムの幅で表示されます。</p>

<h4>すき間を空ける</h4>

<p><code>offset-[画面サイズ]-[カラム数]</code>で、指定したカラム分の隙間が直前に挿入されます。</p>

<p><em>bootstrap_lesson.html の body 要素</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-md-5</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>col-md-5<span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">offset-md-2 col-md-5</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>offset-md-2 col-md-5<span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/div&gt;</span>

        <span class="comment">&lt;!-- Optional JavaScript --&gt;</span>
        <span class="comment">&lt;!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>md以上（768px〜）のときの表示</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-grid-system4-cols-offset-wide.png" alt="md以上（768px〜）のときの表示"></p>

<p>md未満（〜767px）のときの表示</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-grid-system4-cols-offset-narrow.png" alt="md未満（〜767px）のときの表示"></p>

<p><em>以下のJS Binの画面において、各表示の境界線上にカーソルを持っていきドラッグで移動させたり、表示をOutputのみにしたり、左上の「JS Bin」ボタンをクリックしたりすると広い画面幅で確認できます。</em></p>

<p><iframe class="" id="" data-url="https://jsbin.com/gatiko/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/layout/grid/" target="_blank">参考: グリッドシステム</a></li>
</ul>
</div></section><section id="chapter-6"><h2 class="index">6. Bootstrapのパーツ
</h2><div class="subsection"><p>ここでは、 Bootstrap のパーツのいくつか重要なものを紹介します。他にもパーツはあるので、公式サイトを眺めるだけでもしておくと良いでしょう。</p>

<p>HTMLの見た目の部分をBootstrapのようにキレイにするには、基本的に <code>class</code> を指定してあげればOKです。</p>

<p>ここからはBootstrapを利用したサンプルコードをいくつか見ていきます。先ほどの Bootstrap Template の body 内部にサンプルコードをコピペして Preview して試してください。また、 bootstrap の <code>class="table"</code> を逆に削除してみたらどういう表示になるかなども確認しておくと一層理解が深まるでしょう。Cloud9 でやるのが面倒な方は、 JS Bin もいくつか用意してあるので、それを編集して遊んでみてもOKです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 テーブル
</h3><p>通常の<code>&lt;table&gt;</code>要素に<code>class="table"</code>を付けるだけで見た目が綺麗になります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;table</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">table table-striped table-bordered</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;tr&gt;</span>
        <span class="tag">&lt;th</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>都道府県<span class="tag">&lt;/th&gt;</span>
        <span class="tag">&lt;th</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>人口（人）<span class="tag">&lt;/th&gt;</span>
        <span class="tag">&lt;th</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>面積（km<span class="tag">&lt;sup&gt;</span>2<span class="tag">&lt;/sup&gt;</span>）<span class="tag">&lt;/th&gt;</span>
    <span class="tag">&lt;/tr&gt;</span>
    <span class="tag">&lt;tr&gt;</span>
        <span class="tag">&lt;td&gt;</span>東京都<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;td</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-right</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>13,507,347人<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;td</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-right</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>2,190.90km<span class="tag">&lt;sup&gt;</span>2<span class="tag">&lt;/sup&gt;</span><span class="tag">&lt;/td&gt;</span>
    <span class="tag">&lt;/tr&gt;</span>
    <span class="tag">&lt;tr&gt;</span>
        <span class="tag">&lt;td&gt;</span>神奈川県<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;td</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-right</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>9,146,101人<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;td</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-right</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>2,415.86km<span class="tag">&lt;sup&gt;</span>2<span class="tag">&lt;/sup&gt;</span><span class="tag">&lt;/td&gt;</span>
    <span class="tag">&lt;/tr&gt;</span>
    <span class="tag">&lt;tr&gt;</span>
        <span class="tag">&lt;td&gt;</span>大阪府<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;td</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-right</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>8,838,988人<span class="tag">&lt;/td&gt;</span>
        <span class="tag">&lt;td</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-right</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>1904.99km<span class="tag">&lt;sup&gt;</span>2<span class="tag">&lt;/sup&gt;</span><span class="tag">&lt;/td&gt;</span>
    <span class="tag">&lt;/tr&gt;</span>
<span class="tag">&lt;/table&gt;</span>
</pre></div>
</div>
</div>

<p>上のHTMLは以下の表示になります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-table.png" alt="テーブル"></p>

<p>また、テーブルの見た目の種類として以下のクラスを追加することができます。</p>

<table>
  <thead>
    <tr>
      <th>クラス</th>
      <th>効果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>table-striped</code></td>
      <td>行ごとに背景色が交互に変わる</td>
    </tr>
    <tr>
      <td><code>table-bordered</code></td>
      <td>各セルに枠が付く</td>
    </tr>
    <tr>
      <td><code>table-hover</code></td>
      <td>マウスを乗せると行がハイライトされる</td>
    </tr>
    <tr>
      <td><code>table-condensed</code></td>
      <td>余白を詰めてコンパクトに</td>
    </tr>
  </tbody>
</table>

<p>たとえば<code>&lt;table class="table table-striped"&gt;</code>で行ごとに背景色が入れ替わるテーブルになります。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/wuhekun/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/content/tables/" target="_blank">参考: テーブル</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 フォーム
</h3><p>通常の<code>&lt;input&gt;</code>に<code>form-control</code>クラスを付けるだけで自動的にかっこいいスタイルが適用されます。また、各要素をブロックレベル要素で囲み、その要素に <code>form-group</code> クラスを追加すると、要素間に余白が入る形でフォーム部品を配置してもらえます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        お名前
        <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-form-input.png" alt="テキスト入力フォーム"></p>

<h4>横に並べる</h4>

<p>Bootstrapでは通常、フォームの各要素は横幅100%で縦に並びます。左右にラベル( <code>&lt;label&gt;</code> 要素 ) を配置したい場合、グリッドのところで説明した <code>row</code> や <code>col-*-*</code> クラスを利用してください。また、ラベルには <code>col-form-label</code> クラスを追加してください。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form&gt;</span>
    <span class="comment">&lt;!-- 1行 --&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-2 col-form-label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>姓<span class="tag">&lt;/label&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-10</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">lastname</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="comment">&lt;!-- 1行 --&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-2 col-form-label</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>名<span class="tag">&lt;/label&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">col-10</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">firstname</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    <span class="comment">&lt;!-- 1行 --&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">offset-2 col-10</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録<span class="tag">&lt;/button&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-form4-group.png" alt="フォームグループ"></p>

<h4>アクセサリを付ける</h4>

<p>指定の要素の前後にアクセサリをつけることができます。まず、アクセサリをつけたい部品の親要素に <code>input-group</code> クラスをつけてください。次に、アクセサリをつけたい要素自身に <code>input-group-prepend</code> クラスをつけることで左端（要素の前）に、<code>input-group-append</code> クラスをつけることで右端（要素の後ろ）に、アクセサリを追加できます。アクセサリの中に表示したい文字列は <code>&lt;span&gt;</code> 要素で囲った上で <code>input-group-text</code> クラスを追加してください。</p>

<p>なお、前後に同時にアクセサリをつけることはできますが、片側に複数のアクセサリを連続してつけることはできません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;form&gt;</span>
      郵便番号
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-group input-group</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="comment">&lt;!-- 左端に付けるアクセサリ --&gt;</span>
          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">input-group-prepend</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">input-group-text</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>〒<span class="tag">&lt;/span&gt;</span>
          <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">form-control</span><span class="delimiter">"</span></span> <span class="attribute-name">placeholder</span>=<span class="string"><span class="delimiter">"</span><span class="content">000-0000</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-form-accessory.png" alt="アクセサリ付きのフォーム"></p>

<p><iframe class="" id="" data-url="https://jsbin.com/nicude/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/forms/" target="_blank">参考: フォーム</a></li>
  <li><a href="https://getbootstrap.com/docs/4.2/components/input-group/" target="_blank">参考: インプットグループ</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 ボタン
</h3><p><code>&lt;a&gt;</code>、<code>&lt;button&gt;</code>、<code>&lt;input&gt;</code>をBootstrap風の見た目のボタンに変えることができます。<code>btn</code> および <code>btn-[色の種類]</code> クラスを追加してください。<!-- なお、見た目をボタンにするときは、できるだけ`<a>`や`<input>`ではなく`<button>`を使うようにしましょう。--></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>aボタン<span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">inputボタン</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>buttonボタン<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-buttons4.png" alt="ボタン"></p>

<p><code>btn-primary</code>の部分を変えると以下のように見た目が変わります。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/seligam/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/buttons/" target="_blank">参考: ボタン</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 ドロップダウンメニュー
</h3><p>クリックすると開くメニューです。親要素 ( <code>&lt;div&gt;</code> ) に <code>dropdown-menu</code>、子要素 ( <code>&lt;a&gt;</code> ) に <code>dropdown-item</code> クラスを追加してください。<code>&lt;ul&gt;</code> と <code>&lt;li&gt;</code> は利用しません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-light dropdown-toggle</span><span class="delimiter">"</span></span> <span class="attribute-name">data-toggle</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        操作
    <span class="tag">&lt;/button&gt;</span>
    <span class="comment">&lt;!-- 選択肢 --&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>返信<span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>転送<span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-divider</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>削除<span class="tag">&lt;/a&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-dropdown4.png" alt="ドロップダウンメニュー"></p>

<p><iframe class="" id="" data-url="https://jsbin.com/hawayik/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/dropdowns/" target="_blank">参考: ドロップダウン</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 タブを使ったナビゲーション
</h3><p>コンテンツを切り替えて表示したいときに使います。一般的なリンクと同じですが、タブのナビゲーションを使うことで、今どのコンテンツが表示されているかがわかりやすくなります。<code>&lt;ul&gt;</code> に <code>nav</code> と <code>nav-tabs</code> クラスを、さらに <code>&lt;li&gt;</code> に <code>nav-item</code> クラス、<code>&lt;a&gt;</code> に <code>nav-link</code> クラスを追加してください。「現在このコンテンツを表示しています」というのを示す場合は <code>&lt;a&gt;</code> に <code>active</code> クラスも追加しましょう。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;ul</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav nav-tabs</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link active</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>収入<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>支出<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>合計<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
<span class="tag">&lt;/ul&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-tabs.png" alt="タブ"></p>

<p>下記のJS Binではタブの切り替えはできません。理由は切り替え先のページがないからです。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/qequfuq/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/navs/#tabs" target="_blank">参考: タブ</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-6">6.6 ナビゲーションバー
</h3><p>サイト上部に付くメニューです。ここでは以下のようなナビゲーションバーを作ってみます。</p>

<p>横幅が広いときの表示</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-navbar4-long.png" alt="横幅が広いときのナビゲーションバー"></p>

<p>横幅が狭いときの表示</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-navbar4-short.png" alt="横幅が狭いときのナビゲーションバー"></p>

<h4>ベースとなるナビゲーションバーを作る</h4>

<p>まずはベースを用意します。</p>

<ul>
  <li><code>&lt;nav&gt;</code> 要素に <code>navbar</code> クラスと <code>navbar-expand</code> クラスを追加してください。</li>
  <li>ナビゲーションバーの中に表示する内容の色の方針を決めます。背景色を明るい色にするときは <code>navbar-light</code> クラス、暗い色なら <code>navbar-dark</code> クラスを <code>&lt;nav&gt;</code> 要素に追加すると、いい感じに調整されます。今回は背景色を明るめにしたいので <code>navbar-light</code> クラスを指定します。</li>
  <li>背景色は <code>bg-[色の種類]</code> クラスを追加します。色の種類はボタンと同じ <code>primary</code> や <code>secondary</code>、<code>info</code> などです。今回は <code>bg-light</code> クラスを使います。</li>
  <li>よくあるサイトのように、左端に表示されるサイト名は <code>&lt;a&gt;</code> 要素で囲み、リンクを設定します。その <code>&lt;a&gt;</code> 要素には必ず <code>navbar-brand</code> クラスを追加してください。</li>
</ul>

<p><iframe class="" id="" data-url="https://jsbin.com/goxoley/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<h4>メニュー項目を追加する</h4>

<p>次に「子犬」「子猫」「お問い合わせ」のメニューをナビゲーションバーに追加します。</p>

<ul>
  <li>リスト( <code>&lt;ul&gt;</code> 要素)を追加し、各メニュー項目はリストアイテム( <code>&lt;li&gt;</code> 要素)にします。また、各メニューはリンクとして設定します。</li>
  <li><code>&lt;ul&gt;</code> に <code>navbar-nav</code> クラス、<code>&lt;li&gt;</code> に <code>nav-item</code> クラス、<code>&lt;a&gt;</code> に <code>nav-link</code> クラスを追加します。</li>
  <li>今どのコンテンツを表示しているかをわかりやすくするには、該当のメニュー項目に <code>active</code> クラスを追加してください。</li>
</ul>

<p><iframe class="" id="" data-url="https://jsbin.com/xuvidof/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>ドロップダウン型のメニュー項目を追加する</h4>

<p>子猫とお問い合わせの間にドロップダウン型の「会社情報」というメニュー項目を追加します。また、会社情報のドロップダウンを開くと「ビジョン」「会社概要」「地図」「沿革」のサブメニューが表示されるようにします。</p>

<ul>
  <li>子猫とお問い合わせの間に、他と同じようにして会社情報のリストアイテムを追加します。その際、会社情報の <code>&lt;li&gt;</code> に <code>dropdown</code> クラスを追加してください。</li>
  <li>会社情報の <code>&lt;a&gt;</code> 要素に <code>dropdown-toggle</code> クラスを追加します。</li>
  <li>サブメニューは会社情報のリストアイテムの下に、ドロップダウンメニューのセクションで紹介したのと同じように <code>&lt;div&gt;</code> <code>&lt;a&gt;</code> を追加してください。</li>
  <li>これだけだと、会社情報のドロップダウンをクリックしても何も表示されません。そこで、ドロップダウンにした <code>&lt;a&gt;</code> 要素に <code>data-toggle="dropdown"</code> という属性を追加してください。</li>
</ul>

<p><iframe class="" id="" data-url="https://jsbin.com/hufozek/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<h4>スマートフォンの画面幅の場合はメニューを折りたたみにする</h4>

<p>この画面をスマートフォンの画面幅で見た場合は、メニュー項目を非表示にします。その代わりに、右側に横棒が3本あるボタンを表示し、そのボタンをクリックしたらメニューが表示されるようにします。</p>

<ul>
  <li><code>&lt;nav&gt;</code> につけていた <code>navbar-expand</code> クラスの名前を <code>navbar-expand-[画面サイズ]</code> に変更してください。<code>[画面サイズ]</code> はグリッドのところで説明した <code>lg</code> や <code>sm</code> などです。たとえば <code>navbar-expand-sm</code> とした場合、smサイズ（最小で576px）未満の画面幅の場合にメニューの表示の仕方が変わります。</li>
  <li>3本線のボタンを用意するには、以下のような <code>&lt;button&gt;</code> 要素を追加してください。この <code>&lt;button&gt;</code> をサイト名のリンク( <code>&lt;a href="#" class="navbar-brand"&gt;</code> ) の直前に書くとボタンは左側、リンクの直後に書くとボタンは右側に表示されます。今回の例は右側に表示するようにしています。</li>
</ul>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar-toggler</span><span class="delimiter">"</span></span> <span class="attribute-name">data-toggle</span>=<span class="string"><span class="delimiter">"</span><span class="content">collapse</span><span class="delimiter">"</span></span> <span class="attribute-name">data-target</span>=<span class="string"><span class="delimiter">"</span><span class="content">#nav-bar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar-toggler-icon</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/span&gt;</span>
<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<ul>
  <li><code>&lt;ul class="navbar-nav"&gt;</code> の要素を囲う親要素の <code>&lt;div&gt;</code> を記述してください。その <code>&lt;div&gt;</code> に <code>collapse</code> と <code>navbar-collapse</code> クラスを追加してください。さらに <code>id="nav-bar"</code> というid属性を追加しましょう。ここでは <code>nav-bar</code> というIDにしましたが、これは3本線の <code>&lt;button&gt;</code> で <code>data-target="#nav-bar"</code> と設定したことによります。<code>data-target</code> の設定内容を変更している場合は、その内容と <code>&lt;div&gt;</code> のID属性が同じ名前になるようにしてください。（<code>data-target</code> の方は、先頭にある <code>#</code> が必須です。）</li>
</ul>

<p><iframe class="" id="" data-url="https://jsbin.com/womizoh/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe></p>

<p>これで完成です。長くなりましたので、<code>&lt;nav&gt;</code> の部分のみ抜き出して再掲します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;nav</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar navbar-expand-sm navbar-light bg-light</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="comment">&lt;!-- ホームへ戻るリンク。ブランドロゴなどを置く。 --&gt;</span>
            <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar-brand</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>P<span class="entity">&amp;amp;</span>K<span class="tag">&lt;/a&gt;</span>
            
            <span class="comment">&lt;!-- 横幅が狭い時に出るハンバーガーボタン --&gt;</span>
            <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar-toggler</span><span class="delimiter">"</span></span> <span class="attribute-name">data-toggle</span>=<span class="string"><span class="delimiter">"</span><span class="content">collapse</span><span class="delimiter">"</span></span> <span class="attribute-name">data-target</span>=<span class="string"><span class="delimiter">"</span><span class="content">#nav-bar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar-toggler-icon</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/span&gt;</span>
            <span class="tag">&lt;/button&gt;</span>
            
            <span class="comment">&lt;!-- メニュー項目 --&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">collapse navbar-collapse</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-bar</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;ul</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">navbar-nav</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item active</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>子犬<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>子猫<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item dropdown</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                        <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link dropdown-toggle</span><span class="delimiter">"</span></span> <span class="attribute-name">data-toggle</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>会社情報<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-menu</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ビジョン<span class="tag">&lt;/a&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>会社概要<span class="tag">&lt;/a&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>地図<span class="tag">&lt;/a&gt;</span>
                            <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">dropdown-item</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>沿革<span class="tag">&lt;/a&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;li</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">nav-link</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;/li&gt;</span>
                <span class="tag">&lt;/ul&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/nav&gt;</span>
</pre></div>
</div>
</div>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/navbar/" target="_blank">参考: ナビゲーションバー</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-7">6.7 バッジ（ラベル）
</h3><p>テキストなどに装飾的に情報を付けたい場合に使います。<code>badge</code> と <code>badge-[色の種類]</code> クラスを追加します。下記の各バッジを確認してみてください。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/fatisuy/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/badge/" target="_blank">参考: バッジ</a></li>
</ul>

<h4>ボタンの中で件数表示するためのバッジ</h4>

<p>ボタンの表示内容に数値を追加し、新着通知の件数を表示するときに使います。数値を <code>&lt;span&gt;</code> で囲み、<code>badge</code> と <code>badge-pill</code> 、<code>badge-[色の種類]</code> 以上3つのクラスを追加してください。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    受信トレイ <span class="tag">&lt;span</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">badge badge-pill badge-light</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>7<span class="tag">&lt;/span&gt;</span>
<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<p><iframe class="" id="" data-url="https://jsbin.com/bufazeb/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/badge/#pill-badges" target="_blank">参考: ピルバッジ</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-8">6.8 アラート
</h3><p>アラート（Alert）は、何らかのアクションを行ったときにその結果を表示するものです。<code>alert</code> と <code>alert-[色の種類]</code> クラスを追加することで利用できます。</p>

<p>例えばユーザ登録のフォームを送信した時、登録に成功したか失敗したかどうかを表示するのに使います。主に使うのは、青( <code>primary</code> )、緑( <code>success</code> )、黄色 ( <code>warning</code> )、赤 ( <code>danger</code> ) ですが、ボタンやバッジで使う色( <code>secondary</code>, <code>info</code>, <code>light</code>, <code>dark</code> )はひととおり揃っています。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert alert-success</span><span class="delimiter">"</span></span> <span class="attribute-name">role</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>登録が完了しました！<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert alert-info</span><span class="delimiter">"</span></span> <span class="attribute-name">role</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>3件の新着情報があります<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert alert-warning</span><span class="delimiter">"</span></span> <span class="attribute-name">role</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>安全のためパスワードを変更してください<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert alert-danger</span><span class="delimiter">"</span></span> <span class="attribute-name">role</span>=<span class="string"><span class="delimiter">"</span><span class="content">alert</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ユーザ名かパスワードが間違っています<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-alerts.png" alt="アラート"></p>

<p><iframe class="" id="" data-url="https://jsbin.com/viqajiy/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/alerts/" target="_blank">参考: 警告</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-9">6.9 カード
</h3><p>情報をグループ化したいときに使います。ブロックレベル要素に <code>card</code> クラスを追加するだけでカードが使えます。その中にタイトル用のブロック( <code>card-header</code> クラスをつけた要素) と本文用のブロック( <code>card-body</code> クラスをつけた要素) を中に入れてください。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">card</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">card-header</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        新着情報
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">card-body</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>友達リクエストが1件あります<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;br</span> <span class="tag">/&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>メッセージが3件届いています<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;br</span> <span class="tag">/&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>今日開催のイベントがあります<span class="tag">&lt;/a&gt;</span><span class="tag">&lt;br</span> <span class="tag">/&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-panel4.png" alt="パネル"></p>

<p><iframe class="" id="" data-url="https://jsbin.com/juhewus/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/components/card/" target="_blank">参考: カード</a></li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-6-10">6.10 （参考資料）ユーティリティクラス
</h3><p>Bootstrapでは自分で <code>margin</code> や <code>padding</code>、 <code>border</code> のようなCSSを書かなくて済むように <strong>ユーティリティクラス</strong> と呼ばれるものが用意されています。代表的なものをいくつか紹介します。公式サイトのドキュメントと併せて確認してください。</p>

<h4>margin と padding（余白）</h4>

<p><code>margin</code> や <code>padding</code> に関する以下の命令が用意されています。<code>[余白の種類][余白の場所]-[余白の大きさ]</code> という記述の仕方で使うルールです。</p>

<p><em>余白の種類</em></p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">文字</th>
      <th style="text-align: left">意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>m</code></td>
      <td style="text-align: left">margin（要素の外側の余白）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>p</code></td>
      <td style="text-align: left">padding（要素の内側の余白）</td>
    </tr>
  </tbody>
</table>

<p><em>余白の場所</em></p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">文字</th>
      <th style="text-align: left">意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>t</code></td>
      <td style="text-align: left">上</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>b</code></td>
      <td style="text-align: left">下</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>l</code></td>
      <td style="text-align: left">左</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>r</code></td>
      <td style="text-align: left">右</td>
    </tr>
  </tbody>
</table>

<p><em>余白の大きさ（＝ 3の幅を基準値とした倍率）</em></p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">文字</th>
      <th style="text-align: left">意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>0</code></td>
      <td style="text-align: left">余白なし</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>1</code></td>
      <td style="text-align: left">0.25倍</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>2</code></td>
      <td style="text-align: left">0.5倍</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>3</code></td>
      <td style="text-align: left">1.0 倍</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>4</code></td>
      <td style="text-align: left">1.5倍</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>5</code></td>
      <td style="text-align: left">3.0倍</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>auto</code></td>
      <td style="text-align: left">自動調整</td>
    </tr>
  </tbody>
</table>

<p>たとえば <code>mt-1</code> なら「ほんの少しの <code>margin-top</code> の余白」、<code>pb-4</code> なら「割と広い <code>padding-bottom</code> の余白」となります。</p>

<p><a href="https://getbootstrap.com/docs/4.2/utilities/spacing/" target="_blank">参考: 余白</a></p>

<h4>border（罫線）</h4>

<p>あるブロックレベル要素に罫線を引くための <code>border</code> クラス、および <code>border-[罫線の場所]</code> クラスが用意されています。</p>

<p><em>border 系のクラス</em></p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">クラス名</th>
      <th style="text-align: left">意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>border</code></td>
      <td style="text-align: left">4辺すべて</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>border-top</code></td>
      <td style="text-align: left">上辺</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>border-bottom</code></td>
      <td style="text-align: left">下辺</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>border-left</code></td>
      <td style="text-align: left">左辺</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>border-right</code></td>
      <td style="text-align: left">右辺</td>
    </tr>
  </tbody>
</table>

<p><a href="https://getbootstrap.com/docs/4.2/utilities/borders/" target="_blank">参考: 罫線</a></p>

<h4>text-align（文字の左寄せ・右寄せ・中央寄せ）</h4>

<p><code>text-align</code> に関するクラスとして、以下の3つが用意されています。</p>

<p><em>text-align 系のクラス</em></p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">クラス名</th>
      <th style="text-align: left">意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>text-left</code></td>
      <td style="text-align: left">文字を左寄せ</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>text-right</code></td>
      <td style="text-align: left">文字を右寄せ</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>text-center</code></td>
      <td style="text-align: left">文字を中央寄せ</td>
    </tr>
  </tbody>
</table>

<p><a href="https://getbootstrap.com/docs/4.2/utilities/text/#text-alignment" target="_blank">参考: 文字の配置</a></p>

<h4>Flexboxモデル</h4>

<p>Bootstrapを使うならブロックレベル要素の配置はグリッドを採用するのが楽です。しかし、HTML/CSSのレッスンで紹介したFlexboxモデルに関するクラスもBootstrapでは用意されているので利用できます。</p>

<p>Flexboxモデルで横並びにしたい複数要素を囲った親要素に <code>d-flex</code> クラスと <code>flex-row</code> クラスをつけるだけです。それにより、Flexboxモデルによる要素の横並びを実現できます。もちろん、要素を寄せる方向や各要素間の余白を決められる <code>justify-content</code> に対応するクラスも用意されています。</p>

<p><em>justify-content 系のクラス</em></p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">クラス名</th>
      <th style="text-align: left">意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>justify-content-start</code></td>
      <td style="text-align: left">左寄せ（要素間の余白なし）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content-end</code></td>
      <td style="text-align: left">右寄せ（要素間の余白なし）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content-center</code></td>
      <td style="text-align: left">中央寄せ（要素間の余白なし）</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content-between</code></td>
      <td style="text-align: left">最初が左端、最後が右端、残りは均等な余白で配置</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>justify-content-around</code></td>
      <td style="text-align: left">すべての要素を均等な余白で配置</td>
    </tr>
  </tbody>
</table>

<p><a href="https://getbootstrap.com/docs/4.2/utilities/flex/" target="_blank">参考: Flexboxモデル</a></p>
</div></section><section id="chapter-7"><h2 class="index">7. 外部アイコンを追加する
</h2><div class="subsection"><p>以前のBootstrapでは <a href="https://glyph.smarticons.co/" target="_blank">Gryph</a> というイラスト系のアイコンのセットが使えるようになっていましたが、Bootstrap4からは同梱されておらず、また公式の保証もされなくなりました。このようなアイコンをBootstrap4で利用する場合は、外部で配布しているものをインストールして使わなくてはなりません。</p>

<p>ここでは、Bootstrap4での表示が公式で保証されていて、なおかつ様々なサイトで使われている <a href="https://fontawesome.com/" target="_blank">Font Awesome</a> を使う方法を紹介します。</p>

<h4>Font Awesomeを利用するための設定</h4>

<p>Font Awesomeを利用する際は、BootstrapのHTMLテンプレートの <code>&lt;body&gt;</code> の下方、<code>&lt;script&gt;</code> の要素が多く記述されている場所に、以下の1行を追加してください（今までのサンプルコードでも、アイコン自体は使っていませんが、以下の1行は入れています）。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<p>これだけでFont Awesomeを利用できます。</p>

<h4>Font Awesomeのアイコンを使う</h4>

<p>Font Awesomeで用意されているアイコンの全ては <a href="https://fontawesome.com/icons?d=gallery&amp;m=free" target="_blank">コチラのページで確認できます</a> 。実に多くのアイコンが用意されていて、先ほどのページでは全てを一覧表示しきれないので「↓ Load more icons…」ボタンクリックして次の一覧を表示したり、画面上側の検索機能や左側の絞り込み機能を利用したりしてアイコンを確認してください。一覧の中で使いたいアイコンが見つかったら、そのアイコンをクリックしてください。以下の例では download のアイコンを使ってみます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-faicon4_01.png" alt="使いたいアイコンをクリックする"></p>

<p>download アイコンの詳細ページへ遷移します。画面上部に、download アイコンを利用するための記述方法(iタグ)が表示されていますので、タグの文字列にカーソルを合わせ、「Click to Copy HTML」と表示されたらクリックして、該当の記述をクリップボードにコピーしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/bootstrap/5-faicon4_02.png" alt="アイコンの記述をコピーする"></p>

<p>コピーした記述を、使いたい場所にペーストしてください。以下はBootstrapで作ったボタンの中で download アイコンを表示させています。</p>

<p><iframe class="" id="" data-url="https://jsbin.com/tofoni/embed?html,output" src="https://jsbin.com/embed-holding" style="border: 1px solid rgb(170, 170, 170); width: 100%; min-height: 300px;"></iframe><script src="https://static.jsbin.com/js/embed.min.js?4.1.4"></script></p>

<ul>
  <li><a href="https://getbootstrap.com/docs/4.2/extend/icons/" target="_blank">参考: Icons</a></li>
</ul>
</div></section><section id="chapter-8"><h2 class="index">8. まとめ
</h2><div class="subsection"><p>Bootstrapを使えば綺麗なページを手軽に素早く作ることができます。大抵のサイトを作るのに必要な部品は揃っている上に、グリッドシステムを使えばレスポンシブデザインのページも簡単に作れます。</p>

<p>Bootstrapは言ってみればCSSのお手本のようなものです。中身がどうやってできているのか、右クリックの「検証」機能を利用して覗いてみるのもよいでしょう。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-bootstrap">課題：お問い合わせページの作成</h3><p>Bootstrapのデフォルト機能を使用して、以下のイメージのようなお問い合わせページと送信完了ページを完成させてください。イメージ画像はクリックすると拡大します。</p>

<p><strong>デスクトップサイズ</strong></p>

<p><em>contact.html（お問い合わせ画面）</em></p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-tutorial-completed-contact.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-tutorial-completed-contact.png" alt=""></a></p>

<p><em>complete.html（送信完了画面）</em></p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-tutorial-completed-complete.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-tutorial-completed-complete.png" alt=""></a></p>

<p><strong>スマートフォンサイズ（一例です。ブラウザの幅のサイズによって表示内容に若干の差が生じます）</strong></p>

<p><em>contact.html（お問い合わせ画面）</em></p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-kadai-sp-contact.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-kadai-sp-contact.png" alt=""></a></p>

<p><em>complete.html（送信完了画面）</em></p>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-kadai-sp-complete.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/bootstrap/4-kadai-sp-complete.png" alt=""></a></p>

<p>Cloud9のワークスペース直下に <code>contact.html</code> と <code>complete.html</code> というファイルを作成し、その中に、一番下に記載した ひな形のHTML を、それぞれコピペで入力してください。このHTMLを、見た目が完成イメージのとおりになるよう、必要なHTMLやクラス名を追記していってください。完成したら「課題の提出」をしてください。</p>

<div class="alert alert-warning">
この課題で作成した contact.html と complete.html は今後のレッスンの課題で再び利用しますので、<strong>合格後に削除しないようにしてください。</strong>
</div>

<h4>主な作業内容：</h4>

<ul>
  <li>contact.htmlとcomplete.htmlの両方で <code>&lt;header&gt;</code> 部分にナビゲーションバーを追加してください。ナビゲーションバーは背景色を薄い灰色にしてください。メニューの内容は完成イメージを参考にしましょう。
    <ul>
      <li>スマートフォン（縦）、つまり576px未満の画面幅のときのみ、メニューを非表示にし、代わりに3本線のボタンを右側に表示してください。3本線のボタンをクリックしたらメニューが表示されるようにしましょう。</li>
    </ul>
  </li>
  <li>お電話の部分とメールの部分はグリッドを使って位置を調整しましょう。
    <ul>
      <li>576px以上の画面幅のときは2カラムレイアウトにしましょう。</li>
    </ul>
  </li>
  <li>電話番号の表を装飾してください。
    <ul>
      <li>罫線を表示しましょう。</li>
      <li>各行の背景色は白・灰色を交互で表示してください。</li>
    </ul>
  </li>
  <li>電話番号の表の下に「営業時間」を説明する枠を <code>カード</code> で作ってください。</li>
  <li>「お電話」「メール」「営業時間」の左にFont Awesomeのアイコンを表示してください。それぞれ、意味の合うものを選んでください。</li>
  <li>メールの問い合わせフォームの各ラベルと入力エリアは、グリッドを使って表示位置を調整してください。</li>
  <li>送信ボタンは緑色にしてください。なお、<code>btn-block</code> クラスをボタンに追加すると、指定のカラム数の幅に対して100％の幅でボタンが表示されます。</li>
  <li>complete.html に、contact.htmlへ移動できるようにするための「戻る」と書かれたリンク（表示形式は緑色のボタン）を追加してください。</li>
</ul>

<div class="alert alert-warning">
<strong>ヒント</strong><br>
ひな形のHTML構造を変更する必要はありません。以下のようなことを行うとレイアウトが大きく崩れる原因となります。<br>
<ul>
<li>新たなrowクラスの追加</li>
<li>（ナビゲーションバーと営業時間の部分以外への）新たなHTMLタグの追加</li>
<li>ひな形に記述済みのHTMLタグの移動や変更</li>
</ul>
どうしても修正がきかなくなった場合は、ひな形の状態に戻して取り組みなおすことも検討してください。
</div>

<p><em>contact.html ひな形</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="comment">&lt;!-- Required meta tags --&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="tag">&lt;title&gt;</span>お問い合わせ | サンプル株式会社<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;header&gt;</span>

        <span class="tag">&lt;/header&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4 pb-4 border-bottom</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ<span class="tag">&lt;/h1&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4 row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;strong&gt;</span>お電話：<span class="tag">&lt;/strong&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;p&gt;</span>該当する内容の電話番号におかけください。<span class="tag">&lt;/p&gt;</span>
                    <span class="tag">&lt;table</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                        <span class="tag">&lt;thead&gt;</span>
                            <span class="tag">&lt;tr&gt;</span>
                                <span class="tag">&lt;th&gt;</span>内容<span class="tag">&lt;/th&gt;</span>
                                <span class="tag">&lt;th&gt;</span>電話番号<span class="tag">&lt;/th&gt;</span>
                                <span class="tag">&lt;th&gt;</span>担当<span class="tag">&lt;/th&gt;</span>
                            <span class="tag">&lt;/tr&gt;</span>
                        <span class="tag">&lt;/thead&gt;</span>
                        <span class="tag">&lt;tbody&gt;</span>
                            <span class="tag">&lt;tr&gt;</span>
                                <span class="tag">&lt;td&gt;</span>サービスに関するお問い合わせ<span class="tag">&lt;/td&gt;</span>
                                <span class="tag">&lt;td&gt;</span>03-0000-0000<span class="tag">&lt;/td&gt;</span>
                                <span class="tag">&lt;td&gt;</span>煌木<span class="tag">&lt;/td&gt;</span>
                            <span class="tag">&lt;/tr&gt;</span>
                            <span class="tag">&lt;tr&gt;</span>
                                <span class="tag">&lt;td&gt;</span>採用に関するお問い合わせ<span class="tag">&lt;/td&gt;</span>
                                <span class="tag">&lt;td&gt;</span>03-0000-0001<span class="tag">&lt;/td&gt;</span>
                                <span class="tag">&lt;td&gt;</span>煌田<span class="tag">&lt;/td&gt;</span>
                            <span class="tag">&lt;/tr&gt;</span>
                            <span class="tag">&lt;tr&gt;</span>
                                <span class="tag">&lt;td&gt;</span>サービスに関するお問い合わせ<span class="tag">&lt;/td&gt;</span>
                                <span class="tag">&lt;td&gt;</span>03-0000-0002<span class="tag">&lt;/td&gt;</span>
                                <span class="tag">&lt;td&gt;</span>煌山<span class="tag">&lt;/td&gt;</span>
                            <span class="tag">&lt;/tr&gt;</span>
                        <span class="tag">&lt;/tbody&gt;</span>
                    <span class="tag">&lt;/table&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4 row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;strong&gt;</span>メール：<span class="tag">&lt;/strong&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
                <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                    <span class="tag">&lt;p&gt;</span>
                        プライバシーポリシーをご確認いただき、ご同意の上で、送信ボタンをクリックしてください。<span class="tag">&lt;br</span> <span class="tag">/&gt;</span>
                        お問い合わせの内容は、受付日から3営業日以内をめどにご返信いたします。
                    <span class="tag">&lt;/p&gt;</span>
                    <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">complete.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>会社名：<span class="tag">&lt;/label&gt;</span>
                            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">company</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;/div&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>

                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>氏名：<span class="tag">&lt;/label&gt;</span>
                            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">name</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;/div&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>

                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>メール：<span class="tag">&lt;/label&gt;</span>
                            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">mail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;/div&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>

                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>電話番号：<span class="tag">&lt;/label&gt;</span>
                            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">tel</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;/div&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>

                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;label</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>内容：<span class="tag">&lt;/label&gt;</span>
                            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;textarea</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">content</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/textarea&gt;</span>
                            <span class="tag">&lt;/div&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>

                        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">row</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                                <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>お問い合わせ内容を送信する<span class="tag">&lt;/button&gt;</span>
                            <span class="tag">&lt;/div&gt;</span>
                        <span class="tag">&lt;/div&gt;</span>
                    <span class="tag">&lt;/form&gt;</span>
                <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;footer</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center pt-3 pb-3 border-top</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="entity">&amp;copy;</span> 2018 SAMPLE Inc.
        <span class="tag">&lt;/footer&gt;</span>

        <span class="comment">&lt;!-- Optional JavaScript --&gt;</span>
        <span class="comment">&lt;!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>complete.html ひな形</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="comment">&lt;!-- Required meta tags --&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">viewport</span><span class="delimiter">"</span></span> <span class="attribute-name">content</span>=<span class="string"><span class="delimiter">"</span><span class="content">width=device-width, initial-scale=1, shrink-to-fit=no</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
        <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

        <span class="tag">&lt;title&gt;</span>送信完了 | サンプル株式会社<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;header&gt;</span>

        <span class="tag">&lt;/header&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;h1</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">mt-4 pb-4 border-bottom</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>送信完了<span class="tag">&lt;/h1&gt;</span>
            <span class="tag">&lt;p&gt;</span>ありがとうございました。送信を受け付けました。<span class="tag">&lt;/p&gt;</span>
            <span class="tag">&lt;p&gt;</span>3営業日以内をめどにご返信いたしますので、しばらくお待ちください。<span class="tag">&lt;/p&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center mb-4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

            <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;footer</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">text-center pt-3 border-top</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="entity">&amp;copy;</span> 2018 SAMPLE Inc.
        <span class="tag">&lt;/footer&gt;</span>

        <span class="comment">&lt;!-- Optional JavaScript --&gt;</span>
        <span class="comment">&lt;!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome --&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.3.1.slim.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
        <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>
</div></section></div>
</body>
</html>