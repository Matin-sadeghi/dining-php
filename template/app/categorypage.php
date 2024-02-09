<?php require_once (realpath(dirname(__FILE__)."/layouts/head-tag.php")) ?>


    <!-- start food section -->
    <section class="full">
        <div class="posts">

        <?php foreach ($articles as $article) {?>
            <div class="post">
                <div class="post-image">
                   <a href="http://localhost/restaurant/food/<?php echo $article['id'] ?>"><img src="http://localhost/restaurant/<?php echo $article["image"] ?>"></a>
                </div>
                <div class="food-text">
                    <h1 class="food-name"><a href="http://localhost/restaurant/food/<?php echo $article["id"] ?>"><?php echo $article["title"] ?></a> <span><i class="fa fa-eye"> : <?php echo $article["view"] ?> </i> , <i class="fa fa-comments"> :<?php echo $article["commentCount"] ?> </i> <span><i style="width: 15px;height: 15px;border-radius:100% ;display:inline-block;margin: 2px 10px 0px 0px;
                    <?php if($article["state"]=="disable")echo 'background: red;' ?> <?php if($article["state"]=="enable")echo 'background: green;' ?> ">  </i> </span></h1>
                    <h2 class="food-category"><a  href="#"><?php echo $article["cat_name"] ?></a></h2>
                    <p class="food-price"><span>قیمت :</span><?php echo $article["price"] ?> <?php echo $setting["type_of_price"] ?></p>

                </div>
            </div>
        <?php }?>

           

        </div>

        <section class="category-in-categoryPage">
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
