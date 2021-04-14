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
    <title>Issue Breakers</title>
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css" />
  </head>
  <body>

<!-- scroll up -->
<a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>

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
                  <?php echo htmlspecialchars($_SESSION["username"]); ?>

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

      <section class="row tm-pt-4 tm-pb-6" id="about">
        <div class="col-12 tm-tabs-container tm-page-cols-container">
          <div class="tm-page-col-left tm-tab-links">
            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
              <li>
                <a href="#tab1" class="active">
                  <div class="tm-tab-icon"></div>
                  About Us
                </a>
              </li>
              <li>
                <a href="#tab2" class="">
                  <div class="tm-tab-icon"></div>
                  Vision and Mission
                </a>
              </li>
              <li>
                <a href="#tab3" class="">
                  <div class="tm-tab-icon"></div>
                  Our History
                </a>
              </li>
            </ul>
          </div>
          <div class="tm-page-col-right tm-tab-contents">
            <div id="first-tab-group" class="tabgroup">
              <div id="tab1">
                <div class="text-content">
                  <h3 class="tm-text-secondary tm-mb-5">
                    About Us
                  </h3>
                  <p class="tm-mb-5">
                    Above pink girl photo is provided by Moose Photos from
                    Pexels. This is a tab content area. There are 3 tabs at the
                    left side. Curabitur porttitor metus nisl. Nullam nec dictum
                    dolor. Sed ultricies purus nec suscipit vulputate. Fusce a
                    massa eu orci vulputate varius. Quisque quis ullamcorper
                    sapien. Integer eu luctus nulla, vel viverra odio.
                  </p>
                  <p class="tm-mb-5">
                    Praesent id felis ac erat elementum condimentum.
                    Pellentesque a libero vitae nisi vestibulum tempor vitae
                    vitae nulla. Praesent ut eleifend ligula, nec pretium erat.
                    Suspendisse nec magna id massa sollicitudin aliquam eget ut
                    turpis.
                  </p>
                </div>
                <div class="row tm-pt-5">
                  <div class="col-md-4 text-center">
                    <div class="tm-about-person mx-auto">
                      <img
                        src="img/bitcoin-girl.jpg"
                        alt="Image"
                        class="img-fluid tm-mb-1"
                      />
                      <h4 class="tm-text-secondary tm-mb-1">
                        Catherine Theta
                      </h4>
                      <p class="tm-mb-2">Project Manager</p>
                      <div class="tm-mb-3">
                        <a
                          href="https://facebook.com"
                          class="tm-about-social-link"
                        >
                          <i class="fab fa-facebook-f tm-about-social-icon"></i>
                        </a>
                        <a
                          href="https://twitter.com"
                          class="tm-about-social-link"
                        >
                          <i class="fab fa-twitter tm-about-social-icon"></i>
                        </a>
                        <a
                          href="https://linkedin.com"
                          class="tm-about-social-link"
                        >
                          <i
                            class="fab fa-linkedin-in tm-about-social-icon"
                          ></i>
                        </a>
                      </div>

                      <p>
                        Mauris efficitur risus mi, et varius dolor sodales
                        facilisis. Fusce sed mi tristique.
                      </p>
                    </div>
                  </div>

                  <div class="col-md-4 text-center">
                    <div class="tm-about-person mx-auto">
                      <img
                        src="img/ar-guy.jpg"
                        alt="Image"
                        class="img-fluid tm-mb-1"
                      />
                      <h4 class="tm-text-secondary tm-mb-1">New Hudson</h4>
                      <p class="tm-mb-2">Digital Marketing</p>
                      <div class="tm-mb-3">
                        <a
                          href="https://facebook.com"
                          class="tm-about-social-link"
                        >
                          <i class="fab fa-facebook-f tm-about-social-icon"></i>
                        </a>
                        <a
                          href="https://twitter.com"
                          class="tm-about-social-link"
                        >
                          <i class="fab fa-twitter tm-about-social-icon"></i>
                        </a>
                        <a
                          href="https://linkedin.com"
                          class="tm-about-social-link"
                        >
                          <i
                            class="fab fa-linkedin-in tm-about-social-icon"
                          ></i>
                        </a>
                      </div>
                      <p>
                        Pellentesque habitant morbi tristique senectus et netus
                        et malesuada fames.
                      </p>
                    </div>
                  </div>

                  <div class="col-md-4 text-center">
                    <div class="tm-about-person mx-auto">
                      <img
                        src="img/desk-girl.jpg"
                        alt="Image"
                        class="img-fluid tm-mb-1"
                      />
                      <h4 class="tm-text-secondary tm-mb-1">Jennifer Wall</h4>
                      <p class="tm-mb-2">Team Leader</p>
                      <div class="tm-mb-3">
                        <a
                          href="https://facebook.com"
                          class="tm-about-social-link"
                        >
                          <i class="fab fa-facebook-f tm-about-social-icon"></i>
                        </a>
                        <a
                          href="https://twitter.com"
                          class="tm-about-social-link"
                        >
                          <i class="fab fa-twitter tm-about-social-icon"></i>
                        </a>
                        <a
                          href="https://linkedin.com"
                          class="tm-about-social-link"
                        >
                          <i
                            class="fab fa-linkedin-in tm-about-social-icon"
                          ></i>
                        </a>
                      </div>
                      <p>
                        Three social icons are placed in above circles. Sed
                        turpis nisl, congue a arcu in.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab2">
                <div class="text-content">
                  <h3 class="tm-text-secondary tm-mb-5">Vision and Mission</h3>
                  <p class="tm-mb-5">
                    Nam consequat, leo vitae aliquet dignissim, leo est laoreet
                    nibh, nec dictum libero justo vitae dolor. Donec tristique
                    eros at nisi elementum efficitur. Proin ornare feugiat ex
                    placerat pellenteqsue. Nulla convallis est volutpat ex
                    ultrices facilisis.
                  </p>
                  <p class="tm-mb-5">
                    Etiam egestas metus vitae est interdum, in eleifend nunc
                    volutpat. Aliquam molestie ipsum quis suscipit lacinia.
                    Mauris turpis libero, iaculis non dictum ac, ornare a massa.
                    Duis id lorem purus. Fusce viverra ullamcorper metus.
                    Curabitur puvinar suscipit sapien ac blandit. Aliquam vel
                    pulvinar purus, sit amet luctus urna.
                  </p>
                </div>
              </div>

              <div id="tab3">
                <div class="text-content">
                  <h3 class="tm-text-secondary tm-mb-5">Our History</h3>
                  <p class="tm-mb-5">
                    Mauris turpis libero, iaculis non dictum ac, ornare a massa.
                    Duis id lorem purus. Fusce viverra ullamcorper metus.
                    Curabitur puvinar suscipit sapien ac blandit. Aliquam vel
                    pulvinar purus, sit amet luctus urna. Nulla convallis est
                    volutpat ex ultrices facilisis.
                  </p>
                  <p class="tm-mb-5">
                    Etiam egestas metus vitae est interdum, in eleifend nunc
                    volutpat. Aliquam molestie ipsum quis suscipit lacinia. Nam
                    consequat, leo vitae aliquet dignissim, leo est laoreet
                    nibh, nec dictum libero justo vitae dolor. Donec tristique
                    eros at nisi elementum efficitur. Proin ornare feugiat ex
                    placerat pellenteqsue.
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>















      <div class="row tm-welcome-row" id="campaigns">
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
            </ul>
          </div>
          <div class="tm-page-col-right">

