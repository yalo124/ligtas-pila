<?php
header('Content-Type: application/json');

//for connect to the database and change status on database
$host = "localhost";
$username = "root";
$password="";
$dbname = "ncr";
$port=3307;

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if(!isset($_POST["id"]) || !isset($_POST["status"])){
    echo json_encode(["success" => false]);
    exit();
}

$id = $_POST["id"];
$status = $_POST["status"];

$allowed = ["Pending", "Processing", "Completed"];
if(!in_array($status, $allowed)){
    echo json_encode(["success" => false, "error" => "Invalid status"]);
    exit();
}

$sql = "UPDATE `ligtas_pila_db` SET `Status` = ? WHERE `Number_ID` = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "si", $status, $id);
mysqli_stmt_execute($stmt);

echo json_encode(["success" => true]);

mysqli_stmt_close($stmt);
mysqli_close($conn);


