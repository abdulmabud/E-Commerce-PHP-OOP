<?php include './../inc/database.php' ?>
<?php 
  session_start();
  if(! isset($_SESSION['isadmin'])){
    header('Location: ./..');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin Panel</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="orders.php" class="list-group-item list-group-item-action bg-light">Order</a>
        <a href="products.php" class="list-group-item list-group-item-action bg-light">Product</a>
        <a href="featuredproduct.php" class="list-group-item list-group-item-action bg-light">Featured Product</a>
        <a href="categories.php" class="list-group-item list-group-item-action bg-light">Category</a>
        <a href="usercontact.php" class="list-group-item list-group-item-action bg-light">User Contact Us</a>
        <a href="faqs.php" class="list-group-item list-group-item-action bg-light">FAQ</a>
        <a href="setting.php" class="list-group-item list-group-item-action bg-light">Setting</a>
        <a href="./../logout.php" class="list-group-item list-group-item-action bg-light">Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>