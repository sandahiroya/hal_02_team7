<?php
session_start(); //セッションスタート
//--------------------------------[txtエラー処理]--------------------------------//
//----商品txt----//
if (empty($_POST["title"])) { //値が空かチェック(商品タイトル)
    $title = "商品タイトル未入力です"; //値が無けば未入力と表示
} else {
    $title = $_POST["title"]; //値があればtru
};
//----商品詳細txt----//
if (empty($_POST["produot"])) { //値が空かチェック(商品詳細)
    $produot = "商品詳細未入力です"; //値が無けば未入力と表示
} else {
    $produot = $_POST["produot"]; //値があればtru 
};
//----商品価格txt----//
if (empty($_POST["price"])) { //値が空かチェック(商品値段)
    $price = "値段が未入力です";  //値が無けば未入力と表示
} else {
    $price = $_POST["price"]; //price代入
    $price_t = $_POST["price"] * 1.1;
};

//--------------------------------[カテゴリー処理]--------------------------------//
//----DB接続----//
require_once "const.php";
$link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
mysqli_set_charset($link, 'utf8'); //文字コード設定

//----カテゴリープルダウン----//
$category = $_POST["brand"]; //カテゴリ-id受け取り
$category_id = intval($category); //カテゴリ-idをint型に変更
$category_sql = "SELECT brand_id,brand_name FROM brand WHERE brand_id =" . $category_id . ""; //カテゴリーid検索構文作成
$category_query = mysqli_query($link, $category_sql); //カテゴリ-sql実行
$category_top = mysqli_fetch_assoc($category_query); //カテゴリーsql一行取得
$k_select = "SELECT brand_id,brand_name FROM brand WHERE brand_id NOT IN('" . $category_top["brand_name"] . "')"; //カテゴリーを取得したカテゴリー意外をselect構文作成
$q_select = mysqli_query($link, $k_select); //カテゴリー取得したカテゴリー意外を実行
$category_all = mysqli_fetch_all($q_select); //指定したカテゴリー意外は全部取得
array_unshift($category_all, $category_top); //カテゴリーの値を配列先頭に代入

//--------------------------------[txt/insert_clea.php]-----------------------------//
require_once "tpl/brand_clea.php";
