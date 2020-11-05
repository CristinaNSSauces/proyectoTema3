<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 6</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:  Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días
        */
        // Ponemos el idioma de la fecha a Portugues
        setlocale(LC_ALL, "es_ES.utf-8"); 
        //Ponemos la zona horaria portuguesa por defecto
        date_default_timezone_set("Europe/Madrid"); 
        
        //Creamos un objeto de la clase DateTime
        $oFecha = new DateTime();
        echo "<p>Fecha actual: ".$oFecha->format('d-m-Y H:i:s')."</p>";
        //Añadimos 60 días a la fecha con modify
        $oFecha->modify('+60 day');
        //Mostramos la fecha formateada por pantalla
        echo "<p>Fecha con modify +60 días: ".$oFecha->format('d-m-Y H:i:s')."</p>";
        
        //Sumamos 60 dias con date_add
        //al haber sumado anteriormente 60 días luego debemos restar 60 días para obtener el resultado que deseamos
        date_add($oFecha,date_interval_create_from_date_string('60 days'));
        //restamos 60 días a la fecha para obtener el resultado que queremos
        $oFecha->sub(new DateInterval('P60D'));
        //Mostramos la fecha formateada por pantalla
        echo "<p>Fecha con date_add +60 días: ".$oFecha->format('d-m-Y H:i:s')."</p>";
        ?>
        
    </body>
    
</html>


