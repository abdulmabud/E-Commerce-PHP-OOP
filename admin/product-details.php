<?php include 'header.php'; ?>
<?php 
    $dt = new Database();
    $productId = $_GET['product'];
    $result = $dt->select("SELECT * FROM products WHERE id = '$productId' ");
    $product = $result->fetch_assoc();


?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-primary text-center my-3"><?php echo $product['title']; ?> Details</h2>
            <table class="table table-bordered mt-3">
                <tr>
                    <td>Product Id</td>
                     <td><?php echo $product['id']; ?></td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td><?php echo $product['title']; ?></td>
                </tr>
                <tr>
                    <td>Regular Price</td>
                    <td>BDT <?php echo $product['regular_price']; ?></td>
                </tr>
                <tr>
                    <td>Sale Price</td>
                    <td>BDT <?php echo $product['sale_price']; ?></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><?php echo $product['category_id']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $product['status']; ?></td>
                </tr>
                <tr>
                    <td><a href="editproduct.php?product_id=<?php echo $product['id']; ?>" class="btn btn-primary">Edit Product</a></td>
                  <td>
                    <form action="" method="post">
                        <input type="hidden" name="pid" value="<?php echo $product['id']; ?>">
                        <input type="submit" class="btn btn-danger" value="Delete Product">
                   </form>
                  </td>
                    
                </tr>
            </table>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>