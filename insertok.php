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

//----カテゴリーID作成----//
$category_id = $_POST["category"]; //カテゴリーid取得
$category_id = intval($category_id);

//--------------------------------[商品INSERT処理]--------------------------------//
//----商品INSERT素材----//
$title = $_POST["title"]; //商品タイトル取得
$price = $_POST["price"]; //商品値段取得
$exhibit_price = $_POST["price_t"]; //商品手数料
$day = date("Ymd"); //出品日

//----商品追加INSERT----//
$insert = "INSERT INTO product(product_id,category_id,product_name,product_price,exhibit_price,registration_date)
VALUES(" . $sql_product . "," . $category_id . ",'" . $title . "'," . $price . "," . $exhibit_price . "," . $day . ")"; //カテゴリーidをINSERT構文作成

$result = mysqli_query($link,$insert);

if(!$result){
    echo "エラー1";
}

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


// //--------------------------------[商品画像処理]--------------------------------//
// //----画像----//
$faile = $_FILES["upload_file"];
$img = $faile; //商品画像を受け取る
$img_ex = explode('.', $img['name']); //分割
$img_ex[1]; //拡張子だけ
// //INSERT構文生成

// //----画像id----//
$sql_count = "SELECT COUNT(*) FROM product_img"; //画像idをカウントする構文生成
$sql_query = mysqli_query($link, $sql_count); //画像カウントを実行

if(!$result){
    echo "エラー5";
}

$count = mysqli_fetch_assoc($sql_query); //一行取得
$count_new = $count["COUNT(*)"] + 1; //画像カウントし+1

// //----画像名前----//
$sql = "SELECT COUNT(product_id) FROM product_img WHERE product_id = ".$sql_product."";
$result = mysqli_query($link,$sql);

if(!$result){
    echo "エラー6";
}

$new_id = mysqli_fetch_assoc($result);

$new_id = (int)$new_id['COUNT(product_id)'];
$new_id = $new_id + 1;


$new_id = "".$sql_product."_". $new_id."";



// //----商品id----//
$sql_product; //商品id

// //----拡張子----//
$img_ex[1]; //画像拡張子

// //----画像INSERT----//
$sql = "INSERT INTO product_img(img_id,product_id,img_name,extension)
VALUES(".$count_new.",".$sql_product.",'".$new_id."','".$img_ex[1]."')"; //INSERT構文

// //INSERT実行
$result = mysqli_query($link,$sql);
if(!$result){
    echo "エラー7";
}

// 画像情報を取得
// $faile = $_FILES["upload_file"];
// ファイルの名前取得
$name = IMG_PATH."".$new_id.".".$img_ex[1]."";
// var_dump($name);
// //--------------------------------[画像処理]--------------------------------//
if (!empty($faile)) { //画像入っているか判定
     //画像ファイル名を保存
    move_uploaded_file($faile['tmp_name'],$name);
    
} else {
    $faile = "ファイル写真選定されていません"; //画像選定メッセージ
};



require_once 'tpl/insertok.php';







// session_destroy();
