<?php
header('Content-Type: application/json');
error_reporting(0); 
ini_set('display_errors', 0);

//database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ncr";
$port = 3307;

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    echo json_encode(["found" => false, "error" => "Database connection failed: " . mysqli_connect_error()]);
    exit();
}

if (!isset($_POST["id"])) {
    echo json_encode(["found" => false, "error" => "No ID provided"]);
    exit();
}

$id = $_POST["id"];

$sql = "SELECT * FROM `ligtas_pila_db` WHERE Number_ID = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo json_encode(["found" => false, "error" => mysqli_error($conn)]);
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo json_encode(["found" => false]);
    exit();
}

$income = $row["Income"];
$B = ($income !== "E");

$kondition = $row["Condition"]; 
$konditionArray = explode(", ", $kondition);

//variables for the logical equivalence
$C = in_array("unemployed", $konditionArray);
$D = in_array("Transport Worker", $konditionArray);
$E = in_array("Disaster Affected", $konditionArray);
$F = in_array("Senior Citizen", $konditionArray);
$G = in_array("PWD", $konditionArray);
$H = in_array("Medical Assistance", $konditionArray);
$I = in_array("Educational Assistance", $konditionArray);
$J = in_array("Burial Assistance", $konditionArray);

$aid = [];
$conditions = [];

//distribution law
if($B && ($C||$D||$E||$F||$G||$H||$I||$J)){

    if($C) $conditions[] = "Unemployed";
    if($D) $conditions[] = "Transport Worker";
    if($E) $conditions[] = "Disaster Affected";
    if($F) $conditions[] = "Senior Citizen";
    if($G) $conditions[] = "PWD";
    if($H) $conditions[] = "Medical Assistance";
    if($I) $conditions[] = "Educational Assistance";
    if($J) $conditions[] = "Burial Assistance";

    //responses
    if($B && $C) $aid[] = "Thank you for registering! Your information has been successfully saved. We have endorsed your details to your local barangay hall for potential placement under the P.E.S.O. or T.U.P.A.D. programs. Please wait for a coordinator to contact you. Keep your contact number active! — Ligtas-Pila";
    if($B && $D) $aid[] = "Thank you for registering! Your details have been securely recorded. To process your financial assistance, please provide a QR code from your preferred digital bank (e.g., GCash, Maya). Our finance team will process your remittance immediately. — Ligtas-Pila";
    if($B && $E) $aid[] = "Registration Successful. Your details have been recorded by our Emergency Response Team. A field coordinator will contact you or visit your evacuation center shortly. Stay safe. — Ligtas-Pila";
    if($B && $F) $aid[] = "Registration Confirmed. Your details have been saved under our Senior Citizen Care Program. You do not need to line up. A barangay health worker will contact you or visit your location directly. — Ligtas-Pila";
    if($B && $G) $aid[] = "Registration Confirmed. Your details have been saved under our PWD Assistance Program. A coordinator will contact you to schedule your appointment at an accessible local center. You do not need to line up. — Ligtas-Pila";
    if($B && $H) $aid[] = "Registration Confirmed. Your details have been saved under our Medical Assistance Program. A Digital Guarantee Letter will be sent directly to our partner hospitals to cover your medical bills. — Ligtas-Pila";
    if($B && $I) $aid[] = "Registration Confirmed. Your details have been saved under our Educational Assistance Program. An automated bank transfer or e-wallet credit will be sent for tuition and school supplies. — Ligtas-Pila";
    if($B && $J) $aid[] = "Registration Confirmed. Your details have been saved under our Burial Assistance Program. A digital fund transfer will be processed for your funeral and burial service provider. — Ligtas-Pila";
}


$response = [];

if($row["Status"] === "Completed") {
    if($B && ($C||$D||$E||$F||$G||$H||$I||$J)) {
        $response = $aid;
    } else {
        $response = ["You are not eligible"];
    }
} else if($row["Status"] === "Processing") {
    $response = ["Your application is still being processed. Current status: " . $row["Status"] . ". Please check back later."];
} else{
    $response = ["Your application has been submitted. Please wait for any changes."];
}

echo json_encode([
    "found" => true,
    "name" => $row["First_Name"] . " " . $row["Last_Name"],
    "status" => $row["Status"],
    "condition" => $conditions,
    "response" => $response
]);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>