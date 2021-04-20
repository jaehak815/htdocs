<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"],$config["duser"],$config["dpw"], $config["dname"]);
$result = mysqli_query($conn,"select * from topic");
 ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://192.168.1.10/webApplication/PHP/style.css">
</head>
<body id="target">
  <div class="container">

    <header class="p-5 mb-4 bg-light rounded-3 text-center">
        <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩 width="140" height="140">
        <h1><a href="https://192.168.1.10/webApplication/PHP/index.php">JavaScript</a></h1>
    </header>
<div class="row">
  <nav class="col-md-3">
    <ol class="nav flex-column nav-pills me-3">
  <?php
      while($row = mysqli_fetch_assoc($result)){
        echo '<li><a href="https://192.168.1.10/webApplication/PHP/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
      }
  ?>
    </ol>
  </nav>
<div class="col-md-9">


  <article>
    <form action="process.php" method="post">


        <div class="mb-3">
          <label for="form-title" class="form-label">제목:</label>
          <input type="text" class="form-control" name="title" id="form-title" aria-describedby="titleHelp">
          <div id="titleHelp" class="form-text">제목을 입력하시오.</div>
        </div>

        <div class="mb-3">
          <label for="form-author" class="form-label">작성자:</label>
          <input type="text" class="form-control" name="author" id="form-author" aria-describedby="authorHelp">
          <div id="authorHelp" class="form-author">이름 입력하시오.</div>
        </div>

        <div class="mb-3">
          <label for="form-control" class="form-label">본문:</label>
          <textarea class="form-control" rows="10" name="description " id="form-control" aria-describedby="controlHelp"></textarea>
          <div id="controlHelp" class="form-control">본문을 입력하시오.</div>
        </div>


      <input type="submit" name="name" class="btn btn-outline-primary btn-lg">
    </form>
  <?php
  if(empty($_GET['id'])==false){
    $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
          echo strip_tags($row['description'],'<a><h1><h2><h3><h4><ul><ol><li>');
  }
   ?>
  </article>
  <hr>
  <div id="control">
    <div class="btn-group" role="group" aria-label="...">

  <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-outline-primary btn-lg"  />
  <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-outline-primary btn-lg"  />
</div>
  <a href="https://192.168.1.10/webApplication/PHP/write.php" class="btn btn-success btn-lg">Write</a>
  </div>
</div>
</div>
</div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
