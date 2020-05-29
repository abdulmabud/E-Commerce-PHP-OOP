<?php
class Cart{
    public function add_to_cart($id, $title, $price){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else{
            $cart['products'] = [];
        }
        
       if(array_key_exists($id, $cart['products'])){
                $quantity = $cart['products'][$id]['quantity'];
                $cart['products'][$id]['quantity'] = $quantity + 1;
        }else{
            $cart['products'][$id] = [
                'id' => $id,
                'title' => $title,
                'quantity' => 1,
                'price' => $price
            ];
        }  
        $_SESSION['cart'] = $cart;
    }   
}