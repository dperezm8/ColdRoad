<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require "conexionBBDD.php";
    
    $json = file_get_contents("php://input");
    
    $objId = json_decode($json);

    $sql = "DELETE FROM contenidos WHERE id='$objId->id'";
    $query = $mysqli->query($sql);

    $jsonRespuesta = array('msg' => 'OK');
    echo json_encode($jsonRespuesta);
    