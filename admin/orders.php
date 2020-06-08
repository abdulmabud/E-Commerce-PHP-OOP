<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    $result = $db->select("SELECT id, user_name, total_price, created_at FROM orders ORDER BY ID DESC");
?>
<div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Order Id</th>
                <th>Time</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
           <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
            <td><a href="orderdetails.php?order_id=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a></td>
            </tr>
           <?php } ?>
        </table>
    </div>


<?php include 'footer.php'; ?>