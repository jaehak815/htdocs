<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");
mysqli_query($conn, "
insert into topic
(title, description, created)
value(
    'MySQL',
    'MySQL is..',
    NOW()
  )
");
$result = mysqli_query($conn, $sql);
if($result === false){
echo mysqli_error($conn);
}
 ?>
