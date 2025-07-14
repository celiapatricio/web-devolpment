<?php
session_start();
include("includes/openDbConn.php");

if (empty($_SESSION["successMessage"])) {
    $_SESSION["successMessage"] = "";
}

include("includes/getUserInfo.php");
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>C</title>
        <link rel="icon" type="image/png" href="img/icono-white&blue.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
                    <p><a class="link2" href="register.php">Register</a> or <a class="link2" href="register.php">Login</a></p>
                <?php endif; ?>
            </div>
        </header>

        <div class="main-content">
            <?php if ($username == ""): ?>
                <div class="data">
                    <p>You must register or login to access this information!</p>
                </div>
            <?php else: ?>
                
                <h2>Shipping Information</h2>

                <!-- Success Message -->
                <?php if (!empty($_SESSION["successMessage"])): ?>
                    <div class="data" id="successContainer">
                        <div id="successMessage" style="color: green; font-weight: bold;">
                            <?= $_SESSION["successMessage"] ?>
                        </div>
                    </div>
                    <?php $_SESSION["successMessage"] = ""; ?>
                <?php endif; ?>

                <!-- Shipping Table -->
                <?php
                $sql = "SELECT * FROM P2Shipping WHERE Login = '$username'";
                $result = mysqli_query($db, $sql);
                $num_results = mysqli_num_rows($result);
                
                // Mostrar tabla solo si hay direcciones guardadas
                if ($num_results > 0) {
                ?>
                    <table title="Listing of Shipping" id="shippingTable">
                        <thead>
                            <tr>
                                <th colspan="7" class="table-title">Shipping Addresses</th>
                            </tr>
                            <tr>
                                <th>Shipping ID</th>
                                <th>Address 1</th>
                                <th>Address 2</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="7">Information pulled from <?php $firstname ?>'s table.</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            // Loop through the results
                            for($i = 0; $i < $num_results; $i++) {
                                // Store a single record out of $result into $row
                                $row = mysqli_fetch_array($result);
                                // Below, ALWAYS use trim() on data pulled from the database

                                // Split the address 
                                $fullAddress = trim($row["Address"]);
                                $parts = explode("~", $fullAddress);
                                $Address1 = isset($parts[0]) ? trim($parts[0]) : "";
                                $Address2 = isset($parts[1]) ? trim($parts[1]) : "";
                                ?>

                                <tr>
                                    <td><?php echo( trim( $row["ShippingID"] ) ); ?></td>
                                    <td><?php echo( $Address1 ); ?></td>
                                    <td><?php echo( $Address2 ); ?></td>
                                    <td><?php echo( trim( $row["City"] ) ); ?></td>
                                    <td><?php echo( trim( $row["State"] ) ); ?></td>
                                    <td><?php echo( trim( $row["Zip"] ) ); ?></td>
                                    <td>
                                        <a href="updateShipping.php?id=<?php echo trim($row["ShippingID"]); ?>">edit</a> |
                                        <a href="deleteShipping.php?id=<?php echo trim($row["ShippingID"]); ?>">delete</a>
                                    </td>
                                </tr>
                                
                            <?php } ?>
                        </tbody>
                    </table>
                
                <?php } ?>

                <!-- Insert address in P2Shipping -->
                <form id="form2" name="form2" method="post" action="doInsertShipping.php">
                    <fieldset>
                        <legend>Add a new shipping address</legend>
                        <ul>
                            <li class="text-group">
                                <label title="Username" for="username">Username <span>*</span></label>
                                <input name="usernameDis" id="usernameDis" type="text" size="30" maxlength="15" disabled="disabled"
                                    value="<?php echo htmlspecialchars($username); ?>" />
                                <input name="username" id="username" type="hidden"
                                    value="<?php echo htmlspecialchars($username); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="FullName" for="fullname">Full Name <span>*</span></label>
                                <input name="fullNameDis" id="fullNameDis" type="text" size="30" maxlength="60" disabled="disabled"
                                    value="<?php echo htmlspecialchars($fullname); ?>" />
                                <input name="fullNameDis" id="fullNameDis" type="hidden"
                                    value="<?php echo htmlspecialchars($fullname); ?>" />
                            </li>
                            <li class="text-group">
                                <label title="ShippingID" for="shippingID">Shipping ID <span>*</span></label>
                                <input name="shippingID" id="shippingID" type="text" size="30" maxlength="30" />
                            </li>
                            <li class="text-group">
                                <label title="Address1" for="address1">Address 1 <span>*</span></label>
                                <input name="address1" id="address1" type="text" size="30" maxlength="30" />
                            </li>
                            <li class="text-group">
                                <label title="Address2" for="address2">Address 2 </label>
                                <input name="address2" id="address2" type="text" size="30" maxlength="30" />
                            </li>
                            <li class="text-group">
                                <label title="City" for="city">City <span>*</span></label>
                                <input name="city" id="city" type="text" size="30" maxlength="30" />
                            </li>
                            <li class="select-group">
                                <label title="State" for="state">State <span>*</span></label>
                                <select name="state" id="state">
                                    <option value="" disabled selected>Select state</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </li>
                            <li class="text-group">
                                <label title="Zip" for="zip">Zip <span>*</span></label>
                                <input name="zip" id="zip" type="text" size="30" maxlength="5" />
                            </li>
                            <li class="err-group">
                                <span><?php echo($_SESSION["errorMessage"]); ?></span>
                            </li>
                            <li class="submit-group">
                                <input type="submit" value="Add address" name="submit" id="submit" />
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

        <script type="text/javascript">
            document.getElementById("shippingID").focus();

            $(document).ready(function(){
                // Cuando el usuario haga clic en el mensaje de éxito, que se desvanezca
                $("#successContainer").on("click", function() {
                    $("#successContainer").fadeOut(500);
                });
            });
        </script>
    </body>

</html>