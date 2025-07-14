<?php
session_start();

// Escape special characters
$Username   = $_POST["username"];
$Password = $_POST["password"];

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Username = str_replace($removeThese, "", $Username);
$Password = str_replace($removeThese, "", $Password);

// Check the fields
if (($Username == "") || ($Password == "")) {
    // If you get in here, htere was an empty form field
    $_SESSION["errorMessage0"] = "You must enter a value for all boxes!";
    header("Location: register.php");
    exit;
}

else {
    // If you get here, there are no errors
    $_SESSION["errorMessage0"] = "";
}

// Connect to the database
include("includes/openDbConn.php");

// SQL query
$sql = "SELECT * FROM P2User WHERE Login = '".$Username."'";
// echo($sql);

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

if ($num_results != 1) {
    $_SESSION["errorMessage0"] = "Username does not exist!";
    header("Location: register.php");
    exit;
}

else {
    $_SESSION["errorMessage0"] = "";
}

// SQL query
$sql = "SELECT * FROM P2User WHERE Login = '".$Username."'" . " AND Passwd = '".$Password."'";

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

if ($num_results != 1) {
    $_SESSION["errorMessage0"] = "Incorrect password!";
    header("Location: register.php");
    exit;
}

else {
    $_SESSION["errorMessage0"] = "";
}

$_SESSION["successMessage"] = "You have successfully logged in!";
$_SESSION["username"] = $Username;

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to the select page
header("Location: index.php");
exit;
?>
