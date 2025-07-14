<?php
session_start();

// Clear session variables
$_SESSION["name"] = "";
$_SESSION["address"] = "";
$_SESSION["city"] = "";
$_SESSION["state"] = "";
$_SESSION["zip"] = "";
$_SESSION["country"] = "";
$_SESSION["phone"] = "";
$_SESSION["email"] = "";
$_SESSION["comments"] = "";
$_SESSION["Oname"] = "";
$_SESSION["Ophone"] = "";
$_SESSION["Oemail"] = "";
$_SESSION["Oaddress"] = "";
$_SESSION["Opet"] = "";
$_SESSION["pet_name"] = "";
$_SESSION["species"] = "";
$_SESSION["breed"] = "";
$_SESSION["gender"] = "";
$_SESSION["age"] = "";
$_SESSION["weight"] = "";
$_SESSION["vaccine"] = "";
$_SESSION["neutered"] = "";
$_SESSION["Sname"] = "";
$_SESSION["Saddress"] = "";
$_SESSION["Scity"] = "";
$_SESSION["Sstate"] = "";
$_SESSION["Szip"] = "";
$_SESSION["Scountry"] = "";
$_SESSION["errorMessage"] = "";

// Abandon session
session_unset();  // free all session variables
session_destroy();  // destroys all data associated with current session
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Assign 04 - finishedUpdate page</title>
        <style type="text/css">
            body {
                font-family: 'Arial, sans-serif';
                background-color: #d6d6d6;
                color: #333;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .content {
                background-color: #f2f2f2;
                padding: 30px 50px;
                border-radius: 10px;
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            h1 {
                color: #444;
                font-size: 28px;
                margin-bottom: 15px;
            }

            p {
                color: #666;
                font-size: 18px;
                margin-bottom: 25px;
            }

            nav {
                margin-top: 20px;
            }

            nav a {
                color: #555;
                text-decoration: none;
                font-weight: bold;
                padding: 10px 15px;
                border: 1px solid #bbb;
                border-radius: 5px;
                margin: 0 10px;
                background-color: #e0e0e0;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            nav a:hover {
                background-color: #999;
                color: #fff;
            }
        </style>    
    </head>

    <body>
        <div class="content">
            <h1>Lab 04 - finishedUpdate Page</h1>
            <p>Your information has been successfully updated in our database.</p>
            <nav>
                <a href="index.php">Part 1</a>
                <a href="index2.php">Part 2</a>
                <a href="index3.php">Part 3</a>
            </nav>
        </div>
    </body>
</html>
