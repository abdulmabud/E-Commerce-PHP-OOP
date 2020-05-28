<?php include 'header.php'; ?>
<?php 
    $dt = new Database();
    //Product Information
    $productId = $_GET['product_id'];
    $result = $dt->select("SELECT * FROM products WHERE id = '$productId' ");
    $product = $result->fetch_assoc();

    // Category Information
    $db = new Database();
    $categories = $db->select("SELECT id, name FROM categories WHERE status = '1' ");

?>
<div class="container">
<h3 class="text text-center text-primary">Update Product</h3>
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <form action="products.php" method="POST" class="form-group" enctype="multipart/form-data">
            
            <table class="table table-borderless">
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="title" class="form-control" value="<?php echo $product['title']; ?>">
                        <input type="hidden" name="pid" value="<?php echo $product['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Regular Price</td>
                    <td><input type="text" name="regular_price" class="form-control" value="<?php echo $product['regular_price']; ?>"></td>
                </tr>
                <tr>
                    <td>Sale Price</td>
                    <td><input type="text" name="sale_price" class="form-control" value="<?php echo $product['sale_price']; ?>"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category_id" id="" class="form-control">
                        <?php while($row = $categories->fetch_assoc()){?>
                                <option value="<?php echo $row['id']; ?>" <?php echo $product['category_id'] == $row['id']? 'selected':''; ?> ><?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Thumbnail Image</td>
                    <td><input type="file" name="thumbnail_image"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image[]" multiple></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="" class="form-control">
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update Product" name="updateProduct" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>