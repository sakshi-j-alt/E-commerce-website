
<html>
    <head>
        <style>
            .product{
               justify-content: space-between;
               font-size: 17px;
            }
            
        </style>
    </head>
    <body>

    </body>
</html>

<?php
session_start();
if (!isset($_SESSION['loginadm'])) {
    echo"<h2>login first!!!\n</h2>";
    echo"<a href='login.html'>Login here!</a>";
    die;
}
$aname=$_SESSION['admname'];
$admid=$_SESSION['admid'];

echo"<h3>welcome $aname. Your UserId is $admid. </h3>";



include"menu.html";
include_once '../shared/connection.php';
$cmd="select * from cart join orders ON cart.product_id=orders.product_id  ";

$sql_result=mysqli_query($conn,$cmd);



while($row=mysqli_fetch_assoc($sql_result)) {            
    // print_r($row);
    // echo"<br>";

    $id=$row['product_id'];
    $ordered_date=$row['ordered_date'];
    $cname=$row['client_name'];
    $cid=$row['client_id'];
    $oid=$row['order_id'];

    echo"
    <div class='product'>
        <div class='oid'>Ordered Id: $oid</div>      
        <div class='pid'> <a href='order.php?'>Product Id: $id</a> </div>
        <div class='cid'>Client Id: $cid</div>
        <div class='pname'>Client name: $cname</div>
        <div class='date'>Ordered date: $ordered_date</div>
        <div>------------------------------------</div>
        
       
    </div>
    ";
}
?>