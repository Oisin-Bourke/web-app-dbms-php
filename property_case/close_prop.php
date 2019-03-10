<?php include "../templates/header.php";

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

    <blockquote class="sub-header">Close Property Assignment ID: <?php echo $Case_ID; ?></blockquote>

    <form action="insert_close_prop.php" method="post" class="form-horizontal">

        <div class="form-group">
            <label for="Case_ID" class="col-sm-2 control-label">Case ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_ID" size="5" value="<?php echo $Case_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="Property_Notes" class="col-sm-2 control-label">Final Notes</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Property_Notes" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Property_Value" class="col-sm-2 control-label">Property Value</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Property Value" size="30" value="" />
            </div>
        </div>

        <input type="hidden" name="Case_ID" value="<?= $Case_ID?>" />

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name = "submit" class="btn btn-warning">Calc Stamp Duty</button>
            </div>
        </div>
    </form>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oisin
 * Date: 03/12/2018
 * Time: 15:27
 */

/*
create table PROPERTY_CLOSED(

	Property_Closed_No int auto_increment not null,
    Case_ID int not null,
    Property_Notes varchar(200),
    Property_Value decimal (10,2),
    primary key (Property_Closed_No),
    foreign key (Case_ID) references PROPERTY_CASE (Case_ID)

);
 */

$query = "SELECT Property_Closed_No,PROPERTY_CASE.Case_ID,CLIENT.Client_First_Name,CLIENT.Client_Last_Name,Property_Notes,PROPERTY_CASE.Case_Type,Property_Value,
		CASE
			WHEN Case_Type = 'Residential' AND Property_Value <= 1000000 THEN CAST(Property_Value * 0.01 as decimal(10,2))
			WHEN Case_Type = 'Residential' AND Property_Value > 1000000 then CAST(Property_Value * 0.02 as decimal(10,2))
            WHEN Case_Type = 'Commercial' THEN CAST(Property_Value * 0.06 as decimal(10,2))
        END
        AS
        'Stamp Duty',
        cast(Property_Value * 0.01 AS decimal(10,2)) AS 'Final Bill'
FROM PROPERTY_CLOSED
INNER JOIN PROPERTY_CASE ON PROPERTY_CASE.Case_ID = PROPERTY_CLOSED.Case_ID
INNER JOIN CLIENT ON PROPERTY_CASE.Client_ID = CLIENT.Client_ID    
WHERE PROPERTY_CASE.Case_ID = '$Case_ID';";


$result=mysqli_query($conn, $query);

$result_check=mysqli_num_rows($result);

?>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th><b>Ref #</b></th>
            <th><b>Case ID</b></th>
            <th><b>First Name</b></th>
            <th><b>Surname </b></th>
            <th><b>Final Notes</b></th>
            <th><b>Property Type</b></th>
            <th><b>Property Value</b></th>
            <th><b>Stamp Duty</b></th>
            <th><b>Final Bill</b></th>

        </tr>
        <thead>
        <?php

        while($row =mysqli_fetch_assoc($result)){

        $Property_Closed_No=$row['Property_Closed_No'];
        $Case_ID=$row['Case_ID'];
        $Client_First_Name=$row['Client_First_Name'];
        $Client_Last_Name=$row['Client_Last_Name'];
        $Property_Notes=$row['Property_Notes'];
        $Case_Type=$row['Case_Type'];
        $Property_Value=$row['Property_Value'];
        $StampDuty=$row['Stamp Duty'];
        $FinalBill=$row['Final Bill'];

        ?>
        <tbody>
        <tr>
            <td> <?php echo $Property_Closed_No; ?></td>
            <td> <?php echo $Case_ID; ?></td>
            <td> <?php echo $Client_First_Name; ?></td>
            <td> <?php echo $Client_Last_Name; ?></td>
            <td> <?php echo $Property_Notes; ?></td>
            <td> <?php echo $Case_Type; ?></td>
            <td> <?php echo $Property_Value; ?></td>
            <td> <?php echo $StampDuty; ?></td>
            <td> <?php echo $FinalBill; ?></td>

        </tr>
        <tbody>
        <?php } ?>

    </table>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>