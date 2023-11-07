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

$sql_result=mysqli_query($conn,"select * from cart where client_id='$clientid' and product_id=$id");
$row=mysqli_num_rows($sql_result);
if($row>0) {
    echo"product is already added to cart \n";
    echo"<a href='view_cart.php'>view cart</a>";
    die;
}


$cmd="insert into cart(client_id,client_name,product_id) values('$clientid','$clientname','$id')";
$sql_status=mysqli_query($conn,$cmd);

if($sql_status) {
    echo"added to cart successfully";
    header("location:view.php");
    
}
else{
    "fail to add in cart";
}
?>