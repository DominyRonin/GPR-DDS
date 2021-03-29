<?php
require_once(__ROOT__ . "Model.php");
require_once(__ROOT__ . "model/message.php");

 ?>

 <?php

class Messages extends Model
{
  private $messages;
  function __construct()
  {
    $this->fillArray();
  }

function fillArray()
{
  $this->messages=array();
  $this->db=$this->connect();
  $result=$this->readMessages();
  if($result!=false)
  {
    while ($row=$result->fetch_assoc())
    {
      array_push($this->messages,new Message($row["ID"]));
    }
  }
}

function getMessages()
{
  return $this->messages;
}

public function getMessage($MID)
{
  foreach($this->messages as $message)
  {
    if($MID==$message->getID())
    {
      return $message
    }
  }
}

function readMessages(){
  $sql = "SELECT * FROM messages";
  $result = $this->db->query($sql);
  if ($result->num_rows > 0){
      return $result;
  }
  else {
      return false;
  }
}

function insertMessage($message)
{
  $sql="INSERT INTO messages (UserFromID,UserToID,Message,MessageDate,MessageTime) VALUES('".$_SESSION['ID']."','-1','$message','" . date("Y-m-d") . "','" . date("H:i:s")."')";
  if($this->db->query($sql) === true){
        echo "Record inserted successfully.";
        $this->fillArray();
      }
      else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
      }
}

function insertReply($CID,$message,$MID)
{
  $sql="INSERT INTO messages (UserFromID,UserToID,Message,MessageDate,MessageTime) VALUES('".$_SESSION['ID']."','$CID','$message','" . date("Y-m-d") . "','" . date("H:i:s")."'); Update messages SET UserToID= $_SESSION['ID'] WHERE $CID=UserFromID AND ID=$MID; ";

  if($this->db->query($sql) === true){
        echo "Record inserted successfully.";
        $this->fillArray();
      }
      else{
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
      }
}

}

  ?>
