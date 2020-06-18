<?php include '../database.php'; ?>
<?php
    if(isset($_POST['removeItem'])){
        $pid = $_POST['product_id'];
        session_start();
        $cart = $_SESSION['cart'];
        unset($cart['products'][$pid]);
        $_SESSION['cart'] = $cart;
        if($cart['products'] == null){
            unset($_SESSION['cart']);
        }
    }
    
?>

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
    <td class="text-right pr-5" style="width: 15%;">BDT <span
            class="price"><?php echo number_format($product['price']*$product['quantity'], 2, '.', ''); ?></span> </td>
    <td><button class="btn btn-danger removeBtn" data-productid="<?php echo $product['id']; ?>">Remove</button></td>
</tr>
<?php } ?>

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
</script>