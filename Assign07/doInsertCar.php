<?php
session_start();

// Escape special characters
$CarID   = $_POST["carID"];
$CarMake = addslashes($_POST["carMake"]);
$CarModel = addslashes($_POST["carModel"]);
$CarYear = $_POST["carYear"];
$CarColor = addslashes($_POST["carColor"]);
$CarHybrid = $_POST["carHybrid"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CarModel    = str_replace($removeThese, "", $CarModel);
$CarColor    = str_replace($removeThese, "", $CarColor);

// Check the fields
if (($CarID == "") || ($CarMake == "") || ($CarModel == "") ||
    ($CarYear == "") || ($CarColor == "") || ($CarHybrid == "")) {
    // If you get in here, htere was an empty form field
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insertCar.php");
    exit;
} 

else if (!is_numeric($CarID)) {
    // Make sure the CarID is a number
    // If you get here, the CarID is not a number
    $_SESSION["errorMessage"] = "You must enter a number for CarID!";
    header("Location: insertCar.php");
    exit;
}

else {
    // If you get here, there are no errors
    $_SESSION["errorMessage"] = "";
}

// Connect to the database
include("includes/openDbConn.php");

// SQL query
$sql = "SELECT CarID FROM Assign06Cars WHERE CarID=".$CarID;
// echo($sql);

$_result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

// Check to see if car ID from the user is already in the database
if ($num_results != 0) {
    // If you get here, the CarID is already in the database
    $_SESSION["errorMessage"] = "The CarID you entered already exists!";
    header("Location: insertCar.php");
    exit;
} 

else {
    // If you get here, the shipperID does nOT exist in the database, so go ahead and add it
    $_SESSION["errorMessage"] = "";
}

$sql = "INSERT INTO Assign06Cars(CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid) 
        VALUES ('".$CarID."', '".$CarMake."', '".$CarModel."', '".$CarYear."', '".$CarColor."', '".$CarHybrid."')";
// echo($sql);
// exit;

$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to the select page
header("Location: select.php");
exit;
?>
