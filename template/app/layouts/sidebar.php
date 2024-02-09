
    <section class="gallery">
<p style="font-weight: 300;color: #d3ab55;text-align: center;font-family: sahel;font-size: 19px;margin:80px 0px 20px 0px "><span style="margin-right: 5px;" class="fa fa-flash"></span>محبوب ترین غدا ها</p>

        <div class="cards-wrapper">
            <?php foreach($populerArticles as $article){ ?>
            <div class="card">
                <div class="card-overlay">
                    <h1 style="letter-spacing: 0px;" class="card-overlay-heading"><?php echo $article["title"] ?></h1>
                    <p class="card-overlay-paragraph">قیمت : <?php echo $article["price"] ?> <?php echo $setting["type_of_price"] ?></p>
                    <a style="text-align: center;text-decoration: none;line-height: 40px;" href="http://localhost/restaurant/food/<?php echo $article["id"] ?>" type="button" class="card-overlay-btn"><?php echo $setting["article_btn"] ?></a>

                </div>
                <img class="card-img" src="http://localhost/restaurant/<?php echo $article["image"] ?>">

            </div>
            <?php }?>

           
        </div>
    </section>