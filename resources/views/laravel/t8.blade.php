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
<div class="markdown"><div class="lesson-num p">Lesson8</div><h1 id="php-4">PHP その4
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>ここまで、ターミナルの <code>php</code> コマンド( 例：<code>$ php test.php</code> )を使ってPHPファイルを実行してきました。しかし、実際には、人がわざわざリクエストがある度にターミナルで <code>php</code> コマンドを入力していては、一生それだけで過ごすことになってしまいます。人の代わりに <code>php</code> コマンドを実行してくれるのが「サーバ」です。ここからはPHPコマンドでPHPファイルを実行するのではなく、Webサーバを起動して、代わりにPHPを実行してもらうことにします。</p>
</div></section><section id="chapter-2"><h2 class="index">2. HTMLへの埋め込み用としてPHPを使う
</h2><div class="subsection"><p>雛形のHTMLにデータを埋め込むためにPHPを使うのが、WebプログラミングとしてのPHPの使い方です。</p>

<p>ここまで、PHPをターミナルで実行してきたので、PHP（プログラム）を実行すると、<code>print</code>に与えたデータが表示されることは、もう理解しているはずです。今までに学んだPHPの知識を応用して、WebサーバでPHPを実行させる学習をすぐにでも行いたいところですが、このセクションでは前段として、HTMLの中にPHPのコードを埋め込んで、<code>php</code> コマンドを実行してHTMLの一部分が動的に書き換わることを確認していきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 PHPが入っていないHTMLファイルをPHPファイルとして扱う
</h3><p>PHPファイルの中にHTMLを書き、動的な表示が必要な部分にPHPの命令を記述する流れで進めます。</p>

<p>まずは最小のHTMLファイルを<em>test.php</em>として保存してみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
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

<p>そしてこれをターミナルでPHPとして実行してみます。何が返ってくるでしょうか？</p>

<h5>実行してみる</h5>

<pre><code>$ php test.php
</code></pre>

<p>実は、記述したHTMLがそのまま返ってきます。特に変化のあった部分が無かったのは、<code>&lt;?php ... ?&gt;</code> を使った記述が1ヶ所もないからです。<code>php</code> コマンドでPHPのプログラムを処理する際、 <code>&lt;?php ... ?&gt;</code> 以外の部分はそのまま文字列を返します。</p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;p&gt;本文です。&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 PHPをHTMLに埋め込む
</h3><h4>print文を埋め込む</h4>

<p>それでは、HTMLに埋め込む形でPHPを書いてみます。body要素内の<code>本文です。</code>を書き換えてPHPの命令を埋め込んでみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">ここにPHPコードを埋め込む。</span><span class="delimiter">'</span></span>; <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>そしてこれをターミナルでPHPとして実行してみます。何が返ってくるでしょうか？</p>

<h5>実行確認</h5>

<pre><code>$ php test.php
</code></pre>

<p>実行前に想像できた方も多いとは思いますが、HTMLタグの中だとしても、PHPコードを埋め込めばしっかりPHPが実行されて返ってきます。</p>

<p><em>出力結果(PHP =&gt; HTML)</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;p&gt;ここにPHPコードを埋め込む。&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>返ってきた結果を見ると、<code>&lt;?php ... ?&gt;</code>で囲んだ部分はちゃんと実行されて、<code>ここにPHPコードを埋め込む。</code>という文字列がHTMLに埋め込まれていることがわかります。</p>

<h4>HTMLタグごと埋め込む</h4>

<p>先程は、<code>&lt;p&gt;&lt;?php print 'ここにPHPコードを埋め込む。'; ?&gt;&lt;/p&gt;</code>として、<code>&lt;p&gt;&lt;?php //PHPコード ?&gt;&lt;/p&gt;</code>のようにp要素の中にPHPコードを入れました。今回は、PHPコードの中にHTMLタグも入れてみます。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;p&gt;ここにPHPコードを埋め込む。&lt;/p&gt;</span><span class="delimiter">'</span></span>; <span class="inline-delimiter">?&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h5>実行確認</h5>

<pre><code>$ php test.php
</code></pre>

<p>これも同じ結果となります。<code>print</code>はHTMLタグでも問題無く出力できます。</p>

<p><em>出力結果(PHP =&gt; HTML)</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;p&gt;ここにPHPコードを埋め込む。&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>極端な話をすると、下記の通りに書いても同じ結果になります。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;!DOCTYPE html&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;html lang="ja"&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">    &lt;head&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">        &lt;meta charset="UTF-8"&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">        &lt;title&gt;タイトル&lt;/title&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">    &lt;/head&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">    &lt;body&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">        &lt;p&gt;ここにPHPコードを埋め込む。&lt;/p&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">    &lt;/body&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">&lt;/html&gt;</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>; <span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<h5>printで埋め込む際の注意点</h5>

<p>このようにPHPのprint文からHTMLタグを出力することが可能ですが、<strong>セキュリティの観点においては、お行儀の悪い方法です。</strong> どうしても <code>print</code> でHTMLタグを埋め込みたい場合を除き、<strong>HTMLタグが入り込む可能性のある変数やデータには <code>htmlspecialchars()</code> 関数を適用してからHTML内に埋め込むことが推奨されています。</strong></p>

<p><em>例：</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;?php print htmlspecialchars('&lt;p&gt;ここにPHPコードを埋め込む。&lt;/p&gt;', ENT_QUOTES, 'UTF-8') . PHP_EOL; ?&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>詳しくは公式のドキュメントを参照してください。</p>

<p><a href="http://php.net/manual/ja/function.htmlspecialchars.php" target="blank">参考：htmlspecialchars()</a></p>

<h4>関数と変数を埋め込む</h4>

