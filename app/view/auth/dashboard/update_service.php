<?php
include_once 'header.php';
require_once __DIR__ . '/../../../controller/dashboard/ServiceController.php';




use app\controller\dashboard\ServiceController;

$serviceController = new ServiceController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $name = $_POST['nameOfService'];
    $category = $_POST['categoryOfService'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    $serviceController = new ServiceController();
$result = $serviceController->updateService($id, $name, $category, $description, $duration, $price);

header("Location: services.php?status=" . $result['status'] . "&message=" . urlencode($result['message']));
exit();
}

if (isset($_GET['id'])) {
    $service = $serviceController->getServiceById($_GET['id']);
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8 col-lg-6">
    <h2 class="mb-5 mt-5 text-center">Szolgáltatás szerkesztése</h2>

    <form action="update_service.php" method="POST" class="row g-3">
        <input type="hidden" name="id" value="<?= $service['id'] ?>">

        <div class="col-md-6">
            <label for="nameOfService" class="form-label">Szolgáltatás neve</label>
            <input type="text" class="form-control" id="nameOfService" name="nameOfService" value="<?= htmlspecialchars($service['nameOfService']) ?>" required>
        </div>

        <div class="col-md-6">
            <label for="categoryOfService" class="form-label">Kategória</label>
            <input type="text" class="form-control" id="categoryOfService" name="categoryOfService" value="<?= htmlspecialchars($service['categoryOfService']) ?>" required>
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Leírás</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($service['description']) ?></textarea>
        </div>

        <div class="col-md-4">
            <label for="duration" class="form-label">Időtartam (percben)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="<?= $service['duration'] ?>">
        </div>

        <div class="col-md-4">
            <label for="price" class="form-label">Ár (Ft)</label>
            <input type="number" step="5" min="0" class="form-control" id="price" name="price" value="<?= $service['price'] ?>" required>
        </div>

        <div class="col-12 text-center mt-5">
            <button type="button" class="btn btn-secondary" onclick="history.back()">Mégse</button>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </div>
    </form>
</div>
