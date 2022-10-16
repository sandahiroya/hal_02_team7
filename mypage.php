<?php
require_once "const.php";
session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}
// var_dump($_SESSION['user']);

if(!empty($_POST['logout'])){
    session_unset();
    header("location: login.php");
}


if(!empty($_POST['top'])){
    header('location: brand_luckybag.php');
}

$user_name = $_SESSION['user'];

// DBに接続
$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );

// 接続が失敗した時のメッセージ
if(!$link){
    $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
    // require_once './tpl/error.php';
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
    $_SESSION['customer'] = $user[0]['customer_id'];
}
//var_dump($_SESSION['customer']);

// 住所の情報を入れるための配列
$address = [];

// SQL文作成と実行
$sql = "SELECT * FROM address WHERE customer_id = " . $user[0]['customer_id'] . "";
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


// スタンプ情報

$sql = "SELECT COUNT(*) FROM stamp WHERE customer_id = ". $user[0]['customer_id']."";
$result = mysqli_query($link,$sql);
$stamp = mysqli_fetch_assoc($result);

$stamp = (int)$stamp['COUNT(*)'];




// 画像情報取得
switch($stamp){
    case 1:
        $stamp_img = "stanp_1.PNG";
    break;
    case 2:
        $stamp_img = "stanp_2.PNG";
    break;
    case 3:
        $stamp_img = "stanp_3.PNG";
    break;
    case 4:
        $stamp_img = "stanp_4.PNG";
    break;
    case 5:
        $stamp_img = "stanp_5.PNG";
    break;
    case 6:
        $stamp_img = "stanp_6.PNG";
    break;
    case 7:
        $stamp_img = "stanp_7.PNG";
    break;
    case 8:
        $stamp_img = "stanp_8.PNG";
    break;
    case 9:
        $stamp_img = "stanp_9.PNG";
    break;
    case 10:
        $stamp_img = "stanp_10.PNG";
    break;
    default:
        $stamp_img = "stanp_tmp.PNG";
    break;
}





require_once "./member_tpl/mypage.php";