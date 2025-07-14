<?php
session_start();
if (empty($_SESSION["projectid"])) {
    header("Location: index3.php");
    exit;
}

// Clear my error message
$_SESSION["errorMessage"] = "";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Assign 04 - Part 3</title> 
        <link rel="icon" type="image/png" href="src/icon2.png">
        <style type="text/css">
            body {
                font-family: 'Arial, sans-serif';
                background-color: #f9f9f9;
                color: #333;
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
                margin: 20px;
                color: black;
            }

            #form {
                display: flex;
                justify-content: center;
                align-items: top;
                gap: 50px;
                margin: 20px 0;
                padding: 10px;
                border-radius: 5px;
            }

            fieldset {
                margin: 10px 0;
                padding: 10px;
                border: 1px solid #333333;
                border-radius: 10px;
            }

            legend {
                padding: 2px 7px;
                color: #333333;
                font-weight: bold;
                border-radius: 8px;
            }

            li {
                margin-bottom: 15px;
                color: grey;
            }

            .nav {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                gap: 100px;
            }

            .nav span {
                font-size: 16px;
            }

            .nav a {
                color: rgb(20, 20, 20);
                text-decoration: none;
                font-weight: bold;
                padding: 8px 12px;
                border: 1px solid rgb(20, 20, 20);
                border-radius: 5px;
                transition: background-color 0.3s, color 0.3s;
            }

            .nav a:hover {
                background-color: rgb(20, 20, 20);
                color: #fff;
            }
        </style>
    </head>
    <body>
        <h1>Project Registration</h1>

        <div class="nav">
            <span id="nav1">
                <a href="index3.php">< Continue Updating</a>
            </span>
            <span id="nav2">
                <a href="finishedUpdate.php">Finished Updating ></a>
            </span>
        </div>

        <form id="form" method="post" action="displayFormData3.php">
            <fieldset id="data">
                <legend>Project Details</legend>
                <ul>
                    <li> <span><strong>Project ID:</strong> <?php echo($_SESSION["projectid"]); ?></span> </li>
                    <li> <span><strong>Project Name:</strong> <span><?php echo($_SESSION["projectname"]); ?></span> </li>
                    <li> <span><strong>Project Description:</strong><br><?php echo($_SESSION["projectdescription"]);?></span> </li>
                    <li> <span><strong>Manager Name:</strong> <?php echo($_SESSION["managername"]); ?></span> </li>
                    <li> <span><strong>Manager Email:</strong> <?php echo($_SESSION["manageremail"]); ?></span> </li>
                    <li> <span><strong>Manager Phone:</strong> <?php echo($_SESSION["managerphone"]); ?></span> </li>
                </ul>
            </fieldset>
        </form>

    </body>
</html>
