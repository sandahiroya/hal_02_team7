<?php
session_start();

if(empty($_SESSION['user'])){
    header('location: login.php');
    echo 'error';
}

require_once "member_tpl/login_fin.php";