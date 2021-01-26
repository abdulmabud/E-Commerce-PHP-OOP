<?php include 'header.php'; ?>
<?php
    if(isset($_GET['id'])){
        $faqid = $_GET['id'];
        $db = new Database();
        $faq = $db->select("SELECT question, answer, status FROM faqs WHERE id = '$faqid' ")->fetch_assoc();
    }

?>
<div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <h3 class="text text-center text-primary">Update FAQ</h3>
            <form action="faqs.php" method="POST" class="form-group">
            <input type="hidden" name="faqid" value="<?php echo $faqid; ?>">
            <table class="table table-borderless">
                <tr>
                    <td>Question</td>
                    <td><input type="text" name="question" value="<?php echo $faq['question']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Answer</td>
                    <td><textarea name="answer" rows="5" class="form-control"><?php echo $faq['answer']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="" class="form-control">
                            <option value="1">Publish</option>
                            <option <?php echo $faq['status'] == 0 ? 'Selected':''; ?> value="0">Unpublish</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update FAQ" name="updateFaq" class="btn btn-primary btn-block"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>
<?php include 'footer.php'; ?>