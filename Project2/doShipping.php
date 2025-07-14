<?php
session_start();

include("includes/openDbConn.php");
include("includes/getUserInfo.php");

$Username   = $username;
$Fullname   = addslashes($_POST["fullname"]);
$ShippingID = $_POST["shippingID"];
$OldShippingID = $_SESSION["oldShippingID"] ?? "";
$Address1   = addslashes($_POST["address1"]);
$Address2   = addslashes($_POST["address2"]);
$City       = addslashes($_POST["city"]);
$State      = $_POST["state"];
$Zip        = $_POST["zip"];

$removeThese = ["<?php", "<?", "</", "<", "?>", "/>", ">", ";"];
$ShippingID = str_replace($removeThese, "", $ShippingID);
$Address1 = str_replace($removeThese, "", $Address1);
$Address2 = str_replace($removeThese, "", $Address2);
$City = str_replace($removeThese, "", $City);
$State = str_replace($removeThese, "", $State);
$Zip = str_replace($removeThese, "", $Zip);

if ($ShippingID == "" || $Address1 == "" || $City == "" || $State == "" || $Zip == "") {
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: shipping.php" . (!empty($OldShippingID) ? "?id=" . $OldShippingID : ""));
    exit;
} else {
    $_SESSION["errorMessage"] = "";
}

$Address = trim($Address1) . "~" . trim($Address2);

// UPDATE
if (!empty($OldShippingID)) {
    $checkSql = "SELECT * FROM P2Shipping WHERE ShippingID = '$OldShippingID' AND Login = '$Username'";
    $_result = mysqli_query($db, $checkSql);
    $exists = (mysqli_num_rows($_result) != 0);

    if ($exists && $ShippingID != $OldShippingID) {
        $_SESSION["errorMessage"] = "The ShippingID you entered already exists!";
        header("Location: shipping.php?id=" . $OldShippingID);
        exit;
    }

    $sql = "UPDATE P2Shipping SET ShippingID = '$ShippingID', Address = '$Address', City = '$City', State = '$State', Zip = '$Zip' WHERE ShippingID = '$OldShippingID' AND Login = '$Username'";
    $_SESSION["successMessage"] = "You have successfully updated the shipping address!";
    unset($_SESSION["oldShippingID"]);
} 

// INSERT
else {
    $checkSql = "SELECT ShippingID FROM P2Shipping WHERE Login = '$Username' AND ShippingID = '$ShippingID'";
    $_result = mysqli_query($db, $checkSql);
    if (mysqli_num_rows($_result) != 0) {
        $_SESSION["errorMessage"] = "The ShippingID you entered already exists!";
        header("Location: shipping.php");
        exit;
    }

    $sql = "INSERT INTO P2Shipping (ShippingID, Login, Name, Address, City, State, Zip) 
            VALUES ('$ShippingID', '$Username', '$Fullname', '$Address', '$City', '$State', '$Zip')";
    $_SESSION["successMessage"] = "You have successfully added a new shipping address!";
}

mysqli_query($db, $sql);
include("includes/closeDbConn.php");

header("Location: shipping.php");
exit;
?>
