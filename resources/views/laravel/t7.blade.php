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
<div class="markdown"><div class="lesson-num p">Lesson7</div><h1 id="php-3">PHP その3
</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</h2><div class="subsection"><p>PHP はクラスベースのオブジェクト指向プログラミング言語です。ここではオブジェクトについて学んでいきます。本コースで学ぶ Laravel もオブジェクトを積極的に用いたフレームワークです。ここでオブジェクトについての理解を深めておくと、 Laravel を使うときに理解がスムーズになるでしょう。</p>

<p>ただし、オブジェクト指向はこれまでよりも難しい概念です。いまいちわからない場合でも次に進むことをお勧めします。とにかく多くの事例に触れなければ、理解を深めるのは難しいです。Laravel を使い始めてから改めてここを読んでみるのも良いでしょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. オブジェクトとは
</h2><div class="subsection"><p>オブジェクトとは、簡単に言うと、<strong>関連する変数（値）と関数（動作）をまとめて、そのまとまりに名前を付けたもの</strong>です。これまで、変数と関数は別々に宣言され管理されてきましたが、関連する変数や関数は1つのオブジェクト内で宣言してまとめてしまうことで、管理しやすくするのがオブジェクト指向です。ソースコードの見やすさや複数のソースコードファイルがあるときの管理のしやすさを考えると、関係のある変数や関数はまとめておく方が好ましく、それを実現できる仕組みとしてオブジェクトが用意されています。</p>

<p>ゲームの RPG をイメージしてください。たとえば敵キャラ。ここではスライムという種類の敵キャラで考えます。スライムには、ヒットポイント( <code>hp</code> )やマジックポイント( <code>mp</code> )などの属性情報（変数）があり、攻撃( <code>attack()</code> )や防御( <code>defend()</code> )、魔法( <code>magic()</code> )などの振る舞い（関数）があります。全てスライムに関係するものですが、これらを別々に実装してしまうのは関連性がわかりにくく、管理がしづらいです。そこで、スライムに関係する値や動作をまとめあげ、スライムをオブジェクトとして作成すれば管理がしやすくなります。</p>

<p>また、オブジェクト(object)は、日本語に訳すと、物体です。先ほどの RPG のスライムの場合で考えると、 <code>hp</code> や <code>mp</code> 、そして <code>attack()</code>, <code>defend()</code>, <code>magic()</code> などを別々に宣言・管理せず、まとめて <code>Slime</code> （スライム）という物体の中にまとめてしまおう、というのがオブジェクト指向なのです。</p>

<p>なお、クラスに含める変数のことは <strong>プロパティ</strong> 、クラスに含める関数のことは <strong>メソッド</strong> とも言います。</p>
</div></section><section id="chapter-3"><h2 class="index">3. オブジェクト指向プログラミングとは
</h2><div class="subsection"><p>オブジェクト指向プログラミングとは、積極的にオブジェクトという概念を導入したプログラミング手法ということになります。オブジェクト指向プログラミングができるプログラミング言語をオブジェクト指向プログラミング言語といいます。</p>

<p>多くのプログラミング言語がオブジェクト指向を採用しています。PHP をはじめ、 Java, Ruby, C++, C#, Swift といったプログラミング言語は全てオブジェクト指向プログラミング言語です。更に言うと、クラスベースのオブジェクト指向プログラミング言語でもあります。</p>
</div></section><section id="chapter-4"><h2 class="index">4. クラスとインスタンスとは
</h2><div class="subsection"><p>「クラスベース」という言葉を書きましたが、難しい話ではありません。PHPのようなクラスベースのオブジェクト指向では、オブジェクトには <strong>クラス</strong> と <strong>インスタンス</strong> という2つの側面があります。</p>

<p>クラスとは、オブジェクトの <strong>金型（設計図）</strong> です。オブジェクトを作るには、まずクラスを宣言する必要があります。どんな変数や関数を置くのかを決め、クラスの内部で宣言します。全ての「関連する変数・関数」は、この時点で決定します。例えば、 <code>Slime（スライム）</code> クラスなるものを作るとすると、そのクラス内部に <code>$hp;</code> や <code>function attack() {...}</code> を宣言します。</p>

<p>インスタンスは、オブジェクトの <strong>実物（実体）</strong> で、クラス（設計図）から生成されます。設計図だけあっても、設計図を基に作られた実物がなければ、関数などを利用することができません。<code>Slime</code> クラスを作ったら、実際に出現させたい敵キャラの個体（インスタンス）である <code>スライムA</code> や <code>スライムB</code> を生成します。なお、外部のサイトや書籍、本カリキュラムの以降の文章で「オブジェクト」という言葉が「インスタンス」を指している場合があります。</p>

<p>関数のところで宣言と呼び出しという言葉を説明しましたが、クラスとインスタンスは「宣言と呼び出し」に似た対応関係があります。以降で実例コードを見てみましょう。実例を見たあとに再度、上記の解説を読んでいただければ、理解が深まると思います。</p>

<div class="alert alert-info">
オブジェクト指向プログラミングには、クラスベースの他に「プロトタイプベース」が存在します。JavaScriptなどがプロトタイプベースです。プロトタイプは「原型（見本）」という意味で、プロトタイプベースのオブジェクト指向プログラミング言語では設計図が存在しない代わりに「見本となるオブジェクト」が用意されています。プロトタイプベースの言語を使う場合、プログラマは「見本オブジェクトを複製してインスタンスを生成する」という流れでコードを記述していきます。
</div>
</div></section><section id="chapter-5"><h2 class="index">5. クラスとインスタンスの基本
</h2><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 クラスを宣言する
</h3><p>クラスの宣言部分には最初に <code>class クラス名 {...}</code> と書きます。これが設計図の紙だと思ってください。以下のサンプルでは、まだ説明していない <code>$this-&gt;</code>, <code>public</code> などの新しいキーワードが出てきますが、後ほど解説しますので、今は無視してください。</p>

<p>また、クラス宣言の内部では、上方に変数、下方に関数を宣言するのが慣例です。</p>

<p><em>クラスの宣言方法（まだ何のPHPファイルにも書かないでください）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">Slime</span> {
    <span class="comment">// オブジェクトの変数（値）</span>
    <span class="keyword">public</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">10</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">3</span>;

    <span class="comment">// オブジェクトの関数（処理）</span>
    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character_name</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;type . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>クラスを宣言している段階のコードを保存し、実行しても、何も処理されません。あくまで設計図としてクラスを宣言しているだけです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 クラスからインスタンスを生成する
</h3><p>クラスからインスタンスを生成するとき、 <code>new クラス名()</code> という命令でインスタンスを生成できます。生成されたインスタンスは、変数に代入しておくことが可能です。このとき、インスタンスが入っている変数のデータ型は「オブジェクト型」であると言えます。</p>

<p><em>インスタンスの生成と、使用法（一例なのでPHPファイルに書かないでください）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// インスタンスの生成と、変数への代入</span>
<span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();
<span class="local-variable">$slime_B</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();
<span class="local-variable">$slime_C</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();

<span class="comment">// インスタンスの使用</span>
<span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_B</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_C</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>クラスという設計図があるので、その設計図から何個でもインスタンスを生成することができます。設計士によってクラスという設計図が作成され、その設計図に沿って工場でインスタンス（実体）が大量生産されるイメージです。</p>

<p>また、インスタンスを生成すると、インスタンスを使って処理が実行できます。ここでは、<code>スライムA, B, C</code> が <code>'主人公'</code> に向かって <code>attack()</code> する処理を記述しています。</p>

<p>オブジェクトを使ったコードは、読みやすいと思えるはずです。<code>$slime_A = new Slime();</code> では、スライム（のインスタンス）が生成されているのが直感的にもわかりやすく、 <code>$slime_A-&gt;attack('主人公');</code> もスライムAが主人公を攻撃しているというのがソースコードから伝わってきます。これは変数や関数を「オブジェクト」という意味的に関連する1つの物体としてまとめあげ、名前を付けたことによります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/object.png" alt=""></p>

<p>一度、コードを書いて実行してみましょう。</p>

<p><em>test_class.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">Slime</span> {
    <span class="keyword">public</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">10</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">3</span>;

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character_name</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;type . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();

<span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);

<span class="predefined">print_r</span>(<span class="local-variable">$slime_A</span>);
</pre></div>
</div>
</div>

<pre><code>$ php test_class.php
</code></pre>

<p><em>実行結果</em></p>

<pre><code>スライムが主人公を攻撃して3ポイントのダメージを与えた！
Slime Object
(
    [type] =&gt; スライム
    [hp] =&gt; 10
    [power] =&gt; 3
)
</code></pre>

<p><code>スライムが主人公を攻撃して3ポイントのダメージを与えた！</code> は、 <code>$slime_A-&gt;attack('主人公');</code> による表示で、 <code>Slime Object (...)</code> は <code>print_r($slime_A);</code> による表示です。オブジェクト型も単純な <code>print</code> ではうまく表示されないので、 <code>print_r($object)</code> で表示させています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 サンプルコードの補足
</h3><p>ここで、いくつかの新しい記述について解説していきます。</p>

<h4>アロー演算子</h4>

<p><code>$slime_A-&gt;attack('主人公');</code> で、 <code>-&gt;</code> という演算子が出てきています。 この <code>-&gt;</code> は、アロー演算子と言います。アロー演算子とはnewされたクラスインスタンス内であらかじめ定義された変数や関数を呼び出すための演算子です。基本的には左側にクラスのインスタンス本体を記述して、アロー演算子で繋ぐ形で、右側にメソッドや変数を記述して使用します。日本語でいう、助詞の「の」だと思ってください。</p>

