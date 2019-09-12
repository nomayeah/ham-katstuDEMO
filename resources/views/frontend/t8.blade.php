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
<div class="markdown col-md-9"><div class="lesson-num p">Lesson8</div><h1 id="baas">BaaS
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>これまではフロントエンド側のテクニックとしてリッチサイトを作る方法を学んできました。コンテンツの変化しない静的なサイトであればフロントエンドのみでよいですが、ユーザが文章や写真を投稿するような動的なサイトを作るには、画面の裏側で実行する処理（フロントエンドに対して <strong>バックエンド</strong> と言います）が必要です。</p>

<p>バックエンドの開発ではRubyやPHPといったバックエンドの開発ができる言語を使うのが一般的です（ご興味ある方はTechAcademyの <a href="https://techacademy.jp/rails-bootcamp" target="_blank">Webアプリケーションコース</a> や <a href="https://techacademy.jp/php-bootcamp" target="_blank">PHP/Laravelコース</a> のご受講をご検討ください）。最近ではNode.jsの普及によってJavaScriptでもバックエンドを開発できる環境がかなり整ってきていますが、それでもなお、バックエンドの開発はかなりの苦労だと言えます。</p>

<p>自分でバックエンドを用意するのを解消するひとつの方法は、外部で提供されているバックエンドのサービスを導入することです。前のレッスンで学んだWeb APIも外部サービスではありますが、既に提供されているサービスを自分のサイトに組み込むことが目的であるため、「バックエンドを提供するサービス」とは違います。</p>

<p>そこで、このレッスンでは「バックエンドを提供するサービス」のひとつ、Firebaseをバックエンドとして使う方法を学びます。Firebaseをうまく使えば、バックエンドの開発を自分でせずにWebサービスを作ることができます。</p>
</div></section><section id="chapter-2"><h2 class="index">2. BaaSとFirebaseの概要
</h2><div class="subsection"><p><a href="https://firebase.google.com/" target="_blank">Firebase</a>は、Googleが提供するBaaS（バース）です。BaaS（Backend as a Service：サービスとしてのバックエンド）とは、バックエンド、つまりサーバ側の機能を提供するサービスです。バックエンドを担当するエンジニアの代わりとなってくれます。バックエンドが必要となる一例は、サーバ側にデータを保存したい場合です。たとえばTwitterやFacebookでは、文章や写真を投稿するとバックエンドにあるデータベースへ保存されます。他のユーザは、サーバのデータベースに保存された投稿内容を見ることができます。つまり、投稿した内容は自分のパソコンの電源を落としてもサーバ上に残り続けるのです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/overview/1-frontend-backend.png" alt="フロントエンドとバックエンドが連携してWebサイトが動く"></p>

<p>このようなバックエンドの機能を自分で開発する代わりにサービスとして提供しているのがFirebaseです。Firebaseを利用すれば、チーム内にバックエンド開発のできるエンジニアがいなくてもWebサービスを迅速に作ることができます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-frontend-web-baas.png" alt="フロントエンドとWebサーバ、BaaSでWebサイトが動く"></p>

<p>Firebaseは小〜中規模のサイトなら無料で使えます（無料の範囲は<a href="https://firebase.google.com/pricing/" target="_blank">Pricing</a>のページを参照してください）。またFirebaseは、WebのほかにiOSとAndroidにも対応しています。将来的にiOSアプリやAndroidアプリを作る際にもWebと同じバックエンドを使えば、そのままデータを利用できます。これによって、短期間でのアプリ開発が可能になります。</p>

<p>なお、FirebaseをバックエンドとしたWebサービスのフロントエンドも、JavaScriptで作成できます。ただし。Firebaseで用意されているJavaScript製の開発キット（SDK：Software Development Kit）を使う必要があります。また、Firebaseの各種セッティングは自分で行わなければなりません。つまりFirebaseを使うには、FirebaseのSDKとFirebaseの管理サイトの使い方を覚えることが必要です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Firebaseのサービス一覧
</h3><p>Firebaseは個々のサービスから構成されています。主なものを下記に紹介します。名前や内容を読んでも「？」となる方もいらっしゃるでしょうが、このレッスンで扱う内容は一部だけです。気にしないで目を通してください。</p>

<table>
  <thead>
    <tr>
      <th>サービス名</th>
      <th>内容</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Cloud Messaging</td>
      <td>プッシュ通知を送信するために利用する。iOS、Android、Chromeブラウザのみサポート。</td>
    </tr>
    <tr>
      <td>Authentication</td>
      <td>ログインなどのユーザ認証のために利用する。FacebookやTwitterのログインとも連携可能。</td>
    </tr>
    <tr>
      <td>Realtime Database</td>
      <td>データベースのバックエンドサービス。今回のレッスンで使います。</td>
    </tr>
    <tr>
      <td>Storage</td>
      <td>ユーザがアップロードした画像や動画などのファイルを保管してくれるサービス。</td>
    </tr>
    <tr>
      <td>Hosting</td>
      <td>自分の作ったWebサイトをインターネットで公開するためのサービス。</td>
    </tr>
    <tr>
      <td>Remote Config</td>
      <td>iOS/Android専用。モバイルアプリの更新なしでアプリの動作や外観を変えることなどに使う。</td>
    </tr>
    <tr>
      <td>Test Lab</td>
      <td>Googleのインフラを使ってAndroidアプリの挙動をテストできる。</td>
    </tr>
    <tr>
      <td>Crash Reporting</td>
      <td>ユーザの使用中に発生したエラーをサーバに集約して解析する。解析したデータは今後の改善に活用する。</td>
    </tr>
  </tbody>
</table>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 本レッスンで使うサービス
</h3><p>今回はテキストデータの保存用にRealtime Database、画像データの保存用にStorage、そしてWebサイトにログインさせるため、Authenticationを使います。</p>

<p>Realtime DatabaseもStorageもデータを保存する場所という点では同じで少し混乱するかもしれませんが、Realtime Databaseはテキストデータ、Storageは画像や動画などテキスト以外のデータの保存用、というのが主な使い分けです。</p>
</div></section><section id="chapter-3"><h2 class="index">3. 今回作成するサービス
</h2><div class="subsection"><p>今回は、Firebaseを利用して2つのWebサービスを作ります。</p>

<p>1つめは、自分だけの本棚サイトです。読んだ本や、読みたい本などを管理する本棚のサイトを実装してみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-bookshelf_2019.png" alt="本棚サイトの完成イメージ"></p>

<p>2つめは、リアルタイムチャットです。LINEのグループチャットのようなものをWebページとして実装してみましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-realtime_chat_2018.png" alt="リアルタイムチャットの完成イメージ"></p>
</div></section><section id="chapter-4"><h2 class="index">4. Firebaseのセットアップ
</h2><div class="subsection"><p>最初にFirebaseを設定していきます。</p>

<p><a href="https://firebase.google.com/" target="_blank">Firebaseのトップページ</a>から、右上にある「コンソールへ移動」をクリックしてください。Firebaseにログインしていない場合は、ログイン画面が表示されます。 <strong>お持ちのGoogleアカウントでログインしてください。なお、Googleアカウントをお持ちでない場合は、アカウントの作成をしてからログインしましょう</strong>。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-login.png" alt="ログイン をクリック"></p>

<p>次に、 <strong>Firebaseを使用するプロジェクト</strong> の登録が必要です。Firebaseのコンソール画面が表示されたら、「プロジェクトを追加」のボタンをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project.png" alt="プロジェクトを追加"></p>

<p>プロジェクト名の入力画面が表示されます。プロジェクトはWebサイトの単位で作成します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project_settings_0.png" alt="プロジェクトの設定"></p>

<p>プロジェクト名に「Realtime Chat」と入力します（本レッスンで最後に作成するWebサービスの名前です）。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project_settings_1.png" alt="プロジェクトの設定"></p>

<p>「続行」をクリックして表示される次の画面では、Googleアナリティクスを「設定する」にして「続行」をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project_settings_1_1.png" alt="プロジェクトの設定"></p>

<p>次の画面では、まず、アナリティクスの地域を「日本」にしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project_settings_3.png" alt="プロジェクトの設定"></p>

<p>「Googleアナリティクス データの共有に…」「測定管理者間のデータ保護に関する条項に同意し…」「Googleアナリティクス利用規約に同意します」は3つともチェックを入れてください。すると、「プロジェクトを作成」のボタンがクリックできるようになりますので、クリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project_settings_4.png" alt="プロジェクトの設定"></p>

<p>「準備ができました」と表示されたら「続行」をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-add_project_settings_5.png" alt="プロジェクトの設定"></p>

<p>プロジェクトのoverview画面が表示されますので、 <code>&lt; / &gt;</code> のマークをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-firebase-console-overview_0.png" alt="Firebase Console"></p>

<p>「ウェブアプリにFirebaseを追加」と書かれた画面が表示されます。「アプリのニックネーム」という入力欄には、「Realtime Chat」と入力してください。「このアプリのFirebase Hostingも設定します。」はチェックを入れなくて結構です。ニックネームが入力されると「アプリを登録」ボタンが水色に変わるので、その状態でボタンをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-firebase-console-overview_0_1.png" alt="Firebase Console"></p>

<p>しばらく待った後に表示されたHTMLソースがFirebaseのセットアップコードです。以降のセクションで登場するコードの中で<code>apiKey</code>、<code>authDomain</code>、<code>databaseURL</code>、<code>storageBucket</code>といった値をご自分のものに置き換えてください。これでFirebaseのセットアップは完了です！</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-setup_code2.png" alt="セットアップコードが表示される"></p>

<div class="alert alert-warning">
FirebaseのSDKのバージョンアップに伴い、上記のセットアップコードとカリキュラムに記載の内容に違いの生じている部分があります。たとえば上記のセットアップコードにおけるFirebaseのSDKのバージョンは <code>6.3.0</code> です。学習を進める際は、カリキュラムのサンプルコードに記載のバージョン、およびFirebaseのJSファイルを使ってください。<strong>カリキュラム内のセットアップコード部分を、上記のセットアップコードで上書きする必要はありません。</strong>
</div>

<h4>ログインしている場合のみデータにアクセスできる設定に変更する</h4>

<p>Firebaseにはデータのアクセス制限を設定できるルールという仕組みがあります。</p>

<p>管理画面の左のタブから<strong>Database</strong>を選択すると、利用するデータベースの種類を選択する画面が表示されるので、画面を少し下へスクロールさせたところに表示されている <strong>Realtime Database</strong> の<code>データベースを作成</code>をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/iphone/swift4/instagram/4_3_1_1.png" alt=""></p>

<p>次に「Realtime Databaseのセキュリティルール」を設定する画面が出てくるので、ロックモードで開始を選択し、有効にするをクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/iphone/swift4/instagram/4_3_1_2.png" alt=""></p>

<p>次に「ルール」を変更します。その前に、表示内容が「Cloud Firestore」となっている場合は「Realtime Database」に変更してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/iphone/swift4/instagram/4_3_1_1_1.png" alt=""></p>

<p>Realtime Databaseの <strong>ルール</strong>タブを開くと、ルールが設定できます。初期状態ではルールが下記のようになっています。</p>

<pre><code>{
    "rules": {
        ".read": false,
        ".write": false
    }
}
</code></pre>

<p>この状態は「いかなる場合でもデータへのアクセスを拒否する」という設定です。これを「ログインしている場合のみデータにアクセスできる」ルールとするため、下記の通りに書いて保存してください。</p>

<pre><code>{
    "rules": {
        ".read": "auth != null",
        ".write": "auth != null"
    }
}
</code></pre>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/iphone/swift4/instagram/4_3_1.png" alt=""></p>

<p>この状態のルールにすることで、Databaseから取得した情報は読み込み・書き込みのどちらでもログインが必要だという設定にできます。これを <code>".read": true,</code>としてしまうとログイン不要で誰もが情報を読み込むことができるようになります。一般に情報を公開する場合にはこのように設定する必要があります。</p>

<p>セキュリティをしっかりと意識して管理しないと、意図しない情報が漏れてしまう可能性があります。充分注意しておきましょう。</p>

<ul>
  <li><a href="https://firebase.google.com/docs/database/security/" target="_blank">Firebase Realtime Databaseルールについて</a></li>
</ul>
</div></section><section id="chapter-5"><h2 class="index">5. 公式ドキュメント
</h2><div class="subsection"><p>Firebaseをバックエンドとして利用するためには、JavaScriptで用意されているAPIを扱わなければなりません。本レッスンのWebサービスを作成する上で必要なことはカリキュラム上で解説していますが、ぜひ <a href="https://firebase.google.com/docs/?hl=ja" target="_blank">Firebase公式サイトのドキュメント</a> を併せて参照するようにしてください。</p>

<p>公式のドキュメントは、日本語化がある程度進んできていますが、未だに英語のままのページもあります。英語が苦手な方は注意しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-1">5.1 ガイド
</h3><p><a href="https://firebase.google.com/docs/web/setup?hl=ja" target="_blank">ウェブ制作におけるFirebaseのガイドページ</a>では、はじめてFirebaseを使う際に有用な情報が掲載されています。</p>

<p>下にスクロールしていくと表示される<a href="" target="_blank">「JavaScript アプリ用に入手可能な Firebase SDK」</a>には基本的なFirebaseの使い方が掲載されています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-guides-web.png" alt="Guides→Webを開く"></p>

<p>こちらのメニューから「Authentication」「Cloud Storage」「Realtime Database」それぞれの情報へのリンクをクリックすると、下記のような情報が閲覧できます（一部のみ抜粋）。</p>

<ul>
  <li>Authentication
    <ul>
      <li>アプリをFirebaseに接続する</li>
      <li>新しいユーザーを登録する</li>
      <li>既存のユーザーをログインさせる</li>
      <li>認証状態オブザーバーを設定し、ユーザーデータを取得する</li>
    </ul>
  </li>
  <li>Cloud Storage
    <ul>
      <li>デフォルトのStorageバケットを作成する</li>
      <li>公開アクセスの設定</li>
      <li>Cloud Storageを設定する</li>
    </ul>
  </li>
  <li>Realtime Database
    <ul>
      <li>Realtime Databaseのルールを構成する</li>
      <li>Realtime Database JavaScript SDKを初期化する</li>
    </ul>
  </li>
</ul>

<!-- ![Guides→Webを開く](https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-guides-web-realtime-database.png) -->
</div><div class="subsection"><h3 class="index" id="chapter-5-2">5.2 リファレンス
</h3><p><a href="https://firebase.google.com/docs/reference/?hl=ja" target="_blank">Firebaseのリファレンスページ</a> では、公式で用意されているJavaScriptのAPIの各種命令について、その使い方を調べることができます。2019年6月現在、リファレンスのページは日本語化されていませんので注意してください。</p>

<p>Web制作（JavaScript）のAPIを調べる際は、まず画面左側の一覧で「JavaScript」の項目を開きます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-references-01.png" alt="Reference→JavaScriptを開く"></p>

<p>たとえば、認証関係のAPIを調べたいとして、まず <code>firebase.auth()</code> という命令の戻り値を調べようとするときは、JavaScript→firebase.auth→概要を開きます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-reference-menu[1].png" alt="JavaScriptのサブメニューからfirebase.auth→概要をクリック"></p>

<p>表示されたページに「auth(app?: App): Auth」と書いてあります。これは、<code>firebase.auth()</code> の戻り値が <code>Auth</code>、つまり<code>firebase.auth.Auth</code> のオブジェクトであることを表しています。その下のParameters（引数）の欄を見ると、引数appはOptional（任意）となっているので、指定しなくても <code>firebase.auth()</code> は動作することがわかります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-reference-firebase-auth[2].png" alt="firebase.authのページ"></p>

<p>「auth(app?: App): Auth」の戻り値 <code>Auth</code> はリンクになっています。これをクリックすると <code>firebase.auth.Auth</code> のページに移り、メニューにプロパティとメソッド一覧が表示されるので、何かクリックすると詳細が表示されます。これらはJavaScriptのコード内で <code>firebase.auth()</code> の後に<code>.</code>をつなげる形で記述すれば利用できます。たとえば <code>firebase.auth().currentUser</code> でcurrentUserプロパティが取得できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-reference-firebase-auth-auth[1].png" alt="firebase.auth.Authオブジェクトのページ"></p>

<p>他にもWeb制作で利用できるAPIの情報は全て「JavaScript」という項目の中に入っています。<code>firebase.auth()</code> に関連したメソッド一覧はfirebase.auth→Authに入っていますし、他にも <code>firebase.database()</code> に関連したものはfirebase.database→Databaseのページに載っています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-5-3">5.3 サンプルプロジェクト
</h3><p><a href="https://github.com/firebase/quickstart-js" target="_blank">Firebaseの各サービスを使ったサンプルプロジェクト(JavaScript)</a>が公開されています。Realtime Databaseのサンプルは<code>database</code> フォルダに、Storageのサンプルは <code>storage</code> に、Authenticationのサンプルは <code>auth</code> に入っていますので、必要に応じて参照してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-samples-github.png" alt="GitHub上のサンプルプロジェクト"></p>
</div></section><section id="chapter-6"><h2 class="index">6. Firebaseの基本的な使い方
</h2><div class="subsection"><p>本棚サイトとリアルタイムチャットを作成していく前に、Firebaseの各種サービスの基本的な使い方を覚えましょう。たとえばデータの保存、および、保存されたデータの取得などです。</p>

<div class="alert alert-warning">
このチャプターの内容をコーディングする際は、Cloud9のワークスペース直下に <strong>firebase-tutorial</strong> というフォルダを作成してください。そのフォルダ内で学習を進めましょう。
</div>

<div class="alert alert-danger">
本棚サイトのチャプター以降の説明は、本チャプターの <i>firebase-tutorial</i> を学習／作成済みの前提で進めます。本チャプターは、提出課題に必要な実装技術を習得していただくために用意しているチャプターになりますので、必ずコーディングして学習を進めてください。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-1">6.1 ログインする
</h3><p>先ほどの設定で、Realtime Databaseにデータを読み書きするためにはログインを必要とするようにしました。ログインしていないユーザは保存データへのアクセスができません。ここでいうログインとは、先ほど行ったGoogleアカウントでのログインとは違って、私たちのWebサイトを訪問したユーザがサイト内でログインすることを意味します。</p>

<p>アクセス権限のルールについては、Firebase上で細かく設定を変更することもできます。とりあえず最初の学習段階では、ログインしなくてもRealtime Databaseを使えるようにして良いでしょう。ここでは設定をそのままにして、不便なく学習を進められるようにします。</p>

<p>ここでは「ログイン方法」から「匿名でのログイン」を使う方法を採用します。匿名でのログインとは、認証を行わずログインさせる方法です。個人を特定せず匿名の「ゲスト」としてのログインを可能にします。厳密にはログインといえるものではありませんが、ひとまず、この方法でログインしてみます（本レッスンの後半でメールアドレスとパスワードでログイン認証させる方法を学びます）。</p>

<p>FirebaseのOverviewのメニューからAuthenticationを選び「ログイン方法」タブを表示します。表示された画面で「匿名」をクリックし、有効にして保存してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-auth-login_provider.png" alt="Authenticationのログイン方法を開く"></p>

<p>これで匿名でのログインが可能になりました。</p>

<p>次に、<em>firebase-tutorial</em> フォルダの中に、下記の2つのファイルを用意します。まずは <em>index.html</em> から。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Firebase Test<span class="tag">&lt;/title&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;h1&gt;</span>Firebase Test<span class="tag">&lt;/h1&gt;</span>

  <span class="comment">&lt;!-- Firebaseのセットアップコード（下記のSDKのバージョンは6.2.0） --&gt;</span>
  <span class="comment">&lt;!-- The core Firebase JS SDK is always required and must be listed first
    (中心となるFirebase SDKです。常に必要で、最初に記述する必要があります) --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="comment">&lt;!-- TODO: Add SDKs for Firebase products that you want to use
       https://firebase.google.com/docs/web/setup#config-web-app
      (使いたいFirebaseサービス用のSDKを加えます) --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://www.gstatic.com/firebasejs/6.2.0/firebase-database.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://www.gstatic.com/firebasejs/6.2.0/firebase-storage.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>

  <span class="comment">&lt;!-- apiKeyなどは、ご自身の環境のものに合わせてください --&gt;</span>
  <span class="tag">&lt;script&gt;</span>
<span class="inline">    <span class="comment">// Your web app's Firebase configuration</span>
    const firebaseConfig = {
      <span class="key">apiKey</span>: <span class="string"><span class="delimiter">"</span><span class="content">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span><span class="delimiter">"</span></span>,
      <span class="key">authDomain</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxxx.firebaseapp.com</span><span class="delimiter">"</span></span>,
      <span class="key">databaseURL</span>: <span class="string"><span class="delimiter">"</span><span class="content">https://realtime-chat-xxxxx.firebaseio.com</span><span class="delimiter">"</span></span>,
      <span class="key">projectId</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxx</span><span class="delimiter">"</span></span>,
      <span class="key">storageBucket</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxxx.appspot.com</span><span class="delimiter">"</span></span>,
    };
    <span class="comment">// Initialize Firebase</span>
    firebase.initializeApp(firebaseConfig);</span>
  <span class="tag">&lt;/script&gt;</span>

  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://code.jquery.com/jquery-3.4.1.min.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">js/main.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>jQueryはFirebaseに必須ではありませんが、BootstrapやDOM操作を便利にするため、今回のレッスンでも使用します。</p>

<p>さらに、jsフォルダを作成し、その中にmain.jsファイルを作成します。最初のコメント2行は、コードの内容に問題がなくてもCloud9が自動で警告表示するのを防ぐために記載しています。ESlintの設定をしている場合、このコメントは不要です。ESLintの設定については、Lesson3の<a href="javascript#chapter-10-1">10.1 Linter（リンター）</a>をご確認ください。以降のコードでも、ESLintの設定をしない場合は最初のコメント2行を記載すると良いでしょう。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/* jshint curly:true, debug:true */</span>
<span class="comment">/* globals $, firebase */</span>