<p><code>date_default_timezone_set()</code>というPHPが最初から定義してある関数を呼び出します。この関数は、時刻をその地域に合わせる関数です。世界の時刻は地域によって様々なので、日本( <code>Asia/Tokyo</code> )に合わせるようにします。</p>

<p>更に、同じく最初から定義してある関数の <code>date()</code> を呼び出します。この関数は <code>"Y/m/d H:i:s"</code> などの文字列を与えるとそれに沿った形で現在日時を文字列に変換してくれます。<code>Y</code> はYear（年：西暦4桁）であり、<code>m</code> はmonth（月：2桁）、<code>d</code> はday（日：2桁）、<code>H</code> はhour（時間：24時間表記：2桁）、<code>i</code> は minutes（分：2桁）、<code>s</code> は second（秒：2桁）になります（「年」以外の項目に記載した「2桁」とは、現在時刻の数値が1桁の場合、10の位が 0 で埋められて <code>09</code> のように表示されるという意味です。）</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    date_default_timezone_set(<span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>);
    <span class="local-variable">$now</span> = <span class="predefined">date</span>(<span class="string"><span class="delimiter">"</span><span class="content">Y/m/d H:i:s</span><span class="delimiter">"</span></span>);
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$now</span>; <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>変数<code>$now</code>には現在日時が文字列で代入されます。</p>

<h5>実行確認</h5>

<pre><code>$ php test.php
</code></pre>

<p><em>出力結果</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
                &lt;p&gt;2018/09/13 15:08:01&lt;/p&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p><code>&lt;p&gt;2018/09/13 15:08:01&lt;/p&gt;</code>の部分は、実際には皆さんの現在日時となっているはずです。</p>

<p>下記のコードは、<code>print</code>していないのでHTMLの表示には出ませんが、問題なく実行されています。<code>print $now</code> で表示することで、意図したとおりになっているかがわかります。</p>

<pre><code>&lt;?php
    date_default_timezone_set('Asia/Tokyo');
    $now = date("Y/m/d H:i:s");
?&gt;
</code></pre>

<h4>if文を埋め込む</h4>

<p>どうやってWebアプリケーションを作るのか、なんとなくわかってきたのではないでしょうか？</p>

<p>下記のコードは、現在時刻によって <code>おはよう</code> 、 <code>こんにちは</code> 、 <code>こんばんは</code> と表示を分けるプログラムです。</p>

<p>まずは <code>$now_hour = (int)date("G");</code> で現在時刻（<code>G</code> は hourのみ：24時間表記：1桁（10の位の 0 埋めは無し））を取得します。気をつけたいのは <code>date</code> 関数で得られる情報は、数値ではなく文字列です。以前の説明のとおり、何もしなくてもPHPが数値としても扱ってくれますが、ここでは明示的に <code>(int)</code> という記述を前につけて、文字列を整数(<code>18</code>など)に変換しています。このような処理を <strong>型変換（キャスト）</strong> といいます。これで間違いなく、整数として比較してもらえます。</p>

<p><a href="http://php.net/manual/ja/language.types.type-juggling.php" target="_blank">参考：型の相互変換</a></p>

<p>また、<code>&amp;&amp;</code>がありますが、これは <code>〜かつ〜</code> という意味で、条件が2つ以上のものを同時に満たす必要があるときに使用されます。<code>6 &lt;= $now_hour &amp;&amp; $now_hour &lt; 12</code> は <code>$now_hour</code> が <code>6</code> 以上で、かつ、<code>12</code> 未満の場合です。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    date_default_timezone_set(<span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>);
    <span class="local-variable">$now_hour</span> = (<span class="predefined-type">int</span>)<span class="predefined">date</span>(<span class="string"><span class="delimiter">"</span><span class="content">G</span><span class="delimiter">"</span></span>);
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>今は<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$now_hour</span>; <span class="inline-delimiter">?&gt;</span>時です。<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> <span class="keyword">if</span> (<span class="integer">6</span> &lt;= <span class="local-variable">$now_hour</span> &amp;&amp; <span class="local-variable">$now_hour</span> &lt; <span class="integer">12</span>) { <span class="inline-delimiter">?&gt;</span>
            <span class="tag">&lt;p&gt;</span>おはよう、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } elseif (12 <span class="error">&lt;</span>= $now_hour <span class="error">&amp;</span><span class="error">&amp;</span> $now_hour <span class="error">&lt;</span> 18) { ?<span class="error">&gt;</span>
            <span class="tag">&lt;p&gt;</span>こんにちは、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } else { ?<span class="error">&gt;</span>
            <span class="tag">&lt;p&gt;</span>こんばんは、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } ?<span class="error">&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h5>実行確認</h5>

<pre><code>$ php test.php
</code></pre>

<p><em>出力結果（インデントがズレていますが、仕様なので気にしないでください。ブラウザでの表示には問題ありません）</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
                &lt;p&gt;今は19時です。&lt;/p&gt;
                    &lt;p&gt;こんばんは、太郎さん&lt;/p&gt;
            &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>↑の出力結果は19時台に実行していますが、これを見ると、<code>こんばんは、太郎さん</code> のみが表示されています。これは現在時刻によって切り替わります。その通りに if文 が動作したからです。</p>

<p>埋め込まれた if文 を見ると、6時〜12時手前の間は「おはよう」、12時〜18時手前の間は「こんにちは」、それ以外の時間帯は全て「こんばんは」が表示されるようにコードが書かれています。if文 の条件によって特定の <code>&lt;p&gt;...&lt;/p&gt;</code> が表示されたり、表示されなかったりします。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="inline-delimiter">&lt;?php</span> <span class="keyword">if</span> (<span class="integer">6</span> &lt;= <span class="local-variable">$now_hour</span> &amp;&amp; <span class="local-variable">$now_hour</span> &lt; <span class="integer">12</span>) { <span class="inline-delimiter">?&gt;</span>
            <span class="tag">&lt;p&gt;</span>おはよう、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } elseif (12 <span class="error">&lt;</span>= $now_hour <span class="error">&amp;</span><span class="error">&amp;</span> $now_hour <span class="error">&lt;</span> 18) { ?<span class="error">&gt;</span>
            <span class="tag">&lt;p&gt;</span>こんにちは、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } else { ?<span class="error">&gt;</span>
            <span class="tag">&lt;p&gt;</span>こんばんは、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } ?<span class="error">&gt;</span>
