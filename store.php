<?php
// 実際に処理を実行していくファイル

// ファイルの読み込み
// Task.phpを読み込む理由：このファイルにInsert文が入っているから？
// Createメソッドが書き込んであるから
require_once('Models/Task.php');

// データの受け取り：title,contents
// create.phpのinput,textareaが送信できるタグ
// inputタグのname属性に"title"が格納される(name属性に紐づけられてデータが格納される)

// create.phpの中にある、"Title"部分を受け取るために変数を代入
// POSTの形でデータの受け取り、'title'部分に実際のTitleが代入される

// 【ユーザーがformでデータ送信した値】
// 'title'はname属性の値
$title = $_POST['title'];
// create.phpの中にある、"Contents"部分を受け取るために変数を代入
$contents = $_POST['contents'];

// 入力された時間が入る、組込関数
$currentTime = date("Y/m/d H:i:s");


// DBへのデータ保存
// SQL文の発行 → ここには書かない【オブジェクト指向の出番】
  // Modelsファイル：データベースとPHP間でデータのやり取りをするところ
  // ↪︎SQL文が書いてある
$task = new Task();
// createの定義元はどこ？(function〜)のこと
  // (答え)Task.phpに記載されているcreateメソッドを実行
  // $title,$contentsは【引数】
$task->create([$title, $contents, $currentTime]);

// リダイレクト
// 入力が終わったらトップページに戻るというメソッド
header('location:index.php');
exit;
