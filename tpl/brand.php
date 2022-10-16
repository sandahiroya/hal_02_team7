<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>ブランド</h1>
    </header>
    <main>
        <form action="./brand_clea.php" method="POST" enctype="multipart/form-data">
            <p class="productname"><span>商品タイトル</span><input type="text" name="title"></p>
            <p class="product"><span>商品詳細</span></p>
            <p class="details"><textarea name="produot" class="deteailarea" rows="20"></textarea></p>
            <table class="tables">
                <tr>
                    <td><span>値段</span><input type="text" name="price"></td>
                </tr>
            </table>
    </main>
    <div class="category">
        <p><span>カテゴリ</span>
            <select name="brand">
                <?php for ($i = 1; $i < count($brand); $i++) : ?>
                    <option value=<?php echo $brand[$i][0]; ?>><?php echo $brand[$i][1]; ?></option>
                <?php endfor ?>
            </select>
        </p>
    </div>
    <div class="ok">
        <input type="submit" value="完了" id="submit">
    </div>
    </form>
</body>

</html>