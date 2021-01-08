<?php

session_start();
include("funcs.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["user_name"]) || $_POST["user_name"]=="" ||
  !isset($_POST["user_id"]) || $_POST["user_id"]=="" ||
  !isset($_POST["user_pw"]) || $_POST["user_pw"]==""
){
  exit('ParamError');
}


//1. POSTデータ取得

$user_name = $_POST["user_name"];
$user_id= $_POST["user_id"];
$user_pw= $_POST["user_pw"];




//2. DB接続します(エラー処理追加)
$pdo = db_connect();
// try {
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DbConnectError:'.$e->getMessage());
// }


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO oyaji_user_table(id, user_name, user_id, user_pw,
life_flg, indate )VALUES(NULL, :log1, :log2, :log3, '0', sysdate())");
$stmt->bindValue(':log1', $user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':log2', $user_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':log3', $user_pw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //５．index.phpへリダイレクト
  header("Location: login.php");
  exit;

}
?>
