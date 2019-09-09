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
<div class="markdown"><div class="lesson-num p">Lesson5</div><h1 id="php-1">PHP その1
</div></h1>
<section id="chapter-1"><h2 class="index">1. 学習の目標
</div></h2><div class="subsection"><p>ここまでHTML/CSSについて学びました。残念ながら、HTML/CSSはプログラミングの言語ではありません。おさらいすると、HTMLはマークアップ言語と呼ばれるデータ記述言語の一種です。HTMLは文書用の言語ということになります。CSSはHTMLをデザインするためのデザイン言語です。</p>

<p>そして、ここからのレッスンで学ぶPHPが、本コースで学ぶ唯一のプログラミング言語です。PHPはWeb制作のために作られたプログラミング言語で、HTML/CSSとの親和性が高く、かつ学びやすい形になっています。ここからようやくプログラミングのスタートです。</p>

<p>このレッスンでは、まずはPHPが生まれた理由や、PHPの特徴などを学び、PHPの基本文法を学びます。さらに、これ以降のレッスンで、PHPでのプログラミングの作法やPHPをHTMLに埋め込むプログラミングを行います。Webアプリケーション開発の基礎を学んでいきましょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. PHPとは
</div></h2><div class="subsection"><p>繰り返し説明しますが、PHPはプログラミング言語です。HTMLは文書を書くためのマークアップ言語（データ記述言語の一種）であり、CSSは文書をデザインするスタイルシート言語ですので、PHPとは役割が全く違います。PHPはコンピュータに命令するための言語で、コンピュータへの命令書（プログラム）を作成します。これこそがプログラミングです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 PHPの概要
</div></h3><p>PHPは1994年に Rasmus Lerdorf によって生み出されました。元々「Personal Home Page Tools」という名称だったのを「PHP Tools」と略して呼んでいたことから正式に「PHP」という名前になったと言われています。</p>

<p>元々はアクセス履歴を調べるような簡易的なプログラムを作るための言語でしたが、ユーザからの様々な要望を実現していくうちに、他のプログラミング言語に負けず劣らずの大規模な言語に成長しました。</p>

<p>PHPは最初からWeb用途に特化して作られていることもあり、Web制作に関するプログラミング言語の中では非常に学習しやすい言語であると言えます。</p>

<p><a href="https://secure.php.net/" target="_blank">参考：PHP公式サイト</a></p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 PHPのWeb上での役割
</div></h3><p>前のレッスンまでで、HTMLとCSSを使えばWebページを充分に作れることを説明しました。では、プログラミング言語であるPHPの出番は一体どこでしょうか？Webページといってもポートフォリオサイト、ブログサイト、ECサイト、SNSサイトなど色々あります。これらのWebページのどこでプログラミング言語が使用されているのか、一緒に考えてみましょう。</p>

<p>Webページの中でユーザが参加できるパーツは何がありますか？例えば「コメント」ですよね。ブログ記事へのコメントであったり、ECサイトの口コミ、SNSのつぶやきなどです。入力フォーム自体はHTMLを記述することで配置できますが、実は入力フォームにコメントデータを書いて「送信」ボタンを押したとしても、HTMLだけではどうしようもありません。Webページから送信されたコメントを受け取る人を誰か常に待機させて、その人が受け取ったコメントを基にHTMLを書き直して上書き保存をすれば何とかなるかもしれません。しかし、人間がそのような対応を24時間365日ずっと続けることは現実的ではありません。</p>

<p>そこでプログラムの登場です。プログラムが人間の代わりにコメントを受け取り、送られてきたコメントを表示するようにHTMLを更新する作業をします。PHPは <strong>HTMLの中に埋め込むようにプログラムを書いておく</strong> ことができます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">user_comment</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;p&gt;</span>（ここにコメントを受け取ったら表示するプログラムを書いておく）<span class="tag">&lt;/p&gt;</span>
<span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>上記のHTMLに埋め込まれたプログラムによって、コメントを受け取れば自動的にそのコメントをHTMLに反映することができます。</p>

<p>このようにHTMLの中にプログラムを埋め込み、ユーザのアクションによってHTMLが書き換わるWebページを<strong>動的なWebページ</strong>と呼びます。反対に、いつ見ても同じで、ユーザのアクションに対して反応がないWebページを<strong>静的なWebページ</strong>と呼びます。プログラミング言語を使えば、動的なWebページを作成することができるのです。そして、動的なWebページを作れるということは、Webページにコメント機能をつけたり、買い物機能をつけたり、ログイン機能をつけたりすることができるようになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 PHPで表示内容を変える
</div></h3><p>例えば、下記のようなHTMLの一文があったとします。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>こんにちは、太郎さん。<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>これでは、どんな名前の人が来ても<code>太郎さん</code>に対してしか挨拶することができません。</p>

<p>これを下記のようにプログラムを使って<code>（入力フォームで受けとった人の名前）</code>を表示できるようにすれば、ちゃんと相手の名前を判断して挨拶することができそうです。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>こんにちは、（入力フォームで受けとった人の名前）さん。<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>更に時間帯によって、「おはよう」や「こんばんは」と言い換えることもできます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;p&gt;</span>（時間帯によって言い方を変えた挨拶）、（入力フォームで受けとった人の名前）さん。<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>このように、Webプログラミングを行うことで、時間帯や名前など条件によって適切な文言を出し分けることができます。そうなれば、HTMLは受け取ったデータを表示する単なる入れ物（雛形）になります。<code>&lt;p&gt; 、 さん。&lt;/p&gt;</code>という雛形の適切な場所に、プログラムによって出し分けされたデータが埋め込まれます。</p>

<p>後ほど、この挨拶だけのWebアプリケーション（動的なWebページ）を作成してみますので、そこで深く理解できるはずです。</p>

<h4>探してみよう</h4>

<p>よく利用しているWebサービス(TechAcademyのページでも良いです)などで、どこが文言の出し分けされている箇所か探してみましょう。例えば、ログイン機能があるWebサービスであれば、名前やメールアドレスの表示部分は間違いなくプログラムによって出し分けされています。また、FacebookやTwitterのコメントやツイートも、実はHTML側には雛形しか用意されておらず、コメントやツイートの内容がその雛形に入れられて表示されています。雛形に文字情報を入れるのもプログラムの役割です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-4">2.4 なぜPHPを選ぶか
</div></h3><p>数あるプログラミング言語の中でも本コースではPHPを学びます。PHPを選ぶ理由は大きく2つあります。</p>

<p>1つ目に、PHPは最初から動的なWebページを作成するために作られたプログラミング言語だということです。これはPHPの最大の特徴です。動的なWebページ制作において、最も簡単に学べるプログラミング言語であると言えます。他のプログラミング言語の多くはWebページ制作を目的として作られておらず、後々Webページ制作にも使われるようになってきたという経緯があります。</p>

