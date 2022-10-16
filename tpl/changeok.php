<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insertok.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>商品情報変更確認</h1>
    </header>
    <main>
        <form action="./list.php" method="POST">
            <p class="productname"><span>商品タイトル</span><input type="text" name="title"></p>
            <p class="product"><span>商品詳細</span></p>
            <p class="details"><textarea name="produot" class="deteailarea" rows="20"></textarea></p>
            <table class="tables">
                <tr>
                    <td><span>値段</span><input type="text" name="price"></td>
                    <td><span>出品価格</span><input type="text" name="fix_price"></td>
                </tr>
            </table>
        </form>
    </main>
    <div class="category">
        <p><span>カテゴリ</span>
            <select name="category">
                <option value="選択肢0">カテゴリ選択</option>
                <option value="選択肢1">日用品</option>
                <option value="選択肢2">バイク</option>
            </select>
        </p>
    </div>

    <p class="img"><span>画像</span></p>

    <div class="ok">
        <input type="submit" value="変更" id="submit">
        <a href="">戻る</a>
    </div>
    </form>

</body>

</html>