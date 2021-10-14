<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//DB接続関数：db_conn() 

function db_conn() {
    try {
        $db_name = 'gs_php_db01';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}
//リダイレクト関数: redirect($file_name)
function redirect($file_name) {
    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck()

function loginCheck(){
    // 以下、セッションID持ってたら、ok
    if ($_SESSION['chk_ssid'] == session_id()) {
        // ok
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    } else {
        // id持ってない or idがおかしい
        exit("LOGIN ERROR");
    }
}