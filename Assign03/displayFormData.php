<?php
if (empty($_POST["name"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Assign 03 - displayFormData Page</title>
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
        </style>
    </head>
    <body>
        <h1 style="font-size: 14pt; text-indent: 360px;">Assign 03 - displayFormData Page</h1>

        <form id="form" method="post" action="getFormData.php">
            <fieldset id="billing">
                <legend>Billing Information</legend>
                <ul>
                    <li> <span><?php echo($_POST["name"]); ?></span> </li>
                    <li> <span><?php echo($_POST["address"]); ?></span> </li>
                    <li> <span><?php echo($_POST["city"]); ?>, <?php echo($_POST["state"]); ?> <?php echo($_POST["zip"]); ?></span> </li>
                    <li> <span><?php echo($_POST["country"]); ?></span> </li>
                    <li> <span><?php echo($_POST["phone"]); ?></span> </li>
                    <li> <span><?php echo($_POST["email"]); ?></span> </li>
                    <li> <span><br/>Comments:<br/><?php echo($_POST["comments"]); ?></span> </li>
                </ul>
            </fieldset>

            <fieldset id="shipping">
                <legend>Shipping Information (if different from billing)</legend>
                <ul>
                    <li> <span><?php echo($_POST["Sname"]); ?></span> </li>
                    <li> <span><?php echo($_POST["Saddress"]); ?></span> </li>
                    <li> <span><?php echo($_POST["Scity"]); ?>, <?php echo($_POST["Sstate"]); ?> <?php echo($_POST["Szip"]); ?></span> </li>
                    <li> <span><?php echo($_POST["Scountry"]); ?></span> </li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>
