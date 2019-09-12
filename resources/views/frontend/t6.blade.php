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
<div class="markdown"><div class="lesson-num p">Lesson6</div><h1 id="library">外部ライブラリ
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>これまでjQueryとBootstrapという2つのメジャーなライブラリを学んできました。このレッスンでは今まで学んだ知識に加えて外部ライブラリを活用して動きのあるリッチなサイトを作っていきましょう。</p>

<p>このレッスンで利用する外部ライブラリは下記の通りです。BootstrapやjQueryも、CSSやJavaScriptを補助する役目の外部ライブラリという位置付けです。</p>

<ul>
  <li>jQuery</li>
  <li>Bootstrap</li>
  <li>Google Fonts</li>
  <li>Waypoints.js</li>
  <li>Animate.css</li>
  <li>Magnific Popup</li>
  <li>mobile-detect.js</li>
</ul>
</div></section><section id="chapter-2"><h2 class="index">2. 今回作成するサイトについて
</h2><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 サイトの完成版ソースコード
</h3><p>本レッスン用のソースコードと画像一式を、下記のリンクからダウンロードしてください。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/rich-site.zip">サイトの完成版のダウンロード</a></li>
</ul>

<p>本レッスンは、上記の完成版のソースコードを解説しながら進めます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 リッチなサイトを作成する上で気を付けたいこと
</h3><h4>外部ライブラリを活用する</h4>

<p>外部ライブラリを利用すると、効率的にサイトを制作できます。原理を理解しておくことは応用力を身に付ける点で非常に重要ですが、全てを1から作り始めるとそれだけ工数が増えることになります。</p>

<p>jQueryやBootstrapの他にも、オープンソースとしてソースコードが公開されているライブラリがインターネット上には多数あります。その多くは、私たちが <strong>自由に使用できるライセンス（使用上のルール）</strong> で配布されています。Webを検索して使えるライブラリがあれば、積極的に使っていきましょう。それがスムーズにサイト制作を進めるためのコツです。</p>

<p>ライセンスの種類には様々なものがあります。MIT・BSD・Apacheといったライセンスであれば基本的に、商用利用やソースコードの改変の有無を問わず自由に利用できます。ただし利用条件として、著作権表示やライセンス全文の記載がソースコード内にある場合は、削除せずに残しておいてください。</p>

<p>オープンソースのライブラリを使うときは、ライセンスと自分の使用目的を照らし合わせて問題がないか最初に確認しましょう。なおjQueryとBootstrapはいずれもMITライセンスで配布されています。オープンソースのライブラリについては、悪意を持った使い方をしない限りは問題が起こることは通常ありませんが、商用可能かどうか、ライセンスには充分に気をつけておきましょう。</p>

<h4>外部ライブラリの選定方法</h4>

<p>外部ライブラリを利用するときは、どのライブラリを利用するかの選定が重要になります。仮に長年メンテナンスされていないライブラリや、情報の少ないライブラリを採用してしまった場合、バグがあったとしても自分で修正する必要があります。バグ修正に時間を費やしてしまうようでは本末転倒です。</p>

<p>ライブラリ選定の指標として特に重要なのは <strong>コミュニティの規模</strong> です。なぜならコミュニティの規模が大きいと下記の点がある程度保証されるからです。</p>

<ul>
  <li>バグがあると修正される（メンテナンス）</li>
  <li>サンプルコードなどの情報が多く手に入る</li>
  <li>突然消えてしまうリスクが少ない</li>
</ul>

<p>最近のオープンソースの外部ライブラリはGitHubで開発されているケースがほとんどです。ライブラリのコミュニティの規模を確認するには、GitHubページのStarの数を見るのが良いでしょう。</p>

<p>例として今回のサイト作成で利用するwaypointsと、それと似たライブラリであるjquery.inviewのStarの数を比較してみましょう。</p>

<p>2019/06現在、それぞれのライブラリのStar数は下記の通りです。</p>

<p><em>waypoints</em><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/github_waypoints_star.png" alt=""><br>
<a href="https://github.com/imakewebthings/waypoints" target="_blank">waypoints</a> のStar数： 9,780</p>

<p><em>jquery.inview</em><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/github_jquery_inview_star.png" alt=""><br>
<a href="https://github.com/protonet/jquery.inview" target="_blank">jquery.inview - GitHub</a> のStar数： 1,627</p>

<p>上記の通り、約6倍の差があります。waypointsのコミュニティの方が、jquery.inviewよりも大きいことがよくわかります。</p>

<p>ちなみに2019/06現在、フロントエンドコースで学習や利用をする主なライブラリのStar数は下記の通りです。</p>

<ul>
  <li><a href="https://github-ranking.com/" target="_blank">jQuery</a>： 51,761</li>
  <li><a href="https://github.com/twbs/bootstrap" target="_blank">Bootstrap</a>： 134,000</li>
  <li><a href="https://github.com/FortAwesome/Font-Awesome" target="_blank">Font Awesome</a>： 60,054</li>
  <li><a href="https://github.com/vuejs/vue" target="_blank">Vue.js</a>： 141,190</li>
</ul>

<h4>重すぎるエフェクトを入れない</h4>

<p>エフェクトなどの装飾を入れるときはUX（ユーザー体験）を損なうものにならないよう注意しましょう。たとえば派手で豪華なエフェクトを入れたとき、そのエフェクトのせいでページが重すぎてフリーズしてしまったり、ロード時間が異様に長くなってストレスを与えてしまっては逆効果です。自分のパソコンよりもスペックの低い端末を使ってアクセスするユーザーがいることを想定して、過度に重いエフェクトを入れないように心がけましょう。</p>

<h4>1つのページ内にエフェクトを盛り込みすぎない</h4>

<p>エフェクトを使いすぎて遊園地のようなページになってしまっては、せっかく入れたエフェクトの効果が薄れてしまいます。また自分が心地良いと感じるエフェクトでも、人によっては嫌悪感を示すこともあります。見せたいエフェクトを絞って効果的に使うようにしましょう。</p>
</div></section><section id="chapter-3"><h2 class="index">3. ページを素早くレイアウトする
</h2><div class="subsection"><p>Bootstrapを利用して、ページの部品やレイアウトを素早く実装しましょう。Bootstrapを利用すると、レスポンシブデザインにも手軽に対応できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 Bootstrapのグリッドの高度な使い方
</h3><p>ページ中盤の「子犬の種類」と「子猫の種類」の部分は、モバイル版とデスクトップ版でそれぞれ下記のようなレイアウトで、レスポンシブデザインになっています。このレイアウトを作る手順を解説します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/6-compare-mobile-desktop.png" alt="モバイル版とデスクトップ版のレイアウト比較"></p>

