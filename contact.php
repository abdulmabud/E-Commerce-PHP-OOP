<?php include 'header.php'; ?>
<div class="container mb-5">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <h3 class="text-center text-primary">Contact Us</h3>
                <form action="" method="POST" class="form-group">
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" placeholder="Required" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" placeholder="Optional" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" placeholder="Required" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td><input type="text" name="subject" placeholder="Required" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><textarea name="message" rows="5" class="form-control" placeholder="Required"></textarea></td>
                        </tr>
                    </table>
                    <input type="submit" value="Contact Us" name="contact" class="btn btn-primary w-25 float-right">
                </form>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>