</pre></div>
</div>
</div>

<h4>for文を埋め込む</h4>

<p>せっかくなので for文 も埋め込んでみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;ul&gt;</span>
            <span class="inline-delimiter">&lt;?php</span> <span class="keyword">for</span>(<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt; <span class="integer">10</span>; <span class="local-variable">$i</span>++) { <span class="inline-delimiter">?&gt;</span>
                <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">3 x </span><span class="delimiter">'</span></span> . <span class="local-variable">$i</span> . <span class="string"><span class="delimiter">'</span><span class="content"> = </span><span class="delimiter">'</span></span> . (<span class="integer">3</span> * <span class="local-variable">$i</span>);<span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
            <span class="inline-delimiter">&lt;?php</span> } ?<span class="error">&gt;</span>
        <span class="tag">&lt;/ul&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<h5>実行確認</h5>

<pre><code>$ php test.php
</code></pre>

<p><em>出力結果</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;ul&gt;
                            &lt;li&gt;3 x 1 = 3&lt;/li&gt;
                            &lt;li&gt;3 x 2 = 6&lt;/li&gt;
                            &lt;li&gt;3 x 3 = 9&lt;/li&gt;
                            &lt;li&gt;3 x 4 = 12&lt;/li&gt;
                            &lt;li&gt;3 x 5 = 15&lt;/li&gt;
                            &lt;li&gt;3 x 6 = 18&lt;/li&gt;
                            &lt;li&gt;3 x 7 = 21&lt;/li&gt;
                            &lt;li&gt;3 x 8 = 24&lt;/li&gt;
                            &lt;li&gt;3 x 9 = 27&lt;/li&gt;
                    &lt;/ul&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>
</div></section><section id="chapter-3"><h2 class="index">3. Webサーバを起動してPHPを自動的に実行させる
</h2><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 Webサーバについて
</h3><p>Webサーバとは、<strong>HTTPリクエストを受け取り、HTMLなどのWebページをHTTPレスポンスとして返すサーバ</strong> のことです。単なる静的Webサイトであれば、Webページ（HTMLやCSS）をレスポンスとして返すだけですが、リクエストで要求されたWebページがPHPで出来ていると、<code>php</code>コマンドを実行して出力されたWebページ（HTMLやCSS）をレスポンスとして返します。Webサーバを起動しなければ、仮にHTTPリクエストが来ても誰も処理しないのでHTTPリクエストは無視されます。HTTPリクエストが来た時にWebサーバが起動していれば、何らかのレスポンスを返します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/php/6-4.png" alt=""></p>

<p>一般的に利用されているWebサーバはApache HTTP Serverと呼ばれるものですが、今回はPHP Built in Server（ビルトインサーバ）を使用します。PHP Built in Serverは、PHP 5.4.0 から組み込まれたWebサーバ機能です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 Webサーバの起動
</h3><h4>PHPの設定ファイルを作成する</h4>

<p>Webサーバを起動する前に、PHPを使ったサイト制作を便利にする設定を用意します。<em>test.php</em> と同じ場所に <em>php.ini</em> という名前のファイルを新規作成してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/php/open_running_application_01.png" alt=""></p>

<p>エディタ画面で、以下の1行を <em>php.ini</em> に記述します。</p>

<div class="language-text highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>error_reporting = E_ALL &amp; ~E_NOTICE
</pre></div>
</div>
</div>

<p>この設定は「PHPの記述内容に間違いがあった場合、ブラウザの画面にエラーの詳細情報を表示する」という内容です。AWS Cloud9では通常、エラー内容をブラウザの画面に表示しないようになっています。</p>

<div class="alert alert-info">
今後学習するLaravelでは、今回の設定ではなくLaravelが独自で持っているエラー表示機能を使って、Webアプリケーション制作を進めます。
</div>

<div class="alert alert-warning">
制作したサイトを他の方が訪れたとき、エラーが表示されると恥ずかしいことになるので、本番公開する際はエラーを表示しないようにするのが鉄則です。ただし、制作中の段階ではエラー内容がわからないと不便なので、今回のような追加設定をしてもらっています。
</div>

<h4>Webサーバを起動する</h4>

<p>では、Webサーバを起動してみましょう。現在、<em>test.php</em> は、for文 で3の段の掛け算を表示するプログラムになっているかと思います。このプログラムを実行確認してみます。ターミナルで、<code>cd</code> コマンドで <em>test.php</em> の置かれているディレクトリへ移動した後、下記コマンドを実行することでPHPに組み込まれているWebサーバが起動します（<code>echo $IP</code> や <code>echo $PORT</code> のコマンドを実行することで、 <code>$IP</code> や <code>$PORT</code> にどんな値が入っているかわかります）。</p>

<pre><code>$ php -S $IP:$PORT -c php.ini
</code></pre>

<p>ターミナル画面に下記のようなログが出たと思います。これでWebサーバが起動しました。 <code>Press Ctrl-C to quit.</code> とあるように、ターミナルで <code>Ctrl+c</code> を入力すると <strong>Webサーバは停止</strong> します。</p>

<pre><code>PHP 7.2.8 Development Server started at 日付
Listening on http://0.0.0.0:8080
Document root is /home/ec2-user/environment
Press Ctrl-C to quit.
</code></pre>

