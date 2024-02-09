<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Show social-media</h1>
</section>
<section class="row my-3">
    <section class="col-12">
        <h1 class="h4 border-bottom">Name : <?php echo $socialMedia['name']; ?></h1>
        <p class="text-secondary border-bottom"> Url : <?php echo $socialMedia['url']; ?></p>
        <img style="width: 500px;height: 350px;margin-top:20px" src="http://localhost/restaurant/<?php echo $socialMedia["image"] ?>" alt="">

    </section>
</section>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
