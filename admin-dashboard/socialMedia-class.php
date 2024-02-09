<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class socialMedia extends Admin{
    public function index(){
        $db = new DataBase();
        
        $socialMedias = $db->select("SELECT * FROM `social_media` ORDER BY `id` DESC");
        require_once (realpath(dirname(__FILE__)."/../template/admin/socialMedia/index.php"));

    }
    public function show($id){
        $db = new DataBase();
        $socialMedia = $db->select("SELECT * FROM `social_media`WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/socialMedia/show.php"));

    }
    public function create(){
        require_once (realpath(dirname(__FILE__)."/../template/admin/socialMedia/create.php"));
        
    }
    public function store($request){
        $db = new DataBase();
        $request["image"]=$this->saveImage($request["image"],"social-media");
        if($request["image"]!=false){
        $db->insert("social_media",array_keys($request),$request);
    }
        $this->redirect("social-media");
    }
    public function edit($id){
        $db = new DataBase();
        $socialMedia = $db->select("SELECT * FROM `social_media` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/socialMedia/edit.php"));

    }
    public function update($request,$id){
        $db = new DataBase();
        $socialMediaa = $db->select("SELECT * FROM `social_media`WHERE `id`=?",[$id])->fetch();
        if($request["image"]["tmp_name"]==null){
            unset($request["image"]);
        
        }else{
            $this->removeImage($socialMediaa["image"]);
            $request["image"]=$this->saveImage($request["image"],"social-media");
         
        }
        $db->update("social_media",$id,array_keys($request),$request);
        $this->redirect("social-media");
    }
    public function delete($id){
        $db = new DataBase();
        $socialMedia = $db->select("SELECT * FROM `social_media`WHERE `id`=?",[$id])->fetch();
        $this->removeImage($socialMedia["image"]);

        $db->delete("social_media",$id);
        $this->redirectBack();
    }
}