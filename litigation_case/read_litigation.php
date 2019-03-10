<?php include "../templates/header.php";//include header?>

    <style>
        <?php include '../css/style.css'; ?>
    </style>

<!-- ==================== header per page ======================== -->

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="../index.php">Home</a></li>
        <li role="presentation"><a href="../client/read_client.php">Client</a></li>
        <li role="presentation" class="active"><a href="read_litigation.php">Litigation Cases</a></li>
        <li role="presentation"><a href="../property_case/read_property.php">Property Cases</a></li>
        <li role="presentation"><a href="../other_queries/other_home.php">Accounts</a></li>
    </ul>

    <div class="panel">

<blockquote class="sub-header">Add a new Litigation Case: </blockquote>

<form class="form-inline">
    <div class="form-group">
        <label class="header-label-left" for="Client_Last_Name">Add a new litigation case to the the system</label>
    </div>
    <a href="add_litigation.php" class="btn btn-success" role="button">Click</a>
</form>

<!-- =============== search by last name and search by county ====================== -->

<?php

// LITIGATION_CASE: `Case_ID`, `Client_ID`, `Solicitor_ID`, `Case_Type`, `Section_68_Status`, `Case_Notes`, `Barrister_ID`, `Court_Date`, `Case_Date_Open`, `Case_Date_Closed`, `Case_Status`

if (isset($_POST['submit'])) {
    try {
        require "../includes/config.php";
        require "../includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
				FROM LITIGATION_CASE
				WHERE Client_ID = :Client_ID";

        $Client_ID = $_POST['Client_ID'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':Client_ID', $Client_ID, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submit2'])) {
    try {
        require "../includes/config.php";
        require "../includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
				FROM LITIGATION_CASE
				WHERE Case_Status = :Case_Status";

        $Case_Status = $_POST['Case_Status'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':Case_Status', $Case_Status, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<blockquote class="sub-header">Search Litigation Cases by: </blockquote>

<form class="form-inline" method="post">
    <div class="form-group">
        <label class="header-label-left" for="Client_ID">Client ID</label>
        <input type="text" class="form-control" id="Client_ID" name ="Client_ID" placeholder="Client ID">
    </div>
    <button type="submit" name="submit" class="btn btn-warning">Search</button>
    <div class="form-group">
        <label for="Case_Status"> Case Status</label>
        <input type="text" class="form-control" id="Case_Status" name="Case_Status" placeholder="open or closed" >
    </div>
    <button type="submit" name="submit2" class="btn btn-warning">Search</button>
</form>



    <div class="office-search-results">
        <?php
        if (isset($_POST['submit'])) {
            if ($result && $statement->rowCount() > 0) { ?>
                <blockquote>Search results:</blockquote>

                <table class="table table-striped panel table-responsive">
                    <thead>
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

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo escape($row["Case_ID"]); ?></td>
                            <td><?php echo escape($row["Client_ID"]); ?></td>
                            <td><?php echo escape($row["Solicitor_ID"]); ?></td>
                            <td><?php echo escape($row["Case_Type"]); ?></td>
                            <td><?php echo escape($row["Section_68_Status"]); ?></td>
                            <td><?php echo escape($row["Case_Notes"]); ?></td>
                            <td><?php echo escape($row["Barrister_ID"]); ?> </td>
                            <td><?php echo escape($row["Court_Date"]); ?> </td>
                            <td><?php echo escape($row["Case_Date_Open"]); ?> </td>
                            <td><?php echo escape($row["Case_Date_Closed"]); ?> </td>
                            <td><?php echo escape($row["Case_Status"]); ?> </td>
                            <td><?php echo escape($row["hours_provided"]); ?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <blockquote>No results found for Client ID: <?php echo escape($_POST['Client_ID']); ?>.</blockquote>
            <?php }
        } ?>
    </div>
    <div class="office-search-results">
        <?php
        if (isset($_POST['submit2'])) {
            if ($result && $statement->rowCount() > 0) { ?>
                <blockquote>Search results:</blockquote>

                <table class="table table-striped panel table-responsive">
                    <thead>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo escape($row["Case_ID"]); ?></td>
                            <td><?php echo escape($row["Client_ID"]); ?></td>
                            <td><?php echo escape($row["Solicitor_ID"]); ?></td>
                            <td><?php echo escape($row["Case_Type"]); ?></td>
                            <td><?php echo escape($row["Section_68_Status"]); ?></td>
                            <td><?php echo escape($row["Case_Notes"]); ?></td>
                            <td><?php echo escape($row["Barrister_ID"]); ?> </td>
                            <td><?php echo escape($row["Court_Date"]); ?> </td>
                            <td><?php echo escape($row["Case_Date_Open"]); ?> </td>
                            <td><?php echo escape($row["Case_Date_Closed"]); ?> </td>
                            <td><?php echo escape($row["Case_Status"]); ?> </td>
                            <td><?php echo escape($row["hours_provided"]); ?> </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <blockquote>No results found for case: <?php echo escape($_POST['Case_Status']); ?>.</blockquote>
            <?php }
        } ?>
    </div>

</div>

<!--================ CURRENT CASES ===========================-->

<div class="table-margin">

<blockquote class="sub-header">All Litigation Cases: </blockquote>



<?php

// Get a connection for the database
include_once '../includes/db_connect.php';
 ?>

<?php

// Create a query for the database
$query = "SELECT * FROM LITIGATION_CASE;";

// Get a response from the database by sending the connection
// and the query
$result=mysqli_query($conn, $query);

$result_check=mysqli_num_rows($result); ?>

<table class="table table-bordered table-striped table-responsive">
    <thead>
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

             <td><a href="respondent_litigation.php?Case_ID=<?php echo $Case_ID; ?>">View/Add</a></td>
             <td><a href="document_litigation.php?Case_ID=<?php echo $Case_ID; ?>">View/Add</a></td>
             <td><a href="edit_litigation.php?Case_ID=<?php echo $Case_ID; ?>">Update/Bill</a></td>
             <td><a onclick="return confirm('Are you sure you want to delete all records for Case ID: <?php echo $Case_ID; ?>?')" href="delete_litigation.php?Case_ID=<?php echo $Case_ID; ?>">Delete</a></td>
         </tr>
    <tbody>
	<?php } ?>

 </table>

</div>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>