<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html>
  <head><title>Multiplication Table</title></head>
  <body>

  	<?php
  	  $inputs = array('min-multiplicand' => 'Minimum Multiplicand', 
  	  	              'max-multiplicand' => 'Maximum Multiplicand', 
  	  	              'min-multiplier' => 'Minimum Multiplier', 
  	  	              'max-multiplier' => 'Maximum Multiplier');
      $error = false;

  	  #Check that inputs exist
  	  #Source: http://stackoverflow.com/questions/1222244/loop-through-get-results
  	  foreach ($_GET as $key => $value) {
  	    if($value == NULL) {
  	  		echo "Missing Parameter: " . $inputs[$key] . "<br />";
          $error = true;
  	  	}
  	  }
      #Check if inputs are integers
      #Source: http://stackoverflow.com/questions/6416763/checking-if-a-variable-is-an-integer-in-php
  	  foreach ($_GET as $key => $value) {
  	    if(! filter_var($value, FILTER_VALIDATE_INT)) {
  	  		echo $inputs[$key] ." must be an integer. <br />";
          $error = true;
  	  	} else if((int)$value < 0) {
          echo $inputs[$key] . " must be an integer greater than or equal to zero.<br />";
          $error = true;
        }
  	  }

      #Check min <= max multiplicand
      if($_GET['min-multiplicand'] > $_GET['max-multiplicand']) {
      	echo "Minimum multiplicand larger than maximum. <br />";
        $error = true;
      }

  	  #Check min <= max multiplier
  	  if($_GET['min-multiplier'] > $_GET['max-multiplier']) {
  	  	echo "Minimum multiplier larger than maximum. <br />";
        $error = true;
  	  }

      if($error === false) {
        echo "<h3>Multiplication Table</h3>";

        #variables for table generation
  	   $height = $_GET['max-multiplicand'] - $_GET['min-multiplicand'] + 2;
  	   $width = $_GET['max-multiplier'] - $_GET['min-multiplier'] + 2;

  	   #Create arrays for column and row headers
  	   $rowHeads = array();
  	   $colHeads = array();
  	   array_push($rowHeads, " ");
  	   array_push($colHeads, " ");

        #fill row headers array
    	  for($x = $_GET['min-multiplicand']; $x <= $_GET['max-multiplicand']; $x++) {
          array_push($rowHeads, $x);
  	   }
  	   #fill column headers array
  	   for($x = $_GET['min-multiplier']; $x <= $_GET['max-multiplier']; $x++) {
         array_push($colHeads, $x);
  	   }

        #Source: http://www.quora.com/How-can-I-create-a-table-in-HTML-by-using-PHP-for-a-loop-that-is-formed-by-matrix-addition-dynamically
  	   echo "<table border=1><thead><tr>";

        #use column headers as header cells
  	   foreach($colHeads as $colHead) {
  	 	 echo "<th>" . $colHead . "</th>";
  	   }
  	   echo "</tr></thead><tbody>";
     	  
        #Fill table
  	   for($rows = 1; $rows < $height; $rows++) {
  	  	  #create row elements for specified height
  	  	  echo "<tr>";

  	  	  #for each row, create column elements for specified width
  	  	  for($cols = 0; $cols < $width; $cols++) {
  	  		 #in first column, populate with values from row header array
  	  		 if($cols == 0) {
  	  		 	echo "<td>" . $rowHeads[$rows] . "</td>";
  	  		 } else {
  	  		 	#calculate and populate with products
  	  		 	$body = $rowHeads[$rows] * $colHeads[$cols];
  	  		 	echo "<td>" . $body . "</td>";
  	  		}  
  	  	}
  	  	echo "</tr>";
  	  }
  	  echo "</tbody></table>";
    } else {
      echo "Click <a href='multtable.html'>here</a> to try again.<br />";
    }
  	?>
  	
  </body>
</html>
