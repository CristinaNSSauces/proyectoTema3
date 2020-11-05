<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 12</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 06/10/2020
            *@description:   Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach())
        */
       
        echo "<pre>"; // <pre> muestra el texto formateado
        echo "<p>Mostramos la variable superglobal \"GLOBALS\" con print_r </p>";
        print_r($GLOBALS);
        
        echo "<p>Mostramos la variable superglobal \"GLOBALS\" con foreach() </p>";
        foreach ($GLOBALS as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_SERVER\" con print_r </p>";
        print_r($_SERVER);
        
        echo "<p>Mostramos la variable superglobal \"_SERVER\" con foreach() </p>";
        foreach ($_SERVER as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_GET\" con print_r </p>";
        print_r($_GET);
        
        echo "<p>Mostramos la variable superglobal \"_GET\" con foreach() </p>";
        foreach ($_GET as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_POST\" con print_r </p>";
        print_r($_POST);
        
        echo "<p>Mostramos la variable superglobal \"_POST\" con foreach() </p>";
        foreach ($_POST as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_FILES\" con print_r </p>";
        print_r($_FILES);
        
        echo "<p>Mostramos la variable superglobal \"_FILES\" con foreach() </p>";
        foreach ($_FILES as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_COOKIE\" con print_r </p>";
        print_r($_COOKIE);
        
        echo "<p>Mostramos la variable superglobal \"_COOKIE\" con foreach() </p>";
        foreach ($_COOKIE as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_SESSION\" con print_r </p>";
        print_r($_SESSION);
        
        echo "<p>Mostramos la variable superglobal \"_SESSION\" con foreach() </p>";
        foreach ($_SESSION as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_REQUEST\" con print_r </p>";
        print_r($_REQUEST);
        
        echo "<p>Mostramos la variable superglobal \"_REQUEST\" con foreach() </p>";
        foreach ($_REQUEST as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        echo "<p>Mostramos la variable superglobal \"_ENV\" con print_r </p>";
        print_r($_ENV);
        
        echo "<p>Mostramos la variable superglobal \"_ENV\" con foreach() </p>";
        foreach ($_ENV as $clave => $valor) {
            echo "{$clave} => {$valor} <br>";
        }
        
        ?>
        
    </body>
</html>