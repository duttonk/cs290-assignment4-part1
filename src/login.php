<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();  //if session doesn't exist, start. If exists, resume current
?>

<!DOCTYPE html>
<html>
  <head><title>User Login</title></head>
  <body>
  
  <?php 
  if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout'){

  	#Source: Thursday tutorial source code
  	session_start();
	session_unset();  //sets all var to null
	session_destroy();   //gets rid of session completely

	header("location: login.php"); //where to go after redirect
	exit(); 
  }

  #form to enter a username
  echo "<form id='login' method='POST' action='content1.php'>";
  echo "<span>Enter username: <input type='text' name='username'>";
  echo "<input type='submit' value='Login'>";


  ?>
  </body>
</html>
