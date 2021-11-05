<?php
include '../models/libro.php';

function getLibros(){
    if(isset($_GET['id'])){
        $libro =new Libro();
        $_libro=$libro->obtenerLibroPorId($_GET['id']);
        if($_libro){
            header('HTTP/1.1 200 bien');
            print json_encode($_libro);
        } else {
            header("HTTP/1.1 404 Not encontrado");
            print json_encode(array(
                "mensaje" => "No se encontro el libro"
            ));
        }
    }else{
        $libro =new Libro();
        $libros = $libro->obtenerLibros();
        if($libros){
            header('HTTP/1.1 200 bien');
            print json_encode($libros);
        }else{
            header("HTTP/1.1 404 No encontrado");
            print json_encode(array(
                "mensaje" => "No se encontraron libros"
            ));
        }
    }
}

function postLibro(){
    
?>