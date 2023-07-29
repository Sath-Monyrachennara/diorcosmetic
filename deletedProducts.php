<?php
    require_once('database.php');
    global $id;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $isDeleted = deletedProduct($id);
        if($isDeleted == 1){
            header('location: cart.php');
            alert("Product is deleted!");
        }
    }

    $deletedAll = deleteAllProduct();
    if($deletedAll == 1){
        header('location: cart.php');
    }
?>