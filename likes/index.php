<?php
session_start();
echo $_SESSION["username"];

	// connect to the database
	$con = mysqli_connect('localhost', 'root', '111111', 'issuebreakers');
//error_reporting(0);

	// Retrieve campaigns from the database
	$campaigns = mysqli_query($con, "SELECT * FROM campaigns");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Like and unlike system</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="like.css">
</head>
<body>
	<!-- display campaigns gotten from the database  -->
		<?php while ($row = mysqli_fetch_array($campaigns)) { ?>

			<div class="post">
				<?php echo $row['cam_name']; ?>

				<div style="padding: 2px; margin-top: 5px;">
				<?php
					// determine if user has already liked this post
					$results = mysqli_query($con, "SELECT * FROM likes WHERE userid=1 AND camid=".$row['cam_id']."");

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
			</div>

		<?php } ?>



<!-- Add Jquery to page -->
<script src="jquery.min.js"></script>
<script>
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var camid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'like.php',
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
				url: 'like.php',
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
</body>
</html>
