<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <?php
    require_once("php/dbcoches.php");

    if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM coches WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<title>" . $row['nombre'] . "</title>";
    }
}
        ?>
    <link rel="icon" type="image/x-icon" href="img/logos/favicon.png">
    <script>


        let totalPrecio = 0;
        let totalPago = 0;
        let totalMeses = 0;
        let total = 0;
        let valorPrecio = 1;
        let valorPago = 1;
        let valorMeses = 1;

        function calcular(){

            let precio = document.getElementById("Precio").value;
            let pago = document.getElementById("Pago").value;
            let meses = document.getElementById("Meses").value;

            totalPrecio = precio*valorPrecio;
            totalPago = pago*valorPago;
            totalMeses = meses*valorMeses;
            total=(totalPrecio-totalPago)/totalMeses;
            document.getElementById("total").innerHTML = total + " euros/mes";
        }


    </script>
    <script src="scripts/selector.js"></script>
</head>
<body>

<?php
include "includes/nav.php"
?>

<div class="contenedorcoche">



    <div class="huecocoche">
        
            <?php
            require_once("php/dbcoches.php");
            // Con el if, primero recibimos el id de del href de las imagenes en la galeria
            // Confirma que no está vacio
            // Con filter var comprobamos que un valor es del tipo que preguntamos en la propia funcion
            if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                // Guardamos la id que hemos filtrado en una variable
                $id = $_GET['id'];
                //Guardamos el query en el statement para sacar los datos de un coche determinado por una id específica
                $stmt = $conn->prepare("SELECT * FROM coches WHERE id=?");
                //La funcion bind_param va a enlazar la id a la query anterior
                $stmt->bind_param("i", $id);
                $stmt->execute();
                //Guardamos todo lo conseguido en la variable result
                $result = $stmt->get_result();
                // Numero de filas que hay en el resultado del query
                $resultCheck = mysqli_num_rows($result);
            
            //Si el resultado del query tienes mas de 0 filas procedemos
            if($resultCheck > 0) {
                //Dentro de row dime una fila dentro del parametro seleccionado
                $row = mysqli_fetch_assoc($result);
                //La variable num guardara la extracción del dato que queremos dentro del query pero personalizado para que se imprimir en el html como nosotros queramos
                $num = number_format($row['precio'], 0, '', '.'). " €";
                    echo "<div class='fotosanunciocoche'>"
                        . "<div class='bloquefotos'>"
                            . "<div class='fotogrande'>"
                                . "<img id='grande' src=" . $row['fotoruta'] . " width='600px'>"
                            . "</div>" 
                            ."<div class='fotospequeñas'>" 
                                . "<img src=" . $row['fotoruta1'] . " width='200px' onclick='selector(this)'>"
                                . "<img src=" . $row['fotoruta2'] . " width='200px' onclick='selector(this)'>"
                                . "<img src=" . $row['fotoruta3'] . " width='200px' onclick='selector(this)'>"
                            . "</div>"
                        . "</div>"
                    . "</div>";

                    echo "<div class='infoanunciocoche'>"
                        . "<div class='bloquedatos'>"
                            . "<div class='nombrecoche'>"
                                . $row['nombre']
                            . "</div>"
                            . "<div class='datoscoche'>"
                                . $row['datoscoche']
                            . "</div>"
                            . "<div class='kilometraje'>"
                                . $row['kilometraje'] . " km"
                            . "</div>"
                            . "<div class='potencia'>"
                                . $row['potencia'] . " cv"
                            . "</div>"
                            . "<div class='precio'>"
                                . $num
                            . "</div>"
                            . "<div class='color'>"
                                . $row['color']
                            . "</div>"
                            . "<div class='traccion'>"
                                . $row['traccion']
                            . "</div>"
                            . "<div class='transmision'>"
                                . $row['transmision']
                            . "</div>"
                            . "</div>";
            }
        }

            //Cerramos el query y la conexion con la base de datos
            $stmt->close();
            $conn->close();
            ?>
            
        <div class="financiacion">
            <div class="titulofinance">
                <a>CALCULADORA DE FINANCIACIÓN</a>
            </div>
            <div class="precioinicial">
                <label>Precio <input type="number" id="Precio"></label>
            </div>
            <div class="pagoinicial">
                <label>Pago <input type="number" id="Pago"></label>
            </div>
            <div class="meses">
                <label>Meses <input type="number" id="Meses" min="1" max="12" ></label>
            </div>
            <div class="botonfinance">
                <button onclick="calcular()">Calcular</button>
            </div>
            <div class="totalfinance">
                <div id="total"></div>
            </div>
        </div>
        <div class="separacion"></div>
    </div>

</div>
<?php
include "includes/footer.php"
?>
</body>
</html>