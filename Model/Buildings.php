<?php
  require_once(__ROOT__ . "Model.php");
  require_once(__ROOT__ . "model/building.php");
?>

<?php

  class Buildings extends Model
  {

    private $buildings;

    function __construct()
    {
      $this->fillArray();
    }

    function fillArray() {
      $this->$buildings = array();
      $this->db = $this->connect();
      $result = $this->readBuildings();
      if($result!=false){
      while ($row = $result->fetch_assoc()) {
       array_push($this->buildings, new Building($row["ID"]));
        }
      }

    }

    function getBuildings()
    {
      return $this->buildings;
    }


    public function getBuilding($BID)
    {
      foreach ($this->buildings as $building)
       {
         if($BID==$building->getID())
         {
           return $building;
         }
       }
    }

    function readBuildings()
    {
      if($_SESSION['Type']==1) //Client
      {
        $sql="SELECT * FROM buildings where UserID=$_SESSION['ID']";
      }
      elseif ($_SESSION['Type']==2)//Expert
       {
         $sql="SELECT * FROM buildings";
      }

      $result = $this->db->query($sql);
          if ($result->num_rows > 0){
              return $result;
          }
          else {
              return false;
          }

    }

    public insertBuilding($Name,$Address)
    {
      $sql="INSERT INTO buildings (Name,Address,UserID) VALUES('$Name','$Address',$_SESSION['ID'])";
      if($this->db->query($sql) === true){
      echo "Record inserted successfully.";
      $this->fillArray();
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . $this->db->conn->error;
    }

    }

  }

 ?>
