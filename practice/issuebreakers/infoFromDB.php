<?php
session_start();
 include("config.php");
 error_reporting(0);

      ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
    $sql = "SELECT * FROM campaigns";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["cam_name"]. " " . $row["cam_desc"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
 ?>
  </body>
</html>
