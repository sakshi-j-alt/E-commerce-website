
<html>
    <head>
        <style>
           .a{  
                background-color: #fef1e0;
                display: flex;
                justify-content: center;
                height: 100vh;
                text-align: center;
                
            }
            
            .product{
                width: 300px;
                height: 350px;
                border: 2px solid #c6e3de;
                display: inline-block;
                padding: 20px;
                margin: 20px;
                border-radius: 10px;
                background-color: rgb(150,200,200);
            }

            img{
                border: 1.5px solid bisque;
                margin: 5px;
                border-radius: 10px;
                width: 70%;
                box-shadow: 5px 5px 5px #C7BCA1;
            }
            .name{
                font-family: 'PT Serif', serif;
                justify-content: space-around;
                font-size: 30px;
            }
            h3{
                font-family: 'IBM Plex Serif', serif;
                font-family: 'Josefin Sans', sans-serif;
                font-size: 25px;
                margin-bottom: 0;

            }
            .remove{
                background-color:yellowgreen;
                padding: 5px;
                border-radius: 5px 8px;
                border: none;
                color: white;
                cursor: pointer;
                justify-content: space-around;
                margin-top: 10px;
            }
            .order{
                background-color:brown;
                padding: 5px;
                border-radius: 5px 8px;
                border: none;
                color: white;
                cursor: pointer;
                justify-content: space-around;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>

    </body>
</html>

<?php
session_start();
if (!isset($_SESSION['loginn'])) {
    echo"<h2>login first!!!\n</h2>";
    echo"<a href='login.html'>Login here!</a>";
    die;
}

include"menu.html";
$clientname=$_SESSION['clientname'];
$clientid=$_SESSION['clientid'];
echo"<h3>Hi $clientname this is your cart!!</h3>";




include_once '../shared/connection.php';
$cmd="select * from cart join products ON cart.product_id=products.id where client_id='$clientid'";

$sql_result=mysqli_query($conn,$cmd);

while($row=mysqli_fetch_assoc($sql_result)) {            
    // print_r($row);
    // echo"<br>";

    $id=$row['id'];
    $name=$row['name'];
    $price=$row['price'];
    $impath=$row['impath'];
    $details=$row['details'];
    $cart_id=$row['cart_id'];
    $modified_date=$row['modified_at'];

    echo"
    <div class='a'>
    <div class='product'>
        <div class='name'>$name</div>
        <img src='$impath'>
        <div class='price'>Rs.$price</div>
        <div class='details'>$details</div>
        <div class='date'>Modified date: $modified_date</div>
        
        <div class='action'>
            <a href='delcart.php?cart_id=$cart_id'>
                <button class='remove'>remove from cart</button>
            </a>
            <a href='order.php?id=$id'>
                <button class='order'>Order</button>
            </a>
        </div>
    </div>
    </div>
    ";
}
?>