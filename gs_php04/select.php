<?php
require_once('funcs.php');

//DB接続関数
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_php_01");
$status = $stmt->execute();

$view="";
if ($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
  
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<P>";
        $view .= '<a href="bm_update_view.php?id=' . $result['id'] . '">';
        $view .= h($result['date']) . '/' . h($result['name']) . '/' . h($result['url']) . '/' . h($result['comment']);
        $view .= '</a>';
        $view .= "　";

        // 0 : true;
        // 1 : false;
        if ($_SESSION["kanri_flg"]) {
          $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r["id"] . '">';
          $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
          $view .= '</a>';
      }

        $view .= "</P>";
      }
    }
    ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク書籍一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>