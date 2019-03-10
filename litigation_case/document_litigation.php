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
    <li role="presentation"><a href="/client/read_client.php">Client</a></li>
    <li role="presentation" class="active"><a href="read_litigation.php">Litigation Cases</a></li>
    <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
    <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>
</ul>

<blockquote class="sub-header">Add Document:</blockquote>

<form class="form-inline">
    <div class="form-group">
        <label class="header-label-left" for="Client_Last_Name">Add new document for Case ID :<?php echo $Case_ID; ?></label>
    </div>
        <a class="btn btn-success" role="button" href="add_document_litigation.php?Case_ID=<?php echo $Case_ID; ?>">Click</a>
</form>


<blockquote class="sub-header">Case Documents for Case ID: <?php echo $Case_ID; ?></blockquote>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 16:25
 */

/*
    Document_Number int not null auto_increment primary key,
    Document_Date_Stamp datetime default current_timestamp,
    Case_ID int,
    Document_Type VARCHAR(50),
    Document_Notes VARCHAR(200),
    Document_Format varchar(20),
	FOREIGN KEY (Case_ID) REFERENCES LITIGATION_CASE(Case_ID)

*/

// Get a connection for the database
include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);
$sql = "select * FROM LITIGATION_DOCUMENT WHERE Case_ID=$Case_ID";

$result=mysqli_query($conn, $sql);

$result_check=mysqli_num_rows($result);
?>

<table class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th><b>Doc #</b></th>
        <th><b>Document Date Stamp</b></th>
        <th><b>Case ID</b></th>
        <th><b>Document_Type</b></th>
        <th><b>Document_Notes</b></th>
        <th><b>Document_Format</b></th>
    </tr>
    <thead>

    <?php

    while($row =mysqli_fetch_assoc($result)){

    $Document_Number = $row['Document_Number'];
    $Document_Date_Stamp = $row['Document_Date_Stamp'];
    $Case_ID=$row['Case_ID'];
    $Document_Type=$row['Document_Type'];
    $Document_Notes=$row['Document_Notes'];
    $Document_Format=$row['Document_Format'];

    ?>
    <tbody>
    <tr>
        <td> <?php echo $Document_Number; ?></td>
        <td> <?php echo $Document_Date_Stamp; ?></td>
        <td> <?php echo $Case_ID; ?></td>
        <td> <?php echo $Document_Type; ?></td>
        <td> <?php echo $Document_Notes; ?></td>
        <td> <?php echo $Document_Format; ?></td>

    </tr>
    <tbody>
    <?php } ?>

</table>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>

