<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../login.php");
    exit();
}
include_once __DIR__ . '/../header.php';


?>
<h1>user setting</h1>