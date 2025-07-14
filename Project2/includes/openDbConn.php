<?php

@ $db = mysqli_connect("goss.tech.purdue.edu", "cgt356web1s", "Successes1s7254");
mysqli_select_db($db, "cgt356web1s") or die(mysqli_error());

// Check to see if the connection was successful
if (!$db) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

?> 