<?php

require_once ("admin-dashboard/CreateDB.php");
require_once ("admin-dashboard/Admin-dashboard.php");
require_once ("admin-dashboard/Category-class.php");
require_once ("admin-dashboard/Article-class.php");
require_once ("admin-dashboard/Branches-class.php");
require_once ("admin-dashboard/Menu-class.php");
require_once ("admin-dashboard/socialMedia-class.php");
require_once ("admin-dashboard/WebSetting-class.php");
require_once ("admin-dashboard/Auth-class.php");
require_once ("admin-dashboard/Users-class.php");
require_once ("admin-dashboard/Home-class.php");
require_once ("admin-dashboard/Comment-class.php");
require_once ("admin-dashboard/Dashboard-class.php");
require_once ("admin-dashboard/AboutUs-class.php");
















use resDataBase\CreateDB;
use resAdminDashboard\Category;
use resAdminDashboard\Article;
use resAdminDashboard\Branch;
use resAdminDashboard\Menu;
use resAdminDashboard\socialMedia;
use resAdminDashboard\WebSetting;
use resAdminDashboard\Auth;
use resAdminDashboard\User;
use resAdminDashboard\Home;
use resAdminDashboard\Comment;
use resAdminDashboard\Dashboard;
use resAdminDashboard\AboutUs;












// $obj = new CreateDB();
// $obj->run();
// exit;

function uri($uri,$class,$method,$requestMethod="GET"){

    $values=array();
    $subUris=explode("/",$uri);
    $request_uri=array_slice(explode("/",$_SERVER["REQUEST_URI"]),2);
    if($request_uri[0]=="" || $request_uri[0]=="/"){
        $request_uri[0]="home";
    }
    $bre=false;
    if(sizeof($subUris)==sizeof($request_uri) and $requestMethod==$_SERVER['REQUEST_METHOD']){
    foreach (array_combine($subUris,$request_uri) as $subUri=>$request) {
        if($subUri[0]=="{" and $subUri[strlen($subUri)-1]=="}"){
            array_push($values,$request);
        }else{
            if($subUri!=$request){
                $bre=true;
            break;
            }
        }
    }
}else{
    $bre=true;
}
if(!$bre){
    $class="resAdminDashboard\\".$class;
    $obj=new $class;
    if(sizeof($values)>0){
        if($requestMethod=="POST"){
            if(isset($_FILES)){
                $request=array_merge($_POST,$_FILES);
                $obj->$method($request,implode(",",$values));
            }else{
                $obj->$method($_POST,implode(",",$values));
            }
        }else{
            $obj->$method(implode(",",$values));
        }
    }else{
        if($requestMethod=="POST"){
            if(isset($_FILES)){
                $request=array_merge($_POST,$_FILES);
                $obj->$method($request);
            }else{
                $obj->$method($_POST);
            }
        }else{
            $obj->$method();

        }
    }
}
}

uri("category","Category","index");
uri("category/show/{id}","Category","show");
uri("category/create","Category","create");
uri("category/store","Category","store","POST");
uri("category/edit/{id}","Category","edit");
uri("category/update/{id}","Category","update","POST");
uri("category/delete/{id}","Category","delete");

uri("article","Article","index");
uri("article/show/{id}","Article","show");
uri("article/create","Article","create");
uri("article/store","Article","store","POST");
uri("article/edit/{id}","Article","edit");
uri("article/update/{id}","Article","update","POST");
uri("article/delete/{id}","Article","delete");
uri("article/state/{id}","Article","state");


uri("branch","Branch","index");
uri("branch/show/{id}","Branch","show");
uri("branch/create","Branch","create");
uri("branch/store","Branch","store","POST");
uri("branch/edit/{id}","Branch","edit");
uri("branch/update/{id}","Branch","update","POST");
uri("branch/delete/{id}","Branch","delete");


uri("menu","Menu","index");
uri("menu/show/{id}","Menu","show");
uri("menu/create","Menu","create");
uri("menu/store","Menu","store","POST");
uri("menu/edit/{id}","Menu","edit");
uri("menu/update/{id}","Menu","update","POST");
uri("menu/delete/{id}","Menu","delete");


uri("social-media","socialMedia","index");
uri("social-media/show/{id}","socialMedia","show");
uri("social-media/create","socialMedia","create");
uri("social-media/store","socialMedia","store","POST");
uri("social-media/edit/{id}","socialMedia","edit");
uri("social-media/update/{id}","socialMedia","update","POST");
uri("social-media/delete/{id}","socialMedia","delete");

uri("web-setting","WebSetting","index");
uri("web-setting/set","WebSetting","set");
uri("web-setting/store","WebSetting","store","POST");

uri("comment","Comment","index");
uri("comment/show/{id}","Comment","show");
uri("comment/status/{id}","Comment","changeStatus");



uri("login","Auth","login");
uri("check-login","Auth","checkLogin","POST");
uri("register","Auth","register");
uri("register/store","Auth","checkRegister","POST");

uri("users","User","index");
uri("users/edit/{id}","User","edit");
uri("users/update/{id}","User","update","POST");
uri("users/delete/{id}","User","delete");
uri("users/permission/{id}","User","permission");


uri("home","Home","index");
uri("food/{id}","Home","food_page");
uri("category/{id}","Home","category_page");
uri("branch_page","Home","branch_page");
uri("search","Home","search","POST");
uri("commentStore","Home","commentStore","POST");

uri("about-us","AboutUs","index");
uri("about-us/edit","AboutUs","edit");
uri("about-us/store","AboutUs","store","POST");


uri("admin","Dashboard","index");












?>