<?php include 'header.php'; ?>
<?php

  $dt = new Database();
  
  // $result = $dt->select("select * from products");
  // while($row = $result->fetch_assoc()){
  //   // var_dump($row);
  // }

  // $insert = $dt->insert("insert into products(title) VALUES('nEW TITLE')");
  // if($insert){
  //   echo 'Vlaue insert';
  // }

  // $update = $dt->update("update products set title = 'new new' where id=6");
  // if($update){
  //   echo 'Update done';
  // }

  // $delete = $dt->delete('delete from products where id = 6');
  // if($delete){
  //   echo 'delete also done';
  // }

  $result = $dt->select("SELECT * FROM products WHERE status = '1' ")



?>
<!-- Page Content -->
<div class="container">

  <div class="row">



    <div class="col-lg-12">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="Third slide">
          </div>
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

      <div class="row">

    <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="http://127.0.0.1/product?name=<?php echo $row['title']; ?>&&item=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
              </h4>
              <h5 class="d-inline"><del>BDT <?php echo $row['regular_price']; ?></del></h5> <br>
              <h5 class="d-inline">BDT <?php echo $row['sale_price']; ?></h5>
            </div>
            <div class="card-footer">
              <a href="cart.php?product_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
          </div>
        </div>
    <?php endwhile; ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<?php include 'footer.php'; ?>