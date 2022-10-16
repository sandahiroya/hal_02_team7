<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/form.css">
</head>
<body>
<header>
    <h1>ログイン</h1>
</header>
<main>
    <form action="login.php" method="post">

        <!--    input内にvalueで変更前のデータを初期値として表示-->
        <label><span>ユーザー名</span><input type="text" name="user_name" id="user_name"></label><br>
        <label><span>パスワード</span><input type="password" name="password" id="password"></label><br>
        <input id="submit"  name="submit" type="submit" value="ログイン">

        <input id="submit"  name="new" type="submit" value="新規登録">

    </form>
</main>
</body>