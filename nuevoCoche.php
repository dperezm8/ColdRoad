<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <title>Añadir Coche</title>
    <link rel="icon" type="image/x-icon" href="img/logos/favicon.png">
</head>
<body>

<?php
include "includes/nav.php"
?>

<div class="contenedorcontacto">
    <div class="cabeza">
        <a><strong>Añadir coche</strong></a>
    </div>
    <form action="crearCoche.php" method="POST" class="bloquecontacto" enctype="multipart/form-data">
        <div class="nombremarca">
            <a>Nombre</a>
        </div>
        <div class="anadir">
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="nombremarca">
            <a>Marca</a>
        </div>
        <div class="anadirmarca">
            <input type="text" name="marca" id="marca">
        </div>
        <div class="nombremodelo">
            <a>Modelo</a>
        </div>
        <div class="anadirmodelo">
            <input type="text" name="modelo" id="modelo">
        </div>
        <div class="nombrecolor">
            <a>Color</a>
        </div>
        <div class="anadircolor">
            <input type="text" name="color" id="color">
        </div>
        <div class="nombrekm">
            <a>Kilometraje</a>
        </div>
        <div class="anadirkm">
            <input type="number" min="0" name="kilometraje" id="kilometraje">
        </div>
        <div class="nombrepotencia">
            <a>Potencia</a>
        </div>
        <div class="anadirpotencia">
            <input type="number" min="0" name="potencia" id="potencia">
        </div>
        <div class="nombrecc">
            <a>Cilindrada</a>
        </div>
        <div class="anadircc">
            <input type="number" min="0" name="cilindrada" id="cilindrada">
        </div>
        <div class="nombreanio">
            <a>Año</a>
        </div>
        <div class="anadirano">
            <input type="number" min="1900" name="anio" id="anio">
        </div>
        <div class="nombretrans">
            <a>Transmisión</a>
        </div>
        <div class="anadirtrans">
                <select name="transmision">
                    <option hidden></option>
                    <option value="Automatico" >Automatico</option>
                    <option value="Manual" >Manual</option>
                </select>
        </div>
        <div class="nombretracc">
            <a>Tracción</a>
        </div>
        <div class="anadirtrancc">
                <select name="traccion">
                    <option selected hidden value=""></option>
                    <option value="4x4">4x4</option>
                    <option value="AWD">AWD</option>
                    <option value="4WD">4WD</option>
                    <option value="FWD">FWD</option>
                    <option value="RWD">RWD</option>
                </select>
        </div>
        <div class="nombreprecio">
            <a>Precio</a>
        </div>
        <div class="anadirprecio">
            <input type="text" name="precio" id="precio">
        </div>

        <div class="nombreprecio">
            <a>Descripcion del coche</a>
        </div>
        <div class="anadirdatos">
            <input type="text" name="datoscoche" id="datoscoche">
        </div>

        <div class="nombrefotos">
            <a>Fotos</a>
        </div>
        <div class="anadirfoto">
            <input type="file" name="foto" id="foto">
        </div>
        <div class="anadirfoto1">
            <input type="file" name="foto1" id="foto1">
        </div>
        <div class="anadirfoto2">
            <input type="file" name="foto2" id="foto2">
        </div>
        <div class="anadirfoto3">
            <input type="file" name="foto3" id="foto3">
        </div>

        <div class="enviaranadir">
            <button type="submit" name="submit">Enviar</button>
        </div>



    </form>
</div>

<?php
include "includes/footer.php"
?>
</body>
</html>
