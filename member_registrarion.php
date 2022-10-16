<?php
session_start();
// session_unset();
if(!empty($_SESSION['join'])){
    


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

// HTMLの情報を取ってくる
require_once "./member_tpl/member_registrarion.php";

