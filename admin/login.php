<?php
session_start();
$_SESSION['loginadm']=false;

$aname=$_POST['admname'];
$password=$_POST['password'];

include_once '../shared/connection.php' ;

$sql_result=mysqli_query($conn,"select * from admin where admin_name='$aname' and password='$password'" );
$total_row=mysqli_num_rows($sql_result);

if($total_row==0) {
    echo"<h3>connection failed register first</h3>"; 
    die;
}

$row=mysqli_fetch_assoc($sql_result);

echo"login succeed";
$_SESSION['loginadm']=true;
$_SESSION['admname']=$row['admin_name'];
$_SESSION['admid']=$row['admin_id'];

header('location:view.php');


?>