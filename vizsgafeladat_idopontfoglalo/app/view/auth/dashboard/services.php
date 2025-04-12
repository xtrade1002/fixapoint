<?php
include_once 'header.php';

use app\dao\UserDao;
use app\controller\dashboard\ServiceController;

$userDao = new UserDao();
$user = $userDao->getById($_SESSION['user_id']);

$serviceController = new ServiceController();
$services = $serviceController->getAllServices();  // Szolgáltatások lekérése

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Szolgáltatások</h2>

            <h4 class="text-center text-warning">Új kategória hozzáadása</h4>
            <form action="services.php" method="POST">
                <div class="mb-3">
                    <label for="nameOfService" class="form-label fw-bold">Szolgáltatás kategóriája *</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService" required>
                </div>

                <div class="mb-3">
                    <label for="categoryOfService" class="form-label fw-bold">Szolgáltatás neve *</label>
                    <input type="text" class="form-control" id="categoryOfService" name="categoryOfService" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Leírás</label>
                    <textarea class="form-control" id="description" name="description" ></textarea>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label fw-bold">Időtartam (perc) </label>
                    <input type="number" class="form-control" id="duration" name="duration" >
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Ár *</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>
                
            
                <div class="d-flex justify-content-center ">
                        <button type="submit" class="btn btn-warning fw-bold w-50 w-md-auto mt-3">Szolgáltatás hozzáadása</button>
                </div>
            </form>
        </div>
    </div>
  </div>

  <div class="container mt-5">
  <h2 class="mb-4 text-center">Szolgáltatások listája</h2>

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-center">Szolgáltatás neve</th>
        <th class="text-center">Kategória</th>
        <th class="text-center">Leírás</th>
        <th class="text-center">Időtartam</th>
        <th class="text-center">Ár</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($services)): ?>
        <?php foreach ($services as $service): ?>
          <tr>
            <td class="text-center"><?= htmlspecialchars($service['nameOfService']) ?></td>
            <td class="text-center"><?= htmlspecialchars($service['categoryOfService']) ?></td>
            <td class="text-center"><?= htmlspecialchars($service['description']) ?></td>
            <td class="text-center"><?= htmlspecialchars($service['duration']) ?> perc</td>
            <td class="text-center"><?= htmlspecialchars($service['price']) ?> Ft</td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center">Nincsenek szolgáltatások!</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>


