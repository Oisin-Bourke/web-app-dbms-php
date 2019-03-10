<?php
 $host = "mysql1.it.nuigalway.ie";
 $username = "mydb4662bo";
 $password = "jo2zif";
 $database = "mydb4662";

//error_reporting(0);// With this no error reporting will be there

$conn=mysqli_connect($host,$username,$password,$database);

//$conn=mysqli_connect($host,$database);
if (!$conn) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "<br>Debugging error: " . mysqli_connect_errno();
    echo "<br>Debugging error: " . mysqli_connect_error();
    exit;
}

?>
