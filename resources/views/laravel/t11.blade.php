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
<div class="markdown"><div class="lesson-num p">Lesson11</div><h1 id="git">Git/GitHub
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>これから本格的にWebアプリケーションの作り方を学んでいくことになりますが、一旦ここで、Git および GitHub というものについて学習します。後ほど詳しく説明しますが、Git は <strong>バージョン管理ツール</strong> の一種です。バージョン管理ツールは、ある程度の規模のアプリケーションを作っていく中で「色々試したけどコードがグチャグチャになってきて自分では戻せないから以前の状態に戻したい！」といった要求に応えてくれます。</p>

<p>このレッスンでは、最初に Gitの概要について学びます。後ほど「はじめてのバージョン管理」チャプターで基本的なGitのコマンドを使用して、実際にファイルのバージョン管理を行います。ここではなんとなく全体像を掴むことができれば次へ進みましょう。実際にバージョン管理をするなかで全体像が見えなくなってしまった時に再度読み返してみると深い理解が得られるでしょう。</p>

<p>Gitは様々な方法で使うことができます。公式で提供されているGitはコマンドラインツールで、ターミナル上で実行します。他にもGUIクライアントとしても提供されています。GUIクライアントとは、ターミナル上のコマンドでなく、マウスによるボタン操作を可能とするソフトウェアのことで、ターミナル以外で動いているソフトウェアはほとんどがGUIクライアントです。</p>

<p>本トレーニングではGUIではなく、コマンドラインでGitを学んでいきます。理由は2つあります。</p>

<ul>
  <li>Gitの基本がコマンドラインであり、全ての機能を実行できること</li>
  <li>どのGUIクライアントを使うかは人の好みですが、コマンドラインツールは全員が同じもの</li>
</ul>

<p>コマンドラインツールは何が起こっているのかわかりにくいというデメリットがありますが、本トレーニングでは図を多く使って、Gitコマンドを実行することによって、Git内部で何が行われているかイメージできるようにしました。</p>

<p>まずは、Gitの基本として必要な概念を学び、次にチュートリアル形式で実際にGitコマンドを実行していきましょう。チュートリアルでは、皆さんの手で実際にCloud9上でGitコマンドを実行してください。読み進めるだけでなく、実際に触って確認してください。もし教材だけではわからないようなときには、メンターに質問してみましょう。</p>
</div></section><section id="chapter-2"><h2 class="index">2. バージョン管理とは
</h2><div class="subsection"><p>ファイルを何度も更新していくなかで必ず管理したいのが、ファイルの変更履歴です。ファイルの変更履歴を残せないと、一度保存したものを元に戻すことが難しくなります。また、チームで開発をするようになると誰がどのファイルを変更したのか管理していかなければ、いつの間にか意図しなかった変更が入り込んでしまうこともあるでしょう。</p>

<p>ファイルの変更履歴を管理することをバージョン管理と言います。まずはバージョン管理の方法を見てみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 効率の悪いバージョン管理方法
</h3><h4>ファイル名でのバージョン管理方法</h4>

<p>皆さんはプロジェクト内のファイルのバージョン管理をどのように行っているでしょうか。ファイル名に日付などを記載し、バージョン管理していませんか？</p>

<pre><code>index.html
index.html.backup
index.html.backup20160101
index.html.backup20160101_01
index.html.backup20160101_02
index.html.backup20160101_02final
index.html.backup20160101_02final2
</code></pre>

<p>上記のようなバージョン管理を行っている人は多いのではないでしょうか。もちろん、ちょっとしたものなら良いのですが、これが<em>index.html</em>だけでなければ、それだけファイル数が増えていき、現行バージョンのファイルを探すのに手間がかかったりしてしまいます。バックアップファイルを削除するかどうかの判断も必要になってくるでしょう。</p>

<h4>コメントでのバージョン管理方法</h4>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">&lt;!-- 2016/03/19 文言修正 &lt;p&gt;お願いします。&lt;/p&gt; --&gt;</span>
<span class="comment">&lt;!-- 2016/03/20 文言修正 &lt;p&gt;よろしくお願いします。&lt;/p&gt; --&gt;</span>
<span class="tag">&lt;p&gt;</span>どうぞよろしくお願いします！<span class="tag">&lt;/p&gt;</span>
</pre></div>
</div>
</div>

<p>このようにファイルに変更履歴を残すために、ファイル内のコメントでバージョン管理を行っている人も多いのではないでしょうか。重要でないコメントが多くなってくると、それだけテキストは読みづらくなり、可読性が落ちます。いつコメントを消すべきか判断する必要もあります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 専用ツールでのバージョン管理の必要性
</h3><p>今まで見てきた方法でのバージョン管理は、どうしても効率が悪いものです。意識は常に元のバージョンを戻せるか不安に駆られながら、おそるおそるファイルを変更していくことになります。</p>

<p>そこで、ファイルの変更を自動的に監視してくれるようなツールが求められ始めました。うっかりファイルを変更しても、ちゃんと元に戻せるという安心感を与えてくれるツールです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-3">2.3 Gitの登場
</h3><p>そして、ついにそんなバージョン管理ツールが登場しました。これを使えば、安心してファイルを変更することができます。</p>

<p>それがGitです。</p>

<ul>
  <li><a href="https://git-scm.com/" target="_blank">Git公式ページ（英語）</a></li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-git_official_web.png" alt=""></p>

<p>Gitは、サーバ用途のOSであるLinuxの開発をチームで進めて行くなかで生まれました。離れた環境にあるチームでLinuxを開発するには、どうしてもバージョン管理ツールが必要となりました。その時Linuxの開発者が、理想的なバージョン管理ツールが無いなら自分で作ってしまえと作られたツールなのです。今ではLinuxプロジェクトのみに限らず、多くの開発現場でGitが使われています。</p>

<p>それではGitを使ったバージョン管理の方法を学んでいきましょう。</p>
</div></section><section id="chapter-3"><h2 class="index">3. Gitとは
</h2><div class="subsection"><p>Git（ギット）とは、ファイルの変更履歴を記録・追跡するためのバージョン管理システム（ツール）です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 Gitが保存する履歴情報
</h3><p>Gitは、ファイル変更に対して下記のような情報を保持して、1つのバージョンとします。</p>

<ul>
  <li>いつ</li>
  <li>誰が</li>
  <li>どのファイルの、どの箇所を</li>
  <li>どんなメッセージを残して変更したか</li>
</ul>

<p>Gitは、上記の項目を持った一つ一つの小さなバージョンを連ねて、ファイルの変更履歴（バージョン履歴）を形成しています。プロジェクトの進捗はファイルの変更履歴そのものとなります。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 Gitを使うことで解決すること
</h3><p>Gitが必要な情報を変更履歴として管理してくれるので、編集したファイルを過去の状態に戻したり、今日一日どのファイルのどこを編集したかを表示することができます。</p>

<p>バージョン管理システムを使うメリットとして</p>

<ul>
  <li>ファイルを変更する際に、バックアップファイルを作成する必要がない</li>
  <li>変更する前のファイルの内容にいつでも戻れるので、安心してファイルを変更できる</li>
  <li>複数人でファイルを変更したり、共同開発を行うことができる</li>
</ul>

<p>があります。</p>

<p>これらのメリットを享受することで、お互い滞りなく安心してチーム開発が進められているのです。</p>

<p>そして、チーム開発に不可欠なものとしてGitHubがあります。</p>
</div></section><section id="chapter-4"><h2 class="index">4. GitHubとは
</h2><div class="subsection"><p>GitHub（ギットハブ）とは、Gitを使ってバージョン管理しているプロジェクトをオンライン上で共有・管理してくれるWebサービスです。</p>

<ul>
  <li><a href="https://github.com/" target="_blank">GitHub公式ページ（英語）</a></li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/github_01.png" alt=""><br>
<em>GitHubのリモートリポジトリの画面</em></p>

<p>Gitは通常、自分のPC内などローカル環境でのバージョン管理を提供してくれます。しかし、バージョン管理しているプロジェクトのバックアップを取りたい場合や、チーム開発を行う時どこにチーム全員の変更履歴を集めるか、が問題になります。このようなとき、バックアップ先の場所、ならびに、チーム開発の基点となるのがGitHubです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 GitHubではオープンソースプロジェクトの開発が活発
</h3><p>GitHubでは皆さんが利用することになるオープンソースプロジェクトが日々開発されています。</p>

<p>有名なオープンソースプロジェクトには、下記のようなものがあります。</p>

<ul>
  <li><a href="https://github.com/twbs/bootstrap" target="_blank">Bootstrap</a></li>
  <li><a href="https://github.com/angular/angular.js" target="_blank">Angular.js</a></li>
  <li><a href="https://github.com/nodejs/node" target="_blank">Node.js</a></li>
  <li><a href="https://github.com/jquery/jquery" target="_blank">jQuery</a></li>
  <li><a href="https://github.com/FortAwesome/Font-Awesome" target="_blank">FontAwesome</a></li>
  <li><a href="https://github.com/rails/rails" target="_blank">Ruby on Rails</a></li>
  <li><a href="https://github.com/torvalds/linux" target="_blank">Linux</a></li>
</ul>

<p>これらはGitHubを基点にオンライン上でチーム開発が行われ、それぞれが大きなコミュニティを形成しています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 有名企業もGitHubを利用している
</h3><p>GitHubはオープンソースのみでなく、多くの企業が利用しています。</p>

<p>有名かつ規模の大きな企業としては、下記のとおりです。</p>

<ul>
  <li>Yahoo JAPAN!</li>
  <li>DeNA</li>
  <li>GREE</li>
  <li>cookpad</li>
  <li>LINE</li>
</ul>

<p><em><a href="http://github.co.jp/" target="_blank">導入先企業</a>より抜粋</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 プラン・料金
</h3><p>GitHubでは公開プロジェクト（誰もが閲覧できる状態）と非公開プロジェクトのどちらも無制限に作成できます。</p>

<p>公開プロジェクトとして設定した場合、誰がどのような変更を行ったかがすぐにわかります。オープンソースソフトウェアのプロジェクトや、個人で作ったものを実績として広く一般に見てもらう場合は公開プロジェクト、逆にソースコードや一部のファイルを秘密にしたかったり数名のみでアプリケーションを構築したい場合は非公開プロジェクトで設定してください。本カリキュラムでは、特に理由の無い限り、公開プロジェクトで学習を進めていただきます。</p>

<p>また、GitHubには無料プランと有料プランがあります。無料プランには、非公開プロジェクトに招待できるユーザが3名のみという制約があります。有料プランで契約すると、その制約がなくなり、無制限にユーザを非公開プロジェクトへ招待できます。</p>

<p>有料プランにはいくつか種類があります。以下に各プランの概要をまとめます。</p>

<p><em><a href="https://github.com/pricing" target="_blank">Pricing</a>より</em></p>

<table>
  <thead>
    <tr>
      <th>プラン</th>
      <th>料金</th>
      <th>内容</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Pro（個人）</td>
      <td>$7/月</td>
      <td>非公開プロジェクトへ無制限にユーザを招待できます。</td>
    </tr>
    <tr>
      <td>Team（組織）</td>
      <td>1人につき$9/月</td>
      <td>所属するユーザーの権限を操作できます。</td>
    </tr>
    <tr>
      <td>Enterprise（企業）</td>
      <td>お問い合わせ</td>
      <td>企業の持つ独自サーバでGitHubを立ち上げることができます。</td>
    </tr>
  </tbody>
</table>
</div><div class="subsection"><h3 class="index" id="chapter-4-4">4.4 その他GitHubのようなWebサービス
</h3><p>GitHubと同等の機能を持ったWebサービスとして、Bitbucketがあります。</p>

<ul>
  <li><a href="https://bitbucket.org" target="_blank">Bitbucket</a></li>
  <li><a href="https://bitbucket.org/product/pricing?tab=cloud-pricing" target="_blank">Pricing - Bitbucket</a></li>
</ul>

<div class="alert alert-info">
個人のプロジェクトが公開状態になることにはメリットもあります。自分の作ったプログラムのソースコードを誰でも閲覧できるので、自分のプログラミングスキルを知ってもらうのに有効活用できるでしょう。
</div>
</div></section><section id="chapter-5"><h2 class="index">5. Gitの基本概念
</h2><div class="subsection"><p>それでは、Gitについて学んでいきましょう。まずは、Gitを使用する上で学んでおかなければならない概念について理解しておきましょう。完全に理解する必要はありません。まずはこんな感じなんだというものが伝わればと思います。</p>

