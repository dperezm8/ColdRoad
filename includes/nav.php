<?php
session_start();
?>


<nav>
    <a><?php if (isset($_SESSION['id_usuario'])){
        echo $_SESSION['nombre'] . '<a href="logout.php" style="text-decoration: none; color: black"><strong> LOGOUT</strong></a>';
        if($_SESSION['permiso']>2){
            echo '<a href="menuAdmin.php"> Menu Admin</a>';
        }
        }else{
        echo '<a href="login.php" style="display: grid; justify-content: end; text-decoration: none; color: black"><strong>Login</strong></a>';

        }?></a>
    <div class="contenedornav">
        <div class="logonav">
            <div class="imagennav">
                <img src="img/logos/Logo.png" width="450px">
            </div>
        </div>
        <div class="menu">
            <div class="menu1" href="index.php">
                <a href="index.php">Inicio</a>
            </div>
            <div class="menu2">
                <a href="catalogo.php">Catálogo</a>
            </div>
            <div class="menu3">
                <a href="galeria.php">Galería</a>
            </div>
            <div class="menu4">
                <a href="servicios.php">Servicios</a>
            </div>
        </div>
    </div>
</nav>