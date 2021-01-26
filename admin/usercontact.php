<?php include 'header.php'; ?>
<?php
    $db = new Database();
    $contacts = $db->select("SELECT id, name, subject, created_at FROM contacts ORDER BY ID DESC");
?>
<div class="container">
        <h3 class="text-center text-primary">User Contact Details</h3>
        <table class="table table-bordered">
            <tr>
                <td>Contact Id</td>
                <td>Time</td>
                <td>Name</td>
                <td>Subject</td>
                <td>Action</td>
            </tr>
            <?php while($contact = $contacts->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $contact['id']; ?></td>
                    <td><?php echo $contact['created_at']; ?></td>
                    <td><?php echo $contact['name']; ?></td>
                    <td><?php echo $contact['subject']; ?></td>
                    <td><a href="usercontactdetails.php?contact_id=<?php echo $contact['id']; ?>" class="btn btn-primary">Details</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php include 'footer.php'; ?>