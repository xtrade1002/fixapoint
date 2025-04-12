<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once __DIR__ . '/../../../vendor/autoload.php';
include_once __DIR__ . '/../layout/header.php';
include_once __DIR__ . '/../layout/menu.php';

use app\controller\LoginController;

$pdo = new PDO('mysql:host=localhost;dbname=booking_system;charset=utf8', 'root', '');

$loginError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $loginController = new LoginController($pdo);

  $result = $loginController->login($email, $password);

  if ($result['success']) {
      header("Location: /vizsgafeladat_idopontfoglalo/app/view/auth/dashboard/index.php");
      exit;
  } else {
      $loginError = $result['message'];
  }
}

?>

<div class="container mb-5 mt-5 page-container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <fieldset>
        <legend class="mb-5 mt-5 fs-2 fw-semibold text-warning text-center">Bejelentkezés</legend>

        <?php if (!empty($loginError)): ?>
          <div class="alert alert-danger w-100 fs-6 text-center">
            <?= htmlspecialchars($loginError) ?>
          </div>
        <?php endif; ?>

        <form method="POST">
          <div class="mb-3 mt-1">
            <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="E-mail" required>
          </div>
          <div class="mb-4 input-group">
            <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Jelszó" required>
            <button class="btn btn-light border" type="button" onclick="togglePassword('password', this)">
              <i class="bi bi-eye-fill text-dark"></i>
            </button>
          </div>
          
          <div class="form-group text-white">
              <p><a href="<?= BASE_URL ?>elfelejtett-jelszo" class="text-warning link-color">Elfelejtetted</a> a jelszavad?</p>
          </div>
          <div class="form-group text-white">
              <p>Még nem regisztráltál? <a href="<?= BASE_URL ?>/regisztracio"  class="text-warning link-color">Itt megteheted</a></p>
          </div>
          <div class="text-center mt-5 mb-5">
            <button type="submit" class="btn btn-warning px-4 py-2">Bejelentkezés</button>
          </div>
        </form>
      </fieldset>
    </div>
  </div>
</div>



<script>
function togglePassword(id, btn) {
  const input = document.getElementById(id);
  const icon = btn.querySelector('i');
  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove('bi-eye-fill');
    icon.classList.add('bi-eye-slash-fill');
  } else {
    input.type = "password";
    icon.classList.remove('bi-eye-slash-fill');
    icon.classList.add('bi-eye-fill');
  }
}
</script>


<?php include_once(__DIR__ . '/../layout/footer.php'); ?>