<p>2つ目に、PHPは多くのWebサービスで使用されている実績があります。Yahoo! JAPANや、Facebookのような大規模なWebサービスもPHPで作成されています。また、ブログやコーポレートサイトを作るためのCMS（詳細は後述を参照）として有名なWordPressもPHPで作成されています。PHPを学んでいけば、大規模なWebサービスや、WordPressのカスタマイズなども可能になります。</p>

<div class="alert alert-info">
<strong>コラム：CMSとは何か</strong><br>
CMSは「Content Management System（コンテンツ管理システム）」の略称です。HTML/CSSをあまり知らなくてもWebページを構築・運営できるシステムです。個人だけでなく商用利用においても一般的なツールとなっております。<br>
CMSには商用のシステムもありますが「オープンソースソフトウェア」のCMSも存在します。オープンソースは「誰でも書き直して使っていいよ」と謳っている親切なフリーソフトウェアです。<br>
なお、最近の企業Webサイト・企業ホームページでは、ブログのシステムをCMSとして利用したものが増えており、特にWordPressを用いて管理者やマーケターがブログの作成・管理業務を担うことが多くなっています。
</div>
</div></section><section id="chapter-3"><h2 class="index">3. PHPプログラミングの基本的なルール
</div></h2><div class="subsection"><p>ここからは実際にPHPファイルを作成し、実行していきます。</p>

<p>Cloud9を開きましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 PHPファイル
</div></h3><p>PHPファイルも、HTMLファイルやCSSファイルと同じくテキストファイルです。拡張子は<em>.php</em>です。</p>

<p>HTMLファイルと同じように、Cloud9上で編集・保存していきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 プログラムが動く順番は上から下（逐次処理）
</div></h3><p>PHPに限らずプログラムは、人間が文章を読むように、<strong>上から下、同じ行なら左から右</strong>へ向かって記述内容が解釈され、命令が実行されていきます。下記のようにPHPファイルのソースコードがあると、このプログラムは<code>PHPの命令1</code>を最初に実行し、次に<code>PHPの命令2</code>、最後に<code>PHPの命令3</code>を実行することになります。</p>

<pre><code>PHPの命令1
PHPの命令2
PHPの命令3
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 "こんにちは"と表示してみる
</div></h3><h4>PHPファイルへの命令の書き方</h4>

<p>PHPはHTMLに埋め込めるように開発されたプログラミング言語です。そのため、HTMLのタグのようなもので囲うのがルールとなっています。開始タグには<code>&lt;?php</code>を使い、終了タグには<code>?&gt;</code>を使います。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    開始タグと終了タグの中にPHPプログラムを書く
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>今後のPHPプログラムでもこの開始と終了をしっかり宣言しておきましょう。</p>

<p>また、phpタグ内では <strong>インデント</strong> を1つ下げて見やすくしています。インデントは、行の先頭に半角スペースを入れて字下げすることを言います。以降では、PHPのインデントの1単位は <strong>半角スペース4つ分</strong> としています（なお、スペースの数について絶対的な決まりはありません）。</p>

<h4>print</h4>

<p><code>print</code>という命令はデータを表示するときに使用します。Cloud9でファイルを新しく作り、その名前を <em>test.php</em> としてください。<em>test.php</em> をダブルクリックしてエディタ画面で開き、下記の内容を入力して、保存してください。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>Cloud9上で、 <em>test.php</em> を作成しましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/php_cloud9_01.png" alt=""></p>

<p>実際に上記コードをCloud9でプログラミングして<em>test.php</em>として保存してください。<code>'</code>（シングルクォーテーション）のところは<code>"</code>（ダブルクォーテーション）でも問題なく動作します。どちらかを書いてください。</p>

<p><em>test.php（ダブルクオーテーション版）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="predefined">print</span> <span class="string"><span class="delimiter">"</span><span class="content">こんにちは</span><span class="delimiter">"</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>いずれの場合でも <code>print 'こんにちは';</code> の行末の <code>;</code> は必ずつけてください。<code>;</code> は1つの命令の終わりを指定するために入力する記号です。日本語でも文末には <code>。</code> を書くのが決まっているのと同じだと思ってください。PHPでは「命令文の文末で <code>;</code> をつけなければいけない」と覚えておきましょう（厳密に言えば、最後のPHPの命令には <code>;</code> をつける必要はありませんが、全ての命令の文末に <code>;</code> をつけることが必須だと覚えておいた方が無難です）。</p>

<h4>命令を書いたPHPファイルを実行する</h4>

<p>多くのプログラミング言語は、ターミナル上で動作します。PHPも例外ではなく、ターミナル上で動作させることができます。ターミナルには、<code>php</code> というコマンドが用意されており、このコマンドがPHPファイルを実行するためのコマンドになります。</p>

<p>ターミナルの <code>php</code> コマンドを使用して <em>test.php</em> を実行してみましょう。</p>

<p><em>ターミナルで実行($は入力しない)</em></p>

<pre><code>$ php test.php
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/php_cloud9_02.png" alt=""></p>

<p>上記のように実際にターミナル上で <code>php test.php</code> と打ち込んで <kbd>Enter</kbd> キー（Macの場合は <kbd>return</kbd> キー）を押してください。そうすることで、PHPのプログラムが実行されます。<code>こんにちは</code> がターミナルに表示されたでしょうか？表示されれば、プログラムが正常に実行できたことになります。今後は何かあれば上記の方法でPHPファイルを実行してください。</p>

<h4>複数の命令を実行する</h4>

<p>次に、<em>test.php</em> を以下のように書き換え、複数の <code>print</code> を実行するようにしてみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">おはよう</span><span class="delimiter">'</span></span>;
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">こんにちは</span><span class="delimiter">'</span></span>;
    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">おやすみ</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>実行すると、以下のように表示されます。</p>

<pre><code>ec2-user:~/environment $ php test.php
おはようこんにちはおやすみec2-user:~/environ
</code></pre>

<p>3つ並べた <code>print</code> は、上から記述した順に実行されたことがわかります。</p>

<h4>エラーについて</h4>

<p>先ほどの <em>test.php</em> において、最初の <code>print 'おはよう';</code> の <code>print</code> を、わざと <code>prnt</code> に書き換えて保存し、プログラムを実行してみましょう。すると、<code>syntax error</code> という文字列が表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/php_cloud9_error_01.png" alt=""></p>

