<?php
include "DBHelper.php";
      $db=new DBHelper();
$conn=$db->connect();
$sql=" Update credentials SET status = 'Approved' where UserID ='$_GET[id]' ";

if( mysqli_query($conn,$sql))
header("refresh:1; url=ApproveRegistrationView.php");
    ?>