<span class="comment">// ログイン状態の変化を監視する</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>);
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしていません</span><span class="delimiter">'</span></span>);

    firebase
      .auth()
      .signInAnonymously() <span class="comment">// 匿名ログインの実行</span>
      .<span class="keyword">catch</span>((error) =&gt; {
        <span class="comment">// ログインに失敗したときの処理</span>
        console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
      });
  }
});
</pre></div>
</div>
</div>

<p><code>firebase.auth()</code> でFirebaseの<a href="https://firebase.google.com/docs/reference/js/firebase.auth.Auth" target="_blank">Auth</a>（ユーザ認証）機能にアクセスできます。<a href="https://firebase.google.com/docs/reference/js/firebase.auth.Auth.html#onauthstatechanged" target="_blank">onAuthStateChanged()</a>の引数に渡したアロー関数 <code>(user) =&gt; {...</code> は、ユーザのログイン状態が変化するたびに呼び出されます。具体的には、ページの読み込み時、およびログインに成功したときやログアウトしたときに呼び出されます。呼び出されるときに、ログインしたのかログアウトしたのかという情報が引数として渡されます。上記のコードでは、引数名を <code>user</code> としています。この引数の中身がnullならばログアウトした状態、nullではなく<a href="https://firebase.google.com/docs/reference/js/firebase.User" target="_blank">firebase.Userオブジェクト</a>ならばログインした状態を表します。</p>

<p>ここで一度、動作確認をしてみましょう。Cloud9で上記コードを実装し、index.htmlをプレビュー表示してください。プレビュー表示ができたら、デベロッパーツールを開いてコンソールを確認しましょう。最初はログアウトした状態であるので、 <code>firebase.auth().signInAnonymously()</code> で匿名ログイン（ゲストとしてログイン）する処理が実行されます。その結果、「ログインしました」と表示されていればOKです。何も表示されない場合はリロードしてみてください。Firebaseでは一度ログインすると、自分からログアウトしない限りはリロードしても自動的にログインした状態になりますので、2回目以降のアクセス時も「ログインしました」と表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-signInAnonymously-log.png" alt=""></p>

<p>なお一点補足として、<code>firebase.auth().signInAnonymously()</code> のあとに続く <code>.catch((error) =&gt; {...})</code> は、何らかの理由で <code>signInAnonymously()</code> の処理（ログイン）に失敗したときの処理を定義します。ここでは単に、アロー関数の引数( <code>error</code> )で受け取ったエラーの情報を表示するだけにしました。さらに、もしログインできたときに実行したい処理も用意するときは <code>.then((user) =&gt; {...})</code> を書いてください。<a href="https://firebase.google.com/docs/reference/js/firebase.auth.Auth#signInAnonymously" target="_blank">firebase.auth().signInAnonymously()</a> の処理が成功したときの戻り値である「認証されたユーザの情報」をアロー関数の引数( <code>user</code> )で受け取ります。</p>

<p><em>（下記は一例なので main.js を変更する必要はありません）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>firebase
  .auth()
  .signInAnonymously() <span class="comment">// 匿名ログインの実行</span>
  .then((user) =&gt; {
    <span class="comment">// ログインに成功したときの処理</span>
    console.log(user);
  })
  .<span class="keyword">catch</span>((error) =&gt; {
    <span class="comment">// ログインに失敗したときの処理</span>
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
  });
</pre></div>
</div>
</div>

<div class="alert alert-info">
Firebaseには、上記のような <code>.then</code> と <code>.catch</code> で「特定の処理に成功（失敗）したときに実行する処理」を追記できるメソッドが数多く用意されています。このレッスンのサンプルコードでもいくつか利用するので、この機会に覚えておいてください。なお、<code>.then</code> と <code>.catch</code> を使う、このような仕組みのことを <strong>Promise</strong> と言います。さらに、「特定の処理が完了するのを待ち、その処理が成功したら○○を、失敗したら△△を実行する」という処理の書き方をしたときの○○や△△の関数を <strong>コールバック（コールバック関数）</strong> と言います。また「特定の<strong>イベント</strong>が発生したら呼び出される」コールバックを、<strong>イベントハンドラ</strong> とも言います。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-2">6.2 ログインユーザを区別するID（UID）
</h3><p>ログインユーザ同士を区別するために、各ユーザに対して個別のユーザID（UID）が自動的に付与されます。UIDはプログラム内でユーザを識別するために使います。たとえばリアルタイムチャットでチャットの発言を保存する際に、どのユーザが発言したのかを記録するにはUIDを使います。</p>

<p>UIDは <code>onAuthStateChanged()</code> の引数（<code>user</code> オブジェクト）を使って <code>user.uid</code> で取得できます。UIDは下記のようなランダムな文字列です。</p>

<div class="language-txt highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>cTylBEouRChtXYI2cQgqY4w6lb72
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-3">6.3 データを保存する
</h3><p>Realtime Databaseは、全体で1つのJavaScriptオブジェクトのような木構造（フォルダとファイルのような階層構造）になっています。その中の <strong>キー</strong> と <strong>値</strong> の組み合わせとしてデータを保存します。キーとは値を取り出すための名前（鍵）です。下記のコードでmykeyというキーにmyvalueという値が保存されます。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>firebase.database().ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>).set(<span class="string"><span class="delimiter">'</span><span class="content">myvalue</span><span class="delimiter">'</span></span>);
</pre></div>
</div>
</div>

<p><code>firebase.database()</code> でRealtime Database機能にアクセスし、<code>ref()</code> で操作対象を選択して <code>set()</code> で値を書き込みます。操作対象を選択してから操作を実行するという手順は、jQueryに似ています。</p>

<p>（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference#set" target="_blank">set()</a>）</p>

<p>データを書き込むにはログインしている必要があります。そこで、<em>main.js</em> の全体を下記のように上書きしてください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログイン状態の変化を監視する</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>);

    <span class="comment">// mykeyにデータを保存する</span>
    firebase
      .database()
      .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
      .set(<span class="string"><span class="delimiter">'</span><span class="content">myvalue</span><span class="delimiter">'</span></span>);
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしていません</span><span class="delimiter">'</span></span>);

    firebase
      .auth()
      .signInAnonymously() <span class="comment">// 匿名ログインの実行</span>
      .<span class="keyword">catch</span>((error) =&gt; {
        <span class="comment">// ログインに失敗したときの処理</span>
        console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
      });
  }
});
</pre></div>
</div>
</div>

<p><em>main.js</em> を上記の内容で保存したら、別のウインドウでRealtime Databaseの「データ」タブを開いておいてください。実際にRealtime Databaseへデータが保存されたかを確認するためです。</p>

<p>データの設定画面を再度開く場合、プロジェクトのoverview画面の左側にある「Database」をクリックしてください。なお、この手順では表示されない場合がありますので、そのときはoverview画面の一番下までスクロールして「すべてのFirebase機能を表示」のリンク→「Realtime Database」→「データ」タブの順にクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-realtime-database-rules0.png" alt="Realtime Databaseのルール編集画面"></p>

<p>　　　　　　　　　　↓</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-realtime-database-rules1.png" alt="Realtime Databaseのルール編集画面"></p>

<p>では、<em>index.html</em> をリロード（再読み込み）してみましょう。すると「データ」の画面に下記のような値が現れます（通常はリロードしなくても新しいデータが表示されますが、変化がない場合は「データ」画面をリロードしてみてください）。</p>

<div class="language-txt highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>realtime-chat-xxxxx
└─mykey: "myvalue"
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-database-stored.png" alt="Console上での表示"></p>

<p>無事にFirebase上にデータを保存できました。「データ」の画面上から保存データの変更や削除もできます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-4">6.4 保存したデータを取り出す
</h3><p>mykeyに保存された値を取り出すには下記のように <code>firebase.database().ref(キー名).on()</code> というメソッドを使います。このメソッドは、Realtime Databaseが提供しています。jQueryのonメソッドとは違うので、注意してください。<code>.on()</code> の前が <code>firebase.database()</code> で始まっていれば、Realtime Databaseのメソッドです。jQueryのメソッドだと、<code>.on()</code> の前は <code>$('セレクタ')</code> で始まります。</p>

<p>（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference#on" target="_blank">on()</a>）</p>

<p><em>下記のコードは一例なので main.js に記述しないでください</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 現在のmykeyの値を取得</span>
firebase
  .database()
  .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
  .on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (snapshot) =&gt; {
    <span class="comment">// データの取得が完了すると実行される</span>
    console.log(snapshot.val());
  });
</pre></div>
</div>
</div>

<p>上記の例において <code>console.log(snapshot.val())</code> が実行されるのは、ページの読み込み時の1回のみではありません。<code>mykey</code> の値に変更があるたびに、コールバック関数が呼び出されます。つまり上記のコードでは、<code>(snapshot) =&gt; {...}</code> が呼び出されます。</p>

<p><code>firebase.database().ref(キー名).on()</code> を利用することで、<code>キー名</code> の値に変更があったことをリアルタイムに捕捉できます。これから作ろうとしているリアルタイムチャットでも <code>firebase.database().ref(キー名).on()</code> が大いに役立ちます。</p>

<p>このコールバック関数が呼び出されるとき、引数としてFirebaseの<a href="https://firebase.google.com/docs/reference/js/firebase.database.DataSnapshot" target="_blank">DataSnapshot</a>というオブジェクトが渡されます。上記のコードでは、引数名を <code>snapshot</code> としています。このDataSnapshotオブジェクトには、<code>ref(キー名)</code> で指定した場所に保存されたデータが入っています。データの実際の値は、 DataSnapshotオブジェクトから <code>val()</code> というメソッドを呼び出すことで取得できます。上記のコードでは、<code>snapshot.val()</code> を使ってデータベースに保存された実際の値を取得しています。</p>

<h4>プログラムの動作を少し変えてみる</h4>

<p>コールバック関数の挙動を確認する内容に、プログラムを変えてみます。ここでは「ボタンを押すたびに <code>mykey</code> の値が変更され、Firebaseに保存される」プログラムを作ります。</p>

<p>index.htmlで <code>&lt;h1&gt;Firebase Test&lt;/h1&gt;</code> のすぐ下の行に、下記のボタンを追加してください。このボタンの押した回数を保存するプログラムに変更します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;button</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>setNewValue<span class="tag">&lt;/button&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-countup-button.png" alt=""></p>

<p>そして <em>main.js</em> の全体を下記のように <strong>上書き</strong> してください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 初期値を設定</span>
let num = <span class="integer">0</span>;

const getValue = () =&gt; {
  <span class="comment">// 現在のmykeyの値を取得</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (snapshot) =&gt; {
      <span class="comment">// データの取得が完了すると実行される</span>

      const snapshotValue = snapshot.val();

      <span class="comment">// 取得した値が数値かを判定</span>
      <span class="keyword">if</span> (Number.isFinite(snapshotValue)) {
        num = snapshotValue;
      }

      console.log(<span class="error">`</span>Got value: <span class="predefined">$</span>{num}<span class="error">`</span>);
    });
};

const setValue = () =&gt; {
  num += <span class="integer">1</span>;
  console.log(<span class="error">`</span>set: <span class="predefined">$</span>{num}<span class="error">`</span>);

  <span class="comment">// Firebase上のmykeyの値を更新</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .set(num);
};

const logIn = () =&gt; {
  firebase
    .auth()
    .signInAnonymously() <span class="comment">// 匿名ログインの実行</span>
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログインに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
    });
};

<span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>);
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしていません</span><span class="delimiter">'</span></span>);
    logIn();
  }
});

<span class="comment">// id="my-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#my-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  setValue();
});
</pre></div>
</div>
</div>

<p><em>index.html</em> をプレビュー表示して、デベロッパーツールを開いてください。ボタンを押すたび<code>firebase.database().ref('mykey').on()</code>に登録したコールバック関数が呼び出され、「Got value: (ボタンを押した回数)」が表示されるのを確認できます。Firebaseの「データ」画面でも <code>mykey</code> の値を確認してみてください。</p>

<p>上記のコードではコールバック関数やイベントハンドラ内から、新たに定義した関数を呼び出しています。たとえばユーザのログイン状態が変化したら呼び出されるコールバック関数は、<code>logIn</code> という別の関数を呼び出しています。このlogin関数が、ログイン処理を実行します。コールバック関数やイベントハンドラとは別の関数で処理を行う理由は、主に２つあります。１つは、コードを分かりやすくするためです。もう１つは、変更しやすくするためです。</p>

<p>上記のコードを理解するには、上からではなく下から読む方が分かりやすいでしょう。具体的には、次のような順番で読むのがおすすめです。</p>

<p><strong>①</strong> まずコールバック関数や、イベントハンドラの登録処理を確認する<br>
↓<br>
<strong>②</strong> ①から呼び出されている関数や、利用されている変数の定義を確認する</p>

<p>本カリキュラムのコードにおいて自作の関数は、必ずその関数を呼び出す前に定義しています。上記のコードでは、<code>getValue</code>, <code>setValue</code>, <code>logIn</code> の３つが自作の関数です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-5">6.5 メール／パスワード認証の利用を開始する
</h3><p>認証自体は既に「匿名ログイン」という形で利用していました。Realtime Databaseの基本的な使い方を見てきたところで、ここからは匿名ログインを廃止し、メールアドレスとパスワードでログインできるようにしてみましょう。</p>

<p>引き続き <em>firebase-tutorial</em> 内の <em>index.html</em> と <em>main.js</em> に追記していきます。</p>

<p>まずは、以前の操作と同じようにしてFirebaseのAuthentication→「ログイン方法」の画面を表示しましょう。Firebaseのプロジェクトのoverview画面で、画面左側のメニューから「Authentication」をクリックしてください。右側に表示されたタブで「ログイン方法」をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-01.png" alt=""></p>

<p>一覧から「メール／パスワード」をクリックし、表示された内容の中で上側のスイッチをON、「メールリンク」のスイッチはOFFにして「保存」ボタンをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-02.png" alt=""></p>

<p>メール／パスワード認証を有効にしたところで、同じように「匿名」を開いて匿名ログインを無効にしてください。匿名ログインを無効にするのは、もう匿名ログインは使わないためです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-03.png" alt=""></p>

<p>ついでに「ユーザー」タブを開き、匿名ログインで登録されたユーザ情報の右端にある点をクリック→表示されたメニューから「アカウントの削除」をしておきましょう。確認画面が出ますが「削除」をクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-04.png" alt=""></p>

<p>　　　　　　　　　　↓</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-05.png" alt=""></p>

<p>匿名ログインのユーザを削除した代わりに、メールアドレス／パスワードでログインできるサンプルユーザの情報を追加しましょう。「ユーザー」タブの内容から「ユーザーの追加」ボタンをクリックして、下記のメールアドレスとパスワードを入れてください。</p>

<ul>
  <li>メールアドレス：<code>user@example.jp</code></li>
  <li>パスワード：<code>password</code></li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-06.png" alt=""></p>

<p>以上でメールアドレス／パスワード認証の設定は完了です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-6">6.6 ログインフォームを作成する
</h3><p>次に <em>index.html</em> にログインフォームを作ってみましょう。「setNewValue」の上にフォーム( <code>&lt;form&gt;</code> )を追記して設置してください。</p>

<p><em>index.html（抜粋）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;h1&gt;</span>Firebase Test<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;form&gt;</span>
      MAIL：<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">user-mail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
      PASS：<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">user-pass</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">login-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ログイン<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>setNewValue<span class="tag">&lt;/button&gt;</span><span class="tag">&lt;br&gt;</span>
    ...（中略）...
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-form.png" alt=""></p>

<p>補足ですが <code>setNewValue</code> のボタンは、この時点では何も動作しません。ログアウト状態だからです。このあと、メールアドレス／パスワード認証を実装してからボタンクリックをしてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-7">6.7 メールアドレス／パスワードでログインできるようにする
</h3><p>さて、サンプルユーザでログインできるようにします。「ログイン」と書かれたボタンを押すと、メールアドレスとパスワードのテキストボックスに入力された文字列をDOM操作で受け取り、<code>firebase.auth().signInWithEmailAndPassword()</code> というメソッドを呼び出します。</p>

<p>（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.auth.Auth#signInWithEmailAndPassword" target="_blank">signInWithEmailAndPassword()</a>）</p>

<p><em>main.js</em>を、下記のように変更もしくは上書きしてください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 初期値を設定</span>
let num = <span class="integer">0</span>;

const getValue = () =&gt; {
  <span class="comment">// 現在のmykeyの値を取得</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (snapshot) =&gt; {
      <span class="comment">// データの取得が完了すると実行される</span>

      const snapshotValue = snapshot.val();

      <span class="comment">// 取得した値が数値かを判定</span>
      <span class="keyword">if</span> (Number.isFinite(snapshotValue)) {
        num = snapshotValue;
      }

      console.log(<span class="error">`</span>Got value: <span class="predefined">$</span>{num}<span class="error">`</span>);
    });
};

const setValue = () =&gt; {
  num += <span class="integer">1</span>;
  console.log(<span class="error">`</span>set: <span class="predefined">$</span>{num}<span class="error">`</span>);

  <span class="comment">// Firebase上のmykeyの値を更新</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .set(num);
};

const logIn = (mail, pass) =&gt; {
  firebase
    .auth()
    .signInWithEmailAndPassword(mail, pass) <span class="comment">// ログイン実行</span>
    .then((user) =&gt; {
      <span class="comment">// ログインに成功したときの処理</span>
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>, user);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログインに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
    });
};

<span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>);
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>);
  }
});

<span class="comment">// id="my-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#my-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  setValue();
});

<span class="comment">// id="login-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const mail = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#user-mail</span><span class="delimiter">'</span></span>).val();
  const pass = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#user-pass</span><span class="delimiter">'</span></span>).val();

  logIn(mail, pass);
});
</pre></div>
</div>
</div>

<p>MAIL欄に <code>user@example.jp</code>、PASS欄に <code>password</code> と入力してログインボタンを押すと、ログインに成功します。ログインに成功すると、FirebaseのAuthenticationが持っているユーザ情報がコンソールに表示されます。また、ログイン状態が変わったので <code>firebase.auth().onAuthStateChanged()</code> に登録したコールバック関数が呼び出され、「状態：ログイン中」と表示されます。もし誤ったメールアドレスやパスワードを入力してログインボタンを押すと、コンソールにエラー情報が表示されます。併せて確認してみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-8">6.8 ログアウトできるようにする
</h3><p>ログインボタンのときと同じように、ログアウトボタンをクリックしたらログアウト処理が実行されるようにします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-form2.png" alt=""></p>

<p>まずは <em>index.html</em> を開いて、ログインボタンの記述の下にログアウトボタンを追記してください。</p>

<p><em>index.html（抜粋）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;h1&gt;</span>Firebase Test<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;form&gt;</span>
      MAIL：<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">text</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">user-mail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
      PASS：<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">user-pass</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">login-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ログイン<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">logout-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ログアウト<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;button</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>setNewValue<span class="tag">&lt;/button&gt;</span><span class="tag">&lt;br&gt;</span>
    ...（中略）...
</pre></div>
</div>
</div>

<p>次にイベントハンドラを登録しましょう。ログアウトには <code>firebase.auth().signOut()</code> を使います。</p>

<p>（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.auth.Auth#signOut" target="_blank">signOut()</a>）</p>

<p>main.jsを、下記のように変更もしくは上書きしてください。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 初期値を設定</span>
let num = <span class="integer">0</span>;

const getValue = () =&gt; {
  <span class="comment">// 現在のmykeyの値を取得</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (snapshot) =&gt; {
      <span class="comment">// データの取得が完了すると実行される</span>

      const snapshotValue = snapshot.val();

      <span class="comment">// 取得した値が数値かを判定</span>
      <span class="keyword">if</span> (Number.isFinite(snapshotValue)) {
        num = snapshotValue;
      }

      console.log(<span class="error">`</span>Got value: <span class="predefined">$</span>{num}<span class="error">`</span>);
    });
};

const setValue = () =&gt; {
  num += <span class="integer">1</span>;
  console.log(<span class="error">`</span>set: <span class="predefined">$</span>{num}<span class="error">`</span>);

  <span class="comment">// Firebase上のmykeyの値を更新</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .set(num);
};

const logIn = (mail, pass) =&gt; {
  firebase
    .auth()
    .signInWithEmailAndPassword(mail, pass) <span class="comment">// ログイン実行</span>
    .then((user) =&gt; {
      <span class="comment">// ログインに成功したときの処理</span>
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>, user);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログインに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
    });
};

const logOut = () =&gt; {
  firebase
    .auth()
    .signOut() <span class="comment">// ログアウト実行</span>
    .then(() =&gt; {
      <span class="comment">// ログアウトに成功したときの処理</span>
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログアウトしました</span><span class="delimiter">'</span></span>);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログアウトに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
    });
};

<span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>);
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>);
  }
});

<span class="comment">// id="my-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#my-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  setValue();
});

<span class="comment">// id="login-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const mail = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#user-mail</span><span class="delimiter">'</span></span>).val();
  const pass = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#user-pass</span><span class="delimiter">'</span></span>).val();

  logIn(mail, pass);
});

<span class="comment">// id="logout-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#logout-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  logOut();
});
</pre></div>
</div>
</div>

<p>ログアウトしてみると、コンソールに「ログアウトしました」と表示されます。さらにログイン状態が変わったので <code>firebase.auth().onAuthStateChanged()</code> に登録したコールバック関数が呼び出され、「状態：ログアウト中」と表示されます。</p>