<p><em>アロー演算子の使用例1（PHPファイルに書かなくて良いです）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();

<span class="comment">// アロー演算子でメソッドを呼び出す場合</span>
<span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<pre><code>実行結果&gt;スライムが主人公を攻撃して3ポイントのダメージを与えた！
</code></pre>

<p><em>アロー演算子の使用例2（PHPファイルに書かなくて良いです）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// アロー演算子でプロパティを呼び出す場合</span>
<span class="predefined">print</span> <span class="local-variable">$slime_A</span>-&gt;type;
</pre></div>
</div>
</div>

<pre><code>実行結果&gt;スライム
</code></pre>

<p>プロパティを参照する場合、アロー演算子 <code>-&gt;</code> の後に <code>$</code> は不要です。</p>

<h4>PHP プログラムのみであれば <code>?&gt;</code> 不要</h4>

<p>おさらいになります。</p>

<p>今まで PHP プログラムは <code>&lt;?php</code> から始まり、 <code>?&gt;</code> で終了すると学びましたが、実は <strong>PHP ファイルの中身が PHP プログラムのみだった場合</strong> には、 <code>?&gt;</code> は必要ありません。というより、 <strong>入れるべきではありません</strong>。入れるべきでないのに、今まで <code>?&gt;</code> を入れてきたのは初めにいきなり言われても混乱すると思ったからです。</p>

<p>注意してほしいのは、 PHP ファイル内部に HTML が入るような場合には、 <code>?&gt;</code> で閉じるようにしてください。</p>

<h4>public</h4>

<p>変数の前にある <code>public</code> はアクセス権を表します。</p>

<p><code>public</code> が付いている変数は、誰でもアクセス可能（変数の値を取得したり、変更したりが可能）になります。</p>

<p>詳しくは後ほど解説します。</p>

<h4><code>$this</code> とは何か</h4>

<p><code>$this</code> は何を指しているのでしょうか。</p>

<p>下記コードの <code>function attack()</code> 内部で <code>$this-&gt;type</code> や <code>$this-&gt;power</code> がありますが、これはクラス内部の変数である <code>public $type = 'スライム';</code> や、 <code>public $power = 3;</code> を指し示しているように見えます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character_name</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;type . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
</pre></div>
</div>
</div>

<p>しかし、上記を把握しただけでは、表面的な理解でしかないので、もう少し踏み込んでみます。</p>

<p>下記のように、 <code>$slime_A</code> （インスタンス）から <code>attack('主人公')</code> （関数）が呼び出されています。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>このとき、<code>$this-&gt;</code> を <code>$slime_A-&gt;</code> に置き換えます。つまり、<code>$slime_A-&gt;attack()</code> と書くと、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;type . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<p>この <code>$this-&gt;</code> が <code>$slime_A-&gt;</code> に置き換わり、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">print</span> <span class="local-variable">$slime_A</span>-&gt;type . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$slime_A</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<p>このようになるわけです。そのため、 <code>$this</code> は <strong>変数や関数を呼び出されたインスタンス自身 (<code>$slime_A</code> 等) を指す</strong> という方が、より正しい理解となります。</p>

<p>上記の説明は、インスタンスを複数生成したときの理解にも繋がります。先に紹介したサンプルコードを再度確認してください。</p>

<p><em>インスタンスの生成と、使用法（一例なのでPHPファイルに書かないでください）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();
<span class="local-variable">$slime_B</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();
<span class="local-variable">$slime_C</span> = <span class="keyword">new</span> <span class="constant">Slime</span>();

<span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_B</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_C</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>このとき、 <code>$slime_A</code>, <code>$slime_B</code>, <code>$slime_C</code> は、同じく <code>class Slime</code> の設計図から生成されていますが、それぞれのインスタンスは独立した存在になり、 <code>$slime_A</code>, <code>$slime_B</code>, <code>$slime_C</code> は干渉しません。つまり、インスタンスのそれぞれが変数である <code>$type</code>, <code>$hp</code> を持っており、 <code>function attack()</code> を持っているという意味です（このように、他のインスタンスから独立している変数を <strong>インスタンス変数</strong>、同じく独立している関数を <strong>インスタンスメソッド</strong> といいます）。</p>

<p>そのため、 <code>$slime_A-&gt;hp = 100000;</code> としたとしても、 <code>$slime_B-&gt;hp</code> は相変わらず初期状態の <code>10</code> です。車の設計図（クラス）と、実際に工場で組み上げられた車（インスタンス）を例に考えると、工場で組み上げられた個体としての車を傷つけたとしても、その他の車には影響が無いのと同じです（ただし、車の設計図の中で傷をつける設計をすると、全てに傷が付きます）。</p>

<p>関数の場合も同様です。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_B</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><code>$this-&gt;</code> を <code>$slime_A-&gt;</code> に置き換えるという説明をしました。 同様に <code>$slime_B</code> から呼び出した場合は <code>$this-&gt;</code> を <code>$slime_B-&gt;</code> に置き換えます。そして、 <code>attack()</code> の <code>print</code> 文にある変数 <code>$this-&gt;type</code>, <code>$character_name</code>, <code>$this-&gt;power</code> の中で、<code>$character_name</code> は引数によって変化しますが、 <code>$this-&gt;type</code>, <code>$this-&gt;power</code> は呼び出したインスタンスによって変化します。</p>

<p><code>$this</code> の解説は以上です。 <code>$this</code> は今後も頻繁に出現しますので、理解しておきましょう。</p>
</div></section><section id="chapter-6"><h2 class="index">6. コンストラクタ
</h2><div class="subsection"><p>インスタンスを生成するとき (new) 、コンストラクタが実行されます。コンストラクタとは、インスタンスを初期化する関数のことで、平たく言うと、クラスをインスタンス化(new)したタイミングと同時に実行される特別なメソッドのことです。</p>

<p>コンストラクタの使い道は、通常は、クラスのプロパティの初期値をセットするなどの用途に使います。 今回は <code>Slime</code> クラスをインタンス化したタイミングで <code>$suffix</code> という変数に初期値をセットしています。 詳細はのちほど説明します。</p>

<p>コンストラクタは <code>function __construct() {...}</code> として実装されます（アンダーバーは2個です）。コンストラクタも他の関数と同じく <code>function __construct($a)</code> と括弧内に変数を書けば、引数を持つことができます。</p>

<p><em>test_class.php</em> を以下のように上書きし、実行確認してみてください。</p>

<p><em>test_class.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">Slime</span> {
    <span class="keyword">public</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;

    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">10</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">3</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$suffix</span>) {
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>-&gt;type . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character_name</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);

<span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<pre><code>$ php test_class.php
</code></pre>

<pre><code>スライムAが主人公を攻撃して3ポイントのダメージを与えた！
</code></pre>

<h4>__construct()</h4>

<p><code>$slime_A = new Slime('A');</code> としたとき、 <code>'A'</code> は <code>__construct($suffix)</code> の <code>$suffix</code> に代入され、 <code>$this-&gt;suffix = $suffix;</code> の処理で <code>public $suffix</code> は <code>''</code> （空っぽの文字列）から <code>'A'</code> に上書きされます。</p>

<p>そのため、実行すると、 <code>スライム</code> という文字列の後に <code>$suffix</code> に代入した <code>A</code> という文字列が入ることになります。これにより、たとえば、</p>

<p><em>一例ですのでPHPファイルに書かなくて良いです</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_B</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="string"><span class="delimiter">'</span><span class="content">B</span><span class="delimiter">'</span></span>);
<span class="local-variable">$slime_C</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="string"><span class="delimiter">'</span><span class="content">C</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p>このようなコードを記述することで <code>$slime_A</code> の <code>$suffix</code> には <code>'A'</code> が入るように <code>$slime_B</code> の <code>$suffix</code> には <code>'B'</code>、<code>$slime_C</code> の <code>$suffix</code> には <code>'C'</code> が入ります。<code>name()</code> を使うことで、名前の上でも <code>スライムA</code>, <code>スライムB</code>, <code>スライムC</code> と区別することが可能です。</p>

<h4><code>$this</code> の挙動の確認</h4>

<p><code>$slime_A-&gt;attack('主人公');</code> としたときの処理の流れを追ってみます。</p>

<p><code>function attack()</code> の内部は、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<p>このようになっていて、 <code>$this-&gt;</code> が付くのは、 <code>$this-&gt;name()</code> と <code>$this-&gt;power</code> です。</p>

<p>まず <code>$this-&gt;name()</code> は、その関数の定義から <code>$this-&gt;type . $this-&gt;suffix</code> に置き換わることがわかります。<code>$this-&gt;type</code> は <code>$slime_A-&gt;type</code>、<code>$this-&gt;suffix</code> は <code>$slime_A-&gt;suffix</code> となりますので、2つに値を当てはめると <code>スライムA</code> になります。ここまでで、</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">スライムA</span><span class="delimiter">'</span></span> . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<p>となっています。</p>

<p>次に <code>$character_name</code> は呼び出し時の引数である <code>'主人公'</code> です。 さらに、<code>$this-&gt;power</code> は <code>$slime_A-&gt;power</code> となるので <code>3</code> が代入されます。ここまで来て、</p>

<pre><code>スライムAが主人公を攻撃して3ポイントのダメージを与えた！
</code></pre>

