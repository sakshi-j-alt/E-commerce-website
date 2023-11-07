<?php
session_start();
$_SESSION['login']=false;

$uname=$_POST['username'];
$password=$_POST['password'];

include_once '../shared/connection.php' ;

$sql_result=mysqli_query($conn,"select * from user where username='$uname' and password='$password'" );
$total_row=mysqli_num_rows($sql_result);

if($total_row==0) {
    echo"<h3>connection failed </h3>"; 
    echo"<a href='registration.html'>Register here!</a>";
    die;
}

$row=mysqli_fetch_assoc($sql_result);

echo"login succeed";
$_SESSION['login']=true;
$_SESSION['username']=$row['username'];
$_SESSION['userid']=$row['user_id'];

header('location:upload.php');


?>