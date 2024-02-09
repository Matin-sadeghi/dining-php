<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>

    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Set Web Setting</h1>
    </section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="http://localhost/restaurant/web-setting/store" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." value="<?php if($setting !=null) echo $setting['title']; ?>" autofocus>
            </div>

            <div class="form-group">
                <label for="type_of_price">type_of_price</label>
                <input type="text" class="form-control" id="type_of_price" name="type_of_price" placeholder="Enter type_of_price ..." value="<?php if($setting !=null) echo $setting['type_of_price']; ?>" autofocus>
            </div>

            <div class="form-group">
                <label for="restaurant_name">restaurant_name</label>
                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Enter restaurant_name ..." value="<?php if($setting !=null) echo $setting['restaurant_name']; ?>" autofocus>
            </div>

            <div class="form-group">
                <label for="sub_name">sub_name</label>
                <input type="text" class="form-control" id="sub_name" name="sub_name" placeholder="Enter sub_name ..." value="<?php if($setting !=null) echo $setting['sub_name']; ?>" autofocus>
            </div>


            <div class="form-group">
                <label for="first_heading">first_heading</label>
                <input type="text" class="form-control" id="first_heading" name="first_heading" placeholder="Enter first_heading ..." value="<?php if($setting !=null) echo $setting['first_heading']; ?>" autofocus>
            </div>

            <div class="form-group">
                <label for="secound">secound</label>
                <input type="text" class="form-control" id="secound" name="secound" placeholder="Enter secound ..." value="<?php if($setting !=null) echo $setting['secound']; ?>" autofocus>
            </div>
            <div class="form-group">
                <label for="main_btn">main_btn</label>
                <input type="text" class="form-control" id="main_btn" name="main_btn" placeholder="Enter main_btn ..." value="<?php if($setting !=null) echo $setting['main_btn']; ?>" autofocus>
            </div>


            <div class="form-group">
                <label for="chef">chef</label>
                <input type="text" class="form-control" id="chef" name="chef" placeholder="Enter chef ..." value="<?php if($setting !=null) echo $setting['chef']; ?>" autofocus>
            </div>

            <div class="form-group">
                <label for="about_chef">about_chef</label>
                <input type="text" class="form-control" id="about_chef" name="about_chef" placeholder="Enter about_chef ..." value="<?php if($setting !=null) echo $setting['about_chef']; ?>" autofocus>
            </div>
          
            <div class="form-group">
           <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['about_chef_image']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="about_chef_image">about_chef_image</label>
                <input type="file" id="about_chef_image" name="about_chef_image" class="form-control-file" autofocus>
            </div>
            <div class="form-group">
                <label for="about_chef_btn">about_chef_btn</label>
                <input type="text" class="form-control" id="about_chef_btn" name="about_chef_btn" placeholder="Enter about_chef_btn ..." value="<?php if($setting !=null) echo $setting['about_chef_btn']; ?>" autofocus>
            </div>

            <div class="form-group">
                <label for="article_btn">article_btn</label>
                <input type="text" class="form-control" id="article_btn" name="article_btn" placeholder="Enter article_btn ..." value="<?php if($setting !=null) echo $setting['article_btn']; ?>" autofocus>
            </div>


            

            <div class="form-group">
                <label for="description">copyright</label>
                <input type="text" class="form-control" id="description" name="copyright" placeholder="Enter title ..." value="<?php if($setting !=null) echo $setting['copyright']; ?>" autofocus>
            </div>


            <div class="form-group">
           <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['menu_image_1']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="menu_image_1">menu_image_1</label>
                <input type="file" id="menu_image_1" name="menu_image_1" class="form-control-file" autofocus>
            </div>
            <div class = "form-group">
            <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['menu_image_2']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="menu_image_2">menu_image_2</label>
                <input type="file" id="menu_image_2" name="menu_image_2" class="form-control-file" autofocus>
            </div>
            <div class = "form-group">

            <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['menu_image_3']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="menu_image_3">menu_image_3</label>
                <input type="file" id="menu_image_3" name="menu_image_3" class="form-control-file" autofocus>
            </div>


            <div class="form-group">
           <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['logo']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="logo">logo</label>
                <input type="file" id="logo" name="logo" class="form-control-file" autofocus>
            </div>

            <div class="form-group">
           <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['icon']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="icon">icon</label>
                <input type="file" id="icon" name="icon" class="form-control-file" autofocus>
            </div>


            
            <div class="form-group">
           <?php if($setting !=null){ ?>
                    <img style="width: 100px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$setting['main_image']; ?>" alt="" >
                <hr/>
                <?php } ?>
                <label for="main_image">main_image</label>
                <input type="file" id="main_image" name="main_image" class="form-control-file" autofocus>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">set</button>
        </form>
    </section>
</section>



<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>