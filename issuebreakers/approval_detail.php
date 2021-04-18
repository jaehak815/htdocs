<!-- Manage page shows approval campaings  -->
<?php
session_start();
 include("config.php");
 error_reporting(0);
      ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Issue Breakers</title>
      <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
      <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/templatemo-style.css" />
    </head>
  </head>
  <body>
    <div class="tm-brand-images">
      <a href="index.php">
      <img src="img/issuebreakers.jpg" alt="issuebreakers" class="rounded mx-auto d-block">
      </a>
    </div>

<?php
    $sql = "SELECT * FROM approval where cam_id=".$_GET['camid'];
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
$paragraph = $row["cam_desc"];
$paragraph1 = $row["owner_desc"];
  ?>
<div class="container">
  <div class="jumbotron" >
    <p><img src="<?php echo $row["cam_image"];  ?>" class="img-fluid" alt="Responsive image"></p>
    <h1 class="display-4"><em><?php echo $row["cam_name"]; ?></em></h1><br>
    <p class="lead"><?php echo nl2br($paragraph); ?></p>
    <hr class="my-4">
      <p><img src="<?php echo $row["owner_image"];  ?>" class="img-fluid" alt="Responsive image" ></p>
    <h2 class="display-4"><em><?php echo "Sponsor: ".$row["owner_name"]; ?></em></h2><br>
    <p><?php echo nl2br($paragraph1); ?></p>
    <p><?php echo "Website: ".$row["URL"]; ?></p>
    <?php
     $var = $row["cam_id"];  ?>
    <a class="btn btn-success" href="<?php echo "acc_process.php?camid1=".$var ?>" role="button">Accept</a>
    <a class="btn btn-danger" href="<?php echo "del_process.php?camid1=".$var ?>" role="button">Reject</a>
  </div>
  </div>
<?php  }
} else {
  echo "0 results";
}
mysqli_close($conn);
 ?>
  </body>
</html>
