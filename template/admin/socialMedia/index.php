<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5 "><i class="fas fa-newspaper"></i> Articles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="http://localhost/restaurant/social-media/create" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of social-media</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>url</th>
                <th>image</th>
                
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($socialMedias as $socialMedia) { ?>
            <tr>
                <td><a class="text-primary" href="http://localhost/restaurant/social-media/show/<?php echo $socialMedia['id'];?>"><?php echo $socialMedia['id'] ?></a></td>
                <td><?php echo $socialMedia['name'] ?></td>
                <td><?php echo $socialMedia['url'] ?></td>
            
                <td><img style="width: 80px;" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/restaurant/'.$socialMedia['image'];?>"alt=""></td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="http://localhost/restaurant/social-media/edit/<?php echo $socialMedia['id']; ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white"  href="http://localhost/restaurant/social-media/delete/<?php echo $socialMedia['id']; ?>">delete</a>
                </td>
            </tr>
        <?php  } ?>
        </tbody>

    </table>
</div>



<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>