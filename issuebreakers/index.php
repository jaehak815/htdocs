
<!-- login_process -->
<?php

// Initialize the session

session_start();
require "config.php";
error_reporting(0);

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to index page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            //mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    //mysqli_close($link);
}
?>
<!-- end login_process -->

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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/popup.css" />
<!-- livesearch -->
    <script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2" ;

    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
  </head>
  <body>
<!-- End livesearch -->

<!-- scroll up -->
<a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>
<!-- end scroll up -->
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
                    <a class="nav-link" href="#"
                      >Home <span class="sr-only">(current)</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="#about">About</a>
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="#campaigns">Campaigns</a>
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>

                <?php if($_SESSION['username']){
                ?> <a class="nav-link" href="logout.php" /> <?php echo htmlspecialchars($_SESSION["username"]); ?><br>Logout</a> &nbsp;
               <?php } else { ?>
                 <a class="nav-link" onclick="openForm()"> Login </a>
                <?php }
                ?>
                </li>


<!-- login form -->
<div class="form-popup" id="myForm">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>
            <div class="form-group" style="width: 270px;">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" required>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group" style="width: 270px;">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                  <a href="register.php" class="btn btn-outline-info">Register</a>
                  <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </div>
        </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<!-- End login form -->


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

      <div class="row tm-welcome-row">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-left tm-welcome-box tm-bg-primary">
            <p class="tm-welcome-text">
              <em>"Make your own campaigns" <br> "Make your goals happen"</em>
            </p>
          </div>
          <div class="tm-page-col-right">
            <div
              class="tm-welcome-parallax"
              data-parallax="scroll"
              data-image-src="img/1.jpg"
            ></div>
          </div>
        </div>
      </div>
      <section class="row tm-pt-4 tm-pb-6">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-right">
            <h2 class="tm-text-secondary tm-mb-5">
              Issue Breakers
            </h2>
            <p class="tm-mb-6">
            Issue Breakers Platform is an online environment where Public, Private and Third Sector Stakeholders can upload social and environmental challenges and attend campaigns through supporting.

            </p>
            <p class="mb-0">
           	  It is the Social Awareness Web Application whose motto is to provide Advanced Consulting Services. This Web application gives users a platform to raise awareness about social causes and bring about the change in the world that they wish to see. The main vision of the company is to raise awareness of social issues and provide users a platform where they can advertise for small businesses.
            </p>
          </div>
        </div>
      </section>

      <div class="tm-page-col-right">
        <div class="row tm-pt-7 tm-pb-6">
          <div class="col-md-6 tm-home-section-2-left">
            <div
              class="img-fluid tm-mb-4 tm-small-parallax"
              data-parallax="scroll"
              data-image-src="img/2.jpg"></div>
            <div>
              <h3 class="tm-text-secondary tm-mb-4">
                Objectives
              </h3>
              <p class="tm-mb-5">
              Issuebreakers is a platform aiming at creating a campaigns where actual social challenges can meet powerful and innovative activities.
              </p>
              <ul class="tm-list-plus">
                <li>Provide a platform to the users to raise their issues for social awareness</li>
                <li>To satisfy the client’s expectations</li>
                <li>Bring a change that they want to see in the future</li>
                <li>Win Win solution for campaigns and sponsors</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 tm-home-section-2-right">
            <div
              class="img-fluid tm-mb-4 tm-small-parallax"
              data-parallax="scroll"
              data-image-src="img/3.jpg"></div>
            <div>
              <h3 class="tm-text-secondary tm-mb-4">
                Campaign innovation
              </h3>
              <p class="tm-section-2-text">
              Campaign innovation is a constantly growing movement using technology, recognised by all of them as an important way to tackle the increasingly-complex social and environmental challenges faced by our societies.
              </p>
              <p>
                Societies across world have faced severe challenges over the past decade. It includes financial crisis, environment, poor education and others. Offering platform to everyone will bring solution to reduce current challenges.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- row -->
      <section class="row tm-pt-4 tm-pb-6" id="about">
        <div class="col-12 tm-tabs-container tm-page-cols-container">
          <div class="tm-page-col-right tm-tab-contents">
            <div id="first-tab-group" class="tabgroup">
              <div id="tab1">
                <div class="text-content">
                  <h3 class="tm-text-secondary tm-mb-5">
                    About Us
                  </h3>
                  <p class="tm-mb-5">
                    Our “Cyberpunk” helps to provide a platform for small business owners to promote their business and get leads. It also helps clients to participate in the causes which are close to their heart.
                  </p>
                  <p class="tm-mb-5">
                Team member<br>
                Rahul Abhawani (Project Manager, Data Analyst)<br>
                Umamaheshwar Tathari (Network Designer)<br>
                Monika Kapoor (Tester)<br>
                Prabin Adhikari (Network Designer)<br>
                Rohit Mann (Front end designer)<br>
                Jaehak Kim (Database developer)<br>
                Rashmi Tamang (Data Analyst)<br>
                Sandeep Kaur (Database developer)<br>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<!-- campaigns page -->