<p>という表示結果が得られます。</p>
</div></section><section id="chapter-7"><h2 class="index">7. static
</h2><div class="subsection"><p>インスタンス変数のうち、 <code>$type</code> (種類) は、よく考えると、インスタンスではなくクラス（設計図側）と関係していると言えます。クラス名(<code>class Slime</code>, <code>class Hero</code>)が種類(<code>$type</code>)そのものだからです。</p>

<p><code>static</code> キーワードを使用して、インスタンス（個々の実体）ではなく、クラス（全体の設計図）側にプロパティやメソッドを持たせることができます。クラス側に持たせた変数を <strong>クラス変数</strong>、同じく関数を <strong>クラスメソッド</strong> といいます。</p>

<h4>static　とは</h4>

<p><code>static</code> を使ってクラス変数もしくはクラスメソッドを宣言することで、 クラスが持つそれらをインスタンスを作らなくてもアクセスすることができます。クラス変数およびクラスメソッドに関して、下記の注意点があります。</p>

<ul>
  <li>static なメソッドは、オブジェクトのインスタンス生成が不要で、クラス名から呼び出すことができます。</li>
  <li>static な変数は、オブジェクトから アロー演算子 <code>-&gt;</code> を使ってのアクセスができません（以下に述べる方法でアクセスする必要があります）。</li>
  <li>static でないメソッドを static をつけたものと同じ方法で呼び出すとエラーが発生します。</li>
</ul>

<p>詳細は　PHPドキュメントの static キーワード　の　 <a href="http://php.net/manual/ja/language.oop5.static.php" target="_blank">こちら</a>　を参照してください。</p>

<h4>クラス変数やクラスメソッドの呼び出しはスコープ定義演算子 (<code>::</code>) を使う</h4>

<p>クラス変数やクラスメソッドには、アロー演算子 <code>-&gt;</code> や <code>$this</code> が使えません。これらを呼び出すには、<code>-&gt;</code> の代わりに <strong>スコープ定義演算子( <code>::</code> )（コロンが2個です）</strong> 、<code>$this</code> の代わりに <strong><code>self</code></strong> を使います。</p>

<p><code>Slime</code> クラスにクラス変数とクラスメソッドを用意しましょう。</p>

<p><em>test_class.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">Slime</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;

    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">10</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">3</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$suffix</span>) {
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>::<span class="local-variable">$type</span> . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character_name</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character_name</span> . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }

    <span class="comment">// クラスメソッド</span>
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、最弱のモンスターだ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="constant">Slime</span>::description();

<span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);

<span class="local-variable">$slime_A</span>-&gt;attack(<span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<pre><code>$ php test_class.php
</code></pre>

<p><em>実行結果</em></p>

<pre><code>スライムは、最弱のモンスターだ！
スライムAが主人公を攻撃して3ポイントのダメージを与えた！
</code></pre>

<p><code>description()</code> という名前のクラスメソッドを用意しました。そのクラスの説明をするための関数です。<code>Slime::description();</code> と書いて呼び出しています。このようにstaticをつけた変数や関数は <code>クラス名::○○</code> と書くことで呼び出せます。変数を参照したい場合はスコープ定義演算子のすぐ後ろに <code>$</code> を入れてください。インスタンス変数の場合とは異なりますので注意しましょう。</p>

<p>また、<code>description()</code> の定義内容を見るとわかるように、そのメソッドが定義されているクラス内にあるクラス変数やクラスメソッドを使いたいときは <code>self::○○</code> と書きます。<code>$this-&gt;</code> ではなく <code>self::</code> です。もしくは、<code>name()</code> のように、インスタンス経由で（そのインスタンス自身が持つクラス変数やクラスメソッドを）参照する形にするなら <code>$this::○○</code> と書きます。覚えておいてください。</p>

<p>なお、スコープ定義演算子 (<code>::</code>) について少し難しい補足をしますが、これは「::の右側にあるメソッドやプロパティが、::の左側のスコープに属すると決定する演算子」です。以下のような使い方ができます。</p>

<ul>
  <li><code>クラス名::○○</code>　static宣言されたメソッドやプロパティへアクセスする</li>
  <li><code>self::○○</code>　自クラスのクラス変数、及びクラスメソッドへアクセスする</li>
  <li><code>parent::</code>　指定した親クラスを示す（親クラスについては後述）</li>
  <li><code>インスタンス変数::○○</code> ( <code>self::○○</code> )　インスタンスが持つクラス変数やクラスメソッドへアクセスする</li>
</ul>
</div></section><section id="chapter-8"><h2 class="index">8. 継承
</h2><div class="subsection"><p>オブジェクト指向プログラミングは「継承」「多態性（ポリモーフィズム）」「カプセル化」という3つの特徴を持っています。それらについて見ていきます。</p>

<p>まずは <strong>継承</strong>。クラスの継承は、クラスの再利用性を上げるために、とても有効です。</p>

<p>下記のように、 A, B のクラスを作成したときに重複している箇所があるのがわかります。 <code>public $x</code> と <code>function y()</code> です。</p>

<p><strong>一例ですのでPHPファイルに書かなくて良いです</strong></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">A</span> {
    <span class="keyword">public</span> <span class="local-variable">$x</span>;
    <span class="keyword">public</span> <span class="local-variable">$x_a</span>;

    <span class="keyword">function</span> <span class="function">y</span>() {
        <span class="comment">// ...</span>
    }
    <span class="keyword">function</span> <span class="function">y_a</span>() {
        <span class="comment">// ...</span>
    }
}

<span class="keyword">class</span> <span class="class">B</span> {
    <span class="keyword">public</span> <span class="local-variable">$x</span>;
    <span class="keyword">public</span> <span class="local-variable">$x_b</span>;

    <span class="keyword">function</span> <span class="function">y</span>() {
        <span class="comment">// ...</span>
    }
    <span class="keyword">function</span> <span class="function">y_b</span>() {
        <span class="comment">// ...</span>
    }
}
</pre></div>
</div>
</div>

<p>重複している <code>$x</code> と <code>y()</code> を1つのクラスに抽出してみます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">C</span> {
    <span class="keyword">public</span> <span class="local-variable">$x</span>;

    <span class="keyword">function</span> <span class="function">y</span>() {
        <span class="comment">// ...</span>
    }
}
</pre></div>
</div>
</div>

<p>このクラス C を<strong>継承</strong> (<code>extends</code>) することで、最初と全く同じ機能を持ったクラス A, B を作成することができます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">A</span> <span class="keyword">extends</span> <span class="constant">C</span> {
    <span class="keyword">public</span> <span class="local-variable">$x_a</span>;

    <span class="keyword">function</span> <span class="function">y_a</span>() {
        <span class="comment">// ...</span>
    }
}

<span class="keyword">class</span> <span class="class">B</span> <span class="keyword">extends</span> <span class="constant">C</span> {
    <span class="keyword">public</span> <span class="local-variable">$x_b</span>;

    <span class="keyword">function</span> <span class="function">y_b</span>() {
        <span class="comment">// ...</span>
    }
}
</pre></div>
</div>
</div>

<p>A, B の共通部分を C として抽出し、その C を A, B が継承することで全く同じ class を作り出すことができました。このように、共通部分を「親クラス」として定義し、「子クラス」で親クラスを <code>extends</code> することで、親クラスがもつ変数や関数を継承することができます。</p>

<p>もう少し具体的に、ゲームのキャラクターの例を考えてみましょう。先ほどまで <code>class Slime</code> としてクラスを作成していましたが、 <code>class Hero</code> として主人公クラスも作成したいとします。そのとき、 <code>class Slime</code> と <code>class Hero</code> には、どちらも <code>$hp</code> や <code>attack()</code> といった変数や関数が同じように実装されます。つまり、どちらも <strong>キャラクター</strong> として <code>$hp</code> という属性情報を持っていて、<code>attack()</code> という振る舞いができるという意味です。</p>

<p><code>class Character</code> として共通部をまとめあげた上で、 <code>class Slime</code> と <code>class Hero</code> は <code>class Character</code> を継承させましょう。他に新しいキャラを作ることになった際に便利です。</p>

<p>早速、<em>test_class.php</em> に継承を導入してみましょう。なお下記のコードでは継承の他に、相手のHPが0になって倒せた際にメッセージを表示する <code>defeat()</code> を追加しています。</p>

<p><em>test_class.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">1</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">1</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$hp</span>, <span class="local-variable">$power</span>, <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>) {
        <span class="local-variable">$this</span>-&gt;hp = <span class="local-variable">$hp</span>;
        <span class="local-variable">$this</span>-&gt;power = <span class="local-variable">$power</span>;
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>::<span class="local-variable">$type</span> . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
        
        <span class="local-variable">$character</span>-&gt;hp = <span class="local-variable">$character</span>-&gt;hp - <span class="local-variable">$this</span>-&gt;power;

        <span class="keyword">if</span> (<span class="local-variable">$character</span>-&gt;hp &lt;= <span class="integer">0</span>) {
            <span class="local-variable">$this</span>-&gt;defeat(<span class="local-variable">$character</span>);
        }
    }

    <span class="keyword">function</span> <span class="function">defeat</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">は</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を倒した！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">このゲームのキャラクターです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="keyword">class</span> <span class="class">Slime</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、最弱のモンスターだ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="keyword">class</span> <span class="class">Hero</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、この世界を守る勇者だ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="constant">Slime</span>::description();
<span class="constant">Hero</span>::description();

<span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="integer">10</span>, <span class="integer">3</span>, <span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
<span class="local-variable">$hero</span> = <span class="keyword">new</span> <span class="constant">Hero</span>(<span class="integer">1000</span>, <span class="integer">30</span>);

