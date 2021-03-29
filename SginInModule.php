<?php
//include_once "login.php";
require_once("Model.php");
if (session_status() == PHP_SESSION_NONE)
{ error_reporting(E_ALL ^ E_WARNING); 
  session_start();
}
include_once ("Sessions.php");
class SginInModule extends Model {
  public $ID;
  public $Type;
  /*   public  function Login($email1, $Pass1)
      {
            if (session_status() == PHP_SESSION_NONE)
            { error_reporting(E_ALL ^ E_WARNING); 
              session_start();
            }
            $db=new DBHelper(); 
            $result = $db->connect()->query("SELECT * FROM credentials WHERE Email = '$email1' and Password='$Pass1' ");
            while ($row_users =mysqli_fetch_assoc($result)) {
              $_SESSION["ID"]=$row_users['UserID'];             
              $_SESSION["Type"]=$row_users['Type'];              
              //return $_SESSION["ID"] ;
              //return  $_SESSION["Type"];
            }
           // serialize($_SESSION["Type"]);
           // serialize($_SESSION["ID"]);
            var_dump($_SESSION["Type"]);
            var_dump($_SESSION["ID"]);
          }   */
}
//$_SESSION["ID"] =$ID;
//$_SESSION["Type"]=$Type;

?>