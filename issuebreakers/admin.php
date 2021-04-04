<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UTAS cafe | Product</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css"><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css"><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css"><![endif]-->
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>

    <?php
   session_start();
   $_SESSION['userurl']=$_SERVER['REQUEST_URI'];
   include("conn.php");
   error_reporting(0);
?>
    </head>
<body>
<div id="header">
  <div>
    <div>
      <div id="logo"> <a href="#"><img src="images/logo.jpg" alt="" width="100"></a> </div>
      <div>
        <div>
           <?php if($_SESSION['username']){ ?>
           Hi&nbsp  <?php echo $_SESSION['username'] ?> <a href="./logout.php" />Sign out</a> <a href="shoppingcart.php" target="_blank" class="sidebar_title" rel="nofollow">My cart &nbsp;<span id="cart"><?php echo $total ?></span></a>
           <?php } else { ?>
           Hi&nbsp  <a href="./signin.html" id="login"> Sign in  </a> <a href="reg.html" id="reg" >Register </a> <a href="admin.php" id="admin" >Admin </a>
           <?php } ?>
        </div>
        <div>
    	<div id="site_title"><h1 align="center"><a href="#">  </a></h1></div>
    </div> <!-- END of header -->
        <form action="#">
          <input type="text" id="search" maxlength="30">
          <input type="submit" value="" id="searchbtn">
        </form>
      </div>
    </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li ><a href="product.php">Menu</a></li>
      <li><a href="about.php">About us</a></li>
      
        <li><a href="order.php">Membership</a></li>
    </ul>
    <div class="section"> <a href="#"><img src="images/wedding-cupcakes-small.png" alt=""></a> </div>
  </div>
</div>
    
<div id="content">
  <div>
    <h1>Admin Page</h1>
    <ul>
      <li>
        <div>
          <div>
            <h2><a href="#">Lazenbys</a></h2>
        
            <a href="admin/default.php" class="view">Connect</a>
           </div>
          <a href="admin/default.php"><img src="images/meal.jpg" alt="" height="200" width="400"></a> </div>
      </li>
      <li>
        <div>
          <div>
            <h2><a href="d">The Ref</a></h2>
            
            <a href="admin/default1.php" class="view">Connect</a> </div>
          <a href="admin/default1.php"><img src="images/drink.jpg" alt="" height="200" width="400"></a> </div>
      </li>
      <li>
        <div>
          <div>
            <h2><a href="#">Trade Table</a></h2>
            
            <a href="admin/default2.php" class="view">Connect</a> </div>
          <a href="admin/default2.php"><img src="images/dessert.jpg" alt="" height="200" width="400"></a> </div>
      </li>
    </ul>
  </div>
</div>
<div id="footer">
  <div class="section">
    <div>
      <div class="aside">
        <div>
          <div> <b>Too <span>BUSY</span> to shop?</b> <a href="reg.html">Sign up for free</a>
            <p>and we'll deliver it on your Table</p>
          </div>
        </div>
      </div>
   
    </div>
  </div>
  <div id="featured">
   
  </div>
  <div id="navigation">
    <div>
    
      <p>Copyright &copy; 2018 Kim, Jaehak</p>
    </div>
  </div>
</div>
</body>
</html>
