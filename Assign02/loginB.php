<?php
// Store the posted data in to variables
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

// Example 1
// Do this example last -- this is the way we actually want you to write
// the if statements when there is only 1 line in the body
if (($userID == "season1") && ($passwd == "spring"))
    header("Location:page1B.php");
else if (($userID == "season2") && ($passwd == "summer"))
    header("Location:page2B.php");
else if (($userID == "season3") && ($passwd == "fall"))
    header("Location:page3B.php");
else if (($userID == "season4") && ($passwd == "winter"))
    header("Location:page4B.php");
else
    header("Location:errorB.php");
?>