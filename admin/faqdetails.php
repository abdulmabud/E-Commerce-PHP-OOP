<?php include 'header.php'; ?>
<?php 
    if(isset($_GET['id'])){
        $faqid = $_GET['id'];
        $db = new Database();
        $faq = $db->select("SELECT id, question, answer, status FROM faqs WHERE id = '$faqid' ")->fetch_assoc();
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-primary text-center my-3">FAQ Details</h2>
            <table class="table table-bordered mt-3">
                <tr>
                    <td class="w-25">FAQ Id</td>
                     <td><?php echo $faq['id']; ?></td>
                </tr>
                <tr>
                    <td>Question</td>
                    <td><?php echo $faq['question']; ?></td>
                </tr>
                <tr>
                    <td>Answer</td>
                    <td><?php echo $faq['answer']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $faq['status'] == 1 ? 'Publish':'Unpublish'; ?></td>
                </tr>
                <tr>
                    <td><a href="#" class="btn btn-primary">Edit FAQ</a></td>
                  <td>
                    <form action="#" method="post">
                        <input type="submit" class="btn btn-danger" value="Delete FAQ">
                   </form>
                  </td>
                    
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>