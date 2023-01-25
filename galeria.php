<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <title>Galeria</title>
    <link rel="icon" type="image/x-icon" href="img/logos/favicon.png">
</head>
<body>

<?php
include "includes/nav.php"
?>


    <div class="contenedorgaleria">
        <div class="cabeza">
            <a><strong>GALERÍA</strong></a>
        </div>

        <div class='columnagaleria1'>
        
        <?php
        //Entramos a la base de datos recogemos los datos necesarios y salimos
        require_once("php/dbcoches.php");
        
        //Guardamos la query para sacar los datos de todos los coches de la tabla coches y posteriormente la ejecutamos
        $stmt = $conn->prepare("SELECT * FROM coches");
        $stmt->execute();
        //Guardamos el resultado de la query en la variable resut
        $result = $stmt->get_result();
        //Guardamos la cuenta de todas las filas de los datos obtenidos con el query
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            //Repetimos el proceso para cada fila en el resultado del query
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo "<div class='galeria1'>"
                    . "<a href='coche1.php?id=" . $row['id'] . "'>"
                    . "<img src=" . $row['fotoruta'] . " width='300px'>"
                    . "</div>";
                echo "<div class='galeria2'>"
                . "<a href='coche1.php?id=" . $row['id'] . "'>"
                . "<img src=" . $row['fotoruta1'] . " width='300px'>"  
                . "</div>"; 
                echo "<div class='galeria3'>"
                    . "<a href='coche1.php?id=" . $row['id'] . "'>"
                    . "<img src=" . $row['fotoruta2'] . " width='300px'>" 
                . "</div>";
            }
        }
        //cerramos el query y la conexion
        $stmt->close();
        $conn->close();
        ?>

    </div>
        <div class="textogaleria">
            <a></a>
        </div>
    </div>


<?php
include "includes/footer.php"
?>
</body>
</html>