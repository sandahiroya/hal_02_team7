<?php
require_once 'const.php';
$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

if(!$link){
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
  require_once './tpl/error.php';
  exit;
}


mysqli_set_charset($link,'utf8');



session_start();


  
  
  
  $cart_list = [];
  $cart_img_list = [];
  for ($i=0; $i < count($_SESSION['product']); $i++) { 
    $product = mysqli_query($link,"SELECT product_id,category_id,brand_id,product_name,exhibit_price FROM product WHERE product_id =". $_SESSION['product'][$i]);
    $product_row = mysqli_fetch_assoc($product);
    //var_dump($product_row);
    if($product_row['brand_id'] == 0){
      $type = 'starter';
    }else{
      $type = 'brand';
    }
    $cart_img_list[] = $type;
    $cart_list[] = $product_row;
  }


//var_dump($cart_img_list[1]);
  //var_dump($_SESSION['product']);

  

  
require_once './tpl/product_confirmation.php';
?>