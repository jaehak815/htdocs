<!-- Admin clicks Accept button -->
<?php
session_start();
 include("config.php");
 error_reporting(0);
 $sql="select * from approval where cam_id=".$_GET['camid1'];
 $result = mysqli_query($link, $sql);
 $getid=$_GET['camid1'];
 //echo $getid;
 while($row = mysqli_fetch_assoc($result)) {

 $sql1="INSERT INTO campaigns select * from approval where cam_id=$getid";

 if ($link->query($sql1) === TRUE) {
    $query = "DELETE FROM approval WHERE cam_id=$getid";
    if ($link->query($query) === TRUE) {
        $message = "Success!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>document.location='approval.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $link->error;
    }
 } else {
    echo "Error: " . $sql . "<br>" . $link->error;
 }
 }
?>
