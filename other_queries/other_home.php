<?php include "../templates/header.php"; ?>

<style>
    <?php include '../css/style.css'; ?>
</style>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="../index.php">Home</a></li>
    <li role="presentation"><a href="../client/read_client.php">Client</a></li>
    <li role="presentation"><a href="../litigation_case/read_litigation.php">Litigation Cases</a></li>
    <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
    <li role="presentation" class="active"><a href="other_home.php">Accounts</a></li>
</ul>

<blockquote class="sub-header"> Current Revenue:</blockquote>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 16:25
 */

// Get a connection for the database
include_once '../includes/db_connect.php';

//$Client_ID = mysqli_escape_string($conn, $_GET['Client_ID']);

$sql =
    "SELECT sum(Hourly_Rate * hours_provided) AS 'Total Litigation Revenue'  
          FROM LITIGATION_CLOSED
          INNER JOIN LITIGATION_CASE ON LITIGATION_CASE.Case_ID = LITIGATION_CLOSED.Case_ID
          where LITIGATION_CASE.Case_Status = 'Closed'";

$result=mysqli_query($conn, $sql);
?>

<?php

$row = mysqli_fetch_assoc($result);

$TotalLitigation=$row['Total Litigation Revenue'];

?>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 24/11/2018
 * Time: 16:25
 */

// Get a connection for the database
include_once '../includes/db_connect.php';

//$Client_ID = mysqli_escape_string($conn, $_GET['Client_ID']);

$sql =
    "SELECT sum(cast(Property_Value * 0.01 AS decimal(10,2))) as 'Total Property Revenue'
		from PROPERTY_CLOSED
        INNER JOIN PROPERTY_CASE ON PROPERTY_CASE.Case_ID = PROPERTY_CLOSED.Case_ID
        where PROPERTY_CASE.Date_Sold != '1900-01-01'";

$result=mysqli_query($conn, $sql);
?>

<?php

$row = mysqli_fetch_assoc($result);

$TotalProperty=$row['Total Property Revenue'];

?>

<div class="panel row">

<form action="" method="" class="form-horizontal">
    <div class="form-group col-xs-8">
        <label for="Client_ID" class="col-sm-2 control-label">Total Revenue from Litigation</label>
        <div class="col-sm-10">
            <input class="form-control col-xs-6" type="text" name="Client_ID" size="5" value="€&nbsp;<?php echo $TotalLitigation; ?>" disabled>
        </div>
    </div>

    <div class="form-group col-xs-8">
        <label for="Client_ID" class="col-sm-2 control-label">Total Revenue from Property</label>
        <div class="col-sm-10">
            <input class="form-control col-xs-6" type="text" name="Client_ID" size="5" value="€&nbsp;<?php echo $TotalProperty; ?>" disabled>
        </div>
    </div>

</form>

</div>

<?php
mysqli_close($conn);
?>

<?php include "../templates/footer.php";?>

