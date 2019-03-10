<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 18:33
 */

// LITIGATION_CASE: `Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Barrister_ID`, `Court_Date`, `Case_Date_Open`, `Case_Date_Closed`, `Case_Status`,'hours_provided'


// Get a connection for the database
include_once '../includes/db_connect.php';


// Escape user inputs for security

$Case_ID = mysqli_escape_string($conn, $_POST['Case_ID']);
$Client_ID = mysqli_escape_string($conn, $_POST['Client_ID']);
$Solicitor_ID = mysqli_escape_string($conn, $_POST['Solicitor_ID']);
$Case_Type = mysqli_escape_string($conn, $_POST['Case_Type']);
$Section_68_Status = mysqli_escape_string($conn, $_POST['Section_68_Status']);
$Case_Notes = mysqli_escape_string($conn, $_POST['Case_Notes']);
$Barrister_ID = mysqli_escape_string($conn, $_POST['Barrister_ID']);
$Court_Date = mysqli_escape_string($conn, $_POST['Court_Date']);
$Case_Date_Open = mysqli_escape_string($conn, $_POST['Case_Date_Open']);
$Case_Date_Closed = mysqli_escape_string($conn, $_POST['Case_Date_Closed']);
$Case_Status = mysqli_escape_string($conn, $_POST['Case_Status']);
$hours_provided = mysqli_escape_string($conn, $_POST['hours_provided']);


//echo 'The value for name is ' . $fname . ' and the value for surname is ' . $lname . ' and the value for id is ' . $id;

// Attempt insert query execution
$sql = "UPDATE LITIGATION_CASE set Solicitor_ID ='$Solicitor_ID', Case_Type='$Case_Type',Section_68_Status ='$Section_68_Status',
                          Case_Notes = '$Case_Notes', Barrister_ID = '$Barrister_ID', Court_Date = '$Court_Date', 
                          Case_Date_Open = '$Case_Date_Open', Case_Date_Closed = '$Case_Date_Closed',Case_Status ='$Case_Status',
                          hours_provided ='$hours_provided'
  where Case_ID='$Case_ID'";


//echo 'The sql statement is ' . $sql;

if(mysqli_query($conn, $sql)){
    ?>
    The record for <?php echo $Case_ID ?>  has been updated
    <?php
    header("refresh:1, url=read_litigation.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>