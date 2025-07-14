<?php
if (empty($_POST["name"])) {
    header("Location: index2.php");
}

$name     = $_POST["name"];
$phone    = $_POST["phone"];
$pet_name = $_POST["pet_name"];
$breed    = $_POST["breed"];
$gender   = $_POST["gender"];
$age      = $_POST["age"];
$weight   = $_POST["weight"];
$vaccine  = $_POST["vaccine"];
$neutered = $_POST["neutered"];
$comments = $_POST["comments"];

$Oaddress = $_POST["Oaddress"];
$Oemail = $_POST["Oemail"];

if (empty($_POST["Oname"])) {
    $Oname = $name;
    $Ophone = $phone;
} else {
    $Oname = $_POST["Oname"];
    $Ophone = $_POST["Ophone"];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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
                padding: 5px 10px;
                background-color: #194569;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #5F84A2;
            }

            textarea {
                width: max-content;
                resize: vertical;
            }

            input, textarea, select {
                background: #CADEED; 
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

            /* Footer style */

            footer {
                text-align: center;
                margin: 20px 0;
            }

            footer a {
                color: #194569;
                text-decoration: none;
                font-weight: bold;
            }

            footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    
    <body>
        <h1>Assign 03 - getFormData Page 2</h1>

        <form id="form0" method="post" action="displayFormData2.php"> 
            <fieldset id="pet">
                <legend>Pet Information</legend>
                <ul>
                    <li>
                        <label title="Name" for="name">Name <span>*</span></label>
                        <input type="text" name="name" id="name" size="30" maxlength="30" value="<?php echo($name); ?>"/>
                    </li>
                    <li>
                        <label title="Phone" for="phone">Phone Number <span>*</span></label>
                        <input type="text" name="phone" id="phone" size="30" maxlength="10" value="<?php echo($phone); ?>"/>
                    </li>
                    <li>
                        <label title="Pet Name" for="pet_name">Pet Name <span>*</span></label> 
                        <input type="text" name="pet_name" id="pet_name" size="30" maxlength="30" value="<?php echo($pet_name); ?>"/>
                    </li>
                    <li> 
                        <label for="species">Pet Species <span>*</span></label> 
                        <select name="species" id="species" required>
                            <option value="" disabled <?php echo empty($_POST["species"]) ? "selected" : ""; ?>>Select species</option>
                            <option value="Dog" <?php echo ($_POST["species"] == "Dog") ? "selected" : ""; ?>>Dog</option>
                            <option value="Cat" <?php echo ($_POST["species"] == "Cat") ? "selected" : ""; ?>>Cat</option>
                            <option value="Bird" <?php echo ($_POST["species"] == "Bird") ? "selected" : ""; ?>>Bird</option>
                            <option value="Fish" <?php echo ($_POST["species"] == "Fish") ? "selected" : ""; ?>>Fish</option>
                            <option value="Hamster" <?php echo ($_POST["species"] == "Hamster") ? "selected" : ""; ?>>Hamster</option>
                            <option value="Other" <?php echo ($_POST["species"] == "Other") ? "selected" : ""; ?>>Other</option>
                        </select>
                    </li>
                    <li> 
                        <label title="Pet Breed" for="breed">Pet Breed <span>*</span></label> 
                        <input type="text" name="breed" id="breed" size="30" maxlength="30" value="<?php echo($breed); ?>"/>
                    </li>
                    <li> 
                        <label>Pet Gender <span>*</span></label> 
                        <input type="radio" id="male" name="gender" value="male" <?php echo ($gender == "male") ? "checked" : ""; ?>/>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" <?php echo ($gender == "female") ? "checked" : ""; ?>/>
                        <label for="female">Female</label>
                    </li>
                    <li> 
                        <label title="Pet Age" for="age">Pet Age <span>*</span></label> 
                        <input type="text" name="age" id="age" size="10" maxlength="2" min="0" value="<?php echo($age); ?>"/>
                    </li>
                    <li> 
                        <label title="Weight" for="weight">Current Weight (kg) <span>*</span></label> 
                        <input type="text" name="weight" id="weight" size="10" maxlength="3" min="0" value="<?php echo($weight); ?>"/>
                    </li>
                    <li> 
                        <label for="vaccine">Vaccination Status <span>*</span></label> 
                        <select name="vaccine" id="vaccine" required>
                            <option value="" disabled <?php echo empty($_POST["vaccine"]) ? "selected" : ""; ?>>Select status</option>
                            <option value="Complete" <?php echo ($_POST["vaccine"] == "Complete") ? "selected" : ""; ?>>Fully Vaccinated</option>
                            <option value="Partial" <?php echo ($_POST["vaccine"] == "Partial") ? "selected" : ""; ?>>Partially Vaccinated</option>
                            <option value="Not vaccinated" <?php echo ($_POST["vaccine"] == "Not vaccinated") ? "selected" : ""; ?>>Not Vaccinated</option>
                        </select>
                    </li>
                    <li>
                        <label>Is the pet neutered/spayed?</label>
                        <input type="radio" id="neuteredYes" name="neutered" value="yes" <?php echo ($neutered == "yes") ? "checked" : ""; ?>/>
                        <label for="neuteredYes">Yes</label>
                        <input type="radio" id="neuteredNo" name="neutered" value="no" <?php echo ($neutered == "no") ? "checked" : ""; ?>/>
                        <label for="neuteredNo">No</label>
                    </li>
                    <li> 
                        <label title="Comments" for="comments">Questions or Comments <span>*</span>
                        </label><textarea rows="5" cols="40" name="comments" id="comments"><?php echo($comments); ?></textarea>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="owner">
                <legend>Pet Owner Information <br>(if different from Pet Registration)</legend>
                <ul>
                    <li>
                        <label title="OName" for="Oname">Owner's Name</label>
                        <input type="text" name="Oname" id="Oname" size="30" maxlength="30" value="<?php echo($Oname); ?>"/>
                    </li>
                    <li>
                        <label title="OPhone" for="Ophone">Phone Number </label>
                        <input type="text" name="Ophone" id="Ophone" size="30" maxlength="10" value="<?php echo($Ophone); ?>"/>
                    </li>
                    <li>
                        <label title="OAddress" for="Oaddress">Address</label>
                        <input type="text" name="Oaddress" id="Oaddress" size="30" maxlength="30" value="<?php echo($Oaddress); ?>"/>
                    </li>
                    <li>
                        <label title="OEmail" for="Oemail">Email Address </label>
                        <input type="text" name="Oemail" id="Oemail" size="30" maxlength="30" value="<?php echo($Oemail); ?>"/>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="submit">
                <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed"/>
            </fieldset>
        </form>

        <script type="text/javascript">
            document.getElementById("name").focus();
        </script>

    </body>
</html>
