<?php
session_start();
// If errorMessage has never been used, we will create it
if(empty($_SESSION["errorMessage"])){
    $_SESSION["errorMessage"] = "";
}
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
        <form id="form0" name="form0" method="post" action="doInsert.php">
            <fieldset>
                <legend>Insert into P1Books table</legend>
                <ul>
                    <li class="field-text">
                        <label title="bookID" for="bookID">Book ID <span>*</span></label>
                        <input name="bookID" id="bookID" type="text" size="30" maxlength="3"/>
                    </li>
                    <li class="field-text">
                        <label title="title" for="title">Title <span>*</span></label>
                        <input name="title" id="title" type="text" size="30" maxlength="100"/>
                    </li>
                    <li class="field-text">
                        <label title="author" for="author">Author <span>*</span></label>
                        <input name="author" id="author" type="text" size="30" maxlength="100"/>
                    </li>
                    <li class="field-select">
                        <label title="topic" for="topic">Topic <span>*</span></label> 
                        <select name="topic" id="topic">
                            <option value="" disabled selected>Select topic</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Magic">Magic</option>
                            <option value="Crime">Crime</option>
                            <option value="Love & Relationships">Love & Relationships</option>
                            <option value="Psychological Thriller">Psychological Thriller</option>
                            <option value="Vampires">Vampires</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="Space Exploration">Space Exploration</option>
                            <option value="Survival">Survival</option>
                            <option value="History">History</option>
                            <option value="World War II">World War II</option>
                            <option value="Dystopian Societies">Dystopian Societies</option>
                            <option value="Time Travel">Time Travel</option>
                            <option value="Greek Mythology">Greek Mythology</option>
                            <option value="Memoir">Memoir</option>
                        </select>
                    </li>
                    <li class="field-radio">
                        <label title="genre" for="genre">Genre <span>*</span></label>
                        <div class="radio-options">
                            <label title="fantasy" for="fantasy">
                                <input type="radio" id="genre" name="genre" value="Fantasy">
                                Fantasy
                            </label>
                            <label title="science fiction" for="science fiction">
                                <input type="radio" id="genre" name="genre" value="Science Fiction">
                                Science Fiction
                            </label>
                            <label title="mystery" for="mystery">
                                <input type="radio" id="genre" name="genre" value="Mystery">
                                Mystery
                            </label>
                            <label title="romance" for="romance">
                                <input type="radio" id="genre" name="genre" value="Romance">
                                Romance
                            </label>
                            <label title="horror" for="horror">
                                <input type="radio" id="genre" name="genre" value="Horror">
                                Horror
                            </label>
                            <label title="historical fiction" for="historical fiction">
                                <input type="radio" id="genre" name="genre" value="Historical Fiction">
                                Historical Fiction
                            </label>
                            <label title="thriller" for="thriller">
                                <input type="radio" id="genre" name="genre" value="Thriller">
                                Thriller
                            </label>
                            <label title="non-fiction" for="non-fiction">
                                <input type="radio" id="genre" name="genre" value="Non-Fiction">
                                Non-Fiction
                            </label>
                        </div>
                    </li>
                    <li class="field-text">
                        <label title="isbn" for="isbn">ISBN <span>*</span></label>
                        <input name="isbn" id="isbn" type="text" size="30" maxlength="20"/>
                    </li>
                    <li class="field-date">
                        <label title="date" for="date">Date Published <span>*</span></label>
                        <select name="month" id="month" class="date">
                        <option value="" disabled selected>Select month</option>
                            <?php
                                $monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                                               "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                foreach ($monthNames as $month) {
                                    echo "<option value='$month'>$month</option>";
                                }                                  
                            ?>
                        </select>
                        <select name="year" id="year" class="date">
                        <option value="" disabled selected>Select year</option>
                            <?php
                                for ($y = 1500; $y <= 2026; $y++) {
                                    echo "<option value='$y'>$y</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li class="field-checkbox">
                        <label title="hardcover" for="hardcover">Hardcover <span>*</span></label>
                        <input name="hardcover" id="hardcover" type="checkbox" value="1">
                    </li>
                    <li class="field-errmsg">
                        <span><?php echo($_SESSION["errorMessage"]);?></span>
                    </li>
                    <li class="field-submit">
                        <input type="submit" value="Insert Info" name="submit" id="submit"/>
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
            document.getElementById("bookID").focus();
        </script>

    </body>
</html>
