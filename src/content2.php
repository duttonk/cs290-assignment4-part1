<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();  //if session doesn't exist, start. If exists, resume current
?>

<!DOCTYPE html>
<html>
	<head><title>Content2</title></head>
	<body>
	<?php
		//session_start();
		if(!isset($_SESSION['username'])) {
			echo "You must be logged in to view this page. Click ";
    		echo "<a href='login.php'>here</a> to return to the login screen.<br/>";
		} else {
			echo "Click <a href='content1.php?action=return'>here</a> to return to Content1.<br/>";
		}
	?>

	</body>
<html>