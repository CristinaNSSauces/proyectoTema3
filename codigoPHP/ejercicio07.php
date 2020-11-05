<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 7</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:  Mostrar el nombre del fichero que se está ejecutando
        */
             
            // basename -> devuelve el último elemento de la ruta
            echo "<p>Nombre del fichero: ".basename($_SERVER['PHP_SELF'])."</p>";
        ?>
        
    </body>
    
</html>




