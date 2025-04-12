<?php
include_once __DIR__ . '/../layout/header.php';
include_once __DIR__ . '/../layout/menu.php';

?>

<?php if (!empty($success)): ?>
    <div class="alert alert-success w-50 mx-auto text-center fs-6" role="alert">
        <?= htmlspecialchars($success) ?>
    </div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger w-50 mx-auto text-center fs-6" role="alert">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="container mb-5 mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <fieldset>
        <legend class="mb-5 mt-5 fs-2 fw-semibold text-center text-warning">Regisztráció</legend>
        <form action="" method="POST">
        <div class="mb-2 mt-1">
            <input type="text" class="form-control shadow-sm" id="fullName" name="fullName" placeholder="Teljes név *" required>
          </div>

          <div class="mb-2 mt-1">
            <input type="text" class="form-control shadow-sm" id="companyName" name="companyName" placeholder="Cégnév *" required>
          </div>

          <div class="mb-2 mt-1">
            <input type="number" class="form-control shadow-sm" id="phone" name="phone" placeholder="Telefonszám *" required>
          </div>

          <div class="mb-2 mt-1">
            <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="E-mail *" required>
          </div>

          <div class="mb-2 input-group">
            <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Jelszó *" required>
            <button class="btn btn-light border" type="button" onclick="togglePassword('password', this)">
              <i class="bi bi-eye-fill text-dark"></i>
            </button>

          </div>

          <div class="mb-2 input-group">
            <input type="password" class="form-control shadow-sm" id="password_confirm" name="password_confirm" placeholder="Jelszó megerősítése *" required>
            <button class="btn btn-light border" type="button" onclick="togglePassword('password', this)">
              <i class="bi bi-eye-fill text-dark"></i>
            </button>
          </div>

          <div class="mb-2">
            <input type="text" class="form-control shadow-sm" id="coupon" name="coupon" placeholder="Kuponkód">
          </div>

          <div class="form-check mb-3 mt-4">
            <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
            <label class="form-check-label text-light newsletter" for="newsletter">
              Hozzájárulok ahhoz, hogy a rendszer hírlevelet küldjön számomra a megadott e-mail címre.
            </label>
          </div>

          <div class="form-check mb-3 mt-4">
            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
            <label class="form-check-label text-light terms-text" for="terms">
              Elolvastam és elfogadom a <a href="#" class="text-warning">Felhasználási feltételeket</a> és az <a href="privacy" class="text-warning">Adatvédelmi nyilatkozatot</a> !
            </label>
          </div>

          <div class="text-center mt-5 mb-5">
            <button type="submit" class="btn btn-warning px-4 py-2">Regisztrálok</button>
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