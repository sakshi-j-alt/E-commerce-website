
    
<html>
<head>
<style>
        .product{
            width: 300px;
            height: 300px;
            border: 2px solid gray;
            display: inline-block;
            padding: 20px;
            margin: 10px;
        }
        img{
            width: 70%;
        }
        .name{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            justify-content: space-around;
            font-size: 20px;
        }
        .remove{
            background-color:yellowgreen;
            padding: 5px;
            border-radius: 5px 8px;
            border: none;
            color: white;
            cursor: pointer;
            justify-content: space-around;
        }
        .order{
            background-color:brown;
            padding: 5px;
            border-radius: 5px 8px;
            border: none;
            color: white;
            cursor: pointer;
            justify-content: space-around;
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




include"menu.html";
include_once '../shared/connection.php';
$cmd="select * from orders join products ON orders.product_id=products.id";

$sql_result=mysqli_query($conn,$cmd);


while($row=mysqli_fetch_assoc($sql_result)) {            
// print_r($row);
// echo"<br>";



$id=$row['id'];
$name=$row['name'];
$price=$row['price'];
$impath=$row['impath'];
$details=$row['details'];

echo"
<div class='product'>
<div class='name'>$name</div>
<img src='$impath'>
<div class='price'>Rs.$price</div>
<div class='details'>$details</div>

</div>
";
}

?>