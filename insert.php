<?php

session_start();
include("funcs.php");
loginCheck();


//入力チェック(受信確認処理追加)
if(
  !isset($_POST["type"]) || $_POST["type"]=="" ||
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]==""
){
  exit('ParamError');
}


//1. POSTデータ取得

$type = $_POST["type"];
$title = $_POST["title"];
$url = $_POST["url"];




//2. DB接続します(エラー処理追加)

$pdo = db_connect();
// try {
//   $pdo = new PDO('mysql:dbname=shigeg_ccdb;charset=utf8;host=shigeg.sakura.ne.jp','shigeg','8q8Em6=wnMt+');
// } catch (PDOException $e) {
//   exit('DbConnectError:'.$e->getMessage());
// }


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO oyaji_dc_table(id, type, title, url)VALUES(NULL, :a1, :a2, :a3)");
$stmt->bindValue(':a1', $type, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("エラーメッセージ:".$error[2]);

}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;

}
?>