<p><code>signInWithEmailAndPassword()</code> ではログインに成功すると何らかの戻り値が得られるため <code>.then()</code> のコールバック関数の引数に <code>user</code> という引数を設定し、情報を受け取るようにしています。しかし <code>firebase.auth().signOut()</code> のログアウト処理では特に何も戻り値が無いため、受け取り先の引数は設定していません。一方で、失敗した場合はエラー情報を得られます。そのため <code>.catch()</code> のコールバック関数に <code>error</code> という引数を設定しているのは変わりません。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-9">6.9 ユーザがログインしているかどうかを確認する
</h3><p>次に、ユーザが現在ログイン状態かどうかを調べる方法について説明します。</p>

<p>まずは <code>firebase.auth().onAuthStateChanged()</code> を復習します。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>);
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>);
  }
});
</pre></div>
</div>
</div>

<p>ログイン状態に変化があるとコールバック関数が呼び出されます。呼び出されるとき、user引数に値が渡されます。この <code>user</code> の値は、ログアウトした場合は <code>null</code> です。ログインした場合は、ユーザの情報がオブジェクトとして渡されます。</p>

<p>このオブジェクトの中身を、デベロッパーツールのコンソールで確認してみましょう。 <code>firebase.auth().onAuthStateChanged()</code> のコールバック関数を、次のように変更してください。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>, user);
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>, user);
  }
});
</pre></div>
</div>
</div>

<p><em>main.js</em> を上記のように変更したら、<em>index.html</em> をプレビュー表示してください。そしてデベロッパーツールのコンソールを開きます。</p>

<p>ログイン状態の場合、コンソールに下記のように表示されます。赤枠で囲った部分が、ユーザ情報のオブジェクトです。クリックすると、オブジェクトの中身が確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-onAuthStateChanged-log-1.png" alt=""></p>

<p>オブジェクトの中に、<code>uid</code> というプロパティが確認できます。これがユーザID（UID）で、ログインしたユーザごとに独自の値が割り振られます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-onAuthStateChanged-log-2.png" alt=""></p>

<p>ログアウトすると、コンソールに「状態：ログアウト <code>null</code>」と表示されます。user引数の値が <code>null</code> ということです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-onAuthStateChanged-log-3.png" alt=""></p>

<p>このUIDを保持するグローバル変数を用意し、ログインしたときはログインユーザのUIDを、ログアウトのときは <code>null</code> を代入します。そうすればこのグローバル変数を参照することでいつでも「ユーザがログインしているのかログアウト状態なのか」が判別できます。</p>

<p><em>main.js</em> の一番上の部分を、下記のように変更してください。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 初期値を設定</span>
let num = <span class="integer">0</span>;

<span class="comment">// ログインユーザのUID</span>
let currentUID = <span class="predefined-constant">null</span>;

<span class="comment">// ..（後略）..</span>
</pre></div>
</div>
</div>

<p>次に <code>firebase.auth().onAuthStateChanged()</code> のコールバック関数を、下記のように変更してください。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ..（前略）..</span>

<span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>);
    currentUID = user.uid;
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>);
    currentUID = <span class="predefined-constant">null</span>;
  }
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-6-10">6.10 （補足）ログイン／ログアウト状態で表示を変える
</h3><p>ログインしているのに「ログイン」ボタンが表示されている、逆にログアウト状態なのに「ログアウト」ボタンであったり、ログインしていないと利用できない「setNewValue」ボタンが表示されているのは都合が悪いです。そこで、CSSと連携してログイン／ログアウトの状態によって要素を表示する（しない）の設定をできるようにします。</p>

<p>ここではひとつの例として、要素の非表示にCSSの <code>display: none;</code> を用います。これが指定された要素は「HTMLファイルの中に <strong>存在しないもの</strong>」として扱われるので、<code>display: none;</code> で非表示にしたり <code>display: block;</code> で表示したりするようにします。</p>

<p>早速、<em>index.html</em> に適用してみましょう。まずは <code>&lt;head&gt;</code> に <code>&lt;style&gt;</code> を追加し、下記のようなclass指定を記述します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  <span class="tag">&lt;head&gt;</span>
    <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;title&gt;</span>Firebase Test<span class="tag">&lt;/title&gt;</span>
    <span class="tag">&lt;style&gt;</span>
<span class="inline">      <span class="class">.visible-block</span> {
        <span class="key">display</span>: <span class="value">block</span>;
      }
      <span class="class">.hidden-block</span> {
        <span class="key">display</span>: <span class="value">none</span>;
      }</span>
    <span class="tag">&lt;/style&gt;</span>
  <span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<p>次に、「MAIL欄・PASS欄・ログインボタン」、「ログアウトボタン」、「setNewValueボタン」のそれぞれを <code>&lt;div&gt;</code> で囲ってください。ログイン時に表示するべき要素は <code>class="visible-on-login"</code>、ログアウト時に表示するべき要素は <code>class="visible-on-logout"</code> を<code>&lt;div&gt;</code> に追加します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;h1&gt;</span>Firebase Test<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;form&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">visible-on-logout</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        MAIL：<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">user-mail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
        PASS：<span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">password</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">user-pass</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
        <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">login-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ログイン<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">visible-on-login</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;button</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">logout-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>ログアウト<span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">visible-on-login</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>setNewValue<span class="tag">&lt;/button&gt;</span>
    <span class="tag">&lt;/div&gt;</span>

    ..（中略）..
</pre></div>
</div>
</div>

<p>このような形でHTMLを構成しました。JavaScriptの処理によって、ログインしたら <code>visible-on-login</code> クラスの要素すべてに <code>visible-block</code> クラスを適用し、<code>visible-on-logout</code> クラスの要素には <code>hidden-block</code> クラスを適用します。</p>

<p>また、ログアウトしたら逆に <code>visible-on-login</code> クラスの要素すべてに <code>hidden-block</code> クラスを適用し、<code>visible-on-logout</code> クラスの要素には <code>visible-block</code> クラスを適用します。</p>

<p>一例を下記に示します。</p>

<p><em>まだ main.js には追記しないでください</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const changeView = () =&gt; {
  <span class="keyword">if</span> (currentUID != <span class="predefined-constant">null</span>) {
    <span class="comment">// ログイン状態のとき</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-login</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>);

    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-logout</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>);
  } <span class="keyword">else</span> {
    <span class="comment">// ログアウト状態のとき</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-login</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>);

    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-logout</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>);
  }
};

<span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>);
    currentUID = user.uid;
    changeView();
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>);
    currentUID = <span class="predefined-constant">null</span>;
    changeView();
  }
});
</pre></div>
</div>
</div>

<p>これで、ログイン状態とログアウト状態によって表示内容が切り替わります。</p>

<p>下記のように <em>main.js</em> の全てを <strong>上書き</strong> してください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 初期値を設定</span>
let num = <span class="integer">0</span>;

<span class="comment">// ログインユーザのUID</span>
let currentUID = <span class="predefined-constant">null</span>;

const getValue = () =&gt; {
  <span class="comment">// 現在のmykeyの値を取得</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (snapshot) =&gt; {
      <span class="comment">// データの取得が完了すると実行される</span>

      const snapshotValue = snapshot.val();

      <span class="comment">// 取得した値が数値かを判定</span>
      <span class="keyword">if</span> (Number.isFinite(snapshotValue)) {
        num = snapshotValue;
      }

      console.log(<span class="error">`</span>Got value: <span class="predefined">$</span>{num}<span class="error">`</span>);
    });
};

const setValue = () =&gt; {
  num += <span class="integer">1</span>;
  console.log(<span class="error">`</span>set: <span class="predefined">$</span>{num}<span class="error">`</span>);

  <span class="comment">// Firebase上のmykeyの値を更新</span>
  firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">mykey</span><span class="delimiter">'</span></span>)
    .set(num);
};

const logIn = (mail, pass) =&gt; {
  firebase
    .auth()
    .signInWithEmailAndPassword(mail, pass) <span class="comment">// ログイン実行</span>
    .then((user) =&gt; {
      <span class="comment">// ログインに成功したときの処理</span>
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>, user);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログインに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
    });
};

const logOut = () =&gt; {
  firebase
    .auth()
    .signOut() <span class="comment">// ログアウト実行</span>
    .then(() =&gt; {
      <span class="comment">// ログアウトに成功したときの処理</span>
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログアウトしました</span><span class="delimiter">'</span></span>);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログアウトに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
    });
};

const changeView = () =&gt; {
  <span class="keyword">if</span> (currentUID != <span class="predefined-constant">null</span>) {
    <span class="comment">// ログイン状態のとき</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-login</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>);

    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-logout</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>);
  } <span class="keyword">else</span> {
    <span class="comment">// ログアウト状態のとき</span>
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-login</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>);

    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.visible-on-logout</span><span class="delimiter">'</span></span>)
      .removeClass(<span class="string"><span class="delimiter">'</span><span class="content">hidden-block</span><span class="delimiter">'</span></span>)
      .addClass(<span class="string"><span class="delimiter">'</span><span class="content">visible-block</span><span class="delimiter">'</span></span>);
  }
};

<span class="comment">// ユーザのログイン状態が変化したら呼び出される、コールバック関数を登録</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログイン中</span><span class="delimiter">'</span></span>);
    currentUID = user.uid;
    changeView();
    getValue();
  } <span class="keyword">else</span> {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">状態：ログアウト</span><span class="delimiter">'</span></span>);
    currentUID = <span class="predefined-constant">null</span>;
    changeView();
  }
});

<span class="comment">// id="my-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#my-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  setValue();
});

<span class="comment">// id="login-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  const mail = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#user-mail</span><span class="delimiter">'</span></span>).val();
  const pass = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#user-pass</span><span class="delimiter">'</span></span>).val();

  logIn(mail, pass);
});

<span class="comment">// id="logout-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#logout-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  logOut();
});
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-form3.png" alt=""></p>

<p><em>ログイン状態のとき</em></p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-form4.png" alt=""></p>

<p><em>ログアウト状態のとき</em></p>
</div><div class="subsection"><h3 class="index" id="chapter-6-11">6.11 Storageの利用を開始する
</h3><p>このあとWebサービスを作成していく上では、もうひとつ「Storage」というFirebaseのサービスを利用します。Storageの基本的な使い方も見ていきましょう。</p>

<p>Firebaseでプロジェクトのoverview画面を開き、画面左側のメニューからStorageをクリックしてください。下記のような画面が表示されますので「スタートガイド」ボタンをクリックしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-01.png" alt=""></p>

<p>次に「セキュリティ保護ルール」についての説明画面が表示されます。デフォルトでは「ログインしているユーザのみが読み書き可能」という設定になっているという記載がされています。内容に目を通して「次へ」をクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-02-01.png" alt=""></p>

<p>「ロケーションの設定」画面が表示されますが、デフォルトの設定のままで構いません。「完了」をクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-02-02.png" alt=""></p>

<p>これでStorageを利用できるようになりました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-12">6.12 画像をStorageにアップロードする
</h3><p>引き続き <em>firebase-tutorial</em> 内にある <em>index.html</em> と <em>main.js</em> へ追記していきます。</p>

<p>ログイン中の画面でファイルの指定ができるフォーム部品( <code>&lt;input type="file"&gt;</code> )を <em>index.html</em> に追加します。</p>

<p><em>index.html（抜粋）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  <span class="tag">&lt;body&gt;</span>
    <span class="tag">&lt;h1&gt;</span>Firebase Test<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;form&gt;</span>
      ..（中略）..
    <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">visible-on-login</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>setNewValue<span class="tag">&lt;/button&gt;</span><span class="tag">&lt;br&gt;</span>
      <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">file</span><span class="delimiter">"</span></span> <span class="attribute-name">accept</span>=<span class="string"><span class="delimiter">"</span><span class="content">.jpg,.jpeg,.png,.gif, image/jpeg,image/png,image/gif</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">upload-image</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-03.png" alt=""></p>

<p>「ファイルを選択」ボタンをクリックして画像を選んで「開く」をクリックすると、Storageに画像ファイルが保存されるようにイベントハンドラを登録します。画像のアップロードには <code>firebase.storage().ref(ファイル名).put(ファイル)</code> を使います。</p>

<p>（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.storage.Reference#put" target="_blank">put()</a>）</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const logOut = () =&gt; {
  ...
}

const changeView = () =&gt; {
  ...
}

const uploadImage = (file) =&gt; {
  const fileName = <span class="string"><span class="delimiter">'</span><span class="content">sample/test</span><span class="delimiter">'</span></span>;
  firebase
    .storage()
    .ref(fileName)
    .put(file) <span class="comment">// ファイルアップロードを実行</span>
    .then((snapshot) =&gt; {
      <span class="comment">// アップロード処理に成功したときの処理</span>
      console.log(snapshot);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// アップロード処理に失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ファイルアップロードエラー</span><span class="delimiter">'</span></span>, error);
    });
};


    ..<span class="error">（</span><span class="error">中</span><span class="error">略</span><span class="error">）</span>..

<span class="comment">// id="login-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  ...
});

<span class="comment">// id="logout-button"をクリックしたら呼び出される、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#logout-button</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">click</span><span class="delimiter">'</span></span>, () =&gt; {
  ...
});

<span class="comment">// id="upload-image"でファイルが選択されたら、イベントハンドラを登録</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#upload-image</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">change</span><span class="delimiter">'</span></span>, (e) =&gt; {
  const { files } = e.target;

  <span class="keyword">if</span> (files.length === <span class="integer">0</span>) {
    <span class="comment">// ファイルが選択されていないなら何もしない</span>
    <span class="keyword">return</span>;
  }

  const file = files[<span class="integer">0</span>];

  <span class="comment">// Storageにアップロード</span>
  uploadImage(file);
});
</pre></div>
</div>
</div>

<p>input要素は、「filesプロパティ」というプロパティを持っています。このfilesプロパティの値は、「FileListオブジェクト」というオブジェクトです。</p>

<p>上記コードの <code>const { files } = e.target;</code> でfiles変数に代入（分割代入）している値が、FileListオブジェクトです。（分割代入については、Lesson3の<a href="javascript#chapter-4-10">4.10 オブジェクト</a>で解説しています。）</p>

<p>このFileListオブジェクトの中に、選択されたファイルのデータが入っています。上記のコードでは <code>files[0]</code> という記述によって、選択されたファイル情報を取得しています。</p>

<p>なお選択されるファイルは、 input要素にmultiple属性を加えることで複数にすることもできます。ですがここではmultiple属性を使用しておらず、選択されるファイルは１つだけです。そのため <code>files[0]</code> で、選択された画像ファイルを取得できます。</p>

<p>FileListオブジェクトについて詳しく学習したい方は、下記を参考にしてください。</p>

<ul>
  <li><a href="https://developer.mozilla.org/ja/docs/Web/API/File/Using_files_from_web_applications#Getting_information_about_selected_files">Web アプリケーションからファイルを扱う - Web API | MDN</a></li>
</ul>

<p>実際に何か画像ファイルを指定してみてください。<em>sample/test</em> というファイル名で画像をアップロードできます。<em>.png</em> のような拡張子を設定しませんでしたが、「MIMEタイプ」と呼ばれるファイルの種類の情報（たとえばpngファイルならMIMEタイプは <code>image/png</code>）が正しければ、拡張子がなくても <code>&lt;img&gt;</code> タグで正しく画像を表示できます。元のファイルが壊れていない限り、<code>firebase.storage().ref(ファイル名).put(ファイル)</code> でStorageにアップロードされたファイルは正しいMIMEタイプの情報を保持するので、今回はこのままで問題ありません。</p>

<p>補足として <code>firebase.storage().ref(ファイル名).put(ファイル)</code> は、アップロードできたファイルのデータ（スナップショット）を返します。<code>put()</code> の後に <code>.then(snapshot)</code> と記述すると、アップロードできたファイルのデータを <code>snapshot</code> で受け取れます。</p>

<p>FirebaseのStorageの「ファイル」画面から、選択した画像ファイルが保存できているかも確認しましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-firebase-console-storage-1.png" alt=""></p>

<p>↓</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-firebase-console-storage-2.png" alt=""></p>

<p>正しくアップロードできていれば、<em>sample</em> フォルダ内に <em>test</em> という名前で保存されています。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-13">6.13 アップロードした画像を画面に表示する
</h3><p>Storage上の画像ファイル <em>sample/test</em> を画面に表示してみましょう。今回は、アップロードが完了したタイミングで改めてStorageから画像を取得して表示する流れにします。そのために、<code>firebase.storage().ref(ファイル名).put(ファイル).then(snapshot)</code> の処理を変更していきます。まずはStorage上のファイルのURLを <code>firebase.storage().ref(ファイル名).getDownloadURL()</code> で取得します。そしてURLの取得に成功したら、画面へ表示するようにします。</p>

<p>（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.storage.Reference#getDownloadURL" target="_blank">getDownloadURL()</a>）</p>

<p>先に <em>index.html</em> を修正して、画像の表示部分を追加します。</p>

<p><em>index.html（抜粋）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;h1&gt;</span>Firebase Test<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;form&gt;</span>
      ..（中略）..
    <span class="tag">&lt;/form&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">visible-on-login</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;button</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">my-button</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>setNewValue<span class="tag">&lt;/button&gt;</span><span class="tag">&lt;br&gt;</span>
      <span class="tag">&lt;input</span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">file</span><span class="delimiter">"</span></span> <span class="attribute-name">accept</span>=<span class="string"><span class="delimiter">"</span><span class="content">.jpg,.jpeg,.png,.gif, image/jpeg,image/png,image/gif</span><span class="delimiter">"</span></span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">upload-image</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;br&gt;</span>
      <span class="tag">&lt;img</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">upload-image-preview</span><span class="delimiter">"</span></span> <span class="attribute-name">style</span>=<span class="string"><span class="delimiter">"</span><span class="key">width</span>: <span class="float">64px</span>; <span class="key">height</span>: <span class="float">64px</span>;<span class="delimiter">"</span></span><span class="tag">/&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>次に <em>main.js</em> のuploadImage関数を変更して、 ファイルアップロードに成功したらdownloadImage関数を呼び出すようにします。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const downloadImage = (fileName) =&gt; {
  firebase
    .storage()
    .ref(fileName)
    .getDownloadURL() <span class="comment">// 画像のURLを取得</span>
    .then((url) =&gt; {
      <span class="comment">// URLの取得に成功したときの処理</span>
      <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#upload-image-preview</span><span class="delimiter">'</span></span>).attr(<span class="string"><span class="delimiter">'</span><span class="content">src</span><span class="delimiter">'</span></span>, url); <span class="comment">// ページ上に画像を表示</span>
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// URLの取得に失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">URL取得エラー</span><span class="delimiter">'</span></span>, error);
    });
};

const uploadImage = (file) =&gt; {
  const fileName = <span class="string"><span class="delimiter">'</span><span class="content">sample/test</span><span class="delimiter">'</span></span>;
  firebase
    .storage()
    .ref(fileName)
    .put(file) <span class="comment">// ファイルアップロードを実行</span>
    .then(() =&gt; {
      <span class="comment">// アップロード処理に成功したときの処理</span>
      downloadImage(fileName);
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// アップロード処理に失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ファイルアップロードエラー</span><span class="delimiter">'</span></span>, error);
    });
};
</pre></div>
</div>
</div>

<p>downloadImage関数に書いた <code>firebase.storage().ref(ファイル名).getDownloadURL()</code> の処理が成功すると、画像のURLが取得できます。画像のURLは<code>.then(url)</code> と記述して、 引数の <code>url</code> で受け取っています。</p>

<p>実際に、適当な画像でアップロード処理を試してみて、画面に画像が表示されることを確認しましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-04.png" alt=""></p>

<p>Firebaseの基本的な使い方の説明は以上です。次のチャプターから、いよいよFirebaseを利用したWebサービスを作成していきます。以降の内容において <em>firebase-tutorial</em> フォルダ内のファイルは、もう変更しません。ただし、Webサービスの制作を進める中で分からなくなった際は、このコードに戻って復習してみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-6-14">6.14 （参考）エラーとデバッグ
</h3><p>何か挙動がおかしい。動かない。と言ったエラーがあった場合は、とにかくデベロッパーツールを開いてみましょう。何が起こっているのか分かる場合があります。</p>

<p>Firebase関連のエラーが発生した場合、デベロッパーツールのコンソールにエラー内容が表示されます。一見動いているように見えてもエラーが起きていることがありますので、デベロッパーツールをよくチェックしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-firebase-error.png" alt="デベロッパーツールのConsoleにエラーが表示される"></p>
</div></section><section id="chapter-7"><h2 class="index">7. 自分だけの本棚サイトを作ろう
</h2><div class="subsection"><p>このチャプターでは、本棚サイトを作ります。この本棚サイトは、自分だけが使える前提です。また本レッスンでは、下記の機能を満たすものを作ります。</p>

<ul>
  <li>メールアドレスとパスワードでログイン</li>
  <li>ログインすると書籍一覧の画面を表示する</li>
  <li>モーダルから書籍一覧に書籍を追加する（書籍タイトルの入力と、表紙画像のアップロード）</li>
  <li>追加した書籍を、書籍一覧の画面で表示する</li>
  <li>書籍の削除機能</li>
</ul>

<p>書籍の削除機能は、提出課題として作成してもらいます。</p>

<p>最初からこの仕様すべてに固執しないでください。このようなWebサービスを作成するときは、できるところから徐々に機能追加して、大きくすることが大切です。いきなり完成形を目指そうとすると、掴みどころがわからず、挫折するだけです。下記の内容を焦らずに読み進めつつ、サンプルコードを入力していき、本棚サイトを完成させましょう。</p>

<p>下記は完成イメージです。</p>

<p><strong>完成イメージ：ログイン画面</strong><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/login_view.png" alt="ログイン画面の完成イメージ"></p>

<p><strong>完成イメージ：書籍一覧画面</strong><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-bookshelf_2019.png" alt="書籍一覧画面の完成イメージ"></p>