<p>サーバを起動すると、サーバはリクエストを待つ状態になります。リクエストが来ると、レスポンスを返します。Webサーバの場合、HTTPリクエストが来ると、レスポンスとしてHTMLやCSS（Webページ）を返します。</p>

<div class="alert alert-info">
<strong>補足：</strong>以下のような起動方法も可能です。<br>
<br>
Cloud9では画面左端のworkツリーにて、起動したいファイル上で右クリックすると、Webサーバを簡単に起動する「Run」という項目が用意されています。この <i>test.php</i> を右クリックして「Run」を押しましょう。
<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/run.png">
<br>
ターミナル画面に下記のようなログが出たと思います。
<pre>Starting PHP built-in web server, serving https://54.209.205.73/test.php.
PHP 7.2.8 Development Server started at Thu Sep 13 06:55:43 2018
Listening on http://0.0.0.0:8080
Document root is /home/ec2-user/environment
Press Ctrl-C to quit.
</pre>
なお、まれにうまく起動できない場合がありますので、基本的にはターミナルから php コマンドで起動する方法が無難でしょう。
</div>

<p>サーバーの起動に成功しましたら、次にPreviewを立ち上げます。以下のように、 <code>Preview &gt; Preview Running Application</code> を選択すると、プレビュータブが立ち上がります。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/laravel/message-board/open_laravel_01%5B1%5D.png" alt=""></p>

<div class="alert alert-info">
<strong>補足：</strong>プレビューが立ち上がりましたら、以下の画像のように、タブの右上のアイコンをクリックすると、プレビューをChromeの新規タブで立ち上げることができます。
<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/open_chrome.png">
</div>

<p>現状、 <code>Not Found</code> と表示されていますね。これは、URLがトップページになっているためです。URL欄をクリックして、</p>

<p><code>https://(中略).amazonaws.com/test.php</code> (例)</p>

<p>というようにトップページ以下のディレクトリに <code>test.php</code> というパス名を付け足すことで正常に表示することができるようになります。</p>

<p><em>test.php（念のため下記のコードのとおりか確認してください）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;ul&gt;</span>
            <span class="inline-delimiter">&lt;?php</span> <span class="keyword">for</span>(<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt; <span class="integer">10</span>; <span class="local-variable">$i</span>++) { <span class="inline-delimiter">?&gt;</span>
                <span class="tag">&lt;li&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">3 x </span><span class="delimiter">'</span></span> . <span class="local-variable">$i</span> . <span class="string"><span class="delimiter">'</span><span class="content"> = </span><span class="delimiter">'</span></span> . (<span class="integer">3</span> * <span class="local-variable">$i</span>);<span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/li&gt;</span>
            <span class="inline-delimiter">&lt;?php</span> } ?<span class="error">&gt;</span>
        <span class="tag">&lt;/ul&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>test.phpのphpコマンド実行結果</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;ul&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 1 = 3<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 2 = 6<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 3 = 9<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 4 = 12<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 5 = 15<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 6 = 18<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 7 = 21<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 8 = 24<span class="tag">&lt;/li&gt;</span>
                            <span class="tag">&lt;li&gt;</span>3 x 9 = 27<span class="tag">&lt;/li&gt;</span>
                    <span class="tag">&lt;/ul&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>Webブラウザを通した場合、body要素内しか表示されなかったことを思い出してください。Webページの表示は</p>

<pre><code>・3 x 1 = 3
・3 x 2 = 6
・3 x 3 = 9
・3 x 4 = 12
・3 x 5 = 15
・3 x 6 = 18
・3 x 7 = 21
・3 x 8 = 24
・3 x 9 = 27
</code></pre>

<p>となっているはずです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 indexページの作成
</h3><p>続いて、先ほど <em>test.php</em> で試した「時間帯によって挨拶文が変わるページ」を <em>index.php</em> として再度作ってみましょう。</p>

<p><em>index.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    date_default_timezone_set(<span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>);
    <span class="local-variable">$now_hour</span> = (<span class="predefined-type">int</span>)<span class="predefined">date</span>(<span class="string"><span class="delimiter">"</span><span class="content">G</span><span class="delimiter">"</span></span>);
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>今は<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$now_hour</span>; <span class="inline-delimiter">?&gt;</span>時です。<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> <span class="keyword">if</span> (<span class="integer">6</span> &lt;= <span class="local-variable">$now_hour</span> &amp;&amp; <span class="local-variable">$now_hour</span> &lt; <span class="integer">12</span>) { <span class="inline-delimiter">?&gt;</span>
            <span class="tag">&lt;p&gt;</span>おはよう、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } elseif (12 <span class="error">&lt;</span>= $now_hour <span class="error">&amp;</span><span class="error">&amp;</span> $now_hour <span class="error">&lt;</span> 18) { ?<span class="error">&gt;</span>
            <span class="tag">&lt;p&gt;</span>こんにちは、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } else { ?<span class="error">&gt;</span>
            <span class="tag">&lt;p&gt;</span>こんばんは、太郎さん<span class="tag">&lt;/p&gt;</span>
        <span class="inline-delimiter">&lt;?php</span> } ?<span class="error">&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>これで、 プレビューのトップページ（例：<code>https://38fbb7cf62224673b1e0a81b5a7b90c0.vfs.cloud9.us-west-2.amazonaws.com/</code>）にアクセスしてみましょう。先ほどはトップページが無かったため <code>Not Found</code> と表示されていましたが、今度は <em>index.php</em> が用意されているので、 <em>index.php</em> を phpコマンドで実行した結果（HTML）がレスポンスとして返され、表示されるはずです。</p>

