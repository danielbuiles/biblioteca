<?php
include '../middleware/renta.php';

$renta = new MdRenta();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $renta->GetRenta();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $renta->postRenta();
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $renta->putRenta();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $renta->deleteRenta();
}
?>