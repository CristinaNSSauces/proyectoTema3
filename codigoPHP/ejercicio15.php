<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 15</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:   Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la
                            semana. (Array asociativo con los nombres de los días de la semana).
        */
        
        //Creamos un array asociativo y lo rellenamos
        $aAsociativo = ['Lunes' => 50,
                        'Martes' => 50, 
                        'Miercoles' => 50, 
                        'Jueves' => 50,
                        'Viernes' => 50,
                        'Sabado' => 100,
                        'Domingo' => 100];
        
        $acumulador = 0;
        
        //Recorremos el array
        foreach($aAsociativo as $clave => $valor){
            $acumulador+=$valor; //Acumulamos los valores de las claves del array
        }
        
        echo "<p>Sueldo percibido durante la semana: ".$acumulador."</p>"; //Mostramos el valor del acumulador por pantalla
        ?>
        
    </body>
</html>