<p>確認できたら、一旦もとの <code>print 'おはよう';</code> に戻し、今度は行末の <code>;</code> を外して <code>print 'おはよう'</code> とした状態で保存し、プログラムを実行してください。同様に <code>syntax error</code> と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/laravel/php/php_cloud9_error_02.png" alt=""></p>

<p><code>syntax error</code> は「構文エラー」という意味で、PHPの正しい文法書式に沿っていないために表示されるエラーです。エラー表示の後ろの方に <code>(ファイル名) on line (行数)</code> と表示されるので、エラーが生じた場合に「何行目のあたりでエラーになったか」がわかります。なお、ほとんどの構文エラーはCloud9のエディタが「ここにエラーがありますよ」と赤いマークで教えてくれるので実行しなくても把握できます。</p>

<p>しかし、エラーの種類は多岐にわたっています。決して構文エラーだけではありません。作ったプログラムが意図したとおりに動作しない（エラーの表示内容を見てもわからない）という場合には、メンターに聞いてみましょう。</p>

<h4>実行コマンドの前の$について</h4>

<p>事前準備でPHPをインストールしたときにも見てもらっていますが、コマンドを実行してほしいときには、下記のように <code>$</code> から書きはじめた状態でコマンドの説明をしています。<code>$</code> はターミナルだよという意味に過ぎません（先ほどのキャプチャにあるCloud9のターミナルのところに <code>$</code> があることを確認してください）。そのため、<code>$</code> 以降のコマンドを入力してください。下記の場合は、<code>php test.php</code> が実際のコマンドになります。</p>

<pre><code>$ php test.php
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 コメント
</div></h3><p>ソースコードには <strong>コメント</strong> を書くことができます。</p>

<p>コメントは、PHPとして実行されるときには完全に無視されます。コメントはコンピュータにとっては空白に等しいもので、ソースコードを読む人に向けて書かれるものです。</p>

<p>PHPのコメントの文法は2つあり、<code>//</code> を使った1行だけのコメントや、<code>/* */</code>を使った複数行コメント（1行のみで使ってもOK）があります。1行だけのコメントは <code>#</code> も使えますが <code>//</code> を使う方が一般的です。</p>

<p><em>2種類のコメント</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 1行コメント</span>

    <span class="comment"># 1行コメント</span>

    <span class="comment">/*
        複数行コメント
        複数行コメント
        複数行コメント
    */</span>
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>コメント機能を使って、積極的にソースコードへ説明を追記してください。</p>

<h4>便利なソースコードのコメントアウト</h4>

<p>コメント機能が使われるのはソースコードの説明だけに留まりません。例えば <code>print 'こんにちは';</code> という命令を一時的に無効したいとしましょう。<em>test.php</em> を以下のとおりに上書きしてください。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// コメントアウトでとりあえず無効に！</span>
    <span class="comment">// print 'こんにちは';</span>

    <span class="comment">// 複数行でコメントアウトして無効に！</span>

    <span class="comment">/*
        print 'こんにちは';
        print 'こんにちは';
        print 'こんにちは';
    */</span>

    <span class="predefined">print</span> <span class="string"><span class="delimiter">'</span><span class="content">これだけ動く</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>このように一時的にソースコードを無効にしたいときにもコメントは大活躍します。そしてこれはプログラマは頻繁に使うテクニックです。皆さんも後でエラーに遭遇したときには、このコードがエラーの原因では？と疑うようなコードをコメントアウトして、正常に動くか試してみてください。正常に動くなら、そのコードがエラーの原因です。</p>

<h5>実行してみる</h5>

<p>上書きした上記の <em>test.php</em> を実行してみましょう。</p>

<pre><code>$ php test.php
</code></pre>

<p>コメントアウトされたコードは無視され、<code>これだけ動く</code>だけが表示されるはずです。</p>
</div></section><section id="chapter-4"><h2 class="index">4. 変数
</div></h2><div class="subsection"><p>引き続き、PHPが持つプログラミングのための機能を学んでいきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 変数へデータを代入
</div></h3><p>プログラムは規模が大きくなると、内部で多くの処理が行われます。その際、ある計算処理で出したデータをどこかに保存しておかないと、あとで必要になったときに再度使うことができなくなります。不要だと判断されて勝手に消去されてしまうからです。せっかくコンピュータが導き出した答えをコンピュータに勝手に消去されては困りますよね。</p>

<p>「これは必要なデータだから保存してください」という命令が <strong>変数</strong> への代入（変数にデータを保存）です。変数は、データを保存しておける箱だとイメージしてください。現実的には「変数にデータを代入する処理」というのは「データをコンピュータのメモリに保存する処理」です。メモリに保存しておけば、データは勝手に消去されなくなります。しかし、変数に保存していても、プログラムを終了した場合など一定のルールにもとづいて消去されていきます。それが嫌なときはファイルに書き込んだり、データベースへ保存することになりますが、その方法については後のレッスンで詳しく説明します。</p>

<p>では変数へ代入して、データを一時的に保存してみましょう。</p>

<p><em>test.php（まだ実行しないでください）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$hensuu</span> = <span class="string"><span class="delimiter">"</span><span class="content">何らかのデータ</span><span class="delimiter">"</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><code>$hensuu</code>が変数で、<code>"何らかのデータ"</code>が変数に保存される文字列データとなります。<code>$</code>の後に英数字を付けると変数になります（この <code>$</code> はターミナルの<code>$</code>とは無関係です）。</p>

<p>また <code>=</code> は数学でのイコール（左辺と右辺が同じ値という意味）とは違い、「右辺のデータを左辺の変数に代入する」という命令を表しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 変数の中のデータを参照する
</div></h3><p><code>print</code> で <code>$hensuu</code> に代入した値を表示する命令を <em>test.php</em> に追加します。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$hensuu</span> = <span class="string"><span class="delimiter">"</span><span class="content">何らかのデータ</span><span class="delimiter">"</span></span>;
    <span class="predefined">print</span> <span class="local-variable">$hensuu</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>実際に上記を実行してみましょう。</p>

<pre><code>$ php test.php
</code></pre>

<p><code>何らかのデータ</code>という文字列が表示されるはずです。<code>print</code>に変数が渡されると、<code>$hensuu</code> という変数名の文字列をそのまま表示するのではなく、変数の中に入っている実際のデータ（ここでは <code>何らかのデータ</code> という文字列）が引き出されて表示されます。「引き出す」といっても、変数の中を空っぽにはしません。<code>print</code> で表示するために一旦箱から出すものの、使い終わったら箱の中に戻すイメージです。「ただ中を見るだけ」という意味で捉えてもOKです（もう少し難しい言葉で <strong>参照する</strong> といいます）。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 変数を使う上での注意点
</div></h3><h4>変数名の名づけ方</h4>

