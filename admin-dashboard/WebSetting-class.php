<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class WebSetting extends Admin{
    public function index(){
        $db = new DataBase();
        $setting=$db->select("SELECT * FROM `websetting`")->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/web-setting/index.php"));
    }

    public function set(){
        $db = new DataBase();
        $setting=$db->select("SELECT * FROM `websetting`")->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/web-setting/set.php"));
    }
    public function store($request){
        $db = new DataBase();
        $setting=$db->select("SELECT * FROM `websetting`")->fetch();
        if($request["icon"]["tmp_name"]==null){
            unset($request["icon"]);
        }else{
            $this->removeImage($setting["icon"]);
            $request["icon"]=$this->saveImage($request["icon"],"setting","icon");
        }

        if($request["logo"]["tmp_name"]==null){
            unset($request["logo"]);
        }else{
            $this->removeImage($setting["logo"]);
            $request["logo"]=$this->saveImage($request["logo"],"setting","logo");
        }

        if($request["main_image"]["tmp_name"]==null){
            unset($request["main_image"]);
        }else{
            $this->removeImage($setting["main_image"]);
            $request["main_image"]=$this->saveImage($request["main_image"],"setting","main_image");
        }

        if($request["about_chef_image"]["tmp_name"]==null){
            unset($request["about_chef_image"]);
        }else{
            $this->removeImage($setting["about_chef_image"]);
            $request["about_chef_image"]=$this->saveImage($request["about_chef_image"],"setting","about_chef_image");
        }

        if($request["menu_image_1"]["tmp_name"]==null){
            unset($request["menu_image_1"]);
        }else{
            $this->removeImage($setting["menu_image_1"]);
            $request["menu_image_1"]=$this->saveImage($request["menu_image_1"],"setting","menu_image_1");
        }

        if($request["menu_image_2"]["tmp_name"]==null){
            unset($request["menu_image_2"]);
        }else{
            $this->removeImage($setting["menu_image_2"]);
            $request["menu_image_2"]=$this->saveImage($request["menu_image_2"],"setting","menu_image_2");
        }

        if($request["menu_image_3"]["tmp_name"]==null){
            unset($request["menu_image_3"]);
        }else{
            $this->removeImage($setting["menu_image_3"]);
            $request["menu_image_3"]=$this->saveImage($request["menu_image_3"],"setting","menu_image_3");
        }

        if($setting==null){
            $db->insert("websetting",array_keys($request),$request);
        }else{
            $db->update("websetting",0,array_keys($request),$request);
        }
        $this->redirect("web-setting");

    }
}