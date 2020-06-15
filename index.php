<?php include 'header.php'; ?>
<?php

  $db = new Database();
  session_start();
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

  $result = $db->select("SELECT * FROM products WHERE status = '1' ");

  $fproducts = $db->select("SELECT p.id, title, regular_price, sale_price, c.name FROM products as p INNER JOIN featured_products ON p.id = featured_products.product_id INNER JOIN categories as c ON p.category_id = c.id ");

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


      <h2>Featured Product</h2>
        <div class="row">
          <?php while($row = $fproducts->fetch_assoc()){ ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="product.php?name=<?php echo $row['title']; ?>&&item=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                  </h4>
                  <h5 class="d-inline"><del>BDT <?php echo $row['regular_price']; ?></del></h5> <br>
                  <h5 class="d-inline">BDT <?php echo $row['sale_price']; ?></h5>
                </div>
                <div class="card-footer">
                  <button data-productId="<?php echo $row['id']; ?>" class="btn btn-primary btn-block addtocart">Add to Cart</button>
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
                    <a href="product.php?name=<?php echo $row['title']; ?>&&item=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                  </h4>
                  <h5 class="d-inline"><del>BDT <?php echo $row['regular_price']; ?></del></h5> <br>
                  <h5 class="d-inline">BDT <?php echo $row['sale_price']; ?></h5>
                </div>
                <div class="card-footer">
                  <button data-productId="<?php echo $row['id']; ?>" class="btn btn-primary btn-block addtocart">Add to Cart</button>
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

<script>
  <?php
    $cart = $_SESSION['cart'];
    $js = json_encode($cart);
    echo "var cart = ".$js."; ";
  ?>
  var js_array = <?php echo $js; ?>;
  
  
  
  $('.addtocart').click(function(){
        var productId = this.dataset.productid;
        var thisBtn = this;
        if(cart['products'][productId]){
          var quantity = cart['products'][productId]['quantity'] + 1;
          var qhtml = '<h5 class="addtocartQuantity" style="text-align: center;"><button class="minusBtn" data-minusBtn = '+productId+'>-</button> <input type="text" value="'+quantity+'" id="q'+productId+'" class="text-center" style="width: 60px;">  <button class="plusBtn" data-plusbtn="'+productId+'">+</button> </h5>';
        }else{
          var qhtml = '<h5 class="addtocartQuantity" style="text-align: center;"><button class="minusBtn" data-minusBtn = '+productId+'>-</button> <input type="text" value="1" id="q'+productId+'" class="text-center" style="width: 60px;">  <button class="plusBtn" data-plusbtn="'+productId+'">+</button> </h5>';
        }
        $.ajax({
          url: 'cart.php',
          method: 'POST',
          data: {productId: productId, addtocart: 'yes' },
          cache: false,
          success: function(data){
              $(thisBtn).parent().html(qhtml);
              // $('.card-footer').parent.html('<h4>hjkhhkjh</h4>');
              // $('.addtocartQuantity' [hh=44]).css('display', 'block');
            run();
          }
        });
      });

      function run(){
          $('.minusBtn').click(function(){
            var productId = this.dataset.minusbtn;
            var quantity = $('#q'+productId).val();
            quantity = quantity - 1;
            if(quantity < 1){
              quantity = 0;
            }
            $('#q'+productId).val(quantity);
            
            $.ajax({
              url: 'cart.php',
              method: 'POST',
              data: {productId: productId, quantityBtn: 'Minus Btn'},
              cache: false,
              success: function(data){
                console.log('dsfffff');
                
              } 
            })
            
          });
         
          $('.plusBtn').click(function(){
            var productId = this.dataset.plusbtn;
            var quantity = $('#q'+productId).val();
            quantity = parseInt(quantity) + 1;
            $('#q'+productId).val(quantity);
            $.ajax({
              url: 'cart.php',
              method: 'POST',
              data: {productId: productId, quantityBtn: 'Plus Btn'},
              cache: false,
              success: function(data){
                // console.log(data);
                
              } 
            })
            
          });
      }

     
</script>