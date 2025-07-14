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
        <title>Lab 7 - Insert Project</title>
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
                width: 30%;
                border-radius: 5px;
                cursor: pointer;
                transition: background 0.3s;
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
                position: fixed;
                bottom: 0;
                padding: 10px 0;
                background-color:rgba(244, 244, 244, 0.95);
                color: #333;
                text-align: center;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <h1>Lab 7 - Insert Project</h1>
        
        <p>Celia Yun Patricio Ferrer</p>
        
        <?php
        include("includes/menu.php");
        ?>

        <!-- Insert project in ProjectTable -->

        <form id="form" name="form" method="post" action="doInsertProject.php">
            <fieldset>
                <legend>Insert into Assign06Projects table</legend>
                <ul>
                    <li class="text-group">
                        <label title="ProjectID" for="projectID">Project ID <span>*</span></label>
                        <input name="projectID" id="projectID" type="text" size="30" maxlength="5" />
                    </li>
                    <li class="text-group">
                        <label title="ProjectName" for="projectName">Project Name <span>*</span></label>
                        <input name="projectName" id="projectName" type="text" size="30" maxlength="50" />
                    </li>
                    <li class="select-group">
                        <label title="ProjectCategory" for="projectCategory">Project Category <span>*</span></label>
                        <select name="projectCategory" id="projectCategory">
                            <option value="" disabled selected>- Category -</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Residential">Residential</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Institutional">Institutional</option>
                            <option value="Infrastructure">Infrastructure</option>
                            <option value="Mixed-Use">Mixed-Use</option>
                        </select>
                    </li>
                    <li class="text-group">
                        <label title="ProjectDesc" for="projectDesc">Project Description <span>*</span></label>
                        <input name="projectDesc" id="projectDesc" type="text" size="30" maxlength="100" />
                    </li>
                    <li class="select-group">
                        <label title="StartDate" for="startDate">Start Date <span>*</span></label>
                        <select name="startDateMonth" id="startDateMonth">
                            <option value="" disabled selected>- Month -</option>
                            <?php
                                $monthsList = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                                               "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                foreach ($monthsList as $m) {
                                    echo "<option value='$m'>$m</option>";
                                }
                            ?>
                        </select>
                        <select name="startDateDay" id="startDateDay">
                            <option value="" disabled selected>- Day -</option>
                            <?php
                                $daysList = ["01", "02", "03", "04", "05", "06", 
                                             "07", "08", "09", "10", "11", "12",
                                             "13", "14", "15", "16", "17", "18",
                                             "19", "20", "21", "22", "23", "24",
                                             "25", "26", "27", "28", "29", "30", "31"];
                                foreach ($daysList as $d) {
                                    echo "<option value='$d'>$d</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="select-group">
                        <label title="EndDate" for="endDate">End Date <span>*</span></label>
                        <select name="endDateMonth" id="endDateMonth">
                            <option value="" disabled selected>- Month -</option>
                            <?php
                                $monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                                               "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                foreach ($monthNames as $m) {
                                    echo "<option value='$m'>$m</option>";
                                }
                            ?>
                        </select>
                        <select name="endDateDay" id="endDateDay">
                            <option value="" disabled selected>- Day -</option>
                            <?php
                                $daysList = ["01", "02", "03", "04", "05", "06", 
                                             "07", "08", "09", "10", "11", "12",
                                             "13", "14", "15", "16", "17", "18",
                                             "19", "20", "21", "22", "23", "24",
                                             "25", "26", "27", "28", "29", "30", "31"];
                                foreach ($daysList as $d) {
                                    echo "<option value='$d'>$d</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="err-group">
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li class="submit-group">
                        <input type="submit" value="Insert Project" name="submit" id="submit" />
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
            document.getElementById("projectID").focus();
        </script>
    </body>
</html>