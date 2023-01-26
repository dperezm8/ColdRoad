<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require "conexionBBDD.php";

    $json = file_get_contents("php://input");

    $objContenido = json_decode($json);

    $sql = "UPDATE contenidos SET nombre='$objContenido->nombre', apellidos='$objContenido->apellidos', edad='$objContenido->edad', altura='$objContenido->altura' WHERE id='$objContenido->id'";
    
    $query = $mysqli->query($sql);

    $jsonRespuesta = array('msg' => 'OK');
    echo json_encode($jsonRespuesta);