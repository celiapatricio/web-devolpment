<?php
// Store the posted data in to variables
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

// Example 1
// Do this example last -- this is the way we actually want you to write
// the if statements when there is only 1 line in the body
if (($userID == "page1") && ($passwd == "alpha"))
    header("Location:page1.php");
else if (($userID == "page2") && ($passwd == "beta"))
    header("Location:page2.php");
else if (($userID == "page3") && ($passwd == "gamma"))
    header("Location:page3.php");
else
    header("Location:error.php");
?>