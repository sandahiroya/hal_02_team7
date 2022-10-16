<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>商品変更</h1>
<form action="" method="post">
     <input type="submit" id="button" name="logout" value="ログアウト"></input>
</form>
   
</header>
<main>

<?php if(!empty($product_info['product_name'])){ ?>
    
   
        
    
 
    <form action="product_change_registration.php" method="post">

    <table class="history01">
        <tr><td rowspan="8"><img class="brand_img" src="./img/starter.jpg" alt="ジャケ写"></td><td></td><td></td></tr>
        <div class=""><tr><td></td><td>商品名</td><td><input type="text" name="product_name" value=<?php echo $product_name;?>></td></tr></div><br>
        <div class=""><tr><td></td><td>設定価格</td><td><input type="text" name="product_price" value=<?php echo $product_price;?>><td></tr></div><br>
        <div class=""><tr><td></td><td>出品価格</td><td><input type="text" name="exhibit_price" value=<?php echo $exhibit_price;?>></td></tr></div><br>

        <div class=""><tr><td></td><td>カテゴリー</td><td><select name="category" >
            <option value=<?php echo $category_all[0]['category_id']; ?>><?php echo$category_all[0]['category_name']; ?></option>
            <?php for($i=1;$i<count($category_all);$i++){?>
                    <option value=<?php echo $category_all[$i][0]?>><?php echo $category_all[$i][1]?></option>

            <?php } ?>
        
        </select></td></tr></div><br>

        <div class=""><tr><td></td><td>ブランド</td><td>
        <?php if(!empty($brand_all[0]['brand_id'])){?>
        <select name="brand" >
            <option value=<?php echo $brand_all[0]['brand_id']; ?>><?php echo$brand_all[0]['brand_name']; ?></option>
            <?php for($i=1;$i<count($brand_all);$i++){?>
                    <option value=<?php echo $brand_all[$i][0]?>><?php echo $brand_all[$i][1]?></option>

            <?php } ?>
            <?php }else{?>
                <?php echo "なし";?>
            <?php }?>
        
        </select></td></tr></div><br>
         <div class=""><tr><td></td><td>カテゴリー</td><td><textarea name="comment" value=""><?php echo $product_detail;?></textarea></td></tr></div><br>
                        
        
    </table>

       <input type="submit" id="submit" name="change" value="確認"></input>

    </form>

 
<?php }
else{?>

    <p>購入された商品がありません</p>
<?php } ?>
    

   
</main>

