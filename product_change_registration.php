<?php
session_start();

require_once 'const.php';

if(!empty($_POST['change'])){

    $_SESSION['update'] = $_POST;
    
    $product_name = $_POST['product_name'];
    $product_price = (int)$_POST['product_price'];
    $exhibit_price = (int)$_POST['exhibit_price'];
    $category_id = (int)$_POST['category'];
    if(!empty($_POST['brand'])){
        $brand_id = (int)$_POST['brand'];
    }
    $comment = $_POST['comment'];


    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');

    $sql = "SELECT category_name FROM category WHERE category_id = ". $category_id ."";
    $result = mysqli_query($link,$sql);
    $category = mysqli_fetch_assoc($result);

    if(!empty($_POST['brand'])){
        $sql = "SELECT brand_name FROM brand WHERE brand_id = ". $brand_id ."";
        $result = mysqli_query($link,$sql);
        $brand = mysqli_fetch_assoc($result);
    }
    
    



}
elseif(!empty($_POST['change_comp'])){
    // var_dump($_SESSION['update']);
    var_dump($_SESSION['product_id']);

    $product_id = (int)$_SESSION['product_id'];
    $product_name = $_SESSION['update']['product_name'];
    $category_id = (int)$_SESSION['update']['category'];
    $brand_id = (int)$_SESSION['update']['brand'];
    $product_price = (int)$_SESSION['update']['product_price'];
    $exhibit_price = (int)$_SESSION['update']['exhibit_price'];
    $product_detail = $_SESSION['update']['comment'] ;

    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');


    $sql = "UPDATE product SET product_name = '". $product_name ."',product_price = ".$product_price.",exhibit_price = ".$exhibit_price." WHERE product_id = ".$product_id."";
    $result = mysqli_query($link,$sql);
    var_dump($result);
    $sql = "UPDATE exhibit SET product_detail = '". $product_detail ."' WHERE product_id = ". $product_id ."";
    $result = mysqli_query($link,$sql);
    var_dump($result);





  header('location: product_change_fin.php');
}else{

    echo "エラーです";
}

require_once './tpl/product_change_registration.php';

