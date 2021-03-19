<?php

//include("resview.php");
require_once("Controller.php");


class AddDefectsController extends Controller
{
   
   function AddDefect()
   {
    $Name = $_POST['name'];
    $Discription=$_POST['description'];

    $this->model->AddDefect($Name, $Discription );
   }

   function retriveuserpending()
   {
      $this->model->retriveDefcts();
   }

    function isdeleteuser()
    { 
       $id=$_REQUEST[$row[0]];
      //$this->model->deleteuser($id);
    }
    
}




?>
