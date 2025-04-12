<?php
use app\controllers\UserController;

$controller = new UserController();

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Lekérdezés - regisztráció
if ($uri === '/api/register' && $method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->register($data);
}

// Lekérdezés - login
if ($uri === '/api/login' && $method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->login($data);
}

// Módosítás (pl. /api/users/5)
if (preg_match('#^/api/users/(\d+)$#', $uri, $matches) && $method === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data['name'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;
    $controller->update($id);
}

// Törlés (pl. /api/users/5)
if (preg_match('#^/api/users/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}

