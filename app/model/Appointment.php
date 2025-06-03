<?php

namespace app\controller;

use app\dao\dashboard\AppointmentDao;
use app\_utils\Database;

class AppointmentController
{
    private $dao;

    public function __construct()
    {
        $db = new Database();
        $pdo = $db->getConnection();
        $this->dao = new AppointmentDao($pdo);
    }

    public function index()
    {
        $appointments = $this->dao->getAll();
        $this->respond($appointments);
    }

    public function show($id)
    {
        $appointment = $this->dao->getById($id);
        if ($appointment) {
            $this->respond($appointment);
        } else {
            $this->respond(['error' => 'Nem található'], 404);
        }
    }

    public function create($data)
    {
        if ($this->dao->create($data)) {
            $this->respond(['message' => 'Sikeres létrehozás'], 201);
        } else {
            $this->respond(['error' => 'Hiba történt a létrehozáskor'], 500);
        }
    }

    public function update($id, $data)
    {
        if ($this->dao->update($id, $data)) {
            $this->respond(['message' => 'Sikeres módosítás']);
        } else {
            $this->respond(['error' => 'Nem sikerült frissíteni'], 500);
        }
    }

    public function delete($id)
    {
        if ($this->dao->delete($id)) {
            $this->respond(['message' => 'Sikeres törlés']);
        } else {
            $this->respond(['error' => 'Nem sikerült törölni'], 500);
        }
    }

    private function respond($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function index() {
        $appointments = $this->dao->getAll();
        require_once '../app/views/appointments/Book.php';
    }
    
}
