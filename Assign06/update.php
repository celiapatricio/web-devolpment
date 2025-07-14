<?php
session_start();

// If errorMessage has never been used, we will create it
if (empty($_SESSION["errorMessage"])) {
    $_SESSION["errorMessage"] = "";
}

$id = $_GET["id"];

// Open DB connection
include("includes/openDbConn.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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

        <h1>Lab 6 - Update</h1>

        <?php include("includes/menu.php"); ?>

        <?php
        // Prepare the sql statement
        $sql = "SELECT ShipperID, CompanyName, Phone FROM shippersLab5 WHERE ShipperID=".$id;

        // Execute the sql query and store the result of the execution into $result
        $result = mysqli_query($db, $sql);

        // Check to see if there are records in the result, if not set the number of records to 0
        if (empty($result)) {
            $num_results = 0;
        } else {
            $num_results = mysqli_num_rows($result);
            // Store a single record into $row
            $row = mysqli_fetch_assoc($result);
        }

        // If there are no records, display an error message
        if ($num_results == 0) {
            $_SESSION["errorMessage"] = "You must first insert a Shipper with ID 2";
            // The ShipperID field below is disable, meaning a user cannot update the primary key
            // If you disable a field, it will not be sent to the next page, so you have to
            // Create a type="hidden" field into that _will_ be sent
        }
        ?>

        <form id="form0" name="form0" method="post" action="doUpdate.php">
            <fieldset>
                <legend>Update shippersLab5 table</legend>
                <ul>
                    <li>
                        <label title="shipperID" for="shipperIDis">ShipperID</label>
                        <input name="shipperIDis" id="shipperIDis" type="text" size="20" maxlength="3"
                               value="<?php if($num_results != 0) {echo trim($row["ShipperID"]);} ?>" disabled="disabled"/>
                        <input name="shipperID" id="shipperID" type="hidden"
                               value="<?php if($num_results != 0) {echo trim($row["ShipperID"]);} ?>"/>
                    </li>
                    <li>
                        <label title="companyName" for="companyName">Company Name</label>
                        <input name="companyName" id="companyName" type="text" size="20" maxlength="20"
                               value="<?php if($num_results != 0) {echo trim($row["CompanyName"]);} ?>"/>
                    </li>
                    <li>
                        <label title="phone" for="phone">Phone</label>
                        <input name="phone" id="phone" type="text" size="20" maxlength="20"
                               value="<?php if($num_results != 0) {echo trim($row["Phone"]);} ?>"/>
                    </li>
                    <li>
                        <span><?php echo $_SESSION["errorMessage"]; ?></span>
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
            document.getElementById("shipperID").focus();
        </script>

    </body>
</html>
