<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "111111", "issuebreakers");
 $query = "SELECT * FROM campaigns ORDER BY cam_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
  <h3>'.$row["cam_name"].'</h3>
  <p>'.$row["cam_desc"].'</p>
  <p class="text-muted" align="right">By - '.$row["owner_name"].'</p>
  <hr />
  ';
 }
}

?>
