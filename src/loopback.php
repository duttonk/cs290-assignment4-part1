<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

#Source: http://stackoverflow.com/questions/8140915/how-to-handle-unknown-number-of-items-from-a-form-in-php
$myArray = array();

#Source: Piazza post @246
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	#store key/value pairs in array, using "undefined" if a value is missing
	foreach($_POST as $key => $value) {
		if($value === "") {
			$value = "undefined";
		}
		#source: http://www.webdeveloper.com/forum/showthread.php?129340-array-push-with-key
		$myArray[$key] = $value;
	}

	#display as JSON object
	echo "{\"Type\":\"[POST]\", \"parameters\":{";
	#source: http://stackoverflow.com/questions/6054033/pretty-printing-json-with-php
	echo json_encode($myArray);
	echo "}}";

} else if($_SERVER['REQUEST_METHOD'] === 'GET') {
	foreach($_GET as $key => $value) {
		#source: http://www.webdeveloper.com/forum/showthread.php?129340-array-push-with-key
		if($value === "") {
			$value = "undefined";
		}
		$myArray[$key] = $value;
	}
	
	#if no key/value pairs were passed
	if(sizeof($myArray) === 0) {
		echo "{\"Type\":\"[GET|POST]\", \"parameters\":null}";

	} else {
		echo "{\"Type\":\"[GET]\", \"parameters\":";
		#source: http://stackoverflow.com/questions/6054033/pretty-printing-json-with-php
		echo json_encode($myArray);
		echo "}<br />";
	}
}

?>