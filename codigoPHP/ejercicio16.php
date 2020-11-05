<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 16</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description: Recorrer el array anterior utilizando funciones para obtener el mismo resultado
        */
        
        //Creamos un array asociativo y lo rellenamos
        $aAsociativo = ['Lunes' => 50,
                        'Martes' => 50, 
                        'Miercoles' => 50, 
                        'Jueves' => 50,
                        'Viernes' => 50,
                        'Sabado' => 100,
                        'Domingo' => 100];
        
        $suma = 0; // Declaramos e inicializamos la variable suma a cero para poder acumular los diferentes valores de las claves del array
        
        // Recorremos el array
        while(key($aAsociativo)!=null){
            $suma+= current($aAsociativo); // Acumulamos en la variable suma el valor de la actual posición
            next($aAsociativo); // Avanzamos a la siguiente posición del array
        }
        
        echo "<p>Sueldo percibido durante la semana: ".$suma."</p>"; // Mostramos por pantalla el valor de la suma de los valores de todas las claves del array
            
        ?>
        
    </body>
</html>