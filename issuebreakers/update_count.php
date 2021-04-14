<?php
$con=mysqli_connect('localhost','root','111111','issuebreakers');
$type=$_POST['type'];
$cam_id=$_POST['camid'];
echo $cam_id;
if($type=='like'){
	$sql="update campaigns set likes=likes+1 where cam_id=".$_GET['camid'];
}else{
	$sql="update campaigns set dislikes=dislike+1 where cam_id=".$_GET['camid'];
}
$res=mysqli_query($con,$sql);
?>
