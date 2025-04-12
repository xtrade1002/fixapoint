<?php
require_once __DIR__ . '/../../_utils/config.php';
include_once __DIR__ . '/../layout/header.php';
include_once __DIR__ . '/../layout/menu.php';
?>

<div class="container mt-5 mb-5">
  <div class="p-5 text-center rounded-3 shadow-sm">
    <h1 class="display-5 fw-bold text-warning">Üdvözlünk a 
      <img src="<?= BASE_URL ?>public/img/logo-text-3.png" alt="Fixapont logó" class="img-fluid" style="max-width: 350px;"> 
      oldalán!
    </h1>
    <p class="lead mt-3 text-white fs-small-home ">
      Teljes körű időpontkezelő és ügyfélkapcsolati rendszer szolgáltatóknak, vállalkozóknak és szakembereknek.
    </p>
    <a href="<?= BASE_URL ?>regisztracio" class="btn btn-lg btn-warning mt-3">Kipróbálom</a>
  </div>
</div>

<div class="container mb-5">
  <div class="row align-items-center g-4">
    <div class="col-md-6 text-center">
      <img src="<?= BASE_URL ?>public/img/main.png" alt="Fő kép" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
      <div class="p-4 border border-warning rounded shadow-sm text-center">
        <h4 class="text-warning mb-3">Kezdd el még ma!</h4>
        <p class="mb-3 text-white">
          Gyors indulás, egyszerű kezelés, és profi megjelenés. Tökéletes választás szépségiparban, egészségügyben, edzőknek vagy bármilyen időponttal dolgozó vállalkozásnak.
        </p>
        <a href="<?= BASE_URL ?>regisztracio" class="btn btn-warning">Regisztráció</a>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm card-hover border border-warning">
        <div class="card-body">
          <h4 class="card-title text-warning  mb-4">Van kérdésed? Mi örömmel segítünk!</h4>
          <p class="card-text text-white">
            Lépj kapcsolatba ügyfélsiker menedzsereinkkel, akik készséggel állnak rendelkezésedre.
          </p>
          <p class="card-text text-white mb-4">
            Minden ügyfelünk számára dedikált kapcsolattartót biztosítunk, aki végigkíséri a rendszer használatának teljes folyamatán és támogatást nyújt, amikor csak szükséged van rá.
          </p>
          <a href="<?= BASE_URL ?>kapcsolat" class="btn btn-outline-warning mt-2 mb-4">Hívj minket</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm card-hover border border-warning">
        <div class="card-body">
          <h4 class="card-title text-warning mb-3">Írj nekünk</h4>
          <p class="card-text text-white">
            Üzenetet is küldhetsz, ha kérdésed van, mi gyorsan válaszolunk!
          </p>
          <a href="<?= BASE_URL ?>kapcsolat" class="btn btn-outline-warning mt-2">Kapcsolatfelvétel</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm card-hover border border-warning">
        <div class="card-body">
          <h4 class="card-title text-warning  mb-3">Használati útmutató</h4>
          <p class="card-text text-white">
            Új vagy még nálunk?<br> Nézd meg részletes útmutatónkat a rendszer használatához!
          </p>
          <a href="<?= BASE_URL ?>hasznalati-utmutato" class="btn btn-outline-warning mt-2">Megnézem</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once __DIR__ . '/../layout/footer.php'; ?>
