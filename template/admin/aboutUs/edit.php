<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Edit About Us</h1>
    </section>

<section class="row my-3">
    <section class="col-12">
        <form method="post" action="http://localhost/restaurant/about-us/store">
            <div class="form-group">
                <label for="body">Title</label>
                <input type="text" class="form-control" id="body" name="body" placeholder="Enter body ..." value="<?php if($aboutUs!=""){ echo $aboutUs["body"];  }?>">
                <!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
            </div>
            <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>
    </section>
</section>

<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
