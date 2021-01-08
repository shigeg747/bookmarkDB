<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員登録</title>
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
    <!-- <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
        </div>
      </nav>
    </header> -->
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="form-wrapper2">
      <h1 class="form_title">会員登録必要</h1>
      <form method="post" action="logreg_insert.php">
        <dl class="form-inner">
          <dt class="form-title_reg">名前：</dt>
          <dd class="form-item_reg"><input class="input_reg" type="text" name="user_name"></dd>
          <dt class="form-title_reg">ID：</dt>
          <dd class="form-item_reg"><input class="input_reg" type="text" name="user_id"></dd>
          <dt class="form-title_reg">PASSWORD：</dt>
          <dd class="form-item_reg"><input class="input_reg" type="text" name="user_pw"></dd>
        </dl>
        <input class="sub_btn" type="submit" value="登録"><input class="sub_btn" type="reset" value="リセット"><a href="index.html"><input class="sub_btn" type="button" value="ログイン画面へ"></a>
      </form>
    </div>
  </div>
</main>
<!-- Main[End] -->


</body>
</html>
