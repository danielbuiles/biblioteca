<?php
include '../helper/libro.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    getLibros();
}

?>