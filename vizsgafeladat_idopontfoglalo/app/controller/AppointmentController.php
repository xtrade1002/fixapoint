<?php
namespace app\controllers;

use app\utils\Database;
use app\models\AppointmentDao;

class AppointmentController {
    private $dao;

    public function __construct() {
        $db = new Database();
        $pdo = $db->getConnection();
        $this->dao = new AppointmentDao($pdo);
    }

    public function index() {
        $appointments = $this->dao->getAll();
        require_once '../app/views/appointments/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $this->dao->create($name, $date, $time);
            header('Location: index.php?controller=appointment&action=index');
        } else {
            require_once '../app/views/appointments/create.php';
        }
    }
}
