<?php
include_once 'header.php';
require_once __DIR__ . '/../../../controller/dashboard/AppointmentController.php';


use app\controller\dashboard\AppointmentController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientName = $_POST['client_name'] ?? '';
    $serviceId = $_POST['service_id'] ?? '';
    $appointmentDate = $_POST['appointment_date'] ?? '';
    $appointmentTime = $_POST['appointment_time'] ?? '';

    if ($clientName && $serviceId && $appointmentDate && $appointmentTime) {
        $controller = new AppointmentController();
        $result = $controller->addAppointment($clientName, $serviceId, $appointmentDate, $appointmentTime);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Időpont sikeresen hozzáadva.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Hiba történt az időpont mentésekor.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Hiányzó adatok!']);
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="text-center mb-5 mt-5">Új időpont</h2>

    <form action="add_appointment.php" method="POST" class="row g-3 justify-content-center">
        <div class="col-md-6">
            <label for="clientName" class="form-label fw-bold">Ügyfél neve *</label>
            <input type="text" class="form-control" id="clientName" name="client_name" required>
        </div>

        <div class="col-md-6">
            <label for="serviceId" class="form-label fw-bold">Szolgáltatás ID *</label>
            <input type="number" class="form-control" id="serviceId" name="service_id" required>
        </div>

        <div class="col-md-6">
            <label for="appointmentDate" class="form-label fw-bold">Dátum *</label>
            <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
        </div>

        <div class="col-md-6">
            <label for="appointmentTime" class="form-label fw-bold">Időpont *</label>
            <input type="time" class="form-control" id="appointmentTime" name="appointment_time" required>
        </div>

        <!-- Gombok középre -->
        <div class="col-12 text-center mt-3">
            <a href="appointments.php" class="btn btn-secondary me-2">Mégse</a>
            <button type="submit" class="btn btn-primary fw-bold">Hozzáadás</button>
        </div>
    </form>
</div>
