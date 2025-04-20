<?php
include_once 'header.php';

use app\model\UserDao;
use app\controller\dashboard\ServiceController;

$userDao = new UserDao();
$user = $userDao->getById($_SESSION['user_id']);

$serviceController = new ServiceController();
$services = $serviceController->getAllServices();  
?>



    <div class="container mt-5">
    <?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
  <div class="alert alert-<?= $_GET['status'] === 'success' ? 'success' : 'danger' ?> text-center fw-bold">
    <?= htmlspecialchars($_GET['message']) ?>
  </div>
<?php endif; ?>

      <h2 class="mb-5 mt-5 text-center fs-2">Szolgáltatások listája</h2>

      <div class="table-responsive">
        <table class="table table-bordered text-center table-hover">
          <thead class="table-secondary">
            <tr>
              <th>Szolgáltatás neve</th>
              <th>Kategória</th>
              <th>Leírás</th>
              <th>Időtartam</th>
              <th>Ár</th>
              <th>Műveletek</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($services) && is_array($services) && isset($services[0]['nameOfService'])): ?>
              <?php foreach ($services as $service): ?>
                <tr>
                  <td><?= htmlspecialchars($service['nameOfService']) ?></td>
                  <td><?= htmlspecialchars($service['categoryOfService']) ?></td>
                  <td><?= htmlspecialchars($service['description']) ?></td>
                  <td><?= htmlspecialchars($service['duration']) ?> perc</td>
                  <td><?= htmlspecialchars($service['price']) ?> Ft</td>
                  <td>
                    <a href="update_service.php?id=<?= htmlspecialchars($service['id']) ?>" class="btn btn-warning btn-sm">Módosítás</a>
                    <a href="delete_service.php?id=<?= htmlspecialchars($service['id']) ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Biztosan törölni szeretnéd ezt a szolgáltatást?');">Törlés</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="6">Nincs megjeleníthető szolgáltatás vagy hiba történt.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
    <a href="add_service.php" class="btn btn-primary fw-bold">
         Új szolgáltatás hozzáadása
    </a>
</div>

  



