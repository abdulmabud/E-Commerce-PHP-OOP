<?php include 'header.php'; ?>
<?php 
    $current_user_id = $_SESSION['userid'];
    $db = new Database();
    $user_info = $db->select("SELECT name, phone, email, address FROM users WHERE id = '$current_user_id' ")->fetch_assoc();
    $orders = $db->select("SELECT id, total_price, created_at FROM orders WHERE user_id = '$current_user_id' ");
?>
<div class="container">
        <h2 class="text-primary text-center my-3"><?php echo $user_info['name']; ?> Account</h2>
    <h5 class="text-primary">Billing Address</h5>
        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td><?php echo $user_info['name']; ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php echo $user_info['phone']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $user_info['email']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $user_info['address']; ?></td>
            </tr>
        </table>
        <hr><hr>
        <h5 class="text-primary">My Orders</h5>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <td>Date</td>
                    <td>Order No.</td>
                    <td>Amount</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php while($order = $orders->fetch_assoc()){ ?>
                <tr class="text-center">
                    <td><?php echo $order['created_at']; ?></td>
                    <td><?php echo $order['id']; ?></td>
                    <td>BDT <?php echo $order['total_price']; ?></td>
                    <td><a href="{{ route('myaccount.orderdetails', $order->id) }}"><button class="btn btn-primary">Details</button></a></td>
                </tr> 
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php include 'footer.php'; ?>