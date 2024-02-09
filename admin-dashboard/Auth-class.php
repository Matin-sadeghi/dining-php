<?php
namespace resAdminDashboard;

use resDataBase\DataBase;

require_once (realpath(dirname(__FILE__)."/DataBase.php"));
class Auth{

    public function __construct()
    {
     if(session_status()==PHP_SESSION_NONE){
         session_start();
     }   
    }

    public function login(){
    require_once (realpath(dirname(__FILE__)."/../template/auth/login.php"));    
    }
    public function checkLogin($request){
        
        $db = new DataBase();
        if(empty($request["email"]) || empty($request["password"])){
            $this->redirectBack();
        }else if(strlen($request["password"])<8){
            $this->redirectBack();
        }else if(!filter_var($request["email"],FILTER_VALIDATE_EMAIL)){
            $this->redirectBack();
        }else{
            $user=$db->select("SELECT * FROM `users` WHERE `email`=?",[$request["email"]])->fetch();
            if($user!=null){
            if(password_verify($request["password"],$user["password"])){
                $_SESSION["user"]=$user["id"];
                $this->redirect("admin");
            }else{
            $this->redirectBack();

            }
        }else{
            $this->redirectBack();

        }
    }
    }


    public function checkRegister($request){
        
        $db = new DataBase();
        if(empty($request["email"]) || empty($request["password"])){
            $this->redirectBack();
        }else if(strlen($request["password"])<8){
            $this->redirectBack();
        }else if(!filter_var($request["email"],FILTER_VALIDATE_EMAIL)){
            $this->redirectBack();
        }else{
            $user=$db->select("SELECT * FROM `users` WHERE `email`=?",[$request["email"]])->fetch();
            if($user==null){
           $request["password"]=$this->hash($request["password"]);
           $db->insert("users",array_keys($request),$request);
           $this->redirect("login");
        }else{
            $this->redirectBack();

        }
    }
    }

    public function logout(){
        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
            session_destroy();
        }
        $this->redirectBack();
    }

    public function checkAdmin(){
        
        if(isset($_SESSION["user"])){
        $db = new DataBase();
        $user=$db->select("SELECT * FROM `users` WHERE `id`=?",[$_SESSION["user"]])->fetch();
        if($user!=null){
            if($user["permission"]!="admin"){
                $this->redirect("home");
            }
        }else{
            $this->redirect("home");
        }
    }else{
        $this->redirect("home");

    }
    

}








    public function register(){
        require_once (realpath(dirname(__FILE__)."/../template/auth/register.php"));    
     }
     public function hash($password){
         $passwordHash=password_hash($password,PASSWORD_DEFAULT);
         return $passwordHash;
     }

    public function redirect($url){
        $protocol=strpos("https",$_SERVER['SERVER_PROTOCOL'])===true?"https://":"http://";
        header("Location:".$protocol.$_SERVER["HTTP_HOST"]."/restaurant/".$url);
    }
    public function redirectBack(){
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}





?>