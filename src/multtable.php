<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html>
  <head><title>Multiplication Table</title></head>
  <body>

  	<?php
  	  $inputs = array('minMand' => 'Minimum Multiplicand', 
  	  	              'maxMand' => 'Maximum Multiplicand', 
  	  	              'minMer' => 'Minimum Multiplier', 
  	  	              'maxMer' => 'Maximum Multiplier');

  	  #Check that inputs exist
  	  #Source: http://stackoverflow.com/questions/1222244/loop-through-get-results
  	  foreach ($_GET as $key => $value) {
  	    if($value == NULL) {
  	  		echo "Missing Parameter: " . $inputs[$key] . "<br />";
  	  	}
  	  }
      #Check if inputs are integers
      #Source: http://stackoverflow.com/questions/6416763/checking-if-a-variable-is-an-integer-in-php
  	  foreach ($_GET as $key => $value) {
  	    if(! filter_var($value, FILTER_VALIDATE_INT)) {
  	  		echo $inputs[$key] ." must be an integer. <br />";
  	  	}
  	  }

      #Check min <= max multiplicand
      if($_GET['minMand'] > $_GET['maxMand']) {
      	echo "Minimum multiplicand larger than maximum. <br />";
      }

  	  #Check min <= max multiplier
  	  if($_GET['minMer'] > $_GET['maxMer']) {
  	  	echo "Minimum multiplier larger than maximum. <br />";
  	  }

  	  $height = $_GET['maxMand'] - $_GET['minMand'] + 2;
  	  $width = $_GET['maxMer'] - $_GET['minMer'] + 2;
  	  $rowHeads = array();
  	  $colHeads = array();
  	  array_push($rowHeads, " ");
  	  array_push($colHeads, " ");

  	  for($x = $_GET['minMand']; $x <= $_GET['maxMand']; $x++) {
        array_push($rowHeads, $x);
  	  }
  	  for($x = $_GET['minMer']; $x <= $_GET['maxMer']; $x++) {
        array_push($colHeads, $x);
  	  }

      echo "<table border=1>";
  	  echo "<table border=1><thead><tr>";

  	  foreach($colHeads as $colHead) {
  	  	echo "<th>" . $colHead . "</th>";
  	  }
  	  echo "</tr></thead><tbody>";
  	  
  	  for($rows = 0; $rows < $height; $rows++) {
  	  	echo "<tr>";
  	  	for($cols = 0; $cols < $width; $cols++) {
  	  		if($cols == 0) {
  	  			echo "<td>" . $rowHeads[$rows] . "</td>";
  	  		} else {
  	  			$body = $rowHeads[$rows] * $colHeads[$cols];
  	  			echo "<td>" . $body . "</td>";
  	  		}
  	  	}
  	  	echo "</tr>";
  	  }
  	?>


  </body>
</html>
