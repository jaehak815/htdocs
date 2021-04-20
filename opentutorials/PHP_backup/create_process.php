<?php
file_put_contents('data/'.$_POST['title'], $_POST['description']);
header('Location: /index.php?id='.$_POST['title']);
//header function : 만들고 바로 결과 보여주기
 ?>
