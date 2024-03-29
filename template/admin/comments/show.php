<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Show Comment</h1>
    </section>
<section class="row my-3">
    <section class="col-12">
        <h1 class="h4 border-bottom">ID : <?php echo $comment["id"] ?></h1>
        <p class="text-secondary border-bottom">USERNAME : <?php echo $comment["username"] ?></p>
        <p class="text-secondary border-bottom">TITLE : <?php echo $comment["title"] ?></p>
        <p class="text-secondary border-bottom">COMMENT : <?php echo $comment["comment"] ?></p>
        <p class="text-secondary border-bottom">STATUS : <?php echo $comment["status"] ?></p>
        <p class="text-secondary border-bottom"><?php echo $comment["created_at"] ?></p>
        <?php if($comment["status"]=="seen"){ ?>
         <a role="button" class="btn btn-sm btn-success text-white" href="http://localhost/restaurant/comment/status/<?php echo $comment["id"] ?>">click to  approved</a>
        <?php }else{?>
        <a role="button" class="btn btn-sm btn-warning text-white" href="http://localhost/restaurant/comment/status/<?php echo $comment["id"] ?>">click not to  approved</a>
         <?php }?>
    </section>
</section>

<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
