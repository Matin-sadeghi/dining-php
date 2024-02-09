<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class AboutUs extends Admin{
    public function index(){
        $db = new DataBase();
       $aboutUs = $db->select("SELECT * FROM `about_us`")->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/aboutUs/index.php"));
    }
    public function edit(){
        $db = new DataBase();
       $aboutUs = $db->select("SELECT * FROM `about_us`")->fetch();
       require_once (realpath(dirname(__FILE__)."/../template/admin/aboutUs/edit.php"));
        
    }
    public function store($request){
        
        $db = new DataBase();
        $aboutUs = $db->select("SELECT * FROM `about_us`")->fetch();
        if(empty($aboutUs)){
       
            $db->insert("about_us",array_keys($request),$request);
        }else{
            $db->update("about_us","1",array_keys($request),$request);
        }
        
    $this->redirect("about-us");

    }
    
}