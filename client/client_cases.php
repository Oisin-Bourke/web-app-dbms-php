<?php include "../templates/header.php";//include header

include_once '../includes/db_connect.php';

$Client_ID = mysqli_escape_string($conn, $_GET['Client_ID']);

?>

<style>
    <?php include '../css/style.css'; ?>
</style>

<!-- ==================== header per page ======================== -->

<ul class="nav nav-tabs">
    <li role="presentation"><a href="../index.php">Home</a></li>
    <li role="presentation" class="active"><a href="read_client.php">Client</a></li>
    <li role="presentation"><a href="../litigation_case/read_litigation.php">Litigation Cases</a></li>
    <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
    <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>

</ul>

<blockquote class="sub-header">All cases for Client ID: <?php echo $Client_ID; ?> </blockquote>

<?php

$query = "SELECT * FROM LITIGATION_CASE WHERE Client_ID=$Client_ID;";

$result=mysqli_query($conn, $query);

$result_check=mysqli_num_rows($result);

?>

<table class="table table-bordered table-striped table-responsive">
    <thead><h4>Litigation Cases</h4>
    <tr>
        <th><b>Case ID</b></th>
        <th><b>Client ID</b></th>
        <th><b>Solicitor ID</b></th>
        <th><b>Case Type</b></th>
        <th><b>Section 68 Status</b></th>
        <th><b>Case Notes</b></th>
        <th><b>Barrister ID</b></th>
        <th><b>Court Date</b></th>
        <th><b>Case Date Open</b></th>
        <th><b>Case Date Closed</b></th>
        <th><b>Case Status</b></th>
        <th><b>Hours Provided</b></th>

        <th class="list-group-item-success" align="left"><b>Respondents</b></th>
        <th class="list-group-item-warning" align="left"><b>Documents</b></th>
        <th class="list-group-item-info" align="left"><b>Update/Bill</b></th>
        <th class="list-group-item-danger" align="left"><b>Delete</b></th>
    </tr>
    <thead>
    <?php

    // LITIGATION_CASE: `Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Barrister_ID`, `Court_Date`, `Case_Date_Open`, `Case_Date_Closed`, `Case_Status`


    while($row =mysqli_fetch_assoc($result)){

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
    <tbody>
    <tr>
        <td> <?php echo $Case_ID; ?></td>
        <td> <?php echo $Client_ID; ?></td>
        <td> <?php echo $Solicitor_ID; ?></td>
        <td> <?php echo $Case_Type; ?></td>
        <td> <?php echo $Section_68_Status; ?></td>
        <td> <?php echo $Case_Notes; ?></td>
        <td> <?php echo $Barrister_ID; ?></td>
        <td> <?php echo $Court_Date; ?></td>
        <td> <?php echo $Case_Date_Open; ?></td>
        <td> <?php echo $Case_Date_Closed; ?></td>
        <td> <?php echo $Case_Status; ?></td>
        <td> <?php echo $hours_provided; ?></td>

        <td><a href="../litigation_case/respondent_litigation.php?Case_ID=<?php echo $Case_ID; ?>">View/Add</a></td>
        <td><a href="../litigation_case/document_litigation.php?Case_ID=<?php echo $Case_ID; ?>">View/Add</a></td>
        <td><a href="../litigation_case/edit_litigation.php?Case_ID=<?php echo $Case_ID; ?>">Update/Bill</a></td>
        <td><a onclick="return confirm('Are you sure you want to delete all records for Case ID: <?php echo $Case_ID; ?>?')" href="../litigation_case/delete_litigation.php?Case_ID=<?php echo $Case_ID; ?>">Delete</a></td>
    </tr>
    <tbody>
    <?php } ?>

</table>

<?php

$query = "SELECT * FROM PROPERTY_CASE WHERE Client_ID=$Client_ID;";

$result=mysqli_query($conn, $query);

$result_check=mysqli_num_rows($result);

?>

<table class="table table-bordered table-striped table-responsive">
    <thead><h4>Property Assignments</h4>
    <tr>
        <th><b>Case ID</b></th>
        <th><b>Client ID</b></th>
        <th><b>Solicitor ID</b></th>
        <th><b>Case Type</b></th>
        <th><b>Section 68 Status</b></th>
        <th><b>Case Notes</b></th>
        <th><b>Property Name</b></th>
        <th><b>Property Address</b></th>
        <th><b>County</b></th>
        <th><b>Date Purchased</b></th>
        <th><b>Date Sold</b></th>
        <th><b>Assignment Open</b></th>

        <th class="list-group-item-success" align="left"><b>Respondents</b></th>
        <th class="list-group-item-warning" align="left"><b>Documents</b></th>
        <th class="list-group-item-info" align="left"><b>Update/Bill</b></th>
        <th class="list-group-item-danger" align="left"><b>Delete</b></th>
    </tr>
    <thead>
    <?php
    //PROPERTY_CASE` (`Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Property_Name`, `Property_Address`, `County`, `Date_Purchased`, `Date_Sold`,'Case_Date_Open')

    while($row =mysqli_fetch_assoc($result)){

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
    <tbody>
    <tr>
        <td> <?php echo $Case_ID; ?></td>
        <td> <?php echo $Client_ID; ?></td>
        <td> <?php echo $Solicitor_ID; ?></td>
        <td> <?php echo $Case_Type; ?></td>
        <td> <?php echo $Section_68_Status; ?></td>
        <td> <?php echo $Case_Notes; ?></td>
        <td> <?php echo $Property_Name; ?></td>
        <td> <?php echo $Property_Address; ?></td>
        <td> <?php echo $County; ?></td>
        <td> <?php echo $Date_Purchased; ?></td>
        <td> <?php echo $Date_Sold; ?></td>
        <td> <?php echo $Case_Date_Open; ?></td>

        <td><a href="../property_case/respondent_property.php?Case_ID=<?php echo $Case_ID; ?>">View/Add</a></td>
        <td><a href="../property_case/document_property.php?Case_ID=<?php echo $Case_ID; ?>">View/Add</a></td>
        <td><a href="../property_case/edit_property.php?Case_ID=<?php echo $Case_ID; ?>">Update/Bill</a></td>
        <td><a onclick="return confirm('Are you sure you want to delete all records for Case ID: <?php echo $Case_ID; ?>?')" href="../property_case/delete_property.php?Case_ID=<?php echo $Case_ID; ?>">Delete</a></td>
    </tr>
    <tbody>
    <?php } ?>

</table>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>