<p>概念に一通り触れたあとに、チュートリアル形式でGitコマンドを学んでいきます。皆さんもCloud9上で実際にGitコマンドを実行してみてください。実際に動かすことで理解も深まることでしょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 リポジトリ
</h3><p>バージョン管理をするには、1つ1つのバージョンの情報（いつ、誰が、どのファイルのどの箇所を、どんなメッセージを残して変更したか）を保存しておく必要があります。</p>

<p>その保存先のことを<strong>リポジトリ</strong>と呼びます。リポジトリでは、バージョン情報の履歴が保存されています。変更履歴を管理したいプロジェクトフォルダなどを、リポジトリの管理下に置くことで、そのプロジェクトフォルダ内のファイルの変更履歴を記録することができます。</p>

<p>リポジトリは、ただの入れ物（箱）です。リポジトリという箱の中にGitで保存しているバージョン情報が保管されているとイメージしてください。</p>

<p>また、リポジトリには2つ種類があります。</p>

<ul>
  <li>ローカルリポジトリ</li>
  <li>リモートリポジトリ</li>
</ul>

<p>ローカルリポジトリは、実際に作業を行うリポジトリのことで、<strong>自分のPCやCloud9上で作られる</strong>リポジトリのことを言います。<br>
リモートリポジトリは、チームでのリポジトリ共有やバックアップを目的として作られるネットワーク先のリポジトリのことを言います。多くの場合、リモートリポジトリは<strong>GitHub上に作られる</strong>ことになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_repository_figure.png" alt=""><br>
<em>リモートリポジトリとローカルリポジトリの概念図</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 コミット
</h3><p>Gitでは、1つ1つのバージョンのことを、<strong>コミット</strong>と呼びます。また、コミットを作成することを<strong>コミットする</strong>と言います。</p>

<p>1つ1つのコミットには様々な情報が入っています。特に下記の6つが重要です。</p>

<ul>
  <li>リビジョン番号（1e010f4572625f3741a306b8e996cのような値）</li>
  <li>コミットした人（誰が）</li>
  <li>コミットした日時（いつ）</li>
  <li>コミットしたときのファイル内容の差分（どのファイルの、どの箇所を）</li>
  <li>コミットメッセージ（どんなメッセージを残して）</li>
  <li>親コミット（1つ前のコミット）のリビジョン番号</li>
</ul>

<p>リビジョン番号は、コミットを一意に指定できる<strong>IDのような役割</strong>を果たします。リビジョン番号はコミット時に決定されます。コミットをやり直した場合には全く別のリビジョン番号になります。コミットのハッシュ値とも呼ばれます。<br>
コミットした人や日時も記録されるので、誰がいつコミットを行ったのかいつでも確認できます。<br>
コミットしたときのファイル内容がコミット情報に含まれているので、ファイルを元に戻したい場合やどんな変更を施したのかを後からでも確認できます。<br>
コミットメッセージは、コミットするときに必須のメッセージで、どういった内容の変更をコミットするのか簡単なメッセージにまとめて書いておきます。<br>
更に、1つ前のコミットのリビジョン番号を持っているので、自分がどのコミットから作られたコミットなのかを確認することができます。1つ前のコミットのことを親コミットと言います。</p>

<p>リポジトリ内では、1つ1つのコミットが<strong>親コミットのリビジョン番号を持っているので、コミットは親コミットを辿ることで連なるように変更履歴を管理できている</strong>のです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_commit_figure.png" alt=""><br>
<em>リポジトリ内のコミットの概念図</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 ワークツリーとインデックス
</h3><p>ワークツリーとは、Gitでバージョン管理されているフォルダ内のことです。ファイルに変更を加えると、ワークツリーに変更が反映されます。前回のコミットと比較して、単に変更箇所がわかる段階です。</p>

<p>次に、ワークツリーから次のコミットに含めたいファイルの変更箇所を選択します。変更箇所を選択することを、<strong>ステージする</strong>と言います。ステージされた変更箇所は<strong>インデックス（ステージングエリアとも言う）</strong>に反映されます。インデックスはローカルリポジトリへコミットする一歩手前で、コミットする変更箇所を選ぶ段階です。</p>

<p>最後に<strong>コミット</strong>を行い、バージョンが1つ進みます。このときコミットされる変更箇所は、インデックスにステージされた変更箇所のみです。ワークツリーからインデックスへステージされていない変更箇所はコミットに含まれません。ワークツリーの変更箇所をコミットに含めたい場合には、ワークツリーの変更箇所をインデックスへステージする必要があります。</p>

<p>ファイルを変更してコミットされるまで、下図のような流れとなります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_index_figure.png" alt=""><br>
<em>ワークツリーとインデックスとリポジトリまでの概念図</em></p>

<h4>インデックスの役割</h4>

<p>ファイルの変更をコミットするまでに、一度インデックスという中間地点を挟む必要があります。</p>

<p>インデックスのような中間地点なんて不要だと思うかも知れません。そのまま変更箇所をコミットできたほうが楽なので、インデックスという中間地点の存在意義が不明だと思えます。</p>

<p>しかし、今後Gitを使っていくとインデックスは必要不可欠だと感じるようになるでしょう。そのためには良いコミットについて理解する必要があります。コミットは1つのバージョンです。したがって、1つのコミットはしっかりまとまった変更単位であるべきです。例えば、「ランディングページの作成」と「とあるページの文言修正」という2つの無関係な変更を同時に行ったとしましょう。このとき、両方を一気にコミットして1つのバージョンとしてしまうと、とても扱いづらいコミットとなります。そうならないために、関連性のあるまとまりとしてコミットを行うべきです。ワークツリーにどちらの変更も入っている状態から、まず「ランディングページの作成」部分をインデックスにステージしてコミットし、次に「とあるページの文言修正」をステージしてコミットします。コミットは2個に増えましたが、1つのコミットには関連性のある変更内容しか含まれていませんので、扱いやすい良いコミットとなりました。</p>

<p>このように、インデックスはコミットを行う前に、ワークツリーの変更箇所の中から関連性のある変更のまとまりを選択するという重要な役割があるのです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-4">5.4 まとめ
</h3><p>Gitの基本概念を一通り見てきました。ここで解説したものがGitの基本です。上記の概念さえ理解しておけば、Gitのおおまかな全体像を捉えることができます。</p>

<p>少しまとめてみましょう。</p>

<p>リポジトリには、ローカルリポジトリとリモートリポジトリがあります。ローカルリポジトリは自分のPCやCloud9上に作るリポジトリ、リモートリポジトリはGitHubに作るリポジトリのことです。リポジトリ内には、コミット履歴（バージョン履歴）が保存されています。</p>

<p>コミットは1つのバージョンのことです。ファイルを変更するとワークツリーに反映されます。変更箇所は <strong>ワークツリー =&gt; インデックス =&gt; ローカルリポジトリ</strong> と移動していきます。<strong>ワークツリー =&gt; インデックス</strong> の移動をステージすると言い、<strong>インデックス =&gt; ローカルリポジトリ</strong> の移動をコミットすると言います。ファイルの変更からコミットに至るまで、インデックスという中間地点を通ります。2段階の操作（ステージとコミット）が必要です。</p>
</div></section><section id="chapter-6"><h2 class="index">6. はじめてのバージョン管理
</h2><div class="subsection"><p>それではGitの基本概念がわかったところで、チュートリアルを通して理解を深めていきましょう。ここからGitによるバージョン管理のチュートリアルが始まります。皆さん実際に手を動かして一通りの流れを掴んでください。</p>

<p>ここでは、ローカルリポジトリにいくつかのファイルを追加／変更し、コミットする手順を学びます。</p>

<p>では、<em>index.html</em>を編集する作業を通して、Gitでのバージョン管理を一通り体験していきましょう。ここからはターミナルを使用します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 Gitの図の矢印について
</h3><p>これからGitによるバージョン管理を行いながら、コミット履歴を図示していきます。そこで注意して欲しいのは、<strong>コミット履歴の矢印</strong>の考え方についてです。</p>

<p>1つのコミットが持つ情報がいくつかありましたが、コミット履歴の図ではリビジョン番号、親コミットのリビジョン番号が重要な情報になります。個々のコミットは自分のリビジョン番号（コミットID）を持っており、更に親コミットのリビジョン番号も持っています。古いコミットを辿っていけるのは、そのおかげです。</p>

<p>下図がコミット履歴の図のサンプルとなります。Gitの図では、コミット履歴はこのように描くことが多いです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-first_01.png" alt=""></p>

<p>まず、丸がコミットで、矢印が親コミットを指していることを確認しましょう。コミットについた矢印は下向き（親コミットを指す）ですが、時系列は上側に行くほどに新しいものです。時系列と親コミットが逆になっていることを覚えておきましょう。新規コミットが実行されると、新しく <code>コミットD</code> が追加されました。このとき、<code>コミットD</code> と <code>コミットDから親コミットCを指す矢印</code> が追加されます。先に確認したように親コミットを指す矢印と時系列の方向は逆になっています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 準備
</h3><h4>隠しファイル／隠しフォルダの表示</h4>

<p>まずは、隠しファイルや隠しフォルダを表示しておきましょう。隠しファイルやフォルダとは、ファイル名の最初に <code>.</code> がついているものです。</p>

<p>例えば、以降では <em>.c9</em> 、<em>.git</em> 、 <em>.gitignore</em> などがあります。これらのファイルは主に設定ファイルであったり、重要なファイルであったりします。</p>

<p>では、Cloud9上で隠しファイル／隠しフォルダを表示させましょう。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_01.png" alt=""></p>

<p>隠しファイル／隠しフォルダを表示させると、<em>.c9</em> のフォルダが表示されます。これはCloud9のワークスペースの設定を管理する隠しフォルダなので、直接ファイルを変更しないようにしましょう。</p>

<p>また、ターミナルで学んだ現在フォルダ内にあるファイルとフォルダを一覧表示させる<code>ls</code>コマンドに<code>-a</code>オプションをつけることで、隠しファイル／隠しフォルダをターミナルで確認することもできます。</p>

<pre><code>$ ls -a
</code></pre>

<h4>Gitの設定をする</h4>

<p>Gitにも設定ファイルがあります。Gitの設定ファイルは単なるテキストファイルで、簡単に編集可能です。</p>

<p>通常、HOME(Cloud9では<em>/home/ec2-user/</em>)フォルダの直下に <em>.gitconfig</em> というGitの設定ファイルが配置されていて、このファイルこそがGitのPC内共通の設定ファイル（グローバル設定ファイル）です。Gitに限らず設定ファイルはHOMEフォルダの直下に <code>.</code> でファイル名が始まるテキストファイルとして存在する場合が多いです。また、HOMEフォルダはターミナル上では <code>~</code>（チルダ） として表現できます。</p>

<p>これからGit に<code>name</code> と <code>email</code> を設定します。ここでの名前とメールアドレスが、コミット時にAuthor（コミットした人）として登録されていきます。</p>

<div class="alert alert-danger">
コミット時の name と email は、最終的に GitHub のコミット履歴に掲載されます。このコミット履歴は公開され誰でも閲覧することができます。カリキュラムの実施にあたり、本名やメールアドレスの一般公開を望まない場合は、名前をニックネームやハンドルネームなどで代替したり、メールアドレスをGmailなどで新たに学習用として取得するなどの方法を実施して下さい。name と email の変更は次の「Gitの設定」を参照してください。
</div>

<h4>Gitの設定</h4>

<p>Gitの設定には下記の2つ方法があります。</p>

<ul>
  <li>Gitコマンドを使う</li>
  <li>直接 <em>~/.gitconfig</em> を編集する</li>
</ul>

<p>ここではGitコマンドで名前とメールアドレスを設定する方法を解説します。Gitコマンドで氏名のグローバル設定（デフォルトの設定）を変更したい場合には、次のコマンドを実行します。</p>

<p>※ <code>taro.kirameki</code> は、ご自身のお名前に置き換えて入力してください。</p>

<pre><code>$ git config --global user.name "taro.kirameki"
</code></pre>

<p>メールアドレス( <code>user.email</code> )も同様の形式のコマンドで設定することが可能です。</p>

<p>※ <code>taro.kirameki@techacademy.jp</code> はご自身のメールアドレスに置き換えてください。</p>

