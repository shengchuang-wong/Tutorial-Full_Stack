<?php 
	
	$myArray = array ("Rob", "Kristen", "Tommy", "Ralphie");

	// add element to the array
	$myArray[] = "Katie";

	// delete array element
	unset($myArray[0]);

	// How to print array
	print_r($myArray);

	// print 1st element of array
	echo "$myArray[0]";

	echo "<br><br>";

	$anotherArray["myFood"] = "Burger";

	print_r($anotherArray);

	echo "<br><br>";

	$thirdArray = array("Username" => "King", "Password" => "123456");

	print_r($thirdArray);

	// get length of array
	echo "Length of the array: ".sizeof($thirdArray);

	echo "<br><br>";

	echo "Using for each loop to read through the element<br>";

	foreach ($thirdArray as $key => $value) {
		echo "Array item ".$key." : ".$value."<br>";
	}
?>