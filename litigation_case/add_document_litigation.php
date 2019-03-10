<?php include "../templates/header.php";

include_once '../includes/db_connect.php';

$Case_ID = mysqli_escape_string($conn, $_GET['Case_ID']);

/*
    Document_Number int not null auto_increment primary key,
    Document_Date_Stamp datetime default current_timestamp,
    Case_ID int,
    Document_Type VARCHAR(50),
    Document_Notes VARCHAR(200),
    Document_Format varchar(20),
	FOREIGN KEY (Case_ID) REFERENCES LITIGATION_CASE(Case_ID)
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

    <blockquote class="sub-header">Add Document for Case ID: <?php echo $Case_ID; ?></blockquote>

    <form action="insert_document_litigation.php" method="post" class="form-horizontal">

        <div class="form-group">
            <label for="Case_ID" class="col-sm-2 control-label">Case ID</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Case_ID" size="5" value="<?php echo $Case_ID; ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="Document_Type" class="col-sm-2 control-label">Document Type</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Document_Type" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Document Notes" class="col-sm-2 control-label">Document Notes</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Document_Notes" size="30" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="Document_Format" class="col-sm-2 control-label">Document Format</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="Document_Format" size="30" value="" />
            </div>
        </div>

        <input type="hidden" name="Case_ID" value="<?= $Case_ID?>" />

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name = "submit" class="btn btn-success">Create Document</button>
            </div>
        </div>
    </form>


<?php
mysqli_close($conn);
?>

<?php include "../templates/footer.php"; ?>