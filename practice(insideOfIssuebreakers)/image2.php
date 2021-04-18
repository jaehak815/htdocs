<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Showing Image</title>
  </head>
  <body>
    <?php
require_once "config.php";
$sql="select * from campaigns";
$res=mysqli_query($link, $sql);
echo "<table>";
while($row=mysqli_fetch_assoc($res))
{
  echo "<tr>";
  echo "<td>"; ?><a  href="cam_detail.php"> <img src="<?php echo $row["cam_image"];  ?>" height="100" width="100" ></a> <?php echo "</td>";
  echo "<td>"; echo $row["cam_name"]; echo "</td>";


  echo "</tr>";


}
echo "</table>";
     ?>
  </body>
</html>
