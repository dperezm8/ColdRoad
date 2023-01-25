<?php
require_once("php/dbcoches.php");

$formData = array(
    "nombre" => $_POST["nombre"],
    "marca" => $_POST["marca"],
    "modelo" => $_POST["modelo"],
    "color" => $_POST["color"],
    "kilometraje" => $_POST["kilometraje"],
    "potencia" => $_POST["potencia"],
    "cilindrada" => $_POST["cilindrada"],
    "anio" => $_POST["anio"],
    "transmision" => $_POST["transmision"],
    "traccion" => $_POST["traccion"],
    "precio" => $_POST["precio"],
    "datoscoche" => $_POST["datoscoche"],
    "foto" => $_FILES["foto"],
    "foto1" => $_FILES["foto1"],
    "foto2" => $_FILES["foto2"],
    "foto3" => $_FILES["foto3"],
    // etc.
);

// Check if the data.json file exists
if (file_exists("coches.json")) {
    // Read existing data from the file
    $existingData = json_decode(file_get_contents("coches.json"), true);
    
} else {
    // Create a new array to store the data
    $existingData = array();
}

// Add the new form data to the existing data
$existingData[] = $formData;

// Convert the updated data to JSON
$jsonData = json_encode($existingData);

// Write the JSON data to the file
file_put_contents("coches.json", $jsonData);


// a partir de aqui es la insercion de los contendidos del json en la base de datos, de momento no funciona
$jsonInfo = file_get_contents("coches.json");
$carros = json_decode($jsonInfo, JSON_OBJECT_AS_ARRAY);

$stmt = $conn->prepare("
    INSERT INTO coches(nombre, marca, modelo, color, kilometraje, potencia, cilindrada, anio, transmision, traccion, precio, datoscoche, foto, foto1, foto2, foto3)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)
    ");

    $stmt->bind_param("ssdi", $nombre, $marca, $modelo, $color, $kilometraje, $potencia, $cilindrada, $anio, $transmision, $traccion, $precio, $datoscoche, $foto, $foto1, $foto2, $foto3);

$inserted_rows = 0;
foreach($carros as $coche) {
    $nombre = $coche["nombre"];
    $marca = $coche["marca"];
    $modelo = $coche["modelo"];
    $color = $coche["color"];
    $kilometraje = $coche["kilometraje"];
    $potencia = $coche["potencia"];
    $cilindrada = $coche["cilindrada"];
    $anio = $coche["anio"];
    $transmision = $coche["transmision"];
    $traccion = $coche["traccion"];
    $precio = $coche["precio"];
    $datoscoche = $coche["datoscoche"];
    $foto = $coche["foto"];
    $foto1 = $coche["foto1"];
    $foto2 = $coche["foto2"];
    $foto3 = $coche["foto3"];

    $stmt->execute();
$inserted_rows ++;
}

if(count($carros) == $inserted_rows) {
    echo "success";
} else {
    echo "error";
}

header("Location: nuevoCoche.php?creation=success");