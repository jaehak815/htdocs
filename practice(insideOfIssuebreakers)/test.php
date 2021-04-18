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
  <?php   $sql = "SELECT cam_name, cam_desc FROM campaigns";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<br> id: ". $row["id"]. " - Name: ". $row["cam_name"]. " " . $row["cam_desc"] . "<br>";
      }
  } else {
      echo "0 results";
  }

  $conn->close();
   ?>
  </body>
</html>
