<?php
//TODO: Clase de Eventos
require_once('../config/config.php');
class Eventos
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from eventos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `eventos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idEventos) //select * from eventos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `eventos` WHERE `idEventos`=$idEventos";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $fecha, $ubicacion, $descripcion) //insert into eventos ($nombre, $fecha, $ubicacion, $descripcion) values ($nombre, $fecha, $ubicacion, $descripcion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `eventos` ( `nombre`, `fecha`, `ubicacion`, `descripcion`) VALUES ('$nombre','$fecha','$ubicacion','$descripcion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($nombre, $fecha, $ubicacion, $descripcion) //update eventos set nombre = $nombre, fecha = $fecha, ubicacion = $ubicacion, descripcion = $descripcion where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `eventos` SET `nombre`='$nombre',`fecha`='$fecha',`ubicacion`='$ubicacion',`descripcion`='$descripcion' WHERE `idEventos` = $idEventos";
            if (mysqli_query($con, $cadena)) {
                return $idEventos;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idEventos) //delete from eventos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `eventos` WHERE `idEventos`= $idEventos";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}