<?php include 'header.php'; ?>
<?php
    // session_start();
    if(! isset($_GET['name'])){
        header('Location: index.php');
    }
    $slug = $_GET['name'];
    $db = new Database();
    $result = $db->select("SELECT id, name FROM categories WHERE slug = '$slug' ");
    $category = $result->fetch_assoc();
    $c_id = $category['id'];
    $res = $db->select("SELECT p.id, title, regular_price, sale_price, image FROM products as p LEFT JOIN product_images as i ON p.id = i.product_id AND thumbnail_image = '1'  WHERE category_id = '$c_id' ");
    
?>

        <div class="container">
            <h2 class="text-primary text-center my-4"><?php echo $category['name']; ?></h2>
            <div class="row">
              <?php while($product = $res->fetch_assoc()){ ?>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="./uploads/product/<?php echo $product['image'] != null ? $product['image']:'noImage.png'; ?>" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="product.php?name=<?php echo $product['title']; ?>&item=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a>
                        </h4>
                        <h5 class="d-inline"><del>BDT <?php echo $product['regular_price']; ?></del></h5>
                        <h5 class="d-inline">BDT <?php echo $product['sale_price']; ?></h5>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" value="{{ $product->id }}" id="productId">
                        <button data-productid="<?php echo $product['id']; ?>" class="btn btn-primary btn-block addtocart">Add to Cart</button>
                    </div>
                </div>
            </div>
              <?php } ?>
            </div>
        </div>


<?php include 'footer.php'; ?>

<script>
 <?php
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }else{
        $cart['products'] = [];
    }
    
    $js = json_encode($cart);
    echo "var cart = ".$js."; ";
    ?>
    </script>