<p><strong>完成イメージ：書籍の登録モーダル</strong><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/add-book_modal.png" alt="書籍の登録モーダルの完成イメージ"></p>

<div class="alert alert-info">
今回の本棚サイトや、次のチャプターで作るリアルタイムチャットでは、場合に応じて Bootstrap の <strong>モーダル</strong> 機能も利用しています。モーダルとは、元の画面に覆いかぶさるように表示される小ウィンドウのことです。<br>
<br>
<a href="https://getbootstrap.com/docs/4.3/components/modal/" target="_blank">参考：モーダル</a>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-1">7.1 HTMLで書いてみる
</h3><p>まずは静的なサイトとして作ってみます。いきなりプログラムを交えたものを作ってしまうと、複雑になってしまうので、不具合が起きても早めに対処できるように、小さく始めることが肝心です。ここではできるだけイメージに近くなるように、サンプルテキストやサンプル画像を使って全部埋めてみます。</p>

<p>以下、静的なサイトとしての書籍一覧画面の作成を解説します。</p>

<h4>本棚サイト用のフォルダを作成</h4>

<p>まずはCloud9のワークスペース直下に <em>bookshelf</em> という名前のフォルダを新規作成します。</p>

<h4>画像ファイルの準備</h4>

<p>これから作成するサイトの画像ファイルを下記のリンクからダウンロードし、Cloud9の <em>bookshelf</em> フォルダ内へアップロードしておいてください。ダウンロードしたZipファイルをダブルクリックで解凍し、imagesフォルダをそのままドラッグアンドドロップで <em>bookshelf</em> フォルダにアップロードしましょう。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/bookshelf_images.zip">画像ファイル</a></li>
</ul>

<p>この画像ファイルの中には、ロゴ画像、カバー画像、そしてサンプル書籍のキャプチャ画像が入っています。</p>

<h4>書籍一覧画面の静的なHTML</h4>

<p>書籍一覧画面は、最終的に下記のHTMLコードになります。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Bookshelf | カンタン！あなたのオンライン本棚<span class="tag">&lt;/title&gt;</span>

  <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

  <span class="comment">&lt;!-- 自サイトのCSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="comment">&lt;!-- 書籍一覧画面 --&gt;</span>
  <span class="tag">&lt;section</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">bookshelf</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">view</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;header&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">header</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">logo</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="comment">&lt;!-- &lt;a href="./bookshelf_index.php" --&gt;</span>
          <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">./index.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Bookshelf</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#add-book-modal</span><span class="delimiter">"</span></span> <span class="attribute-name">data-toggle</span>=<span class="string"><span class="delimiter">"</span><span class="content">modal</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">add-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-plus-circle</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
          書籍の登録
        <span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary logout-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          ログアウト
        <span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/header&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">cover</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;h1</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">cover__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>カンタン！あなたのオンライン本棚<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-list</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">clearfix</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>初めてのプログラミング<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_2.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>実践で学ぶSEO入門<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_3.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>実践Webアプリケーション開発<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_4.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>詳しい解説付き！HTML5<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_5.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>みんなのプログラミング講座<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

        <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
  <span class="tag">&lt;/section&gt;</span>
  <span class="comment">&lt;!-- /#bookshelf --&gt;</span>

  <span class="comment">&lt;!-- Font Awesome --&gt;</span>
  <span class="tag">&lt;script</span> <span class="attribute-name">defer</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://use.fontawesome.com/releases/v5.7.2/js/all.js</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/script&gt;</span>
<span class="tag">&lt;/body&gt;</span>

<span class="tag">&lt;/html&gt;</span>
</pre></div>
</div>
</div>

<p>長くて、疲れてしまいそうです。しかし、大きな要素を1つのまとまりとして理解していけば、今まで学んできた要素がちょっと大きくなっただけだと気付くでしょう。上記コードのHTMLの階層は、大きな構造で分けると下記の通りです。これを1つずつ書いたため、上記のコードのように長くなりました。 <code>&lt;div class="book-item"&gt;</code> を5つも書いた理由は、横に4つ並べたとき、5つ目から下に回り込むかを確認したいからです。</p>

<p><em>上記HTMLの構造</em></p>

<pre><code>- head
- body
  - header （ヘッダー）
    - logo （ロゴ画像）
    - add-button （書籍の登録ボタン）
    - logout-button （ログアウトボタン）
  - cover （カバー画像）
  - book-list （書籍一覧）
    - book-item x 5 （一冊ずつの書籍）
      - book-item__image （書籍の表紙画像）
      - book-item__detail
        - book-item__title （書籍タイトル）
        - book-item__delete （書籍削除ボタン）
</code></pre>

<p>筆者とて、最初から、上から下までこの構造がいきなり頭にあったわけではありません。誰もが同じように新しく書き進めながら、要素も整理しながら進めます。</p>

<p>まずは上から下へ要素を書き進めていきます。1つの要素を完成するごとに前後の整合性をとりながらdivをつけたりして整理していくと、最終的には長いものになります。</p>

<p>表示を確認しておきましょう。</p>

<h4>head要素</h4>

<p>head要素には、BookshelfというWebサイトのタイトルを設定します。またCSSファイルは、Bootstrapと自サイトの２つを読み込むように設定します。自サイトのCSSはまだ作成していないので、main.cssは現状では読み込まれません。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Bookshelf | カンタン！あなたのオンライン本棚<span class="tag">&lt;/title&gt;</span>

  <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

  <span class="comment">&lt;!-- 自サイトのCSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">main.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>
</pre></div>
</div>
</div>

<h4>ヘッダー</h4>

<p>header要素にはロゴ画像、書籍の登録ボタン、ログアウトボタンを並べます。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;header&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">header</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">logo</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">./index.html</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;img</span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/logo.png</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">Bookshelf</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;/div&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">#add-book-modal</span><span class="delimiter">"</span></span> <span class="attribute-name">data-toggle</span>=<span class="string"><span class="delimiter">"</span><span class="content">modal</span><span class="delimiter">"</span></span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">add-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-plus-circle</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
          書籍の登録
        <span class="tag">&lt;/a&gt;</span>
        <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-primary logout-button</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          ログアウト
        <span class="tag">&lt;/button&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
    <span class="tag">&lt;/header&gt;</span>
</pre></div>
</div>
</div>

<h4>カバー（最初に目に入るアイキャッチ）</h4>

<p>キャッチコピーを表示します。後ほどCSSで、カバー画像を背景に表示します。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">cover</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
      <span class="tag">&lt;h1</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">cover__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>カンタン！あなたのオンライン本棚<span class="tag">&lt;/h1&gt;</span>
    <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<h4>書籍一覧</h4>

<p>同じ要素 ( <code>.book-item</code> ) が5つ並んでいるので、HTMLが長く見えます。しかし1つ分かってしまえば、ただの書籍リストです。</p>

<p>ここには書籍画像や、書籍タイトルが入っています。後でそれぞれの書籍を削除できるようにします。</p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>初めてのプログラミング<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<div class="alert alert-info">
<strong>コラム：Single Page Application</strong><br>
<br>
この本棚サイトでは、HTMLファイルを1つしか用意しません。次のチャプターで作る、リアルタイムチャットでも同様です。本棚サイトの書籍一覧画面やログイン画面などは、同一のHTMLファイルに記載します。そして条件によって、「何の画面を表示するか」をCSS/JavaScriptで切り替えます。<br>
<br>
<i>これから作成するjs/main.jsより抜粋</i><br>

<pre>// ビュー（画面）を変更する
const showView = (id) =&gt; {
  $('.view').hide();
  $(`#${id}`).fadeIn();

  if (id === 'bookshelf') {
    loadBookshelfView();
  }
};
</pre>
<br>
class が view となっている要素を最初は全て隠した上で、「どの画面を表示したいか」によって1つの view のみを表示するようにしています。このように1つのHTMLファイルで全ての画面を用意したフロントエンドを <strong>Single Page Application (SPA)</strong> と言います。本来SPAでフロントエンドを構築する場合、React や Vue.js といったフレームワークと呼ばれるものを導入した方が良いですが、今回は簡易的なSPAということで、自前で画面切り替えの機能を用意しています。<br>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-2">7.2 CSSでデザインを整える
</h3><p>CSSも同様に、初めからは完成していません。1つずつ余白をとったりしながら整理しつつ書いていけば、下記のように長いコードになります。</p>

<p>下記のコードをmain.cssへコピーすると、デザインが適用されます。うまく動かない場合には、デベロッパーツールを使って動作確認してみましょう。</p>

<p><em>main.css</em></p>

<div class="language-css highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="directive">@charset</span> <span class="string"><span class="delimiter">"</span><span class="content">UTF-8</span><span class="delimiter">"</span></span>;

<span class="class">.clearfix</span><span class="pseudo-class">::after</span> {
  <span class="key">content</span>: <span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span>;
  <span class="key">clear</span>: <span class="value">both</span>;
  <span class="key">display</span>: <span class="value">block</span>;
}

<span class="id">#header</span> {
  <span class="key">display</span>: <span class="value">flex</span>;
  <span class="key">width</span>: <span class="float">1200px</span>;
  <span class="key">height</span>: <span class="float">60px</span>;
  <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
  <span class="key">justify-content</span>: <span class="value">space-between</span>;
  <span class="key">align-items</span>: <span class="value">center</span>;
  <span class="key">background-color</span>: <span class="value">white</span>;
}

<span class="id">#logo</span> {
  <span class="key">display</span>: <span class="value">inline-block</span>;
}

<span class="class">.add-button</span> {
  <span class="key">text-decoration</span>: <span class="value">none</span>;
  <span class="key">color</span>: <span class="color">#28a745</span>;
  <span class="key">font-size</span>: <span class="float">18px</span>;
}
<span class="class">.add-button</span><span class="pseudo-class">:hover</span> {
  <span class="key">text-decoration</span>: <span class="value">none</span>;
  <span class="key">color</span>: <span class="color">#1f8737</span>;
}
<span class="class">.add-button</span><span class="pseudo-class">:focus</span> {
  <span class="key">text-decoration</span>: <span class="value">none</span>;
}

<span class="id">#cover</span> {
  <span class="key">color</span>: <span class="value">white</span>;
  <span class="key">height</span>: <span class="float">300px</span>;
  <span class="key">background-color</span>: <span class="value">black</span>;
  <span class="key">background-image</span>: <span class="function"><span class="delimiter">url(</span><span class="content">"./images/cover.jpg"</span><span class="delimiter">)</span></span>;
  <span class="key">background-position</span>: <span class="value">center</span> <span class="value">center</span>;
  <span class="key">background-repeat</span>: <span class="value">no-repeat</span>;
  <span class="key">display</span>: <span class="value">flex</span>;
  <span class="key">justify-content</span>: <span class="value">center</span>;
  <span class="key">align-items</span>: <span class="value">center</span>;
  <span class="key">flex-flow</span>: <span class="value">column</span> <span class="value">nowrap</span>;
}

<span class="id">#cover__title</span> {
  <span class="key">font-size</span>: <span class="float">36px</span>;
  <span class="key">letter-spacing</span>: <span class="float">10px</span>;
}

<span class="id">#main</span> {
  <span class="key">width</span>: <span class="float">1200px</span>;
  <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
}

<span class="id">#book-list</span> {
  <span class="key">margin</span>: <span class="float">20px</span> <span class="value">auto</span>;
}

<span class="class">.book-item</span> {
  <span class="key">width</span>: <span class="float">270px</span>;
  <span class="key">margin</span>: <span class="float">15px</span>;
  <span class="key">float</span>: <span class="value">left</span>;
  <span class="key">background-color</span>: <span class="value">white</span>;
  <span class="key">border</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#ddd</span>;
}

<span class="class">.book-item__image-wrapper</span> {
  <span class="key">width</span>: <span class="float">270px</span>;
  <span class="key">height</span>: <span class="float">270px</span>;
  <span class="key">padding</span>: <span class="float">10px</span>;
  <span class="key">display</span>: <span class="value">table-cell</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;
  <span class="key">vertical-align</span>: <span class="value">middle</span>;
}

<span class="class">.book-item__image</span> {
  <span class="key">max-height</span>: <span class="float">250px</span>;
  <span class="key">max-width</span>: <span class="float">250px</span>;
  <span class="key">vertical-align</span>: <span class="value">middle</span>;
}

<span class="class">.book-item__detail</span> {
  <span class="key">padding</span>: <span class="float">10px</span>;
  <span class="key">background-color</span>: <span class="color">#fafafa</span>;
  <span class="key">border-top</span>: <span class="value">solid</span> <span class="float">1px</span> <span class="color">#ddd</span>;
}

<span class="class">.book-item__title</span> {
  <span class="key">margin</span>: <span class="float">0</span> <span class="value">auto</span>;
  <span class="key">height</span>: <span class="float">36px</span>;
  <span class="key">text-align</span>: <span class="value">center</span>;
  <span class="key">overflow</span>: <span class="value">hidden</span>;
}

<span class="class">.book-item__delete-wrapper</span> {
  <span class="key">margin-top</span>: <span class="float">5px</span>;
  <span class="key">text-align</span>: <span class="value">right</span>;
}

<span class="class">.book-item__delete</span> {
  <span class="key">color</span>: <span class="color">#dc3545</span>;
  <span class="key">background-color</span>: <span class="value">transparent</span>;
  <span class="key">border-color</span>: <span class="color">#dc3545</span>;
}
<span class="class">.book-item__delete</span><span class="pseudo-class">:hover</span> {
  <span class="key">color</span>: <span class="color">#fff</span>;
  <span class="key">background-color</span>: <span class="color">#dc3545</span>;
  <span class="key">border-color</span>: <span class="color">#dc3545</span>;
}
<span class="class">.book-item__delete</span><span class="pseudo-class">:focus</span> {
  <span class="key">outline-color</span>: <span class="color">#dc3545</span>;
  <span class="key">box-shadow</span>: <span class="float">0</span> <span class="float">0</span> <span class="float">0</span> <span class="float">0.2</span><span class="value">rem</span> <span class="color">rgba(220, 53, 69, 0.5)</span>;
}
</pre></div>
</div>
</div>

<p>ここまでのHTMLとCSSファイルで、書籍一覧画面を静的なサイトとして作成できました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-3">7.3 HTML内で動的な部分をJavaScriptで生成する
</h3><p>次のチャプターからJavaScriptとFirebaseを利用して、本棚サイトを実装していきます。</p>

<p>書籍一覧画面で１冊ずつ書籍を表示する部分は、JavaScriptによって動的に生成します。具体的には、静的サイトとして作成した下記のHTML部分です。</p>

<p><em>index.html（JavaScriptで動的に表示したい部分のみ抜粋）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>初めてのプログラミング<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_2.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>実践で学ぶSEO入門<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_3.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>実践Webアプリケーション開発<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_4.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>詳しい解説付き！HTML5<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>

          <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__image</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">./images/item_book_5.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__detail</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__title</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>みんなのプログラミング講座<span class="tag">&lt;/div&gt;</span>
              <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">book-item__delete-wrapper</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                <span class="tag">&lt;button</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">btn btn-danger book-item__delete</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
                  <span class="tag">&lt;i</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">fas fa-trash-alt</span><span class="delimiter">"</span></span> <span class="attribute-name">aria-hidden</span>=<span class="string"><span class="delimiter">"</span><span class="content">true</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/i&gt;</span>
                  削除
                <span class="tag">&lt;/button&gt;</span>
              <span class="tag">&lt;/div&gt;</span>
            <span class="tag">&lt;/div&gt;</span>
          <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-4">7.4 本棚サイトの実装準備をしよう
</h3><p>このチャプターからJavaScriptとFirebaseを利用して、本棚サイトを実装していきます。</p>

<p>まず、本棚サイトの土台とするHTML/CSS/JavaScriptのファイル一式を下記からダウンロードしてください。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/bookshelf_tutorial_template.zip">本棚サイトのファイル一式</a></li>
</ul>

<p>このファイル一式のindex.htmlには、下記の画面のHTMLコードも含まれています。</p>

<ul>
  <li>ログイン画面</li>
  <li>書籍を登録するためのモーダル（元の画面に覆いかぶさるように表示される小ウィンドウ）</li>
</ul>

<p>ダウンロードできたら、解凍して現れる3つのファイル（<em>index.html</em>, <em>main.css</em>, <em>main.js</em>）をCloud9上の <em>bookshelf</em> フォルダにアップロードしてください（事前に作成した <em>index.html</em> と <em>main.css</em> は、あくまでも静的なデザイン確認のために作成したので、配布したファイルで上書きしても問題ありません）。</p>

<p>アップロードした <em>index.html</em> をCloud9上で開き、下記のFirebaseのセットアップコードを、ご自分のものに置き換えてください。セットアップコードについて詳しくは、<a href="baas#chapter-4">4. Firebaseのセットアップ</a> をご確認ください。引き続き、”Realtime Chat” のFirebaseプロジェクトを利用します。</p>

<p><em>index.html（抜粋）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  <span class="comment">&lt;!-- Firebaseのセットアップコード（下記のSDKのバージョンは6.2.0） --&gt;</span>

  <span class="comment">&lt;!-- 中略 --&gt;</span>

  <span class="comment">&lt;!-- apiKeyなどは、ご自身の環境のものに合わせてください --&gt;</span>
  <span class="tag">&lt;script&gt;</span>
<span class="inline">    <span class="comment">// Your web app's Firebase configuration</span>
    const firebaseConfig = {
      <span class="key">apiKey</span>: <span class="string"><span class="delimiter">"</span><span class="content">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span><span class="delimiter">"</span></span>,
      <span class="key">authDomain</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxxx.firebaseapp.com</span><span class="delimiter">"</span></span>,
      <span class="key">databaseURL</span>: <span class="string"><span class="delimiter">"</span><span class="content">https://realtime-chat-xxxxx.firebaseio.com</span><span class="delimiter">"</span></span>,
      <span class="key">projectId</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxx</span><span class="delimiter">"</span></span>,
      <span class="key">storageBucket</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxxx.appspot.com</span><span class="delimiter">"</span></span>,
    };
    <span class="comment">// Initialize Firebase</span>
    firebase.initializeApp(firebaseConfig);</span>
  <span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<div class="alert alert-danger">
本レッスンで提出する中間課題は、このチャプターで作成した <i>bookshelf</i> に機能を追加することがテーマです。<strong>このチャプターの内容を学習／作成しないと、提出課題に進んでも、何をどうしたら良いか見当がつかなくなる</strong>ので、必ず手を動かして学習してください。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-5">7.5 どのように書籍データを保存するか考える（データベース設計）
</h3><p>今回の本棚サイトでは、書籍データをFirebaseのRealtime Databaseに保存します。Realtime Databaseでは、データがJSON形式で保存されます。</p>

<p>保存する書籍データは、下記の構造になります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key">books</span>: {
    <span class="key"><span class="delimiter">"</span><span class="content">xxxxxx...</span><span class="delimiter">"</span></span>: { <span class="comment">// 書籍ID</span>
      <span class="key">bookTitle</span>: <span class="string"><span class="delimiter">"</span><span class="content">初めてのプログラミング</span><span class="delimiter">"</span></span>, <span class="comment">// 書籍タイトル</span>
      <span class="key">profileImageLocation</span>: <span class="string"><span class="delimiter">"</span><span class="content">book-images/xxxxxx...</span><span class="delimiter">"</span></span>, <span class="comment">// 表紙画像の保存場所</span>
      <span class="key">createdAt</span>: <span class="integer">1234567890</span>, <span class="comment">// 作成（保存）時刻</span>
    },
    <span class="key"><span class="delimiter">"</span><span class="content">yyyyyy...</span><span class="delimiter">"</span></span>: {
      <span class="key">bookTitle</span>: <span class="string"><span class="delimiter">"</span><span class="content">実践で学ぶSEO入門</span><span class="delimiter">"</span></span>,
      <span class="key">profileImageLocation</span>: <span class="string"><span class="delimiter">"</span><span class="content">book-images/yyyyyy...</span><span class="delimiter">"</span></span>,
      <span class="key">createdAt</span>: <span class="integer">1234577890</span>,
    },
  },
}
</pre></div>
</div>
</div>

<p>上記は、これから実装するJavaScriptのプログラムでRealtime Databaseにデータを送信すると、このような構造でデータが保存されますという説明です。</p>

<p>書籍の表紙画像ファイルは、FirebaseのStorageに保存します。Realtime Databaseでは、Storageのどこに画像ファイルをアップロードしたかを記録します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-6">7.6 ログイン処理の概要
</h3><p>本棚サイトは、メールアドレスとパスワードでログインする仕組みにします。画面のHTMLはすでにできているので、処理だけJavaScriptで作っていきましょう。</p>

<h4>テストユーザの作成</h4>

<p><em>firebase-tutorial</em> で作成したユーザを削除している場合は、下記の手順でログインできるユーザ情報を追加してください。</p>

<p>まず、<a href="baas#chapter-6-5">6.5 メール／パスワード認証の利用を開始する</a>で学習したように、<br>
Firebase ConsoleでAuthを開きます。「ログイン方法」タブで「メール / パスワード」が有効化されていることを確認しましょう。同時に、匿名でのログインが無効化されていることも確認してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-02.png" alt=""></p>

<p>次に、メールアドレス／パスワードでログインできるサンプルユーザの情報を追加しましょう。「ユーザー」タブの内容から「ユーザーの追加」ボタンをクリックして、下記のメールアドレスとパスワードを入れてください。</p>

<ul>
  <li>メールアドレス：<code>user@example.jp</code></li>
  <li>パスワード：<code>password</code></li>
</ul>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-authentication-06.png" alt=""></p>

<h4>登録済みユーザでログインする</h4>

<p>おさらいですが、作成したユーザでログインするには <code>firebase.auth().signInWithEmailAndPassword()</code> を呼び出します。下記に例を示します。</p>

