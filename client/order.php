<?php
session_start();
if (!isset($_SESSION['loginn'])) {
    echo"<h2>login first!!!\n</h2>";
    echo"<a href='login.html'>Login here!</a>";
    die;
}

$clientname=$_SESSION['clientname'];
$clientid=$_SESSION['clientid'];



$id=$_GET['id'];

include_once '../shared/connection.php';


$cmd="insert into orders(client_id,client_name,product_id) values('$clientid','$clientname','$id')";
$sql_status=mysqli_query($conn,$cmd);

if($sql_status) {
    echo"added to cart successfully";
    header("location:view_cart.php");
    
}
else{
    "fail to add in cart";
}
?>