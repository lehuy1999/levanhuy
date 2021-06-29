<?php
    session_start();
    if(isset($_POST['id']) && isset($_POST['num'])){
        $id = $_POST['id'];
        $num = $_POST['num'];
        $cart = $_SESSION['cart'];
        if(array_key_exists($id, $cart)){
            if($num){
                $cart[$id] = array(
                    'name' => $cart[$id]['name'],
                    'num' => $num,
                    'price' => $cart[$id]['price'],
                    'image'=> $cart[$id]['image']
                );
            }else{
                unset($cart[$id]);
            }
            $_SESSION['cart'] = $cart;
            $numCart = 0;
            foreach($cart as $key => $value){
                $numCart ++;
            }
            echo $numCart;
        }
    }
?>