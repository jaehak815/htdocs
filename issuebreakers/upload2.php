<?php
session_start();
//upload.php
  if($_FILES["file1"]["name"] != '')
  {
   $test = explode('.', $_FILES["file1"]["name"]);
   $ext = end($test);
   $name = rand(100, 999) . '.' . $ext;
  $location = './img/owner/' . $name;
  move_uploaded_file($_FILES["file1"]["tmp_name"], $location);
  echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
    $filepath = "img/owner/".$name;
  //echo "$filepath";
  $_SESSION['path1'] = $filepath;
}
?>
