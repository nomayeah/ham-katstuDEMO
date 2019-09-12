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
<div class="markdown"><div class="lesson-num p">Lesson7</div><h1 id="web-api">Web API
</h1>
<section id="chapter-1"><h2 class="index">1. はじめに
</h2><div class="subsection"><p>このレッスンではWeb APIの使い方を学びます。Web APIを使うと外部サービスの機能を組み込んで多機能なページを作ることができます。このレッスンでは写真検索のAPIを使って、キーワードを元に写真を外部から取得して表示する方法を学びます。</p>
</div></section><section id="chapter-2"><h2 class="index">2. Web APIとは
</h2><div class="subsection"><p>Web上にはAPIを提供しているサイトが数多くあります。API（Application Programming Interface）とは <strong>プログラムからアプリケーションを使えるようにした窓口</strong> です。ここでは一例として、米Yahoo!が運営する<a href="https://www.flickr.com/" target="_blank">Flickr</a>という大手の写真共有サイトを紹介します。Flickrでは、キーワードを元に写真を検索したり、撮った写真をアップロードしたり削除したりといったことをブラウザから行えます。さらにこういった操作の大部分を、プログラムからも行うことができます。この「プログラムから行う操作の窓口」として提供されているのがAPIです。</p>

<p>一般ユーザーにとって使いやすい通路（ブラウザからの操作）と、プログラムにとって使いやすい通路（APIからの操作）の2種類が設けられているイメージです。</p>

<p>APIを使えば、プログラムから他サービスのデータを取得できます。そのため、自分のWebサイトに他サービスの機能を容易に組み込むことができます。たとえばInstagramやTwitter、FacebookなどもAPIを提供しています。公式サイトや公式アプリを直接開かなくても他サイトや他アプリ経由でサービスを利用できるのは、APIが提供されているおかげです。</p>

<p>APIへは様々なプログラミング言語でアクセスできますが、ブラウザ内からAPIに直接アクセスするにはAjax（エイジャックス）という技術を使います。</p>
</div><div class="subsection"><h3 class="index" id="chapter-2-1">2.1 Ajaxとは
</h3><p><strong>JavaScriptを使って任意のタイミングでサーバーと通信する</strong> ことをAjaxと呼びます。通常のページではリンクをクリックするとアドレスバーに表示されるURLが変わり、一瞬真っ白になってからページが読み込まれて表示されますが、Ajaxを使うとそういったページの遷移を経ずに部分的にコンテンツをサーバーから取得して表示できます。</p>

<p>Ajaxの使用例として<a href="https://maps.google.co.jp/" target="_blank">Googleマップ</a>があります。Googleマップでキーワードを入力して検索すると、検索結果がその都度サーバーから取得され地図上に表示されます。キーワードを変えて検索するとページを遷移することなく新しい検索結果が表示されます。このようにページ遷移とは関係のないタイミングでデータを取得するのにAjaxを使います。Ajaxを使わない従来の方式では検索ボタンを押すたびに一から表示し直す必要がありますが、Ajaxを使えば必要な差分データだけを取得して素早く表示できます。</p>

<p>このレッスンではAjaxでFlickrの写真検索APIにアクセスして、写真の画像データを取得してみます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-webapi-concept.png" alt="Ajaxは任意のタイミングでサーバーと通信できる"></p>
</div><div class="subsection"><h3 class="index" id="chapter-2-2">2.2 JSON
</h3><p>Ajax通信では、 <strong>JSON（ジェイソン）というデータ形式を使ってサーバーとデータをやりとりする</strong> のが一般的です。JSONとは下記のような文字列のフォーマットで、JavaScriptのオブジェクトとよく似ています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key"><span class="delimiter">"</span><span class="content">firstName</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">John</span><span class="delimiter">"</span></span>,
  <span class="key"><span class="delimiter">"</span><span class="content">lastName</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">Smith</span><span class="delimiter">"</span></span>,
  <span class="key"><span class="delimiter">"</span><span class="content">email</span><span class="delimiter">"</span></span>: <span class="string"><span class="delimiter">"</span><span class="content">john@example.com</span><span class="delimiter">"</span></span>
}
</pre></div>
</div>
</div>

<p>上記のようなJSON文字列は <code>JSON.parse()</code> というメソッドを使ってJavaScriptのオブジェクトに変換できます。反対にオブジェクトからJSON文字列に変換するには <code>JSON.stringify()</code> というメソッドを使います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const str = <span class="string"><span class="delimiter">'</span><span class="content">{"firstName":"John", "lastName":"Smith", "email":"john@example.com"}</span><span class="delimiter">'</span></span>;
<span class="comment">// JSON文字列からオブジェクトへ変換</span>
const obj = JSON.parse(str);
console.log(obj.lastName);
<span class="comment">// =&gt; Smith</span>