<p><em>JavaScriptのコード例（一例のため main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="keyword">if</span> (user) {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました</span><span class="delimiter">'</span></span>);
  }
});

const email = <span class="string"><span class="delimiter">'</span><span class="content">user1@example.com</span><span class="delimiter">'</span></span>; <span class="comment">// ログインに使うメールアドレス</span>
const password = <span class="string"><span class="delimiter">'</span><span class="content">password1</span><span class="delimiter">'</span></span>;      <span class="comment">// パスワード</span>

<span class="comment">// ログインを試みる</span>
firebase
  .auth()
  .signInWithEmailAndPassword(email, password)
  .then(() =&gt; {
    <span class="comment">// ログインに成功したときの処理</span>
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました。</span><span class="delimiter">'</span></span>);
  })
  .<span class="keyword">catch</span>((error) =&gt; {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);
  });
</pre></div>
</div>
</div>

<p>ログインに成功すると、<code>onAuthStateChanged()</code> のコールバック関数が呼び出されます。このとき上記コードのuser引数に<a href="https://firebase.google.com/docs/reference/js/firebase.User" target="_blank">firebase.Userオブジェクト</a>が入ります。ログインしていない場合、user引数の値は <code>null</code> です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-7">7.7 ログイン処理を実装する
</h3><p>main.jsに <code>TODO: ログインを試みる</code> と書かれたコメントがあります。そのコメントのとおり「ログインを試みる」コードを、ここの部分に書きます。index.htmlをブラウザで開いてメールアドレスとパスワードを入力し、ログインボタンを押すとTODO部分が実行されます。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログインフォームが送信されたらログインする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();

  const <span class="predefined">$loginButton</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login__submit-button</span><span class="delimiter">'</span></span>);
  <span class="predefined">$loginButton</span>.text(<span class="string"><span class="delimiter">'</span><span class="content">送信中…</span><span class="delimiter">'</span></span>);

  const email = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-email</span><span class="delimiter">'</span></span>).val();
  const password = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-password</span><span class="delimiter">'</span></span>).val();

  <span class="comment">// TODO: ログインを試みる</span>

});
</pre></div>
</div>
</div>

<p>ログインフォームに入力されたメールアドレスとパスワードで、ログインを試みます。ログインに失敗した場合は、「ログインに失敗しました。」というメッセージを表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/login_failed-message.png" alt="ログインに失敗しました。"></p>

<p>また「ログインエラー」というエラーメッセージをデベロッパーツールのコンソールに表示します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/login_console-error.png" alt="ログインエラー"></p>

<p>実装は下記のようになります。<code>// TODO: ログインを試みる</code> と書かれた部分のコードを <em>main.js</em> の同じ箇所に記述してください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログインフォームが送信されたらログインする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// ..（中略）..</span>

  const email = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-email</span><span class="delimiter">'</span></span>).val();
  const password = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-password</span><span class="delimiter">'</span></span>).val();

  <span class="comment">// TODO: ログインを試みる</span>
  firebase
    .auth()
    .signInWithEmailAndPassword(email, password)
    .then(() =&gt; {
      <span class="comment">// ログインに成功したときの処理</span>
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログインしました。</span><span class="delimiter">'</span></span>);

      <span class="comment">// ログインフォームを初期状態に戻す</span>
      resetLoginForm();
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// ログインに失敗したときの処理</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">ログインエラー</span><span class="delimiter">'</span></span>, error);

      <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login__help</span><span class="delimiter">'</span></span>)
        .text(<span class="string"><span class="delimiter">'</span><span class="content">ログインに失敗しました。</span><span class="delimiter">'</span></span>)
        .show();

      <span class="comment">// ログインボタンを元に戻す</span>
      <span class="predefined">$loginButton</span>.text(<span class="string"><span class="delimiter">'</span><span class="content">ログイン</span><span class="delimiter">'</span></span>);
    });
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-8">7.8 ログインしたら書籍一覧画面に移動する
</h3><p>上記のコードが記述できたら、本棚サイトをプレビュー表示して、ログインしてみましょう。ログインフォームが表示されるので、Firebase ConsoleのAuthで作成した、下記のメールアドレスとパスワードを入れてください。</p>

<ul>
  <li>メールアドレス：<code>user@example.jp</code></li>
  <li>パスワード：<code>password</code></li>
</ul>

<p>ログインに成功すると、ログイン画面から書籍一覧画面に変わります。画面が変わらない場合は、デベロッパーツールのコンソールにエラーメッセージが表示されていないか確認してみてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/book-list_empty.png" alt="書籍一覧画面"></p>

<p>main.jsに記述した <code>onAuthStateChanged()</code> でログイン状態を検知して <code>showView("bookshelf")</code> を呼び出すことで、書籍一覧画面に移動します。コードの見通しを良くするため <code>onLogin()</code> という関数を作っています。</p>

<p>下記のコードは既に <em>main.js</em> に実装済みです。実際に該当部分のコードを確認してみてください。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログインした直後に呼ばれる</span>
const onLogin = () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログイン完了</span><span class="delimiter">'</span></span>);

  <span class="comment">// 書籍一覧画面を表示</span>
  showView(<span class="string"><span class="delimiter">'</span><span class="content">bookshelf</span><span class="delimiter">'</span></span>);
};

<span class="comment">// （中略）</span>

<span class="comment">// ログイン状態の変化を監視する</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="comment">// ログイン状態が変化した</span>
  <span class="keyword">if</span> (user) {
    <span class="comment">// ログイン済</span>
    onLogin();
  } <span class="keyword">else</span> {
    <span class="comment">// 未ログイン</span>
    onLogout();
  }
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-9">7.9 書籍の登録機能
</h3><p>書籍一覧画面に、書籍データが表示されるようにします。書籍一覧画面のヘッダーに、「書籍の登録」というボタンがあります。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/add-book_button.png" alt=""></p>

<p>このボタンをクリックすると、モーダルが表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/add-book_modal.png" alt=""></p>

<p>モーダル内のフォームでは、書籍のタイトルを入力して、表紙画像ファイルを選択できるようにしています。このモーダルが表示されるところまでは、すでに実装してあります。</p>

<p>しかし現在のコードでは、「保存する」ボタンを押しても何も変化しません。これから、保存するボタンを押したときの処理を実装していきましょう。次の2つの処理が行われるようにします。</p>

<ul>
  <li>書籍データをデータベースに保存する</li>
  <li>保存された書籍データを、書籍一覧画面に表示する</li>
</ul>
</div><div class="subsection"><h3 class="index" id="chapter-7-10">7.10 書籍データの保存処理の概要
</h3><p>ここでは書籍データの保存処理について、概要を説明します。書籍データの保存には、<a href="https://firebase.google.com/docs/storage/" target="_blank">Firebase Storage</a> とRealtime Databaseを使います。</p>

<p>Storageには、書籍の表紙画像ファイルを保存（アップロード）します。Storageは画像や動画など、大容量のデータを扱うためのものでした。</p>

<p>Realtime Databaseには、次の３つを保存します。</p>

<ul>
  <li>書籍タイトル (<code>bookTitle</code>)</li>
  <li>表紙画像のアップロード先 (<code>profileImageLocation</code>)</li>
  <li>保存した時刻 (<code>createdAt</code>)</li>
</ul>

<p>上記のとおりRealtime Databaseに、書籍データを保存した時刻も保存します。これは書籍一覧画面で、保存した時刻順に書籍データを表示するためです。</p>

<p>上記が、書籍データの保存処理についての概要です。以下、StorageとRealtime Databaseのそれぞれについて解説します。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-11">7.11 Storageへの画像アップロードの概要
</h3><p>まず、Storageの利用設定が必要です。<em>firebase-tutorial</em> で設定完了しているので、ここでは操作は不要ですが復習として操作方法を解説します。なお下記に記載した方法は、<a href="baas#chapter-6-11">6.11 Storageの利用を開始する</a>と同様です。</p>

<p>Firebaseでプロジェクトのoverview画面を開き、画面左側のメニューからStorageをクリックしてください。下記のような画面が表示されますので「スタートガイド」ボタンをクリックしましょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-01.png" alt=""></p>

<p>次に「セキュリティ ルール」についての説明画面が表示されます。デフォルトでは「ログインしているユーザのみが読み書き可能」という設定になっているという記載がされています。内容に目を通して「OK」をクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-storage-02.png" alt=""></p>

<p>これでStorageを利用できるようになりました。</p>

<p>次に、使い方もおさらいしましょう。HTML内に下記のような画像ファイルアップロード用のフォームを用意します。</p>

<p><em>HTMLのコード例（index.html に追記しないでください）</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="tag">&lt;input</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">upload-file</span><span class="delimiter">"</span></span> <span class="attribute-name">type</span>=<span class="string"><span class="delimiter">"</span><span class="content">file</span><span class="delimiter">"</span></span> <span class="attribute-name">accept</span>=<span class="string"><span class="delimiter">"</span><span class="content">image/jpeg,image/png,image/gif</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
</pre></div>
</div>
</div>

<p>ユーザが選択したファイルをStorageにアップロードするには、下記のようなJavaScriptを実行します。</p>

<p><em>JavaScriptのコード例（main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const { files } = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#upload-file</span><span class="delimiter">'</span></span>)[<span class="integer">0</span>];
<span class="keyword">if</span> (files.length === <span class="integer">0</span>) {
  <span class="comment">// ファイルが選択されていないため何もせずに終了</span>
  <span class="keyword">return</span>;
}
const file = files[<span class="integer">0</span>]; <span class="comment">// 選択したファイル</span>
const fileName = file.name;

console.log(<span class="string"><span class="delimiter">'</span><span class="content">アップロード中...</span><span class="delimiter">'</span></span>);
firebase
  .storage()
  .ref(<span class="error">`</span>files/<span class="predefined">$</span>{fileName}<span class="error">`</span>)
  .put(file)
  .then(() =&gt; {
    firebase
      .storage()
      .ref(<span class="error">`</span>files/<span class="predefined">$</span>{fileName}<span class="error">`</span>)
      .getDownloadURL()
      .then((url) =&gt; {
        <span class="comment">// 引数urlにダウンロード用URLの情報が格納されている</span>
        console.log(<span class="string"><span class="delimiter">'</span><span class="content">アップロード完了:</span><span class="delimiter">'</span></span>, url);
      });
  })
  .<span class="keyword">catch</span>((error) =&gt; {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">アップロード失敗:</span><span class="delimiter">'</span></span>, error);
  });
</pre></div>
</div>
</div>

<p>上記のコードのように <code>ref()</code> で <strong>アップロード先を指定</strong> してから <code>put()</code> を呼び出すだけで、アップロードが開始されます。<code>file.name</code> はアップロード元のファイル名を表します。<code>files/${fileName}</code> のように <code>/</code> で区切ると、filesフォルダの下に保存されます。デフォルトのセキュリティ設定をした場合、ログインしているユーザのみアップロードやダウンロードが可能になっています。Realtime Databaseと同じです。</p>

<p>アップロードしたファイルは、Firebase ConsoleのStorageから確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-firebase-console-storage-2.png" alt="アップロードしたファイルの一覧"></p>
</div><div class="subsection"><h3 class="index" id="chapter-7-12">7.12 Storageからのダウンロードの概要
</h3><p>Storage上の <code>files/image.jpg</code> という場所に画像をアップロードしたと仮定します。この画像をブラウザの画面内に表示するには、まずダウンロード用のURLを取得します。次に取得したURLを <code>&lt;img src="..."&gt;</code> に指定する必要があります。ダウンロードURLを取得するには <code>getDownloadURL()</code> を呼び出します。</p>

<p><em>JavaScriptのコード例（main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 「files/image.jpg」の画像のダウンロードURLを取得</span>
firebase
  .storage()
  .ref(<span class="string"><span class="delimiter">'</span><span class="content">files/image.jpg</span><span class="delimiter">'</span></span>)
  .getDownloadURL()
  .then((url) =&gt; {
    <span class="comment">// ダウンロードURLの取得に成功した場合の処理</span>
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">url:</span><span class="delimiter">'</span></span>, url);
  })
  .<span class="keyword">catch</span>((error) =&gt; {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">ダウンロードエラー:</span><span class="delimiter">'</span></span>, error);
  });
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-7-13">7.13 書籍データの保存処理を実装する
</h3><p>書籍データを保存するための、具体的なコードを見ていきます。</p>

<p>まず、Storageに表紙画像ファイルをアップロードします。</p>

<p><em>JavaScriptのコード例（まだ main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#book-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// ..（中略）..</span>

  const <span class="predefined">$bookImage</span> = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#add-book-image</span><span class="delimiter">'</span></span>);
  const { files } = <span class="predefined">$bookImage</span>[<span class="integer">0</span>];

  <span class="keyword">if</span> (files.length === <span class="integer">0</span>) {
    <span class="comment">// ファイルが選択されていないなら何もしない</span>
    <span class="keyword">return</span>;
  }

  const file = files[<span class="integer">0</span>]; <span class="comment">// 表紙画像ファイル</span>
  const filename = file.name; <span class="comment">// 画像ファイル名</span>
  const bookImageLocation = <span class="error">`</span>book-images/<span class="predefined">$</span>{filename}<span class="error">`</span>; <span class="comment">// 画像ファイルのアップロード先</span>

  firebase
    .storage()
    .ref(bookImageLocation)
    .put(file) <span class="comment">// Storageへファイルアップロードを実行</span>
</pre></div>
</div>
</div>

<p>$bookImage変数に代入しているのは、input要素( <code>&lt;input id="add-book-image" type="file" ...&gt;</code> )を選択したjQueryオブジェクトです。<code>$bookImage[0]</code> で、input要素にアクセスしています。<code>jQueryオブジェクト[インデックス番号]</code> という形で指定すると、そのjQueryオブジェクトが持つ要素にアクセスできます。</p>

<p><code>const { files } = $bookImage[0];</code> でfiles変数に代入している値は、FileListオブジェクトです。このFileListオブジェクトの中に、選択されたファイルのデータが入っています。次に上記のコードでは <code>files[0]</code> という記述によって、選択されたファイル情報を取得しています。jQueryオブジェクトと同じように、FileListオブジェクトも <code>FileListオブジェクト[インデックス番号]</code> という形で指定すると、そのFileListオブジェクトが持つファイルデータにアクセスできます。</p>

<p>Storageへの表紙画像のアップロードに成功したら、Realtime Databaseに書籍データを保存します。Realtime Databaseに保存するのは、下記の３つでした。</p>

<ul>
  <li>書籍タイトル (<code>bookTitle</code>)</li>
  <li>表紙画像のアップロード先 (<code>profileImageLocation</code>)</li>
  <li>保存した時刻 (<code>createdAt</code>)</li>
</ul>

<p><em>JavaScriptのコード例（まだ main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  firebase
    .storage()
    .ref(bookImageLocation)
    .put(file) <span class="comment">// Storageへファイルアップロードを実行</span>
    .then(() =&gt; {
      <span class="comment">// Storageへのアップロードに成功したら、Realtime Databaseに書籍データを保存する</span>
      const bookData = {
        bookTitle,
        bookImageLocation,
        <span class="key">createdAt</span>: firebase.database.ServerValue.TIMESTAMP,
      };
      firebase
        .database()
        .ref(<span class="string"><span class="delimiter">'</span><span class="content">books</span><span class="delimiter">'</span></span>)
        .push(bookData);
    })
</pre></div>
</div>
</div>

<p>保存する値に <code>firebase.database.ServerValue.TIMESTAMP</code> を指定すると、サーバ側の時間（<code>Date.now()</code> と同等のもの）に自動的に置き換えられて保存されます。クライアント側で <code>Date.now()</code> を使ってしまうと、クライアントのPCの時間が狂っている場合にそのまま保存されてしまいます。そのためサーバの時間を使うことで、常に一貫して正しい時間を保存できます。</p>

<p>Realtime Databaseに書籍データを保存するには <code>firebase.database().ref(キー).push(値)</code> を使います。</p>

<p>前のチャプターで作った <code>setNewValue</code> の例では <code>set()</code> を使いました。しかし今回は <code>push()</code> です。なぜかというと、<code>set()</code> は単一の値を保存するには良いのですが、書籍のように複数のデータをリスト形式にして保管する場合、全てのメッセージデータを上書き（消去）してしまいます。<code>push()</code> の場合、リストに新しい書籍データを追加して保存できるようになっているので、今回の場合は <code>push()</code> を使う方が望ましいのです。</p>

<p><a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference?hl=ja#push" target="_blank">参考：push()</a></p>

<p>Realtime Databaseへの書籍データの保存に成功したら、書籍一覧画面の書籍の登録モーダルを閉じます。失敗したら、デベロッパーツールのコンソールにエラーメッセージを表示します。</p>

<p>実装は下記の通りです。このコードを <em>main.js</em> の <code>// TODO: 書籍データを保存する</code> のすぐ下に記述してください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="comment">// ..（略）..</span>

  <span class="comment">// TODO: 書籍データを保存する</span>
  firebase
    .storage()
    .ref(bookImageLocation)
    .put(file) <span class="comment">// Storageへファイルアップロードを実行</span>
    .then(() =&gt; {
      <span class="comment">// Storageへのアップロードに成功したら、Realtime Databaseに書籍データを保存する</span>
      const bookData = {
        bookTitle,
        bookImageLocation,
        <span class="key">createdAt</span>: firebase.database.ServerValue.TIMESTAMP,
      };
      <span class="keyword">return</span> firebase
        .database()
        .ref(<span class="string"><span class="delimiter">'</span><span class="content">books</span><span class="delimiter">'</span></span>)
        .push(bookData);
    })
    .then(() =&gt; {
      <span class="comment">// 書籍一覧画面の書籍の登録モーダルを閉じて、初期状態に戻す</span>
      <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#add-book-modal</span><span class="delimiter">'</span></span>).modal(<span class="string"><span class="delimiter">'</span><span class="content">hide</span><span class="delimiter">'</span></span>);
      resetAddBookModal();
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      <span class="comment">// 失敗したとき</span>
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">エラー</span><span class="delimiter">'</span></span>, error);
      resetAddBookModal();
      <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#add-book__help</span><span class="delimiter">'</span></span>)
        .text(<span class="string"><span class="delimiter">'</span><span class="content">保存できませんでした。</span><span class="delimiter">'</span></span>)
        .fadeIn();
    });
<span class="comment">// ..（略）..</span>
</pre></div>
</div>
</div>

<p>上記のコードでは <code>push（）</code> の戻り値を <code>return</code> で返しています。こうすることで、書籍データの保存に成功したときは続く <code>then()</code> が、失敗したときは <code>catch()</code> の引数に渡したコールバック関数が呼び出されます。<code>catch()</code> に渡したコールバック関数は、Storageへのファイルアップロードが失敗した場合にも呼び出されます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-7-14">7.14 保存した書籍データを一覧画面に表示する
</h3><p>先ほど、書籍データの保存処理を実装しました。今度は保存した書籍データを、書籍一覧画面に表示する処理について解説します。</p>

<p>まず本棚サイトにログインすると、下記のonLogin関数が呼び出されます。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログインした直後に呼ばれる</span>
const onLogin = () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログイン完了</span><span class="delimiter">'</span></span>);

  <span class="comment">// 書籍一覧画面を表示</span>
  showView(<span class="string"><span class="delimiter">'</span><span class="content">bookshelf</span><span class="delimiter">'</span></span>);
};
</pre></div>
</div>
</div>

<p>onLogin関数は、 showView関数を呼び出します。このとき引数として <code>'bookshelf'</code> という文字列を渡します。 <code>'bookshelf'</code> を文字列として渡したshowView関数は、書籍一覧画面を表示した後にloadBookshelfView関数を呼び出して、書籍データをサーバ（Realtime Databese）から取得します。</p>

<p>つまり、おおまかには下記の流れで処理が実行されます。</p>

<p><strong>①</strong> ユーザがログインする<br>
↓<br>
<strong>②</strong> <code>onLogin();</code><br>
↓<br>
<strong>②</strong> <code>showView('bookshelf');</code><br>
↓<br>
<strong>③</strong> <code>loadBookshelfView();</code><br>
↓<br>
<strong>④</strong> ③で取得した書籍データを、書籍一覧画面に表示する</p>

<p>上記③のloadBookshelfView関数は、下記のように実装しています。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const loadBookshelfView = () =&gt; {
  resetBookshelfView();

  <span class="comment">// 書籍データを取得</span>
  const booksRef = firebase
    .database()
    .ref(<span class="string"><span class="delimiter">'</span><span class="content">books</span><span class="delimiter">'</span></span>)
    .orderByChild(<span class="string"><span class="delimiter">'</span><span class="content">createdAt</span><span class="delimiter">'</span></span>);

  <span class="comment">// 過去に登録したイベントハンドラを削除</span>
  booksRef.off(<span class="string"><span class="delimiter">'</span><span class="content">child_added</span><span class="delimiter">'</span></span>);

  <span class="comment">// books の child_addedイベントハンドラを登録</span>
  <span class="comment">// （データベースに書籍が追加保存されたときの処理）</span>
  booksRef.on(<span class="string"><span class="delimiter">'</span><span class="content">child_added</span><span class="delimiter">'</span></span>, (bookSnapshot) =&gt; {
    const bookId = bookSnapshot.key;
    const bookData = bookSnapshot.val();

    <span class="comment">// 書籍一覧画面に書籍データを表示する</span>
    addBook(bookId, bookData);
  });
};
</pre></div>
</div>
</div>

<p><code>on()</code> で <code>value</code> ではなく <code>child_added</code> を使っていることに注目してください。 <code>value</code> はそのキーにぶら下がる値すべてを取得するものですが、<code>child_added</code> はキーにぶら下がる子が追加保存された時にその子データだけを単独で受け取るものです。書籍一覧画面から書籍を登録すると、Realtime Databaseの <code>books/</code> 以下に新しくキーと、その値として書籍データが追加保存されます。この新しく追加保存された書籍データだけを <code>child_added</code> で受け取ることができます。</p>

