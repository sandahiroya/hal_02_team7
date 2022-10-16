<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
    <link rel="stylesheet" href="./css/starterpack.css">
</head>

<body>
<aside>
 <h2>商品を買う</h2>
 <h3><a href="starterpack.php?aaa=">スターターパック</a></h3>
 <h3><a href="brand_luckybag.php?bbb=">ジャンル別福袋</a></h3>

 <h2>商品を売る</h2>
    <h4><a href="insert.php">スターターパック</a></h4>

    <h4><a href="brand.php">ジャンル別福袋出品画面</a></h4>

<h4><a href="./mypage.php">マイページ</a></h4>
</aside>

<main>

<header>
     <form action="starterpack.php" method="post">
         <table>
             <tr>
                 <td><input type="text" name="sea" id="search"><td>
                 <td><button type="submit" name="sea2" id="search_sub">検索</button></td>
     </form>
    <form action="cart.php" method="post">
        <td><button type="submit" id="cart">カート</button></td>
    </form>
    </tr>
    </table>
</header>

    <div id="category">
        <ul class="gnav">
            <li><a>スターターパック</a>
                <ul>
                    <?php for ($i=0; $i < $category_num; $i++) { ?>
                        <li><a href="starterpack.php?c_id=<?php echo $category_list[$i]['category_id']; ?>"><?php echo $category_list[$i]['category_name'] ?></a></li>
                    <?php } ?>
                </ul>

            </li>

        </ul>


        <!-- <h1>ジャンル別福袋</h1> -->
        <ul class="gnav">
            <li><a>ジャンル福袋</a>
                <?php for ($i=0; $i < $category_num; $i++) { ?>
                    <ul>
                        <li><a><?php print $category_list[$i]['category_name'] ?></a>

                            <ul>

                                <?php for ($l=0; $l < count($brand_list[$i]); $l++) { ?>
                                    <li><a href="brand_luckybag.php?b_id=<?php echo $brand_list[$i][$l]['brand_id'] ?>"><?php echo $brand_list[$i][$l]['brand_name'] ?></a></li>
                                <?php } ?>

                            </ul>

                        </li>

                    </ul>

                <?php } ?>

            </li>

        </ul>
    </div>

 <h1><?php if(isset($msg)){ echo $msg ;} ?></h1>

 <?php if($page_num != 0){ ?>
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
 <?php }else{ ?>
    <p>現在お探しの商品はございません</p>
 <?php } ?>

<div id="paging">
     <?php
    if(isset($page_num) && $page_num >= 9 ){
    if (isset($_GET['page_id'])  && $_GET['page_id']!= 1 ){ ?>
            <a href="./starterpack.php?page_id=<?php echo $_GET['page_id']-1; ?>"><?php echo '前へ'; ?></a>
    <?php }else{ ?>
       <span><?php echo '前へ'; ?></span>

    <?php }
     for ($i = 1; $i <= $max_page;$i++){
        if ($i == $now){
            echo $now;
        }else{ ?>
            <a href="./starterpack.php?page_id=<?php echo $i; ?>"><?php echo $i;?></a>
        <?php    }
     }
     if (isset($_GET['page_id']) && $_GET['page_id']  == $max_page){ ?>
         <span><?php echo '次へ'; ?></span>
    <?php }elseif($now == 1){ ?>
        <a href="./starterpack.php?page_id=2"><?php echo '次へ'; ?></a>

    <?php }else { ?>
        <a href="./starterpack.php?page_id=<?php echo $_GET['page_id']+1; ?>"><?php echo '次へ'; ?></a>
    <?php } ?>
    <?php } ?>

</div>
</main>

</body>
</html>
