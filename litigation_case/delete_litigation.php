<?php

// Get a connection for the database
include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);

// This working now! Well done on that!
//$sql = "delete FROM LITIGATION_SETTLED WHERE Case_ID = '$Case_ID'";
$sql = "delete FROM LITIGATION_CASE WHERE Case_ID = '$Case_ID'";

if (mysqli_query($conn, $sql))
    header("refresh:1, url=read_litigation.php");
else
    echo "Did not delete Case ID:".$Case_ID;

mysqli_close($conn);
?>