<p>またイベントハンドラ（コールバック関数）の登録時には、既存のすべてのデータに対してもchild_addedイベントが発生します。そのため単純に <code>child_added</code> のイベントハンドラに引数として渡される書籍データをどんどん処理していけば、一覧画面にすべての書籍データを表示できます。</p>

<div class="alert alert-info">
Realtime Databaseには他にも「データの削除時(<code>child_removed</code>)」や「データの変更時(<code>child_changed</code>)」などに発生するイベントが存在します。下記の公式ドキュメントを参照してください。<br>
<a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference?hl=ja#on" target="_blank" class="btn btn-success">参考：on() [Firebase公式ドキュメント]</a>
</div>

<p>取得した書籍データには、Storageに保存した表紙画像ファイルのアップロード先が含まれています。このアップロード先をもとに、Storageから表紙画像ファイルのURLを取得します。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 書籍の表示用のdiv（jQueryオブジェクト）を作って返す</span>
const createBookDiv = (bookId, bookData) =&gt; {

  <span class="comment">// （中略）</span>

  <span class="comment">// 書籍の表紙画像をダウンロードして表示する</span>
  downloadBookImage(bookData.bookImageLocation).then((url) =&gt; {
    displayBookImage(<span class="predefined">$divTag</span>, url);
  });

  <span class="comment">// （中略）</span>

}

<span class="comment">// 書籍の表紙画像をダウンロードする</span>
const downloadBookImage = bookImageLocation =&gt; firebase
  .storage()
  .ref(bookImageLocation)
  .getDownloadURL() <span class="comment">// book-images/abcdef のようなパスから画像のダウンロードURLを取得</span>
  .<span class="keyword">catch</span>((error) =&gt; {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">写真のダウンロードに失敗:</span><span class="delimiter">'</span></span>, error);
  });

<span class="comment">// 書籍の表紙画像を表示する</span>
const displayBookImage = (<span class="predefined">$divTag</span>, url) =&gt; {
  <span class="predefined">$divTag</span>.find(<span class="string"><span class="delimiter">'</span><span class="content">.book-item__image</span><span class="delimiter">'</span></span>).attr({
    <span class="key">src</span>: url,
  });
};
</pre></div>
</div>
</div>

<p>main.jsに実装されている以上のコードについて確認できたら、書籍一覧画面から書籍の登録をしてみましょう。</p>

<p>登録したら下記のように、書籍データが表示されるか確認してください。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/book-list_add-test.png" alt=""></p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-baas-mid">課題：削除機能の追加</h3><div class="alert alert-danger">
<i>firebase-tutorial</i> および <i>bookshelf</i> の内容の学習／作成が完了してから当課題に取り組んでください。
</div>

<div class="alert alert-info">
途中までHTML/CSS/JavaScriptをコーディングしているファイル一式を用意していますので、ダウンロードして取り組んでください。<br>
<a class="btn btn-success" href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/bookshelf-with-deletion.zip">ひな形のプロジェクトファイル一式をダウンロードする</a>
</div>

<p>ここまで完成したところで、次は課題として「削除機能」を追加しましょう。そのために必要なコードを途中まで記述したファイル一式を用意しました。上記の緑色のボタンからダウンロードしたzipファイルを解凍し、現れた <code>bookshelf-with-deletion</code> フォルダをCloud9のワークスペース直下にアップロードしてください。また <em>index.html</em> にあるFirebaseの設定情報の部分を先ほどと同じように変更してください。</p>

<h4>内容</h4>

<p><code>bookshelf-with-deletion</code> にあるファイルのうち、<em>index.html</em> と <em>main.css</em> は完成しています。<em>main.js</em> も一部完成していますが、<code>TODO:</code> と記述された部分が計2ヶ所あります。</p>

<ul>
  <li><code>// TODO: 書籍一覧画面から該当の書籍データを削除する</code></li>
  <li><code>// TODO: books から該当の書籍データを削除</code></li>
</ul>

<p>この2ヶ所にコードを記述し、書籍データの削除機能を追加しましょう。</p>

<p>下記の仕様を満たして下さい。</p>

<h4>仕様</h4>

<ul>
  <li>書籍一覧画面で表示されている書籍データ下部に、削除ボタンがあります。このボタンをクリックしたときに、FirebaseのRealtime Databaseから該当の書籍データを削除してください。（storage上の画像ファイルを削除する必要はありません。）</li>
  <li>Realtime Databaseの書籍データが削除されたら、書籍一覧画面からも該当の書籍データを削除してください。</li>
</ul>
</div></section><section id="chapter-8"><h2 class="index">8. リアルタイムチャットを作ろう
</h2><div class="subsection"><p>このチャプターでは、リアルタイムチャットを制作します。リアルタイムチャットは、複数人が使える前提にします。また本レッスンでは、下記の機能を満たすものを作ります。</p>

<ul>
  <li>複数人でのグループチャット</li>
  <li>メールアドレスとパスワードでログイン</li>
  <li>ログインするとデフォルトのチャットルームに入る</li>
  <li>ルームは自由に作成・削除可能。ただしデフォルトのルームは削除不可。</li>
  <li>ログインしているユーザはすべてのルームを閲覧でき、自由に発言できる</li>
  <li>ユーザが自分のニックネームとプロフィール写真を設定できる</li>
  <li>投稿されたメッセージをお気に入りとして追加できる（お気に入り機能は提出課題として作成してもらいます）</li>
</ul>

<p>最初からこの仕様すべてに固執しないでください。このようなWebサービスを作成するときは、できるところから徐々に機能追加して、大きくすることが大切です。いきなり完成形を目指そうとすると、掴みどころがわからず、挫折するだけです。以降の内容を焦らずに読み進めつつ、サンプルコードを入力していき、リアルタイムチャットを完成させましょう！</p>

<p>まず、リアルタイムチャットの土台とするHTML/CSS/JavaScriptのファイル一式を下記からダウンロードしてください。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/realtime-chat.zip">リアルタイムチャットのファイル一式</a></li>
</ul>

<p><em>index.html</em>を開いて、下記のFirebaseのセットアップコードをご自分のものに置き換えてください。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>  <span class="comment">&lt;!-- Firebaseのセットアップコード（下記のSDKのバージョンは6.2.0） --&gt;</span>

  <span class="comment">&lt;!-- 中略 --&gt;</span>

  <span class="comment">&lt;!-- apiKeyなどは、ご自身の環境のものに合わせてください --&gt;</span>
  <span class="tag">&lt;script&gt;</span>
<span class="inline">    <span class="comment">// Your web app's Firebase configuration</span>
    const firebaseConfig = {
      <span class="key">apiKey</span>: <span class="string"><span class="delimiter">"</span><span class="content">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span><span class="delimiter">"</span></span>,
      <span class="key">authDomain</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxxx.firebaseapp.com</span><span class="delimiter">"</span></span>,
      <span class="key">databaseURL</span>: <span class="string"><span class="delimiter">"</span><span class="content">https://realtime-chat-xxxxx.firebaseio.com</span><span class="delimiter">"</span></span>,
      <span class="key">projectId</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxx</span><span class="delimiter">"</span></span>,
      <span class="key">storageBucket</span>: <span class="string"><span class="delimiter">"</span><span class="content">realtime-chat-xxxxx.appspot.com</span><span class="delimiter">"</span></span>,
    };
    <span class="comment">// Initialize Firebase</span>
    firebase.initializeApp(firebaseConfig);</span>
  <span class="tag">&lt;/script&gt;</span>
</pre></div>
</div>
</div>

<div class="alert alert-danger">
本レッスンの提出課題は、このチャプターで作成した <i>realtime-chat</i> に機能を追加することがテーマです。<strong>このチャプターの内容を学習／作成しないと、提出課題に進んでも、何をどうしたら良いか見当がつかなくなる</strong>ので、必ず手を動かして学習してください。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-1">8.1 どのようにメッセージをデータとして保存するかを考える（データベース設計）
</h3><p>多機能なアプリを作るときは、まずデータ構造を考えます。前のチャプターでも解説したとおり、Realtime Databaseでは、JSON形式でデータが保存されます。</p>

<p>Web APIのレッスンを思い出してください。Flickr APIを使って、画像検索の結果をJSON文字列で取得しました。</p>

<div class="language-json highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key"><span class="delimiter">"</span><span class="content">photos</span><span class="delimiter">"</span></span>:
    {<span class="key"><span class="delimiter">"</span><span class="content">page</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">pages</span><span class="delimiter">"</span></span>:<span class="integer">25914</span>,<span class="key"><span class="delimiter">"</span><span class="content">perpage</span><span class="delimiter">"</span></span>:<span class="integer">12</span>,<span class="key"><span class="delimiter">"</span><span class="content">total</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">310967</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">photo</span><span class="delimiter">"</span></span>:
      [{<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8300920648</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">28145073@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">d4a21bba59</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8501</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">9</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Cat</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Moyan_Brenn</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">15867520885</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">119678691@N02</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">69d04f6ecc</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">7560</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">8</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Cat</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">be creator</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5542263437</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">28145073@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">c22cc3556d</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5133</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">6</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Cat</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Moyan_Brenn</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5368592502</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">33152876@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">0146792803</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5166</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">6</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Truffles say's Happy Whisker Wednesday !</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Trish Hamme</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5580736191</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">33152876@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">e1d8e99850</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5251</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">6</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">For My Jackie , Happy Caturday :)</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Trish Hamme</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">7914426490</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">35004203@N00</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">bf708f9887</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8437</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">9</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="char">\u83c7</span><span class="char">\u5695</span><span class="char">\u5695</span><span class="char">\u53c8</span><span class="char">\u6709</span><span class="char">\u65b0</span><span class="char">\u73a9</span><span class="char">\u5177</span><span class="char">\uff01</span><span class="char">\uff1f</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">*</span><span class="char">\u561f</span><span class="char">\u561f</span><span class="char">\u561f</span><span class="content">*</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">3372925208</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">12836528@N00</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">edac7cf91b</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">3455</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">4</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Cat</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">kevin dooley</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5301543153</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">33152876@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">21ed6d70d9</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5083</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">6</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">The Last Whisker Wednesday   ~~~~ of the year :)</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Trish Hamme</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">14212638611</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8659835@N04</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8c13ca18d7</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5484</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">6</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">#cat #mezcal</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">PhiRequiem</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5904375813</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">33152876@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">c709b843bc</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">6054</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">7</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Open wide and say Ahhhhh ~ ~ ~ Explore # 189</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Trish Hamme</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5537278912</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">33152876@N08</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">7af1551479</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">5211</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">6</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Happy Furry Friday</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">Trish Hamme</span><span class="delimiter">"</span></span>},
      {<span class="key"><span class="delimiter">"</span><span class="content">id</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8601243388</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">owner</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">59860013@N06</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">secret</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">d5494100a4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">server</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">8369</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">farm</span><span class="delimiter">"</span></span>:<span class="integer">9</span>,<span class="key"><span class="delimiter">"</span><span class="content">title</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="char">\u4e09</span><span class="char">\u8173</span><span class="char">\u9f0e</span><span class="char">\u7acb</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ispublic</span><span class="delimiter">"</span></span>:<span class="integer">1</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfriend</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">isfamily</span><span class="delimiter">"</span></span>:<span class="integer">0</span>,<span class="key"><span class="delimiter">"</span><span class="content">license</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,<span class="key"><span class="delimiter">"</span><span class="content">ownername</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">hyakushiki_thebest</span><span class="delimiter">"</span></span>}]
    },
  <span class="key"><span class="delimiter">"</span><span class="content">stat</span><span class="delimiter">"</span></span>:<span class="string"><span class="delimiter">"</span><span class="content">ok</span><span class="delimiter">"</span></span>
}
</pre></div>
</div>
</div>

<p>上記のJSONデータは、下記のような階層構造になっています。</p>

<ul>
  <li>photos
    <ul>
      <li>page</li>
      <li>pages</li>
      <li>perpage</li>
      <li>total</li>
      <li>photo
        <ul>
          <li>id</li>
          <li>owner</li>
          <li>secret</li>
          <li>server</li>
          <li>farm</li>
          <li>title</li>
          <li>ispublic</li>
          <li>isfriend</li>
          <li>isfamily</li>
          <li>license</li>
          <li>ownername</li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

<p>同じように、今回のリアルタイムチャットで使うデータベースも階層構造にします。</p>

<p>まず、チャットの発言はルームごとにメッセージ一覧がぶら下がる形にします。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key">messages</span>: {
    <span class="key"><span class="delimiter">"</span><span class="content">room1</span><span class="delimiter">"</span></span>: [ <span class="comment">// room1内の発言一覧</span>
      {
        <span class="key">text</span>: <span class="string"><span class="delimiter">"</span><span class="content">こんにちは</span><span class="delimiter">"</span></span>, <span class="comment">// 発言本文</span>
        <span class="key">time</span>: <span class="integer">1234567890</span>, <span class="comment">// 発言時刻（firebase.database.ServerValue.TIMESTAMPで取得）</span>
        <span class="key">uid</span>: <span class="string"><span class="delimiter">"</span><span class="content">xxxxxx...</span><span class="delimiter">"</span></span>,   <span class="comment">// 発言したユーザのID</span>
      },
      {
        <span class="key">text</span>: <span class="string"><span class="delimiter">"</span><span class="content">お元気ですか</span><span class="delimiter">"</span></span>,
        <span class="key">time</span>: <span class="integer">1234577890</span>,
        <span class="key">uid</span>: <span class="string"><span class="delimiter">"</span><span class="content">xxxxxx...</span><span class="delimiter">"</span></span>,
      },
      ...
    ],
    <span class="key"><span class="delimiter">"</span><span class="content">room2</span><span class="delimiter">"</span></span>: [ <span class="comment">// room2内の発言一覧</span>
      ...
    ],
    <span class="key"><span class="delimiter">"</span><span class="content">default</span><span class="delimiter">"</span></span>: [ <span class="comment">// default内の発言一覧</span>
      ...
    ],
    ...
  },
}
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-messages-structure.png" alt="メッセージの構造イメージ"></p>

<p>なお、ルーム作成の機能はリアルタイムチャット制作の後半で行います。最初から「ルーム」まで一緒に考えると話が難しくなるので、最初は「デフォルト」のルームのみに投稿するという前提で構築をしていくと、やりやすいでしょう。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-messages-structure2.png" alt="デフォルトルームのみ最初は考える"></p>

<p>また、ユーザ情報を保存するツリーを作り、UIDをキーにしてニックネームやプロフィール画像などのデータを保存しましょう。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key">users</span>: {
    <span class="key"><span class="delimiter">"</span><span class="content">xxxxxx...</span><span class="delimiter">"</span></span>: { <span class="comment">// UID</span>
      <span class="key">nickname</span>: <span class="string"><span class="delimiter">"</span><span class="content">たろう</span><span class="delimiter">"</span></span>, <span class="comment">// ニックネーム</span>
      <span class="key">profileImageLocation</span>: <span class="string"><span class="delimiter">"</span><span class="content">profile-images/xxxxxx...</span><span class="delimiter">"</span></span>, <span class="comment">// プロフィール画像の場所</span>
      <span class="key">createdAt</span>: <span class="integer">1234567890</span>, <span class="comment">// 作成時刻</span>
      <span class="key">updatedAt</span>: <span class="integer">1234568890</span>, <span class="comment">// 更新時刻</span>
    },
    <span class="key"><span class="delimiter">"</span><span class="content">yyyyyy...</span><span class="delimiter">"</span></span>: {
      <span class="key">nickname</span>: <span class="string"><span class="delimiter">"</span><span class="content">はなこ</span><span class="delimiter">"</span></span>,
      <span class="key">profileImageLocation</span>: <span class="string"><span class="delimiter">"</span><span class="content">profile-images/yyyyyy...</span><span class="delimiter">"</span></span>,
      <span class="key">createdAt</span>: <span class="integer">1234577890</span>,
      <span class="key">updatedAt</span>: <span class="integer">1234578890</span>,
    },
  },
}
</pre></div>
</div>
</div>

<p>さらに、ルーム一覧を別のツリーに保存します。勘のいい方は、ルーム一覧が必要でないことに気付かれたでしょうか。messagesツリーにルーム名がキーとして入っているので、わざわざ別個にデータを用意しなくても、messagesから取得できます。</p>

<p>FirebaseのRealtime Databaseでは、できるだけフラットなデータ構造にすることが望ましいとされています。言い換えれば、あまり深い階層を作ってはいけません。その理由は、データを取り出すときにその子となるデータもすべて一緒に付いてくるため、階層が深いと1回に取り出すデータが膨大になってしまう危険性があるからです。</p>

<p>messagesにはルームごとにすべての発言内容が蓄積されていくため、ユーザが増えて時間が経つと大変なデータ量になります。たとえば100人のユーザと10個のルームがあり、1ルームごとに1日1回の発言を全ユーザが3ヶ月半繰り返すと、全体で10万ものメッセージ数になります。これだけの量をいっぺんに取得するのはブラウザとFirebaseサーバの両方に多大な負荷がかかります。</p>

<p>そこで、今回作成するアプリではmessagesツリー全体を取得しないというアプローチを採用します。Firebaseでは好きな位置から子ツリーを読み出すことができるので、たとえばmessagesツリー内のroom1内のメッセージ一覧だけを取得できます。これはmessagesツリー全体を取得するのに比べて遥かに軽い負荷で済みます。といっても、それでもまだ1ルームあたり1万メッセージを一気に取得する計算になります。さらに軽量化するにはメッセージの最新何件だけを取得するなどの工夫が必要です。</p>

<p>最終的に、ルーム一覧を保存するroomsツリーは下記の構造になります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key">rooms</span>: {
    <span class="key"><span class="delimiter">"</span><span class="content">room1</span><span class="delimiter">"</span></span>: {
      <span class="key">createdAt</span>: <span class="integer">1234567890</span>,     <span class="comment">// 作成時刻</span>
      <span class="key">createdByUID</span>: <span class="string"><span class="delimiter">"</span><span class="content">xxxxxx...</span><span class="delimiter">"</span></span>, <span class="comment">// 作成したユーザID</span>
    },
    <span class="key"><span class="delimiter">"</span><span class="content">room2</span><span class="delimiter">"</span></span>: {
      <span class="key">createdAt</span>: <span class="integer">1234577890</span>,
      <span class="key">createdByUID</span>: <span class="string"><span class="delimiter">"</span><span class="content">yyyyyy...</span><span class="delimiter">"</span></span>,
    },
    ...
  },
}
</pre></div>
</div>
</div>

<p>messages、users、roomsという3つの大きなツリーを作ればよいことがわかりました。これでデータ構造は完成です。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-2">8.2 ログイン処理の概要
</h3><p>本棚サイトと同じく、リアルタイムチャットもメールアドレスとパスワードでログインする仕組みにします。ログイン画面のHTMLはすでにできていますので、ログイン処理だけJavaScriptで作っていきましょう。</p>

<p>前のチャプターで学習した本棚サイトは、自分だけが利用できるように実装しました。リアルタイムチャットでは、複数のユーザが利用できるように実装します。ログインを試みて、該当ユーザが存在しない場合は新しくユーザを作成するようにします。</p>

<h4>ユーザを新規作成する</h4>

<p>ユーザを作成するには <code>firebase.auth().createUserWithEmailAndPassword()</code> を呼び出します。</p>

<p><a href="https://firebase.google.com/docs/reference/js/firebase.auth.Auth?hl=ja#createUserWithEmailAndPassword" target="_blank">参考：createUserWithEmailAndPassword()</a></p>

<p><em>JavaScriptのコード例（まだ main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const email = <span class="string"><span class="delimiter">'</span><span class="content">user1@example.com</span><span class="delimiter">'</span></span>; <span class="comment">// ログインに使うメールアドレス</span>
const password = <span class="string"><span class="delimiter">'</span><span class="content">password1</span><span class="delimiter">'</span></span>; <span class="comment">// 設定するパスワード</span>

firebase
  .auth()
  .createUserWithEmailAndPassword(email, password)
  .then(() =&gt; {
    console.log(<span class="string"><span class="delimiter">'</span><span class="content">ユーザ作成に成功</span><span class="delimiter">'</span></span>);
  })
  .<span class="keyword">catch</span>((error) =&gt; {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">ユーザ作成に失敗:</span><span class="delimiter">'</span></span>, error);
  });
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-3">8.3 ログイン処理を実装する
</h3><p>main.jsに <code>TODO: ログインを試みて該当ユーザが存在しない場合は新規作成する</code> と書かれたコメントがあります。そのコメントのとおり「ログインを試みて該当ユーザが存在しない場合は新規作成する」コードを、この部分に書きます。index.htmlをブラウザで開いてメールアドレスとパスワードを入力し、ログインボタンを押すとTODO部分が実行されます。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログインフォームが送信されたらログインする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  e.preventDefault();

  <span class="comment">// フォームを初期状態に戻す</span>
  resetLoginForm();

  <span class="comment">// ログインボタンを押せないようにする</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login__submit-button</span><span class="delimiter">'</span></span>)
    .prop(<span class="string"><span class="delimiter">'</span><span class="content">disabled</span><span class="delimiter">'</span></span>, <span class="predefined-constant">true</span>)
    .text(<span class="string"><span class="delimiter">'</span><span class="content">送信中…</span><span class="delimiter">'</span></span>);

  const email = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-email</span><span class="delimiter">'</span></span>).val();
  const password = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-password</span><span class="delimiter">'</span></span>).val();

  <span class="comment">// TODO: ログインを試みて該当ユーザが存在しない場合は新規作成する</span>

});
</pre></div>
</div>
</div>

