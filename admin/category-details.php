<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    $categoryId = $_GET['category'];
    $result = $db->select("SELECT * FROM categories WHERE id = '$categoryId' ");
    $category = $result->fetch_assoc();


?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-primary text-center my-3"><?php echo $category['name']; ?> Details</h2>
            <table class="table table-bordered mt-3">
                <tr>
                    <td>Category Id</td>
                     <td><?php echo $category['id']; ?></td>
                </tr>
                <tr>
                    <td>Category Name</td>
                    <td><?php echo $category['name']; ?></td>
                </tr>
                <tr>
                    <td>Category Slug</td>
                    <td><?php echo $category['slug']; ?></td>
                </tr>
                <tr>
                    <td>Parent Category</td>
                    <td><?php $cid = $category['category_id'];
                        if ($cid == 0){
                            echo 'No Parent Category Found';
                        }else{
                            $result = $db->select("SELECT name FROM categories WHERE id = '$cid' ");
                            $row = $result->fetch_assoc();
                            echo $row['name'];
                        }
                    
                    ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $category['status'] == 1 ? 'Publish' : 'Unpublish' ?></td>
                </tr>
                <tr>
                    <td><a href="editcategory.php?category=<?php echo $category['id']; ?>" class="btn btn-primary">Edit Category</a></td>
                  <td>
                    <form action="categories.php" method="post">
                        <input type="hidden" name="cid" value="<?php echo $category['id']; ?>">
                        <input type="submit" class="btn btn-danger" name="deleteCategory" value="Delete Category">
                   </form>
                  </td>
                    
                </tr>
            </table>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>