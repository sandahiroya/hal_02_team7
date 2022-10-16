<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/form.css">
</head>
<body>
<header>
    <h1>会員情報変更</h1>
</header>
<main>
    <form action="member_datachange_registration.php" method="post">

    <!--    input内にvalueで変更前のデータを初期値として表示-->


        <label><span>姓</span><input type="text" name="fam_name" id="name" value=<?php if (!empty($fam_name)) {
             echo $fam_name;
        } else {

            echo $user[0]['name_sei'];
        }
         ?>></label><br>
        <label><span>名</span><input type="text" name="name" id="name" value=<?php if(!empty($fam_name)){
                echo $name;
            }else{
                echo $user[0]['name_mei'];}?>></label><br>
        <label><span>姓(フリガナ)</span><input type="text" name="fam_name_ruby" id="name" value=<?php if(!empty($fam_name_ruby)){
                echo $fam_name_ruby;}else{
                    echo $user[0]['kana_sei'];}?>></label><br>
        <label><span>名(フリガナ)</span><input type="text" name="name_ruby" id="name" value=<?php if(!empty($fam_name_ruby)){
                echo $name_ruby;}else{
                    echo $user[0]['kana_mei'];}?>></label><br>
        <label><span>郵便番号</span><input type="text" name="zipcode" id="zipcode" value=<?php if(!empty($fam_name_ruby)){
                echo $zip_code;
            }else{
                echo $address[0]['address_number'];}?>></label><br>
        <label><span>住所</span><input type="text" name="address" id="address" value=<?php if(!empty($fam_name_ruby)){
                echo $address;
            }else{
                echo $address[0]['customer_address'];}?>></label><br>
        <label><span>性別</span>
            <select name="gender">
                <option value="male">男</option>
                <option value="female">女</option>
            </select></label><br>
        <label><span>生年月日</span><input type="text" name="birthday" id="birthday" value=<?php if(!empty($fam_name_ruby)){
                echo $birthday;
            }else{
                echo $user[0]['birthday'];}?>></label><br>
        <label><span>電話番号</span><input type="tel" name="number" id="number" value=<?php if(!empty($fam_name_ruby)){
                echo $phone_number;
            }else{
                echo $user[0]['phone_number'];}?>></label><br>
        <label><span>メールアドレス</span><input type="text" name="mail" id="mail" value=<?php if(!empty($fam_name_ruby)){
                echo $mail_address;
            }else{
                echo $user[0]['mail'];}?>></label><br>
        <label><span>パスワード</span><input type="password" name="password" id="password"></label><br>
        <input id="submit" name="submit" type="submit" value="変更">
    </form>
</main>
</body>