<?php
include '../models/libro.php';

class MdLibro extends Libro
{
    function getLibros(){
        if(isset($_GET['id'])){
            $libro=$this->obtenerLibroPorId($_GET['id']);
            if($libro){
                header('HTTP/1.1 200 OK');
                print json_encode($libro);
            } else {
                header("HTTP/1.1 404 Not Found");
                print json_encode(array(
                    "Error" => "No se encontro el libro"
                ));
            }
        }else{
            $libros = $this->obtenerLibros();
            if($libros){
                header('HTTP/1.1 200 OK');
                print json_encode($libros);
            }else{
                header("HTTP/1.1 404 Not Found");
                print json_encode(array(
                    "error" => "No se encontraron libros"
                ));
            }
        }
    }

    function addLibro(){
        $libro = json_decode(file_get_contents('php://input'), true);
        if(isset($libro['codigo']) && isset($libro['nombre']) && isset($libro['estado'])){
            $this->guardarLibro($libro);
            header('HTTP/1.1 201 Created');
            print json_encode(array(
                "mensaje" => "Libro creado"
            ));
        }else{
            header("HTTP/1.1 400 Bad Request");
            $this->error("crear");
        }
    }

    function updateLibro(){
        $libro = json_decode(file_get_contents('php://input'), true);
        if (isset($libro['id']) && isset($libro['codigo']) && isset($libro['nombre']) && isset($libro['estado'])) {
            $this->actualizarLibro($libro);
            header('HTTP/1.1 200 OK');
            print json_encode(array(
                "mensaje" => "Libro actualizado"
            ));
        } else {
            header("HTTP/1.1 400 Bad Request");
            $this->error("actualizar");
        }
    }

    function deleteLibro(){
        if (isset($_GET['id'])) {
            $this->eliminarLibro($_GET['id']);
            header('HTTP/1.1 200 OK');
            print json_encode(array(
                "mensaje" => "Libro eliminado"
            ));
        } else {
            header("HTTP/1.1 400 Bad Request");
            $this->error("eliminar");
        }
    }

    function error($estado){
        if ($estado=="actualizar") {
            print json_encode(array(
                "error" => "No se pudo actualizar el libro",
                "recordatorio" => "El libro debe tener id, codigo, nombre y estado",
                "ejemplo"=>array(
                    "id"=>1,
                    "codigo"=>123,
                    "nombre"=>"Libro de prueba",
                    "estado"=>1
                ),
                "razones"=>"envie el PUT a traves de un raw en postman no utilize el formData, aun esta en desarrollo"
            ));
        }
        if ($estado=="crear") {
            print json_encode(array(
                "error" => "No se pudo crear el libro",
                "recordatorio" => "El libro debe tener codigo, nombre y estado",
                "ejemplo"=>array(
                    "codigo"=>123,
                    "nombre"=>"Libro de prueba",
                    "estado"=>1
                ),
                "razones"=>"envie el POST a traves de un raw en postman no utilize el formData, aun esta en desarrollo"
            ));
        }
        if ($estado=="eliminar") {
            print json_encode(array(
                "error" => "No se pudo eliminar el libro",
                "recordatorio" => "El libro debe tener id",
                "ejemplo"=>"http://localhost/biblioteca/api/routes/libro.php?id=[id]",
                "razones"=>"envie el DELETE a traves del header"
            ));
        }
    }
    
}

?>