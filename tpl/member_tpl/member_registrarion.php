<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/form.css">
</head>
<body>
<header>
<h1>会員登録</h1>
</header>
<main>
<p><?php if(!empty($empty)){ echo $empty;} ?></p>
<form action="member_registrarion.php" method="post">
<label><span>姓</span><input type="text" name="fam_name" id="name" value=<?php if (!empty($fam_name)) { echo $fam_name;}else{echo "";}?>></label><br>
        <label><span>名</span><input type="text" name="name" id="name" value=<?php if(!empty($fam_name)){ echo $name;}?>></label><br>
        <label><span>姓(フリガナ)</span><input type="text" name="fam_name_ruby" id="name" value=<?php if(!empty($fam_name_ruby)){echo $fam_name_ruby;}?>></label><br>
        <label><span>名(フリガナ)</span><input type="text" name="name_ruby" id="name" value=<?php if(!empty($fam_name_ruby)){ echo $name_ruby;}?>></label><br>
        <label><span>郵便番号</span><input type="text" name="zipcode" id="zipcode" value=<?php if(!empty($fam_name_ruby)){echo $zip_code;}?>></label><br>
        <label><span>住所</span><input type="text" name="address" id="address" value=<?php if(!empty($fam_name_ruby)){echo $address;}?>></label><br>
        <label><span>性別</span>
            <select name="gender">
                <option value="male">男</option>
                <option value="female">女</option>
            </select></label><br>
        <label><span>生年月日</span><input type="text" name="birthday" id="birthday" value=<?php if(!empty($fam_name_ruby)){echo $birthday;} ?>></label><br>
        <label><span>電話番号</span><input type="tel" name="number" id="number" value=<?php if(!empty($fam_name_ruby)){ echo $phone_number;}?>></label><br>
        <label><span>メールアドレス</span><input type="text" name="mail" id="mail" value=<?php if(!empty($fam_name_ruby)){ echo $mail_address;}?>></label><br>
        <label><span>パスワード</span><input type="password" name="password" id="password"></label><br>
        <input id="submit" name="submit" type="submit" value="送信">
</form>
</main>
</body>