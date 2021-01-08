<?php include 'header.php'; ?>
<?php 
        $db = new Database();
        $result = $db->select("SELECT meta_value FROM settings WHERE meta_key='Delivery Charge'");
        $delivery_charge = $result->fetch_assoc();
?>
<div class="container">
        <table class="table table-bordered w-50">
            <tr>
                <td>Delivery Charge</td>
                <td><input type="text" value="<?php echo $delivery_charge['meta_value']; ?>" id="charge" class="form-control text-center" style="width: 100px;"></td>
                <td><button class="btn btn-primary" id="update-delivery-charge">Update</button></td>
            </tr>
        </table>
        <h4 class="text-primary" id="dresult"></h4>
</div>
<?php include 'footer.php'; ?>

<script>
        $('#update-delivery-charge').click(function(){
                var charge = $('#charge').val();
                $.ajax({
                        url: 'inc/content/update-delivery-charge.php',
                        method: 'POST',
                        data: {charge: charge},
                        chache: false,
                        success: function(data){
                                $('#dresult').text(data);
                        }
                });
        });
</script>