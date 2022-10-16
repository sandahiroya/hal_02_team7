<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>変更確認</h1>
</header>
<main>
<form action="" method="post">
    <div class="content"><span>姓</span><?php echo $_POST['fam_name'];?><span></span>
        <span>名</span><span><?php echo $_POST['name'];?></span><br></div>
    <div class="content"><span>姓(フリガナ)</span><?php echo $_POST['fam_name_ruby'];?><span></span>
        <span>名(フリガナ)</span><span><?php echo $_POST['name_ruby'];?></span></div>
    <div class="content"><span>郵便番号</span><span><?php echo $_POST['zipcode'];?></span></div>
    <div class="content"><span>住所</span><span><?php echo $_POST['address'];?></span></div>
    <div class="content"><span>性別</span><span><?php echo $gender;?></span></div>
    <div class="content"><span>生年月日</span><span><?php echo $_POST['birthday'];?></span></div>
    <div class="content"><span>電話番号</span><span><?php echo $_POST['number'];?></span></div>
    <div class="content"><span>メールアドレス</span><span><?php echo $_POST['mail'];?></span></div>
    <div class="content"><span>パスワード</span><?php if(!empty($_POST['password'])){echo $_POST['password'];}?><span></span></div>
    <input type="submit" id="submit" name="submit_comp" value="確認">
    <input type="submit" id="return" name="return" value="戻る">
</form>
</main>
</body>