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

if(isset($_POST['payment'])){
  $_SESSION['payment'] = $_POST['payment'];
  header('Location: customer_address.php');
}
//var_dump($_SESSION['payment']);


require_once './tpl/payment.php';
?>