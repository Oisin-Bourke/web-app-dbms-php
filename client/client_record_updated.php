<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 18:33
 */


// Get a connection for the database
include_once '../includes/db_connect.php';


// Escape user inputs for security
$Client_ID = mysqli_escape_string($conn, $_POST['Client_ID']);
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


//$id=$_POST["id"];
//$fname=$_POST["fname"];
//$lname=$_POST["lname"];

//echo 'The value for name is ' . $fname . ' and the value for surname is ' . $lname . ' and the value for id is ' . $id;

// Attempt insert query execution
$sql = "UPDATE CLIENT set Office_ID ='$Office_ID', Client_First_Name='$Client_First_Name',Client_Last_Name ='$Client_Last_Name',
                          Client_Email = '$Client_Email', Client_Address = '$Client_Address', County = '$County', 
                          Client_Phone_No = '$Client_Phone_No',Client_Account_Name ='$Client_Account_Name',
                          Client_BIC_No ='$Client_BIC_No', Client_IBAN_No = '$Client_IBAN_No'
  where Client_ID='$Client_ID'";


//echo 'The sql statement is ' . $sql;

if(mysqli_query($conn, $sql)){
    ?>
    The record for <?php echo $Client_ID ?>  has been updated
    <?php
    header("refresh:1, url=read_client.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>