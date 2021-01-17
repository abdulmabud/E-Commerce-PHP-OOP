<?php include 'header.php'; ?>
<?php
    if(isset($_POST['register'])){
       $name = $_POST['name'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $password = $_POST['password'];
       $confirm_password = $_POST['confirm_password'];
       if($password === $confirm_password){
            $db = new Database();
            $result = $db->insert("INSERT INTO users(name, phone, email, address, password) VALUES('$name', '$phone', '$email', '$address', '$password')");
            if($result){
                echo '<h2 class="text-light py-3 text-center bg-primary">Registraion Successfully. Please login to continue.</h2>'; 
            }
       }else{
        echo '<h2 class="text-light py-3 text-center bg-danger">Password and Confirm Password does not match!</h2>'; 
       }
    }

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">Phone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">E-mail Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">Password</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 offset-md-4">
                                <input type="Submit" class="btn btn-primary form-control" value="Register" name="register">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>