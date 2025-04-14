<?php
use app\controller\dashboard\ServiceController;

$controller = new ServiceController();


if ($_SERVER['REQUEST_URI'] === '/api/services' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
}


if ($_SERVER['REQUEST_URI'] === '/api/services' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->create($data);
}

if (preg_match('#^/api/services/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->update($id, $data);
}


if (preg_match('#^/api/services/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}

