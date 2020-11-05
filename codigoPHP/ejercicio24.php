<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 24</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 17/10/2020
            *@description:  Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                           recogidas

        */
        require_once '../core/201020libreriaValidacion.php';
        
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
        
        //Declaramos el array de errores y lo inicializamos a null
        $aErrores = ['nombre' => null,
                     'dni' => null,
                     'fecha' => null,
                     'correo' => null];
        
        //Declaramos el array del formulario y lo inicializamos a null
        $aFormulario = ['nombre' => null,
                        'dni' => null,
                        'fecha' => null,
                        'correo' => null];
        
            if(isset($_REQUEST['enviar'])){ //Comprobamos que el usuario haya enviado el formulario
                $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO); // Validamos el campo 'nombre' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                $aErrores['dni'] = validacionFormularios::validarDni($_REQUEST['dni'], OBLIGATORIO); // Validamos el campo 'dni' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                $aErrores['fecha'] = validacionFormularios::validarFecha($_REQUEST['fecha'],$fechaActual,$fechaMin,OBLIGATORIO); // Validamos el campo 'fecha' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                $aErrores['correo'] = validacionFormularios::validarEmail($_REQUEST['correo'], OPCIONAL);
                
                // Recorremos el array de errores
                foreach ($aErrores as $campo => $error){
                    if ($error != null) { // Comprobamos que el campo no esté vacio
                        $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario      
                        $_REQUEST[$campo] = "";
                    }
                }
            }else{
                $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
            }
            if($entradaOK){ // Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
                $aFormulario['nombre'] = $_REQUEST['nombre'];
                $aFormulario['dni'] = $_REQUEST['dni'];
                $aFormulario['fecha'] = $_REQUEST['fecha'];
                $aFormulario['correo'] = $_REQUEST['correo'];
                
                //Mostramos los datos validados introducidos por el usuario por pantalla
                echo "<h3>Datos introducidos correctamente</h3>";
                echo "<p>Su nombre: ".$aFormulario['nombre']."</p>";
                echo "<p>Su DNI: ".$aFormulario['dni']."</p>";
                echo "<p>Su fecha de nacimiento: ".$aFormulario['fecha']."</p>";
                echo "<p>Su correo electrónico: ".$aFormulario['correo']."</p>";
            }else{ // Si el usuario no ha rellenado el formulario correctamente volvera a rellenarlo
        ?>
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div>
                    <label for="nombre">Introduzca su nombre: </label>
                    <input type="text" style="background-color: #D2D2D2" id="nombre" style="background-color: #D2D2D2" name="nombre" value="<?php echo(isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null); ?>">
                    <?php echo($aErrores['nombre']!=null ? "<span style='color:red'>".$aErrores['nombre']."</span>" : null); ?>
                    <br><br>
                    
                    <label for="dni">Introduzca su DNI: </label>
                    <input type="text" style="background-color: #D2D2D2" id="dni" style="background-color: #D2D2D2" name="dni" value="<?php echo(isset($_REQUEST['dni']) ? $_REQUEST['dni'] : null);?>">
                    <?php echo($aErrores['dni']!=null ? "<span style='color:red'>".$aErrores['dni']."</span>" : null); ?>
                    <br><br>
                    
                    <label for="fecha">Introduzca su fecha de nacimiento: </label>
                    <input type="date" style="background-color: #D2D2D2" id="fecha" style="background-color: #D2D2D2" name="fecha" value="<?php echo(isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : null);?>">
                    <?php echo($aErrores['fecha']!=null ? "<span style='color:red'>".$aErrores['fecha']."</span>" : null); ?>
                    <br><br>
                    
                    <label for="correo">Introduzca su correo electrónico: </label>
                    <input type="email" id="correo" name="correo" value="<?php echo(isset($_REQUEST['correo']) ? $_REQUEST['correo'] : null);?>">
                    <?php echo($aErrores['correo']!=null ? "<span style='color:red'>".$aErrores['correo']."</span>" : null); ?>
                </div>
                <div>
                    <input type="submit" value="Enviar" name="enviar">
                </div>
        </form>
        <?php
            }
        ?>
    </body>
</html>