<p><em>index.phpのphpコマンド実行結果</em></p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;タイトル&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
                &lt;p&gt;今は19時です。&lt;/p&gt;
                    &lt;p&gt;こんばんは、太郎さん&lt;/p&gt;
            &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>ここまでで、Webサーバの役割を知ることが出来ました。WebサーバはHTTPリクエストをもらってレスポンスを返します。リクエストされたファイルが今回のようにPHPファイルであれば、<code>php</code>コマンドを自動的に実行し、HTMLファイルとしてレスポンスを返します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 （補足）関数を使ってプログラムをすっきりさせる
</h3><p>今のままでは<code>太郎さん</code>も何度も出てくるし、少しプログラムが見にくくなっています。そこで関数を使ってソースコードをすっきり見通しの良いものにしましょう。</p>

<p><em>index.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    date_default_timezone_set(<span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>);
    <span class="local-variable">$now_hour</span> =  (<span class="predefined-type">int</span>)<span class="predefined">date</span>(<span class="string"><span class="delimiter">"</span><span class="content">G</span><span class="delimiter">"</span></span>);

    <span class="keyword">function</span> <span class="function">greeting</span>(<span class="local-variable">$hour</span>) {
        <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span>;

        <span class="keyword">if</span> (<span class="integer">6</span> &lt;= <span class="local-variable">$hour</span> &amp;&amp; <span class="local-variable">$hour</span> &lt; <span class="integer">12</span>) {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">おはよう</span><span class="delimiter">"</span></span>;
        }
        <span class="keyword">elseif</span> (<span class="integer">12</span> &lt;= <span class="local-variable">$hour</span> &amp;&amp; <span class="local-variable">$hour</span> &lt; <span class="integer">18</span>) {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">こんにちは</span><span class="delimiter">"</span></span>;
        }
        <span class="keyword">else</span> {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">こんばんは</span><span class="delimiter">"</span></span>;
        }

        <span class="keyword">return</span> <span class="local-variable">$result</span>;
    }
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;p&gt;</span>今は<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$now_hour</span>; <span class="inline-delimiter">?&gt;</span>時です。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> greeting(<span class="local-variable">$now_hour</span>); <span class="inline-delimiter">?&gt;</span>、太郎さん<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>どうでしょうか？プログラムとしての行数は多くなってしまいましたが、関数を使うことによって機能の役割分担ができています。そのおかげで、挨拶が時刻によって変化する部分を外に追い出すことができました。これで、body要素内がすっきりして何が表示されるかわかりやすく、見通しの良いプログラムとなりました。</p>

<h4>引数の名前について補足</h4>

<p>引数名は同じでなくても動作します。</p>

<ol>
  <li><code>&lt;?php print greeting( 渡す値の変数名 ); ?&gt;</code>　の引数で指定した値を、</li>
  <li><code>&lt;?php function greeting( 受け取る値の変数名 ) { ... } ?&gt;</code>　の引数で受け取ります。</li>
</ol>

<p>変数名が何であれ、<code>渡す値の変数名</code> で指定した変数の中身を、 <code>受け取る値の変数名</code> で指定した変数で受け取るという仕組みになっているので、文法上同じ変数名である必要が無いのです。よって、上記のサンプルのように <code>渡す値の変数名</code> が <code>$now_hour</code> で、 <code>受け取る値の変数名</code> が <code>$hour</code> と引数名を変えても、プログラムは動作します。</p>

<p>もう少し補足します。例えば、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$a</span> = <span class="integer">1</span>;
<span class="local-variable">$b</span> = <span class="local-variable">$a</span>;
<span class="predefined">print</span>(<span class="local-variable">$b</span>);
</pre></div>
</div>
</div>

<p>上記のような3行のプログラムを実行すると、1と表示されます。1行目で1はaに代入されました。3行目でbを表示したらaに代入したはずの1が表示されています。</p>

<p>この事と、今回の引数は似ています。つまり、イメージとして、引数でも <code>$now_hour = $hour;</code> のような受け渡しがされていると考えていただいて構いません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-5">3.5 （補足）Webサーバはどのように動作したか
</h3><p><em>index.php</em> にブラウザからアクセスしたときのWebサーバの動作について、流れを解説します。</p>

<ol>
  <li>Webサーバ（ビルトインサーバ）を起動して、先ほどと同様にブラウザでアクセスします。</li>
  <li>URLにアクセス。<code>/</code> で終わっていてファイル名が指定されていないので、トップページへアクセスするというHTTPリクエストになる。</li>
  <li>トップページへアクセス(GET)するというHTTPリクエストが来たので、<em>index.php</em> を実行する。</li>
  <li><em>index.php</em> 内の PHP コードを <code>php</code> コマンドで実行して HTML を生成する</li>
  <li><code>php</code> コマンドを実行して生成されたHTMLの内容をレスポンスとして返す。</li>
  <li>レスポンスとして返されたHTMLの内容を、ブラウザが解釈してWebページとして表示する。</li>
</ol>

<p>簡単にまとめると、Webサーバ(ビルトインサーバ)は PHP ファイルへのリクエストがあると、その PHP ファイルを <code>php</code> コマンドを通して HTMLにし、それをレスポンスとして返します。順番は HTTPリクエスト→ビルトインサーバ→PHP実行→HTML生成→HTTPレスポンス、となります。</p>

<p>ここまでで、Webサーバの役割を知ることが出来ました。WebサーバはHTTPリクエストをもらってレスポンスを返します。リクエストされたファイルが今回のようにPHPファイルであれば、<code>PHP</code>コマンドを自動的に実行し、HTMLファイルとしてレスポンスを返します。</p>
</div></section><section id="chapter-4"><h2 class="index">4. フォームデータの送受信
</h2><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 GETとPOST
</h3><p>WebブラウザがWebサーバに対して要求を送ることをHTTPリクエストと呼びます。</p>

