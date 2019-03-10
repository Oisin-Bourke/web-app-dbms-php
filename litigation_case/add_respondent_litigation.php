<?php include "../templates/header.php";

include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);

/*
 *      $Corr_Number = $row['Corr_Number'];
        $Case_ID=$row['Case_ID'];
        $First_Name=$row['First_Name'];
        $Last_Name=$row['Last_Name'];
        $Address=$row['Address'];
        $County=$row['County'];
        $Email=$row['Email'];
        $Phone_No=$row['Phone_No'];
        $Type=$row['Type'];
 */

?>

    <style>
        <?php include '../css/style.css'; ?>
    </style>

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="../index.php">Home</a></li>
        <li role="presentation"><a href="/client/read_client.php">Client</a></li>
        <li role="presentation" class="active"><a href="read_litigation.php">Litigation Cases</a></li>
        <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
        <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>

    </ul>

    <blockquote class="sub-header">Add Respondent for Case ID: <?php echo $Case_ID; ?></blockquote>

    <form action="insert_respondent_litigation.php" method="post" class="form-horizontal">

        <div class="form-group">
            <label for="Case_ID" class="col-sm-2 control-label">Case ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_ID" size="5" value="<?php echo $Case_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="First_Name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="First_Name" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Last_Name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Last_Name" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Address" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="County" class="col-sm-2 control-label">County</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="County" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Email" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Phone_No" class="col-sm-2 control-label">Phone No</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Phone_No" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Type" class="col-sm-2 control-label">Respondent Type</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Type" size="30" value="" />
            </div>
        </div>

        <input type="hidden" name="Case_ID" value="<?= $Case_ID?>" />

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name = "submit" class="btn btn-success">Add Respondent</button>
            </div>
        </div>
    </form>


<?php
mysqli_close($conn);
?>

<?php include "../templates/footer.php"; ?>