<?php
session_start();

require_once 'const.php';

// $product_info = $product_info['product_name'];
// $product_price = $product_info['product_price'];
// $exhibit_price = $product_info['exhibit_price'];
// $detail = $detail['product_detail'];




$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
if(!$link){
    $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
    require_once './tpl/error.php';
    exit;
}
mysqli_set_charset($link,'utf8');


$_SESSION['product_id'] = $_GET['id'];
$product_id = (int)$_SESSION['product_id'];

$sql = "SELECT category_id,brand_id,product_name,product_price,exhibit_price FROM product WHERE product_id = ". $product_id ."";
$result = mysqli_query($link,$sql);
$product_info = mysqli_fetch_assoc($result);

$product_name = $product_info['product_name'];
$product_price = $product_info['product_price'];
$exhibit_price = $product_info['exhibit_price'];

// $_SESSION['product_info'] = $product_info;  

$sql =  "SELECT category_id,category_name FROM category WHERE category_id = ". $product_info['category_id'] ."";
$result = mysqli_query($link,$sql);
$category = mysqli_fetch_assoc($result);

$sql = "SELECT category_id,category_name FROM category WHERE category_name NOT IN ('". $category['category_name'] ."')";
$result = mysqli_query($link,$sql);
$category_all = mysqli_fetch_all($result);

array_unshift($category_all,$category);



if(!empty($product_info['brand_id'])){
    $sql = "SELECT brand_id,brand_name FROM brand WHERE brand_id = ". $product_info['brand_id'] ."";
    $result = mysqli_query($link,$sql);
    $brand = mysqli_fetch_assoc($result);

    $sql = "SELECT brand_id,brand_name FROM brand WHERE brand_name NOT IN ('". $brand['brand_name'] ."')";
    $result = mysqli_query($link,$sql);
    $brand_all = mysqli_fetch_all($result);
    array_unshift($brand_all,$brand);


}

$sql = "SELECT product_detail FROM exhibit WHERE product_id = ". $product_id ."";
$result = mysqli_query($link,$sql);
$detail = mysqli_fetch_assoc($result);



$product_detail = $detail['product_detail'];



// $_SESSION['detail'] = $detail;





require_once './tpl/product_change.php';

