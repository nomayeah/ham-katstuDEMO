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
<div class="markdown"><div class="lesson-num p">Lesson6</div><h1 id="php-2">PHP その2</h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標</h2><div class="subsection"><p>さて、ここまでで、変数に値を代入して、変数を指定して演算を行い、結果を表示することは何となくできるようになりました。</p>

<p>今までは単純に上から下へ流れていって、全てのソースコードを実行していましたが、ここからはプログラム内を縦横無尽に動き回ることになります。上から下に向かって命令が実行されるという基本的な順番は一応守られていますが、場合によってはアッチへいったりコッチへいったり、実行したり実行しなかったりするようになります。</p>

<p>それは制御文が加わるからです。制御文はプログラムが実行される流れを色々なパターンへ対応させ、プログラムの幅を大きく拡げてくれるものです。制御文として大事な要素は2つです。</p>

<ul>
  <li>条件分岐</li>
  <li>繰り返し</li>
</ul>

<p>条件分岐は、ある条件を指定して、その条件に合っていればコードを実行し、そうでなければ別のコードを実行するというような、条件によって実行される処理を分岐させるものです。</p>

<p>繰り返しは、例えば回数を指定してその回数だけ同じ処理を実行したり、条件分岐と組み合わせて特定の状態になるまで永遠に同じ処理を繰り返す、といったことができます。</p>

<p>さらに、このレッスンでは「関数」というものについて見ていきます。</p>

<p>まずは条件分岐について学びましょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. 条件分岐</h2><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 if文</h3><p>条件分岐文の代表は <strong>if文</strong> です。英語でもifは「もし〜ならば」という訳になります。プログラムでも同じく、「もし、この変数が0以上であれば」のような条件を付けて、処理を分岐させることができます。</p>

<p>この条件分岐で活躍するのが、比較演算子( <code>==</code> や <code>&lt;</code> など)と、論理型の値（ <code>true</code> と <code>false</code> ）です。</p>

<p>プログラムにおいて予め全ての値を予測することは不可能です。もしそうであれば、プログラムは必要ありません。答えがわかっているからです。</p>

<p>ユーザの入力値について考えてみましょう。例えばアンケート。「スマートフォンアプリを作りたい人はYes, 作りたくない人はNoと書いてください」というアンケートをWeb上で実施したとします。特定の一人の回答者が何を書くか、それは予想できないものであり、どちらも取り得る値だと言えます。</p>

<p>しかし、<strong>あらかじめ値を予想して「こういうときはこうしてくれ」というプログラムを書いておくことはできます。</strong> 例えば、先ほどのアンケートでYesを答えた人には、スマートフォンアプリを開発できるサービスを紹介するという条件分岐をプログラムに仕込んでおくことができます。</p>

<p>つまり、開発者が回答に対する条件分岐をプログラムとして書いておいて、コンピュータがそれを忠実に実行するというわけです。コンピュータは、そこまで書いてくれないと処理できません。条件分岐はコンピュータに判断させる手段となります。</p>

