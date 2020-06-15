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
    
    public function updateCart($id, $btn){
        $cart = $_SESSION['cart'];
        $quantity = $cart['products'][$id]['quantity'];
        if($btn == 'Minus Btn'){
            $quantity = $quantity - 1;
            if($quantity < 1){
                unset($cart['products'][$id]);
            }else{
                $cart['products'][$id]['quantity'] = $quantity;
            }
            
        }else if($btn == 'Plus Btn'){
            
            $cart['products'][$id]['quantity'] = $quantity + 1;
        }
        $_SESSION['cart'] = $cart;
    }
}