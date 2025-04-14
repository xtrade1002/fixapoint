<?php
require_once __DIR__ . '/../../../controller/dashboard/AppointmentController.php';

use app\controller\dashboard\AppointmentController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $clientName = trim($_POST['client_name'] ?? '');
    $serviceId = $_POST['service_id'] ?? null;
    $appointmentDate = $_POST['appointment_date'] ?? '';
    $appointmentTime = $_POST['appointment_time'] ?? '';

    if ($id && $clientName && $serviceId && $appointmentDate && $appointmentTime) {
        $controller = new AppointmentController();
        $result = $controller->updateAppointment($id, $clientName, $serviceId, $appointmentDate, $appointmentTime);

        if ($result) {
            header("Location: appointments.php?success=1");
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Hiba történt a módosítás során.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Hiányzó vagy érvénytelen adatok!']);
    }
}
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="text-center mb-5 mt-5">Időpont módosítása</h2>

    <form action="update_appointment.php" method="POST" class="row g-3 justify-content-center">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? ''; ?>">

        <div class="col-md-6">
            <label for="clientName" class="form-label fw-bold">Ügyfél neve *</label>
            <input type="text" class="form-control" id="clientName" name="client_name" value="<?php echo $clientName ?? ''; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="serviceId" class="form-label fw-bold">Szolgáltatás *</label>
            <input type="number" class="form-control" id="serviceId" name="service_id" value="<?php echo $serviceId ?? ''; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="appointmentDate" class="form-label fw-bold">Dátum *</label>
            <input type="date" class="form-control" id="appointmentDate" name="appointment_date" value="<?php echo $appointmentDate ?? ''; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="appointmentTime" class="form-label fw-bold">Időpont *</label>
            <input type="time" class="form-control" id="appointmentTime" name="appointment_time" value="<?php echo $appointmentTime ?? ''; ?>" required>
        </div>

        <div class="col-12 text-center mt-3">
            <a href="appointments.php" class="btn btn-secondary me-2">Mégse</a>
            <button type="submit" class="btn btn-primary fw-bold">Módosítás</button>
        </div>
    </form>
</div>
