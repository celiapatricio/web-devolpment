<?php
session_start();

// Escape special characters
$CarID     = $_POST["carID"];
$CarMake   = addslashes($_POST["carMake"]);
$CarModel  = addslashes($_POST["carModel"]);
$CarYear   = $_POST["carYear"];
$CarColor  = addslashes($_POST["carColor"]);
$CarHybrid = $_POST["carHybrid"];

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CarModel    = str_replace($removeThese, "", $CarModel);
$CarColor    = str_replace($removeThese, "", $CarColor);

// If CarID is empty, redirect to select.php
if (empty($CarID)) {
    header("Location: select.php");
    exit;
}

// Open database connection
include("includes/openDbConn.php");

// Prepare the SQL update statement
$sql = "UPDATE Assign06Cars SET CarMake='".$CarMake."', CarModel='".$CarModel."', CarYear='".$CarYear."', CarColor='".$CarColor."', CarHybrid='".$CarHybrid."' WHERE CarID=".$CarID;

// Execute the SQL query
$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to select.php to see the changes
header("Location: select.php");
exit;
?>