<p>変数の特徴として、<strong>自由に</strong> 変数名をつけることができます。学習段階では <code>$a</code> や <code>$b</code> のような1文字だけの変数でも構いませんが、自分なりのプログラムを作るときは、わかりやすい変数名をつけることが重要です。わかりにくい変数名ばかりのプログラムでも、同じ処理が定義されているならコンピュータは全て同じように処理を行います。しかし人間にとって、プログラムの可読性は重要です。プログラムのソースコードは、一緒に開発を行うチームメンバーにも読まれることになるので、誰が読んでも理解しやすいプログラムを書くことを心がけるようにしましょう。</p>

<p>具体例を示します。例えば、下記のように変数名をテキトーに<code>$x</code>とつけて済ませたとします。</p>

<p><em>テキトーな変数への代入</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$x</span> = <span class="integer">86400</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>一回書いたらそれで終わりなプログラムであれば変数名は<code>$x</code>でも良いかもしれませんが、常にメンテナンスされていくプログラムで意味の無い変数名をつけたら、後で振り返ってプログラムを見直したときに「この変数が一体何のために使うものなのか」がわからなくなってしまいます。</p>

<p>では、下記のように<code>$ichiniti_no_byousuu</code>と書けばどうでしょう。この<code>86400</code>が「1日の秒数」だとひと目でわかります。このように変数はデータに名前を付けて保存しておける機能でもあります。ひと目でわかる変数名を心がけましょう。</p>

<p><em>変数名を丁寧に書いた場合</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$ichiniti_no_byousuu</span> = <span class="integer">86400</span>;

    <span class="predefined">print</span> <span class="local-variable">$ichiniti_no_byousuu</span>;  <span class="comment">// printで出力してデータを確認</span>
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<div class="alert alert-info">
今回は日本語読みの変数名にしましたが、プログラミングの世界では英語読みがデファクトスタンダード（事実上の標準ルール）ですので、英語読みの変数名にしましょう。今回の場合では、 <code>$ichiniti_no_byousuu</code> は <code>$seconds_per_day</code> になります。
</div>

<p>右辺の書き方も工夫すると良いでしょう。<code>86400</code> という直接的な数値より、計算過程を書いておくような定義の方がわかりやすいです。</p>

<p><em>更に計算過程を明確にした</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="comment">// 1日の秒数 = 24時間 x 60分 x 60秒</span>
    <span class="local-variable">$ichiniti_no_byousuu</span> = <span class="integer">24</span> * <span class="integer">60</span> * <span class="integer">60</span>;    <span class="comment">// * は 掛け算を意味する記号</span>

    <span class="predefined">print</span> <span class="local-variable">$ichiniti_no_byousuu</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><code>24 * 60 * 60</code> という計算式だけ見ても「これは<code>1日の秒数 = 24時間 x 60分 x 60秒</code>という計算過程をプログラムに含めているのだな」というのが何となくわかります。コンピュータに掛け算の計算をさせても一瞬で完了するので、処理速度には影響しません。それよりも、わかりやすいプログラムを書くことが大事です。</p>

<p>また、コードの記述の１行上に <code>// 1日の秒数 = 24時間 x 60分 x 60秒</code> というようにコメントを添えておくと、後で見返した時により分かりやすくなります。</p>

<div class="alert alert-info">
実際の開発プロジェクトでは、複数人のエンジニアが協力して、開発することも多いので、他の人が見た時にひと目で理解できるように工夫することも重要になってきます。
</div>

<p>更に、<code>24</code> と <code>60</code> が何の数字かを説明しておきたいと考え、下記のように書いても構いません。</p>

<p><em>全てのデータに意味のある名前をつけた</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$ichiniti_no_zikan</span> = <span class="integer">24</span>;
    <span class="local-variable">$ichizikan_no_hun</span> = <span class="integer">60</span>;
    <span class="local-variable">$ippun_no_byou</span> = <span class="integer">60</span>;

    <span class="local-variable">$ichiniti_no_byousuu</span> = <span class="local-variable">$ichiniti_no_zikan</span> * <span class="local-variable">$ichizikan_no_hun</span> * <span class="local-variable">$ippun_no_byou</span>;

    <span class="predefined">print</span> <span class="local-variable">$ichiniti_no_byousuu</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>これでひと目で、それぞれの変数の意味が理解できるようになりました。ただし、大した計算でもないのに変数名が冗長になってしまっており、ここまで詳しく説明する必要はないでしょう。バランスが大事です。</p>

<p>ここまで、数パターンの変数の代入プログラムを書きました。下記をよく理解しておきましょう。</p>

<ul>
  <li>変数はメモリにデータを一時的に保存するために使うもの</li>
  <li>変数の名付け方がプログラムの読みやすさを決める</li>
  <li>読みやすさに関わるプログラムの書き方は様々あり、読みにくくすることも読みやすくすることもできるが、処理速度には大きく影響しない</li>
</ul>

<p>先ほどの「<code>24</code> と <code>60</code> にも変数を用意したコード」を <em>test.php</em> に上書きして、実行してみてください。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$ichiniti_no_zikan</span> = <span class="integer">24</span>;
    <span class="local-variable">$ichizikan_no_hun</span> = <span class="integer">60</span>;
    <span class="local-variable">$ippun_no_byou</span> = <span class="integer">60</span>;

    <span class="local-variable">$ichiniti_no_byousuu</span> = <span class="local-variable">$ichiniti_no_zikan</span> * <span class="local-variable">$ichizikan_no_hun</span> * <span class="local-variable">$ippun_no_byou</span>;

    <span class="predefined">print</span> <span class="local-variable">$ichiniti_no_byousuu</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<pre><code>$ php test.php
</code></pre>

<p><code>86400</code>という数字が表示されるはずです。これは<code>24 * 60 * 60</code>の計算結果です。</p>

<h4>名付けるときに複数の単語が必要な場合</h4>

<p>先ほど青枠の中で、変数名は基本的なセオリーとして、英語読みにするべきという説明をしました。<code>$seconds_per_day</code> のように用途を説明するのに2単語以上が必要な場合、名前の書き方として2通りの方法があります。単語と単語の間を <code>_</code>  で繋ぐ方法（スネークケース）と、2単語目以降の先頭文字を大文字にする方法（キャメルケース）です。<code>$seconds_per_day</code> はスネークケースで、これをキャメルケースで表したら <code>$secondsPerDay</code> となります。今回はスネークケースを使いましたが、キャメルケースにしたらプログラムが動作しなくなる、ということはありません。どちらを使うべきかというよりは、好みの問題や、既存のコードの記述方法に合わせるなど、臨機応変に使い分けることが一般的かもしれません。</p>

<h4>代入されているデータは上書きできる</h4>

