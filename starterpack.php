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

if(isset($_GET['aaa'])){
  unset($_SESSION['c_id']);
  unset($_SESSION['sea']);
}

if(isset($_GET['c_id'])){
  $_SESSION['c_id'] = $_GET['c_id'];
  if(isset($_SESSION['sea'])){
    unset($_SESSION['sea']);
  }
}




if(isset($_POST['sea2']) && $_POST['sea'] == "" ){
  if(isset($_SESSION['c_id'])){
    unset($_SESSION['c_id']);
  }
}

if(isset($_POST['sea2']) && $_POST['sea'] != ""){
  $_SESSION['sea'] = $_POST['sea'];
}


//検索機能
/*
if(isset($_POST['sea2']) && $_POST['sea'] != "" ){
  $product = mysqli_query($link,"SELECT * FROM product WHERE brand_id = 0 AND product_name LIKE '%".$_POST['sea']."%'");
}
*/

//ページング
    //件数取得
    //$product_row = mysqli_fetch_assoc($product);
    
   // $display = 5;
   // $max_page =ceil($product_row/$display);
    //if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
      //  $now = 1; // 設定されてない場合は1ページ目にする
   // }else {
     //   $now = $_GET['page_id'];
   // }
   // $start_no = ($now - 1) * $display;
    //５つのデータをとる
 //        /*DBから参照*/
    //$result = mysqli_query($link, "SELECT * FROM product
 //WHERE LIMIT " . $start_no .",5");


 //$vvv = "SELECT * FROM product WHERE brand_id = 0 AND product_name LIKE '%".$_POST['sea']."%'AND category_id = .$_SESSION['c_id']. LIMIT " . $start_no .",5"




