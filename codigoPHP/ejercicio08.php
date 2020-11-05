<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 8</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:  Mostrar la dirección IP del equipo desde el que estás accediendo
        */
             
            //_SERVER[REMOTE_ADDR] devuelve la direccion IP del equipo desde el que estás accediendo
            echo "<p>Dirección IP equipo: ".$_SERVER['REMOTE_ADDR']."</p>"; 
        ?>
        
    </body>
    
</html>