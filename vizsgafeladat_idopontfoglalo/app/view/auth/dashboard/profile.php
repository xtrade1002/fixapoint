<?php 
include_once 'header.php';

use app\_utils\Database;
use app\model\dashboard\ProfileDao;

$userDao = new ProfileDao();
$user = $userDao->getById($_SESSION['user_id']);
?>

<?php if (isset($_GET['success'])): ?>
  <div class="d-flex justify-content-center mt-5">
    <div class="alert alert-success w-50 text-center">Profil sikeresen frissítve!</div>
  </div>
<?php endif; ?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4 text-center">Profilom</h2>

      <?php if ($user): ?>
        <form action="update_profile.php" method="POST">
  <input type="hidden" name="id" value="<?= $user->id ?>">

  <div class="mb-3">
    <label for="fullName" class="form-label fw-bold">Teljes név</label>
    <input type="text" class="form-control" id="fullName" name="fullName" value="<?= htmlspecialchars($user->fullName) ?>" required>
  </div>

  <div class="mb-3">
    <label for="companyName" class="form-label fw-bold">Cégnév</label>
    <input type="text" class="form-control" id="companyName" name="companyName" value="<?= htmlspecialchars($user->companyName ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label fw-bold">E-mail cím</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->email) ?>" readonly>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label fw-bold">Telefonszám</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user->phone ?? '') ?>" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label fw-bold">Új jelszó</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Új jelszó megadása">
  </div>

  <div class="d-flex flex-column align-items-center mt-3">
  <button type="submit" class="btn btn-warning fw-bold w-50 mb-2" name="update">Módosítás</button>
  <a href="index.php" class="btn btn-secondary fw-bold w-50">Mégse</a>
</div>

</form>


      <?php else: ?>
        <div class="alert alert-danger">Nem található felhasználói adat.</div>
      <?php endif; ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
