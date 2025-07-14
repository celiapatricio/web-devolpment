<?php
// Initialize variables
$username = "";
$firstname = "";
$lastname = "";

// If there is a user logged in, get its info
if (isset($_SESSION["username"])) {
    // SQL query
    $sql = "SELECT * FROM P2User WHERE Login = '" . $_SESSION["username"] . "'";
    $result = mysqli_query($db, $sql);

    if (empty($result)) {
        $num_results = 0;
    } else {
        $row = mysqli_fetch_assoc($result);
        $username = $row["Login"];
        $firstname = $row["FirstName"];
        $lastname = $row["LastName"];
        $password = $row["Passwd"];
        $email = $row["Email"];
        $newsletter = $row["NewsLetter"];
    }
}

$fullname = $firstname . " " . $lastname;
?>
