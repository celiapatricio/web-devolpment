<?php
// Use session object
session_start();

// Get the user ID from the GET request
$Username = $_SESSION["username"];
$ShippingID = $_POST["shippingID"];

// Open the database connection
include("includes/openDbConn.php");

// Prepare the delete statement
$sql = "DELETE FROM P2Shipping WHERE ShippingID = '" . $ShippingID . "' AND Login = '" . $Username . "'";

// Execute the SQL query and store the result of the execution into $result
$result = mysqli_query($db, $sql);

// Clean up, close the database connection
include("includes/closeDbConn.php");

// Redirect user to shipping.php
header("Location: shipping.php");
exit;
?>