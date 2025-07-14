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
        <title>Lab 7 - Delete project</title>
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
                width: 150px;
                text-align: left;
            }

            input, select {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 300px;
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
                width: 45%;
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
        <h1>Lab 7 - Delete Project</h1>
        
        <p>Celia Yun Patricio Ferrer</p>
        
        <?php
        include("includes/menu.php");
        ?>

        <?php
        // Prepare the SQL statement
        $sql = "SELECT ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate FROM Assign06Projects WHERE ProjectID=".$id;

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
           
        <!-- Delete project in ProjectTable -->
        
        <form id="form" name="form" method="post" action="doDeleteProject.php">
            <fieldset>
                <legend>Delete Project from Assign06Projects table</legend>
                <ul>
                    <li class="text-group">
                        <label title="projectID" for="projectID">Project ID <span>*</span></label>
                        <input name="projectIDdis" id="projectIDdis" type="text" size="30" maxlength="5" disabled="disabled"
                            value="<?php if ($num_results != 0) { echo trim($row["ProjectID"]); } ?>" />
                        <input name="projectID" id="projectID" type="hidden"
                            value="<?php if ($num_results != 0) { echo trim($row["ProjectID"]); } ?>" />
                    </li>
                    <li class="text-group">
                        <label title="projectName" for="projectName">Project Name <span>*</span></label>
                        <input name="projectNameDis" id="projectNameDis" type="text" size="30" maxlength="50" disabled="disabled"
                            value="<?php if ($num_results != 0) { echo trim($row["ProjName"]); } ?>" />
                    </li>
                    <li class="select-group">
                        <label title="projectCategory" for="projectCategory">Project Category <span>*</span></label>
                        <select name="projectCategoryDis" id="projectCategoryDis" disabled="disabled">
                            <?php
                            $categories = [
                                "Commercial", "Residential", "Industrial", "Institutional", "Infrastructure", "Mixed-Use"
                            ];

                            foreach ($categories as $category) {
                                $selected = ($num_results != 0 && $category == $row["ProjCategory"]) ? "selected" : "";
                                echo "<option value=\"$category\" $selected>$category</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li class="text-group">
                        <label title="projectDesc" for="projectDesc">Project Description <span>*</span></label>
                        <input name="projectDescDis" id="projectDescDis" type="text" size="30" maxlength="100" disabled="disabled"
                            value="<?php if ($num_results != 0) { echo trim($row["ProjDesc"]); } ?>" />
                    </li>
                    <li class="select-group">
                        <label title="startDate" for="startDate">Start Date <span>*</span></label>
                        <select name="startDateMonth" id="startDateMonth" disabled="disabled">
                            <?php
                                $monthsList = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                                               "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                foreach ($monthsList as $m) {
                                    $selected = ($num_results != 0 && $m == substr($row["StartDate"], 0, 3)) ? "selected" : "";
                                    echo "<option value='$m' $selected>$m</option>";
                                }
                            ?>
                        </select>
                        <select name="startDateDay" id="startDateDay" disabled="disabled">
                            <?php
                                $daysList = ["01", "02", "03", "04", "05", "06", 
                                             "07", "08", "09", "10", "11", "12",
                                             "13", "14", "15", "16", "17", "18",
                                             "19", "20", "21", "22", "23", "24",
                                             "25", "26", "27", "28", "29", "30", "31"];
                                foreach ($daysList as $d) {
                                    $selected = ($num_results != 0 && $d == substr($row["StartDate"], 4, 2)) ? "selected" : "";
                                    echo "<option value='$d' $selected>$d</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="select-group">
                        <label title="endDate" for="endDate">End Date <span>*</span></label>
                        <select name="endDateMonth" id="endDateMonth" disabled="disabled">
                            <?php
                                $monthsList = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                                               "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                foreach ($monthsList as $m) {
                                    $selected = ($num_results != 0 && $m == substr($row["EndDate"], 0, 3)) ? "selected" : "";
                                    echo "<option value='$m' $selected>$m</option>";
                                }
                            ?>
                        </select>
                        <select name="endDateDay" id="endDateDay" disabled="disabled">
                            <?php
                                $daysList = ["01", "02", "03", "04", "05", "06", 
                                             "07", "08", "09", "10", "11", "12",
                                             "13", "14", "15", "16", "17", "18",
                                             "19", "20", "21", "22", "23", "24",
                                             "25", "26", "27", "28", "29", "30", "31"];
                                foreach ($daysList as $d) {
                                    $selected = ($num_results != 0 && $d == substr($row["EndDate"], 4, 2)) ? "selected" : "";
                                    echo "<option value='$d' $selected>$d</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="err-group">
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li class="submit-group">
                        <input type="submit" value="Confirm Delete Project" name="submit" id="submit" />
                    </li>
                </ul>
            </fieldset>
        </form>
        
        <?php
        // Clear the error message, we used it above
        $_SESSION["errorMessage"] = "";
        ?>
        
    </body>
</html>
