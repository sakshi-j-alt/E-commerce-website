<?php
// print_r($_POST);
// echo"<br>";
// print_r($_FILES)
//print_r($_FILES['pdt_image']['name']);
 
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

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

$actual_name=$_FILES['pdt_image']['name'];
$file_name="../images/$actual_name";
move_uploaded_file($_FILES['pdt_image']['tmp_name'],$file_name);

include_once '../shared/connection.php' ;
$cmd="insert into products(name,price,details,impath) values('$name','$price','$details','$file_name')";

$query_status=mysqli_query($conn,$cmd);


if($query_status==true) 
{
    echo"product uploaded successfully \n";
    echo"<a href='view.php'>View product</a>";
}
else{
    echo"failed upload. try again:)";
}
?>