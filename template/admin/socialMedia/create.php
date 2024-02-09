<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>


        <section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create social-media</h1>
</section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="http://localhost/restaurant/social-media/store" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ..." required autofocus>
            </div>

            <div class="form-group">
                <label for="url">url</label>
                <textarea class="form-control" id="url" name="url" placeholder="url ..." rows="3" required autofocus></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">store</button>
        </form>
    </section>
</section>

<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>