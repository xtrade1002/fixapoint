
<div class="container mb-5 mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <fieldset>
        <legend class="mb-5 mt-5 fs-2 fw-semibold text-warning text-center">Bejelentkezés</legend>

        <?php
          $errorMessage = $_GET['error'] ?? null;
        ?>
        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>


        <form method="POST">
          <div class="mb-3 mt-5">
            <h4 class="text-white text-center mb-4">A jelszó visszaállítása</h4>
          </div>
          <div class="mb-3 mt-1">
            <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="E-mail" required>
          </div>
        
          <div class="text-center mt-5 mb-5">
            <button type="submit" class="btn btn-warning px-4 py-2">Küldés</button>
          </div>
        </form>
      </fieldset>
    </div>
  </div>
</div>