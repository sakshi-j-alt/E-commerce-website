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

$username=$_SESSION['username'];
echo"<hr><h3>Welcome $username!!</h3></hr>";
echo"<hr><h4> Here you can add your products on shop zee!</h4></hr>";



?>

<html>
    <head>
        <style>
             .a{
                background-image:url(registration.webp);
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center; 
                height: 100vh;
             } 
            input{
                display: block;
                margin: 10px;
                padding: 5px;
                border-radius: 22%;
            }
            form{
                width: 390px;
                height: 430px;
                background-color: peachpuff;
                display: grid;
                padding: 15px;
                position: absolute;
                right: 200px;
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
        <div class="a">
            <form action="upload_pdt.php" method="post" enctype="multipart/form-data" >   <!--enctype used for image-->
                <input type="text" name="name" placeholder="enter name">
                <input type="text" name="price" placeholder="enter price">
                <textarea name="details" cols="20" rows="10" id=" " placeholder="enter details"></textarea>
                <input type="file" name="pdt_image" accept=".jpg">
                <input style="background-color:green; color:aliceblue;text-align:center;" value="submit" type="submit">
                <div style="font-size: 15px; margin: 10px; text-align:center">Already uploaded? <a href="view.php">View here!</a></div>
                
            </form>
        </div>
    </body>
</html>