<?php
// セッション開始
session_start();

// データベースの情報
require_once 'const.php';


// 確定ボタンを押した時
if(!empty($_POST['submit_check'])){

    // データーベース接続
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');


    // 会員idの取得
    $sql = "SELECT customer_id FROM customer WHERE mail LIKE '". $_SESSION['user'] ."'";
    $result = mysqli_query($link,$sql);
    $id = mysqli_fetch_assoc($result);

    // 会員idを数値型変更
    $id = (int)$id['customer_id'];
    

    // 商品I'dを数値に変換
    $product_id = (int)$_SESSION['c_id'];
    
    

    // コメントを変数に代入
    $comment = $_SESSION['comment']['comment'];


    // ３段階評価を変数に代入
    $three_evaluation = $_SESSION['comment']['three'];

    // 登録日取得
    $registerday = date("Ymd");



    // 登録のインサート 
    $sql = "INSERT INTO evaluation(customer_id,product_id,coment,three_evaluation,registration_date) VALUE(". $id .",". $product_id .",'". $comment ."','". $three_evaluation ."',". $registerday .")";
    $result = mysqli_query($link,$sql);


    // スタンプに情報を登録
    // 出品した会員のidを取得
    $sql = "SELECT customer_id,exhibit_id FROM exhibit WHERE product_id = ". $product_id ."";
    $result = mysqli_query($link,$sql);
    $evaluation_info = mysqli_fetch_assoc($result);
    var_dump($evaluation_info);

    // $sql = "SELECT exhibit_id FROM exhibit WHERE customer_id = ". $id ." AND product_id = ". $product_id ."";
    // $result = mysqli_query($link,$sql);
    // $exhibit_id = mysqli_fetch_assoc($result);

    $exhibit_customer = (int)$evaluation_info['customer_id'];
    $exhibit_id = (int)$evaluation_info['exhibit_id'];

    var_dump($exhibit_id);
    $stamp_day = date('Ymd');



    $sql = "INSERT INTO stamp(customer_id,exhibit_id,stamp_day) VALUE(".$exhibit_customer.",".$exhibit_id.",".$stamp_day.")";
    $result = mysqli_query($link,$sql);



    // 次のページへ飛ばす
    header("location: evaluation_fin.php");





}
// 戻るボタンを押した時
elseif(!empty($_POST['return'])){
    // 前のページに戻す
    header('location: evaluation_registration.php');
}

// 前のページから遷移した時
else{
    
    // セッションに値を代入
    $_SESSION['comment'] = $_POST;


    // ３段階評価の判別
    switch($_SESSION['comment']['three']){
        case '良い':
            $three_evaluation = "良い";
        break;
        case '普通':
            $three_evaluation = "普通";
        break;
        case '悪い':
            $three_evaluation = "悪い";
        break;


    }




}





require_once "./tpl/evaluation_check.php";