<?php
use app\controller\AppointmentController;

$controller = new AppointmentController();

if ($_SERVER['REQUEST_URI'] === '/api/appointments' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index(); 
}

if ($_SERVER['REQUEST_URI'] === '/api/appointments' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->create($data);
}

if (preg_match('#^/api/appointments/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->update($id, $data);
}


if (preg_match('#^/api/appointments/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}


if (preg_match('#^/api/appointments/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $matches[1];
    $controller->show($id);
}
