<?php
    session_start();
    include('admin/include/connect.php');
    if(isset($_POST['id']) && isset($_POST['num'])){
        $id = $_POST['id'];
        $num = $_POST['num'];
        $sql = "SELECT * FROM phone WHERE phoneId = $id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        if(!isset($_SESSION['cart'])){
            $cart = array();
            $cart[$id] = array(
                'name' => $row['phoneName'],
                'num' => $num,
                'price' => $row['phonePrice'],
                'image' => $row['phoneImage']
            );
        }else{
            $cart = $_SESSION['cart'];
            if(array_key_exists($id, $cart)){
                $cart[$id] = array(
                'name' => $row['phoneName'],
                'num' => (int)$cart[$id]['num'] + 1,
                'price' => $row['phonePrice'],
                'image' => $row['phoneImage']
                );
            }else{
                $cart[$id] = array(
                    'name' => $row['phoneName'],
                    'num' => $num,
                    'price' => $row['phonePrice'],
                    'image' => $row['phoneImage']
                );
            }
        }

        $_SESSION['cart'] = $cart;
        $numCart = 0;
        foreach($cart as $key => $value){
            $numCart ++;
        }
        echo $numCart;
        // echo "<pre>";
        // print_r($cart);
        // die;
    }
?>