<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="  .css">
</head>

<body>
 <h2>商品を買う</h2>
 <h3>スターターパック</h3>
 <h3>ジャンル別福袋</h3>

 <h2>商品を売る</h2>
 <h4>スターターパック</h4>
 <h4>出品依頼一覧</h4>

 <h4>ジャンル別福袋出品画面</h4>
 <h4>出品ガイド</h4>

 <h4>マイページ</h4>
 <h4>ログアウト</h4>

 <form action="brand_luckybag2.php" method="post">
    <p><input type="text" name="sea3">
    <button type="submit" name="sea4">検索</button></p>

 <h1>スターターパック</h1>
 <ul>
     <?php for ($i=0; $i < $category_num; $i++) { ?>
        <li><?php print $category_list[$i]['category_name'] ?></li>
            <ul>
                <?php for ($l=0; $l < count($brand_list[$i]); $l++) { ?>
                    <li><?php print $brand_list[$i][$l]['brand_name'] ?></li>
                <?php } ?> 
                
            </ul>
     <?php } ?> 
 </ul>
 <h1>ジャンル別福袋</h1>
 <h1>出品依頼ピックアップ</h1>

 <table>
   
     <?php for($p=0; $p < $product_num; $p = $p+3){?>

     
     <tr>
        <?php for ($j=0; $j < 3; $j++) { ?>
            <?php if(isset($product_list[$p+$j])){ ?>
                 <td><img src="img/a.jpg"></td>
            <?php } ?>
         <?php } ?>
     </tr>
     <tr>
        <?php for ($j=0; $j < 3; $j++) { ?>
            <?php if(isset($product_list[$p+$j])){ ?>
                <td><a href="product_detail.php?id=<?php print $product_list[$p+$j]['product_id']?>"><?php print $product_list[$p+$j]['product_name'] ?></a></td>
            <?php } ?>
         <?php } ?>
     </tr>

     <?php } ?>


 </table>
 </form>



 
 <!--ページングクラスを表示-->
 <?php echo $pageing -> html; ?>

</body>
</html>
