
<!-- jQuery first, then Tether, then Bootstrap JS. -->

<footer class="footer">
    <div class="container">
        <p>&copy; My website 2017</p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-danger" id="loginAlert"></div>
                <form>
                    <input type="hidden" name="loginActive" id="loginActive" value="1">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email address" required="required">
                    </div>
                    <div class="form-group">
                        <label for="password">Passowrd</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" required="required">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a id="toggleLogin">Sign up</a>
                <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  $("#toggleLogin").click(function() {
      if($("#loginActive").val() == "1") {
        $("#loginActive").val("0");
        $("#loginModalTitle").html("Sign Up");
        $("#loginSignupButton").html("Sign Up");
        $("#toggleLogin").html("Login");
      } else {
        $("#loginActive").val("1");
        $("#loginModalTitle").html("Login");
        $("#loginSignupButton").html("Login");
        $("#toggleLogin").html("Sign Up");        
      }
  });

  $("#loginSignupButton").click(function() {
    $.ajax({
      type: "POST",
      url: "actions.php?action=loginSignup",
      data: "email=" +$("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
      success: function(result) {
        if (result == 1) {
          window.location.assign("http://foundragon.com/project/foundragon/project/web%20developer%202.0/mvc/");
        } else {
            $("#loginAlert").html(result).show();
        }

      }
    })
  });

  $("#logoutBtn").click(function() {
    window.location.href = "?function=logout";
  });

  $(".toggleFollow").click(function() {
    // alert($(this).attr('data-userid'));
    var id = $(this).attr('data-userId');

    $.ajax({
      type: "POST",
      url: "actions.php?action=toggleFollow",
      data: "userId=" + id,
      success: function(result) {
        if (result == 1) {
          $("button[data-userId='" + id + "']").html("Follow");
          if (window.location.search.substr(1).includes("timeline")) {
          $("button[data-userId='" + id + "']").parent().closest('div').hide();
        }
        } else if (result == 2) {
          $("button[data-userId='" + id + "']").html("Unfollow");
        }
      }
    })
  });

  $("#postTweetButton").click(function() {
        $.ajax({
      type: "POST",
      url: "actions.php?action=postTweet",
      data: "tweetContent=" + $("#tweetContent").val(),
      success: function(result) {
      
        if (result == 1) {
          $("#tweetSuccess").show();
          $("$tweetFail").hide();
        } else if (result != "") {
          $("#tweetFail").html(result).show();
          $("#tweetSuccess").hide();
        }

      }
    })
  });

</script>

</body>
</html>