if(isset($_SESSION['c_id'])){
  if(isset($_POST['sea2']) && $_POST['sea'] != "" || isset($_SESSION['sea']) && $_SESSION['sea'] != ""  && !isset($_POST['sea2']) ){
    //検索窓に文字を入力した  かつ  検索ボタンが押された。 または  検索のセッションが残っている。
    //$_SESSION['sea'] = $_POST['sea'];
    $page = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS NULL AND product_delet IS NULL AND brand_id IS NULL  AND product_name LIKE '%".$_SESSION['sea']."%'AND category_id = ".$_SESSION['c_id']);
    $page_num = mysqli_num_rows($page);//現在のテーブルのデータの件数
    $display = 9;
    $max_page =ceil($page_num/$display);
    if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
        $now = 1; // 設定されてない場合は1ページ目にする
    }else {
        $now = $_GET['page_id'];
    }
    $start_no = ($now - 1) * $display;
    $product = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL AND product_name LIKE '%".$_SESSION['sea']."%'AND category_id = ".$_SESSION['c_id'] ."  LIMIT " . $start_no .",9");
    //var_dump($product);

  }elseif(isset($_POST['sea2']) && $_POST['sea'] == "" ){
    //検索窓に文字を入力せずに検索ボタンが押された。
    unset($_SESSION['sea']);
    $page = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL  AND category_id = ".$_SESSION['c_id']);
    $page_num = mysqli_num_rows($page);//現在のテーブルのデータの件数
    $display = 9;
    $max_page =ceil($page_num/$display);
    if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
        $now = 1; // 設定されてない場合は1ページ目にする
    }else {
        $now = $_GET['page_id'];
    }
    $start_no = ($now - 1) * $display;
    $product = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL  AND category_id = ".$_SESSION['c_id'] ." LIMIT " . $start_no .",9");

  }else{
    $page = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL  AND category_id = ".$_SESSION['c_id']);
    $page_num = mysqli_num_rows($page);//現在のテーブルのデータの件数
    $display = 9;
    $max_page =ceil($page_num/$display);
    if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
        $now = 1; // 設定されてない場合は1ページ目にする
    }else {
        $now = $_GET['page_id'];
    }
    $start_no = ($now - 1) * $display;
    $product = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL  AND category_id = ".$_SESSION['c_id'] ." LIMIT " . $start_no .",9");
    //var_dump($product);
  }


}else{
  if(isset($_POST['sea2']) && $_POST['sea'] != "" || isset($_SESSION['sea']) && $_SESSION['sea'] != ""  && !isset($_POST['sea2']) ){
    // 検索窓に文字を入力した  かつ  検索ボタンが押された。
    //または検索のセッションが残っている かつ  検索ボタンが押されてない
    /*
    if(!isset($_SESSION['sea'])){
      $_SESSION['sea'] = $_POST['sea'];
    }
    */
    $page = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS NULL AND product_delet IS NULL AND brand_id IS NULL  AND product_name LIKE '%".$_SESSION['sea']."%'");
    $page_num = mysqli_num_rows($page);//現在のテーブルのデータの件数
    $display = 9;
    $max_page =ceil($page_num/$display);
    if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
        $now = 1; // 設定されてない場合は1ページ目にする
    }else {
        $now = $_GET['page_id'];
    }
    $start_no = ($now - 1) * $display;
    $product = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL AND product_name LIKE '%".$_SESSION['sea']."%' LIMIT " . $start_no .",9");
    //var_dump($product);
  }elseif(isset($_POST['sea2']) && $_POST['sea'] == "" ){
    //検索窓に文字を入力せずに検索ボタンが押された。
    unset($_SESSION['sea']);
    $page = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL ");
    $page_num = mysqli_num_rows($page);//現在のテーブルのデータの件数
    $display = 9;
    $max_page =ceil($page_num/$display);
    if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
        $now = 1; // 設定されてない場合は1ページ目にする
    }else {
        $now = $_GET['page_id'];
    }
    $start_no = ($now - 1) * $display;
    $product = mysqli_query($link,"SELECT * FROM product WHERE sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL  LIMIT " . $start_no .",9");

  }else{
    //検索していない状態
    $page = mysqli_query($link,"SELECT * FROM product WHERE  sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL ");
    $page_num = mysqli_num_rows($page);//現在のテーブルのデータの件数
    //var_dump($page);
    $display = 9;
    $max_page =ceil($page_num/$display);
    if(!isset($_GET['page_id'])){ // $_GET['id'] はURLに渡された現在のページ数
        $now = 1; // 設定されてない場合は1ページ目にする
    }else {
        $now = $_GET['page_id'];
    }
    $start_no = ($now - 1) * $display;
    $product = mysqli_query($link,"SELECT * FROM product WHERE  sold_day IS  NULL AND product_delet IS  NULL AND brand_id IS NULL  LIMIT " . $start_no .",9" );
    //var_dump($product);
  }
}



//unset($_SESSION['c_id']);




$category = mysqli_query($link,"SELECT category_id,category_name FROM category");
//$brand = mysqli_query($link,"SELECT category_id,brand_id,brand_name FROM brand");


//var_dump($_POST['sea']);

//検索機能
/*
if(isset($_POST['sea2']) && $_POST['sea'] != "" ){
  $product = mysqli_query($link,"SELECT * FROM product WHERE brand_id = 0 AND product_name LIKE '%".$_POST['sea']."%'");
}
*/

if(!$product){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：10400)';
  require_once './tpl/error.php';
  exit;
}


//$product_row = mysqli_fetch_assoc($product);
//$product_list[] = $product_row;
 
$product_num = mysqli_num_rows($product);//現在のテーブルのデータの件数
//var_dump($product_num);



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


if(isset($_GET['c_id'])){
  $c_id = $_GET['c_id'];
  $c_num = intval($c_id);
  $msg = $category_list[$c_num - 1]['category_name'];
  //var_dump($c_num);
}

if(isset($_SESSION['c_id'])){
  $c_id = $_SESSION['c_id'];
  $c_num = intval($c_id);
  $msg = $category_list[$c_num - 1]['category_name'];
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




//var_dump($row);


mysqli_close($link);




require_once './tpl/starterpack.php';
?>