<p>データが代入されている変数に、別のデータで上書きすることができます。以下のプログラムを <em>test.php</em> に記述して保存し、実行確認してみましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$hensuu</span> = <span class="string"><span class="delimiter">"</span><span class="content">何らかのデータ</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$hensuu</span> = <span class="string"><span class="delimiter">"</span><span class="content">別の何か</span><span class="delimiter">"</span></span>;
    <span class="predefined">print</span> <span class="local-variable">$hensuu</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<pre><code>$ php test.php
</code></pre>

<p>このプログラムを実行すると <code>別の何か</code> と表示されます。</p>

<p>このように変数は、改めて別のデータを格納することが可能です。逆に言えば、変数を使えれば何でも良いからと <strong>意味もなく同じ変数名を使い回すと、プログラムが意図しない動作をする危険がありますので、注意が必要です。</strong> 変数を上書きするのは、新しい計算結果でデータを更新するなど、明確な意図があるときのみにしましょう。</p>

<h4>別の種類のデータで上書きすることはできる？</h4>

<p><code>"何らかのデータ"</code> のような文字列と <code>86400</code> のような数値は、データの種類として異なっています。PHPでは、変数を上書きする際、既に代入されているデータとは別の種類のデータで上書きすることは <strong>可能です</strong> 。<em>test.php</em> を以下の内容で書き換えて保存し、実行確認してみてください。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$hensuu</span> = <span class="string"><span class="delimiter">"</span><span class="content">何らかのデータ</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$hensuu</span> = <span class="integer">86400</span>;
    <span class="predefined">print</span> <span class="local-variable">$hensuu</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<pre><code>$ php test.php
</code></pre>

<p>このプログラムを実行すると <code>86400</code> と表示されます。</p>

<h4>変数名にできないもの</h4>

<p>PHP では変数名にできないものがあります。</p>

<ul>
  <li><code>$1abc</code> のように数字から始まる変数名は使用できません（ <code>$a1bc</code> のように、数字が間に入るのは問題ありません。）</li>
  <li><code>$a-to-b</code> のように <code>-</code> ハイフンは変数名に使用できません（単語をつなげる場合には <code>$a_to_b</code> のように <code>_</code> アンダーバーを使用しましょう）</li>
</ul>
</div></section><section id="chapter-5"><h2 class="index">5. データの型
</div></h2><div class="subsection"><p>ここまで何の説明もなしに、数値(<code>86400</code>など)や文字列（<code>'こんにちは'</code>など）を扱ってきました。ここでは、PHPが扱える <strong>データの型</strong> について考えてみます。</p>

<p>データの型がなぜ必要なのかというと、型が違うと扱い方も違ってくるからです。型の違うデータの演算を考えてみましょう。例えば、<code>10 ÷ あいうえお</code>という型の違うデータ同士の割り算を見たときどう思うでしょうか？全く意味のない演算（そんな演算が本当にできるの？）だと思うことでしょう。つまり、型が違うもの同士は同じ舞台には立てない（扱いが違う）ということです。コンピュータは様々なデータを扱いますが、それぞれのデータの扱い方を判断するためにデータ型という仕組みがあるのです。</p>

<p>データの型について、皆さんはあまり意識する必要は無いかもしれません。そのように言われると、このチャプターの内容をさっと流したくなるでしょう。しかし、PHP内部では必要な概念です。データには型があることは覚えておいてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 数値型
</div></h3><h4>整数値</h4>

