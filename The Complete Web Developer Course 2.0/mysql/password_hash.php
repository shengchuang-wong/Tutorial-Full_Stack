

<?php 

	$hash = password_hash("mypassword", PASSWORD_DEFAULT);

	//$hash = password_hash("mypassword", PASSWORD_DEFAULT, array('cost' => 12, ););
	

	echo $hash;

	echo "<br><br>";

	if (password_verify("mypassword", $hash)) {
		echo "Passowrd is valid.";
	} else {
		echo "Invalid Password!";
	}


?>

<p>For more details, please go to <a href="http://php.net/manual/en/function.password-hash.php">http://php.net/manual/en/function.password-hash.php</a></p>