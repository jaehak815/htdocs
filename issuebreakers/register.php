<!-- Register user -->
<?php
// Include config file
require_once "config.php";
include('smtp/PHPMailerAutoload.php');
$msg="";
// Define variables and initialize with empty values
$username = $password = $confirm_password = $name = $email = $company = $occupation = $message = $verification_id =  "";
$username_err = $password_err = $confirm_password_err = $name_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later1.";

            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

  // Validate name
  if(empty(trim($_POST["name"]))){
      $name_err = "Please enter your name.";
  } else {
      $name = trim($_POST["name"]);
  }

  // Validate email
  if(empty(trim($_POST["email"]))){
      $email_err = "Please enter a email.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE email = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        // Set parameters
        $param_email = trim($_POST["email"]);


        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $email_err = "This email is already exist.";
            } else{
                $email = trim($_POST["email"]);
                //verification_id
                //  $verification_id = trim($_POST["verification_id"]);

                $verification_id=rand(111111111,999999999);

            }
        } else{
            echo "Oops! Something went wrong. Please try again later1.";

        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
  }

  //company
  $company = trim($_POST["company"]);

  //occupation
  $occupation = trim($_POST["occupation"]);

  //message
  $message = trim($_POST["message"]);



    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, name, email,company, occupation, message, verification_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_username, $param_password, $param_name, $param_email, $param_company, $param_occupation, $param_message,$param_verification_id);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $name;
            $param_email = $email;
            $param_company = $company;
            $param_occupation = $occupation;
            $param_message = $message;
            $param_verification_id = $verification_id;


            //$msg="We've just sent a verification link to your email. Please check your inbox and click on the link to get started. If you can't find this email (which could be due to spam filters), just request a new one here.";
          $mailHtml="Please confirm your account registration by clicking the button or link below: <br> <a href='http://192.168.1.110/issuebreakers/check.php?id=$verification_id'><Strong>Here<Strong></a>";


            $html='Msg';
            //echo smtp_mailer($email,'Account Verification',$mailHtml);
            function smtp_mailer($to,$subject, $msg){
            	$mail = new PHPMailer();
            	$mail->SMTPDebug  = 0;
            	$mail->IsSMTP();
            	$mail->SMTPAuth = true;
            	$mail->SMTPSecure = 'tls';
            	$mail->Host = "smtp.gmail.com";
            	$mail->Port = 587;
            	$mail->IsHTML(true);
            	$mail->CharSet = 'UTF-8';
            	$mail->Username = "rright815@gmail.com";
            	$mail->Password = "";
            	$mail->SetFrom("rright815@gmail.com");
            	$mail->Subject = $subject;
            	$mail->Body =$msg;
            	$mail->AddAddress($to);
            	$mail->SMTPOptions=array('ssl'=>array(
            		'verify_peer'=>false,
            		'verify_peer_name'=>false,
            		'allow_self_signed'=>false
            	));
            	if(!$mail->Send()){
            		echo $mail->ErrorInfo;
            	}else{
            		return 'Sent';
            	}
            }


          smtp_mailer($email,'Account Verification',$mailHtml);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

  //Alert and Redirect to login page
  echo "<script>alert('Successfully completed!');window.location='index.php';</script>";

                //header("location: index.php");
            } else{

                echo "Oops! Something went wrong. Please try again later2.";
                echo "Error: " . var_dump($stmt) . "<br>" . $link->error;
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }

    </style>
</head>
<body>

  <div class="container" align="center">
  <div class="jumbotron jumbotron-fluid">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account. <br> <strong>(* is required.)</strong> </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>*Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Enter username">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>*Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="At least 6 digits">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>*Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="At least 6 digits">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>*Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="Full name">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
                <label>*Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="e.g. issuebreakers@issuebreakers.com">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" class="form-control " value="<?php echo $company; ?>" placeholder="Enter company name">

            </div>
            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control " value="<?php echo $occupation; ?>" placeholder="Enter your occupation">

            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" rows="8" cols="80" class="form-control " value="<?php echo $message; ?>"placeholder="Introduction"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                  <a href="index.php" class="btn btn-primary" >Back</a>
            </div>
            <div class="message">
        	<strong><em> Remember:"We will send a verification link to your email. Please check your inbox and spam box both and click on the link to get started. If you can't find this email (which could be due to spam filters), just request a new one here." </em></strong>
        		</div>
        </form>
    </div>
    </div>
    </div>

</body>
</html>
