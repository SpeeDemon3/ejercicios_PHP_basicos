<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 PHP</title>

    <?php
         // Verifica si se ha enviado el formulario al pulsar el botón "Sacar al perro"
        if (isset($_POST['sacar_perro'])) {

            // Obtengo la lista de nombres del textarea
            $nombres = $_POST['nombres'];

            // Convierto la cadena en una array separado por espacios
            $listaNombres = explode(" ", $nombres);

            // Obtengo un nombre aleatorio
            $indiceAleatorio = array_rand($listaNombres);
            $nombreAleatorio = $listaNombres[$indiceAleatorio];

            // Mostrar el resultado
            $mensaje = $nombreAleatorio . " saca al perro.";

        }
        
    ?>


</head>
<body>

    <!--
        Actividad 5-2 (¿Quién saca al perro?)

        1. Escribe en un textarea una lista de nombres.
        2. Cuando pulses un botón debes mostrar un nombre aleatorio. (Será el encargado de sacar al perro)
        3. Muestra con la siguiente plantilla: nombre saca al perro.

        Ejemplo en textarea:

        Batman Superman Ironman Pescanova

        Cuando es pulsado el botón…

        Ironman saca al perro.

    -->

    <h2>¿Quien saca al perro?</h2>
    
    <!-- Inicia el formulario con método POST y acción vacía (envía el formulario a la misma página) -->
    <form method="post" action="">
        <!-- Crea un textarea para ingresar la lista de nombres -->
        <!-- El contenido del textarea se muestra si existe (se ha enviado el formulario previamente) para mantenerlo después de enviar el formulario -->
        <textarea rows="4" cols="50" name="nombres">

            <?php echo isset($_POST['$nombres']) ? $_POST['nombres'] : ''; ?>

        </textarea>
    
        <br>
        
        <!-- Crea un botón de envío para enviar el formulario con el nombre "sacar_perro" -->
        <input type="submit" name="sacar_perro" value="Sacar al perro">
    
    </form>


    <!-- Verifica si se ha generado un nombre aleatorio -->
    <?php if (isset($mensaje)) { ?>

        <!-- Muestra el mensaje con el nombre que saca al perro -->
        <p> <?php echo $mensaje ?> </p>

    <?php } ?>

</body>
</html>