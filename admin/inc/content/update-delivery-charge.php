<?php include './../../../inc/database.php'; ?>
<?php 
    $db = new Database();
    $charge = $_POST['charge'];
    $update = $db->update("UPDATE settings SET meta_value = $charge WHERE meta_key = 'Delivery Charge' ");
    if($update){
        echo 'Delivery Charge Set '.$charge;
    }else{
        echo 'Something wrong';
    }
   
?>