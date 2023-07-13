<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 PHP</title>

    <!--

    Vamos a realizar un sistema que nos calcule el precio de un servicio de newsletter. Dependiendo del número de emails que enviemos costará un precio u otro. A continuación puedes ver una tabla.

         De	           A	        Precio
         0	          2000	         0 €
        2001         10000         0.7 € unidad
       10001	    Infinito	   0.2 € unidad

    Añade un campo para indicar el número de emails a enviar. Comprueba que es un número.
    Añade una opción para indicar si quieres un seguro por cada mensaje, lo cual tendrá un recargo por mensaje de 0.1 €.
    Al pulsar en submit muestra el precio total.

    -->

</head>
<body>
    <table width="20%">
        <caption>PRECIOS</caption>

        <tr>
            <th>De</th>
            <th>A</th>
            <th>Precio</th>
        </tr>

        <tr>
            <td>0</td>
            <td>2000</td>
            <td>0€</td>
        </tr>

        <tr>
            <td>2001</td>
            <td>10000</td>
            <td>0.7€ unidad</td>
        </tr>

        <tr>
            <td>10001</td>
            <td>Infinito</td>
            <td>0.2€ unidad</td>
        </tr>
            
    </table>

    <br>

    <form method="POST">

        <ul>
            <li><strong>Numero de emails a enviar</strong></li>
            <li><input type="text" placeholder="Numero de emails" name="numero"></li>
            <li>Contratar seguro<input type="checkbox" name="seguro" id=""></li>
            <li>No contratar seguro<input type="checkbox" name="seguroNo" id=""></li>
            <li><button type="submit" name="enviar">Enviar</button></li>
        </ul>

    </form>

    <br>
    <?php

        // Compruebo si me llegan los datos por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        // Funcion para validar si el texto no esta vacio
        function validar_texto_vacio(string $numero) : bool {

            return !(trim($numero) == '');

        }

        // Funcion para comprobar si un numero es entero
        function validar_numero_entero(string $numero) : bool {

            return filter_var($numero, FILTER_VALIDATE_INT) != false;

        }


        /* VARIABLES */

        $errores = [];
        $precioTotal = "";
        $numero = isset($_REQUEST['numero']) ? $_REQUEST['numero'] : null;
        $seguro = isset($_REQUEST['seguro']) ? $_REQUEST['seguro'] : null;


        /* VALIDACIONES */

        // Numero
        if(!validar_texto_vacio($numero)) {
            $errores[] = 'El campo no puede estar vacio';
        }

        if(!validar_numero_entero($numero)) {
            $errores[] = 'Tiene que ser un valor numérico entero';
        }

        // Si se presiona el boton enviar
        if (isset($_POST['enviar'])) {


            if ($numero > 2000 && $numero <= 10000) {
                $precioTotal = $numero * 0.7;
            } elseif ($numero > 10000) {
                $precioTotal = $numero * 0.2;
            } else {
                $precioTotal = 0;
            }

            // Compruebo si desea contratar un seguro
            if($seguro == true) {

                $precioTotal += $numero * 0.1;

            } else {
                $errores[] = 'El número de emails debe ser mayor que 0.';
            }

            }
        

    }

?>
    <!-- Verifico si la solicitud actual es de tipo POST && Verifico si el botón de envío del formulario con el nombre "enviar" está presente en el arreglo -->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) { ?>

        <?php if(!empty($errores)) { ?>
            <ul>
                <?php foreach ($errores as $error) { ?>

                    <li><?php echo $error; ?></li>

                <?php } ?>

            </ul>

        <?php } else { ?>

            <p>La catidad total a pagar es <?php echo $precioTotal; ?>€ </p>

        <?php } ?>
    <?php } ?>

</body>
</html>