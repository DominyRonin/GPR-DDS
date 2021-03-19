<!DOCTYPE html>
<html>
    <head>

      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

      <link rel="stylesheet" href="css/bootstrap.min.css">
              <link rel="stylesheet" href="css/bootstrap-theme.min.css">
              <link rel="stylesheet" href="css/fontAwesome.css">
              <link rel="stylesheet" href="css/hero-slider.css">
              <link rel="stylesheet" href="css/owl-carousel.css">
              <link rel="stylesheet" href="css/datepicker.css">
              <link rel="stylesheet" href="css/templatemo-style.css">

              <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

              <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>



      <?php
include "menu.php";
include_once ("AddDefectsModel.php");
        include_once("AddDefectsController.php"); 
        $model=new AddDefectsModel();
        $controller=new AddDefectsController($model);
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $controller->{$_GET['action']}();
          }
       ?>

       <style>
       <?php
       include "css/gallery.css";
        ?>
       </style>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
      <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

      <div class="DataTable" style="overflow:auto; padding:5%" id="Messages">  <!-- Requests block -->
        <button class= "btn btn-primary collapsible" style="font-size: 18px;border-radius: 10px;margin-bottom: 6px;" >Add Defect<span class="glyphicon glyphicon-plus" ></span></button>

        <div class="content">

        <div class="wrapper ">
          <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->


            <form style="padding:3%" action="AddDefectsView?action=AddDefect" role="form" method="post">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="description">Description:</label>
                  <input type="text" class="form-control" id="description" name="description" >
                </div>
                <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Add Defect</button>
              </div>
              </form>


</div>
</div>

          </div>
          <div class="container">
  
  <h2>Approve table
                   </h2>
  <div class="table-condensed table-bordered">          
  <table class="table" id="myTable">
    <thead>
      <tr>
       
        <th>Name</th>
        <th>Discription</th>
        <th>Delete</th>

       
       
       
      </tr>
      <?php
      $controller->retriveuserpending();
      $sr=1;
      $result=$model->retriveDefcts();
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
        
        <td> <?php echo $row[1];?></td>
        <td> <?php echo $row[2];?></td>
        
        
       
         <?php //echo "<td><a href=apv.php?id=".$row[0].">Approve  </a> </td>";?>
         <?php echo "<td><a href=dis3.php?id=".$row[0].">Delete  </a> </td>";?>
        
     
     
      
      </form>
      </tr>
      <?php $sr++;}
      ?>       
  
  </table>
  </div>
</div>
      		</div>

          <?php
          include "footer.php";
           ?>

        </body>


<script>
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>


    </html>
