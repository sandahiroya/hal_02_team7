<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/form.css">
</head>
<body>
<header>
    <h1>会員情報削除</h1>
</header>
<main>
    <!--    input内にvalueで変更前のデータを初期値として表示-->
    <form action="" method="post">

        <div class="content"><span>姓</span><?php echo $user[0]['name_sei'];?><span></span>
            <span>名</span><span><?php echo $user[0]['name_mei'];?></span><br></div>
        <div class="content"><span>姓(フリガナ)</span><?php echo $user[0]['kana_sei'];?><span></span>
            <span>名(フリガナ)</span><span><?php echo $user[0]['kana_mei'];?></span></div>
        <div class="content"><span>郵便番号</span><span><?php echo $address[0]['address_number'];?></span></div>
        <div class="content"><span>住所</span><span><?php echo $address[0]['customer_address'];?></span></div>
        <div class="content"><span>性別</span><span><?php echo $user[0]['gender'];?></span></div>
        <div class="content"><span>生年月日</span><span><?php echo $user[0]['birthday'];?></span></div>
        <div class="content"><span>電話番号</span><span><?php echo $user[0]['phone_number'];?></span></div>
        <div class="content"><span>メールアドレス</span><span><?php echo $user[0]['mail'];?></span></div>
        <input type="submit" id="submit" name="submit_comp" value="確認">

        
    </form>

</main>
</body>