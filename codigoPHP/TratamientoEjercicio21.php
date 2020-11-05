<?php
        /*
            @author: Cristina Núñez
            @since: 14/10/2020
        */
    require_once '../core/LibreriaCalculadora.php'; // Incluimos la libreriaCalculadora
    echo "Resultado: ".suma($_POST["numero1"], $_POST["numero2"]); //Calculamos la suma de los numeros introducidos en el forulario y mostramos el resultado.
?>

