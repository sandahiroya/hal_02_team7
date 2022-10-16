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

if(isset($_SESSION['new'])){
  unset($_SESSION['new']);
  unset($_SESSION['new2']);
}
if(isset($_SESSION['old'])){
  unset($_SESSION['old']);
}


$address_list = [];
$address = mysqli_query($link,"SELECT address_id,customer_id,customer_address,address_number FROM address WHERE customer_id =" .$_SESSION['customer']);

if(!$address){
  mysqli_close($link);
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  require_once './tpl/error.php';
  exit;
}

$address_num = mysqli_num_rows($address);
//var_dump($address_num);

for ($i=0; $i < $address_num; $i++) { 
  $address_row = mysqli_fetch_assoc($address);
  $address_list[] = $address_row;
}

if(isset($_POST['radio'])){
  if($_POST['radio'] == "new" && $_POST['new'] == "" || $_POST['radio'] == "new" && $_POST['new2'] == ""){
    echo "未入力です";
  }elseif($_POST['radio'] == "old"){
    $_SESSION['old'] = $_POST['old'];
    header('Location:purchase_confirmation.php');
    exit();
  }else{
    $_SESSION['new'] = $_POST['new'];
    $_SESSION['new2'] = $_POST['new2'];
    header('Location:purchase_confirmation.php');
    exit();
  }
}

  //var_dump($address_list);
  //var_dump($_SESSION['customer']);
  //purchase_confirmation
require_once './tpl/customer_address.php';
?>