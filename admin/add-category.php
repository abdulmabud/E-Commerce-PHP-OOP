<?php include 'header.php'; ?>
<?php 
    $db = new Database();

    // Category Information
    $db = new Database();
    $categories = $db->select("SELECT id, name FROM categories WHERE status = '1' ");

?>
<div class="container mt-5">
<h3 class="text text-center text-primary">Add Category</h3>
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <form action="categories.php" method="POST" class="form-group">
            
            <table class="table table-borderless">
                <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="name" class="form-control"></td>
                </tr>
                <tr>
                    <td>Parent Category</td>
                    <td>
                        <select name="category_id" id="" class="form-control">
                            <option value="0">No Category</option>
                           <?php while($row = $categories->fetch_assoc()){ ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                           <?php } ?>
                        </select>
                    </td>
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
                    <td><input type="submit" value="Add Category" name="addCategory" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>