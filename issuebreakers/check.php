<?php
include('config.php');
$id=mysqli_real_escape_string($link,$_GET['id']);
mysqli_query($link,"update users set verification_status='1' where verification_id='$id'");
echo "Your account verified";
?>
<a href="index.php"> Click here for Login<a/>
