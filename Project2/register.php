<?php
session_start();
// If errorMessage has never been used, we will create it
if(empty($_SESSION["errorMessage0"])){
    $_SESSION["errorMessage0"] = "";
}
// If errorMessage has never been used, we will create it
if(empty($_SESSION["errorMessage1"])){
    $_SESSION["errorMessage1"] = "";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>C — Login</title>
        <link rel="icon" type="image/png" href="img/icono-white&blue.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>

    <body>
        <header>
            <img src="img/icono-white&blue.png" alt="Logo" id="logo" >
            <h1>Welcome to C!</h1>
            <div id="meta1">
                <?php include("includes/menu.php"); ?>
            </div>
            
            <div id="meta2">
                <p><a class="link2" href="register.php?do=register">Register</a> or <a class="link2" href="register.php?do=login">Login</a></p>
            </div>
        </header>

        <div class="main-content">
            <form id="form0" name="form0" method="post" action="doLogin.php">
                <fieldset>
                    <legend>Login</legend>
                    <ul>
                        <li class="field-text">
                            <label title="Username" for="username">Username <span>*</span></label>
                            <input name="username" id="login" type="text" size="30" maxlength="15"/>
                        </li>
                        <li class="field-text">
                            <label title="Password" for="password">Password <span>*</span></label>
                            <input name="password" id="password" type="password" size="30" maxlength="60"/>
                        </li>
                        <li class="field-errmsg">
                            <span><?php echo($_SESSION["errorMessage0"]);?></span>
                        </li>
                        <li class="field-submit">
                            <input type="submit" value="Login" name="submit" id="submit"/>
                        </li>
                    </ul>
                </fieldset>
            </form>
            
            <form id="form1" name="form1" method="post" action="doRegister.php">
                <fieldset>
                    <legend>Register</legend>
                    <ul>
                        <li class="field-text">
                            <label title="Username" for="username">Username <span>*</span></label>
                            <input name="username" id="register" type="text" size="30" maxlength="15"/>
                        </li>
                        <li class="field-text">
                            <label title="Firstname" for="firstname">First Name <span>*</span></label>
                            <input name="firstname" id="firstname" type="text" size="30" maxlength="25"/>
                        </li>
                        <li class="field-text">
                            <label title="Lastname" for="lastname">Last Name <span>*</span></label>
                            <input name="lastname" id="lastname" type="text" size="30" maxlength="60"/>
                        </li>
                        <li class="field-text">
                            <label title="Password" for="password">Password <span>*</span></label>
                            <input name="password" id="password" type="password" size="30" maxlength="60"/>
                        </li>
                        <li class="field-text">
                            <label title="Email" for="email">Email <span>*</span></label>
                            <input name="email" id="email" type="text" size="30" maxlength="40"/>
                        </li>
                        <li class="radio-group">
                            <label title="Newsletter" for="newsletter">Newsletter <span>*</span></label>
                            <div class="radio-opts">
                                <label title="NewsletterYes" for="yes"><input type="radio" id="yes" name="newsletter" value="Yes"/>Yes</label>
                                <label title="CNewsletterNo" for="no"><input type="radio" id="no" name="newsletter" value="No"/>No</label>
                            </div>
                        </li>
                        <li class="field-errmsg">
                            <span><?php echo($_SESSION["errorMessage1"]);?></span>
                        </li>
                        <li class="field-submit">
                            <input type="submit" value="Register" name="submit" id="submit"/>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>

        <?php
        // Clear the error message, we used it above
        $_SESSION["errorMessage"] = "";
        ?>

        <script>
            function getQueryParam(param) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            const action = getQueryParam('do');
            if (action === 'register') {
                document.getElementById("register").focus();
            } else {
                document.getElementById("login").focus();
            }
        </script>


    </body>
</html>
