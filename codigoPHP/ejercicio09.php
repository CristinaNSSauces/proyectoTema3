<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 9</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:  Mostrar el path donde se encuentra el fichero que se está ejecutando
        */
             
            // _SERVER['SCRIPT_NAME'] contiene la ruta del script actual
            echo "<p>Path donde se encuentra el fichero: ".$_SERVER['SCRIPT_NAME']."</p>";
        ?>
        
    </body>
    
</html>
