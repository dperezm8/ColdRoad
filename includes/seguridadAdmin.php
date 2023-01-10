<?php
if($_SESSION['permiso']<2){
    header("location:nuevoCoche.php");
}