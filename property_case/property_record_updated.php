<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 18:33
 */

//PROPERTY_CASE` (`Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Property_Name`, `Property_Address`, `County`, `Date_Purchased`, `Date_Sold`,'Case_Date_Open')

// Get a connection for the database
include_once '../includes/db_connect.php';


// Escape user inputs for security

$Case_ID = mysqli_escape_string($conn, $_POST['Case_ID']);
$Client_ID = mysqli_escape_string($conn, $_POST['Client_ID']);
$Solicitor_ID = mysqli_escape_string($conn, $_POST['Solicitor_ID']);
$Case_Type = mysqli_escape_string($conn, $_POST['Case_Type']);
$Section_68_Status = mysqli_escape_string($conn, $_POST['Section_68_Status']);
$Case_Notes = mysqli_escape_string($conn, $_POST['Case_Notes']);
$Property_Name = mysqli_escape_string($conn, $_POST['Property_Name']);
$Property_Address = mysqli_escape_string($conn, $_POST['Property_Address']);
$County = mysqli_escape_string($conn, $_POST['County']);
$Date_Purchased = mysqli_escape_string($conn, $_POST['Date_Purchased']);
$Date_Sold = mysqli_escape_string($conn, $_POST['Date_Sold']);

//echo 'The value for name is ' . $fname . ' and the value for surname is ' . $lname . ' and the value for id is ' . $id;

// Attempt insert query execution
$sql = "UPDATE PROPERTY_CASE set 
                          Solicitor_ID ='$Solicitor_ID', Case_Type='$Case_Type',Section_68_Status ='$Section_68_Status',
                          Case_Notes = '$Case_Notes', Property_Name = '$Property_Name', Property_Address = '$Property_Address', 
                          County = '$County', Date_Purchased = '$Date_Purchased',Date_Sold ='$Date_Sold'
        where Case_ID='$Case_ID'";


//echo 'The sql statement is ' . $sql;

if(mysqli_query($conn, $sql)){
    ?>
    The record for <?php echo $Case_ID ?>  has been updated
    <?php
    header("refresh:1, url=read_property.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>