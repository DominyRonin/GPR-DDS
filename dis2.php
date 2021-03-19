<?php
include "DBHelper.php";
      $db=new DBHelper();
$conn=$db->connect();
$sql=" Delete from credentials where UserID ='$_GET[id]' ";

if( mysqli_query($conn,$sql))
header("refresh:1; url=ApproveRegistrationView.php");
    ?>