<?php
session_start();

require_once "const.php";

$user_name = $_SESSION['user'];

if(!empty($_POST['submit_comp'])){

    $delete_day = date("Ymd");

    // DBに接続
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );

    // 接続が失敗した時のメッセージ
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');

    $sql = "UPDATE customer SET customer_delete = ". $delete_day ." WHERE mail = '".$user_name."'";
    var_dump($sql);
    $result = mysqli_query($link,$sql);

    if(!$result){
        echo "DBエラー";
    }
    
    header("location: member_delete_fin.php");

}
else{
    // DBに接続
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );

    // 接続が失敗した時のメッセージ
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');


    // SQL文作成と実行
    $sql = "SELECT * FROM customer WHERE mail LIKE '" . $user_name . "'";
    $result = mysqli_query($link,$sql);

    // 失敗した時のメッセージ
    if(!$result){
        mysqli_close($link);
        $err_msg = "よきせぬエラーが発生しました。しばらく経ってから再度お試しください。(102)";
        echo $err_msg;
        exit;
    }

    // 取ってきた会員情報を入れるための配列
    $user = [];

    // 取ってきた情報を入れる
    while($row = mysqli_fetch_assoc($result)){
        $user[] = $row;
    }

    // 住所取得のために会員idを変数へ
    $id = $user[0]['customer_id'];

    // 住所の情報を入れるための配列
    $address = [];

    // SQL文作成と実行
    $sql = "SELECT * FROM address WHERE customer_id = " . $id . "";
    $result = mysqli_query($link,$sql);

    // エラーメッセージ表示させる時の処理
    if(!$result){
        mysqli_close($link);
        $err_msg = "よきせぬエラーが発生しました。しばらく経ってから再度お試しください。(102)";
        echo $err_msg;
        exit;
    }

    // 会員住所を配列に格納
    while($row = mysqli_fetch_assoc($result)){
        $address[] = $row;
    }
}

require_once("./member_tpl/member_delete.php");
