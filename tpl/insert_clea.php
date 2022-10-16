<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert_clea.css">
    <title>Document</title>
</head>

<body>
<header>
    <h1>出品</h1></h1>
</header>
    <form action="./insertok.php" method="POST" enctype="multipart/form-data">
        <p class="name">商品タイトル<input type="text" name="title" value=<?php echo $title; ?>></p>
        <p class="detail">商品詳細<input type="text" name="produot" value=<?php echo $produot; ?>></p>
        <p class="price">値段<input type="text" name="price" value=<?php echo $price; ?>></p>
        <?php if (isset($price) and isset($price_t)) : ?>
            <p class="name">手数料値段<input type="text" name="price_t" value=<?php echo $price_t; ?>></p>
        <?php endif ?>
        <!--画像表示-->
        <p class="img"><span>画像選択</span><input type="file" name="upload_file" class="img"></p>
        <!--カテゴリー-->
        <p class="name"><span>カテゴリー</span><select name="category">
            <option value=<?php echo $category_top['category_id']?>><?php echo $category_top["category_name"]; ?></option>
            <?php for ($i = 1; $i < count($category_all); $i++) : ?>
                <option  value=<?php echo $category_all[$i][0]; ?>><?php echo $category_all[$i][1]; ?></option>
            <?php endfor ?>
        </select><br>
        </p>
        <input type="submit" value="完了" id="submit">
    </form>
</body>

</html>