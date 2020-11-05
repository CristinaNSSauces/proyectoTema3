<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 25</title>
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 21/10/2020
            *@description:  Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                           recogidas

        */
        require_once '../core/201020libreriaValidacion.php';
        
        //declaracion de variables universales
        define("OBLIGATORIO", 1);
        define("OPCIONAL", 0);
        $entradaOK = true;
        
        //declaracion de variables para comprobar alfabetico | alfanumerico
        define("TAM_MAX", 200);
        define("TAM_MIN", 1);
        
        //declaracion de variables para comprobar fecha
        $fechaActual = date('Y/m/d');
        $fechaMin = "1920/01/01";
        
        //Valores RadioButton
        $aRadioButton=['opcion1','opcion2'];
        
        //Valores Lista
        $aLista=['opcion1','opcion2','opcion3'];
        
        //declaración de variables para comprobar Texto
        define("TAM_MAX_TEXTO", 1000);
        define("TAM_MIN_TEXTO", 1);
        
        //Declaramos el array de errores y lo inicializamos a null
        $aErrores = ['alfabeticoObligatorio' => null,
                     'alfabeticoOpcional' => null,
            
                     'alfanumericoObligatorio' => null,
                     'alfanumericoOpcional' => null,
            
                     'enteroObligatorio' => null,
                     'enteroOpcional' => null,
            
                     'floatObligatorio' => null,
                     'floatOpcional' => null,
            
                     'dniObligatorio' => null,
                     'dniOpcional' => null,
            
                     'fechaObligatorio' => null,
                     'fechaOpcional' => null,
            
                     'correoObligatorio' => null,
                     'correoOpcional' => null,
            
                     'urlObligatorio' => null,
                     'urlOpcional' => null,
        
                     'cpObligatorio' => null,
                     'cpOpcional' => null,
        
                     'passwordObligatorio' => null,
                     'passwordOpcional' => null,
        
                     'telefonoObligatorio' => null,
                     'telefonoOpcional' => null,
            
                     'rbObligatorio' => null,
            
                     'cbObligatorio' => null,
            
                     'liObligatorio' => null,
            
                     'txObligatorio' => null,
                     'txOpcional' => null];
        
        //Declaramos el array del formulario y lo inicializamos a null
        $aFormulario = ['alfabeticoObligatorio' => null,
                        'alfabeticoOpcional' => null,
            
                        'alfanumericoObligatorio' => null,
                        'alfanumericoOpcional' => null,
            
                        'enteroObligatorio' => null,
                        'enteroOpcional' => null,
            
                        'floatObligatorio' => null,
                        'floatOpcional' => null,
            
                        'dniObligatorio' => null,
                        'dniOpcional' => null,
            
                        'fechaObligatorio' => null,
                        'fechaOpcional' => null,
            
                        'correoObligatorio' => null,
                        'correoOpcional' => null,
                        
                        'urlObligatorio' => null,
                        'urlOpcional' => null,
            
                        'cpObligatorio' => null,
                        'cpOpcional' => null,
            
                        'passwordObligatorio' => null,
                        'passwordOpcional' => null,
        
                        'telefonoObligatorio' => null,
                        'telefonoOpcional' => null,
            
                        'rbObligatorio' => null,
            
                        'cbObligatorio' => null,
            
                        'liObligatorio' => null,
            
                        'txObligatorio' => null,
                        'txOpcional' => null];
        
            if(isset($_REQUEST['enviar'])){ //Comprobamos que el usuario haya enviado el formulario
                $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], TAM_MAX, TAM_MIN, OBLIGATORIO); // Validamos el campo 'nombre' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                $aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional'], TAM_MAX, TAM_MIN, OPCIONAL); // Validamos el campo 'nombre' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                
                $aErrores['alfanumericoObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], TAM_MAX, TAM_MIN, OBLIGATORIO);
                $aErrores['alfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional'], TAM_MAX, TAM_MIN, OPCIONAL);
                
                $aErrores['enteroObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO);
                $aErrores['enteroOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['enteroOpcional'], PHP_INT_MAX, PHP_INT_MIN, OPCIONAL);
                
                $aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_FLOAT_MAX, -PHP_FLOAT_MIN, OBLIGATORIO);
                $aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], PHP_FLOAT_MAX, -PHP_FLOAT_MIN, OPCIONAL);
                
                $aErrores['dniObligatorio'] = validacionFormularios::validarDni($_REQUEST['dniObligatorio'], OBLIGATORIO); // Validamos el campo 'dni' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                $aErrores['dniOpcional'] = validacionFormularios::validarDni($_REQUEST['dniOpcional'], OPCIONAL); // Validamos el campo 'dni' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                
                $aErrores['fechaObligatorio'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'],$fechaActual,$fechaMin,OBLIGATORIO); // Validamos el campo 'fecha' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                $aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcional'],$fechaActual,$fechaMin,OPCIONAL); // Validamos el campo 'fecha' del formulario, de no ser correcto almacenaremos un mensaje de error en el array aErrores
                
                $aErrores['correoObligatorio'] = validacionFormularios::validarEmail($_REQUEST['correoObligatorio'], OBLIGATORIO);
                $aErrores['correoOpcional'] = validacionFormularios::validarEmail($_REQUEST['correoOpcional'], OPCIONAL);
                
                $aErrores['urlObligatorio'] = validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OBLIGATORIO);
                $aErrores['urlOpcional'] = validacionFormularios::validarURL($_REQUEST['urlOpcional'], OPCIONAL);
                
                $aErrores['cpObligatorio'] = validacionFormularios::validarCp($_REQUEST['cpObligatorio'], OBLIGATORIO);
                $aErrores['cpOpcional'] = validacionFormularios::validarCp($_REQUEST['cpOpcional'], OPCIONAL);
                
                $aErrores['passwordObligatorio'] = validacionFormularios::validarPassword($_REQUEST['passwordObligatorio'],2 ,OBLIGATORIO);
                $aErrores['passwordOpcional'] = validacionFormularios::validarPassword($_REQUEST['passwordOpcional'],2 ,OPCIONAL);
                
                $aErrores['telefonoObligatorio'] = validacionFormularios::validaTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO);
                $aErrores['telefonoOpcional'] = validacionFormularios::validaTelefono($_REQUEST['telefonoOpcional'], OPCIONAL);
                
                $aErrores['rbObligatorio'] = validacionFormularios::validarElementoEnLista($_REQUEST['rbObligatorio'], $aRadioButton);
                
                if(!isset($_REQUEST['cbObligatorio'])){$aErrores['cbObligatorio'] = "Debes seleccionar al menos una opción";}
                
                $aErrores['liObligatorio'] = validacionFormularios::validarElementoEnLista($_REQUEST['liObligatorio'], $aLista);
                
                $aErrores['txObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['txObligatorio'],TAM_MAX_TEXTO,TAM_MIN_TEXTO,OBLIGATORIO);
                $aErrores['txOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['txOpcional'],TAM_MAX_TEXTO,TAM_MIN_TEXTO,OPCIONAL);
                
                // Recorremos el array de errores
                foreach ($aErrores as $campo => $error){
                    if ($error != null) { // Comprobamos que el campo no esté vacio
                        $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario                             
                    }
                } 
            }else{
                $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
            }
            if($entradaOK){ // Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
                $aFormulario['alfabeticoObligatorio'] = $_REQUEST['alfabeticoObligatorio'];
                $aFormulario['alfabeticoOpcional'] = $_REQUEST['alfabeticoOpcional'];
                
                $aFormulario['alfanumericoObligatorio'] = $_REQUEST['alfanumericoObligatorio'];
                $aFormulario['alfanumericoOpcional'] = $_REQUEST['alfanumericoOpcional'];
                
                $aFormulario['enteroObligatorio'] = $_REQUEST['enteroObligatorio'];
                $aFormulario['enteroOpcional'] = $_REQUEST['enteroOpcional'];
                
                $aFormulario['floatObligatorio'] = $_REQUEST['floatObligatorio'];
                $aFormulario['floatOpcional'] = $_REQUEST['floatOpcional'];
                
                $aFormulario['dniObligatorio'] = $_REQUEST['dniObligatorio'];
                $aFormulario['dniOpcional'] = $_REQUEST['dniOpcional'];
                
                $aFormulario['fechaObligatorio'] = $_REQUEST['fechaObligatorio'];
                $aFormulario['fechaOpcional'] = $_REQUEST['fechaOpcional'];
                
                $aFormulario['correoObligatorio'] = $_REQUEST['correoObligatorio'];
                $aFormulario['correoOpcional'] = $_REQUEST['correoOpcional'];
                
                $aFormulario['urlObligatorio'] = $_REQUEST['urlObligatorio'];
                $aFormulario['urlOpcional'] = $_REQUEST['urlOpcional'];
                
                $aFormulario['cpObligatorio'] = $_REQUEST['cpObligatorio'];
                $aFormulario['cpOpcional'] = $_REQUEST['cpOpcional'];
                
                $aFormulario['passwordObligatorio'] = $_REQUEST['passwordObligatorio'];
                $aFormulario['passwordOpcional'] = $_REQUEST['passwordOpcional'];
                
                $aFormulario['telefonoObligatorio'] = $_REQUEST['telefonoObligatorio'];
                $aFormulario['telefonoOpcional'] = $_REQUEST['telefonoOpcional'];
                
                $aFormulario['rbObligatorio'] = $_REQUEST['rbObligatorio'];  
                
                $aFormulario['cbObligatorio'] = $_REQUEST['cbObligatorio'];
                
                $aFormulario['liObligatorio'] = $_REQUEST['liObligatorio'];
                
                $aFormulario['txObligatorio'] = $_REQUEST['txObligatorio'];
                $aFormulario['txOpcional'] = $_REQUEST['txOpcional'];
                
                echo '<pre>';
                print_r($aFormulario);
            }else{ // Si el usuario no ha rellenado el formulario correctamente volvera a rellenarlo
        ?>
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div>
                    <!-- Alfabético Obligatorio -->
                    <label for="alfabeticoObligatorio">Alfabético Obligatorio: </label>
                    <input type="text" id="alfabeticoObligatorio" style="background-color: #D2D2D2" name="alfabeticoObligatorio" value="<?php 
                        if($aErrores['alfabeticoObligatorio'] == null && isset($_REQUEST['alfabeticoObligatorio'])){
                            echo $_REQUEST['alfabeticoObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['alfabeticoObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['alfabeticoObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Alfabético Opcional -->
                    <label for="alfabeticoOpcional">Alfabético Opcional: </label>
                    <input type="text" id="alfabeticoOpcional" name="alfabeticoOpcional" value="<?php 
                        if($aErrores['alfabeticoOpcional'] == null && isset($_REQUEST['alfabeticoOpcional'])){
                            echo $_REQUEST['alfabeticoOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['alfabeticoOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['alfabeticoOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Alfanumérico Obligatorio -->
                    <label for="alfanumericoObligatorio">Alfanumérico Obligatorio: </label>
                    <input type="text" id="alfanumericoObligatorio" style="background-color: #D2D2D2" name="alfanumericoObligatorio" value="<?php 
                        if($aErrores['alfanumericoObligatorio'] == null && isset($_REQUEST['alfanumericoObligatorio'])){
                            echo $_REQUEST['alfanumericoObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['alfanumericoObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['alfanumericoObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Alfanumérico Opcional -->
                    <label for="alfanumericoOpcional">Alfanumérico Opcional: </label>
                    <input type="text" id="alfanumericoOpcional" name="alfanumericoOpcional" value="<?php 
                        if($aErrores['alfanumericoOpcional'] == null && isset($_REQUEST['alfanumericoOpcional'])){
                            echo $_REQUEST['alfanumericoOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['alfanumericoOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['alfanumericoOpcional'];
                        }
                    ?>
                    <br><br>
                    
                    <!-- Entero Obligatorio -->
                    <label for="enteroObligatorio">Entero Obligatorio: </label>
                    <input type="number" id="enteroObligatorio" style="background-color: #D2D2D2" name="enteroObligatorio" value="<?php 
                        if($aErrores['enteroObligatorio'] == null && isset($_REQUEST['enteroObligatorio'])){
                            echo $_REQUEST['enteroObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['enteroObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['enteroObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Entero Opcional -->
                    <label for="enteroOpcional">Entero Opcional: </label>
                    <input type="number" id="enteroOpcional" name="enteroOpcional" value="<?php 
                        if($aErrores['enteroOpcional'] == null && isset($_REQUEST['enteroOpcional'])){
                            echo $_REQUEST['enteroOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['enteroOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['enteroOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Float Obligatorio -->
                    <label for="floatObligatorio">Float Obligatorio: </label>
                    <input type="text" id="floatObligatorio" style="background-color: #D2D2D2" name="floatObligatorio" value="<?php 
                        if($aErrores['floatObligatorio'] == null && isset($_REQUEST['floatObligatorio'])){
                            echo $_REQUEST['floatObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['floatObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['floatObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Float Opcional -->
                    <label for="floatOpcional">Float Opcional: </label>
                    <input type="text" id="floatOpcional" name="floatOpcional" value="<?php 
                        if($aErrores['floatOpcional'] == null && isset($_REQUEST['floatOpcional'])){
                            echo $_REQUEST['floatOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['floatOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['floatOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- DNI Obligatorio -->
                    <label for="dniObligatorio">DNI Obligatorio: </label>
                    <input type="text" id="dniObligatorio" style="background-color: #D2D2D2" name="dniObligatorio" value="<?php 
                        if($aErrores['dniObligatorio'] == null && isset($_REQUEST['dniObligatorio'])){
                            echo $_REQUEST['dniObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['dniObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['dniObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- DNI Opcional -->
                    <label for="dniOpcional">DNI Opcional: </label>
                    <input type="text" id="dniOpcional" name="dniOpcional" value="<?php 
                        if($aErrores['dniOpcional'] == null && isset($_REQUEST['dniOpcional'])){
                            echo $_REQUEST['dniOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['dniOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['dniOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Fecha Obligatorio -->
                    <label for="fechaObligatorio">Fecha Obligatorio: </label>
                    <input type="date" id="fechaObligatorio" style="background-color: #D2D2D2" name="fechaObligatorio" value="<?php 
                        if($aErrores['fechaObligatorio'] == null && isset($_REQUEST['fechaObligatorio'])){
                            echo $_REQUEST['fechaObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['fechaObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['fechaObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Fecha Opcional -->
                    <label for="fechaOpcional">Fecha Opcional: </label>
                    <input type="date" id="fechaOpcional" name="fechaOpcional" value="<?php 
                        if($aErrores['fechaOpcional'] == null && isset($_REQUEST['fechaOpcional'])){
                            echo $_REQUEST['fechaOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['fechaOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['fechaOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Correo Obligatorio -->
                    <label for="correoObligatorio">Correo Obligatorio: </label>
                    <input type="email" id="correoObligatorio" style="background-color: #D2D2D2" name="correoObligatorio" value="<?php 
                        if($aErrores['correoObligatorio'] == null && isset($_REQUEST['correoObligatorio'])){
                            echo $_REQUEST['correoObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['correoObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['correoObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Correo Opcional -->
                    <label for="correoOpcional">Correo Opcional: </label>
                    <input type="email" id="correoOpcional" name="correoOpcional" value="<?php 
                        if($aErrores['correoOpcional'] == null && isset($_REQUEST['correoOpcional'])){
                            echo $_REQUEST['correoOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['correoOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['correoOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- URL Obligatorio -->
                    <label for="urlObligatorio">URL Obligatorio: </label>
                    <input type="url" id="urlObligatorio" style="background-color: #D2D2D2" name="urlObligatorio" value="<?php 
                        if($aErrores['urlObligatorio'] == null && isset($_REQUEST['urlObligatorio'])){
                            echo $_REQUEST['urlObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['urlObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['urlObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- URL Opcional -->
                    <label for="urlOpcional">URL Opcional: </label>
                    <input type="url" id="urlOpcional" name="urlOpcional" value="<?php 
                        if($aErrores['urlOpcional'] == null && isset($_REQUEST['urlOpcional'])){
                            echo $_REQUEST['urlOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['urlOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['urlOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Código Postal Obligatorio -->
                    <label for="cpObligatorio">Código Postal Obligatorio: </label>
                    <input type="text" id="cpObligatorio" style="background-color: #D2D2D2" name="cpObligatorio" value="<?php 
                        if($aErrores['cpObligatorio'] == null && isset($_REQUEST['cpObligatorio'])){
                            echo $_REQUEST['cpObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['cpObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['cpObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Código Postal Opcional -->
                    <label for="cpOpcional">Código Postal Opcional: </label>
                    <input type="text" id="cpOpcional" name="cpOpcional" value="<?php 
                        if($aErrores['cpOpcional'] == null && isset($_REQUEST['cpOpcional'])){
                            echo $_REQUEST['cpOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['cpOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['cpOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Contraseña Obligatorio -->
                    <label for="passwordObligatorio">Contraseña Obligatorio: </label>
                    <input type="password" id="passwordObligatorio" style="background-color: #D2D2D2" name="passwordObligatorio" value="<?php 
                        if($aErrores['passwordObligatorio'] == null && isset($_REQUEST['passwordObligatorio'])){
                            echo $_REQUEST['passwordObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['passwordObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['passwordObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Contraseña Opcional -->
                    <label for="passwordOpcional">Contraseña Opcional: </label>
                    <input type="password" id="passwordOpcional" name="passwordOpcional" value="<?php 
                        if($aErrores['passwordOpcional'] == null && isset($_REQUEST['passwordOpcional'])){
                            echo $_REQUEST['passwordOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['passwordOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['passwordOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- Teléfono Obligatorio -->
                    <label for="telefonoObligatorio">Teléfono Obligatorio: </label>
                    <input type="tel" id="telefonoObligatorio" style="background-color: #D2D2D2" name="telefonoObligatorio" value="<?php 
                        if($aErrores['telefonoObligatorio'] == null && isset($_REQUEST['telefonoObligatorio'])){
                            echo $_REQUEST['telefonoObligatorio']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['telefonoObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['telefonoObligatorio']."</span>";
                        }
                    ?>
                    <br><br>
                    <!-- Teléfono Opcional -->
                    <label for="telefonoOpcional">Teléfono Opcional: </label>
                    <input type="tel" id="telefonoOpcional" name="telefonoOpcional" value="<?php 
                        if($aErrores['telefonoOpcional'] == null && isset($_REQUEST['telefonoOpcional'])){
                            echo $_REQUEST['telefonoOpcional']; //Si el campo era correcto no se borra
                        }
                    ?>">
                    <?php
                        if ($aErrores['telefonoOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                            echo "<span style='color: red;'>".$aErrores['telefonoOpcional']."</span>";
                        }
                    ?>
                    <br><br>
                    
                    <!-- RadioButton Obligatorio -->
                    <label for="rbObligatorio">RadioButton Obligatorio: </label>
                        <input type="radio" id="opcion1" name="rbObligatorio" value="opcion1" <?php 
                            if($aErrores['rbObligatorio'] == null && isset($_REQUEST['rbObligatorio']) && $_REQUEST['rbObligatorio']=='opcion1'){
                                echo 'checked'; //Si el campo era correcto no se borra
                            }
                        ?>>
                        <label for="rbObligatorio">Opcion 1</label>
                        
                        <input type="radio" id="opcion2" name="rbObligatorio" value="opcion2" <?php 
                            if($aErrores['rbObligatorio'] == null && isset($_REQUEST['rbObligatorio']) && $_REQUEST['rbObligatorio']=='opcion2'){
                                echo 'checked'; //Si el campo era correcto no se borra
                            }
                        ?>>
                        
                        <label for="mujer">Opcion 2</label>
                        <?php
                            if ($aErrores['rbObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                                echo "<span style='color: red;'>Debes seleccionar una única opción</span>";
                            }
                        ?>
                    <br><br>
                    
                    <!-- CheckBox Obligatorio -->
                    <label for="cbObligatorio">CheckBox Obligatorio: </label>
                        <input type="checkbox" id="opcion1" name="cbObligatorio[opcion1]" value="opcion1" <?php 
                            if(isset($_REQUEST['cbObligatorio']['opcion1'])){
                                echo 'checked'; //Si el campo era correcto no se borra
                            }
                        ?>>
                        <label for="opcion1"> Opcion 1</label>
                        <input type="checkbox" id="opcion2" name="cbObligatorio[opcion2]" value="opcion2" <?php 
                            if(isset($_REQUEST['cbObligatorio']['opcion2'])){
                                echo 'checked'; //Si el campo era correcto no se borra
                            }
                        ?>>
                        <label for="opcion2"> Opcion 2</label>
                        <input type="checkbox" id="opcion3" name="cbObligatorio[opcion3]" value="opcion3" <?php 
                            if(isset($_REQUEST['cbObligatorio']['opcion3'])){
                                echo 'checked'; //Si el campo era correcto no se borra
                            }
                        ?>>
                        <label for="opcion3"> Opcion 3</label>
                        <?php
                            if ($aErrores['cbObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                                echo "<span style='color: red;'>".$aErrores['cbObligatorio']."</span>";
                            }
                        ?>
                    <br><br>
                    
                    <!-- Lista Obligatorio -->
                    <label for="liObligatorio">Lista Obligatorio:</label>
                    <select id="liObligatorio" name="liObligatorio">
                      <option value="opcion1" <?php 
                            if(isset($_REQUEST['liObligatorio'])){
                                echo 'selected'; //Si el campo era correcto no se borra
                            }
                        ?>>Opción 1</option>
                      <option value="opcion2" <?php 
                            if(isset($_REQUEST['liObligatorio'])){
                                echo 'selected'; //Si el campo era correcto no se borra
                            }
                        ?>>Opción 2</option>
                      <option value="opcion3" <?php 
                            if(isset($_REQUEST['liObligatorio'])){
                                echo 'selected'; //Si el campo era correcto no se borra
                            }
                        ?>>Opción 3</option>
                    </select> 
                    <br><br>
                    
                    <!-- Texto Obligatorio -->
                    <label for="txObligatorio">Texto Obligatorio:</label>
                    <textarea id="txObligatorio" name="txObligatorio">
                        <?php    
                            if($aErrores['txObligatorio'] == null && isset($_REQUEST['txObligatorio'])){ 
                             echo $_REQUEST['txObligatorio']; //Si el campo era correcto no se borra
                            }
                        ?>
                    </textarea>
                        <?php
                            if ($aErrores['txObligatorio'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                                echo "<span style='color: red;'>".$aErrores['txObligatorio']."</span>";
                            }
                        ?>
                    <br><br>
                    
                    <!-- Texto Opcional -->
                    <label for="txOpcional">Texto Opcional:</label>
                    <textarea id="txOpcional" name="txOpcional">
                        <?php    
                            if($aErrores['txOpcional'] == null && isset($_REQUEST['txOpcional'])){ 
                             echo $_REQUEST['txOpcional']; //Si el campo era correcto no se borra
                            }
                        ?>
                    </textarea>
                        <?php
                            if ($aErrores['txOpcional'] != null) { // Si hay algun mensaje de error almacenado en el array para este campo del formulario se lo mostramos al usuario por pantalla al lado del campo correspondiente
                                echo "<span style='color: red;'>".$aErrores['txOpcional']."</span>";
                            }
                        ?>
                    <br><br>
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