<!-- checking whether user clicks like or not and process into DB -->
<?php
session_start();

	// connect to the database
	$con = mysqli_connect('localhost', 'root', '111111', 'issuebreakers');

//error_reporting(0);
$session=$_SESSION["id"];
// Retrieve campaigns from the database
$camid = $_POST['camid'];
  $result = mysqli_query($con, "SELECT * FROM campaigns WHERE cam_id=$camid");
$row = mysqli_fetch_array($result);
  $n = $row['likes'];
	if (isset($_POST['liked'])) {

    mysqli_query($con, "INSERT INTO likes (userid, camid, count) VALUES ($session, $camid,1)");
    mysqli_query($con, "UPDATE campaigns SET likes=$n+1 WHERE cam_id=$camid");

    echo $n+1;
    exit();
  }
  if (isset($_POST['unliked'])) {

    mysqli_query($con, "DELETE FROM likes WHERE camid=$camid AND userid=$session");
    mysqli_query($con, "UPDATE campaigns SET likes=$n-1 WHERE cam_id=$camid");

    echo $n-1;
    exit();
  }

?>