<p>整数値は今まで扱ってきたような <code>24</code> や <code>60</code> の数値を指します。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$num</span> = <span class="integer">2</span>;
    <span class="predefined">var_dump</span>(<span class="local-variable">$num</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><code>$num</code>は 整数値 <code>2</code> が格納された変数となります。</p>

<p>また、データを表示するのに <code>print</code> の代わりに <code>var_dump()</code> を使用しています。 <code>print $num;</code> とすればそのまま <code>2</code> とだけ表示されますが、<code>var_dump($num);</code> とすれば <code>int(2)</code> という <code>データ型(数値)</code> という形で表示されます。 <code>int</code> は 整数型を表すキーワードです。</p>

<p>実際に上記のコードで <em>test.php</em> を、ご自身の手で実行してみてください。もう実行コマンドまでは併記しませんが、PHPファイルを保存したらコンソールから <code>$ php test.php</code> ですよ。</p>

<h4>実数値（浮動小数）</h4>

<p>「浮動」という言葉がついていますが、算数・数学で習った普通の小数と変わりありません。小数のデータを <strong>実数</strong> と呼ぶことも多いです。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$num</span> = <span class="float">1.2</span>;
    <span class="predefined">var_dump</span>(<span class="local-variable">$num</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><code>$num</code>は実数値 <code>1.2</code> が格納された変数となります。</p>

<p>また、同様にデータ型を確認するため、 <code>var_dump()</code> を使用しています。 <code>print $num;</code> とすればそのまま <code>1.2</code> とだけ表示されますが、<code>var_dump($num);</code> とすれば <code>float(1.2)</code> もしくは <code>double(1.2)</code> というように <code>データ型(数値)</code> という形で表示されます。 <code>float</code> や <code>double</code> は 実数値のキーワードになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 文字列型
</div></h3><p>PHPにおいて文字列は、非常に重要な役割を果たします。PHPでは、多くのデータが文字列で表現できます。よく考えてみれば、画像と映像以外のやり取りするデータはテキストデータ（文字列型）です。Googleで検索するのも、SNSで投稿するのも、Webでは基本的にテキストデータをやり取りします。</p>

<p>文字列型は <code>'</code>（シングルクォーテーション）か <code>"</code>（ダブルクォーテーション）で囲むことで表現することができます。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$str1</span> = <span class="string"><span class="delimiter">'</span><span class="content">テキスト</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$str2</span> = <span class="string"><span class="delimiter">"</span><span class="content">テキスト</span><span class="delimiter">"</span></span>;
    <span class="predefined">var_dump</span>(<span class="local-variable">$str1</span>);
    <span class="predefined">var_dump</span>(<span class="local-variable">$str2</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><code>$str1</code>, <code>$str2</code> は文字列型の値 <code>テキスト</code> が格納された変数となります。</p>

<p>また、数値型のときと同様に、データ型確認のため <code>var_dump()</code> を使用しています。 <code>print $str1;</code> とすればそのまま <code>テキスト</code> とだけ表示されますが、<code>var_dump($str1);</code> とすれば <code>string(12) "テキスト"</code> というように <code>データ型(テキストバイト数) "テキスト"</code> という形で表示されます。 <code>string</code> は文字列型のキーワードです。<code>テキストバイト数</code> は、日本語の場合、1文字が3バイトになり、<code>テキスト</code> は4文字なので12バイトとなります。英数字の場合には、1文字が1バイトになるので、 <code>"abcd"</code> とすると、<code>string(4) "abcd"</code> となります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 配列型
</div></h3><p>配列は、<strong>複数の値をまとめて管理する</strong> ことができます。変数は1つのものしか収納できない箱で、配列は1つ以上のものを収納できる箱（ロッカー）です。</p>

<p>例えば、フルーツの名前をまとめておきたいとき、</p>

<p><em>配列ではなく変数でデータを持つ場合（test.phpに書く必要はありません）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$apple</span> = <span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$banana</span> = <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>;
    <span class="local-variable">$orange</span> = <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>このように全て1つずつ変数に入れるよりは、ひとつの変数 <code>$fruits</code>の中に<code>リンゴ</code> と <code>バナナ</code> と <code>オレンジ</code>が入っている方が扱いやすいです。そこで配列を利用します。</p>

<h4>添字配列</h4>

<p>通常の配列（添字配列）は <code>[]</code> を用いて初期化します。初期化とは、変数に代入するときに最初の値を定義しておくことをいいます。</p>

<h5>添字配列型でデータを持つ場合</h5>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [<span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>];
    <span class="predefined">print</span> <span class="local-variable">$fruits</span>[<span class="integer">0</span>];            <span class="comment">// リンゴが表示される</span>
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>このプログラムを実行すると <code>リンゴ</code> が表示されます。</p>

<p>この例では、<code>$fruits</code>という変数に3つのフルーツを列挙して定義しています。そして、<code>$fruits[0]</code>と<code>[]</code>（ブラケット）の中に順番の数字（添字）を書くことで、値を取り出すことができます。<code>$fruits[0]</code> と指定すると、<code>リンゴ</code> を取り出せます。<code>[0]</code>となっているのは、最初は0番目だからです。最後の3つ目の<code>オレンジ</code>は<code>$fruits[2]</code>とすることで取り出せます。</p>

<h5>var_dump()</h5>

<p>また、<code>print</code> は、 <code>print $fruits;</code>として配列の中身を全て表示させることはできない仕様になっていますので、<code>var_dump()</code> を使いましょう。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [<span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>];
    <span class="predefined">var_dump</span>(<span class="local-variable">$fruits</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>このプログラムを実行すると、以下のような結果が表示されます。</p>

<pre><code>array(3) {
  [0] =&gt;
  string(9) "リンゴ"
  [1] =&gt;
  string(9) "バナナ"
  [2] =&gt;
  string(12) "オレンジ"
}
</code></pre>

<h5>print_r()</h5>

<p><code>print_r()</code> という関数もあります。<code>var_dump()</code> は、それぞれの変数のデータ型やバイト数まで表示されますが、<code>var_dump()</code> と違って「値のみ」という構成のため、見やすいというメリットがあります。</p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [<span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>, <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>];
    <span class="predefined">print_r</span>(<span class="local-variable">$fruits</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>実行すると、以下のように表示されます。</p>

<pre><code>Array
(
    [0] =&gt; リンゴ
    [1] =&gt; バナナ
    [2] =&gt; オレンジ
)
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 連想配列
</div></h3><p>ここまで見てきたように、添字配列は、番号が振られたロッカーのように <code>[]</code> の中に数字を入れて値を取得しました。</p>

<p>これに対して、<code>['apple']</code> のように文字列を入れれば <code>リンゴ</code> が取得できるのが連想配列です。名前が振られたロッカーだと思ってください。</p>

<h5>連想配列の基本的な使い方</h5>

<ul>
  <li>連想配列 は、 array() で作成するか、[ ]（角括弧）で作成します。</li>
  <li>キー =&gt; 値 のペアを1つの要素とします。</li>
  <li>連想配列は、任意のデータ型のデータを値としてもつことが可能です。</li>
  <li>要素と要素はカンマ( <code>,</code> )で区切ります。</li>
</ul>

<p><em>使い方のサンプル（test.phpに書かないでください）</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="local-variable">$連想配列変数名</span> = [
  <span class="local-variable">$key1</span> =&gt; <span class="local-variable">$value1</span>,
  <span class="local-variable">$key2</span> =&gt; <span class="local-variable">$value2</span>,
  <span class="local-variable">$key3</span> =&gt; <span class="local-variable">$value3</span>,
  …
];
</pre></div>
</div>
</div>

<h5>連想配列の実用例</h5>

<p>キーになる文字列と、キーに紐づく値を指定します。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$fruits</span> = [
        <span class="string"><span class="delimiter">'</span><span class="content">apple</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">リンゴ</span><span class="delimiter">'</span></span>,
        <span class="string"><span class="delimiter">'</span><span class="content">banana</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">バナナ</span><span class="delimiter">'</span></span>,
        <span class="string"><span class="delimiter">'</span><span class="content">orange</span><span class="delimiter">'</span></span> =&gt; <span class="string"><span class="delimiter">'</span><span class="content">オレンジ</span><span class="delimiter">'</span></span>,
    ];
    <span class="predefined">var_dump</span>(<span class="local-variable">$fruits</span>);
    
    <span class="predefined">print</span> <span class="local-variable">$fruits</span>[<span class="string"><span class="delimiter">'</span><span class="content">apple</span><span class="delimiter">'</span></span>];
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><em>実行結果：</em></p>

<pre><code>array(3) {
  'apple' =&gt;
  string(9) "リンゴ"
  'banana' =&gt;
  string(9) "バナナ"
  'orange' =&gt;
  string(12) "オレンジ"
}
リンゴ
</code></pre>

<p>このように表示されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-5">5.5 論理値型
</div></h3><p>論理値型の値は2つだけです。<code>true</code>（真）か<code>false</code>（偽）だけです。</p>

<p><code>true</code>と<code>false</code>は主に制御文で役立ちます。制御文には、条件分岐と繰り返しがありますが、次のレッスンで学びます。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$t</span> = <span class="predefined-constant">true</span>;
    <span class="local-variable">$f</span> = <span class="predefined-constant">false</span>;
    <span class="predefined">var_dump</span>(<span class="local-variable">$t</span>);
    <span class="predefined">var_dump</span>(<span class="local-variable">$f</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p><code>$t</code>, <code>$f</code>は論理値型(bool型とも言う)の値 <code>true</code>, <code>false</code> が格納された変数となります。</p>

<p><code>var_dump()</code> を使用しています。<code>var_dump($t);</code> とすれば <code>bool(true)</code> というように <code>データ型(論理値)</code> という形で表示されます。 <code>bool</code> は 論理型のキーワードになります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-6">5.6 NULL型
</div></h3><p>NULL 型の値は一つだけで、 大文字小文字を区別しない定数 <code>null</code> です。</p>

<p>NULL は <strong>空っぽ</strong> を意味します。</p>

<p>変数に <code>null</code> が代入されている場面は2つです。</p>

<ul>
  <li>変数の用意（宣言）だけをして、何も値を代入しなかったとき</li>
  <li>変数に <code>null</code> を代入したとき</li>
</ul>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$a</span>;
    <span class="predefined">var_dump</span>(<span class="local-variable">$a</span>);
    <span class="local-variable">$b</span> = <span class="predefined-constant">null</span>;
    <span class="predefined">var_dump</span>(<span class="local-variable">$b</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<pre><code>PHP Notice:  Undefined variable: a in /home/ec2-user/environment/test.php on line 3
PHP Stack trace:
PHP   1. {main}() /home/ec2-user/environment/test.php:0
/home/ec2-user/environment/test.php:3:
NULL
/home/ec2-user/environment/test.php:5:
NULL
</code></pre>

<p>このように、変数を宣言したものの何も値を代入していない状態で中身を参照しようとすると、警告が表示されます。</p>

<p>また、2ヶ所で <code>NULL</code> という文字が表示されました。 <code>var_dump()</code> によって表示された NULL 値です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-7">5.7 オブジェクト型
</div></h3><p>PHPはオブジェクト指向型のプログラミング言語なので、オブジェクト型を持っています。</p>

<p>オブジェクトについては、後ほど解説します。</p>
</div></section><section id="chapter-6"><h2 class="index">6. 演算子
</div></h2><div class="subsection"><p>データを計算するには演算子が必要です。PHPに限った話ではありませんがプログラミングでは、様々な値（データ）が登場します。こういった値に対して、足したり比較したりといった演算をするのが演算子です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 代入演算子
</div></h3><p>代入演算子は、その名の通り、代入演算を行います。代入演算子は<code>=</code>を使います。ここまでの内容でも登場しました。以下、おさらいです。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$ichiniti_no_byousuu</span> = <span class="integer">24</span> * <span class="integer">60</span> * <span class="integer">60</span>;
    <span class="local-variable">$hensuu</span> = <span class="string"><span class="delimiter">"</span><span class="content">何らかのデータ</span><span class="delimiter">"</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 代数演算子（四則計算と剰余）
</div></h3><p>代数演算子は、四則演算と剰余（割り算の余りを求める）の演算を行う演算子のことです。四則演算と剰余で5つあります。</p>

<p><em>代数演算子の一覧</em></p>

<table>
  <thead>
    <tr>
      <th>演算子</th>
      <th>意味</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>+</code></td>
      <td>足し算</td>
    </tr>
    <tr>
      <td><code>-</code></td>
      <td>引き算</td>
    </tr>
    <tr>
      <td><code>*</code></td>
      <td>掛け算</td>
    </tr>
    <tr>
      <td><code>/</code></td>
      <td>割り算</td>
    </tr>
    <tr>
      <td><code>%</code></td>
      <td>余り算</td>
    </tr>
  </tbody>
</table>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$num1</span> = <span class="integer">1</span> + <span class="integer">2</span>;       <span class="comment">// $num1 には 3 が入っている</span>
    <span class="local-variable">$num2</span> = <span class="integer">1</span> - <span class="integer">2</span>;       <span class="comment">// $num2 には -1 が入っている</span>
    <span class="local-variable">$num3</span> = <span class="integer">2</span> * <span class="integer">5</span>;       <span class="comment">// $num3 には 10 が入っている</span>
    <span class="local-variable">$num4</span> = <span class="integer">6</span> / <span class="integer">3</span>;       <span class="comment">// $num4 には 2 が入っている</span>
    <span class="local-variable">$num5</span> = <span class="integer">5</span> % <span class="integer">2</span>;       <span class="comment">// $num5 には 1 が入っている （割った後の余り）</span>
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 文字列を連結する演算子
</div></h3><p>文字列に対する特別な演算子として、文字列の連結を行う<code>.</code>（ドット）演算子があります。2つの文字列をドットでつなぐことで、2つを合わせた文字列となります。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$str1</span> = <span class="string"><span class="delimiter">"</span><span class="content">文字列1</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$str2</span> = <span class="string"><span class="delimiter">"</span><span class="content"> + 文字列2</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$str</span> = <span class="local-variable">$str1</span> . <span class="local-variable">$str2</span>;
    <span class="predefined">print</span> <span class="local-variable">$str</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>実行すると <code>"文字列1 + 文字列2"</code> が表示されます。</p>

<h4>改行 - PHP_EOL</h4>

<p>PHPには予め定義されている定数があり、改行を表現するには、<code>PHP_EOL</code>という定数を使います。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$str1</span> = <span class="string"><span class="delimiter">"</span><span class="content">文字列1</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$str2</span> = <span class="string"><span class="delimiter">"</span><span class="content"> + 文字列2</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$str</span> = <span class="local-variable">$str1</span> . <span class="predefined-constant">PHP_EOL</span> . <span class="local-variable">$str2</span> . <span class="predefined-constant">PHP_EOL</span>;
    <span class="predefined">print</span> <span class="local-variable">$str</span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>上記コードを実行すると、<code>$str1</code>と<code>$str2</code>の間と、最後に改行が追加されるので、下記のような結果が出力されます。</p>

<pre><code>文字列1
 + 文字列2
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 比較演算子
</div></h3><p>比較演算子では、2つの値を比較し、その結果を論理値（<code>true</code>または<code>false</code>）で返します。ある条件式が正しい場合のことを「満たす」、正しくない場合を「満たさない」といい、満たす場合の論理値を <code>true</code>（日本語で「真」）、満たさない場合の論理値を <code>false</code>（日本語で「偽」）といいます。</p>

<table>
  <thead>
    <tr>
      <th>演算子</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>==</code></td>
      <td>右辺と左辺が等しい場合には<code>true</code>を返す。等しくない場合には<code>false</code>を返す。</td>
    </tr>
    <tr>
      <td><code>!=</code></td>
      <td>右辺と左辺が等しくない場合にはtrueを返す。等しい場合には<code>false</code>を返す。</td>
    </tr>
    <tr>
      <td><code>&lt;</code></td>
      <td>右辺より左辺が小さい場合には<code>true</code>を返す。右辺より左辺が大きいか等しい場合には<code>false</code>を返す。</td>
    </tr>
    <tr>
      <td><code>&gt;</code></td>
      <td>右辺より左辺が大きい場合には<code>true</code>を返す。右辺より左辺が小さいか等しい場合には<code>false</code>を返す。</td>
    </tr>
    <tr>
      <td><code>&lt;=</code></td>
      <td>右辺より左辺が小さいか等しい場合には<code>true</code>を返す。</td>
    </tr>
    <tr>
      <td><code>&gt;=</code></td>
      <td>右辺より左辺が大きいか等しい場合には<code>true</code>を返す。</td>
    </tr>
  </tbody>
</table>

<p>比較演算子を用いると、「年齢が18歳以上か」といった条件に合っているかどうか、コンピュータが判断できるようになります。</p>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="predefined">var_dump</span>(<span class="integer">1</span> &lt; <span class="integer">2</span>);

    <span class="predefined">var_dump</span>(<span class="integer">1</span> == <span class="integer">2</span>);
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>上記を実行すると、 最初の <code>1 &lt; 2</code> は満たしている（合っている）ので <code>true</code> となり、 <code>bool(true)</code> とまず表示されます。次の <code>1 == 2</code> は満たしていない（間違っている）ので <code>false</code> となり、 <code>bool(false)</code> が次に表示されます。</p>

<p>後ほど学ぶ、条件分岐や繰り返しは、比較演算子で比較した後の <code>true</code> や <code>false</code> の値を見て、どういう処理を行うか判断することになります。</p>

<p>なお、比較演算子の <code>==</code> は <code>等しい</code> という意味であるのに対して、代入演算子 <code>=</code> は単なる変数への代入であることに注意してください。<strong><code>=</code> だけの演算子には「等しい」という意味はありません。</strong></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 論理演算子
</div></h3><p>「条件A、かつ、条件B」、「条件A、または、条件B」など、上記で学んだ条件式を組み合わせたい場合には、論理演算子を使用します。</p>

<table>
  <thead>
    <tr>
      <th>演算子</th>
      <th>例</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>&amp;&amp;</code></td>
      <td><code>条件A &amp;&amp; 条件B</code></td>
      <td>条件Aと条件Bがどちらも<code>true</code>ならば<code>true</code>を返す</td>
    </tr>
    <tr>
      <td><code>||</code></td>
      <td><code>条件A || 条件B</code></td>
      <td>条件Aと条件Bのどちらかが<code>true</code>ならば<code>true</code>を返す</td>
    </tr>
    <tr>
      <td><code>!</code></td>
      <td><code>!条件A</code></td>
      <td>条件Aが<code>false</code>なら<code>true</code>を返す</td>
    </tr>
  </tbody>
</table>

<p><em>test.php</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="predefined">var_dump</span>( (<span class="integer">1</span> == <span class="integer">1</span>) &amp;&amp; (<span class="integer">2</span> == <span class="integer">2</span>) );   <span class="comment">// bool(true)</span>
    <span class="predefined">var_dump</span>( (<span class="integer">1</span> == <span class="integer">1</span>) &amp;&amp; (<span class="integer">1</span> == <span class="integer">2</span>) );   <span class="comment">// bool(false)</span>
    <span class="predefined">var_dump</span>( (<span class="integer">1</span> == <span class="integer">2</span>) || (<span class="integer">2</span> == <span class="integer">2</span>) );   <span class="comment">// bool(true)</span>
    <span class="predefined">var_dump</span>( (<span class="integer">1</span> == <span class="integer">2</span>) || (<span class="integer">3</span> == <span class="integer">2</span>) );   <span class="comment">// bool(false)</span>
    <span class="predefined">var_dump</span>( !(<span class="integer">1</span> == <span class="integer">2</span>) );              <span class="comment">// bool(true)</span>
    <span class="predefined">var_dump</span>( !<span class="predefined-constant">false</span> );                 <span class="comment">// bool(true)</span>
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-6">6.6 （補足）暗黙の型変換
</div></h3><p>本来であれば、数字同士の四則計算や文字列同士の連結のように、演算子は同じデータ型同士でないと使えません。それは <code>10 ÷ あいうえお</code> という演算に意味がないのと同じで、演算が行われるためには、同じデータ型を持つ必要があります。</p>

<p>ただし、PHPは <strong>データ型を変換しても意味が通じそうな値は暗黙的にデータ型の変換を行います。</strong></p>

<p><em>一例なので test.php を上書きする必要はありません</em></p>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$num</span> = <span class="integer">10</span> + <span class="string"><span class="delimiter">"</span><span class="content">20</span><span class="delimiter">"</span></span>;
    <span class="local-variable">$str</span> = <span class="integer">10</span> . <span class="string"><span class="delimiter">"</span><span class="content">です。</span><span class="delimiter">"</span></span>;
<span class="inline-delimiter">?&gt;</span>
</pre></div>
</div>
</div>

<p>上記のコードで <code>$num</code> には <code>30</code> が入ります。”20”は ダブルクォーテーションで囲っているので文字列の値となりますが、数値である <code>10</code> に足すデータとして指定された場合、数値の <code>20</code> として扱えれば正しく数値計算ができるので、PHPが自動で文字列の <code>"20"</code> を数値の <code>20</code> として扱います。</p>

<p>また、<code>$str</code> には <code>"10です。"</code> という文字列が入ります。<code>10</code> はクォーテーションで囲っていないので数値の値となりますが、文字列の <code>"です。"</code> との連結処理に指定された場合、文字列の <code>"10"</code> として扱えれば正しく連結処理ができるので、PHPが自動で数値の <code>10</code> を文字列の <code>"10"</code> として扱います。</p>

<p>以上のように、暗黙的にデータ型が変換される例もありますが、同じデータ型同士で計算するのが基本です。</p>
</div></section><section id="chapter-7"><h2 class="index">7. まとめ
</div></h2><div class="subsection"><p>このレッスンは、PHPプログラミングの基本的なルールや変数などを学びました。</p>

<p>プログラムを書いて、ターミナルで実行するという流れはもう充分わかったと思います。 Web アプリケーションでなく、単に何らかの処理を自動化するものであれば、ターミナルで実行することになります。ターミナルに慣れてください。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-php-1">課題：自己紹介するプログラムの作成</h3><p>「kadai-introduce.php」という名前でPHPファイルを用意してください。その中に「苗字と名前、年齢を画面に表示するプログラム」を作成してください。</p>

<h4>仕様</h4>

<ul>
  <li>苗字と名前、年齢を入れる変数（合計3つ）を用意してください。変数名は「何のデータを入れるのか」がわかりやすいような名前をつけましょう。</li>
  <li>それぞれの変数に入っているデータを使って、画面に「○○□□ です。△△ 歳です。」と表示してください。</li>
</ul>

<h4>実行結果の例：</h4>

<div class="language-sh highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>ec2-user:~/environment $ php kadai-introduce.php 
田中太郎です。25歳です。
</pre></div>
</div>
</div>
</div></section></div>
</body>
</html>