<?php include 'header.php'; ?>
<?php 
    session_start();
    if(isset($_POST['addtocart'])){
        $pid = $_POST['productId'];
        $db = new Database();
        $cartObj = new Cart();
        $result = $db->select("SELECT title, sale_price FROM products WHERE id = '$pid' ");
        $product = $result->fetch_assoc();
        $title = $product['title'];
        $price = $product['sale_price'];
        $cartObj->add_to_cart($pid, $title, $price);
    }

    if(isset($_POST['quantityBtn'])){
        $pid = $_POST['productId'];
        $btn = $_POST['quantityBtn'];
        $cartObj = new Cart();
        $result = $db->select("SELECT title, sale_price FROM products WHERE id = '$pid' ");
        $product = $result->fetch_assoc();
        $title = $product['title'];
        $price = $product['sale_price'];
        $cartObj->updateCart($pid, $btn, $title, $price);
        
    }

    
  
?>
<?php if(!isset($_SESSION['cart'])){ ?>
    <div class="container text-center">
        <h1 class="text-primary" style="margin: 200px 0;">There is no item in your cart. Please add item.</h1>
    </div>
<?php } else{ 
        $cart = $_SESSION['cart'];
    ?>
<div class="container mt-5">
        <h2 class="text-center text-primary">Cart Item List</h2>
        <table class="table table-bordered text-center" id="cartTable">
            <tr>
                <th class="text-left">Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
          <?php foreach($cart['products'] as $product){ ?>
            <tr>
            <td class="text-left"><?php echo $product['title']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td class="text-center"><?php echo $product['quantity']; ?></td>
                <td class="text-right pr-5" style="width: 15%;">BDT <span class="price"><?php echo number_format($product['price']*$product['quantity'], 2, '.', ''); ?></span> </td>
                <td><button class="btn btn-danger removeBtn" data-productid="<?php echo $product['id']; ?>">Remove</button></td>
            </tr>
          <?php } ?>
            
        </table>
        <table class="table table-bordered w-50" style="margin-left: 50%;">
            <tr>
                <td>Subtotal Total</td>
                <td class="text-right pr-3">BDT <span class="subTotal"></span></td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td class="text-right pr-3">BDT <span class="deliveryCharge">50.00</span> </td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td class="text-right pr-3">BDT <span class="totalPrice"></span></td>
            </tr>
        </table>
        <div style="margin-bottom: 4rem!important;">
        <a href="checkout.php" class="float-right btn btn-primary w-25 btn-block">Checkout</a>
        </div>
        
    </div>
          <?php } ?>
<?php include 'footer.php'; ?>
<script>
    $('.removeBtn').click(function(){
        var product_id = this.dataset.productid;
        console.log(product_id);
        $.ajax({
            url: 'inc/content/removecartitem.php',
            method: 'POST',
            data: {product_id: product_id, removeItem: 'remove'},
            cache: false,
            success: function(data){
               $('#cartTable').html(data);
               updatePrice();
            }
        }); 
    })
    updatePrice();
    function updatePrice(){
        var sum = 0;
        $('.price').each(function(){
            sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        });

        var deliveryCharge = parseInt($('.deliveryCharge').text());
        var totalPrice = sum + deliveryCharge;
        totalPrice = totalPrice.toFixed(2);
        sum = sum.toFixed(2);
        $('.subTotal').text(sum);
        $('.totalPrice').text(totalPrice);
    }
         
</script>