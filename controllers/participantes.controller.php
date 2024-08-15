<?php

//TODO: controlador de participantes

require_once('../models/participantes.model.php');
//error_reporting(0);
$participantes = new Participantes;

switch ($_GET["op"]) {
        //TODO: operaciones de participantes

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los participantes
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase participantes.model.php
        $datos = $participantes->todos(); // Llamo al metodo todos de la clase participantes.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idParticipantes = $_POST["idParticipantes"];
        $datos = array();
        $datos = $participantes->uno($idParticipantes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un evento en la base de datos
    case 'insertar':

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];

        $datos = array();
        $datos = $participantes->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un evento en la base de datos
    case 'actualizar':
        $idParticipantes = $_POST["idParticipantes"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $participantes->actualizar($idParticipantes, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un evento en la base de datos
    case 'eliminar':
        $idParticipantes = $_POST["idParticipantes"];
        $datos = array();
        $datos = $participantes->eliminar($idParticipantes);
        echo json_encode($datos);
        break;
}