<pre><code>$ git config --global user.email "taro.kirameki@techacademy.jp"
</code></pre>

<p>また、Gitリポジトリ毎に設定したい場合には、後ほど行う<code>git init</code>を実行してGitリポジトリをまず作成して、そのプロジェクト（Gitリポジトリがあるフォルダ）で下記のようにコマンドを入力すれば設定されます（今は下記のコマンドを実行する必要ありません）。</p>

<pre><code>$ git config --local user.name "jiro.kirameki"
</code></pre>

<div class="alert alert-warning">
GitHub上でもここで設定したユーザー名とメールアドレスが公開されるので、自分で公開できるユーザー名とメールアドレスを設定しておいてください。
</div>

<h4>Gitの設定の確認</h4>

<p>設定を終えたら<em>.gitconfig</em>をlessで開いてみましょう。</p>

<pre><code>$ less ~/.gitconfig
</code></pre>

<p><em>~/.gitconfig</em></p>

<pre><code>...
[user]
        name = taro.kirameki
        email = taro.kirameki@techacademy.jp
...
</code></pre>

<p>上記のような内容が表示されるでしょう。</p>

<p><em>~/.gitconfig</em> の内容はGitのコマンドでも確認することができます。<code>--global</code> でグローバル設定ファイルのことだと明示し、<code>-l</code> (<code>--list</code>でも良い) で設定のリストを取得したいことを明示します。</p>

<pre><code>$ git config --global -l
</code></pre>

<p><em>出力結果</em></p>

<pre><code>...
user.name=taro.kirameki
user.email=taro.kirameki@techacademy.jp
...
</code></pre>

<p>※補足：直接 <em>~/.gitconfig</em> を編集する場合は、nanoなどのテキストエディタで編集してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 バージョン管理の一連の流れ
</h3><p>それでは<em>index.html</em>の準備から始めて、下記の順でバージョン管理を行います。</p>

<ol>
  <li>リポジトリの作成（初期化）</li>
  <li>ファイルの変更</li>
  <li>ファイルの変更箇所のステージ</li>
  <li>コミット</li>
</ol>

<p>更に2回目のコミットについても扱っていきます。また、その過程で、ファイルの変更状況や差分を確認するコマンドを挟みながら実践形式で一連の流れを学んでいきましょう。</p>

<h4>commit-tutorialフォルダを作成し、移動</h4>

<p>それでは<em>~/environment/commit-tutorial/</em>フォルダに移動しましょう。このフォルダ以下でチュートリアルを行います。</p>

<pre><code>$ cd ~/environment/
$ mkdir commit-tutorial
$ cd commit-tutorial/
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_02.png" alt=""></p>

<h4>commit-tutorialフォルダにGitのリポジトリを作成する</h4>

<p><em>~/environment/commit-tutorial/</em>に移動しているかを確認してから先へ進みましょう。</p>

<p>次に、<code>git init</code>というGitコマンドを使って、リポジトリを作成し、<em>commit-tutorial/</em>をGitのバージョン管理下に置きます。</p>

<pre><code>$ git init
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_03.png" alt=""></p>

<p>これで、<em>commit-tutorial/</em>以下にあるファイルはGitでバージョン管理することができるようになります。<code>git init</code>を行うと下記のような表示がでてきます。</p>

<pre><code>Initialized empty Git repository in /home/ec2-user/environment/commit-tutorial/.git/
</code></pre>

<p>これは、「空のGitリポジトリを<em>/home/ubuntu/environment/commit-tutorial/.git/</em>に初期化しました」と書かれています。ここで重要なのは<em>.git/</em>です。この隠しフォルダがリポジトリの実体で、バージョン管理を行っています。<em>.git/</em>を直接操作してしまうとリポジトリが壊れてしまうので、触らないように注意してください。その代わりにバージョン管理を行うために、Gitコマンドを使用します。Gitコマンドを使用していくと<em>.git</em>の中身（リポジトリ）が更新されていきます。</p>

<p>また、Gitでバージョン管理されているかどうかは、Cloud9では<code>(master)</code>という文字が追加されているかどうかで判断できます。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_04.png" alt=""></p>

<p>左の<em>commit-tutorial/</em>フォルダに<em>.git/</em>が表示されていない場合には、隠しフォルダ表示を行っているか確認し、表示を更新させておきましょう。表示の更新には下図のように歯車マークからRefresh File Treeをクリックします。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_05.png" alt=""></p>

<p>操作に対する変更点をイメージでも確認していきましょう。<code>git init</code>を行うとローカルリポジトリが作成されます。更にローカルリポジトリには、ワークツリーとインデックスの2つの領域が、ファイルの変更を格納するために確保されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_01.png" alt=""></p>

<h4>index.htmlの準備</h4>

<p>これからファイルのバージョン管理を行っていきます。<em>index.html</em>を新規作成し、<em>commit-tutorial/</em>直下においてください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>Gitチュートリアル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>はじめてのバージョン管理<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>Gitを使ってバージョン管理する。<span class="tag">&lt;/p&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>上記のように更新して、保存しましょう。</p>

<p><em>index.html</em>を新規追加すると、下図のようにワークツリーに<em>index.html</em>が追加されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_02.png" alt=""></p>

<h4>現在のワークツリーとインデックスの状況を確認する</h4>

<p><em>index.html</em>に変更を加えたので、一度現在の状況を確認しましょう。それには、<code>git status</code>コマンドを使います。これにより、先ほどの図と同様のことをターミナル上で把握することができます。</p>

<pre><code>$ git status
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_06.png" alt=""></p>

<p>ここで重要なのは、赤色で書かれた<code>index.html</code>です。この部分で、<em>index.html</em>が新規にワークツリーに追加されたファイルだと教えてくれています。</p>

<pre><code>Untracked files:
        index.html
</code></pre>

<h4>次のコミットに含める変更箇所をステージする</h4>

<p><em>index.html</em>の変更箇所をステージします。ワークツリーから変更箇所をステージしてインデックスに移動させるには、<code>git add</code>コマンドを使用してファイルを選択します。</p>

<pre><code>$ git add index.html
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_03.png" alt=""></p>

<h4>現在のワークツリーとインデックスの状況を確認する</h4>

<p>再度、現在のワークツリーとインデックスの状況を確認してみましょう。</p>

<pre><code>$ git status
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_07.png" alt=""></p>

<p>次は緑色で<code>index.html</code>が表示されました。これは、<em>index.html</em>の変更箇所が現在インデックスにあり、次のコミットに入ることを示しています。</p>

<h4>コミットする</h4>

<p>コミット、つまりバージョンを作るために<code>git commit</code>コマンドを使用します。現在のインデックスにある変更箇所（ここでは<em>index.html</em>）をコミットします。</p>

<pre><code>$ git commit
</code></pre>

<p>すると、Cloud9の標準エディタであるnanoが起動し、中に下記のようなメッセージが既に入っていますが、これは、これからコミットするファイル（ここでは<em>index.html</em>）を表示してくれている<strong>コメント</strong>です。コメントは行頭に<code>#</code>が入っています。実際のコミットメッセージには含まれませんので、そのまま置いておきます。</p>

<pre><code># Please enter the commit message for your changes. Lines starting
# with '#' will be ignored, and an empty message aborts the commit.
# On branch master
#
# Initial commit
#
# Changes to be committed:
#       new file:   index.html
</code></pre>

<p>コメントの下部には、</p>

<pre><code># Changes to be committed:
#       new file:   index.html
</code></pre>

<p>とあり、新しく<em>index.html</em>がコミットに入りますよと示しています。この画面でもう一度何がコミットされるのかの確認することができます。</p>

<p>それでは、<code>first commit</code>とコミットメッセージ（日本語入力可能）を書いて、終了させます。終了時にファイル名をそのままで上書き保存して終了させましょう。nanoの使い方についてはターミナルのチャプターをご覧ください。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_08.png" alt=""></p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_08_02.png" alt=""></p>

<p>ここまでで1つ目のコミットを作成することができました。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_04.png" alt=""></p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_05.png" alt=""></p>

<h4>コミット履歴を確認する</h4>

<p>まず、<code>git status</code>で状況を確認してみると、下記のようなメッセージが表示されます。</p>

<pre><code>On branch master
nothing to commit, working tree clean
</code></pre>

<p>これは、今のステータスが最新のコミットと全く同じ状態で、新規ファイルなども無い状態を表します。</p>

<p>次に、現在コミットした履歴を確認してみましょう。</p>

<pre><code>$ git log
</code></pre>

<div class="alert alert-warning">
git logなどのコマンドで表示内容が長い場合は、lessが自動的に立ち上がりますので、<kbd>q</kbd>キーを押せば終了することができます。lessについては先ほどのターミナルのチャプターで確認しておきましょう。
</div>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_09.png" alt=""></p>

<p>ここでは4つの情報が表示されています。</p>

<ul>
  <li>コミットのリビジョン番号: <code>commit f965f22...</code></li>
  <li>コミットした人: <code>Author: techacademy-mentor ...</code></li>
  <li>コミット日時: <code>Date: Sat Aug 27 ...</code></li>
  <li>コミットメッセージ: <code>first commit</code></li>
</ul>

<p>まだコミットが1つしかないので、1つのコミット情報だけが表示されています。</p>

<h4>更にファイルを更新する</h4>

<p><em>commit-tutorial/</em>以下はGitのバージョン管理ができるようになっているので、安心して<em>index.html</em>に変更を加えていくことができます。</p>

<p>更にファイルを更新してみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>Gitチュートリアル<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>はじめてのバージョン管理<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>Gitを使ってバージョン管理する。<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">git-logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">git logo</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p><em>index.html</em>では下記の一文を追加しました。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>        <span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">git-logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">git logo</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p><em>git-logo.png</em>を<a href="https://techacademy.s3.amazonaws.com/training/github/basic/git-logo.png" download="git-logo.png">ここからダウンロード</a>して<em>index.html</em>と同じフォルダ内に配置してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_06.png" alt=""></p>

<h4>現在のワークツリーとインデックスの状況を確認する</h4>

<p>変更後は<code>git status</code>でどのファイルが変更されているのか何度も確認するようにしましょう。</p>

<pre><code>$ git status
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_10.png" alt=""></p>

<p><code>Changes not staged for commit:</code>には<em>index.html</em>が入っており、<code>Untracked files:</code>の中には<em>git-logo.png</em>が入っています。それぞれ、「変更されたがステージされていないファイル」と、「新規追加のファイル」という意味です。</p>

<h4>前回のコミットとの差分を確認する</h4>

<p><code>git diff</code>コマンドで前回のコミットと、今回変更したファイルの差分を抽出してみましょう。</p>

<pre><code>$ git diff
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_11.png" alt=""></p>

<p>上記のように追加した一文が緑色で表示されています。仮に、文を削除していた場合には赤色で表示されます。</p>

<p><em>git-logo.png</em>は新規ファイルなので、差分の比較対象にはなりません。<code>git status</code>としたときに<code>Untracked files</code>として表示されるので、新規ファイルだと判断します。</p>

<h4>ステージする</h4>

<p><code>git add</code>コマンドでステージしましょう。（次のコミットに含める変更を選びましょう）</p>

<p>ここでは<code>git add .</code>とファイル名の代わりに<code>.</code>を入力します。すると、新規追加や変更されたファイルを全てステージさせることができます。</p>

<pre><code>$ git add .
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_07.png" alt=""></p>

<h4>現在のワークツリーとインデックスの状況を確認する</h4>

<p>この時点で、<code>git status</code>で確認してみると、</p>

<pre><code>        new file:   git-logo.png
        modified:   index.html
</code></pre>

<p>となっているのがわかります。</p>

<h4>コミットする</h4>

<p>それではステージされた変更分をコミットしましょう。ここでは<code>-m</code>オプションを使用してコミットメッセージを直接入力しています。こうすると、nanoを立ち上げる必要がありません。Cloud9ではターミナル上では日本語を入力することができませんが、Macのターミナル上などでは日本語メッセージが可能です。</p>

<pre><code>$ git commit -m "add git-logo image"
</code></pre>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_11_02.png" alt=""></p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_08.png" alt=""></p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-commit_09.png" alt=""></p>

<h4>コミット履歴を確認する</h4>

<p><code>git log</code>で確認すると、コミットは2つに増えています。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_11_03.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 まとめ
</h3><p>ここではローカルリポジトリで変更を加えて、コミットを進めていく手順を学びました。コミットを進めていくことが、バージョンを作っていくことになり、コミット履歴がバージョン管理の履歴となります。ファイルを変更（開発）し、コミットを繰り返す作業が、Gitでバージョン管理するときの基本の流れです。</p>