<p>ブラウザからHTTPリクエストを送る際の技術的な仕様として、主に <strong>GET</strong> と <strong>POST</strong> の2種類が存在します。GETは以下のようなアクセスに利用されます。</p>

<ul>
  <li>リンクをクリックしたとき</li>
  <li>ブラウザのURL欄に直接URLを打ち込んだとき</li>
  <li>GoogleやYahoo!で検索ボタンをクリックしたとき</li>
</ul>

<p>一方、POSTは以下のようなリクエストで利用されます。</p>

<ul>
  <li>問い合わせフォームで内容を入力して送信ボタンをクリックしたとき</li>
  <li>IDとパスワードを入力してログインボタンをクリックしたとき</li>
</ul>

<p>「HTTPリクエストをする際、大事な情報を送信する必要のあるときは POST を使う」と覚えておいて間違いありません。このあと、フォームから送信された情報を受け取るPHPのサンプルプログラムを作成しますが、これも POST で送信することを前提としています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 POSTでフォームから情報を送信する
</h3><p>ここでは、HTTPリクエストの中でPOSTメソッドを使ってフォームの送信を行うところを学びます。</p>

<p>それではフォームを追加したPHPファイルを見ていきましょう。</p>

<p><em>index.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    date_default_timezone_set(<span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>);
    <span class="local-variable">$now_hour</span> =  (<span class="predefined-type">int</span>)<span class="predefined">date</span>(<span class="string"><span class="delimiter">"</span><span class="content">G</span><span class="delimiter">"</span></span>);

    <span class="keyword">function</span> <span class="function">greeting</span>(<span class="local-variable">$hour</span>) {
        <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span>;

        <span class="keyword">if</span> (<span class="integer">6</span> &lt;= <span class="local-variable">$hour</span> &amp;&amp; <span class="local-variable">$hour</span> &lt; <span class="integer">12</span>) {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">おはよう</span><span class="delimiter">"</span></span>;
        }
        <span class="keyword">elseif</span> (<span class="integer">12</span> &lt;= <span class="local-variable">$hour</span> &amp;&amp; <span class="local-variable">$hour</span> &lt; <span class="integer">18</span>) {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">こんにちは</span><span class="delimiter">"</span></span>;
        }
        <span class="keyword">else</span> {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">こんばんは</span><span class="delimiter">"</span></span>;
        }

        <span class="keyword">return</span> <span class="local-variable">$result</span>;
    }
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">index.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;label&gt;</span>名前: <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">target_name</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span><span class="tag">&lt;/label&gt;</span>
            <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">送信</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
        <span class="tag">&lt;p&gt;</span>今は<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$now_hour</span>; <span class="inline-delimiter">?&gt;</span>時です。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> greeting(<span class="local-variable">$now_hour</span>); <span class="inline-delimiter">?&gt;</span>、太郎さん<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>この入力フォームでは、名前を入力し、送信します。送信先ファイルは <code>form</code> タグの <code>action</code> 属性で指定します。<code>action="index.php"</code>となっているので、フォームは <code>index.php</code> 、つまり自分自身、にリクエストが送信されることになります。したがって、index.phpの中に「送信されたフォームデータの処理」も記述する必要があります。</p>

<p>また、HTTPリクエストの POST を使って送信することを指定しているのが、<code>form</code> タグの <code>method="POST"</code> です。<code>method="GET"</code> と記述した場合、送信手段が GET になります。</p>

<p>さらに、<code>&lt;input type="text"&gt;</code> のタグに指定した <code>name="target_name"</code> の <code>name</code> は、name属性 と呼ばれるもので，フォームなどの要素（部品）に名前をつけるための属性です。これを追記することで、formタグから送信されてきた値をPHPの処理側で受け取る時に「どの値が何の入力ボックスの値か」を特定することができるようになります。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">フォーム要素名</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>「フォーム要素名」は好きな名前でも構いませんが、入力内容がわかりやすいものが良いでしょう。たとえば、emailアドレスのためのフォームを作成したいならば、以下のようなパターンが考えられます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

もしくは

<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">mail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

など
</pre></div>
</div>
</div>

<p>今回は、入力者の名前を入力してもらうテキストボックスということで <code>target_name</code> という名前をつけています。</p>

<p>さらに補足すると、<code>required</code> という属性も追記しています。これは必須入力であることを設定するためのものです。<code>target_name</code> が未入力のままで「送信」ボタンを押しても画面遷移されません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">index.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;label&gt;</span>名前: <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">target_name</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span><span class="tag">&lt;/label&gt;</span>
            <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">送信</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
</pre></div>
</div>
</div>

<h5>実行確認</h5>

<p>現状は、フォームから <code>target_name</code>を送信しても、それを処理する記述を入れていないので、送信されたデータ(<code>target_name</code>)は無視され、何も起こりません。確認してみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 POSTで受け取ったデータを処理
</h3><p>それでは、POSTメソッドで送信されてくる <code>target_name</code> を処理するPHPプログラムを書きましょう。と言っても、ここでは受け取ったデータを表示するだけなので、それほど難しいものではありません。今まで <code>太郎</code> と表示していたところを、<code>&lt;?php print ?&gt;</code> を使い、POSTメソッドで受け取った <code>target_name</code> を表示するようにしています。</p>

