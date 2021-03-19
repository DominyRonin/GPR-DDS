<html>
<?php   include_once ("menu.php");
        include_once ("ApproveRegistrationModel.php");
        include_once("ApproveRegistrationController.php"); 
        $model=new ApproveRegistrationModel();
        $controller=new ApproveRegistrationController($model);
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $controller->{$_GET['action']}();
          }
        ?>
<head>
    <head>
        <title>GPR CUT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">
    
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
    
        <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <style>
        
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
          
           .logo
       {
        width: 100px;
        height: 100px; 
       } 
          </style>
    
    
        <!-- Theme Style -->
        <link rel="stylesheet" href="css/style.css">
      </head>





<body>
    
        <div class="container">
  
  <h2>Approve table
                   </h2>
  <div class="table-condensed table-bordered">          
  <table class="table" id="myTable">
    <thead>
      <tr>
       <th>UserID</th>
        <th>Type</th>
        <th>Email</th>
        <th>Password</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>DOB</th>
        <th>Approve</th>
        <th>DisApprove</th>

       
       
       
      </tr>
      <?php
      $controller->retriveuserpending();
      $sr=1;
      $result=$model->getuser();
      while($row=mysqli_fetch_array($result)){
        if (isset($_POST['Approve'])) {
        
     
         
       /* $sql=" UPDATE user set isApproved  = true where id='".$row['id']."'";
          $result = mysqli_query($conn,$sql);

          $sql="Select * from user where usertypeid = 2 and isApproved =0  ";
          $result = mysqli_query($conn,$sql);
          */
        }
       // die();
      
          # code...
         
        ?>
    <tr>
      <form action=""method="post" >
        <td> <?php echo $sr;?></td>
        <td> <?php echo $row[1];?></td>
        <td> <?php echo $row[2];?></td>
        <td> <?php echo $row[3];?></td>
        <td> <?php echo $row[4];?></td>
        <td> <?php echo $row[5];?></td>
        <td> <?php echo $row[6];?></td>
        
       
         <?php echo "<td><a href=apv.php?id=".$row[0].">Approve  </a> </td>";?>
         <?php echo "<td><a href=dis2.php?id=".$row[0].">Disapprove  </a> </td>";?>
        
     
     
      
      </form>
      </tr>
      <?php $sr++;}
      ?>       
  
  </table>
  </div>
</div>

</body>

</html>

