<?php
session_start();

// Escape special characters
$ShipperID   = $_POST["shipperID"];
$CompanyName = addslashes($_POST["companyName"]);
$Phone       = addslashes($_POST["phone"]);

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CompanyName = str_replace($removeThese, "", $CompanyName);
$Phone       = str_replace($removeThese, "", $Phone);

// Check the fields
if (($ShipperID == "") || ($CompanyName == "") || ($Phone == "")) {
    // If you get in here, htere was an empty form field
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insert.php");
    exit;
} 

else if (!is_numeric($ShipperID)) {
    // Make sure the shipperID is a number
    // If you get here, the shipperID is not a number
    $_SESSION["errorMessage"] = "You must enter a number for shipperID!";
    header("Location: insert.php");
    exit;
}

else {
    // If you get here, there are no errors
    $_SESSION["errorMessage"] = "";
}

// Connect to the database
include("includes/openDbConn.php");

// SQL query
$sql = "SELECT ShipperID FROM shippersLab5 WHERE ShipperID=".$ShipperID;
// echo($sql);

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

// Check to see if shipper ID from the user is already in the database
if ($num_results != 0) {
    // If you get here, the shipperID is already in the database
    $_SESSION["errorMessage"] = "The shipperID you entered already exists!";
    header("Location: insert.php");
    exit;
} 

else {
    // If you get here, the shipperID does nOT exist in the database, so go ahead and add it
    $_SESSION["errorMessage"] = "";
}

$sql = "INSERT INTO shippersLab5(ShipperID, CompanyName, Phone) VALUES (".$ShipperID.", '".$CompanyName."', '".$Phone."')";
// echo($sql);
// exit;

$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to the select page
header("Location: select.php");
exit;
?>
