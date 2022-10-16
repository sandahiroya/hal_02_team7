<?php
session_start(); //セッションスタート
//--------------------------------[DB接続]--------------------------------//
//----DB接続----//
require_once "const.php";
$link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
mysqli_set_charset($link, 'utf8'); //文字コード設定

//--------------------------------[ID処理]--------------------------------//
//----商品ID作成----//
$sql = "select COUNT(*) FROM product"; //productのidを全件カウント構文
$sql_query = mysqli_query($link, $sql); //productのidを全件カウント処理実行
$sql_assoc = mysqli_fetch_assoc($sql_query); //数えたid一行取得
$sql_product = $sql_assoc["COUNT(*)"] + 1; //数えたid+1

//----ブランドID作成----//
$brand_id = $_POST["brand"]; //ブランドid取得
$brand_id = intval($brand_id);

//--------------------------------[カテゴリーid処理]--------------------------------//
$category_sql = "SELECT category_id FROM brand WHERE brand_id = " . $brand_id . "";
$brand_query = mysqli_query($link, $category_sql);
$category = mysqli_fetch_assoc($brand_query);
$category_id = intval($category);

//--------------------------------[商品INSERT処理]--------------------------------//
//----商品INSERT素材----//
$title = $_POST["title"]; //商品タイトル取得
$price = $_POST["price"]; //商品値段取得
$price = intval($price);
$exhibit_price = $_POST["price_t"]; //商品手数料
$exhibit_price = intval($exhibit_price);
$day = date("Ymd"); //出品日

//----商品追加INSERT----//
$insert = "INSERT INTO product(product_id,category_id,brand_id,product_name,product_price,exhibit_price,registration_date)
VALUES(" . $sql_product . "," . $category_id . "," . $brand_id . ",'" . $title . "'," . $price . "," . $exhibit_price . "," . $day . ")"; //カテゴリーidをINSERT構文作成
$insert_query = mysqli_query($link, $insert);



//--------------------------------[商品詳細INSERT処理]--------------------------------//
//----商品詳細id素材----//
$a = $_SESSION["user"];

// 会員idを取得
$sql = "SELECT customer_id FROM customer WHERE mail LIKE '". $a ."'";
$result = mysqli_query($link,$sql);

if(!$result){
    echo "エラー2";
}

$customer_id = mysqli_fetch_assoc($result);
// 会員I'dをint型に変更
$customer_id = (int)$customer_id['customer_id'];


// //会員の情報メールアドレスで絞りこむ構文作成
// //----商品詳細INSERT素材----//
$produot = $_POST["produot"]; //商品詳細受けとる

// 出品件数を取得してそこから出品idを取得する
$sql = "SELECT COUNT(exhibit_id) FROM exhibit";
$result = mysqli_query($link,$sql);

if(!$result){
    echo "エラー3";
}

$exhibit_id = mysqli_fetch_assoc($result);

// 出品I'dをint型に変更
$exhibit_id = (int)$exhibit_id['COUNT(exhibit_id)'];
$exhibit_id = $exhibit_id + 1;



$sql = "INSERT INTO exhibit(customer_id,product_id,exhibit_id,product_detail,exhibit_comp_day)
VALUES(".$customer_id.",".$sql_product.",".$exhibit_id.",'".$produot."',".$day.")"; //商品詳細INSERT構文生成

// INSERT実行
mysqli_query($link, $sql); //カテゴリ-id実行

if(!$result){
    echo "エラー4";
}


// //--------------------------------[商品詳細INSERT処理]--------------------------------//
// //----商品詳細id素材----//
// // $a = $_SESSION["user"];
// // var_dump($a);
// // //会員の情報メールアドレスで絞りこむ構文作成
// // //----商品詳細INSERT素材----//
// // $produot = $_POST["produot"]; //商品詳細受けとる

// // "INSERT INTO exhibit()
// // VALUES()"; //商品詳細INSERT構文生成
// //INSERT実行
// // mysqli_query($link, $brand_id); //カテゴリ-id実行

// session_destroy();

require_once 'tpl/brandok.php';
