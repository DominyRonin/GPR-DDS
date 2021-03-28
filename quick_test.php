<?php

  include ("menu.php");
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "gpr");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = __DIR__."/Quick_Test/".basename($image);

    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    // $image_base64 = base64_encode(file_get_contents($target) );
    // $imagez = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // $extensions_arr = array("jpg","jpeg","png","gif");

  	$sql = "INSERT INTO quicktest ( BScanImage,	Description) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql)or die(mysqli_error($db));;

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

//****************

    // $name = $_FILES['file']['name'];
      // $target_dir = "upload/";
      // $target_file = $target_dir . basename($_FILES["file"]["name"]);

      // Select file type
      // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      // $extensions_arr = array("jpg","jpeg","png","gif");

      // Check extension
      // if( in_array($imageFileType,$extensions_arr) ){
      //
      //    // Insert record
      //    $query = "insert into images(name) values('".$name."')";
      //    mysqli_query($con,$query);
      //
      //    // Upload file
      //    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
      //
      // }
//***********************

  }
  $result = mysqli_query($db, "SELECT * FROM quicktest");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 90%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 95%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
echo '<img src="'."Quick_Test/".$row["BScanImage"].' " >';
		echo "<p> Image Description : ".$row['Description']."</p>";
		echo "<p> predicted class : ".$row['ResultDefect']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea
      	id="text"
      	cols="40"
      	rows="4"
      	name="image_text"
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['upload'])) {
  $command = escapeshellcmd("C:/xampp/htdocs/graduation-main/Model/app.py .$image");
  $output=shell_exec($command);
  echo $output;
}
include ("footer.php");
?>