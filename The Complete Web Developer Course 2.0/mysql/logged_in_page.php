
<?php 

	session_save_path("/home/users/web/b2742/ipg.doomexcom/cgi-bin/tmp");

	session_start();

	$diaryContent = "";

	if (array_key_exists("id", $_COOKIE)) {
		$_SESSION['id'] = $_COOKIE['id'];
	}

	if (array_key_exists("id", $_SESSION)) {

		include("connection.php");

		$query = "SELECT diary FROM users WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";

			//$result = mysqli_query($link, $query);

			$row = mysqli_fetch_array(mysqli_query($link, $query));

			//while ($row = mysqli_fetch_array($result)) {
			//	$diaryContent = $row['diary'];
			//}

			$diaryContent = $row['diary'];

	} else {
		header("Location: project_secret_diary.php");
	}



	include ("diary_header.php");

?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Secret Diary</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <a href="project_secret_diary.php?logout=1"><button class="btn btn-outline-success my-2 my-sm-0" >Logout</button></a>
    </div>
  </div>
</nav>

	<div class="container-fluid" id="loggedInPageContainer">
		<textarea name="" id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>

	</div>


<?php include("diary_footer.php"); ?>