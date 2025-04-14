<?php
require_once __DIR__ . '/../../../_utils/config.php';
include_once __DIR__ . '/header.php';
?>

<div class="container mt-5">
  <h1 class="text-center">Üdvözlünk, <?= htmlspecialchars($_SESSION['fullName']) ?>!</h1>

 
  <div class="container mt-5 text-center">
  <img src="../../../../public/img/logo-text-3.png" alt="Fixapoint logo" class="img-fluid mb-4" style="max-width: 100%; height: auto;">
  <p class="text-center fw-bold fs-1 text-warning">Időpontfoglaló alkalmazás</p>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/app/public/js/booking.js"></script>
