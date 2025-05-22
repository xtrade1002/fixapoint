<?php
require_once __DIR__ . '/../../../../controller/dashboard/CategoryController.php';

use app\controller\dashboard\CategoryController;

$controller = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    if ($name !== '') {
        $controller->addCategory($name);
        header('Location: add_category.php?success=1');
        exit;
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5 col-md-6">
    <h2 class="text-center mt-5">Új kategória hozzáadása</h2>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success fw-bold text-center">Kategória hozzáadva.</div>
    <?php endif; ?>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Kategória neve</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary fw-bold">Mentés</button>
        </div>
    </form>
</div>
