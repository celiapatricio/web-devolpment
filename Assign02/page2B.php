<?php
echo("<!doctype html>"."\n");
echo("<html lang=\"en\">"."\n");
echo("<head>"."\n");
echo("     <meta charset=\"utf-8\">"."\n");
echo("     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">"."\n");
echo("     <title>Lab02 - Welcome to the Summer page!</title>"."\n");
echo("     <link rel=\"icon\" type=\"image/png\" href=\"img/summer-icono.png\">");
echo("     <style>"."\n");
echo("         body {"."\n");
echo("             font-family: Arial, sans-serif;"."\n");
echo("             background-color: #fff7e6;"."\n"); // Fondo suave amarillo claro
echo("             margin: 0;"."\n");
echo("             padding: 0;"."\n");
echo("             display: flex;"."\n");
echo("             flex-direction: column;"."\n");
echo("             align-items: center;"."\n");
echo("             justify-content: center;"."\n");
echo("             min-height: 100vh;"."\n"); // Altura completa de la pantalla
echo("             color: #d97706;"."\n"); // Naranja vibrante para verano
echo("         }"."\n");
echo("         h1 {"."\n");
echo("             font-size: 2.5rem;"."\n");
echo("             margin-bottom: 20px;"."\n");
echo("         }"."\n");
echo("         a {"."\n");
echo("             text-decoration: none;"."\n");
echo("             color: #e9641d;"."\n"); // Naranja para enlaces
echo("             font-weight: bold;"."\n");
echo("             transition: color 0.3s ease, text-decoration 0.3s ease;"."\n"); // Transición suave
echo("         }"."\n");
echo("         a:hover {"."\n");
echo("             color: #b85604;"."\n"); // Naranja más oscuro
echo("             text-decoration: underline;"."\n"); // Subrayado al hacer hover
echo("         }"."\n");
echo("         .container {"."\n");
echo("             text-align: center;"."\n");
echo("             padding: 20px;"."\n");
echo("             border: 2px solid #e9641d;"."\n");
echo("             border-radius: 10px;"."\n");
echo("             background-color: #ffffff;"."\n"); // Fondo blanco para contraste
echo("             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"."\n");
echo("         }"."\n");
echo("         img {"."\n");
echo("             max-width: 290px;"."\n"); // Tamaño más pequeño
echo("             height: auto;"."\n"); // Mantiene la proporción
echo("             border: 3px solid #e9641d;"."\n");
echo("             border-radius: 15px;"."\n"); // Bordes redondeados
echo("             margin-top: 20px;"."\n");
echo("         }"."\n");
echo("     </style>"."\n");
echo("</head>"."\n");
echo("<body>"."\n");
echo("     <div class=\"container\">"."\n");
echo("         <h1>Welcome to the Summer page!</h1>"."\n");
echo("         <h4><a href=\"indexB.php\">Return to the index page</a></h4>"."\n");
echo("         <img src=\"img/summer.jpg\" alt=\"Summer Image\">"."\n");
echo("     </div>"."\n");
echo("</body>"."\n");
echo("</html>"."\n");
?>
