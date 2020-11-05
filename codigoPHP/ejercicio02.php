<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description: Inicializar y mostrar una variable heredoc
        */ 
        
            //Creamos la variable heredoc
            $heredoc=<<<hdoc
                    Esto es el contenido de la variable heredoc,
                        esto también es contenido de la variable heredoc pero en otra linea y con una tabulación
                    hdoc;
            
            //Mostramos el contenido de la variable heredoc por pantalla
            echo "<p>$heredoc</p>";
            
        ?>
        
    </body>
    
</html>

