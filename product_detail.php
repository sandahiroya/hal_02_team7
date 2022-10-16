<?php
require_once 'const.php';
$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

if(!$link){
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
  require_once './tpl/error.php';
  exit;
}


//カートに入れるがクリックされたときにIDがGETできずエラーになるのでセッション化
session_start();
if(isset($_GET['id'])){
  $_SESSION['id'] = $_GET['id'];
}
  //var_dump($_SESSION['id']);



//if(isset($_GET['id'])){
//$id = $_GET['id'];

mysqli_set_charset($link,'utf8');
$product = mysqli_query($link,"SELECT product_id,category_id,brand_id,product_name,product_price,exhibit_price FROM product WHERE product_id =" .$_SESSION['id']);
if(!$product){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  require_once './tpl/error.php';
  exit;
}
$product_row = mysqli_fetch_assoc($product);
//var_dump($product_row);
/*
  if($product_row['brand_id'] == 0){
    $return = "starterpack.php";
  }else{
    $return = "brand_luckybag.php";
  }
*/

$product_img = mysqli_query($link,"SELECT img_id,product_id,img_name,extension FROM product_img WHERE product_id =" .$_SESSION['id']);
if(!$product_img){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  require_once './tpl/error.php';
  exit;
}

//その商品に登録されている写真の枚数(スターターの場合)
/*
  if($product_row['brand_id'] == "0"){
    $img_num = mysqli_num_rows($product_img);//現在のテーブルのデータの件数
  }else{
    $img_num = 1;
  }
*/

//var_dump($product_row['brand_id']);

/*
  if($product_row['brand_id'] == "0"){
    $img = $img_list[$i];
    //$img =  $img_list[$i]['img_name']."." . $img_list[$i]['extension'];
  //var_dump($img);
  }else{
    $img = $product_row['category_id'] . '.jpg';
  }
*/

$exhibit = mysqli_query($link,"SELECT customer_id,product_id,request_id,exhibit_id,exhibit_comp_day,product_detail FROM exhibit WHERE product_id =" .$_SESSION['id']);
$exhibit_num = mysqli_num_rows($exhibit);
if(!$exhibit){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  require_once './tpl/error.php';
  exit;
}
$detail_list = [];
for($g=0; $g < $exhibit_num; $g++){
  $exhibit_row = mysqli_fetch_assoc($exhibit);
  $detail_list[] = $exhibit_row['product_detail'];
}


$category = mysqli_query($link,"SELECT category_id,category_name FROM category WHERE category_id =" .$product_row['category_id']);
if(!$category){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  require_once './tpl/error.php';
  exit;
}
$category_row = mysqli_fetch_assoc($category);


if(isset($product_row['brand_id'])){
  $brand = mysqli_query($link,"SELECT category_id,brand_id,brand_name FROM brand WHERE brand_id =" .$product_row['brand_id']);
  if(!$brand){
    mysqli_close($link);
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
    //require_once './tpl/error.php';
    exit;
  }
  $brand_row = mysqli_fetch_assoc($brand);
  $msg = 'ブランド：';
  $msg2 = $brand_row['brand_name'];
  $img_num = 1;
  $return = "brand_luckybag.php";
  }else{
    $msg = '';
    $msg2 = '';
    $img_num = mysqli_num_rows($product_img);//現在のテーブルのデータの件数
    $return = "starterpack.php";
  }
//}

//その商品の写真が格納されている配列(スターターの場合)
$img_list = [];
for ($z=0; $z < $img_num; $z++) { 
  $img_row = mysqli_fetch_assoc($product_img);
  $img_list[] = $img_row['img_name'].".". $img_row['extension'];
}



mysqli_close($link);

//セッションの消去
//unset($_SESSION['product']);

//カートに入れる
//var_dump($_SESSION['product']);

//カートへ入れるが押されたら
if(isset($_POST['cart'])){
  //カートに商品が存在していたら
  if(isset($_SESSION['product'])){
    //カートに入れようとした商品がすでにある商品と重複していないかの確認
    $check = array_search($_POST['cart'], $_SESSION['product']);
    if($check !== false){
      echo "この商品はすでに登録されています";
    }else{
      $_SESSION['product'][] = $_POST['cart'];
    }
  }else{
    $_SESSION['product'] = [];
    $_SESSION['product'][] = $_POST['cart'];
  }
}



/*
 //失敗
  if(isset($_POST['cart'])){
  //session_start();
  if(isset($_SESSION['product'])){

    if($_POST['cart'] == $_SESSION['product'][$k]){
      echo "この商品はすでに登録されています";
    }
  for($k = 1; $k < count($_SESSION['product']); $k++){
      //var_dump($_POST['cart']);
      //var_dump($_SESSION['product'][0]);
    elseif($_POST['cart'] == $_SESSION['product'][$k]){
        echo "この商品はすでに登録されています";
      break;
      }
    else{
        $_SESSION['product'][] = $_POST['cart'];
      //break;
      }
    //break;
    
  else{
    $_SESSION['product'] = [];
    $_SESSION['product'][] = $_POST['cart'];
  }
  //var_dump($_SESSION['product']);
}
*/


require_once 'tpl/product_detail.php';
?>