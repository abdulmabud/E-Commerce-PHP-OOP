<?php session_start(); ?>
<?php include './inc/database.php'; ?>
<?php include './inc/classes/cart.php'; ?>
<?php
  $db = new Database();
  $categoryObj = $db->select("SELECT name, slug FROM categories WHERE status = '1' ");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ecommerce - PHP OOP</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <link href="css/custom.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/E-Commerce-PHP-OOP/">Ecommerce</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/E-Commerce-PHP-OOP/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <div class="dropdown show">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             <?php while($categories = $categoryObj->fetch_assoc()){ ?>
              <a class="dropdown-item" href="category.php?name=<?php echo $categories['slug']; ?>"><?php echo $categories['name']; ?></a>
             <?php } ?>             
            </div>
          </li>
          </div>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart
              <span id="countCart"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php if(isset($_SESSION['username'])){ ?> 
            <li class="nav-item" style="position: relative;">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="myaccount.php">My Account</a>       
              <a class="dropdown-item" href="logout.php">Logout</a>       
            </div>
          </li>
          <?php }else{ ?>
              <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php }?>
        </ul>
      </div>
    </div>
  </nav>