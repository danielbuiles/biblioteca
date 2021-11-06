<?php
require_once('/Daniel/Xampp/htdocs/biblioteca/api/database/dataBase.php');

class Libro extends DataBase
{
    function obtenerLibros()
    {
        $sql = "SELECT * FROM libro";
        $resultado=$this->select_db($sql);
        return $resultado;
    }

    function obtenerLibroPorId($id)
    {
        $sql = "SELECT * FROM libro WHERE id = $id";
        $resultado=$this->select_db($sql);
        return $resultado;
    }

    function guardarLibro($obj)
    {
        $codigo = $obj['codigo'];
        $nombre = $obj['nombre'];
        $estado = $obj['estado'];
        $sql = "INSERT INTO libro(codigo,nombre,estado) VALUES ('$codigo', '$nombre', '$estado')";
        $this->add_del_update_db($sql);
    }

    function actualizarLibro($obj)
    {
        $id = $obj['id'];
        $codigo = $obj['codigo'];
        $nombre = $obj['nombre'];
        $estado = $obj['estado'];
        $sql = "UPDATE libro SET codigo = '$codigo', nombre = '$nombre', estado = '$estado' WHERE id = $id";
        $this->add_del_update_db($sql);
    }

    function eliminarLibro($id)
    {
        $sql = "DELETE FROM libro WHERE id = $id";
        $this->add_del_update_db($sql);
    }
}

?>