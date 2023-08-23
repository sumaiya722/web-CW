<?php
$url='localhost';
$username="root";
$password="";
$dbname="school";
$conn=mysqli_connect($url,$username,$password,$dbname);
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
?>