<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>評価確認</h1>
</header>
<main>
<form action="" method="post">
    <span>３段階評価</span><?php echo $three_evaluation;?><span></span><br>
    <span>コメント</span><span><?php echo $_POST['comment'];?></span><br></div>
    
    <input type="submit" id="submit" name="submit_check" value="確認">
    <input type="submit" id="return" name="return" value="戻る">
</form>
</main>
</body>