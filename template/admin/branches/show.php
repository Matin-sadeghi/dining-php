<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Show branch</h1>
    </section>
<section class="row my-3">
    <section class="col-12">
        <h1 class="h4 border-bottom">ID : <?php echo $branch["id"] ?></h1>
        <p class="text-secondary border-bottom">LOCATION : <?php echo $branch["location"] ?></p>
        <p class="text-secondary border-bottom">TELEPHONE : <?php echo $branch["telephone"] ?></p>
        <p class="text-secondary border-bottom"><?php echo $branch["created_at"] ?></p>
    </section>
</section>

<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
