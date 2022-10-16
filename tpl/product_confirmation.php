<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/product_confirmation.css">
</head>

<body>
  <header>
    <h1>購入商品確認</h1>
  </header>
  <main>
  <table>
      <?php for($i = 0; $i < count($_SESSION['product']); $i++){ ?>
      <tr>
        <td><img src="img/<?php echo $cart_img_list[$i] ?>.jpg"></td>
        <td><?php echo $cart_list[$i]['product_name'];?></td>
        <td><?php echo $cart_list[$i]['exhibit_price'];?>円</td>
      </tr>
      <?php } ?>
      </table>
      <form action="payment.php" method="post">
        <button type="submit" id="submit">購入</button>
      </form>
  </main>
 


</body>
</html>
