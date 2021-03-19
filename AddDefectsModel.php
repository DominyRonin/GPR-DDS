<?php

require_once("Model.php");
class AddDefectsModel extends Model {
    private $data;

      function AddDefect($Name, $Discription){
       
         $db=new DBHelper(); 
         $sql="INSERT INTO `defect_types` (`DefectName`, `DefectDescription`) VALUES ( '$Name', '$Discription');";
         $this->data=$db->connect()->query($sql);
     
       }
       function retriveDefcts(){
       
        $db=new DBHelper(); 
        $sql="Select * from defect_types ";
        $this->data=$db->connect()->query($sql);
        return  $this->data ;
    
      }
 

       function deleteDefect($id){

        $db=new DBHelper(); 
        $sql=" Delete From defect_types where id='$id'";
        $result=$db->connect()->query($sql);
       }

}

?>