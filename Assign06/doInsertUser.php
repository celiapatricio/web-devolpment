<?php
session_start();

// Get the data from insertUser.php
// addslashes will escape special characters, such as an apostrophe
$userID    = $_POST["userID"];
$lastName  = addslashes($_POST["LastName"]);
$firstName = addslashes($_POST["FirstName"]);
$title     = addslashes($_POST["Title"]);

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$lastName    = str_replace($removeThese, "", $lastName);
$firstName   = str_replace($removeThese, "", $firstName);
$title       = str_replace($removeThese, "", $title);

if (($userID == "") || ($lastName == "") || ($firstName == "") || ($title == "")) {
    // Check for empty form fields
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insertUser.php");
    exit;
}
else if (!is_numeric($userID)) {
    // Make sure the UserID is a number
    $_SESSION["errorMessage"] = "You must enter a number for UserID!";
    header("Location: insertUser.php");
    exit;
} 
else {
    // Everything is OK so far
    $_SESSION["errorMessage"] = "";
}

// Open database connection
// Wait until after the above checks to open it because the checks could redirect us
include("includes/openDbConn.php");

// Prepare the SQL statement to check if the UserID already exists
$sql = "SELECT UserID FROM usersLab5 WHERE UserID=".$userID;
echo($sql."<br/>");

// Execute the SQL query and store the result into $result
$result = mysqli_query($db, $sql);

// Check if any records exist
if (empty($result)) {
    $num_results = 0;
} 
else {
    $num_results = mysqli_num_rows($result);
}

// Check if UserID from form is already in the DB
if ($num_results != 0) {
    // UserID already exists in the database
    $_SESSION["errorMessage"] = "The UserID you entered already exists!";
    header("Location: insertUser.php");
    exit;
}
else {
    // UserID does not exist, proceed with insertion
    $_SESSION["errorMessage"] = "";
}

// Prepare the INSERT SQL statement
$sql = "INSERT INTO usersLab5 (UserID, LastName, FirstName, Title) VALUES (".$userID.", '".$lastName."', '".$firstName."', '".$title."')";
echo($sql."<br/>");

// Execute the SQL query
$result = mysqli_query($db, $sql);

// Clean up, close the database connection
include("includes/closeDbConn.php");

// Redirect to select.php to see the changes
header("Location: select.php");
exit;
?>