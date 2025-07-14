<?php
session_start();

// If errorMessage has never been used so far, we are creating and initializing it
if (empty($_SESSION["errorMessage"])) {
    $_SESSION["errorMessage"] = "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Cache-control" content="no-cache" />
        <title>Lab 6 - Insert User</title>
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
                padding-top: 30px;
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

            form {
                background: white;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                padding: 20px;
                width: 40%;
                text-align: center;
                margin-top: 20px;
            }

            fieldset {
                border: none;
            }

            legend {
                font-size: 16pt;
                font-weight: bold;
                color: #444;
            }

            ul {
                list-style: none;
                padding: 0;
            }

            li {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
            }

            label {
                font-weight: bold;
                font-size: 14px;
                color: #444;
            }

            input {
                padding: 7px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 60%;
                font-size: 14px;
            }

            input:focus {
                border: 1px solid #888;
                outline: none;
            }

            span {
                color: #ff0000;
                font-weight: bold;
            }

            #submit {
                background-color: #444;
                color: white;
                font-size: 14px;
                padding: 10px;
                width: 30%;
                border-radius: 5px;
                cursor: pointer;
                transition: background 0.3s;
                display: block; 
                margin: 0 auto;
            }

            #submit:hover {
                background-color: #666;
            }

            a#link-idx {
                color: #555;
                text-decoration: none;
                font-weight: bold;
                margin: 0 10px;
                position: relative;
                padding-bottom: 3px;
            }

            a#link-idx::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: 0;
                width: 0;
                height: 2px;
                background-color: #222;
                transition: width 0.4s ease-in-out;
            }

            a#link-idx:hover::after {
                width: 100%;
            }

            footer {
                margin: 40px;
            }
        </style>
    </head>
    <body>
        <h1>Lab 6 - Insert User</h1>
        <?php include("includes/menu.php"); ?>
        
        <form id="form" name="form" method="post" action="doInsertUser.php">
            <fieldset>
                <legend>Insert into usersLab5 table</legend>
                <ul>
                    <li>
                        <label title="UserID" for="userID">UserID</label>
                        <input name="userID" id="userID" type="text" size="20" maxlength="3" />
                    </li>
                    <li>
                        <label title="FirstName" for="FirstName">First Name</label>
                        <input name="FirstName" id="FirstName" type="text" size="20" maxlength="20" />
                    </li>
                    <li>
                        <label title="LastName" for="LastName">Last Name</label>
                        <input name="LastName" id="LastName" type="text" size="20" maxlength="20" />
                    </li>
                    <li>
                        <label title="Title" for="Title">Title</label>
                        <input name="Title" id="Title" type="text" size="20" maxlength="20" />
                    </li>
                    <li>
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li>
                        <input type="submit" value="Insert User" name="submit" id="submit" />
                    </li>
                </ul>
            </fieldset>
        </form>
        
        <?php
        // Clear the error message, we used it above
        $_SESSION["errorMessage"] = "";
        ?>

        <footer>
            <a id="link-idx" href="index.php">< Go back to Index</a>
        </footer>
        
        <script type="text/javascript">
            document.getElementById("userID").focus();
        </script>
    </body>
</html>