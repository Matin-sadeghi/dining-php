<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>


                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5 "><i class="fas fa-newspaper"></i> Menus</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="http://localhost/restaurant/menu/create" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of menus</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>url</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($menus as $menu){ ?>
                <tr>

                    <td><a href="http://localhost/restaurant/menu/show/<?php echo $menu["id"] ?>" ><?php echo $menu["id"] ?></a></td>
                    <td><?php echo $menu["name"] ?></td>
                    <td><?php echo $menu["url"] ?></td>

                    <td>
                        <a role="button" class="btn btn-sm btn-primary text-white" href="http://localhost/restaurant/menu/edit/<?php echo $menu["id"] ?>">edit</a>
                        <a role="button" class="btn btn-sm btn-danger text-white" href="http://localhost/restaurant/menu/delete/<?php echo $menu["id"] ?>">delete</a>
                    </td>
                </tr>
                <?php }?>

            </tbody>
        </table>
    </section>

        </main>
    </div>
</div>


<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>