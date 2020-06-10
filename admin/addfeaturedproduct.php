<?php include 'header.php'; ?>
<?php
    if(isset($_POST['searchFProduct'])){
        $title = $_POST['productName'];
        $db = new Database();
        $result = $db->select("SELECT p.id, title, regular_price, sale_price, name FROM products as p INNER JOIN categories ON p.category_id = categories.id WHERE title LIKE '%$title%' ");
    }

?>
    <div class="container">
        <table class="table table-bordered mt-3">
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
           <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><del>BDT <?php echo $row['regular_price']; ?></del> <span  class="ml-3"><?php echo $row['sale_price']; ?></span> </td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="" class=""></a>
                    <form action="featuredproduct.php" method="POST">
                        <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                        <input type="submit" class="btn btn-primary" name="savefproduct" value="Add as Featured Product">
                    </form>
                </td>
            </tr>
            <?php } ?>
           
        </table>
    </div>
<?php include 'footer.php'; ?>