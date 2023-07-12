<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 PHP</title>


</head>

<body>
    <!--
        Actividad 5-1 (Contacto fraudulento)
        Realiza un formulario con los siguientes datos: nombre, telefono, email y mensaje.
        Cuando se pulse en enviar debe mostrar la siguiente plantilla.
        “Hola nombre!

        Te voy a enviar spam a correo y te llamaré por la madrugada a telefono.

        mensaje

        Enviado desde un iPhone”
    -->






    <form method="get">

        <p>Nombre </p>
        <input type="text" name="nombre">
        <p>Telefono </p>
        <input type="number" name="telefono">
        <p>Email </p>
        <input type="email" name="email">
        <p>Mensaje </p>
        <input type="textarea" name="mensaje">

        <button>Enviar</button>


    </form>



    <?php if (isset($_REQUEST['nombre'])): ?>

        <p> Hola
            <?php echo $_REQUEST['nombre']; ?>!
        </p>

    <?php endif; ?>

    <?php if (isset($_REQUEST['telefono']) && isset($_REQUEST['email'])): ?>

        <p> Te voy a enviar spam a
            <?php echo $_REQUEST['email']; ?> y te llamaré por la madrugada a
            <?php echo $_REQUEST['telefono']; ?>.
        </p>

        <p>
            Mensaje.
        </p>
        <p>
            Enviado desde un Iphone.
        </p>

    <?php endif; ?>


</body>

</html>