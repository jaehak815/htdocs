<?php
require 'register_process.php';

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Issue Breakers - Register</title>

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
                  <li class="nav-item">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="campaigns.php">Campaigns</a>
                  </li>
                  <li class="nav-item active">
                    <div class="tm-nav-link-highlight"></div>
                    <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>

      <div class="row tm-welcome-row">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-left tm-welcome-box tm-bg-gradient">
            <p class="tm-welcome-text">
              <em
                >"Gradient CSS BG #A0C0C0 to #669999 and right side is a
                parallax image of our group."</em
              >
            </p>
          </div>
          <div class="tm-page-col-right">
            <div
              class="tm-welcome-parallax"
              data-parallax="scroll"
              data-image-src="img/contact-us.jpg"
            ></div>
          </div>
        </div>
      </div>

      <section class="row tm-pt-4 tm-mb-3">
        <div class="col-12 tm-page-cols-container">
          <div class="tm-page-col-left">
            <div class="tm-register-container tm-mb-6">
            </div>
          </div>
          <div class="tm-page-col-right tm-form-container">
            <h2 class="tm-text-secondary mb-4">Register</h2>
            <form
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              method="POST"
              id="tm_register_form"
              enctype="multipart/form-data">
              <div class="form-group">
                <input
                  type="text"
                  id="username"
                  name="username"
                  placeholder="Your Username"
                required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" />
                     <span class="invalid-feedback"><?php echo $username_err; ?></span>
              </div>
              <div class="form-group">
                <input
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Your Password"
                  required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"
                  />
                   <span class="invalid-feedback"><?php echo $password_err; ?></span>
              </div>
              <div class="form-group">
                <input
                  type="password"
                  id="confirm_password"
                  name="confirm_password"
                  placeholder="Confirm Password"
                  required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?> " value="<?php echo $confirm_password; ?>"
                  />
                   <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="name"
                  name="name"
                  placeholder="Your Full Name"
                  required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  "value="<?php echo $name; ?>"
                 />

              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="email"
                  name="email"
                  placeholder="Your Email"
                  required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  "value="<?php echo $email; ?>"
                   />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  id="company"
                  name="company"
                  placeholder="Enter Company Name"
                  required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  "value="<?php echo $company; ?>"
                 />
              </div>
              <div class="form-group-2">
                <input
                  type="text"
                  id="occupation"
                  name="occupation"
                  placeholder="Your Occupation"
                  required=""
                  class="form-control rounded-0 border-top-0 border-right-0 border-left-0
                  "value="<?php echo $occupation; ?>"
                   />
              </div>
              <div class="tm-mb-5">
                <textarea
                  rows="10"
                  id="message"
                  name="message"
                  class="form-control rounded-0 "value="<?php echo $message; ?>"
                  placeholder="Your Message"
                  required=""

                  ></textarea>
              </div>
              <div class="tm-mb-6 file-upload-container">
                <input
                  id="user_image"
                  type="text"
                  class="border-top-0 border-right-0 border-left-0"
                  placeholder="Your image to upload"
                  disabled />
                <label class="btn btn-outline btn-file">
                  Browse...
                  <input
                    type="file"
                    name="user_image"
                    style="display: none;" />
                </label>
              </div>

              <div class="">
                <button
                  type="submit"
                  class="btn btn-secondary tm-btn-submit rounded-0">
                  Submit
                </button>
              </div>
            </form>
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
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).on("change", ":file", function() {
        var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input
            .val()
            .replace(/\\/g, "/")
            .replace(/.*\//, "");
        input.trigger("fileselect", [numFiles, label]);
      });

      $(document).ready(function() {
        $(":file").on("fileselect", function(event, numFiles, label) {
          $("#user_image").attr("placeholder", label);
        });
      });
    </script>
  </body>
</html>
