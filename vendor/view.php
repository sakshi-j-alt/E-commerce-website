

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
                width: 350px;
                height: 450px;
                border: 2px solid #c6e3de;
                display: inline-block;
                padding: 25px;
                margin-top: 20px;
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
            .del{
                background-color:brown;
                padding: 5px;
                border-radius: 5px 8px;
                border: none;
                color: white;
                cursor: pointer;
                justify-content: space-around;
                margin-top: 10px;
            }
            h3{
                font-family: 'IBM Plex Serif', serif;
                font-family: 'Josefin Sans', sans-serif;
                font-size: 25px;
                margin-bottom: 0;

            }
        </style>
    </head>
    <body>

    </body>
</html>

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
include "menu.html";
include_once '../shared/connection.php';
$cmd="select * from products";

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
    <div class='a'>
        <div class='product'>
            <div class='name'>$name</div>
            <img src='$impath'>
            <div class='price'>$price</div>
            <div class='details'>$details</div>
            
            <div class='action'>
                <a href='delete_pdt.php?id=$id'>
                    <button class='del'>Delete</button>
                </a>
            </div>
        </div>
    </div>
    ";
}
?>