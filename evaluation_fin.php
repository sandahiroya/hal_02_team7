<?php

session_start();

unset($_SESSION['comment']);
unset($_SESSION['evaluation']);

require_once "./tpl/evaluation_fin.php";