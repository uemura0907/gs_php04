<?php
require_once('funcs.php');

//POSTデータ取得
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$date = $_POST['date'];

//DB接続関数
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO gs_php_01(id, name, url, comment, date)VALUES(NULL, :name, :url, :comment, sysdate())");

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
  }else{
    header('Location: index.php');

}
?>

