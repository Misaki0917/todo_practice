<?php
// 実際に処理を実行していくファイル

// ファイルの読み込み
// Task.phpを読み込む理由：このファイルにInsert文が入っているから？
// Createメソッドが書き込んであるから
require_once('Models/Task.php');

// データの受け取り
// create.phpの中にある、"Title"部分を受け取るために変数を代入
// POSTの形でデータの受け取り、'title'部分に実際のTitleが代入される
$title = $_POST['title'];
// create.phpの中にある、"Contents"部分を受け取るために変数を代入
$contents = $_POST['contents'];
// 入力された時間が入る、組込関数
$currentTime = date("Y/m/d H:i:s");


// DBへのデータ保存
$task = new Task();
$task->create([$title, $contents, $currentTime]);

// リダイレクト
// 入力が終わったらトップページに戻るというメソッド
header('location:index.php');
exit;
