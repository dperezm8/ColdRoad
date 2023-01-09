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
            require_once("php/dbcoches.php");
            $result = $conn->query("SELECT * FROM coches ORDER BY RAND();");
    
            $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck>0) {
                        $row = mysqli_fetch_assoc($result);
                    }
    
            if($resultCheck > 0) {
                    echo $row['COUNT(*)'];
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
            require_once("php/dbcoches.php");
            $result = $conn->query("SELECT * FROM coches ORDER BY RAND();");
    
            $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck>0) {
                        $row = mysqli_fetch_assoc($result);
                        echo "<img src=" . $row['fotoruta'] . " width='400px'>";
            }
            ?>
        </div>
    </div>
</div>
<?php
include "includes/footer.php"
?>
</body>
</html>