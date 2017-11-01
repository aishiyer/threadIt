<?php
ob_start();
session_start();
require_once 'dbconnect2.php';
//upload.php
//if session is not set this will redirect to login page
if(!isset($_SESSION['user']) ) {
header("Location: login2.php");
exit;
}
$uploadOk = 1;

 $temp_name = $_FILES["fileToUpload"]["tmp_name"];

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

$uploads_dir = 'uploads/';


$upload_file = $uploads_dir . basename($_FILES["fileToUpload"]["name"]); //final place to store iamges
$typeOfPhoto = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));

if($typeOfPhoto != "jpg" && $typeOfPhoto != "png" && $typeOfPhoto != "jpeg"
&& $typeOfPhoto != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
echo "<p>";


$photoCaption = $_POST["photoCaption"];
$username = $_SESSION['user'];
$photoName = addslashes($_FILES['fileToUpload']['name']);

if ($uploadOk == 1) 
{
   $image = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));

 $query = "INSERT INTO Photos (Photoname, Caption, Photodata, Username) VALUES('{$photoName}', '$photoCaption', '{$image}' , '$username')";
    $result = mysql_query($query);

    if($result) {
            echo "hello";

        $errTyp = "Success";
   
    } else {
        $errTyp = "Sorry, there was an error uploading your file.";
    }
}

?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title> 
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 3px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
 <div class="page-header">
     <h1>Uploaded </h1>
     </div>
        
        <div class="row">
        <div class="col-lg-12">
        </div>
        </div>
    
    </div>
    
    </div>


 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
          </ul>
          <ul class="nav navbar-nav navbar-right">


                 <body>
                  </body>
Image has been uploaded.


                  <br/>
                  <br/>
                  <br/>
                  <br/>
                <a href="home2.php?Home">Go to Home</a>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div> 
    </nav> 

 <div id="wrapper">

 <div class="container">
    
    
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>