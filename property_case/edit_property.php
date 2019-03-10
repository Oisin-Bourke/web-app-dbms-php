<?php include "../templates/header.php"; ?>

<style>
    <?php include '../css/style.css'; ?>
</style>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="../index.php">Home</a></li>
    <li role="presentation"><a href="../client/read_client.php">Client</a></li>
    <li role="presentation"><a href="../litigation_case/read_litigation.php">Litigation Cases</a></li>
    <li role="presentation" class="active"><a href="read_property.php">Property Cases</a></li>
    <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>
</ul>

<blockquote class="sub-header">Update Property Record:</blockquote>



<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 16:25
 */

//PROPERTY_CASE` (`Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Property_Name`, `Property_Address`, `County`, `Date_Purchased`, `Date_Sold`,'Case_Date_Open')

// Get a connection for the database
include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);
$sql =
    "select Case_ID,Client_ID,Solicitor_ID,Case_Type,Section_68_Status,Case_Notes,
            Property_Name, Property_Address, County, Date_Purchased, Date_Sold,Case_Date_Open
            FROM PROPERTY_CASE 
            WHERE Case_ID=$Case_ID";

$result=mysqli_query($conn, $sql);
?>

<?php

$row = mysqli_fetch_assoc($result);

$Case_ID=$row['Case_ID'];
$Client_ID=$row['Client_ID'];
$Solicitor_ID=$row['Solicitor_ID'];
$Case_Type=$row['Case_Type'];
$Section_68_Status=$row['Section_68_Status'];
$Case_Notes=$row['Case_Notes'];
$Property_Name=$row['Property_Name'];
$Property_Address=$row['Property_Address'];
$County=$row['County'];
$Date_Purchased=$row['Date_Purchased'];
$Date_Sold=$row['Date_Sold'];
$Case_Date_Open=$row['Case_Date_Open'];

?>

    <form action="property_record_updated.php" method="post" class="form-horizontal">

        <div class="form-group">
            <label for="Case_ID" class="col-sm-2 control-label">Case ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_ID" size="5" value="<?php echo $Case_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="Client_ID" class="col-sm-2 control-label">Client ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client ID" size="30" value="<?php echo $Client_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="Solicitor_ID" class="col-sm-2 control-label">Solicitor ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Solicitor_ID" size="30" value="<?php echo $Solicitor_ID; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Case_Type" class="col-sm-2 control-label">Case Type</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_Type" size="30" value="<?php echo $Case_Type; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Section_68_Status" class="col-sm-2 control-label">Section 68 Status</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Section_68_Status" size="30" value="<?php echo $Section_68_Status; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Case_Notes" class="col-sm-2 control-label">Case Notes</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_Notes" size="30" value="<?php echo $Case_Notes; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Property_Name" class="col-sm-2 control-label">Property Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Property_Name" size="30" value="<?php echo $Property_Name; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Property_Address" class="col-sm-2 control-label">Property Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Property_Address" size="30" value="<?php echo $Property_Address; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="County" class="col-sm-2 control-label">County</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="County" size="30" value="<?php echo $County; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Date_Purchased" class="col-sm-2 control-label">Date Purchased</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Date_Purchased" size="30" value="<?php echo $Date_Purchased; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Date_Sold" class="col-sm-2 control-label">Date Sold</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Date_Sold" size="30" value="<?php echo $Date_Sold; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Case_Date_Open" class="col-sm-2 control-label">Case Date Open</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_Date_Open" size="30" value="<?php echo $Case_Date_Open; ?>" disabled/>
            </div>
        </div>

        <input type="hidden" name="Case_ID" value="<?= $Case_ID?>" />

        <input type="hidden" name="Client_ID" value="<?= $Client_ID?>" />

        <input type="hidden" name="Case_Date_Open" value="<?= $Case_Date_Open?>" />

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name = "submit" class="btn btn-success">Update Assignment</button>
            </div>
        </div>
    </form>

<div class="row">
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-4">
            <h4>To generate/view final bill for Case ID <?php echo $Case_ID; ?><h4>
                    <a href="close_prop.php?Case_ID=<?php echo $Case_ID; ?>"> <button class="btn btn-warning">Click</button></a>
        </div>
    </div>
</div>

<?php
mysqli_close($conn);
?>

<?php include "../templates/footer.php"; ?>