<span class="comment">// オブジェクトからJSON文字列へ変換</span>
console.log(JSON.stringify(obj));
<span class="comment">// =&gt; {"firstName":"John","lastName":"Smith","email":"john@example.com"}</span>
</pre></div>
</div>
</div>
</div></section><section id="chapter-3"><h2 class="index">3. Flickr APIで写真を検索しよう
</h2><div class="subsection"><p>Flickrの<a href="https://www.flickr.com/services/api/" target="_blank">APIドキュメント</a>を見ると、右側にメソッドの一覧があります。これらの1つひとつがメソッドと呼ばれ、個別の機能に対応しています。後ほど詳しく見ていきます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-api-website.png" alt="Flickr APIのWebサイト"></p>

<p>なお、有志の方が翻訳した<a href="http://westplain.sakuraweb.com/translate/flickr/Top.cgi" target="_blank">非公式の日本語ドキュメント</a>も存在しますので、適宜参考にしてください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-1">3.1 APIキーとは
</h3><p>Flickrをはじめとして、Web APIを利用するには各サービスごとのAPIキーが必要です。APIキーとは、APIの提供者が利用者一人ひとりに与える鍵です。通常、APIへは許可なしではアクセスできませんが、その許可を与えるものがAPIキーです。</p>

<h4>Flickrにアカウント登録する</h4>

<p>APIキーを取得するにはFlickrにアカウント登録する必要があります。</p>

<p>まずは<a href="https://www.flickr.com/signup" target="_blank">アカウント登録のページ</a>を開きます。氏名・年齢・メールアドレス・希望するパスワードを入力して「Sign up」ボタンをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_01.png" alt=""></p>

<p>「メールアドレスを認証してほしい」旨のメールが送られますので、登録したメールアドレスに届いたメールを確認してください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_02.png" alt=""></p>

<p>メールに記載の「Confirm my Flickr account」と書かれたリンクをクリックしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_03.png" alt=""></p>

<p>アカウント登録の完了画面が表示されます。「Okay, got it!」のボタンをクリックすると、Flickrのログイン画面が表示されますので、メールアドレスとパスワードを入力してログインしてください。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_04.png" alt=""></p>

<div class="alert alert-info">
<strong>米ヤフーのアカウントでFlickrに登録していた方へ</strong><br>
以前のFlickrでは米Yahoo.comにアカウント登録しなければFlickrのAPIを利用できませんでした。2019年7月以降、Flickrは米ヤフーとの連携を解消して新しい認証システムを実装したため、米ヤフーのアカウントを作ってFlickrを既に利用していた方は米ヤフーの登録情報をFlickrに送って再登録するとともに、Yahoo.comのメールアドレスをFlickrで認証する必要があります。以前の認証システムの頃からアカウント登録をしている方は、以下の手順に従ってアカウント再登録の操作をしてください。<br>
<br>
(1) <a href="https://www.flickr.com/signin" target="_blank" style="text-decoration: underline;">ログインのページ</a>を開き、米ヤフーのメールアドレスを入力してください。米ヤフーにログインできていない場合は、米ヤフーのログイン画面が表示されますので、ヤフーにログインしてください。すると「米ヤフーの情報をFlickrに送ることを許可するか」と問われる画面が表示されますので「Agree」のボタンをクリックしてください。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_05.png"><br>
<br>
(2)Flickr上で米ヤフーのメールアドレス(●●@yahoo.com)を認証してほしい旨の画面が表示されます。「account preferences」のリンクをクリックしてください。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_06.png"><br>
<br>
(3)以下のような画面が表示されたら「send another confirmation request to ●●@yahoo.com」のリンクをクリックして、認証メールをシステムから送ってもらいます。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_07.png"><br>
<br>
(4)認証メールが送信された旨、表示されます。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_08.png"><br>
<br>
(5)<a href="https://mail.yahoo.com" target="_blank" style="text-decoration: underline;">Yahoo.comのメールボックスのページ</a>を開き、Flickrから届いているメールを確認してください。メールに記載のURLをクリックするか、ブラウザのURL欄にコピペしてアクセスしてください（セキュリティの設定上、URLがリンク形式で表示されない場合があります）。なお、ここでいうURLは、下記の画像でいう<code>https://www.flickr.com/confirm/161...(中略)...N03/a03...(中略)...02b/</code>です。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_09.png"><br>
<br>
(6)以下のような画面が表示されれば、Flickrへの再登録とログインが完了します。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_10.png"><br>
<br>
(7)なお、再度ログインしようとすると以下のような画面が表示されます。画像に記載のとおりに操作を進めてください。<br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_11.png"><br>
<img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/flickr_new_signup_12.png">
</div>
</div><div class="subsection"><h3 class="index" id="chapter-3-2">3.2 APIキーの取得
</h3><p>まずはAPIキーを取得しましょう。<a href="https://www.flickr.com/services/apps/create/apply/" target="_blank">こちらのページ</a>を開いてください。</p>

