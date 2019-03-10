<?php include "../templates/header.php";

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

<blockquote class="sub-header">Close Case ID: <?php echo $Case_ID; ?></blockquote>

    <form action="insert_close_case.php" method="post" class="form-horizontal">

        <div class="form-group">
            <label for="Case_ID" class="col-sm-2 control-label">Case ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_ID" size="5" value="<?php echo $Case_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="Litigation_Notes" class="col-sm-2 control-label">Final Notes</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Litigation_Notes" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Hourly_Rate" class="col-sm-2 control-label">Hourly Rate</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Hourly_Rate" size="30" value="" />
            </div>
        </div>

        <input type="hidden" name="Case_ID" value="<?= $Case_ID?>" />

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name = "submit" class="btn btn-warning">Create Bill</button>
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
create table LITIGATION_CLOSED(

	Litigation_Closed_No int auto_increment not null,
    Case_ID int not null,
    Litigation_Notes varchar(200),
    Hourly_Rate decimal (5,2),
    primary key (Litigation_Closed_No),
    foreign key (Case_ID) references LITIGATION_CASE (Case_ID)
);
 */

$query = "SELECT Litigation_Closed_No,LITIGATION_CLOSED.Case_ID,CLIENT.Client_First_Name,CLIENT.Client_Last_Name,Litigation_Notes,Hourly_Rate,hours_provided, 
          Hourly_Rate * hours_provided as 'Final Bill'  
          FROM LITIGATION_CLOSED
          INNER JOIN LITIGATION_CASE ON LITIGATION_CASE.Case_ID = LITIGATION_CLOSED.Case_ID
          INNER JOIN CLIENT ON LITIGATION_CASE.Client_ID = CLIENT.Client_ID    
          where LITIGATION_CASE.Case_ID = '$Case_ID';";

$result=mysqli_query($conn, $query);

$result_check=mysqli_num_rows($result);

?>

    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th><b>Ref #</b></th>
            <th><b>Case ID</b></th>
            <th><b>First Name</b></th>
            <th><b>Surname Name</b></th>
            <th><b>Litigation Notes</b></th>
            <th><b>Hourly Rate</b></th>
            <th><b>Hours Provided</b></th>
            <th><b>Final Bill</b></th>

        </tr>
        <thead>
        <?php

        while($row =mysqli_fetch_assoc($result)){

        $Litigation_Closed_No=$row['Litigation_Closed_No'];
        $Case_ID=$row['Case_ID'];
        $Client_First_Name=$row['Client_First_Name'];
        $Client_Last_Name=$row['Client_Last_Name'];
        $Litigation_Notes=$row['Litigation_Notes'];
        $Hourly_Rate=$row['Hourly_Rate'];
        $hours_provided=$row['hours_provided'];
        $FinalBill=$row['Final Bill'];

        ?>
        <tbody>
        <tr>
            <td> <?php echo $Litigation_Closed_No; ?></td>
            <td> <?php echo $Case_ID; ?></td>
            <td> <?php echo $Client_First_Name; ?></td>
            <td> <?php echo $Client_Last_Name; ?></td>
            <td> <?php echo $Litigation_Notes; ?></td>
            <td> <?php echo $Hourly_Rate; ?></td>
            <td> <?php echo $hours_provided; ?></td>
            <td> <?php echo $FinalBill; ?></td>

        </tr>
        <tbody>
        <?php } ?>

    </table>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>