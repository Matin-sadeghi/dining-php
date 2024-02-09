<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Article extends Admin{
    public function index(){
        $db = new DataBase();
        $articles=$db->select("SELECT * FROM `articles` ORDER BY `id` DESC");
        require_once (realpath(dirname(__FILE__)."/../template/admin/articles/index.php"));

    }
    public function show($id){
        $db = new DataBase();
        $article=$db->select("SELECT * FROM `articles` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/articles/show.php"));
    }
    public function create(){
        $db = new DataBase();
        $categories=$db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        require_once (realpath(dirname(__FILE__)."/../template/admin/articles/create.php"));

    }
    public function store($request){
        $db = new DataBase();
        if(isset($request["cat_id"])){
           $request["image"]=$this->saveImage($request["image"],"article-image");
           if($request["image"]!=false){
           $db->insert("articles",array_keys($request),$request);
        }
        }
        $this->redirect("article");

    }
    public function edit($id){
        $db = new DataBase();
        $categories=$db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        $article=$db->select("SELECT * FROM `articles` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/articles/edit.php"));
    }
    public function update($request,$id){
        $db = new DataBase();
        $articles=$db->select("SELECT * FROM `articles` WHERE `id`=?",[$id])->fetch();
        if(isset($request["cat_id"])){
            if($request["image"]["tmp_name"]==null){
                unset($request["image"]);
            }else{
                $this->removeImage($articles["image"]);
                $request["image"]=$this->saveImage($request["image"],"article-image");
            }
            
            $db->update("articles",$id,array_keys($request),$request);
             $this->redirect("article");
        }else{
            $this->redirectBack();
        }
        

    }

   

    public function delete($id){
         $db = new DataBase();
        $articles=$db->select("SELECT * FROM `articles` WHERE `id`=?",[$id])->fetch();
        $this->removeImage($articles["image"]);
        $db->delete("articles",$id);
        $this->redirectBack();
    }

    public function state($id){
        $db = new DataBase();
       $article = $db->select("SELECT * FROM `articles` WHERE `id`=?",[$id])->fetch();
       if($article["state"]=="disable"){
           $db->update("articles",$id,["state"],["enable"]);
       }else{
        $db->update("articles",$id,["state"],["disable"]);
       }
    $this->redirectBack();

    }
}










?>