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
        require_once("php/dbcoches.php");

        $result = $conn->query("SELECT * FROM coches");
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
            while ($row = $result->fetch_assoc()) {
                $num = number_format($row['precio'], 0, '', '.'). " €";
                echo "<div class='coche'>"
                        . "<img src=" . $row['fotoruta'] . " width='300px'>"
                        ."<div class='nombreCatalogo'><a>"
                            . $row['nombre'] ."</a></div>"
                        . "<div class='precioCatalogo'><a>"
                            .  $num ."</a></div>"
                    . "</div>";
            }
        }
        ?>

        </div>

    </div>

<?php
include "includes/footer.php"
?>
</body>
</html>