<?php
namespace resAdminDashboard;
require_once (realpath(dirname(__FILE__)."/Admin-dashboard.php"));
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class Branch extends Admin{
    public function index(){
        $db = new DataBase();
        $branches = $db->select("SELECT * FROM `branches` ORDER BY `id` DESC");
        require_once (realpath(dirname(__FILE__)."/../template/admin/branches/index.php"));

    }
    public function show($id){
        $db = new DataBase();
        $branch = $db->select("SELECT * FROM `branches` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/branches/show.php"));
    }
    public function create(){
        require_once (realpath(dirname(__FILE__)."/../template/admin/branches/create.php"));
        
    }
    public function  store($request){
        $db = new DataBase();
        $db->insert("branches",array_keys($request),$request);
        $this->redirect("branch");
    }
    public function edit($id){
        $db = new DataBase();
        $branch = $db->select("SELECT * FROM `branches` WHERE `id`=?",[$id])->fetch();
        require_once (realpath(dirname(__FILE__)."/../template/admin/branches/edit.php"));
    }
    public function update($request,$id){
        $db = new DataBase();
        $db->insert("branches",$id,array_keys($request),$request);
        $this->redirect("branch");
    }
    public function delete($id){
        $db = new DataBase();
        $db->delete("branches",$id);
        $this->redirectBack();
    
    }
}





?>