<?php
//セッション開始
session_start();
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

require_once("funcs.php");

//接続関数
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare('SELECT
                            *
                        FROM
                            gs_php_user01
                        WHERE
                            lid = :lid
                        AND
                            lpw = :lpw;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
//if(password_verify($lpw, $val["lpw"])){ //* PasswordがHash化の場合はこっちのIFを使う
    if ($val["id"] != "") {
        //Login成功時
        $_SESSION["chk_ssid"]  = session_id();
        $_SESSION["kanri_flg"] = $val['kanri_flg'];
        $_SESSION["name"]      = $val['name'];
        header('Location: select.php');
    } else {
        //Login失敗時(Logout経由)
        header('Location: login.php');
    }
    exit();