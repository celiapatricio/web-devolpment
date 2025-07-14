<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Pet Registration</title> 
        <link rel="icon" type="image/png" href="src/icon.png">
        <style type="text/css">
            body {
                font-family: 'Arial, sans-serif';
                background-color: #f9f9f9;
                color: #333;
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
                margin: 20px;
                color: #194569;
            }

            h2 {
                text-align: center;
                margin: 20px 0;
                color: #5F84A2;
            }

            form {
                margin: 0 auto;
                width: 80%;
                max-width: 600px;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 50px;
            }

            fieldset {
                margin: 10px 0;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            legend {
                padding: 2px 7px;
                color: #194569;
                font-weight: bold;
                border-radius: 8px;
            }

            ul {
                list-style-type: none;
            }

            li {
                margin-bottom: 15px;
            }

            label {
                display: inline-block;
                width: 150px;
            }

            input[type="text"], input[type="number"], select, textarea {
                width: 200px;
                padding: 4px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }

            input[type="submit"] {
                padding: 6px 12px;
                background-color: #194569;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color:rgb(121, 168, 206);
                color: #194569;
            }

            textarea {
                width: max-content;
                resize: vertical;
            }

            span {
                color: red;
            }

            .radio-group, .select-group {
                display: flex;
                align-items: center;
            }

            .radio-group label, .select-group label {
                margin: 0;
            }

            #submit {
                display: flex;
                justify-content: center;
            }

            #errorMsg {
                color: #ff0000;
                background-color: #f9f9f9;
                font-weight: bold;
                font-size: 12pt;
                position: absolute;
                z-index: 1;
                top: 50px;
                left: 880px;
            }

            /* Nav style */
            nav {
                text-align: center;
                margin-top: 20px;
                padding: 10px;
                background-color:rgb(230, 230, 230); 
                position: fixed;
                width: 100%;
                bottom: 0;
            }
            nav a {
                color: #5F84A2;
                text-decoration: none;
                font-weight: bold;
                margin: 10px 50px; 
            }
            nav a:hover {
                color: #194569;
                text-decoration: underline;
            }
        </style>
    </head>
    
    <body>
        <nav>
            <a href="index.php">Part 1</a>
            <a href="index3.php">Part 3</a>
        </nav>

        <h1>Assign 04 - Index Page 2</h1>

        <h2>Pet Registration Form</h2>

        <form id="form0" method="post" action="storeInfo2.php"> 
            <fieldset id="pet">
                <legend>Pet Information</legend>
                <ul>
                    <li>
                        <label title="Name" for="name">Name <span>*</span></label>
                        <input type="text" name="name" id="name" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["name"])) { echo($_SESSION["name"]); } ?>"/>
                    </li>
                    <li>
                        <label title="Phone" for="phone">Phone Number <span>*</span></label>
                        <input type="text" name="phone" id="phone" size="10" maxlength="10"
                               value="<?php if (!empty($_SESSION["phone"])) { echo($_SESSION["phone"]); } ?>"/>
                    </li>
                    <li>
                        <label title="Email" for="email">Email Address <span>*</span></label>
                        <input type="text" name="email" id="email" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["email"])) { echo($_SESSION["email"]); } ?>"/>
                    </li>
                    <li>
                        <label title="Address" for="address">Address <span>*</span></label>
                        <input type="text" name="address" id="address" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["address"])) { echo($_SESSION["address"]); } ?>"/>
                    </li>
                    <li>
                        <label title="Pet Name" for="pet_name">Pet Name <span>*</span></label> 
                        <input type="text" name="pet_name" id="pet_name" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["pet_name"])) { echo($_SESSION["pet_name"]); } ?>"/>
                    </li>
                    <li>
                        <label for="species">Species <span>*</span></label>
                        <select name="species" id="species">
                            <option value="">Select Species</option>
                            <option value="dog" <?php if (!empty($_SESSION["species"]) && $_SESSION["species"] == "dog") echo 'selected'; ?>>Dog</option>
                            <option value="cat" <?php if (!empty($_SESSION["species"]) && $_SESSION["species"] == "cat") echo 'selected'; ?>>Cat</option>
                            <option value="bird" <?php if (!empty($_SESSION["species"]) && $_SESSION["species"] == "bird") echo 'selected'; ?>>Bird</option>
                            <option value="other" <?php if (!empty($_SESSION["species"]) && $_SESSION["species"] == "other") echo 'selected'; ?>>Other</option>
                        </select>
                    </li>
                    <li> 
                        <label title="Pet Breed" for="breed">Pet Breed <span>*</span></label> 
                        <input type="text" name="breed" id="breed" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["breed"])) { echo($_SESSION["breed"]); } ?>"/>
                    </li>
                    <li class="radio-group"> 
                        <label title="Pet Gender" for="gender">Pet Gender <span>*</span></label> 
                        <input type="radio" id="male" name="gender" value="male" <?php if (!empty($_SESSION["gender"]) && $_SESSION["gender"] == "male") echo "checked"; ?>>
                        <label for="male">M</label>
                        <input type="radio" id="female" name="gender" value="female" <?php if (!empty($_SESSION["gender"]) && $_SESSION["gender"] == "female") echo "checked"; ?>>
                        <label for="female">F</label>
                    </li>
                    <li> 
                        <label title="Pet Age" for="age">Pet Age <span>*</span></label> 
                        <input type="text" name="age" id="age" size="10" maxlength="2" min="0"
                               value="<?php if (!empty($_SESSION["age"])) { echo($_SESSION["age"]); } ?>"/>
                    </li>
                    <li> 
                        <label title="Weight" for="weight">Current Weight (kg) <span>*</span></label> 
                        <input type="text" name="weight" id="weight" size="10" maxlength="3" min="0"
                               value="<?php if (!empty($_SESSION["weight"])) { echo($_SESSION["weight"]); } ?>"/>
                    </li>
                    <li class="select-group"> 
                        <label title="Vaccination Status" for="vaccine">Vaccination Status <span>*</span></label> 
                        <select name="vaccine" id="vaccine">
                            <option value="" disabled selected>Select status</option>
                            <option value="Complete" <?php if (!empty($_SESSION["vaccine"]) && $_SESSION["vaccine"] == "Complete") echo 'selected'; ?>>Fully Vaccinated</option>
                            <option value="Partial" <?php if (!empty($_SESSION["vaccine"]) && $_SESSION["vaccine"] == "Partial") echo 'selected'; ?>>Partially Vaccinated</option>
                            <option value="Not vaccinated" <?php if (!empty($_SESSION["vaccine"]) && $_SESSION["vaccine"] == "Not vaccinated") echo 'selected'; ?>>Not Vaccinated</option>
                        </select>
                    </li>
                    <li class="radio-group">
                        <label title="Neutered" for="neutered">Is the pet neutered/spayed? <span>*</span></label>
                        <input type="radio" id="neuteredYes" name="neutered" value="yes" <?php if (!empty($_SESSION["neutered"]) && $_SESSION["neutered"] == "yes") echo "checked"; ?>>
                        <label title="Neutered Yes"  for="neuteredYes">Yes</label>
                        <input type="radio" id="neuteredNo" name="neutered" value="no" <?php if (!empty($_SESSION["neutered"]) && $_SESSION["neutered"] == "no") echo "checked"; ?>>
                        <label title="Neutered No"  for="neuteredNo">No</label>
                    </li>
                    <li> 
                        <label title="Comments" for="comments">Questions or Comments <span>*</span>
                        </label><textarea rows="5" cols="40" name="comments" id="comments"><?php if (!empty($_SESSION['comments'])) { echo($_SESSION['comments']); } ?></textarea>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="owner">
                <legend>Pet Owner Information<br>(if different from Pet Registration)</legend>
                <ul>
                    <li>
                        <label title="OName" for="Oname">Owner's Name</label>
                        <input type="text" name="Oname" id="Oname" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION['Oname'])) { echo($_SESSION['Oname']); } ?>"/>
                    </li>
                    <li>
                        <label title="OPhone" for="Ophone">Phone Number </label>
                        <input type="text" name="Ophone" id="Ophone" size="30" maxlength="10"
                               value="<?php if (!empty($_SESSION['Ophone'])) { echo($_SESSION['Ophone']); } ?>"/>
                    </li>
                    <li>
                        <label title="OEmail" for="Oemail">Email Address </label>
                        <input type="text" name="Oemail" id="Oemail" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION['Oemail'])) { echo($_SESSION['Oemail']); } ?>"/>
                    </li>
                    <li>
                        <label title="OAddress" for="Oaddress">Address</label>
                        <input type="text" name="Oaddress" id="Oaddress" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION['Oaddress'])) { echo($_SESSION['Oaddress']); } ?>"/>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="submit">
                <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed"/>
            </fieldset>
        </form>

        <div id="errorMsg"><?php if (!empty($_SESSION['errorMessage'])) { echo($_SESSION['errorMessage']); } ?></div>

        <script type="text/javascript">
            document.getElementById("name").focus();
        </script>

    </body>
</html>
