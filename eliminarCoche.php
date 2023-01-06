<?php
require "includes/protec.php";
require "includes/seguridadAdmin.php"
?>



<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Eliminar coche</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
<?php
include "includes/nav.php"
?>

<div class="contenedorEliminar">
    <div class="cabeza">
        <a><strong>ELIMINAR COCHES</strong></a>
    </div>
    <div class="areaEliminar">
        <div class="textoEliminar">
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
            <a> 1. Ferrari Testarossa by Koenig 1990 Red</a>
        </div>
        <form action="php/dbcoches.php" method="post" class="seleccionarEliminar">
                <a>Selecciona la id del coche que quieras eliminar</a>
                <input type="number" name="idcoche" id="idcoche">
                <button type="submit" name="submit">Enviar</button>
        </form>
    </div>
</div>

<?php
include "includes/footer.php"
?>
</body>
</html>
