<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>商品変更確認</h1>
<form action="" method="post">
     <input type="submit" id="button" name="logout" value="ログアウト"></input>
</form>
   
</header>
<main>

<?php if(!empty($product_name)){ ?>
    
   
 
    <form action="" method="post">

        <table class="history01">
            <tr><td rowspan="7"><img class="brand_img" src="./img/starter.jpg" alt="ジャケ写"></td><td></td><td></td></tr>
            <div class=""><tr><td></td><td>商品名</td><td><?php echo $product_name;?></td></tr></div><br>
            <div class=""><tr><td></td><td>設定価格</td><td><?php echo $product_price?><td></tr></div><br>
            <div class=""><tr><td></td><td>出品価格</td><td><?php echo $exhibit_price?><td></tr></div><br>
            <div class=""><tr><td></td><td>カテゴリー</td><td><?php echo $category['category_name'];?></td></tr></div><br>
            
            <div class=""><tr><td></td><td>ブランド</td><td>
                    <?php if(!empty($brand['brand_name'])){
                            echo $brand['brand_name'];
                            }
                            
                            else{
                                echo "なし";
                            }?>
                            </td></tr></div><br>
            <div class=""><tr><td></td><td>カテゴリー</td><td><?php echo $comment;?></td></tr></div><br>
                            
            
        </table>

        <input type="submit" id="submit" name="change_comp" value="確認"></input>

    </form>

 
<?php }
else{?>

    <p>購入された商品がありません</p>
<?php } ?>
    

   
</main>

