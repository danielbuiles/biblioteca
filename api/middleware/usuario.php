<?php
include '../models/usuario.php';

class MdUsuario extends Usuario
{
    function getUser(){
        if(isset($_GET['id'])){
            $usuario = $this->obtenerUsuarioPorId($_GET['id']);
            if ($usuario) {
                header('HTTP/1.1 200 OK');
                echo json_encode($usuario);
            } else {
                header('HTTP/1.1 404 Not Found');
                echo json_encode(array('mensaje' => 'No se encontró el usuario'));
            }
        }else {
            $usuarios = $this->obtenerUsuarios();
            if ($usuarios) {
                header('HTTP/1.1 200 OK');
                echo json_encode($usuarios);
            } else {
                header('HTTP/1.1 404 Not Found');
                echo json_encode(array('mensaje' => 'No se encontraron usuarios'));
            }
        }
    }

    function crearUser(){
        $usuario = json_decode(file_get_contents('php://input'), true);
        if (isset($usuario['nombre']) && isset($usuario['correo']) && isset($usuario['password']) && isset($usuario['telefono'])) {
            $this->guardarUsuario($usuario);
            header('HTTP/1.1 201 Created');
            echo json_encode('se ha creado un usuario con exito');
        } else {
            $this->error("crear");
        }
    }

    function actualizarUser(){
        $usuario = json_decode(file_get_contents('php://input'), true);
        if (isset($usuario['id']) && isset($usuario['nombre']) && isset($usuario['correo']) && isset($usuario['password']) && isset($usuario['telefono'])) {
            $this->actualizarUsuario($usuario);
            header('HTTP/1.1 200 OK');
            echo json_encode('se ha actualizado un usuario con exito');
        } else {
            $this->error("actualizar");
        }
    }

    function eliminarUser(){
        if (isset($_GET['id'])) {
            $this->eliminarUsuario($_GET['id']);
            header('HTTP/1.1 200 OK');
            echo json_encode('se ha eliminado un usuario con exito');
        } else {
            $this->error("eliminar");
        }
    }


    function error($estado){
        if($estado=="crear"){
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array(
                'mensaje' => 'No se pudo crear el usuario',
                'recordatorio'=>'el usuario debe de terner nombre,telefono,correo,password',
                'ejemplo'=>[
                    'nombre'=>'juan',
                    'telefono'=>'123456789',
                    'correo'=>'nombre@dominio.com',
                    'password'=>'Nokia2021d3'
                ],
                'razones'=>'envie el POST a traves de un raw en postman no utilize el formData, aun esta en desarrollo'
            ));
        }

        if ($estado=="actualizar") {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array(
                'mensaje' => 'No se pudo actualizar el usuario',
                'recordatorio'=>'el usuario debe de terner nombre,telefono,correo,password',
                'ejemplo'=>[
                    'id'=>'1',
                    'nombre'=>'juan',
                    'telefono'=>'123456789',
                    'correo'=>'user@dominio.com'
                ],
                'razones'=>'envie el PUT a traves de un raw en postman no utilize el formData, aun esta en desarrollo'
            ));
        }

        if($estado=="eliminar"){
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array(
                'mensaje' => 'No se pudo eliminar el usuario',
                'recordatorio'=>'el usuario debe de terner id',
                'ejemplo'=>'http://localhost/biblioteca/api/routes/usuario.php?id=[id]',
                'razones'=>'envie el DELETE a traves del header'
            ));
        }
    }
}

?>