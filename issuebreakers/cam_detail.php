<?php
session_start();

 include("config.php");
 error_reporting(0);
$session=$_SESSION["id"];
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
      <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/like.css">

    </head>
  </head>
  <body>

    <div class="tm-brand-images">
      <a href="index.php">
      <img src="img/issuebreakers.jpg" alt="issuebreakers" class="rounded mx-auto d-block">
      </a>
    </div><br>
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
    <p><img src="<?php echo $row["cam_image"];  ?>" class="img-fluid"  alt="Responsive image" ></p><br>
    <hr class="my-4">
    <h1 class="display-4"><em><?php echo $row["cam_name"]; ?></em></h1><br>
    <p class="lead"><?php echo nl2br($paragraph); ?></p>
    <hr class="my-4">
    <p><img src="<?php echo $row["owner_image"];  ?>" class="img-fluid" alt="Responsive image" ></p>
    <h2 class="display-4"><em><?php echo "Sponsor: ".$row["owner_name"]; ?></em></h2><br>
    <p><?php echo nl2br($paragraph1); ?></p><br>
    <h4 class="display-4">Website<br>
    <p><a href="<?php echo $row["URL"]; ?>"><?php echo $row["URL"]; ?></a></h4><br></p>
  <h4 class="h3">Written by: <?php echo $row['username']; ?></h4>
      <hr class="my-4">


    <!-- like dislike button -->

  <!-- check session for visitor to show different like button -->

  <?php  if(!$session){
     ?>  <a href="index.php" class="btn btn-info btn-lg" onclick="myFunction()">
          <span class="glyphicon glyphicon-thumbs-up" ></span><?php echo $row['likes']; ?> likes
        </a>
  <?php

  }  ?>
  <script>
  function myFunction() {
    alert("Please login");
  }
  </script>

<!-- display campaigns gotten from the database  -->
          <div style="padding: 2px; margin-top: 5px;">
          <?php
            // determine if user has already liked this post
            $results = mysqli_query($link, "SELECT * FROM likes WHERE count=1 AND userid=$session  AND camid=".$row['cam_id']."" );


        if (mysqli_num_rows($results) == 1 ): ?>
              <!-- user already likes post -->
              <span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['cam_id']; ?>"></span>
              <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['cam_id']; ?>"></span>
            <?php else: ?>
              <!-- user has not yet liked post -->
              <span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['cam_id']; ?>"></span>
              <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['cam_id']; ?>"></span>
            <?php endif ?>

            <span class="likes_count"><?php echo $row['likes']; ?> likes</span>
          </div>

        <!-- likes dislikes script -->
        <script src="js/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
            // when the user clicks on like
            $('.like').on('click', function(){
              var camid = $(this).data('id');
                  $post = $(this);

              $.ajax({
                url: 'update_count.php',
                type: 'post',
                data: {
                  'liked': 1,
                  'camid': camid
                },
                success: function(response){
                  $post.parent().find('span.likes_count').text(response + " likes");
                  $post.addClass('hide');
                  $post.siblings().removeClass('hide');
                }
              });
            });

            // when the user clicks on unlike
            $('.unlike').on('click', function(){
              var camid = $(this).data('id');
                $post = $(this);

              $.ajax({
                url: 'update_count.php',
                type: 'post',
                data: {
                  'unliked': 1,
                  'camid': camid
                },
                success: function(response){
                  $post.parent().find('span.likes_count').text(response + " likes");
                  $post.addClass('hide');
                  $post.siblings().removeClass('hide');
                }
              });
            });
          });
        </script>

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
