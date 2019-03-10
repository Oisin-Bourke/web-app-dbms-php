<?php


// Get a connection for the database
include_once '../includes/db_connect.php';


$Case_ID = mysqli_escape_string($conn, $_POST['Case_ID']);
$Litigation_Notes = mysqli_escape_string($conn, $_POST['Litigation_Notes']);
$Hourly_Rate = mysqli_escape_string($conn, $_POST['Hourly_Rate']);

// Attempt insert query execution
$sql = "insert into LITIGATION_CLOSED (Case_ID,Litigation_Notes,Hourly_Rate)
select '$Case_ID','$Litigation_Notes','$Hourly_Rate' 
Where not exists(select Case_ID from LITIGATION_CLOSED where Case_ID ='$Case_ID')";

/*
INSERT INTO LITIGATION_CLOSED (Case_ID,Litigation_Notes,Hourly_Rate)
VALUES ('$Case_ID','$Litigation_Notes', '$Hourly_Rate')";

*/

//$sql = "UPDATE LITIGATION_CASE set Case_Status = 'Closed' where Case_ID = '$Case_ID'";

if(mysqli_query($conn, $sql)){
    ?>
    The record for Case # <?php echo $Case_ID?> has been added
    <?php

    //Change the .php url below to display client records page
    header("refresh:1, url= http://danu6.it.nuigalway.ie/SkupinaSolicitors/SkupinaCRUD/litigation_case/close_case.php?Case_ID=$Case_ID");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>