<p>今回は入力されたメールアドレスとパスワードでログインを試み、ユーザが存在しなければ自動でユーザ登録する仕組みにします。</p>

<p>ユーザが存在しない場合、<code>catch()</code>のコールバック関数で<code>error.code</code>に<code>auth/user-not-found</code>という値が入ってくるので、<code>if</code>で判定してユーザ作成を行います。実装は下記のようになります。<code>// まずはログインを試みる</code> と書かれた部分のコードを <em>main.js</em> の <code>// TODO: ログインを試みて...</code> のすぐ下に記述してください。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ログインフォームが送信されたらログインする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {

  <span class="comment">// ..（中略）..</span>

  const email = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-email</span><span class="delimiter">'</span></span>).val();
  const password = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#login-password</span><span class="delimiter">'</span></span>).val();

  <span class="comment">// TODO: ログインを試みて該当ユーザが存在しない場合は新規作成する</span>
  <span class="comment">// まずはログインを試みる</span>
  firebase
    .auth()
    .signInWithEmailAndPassword(email, password)
    .<span class="keyword">catch</span>((error) =&gt; {
      console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログイン失敗:</span><span class="delimiter">'</span></span>, error);
      <span class="keyword">if</span> (error.code === <span class="string"><span class="delimiter">'</span><span class="content">auth/user-not-found</span><span class="delimiter">'</span></span>) {
        <span class="comment">// 該当ユーザが存在しない場合は新規作成する</span>
        firebase
          .auth()
          .createUserWithEmailAndPassword(email, password)
          .then(() =&gt; {
            <span class="comment">// 作成成功</span>
            console.log(<span class="string"><span class="delimiter">'</span><span class="content">ユーザを作成しました</span><span class="delimiter">'</span></span>);
          })
          .<span class="keyword">catch</span>(catchErrorOnCreateUser);
      } <span class="keyword">else</span> {
        catchErrorOnSignIn(error);
      }
    });
});
</pre></div>
</div>
</div>

<p>たとえば、下記のようなユーザを登録してみてください。</p>

<ul>
  <li>メールアドレス：<code>user1@example.com</code></li>
  <li>パスワード：<code>password1</code></li>
</ul>

<p>デベロッパーツールのコンソールを開いて、ユーザ作成に成功したか見てみましょう。なお、作成したユーザの一覧はFirebase ConsoleのAuthの「ユーザー」タブで確認できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-4">8.4 ログインしたらチャット画面に移動する
</h3><p>ログインしたらチャット画面へ移動するようにしています。<code>onAuthStateChanged()</code> でログイン状態を検知して <code>showView('chat')</code> を呼び出すことで、チャット画面に移動します。コードの見通しを良くするため<code>onLogin()</code>という関数を作っています。</p>

<p>下記のコードは既に <em>main.js</em> に実装済みです。実際に該当部分のコードを確認してみてください。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 現在ログインしているユーザID</span>
let currentUID;

<span class="comment">// （中略）</span>

<span class="comment">// ログインした直後に呼ばれる</span>
const onLogin = () =&gt; {
  console.log(<span class="string"><span class="delimiter">'</span><span class="content">ログイン完了</span><span class="delimiter">'</span></span>);

  <span class="comment">// チャット画面を表示</span>
  showView(<span class="string"><span class="delimiter">'</span><span class="content">chat</span><span class="delimiter">'</span></span>);
};

<span class="comment">// （中略）</span>

<span class="comment">// ログイン状態の変化を監視する</span>
firebase.auth().onAuthStateChanged((user) =&gt; {
  <span class="comment">// ログイン状態が変化した</span>

  <span class="keyword">if</span> (user) {
    <span class="comment">// ログイン済</span>
    currentUID = user.uid;
    onLogin();
  } <span class="keyword">else</span> {
    <span class="comment">// 未ログイン</span>
    currentUID = <span class="predefined-constant">null</span>;
    onLogout();
  }
});
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-5">8.5 チャット画面の表示
</h3><p><code>showView('chat')</code> でチャット画面を表示した後に <code>loadChatView()</code> が呼び出され、チャットデータをサーバから取得して表示しています。<em>main.js</em> ではすでにコードが完成していますが、内容としてはusersとroomsの各データをサーバから取得して、2つのデータが揃った時点で<code>showCurrentRoom()</code> を呼び出して発言内容をすべて表示しています。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// 現在表示しているルーム名</span>
let currentRoomName = <span class="predefined-constant">null</span>;

<span class="comment">// （中略）</span>

<span class="comment">// Firebaseから取得したデータを一時保存しておくための変数</span>
let dbdata = {};

<span class="comment">// （中略）</span>

<span class="comment">// チャット画面の初期化処理</span>
const loadChatView = () =&gt; {
  resetChatView();

  dbdata = {}; <span class="comment">// キャッシュデータを空にする</span>

  <span class="comment">// ユーザ一覧を取得してさらに変更を監視</span>
  const usersRef = firebase.database().ref(<span class="string"><span class="delimiter">'</span><span class="content">users</span><span class="delimiter">'</span></span>);
  <span class="comment">// 過去に登録したイベントハンドラを削除</span>
  usersRef.off(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>);
  <span class="comment">// イベントハンドラを登録</span>
  usersRef.on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (usersSnapshot) =&gt; {
    <span class="comment">// usersに変更があるとこの中が実行される</span>

    dbdata.users = usersSnapshot.val();

    <span class="comment">// 自分のユーザデータが存在しない場合は作成</span>
    <span class="keyword">if</span> (dbdata.users === <span class="predefined-constant">null</span> || !dbdata.users[currentUID]) {
      const { currentUser } = firebase.auth();
      <span class="keyword">if</span> (currentUser) {
        console.log(<span class="string"><span class="delimiter">'</span><span class="content">ユーザデータを作成します</span><span class="delimiter">'</span></span>);
        firebase
          .database()
          .ref(<span class="error">`</span>users/<span class="predefined">$</span>{currentUID}<span class="error">`</span>)
          .set({
            <span class="key">nickname</span>: currentUser.email,
            <span class="key">createdAt</span>: firebase.database.ServerValue.TIMESTAMP,
            <span class="key">updatedAt</span>: firebase.database.ServerValue.TIMESTAMP,
          });

        <span class="comment">// このコールバック関数が再度呼ばれるのでこれ以上は処理しない</span>
        <span class="keyword">return</span>;
      }
    }

    Object.keys(dbdata.users).forEach((uid) =&gt; {
      updateNicknameDisplay(uid);
      downloadProfileImage(uid);
    });

    <span class="comment">// usersとroomsが揃ったらルームを表示（初回のみ）</span>
    <span class="keyword">if</span> (currentRoomName === <span class="predefined-constant">null</span> &amp;&amp; dbdata.rooms) {
      showCurrentRoom();
    }
  });

  <span class="comment">// ルーム一覧を取得してさらに変更を監視</span>
  const roomsRef = firebase.database().ref(<span class="string"><span class="delimiter">'</span><span class="content">rooms</span><span class="delimiter">'</span></span>);

  <span class="comment">// 過去に登録したイベントハンドラを削除</span>
  roomsRef.off(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>);

  <span class="comment">// コールバックを登録</span>
  roomsRef.on(<span class="string"><span class="delimiter">'</span><span class="content">value</span><span class="delimiter">'</span></span>, (roomsSnapshot) =&gt; {
    <span class="comment">// roomsに変更があるとこの中が実行される</span>

    dbdata.rooms = roomsSnapshot.val();

    <span class="comment">// 初期ルームが存在しない場合は作成する</span>
    <span class="keyword">if</span> (dbdata.rooms === <span class="predefined-constant">null</span> || !dbdata.rooms[defaultRoomName]) {
      console.log(<span class="error">`</span><span class="predefined">$</span>{defaultRoomName}<span class="error">ル</span><span class="error">ー</span><span class="error">ム</span><span class="error">を</span><span class="error">作</span><span class="error">成</span><span class="error">し</span><span class="error">ま</span><span class="error">す</span><span class="error">`</span>);
      firebase
        .database()
        .ref(<span class="error">`</span>rooms/<span class="predefined">$</span>{defaultRoomName}<span class="error">`</span>)
        .setWithPriority(
          {
            <span class="key">createdAt</span>: firebase.database.ServerValue.TIMESTAMP,
            <span class="key">createdByUID</span>: currentUID,
          },
          <span class="integer">1</span>,
        );

      <span class="comment">// このコールバック関数が再度呼ばれるのでこれ以上は処理しない</span>
      <span class="keyword">return</span>;
    }

    <span class="comment">// ルーム一覧をナビゲーションメニューに表示</span>
    showRoomList(roomsSnapshot);

    <span class="comment">// usersデータがまだ来ていない場合は何もしない</span>
    <span class="keyword">if</span> (!dbdata.users) {
      <span class="keyword">return</span>;
    }

    showCurrentRoom();
  });
};
</pre></div>
</div>
</div>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// チャット画面表示用のデータが揃った時に呼ばれる</span>
const showCurrentRoom = () =&gt; {
  <span class="keyword">if</span> (currentRoomName) {
    <span class="keyword">if</span> (!dbdata.rooms[currentRoomName]) {
      <span class="comment">// 現在いるルームが削除されたため初期ルームに移動</span>
      changeLocationHash(defaultRoomName);
    }
  } <span class="keyword">else</span> {
    <span class="comment">// ページロード直後の場合</span>
    const { hash } = window.location;
    <span class="keyword">if</span> (hash) {
      <span class="comment">// URLの#以降がある場合はそのルームを表示</span>
      const roomName = decodeURIComponent(hash.substring(<span class="integer">1</span>));
      <span class="keyword">if</span> (dbdata.rooms[roomName]) {
        showRoom(roomName);
      } <span class="keyword">else</span> {
        <span class="comment">// ルームが存在しないので初期ルームを表示</span>
        changeLocationHash(defaultRoomName);
      }
    } <span class="keyword">else</span> {
      <span class="comment">// #指定がないので初期ルームを表示</span>
      changeLocationHash(defaultRoomName);
    }
  }
};
</pre></div>
</div>
</div>

<p>ルームを実際に表示する処理は、showRoom関数に入っています。</p>

<p><em>main.js（実装済みのため、追記や変更は不要です）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ルームを実際に表示する</span>
const showRoom = (roomName) =&gt; {
  <span class="keyword">if</span> (!dbdata.rooms || !dbdata.rooms[roomName]) {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">該当するルームがありません:</span><span class="delimiter">'</span></span>, roomName);
    <span class="keyword">return</span>;
  }
  currentRoomName = roomName;
  clearMessages();

  <span class="comment">// ルームのメッセージ一覧をダウンロードし、かつメッセージの追加を監視</span>
  const roomRef = firebase.database().ref(<span class="error">`</span>messages/<span class="predefined">$</span>{roomName}<span class="error">`</span>);

  <span class="comment">// 過去に登録したイベントハンドラを削除</span>
  roomRef.off(<span class="string"><span class="delimiter">'</span><span class="content">child_added</span><span class="delimiter">'</span></span>);

  <span class="comment">// イベントハンドラを登録</span>
  roomRef.on(<span class="string"><span class="delimiter">'</span><span class="content">child_added</span><span class="delimiter">'</span></span>, (childSnapshot) =&gt; {
    <span class="keyword">if</span> (roomName === currentRoomName) {
      <span class="comment">// 追加されたメッセージを表示</span>
      addMessage(childSnapshot.key, childSnapshot.val());
    }
  });

  <span class="comment">// ナビゲーションバーのルーム表示を更新</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">.room-list-menu</span><span class="delimiter">'</span></span>).text(<span class="error">`</span><span class="error">ル</span><span class="error">ー</span><span class="error">ム</span>: <span class="predefined">$</span>{roomName}<span class="error">`</span>);

  <span class="comment">// 初期ルームの場合はルーム削除メニューを無効にする</span>
  <span class="keyword">if</span> (roomName === defaultRoomName) {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#delete-room-menuitem</span><span class="delimiter">'</span></span>).addClass(<span class="string"><span class="delimiter">'</span><span class="content">disabled</span><span class="delimiter">'</span></span>);
  } <span class="keyword">else</span> {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#delete-room-menuitem</span><span class="delimiter">'</span></span>).removeClass(<span class="string"><span class="delimiter">'</span><span class="content">disabled</span><span class="delimiter">'</span></span>);
  }

  <span class="comment">// ナビゲーションのドロップダウンメニューで現在のルームをハイライトする</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#room-list &gt; a</span><span class="delimiter">'</span></span>).removeClass(<span class="string"><span class="delimiter">'</span><span class="content">active</span><span class="delimiter">'</span></span>);
  <span class="predefined">$</span>(<span class="error">`</span>.room-list__link[href=<span class="string"><span class="delimiter">'</span><span class="content">#${roomName}</span><span class="delimiter">'</span></span>]<span class="error">`</span>).addClass(<span class="string"><span class="delimiter">'</span><span class="content">active</span><span class="delimiter">'</span></span>);
};
</pre></div>
</div>
</div>

<p>本棚サイトでも見たように、ここでも <code>on()</code> で <code>value</code> の代わりに <code>child_added</code> を使っていることに注目してください。メッセージが投稿されると <code>messages/ルーム名/</code> 以下に新しくキーが追加され、イベントハンドラの引数には新しく投稿されたメッセージデータが渡されます。</p>

<p>またイベントハンドラの登録時には、既存のすべてのデータに対してもchild_addedイベントが発生します。そのため単純に <code>child_added</code> のイベントハンドラに引数として渡されるメッセージをどんどん追加表示していけば、ルーム内の全メッセージを表示できます。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-6">8.6 メッセージの投稿処理
</h3><p><code>messages/ルーム名</code> 以下は配列のような構造になっています。ここにデータを追加するには <code>firebase.database().ref(キー).push(値)</code> を使います。</p>

<p>本棚サイトの書籍データと同様に、今回も <code>push()</code> を使います。なぜかというと、複数のメッセージデータをリスト形式にして保存したいからです。</p>

<p><a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference?hl=ja#push" target="_blank">参考：push()</a></p>

<p><em>JavaScriptのコード例（まだ main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const message = {
  <span class="key">uid</span>: currentUID,
  <span class="key">text</span>: <span class="string"><span class="delimiter">'</span><span class="content">メッセージ本文</span><span class="delimiter">'</span></span>,
  <span class="key">time</span>: firebase.database.ServerValue.TIMESTAMP,
};

firebase
  .database()
  .ref(<span class="error">`</span>messages/<span class="predefined">$</span>{currentRoomName}<span class="error">`</span>)
  .push(message);
</pre></div>
</div>
</div>

<p>このコードにより <code>messages/${currentRoomName}</code> の下にデータが追加されます。データが追加されると、先ほど出てきた <code>child_added</code> が呼ばれてメッセージが表示されます。</p>

<p>以上の内容をもとに、リアルタイムチャットにメッセージ投稿の機能を実装しましょう。main.jsに <code>TODO: メッセージを投稿する</code> というコメント部分があります。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#comment-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  <span class="comment">// ..（中略）..</span>

  <span class="comment">// TODO: メッセージを投稿する</span>

});
</pre></div>
</div>
</div>

<p>この <code>// TODO: メッセージを投稿する</code> の下に、先ほどの <code>push()</code> のコード例を参考にして、メッセージが投稿されるようにしてみましょう。（ヒント：メッセージ本文は <code>comment</code> 変数に入っています。）</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-7">8.7 ルームの作成
</h3><p>ルームを作成するときは <code>rooms/ルーム名</code> というキーを作成します。Firebaseのキーにはpriorityという概念があり、読み出すときにpriorityの数値の小さいものが順序的に先頭の方になります。今回はdefaultルームを最初に表示したいので、別の箇所で、priority=1でdefaultルームを作っておき、ユーザが自由に作成するルームはすべてpriority=2としています。priorityは <code>firebase.database().ref(キー).setWithPriority()</code> の第2引数でセットします。</p>

<p><a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference?hl=ja#setWithPriority" target="_blank">参考：setWithPriority()</a></p>

<p><em>JavaScriptのコード例（まだ main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ルーム作成処理</span>
<span class="comment">// priorityを2にすることで初期ルーム（priority=1）より順番的に後になる</span>
firebase
  .database()
  .ref(<span class="error">`</span>rooms/<span class="predefined">$</span>{roomName}<span class="error">`</span>)
  .setWithPriority(
    {
      <span class="key">createdAt</span>: firebase.database.ServerValue.TIMESTAMP,
      <span class="key">createdByUID</span>: currentUID,
    },
    <span class="integer">2</span>,
  )
  .then(() =&gt; {
    <span class="comment">// ルーム作成に成功した場合の処理</span>
  })
  .<span class="keyword">catch</span>((error) =&gt; {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">ルーム作成に失敗:</span><span class="delimiter">'</span></span>, error);
  });
</pre></div>
</div>
</div>

<p>ルームを作成するとroomsのイベントハンドラ（<code>firebase.database().ref("rooms").on()</code> のコールバック関数）が呼ばれ、自動的にルームメニューが更新されます。</p>

<p>メニューからルームの作成ができるようにし、ルーム名をそのままRealtime Databaseのキーとして登録しています。なお、Realtime Databaseのキーに使える文字列には制約があります。</p>

<ul>
  <li><code>. $ # [ ] /</code> はキーの名前に設定できない</li>
  <li>既に登録されているキーと同じ文字列は登録できない</li>
  <li>キーの長さは768バイトまで（UTF-8では日本語256文字。あまり長いルーム名を入力されても困るので今回は20文字に制限しています）</li>
</ul>

<p><em>main.js</em> に、下記のようなTODO部分があります。上記の制限に対するチェックは既に実装済みです。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// ルーム作成フォームが送信されたらルームを作成</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room-form</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">submit</span><span class="delimiter">'</span></span>, (e) =&gt; {
  const roomName = <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#room-name</span><span class="delimiter">'</span></span>)
    .val()
    .trim();; <span class="comment">// 頭とお尻の空白文字を除去</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#room-name</span><span class="delimiter">'</span></span>).val(roomName);

  e.preventDefault();

  <span class="comment">// Firebaseのキーとして使えない文字が含まれているかチェック</span>
  <span class="keyword">if</span> (<span class="regexp"><span class="delimiter">/</span><span class="content">[.$#[</span><span class="content">\]</span><span class="delimiter">/</span></span>]/.test(roomName)) {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room__help</span><span class="delimiter">'</span></span>)
      .text(<span class="string"><span class="delimiter">'</span><span class="content">ルーム名に次の文字は使えません: . $ # [ ] /</span><span class="delimiter">'</span></span>)
      .fadeIn();
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room__room-name</span><span class="delimiter">'</span></span>).addClass(<span class="string"><span class="delimiter">'</span><span class="content">has-error</span><span class="delimiter">'</span></span>);
    <span class="keyword">return</span>;
  }

  <span class="keyword">if</span> (roomName.length &lt; <span class="integer">1</span> || roomName.length &gt; <span class="integer">20</span>) {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room__help</span><span class="delimiter">'</span></span>)
      .text(<span class="string"><span class="delimiter">'</span><span class="content">1文字以上20文字以内で入力してください</span><span class="delimiter">'</span></span>)
      .fadeIn();
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room__room-name</span><span class="delimiter">'</span></span>).addClass(<span class="string"><span class="delimiter">'</span><span class="content">has-error</span><span class="delimiter">'</span></span>);
    <span class="keyword">return</span>;
  }

  <span class="keyword">if</span> (dbdata.rooms[roomName]) {
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room__help</span><span class="delimiter">'</span></span>)
      .text(<span class="string"><span class="delimiter">'</span><span class="content">同じ名前のルームがすでに存在します</span><span class="delimiter">'</span></span>)
      .fadeIn();
    <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#create-room__room-name</span><span class="delimiter">'</span></span>).addClass(<span class="string"><span class="delimiter">'</span><span class="content">has-error</span><span class="delimiter">'</span></span>);
  }

  <span class="comment">// TODO (A): ルーム作成処理</span>

  <span class="comment">/**
   * TODO (B): ルーム作成に成功した場合は下記2つの処理を実行する
   *
   * モーダルを非表示にする
   * $("#createRoomModal").modal("toggle");
   *
   * 作成したルームを表示
   * changeLocationHash(roomName);
   */</span>
});
</pre></div>
</div>
</div>

<p>上記のコード例を参考に、<code>TODO (A)</code> と <code>TODO (B)</code> 部分のコードを記述してみましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-8-8">8.8 ルームの削除
</h3><p>ルームを削除するにはroomsの該当キーを削除し、またmessagesの該当ルーム以下すべてのメッセージも削除します。<code>remove()</code> でキーを削除できます。</p>

<p>例としてroom1を削除するコードは下記のようになります。</p>

<p><em>JavaScriptのコード例（まだ main.js に追記しないでください）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// room1を削除</span>
firebase
  .database()
  .ref(<span class="string"><span class="delimiter">'</span><span class="content">rooms/room1</span><span class="delimiter">'</span></span>)
  .remove();

<span class="comment">// room1内のメッセージも削除</span>
firebase
  .database()
  .ref(<span class="string"><span class="delimiter">'</span><span class="content">messages/room1</span><span class="delimiter">'</span></span>)
  .remove();
</pre></div>
</div>
</div>

<p>ルームメニューの「現在のルームを削除」をクリックすると、削除対象のルーム名を引数として <code>deleteRoom()</code> が呼び出されます。<em>main.js</em> に下記のようなTODO部分があります。上記のコード例を参考に、TODO部分を実装して、ルーム削除機能を完成させましょう。</p>

<p>（ヒント：ルーム名は引数の <code>roomName</code> に入っています。）</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/**
 * ルームを削除する
 * なおルームが削除されると roomsRef.on("value", ...); のコールバックが実行され、初期ルームに移動する
 */</span>
