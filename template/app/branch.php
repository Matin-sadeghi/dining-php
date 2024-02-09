<?php require_once (realpath(dirname(__FILE__)."/layouts/head-tag.php")) ?>


    <!-- start branch section -->

    <table class="branch-table">
        <tr class="branch-tr">
            <td>کد شعبه</td>
            <td>منطقه</td>
            <td>تلفن</td>
        </tr>
        <?php  foreach ($branches as $branch ) {?>
        <tr>
            <td><?php echo $branch["id"] ?></td>
            <td><?php  echo $branch["location"] ?></td>
            <td><?php echo $branch["telephone"] ?></td>
        </tr>
        <?php }?>
    </table>
    <?php require_once (realpath(dirname(__FILE__)."/layouts/sidebar.php")) ?>



    <!-- end branch section -->

    <?php require_once (realpath(dirname(__FILE__)."/layouts/footer.php")) ?>
