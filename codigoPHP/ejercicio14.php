<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 14</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 13/10/2020
            *@description:   Comprobar las librerías que estás utilizando en tu entorno de desarrollo y explotación. Crear tu propia librería de funciones y estudiar la
                            forma de usarla en el entorno de desarrollo y en el de explotación.
        */
        require_once '../core/LibreriaCalculadora.php'; //Incluimos la libreriCalculadora para poder usar sus funciones
        
        $num1 = 20; 
        $num2 = 5;
        
        echo "<p>La suma de ".$num1." + ".$num2." es: ".suma($num1, $num2)."</p>"; //Calculamos y mostramos el resultado de la suma por pantalla usando la funcion suma de la librería
        echo "<p>La resta de ".$num1." - ".$num2." es: ".resta($num1, $num2)."</p>"; //Calculamos y mostramos el resultado de la resta por pantalla usando la funcion resta de la librería
        echo "<p>La multiplicación de ".$num1." x ".$num2." es: ".multiplicacion($num1, $num2)."</p>"; //Calculamos y mostramos el resultado de la multiplicación por pantalla usando la funcion multiplicacion de la librería
        echo "<p>La divición de ".$num1." / ".$num2." es: ".division($num1, $num2)."</p>"; //Calculamos y mostramos el resultado de la divición por pantalla usando la funcion division de la librería
        
            
            
        ?>
        
    </body>
</html>

