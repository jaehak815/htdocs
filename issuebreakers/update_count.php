<?php
session_start();

$con=mysqli_connect('localhost','root','111111','issuebreakers');
$type=$_POST['type'];
$cam_id=$_POST['cam_id'];
if($type=='likes'){
	$sql="update campaigns set likes=likes+1 where cam_id=$cam_id";
}elseif($type=='dislikes'){
	$sql="update campaigns set dislikes=dislikes+1 where cam_id=$cam_id";
}
$res=mysqli_query($con,$sql);
?>
