<?php
require_once __DIR__ . '/../../_utils/Config.php';
include_once __DIR__ . '../../layout/header.php';
include_once __DIR__ . '../../layout/menu.php';

$eventDate = '2025-04-25 12:00:00';
$eventTimestamp = strtotime($eventDate) * 1000;
?>

<div class="container text-align-center mt-5 ">
  <h1 class="text-warning fw-bold text-center mt-5 mb-5">Csomag ajánlataink</h1>
  <p class="text-white text-center">Válaszd ki a számodra legmegfelelőbbet és spórolj az éves előfizetéssel!</p>
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4 text-center text-danger mt-4">
    <h1>Az akció ideje:</h1>
    <p id="countdown"></p>
    </div>
  </div>
</div>

<div class="container my-5 mt-5 mb-5">
  <div class="row g-4 mt-5 mb-5">
    <div class="col-md-3">
      <div class="custom-card text-white p-4 rounded shadow border border-white text-center">
        <h4 class="fw-bold text-warning">Basic</h4>
        <p>Alap funkciók</p>
          <ul class="text-white cards-list">
            <li>✅ Profil létrehozása és szerkesztése 0/24-ben</li>
            <li>✅ Naptár beállítása</li>
            <li>✅ Emailes értesítések</li>
            <li>✅ Weboldalba ágyazás</li>
          </ul>
        <p class="mb-2"><strong>Ár:</strong> 1.990 Ft / hó</p>
        <button class="btn btn-outline-warning">Megveszem</button>
      </div>
    </div>

    <div class="col-md-3">
      <div class="custom-card text-white p-4 rounded shadow border border-warning text-center">
        <h4 class="fw-bold text-warning">Gold</h4>
        <p>A összes funkció elérhető</p>
        <ul class="text-white cards-list">
            <li>✅ Profil létrehozása és szerkesztése 0/24-ben</li>
            <li>✅ Időpontfoglalások kezelése</li>
            <li>✅ 1 Naptár beállítása</li>
            <li>✅ Emailes értesítések</li>
            <li>✅ Weboldalba ágyazás</li>
            <li>✅ Munkatársak hozzárendelése</li>
            <li>✅ Helyszínek</li>
            <li>✅ Számlázó hozzákötése</li>
            <li>✅ Előlegfizetés</li>
            <li>✅ SMS értesítők</li>
            <li>✅ Kártyás fizetési lehetőség</li>
            <li>✅ Emailes értesítések</li>
            <li>✅ Google szinkronizáció</li>
        </ul>
      
        <p class="mb-2"><strong>Ár:</strong> 2.990 Ft / hó</p>
        <button class="btn btn-outline-warning">Megveszem</button>
      </div>
    </div>

    <div class="col-md-3">
      <div class="custom-card text-white p-4 rounded shadow border border-dark text-center">
        <h4 class="fw-bold text-warning">Éves Basic </h4>
        <p>+2 hónap ajándék</p>
        <ul class="text-white-50 cards-list">
          <li>✅ Profil létrehozása és szerkesztése 0/24-ben</li>
          <li>✅ Időpontfoglalások kezelése</li>
          <li>✅ Naptár beállítása</li>
          <li>✅ Emailes értesítések</li>
          <li>✅ Weboldalba ágyazás</li>
        </ul>
        <p class="mb-2"><span style="text-decoration: line-through; color: orange;">24.990 Ft</span> helyett <br>
        <strong>Ár:</strong> 19.990 Ft / év</p>
        <button class="btn btn-outline-warning">Megveszem</button>
      </div>
    </div>

    <div class="col-md-3">
      <div class="custom-card text-white p-4 rounded shadow border border-dark text-center">
        <h4 class="fw-bold text-warning">Éves Gold </h4>
        <p>+2 hónap ajándék</p>
        <ul class="text-white-50 cards-list">
            <li>✅ Profil létrehozása és szerkesztése 0/24-ben</li>
            <li>✅ Időpontfoglalások kezelése</li>
            <li>✅ 1 Naptár beállítása</li>
            <li>✅ Emailes értesítések</li>
            <li>✅ Weboldalba ágyazás</li>
            <li>✅ Munkatársak hozzárendelése</li>
            <li>✅ Helyszínek</li>
            <li>✅ Számlázó hozzákötése</li>
            <li>✅ Előlegfizetés</li>
            <li>✅ SMS értesítők</li>
            <li>✅ Kártyás fizetési lehetőség</li>
            <li>✅ Emailes értesítések</li>
            <li>✅ Google szinkronizáció</li>
        </ul>
        <p class="mb-2"><span style="text-decoration: line-through; color: orange;">36.990 Ft</span> helyett <br>
        <p class="mb-2"><strong>Ár:</strong> 29.990 Ft / év</p>
        <button class="btn btn-outline-warning">Megveszem</button>
      </div>
    </div>

  </div>
</div>

<script>
  const countdownDate = <?= $eventTimestamp ?>;

  const x = setInterval(function() {
    const now = new Date().getTime();
    const distance = countdownDate - now;

    if (distance < 0) {
      clearInterval(x);
      document.getElementById("countdown").innerHTML = "Az esemény elkezdődött!";
    } else {
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("countdown").innerHTML =
        days + " nap " + hours + " óra " + minutes + " perc " + seconds + " mp";
    }
  }, 1000);
</script>
<?php include_once(__DIR__ . '/../layout/footer.php'); ?>