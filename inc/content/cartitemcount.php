<?php
    session_start();
    if(isset($_SESSION['cart'])){
        $cartitems = $_SESSION['cart'];
        $cartcount = 0;
        foreach($cartitems['products'] as $cartitem){
            $cartcount = $cartcount + $cartitem['quantity'];
        }
        echo $cartcount;
    }else{
        echo '0';
    }
    
    session_abort();
?>