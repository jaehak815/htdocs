<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
);

//author이 삭제되면 그와 관련된 모든 데이터 삭제됨
$sql = "
delete
from topic
where author_id = {$filtered['id']}
";
mysqli_query($conn,$sql);

$sql = "
delete
from author
where id = {$filtered['id']}
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
  //echo 'Sucessfully Deleted!! <a href="index.php">Back</a>';
  header('Location: author.php');
}
 ?>
