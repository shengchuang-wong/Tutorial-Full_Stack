
<h3>This page will show how to select, insert and update records of database record (single record)</h3>

<?php 

    echo $_COOKIE["customerId"];

     // host, username, password, database
	$link = mysqli_connect("doomexcom.ipagemysql.com", "foundragon", "123456qwe", "web_developer_2");

	if (!mysqli_connect_error()) {
		echo "<p>Database connection successful</p>";
	} else {
		die ("<p>There was an error connecting to the database</p>");
	}

	// insert query
	//$query = "INSERT INTO users (email, password) VALUES('kenowong@gmail.com', 'asd34tASgag')";

	/*if (mysqli_query($link, $query)) {
		echo "Record was inserted successfully";
	} else {
		echo "Record was not inserted into database";
	}*/

	// update query
	// below statment will change all the email within users record into shengchuang@gmail.com << don't do this (danger)
	//$query = "UPDATE users SET email = 'shengchuang@gmail.com'";

	// below statment will change the email into shengchuang1996@gmail.com where the record's id is 1 and LIMIT 1 stand for affect only 1 row
	$query = "UPDATE users SET email = 'shengchuang1996@gmail.com' WHERE id = 1 LIMIT 1";

	mysqli_query($link, $query);

	$query = "SELECT * FROM users";

	if($result = mysqli_query($link, $query)) {
		echo "<p>Query was successful</p>";

		$row = mysqli_fetch_array($result);

		echo "Your email is ".$row["email"].", and your password is ".$row["password"];
	}



?>