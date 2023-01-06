<?php
include_once 'php/dbcoches.php';


$sql = "SELECT * from coches where id=1;";

$result = $conn->query($sql);

$resultCheck = mysqli_num_rows($result);
if ($resultCheck>0) {
    $row = mysqli_fetch_assoc($result);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <title>
        <?php
        if ($resultCheck>0) {
            echo ($row['nombre']);
        }
        ?>
    </title>
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
<body onload="numRand()">

<?php
include "includes/nav.php"
?>

<div class="contenedorcoche">



    <div class="huecocoche">
        <div class="fotosanunciocoche">
            <div class="bloquefotos">
                <div class="fotogrande">

                    <?php
                    if ($resultCheck>0) {
                    if( $row['fotoruta'] ){
                        ?>
                        <img id="grande" src="<?php echo $row['fotoruta'];?>" width="600px"">
                    <?php }} ?>

                </div>
                <div class="fotospequeñas">
                    <?php
                    if ($resultCheck>0) {
                        if( $row['fotoruta1'] ){
                            ?>
                            <img src="<?php echo $row['fotoruta1'];?>" width="200px" onclick="selector(this)">
                        <?php
                        }
                    }
                    ?>

                    <?php
                    if ($resultCheck>0) {
                        if( $row['fotoruta2'] ){
                            ?>
                            <img src="<?php echo $row['fotoruta2'];?>" width="200px" onclick="selector(this)">
                            <?php
                        }
                    }
                    ?>

                    <?php
                    if ($resultCheck>0) {
                        if( $row['fotoruta3'] ){
                            ?>
                            <img src="<?php echo $row['fotoruta3'];?>" width="200px" onclick="selector(this)">
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="infoanunciocoche">
            <div class="bloquedatos">
                <div class="nombrecoche">
                    <?php
                    if ($resultCheck>0) {
                        echo ($row['marca'] . " " . $row['modelo']);
                    }
                    ?>
                </div>
                <div class="datoscoche">
                    <?php
                    if ($resultCheck>0) {
                        echo $row['datoscoche'];
                    }
                    ?>
                </div>
                <div class="kilometraje">
                    <?php
                    if ($resultCheck>0) {
                        echo ($row['kilometraje'] . " km");
                    }
                    ?>
                </div>
                <div class="potencia">
                    <?php
                    if ($resultCheck>0) {
                        echo ($row['potencia'] . " cv");
                    }
                    ?>
                </div>
                <div class="precio">
                    <?php
                    if ($resultCheck>0) {
                        echo number_format($row['precio'], 0, '', '.'). " €";
                    }
                    ?>
                </div>
                <div class="color">
                    <?php
                    if ($resultCheck>0) {
                        echo ($row['color']);
                    }
                    ?>
                </div>
                <div class="traccion">
                    <?php
                    if ($resultCheck>0) {
                        echo ($row['traccion']);
                    }
                    ?>
                </div>
                <div class="transmision">
                    <?php
                    if ($resultCheck>0) {
                        echo ($row['transmision']);
                    }
                    ?>
                </div>
            </div>
        </div>
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