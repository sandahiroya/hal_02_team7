<?php

session_start();

require_once "const.php";



$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );

// 接続が失敗した時のメッセージ
if(!$link){
    $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
    // require_once './tpl/error.php';
    exit;
}
mysqli_set_charset($link,'utf8');


$sql = "SELECT customer_id FROM customer WHERE mail LIKE '". $_SESSION['user'] ."'";
$result = mysqli_query($link,$sql);
$customer_id = mysqli_fetch_assoc($result);
$customer_id = (int)$customer_id;




$sql = "SELECT COUNT(*) FROM stamp WHERE customer_id = ". $customer_id ."";
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


require_once "./member_tpl/stamp.php";


