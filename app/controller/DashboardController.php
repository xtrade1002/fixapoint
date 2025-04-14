<?php
class DashboardController
{
    public function index()
    {
        session_start();

        if (!isset($_SESSION['userId'])) {
            header('Location: index.php?page=login');
            exit();
        }

        echo "<!DOCTYPE html>
        <html lang='hu'>
        <head>
            <meta charset='UTF-8'>
            <title>Dashboard</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='bg-light'>
            <div class='container text-center mt-5'>
                <h1 class='text-success'>Sikeres bejelentkezés!</h1>
                <p class='lead'>Üdv, <strong>{$_SESSION['userName']}</strong>!</p>
                <a href='index.php?page=logout' class='btn btn-danger mt-3'>Kilépés</a>
            </div>
        </body>
        </html>";
    }
}