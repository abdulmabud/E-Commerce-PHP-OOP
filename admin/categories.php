<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    

    if(isset($_POST['addCategory'])){
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $status = $_POST['status'];
        $slug = strtolower(str_replace(' ', '-', $name));
        
        $insert = $db->insert("INSERT INTO categories(name, slug, category_id, status) VALUES('$name', '$slug', '$category_id', '$status') ");
        if($insert){
            echo '<h4 class="alert alert-success">Category Inserted Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }
    
    if(isset($_POST['updateCategory'])){
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $status = $_POST['status'];
        $cid = $_POST['cid'];
        $slug = strtolower(str_replace(' ', '-', $name));
        
        $update = $db->update("UPDATE categories SET name = '$name', category_id = '$category_id', slug='$slug', status = '$status' WHERE id = '$cid' ");
        if($update){
            echo '<h4 class="alert alert-success">Category Updated Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    if(isset($_POST['deleteCategory'])){
        $cid = $_POST['cid'];
        $delete = $db->delete("DELETE FROM categories WHERE id = '$cid' ");
        if($delete){
            echo '<h4 class="alert alert-success">Category Deleted Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    $categories = $db->select("SELECT id, name, status FROM categories ORDER BY ID DESC");
?>

<div class="container">
        <div class="mt-3">
            <h3 class="text-center my-3 text-primary d-inline">Category List</h3>
            <p class="d-inline"><a href="add-category.php" class="float-right mr-5 btn btn-primary">Add Category</a></p>
        </div>
              
        <table class="table table-bordered mt-3">
            <tr>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while($row = $categories->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['status'] == 1 ? 'Publish' : 'Unpublish'; ?></td>
                <td><a href="category-details.php?category=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a></td>
            </tr>
            <?php } ?>
           
        </table>
    </div>


<?php include 'footer.php'; ?>