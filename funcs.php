<?php
//DB接続
function db_conn(){
    try {
        $db_name = 'gs_db3';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


// htmlspecialcharsを関数化している
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// ログインチェク処理 loginCheck()
function loginCheck(){
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()) {
        exit('LOGIN ERROR');
    } else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}