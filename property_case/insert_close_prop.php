<?php

include_once '../includes/db_connect.php';
/*
    Case_ID int not null,
    Property_Notes varchar(200),
    Property_Value decimal (10,2),
*/

$Case_ID = mysqli_escape_string($conn, $_POST['Case_ID']);
$Property_Notes = mysqli_escape_string($conn, $_POST['Property_Notes']);
$Property_Value = mysqli_escape_string($conn, $_POST['Property_Value']);

// Attempt insert query execution
$sql = "insert into PROPERTY_CLOSED (Case_ID,Property_Notes,Property_Value)
select '$Case_ID','$Property_Notes','$Property_Value' 
Where not exists(select Case_ID from PROPERTY_CLOSED where Case_ID ='$Case_ID')";


if(mysqli_query($conn, $sql)){
    ?>
    The record for Case # <?php echo $Case_ID?> has been added
    <?php

    header("refresh:1, url= http://danu6.it.nuigalway.ie/SkupinaSolicitors/SkupinaCRUD/property_case/close_prop.php?Case_ID=$Case_ID");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>