<p>なお、過去にFlickrのAPIを取得していた場合、<a href="https://www.flickr.com/services/apps/by/me" target="_blank">Apps By You</a>のページを開くと、下記のようなページが表示されます。そのページの右側にある「Get Another Key」ボタンのクリックでも新規のAPIキーを取得できます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-apikey-1-1.png" alt="APIキーの取得 手順1-1"></p>

<p>「First, we need to …」のページでは、今回は個人サイトとして作りますので「Apply for a non-commercial key」（非商用）をクリックします。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-apikey-2.png" alt="APIキーの取得 手順2"></p>

<p>次に、作成するアプリケーション（Webサイト）に関する情報を入力してSubmitボタンを押します。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-apikey-3.png" alt="APIキーの取得 手順3"></p>

<p>登録が完了するとAPIキーが表示されます。APIシークレットは認証が必要なAPIを使う際に必要となりますが、今回のレッスンでは使用しません。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-apikey-4.png" alt="APIキーの取得 手順4"></p>

<div class="alert alert-info">
以降の内容で紹介している使い方は<a href="https://www.flickr.com/help/terms/api" target="_blank" style="text-decoration: underline;">Flickr APIの利用規約</a>ならびに写真のライセンスに従い、自由に使える範囲内で利用しています（運営元のSmugMug社とコラボ等しているものではありません）。
</div>

<div class="alert alert-warning">
今後オリジナルサイト等でFlickr APIをご利用されたい場合は、Flickrの利用規約ならびに写真のライセンスにはご留意いただくよう、お願いいたします。
</div>
</div><div class="subsection"><h3 class="index" id="chapter-3-3">3.3 写真検索を実行する
</h3><p>今回は<a href="https://www.flickr.com/services/api/flickr.photos.search.html" target="_blank">flickr.photos.search</a>（非公式ですが<a href="http://westplain.sakuraweb.com/translate/flickr/APIMethods/photos/search.cgi" target="_blank">日本語のドキュメントはこちら</a>）という写真検索用のメソッドを使います。</p>

<p>まずは、<em>flickr</em> という名前のフォルダを新規作成し、その中に下記の完成版をコピーして、ページを開いてみましょう。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="doctype">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html</span> <span class="attribute-name">lang</span>=<span class="string"><span class="delimiter">"</span><span class="content">ja</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>

<span class="tag">&lt;head&gt;</span>
  <span class="tag">&lt;meta</span> <span class="attribute-name">charset</span>=<span class="string"><span class="delimiter">"</span><span class="content">utf-8</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
  <span class="tag">&lt;title&gt;</span>Flickr API Test<span class="tag">&lt;/title&gt;</span>

  <span class="comment">&lt;!-- Bootstrap CSS --&gt;</span>
  <span class="tag">&lt;link</span> <span class="attribute-name">rel</span>=<span class="string"><span class="delimiter">"</span><span class="content">stylesheet</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
<span class="tag">&lt;/head&gt;</span>

<span class="tag">&lt;body&gt;</span>
  <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">container</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
    <span class="tag">&lt;div</span> <span class="attribute-name">id</span>=<span class="string"><span class="delimiter">"</span><span class="content">main</span><span class="delimiter">"</span></span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span>
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

<p>次にJavaScriptファイルです。下記の2行目に先ほど取得したAPIキーを入れてください。</p>

<p><em>main.js</em></p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">// Flickr API key</span>
const apiKey = <span class="string"><span class="delimiter">'</span><span class="content">ここにAPIキーを入れてください</span><span class="delimiter">'</span></span>;

<span class="comment">// Flickr画像データのURLを返す</span>
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

<span class="comment">// Flickr画像の元ページのURLを返す</span>
const getFlickrPageURL = photo =&gt; <span class="error">`</span>https:<span class="comment">//www.flickr.com/photos/${photo.owner}/${photo.id}`;</span>

<span class="comment">// Flickr画像のaltテキストを返す</span>
const getFlickrText = (photo) =&gt; {
  let text = <span class="error">`</span><span class="string"><span class="delimiter">"</span><span class="content">${photo.title}</span><span class="delimiter">"</span></span> by <span class="predefined">$</span>{photo.ownername}<span class="error">`</span>;
  <span class="keyword">if</span> (photo.license === <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>) {
    <span class="comment">// Creative Commons Attribution（CC BY）ライセンス</span>
    text += <span class="string"><span class="delimiter">'</span><span class="content"> / CC BY</span><span class="delimiter">'</span></span>;
  }
  <span class="keyword">return</span> text;
};

