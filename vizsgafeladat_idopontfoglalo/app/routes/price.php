<?php
use App\Controllers\PriceController;

$controller = new PriceController();


if ($_SERVER['REQUEST_URI'] === '/api/prices' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
}


if ($_SERVER['REQUEST_URI'] === '/api/prices' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->create($data);
}


if (preg_match('#^/api/prices/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->update($id, $data);
}


if (preg_match('#^/api/prices/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}

