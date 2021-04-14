
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Image Insertion</title>
  </head>
  <body>

    <form action="" method="post" enctype="multipart/form-data">
      <h2 align="center"> Image Insertion...</h2>
      <table align="center">
<tr>
  <td><label>Image</label></td>
  <td><label>:</label></td>
  <td><label><input type="file" name="img" required/></label></td>
</tr>
<tr>
  <td><label></label></td>
  <td><label></label></td>
  <td><label><input type="submit" name="save_btn" value="SAVE"></label></td>
</tr>

      </table>
    </form>
    <?php
if(isset($_POST['save_btn']))
{
  if($link = mysqli_connect('localhost','root','111111','issuebreakers') )
  {
    $filetemp= $_FILES['img']['tmp_name'];
    $filename = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filepath = "img/campaign/".$filename;

    move_uploaded_file($filetemp,$filepath);

    $query = mysqli_query($link, "call imageInsert('$filename', '$filepath','$filetype' )");
    if($query)
    {
      echo "Image Inserted Successfully...";

    }
    else
    {
      echo "Insertion Failed";
    }
  }
}
     ?>
  </body>
</html>
