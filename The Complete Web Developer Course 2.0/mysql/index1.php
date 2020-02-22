

<h3>This page will show how to select, insert and update records of database records (multiple record)</h3>

<?php 
    
     // host, username, password, database
	$link = mysqli_connect("doomexcom.ipagemysql.com", "foundragon", "123456qwe", "web_developer_2");

	if (!mysqli_connect_error()) {
		echo "<p>Database connection successful</p>";
	} else {
		die ("<p>There was an error connecting to the database</p>");
	}


	mysqli_query($link, $query);

	// select all
	//$query = "SELECT * FROM users";

	// select record according to specific email
	//$query = "SELECT * FROM users WHERE email = 'shengchuang1996@gmail.com'"

	// select recrods according to contained "1996"
	//$query = "SELECT * FROM users WHERE email LIKE '%1996%'";

	// select recrods according to end with "gmail.com"
	//$query = "SELECT * FROM users WHERE email LIKE '%gmail.com'";

	// select recrods according to start with "sheng"
	//$query = "SELECT * FROM users WHERE email LIKE 'sheng%'";

	// select record with condition and escpare the troblesome symbol
	//$name = "Rob O'Grady";
	//$query = "SELECT email FROM users WHERE name = '".mysqli_escape_string($link, $query)."'";

	// select only email from all the users
	$query = "SELECT email FROM users";

	if($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_array($result)) {
			print_r($row);
		}
	}



?>