<span class="comment">// リクエストパラメータを作る</span>
const parameters = <span class="predefined">$</span>.param({
  <span class="key">method</span>: <span class="string"><span class="delimiter">'</span><span class="content">flickr.photos.search</span><span class="delimiter">'</span></span>,
  <span class="key">api_key</span>: apiKey,
  <span class="key">text</span>: <span class="string"><span class="delimiter">'</span><span class="content">cat</span><span class="delimiter">'</span></span>, <span class="comment">// 検索テキスト</span>
  <span class="key">sort</span>: <span class="string"><span class="delimiter">'</span><span class="content">interestingness-desc</span><span class="delimiter">'</span></span>, <span class="comment">// 興味深さ順</span>
  <span class="key">per_page</span>: <span class="integer">12</span>, <span class="comment">// 取得件数</span>
  <span class="key">license</span>: <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>, <span class="comment">// Creative Commons Attributionのみ</span>
  <span class="key">extras</span>: <span class="string"><span class="delimiter">'</span><span class="content">owner_name,license</span><span class="delimiter">'</span></span>, <span class="comment">// 追加で取得する情報</span>
  <span class="key">format</span>: <span class="string"><span class="delimiter">'</span><span class="content">json</span><span class="delimiter">'</span></span>, <span class="comment">// レスポンスをJSON形式に</span>
  <span class="key">nojsoncallback</span>: <span class="integer">1</span>, <span class="comment">// レスポンスの先頭に関数呼び出しを含めない</span>
});
const url = <span class="error">`</span>https:<span class="comment">//api.flickr.com/services/rest/?${parameters}`;</span>
console.log(url);

<span class="comment">// 猫の画像を検索して表示</span>
<span class="predefined">$</span>.getJSON(url, (data) =&gt; {
  console.log(data);

  <span class="comment">// データが取得できなかった場合</span>
  <span class="keyword">if</span> (data.stat !== <span class="string"><span class="delimiter">'</span><span class="content">ok</span><span class="delimiter">'</span></span>) {
    console.error(<span class="string"><span class="delimiter">'</span><span class="content">データの取得に失敗しました。</span><span class="delimiter">'</span></span>);
    <span class="keyword">return</span>;
  }

  <span class="comment">// 空の&lt;div&gt;を作る</span>
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

  <span class="comment">// BootstrapのTooltipを適用</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">[data-toggle="tooltip"]</span><span class="delimiter">'</span></span>).tooltip();
});
</pre></div>
</div>
</div>

<p>ページを開くと、猫の画像がずらっと表示されます。</p>

<p>次から <em>main.js</em> の内部の解説を行いますので、Cloud9へコピーした <em>main.js</em> と見比べながら理解していきましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-4">3.4 flickr.photos.searchのリクエストパラメータ
</h3><p>flickr.photos.searchで指定できる主なパラメータは下記の通りです。</p>

<table>
  <thead>
    <tr>
      <th>引数</th>
      <th>必須／任意</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>api_key</code></td>
      <td>必須</td>
      <td>APIキー</td>
    </tr>
    <tr>
      <td><code>text</code></td>
      <td>任意</td>
      <td>検索テキスト。写真のタイトル、説明文、タグが検索対象。</td>
    </tr>
    <tr>
      <td><code>tags</code></td>
      <td>任意</td>
      <td>タグでの絞り込み。カンマ（<code>,</code>）区切りで指定したタグのうちどれか1つでも一致する写真がヒットする。</td>
    </tr>
    <tr>
      <td><code>tag_mode</code></td>
      <td>任意</td>
      <td><code>tags</code> のすべてのタグを含む写真だけを検索するには <code>all</code> を指定。</td>
    </tr>
    <tr>
      <td><code>license</code></td>
      <td>任意</td>
      <td>ライセンス（利用条件）での絞り込み。<a href="https://www.flickr.com/services/api/flickr.photos.licenses.getInfo.html" target="_blank">指定できる値一覧</a></td>
    </tr>
    <tr>
      <td><code>sort</code></td>
      <td>任意</td>
      <td>ソート順。 <code>date-posted-desc</code>（投稿日が新しい順、デフォルト）、<code>date-taken-desc</code>（撮影日が新しい順）、<code>interestingness-desc</code>（興味深さ順）、<code>relevance</code>（検索条件との関連度順）など。</td>
    </tr>
    <tr>
      <td><code>page</code></td>
      <td>任意</td>
      <td>検索結果の何ページ目を取得するか。デフォルトは1。</td>
    </tr>
    <tr>
      <td><code>per_page</code></td>
      <td>任意</td>
      <td>検索結果の1ページあたりの件数。デフォルトは100。</td>
    </tr>
  </tbody>
