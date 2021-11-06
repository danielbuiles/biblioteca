<?php
include '../database/dataBase.php';

class Renta extends DataBase
{
    function obtenerRentas()
    {
        $sql = "SELECT * FROM renta";
        $resultado=$this->select_db($sql);
        return $resultado;
    }

    function obtenerRentaPorId($id)
    {
        $sql = "SELECT * FROM renta WHERE id = $id";
        $resultado=$this->select_db($sql);
        return $resultado;
    }

    function guardarRenta($obj)
    {
        $libro_id = $obj['libro_id'];
        $usuario_id = $obj['usuario_id'];
        $fecha_renta = $obj['fecha_renta'];
        $sql = "INSERT INTO renta (libro_id,usuario_id,fecha) VALUES ($libro_id,$usuario_id,'$fecha_renta')";
        $this->add_del_update_db($sql);
    }

    function actualizarRenta($obj)
    {
        $id = $obj['id'];
        $libro_id = $obj['libro_id'];
        $usuario_id = $obj['usuario_id'];
        $fecha_renta = $obj['fecha_renta'];
        $sql = "UPDATE renta SET libro_id = $libro_id, usuario_id = $usuario_id, fecha = '$fecha_renta' WHERE id = $id";
        $this->add_del_update_db($sql);
    }

    function eliminarRenta($id)
    {
        $sql = "DELETE FROM renta WHERE id = $id";
        $this->add_del_update_db($sql);
    }
}
