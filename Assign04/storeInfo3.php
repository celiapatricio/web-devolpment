<?php
session_start();
header("Cache-Control: no-cache");

// use SESSION variables
// store posted data into SESSION variables

if (!empty($_POST['projectid'])) {
    $_SESSION['projectid'] = $_POST['projectid'];
}
if (!empty($_POST['projectname'])) {
    $_SESSION['projectname'] = $_POST['projectname'];
}
if (!empty($_POST['projectdescription'])) {
    $_SESSION['projectdescription'] = $_POST['projectdescription'];
}
if (!empty($_POST['managername'])) {
    $_SESSION['managername'] = $_POST['managername'];
}
if (!empty($_POST['manageremail'])) {
    $_SESSION['manageremail'] = $_POST['manageremail'];
}
if (!empty($_POST['managerphone'])) {
    $_SESSION['managerphone'] = $_POST['managerphone'];
}

// Keep people from navigating directly to this page
// The form must be poste from index.php for this page to work
// Check to see if any required element is empty

if ((empty($_POST['projectid']))          || (empty($_POST['projectname']))  || 
    (empty($_POST['projectdescription'])) || (empty($_POST['managername']))  || 
    (empty($_POST['manageremail']))       || (empty($_POST['managerphone']))
) {
    // If any one of the 9 above are true, execute this
    $_SESSION['errorMessage'] = "* Please fill out all required fields.";
    header("Location: index3.php");
    exit;
}

header("Location: displayInfo3.php");

?>