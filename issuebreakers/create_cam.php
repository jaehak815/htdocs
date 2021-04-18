<!-- Create cam  -->
<?php
session_start();

if (!isset($_SESSION["username"])) {
//If user did not login, will not be setting the session, it will jump back to the login page. Otherwise, continue to execute down HTML code
    echo "<script>alert('Please login!');
    window.location.href = 'index.php';
</script>";
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$cam_name = $cam_desc = $category = $cam_image = $owner_name = $owner_desc = $owner_image = $URL = $username =  "";
$cam_name_err = $cam_desc_err = $category_err = $owner_name_err = $owner_desc_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate campaign name
    if(empty(trim($_POST["cam_name"]))){
        $cam_name_err = "Please enter a campaign name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT cam_id FROM campaigns WHERE cam_name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_cam_name);

            // Set parameters
            $param_cam_name = trim($_POST["cam_name"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $cam_name_err = "This campaign name is already taken.";
                } else{
                    $cam_name = trim($_POST["cam_name"]);

                }
            } else{
                echo "Oops! Something went wrong. Please try again later1.";

            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

  // Validate campaign description
  if(empty(trim($_POST["cam_desc"]))){
      $cam_desc_err = "Please enter campaign description.";
  } else {
      $cam_desc = trim($_POST["cam_desc"]);
  }

  // Validate category
  if(empty(trim($_POST["category"]))){
      $category_err = "Please choose category.";
  } else {
      $category = trim($_POST["category"]);
  }

  // Validate owner_name
  if(empty(trim($_POST["owner_name"]))){
      $owner_name_err = "Please enter campaign owner.";
  } else {
      $owner_name = trim($_POST["owner_name"]);
  }

  // Validate owner_desc
  if(empty(trim($_POST["owner_desc"]))){
      $owner_desc_err = "Please enter owner description.";
  } else {
      $owner_desc = trim($_POST["owner_desc"]);
  }

//$cam_image
$cam_image = $_SESSION['path'];

  //owner_image
  $owner_image = $_SESSION['path1'];

  //URL
  $URL = trim($_POST["URL"]);

  //username
  $username = $_SESSION['username'];

    // Check input errors before inserting in database
    if(empty($cam_name_err) && empty($cam_desc_err) && empty($category_err) && empty($owner_name_err) && empty($owner_desc_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO approval (cam_name, cam_desc, category, cam_image, owner_name, owner_desc, owner_image, URL, username) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_cam_name, $param_cam_desc, $param_category, $param_cam_image, $param_owner_name, $param_owner_desc, $param_owner_image, $param_URL, $param_username);

            // Set parameters
            $param_cam_name = $cam_name;
            $param_cam_desc = $cam_desc;
            $param_category = $category;
            $param_cam_image = $cam_image;
            $param_owner_name = $owner_name;
            $param_owner_desc = $owner_desc;
            $param_owner_image = $owner_image;
            $param_URL = $URL;
              $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

  //Alert and Redirect to login page
  echo "<script>alert('Thank you. This form has been sent to admin. 1 to 2 business day to approve it.');window.location='index.php';</script>";

                //header("location: login.php");
            } else{

                echo "Oops! Something went wrong. Please try again later2.". $link->error;

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
    <title>Create Campaigns</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 600px; padding: 20px; }
    </style> -->
</head>
<body>
  <div class="container">
  <div class="jumbotron">
    <div class="wrapper">
        <h2>Create campaigns</h2>
        <p>Please fill this form to create a campaign.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Campaign name</label>
                <input type="text" name="cam_name" class="form-control <?php echo (!empty($cam_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cam_name; ?>">
                <span class="invalid-feedback"><?php echo $cam_name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Campaign Description</label>
                <textarea name="cam_desc" rows="8" cols="80" class="form-control <?php echo (!empty($cam_desc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cam_desc; ?>"></textarea>
                <span class="invalid-feedback"><?php echo $cam_desc_err; ?></span>

            </div>
            <div class="form-group">
<dd><span class="title">Category:</span>
                    <select name="category" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                      <span class="invalid-feedback"><?php echo $category_err; ?></span>
                     <option value ="Environment">Environment</option>
                     <option value ="Education">Education</option>
                     <option value ="Employment">Employment</option>
                     <option value ="Health">Health</option>
                     <option value ="Others">Others</option>
                 </select></dd>

               </div>

<div class="form-group">
  <label>Campaign Image</label>
  <input type="file" name="cam_image" id="file" />
  <br/>
  <span id="uploaded_image"></span>
  <p class="help-block">Upload campaign image here.</p>
</div>

            <div class="form-group">
                <label>Owner name</label>
                <input type="text" name="owner_name" class="form-control <?php echo (!empty($owner_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $owner_name; ?>">
                <span class="invalid-feedback"><?php echo $owner_name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Owner Description</label>
                <textarea name="owner_desc" rows="8" cols="80" class="form-control <?php echo (!empty($owner_desc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $owner_desc; ?>"></textarea>
                <span class="invalid-feedback"><?php echo $owner_desc_err; ?></span>

            </div>

<div class="form-group">
  <label>Owner Image</label>
  <input type="file" name="owner_image" id="file1" />
  <br/>
  <span id="uploaded_image1"></span>
  <p class="help-block">Upload campaign image here.</p>
</div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="URL" class="form-control " value="<?php echo $URL; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
    </div>
      </div>
</body>
</html>

<!-- Script for singlepage upload(cam_image) -->
<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
  form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload1.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>

<!-- Script for singlepage upload(owner_image) -->
<script>
$(document).ready(function(){
 $(document).on('change', '#file1', function(){
  var name1 = document.getElementById("file1").files[0].name1;
  var form_data1 = new FormData();
  // var ext1 = name1.split('.').pop().toLowerCase();
  // if(jQuery.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)
  // {
  //  alert("Invalid Image File");
  // }
  var oFReader1 = new FileReader();
  oFReader1.readAsDataURL(document.getElementById("file1").files[0]);
  var f1 = document.getElementById("file1").files[0];
  var fsize1 = f1.size||f1.fileSize;
  if(fsize1 > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
  form_data1.append("file1", document.getElementById('file1').files[0]);
   $.ajax({
    url:"upload2.php",
    method:"POST",
    data: form_data1,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image1').html("<label class='text-success'>Image Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_image1').html(data);
    }
   });
  }
 });
});
</script>
