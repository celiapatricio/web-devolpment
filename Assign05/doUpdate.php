<?php
// Use session object
session_start();

// Open DB connection
include("includes/openDbConn.php");

// Get the data posted from the form
// addslashes will escape special characters, such as an apostrophe
$ShipperID   = $_POST["shipperID"];
$CompanyName = addslashes($_POST["companyName"]);
$Phone       = addslashes($_POST["phone"]);

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CompanyName = str_replace($removeThese, "", $CompanyName);
$Phone = str_replace($removeThese, "", $Phone);

// If shipperID is empty, somebody is typed this page into the URL, redirect them
if (empty($ShipperID)) {
    header("Location: select.php");
    exit();
}

// Prepare SQL statement
$sql = "UPDATE shippersLab5 SET CompanyName='" . $CompanyName . "', Phone='" . $Phone . "' WHERE ShipperID=" . $ShipperID;

// Execute the SQL query and store the result of the execution into $result
$result = mysqli_query($db, $sql);

// Clean up
include("includes/closeDbConn.php");

// Redirect to default
header("Location: select.php");
exit();
?>
