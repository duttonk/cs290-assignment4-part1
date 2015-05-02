<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
?>

<!DOCTYPE html>
<html>
  <head><title>Login Result</title></head>
  <body>
    <?php
    #Sources: Thursday tutoring session, weekly lecture code, Web Applications textbook
    #Require username
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
                $_SESSION['visit'] = -1;
            }

            $_SESSION['visit']++;
            echo "Hello $_SESSION[username]. You have visited this page ";
            echo "$_SESSION[visit] times before.<br />";
            echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";
            echo "Click <a href='content2.php'>here</a> to visit our other page.";

        #session user set
        } else {

            #second user attempts login
            if(isset($_REQUEST['username']) && ($_REQUEST['username'] !== $_SESSION['username'])) {
                echo "Error - $_SESSION[username] already logged in. ";
                echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";

            #original user
            } else {
                #returning from content2 - should always be the case
                if((isset($_REQUEST['action']) && ($_REQUEST['action'] == 'return')) || 
                    isset($_SESSION['username'])) {
                    #make sure visits are set
                    if(!isset($_SESSION['visit'])) {
                        $_SESSION['visit'] = -1;
                    }

                    $_SESSION['visit']++;
                    echo "Hello $_SESSION[username]. You have visited this page ";
                    echo "$_SESSION[visit] times before.<br/>";
                    echo "Click <a href='login.php?action=logout'>here</a> to logout.<br />";
                    echo "Click <a href='content2.php'>here</a> to visit our other page.";
                } else {
                    echo "How did you get here? Go <a href='login.php?action=logout'>login</a>.<br />";
                }
            }
        }
    } 
  ?>
  
  </body>
</html>