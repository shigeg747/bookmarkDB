<?php

session_start();
include("funcs.php");
loginCheck();

//1. DB接続します
$pdo = db_connect();
// try {
//   $pdo = new PDO('mysql:dbname=shigeg_ccdb;charset=utf8;host=mysql1030.db.sakura.ne.jp','shigeg','YumemigaChina1467GeRuGugu');
// } catch (PDOException $e) {
//   exit('DbConnectError:'.$e->getMessage());
// }


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM oyaji_dc_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("エラー:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= '<a href="u_view.php?id='.$result["id"].'">';
    $view .= $result["type"].":".$result["title"];
    $view .= "</a>";
    $view .= ' ';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= "</p>";
  }

}
 //Selectデータの数だけ自動でループしてくれる
 $kid = "";
  $query = "SELECT * FROM oyaji_dc_table";
  $result = $pdo->query($query);
  foreach ($result as $row) {
    // $kid .= "<tr>";
    // $kid .= "<td class='list_item'>".$row['type']."</td>";
    // $kid .= "<td class='list_item'>".$row['word']."</td>";
    // $kid .= "<td class='list_item'>".$row['comment']."</td>";
    // $kid .= "<td class='list_item'>";
    // $kid .= '<a class="aaa" href="delete.php?id='.$row['id'].'">';
    // $kid .= '削除';
    // $kid .= '</a>'."</td>";
    // $kid .= "</tr>";
    $kid .= "<tr>";
    $kid .= "<td class='list_item' data-group=".$row['type'].">".$row['type']."</td>";
    $kid .= "<td class='list_item' data-group=".$row['type'].">".$row['title']."</td>";
    $kid .= "<td class='list_item' data-group=".$row['type'].">";
    $kid .= '<a class="aaa" href="'.$row['url'].'"target="_blank">';
    $kid .= $row['url']."</td>";
    $kid .= "<td class='list_item' data-group=".$row['type'].">";
    $kid .= '<a class="aaa" href="delete.php?id='.$row['id'].'">';
    $kid .= '削除';
    $kid .= '</a>'."</td>";
    $kid .= "</tr>";
  }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MyGame</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/main.css">

</head>
<body>
<main class="main">
  <div class="container">

    <!-- Head[Start] -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid" style="position:relative;">
          <div class="navbar-header">
            <a class="navbar-brand aaa" href="select.php">データ一覧</a>
            <a class="navbar-brand aaa" href="index.php">データ登録</a>
            <a class="navbar-brand aaa" href="logout.php">ログアウト</a>
            <p class="name"  style="position:absolute; right:10px; color:black;"><?=$_SESSION["user_name"]?> 様</p>
          </div>
        </div>
      </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="search">
      <p class="padcenter">絞り込み検索</p>
      <span class="text_row">
        <span class="padcenter">種類：</span>
        <p><select class="text_row" name="find" id="find">
          <option class="search_item is-active" data-group="" value="すべて">すべて</option>
          <option class="search_item" data-group="パズル" value="パズル">パズル</option>
          <option class="search_item" data-group="テーブル" value="テーブル">テーブル</option>
          <option class="search_item" data-group="タイピング" value="タイピング">タイピング</option>
          <option class="search_item" data-group="その他" value="その他">その他</option>
        </select></p>
      </span>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th class="txcenter">種類</th>
          <th class="txcenter">ゲームタイトル</th>
          <th class="txcenter">URL</th>
          <th class="txcenter">削除</th>
        </tr>
      </thead>
      <tbody>
        <?=$kid?>
      </tbody>
    </table>

  </div>
</main>

<!-- Main[End] -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
