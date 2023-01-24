<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <title>Inicio</title>
    <link rel="icon" type="image/x-icon" href="img/logos/favicon.png">
</head>
<body>

<?php
include "includes/nav.php"
?>

<div class="contenedorindex">
    <div class="cabeza">
        <a><strong>INICIO</strong></a>
    </div>
    <div class="contenedorcantidadcoches">
        <div class="cantidadcoches">
            <a>CANTIDAD DE COCHES EN STOCK:
                <STRONG>
                <?php
            //Usamos require once ya que no queremos una conexión constante, recogemos los datos
            //de la base de datos y salimos
            require_once("php/dbcoches.php");
            //Creamos una variable statement para mandar el query a la base de datos
            $stmt = $conn->prepare("SELECT COUNT(id) FROM coches");
            $stmt->execute();
            //Saco el resultado del query y lo guardo en la variable result, todo el contenido total
            $result = $stmt->get_result();
            //Resultcheck devuelve el número de filas que hay en el resultado del query
            $resultCheck = mysqli_num_rows($result);
        
            //Si el número de filas es mayor a 0 procedemos a sacar datos de la base de datos
            if($resultCheck > 0) {
                //Dentro de row dime una fila dentro del parametro seleccionado
                $row = mysqli_fetch_assoc($result);
                //Hacemos echo de un parámetro dentro del array asociativo "row" 
                echo $row['COUNT(id)'];
            }
            ?>
                </STRONG>
            </a>
        </div>
    </div>
    <div class="cochedeldia">
        <div class="cochedeldiatexto">
            <a><strong>COCHE DEL DÍA</strong></a>
        </div>
        <div class="cocheindex">
            <?php
            //Usamos require once ya que no queremos una conexión constante, recogemos los datos
            //de la base de datos y salimos
            require_once("php/dbcoches.php");
            //Almacenamiento de los datos recogidos al ejecutar el query a la base de datos
            //Dado que queremos imprimir una imagen aleatoria cada vez que iniciemos la página, vamos a pedir una fila de datos aleatoria
            $result = $conn->query("SELECT * FROM coches ORDER BY RAND();");
            //Contamos el número de lineas que hay en el resultado del query
            $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck>0) {
                        //Almacenamos en un array asociativo los resultados del query
                        $row = mysqli_fetch_assoc($result);
                        //Hacemos echo del parámetro fotoruta del array asociativo row ya que queremos imprimir una imagen
                        echo "<img src=" . $row['fotoruta'] . " width='400px'>";
            }
            //Cerramos el statement y la conexión
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</div>
<?php
include "includes/footer.php"
?>
</body>
</html>