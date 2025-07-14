<?php
session_start();
include("includes/openDbConn.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lab 6 - Select</title>
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

            table {
                margin-bottom: 10px;
                margin-top: 20px;
                width: 40%;
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
                margin: 40px;
            }
        </style>
    </head>

    <body>
    <?php
        // Prepare my SQL statement
        $sql = "SELECT PetID, Name, Descript FROM Pet";

        // Execute the SQL query and store the result of the execution into $result
        // The $db is the variable you created in openDbConn.php
        $result = mysqli_query($db, $sql);

        // Check to see if there are records in the result, if not set the number
        // of results to 0
        if (empty($result))
            $num_results = 0;
        else
            $num_results = mysqli_num_rows($result);
        ?>

        <h1>Lab 6 - Pet</h1>

        <?php
        include("includes/menu.php");
        ?>

        <table title="Listing of Pets" id="petsTable">
            <thead>
                <tr>
                    <th colspan="3" class="table-title">Pet table</th>
                </tr>
                <tr>
                    <th>PetID</th>
                    <th>Name</th>
                    <th>Descript</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">Information pulled from Pet table.</td>
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
                        <td><?php echo( trim( $row["PetID"] ) ); ?></td>
                        <td><?php echo( trim( $row["Name"] ) ); ?></td>
                        <td><?php echo( trim( $row["Descript"] ) ); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>

        
        <footer>
            <a id="link-idx" href="index.php">< Go back to Index</a>
        </footer>
    </body>

</html>