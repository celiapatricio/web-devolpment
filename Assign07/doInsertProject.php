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

// Check the fields
if (($ProjectID == "") || ($ProjectName == "") || ($ProjectCategory == "") ||
    ($ProjectDesc == "") || ($StartDateMonth == "") || ($StartDateDay == "") ||
    ($EndDateMonth == "") || ($EndDateDay == "")) {
    // If you get in here, htere was an empty form field
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insertProject.php");
    exit;
} 

else if (!is_numeric($ProjectID)) {
    // Make sure the ProjectID is a number
    // If you get here, the ProjectID is not a number
    $_SESSION["errorMessage"] = "You must enter a number for ProjectID!";
    header("Location: insertProject.php");
    exit;
}

else {
    // If you get here, there are no errors
    $_SESSION["errorMessage"] = "";
}

// Connect to the database
include("includes/openDbConn.php");

// SQL query
$sql = "SELECT ProjectID FROM Assign06Projects WHERE ProjectID=".$ProjectID;
// echo($sql);

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

// Check to see if project ID from the user is already in the database
if ($num_results != 0) {
    // If you get here, the ProjectID is already in the database
    $_SESSION["errorMessage"] = "The ProjectID you entered already exists!";
    header("Location: insertProject.php");
    exit;
} 

else {
    // If you get here, the ProjectID does nOT exist in the database, so go ahead and add it
    $_SESSION["errorMessage"] = "";
}

// Prepare the SQL statement that will pull all records from the Assign06Projects table

$StartDate = "$StartDateMonth $StartDateDay";
$EndDate = "$EndDateMonth $EndDateDay";
$sql = "INSERT INTO Assign06Projects(ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate) 
        VALUES ('".$ProjectID."', '".$ProjectName."', '".$ProjectCategory."', '".$ProjectDesc."', '".$StartDate."', '".$EndDate."')";
// echo($sql);
// exit;

$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to the select page
header("Location: select.php");
exit;
?>
