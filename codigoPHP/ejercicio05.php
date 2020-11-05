<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 5</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:  Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
        */
        // Ponemos el idioma de la fecha a Español
        setlocale(LC_ALL, "es_ES.utf-8"); 
        //Ponemos la zona horaria española por defecto
        date_default_timezone_set("Europe/Madrid"); 
            
        $fecha = new DateTime(); //Creamos un objeto DateTime
        echo "<p>Fecha: ".$fecha->format('d-m-Y H:i:s')."</p>"; //Mostramos el objeto fecha por pantalla formateado
        echo "<p>TimeStamp: ".$fecha->getTimestamp()."</p>"; //Mostramos el Timestamp de la fecha por pantalla
        
        $america = new DateTime('1492-10-12'); //Creamos un objeto DateTime on la fecha del descubrimiento de América
        echo "<p>TimeStamp descubrimiento américa: ".$america->getTimestamp()."</p>"; //Obtenemos el Timestamp de la fecha del descubrimiento de América y lo mostramos por pantalla
        ?>
        
    </body>
    
</html>

