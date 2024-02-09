<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Category extends Admin{
    public function index(){
        $db=new DataBase();
        $categories=$db->select("SELECT * FROM `categories` ORDER BY `id` DESC");
        require_once (realpath(dirname(__FILE__)."/../template/admin/category/index.php"));
        
    }
    public function show($id){
        $db=new DataBase();
        $category=$db->select("SELECT * FROM `categories` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/category/show.php"));
        
    }
    public function create(){
        require_once (realpath(dirname(__FILE__)."/../template/admin/category/create.php"));
        
    }
    public function store($request){
        $db=new DataBase();
        $db->insert("categories",array_keys($request),$request);
        $this->redirect("category");
    }
    public function edit($id){
        $db=new DataBase();
        $category=$db->select("SELECT * FROM `categories` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/category/edit.php"));

    }
    public function update($request,$id){
        $db=new DataBase();
        $db->update("categories",$id,array_keys($request),$request);
        $this->redirect("category");

    }
    public function delete($id){
        $db=new DataBase();
        $db->delete("categories",$id);
        $this->redirectBack();
    }
}
