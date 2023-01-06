
<?php
include_once 'php/dbcoches.php';

$sql = "SELECT *, count(*) from coches
        ORDER BY RAND()
        LIMIT 1;";

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
                    if ($resultCheck>0) {
                        echo ($row['count(*)']);
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
            include 'php/dbcoches.php';
            $sql = "SELECT * from coches 
                    ORDER BY RAND();";

            $result = $conn->query($sql);

            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck>0) {
                $row = mysqli_fetch_assoc($result);
            }

            if ($resultCheck>0) {
                if( $row['fotoruta'] ){
                    ?>
                    <img src="<?php echo $row['fotoruta'];?>" width="400px"">
                <?php
                }
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
