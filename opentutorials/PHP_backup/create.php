<?php
require('lib/print.php');
require('view/top.php');
 ?>
<a href="create.php">create</a>
<form action="create_process.php" method="post">
  <p>
    <input type="text" name="title" placeholder="Title">
  </p>
  <p>
<textarea name="description" placeholder="Description"></textarea>
  </p>
  <input type="submit">
</form>
<?php
require('view/bottom.php');
 ?>
