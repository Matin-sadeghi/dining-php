<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Show Article</h1>
</section>
<section class="row my-3">
    <section class="col-12">
    <h1 class="h4 border-bottom">ID : <?php echo $article["id"] ?></h1>
        <h1 class="h4 border-bottom">TITLE : <?php echo $article['title']; ?></h1>
        <p class="text-secondary border-bottom">MATERIALES : <?php echo $article['materiales']; ?></p>
        <p class="text-secondary border-bottom">PRICE : <?php echo $article['price']; ?></p>

        <section class="">BODY : <?php echo $article['body']; ?></section>
        <img style="width: 500px;height: 350px;margin-top:20px" src="http://localhost/restaurant/<?php echo $article["image"] ?>" alt="">

    </section>
</section>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
