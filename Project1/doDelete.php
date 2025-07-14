<?php
// Use session object
session_start();

// Get the user ID from the GET request
$id = $_GET["id"];

// Open the database connection
include("includes/openDbConn.php");

// Prepare the delete statement
$sql = "DELETE FROM P1Books WHERE BookID=".$id;

// Execute the SQL query and store the result of the execution into $result
$result = mysqli_query($db, $sql);

// Clean up, close the database connection
include("includes/closeDbConn.php");

// Redirect user to select.php
header("Location: select.php");
exit;
?>