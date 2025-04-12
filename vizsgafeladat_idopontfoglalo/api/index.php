<?php
require_once __DIR__ . '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Segédfüggvény JSON válaszhoz (egységes válaszolás)
function respond($data, $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Routes (irányítás a route fájlokra)
if (str_starts_with($uri, '/api/appointments')) {
    require_once __DIR__ . '/../app/routes/appointment.php';
    exit;
}
elseif (str_starts_with($uri, '/api/users')) {
    require_once __DIR__ . '/../app/routes/user.php';
    exit;
}
// ... további route fájlok (pl. prices, login, stb.)

// Ha semmilyen route sem egyezett
respond(['error' => 'Nem található végpont'], 404);
