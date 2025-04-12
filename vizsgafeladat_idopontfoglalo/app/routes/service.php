<?php
use App\Controllers\ServiceController;

$controller = new ServiceController();

// Lekérdezés - összes
if ($_SERVER['REQUEST_URI'] === '/api/services' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index();
}

// Létrehozás
if ($_SERVER['REQUEST_URI'] === '/api/services' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->create($data);
}

// Módosítás (pl. /api/services/5)
if (preg_match('#^/api/services/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->update($id, $data);
}

// Törlés (pl. /api/services/5)
if (preg_match('#^/api/services/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}

