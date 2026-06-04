<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <title>Document</title>
</head>
<body>

<div class="logo">
    <img src="images/logo.png" alt="logo" class="logoimg">
    <div class="logo-text">
        <span class="LIGTAS">LIGTAS</span><span class="PILA">-PILA</span>
        <br>
        <center><span class="text-bottom">LOGIC-BASED QUEUE ELIMINATION</span></center>
    </div>
</div>
<div class="fullcontainer">
<div class="container">
    <!--columns of name of data-->
    <table>
        <tr>
            <th>Status</th>
            <th>Number ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Suffix</th>
            <th>Region</th>
            <th>City</th>
            <th>District</th>
            <th>Barangay</th>
            <th>Home Address</th>
            <th>Number</th>
            <th>Email</th>
            <th>Income</th>
            <th>Condition</th>
            <th>Days Unemployed</th>
            <th>Other Days Unemployed</th>
            <th>Transport Worker</th>
            <th>Disaster Type</th>
            <th>People in household</th>
            <th>Disaster Needs</th>
            <th>Senior Status</th>
            <th>Senior Medical Conditions</th>
            <th>Senior Other Medical Condition</th>
            <th>Senior Assistance Needed</th>
            <th>Senior Other Assistance Needed</th>
            <th>PWD TYPE</th>
            <th>PWD TYPE OTHER</th>
            <th>PWD Assistance</th>
            <th>PWD Assistance Other</th>
            <th>Medical Assistance</th>
            <th>Medical Image</th>
            <th>Medical Equipment</th>
            <th>Medical Equipment Other</th>
            <th>Educational Assistance</th>
            <th>Education_Image</th>
            <th>Student Loans</th>
            <th>Death Certificate</th>
            <th>Burial Assistance</th>
            <th>Valid ID</th>
            <th>ID Image</th>
        </tr>

        <!--connecting to php sql database-->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "ncr", 3307);

        $sql = "SELECT * FROM ligtas_pila_db";
        $result=$conn-> query($sql);

        if($result->num_rows>0){
            while($row = $result -> fetch_assoc()){

                //this is for updating the application status
                //the word in the $row should match the column data name in the database 
                echo "<tr> 
                        <td>
                            <select class='status-select' data-id='". $row['Number_ID'] . "'>
                                <option value='Pending'" . ($row['Status'] == 'Pending' ? ' selected' : '') . ">Pending</option>
                                <option value='Processing'" . ($row['Status'] == 'Processing' ? ' selected' : '') . ">Processing</option>
                                <option value='Completed'" . ($row['Status'] == 'Completed' ? ' selected' : '') . ">Completed</option>
                            </select>
                        </td>
                    
                        <td>". $row["Number_ID"] ."</td>
                        <td>". $row["Last_Name"] ."</td>
                        <td>". $row["First_Name"] ."</td>
                        <td>". $row["Middle_Name"] ."</td>
                        <td>". $row["Suffix"] ."</td>
                        <td>". $row["Region"] ."</td>
                        <td>". $row["City"] ."</td>
                        <td>". $row["District"] ."</td>
                        <td>". $row["Barangay"] ."</td>
                        <td>". $row["Home_Address"] ."</td>
                        <td>". $row["Number"] ."</td>
                        <td>". $row["Email"] ."</td>
                        <td>". $row["Income"] ."</td>
                        <td>". $row["Condition"] ."</td>
                        <td>". $row["Days Unemployed"] ."</td>
                        <td>". $row["Days Unemployed#2"] ."</td>
                        <td>". $row["Transport Worker"] ."</td>
                        <td>". $row["Disaster Type"] ."</td>
                        <td>". $row["Members_(Disaster_Affected)"] ."</td>
                        <td>". $row["Disaster Needs"] ."</td>
                        <td>". $row["Senior_Status"] ."</td>
                        <td>". $row["Senior_Medical_Conditions"] ."</td>
                        <td>". $row["Senior Medical"] ."</td>
                        <td>". $row["Senior_Assistance_Needed"] ."</td>
                        <td>". $row["Senior Assistance"] ."</td>
                        <td>". $row["PWD TYPE"] ."</td>
                        <td>". $row["PWD TYPE OTHER"] ."</td>
                        <td>". $row["PWD Assistance"] ."</td>
                        <td>". $row["PWD Assistance Other"] ."</td>
                        <td>". $row["Medical Assistance"] ."</td>
                        <td>". $row["Medical_Image"] ."</td>
                        <td>". $row["Medical Equipment"] ."</td>
                        <td>". $row["Medical Equipment Other"] ."</td>
                        <td>". $row["Educational Assistance"] ."</td>
                        <td>". $row["Education_Image"] ."</td>
                        <td>". $row["Student Loans"] ."</td>
                        <td>". $row["Death Certificate"] ."</td>
                        <td>". $row["Burial Assistance"] ."</td>
                        <td>". $row["Valid_ID"] ."</td>
                        <td>". $row["Id_Image"] ."</td>
                    </tr>";
            }
            echo "</table>";
        }
        else {
            "0 result";
        } 
        $conn ->close();
        ?>

        
    </table>
</div>
</div>
<script src="admin-status.js"></script>   
</body>
</html>