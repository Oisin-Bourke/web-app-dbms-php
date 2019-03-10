<?php

// Get a connection for the database
include_once '../includes/db_connect.php';


$Client_ID = mysqli_escape_string($conn, $_GET['Client_ID']);

// This working now! Well done on that!
$sql = "delete FROM LITIGATION_SETTLED WHERE Client_ID = '$Client_ID'";
$sql = "delete FROM PROPERTY_SETTLED WHERE Client_ID = '$Client_ID'";
$sql = "delete FROM CLIENT WHERE Client_ID = '$Client_ID'";

if (mysqli_query($conn, $sql))
    header("refresh:1, url=read_client.php");
else
    echo "Did not delete Client:".$Client_ID;


mysqli_close($conn);
?>

