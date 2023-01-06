<?php
if($_SESSION['permiso']<2){
    header("location:index.php?acceso-admin-denegado");
}