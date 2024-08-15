<?php
//TODO: Clase de Participantes
require_once('../config/config.php');
class Participantes
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from participantes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `participantes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idParticipantes) //select * from participantes where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `participantes` WHERE `idParticipantes`=$idParticipantes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $email, $telefono) //insert into participantes (nombre, apellido, email, telefono) values ($nombre, $apellido, $email, $telefono)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `participantes` ( `nombre`, `apellido`, `email`, `telefono`) VALUES ('$nombre','$apellido','$email','$telefono')";
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
    public function actualizar($idParticipantes,$nombre, $apellido, $email, $telefono) //update participantes set nombre = $nombre, apellido = $apellido, email = $email, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `participantes` SET `nombre`='$nombre',`apellido`='$apellido',`email`='$email',`telefono`='$telefono' WHERE `idParticipantes` = $idParticipantes";
            if (mysqli_query($con, $cadena)) {
                return $idParticipantes;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idParticipantes) //delete from participantes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `participantes` WHERE `idParticipantes`= $idParticipantes";
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