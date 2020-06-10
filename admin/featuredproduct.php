<?php include 'header.php'; ?>
<?php
    $db = new Database();
    if(isset($_POST['savefproduct'])){
        $pid = $_POST['pid'];
        $insert = $db->insert("INSERT INTO featured_products(product_id) VALUES('$pid') ");
        if($insert){
            echo '<h4 class="alert alert-success" style="font-weight: 400;">Featured Product Added Successfully</h4>'; 
        }
    }
    $result = $db->select("SELECT p.id, title, regular_price, sale_price, c.name FROM products as p INNER JOIN featured_products ON p.id = featured_products.product_id INNER JOIN categories as c ON p.category_id = c.id ");
    
    
?>
<div class="container">
    <div class="mt-3">
        <h3 class="text-center my-3 text-primary d-inline">Featured Product List</h3>
        <p class="d-inline"><button class="float-right mr-5 btn btn-primary addfproductBtn">Add Featured Product</button></p>
    </div>
    <div class="addfproductbox">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <form action="addfeaturedproduct.php" method="post" class="form-group">
                    <input type="text" name="productName" class="form-control mb-4">
                    <input type="submit" value="Search Product" name="searchFProduct" class="btn btn-primary btn-block">
                </form>
            </div>      
        </div>
    </div>
   
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
            <td><del class="ml-3">BDT  <?php echo $row['regular_price']; ?></del> BDT <?php echo $row['sale_price']; ?> </td>
            <td><?php echo $row['name']; ?></td>
            <td><a href="product-details.php?product=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a>
            <form action="" method="POST" class="d-inline">
                <input type="submit" value="Remove" class="btn btn-danger">
            </form>
            
            </td>
        </tr>
       <?php } ?>
       
    </table>
</div>
<?php include 'footer.php'; ?>

<script>
    $('.addfproductbox').css('display', 'none');
    $('.addfproductBtn').click(function(){
        $('.addfproductbox').css('display', 'block'); 
    });
    
</script>
