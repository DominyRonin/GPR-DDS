<?php
  require_once(__ROOT__ . "Model.php");
  require_once(__ROOT__ . "model/result.php");
?>

<?php

  class Results extends Model
  {

    private $results;

    function __construct()
    {
      $this->fillArray();
    }

    function fillArray() {
      $this->$results = array();
      $this->db = $this->connect();
      $result = $this->readAllResults();
      if($result!=false){
      while ($row = $result->fetch_assoc()) {
       array_push($this->results, new Result($row["ID"]));
        }
      }

    }

    function getAllResults()
    {
      return $this->results;
    }


    public function getResult($PID)
    {
      foreach ($this->results as $result)
       {
         if($PID==$result->getID())
         {
           return $result;
         }
       }
    }

    function readAllResults()
    {

        $sql="SELECT t.DefectName ,d.Name as BName, p.PillarName
              from bscanimages b INNER JOIN defect_results r
              on(b.ID=r.ImageID )
              INNER JOIN pillar_concrete p
              on(p.ID = b.PillarID)
              INNER JOIN buildings d
              on(p.BuildingID=d.ID )
              INNER JOIN defect_types t
              on(t.ID=r.DefectID)
              WHERE d.UserID='".$_SESSION['ID']."'";

      $result = $this->db->query($sql);
          if ($result->num_rows > 0){
              return $result;
          }
          else {
              return false;
          }

    }

    public insertResult($ImageID,$DefectID)
    {

      //missing image concatination
      $sql="INSERT INTO defect_results  (ImageID,DefectID) VALUES('$ImageID','$DefectID')";
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
