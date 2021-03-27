<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');
$filtered = array(
  'title' =>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
  'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);

$sql = "
insert into topic
(title, description, created, author_id)
VALUES(
    '{$filtered['title']}',
    '{$filtered['description']}',
    NOW(),
    '{$filtered['author_id']}'
  )
";
//die($sql);

//insert into topic (title, description, created) VALUES( 'gaga', 'haha', NOW() )
//insert into topic (title, description, created) VALUES( 'gaga', 'haha',
//'2018-1-1 00:00:00');--', NOW() )

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'There is problem. Ask administrator';
  error_log(myslqi_error($conn));
} else {
  echo 'Success <a href="index.php">Back</a>';
}
 ?>
