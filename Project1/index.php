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

            .main-content {
                background: url('img/books.jpg') no-repeat center center fixed;
                background-size: cover;
                height: 470px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .container {
                width: 80%;
                margin: auto;
                max-width: 800px;
                background: rgba(255, 255, 255, 0.9);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.18);
            }

            strong:hover {
                color: #f00;
                cursor: pointer;
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
        </style>
    </head>
    <body>
        <header>
            <h1>The Book Index</h1>
        </header>

        <?php include("includes/menu.php"); ?>

        <div class="main-content">
            <div class="container">
                <p>Welcome to <strong>The Book Index</strong>, your ultimate database for books.</p>
                <p>Manage your book collection easily: add, delete, or modify entries as needed!</p>
            </div>
        </div>

        <footer>
            <p>Celia Yun Patricio Ferrer &copy; 2025 The Book Index</p>
        </footer>
    </body>

</html>
