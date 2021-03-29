<?php
require_once(__ROOT__."Model.php");

 ?>
 <?php

class Message extends Model
{
  private $id;
  private $fromID;
  private $toID;
  private $Message;
  private $MessageDate;
  private $MessageTime;

  function __construct($id,$fromID="",$toID="",$Message="",$MessageDate="",$MessageTime="")
  {
    $this->id=$id;
    $this->db=$this->connect();

    if ($fromID==="")
    {
      $this->readMessage($id);
    }
    else
    {
      $this->fromID=$fromID;
      $this->toID=$toID;
      $this->Message=$Message;
      $this->MessageDate=$MessageDate;
      $this->MessageTime=$MessageTime;
    }
  }

  function getID()
  {
    return $this->id;
  }

  function readMessage($id)
  {
    $sql="SELECT * FROM messages WHERE ID=$id";
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->fromID=$row["fromID"];
        $this->toID=$row["toID"];
        $this->Message=$row["Message"];
        $this->MessageDate=$row["MessageDate"];
        $this->MessageTime=$row["MessageTime"];
      }
    else {
      $this->fromID="";
      $this->toID="";
      $this->Message="";
      $this->MessageDate="";
      $this->MessageTime="";
      }
  }

  public function deleteMessage()
  {
    $sql="DELETE FROM messages WHERE ID=$this->id AND UserToID=-1";
    if($this->db->query($sql) === true){
              echo '<script>alert("deleted successfully");</script>';
        }
	    else{
              echo '<script>alert("ERROR: Could not able to execute $sql ' . $this->db->conn->error.'");</script>' ;
        }
  }
}

  ?>