<span class="local-variable">$slime_A</span>-&gt;attack(<span class="local-variable">$hero</span>);
<span class="local-variable">$hero</span>-&gt;attack(<span class="local-variable">$slime_A</span>);
</pre></div>
</div>
</div>

<pre><code>$ php test_class.php
</code></pre>

<p><em>実行結果</em></p>

<pre><code>スライムは、最弱のモンスターだ！
主人公は、この世界を守る勇者だ！
スライムAが主人公を攻撃して3ポイントのダメージを与えた！
主人公がスライムAを攻撃して30ポイントのダメージを与えた！
主人公はスライムAを倒した！
</code></pre>

<p>今回、<code>class Character</code> をこのようにしました。</p>

<p><em>再度記述する必要はありません</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">1</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">1</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$hp</span>, <span class="local-variable">$power</span>, <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>) {
        <span class="local-variable">$this</span>-&gt;hp = <span class="local-variable">$hp</span>;
        <span class="local-variable">$this</span>-&gt;power = <span class="local-variable">$power</span>;
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>::<span class="local-variable">$type</span> . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
        
        <span class="local-variable">$character</span>-&gt;hp = <span class="local-variable">$character</span>-&gt;hp - <span class="local-variable">$this</span>-&gt;power;

        <span class="keyword">if</span> (<span class="local-variable">$character</span>-&gt;hp &lt;= <span class="integer">0</span>) {
            <span class="local-variable">$this</span>-&gt;defeat(<span class="local-variable">$character</span>);
        }
    }

    <span class="keyword">function</span> <span class="function">defeat</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">は</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を倒した！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">このゲームのキャラクターです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>先ほどまでの <code>class Slime</code> に書いていた <code>$type</code>, <code>$suffix</code>, <code>$hp</code>, <code>$power</code>, <code>function name()</code>, <code>function attack($character)</code>, <code>function defeat($character)</code>, <code>function description()</code> をキャラ共通部分として抜き出しました。3つのインスタンス変数はコンストラクタで初期値を入れるようにしています。なお、<code>attack()</code> は引数にキャラ名ではなく、キャラのオブジェクトを指定し、<code>$character-&gt;name()</code> で「ダメージを与える相手の名前」を表示するように変更しました。</p>

<p><code>class Slime</code> と <code>class Hero</code> は、<code>extends Character</code> と記述して <code>class Character</code> を継承する指定を行うことで、インスタンスを作った時点で <code>$type</code>, <code>$suffix</code>, <code>$hp</code>, <code>$power</code>, <code>function name()</code>, <code>function attack($character)</code>, <code>function defeat($character)</code>, <code>function description()</code> を持っている状態になります。もちろん、コンストラクタで設定した初期値は、それぞれのオブジェクトには干渉しません。</p>

<p>このように継承を使って共通部分を親クラスに持たせることで、子クラスでは追加分（子クラス専用の変数や関数）を定義するだけでOKになります。</p>

<p>しかし、上記のコードは <code>Slime</code> も <code>Hero</code> も <code>$type</code> と <code>function description()</code> を持っているのに、各クラスで定義を記述しています。また、<code>Character</code> のコンストラクタの引数に <code>$suffix = ''</code> という記述が見られます。これらは一体どういうことなのでしょうか。</p>
</div></section><section id="chapter-9"><h2 class="index">9. 多態性（ポリモーフィズム）
</h2><div class="subsection"><p>オブジェクト指向プログラミングの特徴2つ目、<strong>多態性（ポリモーフィズム）</strong> について説明します。</p>

<p>多態性は継承と併せて用いられるもので、<strong>メソッドの名前を変更せずに、新しい処理の定義ができる</strong> ことをいいます。多態性には <strong>オーバーライド(override)</strong> と <strong>オーバーロード(overload)</strong> の2つがあります。まずはオーバーライドから見ていきます。</p>

<h4>オーバーライド</h4>

<p>オーバーライドは <strong>親クラスから継承したメソッドの名前を変えずに、新しい処理の定義ができる</strong> 性質をいいます。オーバーライド(override)は「上書き」という意味ですが、親クラスの定義内容は残したまま、子クラス独自のメソッドとして定義できます。</p>

<p>先ほどの <em>test_class.php</em> では、<code>Character</code> クラスで <code>$type</code> と <code>description()</code> を定義していました。</p>

<p><em>おさらいですので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;

    <span class="comment">// ..（中略）..</span>

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">このゲームのキャラクターです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
</pre></div>
</div>
</div>

<p>その上で、<code>Slime</code> や <code>Hero</code> でも <code>description()</code> の定義を追記しました。</p>

<p><em>おさらいですので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">class</span> <span class="class">Slime</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、最弱のモンスターだ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}

<span class="keyword">class</span> <span class="class">Hero</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、この世界を守る勇者だ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>これでプログラムを実行すると、<code>Slime</code> や <code>Hero</code> で定義した内容が表示されました。<code>$type</code> と <code>description()</code> がオーバーライド（上書き）されたからです。もし、どうしても親クラスで定義したものを参照したいときは <code>parent::○○</code> と記述すればOKです。</p>

<p>なお、今回のサンプルでは書いていませんが、コンストラクタもオーバーライドが可能です。</p>

<h4>オーバーロード</h4>

<p>オーバーロードは <strong>引数が異なれば同じ名前の関数を複数用意できる</strong> という特徴です。しかし、残念ながらPHPでは厳密なオーバーロードはできません。その代わりに <strong>引数にデフォルト値を設定する</strong> ことができます。</p>

<p>先ほどの <em>test_class.php</em> で、<code>Character</code> クラスのコンストラクタの引数に <code>$suffix = ''</code> という記述がありました。</p>

