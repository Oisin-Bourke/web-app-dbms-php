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

    <blockquote class="sub-header">Add a new client to the system:</blockquote>

<form action="insert_client.php" method="post" class="form-horizontal">

    <div class="form-group">
        <label for="Office_ID_ID" class="col-sm-2 control-label">Office ID</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Office_ID" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_First_Name" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_First_Name" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_Last_Name" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_Last_Name" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_Email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_Email" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_Address" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_Address" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="County" class="col-sm-2 control-label">County</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="County" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_Phone_No" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_Phone_No" size="30" value="" />
        </div>
    </div>


    <div class="form-group">
        <label for="Client_Account_Name" class="col-sm-2 control-label">Account Name</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_Account_Name" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_BIC_No" class="col-sm-2 control-label">Bank BIC</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_BIC_No" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="Client_IBAN_No" class="col-sm-2 control-label">Bank IBAN</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="Client_IBAN_No" size="30" value="" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name = "submit" class="btn btn-success">Create Client</button>
        </div>
    </div>
</form>

<?php include "../templates/footer.php"; ?>