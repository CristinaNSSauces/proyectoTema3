<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 22</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 14/10/2020
            *@description:  Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                           recogidas

        */
        require_once '../core/LibreriaCalculadora.php'; // Incluimos la libreriaCalculadora
            
            // Comprobamos si el usuario ha enviado el formulario
            if(isset($_POST['sumar'])){
                echo "Resultado: ".suma($_POST["numero1"], $_POST["numero2"]); // Mostramos el resultado de la suma de los campos introducidos en el formulario
            }else{
        ?>
        <form name="calculadora" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div>
                    <label for="numero1">Introduzca el primer número</label>
                    <input type="text" name="numero1" required><br>
                    <label for="numero2">Introduzca el segundo número</label>
                    <input type="text" name="numero2" required><br>
                </div>
                <div>
                    <input type="submit" value="Sumar" name="sumar">
                    <input type="reset" value="Borrar números">
                </div>
        </form>
        <?php
            }
        ?>
    </body>
</html>

