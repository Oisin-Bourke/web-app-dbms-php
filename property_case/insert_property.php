<?php

// Get a connection for the database
include_once '../includes/db_connect.php';

//PROPERTY_CASE` (`Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Property_Name`, `Property_Address`, `County`, `Date_Purchased`, `Date_Sold`,'Case_Date_Open')


// Escape user inputs for security
$Client_ID = mysqli_escape_string($conn, $_POST['Client_ID']);
$Solicitor_ID = mysqli_escape_string($conn, $_POST['Solicitor_ID']);
$Case_Type = mysqli_escape_string($conn, $_POST['Case_Type']);
$Section_68_Status = mysqli_escape_string($conn, $_POST['Section_68_Status']);
$Case_Notes = mysqli_escape_string($conn, $_POST['Case_Notes']);
$Property_Name = mysqli_escape_string($conn, $_POST['Property_Name']);
$Property_Address = mysqli_escape_string($conn, $_POST['Property_Address']);
$County = mysqli_escape_string($conn, $_POST['County']);
$Date_Purchased = mysqli_escape_string($conn, $_POST['Date_Purchased']);

// Attempt insert query execution
$sql = "INSERT INTO PROPERTY_CASE (Client_ID,Solicitor_ID, Case_Type, Section_68_Status, Case_Notes,Property_Name,Property_Address,County,Date_Purchased ) 
        VALUES ('$Client_ID','$Solicitor_ID', '$Case_Type', '$Section_68_Status', '$Case_Notes', '$Property_Name','$Property_Address','$County', '$Date_Purchased')";
if(mysqli_query($conn, $sql)){
    	?>
	The record for <?php echo $Client_ID?> has been added
	<?php

  //Change the .php url below to display client records page
	header("refresh:1, url=read_property.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
