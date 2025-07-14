<?php
session_start();
include("includes/openDbConn.php");
include("includes/getUserInfo.php");

if (isset($_GET["cancel"])) {
    unset($_SESSION["oldShippingID"]);
    header("Location: shipping.php");
    exit;
}

if (empty($_SESSION["successMessage"])) $_SESSION["successMessage"] = "";
if (empty($_SESSION["errorMessage"])) $_SESSION["errorMessage"] = "";

// Modo edición si hay un ID presente
$id = $_GET["id"] ?? $_SESSION["oldShippingID"] ?? "";
$isEditing = !empty($id);

if ($isEditing) $_SESSION["oldShippingID"] = $id;
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

                <h2>Shipping Information</h2>

                <?php if (!empty($_SESSION["successMessage"])): ?>
                    <div class="data" id="successContainer">
                        <div id="successMessage" style="color: green; font-weight: bold;">
                            <?= $_SESSION["successMessage"] ?>
                        </div>
                    </div>
                    <?php $_SESSION["successMessage"] = ""; ?>
                <?php endif; ?>

                <!-- Tabla -->
                <?php
                $sql = "SELECT * FROM P2Shipping WHERE Login = '$username'";
                $result = mysqli_query($db, $sql);
                $num_results = mysqli_num_rows($result);

                if ($num_results > 0):
                ?>
                    <table id="shippingTable">
                        <thead>
                        <tr><th colspan="7" class="table-title">Shipping Addresses</th></tr>
                        <tr>
                            <th>Shipping ID</th><th>Address 1</th><th>Address 2</th>
                            <th>City</th><th>State</th><th>Zip</th><th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot><tr><td colspan="7">Information pulled from <?= $firstname ?>'s table.</td></tr></tfoot>
                        <tbody>
                        <?php while ($row = mysqli_fetch_array($result)):
                            $parts = explode("~", trim($row["Address"]));
                            $Address1 = $parts[0] ?? "";
                            $Address2 = $parts[1] ?? "";
                        ?>
                        <tr>
                            <td><?= trim($row["ShippingID"]) ?></td>
                            <td><?= htmlspecialchars($Address1) ?></td>
                            <td><?= htmlspecialchars($Address2) ?></td>
                            <td><?= htmlspecialchars($row["City"]) ?></td>
                            <td><?= htmlspecialchars($row["State"]) ?></td>
                            <td><?= htmlspecialchars($row["Zip"]) ?></td>
                            <td>
                                <a href="shipping.php?id=<?= trim($row["ShippingID"]) ?>">edit</a> |
                                <a href="deleteShipping.php?id=<?= trim($row["ShippingID"]) ?>">delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                <!-- Formulario Insert/Update -->
                <?php
                $shippingID = $Address1 = $Address2 = $city = $state = $zip = "";
                if ($isEditing) {
                    $sql = "SELECT * FROM P2Shipping WHERE ShippingID = '$id' AND Login = '$username'";
                    $result = mysqli_query($db, $sql);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["errorMessage"] = "";
                        $shippingID = $row["ShippingID"];
                        $city = $row["City"];
                        $state = $row["State"];
                        $zip = $row["Zip"];
                        $parts = explode("~", trim($row["Address"]));
                        $Address1 = $parts[0] ?? "";
                        $Address2 = $parts[1] ?? "";
                    } else {
                        $_SESSION["errorMessage"] = "No records found for the given Shipping ID.";
                    }
                }
                ?>

                <form id="form2" name="form2" method="post" action="doShipping.php">
                    <fieldset>
                        <legend><?= $isEditing ? "Update $shippingID Address" : "Add a new shipping address" ?></legend>
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
                                <label for="shippingID">Shipping ID <span>*</span></label>
                                <input name="shippingID" id="shippingID" type="text" size="30" maxlength="30" value="<?= htmlspecialchars($shippingID) ?>" />
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
                                <input name="city" id="city" type="text" size="30" maxlength="30" value="<?= htmlspecialchars($city) ?>" />
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
                                        echo "<option value=\"$abbr\"".($state == $abbr ? " selected" : "").">$name</option>";
                                    }
                                    ?>
                                </select>
                            </li>
                            <li class="text-group">
                                <label for="zip">Zip <span>*</span></label>
                                <input name="zip" id="zip" type="text" size="30" maxlength="5" value="<?= htmlspecialchars($zip) ?>" />
                            </li>
                            <li class="err-group">
                                <span><?= $_SESSION["errorMessage"] ?></span>
                            </li>
                            <li class="submit-group">
                                <input type="submit" value="<?= $isEditing ? "Update address" : "Add address" ?>" name="submit" id="submit" />
                                <?php if ($isEditing): ?>
                                    <a href="shipping.php?cancel=1">Cancel</a>
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
            document.getElementById("shippingID").focus();
            $(document).ready(function(){
                $("#successContainer").on("click", function() {
                    $(this).fadeOut(500);
                });
            });
        </script>
    </body>
</html>
