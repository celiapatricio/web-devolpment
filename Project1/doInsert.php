<?php
session_start();

// Obtain the inputs from the form
// Escape special characters
$BookID = $_POST["bookID"];
$Title = addslashes($_POST["title"]);
$Author = addslashes($_POST["author"]);
$Topic = $_POST["topic"];
$Genre = $_POST["genre"] ?? "";
$Isbn = addslashes($_POST["isbn"]);
$Month = $_POST["month"];
$Year = $_POST["year"];
$Hardcover = isset($_POST["hardcover"]) ? 1 : 0;

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Title = str_replace($removeThese, "", $Title);
$Author = str_replace($removeThese, "", $Author);
$Isbn = str_replace($removeThese, "", $Isbn);

// Check the fields
if (($BookID == "") || ($Title == "") || ($Author == "") || ($Topic == "") || 
    ($Genre == "") || ($Isbn == "") || ($Year == "") || ($Month == "") )
{
    // If you get in here, there was an empty form field
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insert.php");
    exit;
} 
else if (!is_numeric($BookID)) {
    $_SESSION["errorMessage"] = "BookID must be numeric!";
    header("Location: insert.php");
    exit;
}
else if (!is_numeric($Isbn)) {
    $_SESSION["errorMessage"] = "ISBN must be numeric!";
    header("Location: insert.php");
    exit;
} 
else {
    $_SESSION["errorMessage"] = "";
}

// Connect to the database
include("includes/openDbConn.php");

// SQL query to check if the BookID already exists
$sql = "SELECT BookID FROM P1Books WHERE BookID=".$BookID;
$result = mysqli_query($db, $sql);

if (empty($_result)) {
    $num_results = 0;
} else {
    $num_results = mysqli_num_rows($_result);
}

// Check to see if BookID from the user is already in the database
if ($num_results != 0) {
    // If you get here, the BookID is already in the database
    $_SESSION["errorMessage"] = "The BookID you entered already exists!";
    header("Location: insert.php");
    exit;
}
else {
    // If you get here, the BookID does not exist in the database, so go ahead and add it
    $_SESSION["errorMessage"] = "";
}

// Format the date for insertion into the database
$DatePublished = "$Month $Year";
$Hardcover = isset($_POST["hardcover"]) ? "Yes" : "No";

// Insert the new book into the database
$sql = "INSERT INTO P1Books (BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover) 
        VALUES ($BookID, '$Title', '$Author', '$Topic', '$Genre', '$Isbn', '$DatePublished', '$Hardcover')";
    
$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

// Redirect to the select page
header("Location: select.php");
exit;
?>
