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

    function guardarLibro($codigo, $nombre, $estado)
    {
        $sql = "INSERT INTO libro(codigo,nombre,estado) VALUES ('$codigo', '$nombre', '$estado')";
        $this->add_del_update_db($sql);
    }

    function actualizarLibro($id, $codigo, $nombre, $estado)
    {
        $sql = "UPDATE libro SET codigo = '$codigo', nombre = '$nombre', estado = '$estado' WHERE id = $id";
        $this->add_del_update_db($sql);
    }
}

?>