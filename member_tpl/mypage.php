<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>マイページ</h1>
<form action="" method="post">
     <input type="submit" id="button" name="logout" value="ログアウト"></input>
     <input type="submit" id="button" name="top" value="トップページへ"></input>
</form>
   
</header>
<main>
    <div class="content"><span>姓</span><span><?php echo $user[0]['name_sei'];?></span>
    <span>名</span><span><?php echo $user[0]['name_mei']?></span><br></div>
    <div class="content"><span>姓(フリガナ)</span><span><?php echo $user[0]['kana_sei']?></span>
    <span>名(フリガナ)</span><span><?php echo $user[0]['kana_mei']?></span></div>
    <div class="content"><span>郵便番号</span><span><?php echo $address[0]['address_number']; ?></span></div>
    <div class="content"><span>住所</span><span><?php echo $address[0]['customer_address'];?></span></div>
    <div class="content"><span>性別</span><span><?php echo $user[0]['gender'];?></span></div>
    <div class="content"><span>生年月日</span><span><?php echo $user[0]['birthday']?></span></div>
    <div class="content"><span>電話番号</span><span><?php echo $user[0]['phone_number'];?></span></div>
    <div class="content"><span>メールアドレス</span><span><?php echo $user[0]['mail'];?></span></div>


    <h2>スタンプ</h2>
    <img src="./stamp_img/<?php echo $stamp_img?>" alt="スタンプ画像">
    
    
    <p><a href="purchase_history.php">購入履歴</a></p>
    <p><a href="exhibit_info.php">出品履歴</a></p>
    <p><a href="stanp.php">スタンプ情報</a></p>
    <p><a href="member_datachange.php">会員情報変更</a></p>
    <p><a href="member_delete.php">会員情報削除</a></p>
   
    
</form>
</main>
</body>