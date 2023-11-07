<?php 

$conn= new mysqli("localhost","root","","acme_sept");
if($conn->connect_error) {
    echo"connection failed\n";
    die;
}
//echo"connection succeed\n";   //we can use this sentance, depends on us.

?>