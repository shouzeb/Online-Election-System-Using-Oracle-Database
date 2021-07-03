<?php 
$servername="localhost";
$username='root';
$password='';
$db='testdb';

$con=new mysqli($servername,$username,$password,$db);
if($con->connect_error)
{die("connection failed".connect_error);
}
echo("welcome");
?>