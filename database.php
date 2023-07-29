<?php
    global $id;

    function db(){
        return new mysqli('localhost', 'root', '', 'dirocosmetic_db');
    }

    function deletedProduct($id){
        return db()->query("DELETE FROM cart WHERE id = $id");
    }

    function deleteAllProduct(){
        return db()->query("DELETE FROM cart");
    }
?>