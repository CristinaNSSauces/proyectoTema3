<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description: Mostrar en tu página index la fecha y hora actual formateada en castellano
        */
        // Ponemos el idioma de la fecha a español
        setlocale(LC_ALL, "es_ES.utf-8"); 
        //Ponemos la zona horaria española por defecto
        date_default_timezone_set("Europe/Madrid"); 
        
        //Creamos un objeto DateTime()
        $fecha = new DateTime();
        
        echo "<p>Fecha: ".$fecha->format('d-m-Y H:i:s')."</p>"; //Mostramos el objeto fecha por pantalla formateado
        echo "<p>TimeStamp: ".$fecha->getTimestamp()."</p>"; //Mostramos el Timestamp de la fecha por pantalla
        echo "<p> Fecha y hora local usando strftime(): ". strftime("%A %d de %B de %Y , %T") . "</p>"; //Mostramos la fecha y hora local formateada al español
        ?>
        
    </body>
    
</html>