<?php
include_once 'header.php';

use app\dao\UserDao;

$userDao = new UserDao();
$user = $userDao->getById($_SESSION['user_id']);
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4 text-center">Profilom</h2>

      <?php if ($user): ?>
        <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $user->id ?>">

          <div class="mb-3">
            <label for="fullName" class="form-label fw-bold">Teljes név</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="<?= htmlspecialchars($user->fullName) ?>" required>
          </div>

          <div class="mb-3">
            <label for="companyName" class="form-label fw-bold">Cégnév</label>
            <input type="text" class="form-control" id="companyName" name="companyName" value="<?= htmlspecialchars($user->company_name ?? $user->username ?? '') ?>">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-bold">E-mail cím</label>
            <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($user->email) ?>" disabled>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label fw-bold">Telefonszám</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user->phone ?? '') ?>" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label fw-bold">Új jelszó</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Új jelszó megadása">
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning fw-bold w-50 w-md-auto mt-3">Profil mentése</button>
          </div>
        </form>

        <form id="deleteForm" action="delete_profile.php" method="POST" class="mt-3" onsubmit="return confirm('Biztosan törölni szeretnéd a fiókodat?');">
          <input type="hidden" name="id" value="<?= $user->id ?>">
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger w-50 w-md-auto">Fiók törlése</button>
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
