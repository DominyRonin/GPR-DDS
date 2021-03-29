<?php
  require_once(__ROOT__ . "Model.php");
  require_once(__ROOT__ . "model/pillar.php");
?>

<?php

  class Pillars extends Model
  {

    private $pillars;

    function __construct()
    {
      $this->fillArray();
    }

    function fillArray() {
      $this->$pillars = array();
      $this->db = $this->connect();
      $result = $this->readAllPillars();
      if($result!=false){
      while ($row = $result->fetch_assoc()) {
       array_push($this->pillars, new Pillar($row["ID"]));
        }
      }

    }

    function getAllPillars()
    {
      return $this->pillars;
    }


    public function getPillar($PID)
    {
      foreach ($this->pillars as $pillar)
       {
         if($PID==$pillar->getID())
         {
           return $pillar;
         }
       }
    }

    function readAllPillars()
    {

        $sql="SELECT pillar_concrete.* from pillar_concrete p INNER JOIN buildings b on(p.BuildingID=b.ID AND b.UserID=$_SESSION['ID'])";

      $result = $this->db->query($sql);
          if ($result->num_rows > 0){
              return $result;
          }
          else {
              return false;
          }

    }

    public insertPillar($pillarName,$pillarDescription,$pillarImage,$BuidlingID)
    {

      //missing image concatination
      $sql="INSERT INTO pillar_concrete (PillarName,PillarDiscription,PillarImageName,PillareImageExtension,PillarImagePath,BuildingID) VALUES('$pillarName','$pillarDescription','$pillarImage','$pillarImage','$pillarImage','$BuidlingID')";
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
