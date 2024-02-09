<?php
namespace resAdminDashboard;

class Admin{
   public function __construct() {
    
       $db = new Auth();
       $db->checkAdmin();
   }
    public function redirect($url){
        $protocol=strpos("https",$_SERVER['SERVER_PROTOCOL'])===true?"https://":"http://";
        header("Location:".$protocol.$_SERVER["HTTP_HOST"]."/restaurant/".$url);
    }
    public function redirectBack(){
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

    public function saveImage($image,$imagePath,$iamgeName=null){
        if($iamgeName!=null){
            $iamgeName=$iamgeName.".".substr($image["type"],6,strlen($image["type"]));
        }else{
            $iamgeName=date("Y-m-d-H-i-s").".".substr($image["type"],6,strlen($image["type"]));
        }
        $imagetemp=$image["tmp_name"];
        $imagePath="public/".$imagePath."/";
        if(is_uploaded_file($imagetemp)){
            if(move_uploaded_file($imagetemp,$imagePath.$iamgeName)){
                return $imagePath.$iamgeName;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function removeImage($path){
        $path=$_SERVER["DOCUMENT_ROOT"]."/restaurant/".$path;
        unlink($path);
    }
}



?>