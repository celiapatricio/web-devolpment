<?php
session_start();
include("includes/openDbConn.php");

if (empty($_SESSION["successMessage"])) {
    $_SESSION["successMessage"] = "";
}

if (empty($_SESSION["errorMessage"])) {
    $_SESSION["errorMessage"] = "";
}

include("includes/getUserInfo.php");

// Get the id of the Billing address to be updated
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>C</title>
        <link rel="icon" type="image/png" href="img/icono-white&blue.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <header>
            <img src="img/icono-white&blue.png" alt="Logo" id="logo" >
            <h1>Welcome to C!</h1>
            
            <!-- Main NavBar -->
            <div id="meta1">
                <?php include("includes/menu.php"); ?>
            </div>
            
            <!-- Login/Register or Welcome NavBar -->
            <div id="meta2">
                <?php if ($firstname != ""): ?>
                    <p>Welcome back, <?= htmlspecialchars($firstname) ?>! (<a class="link2" href="doLogout.php">Logout</a>)</p>
                <?php else: ?>
                    <p><a class="link2" href="register.php?do=register">Register</a> or <a class="link2" href="register.php?do=login">Login</a></p>
                <?php endif; ?>
            </div>
        </header>

        <div class="main-content">
            <?php if ($username == ""): ?>
                <div class="data">
                    <p>You must register or login to access this information!</p>
                </div>
            <?php else: ?>
                
                <h2>Billing Information</h2>
                
                <!-- Delete address in P2Billing -->
                <?php
                // Prepare the SQL statement
                $sql = "SELECT * FROM P2Billing WHERE BillingID = '$id' AND Login = '$username'";
                
                // Execute the SQL query
                $result = mysqli_query($db, $sql);
                
                // Check to see if there are records in the result, if not set the number of records to 0
                if (empty($result)) {
                    $num_results = 0;
                } else {
                    $num_results = mysqli_num_rows($result);
                    // Store a single record into $row
                    $row = mysqli_fetch_assoc($result);
                }

                // Split the address
                $Address = explode("~", trim($row["BillAddress"]));
                $Address1 = isset($parts[0]) ? trim($Address[0]) : "";
                $Address2 = isset($parts[1]) ? trim($Address[1]) : "";
                
                // If there are no records, set the error message
                if ($num_results == 0) {
                    $_SESSION["errorMessage"] = "No records found for the given Billing ID.";
                }
                // If there are records, set the error message to empty
                else {
                    $_SESSION["errorMessage"] = "";
                }
                ?>
                <form id="form2" name="form2" method="post" action="doDeleteBilling.php">
                    <fieldset>
                        <legend>Delete <?php echo htmlspecialchars($id); ?> Billing</legend>
                        <ul>
                            <li class="text-group">
                                <label title="Username" for="username">Username <span>*</span></label>
                                <input name="usernameDis" id="usernameDis" type="text" size="30" maxlength="15" disabled="disabled"
                                    value="<?php echo htmlspecialchars($row["Login"]); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="FullName" for="fullname">Full Name <span>*</span></label>
                                <input name="fullNameDis" id="fullNameDis" type="text" size="30" maxlength="60" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["BillName"]); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="BillingID" for="billingID">Billing ID <span>*</span></label>
                                <input name="billingIDdis" id="billingIDdis" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["BillingID"]); ?>" />
                                <input name="billingID" id="billingID" type="hidden"
                                       value="<?php echo htmlspecialchars($row["BillingID"]); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="Address1" for="address1">Address 1 <span>*</span></label>
                                <input name="address1" id="address1" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($Address1); ?>" />

                            </li>
                            <li class="text-group">
                                <label title="Address2" for="address2">Address 2 </label>
                                <input name="address2" id="address2" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($Address2); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="City" for="city">City <span>*</span></label>
                                <input name="city" id="city" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["BillCity"]); ?>" />
                            </li>
                            <li class="select-group">
                                <label title="State" for="state">State <span>*</span></label>
                                <select name="state" id="state" disabled="disabled">
                                    <option value="" disabled>Select state</option>
                                    <?php
                                    $state = $row["BillState"];
                                    $states = ["AL" => "Alabama", "AK" => "Alaska", "AZ" => "Arizona", "AR" => "Arkansas", "CA" => "California",
                                        "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida",
                                        "GA" => "Georgia", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa",
                                        "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MD" => "Maryland",
                                        "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri",
                                        "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey",
                                        "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio",
                                        "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "RI" => "Rhode Island", "SC" => "South Carolina",
                                        "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont",
                                        "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming"
                                    ];
                                    foreach ($states as $abbr => $name) {
                                        echo "<option value=\"$abbr\"";
                                        if ($state == $abbr) echo " selected";
                                        echo ">$name</option>";
                                    }
                                    ?>
                                </select>
                            </li>
                            <li class="text-group">
                                <label title="Zip" for="zip">Zip <span>*</span></label>
                                <input name="zip" id="zip" type="text" size="30" maxlength="5" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["BillZip"]); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="CardType" for="cardType">Card Type <span>*</span></label>
                                <input name="cardType" id="cardType" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["CardType"]); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="CardNumber" for="cardNumber">Card Number <span>*</span></label>
                                <input name="cardNumber" id="cardNumber" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["CardNumber"]); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="ExpDate" for="expDate">Expiration Date <span>*</span></label>
                                <input name="expDate" id="expDate" type="text" size="30" maxlength="30" disabled="disabled"
                                       value="<?php echo htmlspecialchars($row["ExpDate"]); ?>" />
                            </li>
                            <li class="err-group">
                                <span><?php echo($_SESSION["errorMessage"]); ?></span>
                            </li>
                            <li class="submit-group">
                                <input type="submit" value="Delete billing" name="submit" id="submit" />
                                <a href="billing.php" id="link2">Cancel</a>
                            </li>
                        </ul>
                    </fieldset>
                </form>
            <?php endif; ?>
        </div>

        <?php
        // Clear the error message, we used it above
        $_SESSION["errorMessage"] = "";
        ?>
    </body>

</html>