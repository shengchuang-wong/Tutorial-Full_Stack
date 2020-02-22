<?php 
                
    $emailTo = "shengchuang1996@gmail.com";

    $subject = "Hi there";

    $body = "I am king of the world";

    $from = "From: king@king.com";

	if(mail($emailTo, $subject, $body, $from)) {
		echo "The email was sent successfully";
	} else {
		echo "The email could not be sent.";
	}

?>