<p>if文では、状況に応じてコンピュータに判断させるために、いくつかの場合に分けて処理を書きます。PHPでif文を書いてみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 10 &gt; 5 は正しいので、true と評価される。 if (true) となるので { } の中が実行される</span>
    <span class="keyword">if</span> (<span class="integer">10</span> &gt; <span class="integer">5</span>) {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">ここだけ表示される</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }

    <span class="comment">// 10 &lt;= 5 は間違いなので、 false と評価される。if (false) となるので { } の中は実行されない</span>
    <span class="keyword">if</span> (<span class="integer">10</span> &lt;= <span class="integer">5</span>) {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">ここには絶対来ない</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>上記のコードを保存し、実行してみましょう。<code>if (10 &gt; 5) { ... }</code>のほうだけが実行され、<code>if (10 &lt;= 5) { ... }</code> のほうは無視されます。if文は直後の<code>()</code>の中に書いてある条件が<code>true</code>（真）であれば実行されます。そのため、今回のコードは<code>if (10 &gt; 5)</code>の書いてあるほうの<code>{...}</code>の中身しか実行されません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 if-else文</h3><p>また、<strong>else文</strong> を書くことで、if文の条件式が <code>false</code> の場合に実行させる処理を記述することができます。if文が実行されるとelse文は実行されず、if文が実行されないとelse文が実行されるようになります。elseは「その他」を意味する英単語です。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="keyword">if</span> (<span class="integer">10</span> == <span class="integer">5</span>) {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">10 == 5 は false なのでここは実行されない</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">else</span> {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">if側が実行されないので、ここだけ実行される</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>毎回同じところに処理が行ってはつまらないので、ランダムな数字を生成してif文の動きを見ていきましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$number</span> = mt_rand() % <span class="integer">10</span>;

    <span class="keyword">if</span> (<span class="local-variable">$number</span> &lt; <span class="integer">5</span>) {
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="string"><span class="delimiter">'</span><span class="content">は5より小さい数</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">else</span> {
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="string"><span class="delimiter">'</span><span class="content">は5以上の数</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>上記の<em>test.php</em>を10回ほど実行してみてください。<code>$number</code>の値が実行するたびに変わって、それによって表示される文字列もif文によって変わったはずです。</p>

<p><code>mt_rand()</code>はランダムな数を生成します。このとき生成される数は0 〜 2147483647(2の31乗)の中に収まります。これほど大きな数ではなくて、0 〜 9までのランダムの数が欲しいときは、<code>mt_rand()</code>で取得した数の一桁目だけを取り出せば良さそうです。一桁目を取りだすには10で割った余りを見れば良いので、<code>mt_rand() % 10</code>という計算をして、<code>$number</code>に 0 〜 9までのランダムな数を代入します。</p>

<p>次にif文の動きを見ていきましょう。<code>$number</code> に <code>$number &lt; 5</code> な条件を満たす数（0 〜 4）が来れば、<code>$number &lt; 5</code> は <code>true</code> を返すので、if文が実行され、<code>1は5より小さい</code> というような表示がされます。逆に <code>$number</code> に <code>$number &lt; 5</code> な条件を満たさない数（5 〜 9）が来れば、<code>$number &lt; 5</code> は <code>false</code> を返すのでelse文のほうが実行されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 if-elseif-else文</h3><p>更に、<code>elseif</code> を加えれば条件を3パターン以上に増やすことができます。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$number</span> = mt_rand() % <span class="integer">10</span>;

    <span class="keyword">if</span> (<span class="local-variable">$number</span> &lt; <span class="integer">3</span>) {
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="string"><span class="delimiter">'</span><span class="content">は3より小さい数</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">elseif</span> (<span class="local-variable">$number</span> &lt; <span class="integer">6</span>) {
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="string"><span class="delimiter">'</span><span class="content">は3以上で6より小さい数</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">elseif</span> (<span class="local-variable">$number</span> &lt; <span class="integer">8</span>) {
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="string"><span class="delimiter">'</span><span class="content">は6以上で8より小さい数</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">else</span> {
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="string"><span class="delimiter">'</span><span class="content">は8か9しか来ません</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/php/6-2.png" alt=""></p>

<p>これで条件分岐は完璧です。if-elseif-elseの中に必要な条件を書けば、条件によって処理を分岐させることができます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-4">2.4 （補足）switch文</h3><p>下記のような if-elseif-else 文のプログラムを作ってみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$num1</span> = <span class="integer">8</span>;
    <span class="local-variable">$num2</span> = <span class="integer">4</span>;
    <span class="local-variable">$opr</span> = <span class="string"><span class="delimiter">'</span><span class="content">*</span><span class="delimiter">'</span></span>;
    
    <span class="keyword">if</span> (<span class="local-variable">$opr</span> == <span class="string"><span class="delimiter">'</span><span class="content">+</span><span class="delimiter">'</span></span>) {
        <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">+</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> + <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">elseif</span> (<span class="local-variable">$opr</span> == <span class="string"><span class="delimiter">'</span><span class="content">-</span><span class="delimiter">'</span></span>) {
        <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">-</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> - <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">elseif</span> (<span class="local-variable">$opr</span> == <span class="string"><span class="delimiter">'</span><span class="content">*</span><span class="delimiter">'</span></span>) {
        <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">*</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> * <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">elseif</span> (<span class="local-variable">$opr</span> == <span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>) {
        <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> / <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
    }
    <span class="keyword">else</span> {
        <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">エラーです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>上記のコードを実行すると <code>8*4=32</code> と表示されます。<code>$opr</code> に代入する記号を <code>+</code> や <code>-</code> 、<code>/</code>に変えて再実行してみましょう。他の記号や文字を <code>$opr</code>  に代入して実行すると <code>エラーです</code> と表示されますので、併せて確認してみてください。</p>

<p>このように、全ての条件式が <code>==</code> （指定したデータと同値かどうかの判定）を使っている場合、<strong>switch文</strong> に置き換えることができます。スイッチというくらいなので、テレビのリモコンのように「1が押された」「2が押された」というのをイメージしてください。</p>

<p>先ほどのプログラムを switch文 で置き換えたプログラムを作ってみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$num1</span> = <span class="integer">8</span>;
    <span class="local-variable">$num2</span> = <span class="integer">4</span>;
    <span class="local-variable">$opr</span> = <span class="string"><span class="delimiter">'</span><span class="content">*</span><span class="delimiter">'</span></span>;
    
    <span class="keyword">switch</span>(<span class="local-variable">$opr</span>) {
        <span class="keyword">case</span> <span class="string"><span class="delimiter">'</span><span class="content">+</span><span class="delimiter">'</span></span>:
            <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">+</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> + <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
            <span class="keyword">break</span>;
        <span class="keyword">case</span> <span class="string"><span class="delimiter">'</span><span class="content">-</span><span class="delimiter">'</span></span>:
            <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">-</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> - <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
            <span class="keyword">break</span>;
        <span class="keyword">case</span> <span class="string"><span class="delimiter">'</span><span class="content">*</span><span class="delimiter">'</span></span>:
            <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">*</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> * <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
            <span class="keyword">break</span>;
        <span class="keyword">case</span> <span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span>:
            <span class="predefined">print</span> <span class="local-variable">$num1</span> . <span class="string"><span class="delimiter">'</span><span class="content">/</span><span class="delimiter">'</span></span> . <span class="local-variable">$num2</span> . <span class="string"><span class="delimiter">'</span><span class="content">=</span><span class="delimiter">'</span></span> . (<span class="local-variable">$num1</span> / <span class="local-variable">$num2</span>) . <span class="predefined-constant">PHP_EOL</span>;
            <span class="keyword">break</span>;
        <span class="keyword">default</span>:
            <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">エラーです</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>このプログラムは最初のプログラムと同じように動作しますので、確認してみてください。</p>

<p>いくつか補足します。</p>

<h4>switchの後ろの ( )</h4>

<p>この <code>( )</code> の中に入れた変数が <code>==</code> の条件式の左辺に該当します。<code>( )</code> に指定した変数の中身について「○○と同じ値かどうか」を調べます。</p>

<h4>case と default</h4>

<p><code>case ○:</code> と書かれた部分が if や elseif における <code>==</code> の条件式の右辺に該当します。<code>switch($xyz)</code> としていたときに <code>case 2:</code> と書いた場合は <code>$xyz == 2</code> の条件式と同じ意味になります。条件を満たしている場合は、次の行からの処理が実行されます。上記の例のように <code>case</code> よりもインデントを1つ分追加して、処理を書いてください。</p>

<p>また、全ての条件を満たさない場合の処理は <code>default:</code> の中に書きましょう。<code>else:</code> ではなく <code>default:</code> です。</p>

<h4>break</h4>

<p>各 <code>case</code> が満たしているときの処理の終わりには <strong>break文</strong> を入れてください。break文が無いと、そのまま下の処理が続けて実行されてしまいます。仮に上のプログラムで全て <code>break</code> を抜いた場合、表示内容が以下のようになります。</p>

<pre><code>8*4=32
8/4=2
エラーです
</code></pre>

<h4>{ } の有無</h4>

<p>switch文全体は <code>{ }</code> で囲ってください。各 <code>case</code> に対して <code>{ }</code> は付け加えないようにしましょう。</p>
</div></section><section id="chapter-3"><h2 class="index">3. 繰り返し（ループ）</h2><div class="subsection"><p>条件分岐に続いて、同じく制御文である「繰り返し」を学びます。繰り返しは、例えば回数を指定してその回数だけ同じ処理を実行したり、条件分岐と組み合わせて特定の状態になるまで永遠に処理を繰り返す、といったことが可能です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 for文</h3><p>まずは最もわかりやすい for文 から紹介します。<strong>回数が決まっている繰り返し処理</strong> を作りたいときに for文 を使います。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt;= <span class="integer">10</span>; <span class="local-variable">$i</span>++) {
        <span class="predefined">print</span> <span class="local-variable">$i</span> . <span class="string"><span class="delimiter">'</span><span class="content">回目</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>これを実行すると、1回目から10回目まで、計10回繰り返されます。回数によって同じ処理が繰り返されますが、処理が繰り返される中で値が一定の変化をしていく「繰り返し変数（カウンタ変数とも呼ばれます）」を使うことで、表示される内容を、そのときによって変えることができます。</p>

<p><em>実行結果</em></p>

<pre><code>1回目
2回目
3回目
4回目
5回目
6回目
7回目
8回目
9回目
10回目
</code></pre>

<p><code>($i = 1; $i &lt;= 10; $i++)</code> の書式 <code>(繰り返し変数の初期化; 繰り返し変数の条件; 繰り返し変数の増加)</code>となっています。今回は<code>$i</code>が繰り返し変数で、最初に <code>1</code> で初期化されて、<code>$i &lt;= 10</code> が <code>false</code> となるまで（<code>$i</code>が <code>10</code> を超えるまで）繰り返され、<code>++</code> によって <code>$i</code> が <code>1</code> ずつ増えていきます。</p>

<p>for文は配列と相性が良い繰り返し文です。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [<span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ぶどう</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">桃</span><span class="delimiter">'</span></span>];
    <span class="local-variable">$count</span> = <span class="predefined">count</span>(<span class="local-variable">$fruits</span>);         <span class="comment">// 配列の中身の数を$countへ代入</span>
    <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="integer">0</span>; <span class="local-variable">$i</span> &lt; <span class="local-variable">$count</span>; <span class="local-variable">$i</span>++) {
        <span class="predefined">print</span> <span class="local-variable">$i</span> . <span class="string"><span class="delimiter">'</span><span class="content">番目: </span><span class="delimiter">'</span></span> . <span class="local-variable">$fruits</span>[<span class="local-variable">$i</span>] . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果</em></p>

<pre><code>0番目: リンゴ
1番目: バナナ
2番目: オレンジ
3番目: ぶどう
4番目: 桃
</code></pre>

<p>このようにして、配列を列挙することもできます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 while文</h3><p>次に、何回繰り返し処理をすればよいかわからない場合について説明します。ここでは、ランダムな数値（0 〜 9）で、9が出るまで繰り返す処理を書きます。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 変数の初期化</span>
    <span class="local-variable">$number</span> = <span class="integer">0</span>;

    <span class="keyword">while</span> (<span class="local-variable">$number</span> != <span class="integer">9</span>) {
        <span class="local-variable">$number</span> = mt_rand() % <span class="integer">10</span>;
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/first-programming/php/6-3.png" alt=""></p>

<p>このような、回数のわからない繰り返しを書く場合は <strong>while文</strong> を使いましょう。</p>

<p>このプログラムを何度も実行していると、9が出るまで何回も繰り返したり、1回目で出たりするでしょう。<code>($number != 9)</code> のところは条件文になっています。この条件文が <code>true</code> を返す限り何度も繰り返されます。これが <code>false</code> となって繰り返し処理が終了するのは、<code>$number</code> が <code>9</code> になったときだけです。</p>

<p>なお、最初に <code>$number = 0</code> としていますが、<code>while ($number != 9)</code> のところで <code>$number != 9</code> という条件を判定するので、その前に <code>$number</code> には何らかの値を代入しておく必要があります。 <code>$number</code> に代入する数値は <code>0</code> である必要はなく、 <code>1</code> でも <code>2</code> でもOKです（ <code>9</code> だと即終了するので注意しましょう）。</p>

<p>今度は <code>9</code> が出るまで何回かかったかカウントする機能を追加しましょう。おさらいですが <code>++</code> は1だけ繰り上がる演算子です。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$count</span> = <span class="integer">0</span>;
    <span class="local-variable">$number</span> = <span class="integer">0</span>;

    <span class="keyword">while</span> (<span class="local-variable">$number</span> != <span class="integer">9</span>) {
        <span class="local-variable">$number</span> = mt_rand() % <span class="integer">10</span>;
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="predefined-constant">PHP_EOL</span>;
        <span class="local-variable">$count</span>++;
    }

    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">9が出るまで</span><span class="delimiter">'</span></span> . <span class="local-variable">$count</span> . <span class="string"><span class="delimiter">'</span><span class="content">回かかった。</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<h4>（補足）do-while文</h4>

<p>while文は繰り返し処理が実行される前に条件式を判定します。反対に、繰り返し処理をひととおり実行してから条件式を判定する <strong>do-while文</strong> も存在します。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$count</span> = <span class="integer">0</span>;
    <span class="local-variable">$number</span> = <span class="integer">0</span>;

    <span class="keyword">do</span> {
        <span class="local-variable">$number</span> = mt_rand() % <span class="integer">10</span>;
        <span class="predefined">print</span> <span class="local-variable">$number</span> . <span class="predefined-constant">PHP_EOL</span>;
        <span class="local-variable">$count</span>++;
    } <span class="keyword">while</span> (<span class="local-variable">$number</span> != <span class="integer">9</span>);

    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">9が出るまで</span><span class="delimiter">'</span></span> . <span class="local-variable">$count</span> . <span class="string"><span class="delimiter">'</span><span class="content">回かかった。</span><span class="delimiter">'</span></span> . <span class="predefined-constant">PHP_EOL</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>動きは while文 の場合とほぼ同じです。唯一異なるのは、3行目で <code>$number = 9;</code> と初期化した場合です。while文の場合は、先述のとおり繰り返し処理が1回も実行されずに即終了します。対して do-while文 の場合は条件式が一連の繰り返し処理の後に記述されているため、繰り返し処理が必ず1回実行されて、その後で条件式を判定します。繰り返し処理の実行回数が「0回の場合がある」か「必ず1回は実行される」かが while文 と do-while文 の違いです。</p>

<p>ひとつ注意点として、do-while文 の場合、<code>while(条件式)</code> の後には必ず <code>;</code> をつけてください。忘れた場合は syntax error になります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 foreach文</h3><p>for文では、回数のカウントを基準に配列を列挙しましたが、foreach文では、配列に代入されている値を直接列挙することができます。</p>

<p>先ほどのfor文でコーディングしたものは、foreach文で下記のようにコーディング可能です。<code>$count</code> を用意する必要がありません。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [<span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ぶどう</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">桃</span><span class="delimiter">'</span></span>];
    <span class="keyword">foreach</span> (<span class="local-variable">$fruits</span> <span class="keyword">as</span> <span class="local-variable">$key</span> =&gt; <span class="local-variable">$fruit</span>) {
        <span class="predefined">print</span> <span class="local-variable">$key</span> . <span class="string"><span class="delimiter">'</span><span class="content">番目: </span><span class="delimiter">'</span></span> . <span class="local-variable">$fruit</span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果</em></p>

<pre><code>0番目: リンゴ
1番目: バナナ
2番目: オレンジ
3番目: ぶどう
4番目: 桃
</code></pre>

<p><code>$fruits as $key =&gt; $fruit</code> は「<code>$fruits</code> から1件取得して、場所の数値を <code>$key</code> に、値を <code>$fruit</code> に代入する」という意味です。ちなみに <code>$key</code> は無くても動作します。その場合「○番目」のカウントはできません。カウントが不要な場合には、 以下のように <code>$key =&gt;</code> 無しで繰り返しを記述してください。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [<span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">ぶどう</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">桃</span><span class="delimiter">'</span></span>];
    <span class="keyword">foreach</span> (<span class="local-variable">$fruits</span> <span class="keyword">as</span> <span class="local-variable">$fruit</span>) {
        <span class="predefined">print</span> <span class="local-variable">$fruit</span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果</em></p>

<pre><code>リンゴ
バナナ
オレンジ
ぶどう
桃
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 （補足）break文とcontinue文</h3><p>繰り返し処理を強制的に終了したいときは <strong>break文</strong>、ある回の繰り返し処理で「以降の処理はスキップして次の回を実行する」ことをしたい場合は <strong>continue文</strong> を使います。if文と組み合わせて使います。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$i</span> = <span class="integer">0</span>;
    <span class="keyword">while</span>(<span class="predefined-constant">true</span>) {
        <span class="local-variable">$i</span>++;
        <span class="keyword">if</span> (<span class="local-variable">$i</span> &gt; <span class="integer">20</span>) {        <span class="comment">// $i が 20を超えていたら繰り返し終了</span>
            <span class="keyword">break</span>;
        }
        
        <span class="keyword">if</span> (<span class="local-variable">$i</span> % <span class="integer">2</span> == <span class="integer">1</span>) {    <span class="comment">// $i が奇数なら以降の処理はスキップ</span>
            <span class="keyword">continue</span>;
        }
        
        <span class="predefined">print</span> <span class="local-variable">$i</span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>ここでは <code>while(true)</code> とすることで、強制的に終了しない限り永遠と繰り返し処理が実行されるようにしています。このようなものを <strong>無限ループ</strong> と言います。あえて無限ループで処理を定義することもありますが、ループを抜ける処理を書き忘れるとプログラムが終了しなくなり、Cloud9のシステムに大きな負荷がかかるので気をつけましょう（無限ループが終わらない場合は <code>Control + c</code> (Windowsの方は <code>Ctrl + c</code>）キーで処理をストップできます）。</p>

<p>無限ループを強制終了するために記述したのが <code>if ($i &gt; 20) { break; }</code> の部分です。繰り返し変数 <code>$i</code> の中身が 20を超えていたら <code>break</code> で強制的にループを抜けます。</p>

<p><code>break</code> でループを抜けなかった場合、次の <code>if ($i % 2 == 1) { continue; }</code> の部分が実行されます。<code>$i</code> の中身が奇数だった場合、<code>continue</code> によって、それ以降の処理（<code>print</code>）が実行されないままループの先頭に戻ります。</p>

<p><code>break</code> でループを抜けず、<code>continue</code> で先頭に戻らなかった場合のみ、一番下の <code>print</code> が実行されます。つまり、このプログラムを実行すると 2 から 20 までの偶数が連続して表示されます。</p>

<p><em>実行結果</em></p>

<pre><code>2
4
6
8
10
12
14
16
18
20
</code></pre>

<p>これで繰り返しは終わりです。繰り返しは、変数や配列、条件分岐と組み合わせることで力を発揮することが理解できたかと思います。</p>
</div></section><section id="chapter-4"><h2 class="index">4. 関数</h2><div class="subsection"><p>関数は処理をひとまとまりの部品にするものです。関数を使って処理を部品化することで、同じ処理が何度でも実行できる状態（再利用可能）になります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/function.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 関数の定義</h3><p>関数には、定義と呼び出しがあります。定義とは、関数を作ることです。呼び出しとは、関数を使うことです。</p>

<p>関数は、<code>function</code>というキーワードを使って作ることができます。例として、<code>1</code>から<code>9</code>までの数字の足し算(<code>1+2+3+...+9</code>)処理について、その結果を表示する関数を作ってみます。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 関数を定義</span>
    <span class="keyword">function</span> <span class="function">sum</span>() {
        <span class="local-variable">$result</span> = <span class="integer">0</span>;
        <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt;= <span class="integer">9</span>; <span class="local-variable">$i</span>++) {
            <span class="local-variable">$result</span> = <span class="local-variable">$result</span> + <span class="local-variable">$i</span>;
        }
        <span class="predefined">print</span> <span class="local-variable">$result</span> . <span class="predefined-constant">PHP_EOL</span>;
    }
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>関数の定義はできましたので、この <code>sum()</code> 関数を呼び出してみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 関数の呼び出し</h3><p>関数を呼び出している部分を追記してください。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 関数を定義</span>
    <span class="keyword">function</span> <span class="function">sum</span>() {
        <span class="local-variable">$result</span> = <span class="integer">0</span>;
        <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt;= <span class="integer">9</span>; <span class="local-variable">$i</span>++) {
            <span class="local-variable">$result</span> = <span class="local-variable">$result</span> + <span class="local-variable">$i</span>;
        }
        <span class="predefined">print</span> <span class="local-variable">$result</span> . <span class="predefined-constant">PHP_EOL</span>;
    }

    <span class="comment">// 関数を呼び出し</span>
    sum();            <span class="comment">// ここで関数が実行され1~9の足し算結果が表示される</span>
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果</em></p>

<pre><code>45
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 関数は何度でも利用できる（再利用）</h3><p>一度関数を定義しておくと、何度でも再利用できます。つまり、この例では何度も for文 で処理を書かなくても <code>sum()</code> と書くだけで良いということになります。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 関数を定義</span>
    <span class="keyword">function</span> <span class="function">sum</span>() {
        <span class="local-variable">$result</span> = <span class="integer">0</span>;
        <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="integer">1</span>; <span class="local-variable">$i</span> &lt;= <span class="integer">9</span>; <span class="local-variable">$i</span>++) {
            <span class="local-variable">$result</span> = <span class="local-variable">$result</span> + <span class="local-variable">$i</span>;
        }
        <span class="predefined">print</span> <span class="local-variable">$result</span> . <span class="predefined-constant">PHP_EOL</span>;
    }

    <span class="comment">// 関数を呼び出し</span>
    sum();
    sum();
    sum();
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果</em></p>

<pre><code>45
45
45
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 関数の引数（ひきすう）</h3><p><code>function sum()</code>として関数を定義しましたが、関数に引数（ひきすう）を渡すこともできます。例えば、<code>1</code> から <code>9</code> ではなくて、動的に与えられた数値の範囲（<code>$a</code> から <code>$b</code> まで）で足し算を行いたい場合には、下記のように関数を定義し、呼び出します。<code>1</code> から <code>$a</code> へ代わったところ、<code>9</code> から <code>$b</code> へ代わったところに注目してください。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 関数を定義</span>
    <span class="keyword">function</span> <span class="function">sum</span>(<span class="local-variable">$a</span>, <span class="local-variable">$b</span>) {
        <span class="local-variable">$result</span> = <span class="integer">0</span>;
        <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="local-variable">$a</span>; <span class="local-variable">$i</span> &lt;= <span class="local-variable">$b</span>; <span class="local-variable">$i</span>++) {
            <span class="local-variable">$result</span> = <span class="local-variable">$result</span> + <span class="local-variable">$i</span>;
        }
        <span class="predefined">print</span> <span class="local-variable">$result</span> . <span class="predefined-constant">PHP_EOL</span>;
    }

    <span class="comment">// 関数を呼び出し</span>
    sum(<span class="integer">1</span>, <span class="integer">9</span>);
    sum(<span class="integer">1</span>, <span class="integer">1000</span>);
    sum(<span class="integer">1000</span>, <span class="integer">9999</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果</em></p>

<pre><code>45
500500
49495500
</code></pre>

<p>全く同じ処理ではなく、応用を効かせた使い方もできることがわかりました。</p>

<div class="alert alert-info">
（補足） <code>function</code> 文で定義した関数の <code>$a</code>、<code>$b</code> を<strong>仮引数</strong>、<code>sum</code> 関数を実行する時に受け渡した <code>1</code> や <code>9</code> などの数字を<strong>実引数</strong>と呼びます。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-4-5">4.5 関数のreturn（戻り値）</h3><p>また、関数を呼び出す度に表示させるのではなく、結果 (<code>$result</code>) の値を何らかの変数に代入して保管しておきたいときには、関数の定義の最後で <code>return</code> キーワードを使います。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 関数を定義</span>
    <span class="keyword">function</span> <span class="function">sum</span>(<span class="local-variable">$a</span>, <span class="local-variable">$b</span>) {
        <span class="local-variable">$result</span> = <span class="integer">0</span>;
        <span class="keyword">for</span> (<span class="local-variable">$i</span> = <span class="local-variable">$a</span>; <span class="local-variable">$i</span> &lt;= <span class="local-variable">$b</span>; <span class="local-variable">$i</span>++) {
            <span class="local-variable">$result</span> = <span class="local-variable">$result</span> + <span class="local-variable">$i</span>;
        }
        <span class="keyword">return</span> <span class="local-variable">$result</span>;
    }

    <span class="comment">// 関数を呼び出し</span>
    <span class="local-variable">$sum1</span> = sum(<span class="integer">1</span>, <span class="integer">9</span>);
    <span class="local-variable">$sum2</span> = sum(<span class="integer">1</span>, <span class="integer">1000</span>);
    <span class="local-variable">$sum3</span> = sum(<span class="integer">1000</span>, <span class="integer">9999</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>これを実行しても何も表示されませんが、<code>$sum1</code>, <code>$sum2</code>, <code>$sum3</code>には先ほどと同じ数字が入っています。この結果を表示するのも、他の計算に利用するのも自由です。</p>

<p><code>return</code> を関数内に指定したことで、関数が渡してくれる値のことを <strong>戻り値（返り値）</strong> と言います。</p>
</div></section><section id="chapter-5"><h2 class="index">5. まとめ</h2><div class="subsection"><p>命令を制御する仕組みである「条件分岐」「繰り返し」「関数」について学びました。</p>

<p>これらを駆使すると、作れるプログラムの幅が大きく広がります。ぜひ、何度も復習して身につけてください。</p>

<p>また、課題を用意していますので、挑戦しましょう。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-php-2">課題：FizzBuzzの関数の作成</h3><p>「kadai-fizzbuzz.php」という名前でPHPファイルを用意してください。その中に「FizzBuzz」の関数を作成し、利用するプログラムを作成してください。</p>

<h4>仕様</h4>

<h5>FizzBuzzの関数の仕様</h5>

<ul>
  <li>特定の正の整数値を引数として受け取ります</li>
  <li>その数値によって戻り値が変わるようにしてください（条件は下記のとおりです）
    <ul>
      <li>数値が3の倍数であれば、戻り値は”Fizz”</li>
      <li>数値が5の倍数であれば、戻り値は”Buzz”</li>
      <li>数値が3の倍数であり5の倍数でもある場合は、戻り値は”FizzBuzz”</li>
      <li>上記のどれも満たさない場合は、その数値自体を戻り値にする</li>
    </ul>
  </li>
</ul>

<h5>FizzBuzzの関数の使い方</h5>

<ul>
  <li>最初に下記の1行を記述してください。</li>
</ul>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$max</span> = <span class="integer">100</span>;
</pre></div>
</div>
</div>

<ul>
  <li>1から <code>$max</code> までの整数値についてループを作り、FizzBuzzの関数を実行します</li>
  <li>FizzBuzzの関数の戻り値を表示してください</li>
</ul>

<p>正しく書かれたプログラムを実行した結果を下記に示します。</p>

<h4>実行結果</h4>

<pre><code>1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
16
17
Fizz
19
Buzz
Fizz
22
23
Fizz
Buzz
26
Fizz
28
29
FizzBuzz
31
32
Fizz
34
Buzz
Fizz
37
38
Fizz
Buzz
41
Fizz
43
44
FizzBuzz
46
47
Fizz
49
Buzz
Fizz
52
53
Fizz
Buzz
56
Fizz
58
59
FizzBuzz
61
62
Fizz
64
Buzz
Fizz
67
68
Fizz
Buzz
71
Fizz
73
74
FizzBuzz
76
77
Fizz
79
Buzz
Fizz
82
83
Fizz
Buzz
86
Fizz
88
89
FizzBuzz
91
92
Fizz
94
Buzz
Fizz
97
98
Fizz
Buzz
</code></pre>

<h4>ヒント</h4>

<p>まずは <em>fizzbuzz</em> という名前の関数を定義し、1・3・5・15などの具体的な引数を渡して、適切な出力になるようにしてみましょう。</p>

<p><em>kadai-fizzbuzz.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
<span class="comment">// 以下の4行は動作確認用の記述です。</span>
<span class="predefined">print</span> fizzbuzz(<span class="integer">1</span>) . <span class="predefined-constant">PHP_EOL</span>;
<span class="predefined">print</span> fizzbuzz(<span class="integer">3</span>) . <span class="predefined-constant">PHP_EOL</span>;
<span class="predefined">print</span> fizzbuzz(<span class="integer">5</span>) . <span class="predefined-constant">PHP_EOL</span>;
<span class="predefined">print</span> fizzbuzz(<span class="integer">15</span>) . <span class="predefined-constant">PHP_EOL</span>;

<span class="keyword">function</span> <span class="function">fizzbuzz</span>(<span class="local-variable">$num</span>) {
    <span class="comment">// 内容は省略。自力で考えてみましょう。</span>
}
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>ここまでできた段階でターミナルから <code>php kadai-fizzbuzz.php</code> を試しに実行するとすると以下の出力になります。</p>

<pre><code>1
Fizz
Buzz
FizzBuzz
</code></pre>
</div></section></div>
</body>
</html>