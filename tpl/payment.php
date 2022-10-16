<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/payment.css">
</head>

<body>

<header>
  <h1>お支払い方法選択</h1>
</header>
<main>
<form action="payment.php" method="post">
  <label><input type="radio" name="payment"" id="credit" value="クレジット決済" onClick="flg0(this.checked);">クレジット決済</label>
  <br>
  <label><input type="radio" name="payment" id="cash" value="代引き" onClick="flg0(this.checked);">代引き</label>
  <br>
  <button type="submit" id="submit"  disabled="disabled">お届け先選択ヘ</button>
</form>
</main>


<script>
  function flg0(ischecked){
  if(ischecked == true){
    document.getElementById("submit").disabled = false;
  }
}

</script>

</body>
</html>
