<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 28</title>
        <style>
            .error{
                color: red;
                font-weight: bold;
            }
            
            legend{
                color: black;
                font-weight: bold;
            }
            input{
                padding: 5px;
                border-radius: 10px;
            }
            .obligatorio input{
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <h2>Cristina Núñez</h2>
        <?php
        /**
            *@Author: Cristina Núñez
            *@since: 22/10/2020
         */

        //Declaramos la variables
        require_once '../core/201020libreriaValidacion.php'; //Importamos la librería 
        $entradaOK = true;
        
        $arrayErrores = [ //Recoge los errores del formulario
            'nombre' => null,
            
            'campoEntero' => null,  
            
            'fecha' => null,
            
            'campoTexto' => null,
            
            'selectorRadio' => null,
            
            'selectorLista' => null
            
        ]; 
        
        $arrayFormulario = [ //Recoge los datos del formulario
            'nombre' => null,
            
            'campoEntero' => null,  
            
            'fecha' => null,
            
            'campoTexto' => null,
            
            'selectorRadio' => null,
            
            'selectorLista' => null
            
        ];  


        if (isset($_POST['enviar'])) { //Código que se ejecuta cuando se envía el formulario
            
            #OBLIGATORIOS
            $arrayErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_POST['nombre'], 20, 1, 1);  //Máximo, mínimo y opcionalidad
            
            $arrayErrores['campoEntero'] = validacionFormularios::comprobarEntero($_POST['campoEntero'], 10, 1, 1); //Máximo, mínimo y opcionalidad
            
            $arrayErrores['fecha'] = validacionFormularios::validarFecha($_POST['fecha'], "01/01/2200", "01/01/1900", 1); //Opcionalidad
            $arrayErrores['campoTexto'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTexto'], 500, 1, 1); //Máximo, mínimo y opcionalidad
            if(!isset($_POST['selectorRadio'])){$arrayErrores['selectorRadio'] = "Debe marcarse un valor";}
            
            $arrayErrores['selectorLista'] = validacionFormularios::validarElementoEnLista($_POST['selectorLista'], array("Ni idea", "Con la familia", "De fiesta", "Trabajando", "Estudiando DWES")); //Opciones de la lista
             
            
            
            foreach ($arrayErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
            }
        } else {
            $entradaOK = false;
        }


        if ($entradaOK) { // Si el formulario se ha rellenado correctamente
         
            #OBLIGATORIOS
            // Cargamos en el $arrayFormulario el valos de aquellos campos que se han rellenado correctamente
            
            $arrayFormulario['nombre'] = $_POST['nombre'];
            $arrayFormulario['campoEntero'] = $_POST['campoEntero'];
            $arrayFormulario['fecha'] = $_POST['fecha'];
            $arrayFormulario['campoTexto'] = $_POST['campoTexto'];
            $arrayFormulario['selectorRadio'] = $_POST['selectorRadio'];
            $arrayFormulario['selectorLista'] = $_POST['selectorLista'];
            
            setlocale(LC_ALL, "es_ES.utf-8");
            $fechaAct = new DateTime();
            $fechaNac = new DateTime($arrayFormulario['fecha']);
            $diferencia = date_diff($fechaAct, $fechaNac);
            
            // Mostramos los valores de cada campo obligatorio
            echo "Hoy ".strftime("%d de %B de %Y , a las %T"."<br>");
            echo "D. " . $arrayFormulario['nombre'] ." nacido hace ".$diferencia->format('%Y')." años<br>";
            echo "se siente ".$arrayFormulario['selectorRadio']."<br>";
            echo "Valora su curso actual con un ".$arrayFormulario['campoEntero']." sobre 10. <br>";
            echo "Estas navidades las dedicará a ".$arrayFormulario['selectorLista']."<br>";
            echo "Y ademas opina que ".$arrayFormulario['campoTexto'];
            
        } else { //Código que se ejecuta antes de rellenar el formulario
            ?>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <fieldset>
                    <legend>ENCUESTA DE SATISFACCIÓN PERSONAL</legend>
                    <div class="obligatorio">
                        <label>Nombre y apellidos: </label>
                        <input type = "text" name = "nombre"
                               value="<?php if($arrayErrores['nombre'] == NULL && isset($_POST['nombre'])){ echo $_POST['nombre'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['nombre'] != NULL) {
                        echo $arrayErrores['nombre']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- FECHA -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Fecha de nacimiento: </label>
                        <input type = "date" name = "fecha"
                               value="<?php if($arrayErrores['fecha'] == NULL && isset($_POST['fecha'])){ echo $_POST['fecha'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['fecha'] != NULL) {
                        echo $arrayErrores['fecha']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- ¿Cómo te sientes hoy? -------------------------------------------->
                    
                    <div>
                        <label>¿Cómo te sientes hoy?: </label><br><br>
                        <input type="radio" id="RO1" name="selectorRadio" value="Muy mal" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO1">Muy mal1</label>
                        <input type="radio" id="RO2" name="selectorRadio" value="Mal" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO2">Mal</label>
                        <input type="radio" id="RO3" name="selectorRadio" value="Regular" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Regular"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Regular</label>
                        <input type="radio" id="RO4" name="selectorRadio" value="Bien" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO4">Bien</label>
                        <input type="radio" id="RO5" name="selectorRadio" value="Muy bien" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO5">Muy bien</label>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorRadio'] != NULL) {
                        echo $arrayErrores['selectorRadio']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- Como va el curso (1.Muy mal - 10.Muy bien) -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Como va el curso (1.Muy mal - 10.Muy bien): </label>
                        <input type = "number" name = "campoEntero"
                               value="<?php if($arrayErrores['campoEntero'] == NULL && isset($_POST['campoEntero'])){ echo $_POST['campoEntero'];} ?>" ><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoEntero'] != NULL) {
                        echo $arrayErrores['campoEntero']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- Como se presentan las vacaciones de navidad -------------------------------------------->
                    
                    <div>
                        <label>Como se presentan las vacaciones de navidad: </label>
                        <select name="selectorLista">
                            <option value="Ni idea" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion1"){ echo "selected";}} ?>>Ni idea</option>
                            <option value="Con la familia" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion2"){ echo "selected";}} ?>>Con la familia</option>
                            <option value="De fiesta" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion3"){ echo "selected";}} ?>>De fiesta</option>
                            <option value="Trabajando" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion4"){ echo "selected";}} ?>>Trabajando</option>
                            <option value="Estudiando DWES" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion5"){ echo "selected";}} ?>>Estudiando DWES</option>
                        </select>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorLista'] != NULL) {
                        echo $arrayErrores['selectorLista']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- Describe brevemente tu estado de ánimo -------------------------------------------->
                    
                    <div>
                        <label>Describe brevemente tu estado de ánimo:</label>
                        <textarea name="campoTexto" placeholder="Maximo 500 caracteres" value="<?php if($arrayErrores['campoTexto'] == NULL && isset($_POST['campoTexto'])){ echo $_POST['campoTexto'];} ?>"></textarea>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoTexto'] != NULL) {
                        echo $arrayErrores['campoTexto']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <div>
                        <br><input type = "submit" name = "enviar" value = "Conclusión">
                    </div>
                </fieldset>
            </form>
        <?php } ?>
    </body>
</html>

