<?php include 'header.php'; ?>
<?php

  $db = new Database();
  // session_start();
  // $result = $db->select("select * from products");
  // while($row = $result->fetch_assoc()){
  //   // var_dump($row);
  // }

  // $insert = $db->insert("insert into products(title) VALUES('nEW TITLE')");
  // if($insert){
  //   echo 'Vlaue insert';
  // }

  // $update = $db->update("update products set title = 'new new' where id=6");
  // if($update){
  //   echo 'Update done';
  // }

  // $delete = $db->delete('delete from products where id = 6');
  // if($delete){
  //   echo 'delete also done';
  // }
  
  $slider_images = $db->select("SELECT meta_value FROM settings WHERE meta_key = 'slider_image' ");
  $slider_active = 1;
  $result = $db->select("SELECT * FROM products WHERE status = '1' ");

  $fproducts = $db->select("SELECT p.id, title, regular_price, sale_price, c.name FROM products as p INNER JOIN featured_products ON p.id = featured_products.product_id INNER JOIN categories as c ON p.category_id = c.id ");

?>
<!-- Page Content -->


     <div style="margin-top: -25px;">
     <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
        <?php while($slider_image = $slider_images->fetch_assoc()){ ?>
          <div class="carousel-item <?php echo $slider_active == 1 ? 'active':'' ?>">
            <img class="d-block img-fluid" src="uploads/<?php echo $slider_image['meta_value']; ?>" width="100%" style="height:350px" alt="First slide">
          </div>
        <?php $slider_active = 2; } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
     </div>

      <div class="container">
      <h2>Featured Product</h2>
      <div class="row">
        <?php while($row = $fproducts->fetch_assoc()){ ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a
                  href="product.php?name=<?php echo $row['title']; ?>&&item=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
              </h4>
              <h5 class="d-inline"><del>BDT <?php echo $row['regular_price']; ?></del></h5> <br>
              <h5 class="d-inline">BDT <?php echo $row['sale_price']; ?></h5>
            </div>
            <div class="card-footer">
              <button data-productId="<?php echo $row['id']; ?>" class="btn btn-primary btn-block addtocart">Add to
                Cart</button>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <h2>New Arrival</h2>
      <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a
                  href="product.php?name=<?php echo $row['title']; ?>&&item=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
              </h4>
              <h5 class="d-inline"><del>BDT <?php echo $row['regular_price']; ?></del></h5> <br>
              <h5 class="d-inline">BDT <?php echo $row['sale_price']; ?></h5>
            </div>
            <div class="card-footer">
              <button data-productId="<?php echo $row['id']; ?>" class="btn btn-primary btn-block addtocart">Add to
                Cart</button>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
</div>
<?php include 'footer.php'; ?>

<script>
  < ? php
  if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
  } else {
    $cart['products'] = [];
  }

  $js = json_encode($cart);
  echo "var cart = ".$js.
  "; "; ?
  >
  console.log((cart['products']));

</script>