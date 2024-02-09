<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>

                <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit Menu</h1>
    </section>

<section class="row my-3">
    <section class="col-12">
        <form method="post" action="http://localhost/restaurant/menu/update/<?php echo $id ?>">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ..." value="<?php echo $menu["name"]; ?>" required>
            </div>

            <div class="form-group">
                <label for="url">url</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." value="<?php echo $menu["url"]; ?>" required>
            </div>


            <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>
    </section>
</section>



        </main>
    </div>
</div>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