<p>基本的な方針として、モバイル版を基準にしてHTMLを作ると考えます（このような設計方針を<strong>モバイルファースト</strong>と呼んでいます）。モバイル版のコンテンツの並びを擬似的にHTML化すると下記のようになります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div&gt;</span>子犬の種類<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;h2&gt;</span>Puppies<span class="tag">&lt;/h2&gt;</span>
<span class="tag">&lt;div&gt;</span>
  <span class="comment">&lt;!-- [1] 拡大写真 --&gt;</span>
<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div&gt;</span>
  <span class="comment">&lt;!-- [2] 4つのサムネイル写真と説明文 --&gt;</span>
<span class="tag">&lt;/div&gt;</span>

<span class="tag">&lt;div&gt;</span>子猫の種類<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;h2&gt;</span>Kittens<span class="tag">&lt;/h2&gt;</span>
<span class="tag">&lt;div&gt;</span>
  <span class="comment">&lt;!-- [1] 拡大写真 --&gt;</span>
<span class="tag">&lt;/div&gt;</span>
<span class="tag">&lt;div&gt;</span>
  <span class="comment">&lt;!-- [2] 4つのサムネイル写真と説明文 --&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>上記のHTMLをそのまま使いつつ、CSSだけでデスクトップ版のレイアウトに落としこむ方法を考えます。すると、Bootstrapのグリッドシステムを下記のように使えば良いことがわかります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/6-puppies-layout-desktop.png" alt="子犬の種類のデスクトップ用レイアウト"></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/6-kittens-layout-desktop.png" alt="子猫の種類のデスクトップ用レイアウト"></p>

<p><code>order-</code> で始まるクラス名は、コンテンツの表示順を変更します。 <code>order-md-last</code> を指定すると、ウインドウ幅がmd（タブレット＝768px）以上のとき最後に表示されます。ウインドウ幅がそれ未満のときは、このHTMLへ記述した順に表示されます。</p>

<p>詳しくは、下記の公式ドキュメントをご参考にしてください。</p>

<p><a href="https://getbootstrap.com/docs/4.3/layout/grid/#order-classes" target="_blank">Grid system - Bootstrap</a></p>

<p>このようにしてモバイル版とデスクトップ版で同じHTMLを使い、CSSだけで適切なレイアウトに変更するのがレスポンシブデザインの基本です。</p>

<p>「子犬の種類」と「子猫の種類」ではレッスン4で解説したパララックスとタブ切り替えも使われています。サムネイルをクリックすると、コンテンツが切り替わります。これはタブの切り替えを応用して作っています。</p>
</div></section><section id="chapter-4"><h2 class="index">4. Webフォントで印象アップ
</h2><div class="subsection"><p>フォントを変えるだけで印象がだいぶ変わります。最近ではWebフォントという技術によって、パソコンにインストールされていないフォントでもWebページで表示できるようになりました。</p>

<p><a href="https://fonts.google.com/" target="_blank">Google Fonts</a>には多数のフォントが掲載されており、Webフォントとして無料で利用できます（一部のフォントは有料です）。日本語フォントは<a href="http://typesquare.com/" target="_blank">TypeSquare</a>などが充実しています。TypeSquareはプランによっては使用料金がかかります。ここではGoogle Fontsを利用する方法を解説します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 Google Fontsの使い方
</h3><p>まず使いたいフォントを選び、SELECT THIS FONTをクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-roboto-1.png" alt="Robotoフォントの使い方 手順1"></p>

<p>下にバーが現れるのでクリックして開きます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-roboto-2.png" alt="Robotoフォントの使い方 手順2"></p>

<p>表示された<code>&lt;link&gt;</code>タグを<code>&lt;head&gt;</code>内に入れ、フォントを使いたい要素に対してfont-familyを指定すれば完了です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-roboto-3.png" alt="Robotoフォントの使い方 手順3"></p>

<p>たとえばRobotoフォントをページ全体に適用したい場合は次のように記述します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Web Font Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://fonts.googleapis.com/css?family=Roboto</span><span class="delimiter">"</span></span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;style&gt;</span>
<span class="inline">    <span class="tag">body</span> {
      <span class="key">font-family</span>: <span class="string"><span class="delimiter">'</span><span class="content">Roboto</span><span class="delimiter">'</span></span>, <span class="value">sans-serif</span>;
    }</span>
  <span class="tag">&lt;/style&gt;</span>
<span class="tag">&lt;/head&gt;</span>
<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;h1&gt;</span>Hello Roboto Font<span class="tag">&lt;/h1&gt;</span>
  <span class="tag">&lt;p&gt;</span>
    Roboto Fontのテスト
  <span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-roboto-display.png" alt="Robotoフォントを使ったサンプル"></p>

<p>好みのフォントを探してサイトに適用してみましょう。なお、完成版ソースコードではGoogle Fontsから下記のフォントを使用しています。</p>

<ul>
  <li><a href="https://www.fonts.com/ja/font/ascender/droid-serif" target="_blank">Droid Serif</a>（本文［注：左記はGoogle Fonts外部のサイトへのリンクになります］）</li>
</ul>
</div></section><section id="chapter-5"><h2 class="index">5. ライトボックス
</h2><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 Magnific Popup
</h3><p><a href="http://dimsemenov.com/plugins/magnific-popup/" target="_blank">Magnific Popup</a>はライトボックスの一種で、写真をその場で拡大表示するためのオープンソースライブラリです。MITライセンスで配布されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-magnific-popup.png" alt="Magnific Popupのサイト"></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 使い方
</h3><p><a href="https://github.com/dimsemenov/Magnific-Popup" target="_blank">GitHubレポジトリ</a>からZipファイルをダウンロードし、distディレクトリにある<em>jquery.magnific-popup.min.js</em>と<em>magnific-popup.css</em>をHTMLで読み込みます。jQueryの後にMagnific Popupを読み込んでください。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- &lt;head&gt;内に置く --&gt;</span>
<span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">magnific-popup.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- &lt;/body&gt;の直前に置く --&gt;</span>
<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">jquery.magnific-popup.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<p><code>&lt;img&gt;</code> は <code>&lt;a&gt;</code> で囲い、<code>class="popup"</code> を付けます。<code>&lt;img&gt;</code> の <code>src</code> にはサムネイル画像を指定し、<code>&lt;a&gt;</code> のリンク先は拡大画像にしておきます。</p>

