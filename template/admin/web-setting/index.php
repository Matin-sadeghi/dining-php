<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5 "><i class="fas fa-newspaper"></i> Website Setting</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="http://localhost/restaurant/web-setting/set" class="btn btn-sm btn-success">set web setting</a>
        </div>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>Website setting</caption>
            <thead>
                <tr>
                    <th>name</th>
                    <th>value</th>
                </tr>
            </thead>
            <tbody>

            <tr>
                <td>title</td>
                <td><?php echo $setting['title']; ?></td>
            </tr>
            
            <tr>
                <td>copyright</td>
                <td><?php echo $setting['copyright']; ?></td>
            </tr>
            <tr>
                <td>type_of_price</td>
                <td><?php echo $setting['type_of_price']; ?></td>
            </tr>
            <tr>
                <td>restaurant_name</td>
                <td><?php echo $setting['restaurant_name']; ?></td>
            </tr>

            <tr>
                <td>sub_name</td>
                <td><?php echo $setting['sub_name']; ?></td>
            </tr>

            <tr>
                <td>first_heading</td>
                <td><?php echo $setting['first_heading']; ?></td>
            </tr>
            <tr>
                <td>secound</td>
                <td><?php echo $setting['secound']; ?></td>
            </tr>

            <tr>
                <td>main_btn</td>
                <td><?php echo $setting['main_btn']; ?></td>
            </tr>

            <tr>
                <td>chef</td>
                <td><?php echo $setting['chef']; ?></td>
            </tr>

            <tr>
                <td>about_chef</td>
                <td><?php echo $setting['about_chef']; ?></td>
            </tr>

            <tr>
                <td>about_chef_image</td>
                <td><img src="<?php echo $setting['about_chef_image']; ?>" alt="" width="100px" height="100px"></td>

            </tr>

            <tr>
                <td>about_chef_btn</td>
                <td><?php echo $setting['about_chef_btn']; ?></td>
            </tr>
            <tr>
                <td>article_btn</td>
                <td><?php echo $setting['article_btn']; ?></td>
            </tr>

           

            <tr>
                <td>menu_image_1</td>
                <td><img src="<?php echo $setting['menu_image_1']; ?>" alt="" width="100px" height="100px"></td>
                
            </tr>

            <tr>
                <td>menu_image_2</td>
                <td><img src="<?php echo $setting['menu_image_2']; ?>" alt="" width="100px" height="100px"></td>
                
            </tr>

            <tr>
                <td>menu_image_3</td>
                <td><img src="<?php echo $setting['menu_image_3']; ?>" alt="" width="100px" height="100px"></td>

            </tr>

          
            

           
                <td>Logo</td>
                <td><img src="<?php echo $setting['logo']; ?>" alt="" width="100px" height="100px"></td>
            </tr>
            <tr>
                <td>Icon</td>
                <td><img src="<?php echo $setting['icon']; ?>" alt="" width="100px" height="100px"></td>
            </tr>

            <tr>
                <td>main_image</td>
                <td><img src="<?php echo $setting['main_image']; ?>" alt="" width="100px" height="100px"></td>
            </tr>
            </tbody>
        </table>
    </section>


    <?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>