<?php
session_start();

// Escape special characters
$ProjectID   = $_POST["projectID"];
$ProjectName = addslashes($_POST["projectName"]);
$ProjectCategory = $_POST["projectCategory"];
$ProjectDesc = addslashes($_POST["projectDesc"]);
$StartDateMonth = $_POST["startDateMonth"];
$StartDateDay = $_POST["startDateDay"];
$EndDateMonth = $_POST["endDateMonth"];
$EndDateDay = $_POST["endDateDay"];

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$ProjectName = str_replace($removeThese, "", $ProjectName);
$ProjectDesc = str_replace($removeThese, "", $ProjectDesc);


// If ProjectID is empty, redirect to select.php
if (empty($ProjectID)) {
    header("Location: select.php");
    exit;
}

// Open database connection
include("includes/openDbConn.php");

// Prepare the SQL update statement
$StartDate = "$StartDateMonth $StartDateDay";
$EndDate = "$EndDateMonth $EndDateDay";
$sql = "UPDATE Assign06Projects SET ProjName = '$ProjectName', ProjCategory = '$ProjectCategory', ProjDesc = '$ProjectDesc', StartDate = '$StartDate', EndDate = '$EndDate' WHERE ProjectID = $ProjectID";

// Execute the SQL query
$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to select.php to see the changes
header("Location: select.php");
exit;
?>
