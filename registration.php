<?php
//variables
$lastname=$_POST["lastname"] ?? 'N/A';
$fstname=$_POST["fstname"]?? 'N/A';
$midname=$_POST["midname"]?? 'N/A';
$suffix=$_POST["suffix"]?? 'N/A';
$region=$_POST["region"]?? 'N/A';
$city=$_POST["city"]?? 'N/A';
$district=$_POST["district"]?? 'N/A';
$barangay=$_POST["barangay"]?? 'N/A';
$address=$_POST["address"]?? 'N/A';
$number=$_POST["number"]?? 'N/A';
$email=$_POST["email"]?? 'N/A';
$income=$_POST["income"]?? 'N/A';
$kondition=isset($_POST["kondition"]) 
            ? implode(", ", (array)$_POST["kondition"]) 
            : "N/A";
$select_unemployment = $_POST["select-unemploy"] ?? 'N/A';
$type_unemployment = $_POST["unemploy-people"] ?? 'N/A';
$transport_worker = isset($_POST["transport-assist"]) ? $_POST["transport-assist"] : "N/A";
$disastertype = $_POST["disastertype"] ?? 'N/A';
$textdisasterneeds = $_POST["textdisasterneeds"] ?? 'N/A';
$members = $_POST["members"] ?? 'N/A';
$status = isset($_POST["status"]) ? $_POST["status"] : "N/A";
$Medical_Conditions = isset($_POST["Medical_Conditions"]) 
                      ? implode(", ", (array)$_POST["Medical_Conditions"]) 
                      : "N/A";
$seniormedical = $_POST["seniormedical"] ?? 'N/A';
$needed = isset($_POST["needed"]) 
          ? implode(", ", (array)$_POST["needed"]) 
          : "N/A";
$seniorassistance = $_POST["seniorassistance"] ?? 'N/A';
$pwd = $_POST["pwithd"] ?? 'N/A';
$pwd_type = $_POST["pwdtype"] ?? 'N/A';
$pwd_type_other = $_POST["pwdtypeother"] ?? 'N/A';
$pwdassistance = isset($_POST["optionsssistance"]) 
        ? implode(", ", (array)$_POST["optionsssistance"]) 
        : "N/A";
$medicalassistance = $_POST["medicalhelp"] ?? 'N/A';
$medicalequipment = $_POST["equip"] ?? 'N/A';
$medicalequipmentother = isset($_POST["equiptypeother"]) ? $_POST["equiptypeother"] : "N/A";
$educationassistance = $_POST["academic"] ?? 'N/A';
$studentloans = $_POST["money"] ?? 'N/A';
$burial = isset($_POST["burial_assistance"]) 
                      ? implode(", ", (array)$_POST["burial_assistance"]) 
                      : "N/A";
$id = $_POST["id"];
$formstatus = "Pending";

