<?php
    include_once '../shared/connection.php';
    $cart_id=$_GET['cart_id'];
    $cmd="delete from cart where cart_id=$cart_id";
    $sql_status=mysqli_query($conn,$cmd);

    if ($sql_status) {
        echo"deletion successfull!";
        header('location:view_cart.php');
    }
    else{
        echo"failed to delete";
    }
?>
