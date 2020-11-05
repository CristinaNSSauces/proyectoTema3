<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 17</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 14/10/2020
            *@description: Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el
                            asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con
                            distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan
        */
        
        //Creamos e inicializamos todos los campos del array aTeatro a null 
        for ($fila = 1; $fila <= 20; $fila++) {
            $aTeatro[$fila] = [];
            for ($asiento = 1; $asiento <= 15; $asiento++) { 
                $aTeatro[$fila][$asiento] = "";
            }
        }
        
        // Damos un valor a determinados campos del array aTeatro
        $aTeatro[2][5] = "Alberto";
        $aTeatro[3][1] = "Raul";
        $aTeatro[5][2] = "Cristina";
        $aTeatro[7][5] = "David";        
        $aTeatro[20][15] = "Álvaro";
        
        echo "<p>Mostrar array con foreach: </p>";
        
        // Recorremos y mostramos los valores de los campos que no estén vacíos
        foreach ($aTeatro as $fila => $asientos) {
            foreach ($asientos as $asiento => $nombre) {
                if(!empty($nombre)){
                    echo "<p>".$fila." ".$asiento." ".$nombre."</p>";
                }
            }
        }
        ?>
        
    </body>
</html>