</table>
</div><div class="subsection"><h3 class="index" id="chapter-3-5">3.5 リクエストパラメータを与えてアクセス先のURLを作る
</h3><p>リクエストパラメータに必要な値を与えて、JSONを取得するためのアクセス先（URL）を作ります。下記の <code>url</code> がJSONを取得するためのアクセス先（URL）となります。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>const parameters = <span class="predefined">$</span>.param({
  <span class="key">method</span>: <span class="string"><span class="delimiter">'</span><span class="content">flickr.photos.search</span><span class="delimiter">'</span></span>,
  <span class="key">api_key</span>: apiKey,
  <span class="key">text</span>: <span class="string"><span class="delimiter">'</span><span class="content">cat</span><span class="delimiter">'</span></span>, <span class="comment">// 検索テキスト</span>
  <span class="key">sort</span>: <span class="string"><span class="delimiter">'</span><span class="content">interestingness-desc</span><span class="delimiter">'</span></span>, <span class="comment">// 興味深さ順</span>
  <span class="key">per_page</span>: <span class="integer">12</span>, <span class="comment">// 取得件数</span>
  <span class="key">license</span>: <span class="string"><span class="delimiter">'</span><span class="content">4</span><span class="delimiter">'</span></span>, <span class="comment">// Creative Commons Attributionのみ</span>
  <span class="key">extras</span>: <span class="string"><span class="delimiter">'</span><span class="content">owner_name,license</span><span class="delimiter">'</span></span>, <span class="comment">// 追加で取得する情報</span>
  <span class="key">format</span>: <span class="string"><span class="delimiter">'</span><span class="content">json</span><span class="delimiter">'</span></span>, <span class="comment">// レスポンスをJSON形式に</span>
  <span class="key">nojsoncallback</span>: <span class="integer">1</span>, <span class="comment">// レスポンスの先頭に関数呼び出しを含めない</span>
});
const url = <span class="error">`</span>https:<span class="comment">//api.flickr.com/services/rest/?${parameters}`;</span>
</pre></div>
</div>
</div>

<p><code>$.param({ パラメータ })</code> によって、下記のようなURLの一部が作られます。<code>$.param()</code> はパラメータを与えると、URL用の文字列へ変換してくれます。例えば、<code>method: 'flickr.photos.search'</code>とパラメータを与えれば、<code>method=flickr.photos.search</code>という文字列に変換してくれます。全てのパラメータをつなげると下記のようになります。</p>

<pre><code>method=flickr.photos.search&amp;api_key=「各自のAPIKey」&amp;text=cat&amp;sort=interestingness-desc&amp;per_page=12&amp;license=4&amp;extras=owner_name%2Clicense&amp;format=json&amp;nojsoncallback=1
</code></pre>

<p>さらに、</p>

<pre><code>const url = `https://api.flickr.com/services/rest/?${parameters}`;
</code></pre>

<p>で、</p>

<pre><code>https://api.flickr.com/services/rest/?method=flickr.photos.search&amp;api_key=「各自のAPIKey」&amp;text=cat&amp;sort=interestingness-desc&amp;per_page=12&amp;license=4&amp;extras=owner_name%2Clicense&amp;format=json&amp;nojsoncallback=1
</code></pre>

<p>となります。<em>main.js</em> に <code>console.log(flickr_url)</code> を埋め込んで、デベロッパーツールで実際の値を確認したほうが良いでしょう。</p>

<p>上記のURLの「各自のAPIKey」の部分に自分のAPIKeyを入力したURLを作って、ブラウザからそのURLへアクセスしてみてください。すると、下記のようにブラウザからでもJSON文字列を取得できます。</p>

<p><em>今回取得したJSONオブジェクト</em></p>

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
</div><div class="subsection"><h3 class="index" id="chapter-3-6">3.6 $.getJSON()
</h3><p>jQueryの <code>$.getJSON()</code> というメソッドは、サーバーにリクエストを送り、返ってきたJSON文字列をオブジェクトに変換してくれます。この $.getJSONメソッドがAjaxによる通信となります。先ほどブラウザから直接URLにアクセスしてJSON文字列を取得しましたが、本来であれば$.getJSONメソッドを使ってJavaScript側から行います。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="predefined">$</span>.getJSON(URL, (data) =&gt; {
  <span class="comment">/**
   * リクエストが成功するとここが実行される。
   * JSONからオブジェクトに変換されたものがdataに入る。
   */</span>
});
</pre></div>
</div>
</div>

