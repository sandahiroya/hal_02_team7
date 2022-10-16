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


if(isset($_SESSION['old'])){
  $address = mysqli_query($link,"SELECT address_id,customer_id,customer_address,address_number FROM address WHERE address_id =" .$_SESSION['old']);
  $address_row = mysqli_fetch_assoc($address);
  $customer_address = $address_row['customer_address'];
}

if(isset($_SESSION['new'])){
  $customer_address = $_SESSION['new2'];
}


$cart_list = [];
    $cart_img_list = [];
    $price_list = [];
    for ($i=0; $i < count($_SESSION['product']); $i++) { 
      $product = mysqli_query($link,"SELECT product_id,category_id,brand_id,product_name,exhibit_price FROM product WHERE product_id =". $_SESSION['product'][$i]);
      $product_row = mysqli_fetch_assoc($product);
      if($product_row['brand_id'] == 0){
        $type = 'starter';
      }else{
        $type = 'brand';
      }
      $cart_img_list[] = $type;
      $cart_list[] = $product_row;
      $price_list[] = $product_row['exhibit_price'];
    }

$shipping_date = date("yy年m月d日");
$sold_data = date("yymd");
$arrival_date = date("yy年m月d日",strtotime("+5day"));
$delivery_day = date("yymd",strtotime("+5day"));

$money = array_sum($price_list);
  

if(isset($_POST['purchase'])){
  $order = mysqli_query($link,"SELECT * FROM product_order");
  $order_num = mysqli_num_rows($order);
  $order_num2 = $order_num + 1;

  for($p=0; $p < count($_SESSION['product']); $p++){
    $sql_a = "UPDATE product SET sold_day = ".$sold_data. " WHERE product_id =" .$_SESSION['product'][$p];
  }
  $sql_b = "INSERT INTO product_order (customer_id,order_id,order_day,pay_way,delivery_day,delivery_price,tax,sum_price) 
                              VALUES (".$_SESSION['customer'].",".$order_num2.",".$sold_data.",'".$_SESSION['payment']."',".$delivery_day.",500,100,".$money.")";

  $result = mysqli_query($link,$sql_a);

  $result2 = mysqli_query($link,$sql_b);

  
  unset($_SESSION['product']);
  if(isset($_SESSION['new'])){
    $address = mysqli_query($link,"SELECT * FROM address");
    $address_num = mysqli_num_rows($order);
    $address_num2 = $order_num + 1;
    $sql_c = "INSERT INTO address (customer_id,customer_address,address_number)
                           VALUES (".$_SESSION['customer'].",'".$_SESSION['new2']."','".$_SESSION['new']."')";
    $result3 = mysqli_query($link,$sql_c);
    var_dump($sql_c);
    var_dump($result3);
    var_dump($address_num2);

    unset($_SESSION['new']);
    unset($_SESSION['new2']);
  }
  if(isset($_SESSION['old'])){
    unset($_SESSION['old']);
  }
  header('Location:purchase_fin.php');
  exit();
}






  
require_once './tpl/purchase_confirmation.php';
?>