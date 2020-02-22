<?php 

	if(!empty($_GET)) {
		print_r($_GET);
	}

	echo "<br>gender: ";

	if(!empty($_GET["gender"])) {
		echo $_GET["gender"];
	} else {
		echo "none";
	}
?>

	<p>What's your gender?</p>

	<form>
		<input type="radio" name="gender" value="Female"> Female
		<br>
		<input type="radio" name="gender" value="Male"> Male
		<br>
		<input type="submit" value="Go!"> 
	</form>