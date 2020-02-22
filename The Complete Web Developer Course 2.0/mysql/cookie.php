

<h3>Cookie stay for 10 seconds, go to index.php for cookie value 1234</h3>

<?php 

	// cookie name, value, expire date, in this case, it's 10 seconds later
	setcookie("customerId", "1234", time() + 10);

	// update cookie value
	//$_COOKIE["customerId"] = "test";

	echo $_COOKIE["customerId"];

	// delete cookie, only happen when the page is reload
	//setcookie("customerId", "", time() - 60);

?>