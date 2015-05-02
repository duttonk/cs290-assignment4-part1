<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();  //if session doesn't exist, start. If exists, resume current

//handle logout procedure
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout') {
	session_unset();
	session_destroy();
	header("location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
  <head><title>User Login</title></head>
  <body>
    <?php
    #form to enter a username
  	echo "<form id='login' method='POST' action='content1.php'>";
  	echo "<span>Enter username: <input type='text' name='username'>";
  	echo "<input type='submit' value='Login'>";
  	?>
  </body>
</html>