<p><em>main.js</em> にある <code>console.log(data)</code> によって出力されるレスポンスの中身を、デベロッパーツールで確認してみましょう。ブラウザで見たものと同じJSONが取得できていることがわかるはずです。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-example-with-console.png" alt="Flickr API実装例とConsole"></p>
</div><div class="subsection"><h3 class="index" id="chapter-3-7">3.7 画像のURLを導き出す
</h3><p>レスポンスのJSONである <code>data</code> の中身を見ていきます。<code>data.photos.photo</code> は配列で、各要素は下記のようなオブジェクトになっています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>{
  <span class="key">farm</span>: <span class="integer">6</span>,
  <span class="key">id</span>: <span class="string"><span class="delimiter">"</span><span class="content">5537278912</span><span class="delimiter">"</span></span>,
  <span class="key">isfamily</span>: <span class="integer">0</span>,
  <span class="key">isfriend</span>: <span class="integer">0</span>,
  <span class="key">ispublic</span>: <span class="integer">1</span>,
  <span class="key">license</span>: <span class="string"><span class="delimiter">"</span><span class="content">4</span><span class="delimiter">"</span></span>,
  <span class="key">owner</span>: <span class="string"><span class="delimiter">"</span><span class="content">33152876@N08</span><span class="delimiter">"</span></span>,
  <span class="key">ownername</span>: <span class="string"><span class="delimiter">"</span><span class="content">Trish Hamme</span><span class="delimiter">"</span></span>,
  <span class="key">secret</span>: <span class="string"><span class="delimiter">"</span><span class="content">7af1551479</span><span class="delimiter">"</span></span>,
  <span class="key">server</span>: <span class="string"><span class="delimiter">"</span><span class="content">5211</span><span class="delimiter">"</span></span>,
  <span class="key">title</span>: <span class="string"><span class="delimiter">"</span><span class="content">Happy Furry Friday</span><span class="delimiter">"</span></span>,
}
</pre></div>
</div>
</div>

<p>photoオブジェクトから画像のURLやFlickrページのURLを導き出す方法は<a href="https://www.flickr.com/services/api/misc.urls.html" target="_blank">URLドキュメントのページ</a>に載っています。「Photo Source URLs」のセクションが画像データのURLの導き出し方、その下の「Web Page URLs」はFlickrページのURLの導き出し方です。下記の関数はそれぞれをJavaScriptで実装したものです。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre><span class="comment">/**
 * photoオブジェクトから画像のURLを作成して返す
 * 戻り値の例: https://farm6.staticflickr.com/5211/5537278912_7af1551479_q.jpg
 */</span>
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


<span class="comment">/**
 * photoオブジェクトからページのURLを作成して返す
 * 戻り値の例: https://www.flickr.com/photos/33152876@N08/5537278912
 */</span>
const getFlickrPageURL = photo =&gt; <span class="error">`</span>https:<span class="comment">//www.flickr.com/photos/${photo.owner}/${photo.id}`;</span>
</pre></div>
</div>
</div>

<p>getFlickrImageURL関数の第2引数である <code>size</code> には、取得したい画像サイズを1文字で指定します。下記は<a href="https://www.flickr.com/services/api/misc.urls.html" target="_blank">Size Suffixes</a>からの抜粋です。</p>

<table>
  <thead>
    <tr>
      <th>size</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>s</code></td>
      <td>75px x 75px</td>
    </tr>
    <tr>
      <td><code>q</code></td>
      <td>150px x 150px</td>
    </tr>
    <tr>
      <td><code>t</code></td>
      <td>長辺100px</td>
    </tr>
    <tr>
      <td><code>m</code></td>
      <td>長辺240px</td>
    </tr>
    <tr>
      <td><code>n</code></td>
      <td>長辺320px</td>
    </tr>
    <tr>
      <td>指定なし</td>
      <td>長辺500px</td>
    </tr>
    <tr>
      <td><code>z</code></td>
      <td>長辺640px</td>
    </tr>
    <tr>
      <td><code>c</code></td>
      <td>長辺800px</td>
    </tr>
    <tr>
      <td><code>b</code></td>
      <td>長辺1024px</td>
    </tr>
    <tr>
      <td><code>h</code></td>
      <td>長辺1600px</td>
    </tr>
    <tr>
      <td><code>k</code></td>
      <td>長辺2048px</td>
    </tr>
  </tbody>
</table>
</div><div class="subsection"><h3 class="index" id="chapter-3-8">3.8 画像のクレジットを表示する
</h3><p>今回の検索では<a href="https://creativecommons.org/licenses/by/2.0/jp/" target="_blank">Creative Commons Attribution</a>（略称：CC BY）というライセンスで絞り込みをしました。このライセンスでは、自由に転載できる代わりにクレジットの表示が必要です。このルールに従うため、下記のようにBootstrapのTooltipを使って著作者名などを入れます。Tooltip（ツールチップ）とは、マウスを乗せたときに表示されるメッセージなどのことです。</p>

<p>BootstrapのTooltipでは、要素に <code>data-toggle</code>, <code>data-placement</code>, <code>title</code> の3つの属性を書いておく必要があります。</p>

