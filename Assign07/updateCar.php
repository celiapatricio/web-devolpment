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
        <title>Lab 7 - Update Car</title>
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

            p {
                margin-top: 20px;
                font-size: 16px;
            }

            form {
                background: white;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                padding: 25px 20px 0 20px;
                width: 40%;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 50px;
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
                display: flex;
                flex-direction: column;
                gap: 9px;
            }

            li {
                display: flex;
                margin-bottom: 10px;
            }

            label {
                font-weight: bold;
                font-size: 14px;
                color: #444;
                width: 120px;
                text-align: left;
            }

            input, select {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 320px;
                font-size: 14px;
            }

            .select-group select {
                width: 150px;
                margin-right: 10px;
            }

            .err-group, .submit-group {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .radio-group {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .radio-opts {
                flex: 2;
                display: flex;
                gap: 50px;
            }

            .radio-opts label {
                display: inline-flex;
                align-items: center;
                font-weight: normal;
                align-items: center;
                justify-content: center;
                width: 50px;
            }

            .radio-opts input[type="radio"] {
                margin: 0;
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
            }

            #submit:hover {
                background-color: #666;
            }
        </style>
    </head>

    <body>
        <h1>Lab 7 - Update Car</h1>
        
        <p>Celia Yun Patricio Ferrer</p>
        
        <?php
        include("includes/menu.php");
        ?>

        <?php
        // Prepare the SQL statement
        $sql = "SELECT CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid FROM Assign06Cars WHERE CarID=".$id;
        
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
            $_SESSION["errorMessage"] = "You must first insert a book with this ID!";
        }
        ?>

        <!-- Update car in CarsTable -->
        
        <form id="form" name="form" method="post" action="doUpdateCar.php">
            <fieldset>
                <legend>Update the Assign06Cars table</legend>
                <ul>
                    <li class="text-group">
                        <label title="carID" for="carID">Car ID <span>*</span></label>
                        <input name="carIDdis" id="carIDdis" type="text" size="30" maxlength="5" disabled="disabled"
                            value="<?php if ($num_results != 0) { echo trim($row["CarID"]); } ?>" />
                        <input name="carID" id="carID" type="hidden"
                            value="<?php if ($num_results != 0) { echo trim($row["CarID"]); } ?>" />
                    </li>
                    <li class="select-group">
                        <label title="carMake" for="carMake">Make <span>*</span></label>
                        <select name="carMake" id="carMake">
                            <?php
                            $makes = [
                                "Acura", "Aston Martin", "Audi", "Bentley", "Bmw", "Buick", "Cadillac", "Chevrolet", "Chrysler",
                                "Dodge", "Ferrari", "Ford", "Gmc", "Honda", "Hummer", "Hyundai", "Infiniti", "Isuzu", "Jaguar",
                                "Jeep", "Kia", "Lamborghini", "Land Rover", "Lexus", "Lincoln", "Lotus", "Maserati", "Maybach",
                                "Mazda", "Mercedes-Benz", "Mercury", "Mini", "Mitsubishi", "Nissan", "Pontiac", "Porsche",
                                "Rolls-Royce", "Saab", "Saturn", "Subaru", "Suzuki", "Toyota", "Volkswagen", "Volvo"
                            ];

                            foreach ($makes as $make) {
                                $selected = ($num_results != 0 && $make == $row["CarMake"]) ? "selected" : "";
                                echo "<option value=\"$make\" $selected>$make</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li class="text-group">
                        <label title="carModel" for="carModel">Model <span>*</span></label>
                        <input name="carModel" id="carModel" type="text" size="30" maxlength="50"
                            value="<?php if ($num_results != 0) { echo trim($row["CarModel"]); } ?>" />
                    </li>
                    <li class="select-group">
                        <label title="carYear" for="carYear">Year <span>*</span></label>
                        <select name="carYear" id="carYear">
                            <?php
                            for ($year = 2020; $year >= 1960; $year--) {
                                $selected = ($num_results != 0 && $year == $row["CarYear"]) ? "selected" : "";
                                echo "<option value=\"$year\" $selected>$year</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li class="text-group">
                        <label title="carColor" for="carColor">Model <span>*</span></label>
                        <input name="carColor" id="carColor" type="text" size="30" maxlength="50"
                            value="<?php if ($num_results != 0) { echo trim($row["CarColor"]); } ?>" />
                    </li>
                    <li class="radio-group">
                        <label title="carHybrid" for="carHybrid">Hybrid? <span>*</span></label>
                        <div class="radio-opts">
                            <label title="carHybridYes" for="yes">
                                <input type="radio" id="yes" name="carHybrid" value="Yes"
                                    <?php if ($num_results != 0 && $row["CarHybrid"] == "Yes") echo "checked"; ?> />Yes
                            </label>
                            <label title="carHybridNo" for="no">
                                <input type="radio" id="no" name="carHybrid" value="No"
                                    <?php if ($num_results != 0 && $row["CarHybrid"] == "No") echo "checked"; ?> />No
                            </label>
                        </div>
                    </li>
                    <li class="err-group">
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li class="submit-group">
                        <input type="submit" value="Update Car" name="submit" id="submit" />
                    </li>
                </ul>
            </fieldset>
        </form>
        
        <?php
        // Clear the error message, we used it above
        $_SESSION["errorMessage"] = "";
        ?>
        
        <script type="text/javascript">
            document.getElementById("carMake").focus();
        </script>
    </body>
</html>