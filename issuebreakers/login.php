<?php
// Initialize the session
session_start();


// Include config file
require_once "config.php";
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
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
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

    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="width: 300px;">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group" style="width: 300px;">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
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
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
