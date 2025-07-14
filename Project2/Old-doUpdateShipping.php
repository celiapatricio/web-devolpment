<?php
session_start();

include("includes/openDbConn.php");
include("includes/getUserInfo.php");

// Escape special characters
$Username   = $username;
$Fullname   = addslashes($fullname);
$ShippingID = $_POST["shippingID"];
$OldShippingID = $_SESSION["oldShippingID"];
$Address1   = addslashes($_POST["address1"]);
$Address2   = addslashes($_POST["address2"]);
$City       = addslashes($_POST["city"]);
$State      = $_POST["state"];
$Zip        = $_POST["zip"];

// Remove any PHP tags or HTML tags from the input
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$ShippingID = str_replace($removeThese, "", $ShippingID);
$Address1   = str_replace($removeThese, "", $Address1);
$Address2   = str_replace($removeThese, "", $Address2);
$City       = str_replace($removeThese, "", $City);
$State      = str_replace($removeThese, "", $State);
$Zip        = str_replace($removeThese, "", $Zip);

// Check the fields
if (($ShippingID == "") || ($Address1 == "") ||
    ($City == "") || ($State == "") || ($Zip == "")) {
    // If you get in here, htere was an empty form field
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: updateShipping.php");
    exit;
}

else {
    // If you get here, there are no errors
    $_SESSION["errorMessage"] = "";
}

// SQL query
$sql = "SELECT * FROM P2Shipping WHERE ShippingID = '" . $OldShippingID . "' AND Login = '" . $Username . "'";
// echo($sql);

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

// Check to see if shipping ID from the user is already in the database
if (($num_results != 0) && ($ShippingID != $OldShippingID)) {
    // If you get here, the ShippingID is already in the database
    $_SESSION["errorMessage"] = "The ShippingID you entered already exists!";
    header("Location: updateShipping.php");
    exit;
} 

else {
    // If you get here, the shipperID does nOT exist in the database, so go ahead and add it
    $_SESSION["errorMessage"] = "";
}

$Address = trim($Address1) . "~" . trim($Address2);
$sql = "UPDATE P2Shipping SET ShippingID = '" . $ShippingID . "', Address = '" . $Address . "', City = '" . $City . "', State = '" . $State . "', Zip = '" . $Zip . "' WHERE ShippingID = '" . $OldShippingID . "' AND Login = '" . $Username . "'";
// echo($sql);
// exit;

$result = mysqli_query($db, $sql);

$_SESSION["successMessage"] = "You have successfully update the shipping address!";

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to the shipping page
header("Location: shipping.php");
exit;
?>
