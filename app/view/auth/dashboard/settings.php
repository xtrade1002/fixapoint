<?php include_once __DIR__ . '/header.php';  ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container d-flex justify-content-center align-items-center flex-wrap min-vh-100 gap-1">
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <a href="<?= BASE_URL ?>dashboard/munkanapok" class="text-decoration-none">
                <div class="card h-100 shadow-sm p-3">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="bi bi-gear-fill" style="font-size: 2rem; color: #6c63ff;"></i>
                        </div>
                        <h5 class="card-title">Munkanapok</h5>
                        <p class="card-text">Állítsd be,hogy mely napokon és mettől meddig szeretnél dolgozni</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= BASE_URL ?>dashboard/naptar" class="text-decoration-none">
                <div class="card h-100 shadow-sm p-3">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="bi bi-calendar3" style="font-size: 2rem; color: #6c63ff;"></i>
                        </div>
                        <h5 class="card-title">Naptár</h5>
                        <p class="card-text">Foglalások megtekintése a naptárban.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= BASE_URL ?>dashboard/szabadnapok" class="text-decoration-none">
                <div class="card h-100 shadow-sm p-3">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="bi bi-moon-stars-fill" style="font-size: 2rem; color: #6c63ff;"></i>
                        </div>
                        <h5 class="card-title">Szabadnapok</h5>
                        <p class="card-text">Kapcsolatfelvételi üzenetek megtekintése és válaszadás.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= BASE_URL ?>dashboard/felasznalok-kezelese" class="text-decoration-none">
                <div class="card h-100 shadow-sm p-3">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="bi bi-people-fill" style="font-size: 2rem; color: #6c63ff;"></i>
                        </div>
                        <h5 class="card-title">Vendégek kezelése</h5>
                        <p class="card-text">Új vendég hozzáadása, keresése, tiltása</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= BASE_URL ?>dashboard/idopontfoglalasok" class="text-decoration-none">
                <div class="card h-100 shadow-sm p-3">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="bi bi-person-check-fill" style="font-size: 2rem; color: #6c63ff;"></i>
                        </div>
                        <h5 class="card-title">Online bejelentkezések</h5>
                        <p class="card-text">Visszaigazolt, Várakozó, Fizetésre váró és Lejárt bejelentkezéseket látod</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= BASE_URL ?>dashboard/statisztika" class="text-decoration-none">
                <div class="card h-100 shadow-sm p-3">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="bi bi-bar-chart-fill" style="font-size: 2rem; color: #6c63ff;"></i>
                        </div>
                        <h5 class="card-title">Statisztika</h5>
                        <p class="card-text">Kapcsolatfelvételi üzenetek megtekintése és válaszadás.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
