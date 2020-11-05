<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 27</title>         
    </head>
    <body>
        <?php
        /**
            * @author: Cristina Núñez
            * @since: 20/10/2020
            * @description:  Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
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
        
        //Valores RadioButton Género
        $aGenero=['hombre','mujer'];
        
        //declaración de variables para comprobar Texto Opinión Formulario
        define("TAM_MAX_TEXTO", 1000);
        define("TAM_MIN_TEXTO", 1);
             
        //Declaramos el array del formulario y lo inicializamos a null
        for($repeticion = 0; $repeticion <3; $repeticion++){
            $aFormulario[$repeticion] = ['nombre'.$repeticion => null,
                                      'dni'.$repeticion => null,
                                      'fecha'.$repeticion => null,
                                      'correo'.$repeticion => null,
                                      'telefono'.$repeticion => null,
                                      'numero'.$repeticion => null,
                                      'salario'.$repeticion => null,
                                      'genero'.$repeticion => null,
                                      'opinion'.$repeticion => null];
            
            $aErrores[$repeticion] = ['nombre'.$repeticion => null,
                                      'dni'.$repeticion => null,
                                      'fecha'.$repeticion => null,
                                      'correo'.$repeticion => null,
                                      'telefono'.$repeticion => null,
                                      'numero'.$repeticion => null,
                                      'salario'.$repeticion => null,
                                      'genero'.$repeticion => null,
                                      'opinion'.$repeticion => null];
        }
        
            if(isset($_REQUEST['enviar'])){ //Comprobamos que el usuario haya enviado el formulario
                for ($recError=0; $recError<3; $recError++){
                    $aErrores[$recError]['nombre'.$recError] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'.$recError], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO); // Validamos el campo 'nombre' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                    $aErrores[$recError]['dni'.$recError] = validacionFormularios::validarDni($_REQUEST['dni'.$recError], OBLIGATORIO); // Validamos el campo 'dni' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                    $aErrores[$recError]['fecha'.$recError] = validacionFormularios::validarFecha($_REQUEST['fecha'.$recError],$fechaActual,$fechaMin,OBLIGATORIO); // Validamos el campo 'fecha' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                    $aErrores[$recError]['correo'.$recError] = validacionFormularios::validarEmail($_REQUEST['correo'.$recError], OBLIGATORIO);
                    $aErrores[$recError]['telefono'.$recError] = validacionFormularios::validaTelefono($_REQUEST['telefono'.$recError], OBLIGATORIO);
                    $aErrores[$recError]['numero'.$recError] = validacionFormularios::comprobarEntero($_REQUEST['numero'.$recError], 1000, 0, OPCIONAL);
                    $aErrores[$recError]['salario'.$recError] = validacionFormularios::comprobarFloat($_REQUEST['salario'.$recError], PHP_FLOAT_MAX, 0, OPCIONAL);   
                    $aErrores[$recError]['genero'.$recError] = validacionFormularios::validarElementoEnLista($_REQUEST['genero'.$recError], $aGenero);   
                    $aErrores[$recError]['opinion'.$recError] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['opinion'.$recError],TAM_MAX_TEXTO,TAM_MIN_TEXTO,OPCIONAL);   
                
                
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
                    $aFormulario[$recError]['telefono'.$recError] = $_REQUEST['telefono'.$recError];
                    $aFormulario[$recError]['numero'.$recError] = $_REQUEST['numero'.$recError];
                    $aFormulario[$recError]['salario'.$recError] = $_REQUEST['salario'.$recError];
                    $aFormulario[$recError]['genero'.$recError] = $_REQUEST['genero'.$recError];
                    $aFormulario[$recError]['opinion'.$recError] = $_REQUEST['opinion'.$recError];
                 }
                
                //Mostramos los datos validados introducidos por el usuario por pantalla
                 for ($recError=0; $recError<3; $recError++){
                    echo "<h3>Datos introducidos correctamente</h3>";
                    echo "<p>Su nombre: ".$aFormulario[$recError]['nombre'.$recError]."</p>";
                    echo "<p>Su DNI: ".$aFormulario[$recError]['dni'.$recError]."</p>";
                    echo "<p>Su fecha de nacimiento: ".$aFormulario[$recError]['fecha'.$recError]."</p>";
                    echo "<p>Su correo electrónico: ".$aFormulario[$recError]['correo'.$recError]."</p>";
                    echo "<p>Su número de teléfono: ".$aFormulario[$recError]['telefono'.$recError]."</p>";
                    echo "<p>Su número de la suerte: ".$aFormulario[$recError]['numero'.$recError]."</p>";
                    echo "<p>Su salario deseado: ".$aFormulario[$recError]['salario'.$recError]."</p>";
                    echo "<p>Su género: ".$aFormulario[$recError]['genero'.$recError]."</p>";
                    echo "<p>Tu opinión sobre este formulario: ".$aFormulario[$recError]['opinion'.$recError]."</p>";
                 }
            }else{ // Si el usuario no ha rellenado el formulario correctamente volvera a rellenarlo
        ?>
        
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php
                for ($repeticion=0;$repeticion<3;$repeticion++){
            ?>
            <fieldset  style="width: 31%; float: left;">
                <div>
                    <!-- Nombre -->
                    <label for="nombre">Introduzca su nombre (*): </label>
                    <input type="text" style="background-color: #D2D2D2" name="<?php echo"nombre".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['nombre'.$repeticion] == null && isset($_REQUEST['nombre'.$repeticion]) ? $_REQUEST['nombre'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                    <?php echo ($aErrores[$repeticion]['nombre'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['nombre'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- DNI -->
                    <label for="dni">Introduzca su DNI (*): </label>
                    <input type="text" style="background-color: #D2D2D2" name="<?php echo"dni".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['dni'.$repeticion] == null && isset($_REQUEST['dni'.$repeticion]) ? $_REQUEST['dni'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                           <?php echo ($aErrores[$repeticion]['dni'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['dni'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- Fecha nacimiento -->
                    <label for="fecha">Introduzca su fecha de nacimiento (*): </label>
                    <input type="date" style="background-color: #D2D2D2" name="<?php echo"fecha".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['fecha'.$repeticion] == null && isset($_REQUEST['fecha'.$repeticion]) ? $_REQUEST['fecha'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                           <?php echo ($aErrores[$repeticion]['fecha'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['fecha'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- Correo electrónico -->
                    <label for="correo">Introduzca su correo electrónico (*): </label>
                    <input type="text" style="background-color: #D2D2D2" name="<?php echo"correo".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['correo'.$repeticion] == null && isset($_REQUEST['correo'.$repeticion]) ? $_REQUEST['correo'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                           <?php echo ($aErrores[$repeticion]['correo'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['correo'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- Teléfono -->
                    <label for="<?php echo"telefono".$repeticion;?>">Introduzca su número de teléfono (*): </label>
                    <input type="tel" id="<?php echo"telefono".$repeticion;?>" style="background-color: #D2D2D2" name="<?php echo"telefono".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['telefono'.$repeticion] == null && isset($_REQUEST['telefono'.$repeticion]) ? $_REQUEST['telefono'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                           <?php echo ($aErrores[$repeticion]['telefono'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['telefono'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- Número Favorito -->
                    <label for="numero">Introduzca su número favorito: </label>
                    <input type="number" name="<?php echo"numero".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['numero'.$repeticion] == null && isset($_REQUEST['numero'.$repeticion]) ? $_REQUEST['numero'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                           <?php echo ($aErrores[$repeticion]['numero'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['numero'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- Salario -->
                    <label for="salario">Introduzca cual te gustaría que fuese su salario mensual: </label>
                    <input type="number" name="<?php echo"salario".$repeticion;?>" 
                           value="<?php echo($aErrores[$repeticion]['salario'.$repeticion] == null && isset($_REQUEST['salario'.$repeticion]) ? $_REQUEST['salario'.$repeticion] : null);//Si el campo era correcto no se borra?>"> 
                           <?php echo ($aErrores[$repeticion]['salario'.$repeticion] != null ? "<span style='color:red'>".$aErrores[$repeticion]['salario'.$repeticion]."</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente ?>
                    <br><br>
                    
                    <!-- Género -->
                    <label for="<?php echo"genero".$repeticion;?>">Seleccione su sexo (*): </label>
                        <input type="radio" id="<?php echo"hombre".$repeticion;?>" name="<?php echo"genero".$repeticion;?>" value="hombre" 
                            <?php echo($aErrores[$repeticion]['genero'.$repeticion] == null && isset($_REQUEST['genero'.$repeticion]) && $_REQUEST['genero'.$repeticion] ? 'checked' : null);//Si el campo era correcto no se borra?>>
                        <label for="<?php echo"hombre".$repeticion;?>">Hombre</label>
                        
                        <input type="radio" id="<?php echo"mujer".$repeticion;?>" name="<?php echo"genero".$repeticion;?>" value="mujer" 
                            <?php echo($aErrores[$repeticion]['genero'.$repeticion] == null && isset($_REQUEST['genero'.$repeticion]) && $_REQUEST['genero'.$repeticion] ? 'checked' : null);//Si el campo era correcto no se borra?>>
                        <label for="<?php echo"mujer".$repeticion;?>">Mujer</label>
                        <?php echo($aErrores[$repeticion]['genero'.$repeticion] != null ? "<span style='color: red;'>Debes seleccionar una única opción</span>" : null);// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente?>
                    <br><br>
                    
                    <!-- Opinión Opcional -->
                    <label for="<?php echo"opinion".$repeticion;?>">Opinión sobre este formulario:</label>
                    <textarea id="<?php echo"opinion".$repeticion;?>" name="<?php echo"opinion".$repeticion;?>">
                        <?php echo($aErrores[$repeticion]['opinion'.$repeticion] == null && isset($_REQUEST['opinion'.$repeticion]) ? $_REQUEST['opinion'.$repeticion] : null); //Si el campo era correcto no se borra?>
                    </textarea>
                        <?php echo($aErrores[$repeticion]['opinion'.$repeticion] != null ? "<span style='color: red;'>".$aErrores[$repeticion]['opinion'.$repeticion]."</span>" : null)// Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente;?>
                    <br><br>
                </div>
            </fieldset>
                <?php
                    }
                ?>
                <div>
                    <input type="submit" style="background-color: #D2F9A1; width: 98%; margin-top: 5px;" value="Enviar" name="enviar">
                </div>
        </form>
        <?php
        }
        ?>
    </body>
</html>
