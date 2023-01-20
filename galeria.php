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
        require_once("php/dbcoches.php");
        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM coches");
        $stmt->execute();
        $result = $stmt->get_result();
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
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