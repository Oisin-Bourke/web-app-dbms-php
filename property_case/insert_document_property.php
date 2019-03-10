<?php


// Get a connection for the database
include_once '../includes/db_connect.php';


// Escape user inputs for security
$Case_ID = mysqli_escape_string($conn, $_POST['Case_ID']);
$Document_Type = mysqli_escape_string($conn, $_POST['Document_Type']);
$Document_Notes = mysqli_escape_string($conn, $_POST['Document_Notes']);
$Document_Format = mysqli_escape_string($conn, $_POST['Document_Format']);

// Attempt insert query execution
$sql = "INSERT INTO PROPERTY_DOCUMENT (Case_ID,Document_Type, Document_Notes, Document_Format) 
        VALUES ('$Case_ID','$Document_Type', '$Document_Notes', '$Document_Format')";

if(mysqli_query($conn, $sql)){
    ?>
    The record for Case # <?php echo $Case_ID?> has been added
    <?php

    //Change the .php url below to display client records page
    header("refresh:1, url=read_property.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>