<p>コミット以外にも重要な概念である、ワークツリー、インデックス、ローカルリポジトリの違いと、その領域の中でコミットに向けて変更ファイルを操作（ステージやコミット）する方法は理解できたでしょうか。ここでは使用したコマンドなどを振り返っておきましょう。よくわからない方は作成した<em>commit-tutorial/</em>フォルダを削除して、もう一度最初からやり直してみても良いでしょう。そのときは、ここで書いた流れに任せるのではなく、自分でバージョン管理するという姿勢で臨みましょう。疑問があればメンターに質問してみてください。</p>

<h4>使用したコマンド</h4>

<p>ここで使用したコマンドはいずれもGitの中で最も大事なコマンドであり、必須コマンドです。覚えておきましょう。</p>

<p><em>使用したGitコマンド</em></p>

<table>
  <thead>
    <tr>
      <th>コマンド</th>
      <th>実行結果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>git init</code></td>
      <td>現在のフォルダ内にリポジトリを作成し、ワークツリーとインデックスを用意する。</td>
    </tr>
    <tr>
      <td><code>git add ファイル名</code></td>
      <td>新規追加や変更されたファイルを選択し、ステージさせる。</td>
    </tr>
    <tr>
      <td><code>git commit</code></td>
      <td>ステージされた変更をコミットする。<code>git commit -m 'message'</code>でも良い。</td>
    </tr>
    <tr>
      <td><code>git status</code></td>
      <td>ワークツリーとインデックスの状況をファイル単位で確認する。</td>
    </tr>
    <tr>
      <td><code>git diff</code></td>
      <td>ワークツリーとインデックスを比較して、その差分を表示する。</td>
    </tr>
    <tr>
      <td><code>git log</code></td>
      <td>過去のコミット履歴を確認する。</td>
    </tr>
  </tbody>
</table>

<h4>git diffが比較しているもの</h4>

<p><code>git diff</code>は、ワークツリーとインデックスを比較しています。インデックスに何もステージされていなければ、ワークツリーと前回コミットとの比較と同じ意味になります。</p>

<p>インデックスと最新コミットの差分を確認したい場合には、<code>--cached</code>（もしくは<code>--staged</code>でも同じ）オプションを付けます。先ほどのチュートリアルでは触れませんでしたが、<code>git add</code>でファイルをステージしたあとに<code>git diff</code>を実行しても差分は表れません。ワークツリーとインデックスに差がないからです。インデックスにステージされたファイルの差分を見る場合には、<code>git diff --cached</code>を実行して、インデックスと基準コミットと差分を取れば良いわけです。</p>

<table>
  <tbody>
    <tr>
      <td><code>git diff</code></td>
      <td>ワークツリーとインデックスの差分</td>
    </tr>
    <tr>
      <td><code>git diff --cached</code></td>
      <td>インデックスとローカルリポジトリの基準コミットとの差分</td>
    </tr>
  </tbody>
</table>

<p>実は、先ほどの一連の図で <code>＝</code> と <code>≠</code> がありましたが、これは<code>diff</code>の結果を表したもので、 <code>＝</code> は差分無し、 <code>≠</code> は差分有りを示しています。一度見なおしてみても良いでしょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-diff_01.png" alt=""></p>

<h4>バージョン管理の範囲は？</h4>

<p>今回は<em>~/environment/commit-tutorial/</em>にリポジトリを作成しましたが、バージョン管理はどの範囲まで認識されるのでしょうか？</p>

<p>答えは、<em>~/environment/commit-tutorial/</em>より下層にあるファイルは全てバージョン管理下におかれます。例えば、<em>~/environment/commit-tutorial/foo/bar/contact.html</em>を作成して、<code>git status</code>を実行すると、<em>contact.html</em>が新規ファイルとして認識されるようになります。</p>

<p>注意点としては、新規フォルダの中に一切ファイルが入っていない空フォルダは、新規フォルダとしては認識されません。Gitはあくまでファイルを基準にバージョン管理を行っていて、フォルダはファイルではないからです。どうしても空フォルダを認識させたい場合には、<em>.keep</em>という名前の空ファイルを作成してそのフォルダ内に配置することで、<em>.keep</em>ファイルを通して新規フォルダとして認識させるのが通例となっています。</p>

<h4>良いコミットメッセージとは</h4>

<p>コミットをまとまりのある単位で分割したほうが良いことは既に述べました。コミットメッセージを考えるより先に、まずは論理的に独立したコミットをするようにしましょう。そうでないと、コミットメッセージがどの単位を説明しているのかわかりません。</p>

<p>それでは、論理的に独立したコミットができたとして、良いコミットメッセージについて考えます。そもそもコミットメッセージは、他人（未来の自分含む）から見てコミット内容を把握しやすくするためのメッセージです。公式のGitのドキュメントでは、下記のようなメッセージが良いコミットメッセージと定められています。</p>

<p><em>良いコミットメッセージのサンプル（<a href="https://git-scm.com/book/ja/v2/Git-%E3%81%A7%E3%81%AE%E5%88%86%E6%95%A3%E4%BD%9C%E6%A5%AD-%E3%83%97%E3%83%AD%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88%E3%81%B8%E3%81%AE%E8%B2%A2%E7%8C%AE#コミットの指針" target="_blank">引用元</a>)</em></p>

<pre><code>短い (50 文字以下での) 変更内容のまとめ

必要に応じた、より詳細な説明。72文字程度で折り返します。最初の
行がメールの件名、残りの部分がメールの本文だと考えてもよいでしょ
う。最初の行と詳細な説明の間には、必ず空行を入れなければなりま
せん(詳細説明がまったくない場合は、空行は不要です)。空行がないと、
rebase などがうまく動作しません。

空行を置いて、さらに段落を続けることもできます。

  - 箇条書きも可能

  - 箇条書きの記号としては、主にハイフンやアスタリスクを使います。
    箇条書き記号の前にはひとつ空白を入れ、各項目の間には空行を入
    れます。しかし、これ以外の流儀もいろいろあります。
</code></pre>

<p>いくら良いと言っても、上記のような長いコミットメッセージを実際の開発現場で書くのは稀でしょう。多くの場合は、<strong>変更点の要約</strong>と<strong>それを実装した理由</strong>があれば良いでしょう。この2つはコミットを把握しやすくする上で最も必要な情報です。変更点の要約に関してはコミット詳細を参照すれば済むかも知れませんが、<strong>それを実装した理由</strong>に関してはコミットメッセージ（もしくはソースコードのコメント）でしか残すことができません。意味のわからないコミットをできるだけ少なくするように努めましょう。</p>

<p>コミットメッセージのルールは開発現場によって違うため、それぞれの開発現場のルールに則るようにしてください。</p>
</div></section><section id="chapter-7"><h2 class="index">7. GitHubのアカウント登録
</h2><div class="subsection"><p>GitHubとはソフトウェア開発プロジェクトのためのソースコード管理システムです。<br>
ソースコードを管理するだけでなく、公開されているソースコードを閲覧したりすることができます。<br>
このカリキュラムの中でもGitHubを利用して、バージョン管理を行っていきます。</p>

<div class="alert alert-warning">
既にGitHubアカウントを持っている場合はアカウント登録をする必要はありません。
</div>

<p>GitHubを利用するためにアカウント登録を行います。<br>
下記リンクのGitHubのトップページにアクセスしてアカウント登録を行ってください。</p>

<blockquote>
  <p><a href="https://github.com/" target="_blank">GitHub</a></p>
</blockquote>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/github_signup.png" alt="GitHub会員登録"><br>
<em>GitHubトップページ</em></p>

<p>GitHubのプランを選択します。<br>
Free のプランを選択し、「Continue」ボタンを押下して登録を完了してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/github_plan_select[2].png" alt="プラン選択"><br>
<em>プラン選択画面</em></p>

<p>会員登録を行うと、登録したメールアドレスにURL付きの認証のメールが届きます。認証するためのボタンをクリックして、メールアドレスの認証をしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/github_account_email_verify[1].png" alt="github"><br>
<em>GitHub認証メール</em></p>

<p>以上で、GitHubのアカウント登録は完了です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 GitHubのアカウントを学習システムに登録
</h3><p>GitHubのアカウントを登録したあとは、TechAcademyのシステムへアカウントを登録しましょう。<br>
これは <strong>課題提出時に必要なため</strong> です。</p>

<p>次に、<a href="../settings" target="_blank">アカウント設定</a>にアクセスし、「GitHubと連携する」ボタンをクリックしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/github_user_01.png" alt="github"></p>

<p>GitHubにログインしていない場合は、GitHubのログインページへ移動しますので、登録したアカウントでログインしてください。<br>
また、メールアドレスを認証していない場合は、先にGitHub登録に使用したメールアドレスに届く認証メールを確認し、URLをクリックして認証してください。（メール認証を行っていないと下記の「Authorize application」ボタンが押せない状態になります）</p>

<p>上記が行われていると、下記キャプチャのようにシステムとの連携を確認する画面が表示されるので、「Authorize application」ボタンをクリックし、連携を許可してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/common/orientation/github_authorize_techAcademy.png" alt="github"></p>

<p>すると、下記のようにTechAcademyシステムとGitHubが連携されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/lessons/orientation/github_user_02.png" alt="github"></p>

<p>これでTechAcademyシステムにGitHubアカウントが連携され、課題を提出できるようになりました。</p>
</div></section><section id="chapter-8"><h2 class="index">8. GitHubへ反映する
</h2><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 GitHubへリポジトリを反映するための一連の流れ
</h3><p>GitHubへリポジトリを反映させるためには、下記の手順で実行しましょう。</p>

<ol>
  <li>GitHubにリモートリポジトリを作成する</li>
  <li>ローカルリポジトリにリモートリポジトリを登録する</li>
  <li>登録したリモートリポジトリへプッシュする</li>
  <li>GitHubのリモートリポジトリにプッシュされたか確認する</li>
</ol>

<h4>GitHubにリモートリポジトリを作成する</h4>

<p><code>first-git</code>という名前でGitHubにリモートリポジトリを作成して、公開しましょう。</p>

<p>まずは<a href="https://github.com/" target="_blank">GitHub</a>へアクセスし、ログインしてください。次に＋ボタンから「New repository」をクリックしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_12.png" alt=""></p>

<p>GitHubへリモートリポジトリを作成します。「Repository name」に<code>first-git</code>と入力して、「Create repository」をクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_13.png" alt=""></p>

<p>これでリモートリポジトリが作成されましたが、まだ中身は空っぽです。ローカルリポジトリをリモートリポジトリにもコピーして反映させるために<strong>プッシュ</strong>というコマンドが必要となります。まずはその準備のためにローカルリポジトリにリモートリポジトリを登録していきます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_14.png" alt=""></p>

<h4>ローカルリポジトリにリモートリポジトリを登録する</h4>

<p>ローカルリポジトリにリモートリポジトリを登録するには、先ほどのキャプチャ内にあった下記のコマンドを実行します。</p>

<pre><code>$ git remote add origin https://github.com/ユーザ名/first-git.git
</code></pre>

<p>このコマンドは、ローカルリポジトリに<code>origin</code>という名前でリモートリポジトリ(ここでは<code>first-git.git</code>)を登録するという意味です。<code>ユーザ名</code>には皆さんのGitHubでのユーザ名を入力してください。</p>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_15.png" alt=""></p>

<p>これでローカルリポジトリにリモートリポジトリを登録できました。以降、このローカルリポジトリでは、<code>origin</code>を使用してリモートリポジトリとやり取りを行うことができます。したがって、<code>git remote add origin ...</code>のコマンドは何度も実行する必要はありません。</p>

<p>リモートリポジトリの登録状況を確認したい場合は下記のコマンドで確認することができます。</p>

<pre><code>$ git remote -v
</code></pre>

<h4>登録したリモートリポジトリへプッシュする</h4>

<p>それでは、登録したリモートリポジトリへプッシュして、ローカルでのコミットを反映させましょう。これも空っぽのリモートリポジトリのキャプチャ内にありましたが、下記のコマンドを実行すればローカルリポジトリがリモートリポジトリへプッシュされます。</p>

<pre><code>$ git push origin master
</code></pre>

<p>その際、GitHubのユーザ名とパスワードを要求されますので、入力しましょう。</p>

