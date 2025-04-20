<?php
include_once 'header.php';
require_once __DIR__ . '/../../../controller/dashboard/ServiceController.php';

use app\controller\dashboard\ServiceController;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['nameOfService'];
    $category = $_POST['categoryOfService'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    $serviceController = new ServiceController();
$result = $serviceController->addService($name, $category, $description, $duration, $price);

header("Location: services.php?status=" . $result['status'] . "&message=" . urlencode($result['message']));
exit();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8 col-lg-6">
    <h2 class="text-center mt-5">Új szolgáltatás</h2>
    <h6  class="text-center mb-5 mt-2">Add meg,hogy milyen jellegű szolgáltatást szeretnél kínálni</h6>

    <form action="add_service.php" method="POST" class="row g-3 justify-content-center">
        <div class="col-md-6">
            <label for="categoryOfService" class="form-label fw-bold">Szolgáltatás kategóriája *</label>
            <input type="se" class="form-control" id="categoryOfService" name="categoryOfService" required>
        </div>

        <div class="col-md-6">
            <label for="nameOfService" class="form-label fw-bold">Szolgáltatás neve *</label>
            <input type="text" class="form-control" id="nameOfService" name="nameOfService" required>
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label fw-bold">Leírás</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="col-md-4">
            <label for="duration" class="form-label fw-bold">Időtartam (perc)</label>
            <input type="number" class="form-control" id="duration" name="duration">
        </div>

        <div class="col-md-4">
            <label for="price" class="form-label fw-bold">Ár *</label>
            <input type="number" step="5" class="form-control" id="price" name="price" min="0"  required>
        </div>

        <div class="col-12 text-center mt-">
            <a href="services.php" class="btn btn-secondary me-2">Mégse</a>
            <button type="submit" class="btn btn-primary fw-bold">Hozzáadás</button>
        </div>
    </form>
</div>
