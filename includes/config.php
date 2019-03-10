<?php
/**
 * Configuration for database connection
 *
 */
$host       = "mysql1.it.nuigalway.ie";
$username   = "mydb4662bo";
$password   = "jo2zif";
$dbname     = "mydb4662";

$dsn        = "mysql:host=$host;dbname=$dbname";

$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
