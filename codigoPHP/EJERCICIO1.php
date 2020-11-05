<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 24</title>         
    </head>
    <body>
        <?php
        /*
            @author: Cristina Núñez
            @since: 17/10/2020
            @description:  Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                           recogidas

        */
        require_once '../core/201019libreriaValidacion.php';
        
        //declaracion de variables universales
        define("OBLIGATORIO", 1);
        define("OPCIONAL", 0);
        $entradaOK = true;
        
        //declaracion de variables para comprobar alfabetico
        define("TAM_MAX_ALFABETICO", 200);
        define("TAM_MIN_ALFABETICO", 1);
        
        //declaracion de variables para comprobar fecha
        $fechaActual = date('Y/m/d');
        $fechaMin = "1920/01/01";     
        
               
             
        //Declaramos el array del formulario y lo inicializamos a null
        for($repeticion = 0; $repeticion <3; $repeticion++){
            $aFormulario[$repeticion] = ['nombre'.$repeticion => null,
                                      'dni'.$repeticion => null,
                                      'fecha'.$repeticion => null,
                                      'correo'.$repeticion => null,
                                      'numero'.$repeticion => null,
                                      'salario'.$repeticion => null];
            
            $aErrores[$repeticion] = ['nombre'.$repeticion => null,
                                      'dni'.$repeticion => null,
                                      'fecha'.$repeticion => null,
                                      'correo'.$repeticion => null,
                                      'numero'.$repeticion => null,
                                      'salario'.$repeticion => null];
        }
        
            if(isset($_REQUEST['enviar'])){ //Comprobamos que el usuario haya enviado el formulario
                for ($recError=0; $recError<3; $recError++){
                    $aErrores[$recError]['nombre'.$recError] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'.$recError], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO); // Validamos el campo 'nombre' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                    $aErrores[$recError]['dni'.$recError] = validacionFormularios::validarDni($_REQUEST['dni'.$recError], OBLIGATORIO); // Validamos el campo 'dni' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                    $aErrores[$recError]['fecha'.$recError] = validacionFormularios::validarFecha($_REQUEST['fecha'.$recError],$fechaActual,$fechaMin,OBLIGATORIO); // Validamos el campo 'fecha' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                    $aErrores[$recError]['correo'.$recError] = validacionFormularios::validarEmail($_REQUEST['correo'.$recError], OBLIGATORIO);
                    $aErrores[$recError]['numero'.$recError] = validacionFormularios::comprobarEntero($_REQUEST['numero'.$recError], 1000, 0, OPCIONAL);
                    $aErrores[$recError]['salario'.$recError] = validacionFormularios::comprobarFloat($_REQUEST['salario'.$recError], PHP_FLOAT_MAX, 0, OBLIGATORIO);   
                
                
                    // Recorremos el array de errores
                    foreach ($aErrores as $repeticion => $errores) {
                        foreach ($errores as $error => $valor) {
                            if ($valor != null) { // Comprobamos que el campo no esté vacio
                                $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario                             
                            }
                        }
                    }
                }
            }else{
                $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
            }
            if($entradaOK){ // Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
                 for ($recError=0; $recError<3; $recError++){            
                    $aFormulario[$recError]['nombre'.$recError] = $_REQUEST['nombre'.$recError];
                    $aFormulario[$recError]['dni'.$recError] = $_REQUEST['dni'.$recError];
                    $aFormulario[$recError]['fecha'.$recError] = $_REQUEST['fecha'.$recError];
                    $aFormulario[$recError]['correo'.$recError] = $_REQUEST['correo'.$recError];
                    $aFormulario[$recError]['numero'.$recError] = $_REQUEST['numero'.$recError];
                    $aFormulario[$recError]['salario'.$recError] = $_REQUEST['salario'.$recError];
                 }
                
                //Mostramos los datos validados introducidos por el usuario por pantalla
                 for ($recError=0; $recError<3; $recError++){
                    echo "<h3>Datos introducidos correctamente</h3>";
                    echo "<p>Su nombre: ".$aFormulario[$recError]['nombre'.$recError]."</p>";
                    echo "<p>Su DNI: ".$aFormulario[$recError]['dni'.$recError]."</p>";
                    echo "<p>Su fecha de nacimiento: ".$aFormulario[$recError]['fecha'.$recError]."</p>";
                    echo "<p>Su correo electrónico: ".$aFormulario[$recError]['correo'.$recError]."</p>";
                    echo "<p>Su número de la suerte: ".$aFormulario[$recError]['numero'.$recError]."</p>";
                    echo "<p>Su salario deseado: ".$aFormulario[$recError]['salario'.$recError]."</p>";
                 }
            }else{ // Si el usuario no ha rellenado el formulario correctamente volvera a rellenarlo
        ?>
        <?php
            for ($repeticion=0;$repeticion<3;$repeticion++){
        ?>
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
                <div>
                    <label for="nombre">Introduzca su nombre: </label>
                    <input type="text" style="background-color: #F8F9A1" name="<?php echo"nombre".$repeticion;?>" value="<?php 
                        if($aErrores[$repeticion]['nombre'.$repeticion] == null && isset($_REQUEST['nombre'.$repeticion])){
                            echo $_REQUEST['nombre'.$repeticion]; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores[$repeticion]['nombre'.$repeticion] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color:red'>".$aErrores[$repeticion]['nombre'.$repeticion]."</span>";
                        }
                    ?>
                    <br><br>
                    <label for="dni">Introduzca su DNI: </label>
                    <input type="text" style="background-color: #F8F9A1" name="<?php echo"dni".$repeticion;?>" value="<?php 
                        if($aErrores[$repeticion]['dni'.$repeticion] == null && isset($_REQUEST['dni'.$repeticion])){
                            echo $_REQUEST['dni'.$repeticion]; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores[$repeticion]['dni'.$repeticion] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color:red'>".$aErrores[$repeticion]['dni'.$repeticion]."</span>";
                        }
                    ?>
                    <br><br>
                    <label for="fecha">Introduzca su fecha de nacimiento: </label>
                    <input type="text" style="background-color: #F8F9A1" name="<?php echo"fecha".$repeticion;?>" value="<?php 
                        if($aErrores[$repeticion]['fecha'.$repeticion] == null && isset($_REQUEST['fecha'.$repeticion])){
                            echo $_REQUEST['fecha'.$repeticion]; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores[$repeticion]['fecha'.$repeticion] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color:red'>".$aErrores[$repeticion]['fecha'.$repeticion]."</span>";
                        }
                    ?>
                    <br><br>
                    <label for="correo">Introduzca su correo electrónico: </label>
                    <input type="text" style="background-color: #F8F9A1" name="<?php echo"correo".$repeticion;?>" value="<?php 
                        if($aErrores[$repeticion]['correo'.$repeticion] == null && isset($_REQUEST['correo'.$repeticion])){
                            echo $_REQUEST['correo'.$repeticion]; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores[$repeticion]['correo'.$repeticion] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color:red'>".$aErrores[$repeticion]['correo'.$repeticion]."</span>";
                        }
                    ?>
                    <br><br>
                    <label for="numero">Introduzca su número favorito: </label>
                    <input type="text" name="<?php echo"numero".$repeticion;?>" value="<?php 
                        if($aErrores[$repeticion]['numero'.$repeticion] == null && isset($_REQUEST['numero'.$repeticion])){
                            echo $_REQUEST['numero'.$repeticion]; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores[$repeticion]['numero'.$repeticion] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color:red'>".$aErrores[$repeticion]['numero'.$repeticion]."</span>";
                        }
                    ?>
                    <br><br>
                    <label for="salario">Introduzca cual te gustaría que fuese su salario mensual: </label>
                    <input type="text" style="background-color: #F8F9A1" name="<?php echo"salario".$repeticion;?>" value="<?php 
                        if($aErrores[$repeticion]['salario'.$repeticion] == null && isset($_REQUEST['salario'.$repeticion])){
                            echo $_REQUEST['salario'.$repeticion]; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores[$repeticion]['salario'.$repeticion] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color:red'>".$aErrores[$repeticion]['salario'.$repeticion]."</span>";
                        }
                    ?>
                </div>
            </fieldset>
                <?php
                    }
                ?>
                <div>
                    <input type="submit" style="background-color: #D2F9A1" value="Enviar" name="enviar">
                </div>
        </form>
        <?php
        }
        ?>
    </body>
</html>
