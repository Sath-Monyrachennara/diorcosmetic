<?php
    require_once('database.php');

    global $qty, $subtotal, $id, $price;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
    }
    $quantity = (int)$qty;
    $subtotal = (int)$price * $quantity;
    $updated = db()->query("UPDATE cart SET quantity = $quantity, sub_total = $subtotal WHERE id = '$id'");
    if($updated == 1){
        header("Location: cart.php");
        alert("Your product is updated!");
    }  
?>


