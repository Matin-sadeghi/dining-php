<?php
namespace resDataBase;
use PDO;
use PDOException;
class DataBase{
    private $connation;
    private $dbhost="localhost";
    private $dbname="restaurant";
    private $dbpassword="";
    private $dbusername="root";
    private $option=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);

 function __construct() {
        $this->connation=new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbusername,$this->dbpassword,$this->option);
    }

    public function select($sql,$request=null){
        if($request==null){
            return $this->connation->query($sql);
        }else{
            try{
            $stmt=$this->connation->prepare($sql);
           $stmt->execute($request);
           $res=$stmt;
           return $res;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        }
    }

    public function insert($tablename,$fildes,$values){
        try{
            $stmt=$this->connation->prepare("INSERT INTO `".$tablename."`(".implode(",",$fildes).",created_at)VALUES(:".implode(", :",$fildes).",now())");
            $stmt->execute(array_combine($fildes,$values));
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function update($tablename,$id,$fields,$values){
        $sql = "UPDATE `".$tablename."` SET";
        foreach(array_combine($fields,$values) as $field=>$value){
            if($value){
                $sql.="`".$field."`=?,";
            }else{
                $sql.="`".$field."`=NULL,";
            }
        }
            $sql.="`updated_at`=now()";
            $sql.=" WHERE `id`=?";
            try{
                $stmt=$this->connation->prepare($sql);
                $affectedrows=$stmt->execute(array_merge(array_filter(array_values($values)),[$id]));
    if(isset($affectedrows)){
            
    }
                return true;
            }catch(PDOException $e){
            echo $e->getMessage();
        }

        
    }

    public function delete($tablename,$id){
        $sql="DELETE FROM `".$tablename."` WHERE `id`=?";
        try{
            $stmt=$this->connation->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    

    public function createTable($sql){
        try{
            $this->connation->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}



?>