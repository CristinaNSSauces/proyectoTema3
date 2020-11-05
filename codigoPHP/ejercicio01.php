<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>         
    </head>
    <body>
        <?php
        /**
            * @author: Cristina Núñez
            * @since: 06/10/2020
            * @description: Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump)
        */ 
        
            //Inicializamos las variables
            $cadena="hola";
            $entero=1;
            $decimal=1.5;
            $boolean=true;
            
            //Mostramos los datos con echo
            //Echo puede recibir varios parámetros
            echo "Mostrado con echo->"." String:". $cadena." int: ".$entero." float: ".$decimal." bool: ".$boolean ."<br>";
            
            //Mostramos los datos con print
            //Print solo puede recibir un único parámetro
            print "Mostrado con print->"." String:". $cadena." int: ".$entero." float: ".$decimal." bool: ".$boolean ."<br>";
            
            //Mostramos los datos con printf
            //Los argumentos deben ir en el mismo orden que los especificadores%
            printf ("Mostrado con printf-> String: %s, int: %d, float: %.2f, bool: %b <br>" ,$cadena,$entero,$decimal,$boolean);
            
            //Mostramos la información coon print_r
            //Forma 1
            $mostrar = print_r ("Mostrado con print_r->"." String:". $cadena." int: ".$entero." float: ".$decimal." bool: ".$boolean ."<br>",true);
            echo $mostrar;
            //Forma 2
            print_r ("Mostrado con print_r->"." String:". $cadena." int: ".$entero." float: ".$decimal." bool: ".$boolean ."<br>");
            
            //Mostramos los datos con var_dumb
            var_dump("Mostrado con var_dump");
            var_dump($cadena);
            var_dump($entero);
            var_dump($decimal);
            var_dump($boolean);
            
        ?>
        
    </body>
    
</html>       
