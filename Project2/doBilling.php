<?php
session_start();

include("includes/openDbConn.php");
include("includes/getUserInfo.php");

$Username   = $username;
$Fullname   = addslashes($_POST["fullname"]);
$BillingID = $_POST["billingID"];
$OldBillingID = $_SESSION["oldBillingID"] ?? "";
$Address1   = addslashes($_POST["address1"]);
$Address2   = addslashes($_POST["address2"]);
$City       = addslashes($_POST["city"]);
$State      = $_POST["state"];
$Zip        = $_POST["zip"];
$CardType   = $_POST["cardType"];
$CardNumber = $_POST["cardNumber"];
$ExpMonth   = $_POST["expDateMonth"];
$ExpYear    = $_POST["expDateYear"];

$removeThese = ["<?php", "<?", "</", "<", "?>", "/>", ">", ";"];
$BillingID = str_replace($removeThese, "", $BillingID);
$Address1 = str_replace($removeThese, "", $Address1);
$Address2 = str_replace($removeThese, "", $Address2);
$City = str_replace($removeThese, "", $City);
$Zip = str_replace($removeThese, "", $Zip);
$CardNumber = str_replace($removeThese, "", $CardNumber);

if ($BillingID == "" || $Address1 == "" || $City == "" || $State == "" || $Zip == "" || 
    $CardType == "" || $CardNumber == "" || $ExpMonth == "" || $ExpYear == "") {
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: billing.php" . (!empty($OldBillingID) ? "?id=" . $OldBillingID : ""));
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

$Address = trim($Address1) . "~" . trim($Address2);
$ExpDate = $ExpMonth . "/" . $ExpYear;

// UPDATE
if (!empty($OldBillingID)) {
    $checkSql = "SELECT * FROM P2Billing WHERE BillingID = '$OldBillingID' AND Login = '$Username'";
    $result = mysqli_query($db, $checkSql);
    $exists = (mysqli_num_rows($result) != 0);

    if ($exists && $BillingID != $OldBillingID) {
        $_SESSION["errorMessage"] = "The BillingID you entered already exists!";
        header("Location: billing.php?id=" . $OldBillingID);
        exit;
    }

    $sql = "UPDATE P2Billing SET BillingID = '$BillingID', BillAddress = '$Address', BillCity = '$City', BillState = '$State', BillZip = '$Zip', CardType = '$CardType', CardNumber = '$CardNumber', ExpDate = '$ExpDate' 
            WHERE BillingID = '$OldBillingID' AND Login = '$Username'";
    $_SESSION["errorMessage"] = "";
    $_SESSION["successMessage"] = "You have successfully updated the billing address!";
    unset($_SESSION["oldBillingID"]);
} 

// INSERT
else {
    $checkSql = "SELECT BillingID FROM P2Billing WHERE Login = '$Username' AND BillingID = '$BillingID'";
    $result = mysqli_query($db, $checkSql);
    if (mysqli_num_rows($result) != 0) {
        $_SESSION["errorMessage"] = "The BillingID you entered already exists!";
        header("Location: billing.php");
        exit;
    }

    $sql = "INSERT INTO P2Billing (BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate)
            VALUES ('$BillingID', '$Username', '$Fullname', '$Address', '$City', '$State', '$Zip', '$CardType', '$CardNumber', '$ExpDate')";
    $_SESSION["successMessage"] = "You have successfully added a new billing address!";
}

mysqli_query($db, $sql);
include("includes/closeDbConn.php");

header("Location: billing.php");
exit;
?>
