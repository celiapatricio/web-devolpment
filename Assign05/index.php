<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lab 5 - Index</title>
        <style type="text/css">
            body {
                font-family: 'Arial', sans-serif;
                background-color: #e6e6e6;
                color: #333;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            h1 {
                background-color: #444;
                color: white;
                padding: 15px;
                border-radius: 8px;
                text-align: center;
                width: 50%;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            }
            div {
                margin-top: 20px;
                font-size: 16px;
            }
            a {
                color: #555;
                text-decoration: none;
                font-weight: bold;
                margin: 0 10px;
                position: relative;
                padding-bottom: 3px;
            }
            a::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: 0;
                width: 0;
                height: 2px;
                background-color: #222;
                transition: width 0.4s ease-in-out;
            }
            a:hover::after {
                width: 100%;
            }

        </style>
    </head>
    <body>
        <h1>Lab 5 - Index</h1>
        <?php
        include("includes/menu.php");
        ?>
        <div>Welcome to my Lab05 site!</div>
    </body>
</html>
