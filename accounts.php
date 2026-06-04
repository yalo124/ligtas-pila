<?php
session_start(); 

//connect to database
$host = "localhost";
$username = "root";
$password="";
$dbname = "ncr";
$port=3307;

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if($conn->connect_error){
    die ("Connection failed:".$conn->connect_error);
} 

//searching username and password in database
$username = $_POST["ID"];
$password=$_POST["password"];

$sql = "SELECT * FROM `accounts` WHERE `USERNAME` = '$username' AND `PASSWORD` = '$password'";
$result=$conn->query($sql);

if($result->num_rows>0){
    
    $row=$result->fetch_assoc();
    $_SESSION["USERNAME"]=$row["USERNAME"];
    header("Location: adminpage.php");
    exit();
} else{
    die("Invalid username or password");
}