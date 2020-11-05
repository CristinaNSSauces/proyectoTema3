<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 21</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 14/10/2020
            *@description:   Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
                            las preguntas y las respuestas recogidas
        */
        
        
        
        ?>
        <form name="calculadora" action="../codigoPHP/TratamientoEjercicio21.php" method="post">
            <div>
                <label for="numero1">Introduzca el primer número</label>
                <input type="text" name="numero1" required><br>
                <label for="numero2">Introduzca el segundo número</label>
                <input type="text" name="numero2" required><br>
            </div>
            <div>
                <input type="submit" value="Sumar">
                <input type="reset" value="Borrar números">
            </div>
        </form>
    </body>
</html>

