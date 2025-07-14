<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Assign 04 - Part 3</title> 
        <link rel="icon" type="image/png" href="src/icon2.png">
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
                color: black;
            }
            h2 {
                text-align: center;
                color: #333333;
            }
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
                color:#666666;
            }
            ul li input, ul li textarea {
                float:right; 
                margin-right:10px; 
                border:1px solid #ccc; 
                padding:3px; 
                font-family: Georgia, Times New Roman, Times, serif;
                width:60%;
                margin-bottom: 10px;
                border-radius: 3px;
            }
            li input:focus, li textarea:focus {
                border:1px solid #666; 
            }
            #form0 {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            fieldset { 
                padding:10px; 
                border:1px solid #ccc; 
                width:500px; 
                overflow:auto; 
                margin:20px;
                background-color: #ffffff;
            }
            legend {
                color:#333333; 
                margin:0 10px 0 0; 
                padding:0 5px; 
                font-size:11pt; 
                font-weight:bold; 
            }
            label span {
                color: #ff0000;
            }
            textarea {
                resize: vertical;
            }
            fieldset#data {
                /* position:absolute; 
                top:60px; 
                left:20px; */
            }
            fieldset#submit {
                /* position:absolute; 
                top:440px; 
                left:20px;  */
                width:500px; 
                text-align:center;
            }
            fieldset input#SubmitBtn {
                background: #ccc; 
                color: #333333; 
                border:1px solid #ccc; 
                padding:5px; 
                width:150px;
            }
            #SubmitBtn:hover {
                color: #fff;
                background-color: #333333;
            }
            #errorMsg {
                color: #ff0000;
                font-weight: bold;
                font-size: 12pt;
                position: absolute;
                top: 30px;
                left: 870px;
            }
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
                color: #333333;
                text-decoration: none;
                font-weight: bold;
                margin: 10px 50px;
            }
            nav a:hover {
                color:rgb(20, 20, 20);
                text-decoration: underline;
            }
        </style>
    </head>
    
    <body>
        <nav>
            <a href="index.php">Part 1</a>
            <a href="index2.php">Part 2</a>
        </nav>
        <h1>Assign 04 - Part 3</h1>

        <h2>Project Registration Form</h2>

        <form id="form0" method="post" action="storeInfo3.php">
            <fieldset id="data">
                <legend>Enter the Project Details</legend>
                <ul>
                    <li>
                        <label title="Project ID" for="projectid">Project ID <span>*</span></label>
                        <input type="text" name="projectid" id="projectid" size="30" maxlength="30" 
                               value="<?php if (!empty($_SESSION["projectid"])) { echo($_SESSION["projectid"]); } ?>"/>
                    </li>
                    <li>
                        <label title="Project Name" for="projectname">Project Name <span>*</span></label> 
                        <input type="text" name="projectname" id="projectname" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["projectname"])) { echo($_SESSION["projectname"]); } ?>"/>
                    </li>
                    <li> 
                        <label title="Project Description" for="projectdescription">Project Description <span>*</span></label>
                        <textarea rows="5" cols="40" name="projectdescription" id="projectdescription"><?php if (!empty($_SESSION['projectdescription'])) { echo($_SESSION['projectdescription']); } ?></textarea>
                    </li>
                    <li> 
                        <label title="Manager Name" for="managername">Manager Name <span>*</span></label> 
                        <input type="text" name="managername" id="managername" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["managername"])) { echo($_SESSION["managername"]); } ?>"/>
                    </li>
                    <li> 
                        <label title="Manager Email" for="manageremail">Manager Email <span>*</span></label> 
                        <input type="text" name="manageremail" id="manageremail" size="30" maxlength="30"
                               value="<?php if (!empty($_SESSION["manageremail"])) { echo($_SESSION["manageremail"]); } ?>"/>
                    </li>
                    <li> 
                        <label title="Manager Phone" for="managerphone">Manager Phone <span>*</span></label> 
                        <input type="text" name="managerphone" id="managerphone" size="10" maxlength="10"
                               value="<?php if (!empty($_SESSION["managerphone"])) { echo($_SESSION["managerphone"]); } ?>"/>
                    </li>
                </ul>
            </fieldset>
            
            <fieldset id="submit">
                <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed"/>
            </fieldset>
        </form>

        <div id="errorMsg"><?php if (!empty($_SESSION['errorMessage'])) { echo($_SESSION['errorMessage']); } ?></div>

        <script type="text/javascript">
            document.getElementById("projectid").focus();
        </script>

    </body>
</html>
