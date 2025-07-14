<?php
session_start();
include("includes/openDbConn.php");

if (empty($_SESSION["successMessage"])) {
    $_SESSION["successMessage"] = "";
}

$_SESSION["errorMessage0"] = "";
$_SESSION["errorMessage1"] = "";

include("includes/getUserInfo.php");
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
            <?php if (!empty($_SESSION["successMessage"])): ?>
                <div class="data" id="successContainer">
                    <div id="successMessage" style="color: green; font-weight: bold;">
                        <?= $_SESSION["successMessage"] ?>
                    </div>
                </div>
                <?php $_SESSION["successMessage"] = ""; ?>
            <?php endif; ?>
            
            <div class="data">
                <h2>A little bit about us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper lacinia eros, et mollis ante volutpat sit amet. Nam mollis ornare dui adipiscing feugiat. Ut quis turpis dui, nec euismod felis. Quisque sem dui, commodo in vestibulum quis, consectetur quis neque. Nullam vel nisl turpis. In rutrum, nibh bibendum lacinia convallis, nisi mi luctus metus, sagittis interdum sapien tortor at risus. Etiam accumsan arcu eget eros ultrices euismod. Aliquam sit amet nisl eget sapien fermentum aliquam. Etiam vitae eros ipsum. Praesent eleifend urna ac odio sagittis nec aliquam elit ornare.</p>
                <p>Nulla at lacus vitae ligula auctor cursus eleifend in risus. Donec orci erat, placerat interdum placerat vitae, luctus in tellus. Vivamus et augue metus, sit amet cursus augue. Vivamus interdum venenatis tellus, in pretium neque sodales in. Praesent id mi eu est cursus consequat. Donec dolor massa, dignissim a luctus non, sagittis sed ante. Nulla eu tincidunt tellus. Nam in rutrum nisl. Praesent faucibus, lorem in porta sodales, tortor sapien laoreet erat, nec aliquet nunc nisi eget nibh. Proin mollis fermentum est, eu commodo eros egestas tincidunt. Duis non risus non magna sagittis pharetra a quis mi. Duis nec leo nunc.</p>
            </div>
        </div>

        <footer>
            <p>Celia Yun Patricio Ferrer &copy; 2025 Welcome to C!</p>
        </footer>

        <script>
            $(document).ready(function(){
                // Cuando el usuario haga clic en el mensaje de éxito, que se desvanezca
                $("#successContainer").on("click", function() {
                    $("#successContainer").fadeOut(500);
                });
            });
        </script>
    </body>

</html>