<p><em>おさらいですので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$hp</span>, <span class="local-variable">$power</span>, <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>) {
        <span class="local-variable">$this</span>-&gt;hp = <span class="local-variable">$hp</span>;
        <span class="local-variable">$this</span>-&gt;power = <span class="local-variable">$power</span>;
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
</pre></div>
</div>
</div>

<p><code>$suffix</code> は <code>スライムA</code>, <code>スライムB</code>, <code>スライムC</code> のような名前の区別をしたかったために追加した変数です。しかしRPGにおいて主人公は一人ですので <code>Hero</code> に <code>$suffix</code> を設定する必要がありません。そこで、コンストラクタの <code>$suffix</code> にデフォルト値を設定することで、Heroのインスタンスを作成する際に3つ目の引数を省略できるようにしました。</p>

<p><em>おさらいですので追記不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="integer">10</span>, <span class="integer">3</span>, <span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
<span class="local-variable">$hero</span> = <span class="keyword">new</span> <span class="constant">Hero</span>(<span class="integer">1000</span>, <span class="integer">30</span>);
</pre></div>
</div>
</div>

<p>どちらも親クラスの <code>Character</code> で定義したコンストラクタを利用していますが、<code>$slime_A</code> は引数が3つ、<code>$hero</code> は引数を2つにしてインスタンスを作成しました。このように、引数にデフォルト値を設定することで、同じ名前の関数だけど引数の数が異なっていても実行できる状態を実現できます。引数の状態を調べる if文 を記述すれば、処理内容を分岐させることも可能です。</p>

<p>引数のデフォルト値を使う上での注意点は、<strong>デフォルト値を設定する引数は括弧の中で右側に書く</strong> ようにしてください。<code>function __construct($hp, $suffix = '', $power)</code> のような書き方はできません。</p>
</div></section><section id="chapter-10"><h2 class="index">10. カプセル化とアクセス権
</h2><div class="subsection"><p>オブジェクト指向プログラミングの特徴3つ目 <strong>カプセル化</strong> について説明します。</p>

<p>ここまで、特に気にせず <code>public</code> というキーワードを使ってきました。<code>public</code> は誰でもその変数や関数にアクセスできる、という意味です。しかし、プログラムの規模が大きく複雑になってきた場合、<code>public</code> のままだと「どのタイミングで誰がそれにアクセスしてきたか」がわからなくなります。変数の値が意図しないものになっているのに誰が書き換えたかわからない状態は非常に困ります。</p>

<p>そこで、<code>private</code> というキーワードを使って自分自身しかアクセスできないようにします。その代わり、アクセスするための <code>public</code> な関数を用意し、それ経由で <code>private</code> なものにアクセスできるようにします。住民票を取得するときは、市役所の窓口で申請しなければならないのをイメージしてください。そうすることで、アクセスした記録を残しておけるからです。</p>

<p>このような特徴がカプセル化です。今のところあまり深く考える必要はありません。オブジェクト指向でのプログラミングに慣れてから覚えられれば良いです。</p>

<h4>アクセス権</h4>

<p>アクセス権には3つあります。</p>

<ul>
  <li>public</li>
  <li>protected</li>
  <li>private</li>
</ul>

<p>public は、どこからでもプロパティやメソッドにアクセスすることが可能です。 protected は、クラス継承関係にあるクラス内でのみアクセス可能です。 private は自分のクラス定義内でないとアクセスできません。下記に例となるコードを置きます。</p>

<p><em>一例ですのでPHPファイルに記述不要です</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
<span class="keyword">class</span> <span class="class">A</span> {
    <span class="keyword">public</span> <span class="local-variable">$public</span> = <span class="string"><span class="delimiter">'</span><span class="content">public</span><span class="delimiter">'</span></span>;
    <span class="keyword">protected</span> <span class="local-variable">$protected</span> = <span class="string"><span class="delimiter">'</span><span class="content">protected</span><span class="delimiter">'</span></span>;
    <span class="keyword">private</span> <span class="local-variable">$private</span> = <span class="string"><span class="delimiter">'</span><span class="content">private</span><span class="delimiter">'</span></span>;

    <span class="keyword">function</span> <span class="function">test</span>() {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;<span class="keyword">public</span>;  <span class="comment">// アクセス可能</span>
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;<span class="keyword">protected</span>;  <span class="comment">// アクセス可能</span>
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;<span class="keyword">private</span>;  <span class="comment">// アクセス可能</span>
    }
}

<span class="comment">// B は A とは無関係のクラス</span>
<span class="keyword">class</span> <span class="class">B</span> {
    <span class="keyword">function</span> <span class="function">test</span>() {
        <span class="local-variable">$a</span> = <span class="keyword">new</span> <span class="constant">A</span>();

        <span class="predefined">print</span> <span class="local-variable">$a</span>-&gt;<span class="keyword">public</span>;  <span class="comment">// アクセス可能</span>
        <span class="predefined">print</span> <span class="local-variable">$a</span>-&gt;<span class="keyword">protected</span>;  <span class="comment">// アクセス不可能、エラー発生</span>
        <span class="predefined">print</span> <span class="local-variable">$a</span>-&gt;<span class="keyword">private</span>;  <span class="comment">// アクセス不可能、エラー発生</span>
    }
}

<span class="comment">// C は A と継承関係にあるクラス</span>
<span class="keyword">class</span> <span class="class">C</span> <span class="keyword">extends</span> <span class="constant">A</span> {
    <span class="keyword">function</span> <span class="function">test</span>() {
        <span class="local-variable">$a</span> = <span class="keyword">new</span> <span class="constant">A</span>();

        <span class="predefined">print</span> <span class="local-variable">$a</span>-&gt;<span class="keyword">public</span>;  <span class="comment">// アクセス可能</span>
        <span class="predefined">print</span> <span class="local-variable">$a</span>-&gt;<span class="keyword">protected</span>;  <span class="comment">// アクセス可能</span>
        <span class="predefined">print</span> <span class="local-variable">$a</span>-&gt;<span class="keyword">private</span>;  <span class="comment">// アクセス不可能、エラー発生</span>
    }
}

<span class="local-variable">$a</span> = <span class="keyword">new</span> <span class="constant">A</span>();
<span class="local-variable">$a</span>-&gt;test();  <span class="comment">// エラー無し</span>

<span class="local-variable">$b</span> = <span class="keyword">new</span> <span class="constant">B</span>();
<span class="local-variable">$b</span>-&gt;test();  <span class="comment">// $a -&gt;protected でエラー発生</span>

<span class="local-variable">$c</span> = <span class="keyword">new</span> <span class="constant">C</span>();
<span class="local-variable">$c</span>-&gt;test();  <span class="comment">// $a -&gt;private でエラー発生</span>
</pre></div>
</div>
</div>

<p>アクセス権は、どのクラスまでがその変数や関数に触っていいかを決めています。</p>

<h4>プロパティ（変数）のアクセス権</h4>

<p>クラスに設定するプロパティは、public, private, または protected のどれかを必ず書いてください。</p>

<h4>メソッドのアクセス権</h4>

<p>クラスに定義するメソッドも、public, private, または protected を使います。省略可能ですが、その場合は public となります。</p>
</div></section><section id="chapter-11"><h2 class="index">11. メソッドチェーン
</h2><div class="subsection"><p>PHPでは、うまくクラス定義を行えると「メソッドとメソッドを <code>-&gt;</code> でつなぐ」ような書き方ができます。</p>

<p>下記のサンプルを見てください。</p>

<p><em>実行確認する際は新規で作ったPHPファイルにコードを書いてください</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">MethodChain</span> {
    <span class="keyword">public</span> <span class="local-variable">$result</span> = <span class="integer">1</span>;
    
    <span class="keyword">function</span> <span class="function">add</span>(<span class="local-variable">$add_num</span>) {
        <span class="local-variable">$this</span>-&gt;result += <span class="local-variable">$add_num</span>;
        <span class="keyword">return</span> <span class="local-variable">$this</span>;
    }
    
    <span class="keyword">function</span> <span class="function">sub</span>(<span class="local-variable">$sub_num</span>) {
        <span class="local-variable">$this</span>-&gt;result -= <span class="local-variable">$sub_num</span>;
        <span class="keyword">return</span> <span class="local-variable">$this</span>;
    }
    
    <span class="keyword">function</span> <span class="function">mul</span>(<span class="local-variable">$mul_num</span>) {
        <span class="local-variable">$this</span>-&gt;result *= <span class="local-variable">$mul_num</span>;
        <span class="keyword">return</span> <span class="local-variable">$this</span>;
    }
    
    <span class="keyword">function</span> <span class="function">div</span>(<span class="local-variable">$div_num</span>) {
        <span class="local-variable">$this</span>-&gt;result /= <span class="local-variable">$div_num</span>;
        <span class="keyword">return</span> <span class="local-variable">$this</span>;
    }
}

<span class="local-variable">$mc</span> = <span class="keyword">new</span> <span class="constant">MethodChain</span>();

<span class="local-variable">$mc</span>-&gt;add(<span class="integer">4</span>)-&gt;sub(<span class="integer">1</span>)-&gt;mul(<span class="integer">6</span>)-&gt;div(<span class="integer">3</span>);

<span class="predefined">print</span> <span class="local-variable">$mc</span>-&gt;result . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<p><code>$mc-&gt;add(4)-&gt;sub(1)-&gt;mul(6)-&gt;div(3)</code> のコードは結果として <code>( ( ( ( 1 + 4 ) - 1 ) * 6 ) / 3)</code> の計算をしているので、実行すると 8 と表示されます。<code>return $this;</code> としているのがポイントで「<code>$result</code> プロパティが書き換わった状態の自分自身のインスタンス」を <code>return</code> しているので、<code>add(4)</code> を実行して戻ってきたインスタンスの <code>sub(1)</code> を実行→戻ってきたインスタンスの <code>mul(6)</code> を実行→戻ってきたインスタンスの <code>div(3)</code> を実行、というのを次々に行っているのです。</p>

<p>このような、メソッドとメソッドを <code>-&gt;</code> でつなぐ書き方を <strong>メソッドチェーン</strong> といいます。Laravelに入ると、よく目にするようになりますので、覚えておきましょう。</p>
</div></section><section id="chapter-12"><h2 class="index">12. オブジェクトのクラス名を確認する方法
</h2><div class="subsection"><p>継承やオーバーライドなどを利用して複雑なプログラムになってくると、ある変数に入っているオブジェクトが何のクラスから生成されたものかがわかりにくくなることがあります。オブジェクトのクラス名は <code>get_class(オブジェクト)</code> で確認できます。</p>

<p><em>test_class.php</em> の一番下に、次の2行を追記して実行してみてください。</p>

<p><em>test_class.php（追記部分のみ）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">print</span> <span class="predefined">get_class</span>(<span class="local-variable">$slime_A</span>) . <span class="predefined-constant">PHP_EOL</span>;
<span class="predefined">print</span> <span class="predefined">get_class</span>(<span class="local-variable">$hero</span>) . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<pre><code>$ php test_class.php
</code></pre>

<p><em>実行結果（該当部分のみ）</em></p>

<pre><code>Slime
Hero
</code></pre>
</div></section><section id="chapter-13"><h2 class="index">13. 複数ファイルの連携
</h2><div class="subsection"><p>ここまで、全てのクラスを <em>test_class.php</em> に記述していましたが、1ファイル内にいくつも class を定義するのはソースコードが読みにくくなるので、おすすめできません。1ファイルに1classを記述するのが基本の形です。</p>

<p>ここまでの <em>test_class.php</em> を基に、<code>Character</code>, <code>Slime</code>, <code>Hero</code> のそれぞれを別ファイルに分割しましょう。まずは、親クラスである <code>class Character</code> のファイルを作成します。</p>

<p><em>character.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">1</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">1</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$hp</span>, <span class="local-variable">$power</span>, <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>) {
        <span class="local-variable">$this</span>-&gt;hp = <span class="local-variable">$hp</span>;
        <span class="local-variable">$this</span>-&gt;power = <span class="local-variable">$power</span>;
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>::<span class="local-variable">$type</span> . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
        
        <span class="local-variable">$character</span>-&gt;hp = <span class="local-variable">$character</span>-&gt;hp - <span class="local-variable">$this</span>-&gt;power;

        <span class="keyword">if</span> (<span class="local-variable">$character</span>-&gt;hp &lt;= <span class="integer">0</span>) {
            <span class="local-variable">$this</span>-&gt;defeat(<span class="local-variable">$character</span>);
        }
    }

    <span class="keyword">function</span> <span class="function">defeat</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">は</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を倒した！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">このゲームのキャラクターです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>次に、<code>Character</code> の子クラス <code>Slime</code> と <code>Hero</code> を別ファイルに定義していきます。ここで注意すべき点は <strong>あるファイルとは別のファイルに記述されたクラスを使うには、それが記述されたファイルを「読み込む」必要がある</strong> ということです。</p>

<p>別ファイルを読み込むには <code>require_once</code> を使います。これによりファイルを読み込むことができるので、下記のコードでは、必要なファイルを最初に <code>require_once</code> で読み込んでしまいます。<code>class Slime</code> は <code>extends Character</code> しているので、 <code>class Character</code> が定義されている <em>character.php</em> を <code>require_once</code> しています。</p>

