<?php
include '../models/renta.php';

class MdRenta extends Renta
{
    function GetRenta()
    {
        if (isset($_GET['id'])) {
            $renta = $this->obtenerRentaPorId($_GET['id']);
            if($renta)
            {
                header('HTTP/1.1 200 OK');
                echo json_encode($renta);
            }
            else
            {
                header('HTTP/1.1 404 Not Found');
                echo json_encode(array('mensaje' => 'No se encontro la renta por el id'));
            }
        }
        else {
            $rentas = $this->obtenerRentas();
            if ($rentas) {
                header('HTTTP/1.1 200 OK');
                echo json_encode($rentas);
            } 
            else {
                header('HTTP/1.1 404 Not Found');
                echo json_encode(array('message' => 'No se encontraron rentas'));
            }
        }
    }

    function postRenta(){
        $datos = json_decode(file_get_contents('php://input'), true);
        if($datos['libro_id'] && $datos['usuario_id']){
            $this->guardarRenta($datos);
            header('HTTP/1.1 200 OK');
            echo json_encode(array(
                'Mensaje'=>'se a agregado con exito'
            ));
        }else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array(
                'Mensaje'=>'No se pudo agregar la renta',
            ));
        }
    }

    function putRenta(){
        $datos = json_decode(file_get_contents('php//input'),true);
        if ($datos['id'] && $datos['libro_id'] && $datos['usuario_id']) {
            $this->guardarRenta($datos);
            header('HTTP/1.1 200 OK');
            echo json_encode(array(
                'mensaje'=>'editado con exito'
            ));
        }else {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(array(
                'mensaje'=>'No se pudo editar la renta'
            ));
        }
    }

    function deleteRenta(){
        if (isset($_GET['id'])) {
            $this->eliminarRenta($_GET['id']);
            header('HTTP/1.1 200 OK');
            echo json_encode(array(
                'mensaje'=>'Eliminado con exito'
            ));
        } else {
            header('HTTP/1.1 404 Not Found');
            echo json_encode(array(
                'mensaje'=>'No se pudo eliminar la renta'
            ));
        }
    }
}

?>