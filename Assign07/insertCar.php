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
        <title>Lab 7 - Insert Car</title>
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
                width: 120px;
                text-align: left;
            }

            input, select {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 320px;
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
        <h1>Lab 7 - Insert Car</h1>
        
        <p>Celia Yun Patricio Ferrer</p>
        
        <?php
        include("includes/menu.php");
        ?>

        <!-- Insert car in CarsTable -->

        <form id="form" name="form" method="post" action="doInsertCar.php">
            <fieldset>
                <legend>Insert into Assign06Cars table</legend>
                <ul>
                    <li class="text-group">
                        <label title="CarID" for="carID">Car ID <span>*</span></label>
                        <input name="carID" id="carID" type="text" size="30" maxlength="5" />
                    </li>
                    <li class="select-group">
                        <label title="CarMake" for="carMake">Make <span>*</span></label>
                        <select name="carMake" id="carMake">
                            <option value="" disabled selected>- Make -</option>
                            <option value="Acura">Acura</option>
                            <option value="Aston Martin">Aston Martin</option>
                            <option value="Audi">Audi</option>
                            <option value="Bentley">Bentley</option>
                            <option value="Bmw">Bmw</option>
                            <option value="Buick">Buick</option>
                            <option value="Cadillac">Cadillac</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Chrysler">Chrysler</option>
                            <option value="Dodge">Dodge</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Ford">Ford</option>
                            <option value="Gmc">Gmc</option>
                            <option value="Honda">Honda</option>
                            <option value="Hummer">Hummer</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Infiniti">Infiniti</option>
                            <option value="Isuzu">Isuzu</option>
                            <option value="Jaguar">Jaguar</option>
                            <option value="Jeep">Jeep</option>
                            <option value="Kia">Kia</option>
                            <option value="Lamborghini">Lamborghini</option>
                            <option value="Land Rover">Land Rover</option>
                            <option value="Lexus">Lexus</option>
                            <option value="Lincoln">Lincoln</option>
                            <option value="Lotus">Lotus</option>
                            <option value="Maserati">Maserati</option>
                            <option value="Maybach">Maybach</option>
                            <option value="Mazda">Mazda</option>
                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                            <option value="Mercury">Mercury</option>
                            <option value="Mini">Mini</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Pontiac">Pontiac</option>
                            <option value="Porsche">Porsche</option>
                            <option value="Rolls-Royce">Rolls-Royce</option>
                            <option value="Saab">Saab</option>
                            <option value="Saturn">Saturn</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Volvo">Volvo</option>
                        </select>
                    </li>
                    <li class="text-group">
                        <label title="CarModel" for="carModel">Model <span>*</span></label>
                        <input name="carModel" id="carModel" type="text" size="30" maxlength="50" />
                    </li>
                    <li class="select-group">
                        <label title="CarYear" for="carYear">Year <span>*</span></label>
                        <select name="carYear" id="carYear">
                            <option value="" disabled selected>- Year -</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                        </select>
                    </li>
                    <li class="text-group">
                        <label title="CarColor" for="carColor">Color <span>*</span></label>
                        <input name="carColor" id="carColor" type="text" size="30" maxlength="50" />
                    </li>
                    <li class="radio-group">
                        <label title="CarHybrid" for="carHybrid">Hybrid? <span>*</span></label>
                        <div class="radio-opts">
                            <label title="CarHybridYes" for="yes"><input type="radio" id="yes" name="carHybrid" value="Yes"/>Yes</label>
                            <label title="CarHybridNo" for="no"><input type="radio" id="no" name="carHybrid" value="No"/>No</label>
                        </div>
                    </li>
                    <li class="err-group">
                        <span><?php echo($_SESSION["errorMessage"]); ?></span>
                    </li>
                    <li class="submit-group">
                        <input type="submit" value="Insert Car" name="submit" id="submit" />
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
            document.getElementById("carID").focus();
        </script>
    </body>
</html>