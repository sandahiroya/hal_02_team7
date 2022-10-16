<?php

session_start();

unset($_SESSION['product_info']);
unset($_SESSION['detail']);
unset($_SESSION['product_id']);

require_once './tpl/product_change_fin.php';