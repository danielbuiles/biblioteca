<?php
include '../middleware/usuario.php';

$usuario = new MdUsuario();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $usuario->getUser();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario->crearUser();
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $usuario->actualizarUser();
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $usuario->eliminarUser();
}
?>