const deleteRoom = (roomName) =&gt; {
  <span class="comment">// 初期ルームは削除不可</span>
  <span class="keyword">if</span> (roomName === defaultRoomName) {
    <span class="keyword">throw</span> <span class="keyword">new</span> Error(<span class="error">`</span><span class="predefined">$</span>{defaultRoomName}<span class="error">ル</span><span class="error">ー</span><span class="error">ム</span><span class="error">は</span><span class="error">削</span><span class="error">除</span><span class="error">で</span><span class="error">き</span><span class="error">ま</span><span class="error">せ</span><span class="error">ん</span><span class="error">`</span>);
  }

  <span class="comment">// TODO: ルームを削除</span>

  <span class="comment">// TODO: ルーム内のメッセージも削除</span>

};
</pre></div>
</div>
</div>
</div><div class="subsection"><h3 class="index" id="chapter-8-9">8.9 Storageからのダウンロードの概要
</h3><p>ユーザのプロフィール写真をブラウザの画面へ表示するために、Firebase Storageを使います。</p>

<p><em>main.js</em> には、画像ファイルのアップロードおよびダウンロードの機能が既に実装されています。その内容は下記のとおりです。ユーザ情報の設定モーダルでファイルを選択すると、すぐにプロフィール写真がアップロードされます。</p>

<p><em>main.js（抜粋）</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// プロフィール画像のファイルが指定されたらアップロードする</span>
<span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#settings-profile-image</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">change</span><span class="delimiter">'</span></span>, (e) =&gt; {
  const input = e.target;
  const { files } = input;
  <span class="keyword">if</span> (files.length === <span class="integer">0</span>) {
    <span class="comment">// ファイルが選択されていない場合</span>
    <span class="keyword">return</span>;
  }

  const file = files[<span class="integer">0</span>];
  const metadata = {
    <span class="key">contentType</span>: file.type,
  };

  <span class="comment">// ローディング表示</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#settings-profile-image-preview</span><span class="delimiter">'</span></span>).hide();
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#settings-profile-image-loading-container</span><span class="delimiter">'</span></span>).css({
    <span class="key">display</span>: <span class="string"><span class="delimiter">'</span><span class="content">inline-block</span><span class="delimiter">'</span></span>,
  });

  <span class="comment">// ファイルアップロードを開始</span>
  firebase
    .storage()
    .ref(<span class="error">`</span>profile-images/<span class="predefined">$</span>{currentUID}<span class="error">`</span>)
    .put(file, metadata)
    .then(() =&gt; {
      <span class="comment">// アップロード成功したら画像表示用のURLを取得</span>
      firebase
        .storage()
        .ref(<span class="error">`</span>profile-images/<span class="predefined">$</span>{currentUID}<span class="error">`</span>)
        .getDownloadURL()
        .then((url) =&gt; {
          <span class="comment">// 画像のロードが終わったらローディング表示を消して画像を表示</span>
          <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#settings-profile-image-preview</span><span class="delimiter">'</span></span>).on(<span class="string"><span class="delimiter">'</span><span class="content">load</span><span class="delimiter">'</span></span>, (evt) =&gt; {
            <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#settings-profile-image-loading-container</span><span class="delimiter">'</span></span>).css({
              <span class="key">display</span>: <span class="string"><span class="delimiter">'</span><span class="content">none</span><span class="delimiter">'</span></span>,
            });
            <span class="predefined">$</span>(evt.target).show();
          });
          <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">#settings-profile-image-preview</span><span class="delimiter">'</span></span>).attr({
            <span class="key">src</span>: url,
          });

          <span class="comment">// ユーザ情報を更新</span>
          firebase
            .database()
            .ref(<span class="error">`</span>users/<span class="predefined">$</span>{currentUID}<span class="error">`</span>)
            .update({
              <span class="key">profileImageLocation</span>: <span class="error">`</span>profile-images/<span class="predefined">$</span>{currentUID}<span class="error">`</span>,
              <span class="key">updatedAt</span>: firebase.database.ServerValue.TIMESTAMP,
            });
        });
    })
    .<span class="keyword">catch</span>((error) =&gt; {
      console.error(<span class="string"><span class="delimiter">'</span><span class="content">プロフィール画像のアップロードに失敗:</span><span class="delimiter">'</span></span>, error);
    });
});
</pre></div>
</div>
</div>
</div></section><section id="chapter-9"><h2 class="index">9. 機能追加を考える上での参考資料
</h2><div class="subsection"><p>以上でリアルタイムチャットの開発は完了しました。しかし、機能の追加や改善の余地は残っています。</p>

<p>例：</p>

<ul>
  <li>メッセージ取得の件数を制限する</li>
  <li>パスワードを忘れたときにリセットする機能</li>
  <li>新しいパスワードをメールで送信する機能</li>
  <li>投稿メッセージやパスワードの入力値チェック機能</li>
  <li>ダイレクトメッセージ機能</li>
  <li>メッセージを「お気に入り」に追加する機能</li>
  <li>etc…</li>
</ul>

<p>自分なりに色々と検討して、余裕があれば、ぜひ実装してみてください。また、追加機能のひとつとして「お気に入り機能」を提出課題として用意していますので、ぜひチャレンジしましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-1">9.1 公式のドキュメントを参照する
</h3><p>紹介していないFirebaseのAPIは、まだまだ数多くあります。APIの機能を知れば「じゃあ、こういう機能が実装できるかな」と思いつく可能性が高まります。<a href="./baas#chapter-5" target="_blank">公式ドキュメントのチャプター</a> を参考にしながら、公式ドキュメントを閲覧してみてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-9-2">9.2 メッセージ取得の数を制限する機能を例に
</h3><p><strong>※この後の「お気に入り機能」の課題に取り組むにあたり、下記「一定件数のみ取得」の機能追加は必要ありません。課題に合格した後で自主的に取り組んでください。</strong></p>

<p>ルーム内のメッセージを全件取得して表示する処理は、メッセージ数がどんどん増えたとき、大変な重さになってしまいます。直近の一定件数だけ取得することで、メッセージ数が膨大になっても対応できるようにしてみましょう。ドキュメントをじっくり読んで実装してみましょう。ただし古いメッセージは消去しないようにしてください。</p>

<p>データをフィルタリングする方法はGuidesの<a href="https://firebase.google.com/docs/database/web/retrieve-data" target="_blank">Retrieve Data</a>に載っています。また <em>main.js</em> の中でメッセージを取得しているのは、 child_addedイベントに対してイベントハンドラを登録している箇所です。ドキュメントを読んで、最新の一定件数のみ表示するようにしてみましょう。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-fav-messages">課題：お気に入り機能の追加</h3><div class="alert alert-danger">
<i>firebase-tutorial</i> および <i>bookshelf</i> 、<i>realtime-chat</i> の内容の学習／作成が完了してから当課題に取り組んでください。
</div>

<div class="alert alert-info">
途中までHTML/CSS/JavaScriptをコーディングしているファイル一式を用意していますので、ダウンロードして取り組んでください。<i>main.js</i> の <code>// TODO: ...</code> と記載されている部分にコードを記述して完成させましょう。<br>
<br>
<a class="btn btn-success" href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/realtime-chat-with-fav.zip">ひな形のプロジェクトファイル一式をダウンロードする</a><br>
<br>
なお、この課題に取り組む前に <i>realtime-chat</i> のフォルダを右クリック→「Duplicate」で複製を作っておいてから課題に取り組むと、管理や確認がしやすくなります。
</div>

<h4>内容</h4>

<p>メッセージに対してお気に入り機能を追加しましょう。</p>

<p>ひな形のプロジェクトファイルでは、設定やルームと同様の場所に「お気に入り一覧」へのリンクを用意しています。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-realtime-chat-with-fav-1.png" alt=""></p>

<p>上記のリンクをクリックすると、下記のようにお気に入り一覧画面がモーダルで表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-realtime-chat-with-fav-2.png" alt=""></p>

<p>チャットルームのメッセージにある「★マークのアイコン」をクリックすると、上記のお気に入り一覧画面に、クリックしたメッセージが表示されるようにしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-realtime-chat-with-fav-3.gif" alt=""></p>

<p>具体的には下記の仕様を満たして下さい。</p>

<h4>仕様</h4>

<ul>
  <li>メッセージの日付欄の横に★マークのボタンを表示させ、クリックするとメッセージをお気に入りに追加してください。</li>
  <li>★マークのアイコンは<a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome 4</a>の<a href="https://fontawesome.com/v4.7.0/icon/star-o" target="_blank">fa-star-o</a>（お気に入りされていない場合）と<a href="https://fontawesome.com/v4.7.0/icon/star" target="_blank">fa-star</a>（お気に入りされている場合）を利用してください。</li>
  <li>データベースの設計として、<em>messages</em>, <em>rooms</em>, <em>users</em>の他に、<em>favorites</em>を作成します。この課題では、<em>favorites</em> の下層にはユーザー毎(UID)のキーを作成、対応するメッセージの保存先としてお気に入りメッセージリストを作成してください。場所としては <code>favorites/${UID(ユーザーID)}/${messagesのID}</code> という形になります。下記の画像を確認してください。</li>
  <li>「お気に入り一覧」画面では、ユーザー毎のお気に入りメッセージをお気に入り追加順に表示してください。</li>
  <li>お気に入りを解除できるようにしてください。<code>fa-star</code> アイコンをクリックすると、お気に入りメッセージが解除され、アイコンも <code>fa-star-o</code> へ戻すようにしてください。</li>
</ul>

<p><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/favorites.png" target="_blank"><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/favorites.png" alt=""></a><br>
<em>お気に入りメッセージのデータベース設計</em></p>

<h4>補足事項</h4>

<ul>
  <li>お気に入り一覧画面で「メッセージ送信」や「お気に入りの解除」が行える必要はありません。</li>
  <li>上記の配布ファイルでお気に入り一覧画面は、モーダルの中に「メディアリスト」を使って表示する仕様にしています。（参考：<a href="https://getbootstrap.com/docs/3.3/components/#media-list" target="_blank">メディアリスト</a>）</li>
  <li>ルームにメッセージを追加したときと同様、お気に入りを追加するときは <code>child_added</code> イベントを定義します。加えて、お気に入りには「解除する機能」を実装するので、子要素が削除されたときに実行される <code>child_removed</code> イベントも必要です。（参考：<a href="https://firebase.google.com/docs/reference/js/firebase.database.Reference#on" target="_blank">on()</a>）</li>
</ul>

<h4>ヒント</h4>

<ul>
  <li>この課題のひな形には7つの <code>TODO</code> が存在します。その中の「<code>TODO: favorites に該当のメッセージをお気に入りとして追加</code>」から取り組んでください。こちらは、Firebaseにデータを1件登録するという処理内容で、これを最初に実装することで他の <code>TODO</code> に取り組みやすくなります。</li>
</ul>

<p>具体的には下記の部分です。</p>

<pre><code>// Realtime Database の favorites に追加する or favorites から削除する
const toggleFavorite = (e) =&gt; {
  const { messageId, message } = e.data;

  e.preventDefault();

  // favorites にデータが存在しているか
  if (dbdata.favorites &amp;&amp; dbdata.favorites[messageId]) {
    // TODO: favorites から該当のお気に入り情報を削除

  } else {
    // TODO: favorites に該当のメッセージをお気に入りとして追加

  }
};
</code></pre>

<p>上記の「<code>TODO: favorites に該当のメッセージをお気に入りとして追加</code>」から始めてください。このTODOを実装したら、Firebase ConsoleでRealtime Databaseを確認しましょう。上記の仕様通りの場所に、メッセージを保存できているでしょうか。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-realtime-chat-with-fav-4.png" alt=""></p>

<p>「<code>TODO: favorites から該当のお気に入り情報を削除</code>」については、 <code>remove()</code> を使いましょう。<code>remove()</code> はRealtime Database機能のメソッドです。詳しくは<a href="baas#chapter-8-8">8.8 ルームの削除</a>などを参考にしてください。</p>

<p>そして次に取り組むのは、下記の <code>TODO</code> が良いでしょう。</p>

<pre><code>  /**
   * favorites の child_addedイベントハンドラを登録
   *（お気に入りが追加されたときの処理）
   */
  favoritesRef.on('child_added', (favSnapshot) =&gt; {
    const messageId = favSnapshot.key;
    const favorite = favSnapshot.val();

    if (!dbdata.favorites) {
      // データを初期化する
      dbdata.favorites = {};
    }

    // TODO: dbdata.favoritesに登録する


    // お気に入り一覧モーダルを更新する
    addFavoriteMessage(messageId, favorite.message);

    // TODO: お気に入りリンクのアイコンを、塗りつぶしあり(fa-star) に変更する

  });
</code></pre>

<p>上記の「TODO: お気に入りリンクのアイコンを、塗りつぶしあり(fa-star) に変更する」について。ポイントは、 <code>messageId</code> 変数に該当するメッセージのdiv要素を探し出すコードを、どのように書くかという点です。すでにmain.jsに書かれている下記のコードが、少しヒントになります。（ヒントになるだけで書き方は異なります。）</p>

<pre><code>// お気に入り一覧モーダルから該当のお気に入り情報を削除する
$(`#favorite-message-id-${messageId}`).remove();
</code></pre>

<p>チャットルームに表示されているメッセージにどのようなidが付いているかは、デベロッパーツールのElementsパネルで確認できます。ElementsパネルでのHTMLの確認方法は、Lesson2の<a href="html-css2#chapter-11">11. デベロッパーツール</a>をご参考にしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-realtime-chat-with-fav-5.png" alt=""></p>

<p>メッセージのどこに「お気に入りリンクのアイコン」があるかも、同じように確認できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/baas/8-realtime-chat-with-fav-6.png" alt=""></p>
</div></section><section id="chapter-10"><h2 class="index">10. まとめ
</h2><div class="subsection"><p>いかがでしたでしょうか。Firebaseは大変便利なバックエンドサービスで、手軽にサーバにデータを保存したり取り出したりできます。実際のところ、これほど簡単にデータベースを扱える環境を構築するのは優秀なバックエンドエンジニアにとってさえかなりの苦労です。Firebaseにはそれほど多くの便利機能が充実しています。場合によっては、バックエンドエンジニアと一緒に開発するよりもFirebaseを使ったほうが迅速に開発が進むこともあるでしょう。</p>

<p>Firebaseの欠点は、Firebaseがサポートしていない機能が欲しい場合に自分で機能を追加できないことです。バックエンドエンジニアがいれば追加してほしい機能は実装してくれますが、自分が欲しい機能をFirebaseに問い合わせてもなかなか簡単には追加してくれないでしょう。そのような場合は、提供されていない部分の機能だけバックエンドを自分で作り、Firebaseと自前のバックエンドを使い分けるとよいでしょう。ただし、Firebaseと自前のバックエンド間のデータの受け渡しは複雑になる可能性があります。</p>

<p>Firebaseには膨大な機能があり本レッスンではとても紹介しきれませんが、ぜひドキュメントから色々な便利機能を探してみてください。</p>
</div></section><section id="chapter-11"><h2 class="index">11. （参考）データのセキュリティ
</h2><div class="subsection"><h3 class="index" id="chapter-11-1">11.1 Realtime Databaseのセキュリティルールを強化する
</h3><div class="alert alert-warning">
この処理は、セキュリティ強化のための参考資料という位置づけです。課題合格後に進めてください。合格前に下記の設定をするとトラブルが発生し、不合格となるので注意してください。
</div>

<p>Realtime Databaseのデフォルト設定では、ログインしているユーザなら誰でもすべてのデータを改変できてしまいます。悪意を持ったユーザがいた場合、アプリ内のデータをすべて消してしまうこともできてしまいます。これを防ぐため <strong>ルール</strong>（Rules）というセキュリティの仕組みが用意されています。</p>

<p>現在設定されているルールを見るにはプロジェクトのoverview画面の左側にある「Database」→「ルール」タブの順にクリックしてください。なお、この手順では表示されない場合がありますので、そのときは、overview画面の一番下までスクロールして「すべてのFirebase機能を表示」のリンク→「Realtime Database」→「ルール」タブの順にクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-realtime-database-rules0.png" alt="Realtime Databaseのルール編集画面"></p>

<p>　　　　　　　　　　↓</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-realtime-database-rules1.png" alt="Realtime Databaseのルール編集画面"></p>

<p>　　　　　　　　　　↓</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/baas/8-realtime-database-rules.png" alt="Realtime Databaseのルール編集画面"></p>

<p>本レッスンでは下記のルールを最初に設定してもらいました。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key"><span class="delimiter">"</span><span class="content">rules</span><span class="delimiter">"</span></span>: {
    <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>,
    <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>
  }
}
</pre></div>
</div>
</div>

<p>上記のルールは、ログイン済み（<code>auth != null</code>）の場合のみread（読み込み）とwrite（書き込み）を許可する、というものです。</p>

<p>セキュリティを強化する例として、リアルタイムチャットで/users/下記のデータをそのユーザ本人しか書き込めないようにするには下記のルールを設定します。本棚サイトのルールも設定しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key"><span class="delimiter">"</span><span class="content">rules</span><span class="delimiter">"</span></span>: {
    <span class="comment">// 下記のルールに一致しないものはデフォルトですべて読み書き拒否</span>
    <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="predefined-constant">false</span>,
    <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="predefined-constant">false</span>,

    <span class="comment">// 本棚サイトのルール</span>
    <span class="key"><span class="delimiter">"</span><span class="content">books</span><span class="delimiter">"</span></span>: {
      <span class="comment">// ログインしていれば読み書き可</span>
      <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>,
      <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>
    },

    <span class="comment">// リアルタイムチャットのルール</span>
    <span class="key"><span class="delimiter">"</span><span class="content">users</span><span class="delimiter">"</span></span>: {
      <span class="comment">// ログインしていれば読み込み可</span>
      <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>,

      <span class="key"><span class="delimiter">"</span><span class="content">$uid</span><span class="delimiter">"</span></span>: {
        <span class="comment">// /users/$uid の$uidとログイン中のUIDが一致すれば書き込み可</span>
        <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">$uid === auth.uid</span><span class="delimiter">"</span></span>
      }
    },
    <span class="key"><span class="delimiter">"</span><span class="content">messages</span><span class="delimiter">"</span></span>: {
      <span class="comment">// ログインしていれば読み書き可</span>
      <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>,
      <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>
    },
    <span class="key"><span class="delimiter">"</span><span class="content">rooms</span><span class="delimiter">"</span></span>: {
      <span class="comment">// ログインしていれば読み書き可</span>
      <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>,
      <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>
    },
    <span class="key"><span class="delimiter">"</span><span class="content">favorites</span><span class="delimiter">"</span></span>: {
      <span class="key"><span class="delimiter">"</span><span class="content">.read</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">auth != null</span><span class="delimiter">"</span></span>,
      <span class="key"><span class="delimiter">"</span><span class="content">$uid</span><span class="delimiter">"</span></span>: {
        <span class="key"><span class="delimiter">"</span><span class="content">.write</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">$uid === auth.uid</span><span class="delimiter">"</span></span>
      }
    }
  }
}
</pre></div>
</div>
</div>

<p><code>$uid</code> のように <code>$</code> から始まるキーは変数です。上記の例では、/users/user1というデータへのアクセス権があるかを判定する時、$uid変数の中身がuser1となり、<code>$uid === auth.uid</code> つまり$uidが現在ログインしているユーザのUIDと一致していれば書き込みが許可されます。</p>

<p>ルールは階層の浅いものから順に判定されていき、許可条件に一致した時点で判定が終了してそれより深い階層のルールは判定されません。そのため <strong>階層が浅いときは制限をきつくしておき、深くなるにつれて緩めていく</strong> 必要があります。</p>

<p>上記のルールを設定することで、仮に悪意のあるユーザがFirebaseのセットアップコードをコピーして他のサイトから操作しようとしても、自分以外のユーザのプロフィールを自由に書き換えることはできません。</p>

<p>このようにして、必要に応じてアクセス権限を設定します。詳しい使い方は公式ドキュメントの<a href="https://firebase.google.com/docs/database/security/securing-data" target="_blank">Secure Your Data</a>を参照してください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-11-2">11.2 Stroageのセキュリティルールを強化する
</h3><p>StorageにはRealtime Databaseと似たようなセキュリティの仕組みがありますが、文法は異なります。Firebase ConsoleのStorageの「ルール」タブから編集できます。</p>

<p><em>ルールのひな形</em></p>

<div class="language-txt highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>service firebase.storage {
  match /b/{bucket}/o {

  }
}
</pre></div>
</div>
</div>

<p><code>match /b/{bucket}/o {  }</code> のブロック内にルールを記述していきます。</p>

<p>今回のリアルタイムチャットでは、Storageにアップしたプロフィール写真を /profile-images/{uid} という場所に保存します。{uid}にはそれぞれのユーザのUIDが入ります。プロフィール写真の読み込みはログインしていれば誰でも可、書き込みはUID本人のみ可、というアクセス制限をかけるには下記のようにルールを記述します。本棚サイトのルールも設定しています。</p>

<div class="language-txt highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>service firebase.storage {
  match /b/{bucket}/o {

    // 本棚サイトのルール
    match /book-images/{allPaths=**} {
      // ログインしていれば読み書き可
      allow read, write: if request.auth != null;
    }

    // リアルタイムチャットのルール
    match /profile-images/{uid} {
      // ログインしていれば誰でも読み込み可
      allow read: if request.auth != null;

      // {uid}とログイン中のUIDが一致すれば書き込み可
      allow write: if request.auth.uid == uid;
    }
  }
}
</pre></div>
</div>
</div>

<p>アクセス制限の詳しいかけ方については、公式ドキュメントの<a href="https://firebase.google.com/docs/storage/security/user-security" target="_blank">User Based Security</a>を参照してください。</p>
</div></section></div>
</body>
</html>