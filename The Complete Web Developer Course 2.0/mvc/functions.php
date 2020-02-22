

<?php

session_save_path("/home/users/web/b2742/ipg.doomexcom/cgi-bin/tmp");

session_start();

$link = mysqli_connect("doomexcom.ipagemysql.com", "foundragon", "123456qwe", "twitter_clone");

if (mysqli_connect_error()) {
    die("Database Connection Error");
}

if ($_GET["function"] == "logout") {
    session_unset($_SESSION['id']);
    session_destroy();
    header('Location: http://foundragon.com/project/foundragon/project/web%20developer%202.0/mvc/');
    exit;
}

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365, 'year'),
        array(60 * 60 * 24 * 30, 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24, 'day'),
        array(60 * 60, 'hour'),
        array(60, 'min'),
        array(1, 'sec'),
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}s";
    return $print;
}

function displayTweets($type) {

    global $link;

    
    
    if ($type == "public") {
        $whereClause = "";
    } else if ($type == "isFollowing") {

        $query = "SELECT * FROM isFollowing WHERE follower = ".mysqli_real_escape_string($link, $_SESSION['id']);

        $result = mysqli_query($link, $query);

        $whereClause = "";

        while ($row = mysqli_fetch_assoc($result)) {
            if ($whereClause == "") {
                $whereClause = "WHERE";
            } else {
                $whereClause .= " OR";
            } 
             $whereClause .= " userid = ".$row['isFollowing'];
        }

        if(mysqli_num_rows($result) == 0) {
            $whereClause = "WHERE userid = '0'";
        }

    } else if ($type == "yourtweets") {
        $whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $_SESSION['id']);
    } else if ($type == "search") {

        echo '<p>Showing results for "'.mysqli_real_escape_string($link, $_GET['q']).'":</p>';

        $whereClause = "WHERE tweet LIKE  '%".mysqli_real_escape_string($link, $_GET['q'])."%'";
    } else if (is_numeric($type)) {

        $userQuery = "SELECT * FROM users WHERE id = '" . mysqli_real_escape_string($link, $type) . "' LIMIT 1";

        $userQueryResult = mysqli_query($link, $userQuery);

        $user = mysqli_fetch_assoc($userQueryResult);

        echo "<h2>".mysqli_real_escape_string($link, $user['email'])."'s Tweets</h2>";

        $whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $_GET['userid']);
    }


    $query = "SELECT * FROM tweets " . $whereClause . " ORDER BY datetime DESC LIMIT 10";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 0) {
        echo "There are no tweets to display";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

            $userQuery = "SELECT * FROM users WHERE id = '" . mysqli_real_escape_string($link, $row['userid']) . "' LIMIT 1";

            $userQueryResult = mysqli_query($link, $userQuery);

            $user = mysqli_fetch_assoc($userQueryResult);

            echo "<div class='tweet'><p><a id='userLink' href='?page=publicprofiles&userid=".$user['id']."'>" .$user['email']. "</a> <span class='time'>" . time_since(time() - strtotime($row['datetime'])) . " ago</span>:
					</p>";

            echo "<p>" . $row['tweet'] . "</p>";

            echo "<p><button class='toggleFollow btn btn-primary' data-userId='".$row['userid']."'>";

        $isFollowingQuery = "SELECT * FROM isFollowing WHERE follower = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND isFollowing = '".mysqli_real_escape_string($link, $row['userid'])."' LIMIT 1";

            $isFollowingQueryResult = mysqli_query($link, $isFollowingQuery);
            if (mysqli_num_rows($isFollowingQueryResult) > 0) {
                echo "Unfollow";
            } else {
                echo "Follow";
            }

            echo "</button></p></div>";
        }
    }
}

function displaySearch() {
    echo '
    	<hr>
	<div class="row">
    <form class="form-inline">
  <div class="col-md-6">
    <input type="hidden" name="page" value="search">
    <input type="text" name="q" id="search" class="form-control" placeholder="Search">
  </div>
  <div class="col-md-4">
  <button type="submit" class="btn btn-primary">Search Tweets</button>

  </div>
  </form>
</div>
';
}

function displayTweetBox() {
    if($_SESSION['id'] > 0) {
    	echo '<div>
        <div id="tweetSuccess" class="alert alert-success">Your tweet was posted successfully.</div>
        <div id="tweetFail" class="alert alert-danger"></div>
  <div class="form-group">
    <textarea id="tweetContent" class="form-control" placeholder="Tweet Content..."></textarea>
  </div>
  <button class="btn btn-primary" id="postTweetButton">Post Tweet</button>
</div>';
    }
}

function displayUsers() {

    global $link;

    $query = "SELECT * FROM users LIMIT 10";

    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($result)) {
    
        echo "<p><a id='userLink' href='?page=publicprofiles&userid=".$row['id']."'>".$row['email']."</a></p>";

    }
}

?>