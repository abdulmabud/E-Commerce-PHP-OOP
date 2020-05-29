<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //Product Information
    $categoryId = $_GET['category'];
    $result = $db->select("SELECT * FROM categories WHERE id = '$categoryId' ");
    $category = $result->fetch_assoc();

    // Category Information
    $db = new Database();
    $categories = $db->select("SELECT id, name FROM categories WHERE status = '1' ");

?>
<div class="container mt-5">
<h3 class="text text-center text-primary">Update Category</h3>
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <form action="categories.php" method="POST" class="form-group">
            
            <table class="table table-borderless">
                <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="name" class="form-control" value="<?php echo $category['name']; ?>">
                        <input type="hidden" name="cid" value="<?php echo $category['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Parent Category</td>
                    <td>
                        <select name="category_id" id="" class="form-control">
                            <option value="0">No Parent Category</option>
                           <?php while($row = $categories->fetch_assoc()){ ?>
                                <option <?php echo $row['id'] == $category['category_id'] ? 'selected':''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                           <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="" class="form-control">
                            <option <?php echo $category['status'] == 1 ? 'selected':''; ?> value="1">Publish</option>
                            <option <?php echo $category['status'] == 0 ? 'selected':''; ?> value="0">Unpublish</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update Category" name="updateCategory" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>