<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
//require_once(realpath(dirname(__FILE__)."/../../../admin-dashboard/Category-class.php"));
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5 "><i class="fas fa-newspaper"></i> branch</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="http://localhost/restaurant/branch/create" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm"> 
            <caption>List of branch</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>location</th>
                    <th>telephone</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($branches as $branch) {?>

            <tr>
            <td><a href="http://localhost/restaurant/branch/show/<?php echo $branch["id"];?>"><?php  echo $branch["id"] ?></a></td>
                <td> <?php echo $branch["location"] ?></td>
                <td> <?php echo $branch["telephone"] ?></td>

                <td>
                    <a role="button" href="http://localhost/restaurant/branch/edit/<?php echo $branch["id"];?>" class="btn btn-sm btn-info my-0 mx-1 text-white">update</a>
                    <a role="button" href="http://localhost/restaurant/branch/delete/<?php echo $branch["id"];?>" class="btn btn-sm btn-danger my-0 mx-1 text-white">delete</a>
                </td>
            </tr>
            <?php } ?>
         
            </tbody>
        </table>
    </div>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>