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
<div class="markdown"><div class="lesson-num p">Lesson4</div><h1 id="terminal">ターミナル</h1>
<section id="chapter-1"><h2 class="index">1. はじめに</h2><div class="subsection"><p>このレッスンでは、ターミナルについて学びます。</p>

<p>AWS Cloud9はWebアプリケーション開発を学ぶツール（統合的な開発環境）として非常に優れています。色々なことがCloud9上で行えます。</p>

<p>Cloud9の機能の1つであるターミナルは、プログラミングで作ったコードを実行したり、Webアプリケーションを起動したりするために使います。しかし、使い方に慣れなければ、プログラミングをはじめとする今後の学習がスムーズに進まなくなる原因となります。</p>

<p>そのため、ここでターミナルの基本的な使い方を学んでもらいます。頑張って習得していきましょう。もちろん、理解が難しかったり、更に深い話を聞きたい場合にはメンターに質問して解決しておきましょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. ターミナルとは</h2><div class="subsection"><p>ターミナルとは、<strong>コマンドと呼ばれる命令文を用いてコンピュータの操作をおこなうツール</strong>です。コマンドは、UNIXコマンドや、Linuxコマンドと呼ばれます。「UNIX」や「Linux」は、普段使っているWindowsやMacのようなOSのことです。UNIXやLinuxはターミナルで操作することがメインのOSです。実はMac(OSX)はUNIXから派生して作られたOSなので、Macもターミナルを持っていて、UNIXとほぼ同じコマンドが使えます。なお、一部のコマンドがMacやUNIXと異なりますがWindowsも「コマンドプロンプト（PowerShell）」という名前のターミナルを持っています。</p>

<p>ターミナルのようにコマンドでコンピュータを操作する環境のことを <strong>CUI (Character User Interface)</strong> と呼びます。 Character とは文字という意味です。文字列が中心のユーザインタフェースという意味です。ユーザインタフェースは操作環境のことです。昔のコンピュータを起動すると、コマンドを入力する画面が立ち上がり、コマンドを入力することでコンピュータを操作しました。</p>

<p>CUI に対して、マウスやタッチパネルを使って視覚的に操作を行えるユーザインタフェースのことを、GUI (Graphical User Interface) と呼びます。WindowsやMacなどの最近のOSでは、起動するとグラフィカルなデスクトップが立ち上がり、多くの操作はマウスを使って操作することができます。ダブルクリックでアプリを起動し、用意された様々なボタンやメニューを駆使することで多くの操作が可能となっています。</p>

<p>ここでは、CUIであるターミナルの使い方を学びます。繰り返しですが、Webアプリケーション開発で用いるツールは GUI ではなく、 CUI であるターミナルのコマンドとして提供されます。そのため、どうしてもターミナルに慣れておく必要があります。</p>

<p>Cloud9でもターミナルが自動的に立ち上がっているので、見てみましょう。このbashと書いているものがターミナルです。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_01.png" alt=""></p>

<p>その隣にある <code>Immediate (JavaScript (browser))</code> タブは、ターミナルではなく、JavaScriptを動作させるものなので閉じてしまっても構いません。</p>

<p><strong>ターミナルもグラフィカルなデスクトップも操作対象はどちらも同じコンピュータなので、画面左側のフォルダ階層とターミナルで扱うフォルダ階層は全く同一のものです。</strong></p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 ターミナルのタブを増やす、閉じる</h3><h4>増やす</h4>

<p>下図のように「＋」ボタンをクリックし、「New Terminal」をクリックすると、いくつでもターミナルを開くことができます。それぞれのターミナルは独立して動作しています。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/new_bash.png" alt=""></p>

<h4>閉じる</h4>

<p>☓ボタンで閉じてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 ターミナルのメリット</h3><p>ターミナルは昔からあるものですが、コンピュータやファイルの操作に関するコマンドが揃っているため、グラフィカルなデスクトップでマウス操作することと同等以上のことができます。</p>

<p>ターミナルのメリットは、コマンドという常に同じインターフェイスでコンピュータを操作できることです。グラフィカルなものの場合、ボタンの配置から配色など色々なところに目を配る必要がありますが、ターミナルだと常にコマンドを入力すれば良いのでボタンなどは必要ありません。どこどこのボタンを押して、次に・・・と言わなくても、このコマンドを入力してくださいと言えば、同じ動作を実行できます。</p>

