<?php

class ClientController
{

  protected $buildingsModel;
  	protected $resultsModel;
  	protected $chientModel;
    protected $messageModel;
    protected $pillarModel;

  	public function __construct($buildingsModel,$pillarModel,$resultsModel,$chientModel,$messageModel) {
          $this->$buildingsModel = $buildingsModel;
          $this->$pillarModel=$pillarModel;
  				$this->$resultsModel=$resultsModel;
  				$this->$chientModel=$chientModel;
          $this->$messageModel=$messageModel;

      }

      public function sendMessage()
      {
        $message=$_REQUEST['message'];

        $this->$messageModel->sendClientMessage($message);
      }
       public function getMessages()
       {

         return $this->$messageModel->getMessages();

       }

       public function deleteMessages()
       {
         $messageID=$_REQUEST['Message_ID'];
         return $this->$messageModel->getMessage($messageID)->deleteMessage();

       }

       public function addPillar()
       {
         $pillarName=$_REQUEST['PName']
         $pillarDescription=$_REQUEST['PDescription'];
         $pillarImage=$_REQUEST['PImage'];
         $BuidlingID=$_R['Building_ID'];

         $this->pillarModel->insertPillar($pillarName,$pillarDescription,$pillarImage,$BuidlingID)
       }

       public function getAllPillars()
       {
         return $this->pillarModel->getAllPillars();
       }

       public function getBuildingPillars()
       {
         $BID=$_REQUEST['Building_ID'];
         return $this->$buildingsModel->getBuilding($BID)->getBuildingPillars();
       }

       public function getPillar()
       {
         $pillarID=$_REQUEST['Pillar_ID'];
         return $this->pillarModel->getPillar($pillarID);
       }

       public function deletePillar()
       {

         $pillarID=$_REQUEST['Pillar_ID'];
         $this->pillarModel->getPillar($pillarID)->deletePillar();

       }

      public function addBuilding() {
  		$BName = $_REQUEST['BName'];
      $BAddress=$_REQUEST['BAddress'];

  		$this->$buildingsModel->insertBuilding($BName,$BAddress);
  	}

  	public function deleteBuilding(){
  		$BuidlingID = $_REQUEST['Building_ID'];
  		$this->$buildingsModel->getBuilding($BuidlingID)->deleteBuilding();
  	}

    public function getBuilding()
    {
      $buildingID=$_REQUEST['Building_ID'];
      return $this->buildingsModel->getBuilding($buildingID);
    }

  public function GetResults()
  {

  	return $this->$resultsModel->getResults();

  }
  public function editAccount()
  {
  	$email=$_REQUEST['email'];
  	$FName=$_REQUEST['FName'];
  	$password=$_REQUEST['password'];
  	$password=sha1($password);
    $LName=$_REQUEST['LName'];
  	$age=$_REQUEST['age'];
  	$profilePic=$_REQUEST['profilePic'];

  	$this->$chientModel->editUser($email,$password,$FName,$LName,$age,$profilePic);
  }


}

 ?>
