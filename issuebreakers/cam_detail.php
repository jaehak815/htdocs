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
    $sql = "SELECT * FROM campaigns where cam_id=".$_GET['camid'];
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  ?> <img src="<?php echo $row["cam_image"];  ?>" class="img-thumbnail" alt="Responsive image" ></a><?php    echo "id: " . $row["cam_id"]. "  Name: " . $row["cam_name"]. " Campagin Description " . $row["cam_desc"]. " Owner Name " . $row["owner_name"]. " Owner Description " . $row["owner_desc"]."<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
 ?>




  </body>
</html>
