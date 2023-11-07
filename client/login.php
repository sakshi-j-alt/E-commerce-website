<?php
session_start();
$_SESSION['loginn']=false;

$cname=$_POST['clientname'];
$password=$_POST['password'];

include_once '../shared/connection.php' ;

$sql_result=mysqli_query($conn,"select * from client where user_name='$cname' and password='$password'" );
$total_row=mysqli_num_rows($sql_result);

if($total_row==0) {
    echo"<h3>connection failed register first</h3>"; 
    die;
}

$row=mysqli_fetch_assoc($sql_result);

echo"login succeed";
$_SESSION['loginn']=true;
$_SESSION['clientname']=$row['user_name'];
$_SESSION['clientid']=$row['user_id'];

header('location:view.php');


?>