<ul>
  <li><code>Username for 'https://github.com':</code>が出るとGitHubのユーザ名を入力して<kbd>Enter</kbd>を押します</li>
  <li><code>Password for 'https://ユーザ名@github.com':</code>が出るとGitHubのパスワードを入力して<kbd>Enter</kbd>を押します（ただし、パスワードは入力表示されない）</li>
</ul>

<p><img src="https://s3-ap-northeast-1.amazonaws.com/techacademy/bootcamp/common/git/git_16.png" alt=""></p>

<p>これで、ローカルリポジトリのコピーがリモートリポジトリにプッシュされ、反映されました。</p>

<h4>GitHubのリモートリポジトリにプッシュされたか確認する</h4>

<pre><code>https://github.com/ユーザ名/first-git
</code></pre>

<p>をブラウザで見てみましょう。空っぽだったリモートリポジトリに<em>index.html</em>や<em>git-logo.png</em>が入っています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_17.png" alt=""></p>

<p>「2 Commits」をクリックし、<code>git log</code>のようにコミット履歴を確認することもできます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_18.png" alt=""></p>

<p>更に、「add git-logo image」をクリックすると、コミットの詳細や差分が表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/git_19.png" alt=""></p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 まとめ
</h3><p>ここではローカルリポジトリでの変更をリモートリポジトリへ反映する手順を学びました。</p>

<h4>使用したコマンド</h4>

<p><em>使用したGitコマンド</em></p>

<table>
  <thead>
    <tr>
      <th>コマンド</th>
      <th>実行結果</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>git remote add origin リモートリポジトリURL</code></td>
      <td>ローカルリポジトリにリモートリポジトリを登録する</td>
    </tr>
    <tr>
      <td><code>git remote -v</code></td>
      <td>ローカルリポジトリに登録されたリモートリポジトリの一覧を表示する</td>
    </tr>
    <tr>
      <td><code>git push origin master</code></td>
      <td>登録したリモートリポジトリへプッシュする</td>
    </tr>
  </tbody>
</table>

<h4>originとは</h4>

<p>自分のローカルリポジトリと同じリモートリポジトリを、 <em>origin</em> という名前にするのが慣習となっています。理由は後ほど出てくる<code>git clone</code>コマンドでリモートリポジトリをローカルリポジトリへコピーしてくると、自動的にリモートリポジトリの名前が <em>origin</em> とつけられるからです。</p>

<p><em>origin</em>は、実際にGitHubで作られたリモートリポジトリそのものではないので、<em>origin</em>を削除してもGitHubのリモートリポジトリが削除される訳ではありません。<em>origin</em>はGitHubのリモートリポジトリのURLや、リモートリポジトリのコピーを持っているに過ぎません。</p>

<p><em>origin</em>は、リモートリポジトリを扱うときに利用されます。リモートリポジトリを扱うコマンドは<code>git push</code>以外にも、<code>git pull</code>や<code>git fetch</code>などがあります。<code>git push</code>がローカルリポジトリをリモートリポジトリへコピーするコマンドに対して、<code>git pull</code>はリモートリポジトリの更新分をローカルリポジトリに取り込むコマンドで、チーム開発などで利用します。<code>git fetch</code>はリモートリポジトリの更新分を取得するのみでローカルリポジトリに取り込むまでは実行しません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 課題に向けて
</h3><h4>originのURLが間違っている場合</h4>

<p>まずは<code>git remote -v</code>で登録されているURLを確認してみましょう。</p>

<p>もしURLが間違っていることがあれば、一度<em>origin</em>を削除して、設定しなおしましょう。</p>

<pre><code>$ git remote remove origin
$ git remote add origin リモートリポジトリURL
</code></pre>

<p>もしくは<code>set-url</code>で変更することもできます。</p>

<pre><code>$ git remote set-url origin リモートリポジトリURL
</code></pre>

<h4>ローカルリポジトリを作りなおして、既存のリモートリポジトリにプッシュする場合</h4>

<p><code>git push</code>に<code>-f</code>オプションをつけると、強制的にリモートリポジトリをローカルリポジトリで上書きすることになります。</p>

<pre><code>$ git push -f origin master
</code></pre>

<p>このコマンドは<strong>大変危険なコマンド</strong>です。充分注意して使用してください。今回はGitHubトレーニングの課題のやり直しとして、上記コマンドを使用して良いですが、チーム開発を行っている際に上記コマンドを実行すると取り返しのつかないことになる可能性もあります。</p>

<h4>GitHubのリモートリポジトリのリポジトリ名を変更する</h4>

<p>間違った名前でリモートリポジトリを作成してしまった場合には、GitHubのリモートリポジトリのページから、「Setting」へ進めばリモートリポジトリを「Rename」できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-github_rename_01.png" alt=""></p>

<h4>GitHubのリモートリポジトリを削除する方法</h4>

<p>もし、GitHubのリモートリポジトリを削除したくなった場合には、GitHubのリモートリポジトリのページから、「Setting」へ進み、Settingページの最下層へスクロールさせます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-github_delete_01.png" alt=""></p>

<p>するとDanger Zoneという項目があるので、その一番下に「Delete this repository」というボタンがあるので、このボタンを押します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-github_delete_02.png" alt=""></p>

<p>モーダルが表示されるので、入力欄に太字で書いてある <code>ユーザー名/リモートリポジトリ名</code> を入力してください。すると、削除ボタンをクリックすることができるようになります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-github_delete_03.png" alt=""></p>

<p>GitHub上でリモートリポジトリを削除してしまえば、もう<strong>元に戻すことができません</strong>。充分注意してください。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-commit">課題：コミットからプッシュまで</h3><p>Gitで指定通りの操作が可能かの確認です。ここでは、ブラウザ上で おみくじ を引けるPHPプログラムを作成します。</p>

<p>Cloud9上で、ワークスペース（<em>~/environment</em>）直下に <em>kadai-commit</em> フォルダを作成し、そのフォルダ内で今回の課題のGit操作を行ってください。</p>

<p>下記の通りにGitで操作したあと、GitHub上に<em>kadai-commit</em>という名前のリモートリポジトリを作成し、プッシュしてください。</p>

<h4>最初のコミット</h4>

<ul>
  <li><em>sample.php</em>を追加。内容は以下のとおり。</li>
</ul>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>おみくじ<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>おみくじ<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>おみくじの結果：無し<span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">sample.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">act</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">draw</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おみくじをひく！<span class="tag">&lt;/button&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<ul>
  <li><em>kadai-commit</em> フォルダ内でGitのローカルリポジトリを作成し、コミットする。コミットメッセージは <code>add sample.php</code> とする。</li>
</ul>

<h4>2番目のコミット</h4>

<ul>
  <li><em>sample.php</em> を以下のように上書きする</li>
</ul>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">'</span><span class="content">無し</span><span class="delimiter">'</span></span>;
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>おみくじ<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>おみくじ<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>おみくじの結果：<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$result</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">sample.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">act</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">draw</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おみくじをひく！<span class="tag">&lt;/button&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<ul>
  <li>コミットメッセージは <code>update sample.php</code></li>
</ul>

<h4>3番目のコミット</h4>

<ul>
  <li><em>sample.php</em> を以下のように上書き</li>
</ul>

<div class="language-php highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="inline-delimiter">&lt;?php</span>
    <span class="local-variable">$result</span> = <span class="string"><span class="delimiter">'</span><span class="content">無し</span><span class="delimiter">'</span></span>;
    <span class="keyword">if</span> (<span class="predefined">array_key_exists</span>(<span class="string"><span class="delimiter">'</span><span class="content">act</span><span class="delimiter">'</span></span>, <span class="predefined">$_POST</span>)) {
        <span class="local-variable">$result</span> = omikuji();
    }
    
    <span class="keyword">function</span> <span class="function">omikuji</span>() {
        <span class="local-variable">$fortune</span> = [<span class="string"><span class="delimiter">"</span><span class="content">大吉</span><span class="delimiter">"</span></span>, <span class="string"><span class="delimiter">"</span><span class="content">吉</span><span class="delimiter">"</span></span>, <span class="string"><span class="delimiter">"</span><span class="content">中吉</span><span class="delimiter">"</span></span>, <span class="string"><span class="delimiter">"</span><span class="content">小吉</span><span class="delimiter">"</span></span>, <span class="string"><span class="delimiter">"</span><span class="content">末吉</span><span class="delimiter">"</span></span>, <span class="string"><span class="delimiter">"</span><span class="content">凶</span><span class="delimiter">"</span></span>];
        <span class="keyword">return</span> <span class="local-variable">$fortune</span>[random_int(<span class="integer">0</span>, <span class="predefined">count</span>(<span class="local-variable">$fortune</span>) - <span class="integer">1</span>)];
    }
<span class="inline-delimiter">?&gt;</span>
<span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;head&gt;</span>
        <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;title&gt;</span>おみくじ<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;/head&gt;</span>
    <span class="tag">&lt;body&gt;</span>
        <span class="tag">&lt;h1&gt;</span>おみくじ<span class="tag">&lt;/h1&gt;</span>
        <span class="tag">&lt;p&gt;</span>おみくじの結果：<span class="inline-delimiter">&lt;?php</span> <span class="predefined">print</span> <span class="predefined">htmlspecialchars</span>(<span class="local-variable">$result</span>, <span class="predefined-constant">ENT_QUOTES</span>, <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>); <span class="inline-delimiter">?&gt;</span><span class="tag">&lt;/p&gt;</span>
        <span class="tag">&lt;form</span> <span class="attribute-name">action</span>=<span class="string"><span class="delimiter">"</span><span class="content">sample.php</span><span class="delimiter">"</span></span> <span class="attribute-name">method</span>=<span class="string"><span class="delimiter">"</span><span class="content">POST</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">submit</span><span class="delimiter">"</span></span> <span class="attribute-name">name</span>=<span class="string"><span class="delimiter">"</span><span class="content">act</span><span class="delimiter">"</span></span> <span class="attribute-name">value</span>=<span class="string"><span class="delimiter">"</span><span class="content">draw</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>おみくじをひく！<span class="tag">&lt;/button&gt;</span>
        <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<ul>
  <li>コミットメッセージは <code>add omikuji function</code></li>
</ul>

<p><strong>※補足：<code>random_int($min, $max)</code> は、<code>$min</code> 以上 <code>$max</code> 以下のランダムな整数を返してくれる関数です。</strong></p>

<p><a href="http://php.net/manual/ja/function.random-int.php" target="_blank">参考：random_int()</a></p>
</div></section><section id="chapter-9"><h2 class="index">9. Gitで管理しないファイルを指定する
</h2><div class="subsection"><p>Gitのデフォルト設定では、全てのファイルを管理下に入れようとします。</p>

<p>しかし、Gitで管理したくないファイルもあります。</p>

<ul>
  <li>公開するとセキュリティ問題となるファイル（パスワードが入力されているファイル等）</li>
  <li>二次的に生成されるファイル（ビルドファイルや、キャッシュファイルなど）</li>
  <li>外部ライブラリで管理不要なもの</li>
</ul>

<p>これらをGitの管理下から除くには、<em>.gitignore</em>というファイルにファイル名などを指定すればいいのです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 .gitignore
</h3><p><em>.gitignore</em>という名前のファイルを新規作成し、<em>.git</em>と同じ階層に配置しましょう。<em>.gitignore</em>は単なるテキストファイルです。<em>.gitignore</em>には一行毎に無視ファイルや無視フォルダを書いていきます。</p>

<p>サンプルリポジトリで確認してみましょう。</p>

<ul>
  <li><a href="https://github.com/techacademy-jp/git-training-sample" target="_blank">サンプルリポジトリ</a></li>
</ul>

<pre><code>$ cd ~/environment/
$ git clone https://github.com/techacademy-jp/git-training-sample.git ignore-tutorial
$ cd ignore-tutorial/
</code></pre>

