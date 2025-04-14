<?php
session_start();
require_once __DIR__ . '/../../../_utils/Database.php';

use app\_utils\Database;

$database = new Database();
$conn = $database->getConnection();

if (isset($_POST['update'])) {
    $user_id = $_SESSION['user_id'];

    $fullName = $_POST['fullName'];
    $companyName = $_POST['companyName'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET fullName = :fullName, companyName = :companyName, phone = :phone, password = :password WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':fullName' => $fullName,
            ':companyName' => $companyName,
            ':phone' => $phone,
            ':password' => $hashed_password,
            ':id' => $user_id
        ]);
    } else {
        $sql = "UPDATE users SET fullName = :fullName, companyName = :companyName, phone = :phone WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':fullName' => $fullName,
            ':companyName' => $companyName,
            ':phone' => $phone,
            ':id' => $user_id
        ]);
    }

    header("Location: profile.php?success=1");
    exit;
} else {
    echo "Érvénytelen kérés.";
}
