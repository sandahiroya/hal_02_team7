<?php
require_once "const.php";

session_start();


if(!empty($_SESSION['change'])){
    
    // DBの情報をconstから取ってくる
    require_once "./const.php";
    

    // $name = $_POST['name'];
    // if(empty($name)){
    //     echo "からです";
    // }

    // registrationからの情報を変数に代入
    $fam_name = $_SESSION['change']['fam_name'];
    $name = $_SESSION['change']['name'];
    $fam_name_ruby = $_SESSION['change']['fam_name_ruby'];
    $name_ruby = $_SESSION['change']['name_ruby'];
    $zip_code = $_SESSION['change']['zipcode'];
    $address = $_SESSION['change']['address'];
    $gender = $_SESSION['change']['gender'];
    $birthday = $_SESSION['change']['birthday'];
    $phone_number = $_SESSION['change']['number'];
    $mail_address = $_SESSION['change']['mail'];
    $password = $_SESSION['change']['password'];
}
else{

    $user_name = $_SESSION['user'];

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


require_once "./member_tpl/member_datachange.php";
