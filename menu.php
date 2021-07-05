<?php
 if (session_status() == PHP_SESSION_NONE)
 {  error_reporting(E_ALL ^ E_WARNING); 
   session_start();
 }

?>
<html>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GPR CUT</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

<style>
body{
          background-color: #F2F2F2;
        }

</style>
<head>
  <div class="wrap">
      <header id="header">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <button id="primary-nav-button" type="button">Menu</button>
                      <nav id="primary-nav" class="dropdown cf">
                        <a href="index.php"><div class="logo">
                            <img src="img1/1logo.PNG" width="100" height="150" >
                        </div></a>
                        <ul class="dropdown menu">
                        <!-- <li class='active'><a href="userhomepage.php">Home</a></li>
                            <li class='active'><a href="profile.php">My profile</a></li>
                            <li class='active'><a href="signup.php">Buildings</a></li>
                            <li class='active'><a href="services.php">Results</a></li>
                            <li class='active'><a href="services.php">Messages</a></li>
                            <li class='active'><a href="logout.php">Logout</a></li> -->

                            <?php  
                               
                               include_once("DBHelper.php");
                          // include_once ("SginInController.php");
                           
                           //unserialize($_SESSION["Type"]);
                    
                          // unserialize($_SESSION["ID"]);

                          //$_SESSION["ID"]=1; 
                        /*  if (session_status() == PHP_SESSION_NONE)
                          {  error_reporting(E_ALL ^ E_WARNING); 
                            session_start();
                          }*/
                            require_once ("Sessions.php");
                           // var_dump($_SESSION['ID']);
                          //  var_dump($_SESSION['Type']);

                            if(!empty($_SESSION['ID']) && $_SESSION['Type']== 1 && $_SESSION['State']== "Approved" ) //client
                            {
                             
                              ?>
                             
                              <li class='active'><a href="user2.php">Buildings</a></li>
                              <li class='active'><a href="UserResults.php">Results</a></li>
                              <li class='active'><a href="QuickTest.php">Quick Results</a></li>
                              <li class='active'><a href="AdminMessageView.php">Messages</a></li>
                              <li class='active'><a href="EditePasswordView.php">Edite Password</a></li>
                              <li class='active'><a href="EditeAccView.php">Edite Acc and delete</a></li>

                              <li class='active'><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out" ></span></a></li>

                              <?php
                            }
                            else if (!empty($_SESSION['ID']) && $_SESSION['Type']== 2 && $_SESSION['State']== "Approved" ) //Expert
                            {
                              ?>
                             
                              <li class='active'><a href="QuickTest.php">Quick Test</a></li>
                              <li class='active'><a href="UserMessages.php">Messages</a></li>
                              <li class='active'><a href="LableDataView.php">Lable Data</a></li>
                              <li class='active'><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out" ></span></a></li>
                              <?php
                            }
                            else if (!empty($_SESSION['ID']) && $_SESSION['Type']== 3 && $_SESSION['State']== "Approved" ) //Admin
                            {
                              ?>
                             
                              <li class='active'><a href="ApproveRegistrationView.php">Approve Users</a></li>
                              <li class='active'><a href="AddDefectsView.php">Defects</a></li>
                              <li class='active'><a href="ControlUsers.php">Control the Users</a></li>
                              <li class='active'><a href="UserMessages.php">Messages</a></li>
                              <li class='active'><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out" ></span></a></li>
                              <?php
                            }
                            else
                            {
                              ?>
                              <li class='active'><a href="signupView.php">Sign Up</a></li>
                              <li class='active'><a href="signinView.php">Log In</a></li>
                              <?php
                            }
                             ?>

                        </ul>
                      </nav><!-- / #primary-nav -->
                  </div>
              </div>
          </div>
      </header>
  </div>

</head>
</html>