<p>新規に <code>git clone</code> コマンドを使用しました。clone は、クローン（複製）という意味で、Gitリポジトリのコピーを実行します。ここでは、GitHubにあるリモートリポジトリ (https://github.com/techacademy-jp/git-training-sample.git) を、 Cloud9上の <em>~/environment/ignore-tutorial</em> にコピーしてきています。コミット履歴なども含めリポジトリ (<em>.git</em>) を完全にコピーしてくるので、以降は通常通りローカルリポジトリとして git コマンドを使用することができます。</p>

<p>上記サンプルリポジトリを<code>git clone</code>した後に、<code>touch</code>コマンドで<em>sample.html</em>を作成してみましょう。その後に<code>git status</code>でワークツリーを確認します。</p>

<pre><code>$ touch sample.html
$ git status

On branch master
Your branch is up-to-date with 'origin/master'.
Untracked files:
  (use "git add &lt;file&gt;..." to include in what will be committed)

        sample.html

nothing added to commit but untracked files present (use "git add" to track)
</code></pre>

<p>この時点ではワークツリーに変更が反映されています（<em>sample.html</em>が新規追加されている）。</p>

<p>ここで、<em>.gitignore</em>を<em>.git</em>がある階層と同じ場所に配置して、下記の通りに編集してみましょう。</p>

<p><em>.gitignore</em></p>

<pre><code>sample.html
</code></pre>

<p>これで<code>git status</code>で確認してみましょう。</p>

<pre><code>$ git status

On branch master
Your branch is up-to-date with 'origin/master'.
Untracked files:
  (use "git add &lt;file&gt;..." to include in what will be committed)

        .gitignore

nothing added to commit but untracked files present (use "git add" to track)
</code></pre>

<p><em>sample.html</em>はワークツリーから消えました。これはGitに無視されたためです。そして<em>.gitignore</em>が追加されました。<em>.gitignore</em>はGitで管理すべきファイルなので、コミットします。</p>

<pre><code>$ git add .gitignore
$ git commit -m 'add .gitignore'
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 .gitignoreの記法
</h3><p><em>.gitignore</em>の記法にはいくつかあります。コメントを書きたい場合には行頭に<code>#</code>を書き、フォルダの場合には<code>/</code>を書き、<code>*</code>を使えば色々なファイル名にマッチします。</p>

<p><em>.gitignoreのサンプル</em></p>

<pre><code># # のあとはコメントになる

# 指定フォルダ以下は全て無視する（フォルダの最後は / ）
sample_folder/

# *を使うと色々なファイル名にマッチする
# 下記は.txtが拡張子のファイルは全て無視
*.txt
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-9-3">9.3 .gitignoreプロジェクト
</h3><p>様々なプロジェクトに必要な<em>.gitignore</em>を集めたプロジェクトもあります。</p>

<ul>
  <li><a href="https://github.com/github/gitignore" target="_blank">gitignore - GitHub</a></li>
</ul>

<p>MacやWindowsでも不要なファイルが生成されることがあるので、そういう場合は上記プロジェクト内の<em>macOS.gitignore</em>や<em>Windows.gitignore</em>を使用しましょう。これらはグローバルな<em>.gitignore</em>として利用すると良いでしょう。</p>

<p>グローバルな<em>.gitignore</em>はHOMEフォルダに<em>.gitignore_global</em>としておけば、適用されます。<em>~/.gitignore_global</em>です。グローバルな無視（除外）設定には充分注意しておきましょう。知らぬ間に無視設定される可能性がありますので、よくあるようなファイルやフォルダ名を無視設定に追加すると、知らぬ間に管理されなくなります。</p>

<ul>
  <li><a href="https://github.com/github/gitignore/blob/master/Global/macOS.gitignore" target="_blank">macOS.gitignore</a></li>
  <li><a href="https://github.com/github/gitignore/blob/master/Global/Windows.gitignore" target="_blank">Windows.gitignore</a></li>
</ul>

<p>macOSでは、<em>.DS_Store</em>などがGit管理下から除外される設定となっており、Windowsでは、<em>Thumbs.db</em>などが除外設定されています。</p>
</div></section><section id="chapter-10"><h2 class="index">10. まとめ
</h2><div class="subsection"><p>このレッスンでは、バージョン管理の必要性、Gitの概念、GitHubとは何か、Gitコマンドのチュートリアルを学んできました。ここで学んだものは最も基礎的な部分です。これからは開発するときには、機能ごとにコミットしてバージョン管理をするようにしましょう。後のレッスンで Heroku を使うにしても Git が必要です。</p>

<p>ここでは、Gitの概念の基本である、リポジトリ（ローカル／リモート）、コミット、ワークツリー、インデックスを理解し、<strong>ワークツリー =&gt; インデックス =&gt; ローカルリポジトリ</strong> のGitコマンド(<strong>add</strong>, <strong>commit</strong>)を覚えておけば良いでしょう。その流れの確認のためのコマンドである(<strong>status</strong>, <strong>diff</strong>, <strong>log</strong>)も覚えておくと完璧です。</p>

<div class="alert alert-warning">
以降の「過去のコミット情報の閲覧」、「元に戻す」は、何かあったときのリファレンス用に設置しています。Gitで発展的な内容を知りたい場合に参照してください。ただし、学習時間もかかってしまうので、まずは先に進む（次のレッスンに進む）ことをお勧めします。
</div>
</div></section><section id="chapter-11"><h2 class="index">11. （補足）過去のコミット情報の閲覧
</h2><div class="subsection"><h3 class="index" id="chapter-11-1">11.1 準備
</h3><p>ここでは下記のサンプルリポジトリを利用して、確認を行ってみましょう。サンプルリポジトリは、先ほどGitHubにプッシュした<code>first-git</code>にもう1つコミットを追加しています。</p>

<ul>
  <li><a href="https://github.com/techacademy-jp/git-training-sample" target="_blank">サンプルリポジトリ</a></li>
</ul>

<p>上記のリモートリポジトリを、Cloud9のローカルリポジトリとしてコピーします。コピーには、<code>git clone</code>コマンドを使用します。<code>git clone リモートリポジトリ.git コピー先フォルダ名</code>というコマンドになります。<code>コピー先フォルダ名</code>を省略すると、リモートリポジトリ名がそのままフォルダ名になります。ここでは<em>log-tutorial</em>とフォルダ名をつけましょう。</p>

<pre><code>$ cd ~/environment/
$ git clone https://github.com/techacademy-jp/git-training-sample.git log-tutorial
$ cd log-tutorial/
</code></pre>

<p>上記コマンドを順に実行してください。まず <em>~/environment/</em> へ現在フォルダを移動し、<code>git clone</code>コマンドでリモートリポジトリをローカルリポジトリへコピーします。その際に、フォルダ名を<em>log-tutorial</em>にしておきます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-2">11.2 様々なコミット履歴の確認方法
</h3><p>コミットの履歴の確認には基本的に<code>git log</code>コマンドを使います。</p>

<p>まずは、単に <code>git log</code> でコミット履歴を確認してみましょう。</p>

<pre><code>$ git log
</code></pre>

<pre><code>commit 9f943bcc7b95d519e09844aa7c9580cde65ae01e
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 14:22:38 2016 +0000

    add list.html

commit 7d97d525477d7bd034a127e61dd7d4045c95c710
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 13:58:42 2016 +0000

    add git-logo image

commit f0d0810da93da019b175b42d74b1f0982b7eb695
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 13:46:59 2016 +0000

    first commit
</code></pre>

<p>出力結果を見ると、表示される情報は下記の4つです。</p>

<ul>
  <li>commit</li>
  <li>Author</li>
  <li>Date</li>
  <li>コミットメッセージ</li>
</ul>

<p>しかし、これだけの情報では満足できない場合が多々あります。他の情報、例えば実際に追加されたファイルが見たい場合、もっと詳細に変更箇所を知りたい場合、長すぎるので短くしたい場合などです。<code>git log</code>はターミナル画面を大きく占有してしまうため、必要な情報を必要なだけわかりやすい形式で表示しなければいけません。</p>

<p><code>git log</code>の情報取得を制御するには、基本的なオプションを覚えておけば良いでしょう。</p>

<h4><code>--oneline</code></h4>

<p>どうしても<code>git log</code>の表示は長くなります。そこで、リビジョン番号とコミットメッセージのみを、1コミットに対して1行で表示してくれる便利なオプションがあります。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>とてもシンプルな表示になりました。「あのコミットのリビジョン番号なんだっけ」というときには重宝します。</p>

<h4><code>-p</code></h4>

<p>逆にもっと情報が欲しいと思うこともあります。1つ1つのコミットの詳細情報（差分）まで確認したい場合があります。</p>

<pre><code>$ git log -p
</code></pre>

<pre><code>commit 9f943bcc7b95d519e09844aa7c9580cde65ae01e
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 14:22:38 2016 +0000

    add list.html

diff --git a/index.html b/index.html
index 7609760..41c88cc 100644
--- a/index.html
+++ b/index.html
@@ -8,5 +8,6 @@
         &lt;h1&gt;はじめてのバージョン管理&lt;/h1&gt;
         &lt;p&gt;Gitを使ってバージョン管理する。&lt;/p&gt;
         &lt;img src="git-logo.png" alt="git logo"&gt;
+        &lt;a href="list.html"&gt;リスト&lt;/a&gt;
     &lt;/body&gt;
 &lt;/html&gt;

（中略）
</code></pre>

<p>ほとんど全ての情報を確認することができますが、1つ1つが大きくかなり長い表示になります。</p>

<h4><code>-数字</code></h4>

<p>コミット履歴が長いと無駄に表示が長くなります。<code>-数字</code>オプションで直近いくつまで表示するかを指定できます。</p>

<pre><code>$ git log -2
</code></pre>

<p>これは他のオプションとも組み合わせられます。</p>

<pre><code>$ git log --oneline -2
</code></pre>

<pre><code>$ git log -p -2
</code></pre>

<h4><code>--stat</code></h4>

<p><code>-p</code>のように詳細まで見られなくても、何のファイルが追加されてどの程度変更があったのかを知りたい場合があります。</p>

<pre><code>git log --stat
</code></pre>

<pre><code>commit 9f943bcc7b95d519e09844aa7c9580cde65ae01e
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 14:22:38 2016 +0000

    add list.html

 index.html |  1 +
 list.html  | 16 ++++++++++++++++
 2 files changed, 17 insertions(+)

commit 7d97d525477d7bd034a127e61dd7d4045c95c710
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 13:58:42 2016 +0000

    add git-logo image

 git-logo.png | Bin 0 -&gt; 1943 bytes
 index.html   |   1 +
 2 files changed, 1 insertion(+)
</code></pre>

<p>オプション無しと比べると、コミット毎に変更のあったファイル一覧と、どの程度変更があったのか表示されています。<code>-数字</code> などのオプションとも組み合わせられます。</p>

<h4><code>-- ファイル名</code></h4>

<p>コミットの中でもファイル名やフォルダ名を記載することで、指定ファイルやフォルダに限ったコミット履歴を確認することが可能です。</p>

<p>下記のように<code>-- ファイル名</code>と書きます。ここで<code>--</code>は他のオプションと区切るために書くので、<code>--</code>以降にはファイル名しか書けません（オプションを書けません）。</p>

<pre><code>$ git log -p -- index.html
</code></pre>

<p>スペース区切りで複数選択することもできます。</p>

<pre><code>$ git log -p -- index.html list.html
</code></pre>

<h4><code>--before</code>と<code>--after</code></h4>

<p>コミット履歴の表示を指定期間で制限することもできます。</p>

<p><code>git log</code>で<code>Date</code>を確認してみると下記のようになっています。</p>

<ul>
  <li>Date:   Sat Aug 20 14:22:38 2016 +0000 (2016-08-20 14:22:38)</li>
  <li>Date:   Sat Aug 20 13:58:42 2016 +0000 (2016-08-20 13:58:42)</li>
  <li>Date:   Sat Aug 20 13:46:59 2016 +0000 (2016-08-20 13:46:59)</li>
</ul>

<p><code>--before</code>で<code>'2016-08-20 14:00'</code>より前のコミットだけ抜き出してみましょう。</p>

<pre><code>$ git log --before='2016-08-20 14:00'
</code></pre>

<p>最新のコミットは<code>14:22:38</code>であったため、表示されていません。</p>

<p>更に<code>--after</code>で<code>'2016-08-20 13:50'</code>より後のコミットという条件も追加します。</p>

<pre><code>$ git log --before='2016-08-20 14:00' --after='2016-08-20 13:50'
</code></pre>

<p>すると、該当するコミットが1つだけになりました。</p>

<p>ここでは、時刻まで指定しましたが<code>'2016-09-01'</code>のように日付だけでも絞り込むことができますし、<code>'2 weeks ago'</code>のように今日を基準に何日前かなどでも絞り込むことができます。Cloud9での時刻表示は、日本時間ではないことに注意してください。日本時間と比べてマイナス9時間されています。詳しくは知りたい場合には <code>GMT</code> や <code>UTC</code> について検索してみましょう。</p>

<p>また、<code>--before</code>と<code>--after</code>は<code>--until</code>と<code>--since</code>に言い換えることもできます。好きな言い方を使ってください。</p>

<h4><code>-S</code></h4>

<p>ある文字列が追加または削除されたコミットを検索したい場合があります。そういうときには<code>-S</code>オプションがとても有効です。</p>

<p><code>-S</code>に続いて、そのまま<code>git-logo</code>と書きます。すると<code>git-logo</code>という文字列が追加／削除されたコミットを検索します。ついでに詳細内容も見たいので<code>-p</code>を付けます。</p>

<pre><code>$ git log -Sgit-logo -p
</code></pre>

<pre><code>commit 7d97d525477d7bd034a127e61dd7d4045c95c710
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 13:58:42 2016 +0000

    add git-logo image

diff --git a/index.html b/index.html
index 6e638f6..7609760 100644
--- a/index.html
+++ b/index.html
@@ -7,5 +7,6 @@
     &lt;body&gt;
         &lt;h1&gt;はじめてのバージョン管理&lt;/h1&gt;
         &lt;p&gt;Gitを使ってバージョン管理する。&lt;/p&gt;
+        &lt;img src="git-logo.png" alt="git logo"&gt;
     &lt;/body&gt;
 &lt;/html&gt;
</code></pre>

<h4><code>--grep</code></h4>

<p>コミットメッセージによってコミット履歴を検索したい場合もあります。</p>

<p><code>--grep</code>を使って、<code>first</code>という文字列がコミットメッセージに入っているコミットを検索します。</p>

<pre><code>$ git log --grep first
</code></pre>

<p>最初のコミットである<code>first commit</code>の結果が返ってきます。</p>

<h4><code>--author</code></h4>

<p>今回は全てのAuthorが同じだったため、あまり使いみちがありませんが、チーム開発で複数人のコミットがある場合には、Authorで絞り込むのはとても有用です。</p>

<pre><code>$ git log --author='techacademy-mentor'
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-11-3">11.3 過去のコミットの詳細を表示する
</h3><p>過去のコミットの詳細を知りたくなる場合があります。<code>git log</code>はコミット履歴の一覧を表示しましたが、ここでは1つのコミットを選択して詳細を表示するようにしてみましょう。</p>

<p>まずは、コミット履歴の一覧を見てみましょう。</p>

<pre><code>$ git log --oneline
</code></pre>

<p>下記のようにリビジョン番号とコミットメッセージの一覧が表示されます。</p>

<pre><code>9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>コミットの詳細内容を知りたい場合には、<code>git show</code>コマンドを使用します。例えば <code>f0d0810</code> のコミット(<code>first commit</code>)の詳細を見たい場合には下記のように、<code>git show リビジョン番号</code>となります。<code>リビジョン番号</code>は本来40桁ありますが、多くの場合に最初の4~7桁ほど入力すればGitが自動的に補完して判断してくれます。</p>

<pre><code>$ git show f0d0810
</code></pre>

<pre><code>commit f0d0810da93da019b175b42d74b1f0982b7eb695
Author: techacademy-mentor &lt;mentor@techacademy.jp&gt;
Date:   Sat Aug 20 13:46:59 2016 +0000

    first commit

diff --git a/index.html b/index.html
new file mode 100644
index 0000000..6e638f6
--- /dev/null
+++ b/index.html
@@ -0,0 +1,11 @@
+&lt;!DOCTYPE html&gt;
+&lt;html lang="ja"&gt;
+    &lt;head&gt;
+        &lt;meta charset="utf-8"&gt;
+        &lt;title&gt;Gitチュートリアル&lt;/title&gt;
+    &lt;/head&gt;
+    &lt;body&gt;
+        &lt;h1&gt;はじめてのバージョン管理&lt;/h1&gt;
+        &lt;p&gt;Gitを使ってバージョン管理する。&lt;/p&gt;
+    &lt;/body&gt;
+&lt;/html&gt;
</code></pre>

<p><code>f0d0810</code>のコミットによって何のファイルがどのように変更されたのかの詳細がわかります。</p>

<p>更に、ファイルも指定してみましょう。</p>

<pre><code>$ git show f0d0810:index.html
</code></pre>

<p>このように<code>git show リビジョン番号:ファイル名</code>というコマンドになります。これを実行すると、このコミットの段階のファイル内容が表示されます。</p>

<p>ファイルのコピーを作りたい場合には、<code> &gt; ファイル名</code> とすると、本来コマンドライン上で表示されるものがそのままファイルとして作成されます。</p>

<pre><code>$ git show f0d0810:index.html &gt; index_old.html
</code></pre>

<p><em>index_old.html</em> の中身を確認してみると、<code>f0d0810</code>のときの内容となっているはずです。これで過去のコミット時点でのファイル内容を取得することができます。</p>

<p><em>index_old.html</em>がワークツリーに反映されてしまうので、削除しておきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-4">11.4 差分の確認
</h3><h4>複数コミット間の差分</h4>

<p><code>git log -p</code>を見ていくと、コミット履歴に沿って差分を見ていくことができますが、数コミット分の差分を見たい場合には、<code>git diff リビジョン番号1 リビジョン番号2</code>を実行します。</p>

<p>まずはコミット履歴とコミットの割り当てられているリビジョン番号の確認です。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p><code>9f943bc</code>から<code>f0d0810</code>までのファイル変更の差分を確認してみましょう。コミット履歴の正しい順序で内容を確認するには、古いコミット(<code>f0d0810</code>)を左に置き、新しいコミット(<code>9f943bc</code>)を右に置きます。<code>f0d0810 ~ 9f943bc</code>と見ると覚えやすいでしょう。リビジョン番号を逆に書くとコミット履歴を遡るように差分が表示され、逆の結果が表示されます。</p>

<pre><code>$ git diff f0d0810 9f943bc
</code></pre>

<p><code>7d97d52</code>と<code>9f943bc</code>の2つのコミットによる差分が表示されているのがわかります。<code>f0d0810</code>からスタートするので、<code>f0d0810</code>の変更分は差分には含まれません。</p>
</div></section><section id="chapter-12"><h2 class="index">12. （補足）元に戻す
</h2><div class="subsection"><p>Gitのコマンドを利用していると、間違うこともあります。例えば、ワークツリーに変更がいくつもあってコミットを分けるつもりだったのに<code>git add .</code>としてしまい変更を全てインデックスにステージさせてしまったり、コミットしたはいいがやっぱりコミットメッセージを変更したいなどです。</p>

<p>そういった間違った操作に対して、Gitでは <strong>元に戻す</strong> コマンドも用意されています。それらをみていきましょう。</p>

<p>ただし、元に戻す操作の多くは注意しておかないと、変更内容を完全に削除してしまうようなものもあります。注意が必要なコマンドに関しては都度、注意喚起を行いますが、ここで一度心得ておきましょう。</p>

<p>また、元に戻す操作は、コミット履歴を書き換えることになります。コミット履歴はプロジェクトの歴史です。歴史を書き換えることに相当します。既に取り込まれたコミットを書き直すと、リビジョン番号（コミットIDに相当する）が書き換えられ、変更日時や変更ファイルなど書き換わります。この操作は特にチームで開発しているときに問題となります。既にチームと共有したコミットを書き換える操作はチーム全員の同意無しに実行してはいけません。歴史を書き換えずに元に戻す方法もありますので、見ていきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-1">12.1 ワークツリーの変更を取り消したい
</h3><p>ワークツリーの変更を取り消したい場合（ファイルの変更を取り消したい場合）には<code>git checkout</code>コマンドを使用します。<code>git checkout</code>コマンドは次のレッスンで解説するように、よく利用するのはブランチ移動用コマンドとしてなのですが、もう1つの機能としてワークツリーのファイル操作があります。</p>

<h4>準備</h4>

<p>ここでも下記のサンプルリポジトリを利用して、確認を行ってみましょう。</p>

<ul>
  <li><a href="https://github.com/techacademy-jp/git-training-sample" target="_blank">サンプルリポジトリ</a></li>
</ul>

<pre><code>$ cd ~/environment/
$ git clone https://github.com/techacademy-jp/git-training-sample.git discard-tutorial
$ cd discard-tutorial/
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-checkout_01.png" alt=""></p>

<h4>list.htmlを変更する</h4>

<p>下記の変更を加えます。</p>

<p><em>list.htmlから下記1行を削除</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>-            <span class="tag">&lt;li&gt;</span>何かもう1つ<span class="tag">&lt;/li&gt;</span>
</pre></div>
</div>
</div>

<p>これで変更がワークツリーに反映されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-checkout_02.png" alt=""></p>

<h4>確認する</h4>

<p>ここでもまずは<code>git status</code>でワークツリーとインデックスのファイルを確認しましょう。同じく<em>list.html</em>を変更し、ワークツリーにその変更が反映されている状態です。まだステージされていません。</p>

<pre><code>Changes not staged for commit:
  (use "git add &lt;file&gt;..." to update what will be committed)
  (use "git checkout -- &lt;file&gt;..." to discard changes in working directory)

        modified:   list.html
</code></pre>

<p><code>(use "git checkout -- &lt;file&gt;..." to discard changes in working directory)</code>と書いています。これは「ワークツリーでのファイル変更を取り消す場合には、<code>git checkout -- ファイル名</code>のコマンドを使え」と言っています。</p>

<h4>list.htmlを元に戻す</h4>

<p>今回の例では</p>

<pre><code>$ git checkout -- list.html
</code></pre>

<p>と実行することで、<code>list.html</code>に加えた変更が全て取り消され、直前のコミットと同じ中身に戻ります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-checkout_03.png" alt=""></p>

<h4>確認する</h4>

<p><code>git status</code>で確認してみると、変更が破棄されています。</p>

<pre><code>$ git status
</code></pre>

<p>実際にファイルを開いてい見ても<code>&lt;li&gt;何かもう1つ&lt;/li&gt;</code>が戻っていることを確認できるでしょう。</p>

<h4><code>--</code>オプションをつける理由</h4>

<p>実は<code>--</code>をつけなくても、<code>git checkout ファイル名</code>で多くの場合に正しく動作します。</p>

<p>ただし、<code>--</code>オプションをつけた方がより厳密になります。なぜなら、本来であればそこにはブランチ名を指定するものだからです。（<code>git checkout ブランチ名</code>というコマンドを次のレッスンで学びます）</p>

<p>誤動作が起きる場合とは、ブランチ名とファイル名が同じ場合です。例えば、ファイル名とブランチ名がどちらも<code>abc</code>だったとしましょう。その場合、<code>git checkout abc</code>とすると、ファイル名を指定しているのかブランチ名を指定しているのかわかりません。</p>

<p>それを解消するために、ちゃんとファイル名を指定していると明示する必要があります。そのとき<code>git checkout -- abc</code>のように<code>--</code>オプションをつけてあげます。</p>

<h4><code>checkout --</code> の危険性</h4>

<p><code>git checkout -- ファイル名</code>コマンドは、危険なコマンドです。ファイルの変更は跡形も無くなります。もう変更していた状態には戻せませんので、くれぐれも注意して使用してください。</p>

<p>まだコミットしていない内容を消してしまうと、もう二度と戻せません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-2">12.2 ステージしたファイルをワークツリーへ戻す
</h3><h4>準備</h4>

<p>ここでも下記のサンプルリポジトリを利用して、確認を行ってみましょう。先ほどのままでも構いません。</p>

<ul>
  <li><a href="https://github.com/techacademy-jp/git-training-sample" target="_blank">サンプルリポジトリ</a></li>
</ul>

<pre><code>$ cd ~/environment/
$ git clone https://github.com/techacademy-jp/git-training-sample.git discard-tutorial
$ cd discard-tutorial/
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-unstage_01.png" alt=""></p>

<h4>list.htmlを変更して、ステージする</h4>

<p>下記の変更を加えます。</p>

<p><em>list.htmlから下記1行を削除</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>-            <span class="tag">&lt;li&gt;</span>何かもう1つ<span class="tag">&lt;/li&gt;</span>
</pre></div>
</div>
</div>

<p>次に、この変更をステージしましょう。</p>

<pre><code>$ git add list.html
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-unstage_02.png" alt=""></p>

<h4>確認する</h4>

<p>ステージされた変更は<code>git status</code>コマンドで確認することができます。<em>list.html</em>の変更をステージした場合は下記のような表示になるはずです。</p>

<pre><code>Changes to be committed:
  (use "git reset HEAD &lt;file&gt;..." to unstage)

        modified:   list.html
</code></pre>

<p>このとき、<code>(use "git reset HEAD &lt;file&gt;..." to unstage)</code>と書いています。これは「ステージを取りやめる(unstage)する場合には、<code>git reset HEAD ファイル名</code>のコマンドを使え」と言っています。</p>

<h4>インデックスからワークツリーに戻す</h4>

<p>今回の例では、</p>

<pre><code>$ git reset HEAD list.html
</code></pre>

<p>と実行することで、インデックスの変更が取り消されワークツリーだけの変更に戻すことができます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-unstage_03.png" alt=""></p>

<h4>確認する</h4>

<p>ワークツリーに戻っているか確認しておきましょう。</p>

<pre><code>$ git status
</code></pre>

<pre><code>On branch master
Your branch is up-to-date with 'origin/master'.
Changes not staged for commit:
  (use "git add &lt;file&gt;..." to update what will be committed)
  (use "git checkout -- &lt;file&gt;..." to discard changes in working directory)

        modified:   list.html

no changes added to commit (use "git add" and/or "git commit -a")
</code></pre>

<h4>resetの危険性</h4>

<p><code>git reset</code>は危険なコマンドになり得ます。その条件は、<code>--hard</code>オプションをつけた場合です。<code>--hard</code>をつけると、完全に変更を削除します。<code>--hard</code>オプションをつけない場合には、インデックスからワークツリーへ変更が戻るだけです。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-3">12.3 直前コミットのやり直し
</h3><p>やり直しで頻繁にあるのが、コミットをやり直したい場面です。</p>

<ul>
  <li>コミットメッセージを書き直したくなってしまった</li>
  <li>追加すべきファイルを忘れてコミットしてしまった</li>
</ul>

<h4>コミットメッセージを書き直したくなってしまった</h4>

<p>コミットメッセージを書き直したくなったときは、<code>--amend</code>オプションを使うとすぐに書き直せます。</p>

<pre><code>$ git commit --amend -m 'メッセージ書き直し'
</code></pre>

<p>このコマンドを実行するだけで、直前のコミットのメッセージを書き換えることができます。また、<code>-m '...'</code>をなくせばnanoを立ち上げて書き換えることもできます。</p>

<h4>追加すべきファイルを忘れてコミットしてしまった</h4>

<p>追加すべきファイルを忘れてコミットしてしまったので、もう一度コミットをやり直したい場合があります。</p>

<p>この場合には、そのままもう一度<code>git add</code>で追加し忘れたファイルを追加し、<code>git commit --amend</code>を実行すれば、直前のコミットが書き換えられ、忘れたファイルが追加された形で再コミットされます。</p>

<pre><code>$ git add 追加し忘れたファイル
$ git commit --amend
</code></pre>
</div><div class="subsection"><h3 class="index" id="chapter-12-4">12.4 過去のコミットまで戻る
</h3><p><code>git show リビジョン番号:ファイル名</code>のコマンドを使用すれば、過去のコミット時点でのファイル内容を取得することができました。</p>

<p>ここでは過去の内容をただ取得するのではなく、コミット履歴自体を改変して元に戻します。</p>

<h4>準備</h4>

<p>今回も同じサンプルリポジトリからスタートします。</p>

<ul>
  <li><a href="https://github.com/techacademy-jp/git-training-sample" target="_blank">サンプルリポジトリ</a></li>
</ul>

<pre><code>$ cd ~/environment/
$ git clone https://github.com/techacademy-jp/git-training-sample.git reset-tutorial
$ cd reset-tutorial/
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-reset_01.png" alt=""></p>

<h4>コミットのリセット</h4>

<p>まずは、コミット履歴を確認します。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>それでは過去のコミット<code>7d97d52</code>まで戻りましょう。つまり、<code>9f943bc</code>のコミットを破棄し、元に戻ります。下記のコマンド<code>git reset リビジョン番号</code>を実行してください。</p>

<pre><code>$ git reset 7d97d52
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-reset_02.png" alt=""></p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-reset_03.png" alt=""></p>

<p>これで、<code>7d97d52</code>のコミットにまで戻りました。まずはコミット履歴と、ステータスを確認しておきましょう。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>最新のコミットであった<code>9f943bc</code>がなくなり、最新のコミットが<code>7d97d52</code>になっています。</p>

<p>次にワークツリーとインデックスのステータスを確認してみます。</p>

<pre><code>$ git status
</code></pre>

<pre><code>On branch master
Your branch is behind 'origin/master' by 1 commit, and can be fast-forwarded.
  (use "git pull" to update your local branch)
Changes not staged for commit:
  (use "git add &lt;file&gt;..." to update what will be committed)
  (use "git checkout -- &lt;file&gt;..." to discard changes in working directory)

        modified:   index.html

Untracked files:
  (use "git add &lt;file&gt;..." to include in what will be committed)

        list.html

no changes added to commit (use "git add" and/or "git commit -a")
</code></pre>

<p>確認してみると、ワークツリーには、消えた最新コミット<code>9f943bc</code>がコミットしていた内容が入っています（<em>index.html</em>が1行変更され、<em>list.html</em>が新規追加）。変更内容だけがワークツリーにあり、コミットされていない状態にまで戻っています。これが<code>git reset リビジョン番号</code>の結果です。変更内容が気になる方は<code>git diff</code>コマンドや実際にファイル内容を確認してみましょう。</p>

<p>この状態で、今ある変更をコミットしてみましょう。消えた最新コミットと同じコミットメッセージでコミットします。</p>

<pre><code>$ git add .
$ git commit -m 'add list.html'
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-reset_04.png" alt=""></p>

<p>次にコミット履歴を確認してみます。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>2b9dd60 add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>すると、同じ内容を書き込んだはずですが、リビジョン番号が変更されています。<code>9f943bc</code>だったのが<code>2b9dd60</code>（受講生毎に違うはずです）となっています。</p>

<p>理由は、リビジョン番号がファイル変更だけでなく、コミット時刻やAuthorなど、コミットの様々な情報から計算された値だからです。そのため、コミット時刻やAuthorなどが違う今回のコミットと、前回のコミットは、全く違うコミットとして扱われます。つまり、コミットの歴史を変更してしまったのです。</p>

<p>更に<code>git reset</code>には他にもオプションがあります。</p>

<table>
  <tbody>
    <tr>
      <td><code>--soft</code></td>
      <td>戻した分のコミット内容をインデックスに反映する</td>
    </tr>
    <tr>
      <td><code>--mixed</code></td>
      <td>オプション無しと同じ動作で、戻した分のコミット内容をワークツリーに反映する</td>
    </tr>
    <tr>
      <td><code>--hard</code></td>
      <td>戻した分のコミット内容は完全に破棄される</td>
    </tr>
  </tbody>
</table>

<h4><code>git reset --hard</code></h4>

<p>ここで一度<code>--hard</code>を使ってみましょう。</p>

<pre><code>$ git reset --hard 7d97d52
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-reset_05.png" alt=""></p>

<p>コミット履歴と、ステータスを確認してみます。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<pre><code>$ git status

On branch master
Your branch is behind 'origin/master' by 1 commit, and can be fast-forwarded.
  (use "git pull" to update your local branch)
nothing to commit, working tree clean
</code></pre>

<p>コミット履歴は最新が<code>7d97d52</code>に戻っています。そしてワークツリー、インデックスともに何もファイル内容が含まれていません。つまり、戻した分のコミット内容は<code>--hard</code>の場合、完全に破棄されるのです。</p>

<p><code>--hard</code>の危険性を理解しておきましょう。</p>

<h4>リセットを元に戻す</h4>

<p>リセットを実行したこと自体を元に戻したい場合もあります。そういった場合の応急処置の方法を学んでおき、間違って<code>git reset</code>してしまった場合にも取り返しがつくようにはしておきましょう。</p>

<p><code>git reflog</code>というコマンドがあります。このコマンドは簡単に言うと、ローカルリポジトリ内でのGitコマンド操作自体の履歴のようなものです（厳密な説明ではありません）。</p>

<p>まずは実行してみましょう。</p>

<pre><code>$ git reflog
</code></pre>

<pre><code>7d97d52 HEAD@{0}: reset: moving to 7d97
2b9dd60 HEAD@{1}: commit: add list.html
7d97d52 HEAD@{2}: reset: moving to 7d97d
9f943bc HEAD@{3}: checkout: moving from f0d0810da93da019b175b42d74b1f0982b7eb695 to master
f0d0810 HEAD@{4}: checkout: moving from master to f0d0
9f943bc HEAD@{5}: clone: from https://github.com/techacademy-jp/git-training-sample.git
</code></pre>

<p>筆者のローカルリポジトリの<code>git reflog</code>ではこのようになっていました。皆さんとは違うかも知れません。</p>

<p>いくつか<code>reset: moving to ...</code>とあります。これは<code>git reset</code>コマンドを使ったときの履歴です。最初に<code>git reset</code>を実行したのが、<code>7d97d52 HEAD@{2}: reset: moving to 7d97d</code>です。なので、その1つ点前では、まだ<code>git reset</code>していない状態が残っています。ここに戻ってみましょう。<code>git reflog</code>の結果の1列目は、リビジョン番号になっています。これを使いましょう。</p>

<pre><code>$ git reset --hard 9f943bc
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-reset_06.png" alt=""></p>

<p>これで、リセットをなかったことにして、最初の状態へ元に戻すことができました。コミット履歴を確認してみます。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>最初の状態に戻っています。</p>

<h4>リセットの注意点</h4>

<p>Gitには<code>git reset</code>などコミットの歴史を改変するコマンドが用意されていますが、リセット系コマンドを利用には充分注意してください。絶対にやってはいけないのは、チーム開発で既にみんなと共有しているコミットをリセットすることです。チームと既に共有されたコミットは絶対にリセットしてはいけません。これをリセットするとチームメンバーに多大な迷惑がかかるようになります。この場合は、リセットをせずに、そのコミットを修正するようなコミットを再度実行するのが正解となります。</p>

<p>リセット系コマンドは、あくまでローカルリポジトリでのみ扱われている内容で行ってください。まだチームと共有されていないコミットに関してはどのように扱おうが自由です。たまには間違ってコミットして後で気付くこともあるので、そういった場合にチームと共有する前に<code>git reset</code>を使うことがあります。</p>

<p>次は、コミットをリセットせずに、打ち消す方法を学びます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-12-5">12.5 過去のコミットを打ち消す
</h3><p>先ほど学んだ<code>git reset</code>はコミット履歴を改変するため、既に誰かと共有したコミットには使うべきではありませんでした。</p>

<p>この場合には、<code>git revert リビジョン番号</code>が有効なコマンドとなります。</p>

<p>まずはコミット履歴の確認です。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-revert_01.png" alt=""></p>

<p>それでは、<code>9f943bc</code>のコミットを打ち消してみましょう。</p>

<pre><code>$ git revert 9f943bc
</code></pre>

<p>このコマンドを実行するとnanoが開き、コミットメッセージ編集画面へ移ります。コミットメッセージには、revertを行う理由などを追記しても良いでしょう。ここではそのまま保存して終了します。</p>

<p>するとリバートコミットが追加されます。リバートコミットは、コミットの内容を打ち消す内容になっています。ここでは、最新コミット内容であった<em>index.html</em>の<code>&lt;a href="list.html"&gt;リスト&lt;/a&gt;</code>が削除され、<em>list.html</em>も削除されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/training/github/basic/2-redo-revert_02.png" alt=""></p>

<p>下記コマンドや、実際にファイルを確認してみましょう。</p>

<pre><code>$ git log -p -1
</code></pre>

<p>そしてリバートコミットを確認しておきましょう。</p>

<pre><code>$ git log --oneline
</code></pre>

<pre><code>777a246 Revert "add list.html"
9f943bc add list.html
7d97d52 add git-logo image
f0d0810 first commit
</code></pre>

<p>リセットとの違いは、ファイル内容は元に戻るが、リバートコミットによってコミットが追加されて、コミットの歴史は改変されずに前に進むところにあります。既にチームと共有済みのコミットをリセットしたい場合には<code>git revert</code>を使うべきです。</p>
</div></section></div>
</body>
</html>