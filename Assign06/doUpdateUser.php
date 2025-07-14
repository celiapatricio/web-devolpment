<?php
session_start();

// Get the data from insert.php
// addslashes will escape special characters, such as an apostrophe
$userID = $_POST["userID"];
$lastName = addslashes($_POST["LastName"]);
$firstName = addslashes($_POST["FirstName"]);
$title = addslashes($_POST["Title"]);

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$lastName = str_replace($removeThese, "", $lastName);
$firstName = str_replace($removeThese, "", $firstName);
$title = str_replace($removeThese, "", $title);

// If userID is empty, redirect to select.php
if (empty($userID)) {
    header("Location: select.php");
    exit;
}

// Open database connection
include("includes/openDbConn.php");

// Prepare the SQL update statement
$sql = "UPDATE usersLab5 SET FirstName='".$firstName."', LastName='".$lastName."', Title='".$title."' WHERE UserID=".$userID;
echo($sql); // This is how you debug your SQL query

// Execute the SQL query
$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to select.php to see the changes
header("Location: select.php");
exit;
?>
