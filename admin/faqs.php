<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    if(isset($_POST['addFaq'])){
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $status = $_POST['status'];
        $insert = $db->insert("INSERT INTO faqs(question, answer, status) VALUES('$question', '$answer', $status)");
        if($insert){
            echo '<h4 class="alert alert-success">FAQ Inserted Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    if(isset($_POST['updateFaq'])){
        $faqid = $_POST['faqid'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $status = $_POST['status'];
        $update = $db->update("UPDATE faqs SET question = '$question', answer = '$answer', status = '$status' WHERE id = '$faqid' ");
        if($update){
            echo '<h4 class="alert alert-success">FAQ Updated Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    if(isset($_POST['deleteFaq'])){
        $faqid = $_POST['faqid'];
        $delete = $db->delete("DELETE FROM faqs WHERE id = '$faqid' ");
        if($delete){
            echo '<h4 class="alert alert-success">FAQ Deleted Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    $faqs = $db->select('SELECT id, question, answer, status FROM faqs');
?>
<div class="container">
        <div class="mt-3">
            <h3 class="text-center my-3 text-primary d-inline">FAQ List</h3>
            <p class="d-inline"><a href="addfaq.php" class="float-right mr-5 btn btn-primary">Add Faq</a></p>
        </div>
        <?php if($faqs == null): ?>
            <h2 class="text text-center text-light w-75 mx-auto my-5 py-5 bg-primary">There is no faq added!!</h2>
        <?php else: ?>
            <table class="table table-bordered mt-3">
            <tr>
                <th>FAQ Id</th>
                <th>Question</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while($faq = $faqs->fetch_assoc()){ ?> 
            <tr>
                <td><?php echo $faq['id']; ?></td>
                <td><?php echo $faq['question']; ?></td>
                <td><?php echo $faq['status'] == 1 ? 'Publish':'Unpublish' ?></td>
                <td><a href="faqdetails.php?id=<?php echo $faq['id']; ?>
                " class="btn btn-primary">Details</a></td>
            </tr>
           <?php } ?>
        </table>
        <?php endif; ?>    
    </div>
<?php include 'footer.php'; ?>