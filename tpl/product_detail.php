<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="css/product_detail.css">
<link href="css/slider.css" rel="stylesheet">
<link href="css/slick-theme.css" rel="stylesheet">
<link href="css/slick.css" rel="stylesheet">
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/slick.min.js"></script>
</head>

<body>
<!--ヘッダー入れる-->
<header>
    <h1><?php echo $product_row['product_name'] ?></h1>
    <form action="cart.php" method="post">
        <button type="submit" id="cart">カート</button>
    </form>
</header>

<main>
    <!--スターターの場合は登録されている分 画像がスライドする-->
    <!--ブランド福袋の場合はそのブランドの画像のようなものが表示される-->
    <ul class="fade">
        <?php for ($i=0; $i < $img_num; $i++) { ?>
           <?php if(!isset($product_row['brand_id'])){
                $img = $img_list[$i];
                }else{
                $img = 'brand_' . $product_row['brand_id'] . '.jpg';
                }?>
          <li><img src="img/<?php echo $img ;?>" id="js"></li>
        <?php } ?>
    </ul>

<div class="details">
    <p><span>商品詳細：</span><?php echo $exhibit_row['product_detail']; ?></p>
    <p><span>値段：</span><?php echo $product_row['exhibit_price']; ?></p>
    <p><sapn>カテゴリ：</sapn><?php echo $category_row['category_name']; ?></p>
    <p><span><?php  echo $msg ?></span><?php echo $msg2 ?></p></div>

</main>
<div class="button">
    <form action="product_detail.php" method="post">
        <input type="hidden" name="cart" value="<?php echo $product_row['product_id']; ?>">
        <!--カートへ入れるボタン(submitボタン)はJSを使わないとリロードが入る-->
        <button type="submit" name="cart2" id="cart2">カートへ入れる</button>
        <!--<input type="button" value="カートへ入れる" name="cart" onclick="cccc">-->
    </form>
    
    <p><a href="<?php echo $return ?>">戻る</a></p>
</div>


<script>
    //画像スライドのためのJS
  $('.fade').slick({
    autoplay: true, //自動再生
    dots: true, //ドットのナビゲーションを表示
    infinite: true, //スライドのループ有効化
    speed: 1000, //切り替えのスピード（小さくすると速くなる）
    fade: true, //フェードの有効化
  });
  </script>

</body>
</html>
