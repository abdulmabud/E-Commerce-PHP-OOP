<?php include 'header.php'; ?>
<?php
    $dt = new Database();

    if(isset($_POST['addProduct'])){
        $title = $_POST['title'];
        $regularPrice = $_POST['regular_price'];
        $salePrice = $_POST['sale_price'];
        $categoryId = $_POST['category_id'];
        $status = $_POST['status'];

        $insert = $dt->insert("INSERT INTO products(title, regular_price, sale_price, category_id, status) VALUES('$title', '$regularPrice', '$salePrice', '$categoryId', 'status')");
        if($insert){
            echo '<h4 class="alert alert-success">Product added Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

?>
<div class="container">
<div class="mt-3">
            <h3 class="text-center my-3 text-primary d-inline">Product List</h3>
            <p class="d-inline"><a href="./addproduct.php" class="float-right mr-5 btn btn-primary">Add Product</a></p>
        </div>
    <table class="table table-bordered">
    <tr>
                <th>Order Id</th>
                <th>Time</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
                        <tr>
                <td>2</td>
                <td>2020-02-23 11:36:01</td>
                <td>Abdul Mabud</td>
                <td>972</td>
            <td><a href="http://127.0.0.1:8000/admin/order/2" class="btn btn-primary">Details</a></td>
            </tr>
                        <tr>
                <td>1</td>
                <td>2020-02-08 06:45:42</td>
                <td>Abdul Mabud</td>
                <td>1748</td>
            <td><a href="http://127.0.0.1:8000/admin/order/1" class="btn btn-primary">Details</a></td>
            </tr>
    </table>
</div>


<?php include 'footer.php'; ?>