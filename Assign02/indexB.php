<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab02 - Login</title>
        <link rel="icon" type="image/png" href="img/icon.png">
        <style type="text/css">
            body {
                font-family: Verdana, sans-serif;
                background-color: #f2f2f2; 
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                flex-direction: column;
                color: #333333; 
            }
            h1 {
                font-size: 2rem; 
                margin-bottom: 5px;
                color: #000000; 
                text-align: center;
            }
            h2 {
                font-size: 1.5rem;
                margin-bottom: 20px;
                color: #555555; 
                text-align: center;
            }
            form {
                background-color: #ffffff; 
                border: 2px solid #cccccc; 
                border-radius: 10px;
                padding: 20px;
                width: 100%;
                max-width: 400px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            fieldset {
                border: 1px solid #cccccc; 
                border-radius: 5px;
                margin-bottom: 20px;
                padding: 15px;
            }
            legend {
                color: #000000; 
                font-size: 1rem;
                font-weight: bold;
            }
            ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            ul li {
                margin-bottom: 15px;
                display: flex;
                flex-direction: column;
            }
            ul li label {
                color: #333333;
                margin-bottom: 5px;
            }
            ul li input {
                border: 1px solid #cccccc;
                padding: 8px;
                border-radius: 5px;
                font-size: 0.9rem;
                width: 90%;
            }
            ul li input:focus {
                border-color: #666666;
            }
            #submitBtn {
                background-color: #f2f2f2;
                color: #333333;
                border: 1px solid #cccccc;
                padding: 10px;
                border-radius: 5px;
                width: 100%;
                cursor: pointer;
                font-size: 1rem;
                transition: background-color 0.3s ease, color 0.3s ease;
            }
            #submitBtn:hover {
                background-color: #cccccc;
                color: #000000;
            }
            .btnPart1 {
                text-align: center;
                margin-top: 40px; 
                margin-bottom: 40px;
            }
            .btnPart1 button {
                background-color: #cccccc; 
                color: #333333; 
                border: none; 
                padding: 10px 20px; 
                font-size: 16px; 
                font-family: "Gotham", "Helvetica Neue", Helvetica, Arial, sans-serif;
                border-radius: 5px; 
                cursor: pointer; 
                transition: background-color 0.3s, transform 0.3s;
            }
            .btnPart1 button:hover {
                background-color: #999999; 
                color: #ffffff;
                transform: scale(1.05); 
            }
            .btnPart1 button:active {
                transform: scale(0.95);
                background-color: #666666;
            }
            .list-logins {
                margin-top: 30px;
                padding: 20px; 
                background-color: #ffffff; 
                border: 2px solid #cccccc; 
                border-radius: 10px; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
                max-width: 400px;
                text-align: left; 
            }
            .list-logins h2 {
                font-size: 1.5rem; 
                color: #000000; 
                margin-bottom: 15px;
                text-align: center;
            }
            .list-logins ul {
                list-style-type: none;
                padding: 0; 
            }
            .list-logins li {
                background-color: #f9f9f9; 
                margin-bottom: 10px;
                padding: 10px; 
                border: 1px solid #e0e0e0;
                border-radius: 5px; 
                font-size: 1rem; 
                color: #333333; 
            }
            .list-logins li:hover {
                background-color: #f2f2f2;
                border-color: #cccccc; 
                transition: background-color 0.3s, border-color 0.3s; 
            }
        </style>
    </head>
    <body>
        <h1>Lab 02 - Login</h1>
        <h2>Part 2</h2>
        <form name="form0" id="form0" action="loginB.php" method="post">
            <fieldset>
                <legend>Login</legend>
                <ul>
                    <li>
                        <label for="userID">User ID <span>*</span></label>
                        <input type="text" name="userID" id="userID" maxlength="30" required>
                    </li>
                    <li>
                        <label for="passwd">Password <span>*</span></label>
                        <input type="password" name="passwd" id="passwd" maxlength="30" required>
                    </li>
                </ul>
            </fieldset>
            <fieldset>
                <input type="submit" id="submitBtn" name="submitBtn" value="Login">
            </fieldset>
        </form>
        <div class="list-logins">
            <h2>Logins & Passwords</h2>
            <ul>
                <li>Usuario: season1 | Contraseña: spring</li>
                <li>Usuario: season2 | Contraseña: summer</li>
                <li>Usuario: season3 | Contraseña: fall</li>
                <li>Usuario: season4 | Contraseña: winter</li>
            </ul>
        </div>
        <div class="btnPart1">
            <button onclick="location.href='index.php'">Part 1</button>
        </div>
        <script>
            document.getElementById("userID").focus();
        </script>
    </body>
</html>
