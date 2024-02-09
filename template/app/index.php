<?php require_once (realpath(dirname(__FILE__)."/layouts/head-tag.php")) ?>

<!-- end site header -->

    <!-- start about us section -->
    <section class="about-us">
        <div class="about-us-left">
            <img src="http://localhost/restaurant/<?php echo $setting["about_chef_image"] ?>" alt="درباره ی ما">
        </div>
        <div class="about-us-right">
        <h1 class="main-heading"><?php echo $setting["first_heading"] ?></h1>
            <h3 class="sub-heading">درباره ی دستپخت <span><?php echo $setting["chef"] ?></span></h3>
            <div class="stars">
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
            </div>
            <p class="description">
               <?php echo $setting["about_chef"] ?>
            </p>
            <div class="stars">
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
            </div>
            <button type="button" class="main-btn"><?php echo $setting["about_chef_btn"] ?></button>

        </div>

    </section>
    <!-- end about us section -->
    <!-- start category section -->
    <section class="category">
        <?php foreach($categories as $category){ ?>
        <div class="category-main">
            <a href="http://localhost/restaurant/category/<?php echo $category["id"] ?>">
               <?php echo $category["name"] ?>
             </a>
        </div>
        <?php }?>
    </section>

    <!-- end category section -->
      <!-- start serch box header -->

      <form method="post" id="search_form" action="http://localhost/restaurant/search">

<input id="search_input" type="text" placeholder="جستو جو ...." name="search" id="">
<input id="search_btn" class="submit" type="submit" value="جستوجو">


</form>
<div style="clear: both;"></div>
<!-- end serch box header -->
    <!-- start gallery section -->
    <section class="gallery">
        <div class="cards-wrapper">
            <?php foreach($articles as $article){ ?>
            <div class="card">
                <div class="card-overlay">
                    <h1  style="letter-spacing: 0px;" class="card-overlay-heading"><?php echo $article["title"] ?></h1>
                    <p class="card-overlay-paragraph">قیمت : <?php echo $article["price"] ?> <?php echo $setting["type_of_price"] ?></p>
                    <a style="text-align: center;text-decoration: none;line-height: 40px;" href="http://localhost/restaurant/food/<?php echo $article["id"] ?>" type="button" class="card-overlay-btn"><?php echo $setting["article_btn"] ?></a>
                </div>
                <img class="card-img" src="http://localhost/restaurant/<?php echo $article["image"] ?>">

            </div>
            <?php }?>

           
        </div>
    </section>

<?php require_once (realpath(dirname(__FILE__)."/layouts/sidebar.php")) ?>


    <!-- end gallery section -->

    <!-- start footer section -->
<?php require_once (realpath(dirname(__FILE__)."/layouts/footer.php")) ?>
    