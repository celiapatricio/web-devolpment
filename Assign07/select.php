<?php
session_start();
include("includes/openDbConn.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lab 7 - Select</title>
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

            table#carsTable {
                margin-top: 20px;
                width: 70%;
            }
            
            table#projectsTable {
                width: 75%;
                margin-bottom: 50px;
            }

            table {
                border-collapse: collapse;
                background: white;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                overflow: hidden;
            }

            thead {
                background-color: #666;
                color: white;
            }

            .table-title {
                text-align: center;
                text-decoration: underline;
            }

            th {
                font-weight: bold;
            }

            th, td {
                text-align: center;
                padding: 10px;
                border: 1px solid #ccc;
            }

            tbody tr:hover {
                background-color: #d9d9d9;
            }

            tfoot {
                background-color: #f2f2f2;
                font-style: italic;
                text-align: center;
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
        <h1>Lab 7 - Select</h1>
        
        <p>Celia Yun Patricio Ferrer</p>
        
        <?php
        include("includes/menu.php");
        ?>

        <!-- CarsTable -->

        <?php
        // Prepare the SQL statement that will pull all records from the Assign06Cars table
        $sql = "SELECT CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid FROM Assign06Cars";

        // Execute the SQL query and store the result of the execution into $result
        // The $db is the variable you created in openDbConn.php
        $result = mysqli_query($db, $sql);

        // Check to see if there are records in the result, if not set the number
        // of results to 0
        if(empty($result))
            $num_results = 0;
        else
            $num_results = mysqli_num_rows($result);
        ?>

        <table title="Listing of Cars" id="carsTable">
            <thead>
                <tr>
                    <th colspan="7" class="table-title">Assign06Cars table</th>
                </tr>
                <tr>
                    <th>&nbsp</th>
                    <th>CarID</th>
                    <th>CarMake</th>
                    <th>CarModel</th>
                    <th>CarYear</th>
                    <th>CarColor</th>
                    <th>CarHybrid</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">Information pulled from Assign06Cars table.</td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                // Loop through the results
                for($i = 0; $i < $num_results; $i++) {
                    // Store a single record out of $result into $row
                    $row = mysqli_fetch_array($result);
                    // Below, ALWAYS use trim() on data pulled from the database
                    ?>

                    <tr>
                        <td>
                            <a href="updateCar.php?id=<?php echo trim($row["CarID"]); ?>">edit</a> |
                            <a href="deleteCar.php?id=<?php echo trim($row["CarID"]); ?>">delete</a>
                        </td>
                        <td><?php echo( trim( $row["CarID"] ) ); ?></td>
                        <td><?php echo( trim( $row["CarMake"] ) ); ?></td>
                        <td><?php echo( trim( $row["CarModel"] ) ); ?></td>
                        <td><?php echo( trim( $row["CarYear"] ) ); ?></td>
                        <td><?php echo( trim( $row["CarColor"] ) ); ?></td>
                        <td><?php echo( trim( $row["CarHybrid"] ) ); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>

        <p>&nbsp;</p>

        <?php
        // Everything below here is copied from up above and modified to pull from the Assign06Projects table

        // Prepare my SQL statement
        $sql = "SELECT ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate FROM Assign06Projects";

        // Execute the SQL query and store the result of the execution into $result
        $result = mysqli_query($db, $sql);

        // Check to see if there are records in the result, if not set the number
        if(empty($result))
            $num_results = 0;
        else
            $num_results = mysqli_num_rows($result);
        ?>

        <table title="Listing of Projects" id="projectsTable">
            <thead>
                <tr>
                    <th colspan="7" class="table-title">Assign06Projects table</th>
                </tr>
                <tr>
                    <th>&nbsp</th>
                    <th>ProjectID</th>
                    <th>ProjName</th>
                    <th>ProjCategory</th>
                    <th>ProjDesc</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">Information pulled from Assign06Projects table.</td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                // Loop through the results
                for($i = 0; $i < $num_results; $i++){
                    // Store a single record out of $result into $row
                    $row = mysqli_fetch_array($result);
                    // Below, ALWAYS use trim() on data pulled from the database
                    ?>

                    <tr>
                        <td>
                            <a href="updateProject.php?id=<?php echo trim($row["ProjectID"]); ?>">edit</a> |
                            <a href="deleteProject.php?id=<?php echo trim($row["ProjectID"]); ?>">delete</a>
                        </td>
                        <td><?php echo( trim( $row["ProjectID"] ) ); ?></td>
                        <td><?php echo( trim( $row["ProjName"] ) ); ?></td>
                        <td><?php echo( trim( $row["ProjCategory"] ) ); ?></td>
                        <td><?php echo( trim( $row["ProjDesc"] ) ); ?></td>
                        <td><?php echo( trim( $row["StartDate"] ) ); ?></td>
                        <td><?php echo( trim( $row["EndDate"] ) ); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>

        <footer>
            <a id="link-idx" href="index.php">< Go back to Index</a>
        </footer>

        <?php
        // Close the database connection
        include("includes/closeDbConn.php");
        ?>
        
    </body>
</html>
