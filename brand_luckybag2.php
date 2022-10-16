<?php
require_once 'const.php';
$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

if(!$link){
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
  require_once './tpl/error.php';
  exit;
}


mysqli_set_charset($link,'utf8');
$product = mysqli_query($link,"SELECT product_id,category_id,brand_id,product_name FROM product WHERE brand_id != 0");
$category = mysqli_query($link,"SELECT category_id,category_name FROM category");
//$brand = mysqli_query($link,"SELECT category_id,brand_id,brand_name FROM brand");




//検索機能
if(isset($_POST['sea4']) && $_POST['sea3'] != "" ){
  $product = mysqli_query($link,"SELECT product_id,category_id,brand_id,product_name FROM product WHERE brand_id != 0 AND product_name LIKE '%".$_POST['sea']."%'");
}


if(!$product){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  require_once './tpl/error.php';
  exit;
}


//$product_row = mysqli_fetch_assoc($product);
//$product_list[] = $product_row;
 
$product_num = mysqli_num_rows($product);//現在のテーブルのデータの件数

$product_list = [];
for ($i=0; $i < $product_num; $i++) { 
  $product_row = mysqli_fetch_assoc($product);
  $product_list[] = $product_row;
}

$category_num = mysqli_num_rows($category);//現在のテーブルのデータの件数
$category_list = [];
for ($i=0; $i < $category_num; $i++) { 
  $category_row = mysqli_fetch_assoc($category);
  $category_list[] = $category_row;
}

$brand_list = [];
for ($h=1; $h < $category_num + 1; $h++){
  $brand = mysqli_query($link,"SELECT category_id,brand_id,brand_name FROM brand WHERE category_id =" .$h);
  $brand_num = mysqli_num_rows($brand);//現在のテーブルのデータの件数
  $brand_list2 = [];
  for ($i=0; $i < $brand_num ; $i++) { 
    $brand_row = mysqli_fetch_assoc($brand);
    $brand_list2[] = $brand_row;
  }
  $brand_list[] = $brand_list2;
}
//var_dump($brand_list[0][0]);
//var_dump($product_list);
mysqli_close($link);

//var_dump($row);



include_once('Paging.php');

//オブジェクトを生成
$pageing = new Paging();
//1ページ毎の表示数を設定
//$pageing -> count = 5;
//全体の件数を設定しhtmlを生成
$pageing -> setHtml(47);

require_once './tpl/starterpack.php';
?>