<p><em>slime.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">character.php</span><span class="delimiter">'</span></span>;

<span class="keyword">class</span> <span class="class">Slime</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、最弱のモンスターだ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p><code>class Hero</code> も同様に <code>extends Character</code> しているので、 <code>class Character</code> が定義されている <em>character.php</em> を <code>require_once</code> します。</p>

<p><em>hero.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">character.php</span><span class="delimiter">'</span></span>;

<span class="keyword">class</span> <span class="class">Hero</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、この世界を守る勇者だ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>上記で、基本的なクラスファイルは完成です。</p>

<p>ただし、<em>test_class.php</em> では、クラス定義の下に、以下のようなコードがありました。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="constant">Slime</span>::description();
<span class="constant">Hero</span>::description();

<span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="integer">10</span>, <span class="integer">3</span>, <span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
<span class="local-variable">$hero</span> = <span class="keyword">new</span> <span class="constant">Hero</span>(<span class="integer">1000</span>, <span class="integer">30</span>);

<span class="local-variable">$slime_A</span>-&gt;attack(<span class="local-variable">$hero</span>);
<span class="local-variable">$hero</span>-&gt;attack(<span class="local-variable">$slime_A</span>);

<span class="predefined">print</span> <span class="predefined">get_class</span>(<span class="local-variable">$slime_A</span>) . <span class="predefined-constant">PHP_EOL</span>;
<span class="predefined">print</span> <span class="predefined">get_class</span>(<span class="local-variable">$hero</span>) . <span class="predefined-constant">PHP_EOL</span>;
</pre></div>
</div>
</div>

<p>ゲームを実行する記述です。上記の <code>character.php</code>, <code>slime.php</code>, <code>hero.php</code> はクラス（設計図）しか作っていないので、全てのクラスをまとめあげ、ゲームとして実行する記述をどこかに書かなければ、何も始まりません。</p>

<p>そこで、ゲームを実行するためのクラスとして <code>class Game</code> というものを定義します。その中の <code>function start()</code> の中で、<code>Slime</code> と <code>Hero</code> のインスタンスを生成して、ゲームを進めましょう。</p>

<p><code>Slime</code> と <code>Hero</code> のインスタンスを作成するには、定義されてあるファイルを読み込むことが必要なので、<code>require_once</code> しています。</p>

<p><em>game.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">hero.php</span><span class="delimiter">'</span></span>;
<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">slime.php</span><span class="delimiter">'</span></span>;

<span class="keyword">class</span> <span class="class">Game</span> {
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">start</span>() {
        <span class="constant">Slime</span>::description();
        <span class="constant">Hero</span>::description();
        
        <span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Slime</span>(<span class="integer">10</span>, <span class="integer">3</span>, <span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
        <span class="local-variable">$hero</span> = <span class="keyword">new</span> <span class="constant">Hero</span>(<span class="integer">1000</span>, <span class="integer">30</span>);

        <span class="local-variable">$slime_A</span>-&gt;attack(<span class="local-variable">$hero</span>);
        <span class="local-variable">$hero</span>-&gt;attack(<span class="local-variable">$slime_A</span>);
    }
}

<span class="constant">Game</span>::start();
</pre></div>
</div>
</div>

<p><em>game.php</em> の最後にある <code>Game::start();</code> が全てをまとめあげて実行するメイン処理です。</p>

<p>ここまでできたところで、 <em>game.php</em> を実行します。</p>

<pre><code>$ php game.php
</code></pre>

<p><em>実行結果</em></p>

<pre><code>スライムは、最弱のモンスターだ！
主人公は、この世界を守る勇者だ！
スライムAが主人公を攻撃して3ポイントのダメージを与えた！
主人公がスライムAを攻撃して30ポイントのダメージを与えた！
主人公はスライムAを倒した！
</code></pre>
</div></section><section id="chapter-14"><h2 class="index">14. 名前空間
</h2><div class="subsection"><h3 class="index" id="chapter-14-1">14.1 名前空間とは
</h3><p>例えば、他人が作成した PHP のゲームライブラリを読み込んだとします。そして、自分で作成した <code>class Character</code> を作成し、ゲームを作成していくとします。</p>

<p>ここで問題となるのは、 <code>class Character</code> という <strong>クラス名</strong> は、自分のプログラムと他人のライブラリとで<strong>重複する可能性</strong>があるということです。自分で作った <code>class Character</code> と、他人が作成した PHP のゲームライブラリの中にあった <code>class Character</code> が重複していたらどうなるでしょうか。当然、どちらが読み込まれるかわからないので、意図しない実行になってしまう可能性があります。</p>

<p>そもそも、誰かのライブラリとクラス名が重複するかどうかなんてことはあまり考慮したくないものです。絶対に重複しないために、クラス名を <code>TechAcademy_Character</code> と所属などを前置きすればどうでしょうか。これで TechAcademy の受講生同士でしか重複しないクラス名を作り出すことができました。しかし、 <code>TechAcademy_Character</code> の <code>TechAcademy_</code> はクラスにとっては何の意味もない文字列です。できれば、無意味な命名は避けたい名前付けになります。</p>

<p>そこで、名前空間という概念が生まれました。<code>class Character</code> はそのままにして、重複させない方法が生まれました。</p>

<p>その方法は、<code>class Character</code> はそのままにして、クラスの定義を場所を、ファイルを保存するフォルダ階層のように、 <code>TechAcademy</code> の中の <code>RPG</code> の中の <code>Characeters</code> の中にあるクラスだと宣言します。<code>namespace TechAcademy\RPG\Characters;</code> がそれにあたります。</p>

<p><em>名前空間(namespace)　※本セクションの例は全て一例ですので、コーディングと動作確認は必要ありません</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

<span class="keyword">class</span> <span class="class">Character</span> {
    <span class="comment">// 中略</span>
}
</pre></div>
</div>
</div>

<p>最初に <code>namespace TechAcademy\RPG\Characters;</code> と記述することで、このファイルは <code>TechAcademy\RPG\Characters</code> という名前空間に置かれることになります。こうすれば、同じ名前空間同士でしか重複しないようになります。先ほど例えで出したように、フォルダ階層にファイルを置くのと似ていますが、名前空間とソースファイルのフォルダ構成が一致している必要はありません。名前空間は名前空間、フォルダ構成はフォルダ構成ですが、名前空間とフォルダ構成が近い方が、プログラムの規模が大きくなった場合に管理しやすいでしょう。</p>

<p>ただし、1つ面倒になってしまうことがあります。それはクラス名を指定するとき、名前空間も指定してあげる必要があるということです。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$character</span> = <span class="keyword">new</span> <span class="constant">Character</span>(...);    <span class="comment">// これはダメ</span>
<span class="local-variable">$character</span> = <span class="keyword">new</span> \<span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>\<span class="constant">Character</span>(...);    <span class="comment">// これが正解</span>
</pre></div>
</div>
</div>

<p>この面倒を回避するために、 <code>use</code> というものも生まれました。最初に <code>use</code> しておけば、 <code>use</code> した名前空間のクラス名を使用するという宣言になります。そのため、今まで同様に名前空間を記述しなくて良くなります。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">use</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>\<span class="constant">Character</span>;

<span class="local-variable">$character</span> = <span class="keyword">new</span> <span class="constant">Character</span>(...);    <span class="comment">// use のおかげで正解 (\TechAcademy\RPG\Characters\Character だと決まる)</span>
</pre></div>
</div>
</div>

<p>また、<code>use</code> を使用しなくても呼び出し側も全く同一の名前空間だった場合には、 <code>use</code> は不要です。以下は同じ名前空間にある別のファイルから <code>Character</code> を呼び出す場合です。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

<span class="local-variable">$character</span> = <span class="keyword">new</span> <span class="constant">Character</span>(...);    <span class="comment">// namespace が同じなので正解 (\TechAcademy\RPG\Characters\Character だと決まる)</span>
</pre></div>
</div>
</div>

<p>楽したい場合は同じ名前空間に置く方法でも良いですが、基本は <code>use</code> を使用してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-14-2">14.2 名前空間の実例
</h3><p>ここまでの <em>test_class.php</em> のコードに名前空間を適用します。まず <code>class Character</code> は <code>TechAcademy\RPG\Characters</code> の名前空間に置きたいと思います。</p>

<p><em>character.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

<span class="keyword">class</span> <span class="class">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">1</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">1</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$hp</span>, <span class="local-variable">$power</span>, <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>) {
        <span class="local-variable">$this</span>-&gt;hp = <span class="local-variable">$hp</span>;
        <span class="local-variable">$this</span>-&gt;power = <span class="local-variable">$power</span>;
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>::<span class="local-variable">$type</span> . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
        
        <span class="local-variable">$character</span>-&gt;hp = <span class="local-variable">$character</span>-&gt;hp - <span class="local-variable">$this</span>-&gt;power;

        <span class="keyword">if</span> (<span class="local-variable">$character</span>-&gt;hp &lt;= <span class="integer">0</span>) {
            <span class="local-variable">$this</span>-&gt;defeat(<span class="local-variable">$character</span>);
        }
    }

    <span class="keyword">function</span> <span class="function">defeat</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">は</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を倒した！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">このゲームのキャラクターです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>同様に <em>test_class.php</em> の内容を基に <code>class Slime</code> と <code>class Hero</code> を作ります。2つとも <code>TechAcademy\RPG\Characters</code> の名前空間に置きましょう。こうすることで、<code>class Slime</code> と <code>class Character</code> が同じ名前空間になるので <code>extends Character</code> する際に <code>extends \TechAcademy\RPG\Characters\Character</code> としたり <code>use</code> を使ったりしなくても大丈夫です。</p>

