<?php
session_start();

// Get the data from insert.php
// addslashes will escape special characters, such as an apostrophe
$BookID = $_POST["bookID"];
$Title = addslashes($_POST["title"]);
$Author = addslashes($_POST["author"]);
$Topic = $_POST["topic"];
$Genre = $_POST["genre"];
$Isbn = addslashes($_POST["isbn"]);
$Month = $_POST["month"];
$Year = $_POST["year"];
$Hardcover = isset($_POST["hardcover"]) ? 1 : 0;

// Remove potential harmful characters
$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Title = str_replace($removeThese, "", $Title);
$Author = str_replace($removeThese, "", $Author);
$Isbn = str_replace($removeThese, "", $Isbn);

// If BookID is empty, redirect to select.php
if (empty($BookID)) {
    header("Location: select.php");
    exit;
}

// Open database connection
include("includes/openDbConn.php");

// Prepare the SQL update statement
$DatePublished = $Month . " " . $Year; 
$Hardcover = isset($_POST["hardcover"]) ? "Yes" : "No";
$sql = "UPDATE P1Books SET Title='".$Title."', Author='".$Author."', Topic='".$Topic."', Genre='".$Genre."', ISBN='".$Isbn."', DatePublished='".$DatePublished."', Hardcover='".$Hardcover."' WHERE BookID=".$BookID;

// Execute the SQL query
$result = mysqli_query($db, $sql);

// Close the database connection
include("includes/closeDbConn.php");

// Redirect to select.php to see the changes
header("Location: select.php");
exit;
?>