<p><em>rich-site</em>とは別のフォルダで下記のHTMLとJavaScriptを設置して、ブラウザで開いて動作確認してみてください。なお、下記のHTMLで指定している <em>img1.jpg</em>, <em>img1-small.jpg</em> は <a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/rich-site.zip">サイトの完成版</a> にある <em>rich-site/img/kitten1.jpg</em>, <em>rich-site/img/gallery-thumbnail/kitten1.jpg</em> をコピーして、それぞれ <em>img1.jpg</em>, <em>img1-small.jpg</em> に変更して使用すれば良いでしょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Magnific Popup Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">magnific-popup.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>
<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1-small.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">画像1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">jquery.magnific-popup.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span><span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>jQueryで要素を選択して <code>magnificPopup()</code> を呼び出すだけで完成です。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// popupクラスを持つ要素にMagnific Popupを適用</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup</span><span class="delimiter">'</span></span>).magnificPopup({
  <span class="key">type</span>: <span class="string"><span class="delimiter">'</span><span class="content">image</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 複数の画像でギャラリーを作る
</h3><p>jQueryで複数の要素を選択して <code>magnificPopup()</code> の <code>gallery</code> オプションを下記のように追加するとギャラリーモードが有効となり、拡大表示したまま前後の画像へ切り替えられるようになります。</p>

<p><em>HTML</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img1-small.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">画像1</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img2.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img2-small.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">画像2</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
<span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">popup</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img3.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img3-small.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">200</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">画像3</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p><em>JavaScript</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// popupクラスの付いた要素にMagnific Popupを適用</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup</span><span class="delimiter">'</span></span>).magnificPopup({
  <span class="key">type</span>: <span class="string"><span class="delimiter">'</span><span class="content">image</span><span class="delimiter">'</span></span>,
  <span class="key">gallery</span>: { <span class="key">enabled</span>: <span class="predefined-constant">true</span> },
});
</pre></div>
</div>
</div>

<p><em>ギャラリーモードを有効にした際の表示例</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/6-magnific-popup-gallery.png" alt="ギャラリーでの拡大表示"></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 フェードイン・フェードアウト
</h3><p>さらにフェードイン・フェードアウトのアニメーションを付けてリッチに見せましょう。まず<a href="http://dimsemenov.com/plugins/magnific-popup/documentation.html#animation" target="_blank">公式ドキュメントのAnimation</a>を参考にして<code>mainClass: 'mfp-fade'</code>を追加します。</p>

<p><em>JavaScript</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.popup</span><span class="delimiter">'</span></span>).magnificPopup({
  <span class="key">type</span>: <span class="string"><span class="delimiter">'</span><span class="content">image</span><span class="delimiter">'</span></span>,
  <span class="key">gallery</span>: { <span class="key">enabled</span>: <span class="predefined-constant">true</span> },
  <span class="key">mainClass</span>: <span class="string"><span class="delimiter">'</span><span class="content">mfp-fade</span><span class="delimiter">'</span></span>,
  <span class="key">removalDelay</span>: <span class="integer">300</span>,
});
</pre></div>
</div>
</div>

<p>そしてドキュメントにある通り、CSSで下記の指定を追加します。</p>

<p><em>CSS</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* オーバーレイする背景 初期状態 */</span>
<span class="class">.mfp-fade</span><span class="class">.mfp-bg</span> {
  <span class="key">opacity</span>: <span class="float">0</span>;

  <span class="key">-webkit-transition</span>: <span class="value">all</span> <span class="float">0.3s</span> <span class="value">ease-out</span>;
  <span class="key">-moz-transition</span>: <span class="value">all</span> <span class="float">0.3s</span> <span class="value">ease-out</span>;
  <span class="key">transition</span>: <span class="value">all</span> <span class="float">0.3s</span> <span class="value">ease-out</span>;
}
<span class="comment">/* オーバーレイする背景 開始時アニメーション */</span>
<span class="class">.mfp-fade</span><span class="class">.mfp-bg</span><span class="class">.mfp-ready</span> {
  <span class="key">opacity</span>: <span class="float">0.8</span>;
}
<span class="comment">/* オーバーレイする背景 終了時アニメーション */</span>
<span class="class">.mfp-fade</span><span class="class">.mfp-bg</span><span class="class">.mfp-removing</span> {
  <span class="key">opacity</span>: <span class="float">0</span>;
}

<span class="comment">/* コンテンツ 初期状態 */</span>
<span class="class">.mfp-fade</span><span class="class">.mfp-wrap</span> <span class="class">.mfp-content</span> {
  <span class="key">opacity</span>: <span class="float">0</span>;

  <span class="key">-webkit-transition</span>: <span class="value">all</span> <span class="float">0.3s</span> <span class="value">ease-out</span>;
  <span class="key">-moz-transition</span>: <span class="value">all</span> <span class="float">0.3s</span> <span class="value">ease-out</span>;
  <span class="key">transition</span>: <span class="value">all</span> <span class="float">0.3s</span> <span class="value">ease-out</span>;
}
<span class="comment">/* コンテンツ 開始時アニメーション */</span>
<span class="class">.mfp-fade</span><span class="class">.mfp-wrap</span><span class="class">.mfp-ready</span> <span class="class">.mfp-content</span> {
  <span class="key">opacity</span>: <span class="float">1</span>;
}
<span class="comment">/* コンテンツ 終了時アニメーション */</span>
<span class="class">.mfp-fade</span><span class="class">.mfp-wrap</span><span class="class">.mfp-removing</span> <span class="class">.mfp-content</span> {
  <span class="key">opacity</span>: <span class="float">0</span>;
}
</pre></div>
</div>
</div>

<p>サイトの完成版(rich-site)では、ギャラリー部分のHTMLが以下のようになっていますので、</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/kitten1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/kitten1.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">シェパード</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/a&gt;</span>
</pre></div>
</div>
</div>

