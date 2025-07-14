<?php
session_start();
include("includes/openDbConn.php");
include("includes/getUserInfo.php");

if (empty($_SESSION["successMessage"])) $_SESSION["successMessage"] = "";
if (empty($_SESSION["errorMessage"])) $_SESSION["errorMessage"] = "";
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

                <h2>Account Information</h2>

                <!-- Success Message -->

                <?php if (!empty($_SESSION["successMessage"])): ?>
                    <div class="data" id="successContainer">
                        <div id="successMessage" style="color: green; font-weight: bold;">
                            <?= $_SESSION["successMessage"] ?>
                        </div>
                    </div>
                    <?php $_SESSION["successMessage"] = ""; ?>
                <?php endif; ?>

                <!-- Form to update the Account Information -->
                 
                <form id="form3" name="form3" method="post" action="doUpdateAccount.php">
                    <fieldset>
                        <legend>Update Account Information</legend>
                        <ul>
                            <li class="text-group">
                                <label title="Username"  for="username">Username <span>*</span></label>
                                <input name="usernameDis" id="usernameDis" type="text" size="30" maxlength="3" disabled="disabled"
                                       value="<?php echo trim($username); ?>" />
                                <input name="username" id="username" type="hidden"
                                       value="<?php echo trim($username); ?>" />
                            </li>
                            <li class="field-text">
                                <label title="Firstname" for="firstname">First Name <span>*</span></label>
                                <input name="firstname" id="firstname" type="text" size="30" maxlength="25"
                                       value="<?php echo trim($firstname); ?>" />
                            </li>
                            <li class="field-text">
                                <label title="Lastname" for="lastname">Last Name <span>*</span></label>
                                <input name="lastname" id="lastname" type="text" size="30" maxlength="60"
                                       value="<?php echo trim($lastname); ?>" />
                            </li>
                            <li class="field-text">
                                <label title="Password" for="password">Password <span>*</span></label>
                                <input name="password" id="password" type="password" size="30" maxlength="60"/>
                            </li>
                            <li class="field-text">
                                <label title="Email" for="email">Email <span>*</span></label>
                                <input name="email" id="email" type="text" size="30" maxlength="40"
                                       value="<?php echo trim($email); ?>" />
                            </li>
                            <li class="radio-group">
                                <label title="Newsletter" for="newsletter">Newsletter <span>*</span></label>
                                <div class="radio-opts">
                                    <label title="NewsletterYes" for="yes"><input type="radio" id="yes" name="newsletter" value="Yes"
                                            <?php if (trim($newsletter) == "Yes") { echo "checked"; } ?> />Yes</label>
                                    <label title="NewsletterNo" for="no"><input type="radio" id="no" name="newsletter" value="No"
                                            <?php if (trim($newsletter) == "No") { echo "checked"; } ?> />No</label>
                                </div>
                            </li>
                            <li class="err-group">
                                <span><?= $_SESSION["errorMessage"] ?></span>
                            </li>
                            <li class="submit-group">
                                <input type="submit" value="Update Info" name="submit" id="submit"/>
                            </li>
                        </ul>
                    </fieldset>
                </form>

                <!-- Table to display the Current Account Information -->

                <table id="table3">
                    <thead>
                        <tr>
                            <tr><th colspan="2" class="table-title">Current Account Information</th></tr>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">Information pulled from P2User table.</td></tr></tfoot>
                    <tr>
                        <th>Username</th>
                        <td><?= htmlspecialchars($username) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($email) ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?= htmlspecialchars($lastname) ?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?= htmlspecialchars($firstname) ?></td>
                    </tr>
                    <tr>
                        <th>Newsletter</th>
                        <td><?= htmlspecialchars($newsletter) ?></td>
                    </tr>
                </table>

            <?php endif; ?>
        </div>

        <script>
            $(document).ready(function(){
                $("#successContainer").on("click", function() {
                    $(this).fadeOut(500);
                });
            });
        </script>

    </body>
</html>



