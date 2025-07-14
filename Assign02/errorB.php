<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 02 - Unauthorized Access</title>
    <link rel="icon" type="image/png" href="img/icon.png">
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #f2f2f2; /* Fondo gris claro */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333333; /* Texto gris oscuro */
        }
        .container {
            text-align: left;
            padding: 20px;
            border: 2px solid #cccccc; /* Borde gris claro */
            border-radius: 10px;
            background-color: #ffffff; /* Fondo blanco */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px; /* Ancho máximo */
            width: 90%; /* Adaptable a pantallas pequeñas */
        }
        h1 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #000000; /* Título negro */
        }
        p, li {
            font-size: 0.9rem;
            color: #333333; /* Texto gris oscuro */
        }
        a {
            color: #555555; /* Gris para enlaces */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #000000; /* Negro al pasar el cursor */
            text-decoration: underline;
        }
        hr {
            border: none;
            border-top: 1px solid #cccccc; /* Línea gris claro */
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You are not authorized to view this page</h1>
        <p>You do not have permission to view this directory or page using the credentials you supplied.</p>
        <hr />
        <p>Please try the following:</p>
        <ul>
            <li>Go back to the <a href="indexB.php">Index Page</a> to try again with different credentials.</li>
            <li>If you believe you should be able to view this directory or page, please contact the Web site administrator by using the e-mail address or phone number listed on the home page.</li>
        </ul>
        <p>HTTP 401.1 - Unauthorized: Login Failed<br />
        Internet Information Services</p>
        <hr />
    </div>
</body>
</html>
