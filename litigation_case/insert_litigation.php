<?php


// Get a connection for the database
include_once '../includes/db_connect.php';

// LITIGATION_CASE: `Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Barrister_ID`, `Court_Date`, `Case_Date_Open`, `Case_Date_Closed`, `Case_Status`

// Escape user inputs for security
$Client_ID = mysqli_escape_string($conn, $_POST['Client_ID']);
$Solicitor_ID = mysqli_escape_string($conn, $_POST['Solicitor_ID']);
$Case_Type = mysqli_escape_string($conn, $_POST['Case_Type']);
$Section_68_Status = mysqli_escape_string($conn, $_POST['Section_68_Status']);
$Case_Notes = mysqli_escape_string($conn, $_POST['Case_Notes']);
$Barrister_ID = mysqli_escape_string($conn, $_POST['Barrister_ID']);
//$Court_Date = mysqli_escape_string($conn, $_POST['Court_Date']);
//$Case_Date_Open = mysqli_escape_string($conn, $_POST['Case_Date_Open']);
//$Case_Date_Closed = mysqli_escape_string($conn, $_POST['Case_Date_Closed']);

// Attempt insert query execution
$sql = "INSERT INTO LITIGATION_CASE (Client_ID,Solicitor_ID, Case_Type, Section_68_Status, Case_Notes, Barrister_ID) 
        VALUES ('$Client_ID','$Solicitor_ID', '$Case_Type', '$Section_68_Status', '$Case_Notes', '$Barrister_ID')";
if(mysqli_query($conn, $sql)){
    	?>
	The record for <?php echo $Client_ID?> has been added
	<?php

  //Change the .php url below to display client records page
	header("refresh:1, url=read_litigation.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
