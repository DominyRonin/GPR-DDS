<?php
require_once(__ROOT__."Model.php");
require_once(__ROOT__."Model/pillar.php");

 ?>
 <?php

class Building extends Model
{
  private $id;
  private $userID;
  private $Name;
  private $Address;
  private $Pillars

function __construct($id,$userID="",$Name="",$Address="")
{

$this->id=$id;
// $this->userID=$userID;
$this->db=$this->connect();

if(""===$Name)
{
  $this->readBuilding($id);
}
else {
  {

    $this->userID=$userID;
    $this->Name=$Name;
    $this->Address=$Address;

  }
}

$this->fillPillars();

}

function fillPillars()
{
  $this->Pillars=array();
  $this->db=$this->connect();
  $result=$this->readPillars();
  if($result!=false){
      while ($row = $result->fetch_assoc()) {
       array_push($this->Pillars, new Pillar($row["ID"]));
      }
      }
}

function readPillars()
{
  $sql = "SELECT * FROM pillar_concrete WHERE BuildingID= $this->id";
      $result = $this->db->query($sql);
      if ($result->num_rows > 0){
          return $result;
      }
      else {
          return false;
      }
}

  function readBuilding($id)
  {
    $sql = "SELECT * FROM buildings where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->Name = $row["Name"];
        $this->userID = $row["UserID"];
        $this->Address = $row["Address"];

        }
      else {
          $this->Name = "";
          $this->userID = "";
          $this->Address = "";

          }
  }

  public function getBuildingPillars()
  {
    return $this->Pillars;
  }

  public function deleteBuilding(){
  $sql="delete from buildings where ID=$this->id;";
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