<p>補足として、以下のサンプルにある <code>require_once 'PHPファイル名'</code> は、別のPHPファイルに記述されている変数や関数、クラスなどを利用したい場合に必要な記述です。書くのを忘れると「<code>Character</code> が何かわからない」という内容のエラーが発生します。</p>

<p><em>slime.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">character.php</span><span class="delimiter">'</span></span>;

<span class="keyword">class</span> <span class="class">Slime</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">スライム</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、最弱のモンスターだ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p><em>hero.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">character.php</span><span class="delimiter">'</span></span>;

<span class="keyword">class</span> <span class="class">Hero</span> <span class="keyword">extends</span> <span class="constant">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="content">主人公</span><span class="delimiter">'</span></span>;

    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="predefined-constant">self</span>::<span class="local-variable">$type</span> . <span class="string"><span class="delimiter">'</span><span class="content">は、この世界を守る勇者だ！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>さらに、今作った <code>Character</code>, <code>Slime</code>, <code>Hero</code> を使うクラス <code>class Game</code> を用意します。こちらは <code>TechAcademy\RPG</code> の名前空間に置きましょう。この場合、<code>TechAcademy\RPG\Characters</code> に置かれている <code>class Hero</code> や <code>class Slime</code> を指定するには、 <code>use</code> を使うか、名前空間を指定してあげる必要があります。</p>

<p><em>game.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>;

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">hero.php</span><span class="delimiter">'</span></span>;
<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">slime.php</span><span class="delimiter">'</span></span>;

<span class="keyword">use</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>\<span class="constant">Hero</span>;

<span class="keyword">class</span> <span class="class">Game</span> {
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">start</span>() {
        <span class="comment">// use していないので名前空間が必要</span>
        \<span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>\<span class="constant">Slime</span>::description();
        
        <span class="comment">// use した Hero だけは名前空間が必要無し</span>
        <span class="constant">Hero</span>::description();
        
        <span class="comment">// 相対的な名前空間でも良い</span>
        <span class="comment">// このファイルの名前空間は TechAcademy\RPG なので以降を補足すれば良い</span>
        <span class="comment">// 相対的な名前空間の場合には最初の \ は入れない</span>
        <span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Characters</span>\<span class="constant">Slime</span>(<span class="integer">10</span>, <span class="integer">3</span>, <span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
        
        <span class="local-variable">$hero</span> = <span class="keyword">new</span> <span class="constant">Hero</span>(<span class="integer">1000</span>, <span class="integer">30</span>);

        <span class="local-variable">$slime_A</span>-&gt;attack(<span class="local-variable">$hero</span>);
        <span class="local-variable">$hero</span>-&gt;attack(<span class="local-variable">$slime_A</span>);
    }
}

<span class="constant">Game</span>::start();
</pre></div>
</div>
</div>

<pre><code>$ php game.php
</code></pre>

<p><em>実行結果</em></p>

<pre><code>スライムは、最弱のモンスターだ！
主人公は、この世界を守る勇者だ！
スライムAが主人公を攻撃して3ポイントのダメージを与えた！
主人公がスライムAを攻撃して30ポイントのダメージを与えた！
主人公はスライムAを倒した！
</code></pre>
</div></section><section id="chapter-15"><h2 class="index">15. トレイト
</h2><div class="subsection"><p>攻撃する( <code>function attack()</code> ) は全てのキャラが行える行動で <code>Character</code> クラス内に定義しました。ここで、魔法で攻撃する ( <code>function magic_attack()</code> ) を追加したいとします。<code>Character</code> に追加しても良いかもしれませんが、魔法は全てのキャラができることではないことを考えると「<code>Character</code> に <code>magic_attack()</code> を持たせておく。ただし魔法が使えないキャラは <code>magic_attack()</code> を無視する」というのは、おかしな話にも思えます。かといって、使うキャラのクラス内に <code>magic_attack()</code> を持たせてしまうと、魔法が使えるキャラを増えた際、あちらこちらに <code>magic_attack()</code> の定義ができてしまい、ソースコードの修正が面倒になります。</p>

<p>そこで「<code>function magic_attack()</code> の定義だけを書いたものを作り、必要なキャラに適用する」という方法で運用したいと思います。それを実現する仕組みが <strong>トレイト(trait)</strong> です。</p>

<p>早速、<code>function magic_attack()</code> を持つトレイトを作ってみましょう。</p>

<p><em>magic.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

trait <span class="constant">Magic</span> {
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">magic_attack</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">"</span><span class="content">が</span><span class="delimiter">"</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">"</span><span class="content">を魔法で攻撃して</span><span class="delimiter">"</span></span> . <span class="local-variable">$this</span>-&gt;magic_power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
        
        <span class="local-variable">$character</span>-&gt;hp = <span class="local-variable">$character</span>-&gt;hp - <span class="local-variable">$this</span>-&gt;magic_power;

        <span class="keyword">if</span> (<span class="local-variable">$character</span>-&gt;hp &lt;= <span class="integer">0</span>) {
            <span class="local-variable">$this</span>-&gt;defeat(<span class="local-variable">$character</span>);
        }
    }
}
</pre></div>
</div>
</div>

<p>トレイトはクラスとは違うものなので <code>class</code> ではなく <code>trait</code> というキーワードを使いましょう。<code>magic_attack()</code> 自体は、<code>Character</code> 内に定義した <code>attack()</code> とほぼ同じです。</p>

<p><code>magic_attack()</code> を 「<code>Slime</code> は使えない」「<code>Hero</code> は使える」というルールにします。<code>Slime</code> の定義に変更はありませんが、<code>Hero</code> の方には「 <code>trait Magic</code> を読み込んで <code>magic_attack()</code> を使えるようにする」設定を追加します。</p>

<p><em>hero.php</em></p>

<pre><code>&lt;?php

namespace TechAcademy\RPG\Characters;

require_once 'character.php';
require_once 'magic.php';

class Hero extends Character {
    use Magic;
    
    public static $type = '主人公';

    static function description() {
        print self::$type . 'は、この世界を守る勇者だ！' . PHP_EOL;
    }
}
</code></pre>

<p><code>require_once 'magic.php'</code> で <code>trait Magic</code> を読み込み、<code>use Magic</code> としました。こうすることで、<code>trait Magic</code> に定義した <code>function magic_attack()</code> を <code>Hero</code> が使えるようになります。</p>

<p>後は <code>Game</code> の中で <code>magic_attack()</code> を呼び出せば良いだけですが、今回、攻撃力と魔法攻撃力を分けているので、<code>Character</code> に魔法攻撃力の変数 <code>$magic_power</code> を追加します。さらにコンストラクタで <code>$magic_power</code> を初期化するようにしてください。</p>

<p><em>character.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>;

<span class="keyword">class</span> <span class="class">Character</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="local-variable">$type</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>;
    <span class="keyword">public</span> <span class="local-variable">$hp</span> = <span class="integer">1</span>;
    <span class="keyword">public</span> <span class="local-variable">$power</span> = <span class="integer">1</span>;
    <span class="keyword">public</span> <span class="local-variable">$magic_power</span> = <span class="integer">1</span>;

    <span class="keyword">function</span> <span class="function">__construct</span>(<span class="local-variable">$hp</span>, <span class="local-variable">$power</span>, <span class="local-variable">$magic_power</span>, <span class="local-variable">$suffix</span> = <span class="string"><span class="delimiter">'</span><span class="delimiter">'</span></span>) {
        <span class="local-variable">$this</span>-&gt;hp = <span class="local-variable">$hp</span>;
        <span class="local-variable">$this</span>-&gt;power = <span class="local-variable">$power</span>;
        <span class="local-variable">$this</span>-&gt;magic_power = <span class="local-variable">$magic_power</span>;
        <span class="local-variable">$this</span>-&gt;suffix = <span class="local-variable">$suffix</span>;
    }
    
    <span class="keyword">function</span> <span class="function">name</span>() {
        <span class="keyword">return</span> <span class="local-variable">$this</span>::<span class="local-variable">$type</span> . <span class="local-variable">$this</span>-&gt;suffix;
    }

    <span class="keyword">function</span> <span class="function">attack</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">が</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を攻撃して</span><span class="delimiter">'</span></span> . <span class="local-variable">$this</span>-&gt;power . <span class="string"><span class="delimiter">'</span><span class="content">ポイントのダメージを与えた！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
        
        <span class="local-variable">$character</span>-&gt;hp = <span class="local-variable">$character</span>-&gt;hp - <span class="local-variable">$this</span>-&gt;power;

        <span class="keyword">if</span> (<span class="local-variable">$character</span>-&gt;hp &lt;= <span class="integer">0</span>) {
            <span class="local-variable">$this</span>-&gt;defeat(<span class="local-variable">$character</span>);
        }
    }

    <span class="keyword">function</span> <span class="function">defeat</span>(<span class="local-variable">$character</span>) {
        <span class="predefined">print</span> <span class="local-variable">$this</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">は</span><span class="delimiter">'</span></span> . <span class="local-variable">$character</span>-&gt;name() . <span class="string"><span class="delimiter">'</span><span class="content">を倒した！</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">description</span>() {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">このゲームのキャラクターです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
}
</pre></div>
</div>
</div>

<p>では、<code>Game</code> の中で <code>magic_attack()</code> を呼び出しましょう。</p>

<p><em>game.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">namespace</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>;

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">hero.php</span><span class="delimiter">'</span></span>;
<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">slime.php</span><span class="delimiter">'</span></span>;

<span class="keyword">use</span> <span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>\<span class="constant">Hero</span>;

<span class="keyword">class</span> <span class="class">Game</span> {
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">start</span>() {
        <span class="comment">// use していないので名前空間が必要</span>
        \<span class="constant">TechAcademy</span>\<span class="constant">RPG</span>\<span class="constant">Characters</span>\<span class="constant">Slime</span>::description();
        
        <span class="comment">// use した Hero だけは名前空間が必要無し</span>
        <span class="constant">Hero</span>::description();
        
        <span class="comment">// 相対的な名前空間でも良い</span>
        <span class="comment">// このファイルの名前空間は TechAcademy\RPG なので以降を補足すれば良い</span>
        <span class="comment">// 相対的な名前空間の場合には最初の \ は入れない</span>
        <span class="local-variable">$slime_A</span> = <span class="keyword">new</span> <span class="constant">Characters</span>\<span class="constant">Slime</span>(<span class="integer">10</span>, <span class="integer">3</span>, <span class="integer">0</span>, <span class="string"><span class="delimiter">'</span><span class="content">A</span><span class="delimiter">'</span></span>);
        
        <span class="local-variable">$hero</span> = <span class="keyword">new</span> <span class="constant">Hero</span>(<span class="integer">1000</span>, <span class="integer">30</span>, <span class="integer">20</span>);

        <span class="local-variable">$slime_A</span>-&gt;attack(<span class="local-variable">$hero</span>);
        <span class="local-variable">$hero</span>-&gt;magic_attack(<span class="local-variable">$slime_A</span>);
    }
}

