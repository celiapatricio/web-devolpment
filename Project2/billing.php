<?php
session_start();
include("includes/openDbConn.php");
include("includes/getUserInfo.php");

if (isset($_GET["cancel"])) {
    unset($_SESSION["oldBillingID"]);
    header("Location: billing.php");
    exit;
}

if (empty($_SESSION["successMessage"])) $_SESSION["successMessage"] = "";
if (empty($_SESSION["errorMessage"])) $_SESSION["errorMessage"] = "";

// Modo edición si hay un ID presente
$id = $_GET["id"] ?? $_SESSION["oldBillingID"] ?? "";
$isEditing = !empty($id);

if ($isEditing) $_SESSION["oldBillingID"] = $id;
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
            <img src="img/icono-white&blue.png" alt="Logo" id="logo">
            <h1>Welcome to C!</h1>

            <div id="meta1"><?php include("includes/menu.php"); ?></div>
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
                <div class="data"><p>You must register or login to access this information!</p></div>
            <?php else: ?>

                <h2>Billing Information</h2>

                <!-- Success Message -->

                <?php if (!empty($_SESSION["successMessage"])): ?>
                    <div class="data" id="successContainer">
                        <div id="successMessage" style="color: green; font-weight: bold;">
                            <?= $_SESSION["successMessage"] ?>
                        </div>
                    </div>
                    <?php $_SESSION["successMessage"] = ""; ?>
                <?php endif; ?>

                <!-- Table -->
                <?php
                $sql = "SELECT * FROM P2Billing WHERE Login = '$username'";
                $result = mysqli_query($db, $sql);
                $num_results = mysqli_num_rows($result);

                if ($num_results > 0):
                ?>
                    <table id="billingTable">
                        <thead>
                            <tr><th colspan="10" class="table-title">Billing Addresses</th></tr>
                            <tr>
                                <th>Billing ID</th><th>Address 1</th><th>Address 2</th>
                                <th>City</th><th>State</th><th>Zip</th><th>Card Type</th>
                                <th>Card Number</th> <th>Ex. Date</th><th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tfoot><tr><td colspan="10">Information pulled from <?= $firstname ?>'s table.</td></tr></tfoot>
                        
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)):
                                $parts = explode("~", trim($row["BillAddress"]));
                                $Address1 = $parts[0] ?? "";
                                $Address2 = $parts[1] ?? "";
                                $CardNumber = htmlspecialchars($row["CardNumber"]);
                                $CardNumber = str_repeat("X", strlen($CardNumber) - 4) . substr($CardNumber, -4);
                                $CardNumber = implode("-", str_split($CardNumber, 4));
                            ?>
                            <tr>
                                <td><?= trim($row["BillingID"]) ?></td>
                                <td><?= htmlspecialchars($Address1) ?></td>
                                <td><?= htmlspecialchars($Address2) ?></td>
                                <td><?= htmlspecialchars($row["BillCity"]) ?></td>
                                <td><?= htmlspecialchars($row["BillState"]) ?></td>
                                <td><?= htmlspecialchars($row["BillZip"]) ?></td>
                                <td><?= htmlspecialchars($row["CardType"]) ?></td>
                                <td><?= $CardNumber ?></td>
                                <td><?= htmlspecialchars($row["ExpDate"]) ?></td>
                                <td>
                                    <a href="billing.php?id=<?= trim($row["BillingID"]) ?>">edit</a> |
                                    <a href="deleteBilling.php?id=<?= trim($row["BillingID"]) ?>">delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                <!-- Formulario Insert/Update -->
                <?php
                $BillingID = $Address1 = $Address2 = $City = $State = $Zip = $CardType = $CardNumber = $ExpDate = "";
                if ($isEditing) {
                    $sql = "SELECT * FROM P2Billing WHERE BillingID = '$id' AND Login = '$username'";
                    $result = mysqli_query($db, $sql);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["errorMessage"] = "";
                        $BillingID = $row["BillingID"];
                        $City = $row["BillCity"];
                        $State = $row["BillState"];
                        $Zip = $row["BillZip"];
                        $Address = explode("~", trim($row["BillAddress"]));
                        $Address1 = $Address[0] ?? "";
                        $Address2 = $Address[1] ?? "";
                        $CardType = $row["CardType"];
                        $CardNumber = $row["CardNumber"];
                        $ExpDate = explode("/", trim($row["ExpDate"]));
                        $ExpMonth = $ExpDate[0] ?? "";
                        $ExpYear = $ExpDate[1] ?? "";
                    } else {
                        $_SESSION["errorMessage"] = "No records found for the given Billing ID.";
                    }
                }
                ?>

                <form id="form2" name="form2" method="post" action="doBilling.php">
                    <fieldset>
                        <legend><?= $isEditing ? "Update $BillingID information" : "Add a new billing address" ?></legend>
                        <ul>
                            <li class="text-group">
                                <label for="username">Username <span>*</span></label>
                                <input disabled type="text" size="30" value="<?= htmlspecialchars($username) ?>" />
                                <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>" />
                            </li>
                            <li class="text-group">
                                <label for="fullname">Full Name <span>*</span></label>
                                <input disabled type="text" size="30" value="<?= htmlspecialchars($fullname) ?>" />
                                <input type="hidden" name="fullname" value="<?= htmlspecialchars($fullname) ?>" />
                            </li>
                            <li class="text-group">
                                <label for="BillingID">Billing ID <span>*</span></label>
                                <input name="billingID" id="billingID" type="text" size="30" maxlength="30" value="<?= htmlspecialchars($BillingID) ?>" />
                            </li>
                            <li class="text-group">
                                <label for="address1">Address 1 <span>*</span></label>
                                <input name="address1" id="address1" type="text" size="30" maxlength="30" value="<?= htmlspecialchars($Address1) ?>" />
                            </li>
                            <li class="text-group">
                                <label for="address2">Address 2</label>
                                <input name="address2" id="address2" type="text" size="30" maxlength="30" value="<?= htmlspecialchars($Address2) ?>" />
                            </li>
                            <li class="text-group">
                                <label for="city">City <span>*</span></label>
                                <input name="city" id="city" type="text" size="30" maxlength="30" value="<?= htmlspecialchars($City) ?>" />
                            </li>
                            <li class="select-group">
                                <label for="state">State <span>*</span></label>
                                <select name="state" id="state">
                                    <option value="" disabled <?= empty($state) ? 'selected' : '' ?>>Select state</option>
                                    <?php
                                    $states = ["AL"=>"Alabama","AK"=>"Alaska","AZ"=>"Arizona","AR"=>"Arkansas","CA"=>"California","CO"=>"Colorado",
                                               "CT"=>"Connecticut","DE"=>"Delaware","DC"=>"District of Columbia","FL"=>"Florida","GA"=>"Georgia",
                                               "HI"=>"Hawaii","ID"=>"Idaho","IL"=>"Illinois","IN"=>"Indiana","IA"=>"Iowa","KS"=>"Kansas","KY"=>"Kentucky",
                                               "LA"=>"Louisiana","ME"=>"Maine","MD"=>"Maryland","MA"=>"Massachusetts","MI"=>"Michigan","MN"=>"Minnesota",
                                               "MS"=>"Mississippi","MO"=>"Missouri","MT"=>"Montana","NE"=>"Nebraska","NV"=>"Nevada","NH"=>"New Hampshire",
                                               "NJ"=>"New Jersey","NM"=>"New Mexico","NY"=>"New York","NC"=>"North Carolina","ND"=>"North Dakota",
                                               "OH"=>"Ohio","OK"=>"Oklahoma","OR"=>"Oregon","PA"=>"Pennsylvania","RI"=>"Rhode Island","SC"=>"South Carolina",
                                               "SD"=>"South Dakota","TN"=>"Tennessee","TX"=>"Texas","UT"=>"Utah","VT"=>"Vermont","VA"=>"Virginia",
                                               "WA"=>"Washington","WV"=>"West Virginia","WI"=>"Wisconsin","WY"=>"Wyoming"];
                                    foreach ($states as $abbr => $name) {
                                        echo "<option value=\"$abbr\"".($State == $abbr ? " selected" : "").">$name</option>";
                                    }
                                    ?>
                                </select>
                            </li>
                            <li class="text-group">
                                <label for="zip">Zip <span>*</span></label>
                                <input name="zip" id="zip" type="text" size="30" maxlength="5" value="<?= htmlspecialchars($Zip) ?>" />
                            </li>
                            <li class="select-group">
                                <label for="cardType">Card Type <span>*</span></label>
                                <select name="cardType" id="cardType">
                                    <option value="" disabled <?= empty($CardType) ? 'selected' : '' ?>>Select card type</option>
                                    <?php
                                    $cardTypes = ["Visa", "MasterCard", "Discover", "American Express"];
                                    foreach ($cardTypes as $type) {
                                        echo "<option value=\"$type\"".($CardType == $type ? " selected" : "").">$type</option>";
                                    }
                                    ?>
                                </select>
                            </li>
                            <li class="text-group">
                                <label for="cardNumber">Card Number <span>*</span></label>
                                <input name="cardNumber" id="cardNumber" type="text" size="30" maxlength="16" value="<?= htmlspecialchars($CardNumber) ?>" />
                            </li>
                            <li class="select-group">
                                <label title="ExpDate" for="expDate">Expiration Date <span>*</span></label>
                                <select name="expDateMonth" id="expDateMonth">
                                    <option value="" disabled selected>Month</option>
                                    <?php
                                        // Generar opciones de mes
                                        $month = range(1, 12);
                                        $monthName = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        foreach ($month as $index => $m) {
                                            echo "<option value='$m'".($ExpMonth == $m ? " selected" : "").">".$monthName[$index]."</option>";
                                        }
                                    ?>
                                </select>
                                <select name="expDateYear" id="expDateYear">
                                    <option value="" disabled selected>Year</option>
                                    <?php
                                        $years = range(25, 45);
                                        foreach ($years as $y) {
                                            $year = "20" . $y;
                                            echo "<option value='$y'".($ExpYear == $y ? " selected" : "").">$year</option>";
                                        }
                                    ?>
                                </select>
                            </li>
                            <li class="err-group">
                                <span><?= $_SESSION["errorMessage"] ?></span>
                            </li>
                            <li class="submit-group">
                                <input type="submit" value="<?= $isEditing ? "Update billing" : "Add billing" ?>" name="submit" id="submit" />
                                <?php if ($isEditing): ?>
                                    <a href="billing.php?cancel=1">Cancel</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </fieldset>
                </form>
            <?php endif; ?>
        </div>

        <?php
        $_SESSION["errorMessage"] = "";
        ?>

        <script>
            document.getElementById("billingID").focus();
            $(document).ready(function(){
                $("#successContainer").on("click", function() {
                    $(this).fadeOut(500);
                });
            });
        </script>
    </body>
</html>
