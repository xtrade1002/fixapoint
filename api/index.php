<?php
require_once __DIR__ . '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

function respond($data, $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

if (str_starts_with($uri, '/api/appointments')) {
    require_once __DIR__ . '/../app/routes/appointment.php';
    exit;
}
elseif (str_starts_with($uri, '/api/users')) {
    require_once __DIR__ . '/../app/routes/user.php';
    exit;
}
respond(['error' => 'Nem található végpont'], 404);
