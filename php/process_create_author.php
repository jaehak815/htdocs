<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');
$filtered = array(
  'name' =>mysqli_real_escape_string($conn, $_POST['name']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
insert into author
(name, profile)
VALUES(
    '{$filtered['name']}',
    '{$filtered['profile']}'
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
  //echo 'Success <a href="index.php">Back</a>';
  header('Location: author.php');
}
 ?>
