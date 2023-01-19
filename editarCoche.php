<?php
require "includes/protec.php";
require "includes/seguridadAdmin.php"
?>





<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Editar coche</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
<?php
include "includes/nav.php"
?>

<div class="contenedorEditar">
    <div class="cabeza">
        <a><strong>EDITAR COCHES</strong></a>
    </div>
    <div class="areaEditar">
        <div class="textoEditar">
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
        <form action="php/dbcoches.php" method="post" class="seleccionarEditar">
            <a>Selecciona la id del coche que quieras editar</a>
            <input type="number" name="idcoche" id="idcoche">
            <button type="submit" name="submit">Enviar</button>
        </form>
        <form action="php/dbcoches.php" method="post" class="cambiosEditar">
            <div class="cambiar">
                <a><strong>Introduce la información nueva en los campos.</strong></a>
            </div>
            <div class="cambiar">
                <a>Nombre del coche</a>
            </div>
            <div class="cambiar">
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="cambiar">
                <a>Marca</a>
            </div>
            <div class="cambiar">
                <input type="text" name="marca" id="marca">
            </div>
            <div class="cambiar">
                <a>Modelo</a>
            </div>
            <div class="cambiar">
                <input type="text" name="modelo" id="modelo">
            </div>
            <div class="cambiar">
                <a>Color</a>
            </div>
            <div class="cambiar">
                <input type="text" name="color" id="color">
            </div>
            <div class="cambiar">
                <a>Kilometraje</a>
            </div>
            <div class="cambiar">
                <input type="number" name="km" id="km">
            </div>
            <div class="cambiar">
                <a>Potencia</a>
            </div>
            <div class="cambiar">
                <input type="number" name="potencia" id="potencia">
            </div>
            <div class="cambiar">
                <a>Cilindrada</a>
            </div>
            <div class="cambiar">
                <input type="number" name="cc" id="cc">
            </div>
            <div class="cambiar">
                <a>Año</a>
            </div>
            <div class="cambiar">
                <input type="number" name="ano" id="ano">
            </div>
            <div class="cambiar">
                <a>Transmisión</a>
            </div>
            <div class="cambiar">
                <input type="text" name="trans" id="trans">
            </div>
            <div class="cambiar">
                <a>Tracción</a>
            </div>
            <div class="cambiar">
                <input type="text" name="tracc" id="tracc">
            </div>
            <div class="cambiar">
                <a>Precio</a>
            </div>
            <div class="cambiar">
                <input type="number" name="precio" id="precio">
            </div>
            <div class="cambiar">
                <a>Descripción</a>
            </div>
            <div class="cambiar">
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            </div>
            <div class="cambiar">
                <button type="submit" name="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>

<?php
include "includes/footer.php"
?>
</body>
</html>


