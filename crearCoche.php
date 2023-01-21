<?php
if(isset($_POST)){
    // Form fields
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $kilometraje = $_POST["kilometraje"];
    $potencia = $_POST["potencia"];
    $cilindrada = $_POST["cilindrada"];
    $anio = $_POST["anio"];
    $transmision = $_POST["transmision"];
    $traccion = $_POST["traccion"];
    // File uploads
    $foto = $_FILES['foto'];
    $foto1 = $_FILES['foto1'];
    $foto2 = $_FILES['foto2'];
    $foto3 = $_FILES['foto3'];
    // Add other form fields here
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    $foto_name = $foto['name'];
    $foto = $foto['tmp_name'];
    $foto_size = $foto['size'];
    $foto_error = $foto['error'];
    $foto_ext = explode('.', $foto_name);
    $foto_ext = strtolower(end($foto_ext));
    if(in_array($foto_ext, $allowed)) {
        if($foto_error === 0) {
            if($foto_size <= 2097152) {
                $foto_new_name = uniqid('', true) . '.' . $foto_ext;
                $foto_destination = 'uploads/' . $foto_new_name;
                move_uploaded_file($foto_tmp, $foto_destination);
            } else {
                echo 'File size must be less than 2MB';
            }
        } else {
            echo 'There was an error uploading your image';
        }
    } else {
        echo 'Invalid file type. Please upload a JPG, JPEG, PNG, or GIF';
    }
    // repeat for the other two images
    // Create the car array
    $coche = array(
        "nombre" => $nombre,
        "marca" => $marca,
        "modelo" => $modelo,
        "color" => $color,
        "kilometraje" => $kilometraje,
        "potencia" => $potencia,
        "cilindrada" => $cilindrada,
        "anio" => $anio,
        "transmision" => $transmision,
        "traccion" => $traccion,
        "foto" => $foto_destination,
        "foto1" => $foto1_destination,
        "foto2" => $foto2_destination,
        "foto3" => $foto3_destination,
        // Add other form fields here
        );
        // Read the JSON file
        $json_file = 'coches.json';
        $json_data = file_get_contents($json_file);
        $json_array = json_decode($json_data, true);
        // Add the car to the JSON array
        array_push($json_array, $coche);
        // Encode the array and write it back to the JSON file
        $json_data = json_encode($json_array);
        file_put_contents($json_file, $json_data);
        // Redirect the user to the index page
        header("Location: index.php");
        }
        
        