<?php
session_start();
require_once "const.php";

if(!empty($_POST['submit'])){
   if($_POST['gender'] === 'male'){
        $gender = "男";
    }
    else{
        $gender = "女";
    }

    $_SESSION['change'] = $_POST; 



}
else if($_POST['submit_comp']){
    // var_dump($_SESSION['change']);
    $fam_name = $_SESSION['change']['fam_name'];
    $name = $_SESSION['change']['name'];
    $fam_name_ruby = $_SESSION['change']['fam_name_ruby'];
    $name_ruby = $_SESSION['change']['name_ruby'];
    $zip_code = $_SESSION['change']['zipcode'];
    $address = $_SESSION['change']['address'];
    $birthday = $_SESSION['change']['birthday'];
    $mail = $_SESSION['change']['mail'];
    $number = $_SESSION['change']['number'];
    if(!empty($_SESSION['change']['password'])){
        $password = $_SESSION['change']['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
    }
    
    if($_SESSION['change']['gender']){
        $gender = "男";
    }
    else{
        $gender = "女";
    }

    $birthday = str_replace('-','',$birthday);
    // echo $birthday;

    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        // require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');

    $sql = "SELECT customer_id FROM customer WHERE mail LIKE '". $_SESSION['user'] ."'";
    $result = mysqli_query($link,$sql);
    echo $_SESSION['user'];
    var_dump($result);

    $id = [];
    while($row = mysqli_fetch_assoc($result)){
        $id[] = $row;
    }
    // $row = mysqli_fetch_assoc($result);
    $id = $id[0]['customer_id'];

    if(!empty($password)){
        $sql = "UPDATE customer SET name_sei = '". $fam_name ."', name_mei = '". $name ."', kana_sei = '" . $fam_name_ruby . "', kana_mei = '".$name_ruby."', mail = '".$mail."', phone_number = '" .$number. "', birthday = ".$birthday.", gender = '".$gender."' password = '". $password ."' WHERE customer_id = ".$id."";
        $result = mysqli_query($link,$sql);
    
        if(!$result){
            echo "DBエラーです";
        }
    
        $sql = "UPDATE address SET customer_address = '". $address ."', address_number = '". $zip_code ."' WHERE customer_id = ".$id."";
        $result = mysqli_query($link,$sql);
    

    }else{
        $sql = "UPDATE customer SET name_sei = '". $fam_name ."', name_mei = '". $name ."', kana_sei = '" . $fam_name_ruby . "', kana_mei = '".$name_ruby."', mail = '".$mail."', phone_number = '" .$number. "', birthday = ".$birthday.", gender = '".$gender."' WHERE customer_id = ".$id."";
        $result = mysqli_query($link,$sql);

        if(!$result){
            echo "DBエラーです";
        }

        $sql = "UPDATE address SET customer_address = '". $address ."', address_number = '". $zip_code ."' WHERE customer_id = ".$id."";
        $result = mysqli_query($link,$sql);
    }

   

    header("location: member_datachange_fin.php");

}
else{
    if($_POST['return']){
        $_SESSION['cahnge'] = $_POST['return'];
        header("location: member_datachange.php");
    }  
}



require_once "./member_tpl/member_datachange_registration.php";