<p>また、わざわざ特定のアプリをダウンロードしなくてもコマンドを駆使すれば、たとえば「毎日同じ時刻に、大事なファイルをサーバーへバックアップする」と言ったことが簡単にできてしまいます。</p>

<p>反対に様々なコマンドを覚えたり、調べたりしなければいけないというデメリットもあります。用意されているコマンドをいきなり全て覚える必要はなく、普段よく使うものから一つずつ覚えていけば大丈夫です。</p>

<p>以降で、実際によく使うコマンドを入力して、色々な操作を行います。</p>
</div></section><section id="chapter-3"><h2 class="index">3. 基本のコマンド</h2><div class="subsection"><p>ここからターミナル上で使う基礎的なコマンドを学んでいきます。</p>

<div class="alert alert-warning">
ここから先の記述内容や画像で、皆さんの現在のワークスペースのファイル構成と違う部分があるかもしれませんが、あまり気にせず進めてください。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 pwd</h3><p>まずは、ターミナル上で<code>pwd</code>というコマンドを実行してみましょう。<code>pwd</code>コマンドは、ターミナル上での現在いるフォルダを表示するコマンドです。<strong>Print Working Directory</strong>の略です。ディレクトリとは、フォルダと全く同じ意味で、作業しているフォルダ（現在フォルダ）を表示するという意味のコマンドです。</p>

<p>では、自分が現在どのフォルダにいるのかを知るための<code>pwd</code>コマンドを入力してみましょう。<code>pwd</code>を入力したあとに、<kbd>Enter</kbd>キーを押します。</p>

<pre><code>$ pwd
</code></pre>

<div class="alert alert-warning">
$ はターミナルでコマンド入力を行うことを表しています。$ のあとのコマンドをターミナルへ入力してください。
</div>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_03.png" alt=""></p>

<p>これで、現在いるフォルダが <code>/home/ec2-user/environment</code> だとわかりました。<strong>ここで、いくつかある<code>/</code>はフォルダの区切りのことです。</strong> <code>/home/ec2-user/environment</code> は下記のような階層構造のフォルダになります。</p>

<pre><code>home
└ ec2-user
     └ environment(techacademy)
          └ README.md
</code></pre>

<div class="alert alert-info">
AWS Cloud9では、「作成したワークスペース名＝environmentフォルダ」となっています。ワークスペース名が「techacademy」の場合、左サイドバーの先頭に出るワークスペース名はtechacademyという表示になりますが、実際のフォルダ名はターミナルで見た時のenvironmentになっています。場所によってワークスペースの表示名は違いますが、どちらも全く同じフォルダを指していますのでご注意下さい。
</div>

<p><strong>ターミナルでは、「現在どこのフォルダにいるか」を常に把握しておかなければいけません。</strong> ターミナルで操作する場合には、基本的に現在フォルダに対しての操作となります。何かターミナルでの操作をするときに異なったフォルダで操作をしてしまうと、意図していた操作を行えないでしょう。常に、現在のフォルダがどこなのかを気にするようにしてください。それを把握できるのが <code>pwd</code> コマンドです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 ls</h3><p>次に、ターミナル上で、 <code>ls</code> と入力してみましょう。コマンド入力後には<kbd>Enter</kbd>を押さないと結果が返ってきませんので入力してください。</p>

<p>すると、ファイルの一覧が表示されたと思います。下の画像について補足すると、ターミナル上の現在フォルダが <code>/home/ec2-user/environment</code> です。皆さんの環境で他にも <code>/home/ec2-user/environment</code> にファイルがあれば、存在するファイルの分だけ表示されます。</p>

<pre><code>$ ls
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_02.png" alt=""></p>

<p><code>ls</code>コマンドは、現在のフォルダの中にあるファイルやフォルダを一覧表示するコマンドで、<code>ls</code>は <strong>List Segments</strong> を省略した言葉です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 mkdir</h3><p><code>mkdir</code>コマンドは、新規フォルダを作成するコマンドです。<strong>Make Directory</strong>の略で、ディレクトリ（＝フォルダ）を新規作成するという意味です。</p>

<p>現在いるフォルダにフォルダを作成するコマンドである<code>mkdir</code>を使ってみましょう。<code>mkdir</code>コマンドのあとに<code>フォルダ名</code>を入力すると、現在フォルダにフォルダが作成されます。ここでは<em>terminal-tutorial</em>という名前のフォルダを作成してみましょう。</p>

<pre><code>$ mkdir terminal-tutorial
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_04.png" alt=""></p>

