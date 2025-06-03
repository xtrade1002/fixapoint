<?php
use app\controller\UserController;

$controller = new UserController();

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


if ($uri === '/api/register' && $method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->register($data);
}


if ($uri === '/api/login' && $method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->login($data);
}

if (preg_match('#^/api/users/(\d+)$#', $uri, $matches) && $method === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data['name'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;
    $controller->update($id);
}

if (preg_match('#^/api/users/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}

