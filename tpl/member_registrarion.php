<?php
session_start();


if(isset($_POST['submit']) && empty($_POST['fam_name']) || isset($_POST['submit']) && empty($_POST['name']) || isset($_POST['submit']) && empty($_POST['fam_name_ruby']) || isset($_POST['submit']) && empty($_POST['name_ruby'])){
    $empty =  "名前で入力されていない部分があります";
    
}
elseif(isset($_POST['submit']) && empty($_POST['zipcode']) || isset($_POST['submit']) && empty($_POST['address'])){
    $empty = "住所で未入力の部分があります";
    

}
elseif(isset($_POST['submit']) && empty($_POST['gender']) || isset($_POST['submit']) && empty($_POST['birthday']) || isset($_POST['submit']) && empty($_POST['number']) || isset($_POST['submit']) && empty($_POST['mail']) || isset($_POST['submit']) && empty($_POST['password'])){
    $empty = "未入力の部分があります";
  

}
elseif(isset($_POST['submit']) && (strlen($_POST['fam_name']) >= 20) || isset($_POST['submit']) && (strlen($_POST['name']) >= 20)){
    $empty = "名前が長すぎます";
    
}
elseif(isset($_POST['submit']) && (strlen($_POST['fam_name_ruby']) >= 30) || isset($_POST['submit']) && (strlen($_POST['name_ruby']) >= 30)){
    $empty = "ふりがなが長すぎます";
}
elseif(isset($_POST['submit']) && (strlen($_POST['mail']) >= 30)){
    $empty = "メールアドレスが長すぎます";
}
elseif(isset($_POST['submit']) && (strlen($_POST['zipcode']) >= 9)){
    $empty = "郵便番号が長いです";
}
elseif(isset($_POST['submit'])){
    $_SESSION['join'] = $_POST;
    // header('location: member_confirmation.php');

}

elseif(!empty($_SESSION['join'])){
    


    // registrationからの情報を変数に代入
    $fam_name = $_SESSION['join']['fam_name'];
    $name = $_SESSION['join']['name'];
    $fam_name_ruby = $_SESSION['join']['fam_name_ruby'];
    $name_ruby = $_SESSION['join']['name_ruby'];
    $zip_code = $_SESSION['join']['zipcode'];
    $address = $_SESSION['join']['address'];
    $gender = $_SESSION['join']['gender'];
    $birthday = $_SESSION['join']['birthday'];
    $phone_number = $_SESSION['join']['number'];
    $mail_address = $_SESSION['join']['mail'];
    $password = $_SESSION['join']['password'];
}
else{

}



// HTMLの情報を取ってくる
require_once "./member_tpl/member_registrarion.php";

