<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/cart.css">
</head>

<body>
  <header>
    <h1>カート</h1>

  </header>
  <?php  if(isset($_SESSION['product'])&& count($_SESSION['product']) !=0 ){ ?>
  <table>
      <?php for($i = 0; $i < count($_SESSION['product']); $i++){ ?>
      <tr>
        <td><img src="img/<?php echo $cart_img_list[$i] ?>.jpg"></td>
        <td><?php echo $cart_list[$i]['product_name'];?></td>
        <td><?php echo $cart_list[$i]['exhibit_price'];?>円</td>
        <td><a href="cart.php?del=<?php echo $i ?>">削除</a></td>
      </tr>
      <?php } ?>
      </table>
      <div id="controller">
              <form action="product_confirmation.php" method="post">
                <button type="submit" id="submit">購入</button>
              </form>
          <?php }else{ ?>
                <p>カートに商品がありません</p>
          <?php } ?>

          <p><a href="brand_luckybag.php">買い物を続ける</a></p>
      </div>
</body>
</html>