<p>すると、実際に画面の左側でフォルダが作成されていることがわかります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 cd</h3><p><code>cd</code>コマンドは、現在フォルダを移動するコマンドです。<strong>Change Directory</strong>の略で、ディレクトリ（＝フォルダ）を変更する（＝移動する）という意味です。</p>

<div class="alert alert-warning">
画面左側のファイル一覧を操作することでターミナルの現在フォルダが変更されることはありません。現在フォルダを把握する上で注意してください。
</div>

<p>では、現在の <em>environment</em> から、先程 <strong>mkdir</strong> で作成した<em>terminal-tutorial</em>フォルダへ移動しましょう。そのためには、<code>cd</code>コマンドを入力することになります。</p>

<pre><code>$ cd terminal-tutorial
</code></pre>

<p>これで<em>terminal-tutorial</em>フォルダへ移動できました。<code>pwd</code>で現在のディレクトリが変わっていることが確認できます。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_05_00.png" alt=""></p>

<p>また、<code>$</code>の左側に表示されているものは現在フォルダであることも覚えておきましょう。</p>

<p>では、ここからもう一度先ほどのフォルダ（<em>environment</em>）に戻ってみましょう。フォルダ名の代わりに<code>..</code>を入力することで、一つ前のフォルダへ移動することができます。</p>

<pre><code>$ cd ..
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_05.png" alt=""></p>

<p>これで先ほどのフォルダへ戻ることができました。</p>

<p>また、<code>cd</code>のみのコマンドで、設定されているホームフォルダに一気に戻ることができます。Cloud9では、<code>/home/ec2-user/</code>のフォルダがホームフォルダに設定されています。<code>cd</code>でホームフォルダに移動して、<code>pwd</code>で現在フォルダを確認してみましょう。</p>

<pre><code>$ cd
$ pwd
</code></pre>

<p>再度、<code>/home/ec2-user/environment/</code>へ戻りましょう。まずは<code>ls</code>で現在フォルダに<em>environment</em>フォルダがあるか確認し、<code>cd environment </code>でフォルダを移動します。</p>

<pre><code>$ ls
$ cd environment
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-3-5">3.5 touch</h3><p><code>touch</code>コマンドはファイルを新規作成するコマンドです。次はファイルを新規作成してみましょう。<code>touch</code>コマンドを使います。現在フォルダは<em>environment</em>です。</p>

<p>また、ターミナルでの一つ便利な技として、<strong>入力補完</strong>があります。<code>touch ter</code>と打ったあとに<kbd>Tab</kbd>キーを入力してみましょう。自動的に<code>touch terminal-tutorial/</code>まで入力されると思います。</p>

<p>それでは、<em>terminal-tutorial</em>フォルダの中に空ファイルである<em>sample.txt</em>を作成してみましょう。</p>

<pre><code>$ touch terminal-tutorial/sample.txt
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_07.png" alt=""></p>

<p>画面左側で<em>terminal-tutorial</em>フォルダの中身を展開してみると、<em>sample.txt</em>が空ファイルで作成されているのがわかります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-6">3.6 nano</h3><p>Cloud9のターミナル上での標準エディタは<strong>nano</strong>です。nanoを使えば、ターミナル上でファイルへ書き込みができます。しかし、操作が独特なので必要な操作だけ覚えておきましょう。nanoは後ほどGitの<code>git commit</code>というコマンドを使うときに使用します。</p>

<p>それでは、nanoを使って先ほど作成した<em>sample.txt</em>を編集します。</p>

<pre><code>$ cd terminal-tutorial
$ nano sample.txt
</code></pre>

<div class="alert alert-warning">
今後は上記のようにファイル名を指定する場合などでは、現在いるフォルダが重要になりますので、cdコマンドを使ってそのファイルがあるフォルダへ移動するようにしましょう。
</div>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_08_00.png" alt=""></p>

<p>nanoを使って<em>sample.txt</em>を開くと下記のような画面になります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/terminal/terminal_08.png" alt=""></p>

<p>まずは、以下の1行を書いてみましょう。</p>

<p><em>sample.txt</em></p>

<pre><code>これはサンプルテキストです。
</code></pre>

<p>次に保存です。nanoをメインで使ってファイルを編集することはほぼないので、最低限の終了と同時に保存する方法だけ覚えておきましょう。nanoを終了するには、キーボードを半角英数の入力モードにして <kbd>Control</kbd>+<kbd>x</kbd>（Windowsの場合は<kbd>Ctrl</kbd>+<kbd>x</kbd>）を押せば終了します。しかし、ファイルに変更があった場合は、「変更を保存するか破棄するか」を下記のように聞かれます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/terminal/terminal_09.png" alt=""></p>

