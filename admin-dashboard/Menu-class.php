<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Menu extends Admin{

    public function index(){
        $db = new DataBase();
        $menus=$db->select("SELECT * FROM `menus` ORDER BY `id` DESC");
        require_once (realpath(dirname(__FILE__)."/../template/admin/menus/index.php"));

    }
    public function show($id){
        $db = new DataBase();
        $menu=$db->select("SELECT * FROM `menus` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/menus/show.php"));

    }
    public function create(){
        require_once (realpath(dirname(__FILE__)."/../template/admin/menus/create.php"));
        
    }
    public function store($request){
        $db = new DataBase();
        $db->insert("menus",array_keys($request),$request);
        $this->redirect("menu");
    }
    public function edit($id){
        $db = new DataBase();
        $menu=$db->select("SELECT * FROM `menus` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/menus/edit.php"));
    }
    public function update($request,$id){
        $db = new DataBase();
        $db->update("menus",$id,array_keys($request),$request);
        $this->redirect("menu");
    }
    public function delete($id){
        $db = new DataBase();
        $db->delete("menus",$id);
        $this->redirectBack();
    }
}

