<?php
session_start();
if (empty($_SESSION["name"])) {
    header("Location: index2.php");
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
        <title>Pet Registration</title> 
        <link rel="icon" type="image/png" href="src/icon.png">
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
                color: #194569;
            }

            h2 {
                text-align: center;
                margin: 20px 0;
                color: #5F84A2;
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
                border: 1px solid #ddd;
                border-radius: 10px;
            }

            legend {
                padding: 2px 7px;
                color: #194569;
                font-weight: bold;
                border-radius: 8px;
            }

            li {
                margin-bottom: 15px;
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
                color: #194569;
                text-decoration: none;
                font-weight: bold;
                padding: 8px 12px;
                border: 1px solid #194569;
                border-radius: 5px;
                transition: background-color 0.3s, color 0.3s;
            }

            .nav a:hover {
                background-color: #194569;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <h1>Pet Registration</h1>

        <div class="nav">
            <span id="nav1">
                <a href="index2.php">< Continue Updating</a>
            </span>
            <span id="nav2">
                <a href="finishedUpdate.php">Finished Updating ></a>
            </span>
        </div>

        <form id="form" method="post" action="displayFormData2.php">
            <fieldset id="pet">
                <legend>Pet Information</legend>
                <ul>
                    <li> <span><strong>Name:</strong> <?php echo($_SESSION["name"]); ?></span> </li>
                    <li> <span><strong>Phone Number:</strong> <span><?php echo($_SESSION["phone"]); ?></span> </li>
                    <li> <span><strong>Email:</strong> <?php echo($_SESSION["email"]); ?></span> </li>
                    <li> <span><strong>Address:</strong> <?php echo($_SESSION["address"]); ?></span> </li>
                    <li> <span><strong>Pet Name:</strong> <?php echo($_SESSION["pet_name"]); ?></span> </li>
                    <li> <span><strong>Pet Species:</strong> <?php echo($_SESSION["species"]); ?></span> </li>
                    <li> <span><strong>Pet Breed:</strong> <?php echo($_SESSION["breed"]); ?></span> </li>
                    <li> <span><strong>Pet Gender:</strong> <?php echo($_SESSION["gender"]); ?></span> </li>
                    <li> <span><strong>Pet Age:</strong> <?php echo($_SESSION["age"]); ?> years</span> </li>
                    <li> <span><strong>Pet Weight:</strong> <?php echo($_SESSION["weight"]); ?> kg</span> </li>
                    <li> <span><strong>Vaccination Status:</strong> <?php echo($_SESSION["vaccine"]); ?></span> </li>
                    <li> <span><strong>Neutered?:</strong> <?php echo($_SESSION["neutered"]); ?></span> </li>
                    <li> 
                        <span>
                            <strong>Comments:</strong><br />
                            <?php echo($_SESSION["comments"]); ?>
                        </span>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="owner">
                <legend>Pet Owner Information</legend>
                <ul>
                    <li> <span><strong>Name:</strong> <?php echo($_SESSION["Oname"]); ?></span> </li>
                    <li> <span><strong>Phone Number:</strong> <?php echo($_SESSION["Ophone"]); ?></span> </li>
                    <li> <span><strong>Email:</strong> <?php echo($_SESSION["Oemail"]); ?></span> </li>
                    <li> <span><strong>Address:</strong> <?php echo($_SESSION["Oaddress"]); ?></span> </li>
                </ul>
            </fieldset>
        </form>

    </body>
</html>
