<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html>
  <head><title>Login Result</title></head>
  <body>
    <?php 
    session_start();
    #Sources: Thursday tutoring session code, textbook, lecture source code
    #No username entered

 //   if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'return') {
   // 	echo "Hello $_SESSION[username]. You have visited this page ";
    //	echo "$_SESSION[visit] times before.<br />";
    //	echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";
    //}

    if((empty($_REQUEST['username'])) && empty($_SESSION['username'])) {
    	echo "A username must be entered. Click ";
    	echo "<a href='login.php'>here</a> to return to the login screen.<br/>";

    #Username entered
     } else {

     	#no session user set - set session variables
     	if(!isset($_SESSION['username'])) {
     		$_SESSION['username'] = $_REQUEST['username'];

     		#check visits - set if not set
     		if(!isset($_SESSION['visit'])) {
     			$_SESSION['visit'] = 0;
     		}

     		$_SESSION['visit']++;
     		echo "Hello $_SESSION[username]. You have visited this page ";
     		echo "$_SESSION[visit] times before.<br />";
     		echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";
 
     	#session user set
     	} else {
     		#returning from content2
     		if((isset($_REQUEST['action']) && ($_REQUEST['action'] == 'return')) || 
     			isset($_SESSION['username'])) {
     			#make sure visits are set
     			if(!isset($_SESSION['visit'])) {
     				$_SESSION['visit'] = 0;
     			}

     			$_SESSION['visit']++;
     			echo "Hello $_SESSION[username]. You have visited this page ";
     			echo "$_SESSION[visit] times before.<br/>";
     			echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";

     		#new login
     		} else if(($_SESSION['username'] == $_REQUEST['username'])) {
     			#make sure visits are set
     			if(!isset($_SESSION['visit'])) {
     				$_SESSION['visit'] = 0;
     			}

     			$_SESSION['visit']++;
     			echo "Hello $_SESSION[username]. You have visited this page ";
     			echo "$_SESSION[visit] times before.<br/>";
     			echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";

     		#username not the same as session username
     		} else {
     			echo "Error - $_SESSION[username] already logged in. ";
				echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";
     		}
     	}
     	echo "Click <a href='content2.php'>here</a> to visit our other page.";
     }
    ?>
  
  </body>
</html>