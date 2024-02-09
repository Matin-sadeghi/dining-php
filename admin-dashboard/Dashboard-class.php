<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Dashboard extends Admin{
    public function index(){
        $db = new DataBase();
        $categories = $db->select("SELECT * FROM `categories`");
        $categoryCount = $db->select("SELECT COUNT(*) FROM `categories`")->fetch();
        $userCount = $db->select("SELECT COUNT(*) FROM `users`")->fetch();
        $adminCount = $db->select("SELECT COUNT(*) FROM `users` WHERE `permission`='admin'")->fetch();
        $articleCount = $db->select("SELECT COUNT(*) FROM `articles`")->fetch();
        $articlesViews = $db->select("SELECT SUM(view) FROM `articles`")->fetch();
        $commentsCount = $db->select("SELECT COUNT(*) FROM `comments`")->fetch();
        $commentsUnseenCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status`='unseen'")->fetch();
        $commentsApprovedCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status`='approved'")->fetch();

        $articlesWithView = $db->select("SELECT * FROM `articles` ORDER BY `view` DESC LIMIT 0,4");

        $articlesComments = $db->select("SELECT * ,(SELECT COUNT(*) FROM `comments` WHERE `comments`.`article_id`=`articles`.`id`) as comment_count FROM `articles` ORDER BY comment_count  DESC LIMIT 0,4");

        $lastComments = $db->select("SELECT * ,(SELECT username FROM `users` WHERE `users`.`id`=`comments`.`user_id`) AS username FROM `comments` ORDER BY `id` DESC");


    require_once (realpath(dirname(__FILE__)."/../template/admin/dashboard/index.php"));

    }
}