<?php


// Get a connection for the database
include_once '../includes/db_connect.php';


// Escape user inputs for security
$Office_ID = mysqli_escape_string($conn, $_POST['Office_ID']);
$Client_First_Name = mysqli_escape_string($conn, $_POST['Client_First_Name']);
$Client_Last_Name = mysqli_escape_string($conn, $_POST['Client_Last_Name']);
$Client_Email = mysqli_escape_string($conn, $_POST['Client_Email']);
$Client_Address = mysqli_escape_string($conn, $_POST['Client_Address']);
$County = mysqli_escape_string($conn, $_POST['County']);
$Client_Phone_No = mysqli_escape_string($conn, $_POST['Client_Phone_No']);
$Client_Account_Name = mysqli_escape_string($conn, $_POST['Client_Account_Name']);
$Client_BIC_No = mysqli_escape_string($conn, $_POST['Client_BIC_No']);
$Client_IBAN_No= mysqli_escape_string($conn, $_POST['Client_IBAN_No']);


// Attempt insert query execution
$sql = "INSERT INTO CLIENT (Office_ID,Client_First_Name, Client_Last_Name, Client_Email, Client_Address, County, Client_Phone_No,Client_Account_Name, Client_BIC_No, Client_IBAN_No) 
        VALUES ($Office_ID,'$Client_First_Name', '$Client_Last_Name', '$Client_Email', '$Client_Address', '$County', '$Client_Phone_No','$Client_Account_Name', '$Client_BIC_No', '$Client_IBAN_No')";
if(mysqli_query($conn, $sql)){
    	?>
	The record for <?php echo $Client_First_Name,$Client_Last_Name?>  has been added
	<?php

  //Change the .php url below to display client records page
	header("refresh:1, url=read_client.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
