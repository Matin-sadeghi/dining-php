<?php
namespace resAdminDashboard;
session_start();

require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Home{

    public function index(){
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM `websetting`")->fetch();
        $categories = $db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        $articles = $db->select("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 0,6");
        $populerArticles = $db->select("SELECT * FROM `articles` ORDER BY `view`  DESC LIMIT 0,6");
        $socialMedias = $db->select("SELECT * FROM `social_media`");
        $menus = $db->select("SELECT * FROM `menus` ");

        require_once (realpath(dirname(__FILE__)."/../template/app/index.php"));
        
    }

    public function food_page($id){
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM `websetting`")->fetch();
        $categories = $db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        $populerArticles = $db->select("SELECT * FROM `articles` ORDER BY `view`  DESC LIMIT 0,6");
        $socialMedias = $db->select("SELECT * FROM `social_media`");
        $menus = $db->select("SELECT * FROM `menus` ");
        $article = $db->select("SELECT *,(SELECT name FROM `categories` WHERE `categories`.`id`=`articles`.`cat_id`) AS cat_name FROM `articles` WHERE `id`=?",[$id])->fetch();
        $db->update('articles', $id, ['view'], [$article['view']+1]);
        $comments = $db->select("SELECT * ,(SELECT username FROM `users` WHERE `users`.`id`=`comments`.`user_id`) AS username FROM `comments` WHERE `status`='approved' and `article_id`=?",[$id]);

        require_once (realpath(dirname(__FILE__)."/../template/app/foodPage.php"));

    }
    public function category_page($id){
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM `websetting`")->fetch();
        $categories = $db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        $socialMedias = $db->select("SELECT * FROM `social_media`");
        $populerArticles = $db->select("SELECT * FROM `articles` ORDER BY `view`  DESC LIMIT 0,6");
        $menus = $db->select("SELECT * FROM `menus` ");
        $articles = $db->select("SELECT * ,(SELECT name FROM `categories` WHERE `categories`.`id`=`articles`.`cat_id`) AS cat_name ,(SELECT COUNT(*) FROM `comments` WHERE `status`='approved' and  `comments`.`article_id`=`articles`.`id` ) AS commentCount FROM `articles` WHERE `cat_id`=?  ",[$id]);
        require_once (realpath(dirname(__FILE__)."/../template/app/categorypage.php"));

        
    }

    public function branch_page(){
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM `websetting`")->fetch();
        $socialMedias = $db->select("SELECT * FROM `social_media`");
        $populerArticles = $db->select("SELECT * FROM `articles` ORDER BY `view`  DESC LIMIT 0,6");
        $menus = $db->select("SELECT * FROM `menus` ");
        $branches = $db->select("SELECT * FROM `branches`");
        require_once (realpath(dirname(__FILE__)."/../template/app/branch.php"));

    }
    public function search($request){
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM `websetting`")->fetch();
        $categories = $db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        $socialMedias = $db->select("SELECT * FROM `social_media`");
        $populerArticles = $db->select("SELECT * FROM `articles` ORDER BY `view`  DESC LIMIT 0,6");
        $menus = $db->select("SELECT * FROM `menus` ");
        $search=$request["search"];
    $sql="SELECT * ,(SELECT name FROM `categories` WHERE `categories`.`id`=`articles`.`cat_id` ) AS cat_name ,(SELECT COUNT(*) FROM `comments` WHERE `status`='approved' and  `comments`.`article_id`=`articles`.`id` ) AS commentCount FROM `articles` WHERE `title` LIKE'%$search%'";
    $articles = $db->select($sql);
    require_once (realpath(dirname(__FILE__)."/../template/app/categorypage.php"));
        
    }

    public function commentStore($request){
        $db = new DataBase();
        $request=array_merge($request,["user_id"=>$_SESSION["user"]]);
        $db->insert("comments",array_keys($request),$request);
        $this->redirectBack();
    }


    public function redirect($url){
        $protocol=strpos("https",$_SERVER['SERVER_PROTOCOL'])===true?"https://":"http://";
        header("Location:".$protocol.$_SERVER["HTTP_HOST"]."/restaurant/".$url);
    }
    public function redirectBack(){
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}