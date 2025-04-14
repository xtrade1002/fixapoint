<?php
require_once __DIR__ . '/../../../controller/dashboard/ServiceController.php';

use app\controller\dashboard\ServiceController;

if (isset($_GET['id'])) {
    $serviceController = new ServiceController();
    $serviceController->deleteService($_GET['id']);

    header("Location: services.php");
    exit();
} else {
    echo "Hiányzik a szolgáltatás ID!";
}
 