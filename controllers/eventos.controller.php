<?php

//TODO: controlador de eventos

require_once('../models/eventos.model.php');
//error_reporting(0);
$eventos = new Eventos;

switch ($_GET["op"]) {
        //TODO: operaciones de eventos

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los eventos
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase eventos.model.php
        $datos = $eventos->todos(); // Llamo al metodo todos de la clase eventos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idEventos = $_POST["idEventos"];
        $datos = array();
        $datos = $eventos->uno($idEventos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un evento en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];

        $datos = array();
        $datos = $eventos->insertar($nombre, $fecha, $ubicacion, $descripcion);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un evento en la base de datos
    case 'actualizar':
        $idEventos = $_POST["idEventos"];
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $eventos->actualizar($idEventos, $nombre, $fecha, $ubicacion, $descripcion);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un evento en la base de datos
    case 'eliminar':
        $idEventos = $_POST["idEventos"];
        $datos = array();
        $datos = $eventos->eliminar($idEventos);
        echo json_encode($datos);
        break;
}