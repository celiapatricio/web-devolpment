<?php
session_start();
include("includes/openDbConn.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Book Index</title>
        <link rel="icon" type="image/jpg" href="img/book-icon.jpg">
        <style type="text/css">
            body {
                font-family: 'Arial', sans-serif;
                color: #333;
                margin: 0;
                padding: 0;
                text-align: center;
            }

            h1 {
                font-size: 2.5em;
                color: #222;
                margin-top: 30px;
                text-transform: uppercase;
            }

            table {
                width: 85%;
                margin: auto;
                border-spacing: 0; 
                margin-bottom: 50px;
                border-radius: 10px;
                overflow: hidden;
                background: white;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.18);
            }

            th {
                background-color: #f2f2f2;
                font-size: 15px;
            }

            th, td {
                border: 1px solid #f2f2f2;
                padding: 8px;
                text-align: left;
            }

            td {
                font-size: 14px;
            }

            th.table-title {
                background-color: #444;
                color: #f2f2f2;
                font-size: 20pt;
                padding: 10px 0;
                text-align: center;
            }

            tbody tr:hover {
                background-color: #d9d9d9;
            }

            tfoot {
                background-color: #444;
                color: #f2f2f2;
            }

            tfoot td {
                padding: 10px 0;
                text-align: center;
            }

            footer {
                position: fixed;
                bottom: 0;
                padding: 10px 0;
                background-color: #f4f4f4;
                color: #333;
                text-align: center;
                width: 100%;
            }

            a#link-idx {
                color: #555;
                text-decoration: none;
            }

            a#link-idx:hover {
                color: #000;
            }
        </style>
    </head>

    <body>
        <?php
        // Prepare my SQL statement
        $sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books";


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

        <h1>The Book Index</h1>

        <?php
        include("includes/menu.php");
        ?>

        <table title="Listing of Books" id="booksTable">
            <thead>
                <tr>
                    <th colspan="9" class="table-title">P1Books table</th>
                </tr>
                <tr>
                    <th>&nbsp</th>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Topic</th>
                    <th>Genre</th>
                    <th>ISBN</th>
                    <th>Date Published</th>
                    <th>Hardcover</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="9">Information pulled from P1Books table.</td>
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
                            <a href="update.php?id=<?php echo trim($row["BookID"]); ?>">edit</a> |
                            <a href="delete.php?id=<?php echo trim($row["BookID"]); ?>">delete</a>
                        </td>
                        <td><?php echo( trim( $row["BookID"] ) ); ?></td>
                        <td><?php echo( trim( $row["Title"] ) ); ?></td>
                        <td><?php echo( trim( $row["Author"] ) ); ?></td>
                        <td><?php echo( trim( $row["Topic"] ) ); ?></td>
                        <td><?php echo( trim( $row["Genre"] ) ); ?></td>
                        <td><?php echo( trim( $row["ISBN"] ) ); ?></td>
                        <td><?php echo( trim( $row["DatePublished"] ) ); ?></td>
                        <td><?php echo( trim( $row["Hardcover"] ) ); ?></td>
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
