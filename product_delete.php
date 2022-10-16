<?php

session_start();

require_once 'const.php';

if(!empty($_POST['delete_comp'])){
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');

    $product_id = (int)$_GET['id'];


    $day = date('Ymd');

    $sql = "UPDATE product SET product_delet = ". $day ." WHERE product_id = ". $product_id ."";
    $result = mysqli_query($link,$sql);

    if(!$result){
        header("location: tpl/error.php");
    }

    header('location: product_delet_fin.php');


}
else{
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');



    if(!empty($_POST['delete_comp'])){
        $delete_day = date('Ymd');
        $sql = "UPDATE INTO product(product_delet) VALUE(".$delete_day .")";
        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラーです";
        }
        header('location: product_delet_fin.php');
    }


    $_SESSION['product_id'] = $_GET['id'];
    $product_id = (int)$_SESSION['product_id'];

    $sql = "SELECT product_id,category_id,brand_id,product_name,product_price,exhibit_price FROM product WHERE product_id = ". $product_id ."";
    $result = mysqli_query($link,$sql);
    $product_info = mysqli_fetch_assoc($result);



    $sql =  "SELECT category_name FROM category WHERE category_id = ". $product_info['category_id'] ."";
    $result = mysqli_query($link,$sql);
    $category = mysqli_fetch_assoc($result);




    if(!empty($product_info['brand_id'])){
        $sql = "SELECT brand_name FROM brand WHERE brand_id = ". $product_info['brand_id'] ."";
        $result = mysqli_query($link,$sql);
        $brand = mysqli_fetch_assoc($result);
    }

    $sql = "SELECT product_detail FROM exhibit WHERE product_id = ".$product_info['product_id']." ";
    $result = mysqli_query($link,$sql);
    $comment = mysqli_fetch_assoc($result);




}




require_once './tpl/product_delet.php';
