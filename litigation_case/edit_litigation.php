<?php include "../templates/header.php"; ?>

<style>
    <?php include '../css/style.css'; ?>
</style>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="../index.php">Home</a></li>
    <li role="presentation"><a href="../client/read_client.php">Client</a></li>
    <li role="presentation" class="active"><a href="read_litigation.php">Litigation Cases</a></li>
    <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
    <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>
</ul>

<blockquote class="sub-header">Update Case Record:</blockquote>


<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 16:25
 */

// LITIGATION_CASE: `Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Barrister_ID`, `Court_Date`, `Case_Date_Open`, `Case_Date_Closed`, `Case_Status`,'hours_provided'

// Get a connection for the database
include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);
$sql =
    "select Case_ID,Client_ID,Solicitor_ID,Case_Type,Section_68_Status,Case_Notes,Barrister_ID,Court_Date,
 Case_Date_Open,Case_Date_Closed,Case_Status,hours_provided FROM LITIGATION_CASE WHERE Case_ID=$Case_ID";

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
$Barrister_ID=$row['Barrister_ID'];
$Court_Date=$row['Court_Date'];
$Case_Date_Open=$row['Case_Date_Open'];
$Case_Date_Closed=$row['Case_Date_Closed'];
$Case_Status=$row['Case_Status'];
$hours_provided=$row['hours_provided'];

?>

    <form action="litigation_record_updated.php" method="post" class="form-horizontal">

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
            <label for="Barrister_ID" class="col-sm-2 control-label">Barrister ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Barrister_ID" size="30" value="<?php echo $Barrister_ID; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Court_Date" class="col-sm-2 control-label">Court Date</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Court_Date" size="30" value="<?php echo $Court_Date; ?>" />
            </div>
        </div>


        <div class="form-group">
            <label for="Case_Date_Open" class="col-sm-2 control-label">Case Date Open</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_Date_Open" size="30" value="<?php echo $Case_Date_Open; ?>" disabled/>
            </div>
        </div>

        <div class="form-group">
            <label for="Case_Date_Closed" class="col-sm-2 control-label">Case Date Closed</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_Date_Closed" size="30" value="<?php echo $Case_Date_Closed; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Case_Status" class="col-sm-2 control-label">Case Status</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_Status" size="30" value="<?php echo $Case_Status; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="hours_provided" class="col-sm-2 control-label">Hours Provided</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="hours_provided" size="30" value="<?php echo $hours_provided; ?>" />
            </div>
        </div>

        <input type="hidden" name="Case_ID" value="<?= $Case_ID?>" />

        <input type="hidden" name="Client_ID" value="<?= $Client_ID?>" />

        <input type="hidden" name="Case_Date_Open" value="<?= $Case_Date_Open?>" />

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-4">
                    <button type="submit" name = "submit" class="btn btn-success">Update Case</button>
                </div>
            </div>

    </form>
<div class="row">
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-4">
            <h4>To generate/view final bill for Case ID <?php echo $Case_ID; ?><h4>
            <a href="close_case.php?Case_ID=<?php echo $Case_ID; ?>"> <button class="btn btn-warning">Click</button></a>
        </div>
    </div>
</div>

<?php
mysqli_close($conn);
?>

<?php include "../templates/footer.php"; ?>
