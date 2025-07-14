<?php
if (empty($_POST["name"])) {
    header("Location: index.php");
}

// Grabbed info from billing - left hand side
$name     = $_POST["name"];
$address  = $_POST["address"];
$city     = $_POST["city"];
$state    = $_POST["state"];
$zip      = $_POST["zip"];
$country  = $_POST["country"];
$phone    = $_POST["phone"];
$email    = $_POST["email"];
$comments = $_POST["comments"];

// If shipping name is empty, copy the billing info into shipping
if (empty($_POST["Sname"])) {
    $Sname = $name;
    $Saddress = $address;
    $Scity = $city;
    $Sstate = $state;
    $Szip = $zip;
    $Scountry = $country;
} else {
    // Shipping name contained a value, so get the rest of the shipping info
    $Sname = $_POST["Sname"];
    $Saddress = $_POST["Saddress"];
    $Scity = $_POST["Scity"];
    $Sstate = $_POST["Sstate"];
    $Szip = $_POST["Szip"];
    $Scountry = $_POST["Scountry"];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Assign 03 - getFormData Page</title>
        <style type="text/css">
            ul {
                list-style:none; 
                margin-top:5px;
            }
            ul li {
                display:block; 
                float:left; 
                width:100%; 
                height:1%;
            }
            ul li label {
                float:left; 
                padding:7px; 
                color:#6666ff
            }
            ul li input, ul li textarea {
                float:right; 
                margin-right:10px; 
                border:1px solid #ccc; 
                padding:3px; 
                font-family: Georgia, Times New Roman, Times, serif;
                width:60%;
            }
            li input:focus, li textarea:focus {
                border:1px solid #666; 
            }
            fieldset { 
                padding:10px; 
                border:1px solid #ccc; 
                width:400px; 
                overflow:auto; 
                margin:10px;
            }
            legend {
                color:#000099; 
                margin:0 10px 0 0; 
                padding:0 5px; 
                font-size:11pt; 
                font-weight:bold; 
            }
            label span {
                color:#ff0000;
            }
            fieldset#billing {
                position:absolute; 
                top:60px; 
                left:20px;
            }
            fieldset#shipping {
                position:absolute; 
                top:60px; 
                left:460px;
            }
            fieldset#submit {
                position:absolute; 
                top:540px; 
                left:20px; 
                width:840px; 
                text-align:center;
            }
            fieldset input#SubmitBtn {
                background:#E5E5E5; 
                color:#000099; 
                border:1px solid #ccc; 
                padding:5px; 
                width:150px;
            }
            input, textarea {
                background:#ddddff; 
            }
        </style>
    </head>
    
    <body>
        <h1 style="font-size: 14pt; text-indent: 360px;">Assign 03 - getFormData Page</h1>
        <form id="form0" method="post" action="displayFormData.php">
            <fieldset id="billing">
                <legend>Billing Information</legend>
                <ul>
                    <li>
                        <label for="name">Name <span>*</span></label> 
                        <input type="text" name="name" size="30" maxlength="30" value="<?php echo($name); ?>"/> 
                    </li>
                    <li> 
                        <label for="address">Address <span>*</span></label> 
                        <input type="text" name="address" size="30" maxlength="30" value="<?php echo($address); ?>"/> 
                    </li>
                    <li> 
                        <label for="city">City <span>*</span></label> 
                        <input type="text" name="city" size="30" maxlength="30" value="<?php echo($city); ?>"/> 
                    </li>
                    <li> 
                        <label for="state">State <span>*</span></label> 
                        <input type="text" name="state" size="30" maxlength="30" value="<?php echo($state); ?>"/> 
                    </li>
                    <li> 
                        <label for="zip">Zip Code <span>*</span></label> 
                        <input type="text" name="zip" size="30" maxlength="5" value="<?php echo($zip); ?>"/> 
                    </li>
                    <li> 
                        <label for="country">Country <span>*</span></label> 
                        <input type="text" name="country" size="30" maxlength="30" value="<?php echo($country); ?>"/> 
                    </li>
                    <li> 
                        <label for="phone">Phone <span>*</span></label> 
                        <input type="text" name="phone" size="30" maxlength="30" value="<?php echo($phone); ?>"/> 
                    </li>
                    <li> 
                        <label for="email">Email <span>*</span></label> 
                        <input type="text" name="email" size="30" maxlength="30" value="<?php echo($email); ?>"/> 
                    </li>
                    <li> 
                        <label for="comments">Comments</label> 
                        <textarea rows="5" cols="40" name="comments"><?php echo($comments); ?></textarea> 
                    </li>
                </ul>
            </fieldset>

            <fieldset id="shipping">
                <legend>Shipping Information (if different from billing)</legend>
                <ul>
                    <li>
                        <label for="Sname">Name</label> 
                        <input type="text" name="Sname" size="30" maxlength="30" value="<?php echo($Sname); ?>"/> 
                    </li>
                    <li> 
                        <label for="Saddress">Address</label> 
                        <input type="text" name="Saddress" size="30" maxlength="30" value="<?php echo($Saddress); ?>"/> 
                    </li>
                    <li> 
                        <label for="Scity">City</label> 
                        <input type="text" name="Scity" size="30" maxlength="30" value="<?php echo($Scity); ?>"/> 
                    </li>
                    <li> 
                        <label for="Sstate">State</label> 
                        <input type="text" name="Sstate" size="30" maxlength="30" value="<?php echo($Sstate); ?>"/> 
                    </li>
                    <li> 
                        <label for="Szip">Zip Code</label> 
                        <input type="text" name="Szip" size="30" maxlength="5" value="<?php echo($Szip); ?>"/> 
                    </li>
                    <li> 
                        <label for="Scountry">Country</label> 
                        <input type="text" name="Scountry" size="30" maxlength="30" value="<?php echo($Scountry); ?>"/> 
                    </li>
                </ul>
            </fieldset>

            <fieldset id="submit">
                <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed" />
            </fieldset>
        </form>

        <script type="text/javascript">
            document.getElementById("name").focus();
        </script>
    </body>
</html>