<ul>
  <li><a href="http://getbootstrap.com/javascript/#tooltips" target="_blank">Tooltip - Bootstrap</a></li>
</ul>

<p>下記2つのコーディング箇所で、Tooltipを設定しています。</p>

<div class="language-js highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>    <span class="predefined">$div</span>.append(
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
  <div class="code"><pre>  <span class="comment">// BootstrapのTooltipを適用</span>
  <span class="predefined">$</span>(<span class="string"><span class="delimiter">'</span><span class="content">[data-toggle="tooltip"]</span><span class="delimiter">'</span></span>).tooltip();
</pre></div>
</div>
</div>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-example-tooltip.png" alt="Tooltipを入れた表示例"></p>

<p>これでライセンスがクリアでき、ページを公開しても問題のない状態になりました。</p>
</div><div class="subsection"><h3 class="index" id="chapter-3-9">3.9 エラーとデバッグ
</h3><p>Flickr APIでは、APIキーが正しくない場合など検索に失敗するとレスポンスの <code>data.stat</code> に <code>"fail"</code> という値が入ります。成功した場合は <code>"ok"</code> が入ります。エラー時のレスポンスを <code>console.log(data)</code> で出力すると下記のように表示されます。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-api-error.png" alt="エラー時のレスポンス"></p>

<p>レスポンスが返ってきたら、まず <code>data.stat</code> が <code>"ok"</code> かどうかをチェックします。 <code>"ok"</code> 以外の値が入っている場合、処理が失敗したことを表しています。</p>

<p>エラーが起きると <code>data.message</code> にエラーの理由が入っていますので、<code>console.log()</code> などを使って確認してみましょう。</p>
</div><div class="subsection challenge"><h3 class="index" id="kadai-add-api">課題：Lesson6のサイトにFlickr APIを使う</h3><p>まずはCloud9上に <em>add-api</em> フォルダを新規作成し、以下の <em>rich-site</em> をそのフォルダに格納してください。</p>

<ul>
  <li><a href="https://techacademy.s3.amazonaws.com/bootcamp/frontend/2/library/rich-site.zip">（API無しの）Lesson6サイトの完成版のダウンロード</a></li>
</ul>

<p>Lesson6で扱ったリッチなサイトの <strong>Gallery</strong> では既にある犬・猫の画像素材を使って8枚表示しました。HTMLでは下記の部分です。</p>

<p><em>index.html</em></p>

<div class="language-html highlighter-coderay"><div class="CodeRay">
  <div class="code"><pre>      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/kitten1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/kitten1.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">シェパード</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/kitten2.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/kitten2.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">レトリバー</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/kitten3.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/kitten3.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">プードル</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/kitten4.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/kitten4.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">ポメラニアン</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/puppy1.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/puppy1.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">アメリカンショートヘア</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/puppy2.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/puppy2.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">スコティッシュフォールド</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/puppy3.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/puppy3.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">ベンガル</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
      <span class="tag">&lt;div</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">image-gallery__item</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;a</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">d-inline-block</span><span class="delimiter">"</span></span> <span class="attribute-name">href</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/puppy4.jpg</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
          <span class="tag">&lt;img</span> <span class="attribute-name">class</span>=<span class="string"><span class="delimiter">"</span><span class="content">img-fluid</span><span class="delimiter">"</span></span> <span class="attribute-name">src</span>=<span class="string"><span class="delimiter">"</span><span class="content">img/gallery-thumbnail/puppy4.jpg</span><span class="delimiter">"</span></span> <span class="attribute-name">width</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">height</span>=<span class="string"><span class="delimiter">"</span><span class="content">150</span><span class="delimiter">"</span></span> <span class="attribute-name">alt</span>=<span class="string"><span class="delimiter">"</span><span class="content">ロシアンブルー</span><span class="delimiter">"</span></span><span class="tag">&gt;</span>
        <span class="tag">&lt;/a&gt;</span>
      <span class="tag">&lt;/div&gt;</span>
</pre></div>
</div>
</div>

<p>このサイトの <strong>Gallery</strong> の画像を、本レッスンで行ったようにFlickr APIから取得して表示できるよう、<em>index.html</em>の上記部分に変更を加えつつ、<em>main.js</em>に追記修正してください。犬の画像と猫の画像を4枚ずつ連続で表示して（犬と猫のどちらを先に表示するかまでは問いません）、<code>flickr.photos.search</code> のパラメータに <code>license: '4', // Creative Commons Attributionのみ</code> と <code>extras: 'owner_name,license', // 追加で取得する情報</code> を含めてください。</p>

