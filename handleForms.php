<?php
session_start();

if(isset($_POST['submitBtn'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if(!empty($title) && !empty($price) && !empty($quantity)){
        $_SESSION['cart'][] = array(
            'title' => $title,
            'price' => $price,
            'quantity' => $quantity
        );
    }

    header('Location: index.php');
}
?>