<?php
session_start();
//logout2.php
if(!isset($_SESSION['user'])) {
header("Location: login2.php");
} else if(isset($_SESSION['user']) +"") {
header("Location: home2.php");
}

if (isset($_GET['logout'])) {
unset($_SESSION['user']);
session_unset();
session_destroy();
header("Location: login2.php");
exit;
}