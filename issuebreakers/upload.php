<?php
$file_name = $_FILES['cam_image']['name'];
$tmp_file = $_FILES['cam_image']['tmp_name'];

$file_path = "img/campaign/".$file_name;

$r = move_uploaded_file($tmp_file, $file_path);


?>
