<?php include "templates/header.php"; ?>

<style>
    <?php include 'css/style.css'; ?>
</style>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="index.php">Home</a></li>
        <li role="presentation"><a href="client/read_client.php">Client</a></li>
        <li role="presentation"><a href="litigation_case/read_litigation.php">Litigation Cases</a></li>
        <li role="presentation"><a href="property_case/read_property.php">Property Cases</a></li>
        <li role="presentation"><a href="other_queries/other_home.php">Accounts</a></li>
    </ul>

    <blockquote class="sub-header"> Welcome to Skupina Solicitors' database administration system</blockquote>

   <p class = "info jumbotron">Skupina Solicitors are an Irish solicitors’ practice specialising in litigation and
       conveyancing. The firm have offices in Galway and Ennis and plan to open an Athlone office in the near future.
       The practice was founded nine years ago and is licensed to practice by the Law Society of Ireland. Skupina
       Solicitors have used a manual filing system since their inception. They now wish to move to a computerised
       database management system for a number of reasons.</p>

    <blockquote class="sub-header">The following functionality is available</blockquote>

    <div class="crud-list">
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active"disabled>
                SQL Queries:
            </button>
            <a href="/client/read_client.php">
            <button type="button" class="list-group-item list-group-item-action" aria-label="Left Align">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <b>Client</b>
                <ul class="inner-list">
                    <li>Create a new client record </li>
                    <li>Search existing clients by 'surname' or 'County'</li>
                    <li>View all existing clients, and:</li>
                    <ul>
                        <li>View all cases associated with a particular client</li>
                        <li>Update a client's details</li>
                        <li>Delete a client and <i>all</i> their related data from the system</li>
                    </ul>
                </ul>
            </button>
            </a>
            <a href="/litigation_case/read_litigation.php">
            <button type="button" class="list-group-item list-group-item-action">
                <span class="" aria-hidden="true">
                    <i class="fas fa-gavel"></i>
                </span>
                <b>Litigation Cases</b>
                <ul class="inner-list">
                    <li>Create a new litigation case record</li>
                    <li>Search existing litigation cases by 'Client ID' or 'Case Status'</li>
                    <li>View all existing litigation cases, and:</li>
                    <ul>
                        <li>View all respondents related to a case</li>
                        <li>Add a new respondent for a particular case</li>
                        <li>View all document records associated with a case</li>
                        <li>Add a new document record for a particular case</li>
                        <li>Update existing case records</li>
                        <li>Generate a <b>'Final Bill'</b> based on hours provided  <span><i class="fas fa-file-invoice-dollar"></i></span></li>
                        <li>Delete a litigation case and <i>all</i> related data from the system</li>
                    </ul>
                </ul>
            </button>
            </a>
            <a href="/property_case/read_property.php">
            <button type="button" class="list-group-item list-group-item-action">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <b>Property Assignments</b>
                    <ul class="inner-list">
                        <li>Create a new property assignment</li>
                        <li>Search existing property assignments by 'Client ID' or 'County'</li>
                        <li>View all existing litigation cases, and:</li>
                        <ul>
                            <li>View all respondents related to a property assignment</li>
                            <li>Add a new correspondent for a particular assignment</li>
                            <li>View all document records associated with a case</li>
                            <li>Add a new document record for a particular assignment</li>
                            <li>Update existing property assignment records</li>
                            <li>Generate a <b>'Stamp Duty'</b> and <b>'Final Bill'</b> on assignment completion  <span><i class="fas fa-file-invoice-dollar"></i></span></li>
                            <li>Delete a property assignment and <i>all</i> related data from the system</li>
                        </ul>
                    </ul>
            </button>
            </a>
            <a href="/other_queries/other_home.php">
            <button type="button" class="list-group-item list-group-item-action">
                <span><i class="fas fa-file-invoice-dollar"></i></span>
                <b>Accounts</b>
                <ul class="inner-list">
                    <li>Keeps track of <b>Total Revenue</b> from Litigation cases</li>
                    <li>Keeps track of <b>Total Revenue</b> from Property cases</li>
                </ul>
            </button>
            </a>
        </div>
    </div>

<?php include "templates/footer.php"; ?>


