
<?php 

	session_save_path("/home/users/web/b2742/ipg.doomexcom/cgi-bin/tmp"); 
	
	session_start();

	if($_SESSION["email"]) {
		echo "You are logged in!";
	} else {
		header("Location: simple_form.php");
	}

	session_destroy();
	session_unset();
     
?>