<?php
session_start();

include("includes/openDbConn.php");

// Get the data from account.php
// addslashes will escape special characters, such as an apostrophe
$Username = $_POST["username"];
$Firstname = addslashes($_POST["firstname"]);
$Lastname = addslashes($_POST["lastname"]);
$Password = addslashes($_POST["password"]);
$Email = addslashes($_POST["email"]);
$Newletter = isset($_POST["newsletter"]) ? "Yes" : "No";

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Firstname = str_replace($removeThese, "", $Firstname);
$Lastname = str_replace($removeThese, "", $Lastname);
$Password = str_replace($removeThese, "", $Password);
$Email = str_replace($removeThese, "", $Email);

// Check if any of the fields are empty
if ($Firstname == "" || $Lastname == "" || $Password == "" || $Email == "" || $Newletter == "") {
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: account.php");
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

// Open database connection
include("includes/openDbConn.php");

// Prepare the SQL update statement
$sql = "UPDATE P2User 
        SET FirstName = '$Firstname', LastName = '$Lastname', Passwd = '$Password', Email = '$Email', NewsLetter = '$Newletter' WHERE Login = '$Username'";

// Execute the SQL query
$result = mysqli_query($db, $sql);

// Write the success message
$_SESSION["successMessage"] = "You have successfully updated the account information!";


// Close the database connection
include("includes/closeDbConn.php");

// Redirect to account.php to see the changes
header("Location: account.php");
exit;
?>
