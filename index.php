<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<body>

<main class="main">
  <div class="container">
    <!-- Head[Start] -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="select.php">データ一覧</a>
            <a class="navbar-brand" href="index.php">データ登録</a>
            <a class="navbar-brand" href="index.html">ログアウト</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="form-wrapper_select">
      <h1 class="form_title">ゲーム登録</h1>
      <form method="post" action="insert.php">
        <dl class="form-inner">
            <dt class="form-title_select">種類を選択：</dt>
            <dd class="form-item_select"><select name="type" id="type" class="select border_none" required>
            <option class="search_item" data-group="パズル" value="パズル">パズル</option>
            <option class="search_item" data-group="テーブル" value="テーブル">テーブル</option>
            <option class="search_item" data-group="タイピング" value="タイピング">タイピング</option>
            <option class="search_item" data-group="その他" value="その他">その他</option>
            </select></dd>
            <dt class="form-title_select">ゲームタイトル：</dt>
            <dd class="form-item"><input class="input" type="text" name="title" required></dd>
            <dt class="form-title_select">URL：</dt>
            <dd class="form-item"><input class="input" type="text" name="url" required></dd>
        </dl>
        <input class="sub_btn" type="submit" value="送信"><input class="sub_btn" type="reset" value="リセット">
      </form>
    </div>
  </div>
</main>
<!-- Main[End] -->


</body>
</html>
