<!---
Comentario de prueba github
--->

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
        // Resultado es el valor que devuelve la base de datos, 1 si se ha hecho correctamente y existe la base de datos, 0 si no.
        $result = $stmt->get_result();
        // Resulcheck compurueba el numero de filas que hay en la base de datos
        $resultCheck = mysqli_num_rows($result);

    
        if($resultCheck > 0) {
            //Si el número de filas es mayor a 0 procederemos a sacar los datos con el metodo de fetch
            //Si el valor de la variable row (cantidad de filas) es igual a la cantidad de resultados hará echo, este while actua como un foreach
            while ( $row = mysqli_fetch_assoc($result)) {
                //Guardaremos el valor del precio del coche en la posicion en la que trabajamos
                $num = number_format($row['precio'], 0, '', '.'). " €";
                //Imprimimos el código html junto con la variable para poder imprimir el dato de la base de datos en la zona elegida
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