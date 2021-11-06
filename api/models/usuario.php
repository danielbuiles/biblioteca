<?php
include '../database/dataBase.php';

class Usuario extends DataBase
{
    function obtenerUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $resultado=$this->select_db($sql);
        return $resultado;
    }

    function obtenerUsuarioPorId($id)
    {
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $resultado=$this->select_db($sql);
        return $resultado;
    }

    function guardarUsuario($obj)
    {
        $nombre = $obj['nombre'];
        $telefono = $obj['telefono'];
        $correo = $obj['correo'];
        $password = $obj['password'];
        $sql = "INSERT INTO usuario (nombre, telefono, correo,password) VALUES ('$nombre', '$telefono', '$correo','$password')";
        $this->add_del_update_db($sql);
    }

    function actualizarUsuario($obj)
    {
        $id = $obj['id'];
        $nombre = $obj['nombre'];
        $telefono = $obj['telefono'];
        $correo = $obj['correo'];
        $password = $obj['password'];
        $sql = "UPDATE usuario SET nombre = '$nombre', telefono = '$telefono', correo = '$correo',password = '$password' WHERE id = $id";
        $this->add_del_update_db($sql);
    }

    function eliminarUsuario($id)
    {
        $sql = "DELETE FROM usuario WHERE id = $id";
        $this->add_del_update_db($sql);
    }
}

?>