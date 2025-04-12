<?php
use App\Controllers\AppointmentController;

$controller = new AppointmentController();

// Lekérdezés - összes
if ($_SERVER['REQUEST_URI'] === '/api/appointments' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->index(); // Pl. összes időpont lekérése
}

// Létrehozás
if ($_SERVER['REQUEST_URI'] === '/api/appointments' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->create($data);
}

// Módosítás (pl. /api/appointments/5)
if (preg_match('#^/api/appointments/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $matches[1];
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->update($id, $data);
}

// Törlés (pl. /api/appointments/5)
if (preg_match('#^/api/appointments/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $matches[1];
    $controller->delete($id);
}

// Lekérdezés egy ID alapján (pl. /api/appointments/5)
if (preg_match('#^/api/appointments/(\d+)$#', $_SERVER['REQUEST_URI'], $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $matches[1];
    $controller->show($id);
}
