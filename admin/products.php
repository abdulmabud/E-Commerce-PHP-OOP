<?php include 'header.php'; ?>
<?php
    $db = new Database();

    if(isset($_POST['addProduct'])){
        $title = $_POST['title'];
        $regularPrice = $_POST['regular_price'];
        $salePrice = $_POST['sale_price'];
        $categoryId = $_POST['category_id'];
        $status = $_POST['status'];
         $insert = $db->insert("INSERT INTO products(title, regular_price, sale_price, category_id, status) VALUES('$title', '$regularPrice', '$salePrice', '$categoryId', '$status')");
        if($insert){
            echo '<h4 class="alert alert-success">Product added Successfully</h4>';
        }else{
            echo $conn->error;
        }
        $insert_id = $db->getLastId();

        //thumbnail_image 
        $thumbExt = pathinfo($_FILES['thumbnail_image']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$thumbExt;
        $destination = './../uploads/product/'.$filename;
        move_uploaded_file($_FILES['thumbnail_image']['tmp_name'], $destination);
        $db->insert("INSERT INTO product_images(product_id, image) VALUES('$insert_id', '$filename')");

        //product image
        foreach($_FILES['image']['error'] as $key=>$error){
            if($error === UPLOAD_ERR_OK){
                $imageExt = pathinfo($_FILES['image']['name'][$key], PATHINFO_EXTENSION);
                $filename = time().rand(1000, 9999).'.'.$imageExt;
                $destination = './../uploads/product/'.$filename;
                move_uploaded_file($_FILES['image']['tmp_name'][$key], $destination);
                $db->insert("INSERT INTO product_images(product_id, image, thumbnail_image) VALUES('$insert_id', '$filename', 0)");
            }
        }
       
    }

    if(isset($_POST['updateProduct'])){
        $title = $_POST['title'];
        $regularPrice = $_POST['regular_price'];
        $salePrice = $_POST['sale_price'];
        $categoryId = $_POST['category_id'];
        $status = $_POST['status'];
        $pid = $_POST['pid'];

        $insert = $db->update("Update products SET title = '$title',  regular_price = '$regularPrice',  sale_price = '$salePrice',  category_id = '$categoryId', status = '$status' WHERE id = '$pid' ");
        if($insert){
            echo '<h4 class="alert alert-success">Product updated Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    if(isset($_POST['deleteProduct'])){
        $pid = $_POST['pid'];
        $delete = $db->delete("DELETE FROM products WHERE id = '$pid' ");
        if($delete){
            echo '<h4 class="alert alert-success">Product Delete Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    $result = $db->select("SELECT * FROM products ORDER BY id DESC");

?>
<div class="container">
<div class="my-3">
            <h3 class="text-center my-3 text-primary d-inline">Product List</h3>
            <p class="d-inline"><a href="./addproduct.php" class="float-right mr-5 btn btn-primary">Add Product</a></p>
        </div>
    <table class="table table-bordered">
             <tr>
                <th>Product Id</th>
                <th>Title</th>
                <th>Regular Price</th>
                <th>Sales Price</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['regular_price']; ?></td>
                <td><?php echo $row['sale_price']; ?></td>
            <td><a href="product-details.php?product=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a></td>
            </tr>
            <?php endwhile; ?>
    </table>
</div>


<?php include 'footer.php'; ?>