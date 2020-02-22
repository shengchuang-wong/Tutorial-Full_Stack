

<div class="container mainContainer">

	<div class="row">
		<div class="col-md-8">

			<?php if ($_SESSION['id']) { ?>

			<h2>Your tweets</h2>

			<?php displayTweets('yourtweets'); ?>

			<?php } else { ?>

			<h2>Unauthorized Access</h2>

			<h3>You are required to sign in order to view the content</h3>

			<?php } ?>

		</div>
		<div class="col-md-4">
			<?php displaySearch(); ?>
			<hr>
			<?php displayTweetBox(); ?>
		</div>
	</div>

</div>