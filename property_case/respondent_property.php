<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 02/12/2018
 * Time: 16:56
 */

include "../templates/header.php";

include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);

?>

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

    <blockquote class="sub-header">Add Respondent:</blockquote>

    <form class="form-inline">
        <div class="form-group">
            <label class="header-label-left" for="Client_Last_Name">Add new respondent for Case ID :<?php echo $Case_ID; ?></label>
        </div>
        <a class="btn btn-success" role="button" href="add_respondent_property.php?Case_ID=<?php echo $Case_ID; ?>">Click</a>
    </form>


    <blockquote class="sub-header">All Respondents for Case ID: <?php echo $Case_ID; ?></blockquote>

<?php

// Get a connection for the database
include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);
$sql = "select * FROM PROPERTY_CORRESPONDENT WHERE Case_ID=$Case_ID";

$result=mysqli_query($conn, $sql);

$result_check=mysqli_num_rows($result);
?>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th><b>Corr #</b></th>
            <th><b>Case ID</b></th>
            <th><b>First Name</b></th>
            <th><b>Surname</b></th>
            <th><b>Address</b></th>
            <th><b>County</b></th>
            <th><b>Email</b></th>
            <th><b>Phone No</b></th>
            <th><b>Respondent Type</b></th>
        </tr>
        <thead>

        <?php

        while($row =mysqli_fetch_assoc($result)){

        $Corr_Number = $row['Corr_Number'];
        $Case_ID=$row['Case_ID'];
        $First_Name=$row['First_Name'];
        $Last_Name=$row['Last_Name'];
        $Address=$row['Address'];
        $County=$row['County'];
        $Email=$row['Email'];
        $Phone_No=$row['Phone_No'];
        $Type=$row['Type'];

        ?>
        <tbody>
        <tr>
            <td> <?php echo $Corr_Number; ?></td>
            <td> <?php echo $Case_ID; ?></td>
            <td> <?php echo $First_Name; ?></td>
            <td> <?php echo $Last_Name; ?></td>
            <td> <?php echo $Address; ?></td>
            <td> <?php echo $County; ?></td>
            <td> <?php echo $Email; ?></td>
            <td> <?php echo $Phone_No; ?></td>
            <td> <?php echo $Type; ?></td>

        </tr>
        <tbody>
        <?php } ?>

    </table>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>