<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 18</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 14/10/2020
            *@description: Recorrer el array anterior utilizando funciones para obtener el mismo resultado
        */
        
        define("NUM_MAX_FILAS",20); // Definimos e inicializamos la costante del numero máximo de filas del teatro
        define("NUM_MAX_ASIENTOS",15); // Definimos e inicializamos la costante del numero máximo de asientos por fila del teatro
        define("NUM_MIN_FILAS",1); // Definimos e inicializamos la costante del numero mínimo de filas del teatro
        define("NUM_MIN_ASIENTOS",1); // Definimos e inicializamos la costante del numero mínimo de asientos por fila del teatro
        
        
        //Creamos e inicializamos todos los campos del array aTeatro a null 
        for ($fila=NUM_MIN_FILAS; $fila<=NUM_MAX_FILAS; $fila++) {
            $aTeatro[$fila] = [];
            for ($asiento=NUM_MIN_ASIENTOS; $asiento<=NUM_MIN_ASIENTOS; $asiento++) { 
                $aTeatro[$fila][$asiento] = "";
            }
        }
        
        // Damos un valor a determinados campos del array aTeatro
        $aTeatro[2][5] = "Alberto";
        $aTeatro[3][1] = "Raul";
        $aTeatro[5][2] = "Cristina";
        $aTeatro[7][5] = "David";        
        $aTeatro[20][15] = "María";
        
        echo "<p>Mostrar array con foreach: </p>";
        
        // Recorremos y mostramos los valores de los campos que no estén vacíos usando foreach()
        foreach ($aTeatro as $fila => $asientos) {
            foreach ($asientos as $asiento => $nombre) {
                if(!empty($nombre)){
                    echo "<p>".$fila." ".$asiento." ".$nombre."</p>";
                }
            }
        }
        
        echo "<p>Mostrar array con for: </p>";
        
        // Recorremos y mostramos los valores de los campos que no estén vacíos usando for()
        for ($fila=NUM_MIN_FILAS; $fila<=NUM_MAX_FILAS; $fila++) {
            for ($asiento=NUM_MIN_ASIENTOS; $asiento<=NUM_MAX_ASIENTOS; $asiento++) { 
                if(!empty($aTeatro[$fila][$asiento])){
                    echo "<p>".$fila." ".$asiento." ".$aTeatro[$fila][$asiento]."</p>";
                }
            }
        }
        
        echo "<p>Mostrar array con while: </p>";
        $fila = NUM_MIN_FILAS;
        
        // Recorremos y mostramos los valores de los campos que no estén vacíos usando while()
        while($fila<=NUM_MAX_FILAS){
            $asiento = NUM_MIN_ASIENTOS;
            while($asiento<=NUM_MAX_ASIENTOS){
                if(!empty($aTeatro[$fila][$asiento])){
                    echo "<p>".$fila." ".$asiento." ".$aTeatro[$fila][$asiento]."</p>";
                }
                $asiento++;
            }
            $fila++;
        }
         
        ?>
        
    </body>
</html>