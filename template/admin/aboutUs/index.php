<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
//require_once(realpath(dirname(__FILE__)."/../../../admin-dashboard/Category-class.php"));
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5 "><i class="fas fa-newspaper"></i> About Us</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="http://localhost/restaurant/category/create" class="btn btn-sm btn-success disabled">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm"> 
            <caption>List of categories</caption>
            <thead>
                <tr>
                   
                    <th>body</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
          

            <tr>
               
                <td> <?php if($aboutUs!=""){ ?><?php echo $aboutUs["body"] ; }?></td>
                <td>
                    <a role="button" href="http://localhost/restaurant/about-us/edit" class="btn btn-sm btn-info my-0 mx-1 text-white">edit</a>
                </td>
            </tr>
       
         
            </tbody>
        </table>
    </div>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>