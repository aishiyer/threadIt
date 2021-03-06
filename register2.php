<?php
//register
ob_start();
session_start();
if(isset($_SESSION['user']) != "" )
{
header("Location: home2.php");
}
include_once 'dbconnect2.php';

$error = false;

if( isset($_POST['btn-signup']) )
{
//clean user inputs to prevent problems
$fullname = trim($_POST['fullname']);
$fullname = strip_tags($fullname);
$fullname = htmlspecialchars($fullname);

$uname = trim($_POST['username']);
$uname = strip_tags($uname);
$uname = htmlspecialchars($uname);

$pass = trim($_POST['pass']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

// basic name validation
  if (empty($fullname)) {
   $error = true;
   $fullnameError = "Please enter your full name.";
  } else if (strlen($fullname) < 3) {
   $error = true;
   $fullnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fullname)) {
   $error = true;
   $fullnameError = "Name must contain alphabets and space.";
  }
  
  //basic username validation
  if (empty($uname)) {
      $error = true;
      $unameError = "Please enter a valid username.";
  }else {
   // check if username exist or not
   $query = "SELECT Username FROM Users WHERE Username='$uname'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $unameError = "Provided username is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 4) {
   $error = true;
   $passError = "Password must have atleast 4 characters.";
  }
    
//if there is no error, continue to signup
if (!$error) 
{
    $query = "INSERT INTO Users(UserFullName, Username, Password) VALUES('$fullname' , '$uname' , '$pass')";
    $res = mysql_query($query);
    
    if($res) {
        $errTyp = "Success";
        $errMSG = "Successfully registered, you may log in now.";
        unset($fullname);
        unset($uname);
        unset($pass);
    } else {
        $errTyp = "Danger";
        $errMSG = "Something went wrong, please try again later...";
    }
}
    
}
    


?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up </title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
  
 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="">Sign Up</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="fullname" class="form-control" placeholder="Enter Name" maxlength="50"  />
                </div>
                <span class="text-danger"><?php echo $fullnameError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="username" name="username" class="form-control" placeholder="Enter Your Username" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $unameError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="login2.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>