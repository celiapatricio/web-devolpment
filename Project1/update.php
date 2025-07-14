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

            form {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #f9f9f9;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                text-align: left;
                margin-bottom: 50px;
            }

            fieldset {
                border: 1px solid #ccc;
                padding: 20px;
                border-radius: 5px;
            }

            legend {
                font-size: 16pt;
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
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
                width: 110px;
                font-size: 14px;
                color: #333;
                padding: 5px 10px;
                margin-right: 10px; 
            }

            input, select {
                border-radius: 6px;
                border: 1px solid #ccc; 
                margin: 0;
            }

            .field-radio {
                display: flex;
            }

            .field-date select{
                width: 110px;
                margin-right: 10px;
            }

            .field-submit {
                display: flex;
                justify-content: flex-end;
            }

            span {
                color: red;
            }

            input:focus {
                border: 1px solid #888;
                outline: none;
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
        <h1>The Book Index</h1>
        <?php
        include("includes/menu.php");
        ?>

        <?php
        // Prepare the SQL statement
        $sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books WHERE BookID=".$id;
        
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
        
        <form id="form" name="form" method="post" action="doUpdate.php">
            <fieldset>
                <legend>Update the P1Books table</legend>
                <ul>
                    <li class="field-text">
                        <label title="bookID" for="bookIDdis">Book ID <span>*</span></label>
                        <input name="bookIDdis" id="bookIDdis" type="text" size="30" maxlength="3" disabled="disabled"
                            value="<?php if ($num_results != 0) { echo trim($row["BookID"]); } ?>" />
                        <input name="bookID" id="bookID" type="hidden"
                            value="<?php if ($num_results != 0) { echo trim($row["BookID"]); } ?>" />
                    </li>
                    <li class="field-text">
                        <label title="title" for="title">Title <span>*</span></label>
                        <input name="title" id="title" type="text" size="30" maxlength="100"
                            value="<?php if ($num_results != 0) { echo trim($row["Title"]); } ?>" />
                    </li>
                    <li class="field-text">
                        <label title="author" for="author">Author <span>*</span></label>
                        <input name="author" id="author" type="text" size="30" maxlength="100"
                            value="<?php if ($num_results != 0) { echo trim($row["Author"]); } ?>" />
                    </li>
                    <li class="field-select">
                        <label title="topic" for="topic">Topic <span>*</span></label> 
                        <select name="topic" id="topic">
                            <option value="" disabled>Select topic</option>
                            <?php
                                $topics = ["Adventure", "Magic", "Crime", "Love & Relationships", 
                                           "Psychological Thriller", "Vampires", "Artificial Intelligence", 
                                           "Space Exploration", "Survival", "History", "World War II", 
                                           "Dystopian Societies", "Time Travel", "Greek Mythology", "Memoir"];
                                foreach ($topics as $t) {
                                    $selected = ($num_results != 0 && trim($row["Topic"]) == $t) ? "selected" : "";
                                    echo "<option value=\"$t\" $selected>$t</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="field-radio">
                        <label title="genre" for="genre">Genre <span>*</span></label>
                        <div class="radio-options">
                            <?php
                                $genres = [
                                    "Fantasy", "Science Fiction", "Mystery", "Romance",
                                    "Horror", "Historical Fiction", "Thriller", "Non-Fiction"
                                ];

                                foreach ($genres as $g) {
                                    $checked = ($num_results != 0 && trim($row["Genre"]) == $g) ? "checked" : "";
                                    echo "<label title=\"$g\" for=\"$g\">
                                            <input type=\"radio\" id=\"genre\" name=\"genre\" value=\"$g\" $checked>
                                            $g
                                        </label>";
                                }
                            ?>
                        </div>
                    </li>
                    <li class="field-text">
                        <label title="isbn" for="isbn">ISBN <span>*</span></label>
                        <input name="isbn" id="isbn" type="text" size="30" maxlength="100"
                            value="<?php if ($num_results != 0) { echo trim($row["ISBN"]); } ?>" />
                    </li>
                    <li class="field-date">
                        <label title="datePublished" for="datePublished">Date Published <span>*</span></label>
                        <?php
                            // Get the date and format it to get the year and month
                            if ($num_results != 0) {
                                $date = $row["DatePublished"];
                                $monthValue = date("M", strtotime($date));
                                $yearValue = date("Y", strtotime($date));
                            }
                        ?>
                        <select name="month" id="month" class="date">
                            <option value="" disabled>Select month</option>
                            <?php
                                $monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                                            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                foreach ($monthNames as $m) {
                                    $selected = (isset($monthValue) && $monthValue == $m) ? "selected" : "";
                                    echo "<option value='$m' $selected>$m</option>";
                                }                                  
                            ?>
                        </select>
                        <select name="year" id="year" class="date">
                            <option value="" disabled>Select year</option>
                            <?php
                                for ($y = 1500; $y <= 2026; $y++) {
                                    $selected = (isset($yearValue) && $yearValue == $y) ? "selected" : "";
                                    echo "<option value='$y' $selected>$y</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="field-checkbox">
                        <label title="hardcover" for="hardcover">Hardcover <span>*</span></label>
                        <input type="checkbox" id="hardcover" name="hardcover" value="1"
                        <?php if ($num_results != 0 && trim($row["Hardcover"]) === "Yes") { echo "checked"; } ?> />
                    </li>
                    <li class="field-errmsg">
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li class="field-submit">
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
            document.getElementById("title").focus();
        </script>
    </body>
</html>