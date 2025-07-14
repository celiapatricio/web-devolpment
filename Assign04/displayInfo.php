<?php
session_start();
if (empty($_SESSION["name"])) {
    header("Location: index.php");
    exit;
}

// Clear my error message
$_SESSION["errorMessage"] = "";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Assign 04 - displayInfo Page</title>
        <style type="text/css">
            ul { 
                list-style: none; 
                margin-top: 5px; 
            }
            ul li { 
                display: block; 
                float: left; 
                width: 100%; 
                height: 18px; 
            }
            ul li label { 
                float: left; 
                padding: 7px; 
                color: #6666ff; 
            }
            ul li input, 
            ul li textarea { 
                float: right; 
                margin-right: 10px; 
                border: 1px solid #ccc; 
                padding: 3px; 
                font-family: Georgia, Times New Roman, Times, serif; 
                width: 60%; 
            }
            ul li input:focus, 
            ul li textarea:focus { 
                border: 1px solid #666; 
            }
            fieldset { 
                padding: 10px; 
                border: 1px solid #ccc; 
                width: 400px; 
                overflow: auto; 
                margin: 10px; 
            }
            legend { 
                color: #008099; 
                font-size: 11pt; 
                font-weight: bold; 
            }
            ul li span { 
                color: #006099; 
                margin-left: 10px; 
                font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
            }
            fieldset#billing { 
                position: absolute; 
                top: 60px; 
                left: 20px; 
            }
            fieldset#shipping { 
                position: absolute; 
                top: 60px; 
                left: 460px; 
            }
            #submit {
                position: absolute;
                top: 540px;
                left: 20px;
                width: 840px;
                text-align: center;
            }
            #submitBtn {
                background-color: #e5e5e5;
                color: #000099;
                border: 1px solid #ccc;
                padding: 5px;
                width: 150px;
            }
            input, textarea {
                background-color: #ddddff;
            }
            #nav {
                width: 400px;
                position: absolute;
                top: 330px;
                left: 200px;
            }
            span#nav1 {
                float: left;
            }
            span#nav2 {
                float: right;
            }
        </style>
    </head>
    <body>
        <h1 style="font-size: 14pt; text-indent: 360px;">Assign 04 - displayInfo Page</h1>

        <form id="form" method="post" action="getFormData.php">
            <fieldset id="billing">
                <legend>Billing Information</legend>
                <ul>
                    <li> <span><?php echo($_SESSION["name"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["address"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["city"]); ?>, <?php echo($_SESSION["state"]); ?> <?php echo($_SESSION["zip"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["country"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["phone"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["email"]); ?></span> </li>
                    <li> <span><br/>Comments:<br/><?php echo($_SESSION["comments"]); ?></span> </li>
                </ul>
            </fieldset>

            <fieldset id="shipping">
                <legend>Shipping Information (if different from billing)</legend>
                <ul>
                    <li> <span><?php echo($_SESSION["Sname"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["Saddress"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["Scity"]); ?>, <?php echo($_SESSION["Sstate"]); ?> <?php echo($_SESSION["Szip"]); ?></span> </li>
                    <li> <span><?php echo($_SESSION["Scountry"]); ?></span> </li>
                </ul>
            </fieldset>
        </form>

        <div class="nav">
            <span id="nav1">
                <a href="index.php">Continue Updating</a>
            </span>
            <span id="nav2">
                <a href="finishedUpdate.php">Finished Updating</a>
            </span>

        </div>
    </body>
</html>