<p>この画面で、<kbd>y</kbd>を押せば保存、<kbd>n</kbd>を押せば破棄、<kbd>Control</kbd>+<kbd>c</kbd>（Windowsの場合は<kbd>Ctrl</kbd>+<kbd>c</kbd>）を押せば編集画面へ戻ります。</p>

<p>ここでは<kbd>y</kbd>を押して保存します。次に保存するファイル名を聞かれます。最初に<em>sample.txt</em>を開いていたので、既に<code>sample.txt</code>が入力された状態です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/terminal/terminal_10.png" alt=""></p>

<p>このまま<em>sample.txt</em>へ上書きするので、<kbd>Enter</kbd>キーを押してください。すると、nanoが終了して<em>sample.txt</em>は保存されます。<em>sample.txt</em>を画面左側のファイル一覧から開いて確認してみましょう。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/aws_cloud9/terminal/terminal_11.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-3-7">3.7 less</h3><p>ターミナルでの標準ビューアはlessです。ファイルを編集せずに、閲覧だけしたい場合は <code>less</code> コマンドを使う方が便利です。</p>

<pre><code>$ less sample.txt
</code></pre>

<p>lessが立ち上がっている状態だと<kbd>q</kbd>キーを押せば終了できます。後ほど <code>git log</code> などのコマンドを実行した際にlessが自動的に立ち上がる場合があるので、<kbd>q</kbd>を押せば終了できることをしっかり覚えておきましょう。</p>

<p>また、長いファイルだった場合は<kbd>↑</kbd>もしくは<kbd>k</kbd>で上方向、<kbd>↓</kbd>もしくは<kbd>j</kbd>で下方向へスクロールさせることができます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/terminal/terminal_12.png" alt=""></p>

<h4>lessでファイル閲覧中に使えるコマンド</h4>

<p>lessを使用していて、もっと便利に使いたい場合には下記のコマンドを覚えておくと良いでしょう。ターミナルで操作をしているとファイルの閲覧にはほとんどの場合にはlessを使用します。多くのエンジニアは下記のコマンドは全て覚えているはずです。</p>

<table>
  <thead>
    <tr>
      <th style="text-align: left">キー</th>
      <th style="text-align: left">動作</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left">q</td>
      <td style="text-align: left">lessの終了</td>
    </tr>
    <tr>
      <td style="text-align: left">j</td>
      <td style="text-align: left">1行下にスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">k</td>
      <td style="text-align: left">1行上にスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">Ctrl + d</td>
      <td style="text-align: left">画面半分下にスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">Ctrl + u</td>
      <td style="text-align: left">画面半分上にスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">f</td>
      <td style="text-align: left">1画面下にスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">b</td>
      <td style="text-align: left">1画面上にスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">g</td>
      <td style="text-align: left">ファイルの先頭までスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">G</td>
      <td style="text-align: left">ファイルの末尾までスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">/検索文字列</td>
      <td style="text-align: left"><code>/</code>に続けて<code>検索文字列</code>を入れてEnterを押すと検索され該当部分までスクロール</td>
    </tr>
    <tr>
      <td style="text-align: left">n</td>
      <td style="text-align: left">検索状態でnを押すと、該当文字列を次々と見つけていく</td>
    </tr>
    <tr>
      <td style="text-align: left">N</td>
      <td style="text-align: left">nの場合と逆方向に戻っていく</td>
    </tr>
  </tbody>
</table>
</div><div class="subsection"><h3 class="index" id="chapter-3-8">3.8 その他のコマンド</h3><p>ターミナル操作の基礎はこれで完了です。他にもファイルやフォルダをコピーする<code>cp</code>コマンドや、ファイルの移動や名前変更させる<code>mv</code>コマンド、ファイル名で検索する<code>find</code>コマンド、ファイル内の文字列を検索する<code>grep</code>コマンドなど、多くのコマンドが用意されています。</p>

<p>どんなものがあるか下記サイトなどで確認してみると面白いでしょう。</p>

<ul>
  <li><a href="http://www.k-tanaka.net/unix/" target="_blank">UNIXコマンド - k-tanaka.net</a></li>
</ul>

