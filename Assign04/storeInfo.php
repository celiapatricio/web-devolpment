<?php
session_start();
header("Cache-Control: no-cache");

// use SESSION variables
// store posted data into SESSION variables

if (!empty($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
}
if (!empty($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}
if (!empty($_POST['city'])) {
    $_SESSION['city'] = $_POST['city'];
}
if (!empty($_POST['state'])) {
    $_SESSION['state'] = $_POST['state'];
}
if (!empty($_POST['zip'])) {
    $_SESSION['zip'] = $_POST['zip'];
}
if (!empty($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
}
if (!empty($_POST['phone'])) {
    $_SESSION['phone'] = $_POST['phone'];
}
if (!empty($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
}
if (!empty($_POST['comments'])) {
    $_SESSION['comments'] = $_POST['comments'];
}

// Keep people from navigating directly to this page
// The form must be poste from index.php for this page to work
// Check to see if any required element is empty

if ((empty($_POST['name']))  || (empty($_POST['address'])) || 
    (empty($_POST['city']))  || (empty($_POST['state']))   || 
    (empty($_POST['zip']))   || (empty($_POST['country'])) || 
    (empty($_POST['phone'])) || (empty($_POST['email']))   || 
    (empty($_POST['comments']))
) {
    // If any one of the 9 above are true, execute this
    $_SESSION['errorMessage'] = "* Please fill out all required fields.";
    header("Location: index.php");
    exit;
}

if (empty($_POST['Sname'])) {
    // no value in Name on the right side
    // copy items on left into the risht side variables
    $_SESSION['Sname'] = $_SESSION['name'];
    $_SESSION['Saddress'] = $_SESSION['address'];
    $_SESSION['Scity'] = $_SESSION['city'];
    $_SESSION['Sstate'] = $_SESSION['state'];
    $_SESSION['Szip'] = $_SESSION['zip'];
    $_SESSION['Scountry'] = $_SESSION['country'];
} else {
    $_SESSION['Sname'] = $_POST['Sname'];
    $_SESSION['Saddress'] = $_POST['Saddress'];
    $_SESSION['Scity'] = $_POST['Scity'];
    $_SESSION['Sstate'] = $_POST['Sstate'];
    $_SESSION['Szip'] = $_POST['Szip'];
    $_SESSION['Scountry'] = $_POST['Scountry'];
}

header("Location: displayInfo.php");

?>