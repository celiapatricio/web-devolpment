<?php
// Use session object
session_start();

// Get the user ID from the GET request
$id = $_GET["id"];

// Open DB connection
include("includes/openDbConn.php");

// Prepare SQL statement
$sql = "DELETE FROM shippersLab5 WHERE ShipperID=".$id;

// Execute the SQL query and store the result of the execution into $result
$result = mysqli_query($db, $sql);

// Clean up
include("includes/closeDbConn.php");

// Redirect to default
header("Location: select.php");
exit();
?>
