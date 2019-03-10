<?php include "../templates/header.php"; ?>

<style>
    <?php include '../css/style.css'; ?>
</style>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="../index.php">Home</a></li>
    <li role="presentation" class="active"><a href="read_client.php">Client</a></li>
    <li role="presentation"><a href="../litigation_case/read_litigation.php">Litigation Cases</a></li>
    <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
    <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>
</ul>

<blockquote class="sub-header"> Update Client Record:</blockquote>



<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 16:25
 */

// Get a connection for the database
include_once '../includes/db_connect.php';

$Client_ID = mysqli_escape_string($conn, $_GET['Client_ID']);
$sql =
    "select Client_ID,Office_ID,Client_First_Name,Client_Last_Name,Client_Email,Client_Address,County,Client_Phone_No,
 Client_Account_Name,Client_BIC_No,Client_IBAN_No FROM CLIENT WHERE Client_ID=$Client_ID";

$result=mysqli_query($conn, $sql);
?>

<?php

$row = mysqli_fetch_assoc($result);

$Client_ID=$row['Client_ID'];
$Office_ID=$row['Office_ID'];
$Client_First_Name=$row['Client_First_Name'];
$Client_Last_Name=$row['Client_Last_Name'];
$Client_Email=$row['Client_Email'];
$Client_Address=$row['Client_Address'];
$County=$row['County'];
$Client_Phone_No=$row['Client_Phone_No'];
$Client_Account_Name=$row['Client_Account_Name'];
$Client_BIC_No=$row['Client_BIC_No'];
$Client_IBAN_No=$row['Client_IBAN_No'];

?>

    <form action="client_record_updated.php" method="post" class="form-horizontal">

        <div class="form-group">
            <label for="Client_ID" class="col-sm-2 control-label">Client ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_ID" size="5" value="<?php echo $Client_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="Office_ID_ID" class="col-sm-2 control-label">Office ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Office_ID" size="30" value="<?php echo $Office_ID; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_First_Name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_First_Name" size="30" value="<?php echo $Client_First_Name; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_Last_Name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_Last_Name" size="30" value="<?php echo $Client_Last_Name; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_Email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_Email" size="30" value="<?php echo $Client_Email; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_Address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_Address" size="30" value="<?php echo $Client_Address; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="County" class="col-sm-2 control-label">County</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="County" size="30" value="<?php echo $County; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_Phone_No" class="col-sm-2 control-label">Phone Number</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_Phone_No" size="30" value="<?php echo $Client_Phone_No; ?>" />
            </div>
        </div>


        <div class="form-group">
            <label for="Client_Account_Name" class="col-sm-2 control-label">Account Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_Account_Name" size="30" value="<?php echo $Client_Account_Name; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_BIC_No" class="col-sm-2 control-label">Bank BIC</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_BIC_No" size="30" value="<?php echo $Client_BIC_No; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="Client_IBAN_No" class="col-sm-2 control-label">Bank IBAN</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Client_IBAN_No" size="30" value="<?php echo $Client_IBAN_No; ?>" />
            </div>
        </div>

        <input type="hidden" name="Client_ID" value="<?= $Client_ID?>" />

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name = "submit" class="btn btn-success">Update Client</button>
            </div>
        </div>
    </form>

<?php
mysqli_close($conn);
?>

<?php include "../templates/footer.php"; ?>