<p>また、本レッスンで行ったようにBootstrapのTooltip機能でライセンス表記を行ってください。さらに、Flickrから取得した画像をクリックしたときの挙動として、ライトボックス(Magnific Popup)の利用を止め、Flickr画像元ページへ新規タブでリンクさせるようにしてください。</p>
</div></section><section id="chapter-4"><h2 class="index">4. Ajaxにおける注意点
</h2><div class="subsection"><h3 class="index" id="chapter-4-1">4.1 認証が必要なFlickr API
</h3><p>Flickr APIには認証が必要なものとそうでないものの2種類があります。認証が必要かどうかは各APIのページに載っています。このレッスンで使用した <code>flickr.photos.search</code>（右）は認証不要です。</p>

<p><img src="https://techacademy.s3.amazonaws.com/bootcamp/frontend/web-api/7-flickr-apidoc-auth.png" alt="認証が必要なAPI（左）と不要なAPI（右）"></p>

<p>大まかに分けて、flickr.photos.search（写真検索）のようにFlickr上のデータに変更を及ぼさないAPIは認証が不要、flickr.photos.delete（写真の削除）のように変更を及ぼすAPIは認証が必要となっています。</p>

<p>セキュリティ上の理由から、認証が必要なAPIは本コースでは使わないでください。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-2">4.2 公開されてはいけない情報をソースコードに埋め込まない
</h3><p>POSTをはじめとする一部のFlickr APIでは認証が必要ですが、<strong>認証が必要なAPIを使うには冒頭で取得したAPIシークレットが必要</strong> となります。ところが、HTMLから読み込むCSSやJavaScriptのソースコードは誰でも閲覧できてしまうため、 <strong>JavaScriptにAPIシークレットを埋め込んでしまうと他の人に知れ渡ってしまいます</strong>。</p>

<p>私たちのAPIキーとAPIシークレットを悪意のあるユーザーが知ると、私たちになりすまして一般ユーザーの写真の削除などができるようになってしまいます。<strong>APIシークレットを適切に扱うにはサーバーサイドのプログラムを自分で作成して</strong> APIシークレットを埋め込んでおき、ブラウザからサーバーサイドプログラムを介してFlickrにアクセスしなければなりません。</p>

<p>上記のような理由で、サーバサイドを扱わない本コースでは認証の必要なAPIについては扱えません。</p>

<p>JavaScriptのソースコードはすべて公開されてしまうということを念頭に置いて、パスワードのような公開されてはいけない情報を埋め込まないよう注意しましょう。</p>
</div><div class="subsection"><h3 class="index" id="chapter-4-3">4.3 Ajaxの制約
</h3><p>Ajaxは通常、Webページと同じドメインにしかアクセスできないという制限があります。たとえばWebページが<code>www.example.com</code>にあるとき、<code>www.example.com</code>のJavaScriptから<code>www.example.org</code>にはAjaxでアクセスできません。このようなドメインをまたいだリクエストのことを <strong>クロスドメインリクエスト</strong> と呼びます。</p>

<p>クロスドメインリクエストがデフォルトで拒否されているのは、Ajax送信先（ここでは<code>www.example.org</code>）のデータが意図せず第三者に読み取られないよう保護するためです。送信先のドメイン側のポリシー（注）で許可されていればクロスドメインのリクエストが可能になります。先ほどの例では<code>www.example.org</code>側のポリシーで<code>www.example.com</code>からのAjaxを許可していれば通信可能となります。</p>

<p>Flickr APIではクロスドメインリクエストが許可されているため自由にAjaxアクセスが可能です。</p>

<p>（注）<code>Access-Control-Allow-Origin</code>というHTTPヘッダを使います</p>
</div></section><section id="chapter-5"><h2 class="index">5. まとめ
</h2><div class="subsection"><p>Web APIはここで学んだように、URLに対してパラメータ（条件）付きでアクセスし、JSON形式でデータを取得し、自分のWebサイトの中で利用します。この考え方は、他のWeb APIでも変わりません。他のWeb APIを利用するときにも、URLとパラメータを意識して、どのようにアクセスすればデータを取得できるか考えると良いでしょう。</p>

<p>Web APIを使うと、Flickrの膨大な写真の中から必要なものだけを瞬時に検索してサイト上に表示するなど、他サービスの機能を自分のサイトに組み込むことができます。APIを提供しているサイトは世界中にたくさんあるので、気になるサービスがあればAPIが提供されているか調べてみましょう。</p>

<p>また、Web APIには認証が必要なものと、不要なものがありました。APIシークレットという、一種のパスワードが必要となるAPIはフロントエンド側だけでは実装できません。シークレットを隠すにはサーバサイドからAPIにアクセスするしかないからです。フロントエンド側だけで実装可能かどうかはAPIによって様々なので、1つずつ調べる必要があります。</p>
</div></section></div>
</body>
</html>