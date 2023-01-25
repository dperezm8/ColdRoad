<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <title>Catalogo</title>
    <link rel="icon" type="image/x-icon" href="img/logos/favicon.png">
</head>
<body>

<?php
include "includes/nav.php"
?>

<div class="contenedorcatalogo">
        <div class="cabeza">
            <a><strong>CATÁLOGO</strong></a>
        </div>

        <div class='columnacoche1'>
        
        <?php

        // Minimización de riesgos mediante la variación once del metodo require, require substrae las variables de la base de datos en este caso y solo lo hará una vez
        // En este caso uso require_once en vez de require por que no necesitamos una conexión constante, en este caso llamamos a la base de datos recogemos los datos y salimos

        require_once("php/dbcoches.php");

        // prepare and bind
        // La variable statement guardará el query que vamos a usar en esta página.
        $stmt = $conn->prepare("SELECT * FROM coches");
        $stmt->execute();
        // Saco el resultado del query y lo guardo en la variable result
        $result = $stmt->get_result();
        // Resulcheck devuelve el numero de filas que hay en el resultado del query
        $resultCheck = mysqli_num_rows($result);
        
        //Si el número de filas es mayor a 0 procedemos
        if($resultCheck > 0) {
            //Por cada fila que haya en el resultado de datos de la base de datos vamos a imprimir datos en la pagina web
            while ($row = mysqli_fetch_assoc($result)) {
                //Sacamos la fila del resultado donde se encuentra el valor del precio y lo imprimiremos de forma personalizada
                $num = number_format($row['precio'], 0, '', '.'). " €";
                //Imprimimos el codigo html en conjunto a los datos sacados dependiendo del parametro en las filas del resultado del query
                echo "<div class='coche'>"
                        . "<img src=" . $row['fotoruta'] . " width='300px'>"
                        ."<div class='nombreCatalogo'><a>"
                            . $row['nombre'] ."</a></div>"
                        . "<div class='precioCatalogo'><a>"
                            .  $num ."</a></div>"
                    . "</div>";
            }
        }
        //Cerramos query y conexión a base de datos una vez hayamos impreso todos los datos de la base de datos, esto ocurre cuando no sea viable el condicional del while
        $stmt->close();
        $conn->close();
        ?>

        </div>

    </div>

<?php
include "includes/footer.php"
?>
</body>
</html>