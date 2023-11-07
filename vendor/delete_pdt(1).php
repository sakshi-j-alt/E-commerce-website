<?php

session_start();
if(!isset($_SESSION['login'])) {
    echo"illegal entry \n";
    echo"<a href='login.html'> login first</a>";
    die;
}
if($_SESSION['login']==false) {
    echo"login failed. Check username or password";
    die;
}

    include_once '../shared/connection.php';
    $id=$_GET['id'];
    $cmd="delete from products where id=$id";
    $sql_status=mysqli_query($conn,$cmd);

    if ($sql_status) {
        echo"deletion successfull!";
        header('location:view.php');
    }
    else{
        echo"failed to delete";
    }
?>
