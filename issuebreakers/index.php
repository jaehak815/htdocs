<?php

// Initialize the session

session_start();
require "config.php";
error_reporting(0);

// Check if the user is logged in, if not then redirect him to login page

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

                  <li class="nav-item active">
                    <div class="tm-nav-link-highlight"></div>
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                  </li>

                    <a class="nav-link" href="#"
                      >Home <span class="sr-only">(current)</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="campaigns.php">Campaigns</a>
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>


                <?php if($_SESSION['username']){
                ?> <a class="nav-link" href="logout.php" />Logout</a> &nbsp;
               <?php } else { ?>
                 <a class="nav-link" href="login.php" > Login </a>
               <?php } ?>





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
              <em>"Hello, this is a clean layout. left side is the text and right
                side is a parallax image."</em>
            </p>
          </div>
          <div class="tm-page-col-right">
            <div
              class="tm-welcome-parallax"
              data-parallax="scroll"
              data-image-src="img/blue-contem-girl.jpg"
            ></div>
          </div>
        </div>
      </div>

      <section class="row tm-pt-4 tm-pb-6">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-right">
            <h2 class="tm-text-secondary tm-mb-5">
              Nunc tristique velit ut semper
            </h2>
            <p class="tm-mb-6">
              Homepage main photo is provided by <strong>Moose Photos</strong> from <strong>Pexels</strong>. Next Level CSS Template is brought to you by Template Mo website. You can feel free to adapt it for your websites. No need to put a footer credit link. Please kindly spread a word about us. Thank you. If you have any question, feel free to contact us on Facebook page.

            </p>
            <p class="mb-0">
           	  Nullam nec dictum dolor. Sed ultricies purus nec suscipit vulputate. Fusce a massa eu orci
              vulputate varius. Praesent id felis ac erat elementum condimentum. Pellentesque a
              libero vitae nisi vestibulum tempor vitae vitae nulla. Praesent ut
              eleifend ligula, nec pretium erat.
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
              data-image-src="img/image-1.jpg"></div>
            <div>
              <h3 class="tm-text-secondary tm-mb-4">
                Quisque at rutrum felis
              </h3>
              <p class="tm-mb-5">
                Photo by CoWomen from Pexels. Morbi sollicitudin nibh eu
                dignissim mollis. Etiam turpis tortor, ultricies sit amet
                placerat suscipit, auctor eu diam.
              </p>
              <ul class="tm-list-plus">
                <li>Vestibulum finibus consectetur nulla</li>
                <li>Eget imperdiet eros interdum sit amet</li>
                <li>Sed a lacinia lorem, sed luctus enim</li>
                <li>2 small images has a parallax effect</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 tm-home-section-2-right">
            <div
              class="img-fluid tm-mb-4 tm-small-parallax"
              data-parallax="scroll"
              data-image-src="img/image-2.jpg"></div>
            <div>
              <h3 class="tm-text-secondary tm-mb-4">
                Sed ultricies tortor vitae
              </h3>
              <p class="tm-section-2-text">
                Photo by <strong>CoWomen</strong> from <strong>Pexels</strong>. Quisque tortor justo, pharetra in
                eros sed, accumsan dapibus dolor. In luctus sed ante a
                tristique.
              </p>
              <p>
                You cannot re-distribute our template on your website for download. Ut ornare pulvinar lorem a elementum. Cras sollicitudin ante velit, eget facilisis sem viverra nex. Etiam quis mattis urna.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- row -->

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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