//connection to the database 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ncr";
$port = 3307;

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// medical bill_image 
$filePath_bill = "N/A";
if(!empty($_FILES["bill_image"]["name"])){
    if($_FILES["bill_image"]["error"] !== UPLOAD_ERR_OK){
        exit("Bill image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["bill_image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["bill_image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_bill = $_FILES["bill_image"]["name"];
    $uploadDir = __DIR__ . "/uploads/medical/bill/";
    $destination = $uploadDir . $filename_bill;
    $i = 1;
    while(file_exists($destination)){
        $filename_bill = $base . "($i)." . $pathinfo["extension"];
        $destination = $uploadDir . $filename_bill;
        $i++;
    }
    if(!move_uploaded_file($_FILES["bill_image"]["tmp_name"], $destination)){
        exit("Cant move uploaded file");
    }
    $filePath_bill = "uploads/medical/bill/" . $filename_bill;
}

// medicine_image
$filePath_medicine = "N/A";
if(!empty($_FILES["medicine_image"]["name"])){
    if($_FILES["medicine_image"]["error"] !== UPLOAD_ERR_OK){
        exit("Medicine image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["medicine_image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["medicine_image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_medicine = $_FILES["medicine_image"]["name"];
    $uploadDir = __DIR__ . "/uploads/medical/medicine/";
    $destination = $uploadDir . $filename_medicine;
    $i = 1;
    while(file_exists($destination)){
        $filename_medicine = $base . "($i)." . $pathinfo["extension"];
        $destination = $uploadDir . $filename_medicine;
        $i++;
    }
    if(!move_uploaded_file($_FILES["medicine_image"]["tmp_name"], $destination)){
        exit("Cant move uploaded file");
    }
    $filePath_medicine = "uploads/medical/medicine/" . $filename_medicine;
}

// cash_image
$filePath_cash = "N/A";
if(!empty($_FILES["cash_image"]["name"])){
    if($_FILES["cash_image"]["error"] !== UPLOAD_ERR_OK){
        exit("Cash image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["cash_image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["cash_image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_cash = $_FILES["cash_image"]["name"];
    $uploadDir = __DIR__ . "/uploads/medical/cash/";
    $destination = $uploadDir . $filename_cash;
    $i = 1;
    while(file_exists($destination)){
        $filename_cash = $base . "($i)." . $pathinfo["extension"];
        $destination = $uploadDir . $filename_cash;
        $i++;
    }
    if(!move_uploaded_file($_FILES["cash_image"]["tmp_name"], $destination)){
        exit("Cant move uploaded file");
    }
    $filePath_cash = "uploads/medical/cash/" . $filename_cash;
}

// equipment_image 
$filePath_equipment = "N/A";
if(!empty($_FILES["equipment_image"]["name"])){
    if($_FILES["equipment_image"]["error"] !== UPLOAD_ERR_OK){
        exit("Equipment image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["equipment_image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["equipment_image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_equipment = $_FILES["equipment_image"]["name"];
    $uploadDir = __DIR__ . "/uploads/medical/equipment prescription/";
    $destination = $uploadDir . $filename_equipment;
    $i = 1;
    while(file_exists($destination)){
        $filename_equipment = $base . "($i)." . $pathinfo["extension"];
        $destination = $uploadDir . $filename_equipment;
        $i++;
    }
    if(!move_uploaded_file($_FILES["equipment_image"]["tmp_name"], $destination)){
        exit("Cant move uploaded file");
    }
    $filePath_equipment = "uploads/medical/equipment prescription/" . $filename_equipment;
}

// combine all medical images into one
$filePath_image = $filePath_bill !== "N/A" ? $filePath_bill :
                 ($filePath_medicine !== "N/A" ? $filePath_medicine :
                 ($filePath_cash !== "N/A" ? $filePath_cash :
                 ($filePath_equipment !== "N/A" ? $filePath_equipment : "N/A")));

// tuition_image
$filePath_tuition = "N/A";
if(!empty($_FILES["tuition_image"]["name"])){
    if($_FILES["tuition_image"]["error"] !== UPLOAD_ERR_OK){
        exit("Tuition image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["tuition_image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["tuition_image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_tuition = $_FILES["tuition_image"]["name"];
    $uploadDir = __DIR__ . "/uploads/education/";
    $destination = $uploadDir . $filename_tuition;
    $i = 1;
    while(file_exists($destination)){
        $filename_tuition = $base . "($i)." . $pathinfo["extension"];
        $destination = $uploadDir . $filename_tuition;
        $i++;
    }
    if(!move_uploaded_file($_FILES["tuition_image"]["tmp_name"], $destination)){
        exit("Cant move uploaded file");
    }
    $filePath_tuition = "uploads/education/" . $filename_tuition;
}

// supplies_image 
$filePath_supplies = "N/A";
if(!empty($_FILES["supplies_image"]["name"])){
    if($_FILES["supplies_image"]["error"] !== UPLOAD_ERR_OK){
        exit("Supplies image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["supplies_image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["supplies_image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_supplies = $_FILES["supplies_image"]["name"];
    $uploadDir = __DIR__ . "/uploads/education/";
    $destination = $uploadDir . $filename_supplies;
    $i = 1;
    while(file_exists($destination)){
        $filename_supplies = $base . "($i)." . $pathinfo["extension"];
        $destination = $uploadDir . $filename_supplies;
        $i++;
    }
    if(!move_uploaded_file($_FILES["supplies_image"]["tmp_name"], $destination)){
        exit("Cant move uploaded file");
    }
    $filePath_supplies = "uploads/education/" . $filename_supplies;
}

// combine education images into one
$filePath_emage = $filePath_tuition !== "N/A" ? $filePath_tuition :
                 ($filePath_supplies !== "N/A" ? $filePath_supplies : "N/A");

// (valid ID) 
$filePath_eamage = "N/A";
if(!empty($_FILES["eamage"]["name"])){
    if($_FILES["eamage"]["error"] !== UPLOAD_ERR_OK){
        exit("ID image upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["eamage"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["eamage"]["name"]);
    $base = $pathinfo["filename"];
    $filename_eamage = $_FILES["eamage"]["name"];
    $uploadDir = __DIR__ . "/uploads/id/";
    $destination_eamage = $uploadDir . $filename_eamage;
    $i = 1;
    while(file_exists($destination_eamage)){
        $filename_eamage = $base . "($i)." . $pathinfo["extension"];
        $destination_eamage = $uploadDir . $filename_eamage;
        $i++;
    }
    if(!move_uploaded_file($_FILES["eamage"]["tmp_name"], $destination_eamage)){
        exit("Cant move uploaded file");
    }
    $filePath_eamage = "uploads/id/" . $filename_eamage;
}

//certificate-image
$filePath_death = "N/A";
if(!empty($_FILES["certificate-image"]["name"])){
    if($_FILES["certificate-image"]["error"] !== UPLOAD_ERR_OK){
        exit("Death certificate upload error");
    }
    $mime_types = ["image/png", "image/jpeg"];
    if(!in_array($_FILES["certificate-image"]["type"], $mime_types)){
        exit("Invalid file type");
    }
    $pathinfo = pathinfo($_FILES["certificate-image"]["name"]);
    $base = $pathinfo["filename"];
    $filename_certificate_image = $_FILES["certificate-image"]["name"];
    $uploadDir = __DIR__ . "/uploads/burial/";
    $destination_certificate_image = $uploadDir . $filename_certificate_image;
    $i = 1;
    while(file_exists($destination_certificate_image)){
        $filename_certificate_image = $base . "($i)." . $pathinfo["extension"];
        $destination_certificate_image = $uploadDir . $filename_certificate_image;
        $i++;
    }
    if(!move_uploaded_file($_FILES["certificate-image"]["tmp_name"], $destination_certificate_image)){
        exit("Cant move uploaded file");
    }
    $filePath_death = "uploads/burial/" . $filename_certificate_image;
}

//inserting the data received to the database
if(mysqli_connect_errno()){
    die("connect error: " . mysqli_connect_errno());
}

$sql = "INSERT INTO `ligtas_pila_db`(`Last_Name`, `First_Name`, `Middle_Name`, `Suffix`, `Region`, `City`, `District`, `Barangay`, `Home_Address`, `Number`, `Email`, `Income`, `Condition`, `Days Unemployed`, `Days Unemployed#2`, `Transport Worker`, `Disaster Type`, `Members_(Disaster_Affected)`, `Disaster Needs`, `Senior_Status`, `Senior_Medical_Conditions`, `Senior Medical`, `Senior_Assistance_Needed`, `Senior Assistance`, `PWD TYPE`, `PWD TYPE OTHER`, `PWD Assistance`, `PWD Assistance Other`, `Medical Assistance`, `Medical_Image`, `Medical Equipment`, `Medical Equipment Other`, `Educational Assistance`, `Education_Image`, `Student Loans`, `Death Certificate`, `Burial Assistance`, `Valid_ID`, `Id_Image`, `Status`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; // "?" for the value. any value can be place if "?"

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssssssssssssssssssssssssssssss", // "s" stands for string and all of the data is in string form (VARCHAR)
    $lastname, // 1  Last_Name
    $fstname, // 2  First_Name
    $midname, // 3  Middle_Name
    $suffix, // 4  Suffix
    $region, // 5  Region
    $city, // 6  City
    $district, // 7  District
    $barangay, // 8  Barangay
    $address,// 9  Home_Address
    $number,// 10 Number
    $email,// 11 Email
    $income,// 12 Income
    $kondition,// 13 Condition
    $select_unemployment,// 14 Days Unemployed
    $type_unemployment, // 15 Days Unemployed#2
    $transport_worker,// 16 Transport Worker
    $disastertype,// 17 Disaster Type
    $members,// 18 Members_(Disaster_Affected)
    $textdisasterneeds,// 19 Disaster Needs
    $status,// 20 Senior_Status
    $Medical_Conditions,// 21 Senior_Medical_Conditions
    $seniormedical,// 22 Senior Medical
    $needed,// 23 Senior_Assistance_Needed
    $seniorassistance,// 24 Senior Assistance
    $pwd,// 25 PWD TYPE
    $pwd_type, // 26 PWD TYPE OTHER
    $pwdassistance, // 27 PWD Assistance
    $pwd_type_other, // 28 PWD Assistance Other
    $medicalassistance, // 29 Medical Assistance
    $filePath_image, // 30 Medical_Image
    $medicalequipment, // 31 Medical Equipment
    $medicalequipmentother, // 32 Medical Equipment Other
    $educationassistance,// 33 Educational Assistance
    $filePath_emage, // 34 Education_Image
    $studentloans, // 35 Student Loans
    $filePath_death, // 36 Death Certificate
    $burial, // 37 Burial Assistance
    $id, // 38 Valid_ID
    $filePath_eamage, // 39 Id_Image
    $formstatus // 40 Status
);

if(!mysqli_stmt_execute($stmt)){
    die("Execute failed: " . mysqli_stmt_error($stmt));
}

$inserted_id = mysqli_insert_id($conn);

mysqli_stmt_close($stmt);
mysqli_close($conn);

header("Location: submit.html?id=" . $inserted_id);
exit();