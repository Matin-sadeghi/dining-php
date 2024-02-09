<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>

        <section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Edit Article</h1>
</section>
<section class="row my-3">
    <section class="col-12">

        <form method="post" action="http://localhost/restaurant/article/update/<?php echo $id;?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." value="<?php echo $article['title'];?>">
            </div>

            <div class="form-group">
                <label for="cat_id">Category</label>
                <select name="cat_id" id="cat_id" class="form-control" required autofocus>
                    <?php foreach ($categories as $category) { ?>
                    <option <?php if($category["id"]==$article["cat_id"]) echo "selected";  ?> value="<?php echo $category['id']?>"><?php echo $category['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'
                    .$article['image'];?>" alt="">
                <hr/>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file" autofocus>
            </div>

            <div class="form-group">
                <label for="materiales">materiales</label>
                <textarea class="form-control" id="materiales" name="materiales" placeholder="materiales ..." rows="3"><?php
                    echo $article['materiales'];?></textarea>
            </div>
            <div class="form-group">
                <label for="body">body</label>
                <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5"><?php echo
                    $article['body'];?></textarea>
            </div>

            <div class="form-group">
                <label for="price">price</label>
                <textarea class="form-control" id="price" name="price" placeholder="price ..." rows="3"><?php echo
                    $article['price'];?></textarea>
            </div>

                <div class="form-group">
                <?php if($article["state"]=="disable"){ ?> <a role="button" class="btn btn-sm btn-warning text-white"  href="http://localhost/restaurant/article/state/<?php echo $article['id']; ?>">click to be enable</a><?php }?>
                    <?php if($article["state"]=="enable"){ ?> <a role="button" class="btn btn-sm btn-success text-white"  href="http://localhost/restaurant/article/state/<?php echo $article['id']; ?>">click to be disable</a><?php }?>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>
    </section>
</section>

<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>
