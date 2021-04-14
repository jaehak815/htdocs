<?php
session_start();
$_SESSION['user_id'] = (int)2;
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
      	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
  </head>
  <body>
<?php echo htmlspecialchars($_SESSION["username"]); ?>
    <div class="tm-brand-images">
      <a href="index.php">
      <img src="img/issuebreakers.jpg" alt="issuebreakers" class="rounded mx-auto d-block">
      </a>
    </div>
<?php
    $sql = "SELECT * FROM campaigns where cam_id=".$_GET['cam_id'];
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

$paragraph = $row["cam_desc"];
$paragraph1 = $row["owner_desc"];
  ?>

<div class="container">
  <div class="jumbotron">
    <p><img src="<?php echo $row["cam_image"];  ?>" class="img-fluid"  alt="Responsive image" ></p>
    <h1 class="display-4"><em><?php echo $row["cam_name"]; ?></em></h1><br>
    <p class="lead"><?php echo nl2br($paragraph); ?></p>
    <hr class="my-4">
    <p><img src="<?php echo $row["owner_image"];  ?>" class="img-fluid" alt="Responsive image" ></p>
    <h2 class="display-4"><em><?php echo "Sponsor: ".$row["owner_name"]; ?></em></h2><br>
    <p><?php echo nl2br($paragraph1); ?></p>
    <h3 class="display-4">Website<br>
      <a href="<?php echo $row["URL"]; ?>"><?php echo $row["URL"]; ?></a></h3><br>

<!-- likes dislikes script -->
    <script>
    function like_update(cam_id){
      jQuery.ajax({
        url:'update_count.php',
        type:'post',
        data:'type=likes&cam_id='+cam_id,
        success:function(result){
          var cur_count=jQuery('#like_loop_'+cam_id).html();
          cur_count++;
          jQuery('#like_loop_'+cam_id).html(cur_count);

        }
      });
    }

    function dislike_update(cam_id){
      jQuery.ajax({
        url:'update_count.php',
        type:'post',
        data:'type=dislikes&cam_id='+cam_id,
        success:function(result){
          var cur_count=jQuery('#dislike_loop_'+cam_id).html();
          cur_count++;
          jQuery('#dislike_loop_'+cam_id).html(cur_count);

        }
      });
    }
    </script>



<!-- like dislike button -->
    <div class="row main_box">
      <div class="col-sm-2 mr25">
        <a href="javascript:void(0)" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-thumbs-up" onclick="like_update('<?php echo $row['cam_id']?>')"> Like  (<span id="like_loop_<?php echo $row['cam_id']?>"><?php echo $row['likes']?></span>)</span>
        </a>
      </div>
      <div class="col-sm-2">
        <a href="javascript:void(0)" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-thumbs-down" onclick="dislike_update('<?php echo $row['cam_id']?>')"> Dislike (<span id="dislike_loop_<?php echo $row['cam_id']?>"><?php echo $row['dislikes']?></span>)</span>
        </a>
      </div>
    </div>
    <br>


  <h4>Share on</h4><br>
    <a
        href="http://www.facebook.com/sharer.php?u=http://www.issuebreakers.com"
        target="_blank"
        title="Click to share"><img src="img/facebook.png" >
</a>

<a
        href="http://twitter.com/share?text=IssueBreakers&url=http://www.issuebreakers.com"
        target="_blank"
        title="Click to post to Twitter"><img src="img/twitter.png">
</a>

<a
rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.issuebreakers.com"> <img src="img/linkedin.png">
</a>

<a
        href="https://plus.google.com/share?url=http://www.issuebreakers.com"
        target="_blank"
        title="Click to share"><img src="img/plus.png">
</a>


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