<p><code>d-inline-block</code>クラスに対して適用しています。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// d-inline-blockクラスの付いた要素にMagnific Popupを適用</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.d-inline-block</span><span class="delimiter">'</span></span>).magnificPopup({
  <span class="key">type</span>: <span class="string"><span class="delimiter">'</span><span class="content">image</span><span class="delimiter">'</span></span>,
  <span class="key">gallery</span>: { <span class="key">enabled</span>: <span class="predefined-constant">true</span> },

  <span class="comment">/**
   * ポップアップに適用されるクラス。
   * ここではフェードイン・アウト用のmfp-fadeクラスを適用。
   */</span>
  <span class="key">mainClass</span>: <span class="string"><span class="delimiter">'</span><span class="content">mfp-fade</span><span class="delimiter">'</span></span>,

  <span class="comment">// ポップアップが非表示になるまでの待ち時間</span>
  <span class="key">removalDelay</span>: <span class="integer">300</span>,
});
</pre></div>
</div>
</div>

<p>その他の使い方は<a href="http://dimsemenov.com/plugins/magnific-popup/documentation.html" target="_blank">Magnific Popup公式ドキュメント（英語）</a>を参照してください。</p>
</div></section><section id="chapter-6"><h2 class="index">6. mobile-detect.js
</h2><div class="subsection"><p><a href="http://hgoebl.github.io/mobile-detect.js/" target="_blank">mobile-detect.js</a>は、ユーザーが使っているブラウザがモバイルブラウザかどうかを判定するオープンソースライブラリです。MITライセンスで配布されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-mobile-detect-js.png" alt="mobile-detect.jsのサイト"></p>

<p>今回作るサイトでは動画を使用しますが、モバイル端末では通信速度や端末のスペックが十分でない場合も多く、また動画の自動再生（<code>&lt;video&gt;</code>要素の<code>autoplay</code>属性）も不可能だったり制限があったりするため、ここではモバイルブラウザでの動画の表示をあきらめます。</p>

<p>またパララックスもモバイルブラウザでは重くなりがちで、かえってストレスが増えてしまい利便性を損なうため、同じく無効にします。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 メディアクエリではモバイル端末を判定できない
</h3><p>メディアクエリを使って、表示幅を基準にしてモバイル端末かどうかを判定するのもひとつの手です。しかし、デスクトップ端末でウインドウを小さくして使っている場合はスマートフォンやタブレットと同程度の表示幅になったり、タブレットの大きな画面とデスクトップブラウザでは表示幅がほぼ同じになってしまうため、正確な判別ができません。</p>

<p>そこで、JavaScriptで取得できる<strong>navigator.userAgent</strong>というブラウザの型番に相当する情報を使います。この値を調べることでモバイルブラウザかどうかの判定を行ってくれるのがmobile-detect.jsです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 使い方
</h3><p>ライブラリのダウンロードはGitHubの “Clone or download” と書かれた緑のボタンから “Donwload Zip” により実行してください。</p>

<ul>
  <li><a href="https://github.com/hgoebl/mobile-detect.js" target="_blank">mobile-detect.js - GitHub</a></li>
</ul>

<p>Zipをダウンロードして展開します。必要なものはmobile-detect.min.jsだけなのでHTMLで読み込みます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- main.jsの読み込みよりも手前に置く --&gt;</span>
<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">mobile-detect.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span><span class="tag">&lt;/body&gt;</span>
</pre></div>
</div>
</div>

<p>判定するときは <em>main.js</em> に下記のように書きます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/**
 * 以下の1行はjsファイルの先頭に書く。モバイルブラウザならtrue、
 * それ以外ならfalseがisMobileにセットされる。
 */</span>
const isMobile = !!<span class="keyword">new</span> MobileDetect(window.navigator.userAgent).mobile();

<span class="comment">// （中略）</span>

<span class="comment">// 場合分けしたい箇所で下記のように使う</span>
<span class="keyword">if</span> (isMobile) {
  <span class="comment">// モバイルブラウザの場合</span>
} <span class="keyword">else</span> {
  <span class="comment">// モバイルブラウザ以外の場合</span>
}
</pre></div>
</div>
</div>

<div class="alert alert-info">
<code>!!</code>は否定（<code>!</code>）の否定を行っています。<i>MobileDetect</i>の<i>mobile()</i>は、モバイル端末の場合は機種の種類（<i>iPhone</i>や<i>Sony</i>など）、そうでない場合は<i>null</i>が戻り値となります。そのため、否定の否定を演算することで、<i>isMobile</i>には<code>true</code>か<code>false</code>が入るように<i>mobile()</i>の戻り値を変換しています。
</div>

<p>サイトの完成版(<em>rich-site</em>)で以下のHTML部分を見てください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">&lt;!-- 背景とビデオ --&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">top__bg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;video</span> <span class="attribute-name">autoplay</span> <span class="attribute-name">muted</span> <span class="attribute-name">loop</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">top__video</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;source</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">video/top-video.mp4</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">video/mp4</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;/video&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>このように記述することで、サイトを開くと自動的に<em>vide/top-video.mp4</em>の動画が再生されます。しかし現状は、以下のCSSの定義によってデフォルトで非表示にしています。</p>

<p><em>main.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.top__video</span> {
  <span class="comment">/* モバイル（デフォルト）では非表示 */</span>
  <span class="key">display</span>: <span class="value">none</span>;

  <span class="comment">/* 以下略 */</span>
}
</pre></div>
</div>
</div>

<p><em>main.js</em>の中にある以下の記述によって、モバイルブラウザならclassが<code>top__bg</code>のdivの背景に<em>video/top-video-still.jp</em>を表示し、それ以外のブラウザなら動画を表示するように制御しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// モバイルブラウザでは静止画を表示し、それ以外では動画を表示</span>
<span class="keyword">if</span> (isMobile) {
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.top__bg</span><span class="delimiter">'</span></span>).css({
    <span class="key"><span class="delimiter">'</span><span class="content">background-image</span><span class="delimiter">'</span></span>: <span class="string"><span class="delimiter">'</span><span class="content">url(video/top-video-still.jpg)</span><span class="delimiter">'</span></span>,
  });
} <span class="keyword">else</span> {
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.top__video</span><span class="delimiter">'</span></span>).css({ <span class="key">display</span>: <span class="string"><span class="delimiter">'</span><span class="content">block</span><span class="delimiter">'</span></span> });
}
</pre></div>
</div>
</div>

