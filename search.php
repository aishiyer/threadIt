	<?php
	ob_start();
	session_start();
	require_once 'dbconnect2.php';
	//search.php
	//if session is not set this will redirect to login page
	if(!isset($_SESSION['user']) ) {
	header("Location: login2.php");
	exit;
	}

	//if photoName is full
	 if ($_POST["photoName"] != '')
	 {
	 	 $photoName = '%' . $_POST["photoName"] . '%';

	 	$sql = "SELECT Photodata FROM Photos WHERE Photoname LIKE '$photoName'";
	 	//echo $sql;
	 	$result = mysql_query($sql);

	 	if (!$result) {
	 		echo "Something wrong with SQL statement";
	 	}

	 	while($row = mysql_fetch_array($result)) {

	  echo '<img src = "data:image/jpeg;base64,' . base64_encode($row['Photodata']).'""width = "290" height = "290"/>';

	}
	 }
	 else if ($_POST["photoCaption"] != '')
	 {
	 	 $photoCaption = '%' . $_POST["photoCaption"] . '%';

	 	 	$sql = "SELECT Photodata FROM Photos WHERE Caption LIKE '$photoCaption'";
	 	//echo $sql;
	 	$result = mysql_query($result);
	 	if (!$result) {
	 		echo "Something wrong with SQL statement";
	 	}
	 	while($row = mysql_fetch_array($result)) {

	   echo '<img src = "data:image/jpeg;base64,' . base64_encode($row['Photodata']).'""width = "290" height = "290"/>';
	}
	}
	else
	{
		echo "Nothing to return.";
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
	     <h1>Search </h1>
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
	Image:


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