<!-- Create campaigns board -->
      <div class="row tm-welcome-row" id="campaigns">
        <div class="col-12">
          <div
            class="tm-welcome-parallax tm-center-child"
            data-parallax="scroll"
            data-image-src="img/4.jpg"
          >
            <div class="tm-bg-black-transparent tm-parallax-overlay">
              <h2>Campaigns</h2>
              <p>Create your own campaigns</p>
            <a href="create_cam.php"> <button type="button" class="btn btn-outline-light">Create</button></a>
            </div>
          </div>
        </div>
      </div>

<!-- Campaign nav -->
      <section class="row tm-pt-4">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-left">
            <ul class="tabs clearfix filters-button-group">
              <li>
                <a href="#" class="active" data-filter="*">
                  <div class="tm-tab-icon"></div>
                  All Types(Like)
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-1">
                  <div class="tm-tab-icon"></div>
                  Environment
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-2">
                  <div class="tm-tab-icon"></div>
                  Education
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-3">
                  <div class="tm-tab-icon"></div>
                  Employment
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-4">
                  <div class="tm-tab-icon"></div>
                  Health
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-5">
                  <div class="tm-tab-icon"></div>
                  Others
                </a>
              </li>
              <form style="width: 250px; margin-left: 50px;">
              <input type="text" size="20" onkeyup="showResult(this.value)" placeholder="Search campaign...">
              <div id="livesearch"></div>
              </form>
            </ul>
          </div>
<!-- End Campaign nav -->

<!-- Display campaigns -->
<div class="tm-page-col-right">
<div class="tm-gallery" id="tmGallery">
  <?php
   $sql1="select * from campaigns order by likes desc";
   $res1=mysqli_query($link, $sql1);
  while($row1=mysqli_fetch_assoc($res1)){

     if ($row1["category"] == "Environment") {$a=  "tm-gallery-item category-1";}
     elseif ($row1["category"] == "Education") {$a=  "tm-gallery-item category-2";}
     elseif ($row1["category"] == "Employment") {$a=  "tm-gallery-item category-3";}
     elseif ($row1["category"] == "Health") {$a=  "tm-gallery-item category-4";}
      elseif ($row1["category"] == "Others") {$a=  "tm-gallery-item category-5";}

      ?>
  <div class="<?php echo $a; ?>">
       <figure class="effect-bubba" id="myTable">
       <?php
        $var = $row1["cam_id"];  ?>
       <a  href="<?php echo "cam_detail.php?cam_id=".$var ?>"> <img src="<?php echo $row1["cam_image"];  ?>"   alt="Gallery item"
         class="img-fluid" ></a>

         <figcaption>
           <h2><?php echo $row1["cam_name"]; ?></span></h2>
          <p><?php echo $row1["likes"]; ?><br>People love it!</p>
           <a  href="<?php echo "cam_detail.php?cam_id=".$var ?>"> <img src="<?php echo $row1["cam_image"];  ?>"   alt="Gallery item"
             class="img-fluid" ></a>
         </figcaption>
          </figure>
          </div>
              <?php
                  } ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Page footer -->
      <footer class="row tm-page-footer">
        <p class="col-12 tm-copyright-text mb-0">
          Email:admin@issuebreakers.com.au
        </p>
        <p class="col-12 tm-copyright-text mb-0">
          Copyright &copy; 2021 IssueBreakers
        </p>
      </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!-- Script for scrollTop -->
<script>
$(document).ready(function() {
$(window).scroll(function() {
if ($(this).scrollTop() > 20) {
$('#toTopBtn').fadeIn();
} else {
$('#toTopBtn').fadeOut();
}
});

$('#toTopBtn').click(function() {
$("html, body").animate({
scrollTop: 0
}, 1000);
return false;
});
});
</script>


<!-- script for isotope, imagesloaded -->
    <script>
      $(function() {
        /* Isotope Gallery */

        // init isotope
        var $gallery = $(".tm-gallery").isotope({
          itemSelector: ".tm-gallery-item",
          layoutMode: "fitRows"
        });
        // layout Isotope after each image loads
        $gallery.imagesLoaded().progress(function() {
          $gallery.isotope("layout");
        });

        $(".filters-button-group").on("click", "a", function() {
          var filterValue = $(this).attr("data-filter");
          $gallery.isotope({ filter: filterValue });
          console.log("Filter value: " + filterValue);
        });

        /* Tabs */
        $(".tabgroup > div").hide();
        $(".tabgroup > div:first-of-type").show();
        $(".tabs a").click(function(e) {
          e.preventDefault();
          var $this = $(this),
            tabgroup = "#" + $this.parents(".tabs").data("tabgroup"),
            others = $this
              .closest("li")
              .siblings()
              .children("a"),
            target = $this.attr("href");
          others.removeClass("active");
          $this.addClass("active");

          // Scroll to tab content (for mobile)
          if ($(window).width() < 992) {
            $("html, body").animate(
              {
                scrollTop: $("#tmGallery").offset().top
              },
              200
            );
          }
        });
      });
    </script>

  </body>
</html>
