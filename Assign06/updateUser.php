<?php
session_start();

// If errorMessage has never been used so far, we are creating and initializing it
if (empty($_SESSION["errorMessage"])) {
    $_SESSION["errorMessage"] = "";
}

$id = $_GET["id"];

// Open database connection
include("includes/openDbConn.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Cache-control" content="no-cache" />
        <title>Lab 6 - Update</title>
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
                    width: 50%;
                    text-align: center;
                    margin-top: 20px;
                }

                fieldset {
                    border: none;
                }

                legend {
                    font-size: 14pt;
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
                    color: #444;
                }

                input {
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    width: 60%;
                    font-size: 14px;
                }

                input:focus {
                    border: 1px solid #888;
                    outline: none;
                }

                input[disabled] {
                    background-color: #f2f2f2;
                    color: #666;
                    cursor: not-allowed;
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
                    width: 65%;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background 0.3s;
                    display: block;
                    margin: 0 auto;
                }

                #submit:hover {
                    background-color: #666;
                }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;">Lab 6 - Update</h1>
        
        <?php include("includes/menu.php"); ?>
        
        <?php
        // Prepare the SQL statement
        $sql = "SELECT UserID, LastName, FirstName, Title FROM usersLab5 WHERE UserID=".$id;
        
        // Execute the SQL query
        $result = mysqli_query($db, $sql);
        
        // Check to see if there are records in the result, if not set the number of records to 0
        if (empty($result)) {
            $num_results = 0;
        } else {
            $num_results = mysqli_num_rows($result);
            // Store a single record into $row
            $row = mysqli_fetch_assoc($result);
        }
        
        // If there are no records, set the error message
        if ($num_results == 0) {
            $_SESSION["errorMessage"] = "You must first insert a user with this ID!";
        }
        ?>
        
        <form id="form" name="form" method="post" action="doUpdateUser.php">
            <fieldset>
                <legend>Update the usersLab5 table</legend>
                <ul>
                    <li>
                        <label title="UserID" for="userIDdis">User ID</label>
                        <input name="userIDdis" id="userIDdis" type="text" size="20" maxlength="3" disabled="disabled"
                            value="<?php if ($num_results != 0) { echo trim($row["UserID"]); } ?>" />
                        <input name="userID" id="userID" type="hidden"
                            value="<?php if ($num_results != 0) { echo trim($row["UserID"]); } ?>" />
                    </li>
                    <li>
                        <label title="LastName" for="LastName">Last Name</label>
                        <input name="LastName" id="LastName" type="text" size="20" maxlength="20"
                            value="<?php if ($num_results != 0) { echo trim($row["LastName"]); } ?>" />
                    </li>
                    <li>
                        <label title="FirstName" for="FirstName">First Name</label>
                        <input name="FirstName" id="FirstName" type="text" size="20" maxlength="20"
                            value="<?php if ($num_results != 0) { echo trim($row["FirstName"]); } ?>" />
                    </li>
                    <li>
                        <label title="Title" for="Title">Title</label>
                        <input name="Title" id="Title" type="text" size="20" maxlength="20"
                            value="<?php if ($num_results != 0) { echo trim($row["Title"]); } ?>" />
                    </li>
                    <li>
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li>
                        <input type="submit" value="Update Info" name="submit" id="submit" />
                    </li>
                </ul>
            </fieldset>
        </form>
        
        <?php
        // Clear the error message, we used it above
        $_SESSION["errorMessage"] = "";
        ?>
        
        <script type="text/javascript">
            document.getElementById("companyName").focus();
        </script>
    </body>
</html>