<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <?php
    require_once("php/dbcoches.php");

    $stmt = $conn->prepare("SELECT * FROM coches");
    $stmt->execute();
    $result = $stmt->get_result();
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<title>" . $row['nombre'] . "</title>";
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
            
            if($resultCheck > 0) {
                $row = mysqli_fetch_assoc($result);
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