<p><em>index.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    date_default_timezone_set(<span class="string"><span class="delimiter">'</span><span class="content">Asia/Tokyo</span><span class="delimiter">'</span></span>);
    <span class="local-variable">$now_hour</span> =  (<span class="predefined-type">int</span>)<span class="predefined">date</span>(<span class="string"><span class="delimiter">"</span><span class="content">G</span><span class="delimiter">"</span></span>);
    
    <span class="local-variable">$name</span> = <span class="string"><span class="delimiter">"</span><span class="content">名無し</span><span class="delimiter">"</span></span>;
    <span class="keyword">if</span> (<span class="predefined">array_key_exists</span>(<span class="string"><span class="delimiter">'</span><span class="content">target_name</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>)) {
        <span class="local-variable">$name</span> = <span class="predefined">$_POST</span>[<span class="string"><span class="delimiter">'</span><span class="content">target_name</span><span class="delimiter">'</span></span>];
    }

    <span class="keyword">function</span> <span class="function">greeting</span>(<span class="local-variable">$hour</span>) {
        <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span>;

        <span class="keyword">if</span> (<span class="integer">6</span> &lt;= <span class="local-variable">$hour</span> &amp;&amp; <span class="local-variable">$hour</span> &lt; <span class="integer">12</span>) {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">おはよう</span><span class="delimiter">"</span></span>;
        }
        <span class="keyword">elseif</span> (<span class="integer">12</span> &lt;= <span class="local-variable">$hour</span> &amp;&amp; <span class="local-variable">$hour</span> &lt; <span class="integer">18</span>) {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">こんにちは</span><span class="delimiter">"</span></span>;
        }
        <span class="keyword">else</span> {
            <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">"</span><span class="content">こんばんは</span><span class="delimiter">"</span></span>;
        }

        <span class="keyword">return</span> <span class="local-variable">$result</span>;
    }
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>タイトル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">index.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;label&gt;</span>名前: <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">target_name</span><span class="delimiter">"</span></span> <span class="attribute-name">required</span><span class="tag">&gt;</span><span class="tag">&lt;/label&gt;</span>
            <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">送信</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
        <span class="tag">&lt;p&gt;</span>今は<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$now_hour</span>; <span class="inline-delimiter">?&gt;</span>時です。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> greeting(<span class="local-variable">$now_hour</span>); <span class="inline-delimiter">?&gt;</span>、<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$name</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span>さん<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>HTTPリクエストのPOSTメソッドで送ったデータはPHPの<code>$_POST</code>に格納されます。<code>$_POST</code> はPHPで事前に定義されている <strong>スーパーグローバル変数</strong> の1つです。同じくGETメソッドで送ったデータが格納される <code>$_GET</code> もあります。ユーザからのアクションは全てHTTPリクエストのGETや、POSTとしてWebサーバまで送信されます。Webサーバはそのリクエストをもとにレスポンスを返しますが、そのときにユーザからのデータは<code> $_GET</code> や <code>$_POST</code> に入っているからPHPで処理できるということです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/php/6-6.png" alt=""></p>

<p>ここでは、GETの場合とPOSTの場合で処理を分けています。</p>

<p><em>抜粋ですので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="local-variable">$name</span> = <span class="string"><span class="delimiter">"</span><span class="content">名無し</span><span class="delimiter">"</span></span>;
    <span class="keyword">if</span> (<span class="predefined">array_key_exists</span>(<span class="string"><span class="delimiter">'</span><span class="content">target_name</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>)) {
        <span class="local-variable">$name</span> = <span class="predefined">$_POST</span>[<span class="string"><span class="delimiter">'</span><span class="content">target_name</span><span class="delimiter">'</span></span>];
    }
</pre></div>
</div>
</div>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> greeting(<span class="local-variable">$now_hour</span>); <span class="inline-delimiter">?&gt;</span>、<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$name</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span>さん<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>HTML部分では <code>$name</code> の中身を表示するようにしました。GET通信の場合 <code>$_POST</code> の中身は何もないはずなので <code>array_key_exists('target_name', $_POST)</code> (<code>$_POST</code> に <code>target_name</code> の要素があるか) という条件式で通信手段を判定しています。GETなら名前は「名無し」と表示し、POSTなら <code>target_name</code> のテキストボックスに入力してもらった名前を表示します。</p>

<h5>実行確認</h5>

<p>これで、入力フォームの名前を入力し、送信してみましょう。下記は入力フォームの名前に<code>スズキイチロウ</code>と入力して送信したときの場合です。時刻が14時台のときに確認しています。</p>

<pre><code>今は14時です。

こんにちは、スズキイチロウさん
</code></pre>

<h4>htmlspecialchars()</h4>

<p>ここで、表示部分に注目してください。</p>

<p><em>抜粋ですので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> greeting(<span class="local-variable">$now_hour</span>); <span class="inline-delimiter">?&gt;</span>、<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$name</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span>さん<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p><code>$name</code> に <code>htmlspecialchars()</code> を適用しています。仮に <code>taget_name</code> のテキストボックスにHTMLタグが入力された場合、それをそのまま表示すると <strong>ブラウザがHTMLタグの一種だと認識・解釈してしまい、表示内容に反映されてしまう</strong> という事態が発生します。たとえば <code>target_name</code> に <code>&lt;p style="color: red;"&gt;名無し&lt;/p&gt;</code> と入力し、<code>htmlspecialchars()</code> を使う場合と、以下のように</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;p&gt;</span><span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> greeting(<span class="local-variable">$now_hour</span>); <span class="inline-delimiter">?&gt;</span>、<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="local-variable">$name</span>; <span class="inline-delimiter">?&gt;</span>さん<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p><code>htmlspecialchars()</code> を使わずに <code>$name</code> をそのまま表示する場合とに書き換えながら、実行確認してみてください。後者の場合、「名無し」の文字が赤くなって表示されてしまいますが、前者の場合は、タグが解釈されずに入力された文字列のまま表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/no_use_hsc.png" alt=""></p>

<p><em>htmlspecialchars() を使わなかった場合</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/use_hsc.png" alt=""></p>

<p><em>htmlspecialchars() を使った場合</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 フォームの処理のまとめ
</h3><p>ここではPOSTメソッドでのフォーム送信と、それを受け取る側の処理を学びました。POSTメソッドを使えば、ユーザからHTMLのform要素（入力フォーム）を通して、データを受け取ることができました（今回は<code>target_name</code>を受け取った）。そして、受け取ったデータは<code>$_POST</code>という変数に自動的に格納されます。<code>$_POST</code>は配列なので、格納されたデータは<code>$_POST['target_name']</code>と書くことで取りだすことができます。ここの<code>target_name</code>は、入力フォームで<code>&lt;input type="text" name="target_name"&gt;</code>としたときの<code>name="target_name"</code>と同じになります。</p>

<p>重要なのは、ユーザ側がWebサーバに対してデータの送信が可能になった点です。Webサーバから一方的に情報を受け取るだけだったユーザが、ようやくWebサイトを操作することができるようになりました。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-php-4">課題：お問い合わせページの作成 Part2</h3><p><strong>この課題はBootstrapのレッスンで作成した <em>contact.html</em> と <em>complete.html</em> を、それぞれ <em>contact.php</em>, <em>complete.php</em> という名前に複製してワークスペース直下に置いてください。何らかの理由で捨ててしまった方はメンターに相談してください。</strong></p>

<p><em>contact</em> の「メールにあるお問い合わせ」フォームから送信された内容を <em>complete</em> で受け取って「送信内容」として表示してください。</p>

<p>以下の部分を変更する必要があります。</p>

<h4>変更点</h4>

<h5>contact.php</h5>

<ul>
  <li><code>form</code> の送信先を <code>complete.php</code> に変更してください</li>
  <li><code>form</code> の送信手段を <code>POST</code> にしてください</li>
  <li>5つの入力項目 (<code>input</code>, <code>textarea</code>) すべてに <code>required</code> 属性を追加してください。これは、必須入力であることを設定するためのものです。</li>
</ul>

<h5>complete.php</h5>

<ul>
  <li>送信内容の表示部分をどうするかは自由です（簡単な表示方法で構いません。下にある一例では <code>table</code> タグを利用しています）</li>
  <li>5つの項目すべて表示するようにしてください</li>
  <li>HTMLタグが入力される可能性を考慮して、画面に表示するようにしてください</li>
  <li>complete.phpにGETアクセスされた場合は空っぽの文字を表示するような工夫をしてください（POSTの内容を直接表示しないこと）</li>
  <li>テキストエリアで入力された改行を画面に表示する際は <code>nl2br(文字列)</code> 関数を使ってください（<a href="http://php.net/manual/ja/function.nl2br.php" target="_blank">参考：nl2br()</a>）</li>
  <li>戻るボタンをクリックしたら contact.php へ遷移するように変更してください</li>
</ul>

<h4>表示結果の例（complete.php）</h4>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/kadai_complete_pc.png" alt=""></p>

<p><em>PC画面</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/kadai_complete_sp.png" alt=""></p>

<p><em>スマホ画面</em></p>
</div></section><section id="chapter-5"><h2 class="index">5. まとめ
</h2><div class="subsection"><p>PHPの文法に関するレッスンは以上です。プログラミングと聞いていたのに拍子抜けした方もいらっしゃるかも知れませんが、Web制作のプログラミングの基本（あくまで基本）は、こんなところです。</p>

<p>序盤は、PHPファイルをターミナルの<code>php</code>コマンドによって実行してきました。ここでは、PHPプログラムの結果はターミナルに表示されていました。しかしターミナル上で表示させるだけでは、Webアプリケーションとして成立していません。そこで後半では、Webサーバを起動して、Webサーバ上でPHPを動作させました。これでユーザに、Webサーバを通してPHPプログラムの結果（PHPによりコンテンツが埋め込まれたHTML）を見てもらうことができます。</p>

<p>ここまでで、プログラムの制御の主役である条件分岐(<code>if</code>)と繰り返し(<code>while</code>)について理解できたでしょうか？また、<code>$_POST</code>という変数によるデータ通信のやり取りも理解できたでしょうか？もしわからないことがあれば、メンターに質問して解決しておきましょう。</p>

<p>しかし、もどかしいのはPHPだけではデータを保存できないことです。データを保存するには、データベースを利用するのが普通です。次のレッスンからは、Webでデータを保存するために使う「データベース」を学びます。</p>

<div class="alert alert-warning">
ワークスペース直下に <strong>php-4</strong>のような名前のフォルダを作成し、このレッスンで作成したPHPファイルを全て php-4 フォルダ内に移動しておきましょう。
</div>
</div></section><section id="chapter-6"><h2 class="index">6. （参考）公式マニュアル
</h2><div class="subsection"><p>PHP の公式マニュアルは日本語化されており、とても読みやすいです。</p>

<ul>
  <li><a href="http://php.net/manual/ja/index.php" target="_blank">PHP マニュアル</a></li>
</ul>

<p>本レッスンで解説したものは公式マニュアルにも記載されています。PHP で疑問に思ったことは真っ先に公式マニュアルを参照すべきです。例えば、本レッスンの後半で行ったオブジェクトに関する解説は、公式マニュアルの下記のページで一覧となっています。</p>

<ul>
  <li><a href="http://php.net/manual/ja/language.oop5.php" target="_blank">クラスとオブジェクト</a></li>
</ul>

<p>もし、このレッスンだけで疑問が解決しない場合、メンターに聞いても良いですが、公式マニュアルを読む練習をしておくと、自分で調査できるようになります。Google で検索するのも悪くありません。</p>

<p>なお、本カリキュラムのPHPレッスンで解説したものは、公式マニュアルの言語リファレンスの項目に全て掲載されています。</p>

<ul>
  <li><a href="http://php.net/manual/ja/langref.php" target="_blank">言語リファレンス</a></li>
</ul>
</div></section></div>
</body>
</html>