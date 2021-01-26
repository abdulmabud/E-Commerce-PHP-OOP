<?php include 'header.php'; ?>
<?php 
    // session_start();
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $product_count = count($cart['products']);
    }else{
        header('Location: cart.php');
        exit();
    }

    $delivery_charge = $db->select("SELECT meta_value FROM settings WHERE meta_key = 'Delivery Charge' ");
    $delivery_charge = $delivery_charge->fetch_assoc();
    $delivery_charge = $delivery_charge['meta_value'];
    
?>
<?php if(isset($_POST['placeOrder'])){
    $user_name = $_POST['name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];
    $address = $_POST['address'];
    $subtotal = $_POST['subtotal'];
    $delivery_charge = $_POST['delivery_charge'];
    $total_price = $_POST['total_price'];
    if(isset($_SESSION['userid'])){
      $user_id = $_SESSION['userid'];
    }else{
      $user_id = NULL;
    }
    $db = new Database();
    $insert = $db->insert("INSERT INTO orders(user_id, user_name, user_phone, user_email, address, subtotal, delivery_charge, total_price) VALUES('$user_id', '$user_name', '$user_phone', '$user_email', '$address', '$subtotal', '$delivery_charge', '$total_price') ");
    $insert_id = $db->getLastId();

    $products = $cart['products'];
    foreach($products as $product){
        $title = $product['title'];
        $quantity = $product['quantity'];
        $price = $product['price'];
        $insert_item = $db->insert("INSERT INTO order_items(order_id, product_name, unit_price, quantity) VALUES('$insert_id', '$title', '$price', '$quantity') ");
    }
    if($insert && $insert_item){
        echo '<h4 class="alert alert-success">Order Place Successfully</h4>';
        unset($_SESSION['cart']);
        $cart['products'] = [];
        $product_count = '';
    }
}else{

} ?>
<div class="container">
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill"><?php echo $product_count; ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php foreach($cart['products'] as $cart){ ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $cart['title']; ?></h6>
                <small class="text-muted">(Quantity) <?php echo $cart['quantity']; ?> <span> * (Unit Price) <?php echo $cart['price']; ?></span>  </small>
              </div>
              <span class="text-muted">BDT <span class="price"><?php echo number_format($cart['quantity'] * $cart['price'], 2); ?></span></span>
            </li>
          <?php } ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed" style="font-weight: 500;">Subtotal <span>BDT <span class="subTotal"></span> </span></li>
          <li class="list-group-item d-flex justify-content-between lh-condensed" style="font-weight: 500;">Delivery Charge<span>BDT <span class="deliveryCharge"><?php echo $delivery_charge; ?></span> </span></li>
          <li class="list-group-item d-flex justify-content-between lh-condensed" style="font-weight: 500;">Total Price <span>BDT <span class="totalPrice"></span> </span></li>
          
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-8 order-md-1 mb-4">
        <h4 class="mb-3">Billing address</h4>
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Name</label>
              <input type="text" class="form-control" name="name" required> 
            </div>
          </div>

          <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="+8801700111222" required>
          </div>
          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" name="email" placeholder="you@example.com">
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" required>
        
          </div>
         <!-- hidden input   -->
          <input type="hidden" name="subtotal" id="hsubtotal">
          <input type="hidden" name="delivery_charge" id="hdeliverycharge">
          <input type="hidden" name="total_price" id="htotalprice">


          <!-- end hidden input  -->
          <hr class="mb-4">
          <input  type="submit" class="btn btn-primary btn-lg btn-block" name="placeOrder" value="Continue to checkout">
        </form>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
  var sum = 0;
      $('.price').each(function(){
          sum += parseFloat($(this).text().replace(',', ''));  // Or this.innerHTML, this.innerText
      });

      var deliveryCharge = parseInt($('.deliveryCharge').text());
      var totalPrice = sum + deliveryCharge;
      totalPrice = totalPrice.toFixed(2);
      sum = sum.toFixed(2);
      $('.subTotal').text(sum);
      $('.totalPrice').text(totalPrice); 

      $('#hsubtotal').val(sum);
      $('#hdeliverycharge').val(deliveryCharge);
      $('#htotalprice').val(totalPrice);
  </script>


