<?php
// connect to database
$host = 'localhost';
$db = 'remi_education';
$user = 'root';
$password = '';
$con=mysqli_connect("localhost","root", "" ,"remi_education","3306");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$pdo = new PDO($dsn, $user, $password );    
?>