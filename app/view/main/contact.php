<?php
require_once __DIR__ . '/../../_utils/Config.php';
include_once __DIR__ . '/../layout/header.php';
include_once __DIR__ . '/../layout/menu.php';
?>


<?php if (isset($successMessage)): ?>
    <div style="background-color: rgba(40, 167, 69, 0.9); color: white; padding: 1rem; border-radius: 5px; max-width: 600px; margin: 1rem auto; text-align: center;">
        <?= $successMessage ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div style="background-color: rgba(220, 53, 69, 0.9); color: white; padding: 1rem; border-radius: 5px; max-width: 600px; margin: 1rem auto; text-align: center;">
        <?= $error ?>
    </div>
<?php endif; ?>



<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-3 mt-5 text-warning">Üzenj nekünk</h2>
            <p class="text-center text-white">vagy</p>
            <h4 class="text-center text-warning"> Hívj minket az alábbi telefonszámon:</h4>
            <h4 class="text-center text-white">+36 70 271 7527</h4>
            <form action="<?= BASE_URL ?>/kapcsolat/kuldes" method="post">
                <div class="form-group mb-3 mt-5">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Név *" required>
                </div>
                <div class="form-group mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email *" required>
                </div>
                <div class="form-group mb-3">
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Telefonszám">
                </div>
                <div class="form-group mb-3">
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Tárgy">
                </div>
                <div class="form-group mb-3">
                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Üzenet *" required></textarea>
                </div>
                
                <div class="text-center mb-5 mt-5">
                    <button type="submit" class="btn btn-warning px-4">Küldés</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once __DIR__ . '/../layout/footer.php';
?>
