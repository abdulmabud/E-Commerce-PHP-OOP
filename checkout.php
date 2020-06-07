<?php include 'header.php'; ?>
<div class="container">
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill"></span>
        </h4>
        <ul class="list-group mb-3">
          
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"></h6>
                <small class="text-muted">(Quantity)  <span> * (Unit Price)</span>  </small>
              </div>
              <span class="text-muted">BDT <span class="price"></span></span>
            </li>
          
          <li class="list-group-item d-flex justify-content-between lh-condensed" style="font-weight: 500;">Subtotal <span>BDT <span class="subTotal"></span> </span></li>
          <li class="list-group-item d-flex justify-content-between lh-condensed" style="font-weight: 500;">Delivery Charge<span>BDT <span class="deliveryCharge">50.00</span> </span></li>
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
        <form action="" method="POST" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Name</label>
              <input type="text" class="form-control" name="name" placeholder="" value="" required> 
            </div>
          </div>

          <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="+8801700111222">
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
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
</div>
<?php include 'footer.php'; ?>


