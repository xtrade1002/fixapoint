<?php
if (!defined('BASE_URL')) {
    define('BASE_URL', 'vizsgafeladat_idopontfoglalo/');
}
?>

<nav class="navbar navbar-expand-lg" style=" border-bottom: 1px solid rgba(235, 201, 201, 0.36);"> 
  <div class="container-fluid">
    <a href="<?= BASE_URL ?>" class="navbar-brand">
      <img src="<?= BASE_URL ?>public/img/logo-text-3.png" alt="Fixapont logó" class="img-fluid" style="max-width: 180px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
        <li class="nav-item">
          <a class="nav-link active text-warning main-menu" aria-current="page" href="<?= BASE_URL ?>">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning main-menu" href="<?= BASE_URL ?>funkciok">Funkciók</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning main-menu" href="<?= BASE_URL ?>arak">Árak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning main-menu" href="<?= BASE_URL ?>kapcsolat">Kapcsolat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning main-menu" href="<?= BASE_URL ?>bejelentkezes">Bejelentkezés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning main-menu" href="<?= BASE_URL ?>regisztracio">Regisztráció</a>
        </li>
      </ul>

      <div class="d-flex align-items-center">
        <span class="navbar-text me-3 text-warning">
          Egy platform. Végtelen lehetőség.
        </span>
      </div>
    </div>
  </div>
</nav>
