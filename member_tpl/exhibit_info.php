<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>出品履歴</h1>
<form action="" method="post">
     <input type="submit" id="button" name="logout" value="ログアウト"></input>
</form>
   
</header>
<main>

<?php if(!empty($product[0]['product_name'])){ ?>
    
    <?php for($cnt=0;$cnt<count($product);$cnt++){?>
        
       
    <!-- <form action="" method="post"> -->

    <table class="history01">
        <tr><td rowspan="6"><img class="brand_img" src="./img/brand.jpg" alt="ジャケ写"></td><td></td><td></td></tr>
        <div class=""><tr><td></td><td>商品名</td><td><?php echo $product[$cnt]['product_name'];?></td></tr></div><br>
        <div class=""><tr><td></td><td>値段</td><td><?php echo $product[$cnt]['exhibit_price']?><td></tr></div><br>
        <div class=""><tr><td></td><td>カテゴリー</td><td><?php echo $product[$cnt]['category_id'];?></td></tr></div><br>
       
        <div class=""><tr><td></td><td>ブランド</td>
            <td><?php if($product[$cnt]['brand_id'] !== NULL){
                         echo $product[$cnt]['brand_id'];
                        }
                        else{
                            echo "なし";
                        }?>
            </td></tr></div><br>


        <div class=""><tr><td></td><td>商品詳細</td><td><?php echo $list[$cnt]['product_detail'];?></td></tr></div><br>
      
        
    </table>

    <?php if(!in_array($product[$cnt]['product_id'],$sold)){ ?>
    <a href="product_change.php?id=<?php echo $product[$cnt]['product_id']?>"><input type="submit" id="submit" name="product_change" value="変更"></input></a>
    <a href="product_delete.php?id=<?php echo $product[$cnt]['product_id']?>"><input type="submit" id="submit" name="product_delete" value="削除"></input></a>
    <?php }else{?>
        <p><?php echo 'SOLD OUT'?></p>
    <?php } ?>

    <!-- </form> -->

    <?php }?>
    

<?php }
else{?>

    <p>出品された商品がありません</p>
<?php } ?>
    
    

   
</main>

