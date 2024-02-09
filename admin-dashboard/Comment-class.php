<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Comment extends Admin{
public function index(){
    $db = new DataBase();
    $comments = $db->select("SELECT * FROM `comments`");
    foreach ($comments as $comment) {
        if($comment["status"]=="unseen"){
            $db->update("comments",$comment["id"],["status"],["seen"]);
        }
    }
    $comments = $db->select("SELECT * ,(SELECT username FROM `users` WHERE `users`.`id`=`comments`.`user_id`) AS username ,(SELECT title FROM `articles` WHERE `articles`.`id`=`comments`.`article_id`) AS title FROM `comments` ORDER BY `id` DESC");

    require_once (realpath(dirname(__FILE__)."/../template/admin/comments/index.php"));

}
public function show($id){
    $db = new DataBase();
    $comment = $db->select("SELECT * ,(SELECT username FROM `users` WHERE `users`.`id`=`comments`.`user_id`) AS username ,(SELECT title FROM `articles` WHERE `articles`.`id`=`comments`.`article_id`) AS title FROM `comments` WHERE `id`=?",[$id])->fetch();
    

    require_once (realpath(dirname(__FILE__)."/../template/admin/comments/show.php"));

    
}
public function changeStatus($id){
    $db = new DataBase();
    $comment = $db->select("SELECT * FROM `comments` WHERE `id`=?",[$id])->fetch();
    if($comment["status"]=="seen"){
        $db->update("comments",$id,["status"],["approved"]);
    }else if($comment["status"]=="approved"){
        $db->update("comments",$id,["status"],["seen"]);

    }
    $this->redirectBack();
    
}
}