<p>しかし、多くのコマンドはあまり頻繁に使うようなものではありません。ここで学んだコマンドだけは最低限覚えておくようにしましょう。</p>
</div></section><section id="chapter-4"><h2 class="index">4. 便利な機能</h2><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 オプション</h3><p>コマンドにはオプションを付けることができます。</p>

<p>よく使用するものとして、<code>ls -a</code>があります。<code>ls</code>コマンドに対して<code>-a</code>オプションを付加しています。これによって、<strong>隠しファイルやフォルダ</strong>も一覧表示されるようになります。隠しファイルやフォルダとはファイル名の先頭に<code>.</code>が書いてあるものが一般的です。</p>

<pre><code>$ ls -a
</code></pre>

<p>また、オプションは省略形が用意されているものもあります。<code>ls -a</code>の<code>-a</code>は実は<code>--all</code>の省略形です。頻繁に利用するオプションなので省略形が用意されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 manコマンド</h3><p>他の多くのコマンドにも<code>ls</code>コマンドのようにオプションがあります。英語が読める場合には、<code>man</code>コマンドを利用すると良いでしょう。<code>man</code>コマンドはマニュアルコマンドで、<code>man ls</code>を実行すると<code>ls</code>コマンドの使い方やオプション一覧を見ることができます。</p>

<p><code>man</code>コマンドが使いづらい場合には、<code>コマンド ls</code>などでGoogle検索してみると日本語の情報も見つかることでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 ホームフォルダ</h3><p>ターミナルにはホームフォルダ（ホームディレクトリ）があります。</p>

<p>ホームフォルダは下記のように、ユーザーがそれぞれ個別に持つ最初のフォルダです。<code>cd</code>コマンドをそのまま移動先を指定せず使った(<code>$ cd</code>)場合にホームフォルダへ移動します。</p>

<h4>Cloud9の場合</h4>

<pre><code>/home/ユーザ名
</code></pre>

<p>AWS Cloud9では、デフォルトで自分のユーザー名が<code>ec2-user</code>で決まっているため、<code>/home/ec2-user/</code>がホームフォルダとなります。</p>

<h4>Windowsの場合</h4>

<pre><code>C:\Users\ユーザ名
</code></pre>

<h4>Macの場合</h4>

<pre><code>/Users/ユーザ名
</code></pre>

<h4>~（チルダ）</h4>

<p>ホームフォルダはターミナル上で <code>~</code> で表されます。</p>

<p>ホームフォルダには設定ファイルなどが多数配置されます。設定ファイルやフォルダは隠しファイルやフォルダとなっており、名前が<code>.</code>で始まります。</p>

<pre><code>$ ls -a -1 ~
</code></pre>

<p>上記コマンドを実行すると、ホームフォルダにある隠しファイルや隠しフォルダが全て表示されます。これらは重要な設定ファイルなので、何かを知らないまま変更するのはやめましょう。（<code>-1</code>オプションは1つのファイルやフォルダを1行で表示するためのオプションです）</p>

<p>Cloud9のワークスペースでホームフォルダを表示するには、歯車マークから「Show Home in Favorites」にチェックを入れてください。「FAVORITES」のグループが表示され、その中にホームフォルダが一覧表示されます。なお下記の画像では「Show Hidden Files」にもチェックを入れているため、多くの隠しファイルが表示されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/terminal/1-home_dir.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 リダイレクト</h3><p>もし、ターミナル上に表示されるログをファイルに残したい場合には、リダイレクトという機能を利用することができます。<code>&gt;</code>を使うと、ターミナルに表示出力されるはずの文字列をファイルに書き込むことができます。</p>

<pre><code>$ ls -a -1 /home/ec2-user/ &gt; ~/environment/result.txt
</code></pre>

<p>これで<em>~/environment/</em>の直下に<em>result.txt</em>ファイルが作成されます。中身は<code>ls -a -1 /home/ec2-user/</code>を実行したときの内容と同じになっているはずです。</p>

<p>注意すべきは、<code> &gt; </code>は既にファイルが存在した場合に、強制的に上書きするコマンドだということです。大切なファイルを上書きしてしまうと大変なので、注意しましょう。</p>

<p>また、 <code>&gt;&gt;</code> を使うと、上書き保存ではなく、ファイルの末尾に追記されます。<code>echo</code>は渡された文字列を表示するコマンドです。</p>

<pre><code>$ echo 'ADD' &gt;&gt; ~/environment/result.txt
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-4-5">4.5 途中キャンセル</h3><p>最後に、コマンドではないですが、ターミナル上で実行されたコマンドを途中キャンセルする方法を学びます。</p>

