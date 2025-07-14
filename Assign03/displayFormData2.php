<?php
if (empty($_POST["name"])) {
    header("Location: index2.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
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

            fieldset {
                margin: 10px 0;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
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

            fieldset#pet { 
                position: absolute; 
                top: 80px; 
                left: 220px; 
            }

            fieldset#owner { 
                position: absolute; 
                top: 80px; 
                left: 580px; 
            }
        </style>
    </head>

    <body>
        <h1>Assign 03 - displayFormData Page 2</h1>

        <form id="form" method="post" action="displayFormData2.php">
            <fieldset id="pet">
                <legend>Pet Information</legend>
                <ul>
                    <li> <span><strong>Name:</strong> <?php echo($_POST["name"]); ?></span> </li>
                    <li> <span><strong>Phone Number:</strong> <span><?php echo($_POST["phone"]); ?></span> </li>
                    <li> <span><strong>Pet Name:</strong> <?php echo($_POST["pet_name"]); ?></span> </li>
                    <li> <span><strong>Pet Species:</strong> <?php echo($_POST["species"]); ?></span> </li>
                    <li> <span><strong>Pet Breed:</strong> <?php echo($_POST["breed"]); ?></span> </li>
                    <li> <span><strong>Pet Gender:</strong> <?php echo($_POST["gender"]); ?></span> </li>
                    <li> <span><strong>Pet Age:</strong> <?php echo($_POST["age"]); ?> years</span> </li>
                    <li> <span><strong>Pet Weight:</strong> <?php echo($_POST["weight"]); ?> kg</span> </li>
                    <li> <span><strong>Vaccination Status:</strong> <?php echo($_POST["vaccine"]); ?></span> </li>
                    <li> <span><strong>Neutered?:</strong> <?php echo($_POST["neutered"]); ?></span> </li>
                    <li> 
                        <span>
                            <strong>Comments:</strong><br />
                            <?php echo($_POST["comments"]); ?>
                        </span>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="owner">
                <legend>Pet Owner Information</legend>
                <ul>
                    <li> <span><strong>Name:</strong> <?php echo($_POST["Oname"]); ?></span> </li>
                    <li> <span><strong>Phone Number:</strong> <?php echo($_POST["Ophone"]); ?></span> </li>
                    <li> <span><strong>Address:</strong> <?php echo($_POST["Oaddress"]); ?></span> </li>
                    <li> <span><strong>Email:</strong> <?php echo($_POST["Oemail"]); ?></span> </li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>
