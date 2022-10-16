<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/purchase_confirmation.css">
</head>

<body>
  <header>
    <h1>購入確認</h1>

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

      <tr>
        <td>発送予定日</td>
        <td><?php echo $shipping_date ;?></td>
      </tr>
      <tr>
        <td>到着予定日</td>
        <td><?php echo $arrival_date ;?></td>
      </tr>
      <tr>
        <td>総額</td>
        <td><?php echo $money; ?>円</td>
      </tr>
      <tr>
        <td>支払方法</td>
        <td><?php echo $_SESSION['payment']; ?></td>
      </tr>
      <tr>
        <td>発送先</td>
        <td><?php echo $customer_address; ?></td>
      </tr>

  </table>
      
      <form action="purchase_confirmation.php" method="post">
        <button type="submit" name="purchase" id="submit">購入</button>
      </form>
  

  <p><a href="brand_luckybag.php">買い物を続ける</a></p>
  </main>
</body>
</html>
