<?php

$dbServername = "127.0.0.1:3307";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cold_road";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$kilometraje = $_POST['kilometraje'];
$potencia = $_POST['potencia'];
$cilindrada = $_POST['cilindrada'];
$anio = $_POST['anio'];
$transmision = $_POST['transmision'];
$traccion = $_POST['traccion'];
$precio = $_POST['precio'];
$datoscoche = $_POST['datoscoche'];
$foto = $_FILES['foto'];
$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];
$ruta = 'img/inventario/'.$nombre. " " . $anio;

$fotoruta ="";
$fotoruta1 ="";
$fotoruta2 ="";
$fotoruta3 ="";

if(!is_dir($ruta)){
    $ruta = str_replace(" ", "_",$ruta);
    mkdir($ruta, 0777, true);
}

if(move_uploaded_file($foto['tmp_name'], $ruta . "/" . $foto['name'])){
   $fotoruta = str_replace("../", "",$fotoruta);
   $fotoruta = $ruta .  "/" . $foto['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta = str_replace("../", "",$fotoruta);
    $fotoruta = $ruta . "/" . $foto['name'] . "noEncontrado";
}

if(move_uploaded_file($foto1['tmp_name'], $ruta . "/" . $foto1['name'])){
    $fotoruta1 = str_replace("../", "",$fotoruta1);
   $fotoruta1 = $ruta . "/" . $foto1['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta1 = str_replace("../", "",$fotoruta1);
    $fotoruta1 = $ruta .  "/" . $foto['name'] . "noEncontrado";
}

if(move_uploaded_file($foto2['tmp_name'], $ruta . "/" . $foto2['name'])){
    $fotoruta2 = str_replace("../", "",$fotoruta2);
    $fotoruta2 = $ruta . "/" . $foto2['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta2 = str_replace("../", "",$fotoruta2);
    $fotoruta2 = $ruta . "/" . $foto['name'] . "noEncontrado";
}

if(move_uploaded_file($foto3['tmp_name'], $ruta . "/" . $foto3['name'])){
    $fotoruta3 = str_replace("../", "",$fotoruta3);
    $fotoruta3 = $ruta .  "/" . $foto3['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta3 = str_replace("../", "",$fotoruta3);
    $fotoruta3 = $ruta . "/" . $foto['name'] . "noEncontrado";
}


$sql = "INSERT INTO coches (marca, modelo, color, kilometraje, potencia, cilindrada, anio, transmision, traccion, precio, datoscoche, nombre, fotoruta, fotoruta1, fotoruta2, fotoruta3) 
VALUES ('$marca','$modelo','$color','$kilometraje','$potencia','$cilindrada','$anio','$transmision','$traccion','$precio','$datoscoche','$nombre','$fotoruta','$fotoruta1','$fotoruta2','$fotoruta3');";

mysqli_query($conn, $sql);

header("Location: nuevoCoche.php?creation=success");