<?php include 'header.php'; ?>
<div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <h3 class="text text-center text-primary">Add FAQ</h3>
            <form action="faqs.php" method="POST" class="form-group">
            <table class="table table-borderless">
                <tr>
                    <td>Question</td>
                    <td><input type="text" name="question" class="form-control"></td>
                </tr>
                <tr>
                    <td>Answer</td>
                    <td><textarea name="answer" rows="5" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="" class="form-control">
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add FAQ" name="addFaq" class="btn btn-primary btn-block"></td>
                </tr>
            </table>
        </form>
        </div>
    </div>
<?php include 'footer.php'; ?>