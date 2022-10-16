<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/customer_address.css">
</head>

<body>

<header>
  <h1>住所入力</h1>
</header>

<main>
<form action="customer_address.php" method="post">
  <label><input type="radio" name="radio" id="1" value="old" onClick="flg0(this.checked);"/>登録された住所に発送する</label>

  <select name="old"" id="old"  disabled="disabled">
    <?php for($i=0; $i < $address_num; $i++){ ?>
            <option value="<?php echo $address_list[$i]['address_id']; ?>" ><?php echo $address_list[$i]['customer_address']; ?></option>
    <?php } ?>
  </select>
  <br>
  <label><input type="radio" name="radio" id="2" value="new" onClick="flg1(this.checked);"/>新規住所入力</label>
  <br>
  <p>郵便番号</p>
  <input type="text" name="new" id="new" placeholder="-を含めて入力してください" pattern="\d{3}-\d{4}" disabled="disabled">
  <p>住所</p>
  <input type="text" name="new2" id="new2" value=""   disabled="disabled">
  <br>
  <button type="submit" id="submit" disabled="disabled">確認画面へ</button>

</form>


</form>
<form action="cart.php" method="post">
  <button type="submit">戻る</button>
</form>

<script>

function flg0(ischecked){
  if(ischecked == true){
    document.getElementById("new").disabled = true;
    document.getElementById("new2").disabled = true;
    document.getElementById("old").disabled = false;
    document.getElementById("submit").disabled = false;
  }
}

  function flg1(ischecked){
  if(ischecked == true){
    document.getElementById("old").disabled = true;
    document.getElementById("new").disabled = false;
    document.getElementById("new2").disabled = false;
    document.getElementById("submit").disabled = false;
  }
}
</script>

</main>
</body>
</html>
