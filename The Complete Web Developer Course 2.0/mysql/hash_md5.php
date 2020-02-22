

<?php 

	// level 2 encryption, just md5 hash
	// 	echo md5("password");


	// level 3 encryption, md5 with salt
	//$salt = "asdgdfrewtg";
	//echo md5($salt."password");

	// level 4 encryption, hash with user id or random salt
	$row['id'] = 73;
	echo md5(md5($row['id'])."password");
	

?>