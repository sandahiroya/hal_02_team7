<?php
session_start();
// DBの情報をconst.phpから取ってくる
require_once './const.php';

if(!empty($_POST['submit']) && empty($_POST['fam_name']) || !empty($_POST['submit']) && empty($_POST['name']) || !empty($_POST['submit']) && empty($_POST['fam_name_ruby']) || !empty($_POST['submit']) && empty($_POST['name_ruby']) ){
    $_SESSION['error'] = '名前が未入力の部分があります';
    header('location: member_registrarion.php');
}
if(!empty($_POST['submit']) && empty($_POST['zipcode']) || !empty($_POST['submit']) && empty($_POST['address'])){
    $_SESSION['error'] = '住所が未入力の部分があります';
    header('location: member_registrarion.php');
}
if(!empty($_POST['submit']) && empty($_POST['birthday']) || !empty($_POST['submit']) && empty($_POST['number']) || !empty($_POST['submit']) && empty($_POST['mail']) || !empty($_POST['submit']) && empty($_POST['password'])){
    $_SESSION['error'] = '未入力の部分があります';
    header('location: member_registrarion.php');
}


// 確認ボタンを押した時の処理
if(!empty($_POST['submit']) && empty($_POST['name'])){

    // 変数にセッションの値を代入
    $fam_name = $_SESSION['join']['fam_name'];
    $name = $_SESSION['join']['name'];
    $fam_name_ruby = $_SESSION['join']['fam_name_ruby'];
    $name_ruby = $_SESSION['join']['name_ruby'];
    $zip_code = $_SESSION['join']['zipcode'];
    $address = $_SESSION['join']['address'];
    $birthday = $_SESSION['join']['birthday'];
    $phone_number = $_SESSION['join']['number'];
    $mail = $_SESSION['join']['mail'];
    $password = $_SESSION['join']['password'];

    if($_SESSION['join']['gender'] == "male"){
        $gender = "男";
    }
    else{
        $gender = "女";
    }




    // ハッシュ化
    $password = password_hash($password,PASSWORD_DEFAULT);

    // 日ずけの取得
    $registerday = date("Ymd");
    

    
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        require_once './tpl/error.php';
        exit;
    }
    mysqli_set_charset($link,'utf8');


    // idを取得する
    $sql = "select COUNT(*) FROM customer";
    $result = mysqli_query($link,$sql);
    $id = [];
    while($row = mysqli_fetch_assoc($result)){
        $id[] = $row;
    }
    
    $id = $id[0]["COUNT(*)"];
    $id = $id + 2;

    // INSERT文を作る
    $sql = "INSERT INTO customer (customer_id , name_sei , name_mei , kana_sei , kana_mei , mail , phone_number , birthday , gender , password , register_day) 
    VALUES (" . $id . " , '" . $fam_name . "' , '" . $name . "' , '" . $fam_name_ruby . "' , '" . $name_ruby . "' , '" . $mail . "' , '" . $phone_number . "' , " . $birthday . " , '" . $gender . "' , '" . $password . "' , " . $registerday . " )";

    $result = mysqli_query($link,$sql);

    $sql = "INSERT INTO address (customer_id , customer_address , address_number ) 
    VALUES (" . $id . " , '" . $address . "' , '" . $zip_code . "')";

    // DBに会員情報の登録をする
    $result = mysqli_query($link,$sql);
   
    if(!$result){
        mysqli_close($link);
        $err_msg = "よきせぬエラーが発生しました。しばらく経ってから再度お試しください。(102)";
        echo $err_msg;
        exit;
    }


    header("location: member_confirmaition_fin.php");
    

}
if(!empty($_POST['return'])){

    header("location: member_registrarion.php");

        

}
// registrationから入力情報が来た時の処理
else{
    // registrationからの情報を変数に代入
    $fam_name = $_POST['fam_name'];
    $name = $_POST['name'];
    $fam_name_ruby = $_POST['fam_name_ruby'];
    $name_ruby = $_POST['name_ruby'];
    $zip_code = $_POST['zipcode'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $phone_number = $_POST['number'];
    $mail = $_POST['mail'];
    $user_password = $_POST['password'];

    


    
    // 性別情報を変換
    if($_POST['gender'] == "male"){
        $gender = "男";
    }
    else{
        $gender = "女";
    }

    $_SESSION['join'] = $_POST;

    if(empty($fam_name) || empty($name) || empty($fam_name_ruby) || empty($name_ruby) ||empty($zip_code) || empty($address) || empty($gender) || empty($birthday) ||empty($phone_number) || empty($mail) || empty($user_password)){
        echo "入力されていない部分があります";
        
    }
    
}





require_once "./member_tpl/member_confirmation.php";