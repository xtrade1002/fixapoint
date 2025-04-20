<?php
require_once __DIR__ . '/../../../controller/dashboard/ServiceController.php';

use app\controller\dashboard\ServiceController;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $serviceController = new ServiceController();
    $result = $serviceController->deleteService($id);

    header("Location: services.php?status=" . $result['status'] . "&message=" . urlencode($result['message']));
    exit();
} else {
    header("Location: services.php?status=error&message=" . urlencode("Érvénytelen azonosító."));
    exit();
}
 