<div class="tm-gallery" id="tmGallery">
  <?php


   $sql1="select * from campaigns";
   $res1=mysqli_query($link, $sql1);
  while($row1=mysqli_fetch_assoc($res1)){

     if ($row1["category"] == "Environment") {$a=  "tm-gallery-item category-1";}
     elseif ($row1["category"] == "Education") {$a=  "tm-gallery-item category-2";}
     elseif ($row1["category"] == "Employment") {$a=  "tm-gallery-item category-3";}
     elseif ($row1["category"] == "Health") {$a=  "tm-gallery-item category-4";}
      elseif ($row1["category"] == "Others") {$a=  "tm-gallery-item category-5";}


      ?>
  <div class="<?php echo $a; ?>">



       <figure class="effect-bubba">
       <?php
        $var = $row1["cam_id"];  ?>
       <a  href="<?php echo "jumbo.php?cam_id=".$var ?>"> <img src="<?php echo $row1["cam_image"];  ?>"   alt="Gallery item"
         class="img-fluid" ></a>

         <figcaption>
           <h2><?php echo $row1["cam_name"]; ?></span></h2>
           <p>View more</p>
           <a  href="<?php echo "jumbo.php?cam_id=".$var ?>"> <img src="<?php echo $row1["cam_image"];  ?>"   alt="Gallery item"
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
