<?php require_once (realpath(dirname(__FILE__)."/layouts/head-tag.php")) ?>

    <!-- start food section -->
    <section class="food">
        <div class="about-food">
            <div class="food-image">
                <img src="http://localhost/restaurant/<?php echo $article["image"] ?>">
            </div>
            <div class="food-text">
                <h1 class="food-name"><a href="http://localhost/restaurant/food/<?php echo $id?>"><?php echo $article["title"] ?></a></h1>
                <h2 class="food-category"><a href="http://localhost/restaurant/category/<?php echo $article["cat_id"]?>"><?php  echo $article["cat_name"]?></a></h2>
                <p class="food-summary"><?php echo $article["body"] ?></p>
                <p class="food-mavad"><span>موادی که استفاده شده است :</span> <?php echo $article["materiales"] ?></p>
                <p class="food-price"><span>قیمت :</span><?php echo $article["price"] ?> <?php echo $setting["type_of_price"] ?></p>
                <p <?php if($article["state"]=="disable") echo "style='color:red'"?> <?php if($article["state"]=="enable") echo "style='color:green'"?> class="food-price"><span>وضعیت :</span><?php if($article["state"]=="disable"){echo "ناموجود ";}else{echo "موجود";} ?></p>

                <form action="#" method="post">
                    <input type="submit" value="سفارش" class="food-submit">
                </form>

                <?php  foreach($comments as $comment){?>
                <section class="comment-box">
                    <h3 class="comment-box-header">
                        <?php echo $comment["username"] ?> <span class="comment-box-date"><?php echo date("M d,Y",strtotime($comment["created_at"]))  ?></span>
                    </h3>
                    <comment>
                        <?php echo $comment["comment"] ?> </comment>
                </section>
                <?php }?>

            <?php if(!empty($_SESSION["user"])){ ?>
                <form action="http://localhost/restaurant/commentStore" method="POST">
                    <input name="article_id" type="hidden" value="<?php echo $id ?>">
                    <textarea class="comment" name="comment" rows="4" required="" placeholder="نظر شما ...."></textarea>
                    <input style="cursor: pointer;" class="submit" type="submit" value="ثبت نظر">
                </form>
            <?php }else{?>
            <p>ابتدا وارد شوید</p>
            <?php }?>

            </div>
        </div>
        <!-- start category section -->

        <section class="category-in-foodPage">
        <?php foreach ($categories as $category) {?>
            <div class="category-main">
            <a href="http://localhost/restaurant/category/<?php echo $category["id"] ?>">
                   <?php echo $category["name"] ?>
                 </a>
            </div>
        <?php  }?>
          
         
        </section>
        <!-- end category section -->

    </section>

    <!-- end food section -->


    <?php require_once (realpath(dirname(__FILE__)."/layouts/sidebar.php")) ?>



    <?php require_once (realpath(dirname(__FILE__)."/layouts/footer.php")) ?>