<p>同様に、モバイル以外のデバイスでのみパララックスを有効にするような処理も記述しています（<code>showParallax</code>は独自で定義している関数です）。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// パララックスを初期化する関数</span>
const initParallax = () =&gt; {
  <span class="predefined">$</span>(window).off(<span class="string"><span class="delimiter">'</span><span class="content">scroll</span><span class="delimiter">'</span></span>, showParallax);

  <span class="keyword">if</span> (!isMobile) {
    <span class="comment">// モバイルブラウザでなければパララックスを適用</span>
    showParallax();

    <span class="comment">// スクロールのたびにshowParallax関数を呼ぶ</span>
    <span class="predefined">$</span>(window).on(<span class="string"><span class="delimiter">'</span><span class="content">scroll</span><span class="delimiter">'</span></span>, showParallax);
  }
};
</pre></div>
</div>
</div>
</div></section><section id="chapter-7"><h2 class="index">7. スクロールに合わせてコンテンツをふわっと出す
</h2><div class="subsection"><p>ページを下にスクロールしていくのに合わせてコンテンツがふわっと現れる演出（アニメーション）を作ってみます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-fadeinup.gif" alt="スクロールするとコンテンツがふわっと出てくる"></p>

<p>Waypoints.jsとAnimate.cssという2つのライブラリを併用します。Waypoints.jsは、スクロールが一定位置まで来たときに特定のJavaScriptを実行するためのライブラリです。Animate.cssは、HTML要素にアニメーションを付けるライブラリです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 Waypoints.jsの使い方
</h3><p><a href="http://imakewebthings.com/waypoints/" target="_blank">Waypoints.js</a>を使うと、指定したHTML要素が画面内へ入った際に、あらかじめ指定した関数を呼び出してくれます。MITライセンスで配布されていますので、商用でも利用できます。</p>

<h4>使い方</h4>

<p>サイトの「Download」をクリックして、ダウンロードしたzipファイルを展開します。libフォルダの中にあるjquery.waypoints.min.jsというファイルだけを使いますので、Cloud9上に設置してHTMLから読み込みます。下記のようにjQueryの後に読み込んでください。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- &lt;/body&gt;の直前に置く --&gt;</span>
<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">jquery.waypoints.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

<span class="comment">&lt;!-- 自サイトのJavaScript（あれば） --&gt;</span>
<span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScriptでは、下記のようにjQueryで要素を選択してから<code>.waypoint()</code>を呼び出します。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.box</span><span class="delimiter">'</span></span>).waypoint({
  handler(direction) {
    <span class="comment">// .boxが画面内に入ったときに実行される処理をここに書く。</span>
    <span class="comment">// direction引数には、下方向のスクロールのときは"down"、</span>
    <span class="comment">// 上方向のスクロールのときは"up"が入る。</span>
  },

  <span class="comment">// 要素の上端が画面のどの位置に来たときにhandlerを実行するかを指定。</span>
  <span class="comment">// 0%なら画面の一番上、100%なら画面の一番下に来たときに実行される。</span>
  <span class="key">offset</span>: <span class="string"><span class="delimiter">'</span><span class="content">100%</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p>動作を図にすると、下記のようなイメージです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-waypoints-principle.png" alt="Waypoint.jsの動作の仕組み"></p>

<p>指定できるオプションなどは<a href="http://imakewebthings.com/waypoints/api/waypoint/" target="_blank">公式ドキュメント（英語）</a>に載っています。</p>

<p>今はなんとなく使い方がわかればOKです。次に紹介するAnimate.cssと組み合わせて使います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-2">7.2 Animate.css
</h3><p><a href="https://daneden.github.io/animate.css/" target="_blank">Animate.css</a>は、HTML要素にクラスを指定するだけでアニメーションを付けてくれるライブラリです。MITライセンスで配布されています。</p>

<p>サイト自体がデモページになっていて、ドロップダウンメニューからアニメーションを選ぶと再生されますので試してみてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-animate-css.png" alt="Animate.cssのデモページ"></p>

<h4>使い方</h4>

<p>サイトの「Download Animate.css」を右クリック→別名で保存し、ダウンロードしたanimate.cssをcloud9にアップロード（作業中のHTMLと同じディレクトリに格納）したら、HTMLの<code>&lt;head&gt;</code>内で読み込みます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- &lt;head&gt;内に置く --&gt;</span>
<span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">animate.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>アニメーションさせたいHTML要素に<code>animated</code>とアニメーション名のクラスを追加します。たとえばbounceというアニメーションを適用するには下記のように書きます。<code>animate</code>ではなく<code>animated</code>なので注意してください。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;h1</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">animated bounce</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>テスト<span class="tag">&lt;/h1&gt;</span>
</pre></div>
</div>
</div>

<p>これでページがロードされた直後にbounceアニメーションが1回だけ再生されます。</p>

<h4>アニメーションの繰り返し</h4>

<p><code>infinite</code>クラスを追加するとアニメーションが無限に繰り返し再生されます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;h1</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">animated infinite bounce</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>テスト<span class="tag">&lt;/h1&gt;</span>
</pre></div>
</div>
</div>

<p>ドキュメントを読む必要がないほどシンプルで使いやすいライブラリですが、さらに知りたい場合は<a href="https://github.com/daneden/animate.css" target="_blank">公式ドキュメント（英語）</a>を参照してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-3">7.3 Waypoints.jsとAnimate.cssを組み合わせる
</h3><p>さて、いよいよWaypoints.jsとAnimate.cssを組み合わせてみましょう。スクロールに合わせてHTML要素が下からフェードインしてくるエフェクトを作ってみます。</p>

<p>ここでひとつ問題点があります。Animate.cssではページロード直後にアニメーションが再生されますが、スクロールに合わせてアニメーションを再生するにはどうしたらよいでしょうか。</p>

<p>実は、アニメーション用のクラスをJavaScriptで動的に付ければ任意のタイミングで再生できます。jQueryのaddClassメソッドを使ってクラスを追加します。</p>

<h4>作り方</h4>

