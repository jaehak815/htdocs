<!-- Approval page -->

<?php
session_start();
 include("config.php");
 error_reporting(0);
 if (($_SESSION["username"]!="admin") || ($_SESSION["usergroup"]!=0)) {
 //It will not be set session if did not login, it will jump back to the login page. Otherwise, continue to execute the html code down.
     echo "<script>alert('Please login as an administrator!');
     window.location.href = 'index.php';
 </script>";
 //    session_destroy();
 }
      ?>
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="X-UA-Compatible" content="ie=edge" />
          <title>Issue Breakers</title>
          <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
          <link rel="stylesheet" href="css/all.min.css" />
          <link rel="stylesheet" href="css/bootstrap.min.css" />
          <link rel="stylesheet" href="css/templatemo-style.css" />
        </head>
        <body>
          <div class="container-fluid">
            <div class="row tm-brand-row">
              <div class="col-lg-4 col-10">
                <div class="tm-brand-container">
                  <div class="tm-brand-images">
                    <a href="index.php">
                    <img src="img/issuebreakers.jpg" alt="issuebreakers">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-2 tm-nav-col">
                <div class="tm-nav">
                  <class="nav-item">
                  <nav class="navbar navbar-expand-lg navbar-light tm-navbar">
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-toggle="collapse"
                      data-target="#navbarNav"
                      aria-controls="navbarNav"
                      aria-expanded="false"
                      aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto mr-0">

                        <div class="tm-nav-link-highlight"></div>
                        <div class="nav-link">
                       <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </div>

                          <a class="nav-link" href="index.php"
                            >Home <span class="sr-only">(current)</span></a
                          >
                        </li>

                        <li class="nav-item">
                          <div class="tm-nav-link-highlight"></div>

                      <?php if($_SESSION['username']){
                      ?> <a class="nav-link" href="logout.php" />Logout</a> &nbsp;
                     <?php } else { ?>
                       <a class="nav-link" href="login.php" > Login </a>
                     <?php } ?>

                        </li>

                        <li class="nav-item">
                          <div class="tm-nav-link-highlight"></div>

                      <?php
                       if (($_SESSION["username"]=="admin") && ($_SESSION["usergroup"]==0)) {
                      ?> <a class="nav-link" href="approval.php" />Manage</a> &nbsp;
                     <?php  }    ?>


                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>

<div class="container">
  <h2><em>Manage Page</em></h2><br>
  <div class="jumbotron">
<h3>List for approval</h3><br>
  <?php $sql="select * from approval";
     $res=mysqli_query($link, $sql);
    while($row=mysqli_fetch_assoc($res)){
//var_dump($row);
    ?>
    <div class="list-group">
      <?php $var = $row["cam_id"]; ?>
      <a href="<?php echo "approval_detail.php?camid=".$var ?>" class="btn btn-secondary btn-lg"><?php echo $row["cam_name"]; ?></a><br>
     </div>
     <?php
}
  $link->close();
   ?>
</div>
</div>

<!-- Page footer -->
<footer class="row tm-page-footer">
  <p class="col-12 tm-copyright-text mb-0">
    Email:admin@issuebreakers.com.au
  </p>
  <p class="col-12 tm-copyright-text mb-0">
    Copyright &copy; 2021 IssueBreakers
  </p>
</footer>
  </body>
</html>
