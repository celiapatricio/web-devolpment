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
        <h1>Assign 03 - Index Page 2</h1>

        <h2>Pet Registration Form</h2>

        <form id="form0" method="post" action="getFormData2.php"> 
            <fieldset id="pet">
                <legend>Pet Information</legend>
                <ul>
                    <li>
                        <label title="Name" for="name">Name <span>*</span></label>
                        <input type="text" name="name" id="name" size="30" maxlength="30"/>
                    </li>
                    <li>
                        <label title="Phone" for="phone">Phone Number <span>*</span></label>
                        <input type="text" name="phone" id="phone" size="30" maxlength="10"/>
                    </li>
                    <li>
                        <label title="Pet Name" for="pet_name">Pet Name <span>*</span></label> 
                        <input type="text" name="pet_name" id="pet_name" size="30" maxlength="30"/>
                    </li>
                    <li class="select-group"> 
                        <label title="Pet Species" for="species">Pet Species <span>*</span></label> 
                        <select name="species" id="species">
                            <option value="" disabled selected>Select species</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Bird">Bird</option>
                            <option value="Fish">Fish</option>
                            <option value="Hamster">Hamster</option>
                            <option value="Other">Other</option>
                        </select>
                    </li>
                    <li> 
                        <label title="Pet Breed" for="breed">Pet Breed <span>*</span></label> 
                        <input type="text" name="breed" id="breed" size="30" maxlength="30"/>
                    </li>
                    <li class="radio-group"> 
                        <label title="Pet Gender" for="gender">Pet Gender <span>*</span></label> 
                        <input type="radio" id="male" name="gender" value="male">
                        <label title="Male" for="male">M</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label title="Male" for="male">F</label>
                    </li>
                    <li> 
                        <label title="Pet Age" for="age">Pet Age <span>*</span></label> 
                        <input type="text" name="age" id="age" size="10" maxlength="2" min="0"/>
                    </li>
                    <li> 
                        <label title="Weight" for="weight">Current Weight (kg) <span>*</span></label> 
                        <input type="text" name="weight" id="weight" size="10" maxlength="3" min="0"/>
                    </li>
                    <li class="select-group"> 
                        <label title="Vaccination Status" for="vaccine">Vaccination Status <span>*</span></label> 
                        <select name="vaccine" id="vaccine">
                            <option value="" disabled selected>Select status</option>
                            <option value="Complete">Fully Vaccinated</option>
                            <option value="Partial">Partially Vaccinated</option>
                            <option value="Not vaccinated">Not Vaccinated</option>
                        </select>
                    </li>
                    <li class="radio-group">
                        <label title="Neutered" for="neutered">Is the pet neutered/spayed? <span>*</span></label>
                        <input type="radio" id="neuteredYes" name="neutered" value="yes">
                        <label title="Neutered Yes"  for="neuteredYes">Yes</label>
                        <input type="radio" id="neuteredNo" name="neutered" value="no">
                        <label title="Neutered No"  for="neuteredNo">No</label>
                    </li>
                    <li> 
                        <label title="Comments" for="comments">Questions or Comments <span>*</span>
                        </label><textarea rows="5" cols="40" name="comments" id="comments"></textarea>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="owner">
                <legend>Pet Owner Information <br>(if different from Pet Registration)</legend>
                <ul>
                    <li>
                        <label title="OName" for="Oname">Owner's Name</label>
                        <input type="text" name="Oname" id="Oname" size="30" maxlength="30"/>
                    </li>
                    <li>
                        <label title="OPhone" for="Ophone">Phone Number </label>
                        <input type="text" name="Ophone" id="Ophone" size="30" maxlength="10"/>
                    </li>
                    <li>
                        <label title="OAddress" for="Oaddress">Address</label>
                        <input type="text" name="Oaddress" id="Oaddress" size="30" maxlength="30"/>
                    </li>
                    <li>
                        <label title="OEmail" for="Oemail">Email Address </label>
                        <input type="text" name="Oemail" id="Oemail" size="30" maxlength="30"/>
                    </li>
                </ul>
            </fieldset>
            <fieldset id="submit">
                <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed"/>
            </fieldset>
        </form>

        <footer>
            <a href="index.php">Part 1</a>
        </footer>

        <script type="text/javascript">
            document.getElementById("name").focus();
        </script>

    </body>
</html>
