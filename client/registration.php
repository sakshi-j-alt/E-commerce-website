<?php
/*create table with uname, pass, email
create sql connection with php and validation 
check the uname is already exist in user table or not
insert the username , pass and email*/

$cname=$_POST['clientname'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$mob_no=$_POST['mob_no'];
$address=$_POST['address'];


include_once '../shared/connection.php';      //this is syntax of calling function fron other folder

$sql_result= mysqli_query($conn, "select * from client where user_name='$cname' ");
$total_rows=mysqli_num_rows($sql_result);
if($total_rows>0) {
    echo"<h3>user name already taken</h3>";
    die;
}

$cmd="insert into client (user_name,password, mobile_no,address) values('$cname','$pass1','$mob_no','$address')";
$query_status=mysqli_query($conn, $cmd);

if($query_status) {
    echo("registraton succeed \n");
    echo"<a href='login.html'>Login here!</a>";
}
else{
    "registration failed";
}
?>"