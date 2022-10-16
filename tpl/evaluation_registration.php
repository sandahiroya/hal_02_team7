<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./member_css/form.css">
    <title>評価</title>
</head>

<body>
<header>
    <div class="header">
        <h1>商品評価</h1>
    </div>
</header>
<main>
    <div class="main">
        <form action="evaluation_check.php" method="post">
            <lavel><input type="checkbox" name="check"  value="確認" <?php if(!empty($_SESSION['comment']['check'])){ echo "checked"; } ?>><span>商品の到着を確認しました</span></lavel><br>
            <lavel><input type="checkbox" name="three" value="良い" <?php if(!empty($_SESSION['comment']['three'])){if($_SESSION['comment']['three']==$good){ echo "checked";} }?>><span>良い</span></lavel>
            <lavel><input type="checkbox" name="three" value="普通" <?php if(!empty($_SESSION['comment']['three'])){if($_SESSION['comment']['three']==$normal){ echo "checked";}}?>><span>普通</span></lavel>
            <lavel><input type="checkbox" name="three" value="悪い" <?php if(!empty($_SESSION['comment']['three'])){if($_SESSION['comment']['three']==$bad){ echo "checked";} }?>><span>悪い</span></lavel>

            <p class="product">コメント</p>
            <textarea name="comment" id="comment" cols="70" rows="10" value=""><?php if(!empty($_SESSION['comment']['comment'])){ echo $_SESSION['comment']['comment']; }?></textarea><br>

            <input type="submit" value="送信" id="submit">

        </form>
    </div>
</main>
   
</body>

</html>