<?php

// Initialize the session

session_start();
require "config.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Issue Breakers - Campaigns</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
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
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="about.html"> About</a>
                  </li>
                  <li class="nav-item active">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="campaigns.php">
                      Campaigns <span class="sr-only">(current)</span>
                    </a>
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
        <div class="col-12">
          <div
            class="tm-welcome-parallax tm-center-child"
            data-parallax="scroll"
            data-image-src="img/blooming-bg.jpg"
          >
            <div class="tm-bg-black-transparent tm-parallax-overlay">
              <h2>Campaigns</h2>
              <p>Create your own campaigns</p>
            <a href="create_cam.php"> <button type="button" class="btn btn-outline-light">Create</button></a>
            </div>
          </div>
        </div>
      </div>

      <section class="row tm-pt-4">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-left">
            <ul class="tabs clearfix filters-button-group">
              <li>
                <a href="#" class="active" data-filter="*">
                  <div class="tm-tab-icon"></div>
                  All Types
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-1">
                  <div class="tm-tab-icon"></div>
                  Environment, Food
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-2">
                  <div class="tm-tab-icon"></div>
                  Energy, Education
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-3">
                  <div class="tm-tab-icon"></div>
                  Employment, Skills
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-4">
                  <div class="tm-tab-icon"></div>
                  Health,Disability
                </a>
              </li>
              <li>
                <a href="#" class="" data-filter=".category-5">
                  <div class="tm-tab-icon"></div>
                  Others
                </a>
              </li>
            </ul>
          </div>
          <div class="tm-page-col-right">
            <div class="tm-gallery" id="tmGallery">
              <div class="tm-gallery-item category-1">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-01.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-2">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-02.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>




              <div class="tm-gallery-item category-1">
                <figure class="effect-bubba">
                  <img


                    src="img/gallery/gallery-item-03.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="cam_detail.php">View more</a>
                  </figcaption>
                </figure>
              </div>



              <div class="tm-gallery-item category-3">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-04.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-2">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-05.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-3">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-06.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-3">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-07.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-1">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-08.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-2">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-09.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-3">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-10.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-2">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-11.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
              <div class="tm-gallery-item category-1">
                <figure class="effect-bubba">
                  <img
                    src="img/gallery/gallery-item-12.jpg"
                    alt="Gallery item"
                    class="img-fluid"
                  />
                  <figcaption>
                    <h2>Fresh <span>Bubba</span></h2>
                    <p>Bubba likes to appear out of thin air.</p>
                    <a href="#">View more</a>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Page footer -->
      <footer class="row tm-page-footer">
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