<p><em>rich-site</em>とは別のフォルダに下記のHTMLとJavaScriptを設置してブラウザで開き、ゆっくり下にスクロールしてみてください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Animate Test<span class="tag">&lt;/title&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;style&gt;</span>
<span class="inline">    <span class="tag">body</span> {
      <span class="key">background</span>: <span class="error">r</span><span class="error">e</span><span class="error">p</span><span class="error">e</span><span class="error">a</span><span class="error">t</span><span class="error">i</span><span class="error">n</span><span class="error">g</span><span class="error">-</span><span class="error">l</span><span class="error">i</span><span class="error">n</span><span class="error">e</span><span class="error">a</span><span class="error">r</span><span class="error">-</span><span class="error">g</span><span class="error">r</span><span class="error">a</span><span class="error">d</span><span class="error">i</span><span class="error">e</span><span class="error">n</span><span class="error">t</span>(<span class="float">0deg</span>,
        <span class="color">#ffffff</span>,
        <span class="color">#ffffff</span> <span class="float">40px</span>,
        <span class="color">#dedede</span> <span class="float">40px</span>,
        <span class="color">#dedede</span> <span class="float">80px</span>);
    }

    <span class="class">.boxes</span> {
      <span class="key">margin</span>: <span class="float">80</span><span class="value">vh</span> <span class="value">auto</span>;
    }

    <span class="class">.box</span> {
      <span class="key">border</span>: <span class="float">1px</span> <span class="value">solid</span> <span class="color">#000</span>;
      <span class="key">width</span>: <span class="float">10em</span>;
      <span class="key">padding</span>: <span class="float">10px</span>;
      <span class="key">margin</span>: <span class="float">2em</span> <span class="value">auto</span>;
      <span class="key">text-align</span>: <span class="value">center</span>;
    }

    <span class="class">.animated</span> {
      <span class="comment">/* 最初から非表示 */</span>
      <span class="key">opacity</span>: <span class="float">0</span>;
    }</span>
  <span class="tag">&lt;/style&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">boxes</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">box animated</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>box<span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/div&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// animatedクラスの付いた要素にwaypointを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.animated</span><span class="delimiter">'</span></span>).waypoint({
  handler(direction) {
    <span class="comment">// 要素が画面中央に来るとここが実行される</span>
    <span class="keyword">if</span> (direction === <span class="string"><span class="delimiter">'</span><span class="content">down</span><span class="delimiter">'</span></span>) {
      <span class="comment">/**
       * 下方向のスクロール
       * イベント発生元の要素にfadeInUpクラスを付けることで
       * アニメーションを開始
       */</span>
      <span class="predefined">$</span>(<span class="local-variable">this</span>.element).addClass(<span class="string"><span class="delimiter">'</span><span class="content">fadeInUp</span><span class="delimiter">'</span></span>);

      <span class="comment">/**
       * waypointを削除することで、この要素に対しては
       * これ以降handlerが呼ばれなくなる
       */</span>
      <span class="local-variable">this</span>.destroy();
    }
  },

  <span class="comment">// 要素が画面中央に来たらhandlerを実行</span>
  <span class="key">offset</span>: <span class="string"><span class="delimiter">'</span><span class="content">50%</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p><em>index.html</em> では <code>animated</code> クラスを指定していますが、<code>bounce</code> などのアニメーションの種類は指定していません。このような場合、アニメーション名のクラス指定を後から追加するとそのタイミングでアニメーションが開始されます。</p>

<p>そして <em>main.js</em> では <code>animated</code> クラスの付いた要素が <code>offset:'50%'</code> つまり画面中央に来たタイミングで<code>fadeInUp</code>クラスを付けています。これで、スクロールして要素が画面中央へ来たときにfadeInUpアニメーションが再生されます。上記のコードで <code>this.element</code> は、animatedクラスを持つ要素のうち、画面中央に来た要素のことです。</p>

<p>また <code>this.destroy()</code> は既存のwaypointを削除します。waypointを削除するとそれ以降handlerが呼ばれなくなります。ここでは最初の1回だけhandlerが実行されればよいので、<code>this.destroy()</code> でwaypointを削除しています。</p>

<p>offsetを100%にすると、画面の下端から要素が現れた瞬間にhandlerが実行されます。サイトの完成版内の好きな要素に<code>animated</code>クラスを入れ、<code>opacity: 0</code>のCSSを追加し、JavaScriptコードを入れて実装してみましょう。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-add-animation">課題：アニメーションの追加</h3><p>Cloud9上に <em>add-animation</em> フォルダを新規作成し、<em>rich-site</em> をそのフォルダに格納してください。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/rich-site.zip">サイトの完成版のダウンロード</a></li>
</ul>

<p>現在、<em>rich-site</em> には、Waypointによって下方向(<code>down</code>)のスクロールに対して、Animate.cssの<code>fadeInUp</code>が使用されています。</p>

<p><em>js/main.js から該当部分を抜粋</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/**
 * animatedクラスを持つ要素が画面内に入ったら
 * Animate.cssのfadeInUpエフェクトを適用
 */</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.animated</span><span class="delimiter">'</span></span>).waypoint({
  handler(direction) {
    <span class="keyword">if</span> (direction === <span class="string"><span class="delimiter">'</span><span class="content">down</span><span class="delimiter">'</span></span>) {
      <span class="predefined">$</span>(<span class="local-variable">this</span>.element).addClass(<span class="string"><span class="delimiter">'</span><span class="content">fadeInUp</span><span class="delimiter">'</span></span>);
      <span class="local-variable">this</span>.destroy();
    }
  },
  <span class="comment">/**
   * 要素の上端が画面のどの位置に来たときにhandlerメソッドを呼び出すか指定
   * 0%なら画面の一番上、100%なら画面の一番下に来たときに呼び出される
   */</span>
  <span class="key">offset</span>: <span class="string"><span class="delimiter">'</span><span class="content">100%</span><span class="delimiter">'</span></span>,
});
</pre></div>
</div>
</div>

<p>このコードに、下記の仕様を追加（変更）してください。</p>

<ul>
  <li>上方向のスクロールに対してAnimate.cssの<code>fadeOutUp</code>を適用してください。</li>
  <li><code>fadeOutUp</code>が行われた後にも、下方向にスクロールされた場合、再度<code>fadeInUp</code>が実行されて表示されるようにしてください。上方向の<code>fadeOutUp</code> も同様に再実行できるようにしましょう。</li>
  <li>要素が画面中央までスクロールしたらアニメーションが実行されるように設定を変更してください。</li>
</ul>
</div></section><section id="chapter-8"><h2 class="index">8. 外部ライブラリ以外のトピックス
</h2><div class="subsection"><p>ここでは、外部ライブラリの利用までしなくてもサイトをリッチにできるトピックスを紹介します。いくつかの内容は<em>rich-site</em>に最初から実装していますので、ソースコードから該当箇所を探してみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 マウスを乗せると少し拡大
</h3><p>ギャラリーの各サムネイル写真にマウスを乗せると、少し拡大して表示するエフェクトについて紹介します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-gallery-scale.gif" alt="マウスを乗せたら拡大"></p>

