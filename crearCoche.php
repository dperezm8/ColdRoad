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

header("Location: nuevoCoche.php?creation=success");