<span class="constant">Game</span>::start();
</pre></div>
</div>
</div>

<pre><code>$ php game.php
</code></pre>

<p><em>実行結果</em></p>

<pre><code>スライムは、最弱のモンスターだ！
主人公は、この世界を守る勇者だ！
スライムAが主人公を攻撃して3ポイントのダメージを与えた！
主人公がスライムAを魔法で攻撃して20ポイントのダメージを与えた！
主人公はスライムAを倒した！
</code></pre>

<p>トレイトは奥深くて難しい仕組みではありますが、Laravel本体のソースコードを読むと、いたるところで <code>trait</code> を目にします。簡単な使い方のレベルまでで良いので、覚えておきましょう。</p>

<div class="alert alert-info">
<strong>（コラム） トレイトと継承の違い</strong><br>
<br>
継承は、親クラスの <code>public</code>, <code>protected</code> なプロパティとメソッドをすべて受け継ぎます。とても便利な機能ですが、すべてを継承したいわけではない場合もあります。トレイトは、部分的な機能として保管して、様々なクラスに読み込ませることができます。継承とトレイトを組み合わせれば、うまく設計ができるようになるので、積極的に使い分けていきましょう。
</div>
</div></section><section id="chapter-16"><h2 class="index">16. まとめ
</h2><div class="subsection"><p>このレッスンでは、PHPのオブジェクト指向プログラミングを中心とした知識を学びました。</p>

<p>繰り返しになりますが、難しい話も多かったかと思います。いきなり全て理解できなくても構いません。先のレッスンに進んだ後で、このレッスンに戻って、改めて内容を読んでみると、理解できるようになるでしょう。</p>

<p>最後に、ちょっとしたオブジェクト指向プログラミングの課題を用意しましたので、ぜひ取り組んでみてください。</p>

<div class="alert alert-warning">
ワークスペース直下に <strong>php-1-3</strong>のような名前のフォルダを作成し、ここまでのPHPのレッスンで作成したPHPファイルを全て php-1-3 フォルダ内に移動しておきましょう。
</div>
</div><div class="subsection challenge"><h3 class="index" id="kadai-php-3">課題：Humanクラスを定義する</h3><p><em>animal.php</em>, <em>thinkable.php</em>, <em>human.php</em>, <em>main.php</em> の計4つのPHPファイルを作成してください。それぞれのPHPファイルの中には、以下の仕様を満たすようなコードを記述してください。</p>

<h4>仕様</h4>

<h5>Animalクラス ( <em>animal.php</em> )</h5>

<p>Humanクラスの親となるクラスです。</p>

<ul>
  <li>名前を格納する変数と年齢を格納する変数を定義してください。（苗字と名前は分けなくてOKです。変数名は自由とします。）</li>
  <li><code>say</code> という名前の関数を定義してください。この関数を実行すると、変数に代入された名前と年齢を使って「○○です。△△歳です。」と画面に表示するように処理を作りましょう。</li>
</ul>

<h5>Thinkableトレイト( <em>thinkable.php</em> )</h5>

<ul>
  <li>クラスではなく <strong>トレイト</strong> として作ってください。</li>
  <li><code>think</code> 関数を中に定義してください。この関数を実行すると、<code>Human</code> クラスに定義された”趣味”の情報が入っている変数（後述） の中身を利用して「私は□□について考えています。」と画面に表示するように処理を作りましょう。</li>
</ul>

<h5>Humanクラス( <em>human.php</em> )</h5>

<ul>
  <li><code>Animal</code> クラスを継承してください。</li>
  <li><code>Thinkable</code> トレイトの <code>think</code> 関数を使えるように設定してください。</li>
  <li>趣味の情報を格納する変数を定義してください。</li>
  <li>コンストラクタに名前・年齢・趣味の情報が入る引数を設定し、名前・年齢・趣味の各変数を引数の情報で初期化するようにしてください。引数の名前は自由とします。</li>
</ul>

<h5>Mainクラス( <em>main.php</em> )</h5>

<ul>
  <li>以下のコードをひな形として利用してください。</li>
</ul>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="predefined">require_once</span> <span class="string"><span class="delimiter">'</span><span class="content">human.php</span><span class="delimiter">'</span></span>;

<span class="keyword">class</span> <span class="class">Main</span> {
    <span class="keyword">static</span> <span class="keyword">function</span> <span class="function">start</span>() {
        <span class="comment">// コンストラクタ</span>
        <span class="local-variable">$tanaka</span> = <span class="keyword">new</span> <span class="constant">Human</span>();
        <span class="local-variable">$suzuki</span> = <span class="keyword">new</span> <span class="constant">Human</span>();
        <span class="local-variable">$sato</span> = <span class="keyword">new</span> <span class="constant">Human</span>();

        <span class="comment">// 関数を実行</span>
        
    }
}

<span class="predefined">Main</span>::start();
</pre></div>
</div>
</div>

<ul>
  <li>上記のひな形では <code>new Human();</code> と書かれているように、括弧の中に引数の記述ができていません。コンストラクタが正しく実行され、名前・年齢・趣味の各変数を引数の情報で初期化できるよう、引数を追記してください。</li>
  <li>以下の3人のインスタンスを作成してください。</li>
</ul>

<table>
  <thead>
    <tr>
      <th style="text-align: left">変数</th>
      <th style="text-align: center">名前</th>
      <th style="text-align: center">年齢</th>
      <th style="text-align: center">趣味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left"><code>$tanaka</code></td>
      <td style="text-align: center">田中 太郎</td>
      <td style="text-align: center">25</td>
      <td style="text-align: center">電車</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>$suzuki</code></td>
      <td style="text-align: center">鈴木 次郎</td>
      <td style="text-align: center">30</td>
      <td style="text-align: center">野球</td>
    </tr>
    <tr>
      <td style="text-align: left"><code>$sato</code></td>
      <td style="text-align: center">佐藤 花子</td>
      <td style="text-align: center">20</td>
      <td style="text-align: center">映画</td>
    </tr>
  </tbody>
</table>

<ul>
  <li><code>say</code> と <code>think</code> 関数の実行する順序は、下記の実行結果になるように並べてください。</li>
</ul>

<h4>実行結果</h4>

<pre><code>$ php main.php
</code></pre>

<pre><code>田中 太郎です。25歳です。
私は電車について考えています。
鈴木 次郎です。30歳です。
私は野球について考えています。
佐藤 花子です。20歳です。
私は映画について考えています。
</code></pre>

<h4>注意点</h4>

<ul>
  <li>名前空間は使っても使わなくてもOKです。</li>
  <li>継承は必須ですが、多態性とカプセル化は任意とします。使っていなくても仕様を満たしていれば合格とします。</li>
</ul>

<h4>ヒント</h4>

<p>まずはAnimalクラス ( <em>animal.php</em> ) だけで成立させることを考えてみましょう。また、その場合はコンストラクタも定義し、Animalクラスのインスタンスを生成した際に2つの引数を受け取るようにしましょう。</p>

<p><em>animal.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>

<span class="keyword">class</span> <span class="class">Animal</span> {
    <span class="comment">// 内容は省略。自力で考えてみましょう。</span>
}

<span class="comment">// 以下の2行は動作確認のための記述です。確認できたらコメントアウトしておきましょう。</span>
<span class="local-variable">$animal</span> = <span class="keyword">new</span> <span class="constant">Animal</span>(<span class="string"><span class="delimiter">"</span><span class="content">田中 太郎</span><span class="delimiter">"</span></span>, <span class="integer">25</span>);
<span class="local-variable">$animal</span>-&gt;say();
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>ここまでできた状態の <em>animal.php</em> ファイルを試しに実行すると以下の出力になります。</p>

<pre><code>$ php animal.php
</code></pre>

<pre><code>田中 太郎です。25歳です。
</code></pre>
</div></section></div>
</body>
</html>