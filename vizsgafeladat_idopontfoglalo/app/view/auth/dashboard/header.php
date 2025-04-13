<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__DIR__, 4) . '/vendor/autoload.php';
require_once __DIR__ . '/../../../_utils/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand fw-bold" href="#">
      <img src="<?= BASE_URL ?>public/img/logo-text-3.png" alt="Fixapont" width="140px"  class="d-inline-block align-text-top">
      Dashboard
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="contactmessage.php">Üzenetek</a></li>
        <li class="nav-item"><a class="nav-link" href="profile.php">Profilom</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Szolgáltatások</a></li>
        <li class="nav-item"><a class="nav-link" href="appointments.php">Foglalások</a></li>
        <li class="nav-item"><a class="nav-link" href="settings.php">Beállítások</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="<?= BASE_URL ?>logout.php">Kijelentkezés</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const currentPage = location.pathname.split("/").pop(); // pl. profile.php
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

    navLinks.forEach(link => {
      const linkPage = link.getAttribute("href");

      // Ne szedjük le a kijelentkezésről a text-warning osztályt
      if (linkPage === "<?= BASE_URL ?>logout.php") return;

      if (linkPage === currentPage) {
        link.classList.add("text-warning", "fw-bold");
      }
    });
  });
</script>