<p>画像と周りの白い枠も一緒に拡大したいので、<code>image-gallery__item</code> というクラスに対して下記のCSSを付けて拡大効果を適用します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.image-gallery__item</span><span class="pseudo-class">:hover</span> {
  <span class="comment">/* 1.1倍に拡大する */</span>
  <span class="key">transform</span>: <span class="error">s</span><span class="error">c</span><span class="error">a</span><span class="error">l</span><span class="error">e</span>(<span class="float">1.1</span>);
}
</pre></div>
</div>
</div>

<p>これでマウスを乗せると拡大されるようになります。</p>

<h4>transitionによるアニメーション</h4>

<p>1.1倍に拡大する際、スムーズにアニメーションされるよう、コードを変更してみましょう。<code>image-gallery__item</code>クラスに下記のように<code>transition</code>を追加します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.image-gallery__item</span> {
  <span class="comment">/* 中略（既存のスタイル） */</span>

  <span class="key">transition</span>: <span class="value">transform</span> <span class="float">0.1s</span>;
}
</pre></div>
</div>
</div>

<p>上のCSSは、transformプロパティが変化する際は0.1秒かけて徐々に値を変化させる、という指定です。<code>0.1s</code>は0.1秒の意味です。省略して<code>.1s</code>と書くこともできます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">transition</span>: <span class="error">プ</span><span class="error">ロ</span><span class="error">パ</span><span class="error">テ</span><span class="error">ィ</span><span class="error">名</span> <span class="error">ア</span><span class="error">ニ</span><span class="error">メ</span><span class="error">ー</span><span class="error">シ</span><span class="error">ョ</span><span class="error">ン</span><span class="error">時</span><span class="error">間</span>;
</pre></div>
</div>
</div>

<p>scaleはデフォルトが1（拡大なし）なので、1倍から1.1倍になるまでアニメーションが行われます。また、逆にマウスが離れて1.1倍から1倍になるときも同様にアニメーションが行われます。通常のCSSでの値の変化にアニメーションをつけるのがtransitionの効果です。</p>

<h4>複数のプロパティをアニメーションさせる</h4>

<p>上の例ではtransformに対してのみアニメーションが適用されますが、widthやheightなどあらゆるプロパティに対して使えます。次のように書くと、transformは0.4秒、border-colorは3秒というようにプロパティごとにアニメーション時間を変えることができます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.image-gallery__item</span> {
  <span class="comment">/* 中略 */</span>

  <span class="key">transition</span>: <span class="value">transform</span> <span class="float">0.4s</span>, <span class="value">border-color</span> <span class="float">3s</span>;
}

<span class="class">.image-gallery__item</span><span class="pseudo-class">:hover</span> {
  <span class="key">transform</span>: <span class="error">s</span><span class="error">c</span><span class="error">a</span><span class="error">l</span><span class="error">e</span>(<span class="float">1.1</span>);
  <span class="key">border-color</span>: <span class="color">#ff2323</span>;
}
</pre></div>
</div>
</div>

<p>すべてのプロパティを同じ時間でアニメーションさせるにはプロパティ名に<code>all</code>と指定します。次のように記述するとすべてのプロパティが0.4秒かけて変化します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.image-gallery__item</span> {
  <span class="comment">/* 中略 */</span>

  <span class="key">transition</span>: <span class="value">all</span> <span class="float">0.4s</span>;
}

<span class="class">.image-gallery__item</span><span class="pseudo-class">:hover</span> {
  <span class="key">transform</span>: <span class="error">s</span><span class="error">c</span><span class="error">a</span><span class="error">l</span><span class="error">e</span>(<span class="float">1.1</span>);
  <span class="key">border-color</span>: <span class="color">#ff2323</span>;
  <span class="key">border-width</span>: <span class="float">4px</span>;
}
</pre></div>
</div>
</div>

<h4>transformで遊ぼう</h4>

<p>transformは様々に要素を変形させることができます。たとえば次のようにすると、拡大と同時に、時計回りに7度回転します。マイナスの値を指定すると反時計回りに回転します。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.image-gallery__item</span><span class="pseudo-class">:hover</span> {
  <span class="key">transform</span>: <span class="error">s</span><span class="error">c</span><span class="error">a</span><span class="error">l</span><span class="error">e</span>(<span class="float">1.1</span>) <span class="error">r</span><span class="error">o</span><span class="error">t</span><span class="error">a</span><span class="error">t</span><span class="error">e</span>(<span class="float">7deg</span>);
}
</pre></div>
</div>
</div>

<p>次のように変えるとどうなるか試してみましょう。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.image-gallery__item</span> {
  <span class="comment">/* 中略 */</span>

  <span class="key">transition</span>: <span class="value">transform</span> <span class="float">0.6s</span>;
  <span class="key">transform</span>: <span class="error">p</span><span class="error">e</span><span class="error">r</span><span class="error">s</span><span class="error">p</span><span class="error">e</span><span class="error">c</span><span class="error">t</span><span class="error">i</span><span class="error">v</span><span class="error">e</span>(<span class="float">400px</span>);
}

<span class="class">.image-gallery__item</span><span class="pseudo-class">:hover</span> {
  <span class="key">transform</span>: <span class="error">p</span><span class="error">e</span><span class="error">r</span><span class="error">s</span><span class="error">p</span><span class="error">e</span><span class="error">c</span><span class="error">t</span><span class="error">i</span><span class="error">v</span><span class="error">e</span>(<span class="float">400px</span>) <span class="error">r</span><span class="error">o</span><span class="error">t</span><span class="error">a</span><span class="error">t</span><span class="error">e</span><span class="float">3</span><span class="error">d</span>(<span class="float">0</span>, <span class="float">-1</span>, <span class="float">0</span>, <span class="float">180deg</span>);
}
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 ベンダープレフィックス
</h3><p><code>transform</code> プロパティが主要ブラウザで共通して使えるようになったのは比較的最近で、それまでは各ブラウザが徐々にサポートを始めていました。そのため古いブラウザで使うには <code>-webkit-transform</code> や <code>-ms-transform</code> のように頭に特定の文字列（prefix）を付けないと動きません。これらをベンダープレフィックス（vendor prefix）と呼びます。ベンダープレフィックスは、ブラウザが実験的にサポートしている新しい機能を使いたい場合に必要となります。</p>

<p>たとえばcaniuse.comで<a href="http://caniuse.com/#feat=transforms3d" target="_blank">3d transformのサポート状況</a>を調べると、どのくらいの割合のユーザーに対してこの機能を使えるかが右上に表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-caniuse.png" alt="ブラウザサポート状況"></p>

