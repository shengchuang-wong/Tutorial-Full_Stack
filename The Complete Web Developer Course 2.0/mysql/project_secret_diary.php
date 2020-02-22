
<?php 

	session_save_path("/home/users/web/b2742/ipg.doomexcom/cgi-bin/tmp"); 

	session_start();

	if (array_key_exists("logout", $_GET)) {
		//unset($_SESSION);
		session_unset($_SESSION['id']);
		session_destroy();
		setcookie("id", "", time() - 60*60);
		$_COOKIE["id"] = "";
		//echo "Log out successfully.";
		header("Location: project_secret_diary.php");
	} else if (array_key_exists("id", $_SESSION) OR array_key_exists("id", $_COOKIE)) {
		header("Location: logged_in_page.php");
	}
    

	$error = "";

	// check whether submit is pressed and send to post
	if(array_key_exists("submit", $_POST)) {
		//print_r($_POST);

		include("connection.php");

		if (!$_POST["email"]) {
			$error .= "An email address is required<br>";
		} else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
      		$error .= "The email address is invalid.<br>";
    	}

		if (!$_POST["password"]) {
			$error .= "A password is required<br>";
		}

		if ($error != "") {
			$error = "<p>There were error(s) in your form:</p>".$error;
		} else {

			if ($_POST["signUp"] == '1') {

				$query = "SELECT id FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";

				$result = mysqli_query($link, $query);

				if (mysqli_num_rows($result) > 0) {
					$error = "That email address is taken.";
				} else {
					$query = "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."', '".mysqli_real_escape_string($link,$_POST['password'])."')";

					if (!mysqli_query($link, $query)) {
						$error = "<p>Could not sigh you up - please try again later.</p>";
					} else {

						$query = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

						mysqli_query($link, $query);

						$_SESSION['id'] = mysqli_insert_id($link);

						if ($_POST['stayLoggedIn'] == 1) {
							setcookie("id", mysqli_insert_id($link), time() + 60 * 60 * 24 * 365);
						}

						header("Location: logged_in_page.php");
					}
				}

			} else {

				$query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

				$result = mysqli_query($link, $query);

				$row = mysqli_fetch_array($result);

				if (isset($row)) {
					$hashedPassword = md5(md5($row['id']).$_POST['password']);

					if ($hashedPassword == $row['password']){
						$error = "asd";

						$_SESSION['id'] = $row['id'];

						if ($_POST['stayLoggedIn'] == 1) {
							setcookie("id", $row['id'], time() + 60 * 60 * 24 * 365);
						}

						header("Location: logged_in_page.php");
					} else {
						$error = "That email/password combination could not be found.";
					}

				} else {
					$error = "That email/password combination could not be found.";
				}

			}



		}

	}

?>

<?php include("diary_header.php"); ?>

	<div class="container" id="homePageContainer">

	    <h1>Secret Diary</h1>

	    <p><strong>Store your thoughts permanently and securely.</strong></p>

		<div id="error">
		<?php 

			if ($error != "") {
				echo "<div class='alert alert-danger' role='alert'>"
  				.$error."
				</div>";
			}

		?></div>

		<form method="post" id="signUpForm">

		<p>Interested? Sign up now.</p>

			<fieldset class="form-group">
				<input type="email" name="email" placeholder="Your Email" class="form-control">
			</fieldset>


			<fieldset class="form-group">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</fieldset>

			<fieldset class="form-group">
				<input type="hidden" name="signUp" value="1">

				<input type="submit" name="submit" value="Sign Up!" class="btn btn-primary">
			</fieldset>

			<p><a class="toggleForms" style="color: lightgreen" onmouseover="text-decoration: underline">Log in</a></p>

		</form>

		<form method="post" id="loginForm">

			<p>Log in using your username and password.</p>

			<fieldset class="form-group">
				<input type="email" name="email" placeholder="Your Email" class="form-control">
			</fieldset>

			<fieldset class="form-group">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</fieldset>

			<div class="checkbox">
				<label>
					<input type="checkbox" name="stayLoggedIn" value="1"> Stay logged in		
				</label>
			</div>

			<fieldset class="form-group">
				<input type="hidden" name="signUp" value="0">

				<input type="submit" name="submit" value="Log In!" class="btn btn-primary">
			</fieldset>

			<p><a class="toggleForms" style="color: lightgreen" onmouseover="text-decoration: underline">Sign up</a></p>

		</form>
	</div>

    <?php include("diary_footer.php") ?>



