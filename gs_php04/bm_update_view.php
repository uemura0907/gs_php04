<?php
session_start();
require_once('funcs.php');

//ログインチェック関数
loginCheck();

//DB接続関数
$pdo = db_conn();
$id = $_GET['id'];

//データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_php_01 WHERE id =' . $id . ';');
$status = $stmt->execute();

//データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍登録アプリ</title>
</head>
<body>
<header>
        <nav class="navbar navbar-default">
            <div class="select">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">登録した書籍一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="POST" action="bm_update.php">
        <div class="form">
        <fieldset>
    <legend>データ1</legend>
    <p>名前：<input type="text" name="name" size="30" value="<?= h($row['name']) ?>"></p>
    <p>url  ：<input type="url" name="url" size="30" value="<?= h($row['url']) ?>"></p>
    <p>感想：<input type="text" name="comment" size="100" value="<?= h($row['comment']) ?>"></p>
    <p>日付：<input type="date" name="date" size="30" value="<?= h($row['date']) ?>"></p>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
  </fieldset>
  <p><input type="submit" value="更新"></p>
</form>

        </fieldset>
        </div>
    </form>


</body>
</html>