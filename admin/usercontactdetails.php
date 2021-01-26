<?php include 'header.php'; ?>
<?php
    if(isset($_GET['contact_id'])){
        $contact_id = $_GET['contact_id'];
        $db = new Database();
        $contact = $db->select("SELECT name, phone, email, subject, message FROM contacts WHERE id = '$contact_id' ")->fetch_assoc();
    }
?>
<div class="container">
        <h3 class="text-center text-primary">Contact Details</h3>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $contact['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $contact['phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $contact['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td><?php echo $contact['subject']; ?></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td><?php echo $contact['message']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>