<?php include "../templates/header.php"; ?>

    <style>
        <?php include '../css/style.css'; ?>
    </style>

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="../index.php">Home</a></li>
        <li role="presentation"><a href="../client/read_client.php">Client</a></li>
        <li role="presentation" class="active"><a href="read_litigation.php">Litigation Cases</a></li>
        <li role="presentation"><a href="/property_case/read_property.php">Property Cases</a></li>
        <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>
    </ul>

<!--  LITIGATION_CASE: `Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Barrister_ID`, `Court_Date`, `Case_Date_Open`, `Case_Date_Closed`, `Case_Status`,'hours_provided' -->

    <blockquote class="sub-header">Add a new litigation case to the system:</blockquote>

<form action="insert_litigation.php" method="post" class="form-horizontal">

    <div class="form-group">
        <label for="Client_ID" class="col-sm-2 control-label">Client ID</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_ID" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Solicitor_ID" class="col-sm-2 control-label">Solicitor ID</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Solicitor_ID" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Case_Type" class="col-sm-2 control-label">Case Type</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Case_Type" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Section_68_Status" class="col-sm-2 control-label">Section 68 Status</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Section_68_Status" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Case_Notes" class="col-sm-2 control-label">Case Notes</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Case_Notes" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Barrister_ID" class="col-sm-2 control-label">Barrister ID</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Barrister_ID" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name = "submit" class="btn btn-success">Create Case</button>
        </div>
    </div>
</form>

<?php include "../templates/footer.php"; ?>