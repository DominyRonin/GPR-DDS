<?php
require_once(__ROOT__."Model.php");
// require_once(__ROOT__."Model/")

 ?>
 <?php

class Result extends Model
{
  private $id;
  private $ImageID;
  private $DefectID;

function __construct($id,$ImageID="",$DefectID="")
{

$this->id=$id;
// $this->userID=$userID;
$this->db=$this->connect();

if(""===$ImageID)
{
  $this->readPillar($id);
}
else {
  {

    $this->ImageID=$ImageID;
    $this->DefectID=$DefectID;

  }
}

}
  function readResult($id)
  {
    $sql = "SELECT * FROM defect_results where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->ImageID = $row["ImageID"];
        $this->DefectID = $row["DefectID"];
        }
      else {
          $this->ImageID = "";
          $this->DefectID = "";

          }
  }

  public function deleteResult(){
  $sql="delete from defect_results where ID=$this->id;";
  if($this->db->query($sql) === true){
            echo '<script>alert("deleted successfully");</script>';
      } else{
            echo '<script>alert("ERROR: Could not able to execute $sql ' . $this->db->conn->error.'");</script>' ;
      }
}

function getID()
{
  return $this->id;
}

}

  ?>
