<?php

// Get a connection for the database
include_once '../includes/db_connect.php';

/*
 *      $Corr_Number = $row['Corr_Number'];
        $Case_ID=$row['Case_ID'];
        $First_Name=$row['First_Name'];
        $Last_Name=$row['Last_Name'];
        $Address=$row['Address'];
        $County=$row['County'];
        $Email=$row['Email'];
        $Phone_No=$row['Phone_No'];
        $Type=$row['Type'];
*/

// Escape user inputs for security
$Case_ID = mysqli_escape_string($conn, $_POST['Case_ID']);
$First_Name = mysqli_escape_string($conn, $_POST['First_Name']);
$Last_Name = mysqli_escape_string($conn, $_POST['Last_Name']);
$Address = mysqli_escape_string($conn, $_POST['Address']);
$County = mysqli_escape_string($conn, $_POST['County']);
$Email = mysqli_escape_string($conn, $_POST['Email']);
$Phone_No = mysqli_escape_string($conn, $_POST['Phone_No']);
$Type = mysqli_escape_string($conn, $_POST['Type']);

// Attempt insert query execution
$sql = "INSERT INTO LITIGATION_CORRESPONDENT (Case_ID,First_Name, Last_Name, Address,County,Email,Phone_No,Type) 
        VALUES ('$Case_ID','$First_Name', '$Last_Name', '$Address', '$County','$Email','$Phone_No','$Type')";

if(mysqli_query($conn, $sql)){
    ?>
    The record for Case # <?php echo $Case_ID?> has been added
    <?php

    //Change the .php url below to display client records page
    header("refresh:1, url=read_litigation.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>