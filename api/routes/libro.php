<?php
include '../middleware/libro.php';
$libro = new MdLibro();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $libro->getLibros();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libro->addLibro();
}

if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $libro->updateLibro();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $libro->deleteLibro();
}
?>