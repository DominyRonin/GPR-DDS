<?php
require_once(__ROOT__."Model.php");
// require_once(__ROOT__."Model/")

 ?>
 <?php

class Pillar extends Model
{
  private $id;
  private $BID;
  private $Image;
  private $Name;
  private $Description;

function __construct($id,$BID="",$Image="",$Name="",$Description="")
{

$this->id=$id;
// $this->userID=$userID;
$this->db=$this->connect();

if(""===$BID)
{
  $this->readPillar($id);
}
else {
  {

    $this->BID=$BID;
    $this->Image=$Image;
    $this->Name=$Name;
    $this->Description=$Description;

  }
}

}
  function readPillar($id)
  {
    $sql = "SELECT * FROM pillar_concrete where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->BID = $row["BuildingID"];
        $this->Image = $row["PillarImagePath"].$row["PillarImageName"].$row["PillarImageExtension"];
        $this->Name = $row["PillarName"];
        $this->Description = $row["PillarDescription"];

        }
      else {
          $this->BID = "";
          $this->Image = "";
          $this->Name = "";
          $this->Description = "";

          }
  }

  public function deletePillar(){
  $sql="delete from pillar_concrete where ID=$this->id;";
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
