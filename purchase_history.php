<?php
require_once "const.php";
session_start();

// ログアウトの処理
if(!empty($_POST['logout'])){
    session_unset();
    header("location: login.php");
}

if(!empty($_POST['evaluation'])){
    header("location: evaluation_registration.php");
}

$user = $_SESSION['user'];

// データベース接続
$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
if(!$link){
    $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
    require_once './tpl/error.php';
    exit;
}
mysqli_set_charset($link,'utf8');


// 会員id取得
$sql = "SELECT customer_id FROM customer WHERE mail LIKE '". $user ."'";
$result = mysqli_query($link,$sql);

if(!$result){
    mysqli_close($link);
    $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
    echo $err_msg;
}

$row = mysqli_fetch_assoc($result);
$id = $row['customer_id'];
$id = (int)$id;


// 商品 ID取得
$sql = "SELECT d.product_id FROM product_order o INNER JOIN order_detail d ON o.order_id = d.order_id WHERE customer_id = ". $id ."";
$result = mysqli_query($link,$sql);

$list = [];
while($row = mysqli_fetch_assoc($result)){
    $list[] = $row;
}

$product = [];

// 商品情報取得
for($i=0;$i<count($list); $i++){
    $id = $list[$i]['product_id'];
    $id = (int)$id;
    $sql = "SELECT * FROM product WHERE product_id = ". $id ."";
    $result = mysqli_query($link,$sql);
   while($row = mysqli_fetch_assoc($result)){
        $product[] = $row;
    }
    
    $_SESSION['evaluation'] = $product[$i]['product_id'];

}


// カテゴリー名を取得
for($j=0;$j<count($product);$j++){
    $category_id = (int)$product[$j]['category_id'];

    $sql = "SELECT category_name FROM category WHERE category_id = ".$category_id."";
    $result = mysqli_query($link,$sql);
    $category_name = mysqli_fetch_assoc($result);
    $product[$j]['category_id'] = $category_name['category_name'];  
    
}

if(!empty($product[0]['brand_id'])){
    if($product[0]['brand_id']){
        // ブランド名を取得
        for($u=0;$u<count($product);$u++){
            $brand_id = (int)$product[$u]['brand_id'];

            $sql = "SELECT brand_name FROM brand WHERE brand_id = ".$brand_id."";
            $result = mysqli_query($link,$sql);
            $brand_name = mysqli_fetch_assoc($result);
            $product[$u]['brand_id'] = $brand_name['brand_name'];
        }  
    }
    
}


// echo ('<pre>');
// var_dump($product);
// echo ('</pre>');








require_once "./member_tpl/purchase_history.php";