<p>例えば、<code>sleep</code>コマンドを単体で使った場合は、指定された秒数だけターミナルが停止します。</p>

<pre><code>$ sleep 10
</code></pre>

<p>このときに、<kbd>Control</kbd>+<kbd>c</kbd>（Windowsの場合は<kbd>Ctrl</kbd>+<kbd>c</kbd>）のキーを同時に押すと<code>sleep</code>をキャンセルし、再度コマンド受付状態へ戻ります。</p>

<p>他にも<code>ruby</code>コマンドなどを実行すると、いつまでもコマンド受付状態へ戻って来ません。この場合にはキャンセルする必要があります。</p>

<pre><code>$ ruby
</code></pre>

<p>ただし、キャンセル時の注意点としては、<strong>インストール中などでキャンセルをしてしまうとシステムの修復が難しくなる場合があります</strong>。したがって、インストールで時間がかかってしまっても無闇にキャンセルしないようにしましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-6">4.6 過去に実行したコマンドの補完</h3><p>ターミナルには、過去に実行したコマンドを簡単に入力する方法があります。何かしらのコマンドを実行したあとに、<kbd>↑</kbd>キーを入力してみましょう。前回のコマンドが入力済み状態になったはずです。そのままEnterを押せば前回と同じコマンドをすぐに実行できます。このように、<kbd>↑</kbd>で履歴を遡ることができます。</p>

<pre><code>$ ls
$ （ここで↑キーを入力）
</code></pre>

<p>また、コマンド未入力の状態で<kbd>Control</kbd>+<kbd>r</kbd>（Windowsの場合は<kbd>Ctrl</kbd>+<kbd>r</kbd>）のキーを同時に押すと、過去のコマンドを検索することもできます。半角スペースで区切って検索してみてください。</p>

<p>検索を終了したい場合は、先ほどのキャンセルを実行しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-7">4.7 画面からコマンド履歴を消去</h3><p>ターミナルにコマンド履歴が溜まってどこから実行させたのかわかりにくくなったら、<kbd>Control</kbd>+<kbd>l</kbd>（Windowsの場合は<kbd>Ctrl</kbd>+<kbd>l</kbd>）を押しましょう。画面上のコマンド履歴が消去され、すっきりします。</p>
</div></section><section id="chapter-5"><h2 class="index">5. まとめ</h2><div class="subsection"><p>ここでは、ターミナルからコマンドでファイルを操作したり、フォルダを移動したりする方法を学びました。ここで学んだ内容はターミナルを操作する上で必要最低限の内容です。忘れたときには、このレッスンに戻って来て思い出すようにしてください。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-terminal">課題：ターミナルでの操作確認</h3><p>ここで学んだターミナルのコマンドを利用して、下記の操作を行ってください。</p>

<ol>
  <li><em>~/environment</em>フォルダの直下に移動（<code>~/</code> を使用してください）</li>
  <li><em>kadai-terminal</em>フォルダを作成</li>
  <li><em>kadai-terminal</em>へ現在フォルダを移動</li>
  <li><em>kadai-terminal</em>の直下で <em>memo.txt</em> を空ファイルとして作成</li>
  <li>nanoで <em>kadai-terminal</em> の直下の <em>memo.txt</em> を開き、 <code>これはターミナルの課題です。</code> と入力、保存し、nanoを終了</li>
  <li>lessで <em>kadai-terminal</em> の直下の <em>memo.txt</em> を開き、 <code>これはターミナルの課題です。</code> と書かれていることを確認し、lessを終了</li>
</ol>

<p>完了したら課題を提出してください。その際、以下の内容をひな形として、各設問に対して入力したコマンドを <code>$</code> のあとに追記し、提出時のコメント欄に記入して提出してください。</p>

<pre><code>1. ~/environment フォルダの直下に移動する
$ 

2. ~/environment フォルダの直下で kadai-terminal フォルダを作成する
$

3.  先ほど作成した kadai-terminal へ現在フォルダを移動する
$ 

4.  kadai-terminal の直下で memo.txt を空ファイルとして作成する
$ 

5. nanoで kadai-terminal の直下の memo.txt を開く
$ 

6. lessで kadai-terminal の直下の memo.txt を開く
$ 
</code></pre>

<p>メンターは上記の記述内容とCloud9上で実際に作られているファイルを確認した上で、課題の評価を行います。</p>
</div></section></div>
</body>
</html>