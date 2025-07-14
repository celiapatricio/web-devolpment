<?php
session_start();

// Escape special characters
$Username   = $_POST["username"];
$Firstname = $_POST["firstname"];
$Lastname = $_POST["lastname"];
$Password = $_POST["password"];
$Password2 = $_POST["password2"];
$Email = $_POST["email"];
$Newsletter = $_POST["newsletter"];

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Username = str_replace($removeThese, "", $Username);
$Firstname = str_replace($removeThese, "", $Firstname);
$Lastname = str_replace($removeThese, "", $Lastname);
$Password = str_replace($removeThese, "", $Password);
$Password2 = str_replace($removeThese, "", $Password2);
$Email = str_replace($removeThese, "", $Email);

// Check the fields
if (($Username == "") || ($Firstname == "") || ($Lastname == "") ||
    ($Password == "") || ($Email == "") || ($Newsletter == "")) {
    // If you get in here, htere was an empty form field
    $_SESSION["errorMessage1"] = "You must enter a value for all boxes!";
    header("Location: register.php");
    exit;
}

else {
    // If you get here, there are no errors
    $_SESSION["errorMessage1"] = "";
}

// Connect to the database
include("includes/openDbConn.php");

// SQL query
$sql = "SELECT Login FROM P2User WHERE Login='".$Username."'";
// echo($sql);

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

// Check to see if username from the user is already in the database
if ($num_results != 0) {
    // If you get here, the username is already in the database
    $_SESSION["errorMessage1"] = "The username you entered already exists!";
    header("Location: register.php");
    exit;
}

else {
    // If you get here, the username does nOT exist in the database, so go ahead and add it
    $_SESSION["errorMessage1"] = "";
}

// Prepare the SQL statement that will pull all records from the P2User table

$StartDate = "$StartDateMonth $StartDateDay";
$EndDate = "$EndDateMonth $EndDateDay";
$sql = "INSERT INTO P2User(Login, FirstName, LastName, Passwd, Email, NewsLetter) 
        VALUES ('".$Username."', '".$Firstname."', '".$Lastname."', '".$Password."', '".$Email."', '".$Newsletter."')";
// echo($sql);
// exit;

$result = mysqli_query($db, $sql);

$_SESSION["successMessage"] = "You have successfully registered and logged in!";
$_SESSION["username"] = $Username;

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to the select page
header("Location: index.php");
exit;
?>
