	
	<?php 

		if(!empty($_POST)) {
			print_r($_POST);

			$isKnown = false;

			$nameList = array("Rob", "Kristen", "Tommy", "Ralphie");

			foreach ($nameList as $value) {
				if ($value == $_POST["name"]) {
					$isKnown = true;
				}
			}

			if ($isKnown) {
				echo "Hello ".$_POST["name"]."!";
			} else {
				echo "I don't know you";
			}

		}

	?>


	<form method="post">

		<p>What's your name</p>

		<input type="text" name="name">

		<p>What's your gender?</p>

		<input type="radio" name="gender" value="Female"> Female
		<br>
		<input type="radio" name="gender" value="Male"> Male
		<br>
		<input type="submit" value="Go!"> 
	</form>