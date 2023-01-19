<?php

$dbServername = "127.0.0.1:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cold_road";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$marca = mysqli_real_escape_string($conn, $_POST['marca']);
$modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
$color = mysqli_real_escape_string($conn, $_POST['color']);
$kilometraje = mysqli_real_escape_string($conn, $_POST['kilometraje']);
$potencia = mysqli_real_escape_string($conn, $_POST['potencia']);
$cilindrada = mysqli_real_escape_string($conn, $_POST['cilindrada']);
$anio = mysqli_real_escape_string($conn, $_POST['anio']);
$transmision = mysqli_real_escape_string($conn, $_POST['transmision']);
$traccion = mysqli_real_escape_string($conn, $_POST['traccion']);
$precio = mysqli_real_escape_string($conn, $_POST['precio']);
$datoscoche = mysqli_real_escape_string($conn, $_POST['datoscoche']);
$foto = $_FILES['foto'];
$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];
$ruta = 'img/inventario/'.$nombre. " " . $anio;
$sinfoto = 'img/inventario/cocheNoEncontrado/cocheNoEncontrado.jpg';

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
    $fotoruta = $sinfoto;
}

if(move_uploaded_file($foto1['tmp_name'], $ruta . "/" . $foto1['name'])){
    $fotoruta1 = str_replace("../", "",$fotoruta1);
   $fotoruta1 = $ruta . "/" . $foto1['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta1 = str_replace("../", "",$fotoruta1);
    $fotoruta1 = $sinfoto;
}

if(move_uploaded_file($foto2['tmp_name'], $ruta . "/" . $foto2['name'])){
    $fotoruta2 = str_replace("../", "",$fotoruta2);
    $fotoruta2 = $ruta . "/" . $foto2['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta2 = str_replace("../", "",$fotoruta2);
    $fotoruta2 = $sinfoto;
}

if(move_uploaded_file($foto3['tmp_name'], $ruta . "/" . $foto3['name'])){
    $fotoruta3 = str_replace("../", "",$fotoruta3);
    $fotoruta3 = $ruta .  "/" . $foto3['name'];
}else{
    copy("img/inventario/PredeterminedFiles/", $ruta . $foto['name'] . "noEncontrado");
    $fotoruta3 = str_replace("../", "",$fotoruta3);
    $fotoruta3 = $sinfoto;
}

$sql = "INSERT INTO coches (marca, modelo, color, kilometraje, potencia, cilindrada, anio, transmision, traccion, precio, datoscoche, nombre, fotoruta, fotoruta1, fotoruta2, fotoruta3) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt, $sql)){
    mysqli_stmt_bind_param($stmt, "sssissssssssssss", $marca, $modelo, $color, $kilometraje, $potencia, $cilindrada, $anio, $transmision, $traccion, $precio, $datoscoche, $nombre, $fotoruta, $fotoruta1, $fotoruta2, $fotoruta3);
    mysqli_stmt_execute($stmt);
}

header("Location: nuevoCoche.php?creation=success");