<p>上の例ではベンダープレフィックスを付けない場合（unprefixed）は日本で87.14%のカバー率、ベンダープレフィックスを付けると94.84%のカバー率になるという意味です。カバー率を上げたほうがいいのはもちろんですが、その一方で、かなり時代遅れのブラウザにまで対応する必要はないでしょう。ベンダープレフィックスが必要かどうかはその時々のブラウザシェアによって変わるため、ひとつづつ調べて書いていくのは非常に大変です。</p>

<p>そこでベンダープレフィックスを付ける作業は<a href="https://autoprefixer.github.io/" target="_blank">Autoprefixer</a>に任せましょう。左側にCSSを入力すると、現在の情勢に応じて必要なベンダープレフィックスを付けて右側に出力してくれます。利用率のとても低いブラウザは対象外とされ、ベンダープレフィックスは付きません。サイトの公開前に一度、Autoprefixerにかけておくとよいでしょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-autoprefixer.png" alt="Autoprefixer"></p>

<p>対象とするブラウザを変えるには、左下のFilterに条件を入力します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/library/6-autoprefixer-filter.png" alt="Filterで対象ブラウザを指定する"></p>

<p>デフォルト（未入力状態）では一般的なWeb制作において問題ないとされる条件になりますが、たとえば「IE9以上（<code>ie &gt;= 9</code>）」と「シェアが1%より大きい全ブラウザ（<code>&gt; 1%</code>）」を対象ブラウザにしたい場合は下記のように入力してApplyボタンを押します。</p>

<div class="language-txt highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>ie &gt;= 9, &gt; 1%
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 多様なユーザー環境に対応する
</h3><h4>ページの印刷</h4>

<p>Waypoints.jsとAnimate.cssで作ったような、スクロールして初めて表示されるコンテンツを印刷する場合は注意が必要です。ページの一番下までスクロールしないと、正しく印刷されないためです。印刷したいユーザーにとっては不便です。</p>

<p><code>@media print { ... }</code>というメディアクエリを使えば、印刷するときだけ特定のスタイルを適用できます。</p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="class">.animated</span> {
  <span class="key">opacity</span>: <span class="float">0</span>; <span class="comment">/* 非表示 */</span>
}

<span class="directive">@media</span> <span class="type">print</span> {
  <span class="class">.animated</span> {
    <span class="key">opacity</span>: <span class="float">1</span>; <span class="comment">/* 表示 */</span>
  }
}
</pre></div>
</div>
</div>

<p>上のように記述すると、.animatedは標準では非表示ですが、印刷するときには最初からすべて表示されます。そのためページの一番下までスクロールしなくても、問題なく印刷できるようになります。</p>

<h4>JavaScriptが無効化されている場合</h4>

<p>少数ですが、JavaScriptを無効にしてブラウザを使うユーザーもいます。CSSで.animatedを非表示にしてJavaScriptで表示していく方式では、そのようなユーザーにはコンテンツが表示されなくなってしまいます。 <code>&lt;head&gt;</code> 内に <code>&lt;noscript&gt;</code> を書くことで、JavaScriptを無効にしているユーザーに対してだけ特定のCSSを適用できます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

  <span class="tag">&lt;noscript&gt;</span>
    <span class="comment">&lt;!-- JavaScriptを無効化している場合に追加で読み込む外部CSS --&gt;</span>
    <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">noscript.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;/noscript&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<p>JavaScriptを無効化していても完璧に見た目が崩れないようにまで調整する必要はありませんが、最低限コンテンツが見えるようにしておくとよいでしょう。</p>

<h4>テキストブラウザ</h4>

<p>テキストしか表示できないブラウザのことをテキストブラウザと呼びます。w3mやLynxといったソフトが代表的で、一部のユーザーに利用されています。テキストブラウザではCSSが完全に無視され、HTML構造のみが表示されます。画像を表示できる場合もありますが、基本的に <code>&lt;img&gt;</code> の<code>alt</code>属性のテキストが表示されます。</p>

<h4>スクリーンリーダー</h4>

<p>スクリーンリーダーとは主に視覚障害者の方が使うソフトで、Webページを音声で読み上げてくれます。CSSやJavaScriptを解釈できるスクリーンリーダーもあります。スクリーンリーダーにとってアクセスしやすいページを作るには、まずHTMLを適切に記述することが大事です。 <code>&lt;h1&gt;</code> や <code>&lt;h2&gt;</code> でコンテンツの階層分けを適切に行い、<code>&lt;img&gt;</code> の <code>alt</code> 属性をセットするなど、基本的なルールに従いましょう。また、WAI-ARIA（Web Accessibility Initiative - Accessible Rich Internet Applications）という仕様が定められています。この仕様にそってHTMLを記述することで、JavaScriptを使用した動的なコンテンツでも視覚障害を持つ方にとってアクセスしやすい作りにできます。WAI-ARIAについて詳しくは、下記などをご参考にしてください。</p>

<ul>
  <li><a href="https://website-usability.info/2014/04/entry_140415.html">WAI-ARIA の基礎知識 — Website Usability Info</a></li>
</ul>

<p>また、スクリーンリーダーを使っていなくても赤緑色弱の方にとっては赤と緑の判別が難しいため、ページ制作の際には色使いに注意したり、あるいはテキストや模様など色以外の情報で補足するなどするとユーザーに優しいページとなります。</p>

<p>このように視覚障害を含む多様な環境のユーザーに配慮してコンテンツが作られているかどうかを <strong>Webアクセシビリティ</strong> と呼びます。自治体など公共性の高いコンテンツを作る場合などは特にアクセシビリティの高いページを作るよう配慮する必要があります。WAI-ARIAなどの具体的な内容については本レッスンで触れませんが、興味があればぜひ調べてみてください。</p>
</div></section><section id="chapter-9"><h2 class="index">9. まとめ
</h2><div class="subsection"><p>リッチなサイトに見せるには細かなブラッシュアップの積み重ねが大事です。フォントや配色の調整も大事ですが、エフェクトを効果的に使うとページに動きや躍動感を出すことができます。エフェクトは基本的な機能を阻害しない範囲でアクセントとして使っていきましょう。</p>

<p>本レッスンで紹介したライブラリ以外にも、小さなエフェクトから巨大な3D描画エンジンまで様々なライブラリが世界中の人によって公開されています。こんなことできたらいいな、と思ったら既存のライブラリがあるかまず検索してみましょう。</p>
</div></section></div>
</body>
</html>