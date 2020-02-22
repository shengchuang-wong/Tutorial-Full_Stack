

<?php 

  //session.save_path = "4;/hermes/phpsessions" << Ipage

  session_save_path("/home/users/web/b2742/ipg.doomexcom/cgi-bin/tmp"); 

  session_start();

?>

<?php 

  if($_POST) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $link = mysqli_connect("doomexcom.ipagemysql.com", "foundragon", "123456qwe", "web_developer_2");

    $query = "SELECT id FROM users WHERE email = '".mysqli_escape_string($link, $email)."'";


    $message = "";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
      $message = "<div class='alert alert-danger'>The email you entered is already exist. Please try another.</div>";
    } else {
      $query = "INSERT INTO users (email, password) VALUES('".mysqli_escape_string($link, $email)."', '".mysqli_escape_string($link, $password)."')";

      if (mysqli_query($link, $query)) {
        $_SESSION["email"] = $email;
        header("Location: session.php");
      } else {
        $message = "<div class='alert alert-danger'>The records was not inserted due to unexpected reason. Please try again later.</div>";
      }

    }



  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>


  <div class="container">
  <div id="messageContainer"><?php echo $message; ?></div>
    
    <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="required">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="required">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>