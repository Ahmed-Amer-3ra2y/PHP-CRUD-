<?php

try{
    // id of product will remove
    $id = $_GET['id'];
    //connection && Query for delete
    require "./connection.php";
    $query = "DELETE FROM `proudacts` WHERE id = $id";
    $conn->query($query);
    // return directly to main page
    header("location:index.php");
}catch(Exception $e){
    die("can't delete this product");
}