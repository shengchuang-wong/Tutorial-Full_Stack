<p>In this page, i will include the contact form and (get content from foundragon.com) <- fail</p>

<?php 

	include("contact_form.php");

	echo file_get_contents("http://www.foundragon.com");
?>

