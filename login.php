<?php include 'header.php'; ?>
<?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $db = new Database();
        $result = $db->select("SELECT name, is_admin FROM users WHERE email = '$email' AND password = '$password' ");
        if($result){
            $res = $result->fetch_assoc();
            $name = $res['name'];
            $is_admin = $res['is_admin'];
            session_start();
            $_SESSION['username'] = $name;
            if($is_admin != 1){
                header('Location: index.php');
            }else{
                header('Location: admin/index.php');
            }
            
            
        }else{
            echo '<h2 class="text-light py-3 text-center bg-danger">Email, Password or both are Invalid!</h2>'; 
        }
    }

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">E-mail Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-right">Password</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 offset-md-4">
                                <input type="Submit" class="btn btn-primary form-control" value="Login" name="login">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>