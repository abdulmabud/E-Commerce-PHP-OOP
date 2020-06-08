<?php include 'header.php'; ?>
<?php 
    if(!isset($_GET['order_id'])){
        header('Location: index.php');
    }
    $order_id = $_GET['order_id'];
    $db = new Database();
    $result = $db->select("SELECT user_name, user_phone, user_email, address, subtotal, delivery_charge, total_price FROM orders WHERE id = '$order_id' ");
    $order = $result->fetch_assoc();
    $result = $db->select("SELECT product_name, unit_price, quantity FROM order_items WHERE order_id = '$order_id' ");

?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $order['user_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $order['user_phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $order['user_email']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $order['address']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="productList mt-4">
            <table class="table table-bordered">
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th class="text-center">Quantity</th>
                    <th>Total Price</th>
                </tr>
                <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['unit_price']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo number_format($row['unit_price'] * $row['quantity'], 2); ?></td>
                </tr>
                <?php } ?>
               
            </table>
            <table class="table table-bordered w-50 ml-auto">
                <tr>
                    <td>Subtotal</td>
                    <td>BDT <?php echo $order['subtotal']; ?></td>
                </tr>
                <tr>
                    <td>Delivery Charge</td>
                    <td>BDT <?php echo $order['delivery_charge']; ?></td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td>BDT <?php echo $order['total_price']; ?></td>
                </tr>
            </table>
        </div>
    </div>

<?php include 'footer.php'; ?>