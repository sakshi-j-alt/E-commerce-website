<?php
/*create table with uname, pass, email
create sql connection with php and validation 
check the uname is already exist in user table or not
insert the username , pass and email*/

$uname=$_POST['username'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$email=$_POST['email'];


include_once '../shared/connection.php';      //this is syntax of calling function fron other folder

$sql_result= mysqli_query($conn, "select * from user where username='$uname' ");
$total_rows=mysqli_num_rows($sql_result);
if($total_rows>0) {
    echo"<h3>user name already taken</h3>";
    die;
}

$cmd="insert into user (username,password, email) values('$uname','$pass1','$email')";
$query_status=mysqli_query($conn, $cmd);

if($query_status) {
    echo"Registraton succeed\n";
    echo"<a href='login.html'>Go to the login page!</a>";
}
else{
    "registration failed";
}
?>"