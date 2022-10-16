<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>入力確認</h1>
</header>
<form action="" method="post">
    <main>
        <div class="content"><span>姓</span><span><?php echo $fam_name;?></span>
            <span>名</span><span><?php echo $name?></span><br></div>
        <div class="content"><span>姓(フリガナ)</span><span><?php echo $fam_name_ruby?></span>
        <span>名(フリガナ)</span><span><?php echo $name_ruby?></span></div>
        <div class="content"><span>郵便番号</span><span><?php echo $zip_code?></span></div>
        <div class="content"><span>住所</span><span><?php echo $address;?></span></div>
        <div class="content"><span>性別</span><span><?php echo $gender;?></span></div>
        <div class="content"><span>生年月日</span><span><?php echo $birthday?></span></div>
        <div class="content"><span>電話番号</span><span><?php echo $phone_number;?></span></div>
        <div class="content"><span>メールアドレス</span><span><?php echo $mail;?></span></div>
        <div class="content"><span>パスワード</span><span><?php echo $user_password;?></span></div>
    <input type="submit" name="submit" id="submit" value="確認">
    <input type="submit" name="return" id="retrun" value="戻る">
    </main>
</form>
</body>