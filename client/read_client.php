<?php include "../templates/header.php";//include header?>

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

<div class="panel">

<blockquote class="sub-header">Add a new Client: </blockquote>

<form class="form-inline">
    <div class="form-group">
        <label class="header-label-left" for="Client_Last_Name">Add a new client to the system</label>
    </div>
    <a href="add_client.php" class="btn btn-success" role="button">Click</a>
</form>

<!-- =============== search by last name and search by county ====================== -->

<?php

if (isset($_POST['submit'])) {
    try {
        require "../includes/config.php";
        require "../includes/common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
				FROM CLIENT
				WHERE Client_Last_Name = :Client_Last_Name";

        $Client_Last_Name = $_POST['Client_Last_Name'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':Client_Last_Name', $Client_Last_Name, PDO::PARAM_STR);
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
				FROM CLIENT
				WHERE County = :County";

        $County = $_POST['County'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':County', $County, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<blockquote class="sub-header">Search Clients by: </blockquote>

<form class="form-inline" method="post">
    <div class="form-group">
        <label class="header-label-left" for="Client_Last_Name">Surname</label>
        <input type="text" class="form-control" id="Client_Last_Name" name ="Client_Last_Name" placeholder="Surname">
    </div>
    <button type="submit" name="submit" class="btn btn-warning">Search</button>
    <div class="form-group">
        <label for="County"> County</label>
        <input type="text" class="form-control" id="County" name="County" placeholder="County" >
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
                        <th><b>Client ID</b></th>
                        <th><b>Office ID</b></th>
                        <th><b>First Name</b></th>
                        <th><b>Last Name</b></th>
                        <th><b>Email</b></th>
                        <th><b>Address</b></th>
                        <th><b>County</b></th>
                        <th><b>Phone No.</b></th>
                        <th><b>Client Account</b></th>
                        <th><b>Bank BIC</b></th>
                        <th><b>Bank IBAN</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo escape($row["Client_ID"]); ?></td>
                            <td><?php echo escape($row["Office_ID"]); ?></td>
                            <td><?php echo escape($row["Client_First_Name"]); ?></td>
                            <td><?php echo escape($row["Client_Last_Name"]); ?></td>
                            <td><?php echo escape($row["Client_Email"]); ?></td>
                            <td><?php echo escape($row["Client_Address"]); ?></td>
                            <td><?php echo escape($row["County"]); ?> </td>
                            <td><?php echo escape($row["Client_Phone_No"]); ?> </td>
                            <td><?php echo escape($row["Client_Account_Name"]); ?> </td>
                            <td><?php echo escape($row["Client_BIC_No"]); ?> </td>
                            <td><?php echo escape($row["Client_IBAN_No"]); ?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <blockquote>No results found for surname: <?php echo escape($_POST['Client_Last_Name']); ?>.</blockquote>
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
                        <th><b>Client ID</b></th>
                        <th><b>Office ID</b></th>
                        <th><b>First Name</b></th>
                        <th><b>Last Name</b></th>
                        <th><b>Email</b></th>
                        <th><b>Address</b></th>
                        <th><b>County</b></th>
                        <th><b>Phone No.</b></th>
                        <th><b>Client Account</b></th>
                        <th><b>Bank BIC</b></th>
                        <th><b>Bank IBAN</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo escape($row["Client_ID"]); ?></td>
                            <td><?php echo escape($row["Office_ID"]); ?></td>
                            <td><?php echo escape($row["Client_First_Name"]); ?></td>
                            <td><?php echo escape($row["Client_Last_Name"]); ?></td>
                            <td><?php echo escape($row["Client_Email"]); ?></td>
                            <td><?php echo escape($row["Client_Address"]); ?></td>
                            <td><?php echo escape($row["County"]); ?> </td>
                            <td><?php echo escape($row["Client_Phone_No"]); ?> </td>
                            <td><?php echo escape($row["Client_Account_Name"]); ?> </td>
                            <td><?php echo escape($row["Client_BIC_No"]); ?> </td>
                            <td><?php echo escape($row["Client_IBAN_No"]); ?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <blockquote>No results found for County: <?php echo escape($_POST['County']); ?>.</blockquote>
            <?php }
        } ?>
    </div>

</div>

<!--================ CURRENT CLIENTS ===========================-->

<div class="table-margin">

<blockquote class="sub-header">Current Clients: </blockquote>


<?php

// Get a connection for the database
include_once '../includes/db_connect.php';
 ?>

<?php

// Create a query for the database
$query = "SELECT * FROM CLIENT;";

// Get a response from the database by sending the connection
// and the query
$result=mysqli_query($conn, $query);

$result_check=mysqli_num_rows($result); ?>

<table class="table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th align="left"><b>Client ID</b></th>
            <th align="left"><b>Office ID</b></th>
            <th align="left"><b>First Name</b></th>
            <th align="left"><b>Last Name</b></th>
            <th align="left"><b>Email</b></th>
            <th align="left"><b>Address</b></th>
            <th align="left"><b>County</b></th>
            <th align="left"><b>Phone No.</b></th>
            <th align="left"><b>Client Account</b></th>
            <th align="left"><b>Bank BIC</b></th>
            <th align="left"><b>Bank IBAN</b></th>

            <th class="list-group-item-warning" align="left"><b>Cases</b></th>
            <th class="list-group-item-info" align="left"><b>Update</b></th>
            <th class="list-group-item-danger" align="left"><b>Delete</b></th>
        </tr>
    <thead>
<?php

	while($row =mysqli_fetch_assoc($result)){
		$Client_ID=$row['Client_ID'];
        $Office_ID=$row['Office_ID'];
		$Client_First_Name=$row['Client_First_Name'];
		$Client_Last_Name=$row['Client_Last_Name'];
		$Client_Email=$row['Client_Email'];
        $Client_Address=$row['Client_Address'];
        $County=$row['County'];
        $Client_Phone_No=$row['Client_Phone_No'];
        $Client_Account_Name=$row['Client_Account_Name'];
        $Client_BIC_No=$row['Client_BIC_No'];
        $Client_IBAN_No=$row['Client_IBAN_No'];

		?>
    <tbody>
         <tr>
             <td> <?php echo $Client_ID; ?></td>
             <td> <?php echo $Office_ID; ?></td>
             <td> <?php echo $Client_First_Name; ?></td>
             <td> <?php echo $Client_Last_Name; ?></td>
             <td> <?php echo $Client_Email; ?></td>
             <td> <?php echo $Client_Address; ?></td>
             <td> <?php echo $County; ?></td>
             <td> <?php echo $Client_Phone_No; ?></td>
             <td> <?php echo $Client_Account_Name; ?></td>
             <td> <?php echo $Client_BIC_No; ?></td>
             <td> <?php echo $Client_IBAN_No; ?></td>

             <td><a href="client_cases.php?Client_ID=<?php echo $Client_ID; ?>">View/All</a></td>

             <td><a href="edit_client.php?Client_ID=<?php echo $Client_ID; ?>">Update</a></td>
             <td><a onclick="return confirm('Are you sure you want to delete all records for Client ID: <?php echo $Client_ID; ?>?')" href="delete_client.php?Client_ID=<?php echo $Client_ID; ?>">Delete</a></td>
         </tr>
    <tbody>
	<?php } ?>

 </table>

</div>

<?php mysqli_close($conn);?>

<?php include "../templates/footer.php";?>